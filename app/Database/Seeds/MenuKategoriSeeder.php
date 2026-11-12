<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use RuntimeException;

class MenuKategoriSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id_menu_kategori' => 1,
                'nama_kategori' => 'KasirPRO Master',
                'deskripsi' => '',
                'aktif' => 'Y',
                'show_title' => 'N',
                'urut' => 2,
            ],
            [
                'id_menu_kategori' => 6,
                'nama_kategori' => 'Kasir PRO',
                'deskripsi' => 'POS Kasir Profesional',
                'aktif' => 'Y',
                'show_title' => 'Y',
                'urut' => 1,
            ],
        ];

        foreach ($categories as $category) {
            $existingByName = $this->db->table('menu_kategori')
                ->where('nama_kategori', $category['nama_kategori'])
                ->get()
                ->getRowArray();

            if ($existingByName && (int) $existingByName['id_menu_kategori'] !== $category['id_menu_kategori']) {
                throw new RuntimeException(
                    'Menu category "' . $category['nama_kategori'] . '" already uses ID '
                    . $existingByName['id_menu_kategori'] . '; expected ID '
                    . $category['id_menu_kategori'] . '.'
                );
            }

            $existingById = $this->db->table('menu_kategori')
                ->where('id_menu_kategori', $category['id_menu_kategori'])
                ->get()
                ->getRowArray();

            if ($existingById && $existingById['nama_kategori'] !== $category['nama_kategori']) {
                throw new RuntimeException(
                    'Menu category ID ' . $category['id_menu_kategori'] . ' is already used by "'
                    . $existingById['nama_kategori'] . '".'
                );
            }

            if ($existingById) {
                $this->db->table('menu_kategori')
                    ->where('id_menu_kategori', $category['id_menu_kategori'])
                    ->update($category);
            } else {
                $this->db->table('menu_kategori')->insert($category);
            }
        }
    }
}
