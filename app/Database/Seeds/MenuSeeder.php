<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `menu` (`id_menu`, `nama_menu`, `id_menu_kategori`, `class`, `url`, `id_module`, `id_parent`, `aktif`, `new`, `urut`) VALUES
(1, 'User', 1, 'fas fa-users', 'builtin/user', 5, 2, 1, 0, 4),
(2, 'Assign Role', 1, 'fas fa-link', '#', NULL, 67, 1, 0, 4),
(3, 'User Role', 1, 'fas fa-user-tag', 'builtin/user-role', 7, 2, 1, 0, 5),
(4, 'Module', 1, 'fas fa-network-wired', 'builtin/module', 2, 67, 1, 0, 2),
(6, 'Menu', 1, 'fas fa-folder-tree', 'builtin/menu', 1, 67, 1, 0, 1),
(7, 'Menu Role', 1, 'fas fa-folder-minus', 'builtin/menu-role', 8, 2, 1, 0, 2),
(8, 'Setting', 1, 'fas fa-cogs', '#', NULL, 67, 1, 0, 5),
(9, 'Role', 1, 'fas fa-briefcase', 'builtin/role', 4, 2, 1, 0, 1),
(10, 'Setting Applikasi', 1, 'fas fa-cog', 'builtin/setting-app', 16, 8, 1, 0, 1),
(11, 'Setting Layout', 1, 'fas fa-brush', 'builtin/setting-layout', 15, 8, 1, 0, 2),
(23, 'Setting Registrasi', 1, 'fas fa-user-plus', 'builtin/setting-registrasi', 34, 8, 1, 0, 3),
(36, 'Dashboard', 6, 'fas fa-tachometer-alt', 'dashboard', 46, NULL, 1, 0, 1),
(38, 'Module Permission', 1, 'fas fa-shield-alt', 'builtin/permission', 51, 67, 1, 0, 3),
(39, 'Role Permission', 1, 'far fa-user', 'builtin/role-permission', 52, 2, 1, 0, 3),
(41, 'Jenis Harga', 6, 'fas fa-clipboard-list', 'jenis-harga', 54, 66, 1, 0, 1),
(42, 'List Gudang', 6, 'far fa-building', 'gudang', 55, 63, 1, 0, 1),
(43, 'Barang', 6, 'fas fa-box', 'barang', 56, 65, 1, 0, 1),
(44, 'Supplier', 6, 'fas fa-truck', 'supplier', 57, 75, 1, 0, 1),
(45, 'Daftar Pembelian', 6, 'fas fa-tasks', 'pembelian', 58, 64, 1, 0, 1),
(46, 'Kategori', 6, 'far fa-folder', 'barang-kategori', 53, 65, 1, 0, 3),
(47, 'Penjualan', 6, 'far fa-money-bill-alt', 'penjualan', 59, 62, 1, 0, 1),
(48, 'Customer', 6, 'fas fa-users', 'customer', 60, 75, 1, 0, 2),
(49, 'Cetak Barcode', 6, 'fas fa-barcode', 'barcode-cetak', 61, 65, 1, 0, 2),
(50, 'Retur Penjualan', 6, 'fas fa-long-arrow-alt-right', 'penjualan-retur', 62, 62, 1, 0, 2),
(51, 'Retur Pembelian', 6, 'fas fa-long-arrow-alt-left', 'pembelian-retur', 63, 64, 1, 0, 2),
(52, 'Dokumen Transaksi', 6, 'fas fa-cog', 'setting-invoice', 64, 66, 1, 0, 2),
(53, 'Setting Invoice', 6, 'far fa-address-card', 'identitas', 65, 66, 1, 0, 3),
(54, 'Unit', 6, 'fas fa-ruler-horizontal', 'unit', 66, 65, 1, 0, 4),
(55, 'Transfer Barang', 6, 'fas fa-exchange-alt', 'transfer-barang', 67, 63, 0, 0, 2),
(56, 'Penjualan Per Tanggal', 6, 'fas fa-chart-line', 'laporan-penjualan-perinvoice', 68, 76, 1, 0, 1),
(57, 'Penjualan Per Item', 6, 'fas fa-box-open', 'penjualan-peritem', 69, 76, 1, 0, 3),
(58, 'Kasir', 6, 'fas fa-calculator', 'pos-kasir', 70, 60, 1, 0, 1),
(59, 'Penjualan', 6, 'fas fa-receipt', 'penjualan-mobile', 71, 60, 1, 0, 2),
(60, 'Kasir / POS', 6, 'fas fa-cash-register', '#', NULL, NULL, 1, 0, 4),
(61, 'Update Stok', 6, 'fas fa-box-open', 'barang-mobile', 72, 60, 1, 0, 3),
(62, 'Penjualan', 6, 'fas fa-luggage-cart', '#', NULL, NULL, 1, 0, 5),
(63, 'Gudang', 6, 'fas fa-building', '#', NULL, NULL, 1, 0, 7),
(64, 'Pembelian', 6, 'fas fa-shopping-bag', '#', NULL, NULL, 1, 0, 6),
(65, 'Produk', 6, 'fas fa-clipboard-list', '#', NULL, NULL, 1, 0, 3),
(66, 'Pengaturan Bisnis', 6, 'fas fa-cogs', '#', NULL, NULL, 1, 0, 8),
(67, 'Pengaturan Aplikasi', 1, 'far fa-sun', '#', NULL, NULL, 1, 0, 1),
(68, 'Setting Pajak', 6, 'fas fa-dollar-sign', 'setting-pajak', 73, 66, 1, 0, 4),
(69, 'Penjualan Tempo', 6, 'fas fa-tasks', 'penjualan-tempo', 74, 76, 1, 0, 2),
(70, 'Notifikasi Piutang', 6, 'far fa-bell', 'setting-notifikasi-piutang', 75, 66, 1, 0, 5),
(71, 'Setting Kasir', 6, 'fas fa-toolbox', 'setting-kasir', 76, 66, 1, 0, 7),
(72, 'Notifikasi Stok', 6, 'far fa-bell', 'setting-notifikasi-stok', 77, 66, 1, 0, 6),
(73, 'Backup Database', 6, 'fas fa-server', 'backup-database', 78, NULL, 1, 0, 10),
(74, 'Pembelian Per Invoice', 6, 'fas fa-file-lines', 'pembelian-perinvoice', 79, 76, 1, 0, 4),
(75, 'Kontak', 6, 'fas fa-address-card', '#', NULL, NULL, 1, 0, 2),
(76, 'Laporan', 6, 'fas fa-book', '#', NULL, NULL, 1, 0, 9);"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
