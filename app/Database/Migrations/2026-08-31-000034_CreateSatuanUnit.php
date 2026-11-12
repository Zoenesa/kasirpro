<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSatuanUnit extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `satuan_unit` (
  `id_satuan_unit` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(50) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_satuan_unit`),
  UNIQUE KEY `unique_satuan_unit_name_code` (`nama_satuan`, `satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('satuan_unit', true);
    }
}
