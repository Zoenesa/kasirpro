<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenjualanReturSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `penjualan_retur` (`id_penjualan_retur`, `id_penjualan`, `no_nota_retur`, `tgl_nota_retur`, `total_qty_retur`, `sub_total_retur`, `total_diskon_item_retur`, `diskon_jenis_retur`, `diskon_nilai_retur`, `penyesuaian_retur`, `neto_retur`, `id_user_input`, `tgl_input`, `id_user_update`, `tgl_update`) VALUES
(1, 3, '000011/NR/AJ/2022', '2022-02-23', 14, 65891, 3309, '%', 1, -5000, 60232, 1, '2022-08-30 22:01:35', 1, '2022-10-15 18:15:49'),
(2, 1, '000001/NR/SJ/2022', '2022-09-14', 3, 54216, 2484, '%', 1, 400, 54074, 1, '2022-09-03 11:18:12', NULL, NULL);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
