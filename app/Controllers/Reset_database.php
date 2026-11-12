<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Reset_database extends BaseController
{
	protected $model;

	public function __construct()
	{
		parent::__construct();
		$this->model = new BarangModel();
	}

	public function index()
	{
		$this->mustHavePermission('reset_database');

		$this->data['title'] = 'Reset Database';
		$this->data['resetResult'] = session()->getFlashdata('reset_database_result');
		$this->data['resetToken'] = bin2hex(random_bytes(32));
		session()->set('reset_database_token', $this->data['resetToken']);
		$this->view('reset-database.php', $this->data);
	}

	public function execute()
	{
		$this->mustHavePermission('reset_database');

		if (strtolower($this->request->getMethod()) !== 'post') {
			return $this->response->setStatusCode(405)->setBody('Method not allowed');
		}

		$sessionToken = (string) session()->get('reset_database_token');
		$postedToken = (string) $this->request->getPost('reset_token');
		if (!$sessionToken || !$postedToken || !hash_equals($sessionToken, $postedToken)) {
			return $this->response->setStatusCode(403)->setBody('Token keamanan tidak valid. Muat ulang halaman dan coba lagi.');
		}
		session()->remove('reset_database_token');

		if ($this->request->getPost('confirmation') !== 'HAPUS DATA KASIRPRO') {
			session()->setFlashdata('reset_database_result', [
				'status' => 'error',
				'message' => 'Konfirmasi tidak sesuai. Tidak ada data yang dihapus.',
			]);
			return redirect()->to(base_url('reset-database'));
		}

		$deleteImages = $this->request->getPost('delete_image') === 'Y';
		$result = $this->model->deleteAllBarang($deleteImages);
		session()->setFlashdata('reset_database_result', $result);

		return redirect()->to(base_url('reset-database'));
	}
}