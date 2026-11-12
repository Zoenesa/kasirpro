<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateModulePermission extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `module_permission` (
  `id_module_permission` smallint(5) UNSIGNED NOT NULL,
  `id_module` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `nama_permission` varchar(50) NOT NULL,
  `judul_permission` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('module_permission', true);
    }
}
