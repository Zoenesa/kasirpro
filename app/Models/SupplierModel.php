<?php

/**
 * App		: Pos Kasir Pro
 * Author	: Team Cepat Online
 * Year		: 2021-2022
 * Website	: cepatonline.com
 */

namespace App\Models;

class SupplierModel extends \App\Models\BaseModel
{
	public function __construct()
	{
		parent::__construct();
	}

	public function deleteData()
	{
		$result = $this->db->table('supplier')->delete(['id_supplier' => $_POST['id']]);
		return $result;
	}

	public function getBarangSupplierById($id)
	{
		$sql = 'SELECT * FROM supplier 
				LEFT JOIN wilayah_kelurahan USING(id_wilayah_kelurahan) 
				LEFT JOIN wilayah_kecamatan USING(id_wilayah_kecamatan)
				LEFT JOIN wilayah_kabupaten USING(id_wilayah_kabupaten)
				LEFT JOIN wilayah_propinsi USING(id_wilayah_propinsi)
				WHERE id_supplier = ?';
		$result = $this->db->query($sql, trim($id))->getRowArray();
		return $result;
	}

	public function saveData()
	{
		$data_db['nama_supplier'] = preg_replace('/\s+/', ' ', trim($_POST['nama_supplier'] ?? ''));
		$data_db['alamat_supplier'] = preg_replace('/\s+/', ' ', trim($_POST['alamat_supplier'] ?? ''));
		$data_db['no_telp'] = trim($_POST['no_telp'] ?? '');
		$data_db['id_wilayah_kelurahan'] = $_POST['id_wilayah_kelurahan'] ?? null;

		$current_id = !empty($_POST['id']) ? (int) $_POST['id'] : null;
		$duplicateBuilder = $this->db->table('supplier')
			->where('TRIM(LOWER(REPLACE(REPLACE(nama_supplier, CHAR(13), ""), CHAR(10), ""))) =', strtolower($data_db['nama_supplier']))
			->where('TRIM(LOWER(REPLACE(REPLACE(alamat_supplier, CHAR(13), ""), CHAR(10), ""))) =', strtolower($data_db['alamat_supplier']));

		if ($current_id) {
			$duplicateBuilder->where('id_supplier !=', $current_id);
		}

		$existing = $duplicateBuilder->get()->getRowArray();
		if ($existing) {
			return ['msg' => ['status' => 'error', 'content' => 'Supplier dengan nama dan alamat yang sama sudah ada.']];
		}

		if ($current_id) {
			$query = $this->db->table('supplier')->update($data_db, ['id_supplier' => $current_id]);
		} else {
			$query = $this->db->table('supplier')->insert($data_db);
		}

		if ($query) {
			$result['msg']['status'] = 'ok';
			$result['msg']['content'] = 'Data berhasil disimpan';
		} else {
			$result['msg']['status'] = 'error';
			$result['msg']['content'] = 'Data gagal disimpan';
		}

		return $result;
	}

	public function countAllData($where)
	{
		$sql = 'SELECT COUNT(DISTINCT supplier.id_supplier) AS jml FROM supplier' . $where;
		$result = $this->db->query($sql)->getRow();
		return $result->jml;
	}

	public function getListData($where)
	{

		$columns = $this->request->getPost('columns');

		// Search
		$search_all = @$this->request->getPost('search')['value'];
		if ($search_all) {
			// Additional Search

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
		$start = $this->request->getPost('start') ?: 0;
		$length = $this->request->getPost('length') ?: 10;

		$order_data = $this->request->getPost('order');
		$order = '';

		if (!empty($_POST) && strpos($_POST['columns'][$order_data[0]['column']]['data'], 'ignore_search') === false) {
			$order_by = $columns[$order_data[0]['column']]['data'] . ' ' . strtoupper($order_data[0]['dir']);
			$order = 'ORDER BY ' . $order_by . ' LIMIT ' . $start . ', ' . $length;
		}

		// Query Total Filtered
		// $sql = 'SELECT COUNT(*) AS jml_data FROM dokter ' . $where;
		$sql = 'SELECT COUNT(DISTINCT supplier.id_supplier) AS jml_data FROM supplier 
				LEFT JOIN wilayah_kelurahan USING(id_wilayah_kelurahan) 
				LEFT JOIN wilayah_kecamatan USING(id_wilayah_kecamatan)
				LEFT JOIN wilayah_kabupaten USING(id_wilayah_kabupaten)
				LEFT JOIN wilayah_propinsi USING(id_wilayah_propinsi)
				' . $where;

		$query = $this->db->query($sql)->getRowArray();
		$total_filtered = $query['jml_data'];


		// Query Data
		$sql = 'SELECT DISTINCT supplier.id_supplier, supplier.*, wilayah_kelurahan.*, wilayah_kecamatan.*, wilayah_kabupaten.*, wilayah_propinsi.*
				FROM supplier 
				LEFT JOIN wilayah_kelurahan USING(id_wilayah_kelurahan) 
				LEFT JOIN wilayah_kecamatan USING(id_wilayah_kecamatan)
				LEFT JOIN wilayah_kabupaten USING(id_wilayah_kabupaten)
				LEFT JOIN wilayah_propinsi USING(id_wilayah_propinsi)
				' . $where . $order;

		$data = $this->db->query($sql)->getResultArray();

		return ['data' => $data, 'total_filtered' => $total_filtered];
	}
}
