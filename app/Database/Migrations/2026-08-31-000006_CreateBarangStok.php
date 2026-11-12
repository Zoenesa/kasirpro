<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangStok extends Migration
{
    public function up(): void
    {
        $this->db->query(<<<'SQL'
CREATE TABLE `barang_stok` (
`id_barang` int(10) unsigned
,`stok` decimal(33,0)
);
SQL);
    }

    public function down(): void
    {
        $this->forge->dropTable('barang_stok', true);
    }
}
