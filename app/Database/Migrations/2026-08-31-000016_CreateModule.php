<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateModule extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `module` (
  `id_module` smallint(5) UNSIGNED NOT NULL,
  `nama_module` varchar(50) DEFAULT NULL,
  `judul_module` varchar(50) DEFAULT NULL,
  `id_module_status` tinyint(1) DEFAULT NULL,
  `login` enum('Y','N','R') NOT NULL DEFAULT 'Y',
  `deskripsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabel modul aplikasi' ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('module', true);
    }
}
