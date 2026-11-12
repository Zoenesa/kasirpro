<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `role` (`id_role`, `nama_role`, `judul_role`, `keterangan`, `id_module`) VALUES
(1, 'admin', 'Administrator', 'Administrator', 46),
(4, 'kasir', 'Kasir', 'Kasir', NULL),
(5, 'Demo Admin', 'Demo admin', 'Hak akses administrator standar', 46);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
