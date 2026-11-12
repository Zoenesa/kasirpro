<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenjualanReturDokumen extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `penjualan_retur_dokumen` (
  `id_penjualan_retur` int(10) UNSIGNED NOT NULL,
  `id_file_picker` int(10) UNSIGNED NOT NULL,
  `urut` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('penjualan_retur_dokumen', true);
    }
}
