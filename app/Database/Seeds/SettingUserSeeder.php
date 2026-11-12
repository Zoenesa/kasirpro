<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingUserSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `setting_user` (`id_user`, `type`, `param`) VALUES
(3, 'layout', '{\\\"color_scheme\\\":\\\"purple\\\",\\\"sidebar_color\\\":\\\"dark\\\",\\\"bootswatch_theme\\\":\\\"pulse\\\",\\\"logo_background_color\\\":\\\"dark\\\",\\\"font_family\\\":\\\"poppins\\\",\\\"font_size\\\":\\\"14.5\\\"}');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
