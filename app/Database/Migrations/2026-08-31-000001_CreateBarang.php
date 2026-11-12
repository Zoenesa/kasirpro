<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarang extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `barang` (
    `id_barang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_satuan_unit` smallint(5) UNSIGNED DEFAULT NULL,
  `berat` smallint(5) UNSIGNED DEFAULT NULL,
  `id_barang_kategori` smallint(5) UNSIGNED DEFAULT NULL,
  `barcode` char(13) DEFAULT NULL,
  `stok_minimum` smallint(5) UNSIGNED DEFAULT 0,
  `tgl_daluarsa` date DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `id_user_input` int(10) UNSIGNED DEFAULT NULL,
  `tgl_edit` datetime DEFAULT NULL,
    `id_user_edit` int(10) UNSIGNED DEFAULT NULL,
    PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('barang', true);
    }
}
