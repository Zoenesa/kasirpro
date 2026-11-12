<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangKategori extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `barang_kategori` (
    `id_barang_kategori` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `id_parent` smallint(5) UNSIGNED DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `new` enum('Y','N') NOT NULL,
    `urut` tinyint(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id_barang_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Tabel menu aplikasi' ROW_FORMAT=COMPACT;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('barang_kategori', true);
    }
}
