<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembelianRetur extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `pembelian_retur` (
  `id_pembelian_retur` int(10) UNSIGNED NOT NULL,
  `id_pembelian` int(10) UNSIGNED DEFAULT NULL,
  `no_squence` mediumint(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `no_nota_retur` varchar(255) DEFAULT NULL,
  `tgl_nota_retur` date DEFAULT NULL,
  `total_qty_retur` int(11) UNSIGNED DEFAULT NULL,
  `sub_total_retur` int(10) UNSIGNED NOT NULL,
  `total_diskon_item_retur` int(11) UNSIGNED NOT NULL,
  `diskon_jenis` enum('%','rp') NOT NULL,
  `diskon_nilai` int(10) UNSIGNED NOT NULL,
  `penyesuaian` int(10) NOT NULL,
  `neto_retur` int(10) NOT NULL,
  `id_user_input` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user_update` int(10) UNSIGNED DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('pembelian_retur', true);
    }
}
