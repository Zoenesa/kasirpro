<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenjualanBayar extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `penjualan_bayar` (
  `id_penjualan_bayar` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(10) UNSIGNED DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jml_bayar` int(10) UNSIGNED DEFAULT NULL,
  `metode_bayar` enum('tunai','transfer') DEFAULT 'transfer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('penjualan_bayar', true);
    }
}
