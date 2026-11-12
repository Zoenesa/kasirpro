<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientLicenses extends Migration
{
	public function up(): void
	{
		$this->db->query(<<<'SQL'
CREATE TABLE `client_licenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `license_key` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'inactive',
  `domain` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `activated_at` datetime DEFAULT NULL,
  `last_verified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `client_licenses_license_key_unique` (`license_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
	}

	public function down(): void
	{
		$this->forge->dropTable('client_licenses', true);
	}
}