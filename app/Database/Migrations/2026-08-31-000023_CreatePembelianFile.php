<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembelianFile extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `pembelian_file` (
  `id_pembelian` int(10) UNSIGNED NOT NULL,
  `id_file_picker` int(10) UNSIGNED NOT NULL,
  `urut` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('pembelian_file', true);
    }
}
