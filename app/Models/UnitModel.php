<?php

/**
 * App		: Pos Kasir Pro
 * Author	: Team Cepat Online
 * Year		: 2021-2022
 * Website	: cepatonline.com
 */

namespace App\Models;

class UnitModel extends \App\Models\BaseModel
{
	public function deleteData()
	{
		$delete = $this->db->table('satuan_unit')->delete(['id_satuan_unit' => $_POST['id']]);
		if ($delete) {
			$result['status'] = 'ok';
			$result['message'] = 'Data berhasil dihapus';
		} else {
			$result['status'] = 'error';
			$result['message'] = 'Data gagal dihapus';
		}
		return $result;
	}

	public function getUnitById($id)
	{
		$sql = 'SELECT * FROM satuan_unit WHERE id_satuan_unit = ?';
		$result = $this->db->query($sql, trim($id))->getRowArray();
		return $result;
	}

	public function saveData()
	{
		$data_db['nama_satuan'] = preg_replace('/\s+/', ' ', trim($_POST['nama_satuan'] ?? ''));
		$data_db['satuan'] = preg_replace('/\s+/', ' ', trim($_POST['satuan'] ?? ''));
		$data_db['keterangan'] = trim($_POST['keterangan'] ?? '');

		$current_id = !empty($_POST['id']) ? (int) $_POST['id'] : null;
		$duplicateBuilder = $this->db->table('satuan_unit')
			->where('TRIM(LOWER(REPLACE(REPLACE(nama_satuan, CHAR(13), ""), CHAR(10), ""))) =', strtolower($data_db['nama_satuan']))
			->where('TRIM(LOWER(REPLACE(REPLACE(satuan, CHAR(13), ""), CHAR(10), ""))) =', strtolower($data_db['satuan']));

		if ($current_id) {
			$duplicateBuilder->where('id_satuan_unit !=', $current_id);
		}

		$existing = $duplicateBuilder->get()->getRowArray();
		if ($existing) {
			return ['status' => 'error', 'message' => 'Satuan unit dengan nama dan kode yang sama sudah ada.'];
		}

		if ($current_id) {
			$query = $this->db->table('satuan_unit')->update($data_db, ['id_satuan_unit' => $current_id]);
		} else {
			$query =  $this->db->table('satuan_unit')->insert($data_db);
		}

		if ($query) {
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
		$sql = 'SELECT COUNT(DISTINCT id_satuan_unit) AS jml FROM satuan_unit';
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
		$sql = 'SELECT COUNT(DISTINCT id_satuan_unit) AS jml_data FROM satuan_unit ' . $where;
		$total_filtered = $this->db->query($sql)->getRowArray()['jml_data'];

		// Query Data
		$start = $this->request->getPost('start') ?: 0;
		$length = $this->request->getPost('length') ?: 10;
		$sql = 'SELECT DISTINCT * FROM satuan_unit 
				' . $where . $order  . ' LIMIT ' . $start . ', ' . $length;
		$data = $this->db->query($sql)->getResultArray();

		return ['data' => $data, 'total_filtered' => $total_filtered];
	}
}
