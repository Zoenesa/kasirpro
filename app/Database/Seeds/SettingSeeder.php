<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `setting` (`type`, `param`, `value`) VALUES
('app', 'background_logo', 'transparent'),
('app', 'btn_login', 'btn-primary'),
('app', 'deskripsi_web', 'Kelola transaksi dengan mudah dan pantau laporan penjualan secara real-time'),
('app', 'favicon', 'favicon.png'),
('app', 'footer_app', '&copy; {{YEAR}} &lt;a href=&quot;https://cepatonline.com&quot; target=&quot;_blank&quot;&gt;Cepat Online&lt;/a&gt;'),
('app', 'footer_login', '&copy; {{YEAR}} &lt;a href=&quot;https://cepatonline.com&quot; target=&quot;_blank&quot;&gt;Cepat Online&lt;/a&gt;'),
('app', 'judul_web', 'Kasir Pro'),
('app', 'logo_app', 'logo_login_1.png'),
('app', 'logo_login', 'logo_login.png'),
('app', 'logo_register', 'logo_register.png'),
('invoice', 'footer_text', 'Terima kasih telah berbelanja di tempat kami. Kepuasan Anda adalah tujuan kami.'),
('invoice', 'jml_digit', '6'),
('invoice', 'logo', 'logo_invoice.jpg'),
('invoice', 'no_invoice', '{{nomor}}/INV/CO/{{tahun}}'),
('invoice', 'template_invoice', 'template_2'),
('kasir', 'bersihkan_form', 'setelah_cetak_nota'),
('kasir', 'item_layout', 'grid'),
('kasir', 'item_layout_grid_height', '127'),
('kasir', 'item_layout_grid_length', '12'),
('kasir', 'item_layout_grid_show_stok', 'Y'),
('kasir', 'item_layout_grid_width', '160'),
('kasir', 'qty_pengali', 'N'),
('kasir', 'qty_pengali_suffix', 'm'),
('kasir', 'qty_pengali_text', 'Panjang'),
('layout', 'bootswatch_theme', 'cosmo'),
('layout', 'color_scheme', 'blue'),
('layout', 'font_family', 'poppins'),
('layout', 'font_size', '14.5'),
('layout', 'logo_background_color', 'default'),
('layout', 'sidebar_color', 'blue'),
('nota_retur', 'jml_digit', '6'),
('nota_retur', 'no_nota_retur', '{{nomor}}/NR/CO/{{tahun}}'),
('nota_transfer', 'jml_digit', '6'),
('nota_transfer', 'no_nota_transfer', '{{nomor}}/NT/CO/{{tahun}}'),
('pajak', 'display_text', 'Pajak'),
('pajak', 'status', 'non_aktif'),
('pajak', 'tarif', '10'),
('piutang', 'notifikasi_periode', '7'),
('piutang', 'notifikasi_show', 'Y'),
('piutang', 'piutang_periode', '30'),
('register', 'enable', 'Y'),
('register', 'id_module', '5'),
('register', 'id_role', '2'),
('register', 'metode_aktivasi', 'email'),
('stok', 'dashboard_show', 'Y'),
('stok', 'notifikasi_show', 'Y');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
