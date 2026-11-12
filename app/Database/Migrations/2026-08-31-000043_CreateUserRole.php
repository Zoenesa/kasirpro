<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserRole extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `user_role` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_role` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabel yang berisi role yang dimili oleh masing masing user' ROW_FORMAT=COMPACT;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('user_role', true);
    }
}
