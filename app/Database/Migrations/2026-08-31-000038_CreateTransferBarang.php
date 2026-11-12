<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransferBarang extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `transfer_barang` (
  `id_transfer_barang` int(10) UNSIGNED NOT NULL,
  `id_gudang_asal` smallint(5) UNSIGNED DEFAULT NULL,
  `id_gudang_tujuan` smallint(5) UNSIGNED DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `no_squence` mediumint(6) UNSIGNED ZEROFILL NOT NULL DEFAULT 000000,
  `no_nota_transfer` varchar(255) DEFAULT NULL,
  `tgl_nota_transfer` date DEFAULT NULL,
  `id_jenis_harga_transfer` smallint(5) UNSIGNED DEFAULT NULL,
  `sub_total_transfer` int(10) UNSIGNED NOT NULL,
  `diskon_jenis_transfer` enum('%','rp') NOT NULL,
  `diskon_nilai_transfer` int(10) UNSIGNED NOT NULL,
  `penyesuaian_transfer` int(11) NOT NULL,
  `total_qty_transfer` int(11) UNSIGNED DEFAULT NULL,
  `total_diskon_item_transfer` int(11) UNSIGNED NOT NULL,
  `neto_transfer` int(10) UNSIGNED NOT NULL,
  `id_user_input` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user_update` int(10) UNSIGNED DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('transfer_barang', true);
    }
}
