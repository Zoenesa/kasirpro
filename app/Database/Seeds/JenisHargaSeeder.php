<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisHargaSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `jenis_harga` (`id_jenis_harga`, `nama_jenis_harga`, `deskripsi`, `default_harga`) VALUES
(1, 'Default', 'Harga barang default', 'Y'),
(2, 'Grosir', 'Harga grosir', 'N'),
(3, 'Member VIP', 'Harga untuk member VIP', 'N');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
