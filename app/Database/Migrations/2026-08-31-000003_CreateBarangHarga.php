<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangHarga extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `barang_harga` (
    `id_barang_harga` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `id_jenis_harga` smallint(5) UNSIGNED DEFAULT NULL,
  `harga` int(10) UNSIGNED DEFAULT NULL,
  `jenis` enum('harga_jual','harga_pokok') DEFAULT NULL,
  `tgl_input` datetime DEFAULT current_timestamp(),
  `id_user_input` int(10) UNSIGNED DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
    `id_user_update` int(11) UNSIGNED DEFAULT NULL,
    PRIMARY KEY (`id_barang_harga`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('barang_harga', true);
    }
}
