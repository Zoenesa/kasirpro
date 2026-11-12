<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembelian extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `pembelian` (
  `id_pembelian` int(10) UNSIGNED NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `tgl_invoice` date NOT NULL,
  `tgl_jatuh_tempo` date DEFAULT NULL,
  `terima_barang` enum('Y','N') NOT NULL,
  `tgl_terima_barang` date DEFAULT NULL,
  `id_user_terima` int(10) UNSIGNED DEFAULT NULL,
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `id_gudang` smallint(5) UNSIGNED NOT NULL,
  `sub_total` int(10) UNSIGNED NOT NULL,
  `diskon` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `total_bayar` int(10) UNSIGNED NOT NULL,
  `kurang_bayar` int(10) UNSIGNED NOT NULL,
  `status` enum('Lunas','Belum Lunas') DEFAULT 'Belum Lunas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('pembelian', true);
    }
}
