<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembelianDetail extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `pembelian_detail` (
  `id_pembelian_detail` int(10) UNSIGNED NOT NULL,
  `id_pembelian` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `qty` smallint(5) UNSIGNED DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `harga_satuan` int(10) UNSIGNED DEFAULT NULL,
  `harga_neto` int(10) UNSIGNED DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('pembelian_detail', true);
    }
}
