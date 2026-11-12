<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use RuntimeException;

class FixBarangRelatedIds extends Migration
{
    public function up(): void
    {
        $this->fixCategoryIds();
        $this->fixAutoIncrementId('barang_adjusment_stok', 'id_barang_stok', 'int(10) unsigned');
        $this->fixAutoIncrementId('barang_harga', 'id_barang_harga', 'int(11) unsigned');

        $primaryKey = $this->db->query("SHOW INDEX FROM `barang_image` WHERE `Key_name` = 'PRIMARY'")->getResultArray();
        if (!$primaryKey) {
            $duplicates = $this->db->query('SELECT id_barang, id_file_picker FROM `barang_image` GROUP BY id_barang, id_file_picker HAVING COUNT(*) > 1')->getResultArray();
            if ($duplicates) {
                throw new RuntimeException('Tidak dapat memperbaiki indeks gambar barang: ditemukan pasangan barang/gambar duplikat.');
            }

            $this->db->query('ALTER TABLE `barang_image` ADD PRIMARY KEY (`id_barang`, `id_file_picker`)');
        }
    }

    public function down(): void
    {
        $this->db->query('ALTER TABLE `barang_kategori` MODIFY `id_barang_kategori` smallint(5) unsigned NOT NULL');
        $this->db->query('ALTER TABLE `barang_adjusment_stok` MODIFY `id_barang_stok` int(10) unsigned NOT NULL');
        $this->db->query('ALTER TABLE `barang_harga` MODIFY `id_barang_harga` int(11) unsigned NOT NULL');
    }

    private function fixCategoryIds(): void
    {
        $primaryKey = $this->db->query("SHOW INDEX FROM `barang_kategori` WHERE `Key_name` = 'PRIMARY'")->getResultArray();
        if (!$primaryKey) {
            $duplicates = $this->db->query('SELECT id_barang_kategori FROM `barang_kategori` GROUP BY id_barang_kategori HAVING COUNT(*) > 1 AND id_barang_kategori <> 0')->getResultArray();
            if ($duplicates) {
                throw new RuntimeException('Tidak dapat memperbaiki ID kategori: ditemukan ID kategori duplikat selain 0.');
            }

            $zeroCount = (int) $this->db->query('SELECT COUNT(*) AS total FROM `barang_kategori` WHERE id_barang_kategori = 0')->getRowArray()['total'];
            $references = (int) $this->db->query('SELECT COUNT(*) AS total FROM `barang` WHERE id_barang_kategori = 0')->getRowArray()['total'];
            $parentReferences = (int) $this->db->query('SELECT COUNT(*) AS total FROM `barang_kategori` WHERE id_parent = 0')->getRowArray()['total'];
            if ($zeroCount > 1 && ($references > 0 || $parentReferences > 0)) {
                throw new RuntimeException('Tidak dapat memperbaiki relasi kategori ID 0 otomatis: beberapa kategori dan barang memakai ID yang sama.');
            }

            $zeroRows = $this->db->query('SELECT nama_kategori FROM `barang_kategori` WHERE id_barang_kategori = 0')->getResultArray();
            $nextId = (int) $this->db->query('SELECT COALESCE(MAX(id_barang_kategori), 0) + 1 AS next_id FROM `barang_kategori`')->getRowArray()['next_id'];
            foreach ($zeroRows as $zeroRow) {
                $this->db->query('UPDATE `barang_kategori` SET id_barang_kategori = ? WHERE id_barang_kategori = 0 AND nama_kategori = ? LIMIT 1', [$nextId, $zeroRow['nama_kategori']]);
                if ($zeroCount === 1) {
                    $this->db->query('UPDATE `barang` SET id_barang_kategori = ? WHERE id_barang_kategori = 0', [$nextId]);
                    $this->db->query('UPDATE `barang_kategori` SET id_parent = ? WHERE id_parent = 0', [$nextId]);
                }
                $nextId++;
            }

            $this->db->query('ALTER TABLE `barang_kategori` ADD PRIMARY KEY (`id_barang_kategori`)');
        }

        $this->db->query('ALTER TABLE `barang_kategori` MODIFY `id_barang_kategori` smallint(5) unsigned NOT NULL AUTO_INCREMENT');
    }

    private function fixAutoIncrementId(string $table, string $column, string $type): void
    {
        $primaryKey = $this->db->query("SHOW INDEX FROM `{$table}` WHERE `Key_name` = 'PRIMARY'")->getResultArray();
        if (!$primaryKey) {
            $duplicates = $this->db->query("SELECT `{$column}` FROM `{$table}` GROUP BY `{$column}` HAVING COUNT(*) > 1 AND `{$column}` <> 0")->getResultArray();
            if ($duplicates) {
                throw new RuntimeException('Tidak dapat memperbaiki ID pada tabel ' . $table . ': ditemukan ID duplikat selain 0.');
            }

            $zeroCount = (int) $this->db->query("SELECT COUNT(*) AS total FROM `{$table}` WHERE `{$column}` = 0")->getRowArray()['total'];
            $nextId = (int) $this->db->query("SELECT COALESCE(MAX(`{$column}`), 0) + 1 AS next_id FROM `{$table}`")->getRowArray()['next_id'];
            for ($index = 0; $index < $zeroCount; $index++) {
                $this->db->query("UPDATE `{$table}` SET `{$column}` = ? WHERE `{$column}` = 0 LIMIT 1", [$nextId]);
                $nextId++;
            }

            $this->db->query("ALTER TABLE `{$table}` ADD PRIMARY KEY (`{$column}`)");
        }

        $this->db->query("ALTER TABLE `{$table}` MODIFY `{$column}` {$type} NOT NULL AUTO_INCREMENT");
    }
}