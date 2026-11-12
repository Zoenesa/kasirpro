<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SatuanUnitSeeder extends Seeder
{
    public function run()
    {
        $queries = [
            "INSERT INTO `satuan_unit` (`id_satuan_unit`, `nama_satuan`, `satuan`, `keterangan`) VALUES
(1, 'Gram', 'gr', ''),
(2, 'Kilogram', 'kg', ''),
(3, 'Piece', 'pcs', ''),
(4, 'Kardus', 'dus', ''),
(5, 'set', 'set', '');"
        ];

        foreach ($queries as $query) {
            $this->db->query($query);
        }
    }
}
