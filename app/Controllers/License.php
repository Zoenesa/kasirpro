<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class License extends Controller
{
	public function index()
	{
		$appSettings = db_connect()->table('setting')
			->where('type', 'app')
			->whereIn('param', ['logo_login', 'judul_web'])
			->get()
			->getResultArray();
		$settings = [];
		foreach ($appSettings as $setting) {
			$settings[$setting['param']] = $setting['value'];
		}

		return view('license/setup', [
			'current' => (new \App\Libraries\LicenseService())->getCurrent(),
			'error' => session()->getFlashdata('license_error'),
			'licenseInput' => session()->getFlashdata('license_input'),
			'success' => session()->getFlashdata('license_success'),
			'appName' => !empty($settings['judul_web']) ? $settings['judul_web'] : 'KasirPRO',
			'logoLogin' => basename($settings['logo_login'] ?? ''),
		]);
	}

	public function activate()
	{
		$licenseKey = trim((string) $this->request->getPost('license_key'));
		if ($licenseKey === '') {
			session()->setFlashdata('license_error', 'Masukkan license key terlebih dahulu.');
			return redirect()->to(base_url('licenses'));
		}

		$result = (new \App\Libraries\LicenseService())->activate($licenseKey);
		if (!$result['ok']) {
			session()->setFlashdata('license_error', $result['message']);
			session()->setFlashdata('license_input', $licenseKey);
			return redirect()->to(base_url('licenses'));
		}

		session()->setFlashdata('license_success', $result['message']);
		return redirect()->to(base_url());
	}
}