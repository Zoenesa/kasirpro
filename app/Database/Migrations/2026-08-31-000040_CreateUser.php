<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) DEFAULT NULL,
  `default_page_type` enum('url','id_module','id_role') DEFAULT NULL,
  `default_page_url` varchar(50) DEFAULT NULL,
  `default_page_id_module` smallint(5) UNSIGNED DEFAULT NULL,
  `default_page_id_role` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabel user untuk login' ROW_FORMAT=COMPACT;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('user', true);
    }
}
