<?php

namespace App\Models;

use CodeIgniter\Model;

class CatalogModel extends Model
{
    public function getCategories(): array
    {
        return $this->db->table('barang_kategori')
            ->select('id_barang_kategori, nama_kategori')
            ->where('aktif', 'Y')
            ->orderBy('urut')
            ->get()
            ->getResultArray();
    }

    public function getProducts(string $search, int $categoryId, int $page, int $perPage, int $priceTypeId): array
    {
        $builder = $this->db->table('barang b')
            ->select('b.id_barang, b.kode_barang, b.nama_barang, b.deskripsi, b.id_barang_kategori')
            ->select('bk.nama_kategori')
            ->select('fp.nama_file')
            ->select(
                '(SELECT bh.harga
                    FROM barang_harga bh
                    WHERE bh.id_barang = b.id_barang
                        AND bh.id_jenis_harga = ' . $priceTypeId . '
                        AND bh.jenis = "harga_jual"
                    ORDER BY bh.tgl_input DESC
                    LIMIT 1) AS harga',
                false
            )
            ->join('barang_kategori bk', 'bk.id_barang_kategori = b.id_barang_kategori', 'left')
            ->join('barang_image bi', 'bi.id_barang = b.id_barang AND bi.urut = 1', 'left')
            ->join('file_picker fp', 'fp.id_file_picker = bi.id_file_picker', 'left');

        if ($search !== '') {
            $builder->groupStart()
                ->like('b.nama_barang', $search)
                ->orLike('b.kode_barang', $search)
                ->orLike('b.barcode', $search)
                ->groupEnd();
        }

        if ($categoryId > 0) {
            $builder->where('b.id_barang_kategori', $categoryId);
        }

        $countBuilder = clone $builder;
        $total = $countBuilder->countAllResults();

        $products = $builder
            ->orderBy('b.nama_barang', 'ASC')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get()
            ->getResultArray();

        return ['products' => $products, 'total' => $total];
    }

    public function getDefaultPriceTypeId(): int
    {
        $priceType = $this->db->table('jenis_harga')
            ->select('id_jenis_harga')
            ->orderBy('default_harga', 'DESC')
            ->orderBy('id_jenis_harga', 'ASC')
            ->get(1)
            ->getRowArray();

        return (int) ($priceType['id_jenis_harga'] ?? 0);
    }
}
