<?php

namespace App\Models;

class PengeluaranKategoriModel extends BaseModel
{
	public function getAll(bool $activeOnly = false): array
	{
		$builder = $this->db->table('pengeluaran_kategori');
		if ($activeOnly) {
			$builder->where('aktif', 'Y');
		}

		return $builder->orderBy('nama_kategori', 'ASC')->get()->getResultArray();
	}

	public function getById(int $id): ?array
	{
		$result = $this->db->table('pengeluaran_kategori')
			->where('id_pengeluaran_kategori', $id)
			->get()->getRowArray();

		return $result ?: null;
	}

	public function existsByName(string $name, ?int $excludeId = null): bool
	{
		$builder = $this->db->table('pengeluaran_kategori')->where('nama_kategori', $name);
		if ($excludeId) {
			$builder->where('id_pengeluaran_kategori !=', $excludeId);
		}

		return $builder->countAllResults() > 0;
	}

	public function saveCategory(array $data, ?int $id = null): bool
	{
		$builder = $this->db->table('pengeluaran_kategori');
		if ($id) {
			return $builder->where('id_pengeluaran_kategori', $id)->update($data);
		}

		return $builder->insert($data);
	}

	public function isUsed(int $id): bool
	{
		return $this->db->table('pengeluaran')
			->where('id_pengeluaran_kategori', $id)
			->countAllResults() > 0;
	}

	public function deleteCategory(int $id): bool
	{
		return $this->db->table('pengeluaran_kategori')
			->where('id_pengeluaran_kategori', $id)
			->delete();
	}
}