<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoleModulePermission extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `role_module_permission` (
  `id_role` smallint(5) UNSIGNED NOT NULL,
  `id_module_permission` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('role_module_permission', true);
    }
}
