<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisHarga extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `jenis_harga` (
  `id_jenis_harga` smallint(5) UNSIGNED NOT NULL,
  `nama_jenis_harga` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `default_harga` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('jenis_harga', true);
    }
}
