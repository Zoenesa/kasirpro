<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use RuntimeException;

class FixBarangIdAutoIncrement extends Migration
{
    public function up(): void
    {
        $primaryKey = $this->db->query("SHOW INDEX FROM `barang` WHERE `Key_name` = 'PRIMARY'")->getResultArray();
        if (!$primaryKey) {
            $duplicates = $this->db->query('SELECT id_barang FROM `barang` GROUP BY id_barang HAVING COUNT(*) > 1 AND id_barang <> 0')->getResultArray();
            if ($duplicates) {
                throw new RuntimeException('Tidak dapat memperbaiki ID barang: ditemukan ID barang duplikat selain 0.');
            }

            $zeroRows = $this->db->query('SELECT kode_barang, nama_barang FROM `barang` WHERE id_barang = 0 ORDER BY tgl_input, kode_barang, nama_barang')->getResultArray();
            $zeroReferences = 0;
            foreach (['barang_adjusment_stok', 'barang_harga', 'barang_image', 'pembelian_detail', 'penjualan_detail', 'transfer_barang_detail'] as $table) {
                $zeroReferences += (int) $this->db->query('SELECT COUNT(*) AS total FROM `' . $table . '` WHERE id_barang = 0')->getRowArray()['total'];
            }

            if (count($zeroRows) > 1 && $zeroReferences > 0) {
                throw new RuntimeException('Tidak dapat memperbaiki ID barang otomatis: beberapa barang dan data stok/harga sama-sama memakai ID 0. Pulihkan relasi dari file Excel sebelum menjalankan migrasi.');
            }

            $nextId = (int) $this->db->query('SELECT COALESCE(MAX(id_barang), 0) + 1 AS next_id FROM `barang`')->getRowArray()['next_id'];

            foreach ($zeroRows as $zeroRow) {
                if ($this->db->query(
                    'UPDATE `barang` SET id_barang = ? WHERE id_barang = 0 AND kode_barang <=> ? AND nama_barang <=> ? LIMIT 1',
                    [$nextId, $zeroRow['kode_barang'], $zeroRow['nama_barang']]
                )) {
                    foreach (['barang_adjusment_stok', 'barang_harga', 'barang_image', 'pembelian_detail', 'penjualan_detail', 'transfer_barang_detail'] as $table) {
                        $this->db->query('UPDATE `' . $table . '` SET id_barang = ? WHERE id_barang = 0', [$nextId]);
                    }
                }
                $nextId++;
            }

            $this->db->query('ALTER TABLE `barang` ADD PRIMARY KEY (`id_barang`)');
        }

        $this->db->query('ALTER TABLE `barang` MODIFY `id_barang` int(10) unsigned NOT NULL AUTO_INCREMENT');
    }

    public function down(): void
    {
        $this->db->query('ALTER TABLE `barang` MODIFY `id_barang` int(10) unsigned NOT NULL');
    }
}