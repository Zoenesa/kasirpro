<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserLoginActivityRef extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `user_login_activity_ref` (
  `id_activity` tinyint(4) UNSIGNED NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('user_login_activity_ref', true);
    }
}
