<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateModuleStatus extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `module_status` (
  `id_module_status` tinyint(1) NOT NULL,
  `nama_status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabel status modul, seperti: aktif, non aktif, dalam perbaikan' ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('module_status', true);
    }
}
