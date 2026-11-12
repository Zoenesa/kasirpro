<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembelianBayar extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `pembelian_bayar` (
  `id_pembelian_bayar` int(10) UNSIGNED NOT NULL,
  `id_pembelian` int(10) UNSIGNED DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jml_bayar` int(10) UNSIGNED DEFAULT NULL,
  `id_user_bayar` int(10) UNSIGNED DEFAULT NULL COMMENT 'Approval'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('pembelian_bayar', true);
    }
}
