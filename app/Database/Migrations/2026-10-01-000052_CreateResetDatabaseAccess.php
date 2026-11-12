<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResetDatabaseAccess extends Migration
{
	public function up(): void
	{
		$db = $this->db;
		$category = $db->table('menu_kategori')->where('nama_kategori', 'Kasir PRO')->get()->getRowArray();
		if ($category && (int) $category['id_menu_kategori'] !== 6) {
			throw new \RuntimeException('Menu category Kasir PRO must use ID 6 because seeded menus depend on it.');
		}

		if (!$category) {
			$category = $db->table('menu_kategori')->where('id_menu_kategori', 6)->get()->getRowArray();
			if ($category) {
				throw new \RuntimeException('Menu category ID 6 is already used by "' . $category['nama_kategori'] . '".');
			}

			$db->table('menu_kategori')->insert([
				'id_menu_kategori' => 6,
				'nama_kategori' => 'Kasir PRO',
				'deskripsi' => 'POS Kasir Profesional',
				'aktif' => 'Y',
				'show_title' => 'Y',
				'urut' => 1,
			]);
			$category = ['id_menu_kategori' => 6];
		}

		$hasBaseModules = $db->table('module')->where('nama_module', 'builtin/menu')->countAllResults() > 0;
		if (!$hasBaseModules) {
			$this->removeIncompleteResetDatabaseAccess();
			return;
		}

		$module = $db->table('module')->where('nama_module', 'reset-database')->get()->getRowArray();
		if (!$module) {
			$idModule = (int) $db->query('SELECT COALESCE(MAX(id_module), 0) + 1 AS next_id FROM module')->getRowArray()['next_id'];
			$db->table('module')->insert([
				'id_module' => $idModule,
				'nama_module' => 'reset-database',
				'judul_module' => 'Reset Database',
				'id_module_status' => 1,
				'login' => 'Y',
				'deskripsi' => 'Reset barang dan transaksi terkait',
			]);
			$module = ['id_module' => $idModule];
		}
		$idModule = (int) $module['id_module'];

		$menu = $db->table('menu')->where('url', 'reset-database')->get()->getRowArray();
		if (!$menu) {
			$idMenu = (int) $db->query('SELECT COALESCE(MAX(id_menu), 0) + 1 AS next_id FROM menu')->getRowArray()['next_id'];
			$db->table('menu')->insert([
				'id_menu' => $idMenu,
				'nama_menu' => 'Reset Database',
				'id_menu_kategori' => $category['id_menu_kategori'],
				'class' => 'fas fa-triangle-exclamation',
				'url' => 'reset-database',
				'id_module' => $idModule,
				'id_parent' => null,
				'aktif' => 1,
				'new' => 0,
				'urut' => 11,
			]);
			$menu = ['id_menu' => $idMenu];
		}
		$idMenu = (int) $menu['id_menu'];

		$permission = $db->table('module_permission')
			->where('id_module', $idModule)
			->where('nama_permission', 'reset_database')
			->get()
			->getRowArray();
		if (!$permission) {
			$idPermission = (int) $db->query('SELECT COALESCE(MAX(id_module_permission), 0) + 1 AS next_id FROM module_permission')->getRowArray()['next_id'];
			$db->table('module_permission')->insert([
				'id_module_permission' => $idPermission,
				'id_module' => $idModule,
				'nama_permission' => 'reset_database',
				'judul_permission' => 'Reset Database',
				'keterangan' => 'Menghapus barang dan seluruh transaksi terkait',
			]);
			$permission = ['id_module_permission' => $idPermission];
		}
		$idPermission = (int) $permission['id_module_permission'];

		$adminRoles = $db->table('role')->select('id_role')->where('nama_role', 'admin')->get()->getResultArray();
		foreach ($adminRoles as $adminRole) {
			$roleId = (int) $adminRole['id_role'];
			if (!$db->table('menu_role')->where('id_menu', $idMenu)->where('id_role', $roleId)->get()->getRowArray()) {
				$db->table('menu_role')->insert(['id_menu' => $idMenu, 'id_role' => $roleId]);
			}
			if (!$db->table('role_module_permission')->where('id_role', $roleId)->where('id_module_permission', $idPermission)->get()->getRowArray()) {
				$db->table('role_module_permission')->insert(['id_role' => $roleId, 'id_module_permission' => $idPermission]);
			}
		}
	}

	private function removeIncompleteResetDatabaseAccess(): void
	{
		$db = $this->db;
		$module = $db->table('module')->where('nama_module', 'reset-database')->get()->getRowArray();
		if (!$module) {
			return;
		}

		$moduleId = (int) $module['id_module'];
		$permissionIds = array_column(
			$db->table('module_permission')->select('id_module_permission')->where('id_module', $moduleId)->get()->getResultArray(),
			'id_module_permission'
		);
		$menuIds = array_column(
			$db->table('menu')->select('id_menu')->where('url', 'reset-database')->get()->getResultArray(),
			'id_menu'
		);

		if ($permissionIds) {
			$db->table('role_module_permission')->whereIn('id_module_permission', $permissionIds)->delete();
			$db->table('module_permission')->whereIn('id_module_permission', $permissionIds)->delete();
		}
		if ($menuIds) {
			$db->table('menu_role')->whereIn('id_menu', $menuIds)->delete();
			$db->table('menu')->whereIn('id_menu', $menuIds)->delete();
		}
		$db->table('module')->where('id_module', $moduleId)->delete();
	}

	public function down(): void
	{
		$db = $this->db;
		$module = $db->table('module')->where('nama_module', 'reset-database')->get()->getRowArray();
		if (!$module) {
			return;
		}

		$idModule = (int) $module['id_module'];
		$permissionIds = array_column(
			$db->table('module_permission')->select('id_module_permission')->where('id_module', $idModule)->get()->getResultArray(),
			'id_module_permission'
		);
		$menuIds = array_column(
			$db->table('menu')->select('id_menu')->where('url', 'reset-database')->get()->getResultArray(),
			'id_menu'
		);

		if ($permissionIds) {
			$db->table('role_module_permission')->whereIn('id_module_permission', $permissionIds)->delete();
			$db->table('module_permission')->whereIn('id_module_permission', $permissionIds)->delete();
		}
		if ($menuIds) {
			$db->table('menu_role')->whereIn('id_menu', $menuIds)->delete();
			$db->table('menu')->whereIn('id_menu', $menuIds)->delete();
		}
		$db->table('module')->where('id_module', $idModule)->delete();
	}
}