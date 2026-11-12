<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangImageSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `barang_image` (`id_barang`, `id_file_picker`, `urut`) VALUES
(1, 78, 1),
(2, 55, 1),
(3, 62, 1),
(8, 73, 1),
(9, 59, 1),
(10, 67, 1),
(11, 72, 1),
(12, 69, 1),
(13, 63, 1),
(14, 79, 1),
(15, 54, 1),
(16, 66, 1),
(17, 75, 1),
(18, 76, 1),
(19, 60, 1),
(20, 70, 1),
(21, 71, 1),
(22, 68, 1),
(23, 77, 1),
(24, 64, 1),
(25, 62, 1),
(26, 74, 1),
(27, 58, 1),
(28, 59, 1),
(29, 61, 1),
(30, 70, 1);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
