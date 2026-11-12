<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixMenuIdAutoIncrement extends Migration
{
	public function up(): void
	{
		$primaryKey = $this->db->query("SHOW INDEX FROM `menu` WHERE `Key_name` = 'PRIMARY'")->getResultArray();
		if (!$primaryKey) {
			$zeroIdMenus = $this->db->query('SELECT id_menu FROM `menu` WHERE id_menu = 0')->getResultArray();
			if ($zeroIdMenus) {
				$roles = $this->db->query('SELECT DISTINCT id_role FROM `menu_role` WHERE id_menu = 0')->getResultArray();
				$nextId = (int) $this->db->query('SELECT COALESCE(MAX(id_menu), 0) + 1 AS next_id FROM `menu`')->getRowArray()['next_id'];

				foreach ($zeroIdMenus as $zeroIdMenu) {
					$this->db->query('UPDATE `menu` SET id_menu = ? WHERE id_menu = 0 LIMIT 1', [$nextId]);
					foreach ($roles as $role) {
						$this->db->table('menu_role')->insert([
							'id_menu' => $nextId,
							'id_role' => $role['id_role'],
						]);
					}
					$nextId++;
				}

				$this->db->table('menu_role')->delete(['id_menu' => 0]);
			}

			$this->db->query('ALTER TABLE `menu` ADD PRIMARY KEY (`id_menu`)');
		}

		$this->db->query('ALTER TABLE `menu` MODIFY `id_menu` smallint(5) unsigned NOT NULL AUTO_INCREMENT');
	}

	public function down(): void
	{
		$this->db->query('ALTER TABLE `menu` MODIFY `id_menu` smallint(5) unsigned NOT NULL');
	}
}