<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenjualanReturDokumenSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `penjualan_retur_dokumen` (`id_penjualan_retur`, `id_file_picker`, `urut`) VALUES
(1, 0, 1),
(2, 1, 2),
(2, 20, 1);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
