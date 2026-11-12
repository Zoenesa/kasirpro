<?php

/**
 *	App Name	: Pos Kasir Pro	
 *	Developed by: Team Cepat Online
 *	Website		: https://cepatonline.com
 *	Year		: 2022-2022
 */

namespace App\Models;

class GudangModel extends \App\Models\BaseModel
{
	public function deleteData()
	{
		$result = $this->db->table('gudang')->delete(['id_gudang' => $_POST['id']]);
		$gudang_default = $this->db->query('SELECT id_gudang FROM gudang WHERE default_gudang="Y"')->getRowArray();
		if (!$gudang_default) {
			$sql = 'UPDATE gudang SET default_gudang = "Y" limit 1';
			$this->db->query($sql);
		}
		return $result;
	}

	public function getGudangById($id)
	{
		$sql = 'SELECT * FROM gudang WHERE id_gudang = ?';
		$result = $this->db->query($sql, $id)->getRowArray();
		return $result;
	}

	public function switchDefault()
	{
		$result = $this->db->query('SELECT COUNT(*) AS jml FROM gudang WHERE default_gudang="Y"')->getRowArray();
		if ($result['jml'] == 1  && $_POST['default_gudang'] == 'N') {
			return ['status' => 'error', 'message' => 'Setidaknya ada satu gudang yang dipilih menjadi default'];
		}

		$this->db->transStart();
		$this->db->table('gudang')->update(['default_gudang' => 'N']);
		$this->db->table('gudang')->update(['default_gudang' => 'Y'], ['id_gudang' => $_POST['id']]);
		$this->db->transComplete();

		if ($this->db->transStatus()) {
			$result['status'] = 'ok';
			$result['message'] = 'Data berhasil disimpan';
		} else {
			$result['status'] = 'error';
			$result['message'] = 'Data gagal disimpan';
		}

		return $result;
	}

	public function saveData()
	{
		// $result = [];
		$nama_gudang = trim($_POST['nama_gudang'] ?? '');
		$alamat_gudang = trim($_POST['alamat_gudang'] ?? '');
		$id_wilayah_kelurahan = trim($_POST['id_wilayah_kelurahan'] ?? '');
		$current_id = !empty($_POST['id']) ? (int) $_POST['id'] : null;

		$duplicateBuilder = $this->db->table('gudang')
			->where('TRIM(LOWER(nama_gudang)) =', strtolower($nama_gudang))
			->where('TRIM(LOWER(alamat_gudang)) =', strtolower($alamat_gudang));
		if (!empty($id_wilayah_kelurahan)) {
			$duplicateBuilder->where('id_wilayah_kelurahan', $id_wilayah_kelurahan);
		}
		if ($current_id) {
			$duplicateBuilder->where('id_gudang !=', $current_id);
		}
		if ($duplicateBuilder->get()->getRowArray()) {
			return ['status' => 'error', 'message' => 'Nama gudang, alamat, dan wilayah yang sama sudah ada.'];
		}

		if ($_POST['id']) {
			$result = $this->db->query('SELECT id_gudang FROM gudang WHERE default_gudang="Y"')->getRowArray();
			if ($result['id_gudang'] && $_POST['id'] == $result['id_gudang']  && $_POST['default_gudang'] == 'N') {
				return ['status' => 'error', 'message' => 'Setidaknya ada satu gudang yang dipilih menjadi default'];
			}
		}

		$this->db->transStart();

		if ($_POST['default_gudang'] == 'Y') {
			$this->db->table('gudang')->update(['default_gudang' => 'N']);
		}

		$data_db['nama_gudang'] = $nama_gudang;
		$data_db['alamat_gudang'] = $alamat_gudang;
		$data_db['id_wilayah_kelurahan'] = $id_wilayah_kelurahan;
		$data_db['deskripsi'] = trim($_POST['deskripsi'] ?? '');
		$data_db['default_gudang'] = $_POST['default_gudang'];

		if ($_POST['id']) {
			$this->db->table('gudang')->update($data_db, ['id_gudang' => $_POST['id']]);
		} else {
			$this->db->table('gudang')->insert($data_db);
		}

		$this->db->transComplete();

		if ($this->db->transStatus()) {
			$result['status'] = 'ok';
			$result['message'] = 'Data berhasil disimpan';
		} else {
			$result['status'] = 'error';
			$result['message'] = 'Data gagal disimpan';
		}

		return $result;
	}

	public function countAllData()
	{
		$sql = 'SELECT COUNT(DISTINCT id_gudang) AS jml FROM gudang';
		$result = $this->db->query($sql)->getRow();
		return $result->jml;
	}

	public function getListData()
	{

		$columns = $this->request->getPost('columns');

		// Search
		$where = ' WHERE 1=1 ';
		$search_all = @$this->request->getPost('search')['value'];
		if ($search_all) {
			foreach ($columns as $val) {

				if (strpos($val['data'], 'ignore_search') !== false)
					continue;

				if (strpos($val['data'], 'ignore') !== false)
					continue;

				$where_col[] = $val['data'] . ' LIKE "%' . $search_all . '%"';
			}
			$where .= ' AND (' . join(' OR ', $where_col) . ') ';
		}

		// Order		
		$order_data = $this->request->getPost('order');
		$order = '';
		if (@strpos($_POST['columns'][$order_data[0]['column']]['data'], 'ignore_search') === false) {
			$order_by = $columns[$order_data[0]['column']]['data'] . ' ' . strtoupper($order_data[0]['dir']);
			$order = ' ORDER BY ' . $order_by;
		}

		// Query Total Filtered
		$sql = 'SELECT COUNT(DISTINCT g.id_gudang) AS jml_data FROM gudang g
				LEFT JOIN wilayah_kelurahan wk USING(id_wilayah_kelurahan)
				LEFT JOIN wilayah_kecamatan wc USING(id_wilayah_kecamatan)
				LEFT JOIN wilayah_kabupaten wb USING(id_wilayah_kabupaten)
				LEFT JOIN wilayah_propinsi wp USING(id_wilayah_propinsi)
				' . $where;
		$total_filtered = $this->db->query($sql)->getRowArray()['jml_data'];

		// Query Data
		$start = $this->request->getPost('start') ?: 0;
		$length = $this->request->getPost('length') ?: 10;
		$sql = 'SELECT DISTINCT g.*, wb.nama_kabupaten AS nama_kabupaten FROM gudang g
				LEFT JOIN wilayah_kelurahan wk USING(id_wilayah_kelurahan)
				LEFT JOIN wilayah_kecamatan wc ON wk.id_wilayah_kecamatan = wc.id_wilayah_kecamatan
				LEFT JOIN wilayah_kabupaten wb ON wc.id_wilayah_kabupaten = wb.id_wilayah_kabupaten
				LEFT JOIN wilayah_propinsi wp ON wb.id_wilayah_propinsi = wp.id_wilayah_propinsi
				' . $where . $order  . ' LIMIT ' . $start . ', ' . $length;
		$data = $this->db->query($sql)->getResultArray();

		return ['data' => $data, 'total_filtered' => $total_filtered];
	}
}
