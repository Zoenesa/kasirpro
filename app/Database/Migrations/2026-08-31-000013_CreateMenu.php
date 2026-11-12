<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenu extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `menu` (
  `id_menu` smallint(5) UNSIGNED NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `id_menu_kategori` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `class` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `id_module` smallint(5) UNSIGNED DEFAULT NULL,
  `id_parent` smallint(5) UNSIGNED DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `new` tinyint(1) NOT NULL DEFAULT 0,
  `urut` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabel menu aplikasi' ROW_FORMAT=COMPACT;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('menu', true);
    }
}
