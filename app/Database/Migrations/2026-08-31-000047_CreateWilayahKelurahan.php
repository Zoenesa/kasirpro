<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWilayahKelurahan extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `wilayah_kelurahan` (
  `id_wilayah_kelurahan` int(11) UNSIGNED NOT NULL,
  `id_wilayah_kecamatan` int(11) UNSIGNED NOT NULL,
  `nama_kelurahan` varchar(100) DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('wilayah_kelurahan', true);
    }
}
