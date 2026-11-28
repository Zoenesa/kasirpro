<?php
namespace App\Models;

class DashboardModel extends \App\Models\BaseModel
{
	public function __construct() {
		parent::__construct();
	}
	
	public function getListTahun() {
		$sql= 'SELECT YEAR(tgl_penjualan) AS tahun
				FROM penjualan
				GROUP BY tahun';
		$result = $this->db->query($sql)->getResultArray();
		return $result;
	}
	
	public function getTotalItemTerjual($tahun) 
	{
		$sql = 'SELECT jml, jml_prev, ROUND((jml - jml_prev)/ jml_prev * 100, 2) AS growth
				FROM (
					SELECT SUM(IF(tgl_penjualan LIKE "' . $tahun . '%", total_qty, NULL)) AS jml,
							SUM(IF(tgl_penjualan LIKE "' . ($tahun - 1) . '%", total_qty, NULL)) AS jml_prev	
					FROM penjualan_detail
					LEFT JOIN penjualan USING(id_penjualan)
					WHERE tgl_penjualan LIKE "' . $tahun . '%" OR tgl_penjualan LIKE "' . ($tahun - 1) . '%"
				) AS tabel';
	
		return $this->db->query($sql)->getRowArray();
	}
	
	public function getTotalJumlahTransaksi($tahun) 
	{
		$sql = 'SELECT jml, jml_prev, ROUND((jml - jml_prev)/ jml_prev * 100, 2) AS growth
				FROM (
					SELECT COUNT(IF(tgl_penjualan LIKE "' . $tahun . '%", id_penjualan, NULL)) AS jml,
							COUNT(IF(tgl_penjualan LIKE "' . ($tahun - 1) . '%", id_penjualan, NULL)) AS jml_prev
					FROM penjualan
					WHERE tgl_penjualan LIKE "' . $tahun . '%" OR tgl_penjualan LIKE "' . ($tahun - 1) . '%"
				) AS tabel';
		return $this->db->query($sql)->getRowArray();
	}
	
	public function getTotalNilaiPenjualan($tahun) {
		$sql = 'SELECT jml, jml_prev, ROUND((jml - jml_prev)/ jml_prev * 100, 2) AS growth
				FROM (
					SELECT SUM(IF(tgl_penjualan LIKE "' . $tahun . '%", neto, NULL)) AS jml,
							SUM(IF(tgl_penjualan LIKE "' . ($tahun - 1) . '%", neto, NULL)) AS jml_prev
					FROM penjualan
					WHERE tgl_penjualan LIKE "' . $tahun . '%" OR tgl_penjualan LIKE "' . ($tahun - 1) . '%"
				) AS tabel';
		return $this->db->query($sql)->getRowArray();
	}
	
	public function getTotalPelangganAktif($tahun) 
	{
		$sql = 'SELECT jml, jml_prev, ROUND( (jml-jml_prev) / jml_prev * 100 ) AS  growth, total FROM (
					SELECT COUNT(jml) AS jml, COUNT(jml_prev) AS jml_prev, (SELECT COUNT(*) FROM customer) AS total
					FROM (
						SELECT MAX(IF(tgl_penjualan LIKE "' . $tahun . '%", 1, NULL)) AS jml,
								MAX(IF(tgl_penjualan LIKE "' . ( $tahun - 1 ) . '%", 1, NULL)) AS jml_prev
						 FROM penjualan
						WHERE tgl_penjualan LIKE "' . $tahun . '%" OR tgl_penjualan LIKE "' . ($tahun - 1) . '%"
						GROUP BY id_customer
					) AS tabel
				) tabel_utama';
				
		return $this->db->query($sql)->getRowArray();
	}
			
	public function getSeriesPenjualan($list_tahun) {
		
		$result = [];
		foreach ($list_tahun as $tahun) {
			$sql = 'SELECT MONTH(tgl_penjualan) AS bulan, SUM(neto) AS total
					FROM penjualan
					WHERE tgl_penjualan >= ? AND tgl_penjualan < ?
					GROUP BY MONTH(tgl_penjualan)';
			
			$start_date = $tahun . '-01-01 00:00:00';
			$end_date = ($tahun + 1) . '-01-01 00:00:00';
			$monthly_data = array_fill(1, 12, 0);
			$monthly_sales = $this->db->query($sql, [$start_date, $end_date])->getResultArray();
			foreach ($monthly_sales as $sale) {
				$monthly_data[(int) $sale['bulan']] = (float) $sale['total'];
			}

			$result[$tahun] = [];
			foreach ($monthly_data as $month => $total) {
				$result[$tahun][] = ['bulan' => $month, 'total' => $total];
			}
		}
		return $result;
	}
	
	public function getSeriesTotalPenjualan($list_tahun) {
		
		$result = [];
		foreach ($list_tahun as $tahun) {
			$sql = 'SELECT COALESCE(SUM(neto), 0) AS total
					FROM penjualan
					WHERE tgl_penjualan >= ? AND tgl_penjualan < ?';

			$start_date = $tahun . '-01-01 00:00:00';
			$end_date = ($tahun + 1) . '-01-01 00:00:00';
			$result[$tahun] = $this->db->query($sql, [$start_date, $end_date])->getResultArray();
		}
		return $result;
	}
	
	public function getPiutangTerbesar () {
		$sql = 'SELECT p.id_customer, c.foto, c.nama_customer, SUM(p.kurang_bayar) AS total_kurang_bayar 
				FROM penjualan p
				LEFT JOIN customer c USING(id_customer)
				WHERE p.status = "kurang_bayar"
				GROUP BY p.id_customer, c.foto, c.nama_customer
				ORDER BY total_kurang_bayar DESC
				LIMIT 5';
		return $this->db->query($sql)->getResultArray();
	}
	
	public function getPembelianPelangganTerbesar ($tahun) {
		$sql = 'SELECT p.id_customer, c.foto, c.nama_customer, SUM(p.neto) AS total_harga 
				FROM penjualan p
				LEFT JOIN customer c USING(id_customer)
				WHERE YEAR(p.tgl_penjualan) = ' . $tahun . '
				GROUP BY p.id_customer, c.foto, c.nama_customer
				ORDER BY total_harga DESC
				LIMIT 5';
		return $this->db->query($sql)->getResultArray();
	}
	
	public function getItemTerjual($tahun) {
		$sql = 'SELECT pd.id_barang, b.nama_barang, COUNT(pd.id_barang) AS jml
				FROM penjualan_detail pd
				LEFT JOIN penjualan p USING(id_penjualan)
				LEFT JOIN barang b USING(id_barang)
				WHERE p.tgl_penjualan >= "' . $tahun . '-01-01" AND p.tgl_penjualan <= "' . $tahun . '-12-31"
				GROUP BY pd.id_barang, b.nama_barang
				ORDER BY jml DESC LIMIT 5';
				
        $result = $this->db->query($sql)->getResultArray();
		return $result;
	}
	
	public function getKategoriTerjual($tahun) {
		$sql = 'SELECT bk.id_barang_kategori, bk.nama_kategori, COUNT(pd.id_barang) AS jml, SUM(pd.harga_neto) AS nilai
				FROM penjualan_detail pd
				LEFT JOIN penjualan p USING(id_penjualan)
				LEFT JOIN barang b USING(id_barang)
				LEFT JOIN barang_kategori bk ON b.id_barang_kategori = bk.id_barang_kategori
				WHERE p.tgl_penjualan >= "' . $tahun . '-01-01" AND p.tgl_penjualan <= "' . $tahun . '-12-31"
				GROUP BY bk.id_barang_kategori, bk.nama_kategori
				ORDER BY nilai DESC LIMIT 5';
				
        $result = $this->db->query($sql)->getResultArray();
		return $result;
	}
		
	public function getItemTerbaru() {
		$sql = 'SELECT barang.id_barang, barang.nama_barang, barang.tgl_input,
				(SELECT bh.harga FROM barang_harga AS bh
					INNER JOIN jenis_harga AS jh USING(id_jenis_harga)
					WHERE bh.id_barang = barang.id_barang
						AND bh.jenis = "harga_jual"
						AND jh.default_harga = "Y"
					ORDER BY bh.tgl_input DESC LIMIT 1) AS harga_jual,
				file_picker.nama_file, file_picker.meta_file
				FROM barang
				LEFT JOIN (SELECT id_barang, id_file_picker FROM barang_image WHERE urut = 1) AS barang_image USING(id_barang)
				LEFT JOIN file_picker USING(id_file_picker)
				ORDER BY barang.tgl_input DESC, barang.id_barang DESC LIMIT 5';
		return $this->db->query($sql)->getResultArray();
	}
	
	public function penjualanTerbaru($tahun) {
		$sql = 'SELECT c.nama_customer, SUM(pd.qty) AS jml_barang, MAX(p.neto) AS total_harga, p.tgl_invoice, MAX(p.tgl_penjualan) AS tgl_penjualan, p.kurang_bayar, p.status
				FROM penjualan p
				LEFT JOIN penjualan_detail pd USING(id_penjualan)
				LEFT JOIN customer c USING(id_customer)
				WHERE p.tgl_penjualan LIKE "' . $tahun . '%"
				GROUP BY p.id_penjualan, c.nama_customer, p.tgl_invoice, p.kurang_bayar, p.status
				ORDER BY tgl_penjualan DESC LIMIT 50';
		
		return $this->db->query($sql)->getResultArray();
		
	}
	
	public function countAllDataPejualanTerbesar($tahun) {
		$sql = 'SELECT COUNT(*) as jml
				FROM (SELECT id_barang FROM penjualan_detail
					LEFT JOIN penjualan USING(id_penjualan)
					WHERE tgl_penjualan >= "' . $tahun . '-01-01" AND tgl_penjualan <= "' . $tahun . '-12-31"
					GROUP BY id_barang) AS tabel';
				
		$result = $this->db->query($sql)->getRow();
		return $result->jml;
	}
	
	public function getListDataPenjualanTerbesar($tahun) {

		$columns = $this->request->getPost('columns');

		// Search
		$where = ' WHERE 1=1 ';
		$search_all = @$this->request->getPost('search')['value'];
		if ($search_all) {

			foreach ($columns as $val) {
				
				if (strpos($val['data'], 'ignore') !== false)
					continue;
				
				$where_col[] = $val['data'] . ' LIKE "%' . $search_all . '%"';
			}
			 $where .= ' AND (' . join(' OR ', $where_col) . ') ';
		}
		
		// Order		
		$order_data = $this->request->getPost('order');
		$order = '';
		if (strpos($_POST['columns'][$order_data[0]['column']]['data'], 'ignore_search') === false) {
			$order_by = $columns[$order_data[0]['column']]['data'] . ' ' . strtoupper($order_data[0]['dir']);
			$order = ' ORDER BY ' . $order_by;
		}

		// Query Total Filtered
		$sql = '
				SELECT COUNT(*) AS jml_data
				FROM (
					SELECT pd.id_barang, b.nama_barang
					FROM penjualan_detail pd
					LEFT JOIN penjualan p USING(id_penjualan)
					LEFT JOIN barang b USING(id_barang)
					WHERE p.tgl_penjualan >= "' . $tahun . '-01-01" AND p.tgl_penjualan <= "' . $tahun . '-12-31"
					GROUP BY pd.id_barang, b.nama_barang
				) AS grouped_data
				' . $where;
				
		$total_filtered = $this->db->query($sql)->getRowArray()['jml_data'];
		
		// Query Data
		$start = $this->request->getPost('start') ?: 0;
		$length = $this->request->getPost('length') ?: 10;
		$sql = '
				SELECT * FROM (
					SELECT pd.id_barang, b.nama_barang, MAX(pd.harga_satuan) AS harga_satuan,
						COUNT(pd.id_barang) AS jml_terjual,
						SUM(pd.harga_neto) AS total_harga,
						(SELECT SUM(pd2.harga_neto)
						 FROM penjualan_detail pd2
						 LEFT JOIN penjualan p2 USING(id_penjualan)
						 WHERE p2.tgl_penjualan >= "' . $tahun . '-01-01" AND p2.tgl_penjualan <= "' . $tahun . '-12-31") AS total_penjualan
					FROM penjualan_detail pd
					LEFT JOIN penjualan p USING(id_penjualan)
					LEFT JOIN barang b USING(id_barang)
					WHERE p.tgl_penjualan >= "' . $tahun . '-01-01" AND p.tgl_penjualan <= "' . $tahun . '-12-31"
					GROUP BY pd.id_barang, b.nama_barang
				) AS tabel
				' . $where . $order . ' LIMIT ' . $start . ', ' . $length;

		$sql = 'SELECT *, ROUND(total_harga / NULLIF(total_penjualan, 0) * 100, 0) AS kontribusi FROM (' . $sql . ') AS tabel_utama';

		$data = $this->db->query($sql)->getResultArray();
				
		return ['data' => $data, 'total_filtered' => $total_filtered];
	}
	
	// Penjualan
	public function countAllDataPenjualanTempo($setting_piutang) {
			
		$sql = 'SELECT COUNT(*) AS jml 
				FROM penjualan AS tabel 
				WHERE jenis_bayar = "tempo" 
					AND status = "kurang_bayar" 
					AND  tgl_invoice >= ? 
					AND tgl_invoice <= ?
					' . $this->setWhereJatuhTempo($setting_piutang) . '
				';
		$result = $this->db->query($sql, [$_GET['start_date'], $_GET['end_date']])->getRow();
		return $result->jml;
	}
	
	public function getListPenjualanTempo($setting_piutang) 
	{

		$columns = $this->request->getPost('columns');

		// Search
		$search_all = @$this->request->getPost('search')['value'];
		$where = ' WHERE jenis_bayar = "tempo" AND status = "kurang_bayar" AND  tgl_invoice >= ? AND tgl_invoice <= ? ';
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
		
		// Query Total Filtered
		$sql = 'SELECT COUNT(*) AS jml FROM penjualan 
				LEFT JOIN customer USING(id_customer)
				' . $where . ( $this->setWhereJatuhTempo($setting_piutang) );
		$data = $this->db->query($sql, [$_GET['start_date'], $_GET['end_date']])->getRowArray();
		$total_filtered = $data['jml'];
		
		// Order
		$order_data = $this->request->getPost('order');
		$order = '';
		if (strpos($_POST['columns'][$order_data[0]['column']]['data'], 'ignore_search') === false) {
			$order_by = $columns[$order_data[0]['column']]['data'] . ' ' . strtoupper($order_data[0]['dir']);
			$order = ' ORDER BY ' . $order_by;
		}

		$start = $this->request->getPost('start') ?: 0;
		$length = $this->request->getPost('length') ?: 10;
		
		// Query Data
		$sql = 'SELECT * FROM penjualan 
				LEFT JOIN customer USING(id_customer)
				' . $where . ( $this->setWhereJatuhTempo($setting_piutang) ) . $order . ' LIMIT ' . $start . ', ' . $length;
		$data = $this->db->query($sql, [$_GET['start_date'], $_GET['end_date']])->getResultArray();
		
		// Query Total
		$sql = 'SELECT SUM(total_qty) AS total_qty, SUM(neto) AS total_neto 
				FROM penjualan 
				LEFT JOIN customer USING(id_customer)
				' . $where . ( $this->setWhereJatuhTempo($setting_piutang) );

		$total = $this->db->query($sql, [$_GET['start_date'], $_GET['end_date']])->getRowArray();
		if (!$total) {
			$total = ['total_qty' => 0, 'total_neto' => 0];
		}
		
		foreach ($data as &$val) {
			$val['total'] = $total;
		}
	
		return ['data' => $data, 'total_filtered' => $total_filtered];
	}
	
	private function setWhereJatuhTempo($setting_piutang) {
		$where_jatuh_tempo = '';
		if (!empty($_GET['jatuh_tempo'])) {
			$jatuh_tempo = $_GET['jatuh_tempo'];
			if ($jatuh_tempo == 'akan_jatuh_tempo') {
				$where_jatuh_tempo = ' AND tgl_penjualan < DATEDIFF(NOW(), tgl_penjualan) > ' . ( $setting_piutang['piutang_periode'] - $setting_piutang['notifikasi_periode']) . ' AND DATEDIFF(NOW(), tgl_penjualan) <= ' . $setting_piutang['piutang_periode'];
			} else if ($jatuh_tempo = 'lewat_jatuh_tempo'){
				$where_jatuh_tempo = ' AND tgl_penjualan < DATE_SUB(NOW(), INTERVAL ' . $setting_piutang['piutang_periode'] . ' DAY)';
			}
		}
		return $where_jatuh_tempo;
	}

	public function GetBarangMingguIni(){
		$custom_date = strtotime(date('Y-m-d', time())); 
		$week_start = date('Y-m-d', strtotime('this week monday', $custom_date));
		$week_end = date('Y-m-d', strtotime('this week sunday', $custom_date));
		$arr = Array('2026-11-26', '2026-11-26');
		// $arr = Array($week_start, $week_end);
		$result = $this->db->query('CALL ViewPenjualanMingguan(?,?)', $arr)->getResultArray();
		return $result;
	}
		
	public function getBarangHarian(){
		$custom_date = strtotime(date('Y-m-d', time())); 
		$week_start = date('Y-m-d', strtotime('this week monday', $custom_date));
		$week_end = date('Y-m-d', strtotime('this week sunday', $custom_date));
		// $arr = Array($week_start, $week_start);
		$arr = Array('2026-11-27', '2026-11-28');
		$sql = $this->db->query('CALL getBarangHarian(?,?)', $arr);
		$result['data'] = $sql->getResultArray();
		$result['field'] = $sql->getFieldNames();
		return $result;
	}

	public function GetTotalTransaksiMingguIni(){
		$result = $this->db->query('CALL getBarangHarian')->getNumRows();
		return json_encode($result);
	}

}