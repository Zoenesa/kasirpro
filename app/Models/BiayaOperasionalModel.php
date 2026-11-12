<?php

namespace App\Models;

class BiayaOperasionalModel extends BaseModel
{
	public function getCategories(bool $activeOnly = true): array
	{
		$builder = $this->db->table('pengeluaran_kategori');
		if ($activeOnly) {
			$builder->where('aktif', 'Y');
		}

		return $builder->orderBy('nama_kategori', 'ASC')->get()->getResultArray();
	}

	public function getExpenses(string $startDate, string $endDate): array
	{
		return $this->db->table('pengeluaran e')
			->select('e.*, k.nama_kategori')
			->join('pengeluaran_kategori k', 'k.id_pengeluaran_kategori = e.id_pengeluaran_kategori')
			->where('e.tgl_pengeluaran >=', $startDate)
			->where('e.tgl_pengeluaran <=', $endDate)
			->orderBy('e.tgl_pengeluaran', 'DESC')
			->orderBy('e.id_pengeluaran', 'DESC')
			->get()->getResultArray();
	}

	public function getSummary(string $startDate, string $endDate): array
	{
		$result = $this->db->table('pengeluaran')
			->select('COUNT(*) AS jumlah_transaksi, COALESCE(SUM(jumlah), 0) AS total_pengeluaran')
			->where('tgl_pengeluaran >=', $startDate)
			->where('tgl_pengeluaran <=', $endDate)
			->get()->getRowArray();

		return $result ?: ['jumlah_transaksi' => 0, 'total_pengeluaran' => 0];
	}

	public function getExpense(int $id): ?array
	{
		$result = $this->db->table('pengeluaran')
			->where('id_pengeluaran', $id)
			->get()->getRowArray();

		return $result ?: null;
	}

	public function saveExpense(array $data, ?int $id = null): bool
	{
		$builder = $this->db->table('pengeluaran');
		if ($id) {
			return $builder->where('id_pengeluaran', $id)->update($data);
		}

		return $builder->insert($data);
	}

	public function deleteExpense(int $id): bool
	{
		return $this->db->table('pengeluaran')
			->where('id_pengeluaran', $id)
			->delete();
	}
}