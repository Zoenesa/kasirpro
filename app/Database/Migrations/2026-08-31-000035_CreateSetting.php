<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSetting extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `setting` (
  `type` varchar(50) NOT NULL,
  `param` varchar(255) NOT NULL,
  `value` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('setting', true);
    }
}
