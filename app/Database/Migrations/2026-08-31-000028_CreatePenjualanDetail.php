<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenjualanDetail extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(10) UNSIGNED DEFAULT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_pokok` int(10) UNSIGNED NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `qty` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `qty_pengali` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `harga_total` int(10) UNSIGNED NOT NULL,
  `diskon_jenis` enum('%','rp') NOT NULL,
  `diskon_nilai` int(10) UNSIGNED NOT NULL,
  `diskon` int(10) UNSIGNED NOT NULL,
  `harga_neto` int(10) UNSIGNED NOT NULL,
  `harga_pokok_total` int(10) UNSIGNED NOT NULL,
  `untung_rugi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('penjualan_detail', true);
    }
}
