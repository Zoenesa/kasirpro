<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengeluaranSeeder extends Seeder
{
	public function run()
	{
		$expenseModule = $this->ensureModule('pengeluaran', 'Biaya Operasional', 'Pencatatan biaya operasional');
		$categoryModule = $this->ensureModule('pengeluaran-kategori', 'Kategori Biaya', 'Pengaturan kategori biaya operasional');

		$expensePermissions = $this->ensurePermissions($expenseModule);
		$categoryPermissions = $this->ensurePermissions($categoryModule);

		$expenseMenu = $this->ensureMenu('Biaya Operasional', 'fas fa-receipt', 'pengeluaran', $expenseModule, 76, 5);
		$categoryMenu = $this->ensureMenu('Kategori Biaya', 'fas fa-tags', 'pengeluaran-kategori', $categoryModule, 76, 6);

		foreach ([1, 5] as $roleId) {
			if (!$this->db->table('role')->where('id_role', $roleId)->countAllResults()) {
				continue;
			}

			foreach (array_merge($expensePermissions, $categoryPermissions) as $permissionId) {
				$this->ensureRolePermission($roleId, $permissionId);
			}

			$this->ensureMenuRole($expenseMenu, $roleId);
			$this->ensureMenuRole($categoryMenu, $roleId);
		}
	}

	private function ensureModule(string $name, string $title, string $description): int
	{
		$module = $this->db->table('module')->where('nama_module', $name)->get()->getRowArray();
		if ($module) {
			return (int) $module['id_module'];
		}

		$id = $this->nextId('module', 'id_module');
		$this->db->table('module')->insert([
			'id_module' => $id,
			'nama_module' => $name,
			'judul_module' => $title,
			'id_module_status' => 1,
			'login' => 'Y',
			'deskripsi' => $description,
		]);

		return $id;
	}

	private function ensurePermissions(int $moduleId): array
	{
		$permissionIds = [];
		$permissions = [
			'create' => 'Tambah data',
			'read_all' => 'Lihat semua data',
			'update_all' => 'Ubah data',
			'delete_all' => 'Hapus data',
		];

		foreach ($permissions as $name => $title) {
			$permission = $this->db->table('module_permission')
				->where(['id_module' => $moduleId, 'nama_permission' => $name])
				->get()->getRowArray();

			if (!$permission) {
				$id = $this->nextId('module_permission', 'id_module_permission');
				$this->db->table('module_permission')->insert([
					'id_module_permission' => $id,
					'id_module' => $moduleId,
					'nama_permission' => $name,
					'judul_permission' => $title,
					'keterangan' => $title . ' biaya operasional',
				]);
			} else {
				$id = (int) $permission['id_module_permission'];
			}

			$permissionIds[] = $id;
		}

		return $permissionIds;
	}

	private function ensureMenu(string $name, string $icon, string $url, int $moduleId, int $parentId, int $order): int
	{
		$menu = $this->db->table('menu')->where('url', $url)->get()->getRowArray();
		$data = [
			'nama_menu' => $name,
			'id_menu_kategori' => 6,
			'class' => $icon,
			'url' => $url,
			'id_module' => $moduleId,
			'id_parent' => $parentId,
			'aktif' => 1,
			'new' => 0,
			'urut' => $order,
		];

		if ($menu) {
			$this->db->table('menu')->where('id_menu', $menu['id_menu'])->update($data);
			return (int) $menu['id_menu'];
		}

		$id = $this->nextId('menu', 'id_menu');
		$data['id_menu'] = $id;
		$this->db->table('menu')->insert($data);

		return $id;
	}

	private function ensureRolePermission(int $roleId, int $permissionId): void
	{
		$exists = $this->db->table('role_module_permission')->where([
			'id_role' => $roleId,
			'id_module_permission' => $permissionId,
		])->countAllResults();

		if (!$exists) {
			$this->db->table('role_module_permission')->insert([
				'id_role' => $roleId,
				'id_module_permission' => $permissionId,
			]);
		}
	}

	private function ensureMenuRole(int $menuId, int $roleId): void
	{
		$exists = $this->db->table('menu_role')->where([
			'id_menu' => $menuId,
			'id_role' => $roleId,
		])->countAllResults();

		if (!$exists) {
			$this->db->table('menu_role')->insert([
				'id_menu' => $menuId,
				'id_role' => $roleId,
			]);
		}
	}

	private function nextId(string $table, string $column): int
	{
		$result = $this->db->query("SELECT COALESCE(MAX($column), 0) + 1 AS next_id FROM `$table`")->getRowArray();
		return (int) $result['next_id'];
	}
}