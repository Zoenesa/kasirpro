<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransferBarangSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `transfer_barang` (`id_transfer_barang`, `id_gudang_asal`, `id_gudang_tujuan`, `keterangan`, `no_squence`, `no_nota_transfer`, `tgl_nota_transfer`, `id_jenis_harga_transfer`, `sub_total_transfer`, `diskon_jenis_transfer`, `diskon_nilai_transfer`, `penyesuaian_transfer`, `total_qty_transfer`, `total_diskon_item_transfer`, `neto_transfer`, `id_user_input`, `tgl_input`, `id_user_update`, `tgl_update`) VALUES
(1, 1, 2, 'Permintaan stok dari gudang Solo', 000001, '000001/NT/CO/2022', '2022-09-05', 1, 728038, '%', 1, -70000, 38, 14562, 650758, 1, '2022-09-04 05:25:27', 1, '2022-09-04 10:30:25'),
(3, 1, 2, 'transfer Ayam 500ekor', 000001, '000001/NT/CO/2024', '2024-02-24', 1, 5000000, '%', 0, 0, 500, 0, 5000000, 1, '2024-02-24 21:00:27', 1, '2024-02-24 21:02:38');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
