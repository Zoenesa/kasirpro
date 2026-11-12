<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomer extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `customer` (
  `id_customer` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(255) NOT NULL,
  `alamat_customer` varchar(255) NOT NULL,
  `id_wilayah_kelurahan` int(10) UNSIGNED DEFAULT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_customer`),
  UNIQUE KEY `unique_customer_name_address` (`nama_customer`, `alamat_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('customer', true);
    }
}
