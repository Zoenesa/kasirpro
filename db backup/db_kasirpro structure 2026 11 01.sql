/*
 Navicat Premium Data Transfer

 Source Server         : MySQL localhost
 Source Server Type    : MySQL
 Source Server Version : 50737 (5.7.37-log)
 Source Host           : localhost:3306
 Source Schema         : db_kasirpro

 Target Server Type    : MySQL
 Target Server Version : 50737 (5.7.37-log)
 File Encoding         : 65001

 Date: 01/11/2026 05:49:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id_barang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_barang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_satuan_unit` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `berat` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `id_barang_kategori` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `barcode` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stok_minimum` smallint(5) UNSIGNED NULL DEFAULT 0,
  `tgl_daluarsa` date NULL DEFAULT NULL,
  `tgl_input` datetime NULL DEFAULT NULL,
  `id_user_input` int(10) UNSIGNED NULL DEFAULT NULL,
  `tgl_edit` datetime NULL DEFAULT NULL,
  `id_user_edit` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 88 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for barang_adjusment_stok
-- ----------------------------
DROP TABLE IF EXISTS `barang_adjusment_stok`;
CREATE TABLE `barang_adjusment_stok`  (
  `id_barang_stok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_barang` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_gudang` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `adjusment_stok` smallint(6) NULL DEFAULT NULL,
  `tgl_adjusment_stok` date NULL DEFAULT NULL,
  `tgl_input` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user_input` int(10) UNSIGNED NULL DEFAULT NULL,
  `tgl_update` datetime NULL DEFAULT NULL,
  `id_user_update` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang_stok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for barang_harga
-- ----------------------------
DROP TABLE IF EXISTS `barang_harga`;
CREATE TABLE `barang_harga`  (
  `id_barang_harga` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NULL DEFAULT NULL,
  `id_jenis_harga` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `harga` int(10) UNSIGNED NULL DEFAULT NULL,
  `jenis` enum('harga_jual','harga_pokok') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_input` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user_input` int(10) UNSIGNED NULL DEFAULT NULL,
  `tgl_update` datetime NULL DEFAULT NULL,
  `id_user_update` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang_harga`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 407 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for barang_image
-- ----------------------------
DROP TABLE IF EXISTS `barang_image`;
CREATE TABLE `barang_image`  (
  `id_barang` int(10) UNSIGNED NOT NULL,
  `id_file_picker` int(10) UNSIGNED NOT NULL DEFAULT 54,
  `urut` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_barang`, `id_file_picker`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for barang_kategori
-- ----------------------------
DROP TABLE IF EXISTS `barang_kategori`;
CREATE TABLE `barang_kategori`  (
  `id_barang_kategori` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_parent` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `new` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `urut` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_barang_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'Tabel menu aplikasi' ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for barang_stok
-- ----------------------------
DROP TABLE IF EXISTS `barang_stok`;
CREATE TABLE `barang_stok`  (
  `id_barang` int(10) UNSIGNED NULL DEFAULT NULL,
  `stok` decimal(33, 0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for client_licenses
-- ----------------------------
DROP TABLE IF EXISTS `client_licenses`;
CREATE TABLE `client_licenses`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `license_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'inactive',
  `domain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `activated_at` datetime NULL DEFAULT NULL,
  `last_verified_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `client_licenses_license_key_unique`(`license_key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id_customer` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_wilayah_kelurahan` int(10) UNSIGNED NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_customer`) USING BTREE,
  UNIQUE INDEX `unique_customer_name_address`(`nama_customer`, `alamat_customer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10880 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for file_picker
-- ----------------------------
DROP TABLE IF EXISTS `file_picker`;
CREATE TABLE `file_picker`  (
  `id_file_picker` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `caption` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alt_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user_upload` int(10) UNSIGNED NOT NULL,
  `meta_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_file_picker`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 128 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for gudang
-- ----------------------------
DROP TABLE IF EXISTS `gudang`;
CREATE TABLE `gudang`  (
  `id_gudang` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_gudang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_gudang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_wilayah_kelurahan` int(10) UNSIGNED NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `default_gudang` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_gudang`) USING BTREE,
  UNIQUE INDEX `unique_gudang_name_address_location`(`nama_gudang`, `alamat_gudang`(255), `id_wilayah_kelurahan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for identitas
-- ----------------------------
DROP TABLE IF EXISTS `identitas`;
CREATE TABLE `identitas`  (
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_wilayah_kelurahan` int(10) UNSIGNED NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `url_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for jenis_harga
-- ----------------------------
DROP TABLE IF EXISTS `jenis_harga`;
CREATE TABLE `jenis_harga`  (
  `id_jenis_harga` smallint(5) UNSIGNED NOT NULL,
  `nama_jenis_harga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `default_harga` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` smallint(5) UNSIGNED NOT NULL,
  `judul_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id_menu` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_menu_kategori` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `class` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_module` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `id_parent` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `new` tinyint(1) NOT NULL DEFAULT 0,
  `urut` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 80 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'Tabel menu aplikasi' ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for menu_kategori
-- ----------------------------
DROP TABLE IF EXISTS `menu_kategori`;
CREATE TABLE `menu_kategori`  (
  `id_menu_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aktif` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `show_title` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `urut` tinyint(3) UNSIGNED NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for menu_role
-- ----------------------------
DROP TABLE IF EXISTS `menu_role`;
CREATE TABLE `menu_role`  (
  `id_menu` smallint(5) UNSIGNED NOT NULL,
  `id_role` smallint(5) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'Tabel hak akses dari menu aplikasi' ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for module
-- ----------------------------
DROP TABLE IF EXISTS `module`;
CREATE TABLE `module`  (
  `id_module` smallint(5) UNSIGNED NOT NULL,
  `nama_module` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `judul_module` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_module_status` tinyint(1) NULL DEFAULT NULL,
  `login` enum('Y','N','R') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `deskripsi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'Tabel modul aplikasi' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for module_permission
-- ----------------------------
DROP TABLE IF EXISTS `module_permission`;
CREATE TABLE `module_permission`  (
  `id_module_permission` smallint(5) UNSIGNED NOT NULL,
  `id_module` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `nama_permission` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `judul_permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for module_status
-- ----------------------------
DROP TABLE IF EXISTS `module_status`;
CREATE TABLE `module_status`  (
  `id_module_status` tinyint(1) NOT NULL,
  `nama_status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'Tabel status modul, seperti: aktif, non aktif, dalam perbaikan' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `id_pembelian` int(10) UNSIGNED NOT NULL,
  `no_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_invoice` date NOT NULL,
  `tgl_jatuh_tempo` date NULL DEFAULT NULL,
  `terima_barang` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_terima_barang` date NULL DEFAULT NULL,
  `id_user_terima` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `id_gudang` smallint(5) UNSIGNED NOT NULL,
  `sub_total` int(10) UNSIGNED NOT NULL,
  `diskon` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `total_bayar` int(10) UNSIGNED NOT NULL,
  `kurang_bayar` int(10) UNSIGNED NOT NULL,
  `status` enum('Lunas','Belum Lunas') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Belum Lunas'
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for pembelian_bayar
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_bayar`;
CREATE TABLE `pembelian_bayar`  (
  `id_pembelian_bayar` int(10) UNSIGNED NOT NULL,
  `id_pembelian` int(10) UNSIGNED NULL DEFAULT NULL,
  `tgl_bayar` date NULL DEFAULT NULL,
  `jml_bayar` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_user_bayar` int(10) UNSIGNED NULL DEFAULT NULL COMMENT 'Approval'
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for pembelian_detail
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_detail`;
CREATE TABLE `pembelian_detail`  (
  `id_pembelian_detail` int(10) UNSIGNED NOT NULL,
  `id_pembelian` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `qty` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `expired_date` date NULL DEFAULT NULL,
  `harga_satuan` int(10) UNSIGNED NULL DEFAULT NULL,
  `harga_neto` int(10) UNSIGNED NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for pembelian_file
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_file`;
CREATE TABLE `pembelian_file`  (
  `id_pembelian` int(10) UNSIGNED NOT NULL,
  `id_file_picker` int(10) UNSIGNED NOT NULL,
  `urut` tinyint(3) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for pembelian_retur
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_retur`;
CREATE TABLE `pembelian_retur`  (
  `id_pembelian_retur` int(10) UNSIGNED NOT NULL,
  `id_pembelian` int(10) UNSIGNED NULL DEFAULT NULL,
  `no_squence` mediumint(8) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `no_nota_retur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_nota_retur` date NULL DEFAULT NULL,
  `total_qty_retur` int(10) UNSIGNED NULL DEFAULT NULL,
  `sub_total_retur` int(10) UNSIGNED NOT NULL,
  `total_diskon_item_retur` int(10) UNSIGNED NOT NULL,
  `diskon_jenis` enum('%','rp') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diskon_nilai` int(10) UNSIGNED NOT NULL,
  `penyesuaian` int(11) NOT NULL,
  `neto_retur` int(11) NOT NULL,
  `id_user_input` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user_update` int(10) UNSIGNED NULL DEFAULT NULL,
  `tgl_update` datetime NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for pembelian_retur_detail
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_retur_detail`;
CREATE TABLE `pembelian_retur_detail`  (
  `id_pembelian_retur` int(10) UNSIGNED NOT NULL,
  `id_pembelian_detail` int(10) UNSIGNED NOT NULL,
  `qty_retur` tinyint(3) UNSIGNED NOT NULL,
  `harga_total_retur` int(10) UNSIGNED NOT NULL,
  `diskon_jenis_retur` enum('%','rp') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diskon_nilai_retur` int(10) UNSIGNED NOT NULL,
  `diskon_retur` int(10) UNSIGNED NOT NULL,
  `harga_neto_retur` int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran`;
CREATE TABLE `pengeluaran`  (
  `id_pengeluaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pengeluaran_kategori` int(10) UNSIGNED NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nama_pengeluaran` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` decimal(15, 2) NOT NULL,
  `metode_pembayaran` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_bukti` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_user_input` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran`) USING BTREE,
  INDEX `idx_pengeluaran_tanggal`(`tgl_pengeluaran`) USING BTREE,
  INDEX `idx_pengeluaran_kategori`(`id_pengeluaran_kategori`) USING BTREE,
  CONSTRAINT `fk_pengeluaran_kategori` FOREIGN KEY (`id_pengeluaran_kategori`) REFERENCES `pengeluaran_kategori` (`id_pengeluaran_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pengeluaran_kategori
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_kategori`;
CREATE TABLE `pengeluaran_kategori`  (
  `id_pengeluaran_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aktif` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Y',
  `id_user_input` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran_kategori`) USING BTREE,
  UNIQUE INDEX `uniq_pengeluaran_kategori_nama`(`nama_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_customer` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_gudang` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `no_squence` mediumint(6) UNSIGNED ZEROFILL NOT NULL DEFAULT 000000,
  `no_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_invoice` date NULL DEFAULT NULL,
  `id_jenis_harga` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `tgl_penjualan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_qty` decimal(10, 2) UNSIGNED NULL DEFAULT NULL,
  `total_diskon_item` int(10) UNSIGNED NOT NULL,
  `diskon_jenis` enum('%','rp') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diskon_nilai` int(10) UNSIGNED NOT NULL,
  `diskon` int(10) UNSIGNED NOT NULL,
  `total_diskon` int(10) UNSIGNED NOT NULL,
  `sub_total` int(10) UNSIGNED NOT NULL,
  `penyesuaian` int(11) NOT NULL,
  `pajak_display_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pajak_persen` tinyint(4) NOT NULL DEFAULT 0,
  `pajak_nilai` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `neto` int(10) UNSIGNED NOT NULL,
  `total_bayar` int(10) UNSIGNED NOT NULL,
  `kembali` int(10) UNSIGNED NOT NULL,
  `kurang_bayar` int(11) NOT NULL COMMENT 'Nilai negatif menunjukkan lebih bayar',
  `jenis_bayar` enum('tunai','transfer','tempo') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` enum('lunas','kurang_bayar','lebih_bayar') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_pokok` int(10) UNSIGNED NOT NULL,
  `untung_rugi` int(11) NOT NULL,
  `id_user_input` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user_update` int(10) UNSIGNED NULL DEFAULT NULL,
  `tgl_update` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for penjualan_bayar
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_bayar`;
CREATE TABLE `penjualan_bayar`  (
  `id_penjualan_bayar` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(10) UNSIGNED NULL DEFAULT NULL,
  `tgl_bayar` date NULL DEFAULT NULL,
  `jml_bayar` int(10) UNSIGNED NULL DEFAULT NULL,
  `metode_bayar` enum('tunai','transfer') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'transfer'
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for penjualan_detail
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_detail`;
CREATE TABLE `penjualan_detail`  (
  `id_penjualan_detail` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `satuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_pokok` int(10) UNSIGNED NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `qty` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `qty_pengali` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `harga_total` int(10) UNSIGNED NOT NULL,
  `diskon_jenis` enum('%','rp') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diskon_nilai` int(10) UNSIGNED NOT NULL,
  `diskon` int(10) UNSIGNED NOT NULL,
  `harga_neto` int(10) UNSIGNED NOT NULL,
  `harga_pokok_total` int(10) UNSIGNED NOT NULL,
  `untung_rugi` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for penjualan_retur
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_retur`;
CREATE TABLE `penjualan_retur`  (
  `id_penjualan_retur` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(10) UNSIGNED NULL DEFAULT NULL,
  `no_nota_retur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_nota_retur` date NULL DEFAULT NULL,
  `total_qty_retur` int(10) UNSIGNED NULL DEFAULT NULL,
  `sub_total_retur` int(10) UNSIGNED NOT NULL,
  `total_diskon_item_retur` int(10) UNSIGNED NOT NULL,
  `diskon_jenis_retur` enum('%','rp') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diskon_nilai_retur` int(10) UNSIGNED NOT NULL,
  `penyesuaian_retur` int(11) NOT NULL,
  `neto_retur` int(11) NOT NULL,
  `id_user_input` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user_update` int(10) UNSIGNED NULL DEFAULT NULL,
  `tgl_update` datetime NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for penjualan_retur_detail
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_retur_detail`;
CREATE TABLE `penjualan_retur_detail`  (
  `id_penjualan_retur` int(10) UNSIGNED NOT NULL,
  `id_penjualan_detail` int(10) UNSIGNED NOT NULL,
  `qty_retur` tinyint(3) UNSIGNED NOT NULL,
  `harga_total_retur` int(10) UNSIGNED NOT NULL,
  `diskon_jenis_retur` enum('%','rp') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diskon_nilai_retur` int(10) UNSIGNED NOT NULL,
  `diskon_retur` int(10) UNSIGNED NOT NULL,
  `harga_neto_retur` int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for penjualan_retur_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_retur_dokumen`;
CREATE TABLE `penjualan_retur_dokumen`  (
  `id_penjualan_retur` int(10) UNSIGNED NOT NULL,
  `id_file_picker` int(10) UNSIGNED NOT NULL,
  `urut` tinyint(3) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id_role` smallint(5) UNSIGNED NOT NULL,
  `nama_role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `judul_role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_module` smallint(5) UNSIGNED NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'Tabel yang berisi daftar role, role ini mengatur bagaimana user mengakses module, role ini nantinya diassign ke user' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for role_module_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_module_permission`;
CREATE TABLE `role_module_permission`  (
  `id_role` smallint(5) UNSIGNED NOT NULL,
  `id_module_permission` smallint(5) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for satuan_unit
-- ----------------------------
DROP TABLE IF EXISTS `satuan_unit`;
CREATE TABLE `satuan_unit`  (
  `id_satuan_unit` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_satuan_unit`) USING BTREE,
  UNIQUE INDEX `unique_satuan_unit_name_code`(`nama_satuan`, `satuan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `param` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for setting_user
-- ----------------------------
DROP TABLE IF EXISTS `setting_user`;
CREATE TABLE `setting_user`  (
  `id_user` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `param` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id_supplier` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_wilayah_kelurahan` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_supplier`) USING BTREE,
  UNIQUE INDEX `unique_supplier_name_address`(`nama_supplier`, `alamat_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for transfer_barang
-- ----------------------------
DROP TABLE IF EXISTS `transfer_barang`;
CREATE TABLE `transfer_barang`  (
  `id_transfer_barang` int(10) UNSIGNED NOT NULL,
  `id_gudang_asal` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `id_gudang_tujuan` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `no_squence` mediumint(6) UNSIGNED ZEROFILL NOT NULL DEFAULT 000000,
  `no_nota_transfer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_nota_transfer` date NULL DEFAULT NULL,
  `id_jenis_harga_transfer` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `sub_total_transfer` int(10) UNSIGNED NOT NULL,
  `diskon_jenis_transfer` enum('%','rp') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diskon_nilai_transfer` int(10) UNSIGNED NOT NULL,
  `penyesuaian_transfer` int(11) NOT NULL,
  `total_qty_transfer` int(10) UNSIGNED NULL DEFAULT NULL,
  `total_diskon_item_transfer` int(10) UNSIGNED NOT NULL,
  `neto_transfer` int(10) UNSIGNED NOT NULL,
  `id_user_input` int(10) UNSIGNED NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user_update` int(10) UNSIGNED NULL DEFAULT NULL,
  `tgl_update` datetime NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for transfer_barang_detail
-- ----------------------------
DROP TABLE IF EXISTS `transfer_barang_detail`;
CREATE TABLE `transfer_barang_detail`  (
  `id_transfer_barang_detail` int(10) UNSIGNED NOT NULL,
  `id_transfer_barang` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `qty_transfer` tinyint(3) UNSIGNED NOT NULL,
  `harga_total_transfer` int(10) UNSIGNED NOT NULL,
  `diskon_jenis_transfer` enum('%','rp') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diskon_nilai_transfer` int(10) UNSIGNED NOT NULL,
  `diskon_transfer` int(10) UNSIGNED NOT NULL,
  `harga_neto_transfer` int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `default_page_type` enum('url','id_module','id_role') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `default_page_url` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `default_page_id_module` smallint(5) UNSIGNED NULL DEFAULT NULL,
  `default_page_id_role` smallint(5) UNSIGNED NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'Tabel user untuk login' ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for user_login_activity
-- ----------------------------
DROP TABLE IF EXISTS `user_login_activity`;
CREATE TABLE `user_login_activity`  (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_activity` tinyint(4) NOT NULL,
  `time` datetime NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for user_login_activity_ref
-- ----------------------------
DROP TABLE IF EXISTS `user_login_activity_ref`;
CREATE TABLE `user_login_activity_ref`  (
  `id_activity` tinyint(3) UNSIGNED NOT NULL,
  `value` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_role` smallint(5) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'Tabel yang berisi role yang dimili oleh masing masing user' ROW_FORMAT = COMPACT;

-- ----------------------------
-- Table structure for user_token
-- ----------------------------
DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token`  (
  `selector` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `action` enum('register','remember','recovery','activation') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for wilayah_kabupaten
-- ----------------------------
DROP TABLE IF EXISTS `wilayah_kabupaten`;
CREATE TABLE `wilayah_kabupaten`  (
  `id_wilayah_kabupaten` int(10) UNSIGNED NOT NULL,
  `id_wilayah_propinsi` int(10) UNSIGNED NOT NULL,
  `nama_kabupaten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ibukota` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `k_bsni` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for wilayah_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `wilayah_kecamatan`;
CREATE TABLE `wilayah_kecamatan`  (
  `id_wilayah_kecamatan` int(10) UNSIGNED NOT NULL,
  `id_wilayah_kabupaten` int(10) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for wilayah_kelurahan
-- ----------------------------
DROP TABLE IF EXISTS `wilayah_kelurahan`;
CREATE TABLE `wilayah_kelurahan`  (
  `id_wilayah_kelurahan` int(10) UNSIGNED NOT NULL,
  `id_wilayah_kecamatan` int(10) UNSIGNED NOT NULL,
  `nama_kelurahan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode_pos` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for wilayah_propinsi
-- ----------------------------
DROP TABLE IF EXISTS `wilayah_propinsi`;
CREATE TABLE `wilayah_propinsi`  (
  `id_wilayah_propinsi` int(10) UNSIGNED NOT NULL,
  `nama_propinsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ibukota` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `p_bsni` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
