<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransferBarangDetailSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `transfer_barang_detail` (`id_transfer_barang_detail`, `id_transfer_barang`, `id_barang`, `harga_satuan`, `qty_transfer`, `harga_total_transfer`, `diskon_jenis_transfer`, `diskon_nilai_transfer`, `diskon_transfer`, `harga_neto_transfer`) VALUES
(1, 1, 8, 12600, 11, 138600, '%', 2, 2772, 135828),
(2, 1, 3, 12500, 14, 175000, 'rp', 7500, 7500, 167500),
(3, 1, 2, 33000, 13, 429000, '%', 1, 4290, 424710),
(10, 3, 39, 10000, 255, 5000000, '%', 0, 0, 5000000);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
