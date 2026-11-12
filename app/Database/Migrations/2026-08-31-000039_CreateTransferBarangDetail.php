<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransferBarangDetail extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `transfer_barang_detail` (
  `id_transfer_barang_detail` int(10) UNSIGNED NOT NULL,
  `id_transfer_barang` int(10) UNSIGNED DEFAULT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `qty_transfer` tinyint(3) UNSIGNED NOT NULL,
  `harga_total_transfer` int(10) UNSIGNED NOT NULL,
  `diskon_jenis_transfer` enum('%','rp') NOT NULL,
  `diskon_nilai_transfer` int(10) UNSIGNED NOT NULL,
  `diskon_transfer` int(10) UNSIGNED NOT NULL,
  `harga_neto_transfer` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('transfer_barang_detail', true);
    }
}
