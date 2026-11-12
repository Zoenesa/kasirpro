<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GudangSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `gudang` (`id_gudang`, `nama_gudang`, `alamat_gudang`, `id_wilayah_kelurahan`, `deskripsi`, `default_gudang`) VALUES
(1, 'Gudang Semarang (utama)', 'Jl. Kemerdekaan II No. 17', 39903, 'Gudang Utama', 'Y'),
(2, 'Gudang Solo', 'Jl. Nusantara No. 170', 39943, 'Gudang Solo (Surakarta)', 'N');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
