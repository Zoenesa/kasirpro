<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PembelianReturSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `pembelian_retur` (`id_pembelian_retur`, `id_pembelian`, `no_squence`, `no_nota_retur`, `tgl_nota_retur`, `total_qty_retur`, `sub_total_retur`, `total_diskon_item_retur`, `diskon_jenis`, `diskon_nilai`, `penyesuaian`, `neto_retur`, `id_user_input`, `tgl_input`, `id_user_update`, `tgl_update`) VALUES
(1, 1, 00000001, '000001/NR/CO/2022', '2022-09-05', 8, 84362, 5013, '%', 2, -6000, 76675, 1, '2022-09-02 22:27:01', 1, '2022-10-15 14:21:33');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
