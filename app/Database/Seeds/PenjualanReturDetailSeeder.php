<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenjualanReturDetailSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `penjualan_retur_detail` (`id_penjualan_retur`, `id_penjualan_detail`, `qty_retur`, `harga_total_retur`, `diskon_jenis_retur`, `diskon_nilai_retur`, `diskon_retur`, `harga_neto_retur`) VALUES
(1, 6, 2, 1800, '%', 1, 18, 1782),
(1, 7, 4, 26800, 'rp', 2000, 2000, 24800),
(1, 8, 3, 29100, '%', 1, 291, 28809),
(1, 9, 5, 11500, 'rp', 1000, 1000, 10500),
(2, 2, 2, 24200, '%', 2, 484, 23716),
(2, 3, 1, 32500, 'rp', 2000, 2000, 30500);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
