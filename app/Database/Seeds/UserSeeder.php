<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `user` (`id_user`, `email`, `username`, `nama`, `password`, `verified`, `status`, `created`, `avatar`, `default_page_type`, `default_page_url`, `default_page_id_module`, `default_page_id_role`) VALUES
(1, 'mukhlishidayat30@gmail.com', 'superadmin', 'Mukhlis Hidayat', '\$2y\$10\$abfWvp0kKBlPzCfnentPgOwX2gRRYkBx.vrk40KBAKHBOi/uZQQkC', 1, 1, '2018-09-20 16:04:35', 'icon-128x128.png', 'id_module', '', 46, NULL),
(4, 'kasir@gmail.com', 'kasir', 'Putri', '\$2y\$10\$P1Ar1VVM1CsP/.qQztgj8uIUlQl9fYyFnbA7ro.bGwEgtNDn2bR5O', 1, 1, '2022-10-09 09:22:54', NULL, 'id_module', '', 70, NULL),
(5, 'admin@gmail.com', 'admin', 'admin', '\$2y\$10\$UMkaZ1D3BaFzJ3.DBdrMSuUmmJ1mAsCkG4CTi6FPJ91ZtD/7aL2LC', 1, 1, '2024-01-10 13:45:47', NULL, 'id_module', '', 46, NULL);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
