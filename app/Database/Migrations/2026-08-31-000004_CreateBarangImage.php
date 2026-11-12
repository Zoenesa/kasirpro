<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangImage extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `barang_image` (
  `id_barang` int(10) UNSIGNED NOT NULL,
  `id_file_picker` int(10) UNSIGNED NOT NULL,
    `urut` tinyint(3) UNSIGNED NOT NULL,
    PRIMARY KEY (`id_barang`, `id_file_picker`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('barang_image', true);
    }
}
