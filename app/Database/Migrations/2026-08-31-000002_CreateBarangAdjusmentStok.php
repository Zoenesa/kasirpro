<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangAdjusmentStok extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `barang_adjusment_stok` (
    `id_barang_stok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_barang` int(10) UNSIGNED DEFAULT NULL,
  `id_gudang` smallint(5) UNSIGNED DEFAULT NULL,
  `adjusment_stok` smallint(5) DEFAULT NULL,
  `tgl_adjusment_stok` date DEFAULT NULL,
  `tgl_input` datetime DEFAULT current_timestamp(),
  `id_user_input` int(10) UNSIGNED DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
    `id_user_update` int(10) UNSIGNED DEFAULT NULL,
    PRIMARY KEY (`id_barang_stok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('barang_adjusment_stok', true);
    }
}
