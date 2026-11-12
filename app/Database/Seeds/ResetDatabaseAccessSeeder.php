<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use RuntimeException;

class ResetDatabaseAccessSeeder extends Seeder
{
	public function run()
	{
		$category = $this->db->table('menu_kategori')
			->where('nama_kategori', 'Kasir PRO')
			->get()
			->getRowArray();
		if (!$category) {
			throw new RuntimeException('Menu category Kasir PRO was not found. Run MenuKategoriSeeder first.');
		}

		$module = $this->db->table('module')->where('nama_module', 'reset-database')->get()->getRowArray();
		if (!$module) {
			$moduleId = $this->nextId('module', 'id_module');
			$this->db->table('module')->insert([
				'id_module' => $moduleId,
				'nama_module' => 'reset-database',
				'judul_module' => 'Reset Database',
				'id_module_status' => 1,
				'login' => 'Y',
				'deskripsi' => 'Reset barang dan transaksi terkait',
			]);
		} else {
			$moduleId = (int) $module['id_module'];
		}

		$menu = $this->db->table('menu')->where('url', 'reset-database')->get()->getRowArray();
		if (!$menu) {
			$menuId = $this->nextId('menu', 'id_menu');
			$this->db->table('menu')->insert([
				'id_menu' => $menuId,
				'nama_menu' => 'Reset Database',
				'id_menu_kategori' => $category['id_menu_kategori'],
				'class' => 'fas fa-triangle-exclamation',
				'url' => 'reset-database',
				'id_module' => $moduleId,
				'id_parent' => null,
				'aktif' => 1,
				'new' => 0,
				'urut' => 11,
			]);
		} else {
			$menuId = (int) $menu['id_menu'];
		}

		$permission = $this->db->table('module_permission')
			->where(['id_module' => $moduleId, 'nama_permission' => 'reset_database'])
			->get()
			->getRowArray();
		if (!$permission) {
			$permissionId = $this->nextId('module_permission', 'id_module_permission');
			$this->db->table('module_permission')->insert([
				'id_module_permission' => $permissionId,
				'id_module' => $moduleId,
				'nama_permission' => 'reset_database',
				'judul_permission' => 'Reset Database',
				'keterangan' => 'Menghapus barang dan seluruh transaksi terkait',
			]);
		} else {
			$permissionId = (int) $permission['id_module_permission'];
		}

		$adminRoles = $this->db->table('role')->select('id_role')->where('nama_role', 'admin')->get()->getResultArray();
		foreach ($adminRoles as $adminRole) {
			$roleId = (int) $adminRole['id_role'];
			$this->ensureRoleMenu($roleId, $menuId);
			$this->ensureRolePermission($roleId, $permissionId);
		}
	}

	private function ensureRoleMenu(int $roleId, int $menuId): void
	{
		$exists = $this->db->table('menu_role')
			->where(['id_menu' => $menuId, 'id_role' => $roleId])
			->countAllResults();
		if (!$exists) {
			$this->db->table('menu_role')->insert(['id_menu' => $menuId, 'id_role' => $roleId]);
		}
	}

	private function ensureRolePermission(int $roleId, int $permissionId): void
	{
		$exists = $this->db->table('role_module_permission')
			->where(['id_role' => $roleId, 'id_module_permission' => $permissionId])
			->countAllResults();
		if (!$exists) {
			$this->db->table('role_module_permission')->insert([
				'id_role' => $roleId,
				'id_module_permission' => $permissionId,
			]);
		}
	}

	private function nextId(string $table, string $column): int
	{
		$result = $this->db->query("SELECT COALESCE(MAX($column), 0) + 1 AS next_id FROM `$table`")->getRowArray();
		return (int) $result['next_id'];
	}
}
