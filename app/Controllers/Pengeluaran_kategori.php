<?php

/**
 *	App Name	: Pos Kasir Pro	
 *	Developed by: Team Cepat Online
 *	Website		: https://cepatonline.com
 *	Year		: 2023-2023
 */

namespace App\Controllers;

use App\Models\PengeluaranKategoriModel;

class Pengeluaran_kategori extends \App\Controllers\BaseController
{
	protected $model;

	public function __construct()
	{

		parent::__construct();
		$this->model = new PengeluaranKategoriModel;
		$this->data['site_title'] = 'Kategori Pengeluaran';
		helper('form');
	}

	public function index()
	{
		$this->hasPermission('read_all', '', true);

		$error = '';
		if ($this->request->getMethod() === 'post') {
			$action = $this->request->getPost('action');
			$id = (int) $this->request->getPost('id');

			if ($action === 'save') {
				$this->hasPermission($id ? 'update_all' : 'create', '', true);
				$name = trim((string) $this->request->getPost('nama_kategori'));
				$description = trim((string) $this->request->getPost('deskripsi'));

				if ($name === '' || strlen($name) > 100) {
					$error = 'Nama kategori wajib diisi dan maksimal 100 karakter.';
				} elseif ($this->model->existsByName($name, $id ?: null)) {
					$error = 'Nama kategori tersebut sudah digunakan.';
				} else {
					$data = [
						'nama_kategori' => $name,
						'deskripsi' => $description ?: null,
						'aktif' => $this->request->getPost('aktif') ? 'Y' : 'N',
					];

					if ($id) {
						$data['tgl_update'] = date('Y-m-d H:i:s');
					} else {
						$data['id_user_input'] = (int) $this->session->get('user')['id_user'];
						$data['tgl_input'] = date('Y-m-d H:i:s');
					}

					if ($this->model->saveCategory($data, $id ?: null)) {
						return redirect()->to(base_url('pengeluaran-kategori'))->with('success', 'Kategori biaya berhasil disimpan.');
					}
					$error = 'Kategori biaya gagal disimpan.';
				}
			} elseif ($action === 'delete') {
				$this->hasPermission('delete_all', '', true);
				if ($this->model->isUsed($id)) {
					$error = 'Kategori tidak dapat dihapus karena sudah digunakan transaksi. Nonaktifkan kategori jika tidak digunakan lagi.';
				} elseif ($this->model->deleteCategory($id)) {
					return redirect()->to(base_url('pengeluaran-kategori'))->with('success', 'Kategori biaya berhasil dihapus.');
				} else {
					$error = 'Kategori biaya gagal dihapus.';
				}
			}
		}

		$data = $this->data;
		$data['kategori'] = $this->model->getAll();
		$data['editing'] = $this->request->getGet('edit')
			? $this->model->getById((int) $this->request->getGet('edit'))
			: null;
		$data['form_input'] = $this->request->getPost() ?: ($data['editing'] ?? []);
		$data['error'] = $error;
		$data['success'] = $this->session->getFlashdata('success');
		$this->view('pengeluaran-kategori.php', $data);
	}

	public function ajaxEditKategori()
	{
		if (isset($_POST['nama_kategori'])) {
			$error = $this->checkForm();
			if ($error) {
				$result['status'] = 'error';
				$result['message'] = '<ul class="list-error"><li>' . join('</li><li>', $error) . '</li></ul>';
			} else {


				if (empty($_POST['id'])) {
					$query = $this->model->saveData();
					$message = 'Kategori berhasil ditambahkan';
					$result['id_menu'] = $query;
				} else {
					$query = $this->model->saveData($_POST['id']);
					$message = 'Kategori berhasil diupdate';
				}

				$query = true;
				if ($query) {
					$result['status'] = 'ok';
					$result['message'] = $message;
					// $data['msg']['message'] = 'Kategori berhasil diupdate';
				} else {
					$result['status'] = 'error';
					$result['message'] = 'Data gagal disimpan';
					$result['error_query'] = true;
				}
			}
			echo json_encode($result);
			exit();
		}
	}

	public function ajaxDeleteKategori()
	{
		$result = $this->model->deleteKategori();

		if ($result) {
			$message = ['status' => 'ok', 'message' => 'Data kategori berhasil dihapus'];
			echo json_encode($message);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Data kategori gagal dihapus']);
		}
	}

	public function ajaxUpdateUrut()
	{

		$updated = $this->model->updateKategoriUrut();
		if ($updated) {
			$message['status'] = 'ok';
			$message['message'] = 'Kategori berhasil diupdate';
		} else {
			$message['status'] = 'warning';
			$message['message'] = 'Tidak ada kategori yang diupdate';
		}

		echo json_encode($message);
	}

	public function ajaxGetKategoriForm()
	{
		$this->data['kategori'] = [];
		if (!empty($_GET['id'])) {
			$this->data['kategori'] = $this->model->getKategoriById($_GET['id']);
		}
		echo view('themes/modern/pengeluaran-kategori-form.php', $this->data);
	}

	public function ajaxKategoriDetail()
	{

		$result = $this->model->getKategoriDetail();
		echo json_encode($result);
	}

	private function checkForm()
	{
		$error = [];
		if (trim($_POST['nama_kategori']) == '') {
			$error[] = 'Nama kategori harus diisi';
		}

		if (trim($_POST['deskripsi']) == '') {
			$error[] = 'Deskripsi harus diisi';
		}

		return $error;
	}

	function buildKategoriListJson($arr, $id_parent = '')
	{
		// $option = "\n" . '<select id="tree1" style="width: 550px">'."\r\n";
		$option = '';

		foreach ($arr as $key => $val) {
			// Check new
			$new = @$val['new'] == 1 ? '<span class="menu-baru">NEW</span>' : '';
			$icon = '';
			if ($val['icon']) {
				$icon = '<i class="' . $val['icon'] . '"></i>';
			}



			if (key_exists('children', $val)) {
				$option .= '<option value="' . $val['id_pengeluaran_kategori'] . '" data-parent="' . $id_parent . '" disabled="disabled">' . $icon . $val['nama_kategori'] . '</option>' . "\r\n";
				$option .= $this->buildKategoriListJson($val['children'], $val['id_pengeluaran_kategori']);
			} else {
				$option .= '<option value="' . $val['id_pengeluaran_kategori'] . '" data-parent="' . $id_parent . '">' . $icon . $val['nama_kategori'] . '</option>'  . "\r\n";
			}
		}
		// $option .= "</select>\n";
		return $option;
	}

	function buildKategoriList($arr)
	{
		$kategori = "\n" . '<ol class="dd-list">' . "\r\n";

		foreach ($arr as $key => $val) {
			// Check new
			$new = @$val['new'] == 1 ? '<span class="menu-baru">NEW</span>' : '';
			$icon = '';
			if ($val['icon']) {
				$icon = '<i class="' . $val['icon'] . '"></i>';
			}

			$kategori .= '<li class="dd-item" data-id="' . $val['id_pengeluaran_kategori'] . '"><div class="dd-handle">' . $icon . '<span class="menu-title">' . $val['nama_kategori'] . '</span></div>';

			if (key_exists('children', $val)) {
				$kategori .= $this->buildKategoriList($val['children'], ' class="submenu"');
			}
			$kategori .= "</li>\n";
		}
		$kategori .= "</ol>\n";
		return $kategori;
	}
}
