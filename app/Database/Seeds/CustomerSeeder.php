<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`, `id_wilayah_kelurahan`, `no_telp`, `email`, `foto`) VALUES
(1, 'CV. Bangunan Sejahtera', 'Jl. Susukan 8', 26154, '-', 'bangunans.s@gmail.com', 'sejahtera.png'),
(2, 'Toko Parabot Makmur', 'Jl. Pisang Raya No 116', 29076, '0210235036', 'p.makmur@gmail.com', 'aman_jaya.png'),
(3, 'CV. Baja Ringan Utama', 'jl. sawangan utara rt 15 rw 17', 25296, '0855727888', 'bajaringanutama@gmail.com', 'santosa_jaya.png'),
(4, 'Fikri Ardian', 'Jln Sudirman 4 No 5', 25453, '085654654666', 'prawoto.hadi@gmail.com', 'agus_prawoto.png'),
(5, 'PT. Amanah Listrik', 'Jl. H. Iman No 76 Rt07 Rw 05', 25954, '086547898885', 'Amanah.listrik@yahoo.com', 'sukses_jaya.png'),
(6, 'PT. Budi Jaya Nusantara', 'Jl. Kemerdekaan No. 225', 40749, '0813222333', 'budi.jaya.nusantara@yopmail.com', 'budi_jaya_nusantara.png'),
(7, 'CV. Sukses Bersama', 'Jl. Sido Asih VI', 25785, '-', 'sukses.bersama@yopmail.com', 'sukses_bersama.png'),
(8, 'Toko Anak Mandiri', 'Jl. bubuaranmanca V No. 21', 25959, '-', 'anakmandiri@gmail.com.com', 'teguh_abadi.png'),
(9, 'PT. Mainan Anak Utama', 'Jl. Batu Asah no 06', 25250, '-', 'Mainan.anakutama@yahoo.com', 'bintang_bersinar.png'),
(10, 'CV. Rizki Sentosa', 'JL. Tegal Beriman 9', 26593, '-', 'rizki.sentosa@gmail.com', 'rizki_sentosa.png'),
(11, 'Toko Baju Merdeka', 'Jl. Kadu Nunggul 66', 25950, '-', 'baju.merdeka@gmail.com', 'ramai.png'),
(12, 'Toko Bintang makmur', 'Jl. Sudirman No. 88', 31379, '-', 'bintang.makmur@yopmail.com', 'sinar_sejahtera.png');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
