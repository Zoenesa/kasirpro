<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `user_role` (`id_user`, `id_role`) VALUES
(1, 1),
(4, 4),
(5, 5);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
