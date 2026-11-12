<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `kategori` (`id_kategori`, `judul_kategori`) VALUES
(1, 'PHP Tutorial'),
(2, 'MySQL Tutorial'),
(3, 'Web Development');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
