<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWilayahPropinsi extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `wilayah_propinsi` (
  `id_wilayah_propinsi` int(11) UNSIGNED NOT NULL,
  `nama_propinsi` varchar(100) DEFAULT NULL,
  `ibukota` varchar(100) DEFAULT NULL,
  `p_bsni` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('wilayah_propinsi', true);
    }
}
