<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingUser extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `setting_user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT '',
  `param` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('setting_user', true);
    }
}
