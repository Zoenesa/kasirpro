<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PembelianFileSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `pembelian_file` (`id_pembelian`, `id_file_picker`, `urut`) VALUES
(1, 9, 1),
(1, 18, 2),
(2, 11, 1),
(3, 11, 1);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
