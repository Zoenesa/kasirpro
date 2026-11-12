<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuRole extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `menu_role` (
  `id_menu` smallint(5) UNSIGNED NOT NULL,
  `id_role` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabel hak akses dari menu aplikasi' ROW_FORMAT=COMPACT;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('menu_role', true);
    }
}
