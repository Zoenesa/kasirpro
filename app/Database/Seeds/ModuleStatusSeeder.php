<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ModuleStatusSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `module_status` (`id_module_status`, `nama_status`, `keterangan`) VALUES
(1, 'Aktif', NULL),
(2, 'Tidak Aktif', NULL),
(3, 'Dalam Perbaikan', 'Hanya role developer yang dapat mengakses module dengan status ini');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
