<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangKategoriSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `barang_kategori` (`id_barang_kategori`, `nama_kategori`, `deskripsi`, `icon`, `id_parent`, `aktif`, `new`, `urut`) VALUES
(1, 'Fashion', 'Fashion wanita dan perempuan', 'fas fa-shirt', NULL, 'Y', 'Y', 1),
(2, 'Elektronik', 'Elektronik', 'fas fa-plug-circle-plus', NULL, 'Y', 'Y', 2),
(3, 'Blender', 'Blender', 'fas fa-kitchen-set', 2, 'Y', 'Y', 2),
(4, 'Handphone', 'Handphone', 'fas fa-mobile-screen', 2, 'Y', 'Y', 1),
(5, 'Pakaian Wanita', 'Pakaian Wanita', 'fas fa-person-dress', 1, 'Y', 'Y', 1),
(6, 'Pakaian Laki-laki', 'Pakaian Laki-laki', 'fas fa-person', 1, 'Y', 'Y', 2),
(7, 'Aksesories', 'Aksesories', 'fas fa-box-tissue', NULL, 'Y', 'Y', 4),
(8, 'Mesis', 'Aneka Mesis', 'fas fa-bread-slice', 1, 'Y', 'Y', 3),
(9, 'Furniture', 'Furniture', 'fas fa-couch', NULL, 'Y', 'Y', 3),
(10, 'Gorden', 'Gorden', 'fas fa-rainbow', 9, 'Y', 'Y', 1),
(11, 'Aksesoris Gorden', 'Aksesoris Gorden', 'fas fa-soap', 9, 'Y', 'Y', 2),
(12, 'Kecantikan & Kesehatan', 'Kecantikan', 'fas fa-pills', NULL, 'Y', 'Y', 5),
(14, 'Laptop', 'Laptop', 'fas fa-chalkboard', 2, 'Y', 'Y', 3),
(15, 'Alat Sekolah', 'Alat Sekolah', 'fas fa-graduation-cap', NULL, 'Y', 'Y', 6);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
