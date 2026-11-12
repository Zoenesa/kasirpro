<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuKategori extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `menu_kategori` (
  `id_menu_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  `show_title` enum('Y','N') DEFAULT NULL,
  `urut` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('menu_kategori', true);
    }
}
