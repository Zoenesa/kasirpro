<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenjualan extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `penjualan` (
    `id_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `id_gudang` smallint(5) UNSIGNED DEFAULT NULL,
  `no_squence` mediumint(6) UNSIGNED ZEROFILL NOT NULL DEFAULT 000000,
  `no_invoice` varchar(255) DEFAULT NULL,
  `tgl_invoice` date DEFAULT NULL,
  `id_jenis_harga` smallint(5) UNSIGNED DEFAULT NULL,
  `tgl_penjualan` datetime NOT NULL DEFAULT current_timestamp(),
  `total_qty` decimal(10,2) UNSIGNED DEFAULT NULL,
  `total_diskon_item` int(11) UNSIGNED NOT NULL,
  `diskon_jenis` enum('%','rp') NOT NULL,
  `diskon_nilai` int(10) UNSIGNED NOT NULL,
  `diskon` int(10) UNSIGNED NOT NULL,
  `total_diskon` int(10) UNSIGNED NOT NULL,
  `sub_total` int(10) UNSIGNED NOT NULL,
  `penyesuaian` int(11) NOT NULL,
  `pajak_display_text` varchar(255) DEFAULT NULL,
  `pajak_persen` tinyint(4) NOT NULL DEFAULT 0,
  `pajak_nilai` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `neto` int(10) UNSIGNED NOT NULL,
  `total_bayar` int(10) UNSIGNED NOT NULL,
  `kembali` int(10) UNSIGNED NOT NULL,
  `kurang_bayar` int(10) NOT NULL COMMENT 'Nilai negatif menunjukkan lebih bayar',
  `jenis_bayar` enum('tunai','transfer','tempo') DEFAULT NULL,
  `status` enum('lunas','kurang_bayar','lebih_bayar') NOT NULL,
  `harga_pokok` int(10) UNSIGNED NOT NULL,
  `untung_rugi` int(11) NOT NULL,
  `id_user_input` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user_update` int(10) UNSIGNED DEFAULT NULL,
    `tgl_update` datetime DEFAULT NULL,
    PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('penjualan', true);
    }
}
