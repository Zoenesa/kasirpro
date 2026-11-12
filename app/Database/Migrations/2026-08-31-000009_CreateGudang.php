<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGudang extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `gudang` (
  `id_gudang` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_gudang` varchar(50) DEFAULT NULL,
  `alamat_gudang` text DEFAULT NULL,
  `id_wilayah_kelurahan` int(10) UNSIGNED DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `default_gudang` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_gudang`),
  UNIQUE KEY `unique_gudang_name_address_location` (`nama_gudang`(50), `alamat_gudang`(255), `id_wilayah_kelurahan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('gudang', true);
    }
}
