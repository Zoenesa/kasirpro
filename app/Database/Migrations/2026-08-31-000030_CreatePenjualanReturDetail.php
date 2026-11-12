<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenjualanReturDetail extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `penjualan_retur_detail` (
  `id_penjualan_retur` int(10) UNSIGNED NOT NULL,
  `id_penjualan_detail` int(10) UNSIGNED NOT NULL,
  `qty_retur` tinyint(3) UNSIGNED NOT NULL,
  `harga_total_retur` int(10) UNSIGNED NOT NULL,
  `diskon_jenis_retur` enum('%','rp') NOT NULL,
  `diskon_nilai_retur` int(10) UNSIGNED NOT NULL,
  `diskon_retur` int(10) UNSIGNED NOT NULL,
  `harga_neto_retur` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('penjualan_retur_detail', true);
    }
}
