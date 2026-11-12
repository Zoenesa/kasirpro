<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`) VALUES
(3, 'CV. Usaha Makmur'),
(1, 'PT. Digitama'),
(2, 'PT. Pasir Putih');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
