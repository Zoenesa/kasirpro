<?php

namespace App\Libraries;

class LicenseService
{
	public function getCurrent(): ?array
	{
		return db_connect()->table('client_licenses')
			->orderBy('id', 'DESC')
			->get()
			->getRowArray();
	}

	public function activate(string $licenseKey): array
	{
		$config = config('License');
		$domain = $this->getDomain();

		try {
			$response = $this->postJson(rtrim($config->apiBaseUrl, '/') . '/license/activate', [
				'license_key' => $licenseKey,
				'domain' => $domain,
				'environment' => $config->environment,
			]);

			$data = json_decode($response['body'], true) ?: [];
			if ($response['status'] < 200 || $response['status'] >= 300 || ($data['status'] ?? null) !== 'success') {
				return [
					'ok' => false,
					'status' => $data['code'] ?? 'ERROR',
					'message' => $data['message'] ?? 'Gagal mengaktivasi lisensi.',
				];
			}

			$now = date('Y-m-d H:i:s');
			$license = [
				'license_key' => $licenseKey,
				'status' => $data['data']['status'] ?? 'active',
				'domain' => $data['data']['domain'] ?? $domain,
				'message' => $data['message'] ?? 'Lisensi berhasil diaktivasi.',
				'activated_at' => $now,
				'last_verified_at' => $now,
			];
			$this->saveCurrent($license);

			return ['ok' => true, 'status' => $license['status'], 'message' => $license['message']];
		} catch (\Throwable $exception) {
			log_message('error', 'License activation error: {error}', ['error' => $exception->getMessage()]);

			return [
				'ok' => false,
				'status' => 'NETWORK_ERROR',
				'message' => 'Server KasirPRO tidak dapat menghubungi Member Area. Periksa ekstensi cURL pada PHP Apache dan akses HTTPS keluar ke wioos.com (port 443).',
			];
		}
	}

	public function verify(?array $license = null, bool $force = false): array
	{
		$license = $license ?: $this->getCurrent();
		if (!$license) {
			return ['ok' => false, 'status' => 'NO_LICENSE', 'message' => 'Lisensi belum diatur.'];
		}

		$lastVerified = !empty($license['last_verified_at']) ? strtotime($license['last_verified_at']) : false;
		if (!$force && $lastVerified && $lastVerified > strtotime('-30 minutes')) {
			return [
				'ok' => $license['status'] === 'active',
				'status' => $license['status'],
				'message' => $license['message'] ?? '',
			];
		}

		$config = config('License');
		$domain = $this->getDomain();

		try {
			$response = $this->postJson(rtrim($config->apiBaseUrl, '/') . '/license/verify', [
				'license_key' => $license['license_key'],
				'domain' => $domain,
			]);

			$data = json_decode($response['body'], true) ?: [];
			$now = date('Y-m-d H:i:s');
			if ($response['status'] < 200 || $response['status'] >= 300 || ($data['status'] ?? null) !== 'success') {
				$license['status'] = $data['code'] ?? 'invalid';
				$license['message'] = $data['message'] ?? 'Lisensi tidak valid.';
				$license['last_verified_at'] = $now;
				$this->saveCurrent($license);

				return ['ok' => false, 'status' => $license['status'], 'message' => $license['message']];
			}

			$license['status'] = $data['data']['status'] ?? 'active';
			$license['domain'] = $data['data']['domain'] ?? $domain;
			$license['message'] = 'Lisensi valid.';
			$license['last_verified_at'] = $now;
			$this->saveCurrent($license);

			return ['ok' => true, 'status' => $license['status'], 'message' => $license['message']];
		} catch (\Throwable $exception) {
			log_message('error', 'License verification error: {error}', ['error' => $exception->getMessage()]);

			return [
				'ok' => $license['status'] === 'active',
				'status' => $license['status'],
				'message' => $license['message'] ?? 'Gagal menghubungi server lisensi.',
			];
		}
	}

	private function postJson(string $url, array $payload): array
	{
		if (function_exists('curl_init')) {
			$response = service('curlrequest')->request('POST', $url, [
				'json' => $payload,
				'http_errors' => false,
				'timeout' => 10,
			]);

			return ['status' => $response->getStatusCode(), 'body' => $response->getBody()];
		}

		$body = json_encode($payload);
		if ($body === false) {
			throw new \RuntimeException('Unable to encode license request as JSON.');
		}

		$context = stream_context_create([
			'http' => [
				'method' => 'POST',
				'header' => "Content-Type: application/json\r\nAccept: application/json\r\n",
				'content' => $body,
				'timeout' => 10,
				'ignore_errors' => true,
			],
			'ssl' => [
				'verify_peer' => true,
				'verify_peer_name' => true,
			],
		]);

		$responseBody = @file_get_contents($url, false, $context);
		if ($responseBody === false) {
			$error = error_get_last();
			throw new \RuntimeException($error['message'] ?? 'License server request failed.');
		}

		$status = 0;
		foreach ($http_response_header ?? [] as $header) {
			if (preg_match('/^HTTP\/\S+\s+(\d{3})/', $header, $matches)) {
				$status = (int) $matches[1];
			}
		}

		return ['status' => $status, 'body' => $responseBody];
	}

	private function saveCurrent(array $license): void
	{
		$db = db_connect();
		$current = $this->getCurrent();

		if ($current) {
			$db->table('client_licenses')->where('id', $current['id'])->update($license);
			return;
		}

		$db->table('client_licenses')->insert($license);
	}

	private function getDomain(): string
	{
		$host = service('request')->getServer('HTTP_HOST');
		$domain = $host ? parse_url('http://' . $host, PHP_URL_HOST) : null;

		return $domain ?: (string) parse_url(config('App')->baseURL, PHP_URL_HOST);
	}
}