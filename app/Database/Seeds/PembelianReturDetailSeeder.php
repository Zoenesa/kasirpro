<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PembelianReturDetailSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `pembelian_retur_detail` (`id_pembelian_retur`, `id_pembelian_detail`, `qty_retur`, `harga_total_retur`, `diskon_jenis_retur`, `diskon_nilai_retur`, `diskon_retur`, `harga_neto_retur`) VALUES
(1, 3, 5, 55625, 'rp', 4000, 4000, 51625),
(1, 4, 3, 33750, '%', 3, 1013, 32737);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
