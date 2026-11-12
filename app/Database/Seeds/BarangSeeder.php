<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `deskripsi`, `id_satuan_unit`, `berat`, `id_barang_kategori`, `barcode`, `stok_minimum`, `tgl_daluarsa`, `tgl_input`, `id_user_input`, `tgl_edit`, `id_user_edit`) VALUES
(1, 'BODEB', 'Blackout Karakter Doraemon Bintang Biru', 'Blackout Karakter Doraemon Bintang Biru', 3, 900, 10, '8998225800043', 150, NULL, NULL, NULL, '2024-02-04 23:06:28', 1),
(2, 'HOOK-MERAK', 'Merak Tirai Kait Tiebacks Tali Rumbai Coklat', 'Merak Tirai Kait Tiebacks Tali Rumbai Coklat', 3, 400, 11, '8993496001076', 150, NULL, NULL, NULL, '2024-02-04 23:15:33', 1),
(3, 'hoodie-with-logo-2', 'Hoodie With Logo Premum Biru Muda', 'Hoodie With Logo Premum Biru Muda', 3, 1000, 5, '8995177102058', 150, NULL, '2022-08-17 07:11:54', 1, '2024-02-04 23:11:32', 1),
(8, 'POLO2', 'Polo Katun Lengan Pendek Biru Muda', 'Polo Katun Lengan Pendek Biru Muda', 3, 500, 6, '8995177101112', 170, NULL, '2022-08-17 07:24:00', 1, '2024-02-04 23:16:36', 1),
(9, 'BEANIEO', 'Bright Orange Atlantic Watch Cap / Beanie', 'Bright Orange Atlantic Watch Cap / Beanie', 3, 400, 7, '8998866200325', 150, NULL, '2022-08-17 07:30:37', 1, '2024-02-04 23:07:11', 1),
(10, 'C1164', 'Celana Panjang Jeans Denim Pria', 'Celana Panjang Jeans Denim Pria', 3, 800, 6, '8998866201568', 150, NULL, '2022-08-17 08:19:45', 1, '2024-02-04 23:08:34', 1),
(11, 'PENSIL', 'Joyko Pensil Warna 24 Warna', 'Joyko Pensil Warna 24 Warna', 3, 100, 15, '8998009010620', 120, NULL, '2022-08-17 10:27:30', 1, '2024-02-04 23:14:04', 1),
(12, 'long-sleeve-tee-2', 'Long Sleeve Tee Katun Hijau Muda', 'Long Sleeve Tee Katun Hijau Muda', 3, 300, 6, '8993007000215', 150, NULL, '2022-08-17 10:30:27', 1, '2024-02-04 23:15:21', 1),
(13, 'LBG2024', 'Laptop Buying Guide (2024) Limited', 'Laptop Buying Guide (2024) Limited', 3, 3000, 14, '8993053131130', 150, NULL, '2022-08-17 10:35:00', 1, '2024-02-04 23:14:56', 1),
(14, 'PROMAX', 'Smartphone i14-PRO-MAX 6.8', 'Smartphone i14-PRO-MAX 6.8', 3, 1000, 4, '8992759170580', 50, NULL, '2022-08-17 10:38:10', 1, '2024-02-04 23:17:44', 1),
(15, 'TRDP', 'Tas Ransel Downtown Premium', 'Tas Ransel Downtown Premium', 3, 800, 15, '8992745326755', 150, NULL, '2022-08-17 10:41:13', 1, '2024-02-04 23:18:31', 1),
(16, 'WANGIWANITA', 'Minyak Wangi Wanita Berkualitas', 'Minyak Wangi Wanita Berkualitas', 3, 500, 12, '8998866805506', 150, NULL, '2022-10-07 20:36:20', 1, '2024-02-04 23:15:40', 1),
(17, 'vneck-tee-2', 'vneck-tee-2 Lengan Pendek Abu-Abu', 'vneck-tee-2 Lengan Pendek Abu-Abu', 3, 400, 6, '8993560025120', 150, NULL, '2022-10-08 04:36:35', 1, '2024-02-04 23:18:50', 1),
(18, 'vneck-tee-2', 'vneck-tee-2 Lengan Pendek Orange', 'vneck-tee-2 Lengan Pendek Orange', 3, 400, 5, '8993560024451', 150, '2025-11-18', '2022-10-08 04:39:06', 1, '2024-02-04 23:19:14', 1),
(19, 'CUSSONS', 'Cussons Kids Hair Body Cologne Parfum', 'Cussons Kids Hair Body Cologne Parfum', 3, 500, 12, '8998866602921', 150, '2024-02-09', '2022-10-08 11:03:47', 1, '2024-02-08 12:51:42', 1),
(20, 'PB31', 'Buy Nutrifresh PB31 400W Blender', 'Buy Nutrifresh PB31 400W Blender', 3, 5000, 3, '8993560033347', 150, NULL, '2022-10-08 15:38:50', 1, '2024-02-04 23:07:35', 1),
(21, 'PARFUMPRIA212', 'Parfum Pria 100 ML Aroma 212 Sexy Men', 'Parfum Pria 100 ML Aroma 212 Sexy Men', 3, 400, 12, '8899886680813', 150, NULL, '2022-10-08 15:43:34', 1, '2024-02-04 23:15:46', 1),
(22, 'ER-116', 'Eraser Penghapus Joyko ER-116', 'Eraser Penghapus Joyko ER-116', 3, 200, 7, '8993560027537', 150, NULL, '2022-10-08 15:47:30', 1, '2024-02-04 23:09:34', 1),
(23, 'XZTK', 'XZT Kalkulator Mini Pocket Portabel', 'XZT Kalkulator Mini Pocket Portabel', 3, 100, 15, '8998898101409', 150, NULL, '2022-10-08 15:51:50', 1, '2024-02-04 23:19:36', 1),
(24, 'hoodie-with-zipper-2', 'Hoodie With Zipper Premum Biru Muda', 'Hoodie With Zipper Premum Biru Muda', 3, 700, 5, '8993560033798', 150, NULL, '2022-10-08 16:03:45', 1, '2024-02-04 23:12:05', 1),
(25, 'BEANIEB', 'Beanie Hat Kupluk Lipat Biru Muda', 'Beanie Hat Kupluk Lipat Biru Muda', 3, 1000, 6, '8992826111072', 150, NULL, '2022-10-08 16:58:48', 1, '2024-02-04 23:06:00', 1),
(26, 'KCHITAM', 'Kacamata Hitam fashion Premium', 'Kacamata Hitam fashion Premium', 3, 100, 7, '8993058301200', 150, NULL, '2022-10-08 17:02:27', 1, '2024-02-04 23:14:24', 1),
(27, 'SABUK', 'Ikat Pinggang Kulit Buaya Coklat', 'Ikat Pinggang Kulit Buaya Coklat', 3, 200, 7, '8992858617900', 150, NULL, '2022-10-08 17:06:26', 1, '2024-02-04 23:13:39', 1),
(28, 'TOPI', 'Reebok Active Foundation Badge Men\\'s Cap Cream', 'Reebok Active Foundation Badge Men\\'s Cap Cream\\r\\n', 3, 85, 7, '8998866200813', 150, NULL, '2022-10-08 17:10:31', 1, '2024-02-04 23:16:55', 1),
(29, 'HOODE2', 'Sunset Surf Womens Hoodie - Red', 'Sunset Surf Womens Hoodie - Red\\r\\n', 3, 85, 5, '8998866200844', 150, NULL, '2022-10-08 17:19:48', 1, '2024-02-04 23:18:07', 1),
(30, 'CB201', 'Allegra Blender CB201 (Black)', 'Allegra Blender CB201 (Black)\\r\\n', 3, 50, 3, '8998898280401', 150, NULL, '2022-10-08 17:27:57', 1, '2024-02-04 23:05:22', 1);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
