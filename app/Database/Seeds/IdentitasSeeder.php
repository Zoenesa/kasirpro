<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IdentitasSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `identitas` (`nama`, `alamat`, `id_wilayah_kelurahan`, `email`, `no_telp`, `url_website`) VALUES
('Cepat Online', 'Jl. Kampung Karet. 19', 26531, 'admin@cepatonline.com', '085174334016', 'https://cepatonline.com');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
