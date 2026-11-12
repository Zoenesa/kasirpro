<?php

/**
 *	App Name	: Pos Kasir Pro	
 *	Developed by: Team Cepat Online
 *	Website		: https://cepatonline.com
 *	Year		: 2023-2023
 */

namespace App\Controllers;

require ROOTPATH . 'app/ThirdParty/PhpSpreadsheet/autoload.php';

use App\Models\PengeluaranModel;
use App\Models\BiayaOperasionalModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengeluaran extends \App\Controllers\BaseController
{
	public function __construct()
	{

		parent::__construct();

		$this->model = new PengeluaranModel;
		$this->expenseModel = new BiayaOperasionalModel;
		$this->data['site_title'] = 'Pengeluaran';

		$this->configFilepicker = new \Config\Filepicker();

		$this->addJs(
			'
			var filepicker_server_url = "' . $this->configFilepicker->serverURL . '";
			var filepicker_icon_url = "' . $this->configFilepicker->iconURL . '";',
			true
		);

		$this->addJs($this->config->baseURL . 'public/vendors/dragula/dragula.min.js');
		$this->addJs($this->config->baseURL . 'public/vendors/flatpickr/dist/flatpickr.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/flatpickr/dist/flatpickr.min.css');
		$this->addStyle($this->config->baseURL . 'public/vendors/flatpickr/dist/themes/material_blue.css');

		$this->addJs($this->config->baseURL . 'public/vendors/moment/moment.min.js');
		$this->addJs($this->config->baseURL . 'public/vendors/daterangepicker/daterangepicker.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/daterangepicker/daterangepicker.css');

		$this->addJs($this->config->baseURL . 'public/vendors/jquery.select2/js/select2.full.min.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/jquery.select2/css/select2.min.css');
		$this->addStyle($this->config->baseURL . 'public/vendors/jquery.select2/bootstrap-5-theme/select2-bootstrap-5-theme.min.css');

		$this->addStyle($this->config->baseURL . 'public/themes/modern/css/gallery.css');

		$this->addJs($this->config->baseURL . 'public/vendors/jwdmodal/jwdmodal.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/jwdmodal/jwdmodal.css');
		$this->addStyle($this->config->baseURL . 'public/vendors/jwdmodal/jwdmodal-loader.css');
		$this->addStyle($this->config->baseURL . 'public/vendors/jwdmodal/jwdmodal-fapicker.css');

		$this->addJs($this->config->baseURL . 'public/vendors/jwdfilepicker/jwdfilepicker.js');
		$this->addJs($this->config->baseURL . 'public/themes/modern/js/jwdfilepicker-defaults.js');
		$this->addJs($this->config->baseURL . 'public/vendors/dropzone/dropzone.min.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/jwdfilepicker/jwdfilepicker.css');
		$this->addStyle($this->config->baseURL . 'public/vendors/jwdfilepicker/jwdfilepicker-loader.css');
		$this->addStyle($this->config->baseURL . 'public/vendors/jwdfilepicker/jwdfilepicker-modal.css');

		$this->addJs($this->config->baseURL . 'public/themes/modern/js/select2-kategori.js');
		$this->addJs($this->config->baseURL . 'public/vendors/filesaver/FileSaver.js');
		$this->addJs($this->config->baseURL . 'public/themes/modern/js/pengeluaran-images.js');
		$this->addJs($this->config->baseURL . 'public/themes/modern/js/pengeluaran.js');
	}

	public function index()
	{
		$this->hasPermission('read_all', '', true);
		$error = '';
		$notice = $this->session->getFlashdata('expense_notice');
		$post = $this->request->getPost();
		$editing = null;

		if ($this->request->getMethod() === 'post') {
			$action = $this->request->getPost('action');
			$id = (int) $this->request->getPost('id');

			if ($action === 'save') {
				$this->hasPermission($id ? 'update_all' : 'create', '', true);
				$editing = $id ? $this->expenseModel->getExpense($id) : null;
				if ($id && !$editing) {
					$error = 'Transaksi biaya tidak ditemukan.';
				} else {
					[$expenseData, $error] = $this->validateExpense($post);
					if (!$error) {
						if ($id) {
							$expenseData['tgl_update'] = date('Y-m-d H:i:s');
						} else {
							$user = $this->session->get('user') ?? [];
						$expenseData['id_user_input'] = (int) ($user['id_user'] ?? 0);
						$expenseData['tgl_input'] = date('Y-m-d H:i:s');
						}

						if ($this->expenseModel->saveExpense($expenseData, $id ?: null)) {
							$this->session->setFlashdata('expense_notice', ['status' => 'success', 'message' => 'Transaksi biaya berhasil disimpan.']);
							return redirect()->to(base_url('pengeluaran'));
						}
						$error = 'Transaksi biaya gagal disimpan.';
					}
				}
			} elseif ($action === 'delete') {
				$this->hasPermission('delete_all', '', true);
				if ($this->expenseModel->deleteExpense($id)) {
					$this->session->setFlashdata('expense_notice', ['status' => 'success', 'message' => 'Transaksi biaya berhasil dihapus.']);
					return redirect()->to(base_url('pengeluaran'));
				}
				$notice = ['status' => 'danger', 'message' => 'Transaksi biaya gagal dihapus.'];
			}
		}

		$editId = (int) $this->request->getGet('edit');
		$isForm = $this->request->getGet('form') || $editId || $error;
		if ($editId && !$editing) {
			$this->hasPermission('update_all', '', true);
			$editing = $this->expenseModel->getExpense($editId);
			if (!$editing) {
				$error = 'Transaksi biaya tidak ditemukan.';
				$isForm = false;
			}
		}

		if ($isForm) {
			$this->data['categories'] = $this->expenseModel->getCategories();
			$this->data['form_data'] = $post ?: ($editing ?? [
				'tgl_pengeluaran' => date('Y-m-d'),
				'metode_pembayaran' => 'Tunai',
			]);
			$this->data['form_error'] = $error;
			$this->data['notice'] = $notice;
			$this->data['is_edit'] = !empty($this->data['form_data']['id_pengeluaran'] ?? $this->data['form_data']['id'] ?? $editId);
			$this->view('pengeluaran-form-ajax.php', $this->data);
			return;
		}

		$startDate = $this->request->getGet('start_date') ?: date('Y-m-01');
		$endDate = $this->request->getGet('end_date') ?: date('Y-m-d');
		if (!$this->isValidDate($startDate) || !$this->isValidDate($endDate) || $startDate > $endDate) {
			$startDate = date('Y-m-01');
			$endDate = date('Y-m-d');
		}

		$this->data['start_date'] = $startDate;
		$this->data['end_date'] = $endDate;
		$this->data['expenses'] = $this->expenseModel->getExpenses($startDate, $endDate);
		$this->data['summary'] = $this->expenseModel->getSummary($startDate, $endDate);
		$this->data['notice'] = $notice;
		$this->view('pengeluaran-result.php', $this->data);
	}

	private function validateExpense(array $post): array
	{
		$name = trim((string) ($post['nama_pengeluaran'] ?? ''));
		$categoryId = (int) ($post['id_pengeluaran_kategori'] ?? 0);
		$date = (string) ($post['tgl_pengeluaran'] ?? '');
		$amount = $post['jumlah'] ?? '';
		$paymentMethod = (string) ($post['metode_pembayaran'] ?? '');
		$paymentMethods = ['Tunai', 'Transfer', 'QRIS', 'Kartu', 'Lainnya'];
		$activeCategoryIds = array_map('intval', array_column($this->expenseModel->getCategories(), 'id_pengeluaran_kategori'));

		if ($name === '' || strlen($name) > 160) {
			return [[], 'Nama biaya wajib diisi dan maksimal 160 karakter.'];
		}
		if (!in_array($categoryId, $activeCategoryIds, true)) {
			return [[], 'Pilih kategori biaya yang aktif.'];
		}
		if (!$this->isValidDate($date)) {
			return [[], 'Tanggal pengeluaran tidak valid.'];
		}
		if (!preg_match('/^[1-9][0-9]{0,12}$/', (string) $amount)) {
			return [[], 'Jumlah biaya harus berupa Rupiah bulat lebih besar dari nol.'];
		}
		if (!in_array($paymentMethod, $paymentMethods, true)) {
			return [[], 'Pilih metode pembayaran yang tersedia.'];
		}

		$reference = trim((string) ($post['no_bukti'] ?? ''));
		if (strlen($reference) > 100) {
			return [[], 'Nomor bukti maksimal 100 karakter.'];
		}

		return [[
			'id_pengeluaran_kategori' => $categoryId,
			'tgl_pengeluaran' => $date,
			'nama_pengeluaran' => $name,
			'jumlah' => (int) $amount,
			'metode_pembayaran' => $paymentMethod,
			'no_bukti' => $reference ?: null,
			'catatan' => trim((string) ($post['catatan'] ?? '')) ?: null,
		], ''];
	}

	private function isValidDate(string $date): bool
	{
		$parsed = \DateTimeImmutable::createFromFormat('!Y-m-d', $date);
		return $parsed && $parsed->format('Y-m-d') === $date;
	}

	public function upload_excel()
	{

		$this->hasPermission('create');

		$breadcrumb['Upload Excel'] = '';
		$this->data['title'] = 'Upload Data Pengeluaran';

		$error = false;
		if ($this->request->getPost('submit')) {
			$form_errors = $this->validateFormUpload();
			if ($form_errors) {
				$this->data['message']['status'] = 'error';
				$this->data['message']['content'] = $form_errors;
			} else {
				$this->data['message'] = $this->model->uploadExcel();
			}
		}

		$this->view('pengeluaran-upload-excel.php', $this->data);
	}

	function validateFormUpload()
	{

		$form_errors = [];

		if ($_FILES['file_excel']['name']) {
			$file_type = $_FILES['file_excel']['type'];
			$allowed = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

			if (!in_array($file_type, $allowed)) {
				$form_errors['file_excel'] = 'Tipe file harus ' . join(', ', $allowed);
			}
		} else {
			$form_errors['file_excel'] = 'File belum dipilih';
		}

		return $form_errors;
	}

	public function formatUploadFIleExcel()
	{
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(ROOTPATH . "public/files/Format Data Pengeluaran.xlsx");

		// Kategori
		$spreadsheet->setActiveSheetIndexByName('LIST_KATEGORI');
		$sheet = $spreadsheet->getActiveSheet();
		$result_kategori = $this->model->getKategori();
		$list_kategori = kategori_list($result_kategori, 'id_pengeluaran_kategori');
		$kategori = $this->gelLastKategori($list_kategori);
		foreach ($kategori as &$val) {
			$list_parent[$val['id_pengeluaran_kategori']] = $this->getParent($result_kategori, $val['id_pengeluaran_kategori']);
		}

		$kategori_tree = [];
		foreach ($list_parent as $id => $val) {
			krsort($val);
			$kategori_tree[$id] = join(' > ', $val);
		}

		$num_row = 0;
		$sheet->getColumnDimension('A')->setWidth(40);
		$sheet->setCellValue('A' . ++$num_row, 'NAMA_KATEGORI');
		$sheet->setCellValue('B' . $num_row, 'ID');
		if ($kategori_tree) {
			foreach ($kategori_tree as $id => $val) {
				$sheet->setCellValue('A' . ++$num_row, $val);
				$sheet->setCellValue('B' . $num_row, $id);
			}
		}

		// Rekanan
		$spreadsheet->setActiveSheetIndexByName('LIST_REKANAN');
		$sheet = $spreadsheet->getActiveSheet();
		$num_row = 0;
		$sheet->getColumnDimension('A')->setWidth(25);
		$sheet->getColumnDimension('B')->setWidth(25);
		$sheet->getColumnDimension('C')->setWidth(25);
		$sheet->getColumnDimension('D')->setWidth(10);
		$sheet->setCellValue('A' . ++$num_row, 'NAMA_REKANAN');
		$sheet->setCellValue('B' . $num_row, 'ALAMAT_REKANAN');
		$sheet->setCellValue('C' . $num_row, 'NO_TELP_REKANAN');
		$sheet->setCellValue('D' . $num_row, 'ID');
		$rekanan = $this->model->getRekanan();
		if ($rekanan) {
			foreach ($rekanan as $val) {
				$sheet->setCellValue('A' . ++$num_row, $val['nama_rekanan'] . '_' . $val['id_rekanan']);
				$sheet->setCellValue('B' . $num_row, $val['alamat']);
				$sheet->setCellValue('C' . $num_row, $val['no_telp']);
				$sheet->setCellValue('D' . $num_row, $val['id_rekanan']);
			}
		}

		$spreadsheet->setActiveSheetIndexByName('DATA');

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Format Data Pengeluaran.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}

	public function generateExcel($output)
	{
		$filepath = $this->model->writeExcel();
		$filename = 'Rincian Pengeluaran.xlsx';

		switch ($output) {
			case 'raw':
				$content = file_get_contents($filepath);
				echo $content;
				delete_file($filepath);
				break;
			case 'file':
				return $filepath;
				break;
			default:
				header('Content-disposition: attachment; filename="' . $filename . '"');
				header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
				header('Content-Transfer-Encoding: binary');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				$content = file_get_contents($filepath);
				delete_file($filepath);
				echo $content;
		}
		exit;
	}

	public function ajaxExportExcel()
	{
		$output = '';
		if (@$_GET['ajax'] == 'true') {
			$output = 'raw';
		}
		$this->generateExcel($output);
	}

	private function gelLastKategori($array, &$result = [])
	{
		foreach ($array as $val) {
			if (empty($val['children'])) {
				$result[] = $val;
			} else {
				$this->gelLastKategori($val['children'], $result);
			}
		}
		return $result;
	}

	public function getParent($list, $id, &$data = [])
	{

		if (key_exists($id, $list)) {
			if ($list[$id]['id_parent']) {
				$data[] = $list[$id]['nama_kategori'];
				$this->getParent($list, $list[$id]['id_parent'], $data);
			} else {
				$data[] = $list[$id]['nama_kategori'];
			}
		}
		return $data;
	}

	private function buildKategoriList($arr, $id_parent = '', &$result = [])
	{

		foreach ($arr as $key => $val) {
			$result[$val['id_pengeluaran_kategori']] = [
				'attr' => ['data-parent' => $id_parent, 'data-icon' => $val['icon'], 'data-new' => $val['new']], 'text' => $val['nama_kategori']
			];
			if (key_exists('children', $val)) {
				$result[$val['id_pengeluaran_kategori']]['attr']['disabled'] = 'disabled';
				$this->buildKategoriList($val['children'], $val['id_pengeluaran_kategori'], $result);
			}
		}
		return $result;
	}

	public function ajaxGetFormData()
	{

		if (!empty($_GET['id'])) {
			$this->data['pengeluaran'] = $this->model->getPengeluaranById($_GET['id']);
			if (!$this->data['pengeluaran']) {
				echo '<div class="alert alert-danger">Data tidak ditemukan</div>';
				exit;
			}
		}

		$result = $this->model->getAllMetodePembayaran();
		$metode_pembayaran = [];
		foreach ($result as $val) {
			$metode_pembayaran[$val['id_jenis_bayar']] = $val['nama_jenis_bayar'];
		}

		$result = $this->model->getPendapatanJenis();
		$sumber_dana[''] = '-';
		foreach ($result as $val) {
			$sumber_dana[$val['id_pendapatan_jenis']] = $val['nama_pendapatan_jenis'];
		}

		$result = $this->model->getKategori();
		$list_kategori = kategori_list($result, 'id_pengeluaran_kategori');
		// echo '<pre>'; print_r($result); die;
		$this->data['list_kategori'] = $this->buildKategoriList($list_kategori);
		$this->data['sumber_dana'] = $sumber_dana;
		$this->data['metode_pembayaran'] = $metode_pembayaran;
		$this->data['action'] = 'add';
		echo view('themes/modern/pengeluaran-form-ajax.php', $this->data);
	}

	/* public function add() {
		$this->data['action'] = 'add';
		$result = $this->model->getAllPembayaranJenis();
		$jenis_pembayaran =[];
		foreach ($result as $val) {
			$jenis_pembayaran[$val['id_pengeluaran']] = $val['nama_pengeluaran'];
		}
		$this->data['jenis_pembayaran'] = $jenis_pembayaran;
		$this->data['title'] = 'Tambah Pembayaran';
		
		$this->view('pendapatan-siswa-form.php', $this->data);
	} */

	/* public function ajaxGetFormAdd() {
		
		$result = $this->model->getAllGroupKelas();
		$group_kelas = [];
		foreach ($result as $val) {
			$group_kelas[$val['group_kelas']] = 'Kelas ' . $val['group_kelas'];
		}
				
		$this->data['group_kelas'] = $group_kelas;
		$this->data['siswa'] = $this->model->getSiswaByGroupKelas(1);
		echo view('themes/modern/spp-siswa-form-add.php', $this->data);
	} */

	/* public function ajaxGetSiswaByGroupKelas() {
		$result = $this->model->getSiswaByGroupKelas($_GET['id']);
		echo json_encode($result);
	} */

	/* public function ajaxGetFormEdit() {
		$spp = $this->model->getSppSiswaById();
		if (!$spp) {
			echo '<div class="alert alert-danger">Error: Data tidak ditemukan</div>';
			exit;
		}
		$this->data['spp'] = $spp;
		echo view('themes/modern/spp-siswa-form-edit.php', $this->data);
		
	} */

	public function ajaxSaveData()
	{
		$message = $this->model->saveData();
		echo json_encode($message);
	}

	public function ajaxSaveDataEdit()
	{
		$message = $this->model->saveDataEdit();
		echo json_encode($message);
	}

	public function ajaxDeleteData()
	{
		$result = $this->model->deleteData();

		if ($result) {
			$message = ['status' => 'ok', 'message' => 'Data berhasil dihapus'];
			echo json_encode($message);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Data gagal dihapus']);
		}
	}

	public function ajaxDeleteAllData()
	{
		$result = $this->model->deleteAllData();
		echo json_encode($result);
	}

	public function getListRekanan()
	{
		echo view('themes/modern/rekanan-list-popup.php', $this->data);
	}

	public function getDataDTRekanan()
	{

		$this->hasPermissionPrefix('read');

		$num_data = $this->model->countAllDataRekanan();
		$result['draw'] = $start = $this->request->getPost('draw') ?: 1;
		$result['recordsTotal'] = $num_data;

		$query = $this->model->getListDataRekanan();
		$result['recordsFiltered'] = $query['total_filtered'];

		helper('html');

		$nama_bulan = nama_bulan();
		$no = $this->request->getPost('start') + 1 ?: 1;
		foreach ($query['data'] as $key => &$val) {
			$val['ignore_urut'] = $no;
			$val['ignore_pilih'] = '<div>' .
				btn_label(
					[
						'icon' => 'fas fa-plus', 'attr' => [
							'class' => 'btn btn-success btn-pilih-rekanan btn-xs me-1', 'data-id' => $val['id_rekanan']
						], 'label' => 'Pilih'
					]
				)
				. '
									<span style="display:none"> ' . json_encode($val) . '</span>
									</div>';

			$val['nama'] = '<div style="min-width:200px">' . $val['nama_rekanan'] . '</div>';
			$no++;
		}

		$result['data'] = $query['data'];
		echo json_encode($result);
		exit();
	}

	public function getDataDT()
	{

		$this->hasPermissionPrefix('read');

		$num_data = $this->model->countAllData();
		$result['draw'] = $start = $this->request->getPost('draw') ?: 1;
		$result['recordsTotal'] = $num_data;

		$query = $this->model->getListData();
		$result['recordsFiltered'] = $query['total_filtered'];

		helper('html');

		$nama_bulan = nama_bulan();
		$no = $this->request->getPost('start') + 1 ?: 1;
		foreach ($query['data'] as $key => &$val) {
			$val['ignore_urut'] = $no;
			$val['ignore_action'] = '<div class="form-inline btn-action-group">';

			if (has_permission('update_all')) {
				$val['ignore_action'] .= btn_label(
					[
						'icon' => 'fas fa-edit', 'attr' => [
							'class' => 'btn btn-success btn-edit btn-xs me-1', 'data-id' => $val['id_pengeluaran']

						]
					]
				);
			}

			if (has_permission('delete_all')) {
				$val['ignore_action'] .= btn_label(
					[
						'icon' => 'fas fa-times', 'attr' => [
							'class' => 'btn btn-danger btn-delete btn-xs', 'data-id' => $val['id_pengeluaran'], 'data-delete-title' => 'Hapus data pengeluaran tanggal ' . format_date($val['tgl_pengeluaran']) .  ' dengan nilai ' . format_number($val['total_pengeluaran']) . ' ?'
						]
					]
				);
			}

			$val['ignore_action'] .= '</div>';

			$exp = explode(',', $val['nama_pengeluaran']);
			if (count($exp) > 1) {
				$val['nama_pengeluaran'] = '<ul class="list-circle"><li>' . join('</li><li>', $exp) . '</li></ul>';
			}

			$exp = explode(',', $val['keterangan']);
			if (count($exp) > 1) {
				$val['keterangan'] = '<ul class="list-circle"><li>' . join('</li><li>', $exp) . '</li></ul>';
			}
			$val['total_pengeluaran'] = '<div class="text-end">' . format_number($val['total_pengeluaran']) . '</div>';
			$val['tgl_pengeluaran'] = '<div class="text-end">' . format_date($val['tgl_pengeluaran']) . '</div>';

			$no++;
		}

		$result['data'] = $query['data'];
		echo json_encode($result);
		exit();
	}
}
