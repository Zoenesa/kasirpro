<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserToken extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `user_token` (
  `selector` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `action` enum('register','remember','recovery','activation') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('user_token', true);
    }
}
