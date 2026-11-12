<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `module` (`id_module`, `nama_module`, `judul_module`, `id_module_status`, `login`, `deskripsi`) VALUES
(1, 'builtin/menu', 'Menu Manager', 1, 'Y', 'Administrasi Menu'),
(2, 'builtin/module', 'Module Manager', 1, 'Y', 'Pengaturan Module'),
(4, 'builtin/role', 'Role Manager', 1, 'Y', 'Pengaturan Role'),
(5, 'builtin/user', 'User Manager', 1, 'Y', 'Pengaturan user'),
(6, 'login', 'Login', 1, 'R', 'Login ke akun Anda'),
(7, 'builtin/user-role', 'Assign Role ke User', 1, 'Y', 'Assign role ke user'),
(8, 'builtin/menu-role', 'Menu - Role', 1, 'Y', 'Assign role ke menu'),
(15, 'builtin/setting-layout', 'Setting Layout', 1, 'Y', 'Setting Layout Aplikasi'),
(16, 'builtin/setting-app', 'Setting App', 1, 'Y', 'Pengaturan aplikasi seperti nama aplikasi, logo, d'),
(33, 'register', 'Register Akun', 1, 'R', 'Register Akun'),
(34, 'builtin/setting-registrasi', 'Setting Registrasi Akun', 1, 'Y', 'Setting Registrasi Akun'),
(35, 'recovery', 'Reset Password', 1, 'R', 'Reset Password'),
(39, 'filepicker', 'File Picker', 1, 'Y', 'File Picker Manager'),
(44, 'wilayah', 'Wilayah', 1, 'Y', 'Wilayah'),
(46, 'dashboard', 'Dashboard', 1, 'Y', 'Dashboard'),
(51, 'builtin/permission', 'Permission', 1, 'Y', 'Permission'),
(52, 'builtin/role-permission', 'Role Permission', 1, 'Y', 'Role Permission'),
(53, 'barang-kategori', 'Kategori Barang', 1, 'Y', 'Kategori Barang'),
(54, 'jenis-harga', 'Jenis Harga', 1, 'Y', 'Jenis Harga'),
(55, 'gudang', 'Gudang', 1, 'Y', 'Gudang'),
(56, 'barang', 'Barang', 1, 'Y', 'Barang'),
(57, 'supplier', 'Supplier', 1, 'Y', 'Supplier'),
(58, 'pembelian', 'Pembelian', 1, 'Y', 'Pembelian'),
(59, 'penjualan', 'Penjualan', 1, 'Y', 'Penjualan'),
(60, 'customer', 'Customer', 1, 'Y', 'Customer'),
(61, 'barcode-cetak', 'Cetak Barcode', 1, 'Y', 'Cetak Barcode'),
(62, 'penjualan-retur', 'Retur Penjualan', 1, 'Y', 'Retur Penjualan'),
(63, 'pembelian-retur', 'Retur Pembelian', 1, 'Y', 'Retur Pembelian'),
(64, 'setting-invoice', 'Setting Invoice', 1, 'Y', 'Setting Invoice'),
(65, 'identitas', 'Identitas', 1, 'Y', 'Identitas'),
(66, 'unit', 'Unit', 1, 'Y', 'Unit'),
(67, 'transfer-barang', 'Transfer Barang', 1, 'Y', 'Transfer Barang'),
(68, 'laporan-penjualan-perinvoice', 'Laporan Penjualan Per Invoice', 1, 'Y', 'Laporan Penjualan Per Invoice'),
(69, 'penjualan-peritem', 'Penjualan Per Item', 1, 'Y', 'Penjualan Per Item'),
(70, 'pos-kasir', 'POS Kasir', 1, 'Y', 'POS Kasir'),
(71, 'penjualan-mobile', 'Penjualan Mobile', 1, 'Y', 'Penjualan dengan tampilan mobile'),
(72, 'barang-mobile', 'Barang Mobile', 1, 'Y', 'Barang Mobile'),
(73, 'setting-pajak', 'Setting Pajak', 1, 'Y', 'Setting Pajak'),
(74, 'penjualan-tempo', 'Penjualan Tempo', 1, 'Y', 'Penjualan dengan pembayaran tempo'),
(75, 'setting-notifikasi-piutang', 'Setting Notifikasi Piutang', 1, 'Y', 'Setting Notifikasi Piutang'),
(76, 'setting-kasir', 'Setting Kasir', 1, 'Y', 'Setting Kasir'),
(77, 'setting-notifikasi-stok', 'Setting Notifikasi Stok', 1, 'Y', 'Setting Notifikasi Stok'),
(78, 'backup-database', 'Backup Database', 1, 'Y', 'Backup Database'),
(79, 'pembelian-perinvoice', 'Pembelian Perinvoice', 1, 'Y', 'Pembelian Perinvoice');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
