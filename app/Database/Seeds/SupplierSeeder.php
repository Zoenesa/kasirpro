<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `id_wilayah_kelurahan`, `email`, `no_telp`) VALUES
(1, 'PT Jaya Abadi Makmur', 'Komplek Pergudangan Sentral Blok F4\\r\\n', 40748, 'bhakti_cahayasih@yopmail.com', '6544541551541'),
(2, 'PT Anugerah Bersama', 'Komplek Industri Mangga Dua Blok E3', 25799, '', '658444581222'),
(3, 'Distributor Sentosa Utama', 'Jl. Diponegoro No. 32', 12640, '', '781125345214'),
(4, 'CV Sejahtera Baru', 'Jl. Jenderal Sudirman No. 30\\r\\n', 40248, '', '5346545614351'),
(5, 'Distributor Berkat Mulia', 'Jl. Raya Barat No. 15\\r\\n', 40490, '', '6855423332.02.0'),
(6, 'Toko Bintang Elektronik', 'Jl. A. Yani No. 78', 48678, '', '688545666655'),
(7, 'PT Cahaya Jaya Abadi', 'Jl. Purnawarman No. 45', 25235, '', '6548888885'),
(8, 'CV Maju Terus', 'Jl. Sudirman No. 10', 25800, '', '5556854545'),
(9, 'Toko Sinar Harapan', 'Jl. Gatot Subroto No. 25', 25308, '', '56688555666'),
(10, 'CV Sejahtera Makmur', 'Komplek Perkantoran Harapan Baru Blok C2', 25513, '', '685554444');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
