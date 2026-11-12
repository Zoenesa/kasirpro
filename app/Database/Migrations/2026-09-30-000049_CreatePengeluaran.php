<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengeluaran extends Migration
{
	public function up(): void
	{
		$this->db->query(<<<'SQL'
CREATE TABLE `pengeluaran_kategori` (
  `id_pengeluaran_kategori` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `id_user_input` int(10) unsigned NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran_kategori`),
  UNIQUE KEY `uniq_pengeluaran_kategori_nama` (`nama_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);

		$this->db->query(<<<'SQL'
CREATE TABLE `pengeluaran` (
  `id_pengeluaran` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengeluaran_kategori` int(10) unsigned NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nama_pengeluaran` varchar(160) NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL,
  `no_bukti` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `id_user_input` int(10) unsigned NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran`),
  KEY `idx_pengeluaran_tanggal` (`tgl_pengeluaran`),
  KEY `idx_pengeluaran_kategori` (`id_pengeluaran_kategori`),
  CONSTRAINT `fk_pengeluaran_kategori` FOREIGN KEY (`id_pengeluaran_kategori`) REFERENCES `pengeluaran_kategori` (`id_pengeluaran_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
SQL);
	}

	public function down(): void
	{
		$this->forge->dropTable('pengeluaran', true);
		$this->forge->dropTable('pengeluaran_kategori', true);
	}
}