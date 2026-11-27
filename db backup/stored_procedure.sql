/*
 Navicat Premium Data Transfer

 Source Server         : depot
 Source Server Type    : MySQL
 Source Server Version : 50737 (5.7.37-log)
 Source Host           : localhost:3306
 Source Schema         : db_kasirpro

 Target Server Type    : MySQL
 Target Server Version : 50737 (5.7.37-log)
 File Encoding         : 65001

 Date: 27/11/2026 07:05:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- View structure for view_detailpenjualantahunini
-- ----------------------------
DROP VIEW IF EXISTS `view_detailpenjualantahunini`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_detailpenjualantahunini` AS select `p`.`id_penjualan` AS `id_penjualan`,`p`.`no_invoice` AS `no_invoice`,`p`.`tgl_invoice` AS `tgl_invoice`,`p`.`id_customer` AS `id_customer`,`c`.`nama_customer` AS `nama_customer`,`pd`.`id_barang` AS `id_barang`,`b`.`nama_barang` AS `nama_barang`,`b`.`id_barang_kategori` AS `id_barang_kategori`,`bk`.`nama_kategori` AS `nama_kategori`,`pd`.`satuan` AS `satuan`,`pd`.`harga_satuan` AS `harga_satuan`,`pd`.`qty` AS `qty`,`pd`.`harga_total` AS `harga_total`,`p`.`status` AS `status` from ((((`penjualan` `p` join `customer` `c` on((`p`.`id_customer` = `c`.`id_customer`))) join `penjualan_detail` `pd` on((`p`.`id_penjualan` = `pd`.`id_penjualan`))) join `barang` `b` on((`pd`.`id_barang` = `b`.`id_barang`))) join `barang_kategori` `bk` on((`b`.`id_barang_kategori` = `bk`.`id_barang_kategori`))) where (`p`.`tgl_invoice` = curdate());

-- ----------------------------
-- View structure for view_detilpenjualan
-- ----------------------------
DROP VIEW IF EXISTS `view_detilpenjualan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_detilpenjualan` AS select `p`.`id_penjualan` AS `id_penjualan`,`p`.`no_invoice` AS `no_invoice`,`p`.`tgl_invoice` AS `tgl_invoice`,`p`.`status` AS `status`,`p`.`id_customer` AS `id_customer`,`c`.`nama_customer` AS `nama_customer`,`pd`.`id_barang` AS `id_barang`,`b`.`nama_barang` AS `nama_barang`,`s`.`nama_satuan` AS `nama_satuan`,`pd`.`qty` AS `qty`,`pd`.`harga_satuan` AS `harga_satuan`,`pd`.`harga_total` AS `harga_total`,`p`.`total_diskon` AS `total_diskon`,`p`.`sub_total` AS `sub_total`,`p`.`neto` AS `neto`,`p`.`total_bayar` AS `total_bayar`,`p`.`kembali` AS `kembali`,`p`.`kurang_bayar` AS `kurang_bayar`,`p`.`jenis_bayar` AS `jenis_bayar` from ((((`penjualan` `p` join `customer` `c` on((`p`.`id_customer` = `c`.`id_customer`))) join `penjualan_detail` `pd` on((`p`.`id_penjualan` = `pd`.`id_penjualan`))) join `barang` `b` on((`pd`.`id_barang` = `b`.`id_barang`))) join `satuan_unit` `s` on((`b`.`id_satuan_unit` = `s`.`id_satuan_unit`))) order by `p`.`id_penjualan`;

-- ----------------------------
-- View structure for view_pendapatanharian
-- ----------------------------
DROP VIEW IF EXISTS `view_pendapatanharian`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_pendapatanharian` AS select `p`.`id_penjualan` AS `id_penjualan`,`p`.`no_invoice` AS `no_invoice`,`p`.`tgl_invoice` AS `tgl_invoice`,`p`.`id_customer` AS `id_customer`,`c`.`nama_customer` AS `nama_customer`,sum(`pd`.`harga_total`) AS `jumlah_harga`,`p`.`total_bayar` AS `total_bayar`,`p`.`status` AS `status`,`p`.`jenis_bayar` AS `jenis_bayar` from ((((`penjualan` `p` join `customer` `c` on((`p`.`id_customer` = `c`.`id_customer`))) join `penjualan_detail` `pd` on((`p`.`id_penjualan` = `pd`.`id_penjualan`))) join `barang` `b` on((`pd`.`id_barang` = `b`.`id_barang`))) join `barang_kategori` `bk` on((`b`.`id_barang_kategori` = `bk`.`id_barang_kategori`))) where (`p`.`tgl_invoice` = curdate()) group by `p`.`tgl_invoice`,`c`.`id_customer`;

-- ----------------------------
-- View structure for view_rekapmingguan
-- ----------------------------
DROP VIEW IF EXISTS `view_rekapmingguan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_rekapmingguan` AS select `p`.`id_penjualan` AS `id_penjualan`,`p`.`no_invoice` AS `no_invoice`,`p`.`tgl_invoice` AS `tgl_invoice`,`p`.`id_customer` AS `id_customer`,`c`.`nama_customer` AS `nama_customer`,date_format(`p`.`tgl_invoice`,'%W') AS `hari`,`pd`.`id_barang` AS `id_barang`,`b`.`nama_barang` AS `nama_barang`,sum(`pd`.`qty`) AS `subtotal_barang`,count(distinct `p`.`id_customer`) AS `jml_transaksi`,`p`.`tgl_input` AS `tgl_input` from (((`penjualan` `p` join `customer` `c` on((`p`.`id_customer` = `c`.`id_customer`))) join `penjualan_detail` `pd` on((`p`.`id_penjualan` = `pd`.`id_penjualan`))) join `barang` `b` on((`pd`.`id_barang` = `b`.`id_barang`))) group by `p`.`tgl_invoice`,`pd`.`id_barang` order by `p`.`id_penjualan`,`p`.`tgl_invoice`,`b`.`id_barang`;

-- ----------------------------
-- View structure for v_penjualan
-- ----------------------------
DROP VIEW IF EXISTS `v_penjualan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_penjualan` AS select `p`.`id_penjualan` AS `id_penjualan`,`p`.`no_invoice` AS `no_invoice`,`p`.`tgl_invoice` AS `tgl_invoice`,`p`.`id_customer` AS `id_customer`,`c`.`nama_customer` AS `nama_customer`,`p`.`id_jenis_harga` AS `id_jenis_harga`,`jh`.`nama_jenis_harga` AS `nama_jenis_harga`,`p`.`diskon_jenis` AS `diskon_jenis`,`p`.`diskon_nilai` AS `diskon_nilai`,`p`.`diskon` AS `diskon`,`p`.`total_diskon` AS `total_diskon`,`p`.`sub_total` AS `sub_total`,`p`.`penyesuaian` AS `penyesuaian`,`p`.`pajak_display_text` AS `pajak_display_text`,`p`.`pajak_persen` AS `pajak_persen`,`p`.`pajak_nilai` AS `pajak_nilai`,`p`.`neto` AS `neto`,`p`.`total_bayar` AS `total_bayar`,`p`.`kembali` AS `kembali`,`p`.`kurang_bayar` AS `kurang_bayar`,`p`.`jenis_bayar` AS `jenis_bayar`,`p`.`status` AS `status`,`p`.`harga_pokok` AS `harga_pokok`,`p`.`untung_rugi` AS `untung_rugi`,`p`.`id_user_input` AS `id_user_input`,`p`.`tgl_input` AS `tgl_input` from ((`penjualan` `p` left join `jenis_harga` `jh` on((`p`.`id_jenis_harga` = `jh`.`id_jenis_harga`))) join `customer` `c` on((`p`.`id_customer` = `c`.`id_customer`)));

-- ----------------------------
-- Procedure structure for getBarangHarian
-- ----------------------------
DROP PROCEDURE IF EXISTS `getBarangHarian`;
delimiter ;;
CREATE PROCEDURE `getBarangHarian`(IN `TGL_AWAL` date,IN `TGL_AKHIR` date)
BEGIN


set @sql = (
    SELECT GROUP_CONCAT(DISTINCT
        CONCAT(
            "SUM(CASE WHEN nama_barang='", nama_barang, "' THEN subtotal_barang END) AS `", nama_barang, "`"
        )
    ORDER BY id_barang ASC)
    FROM (SELECT
	p.id_penjualan AS id_penjualan,
	p.no_invoice AS no_invoice,
	p.tgl_invoice AS tgl_invoice,
	date_format( `p`.`tgl_invoice`, '%W' ) AS hari,
	c.id_customer as id_customer,
	pd.id_barang AS id_barang,
	b.nama_barang AS nama_barang,
	c.nama_customer AS nama_customer,
	sum( pd.qty ) AS subtotal_barang
	FROM
		penjualan AS p
		JOIN customer AS c USING ( id_customer )
		JOIN penjualan_detail AS pd USING ( id_penjualan )
		JOIN barang AS b USING ( id_barang ) 
	WHERE
		tgl_invoice BETWEEN `TGL_AWAL` AND `TGL_AKHIR`
	GROUP BY 
		p.tgl_invoice, p.id_customer) as v
);

-- SET @row_num = 0; (@row_num:=@row_num+1)AS No
set @sql = concat("select id_penjualan, no_invoice, tgl_invoice, nama_customer, ", @sql, ", jumlah_tagihan, jenis_bayar from ", 
"(SELECT
	p.id_penjualan AS id_penjualan,
	p.no_invoice AS no_invoice,
	p.tgl_invoice AS tgl_invoice,
	date_format( `p`.`tgl_invoice`, '%W' ) AS hari,
	c.id_customer as id_customer,
	pd.id_barang AS id_barang,
	b.nama_barang AS nama_barang,
	c.nama_customer AS nama_customer,
	sum( pd.qty ) AS subtotal_barang,
	SUM(p.neto) as jumlah_tagihan,
	p.jenis_bayar as jenis_bayar
	FROM
		penjualan AS p
		JOIN customer AS c USING ( id_customer )
		JOIN penjualan_detail AS pd USING ( id_penjualan )
		JOIN barang AS b USING ( id_barang ) 
	WHERE
		tgl_invoice BETWEEN '",`TGL_AWAL`,"' AND '",`TGL_AKHIR`,"'
	GROUP BY
		p.id_customer,
		p.no_invoice,
		pd.id_barang) as vr"," group by tgl_invoice, id_customer ORDER BY id_penjualan ASC");
prepare stmt from @sql;
execute stmt;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for getTanggalMingguini
-- ----------------------------
DROP PROCEDURE IF EXISTS `getTanggalMingguini`;
delimiter ;;
CREATE PROCEDURE `getTanggalMingguini`()
BEGIN
SET @@lc_time_names = 'id_ID';
(SELECT DISTINCT DATE_FORMAT(tgl_invoice, "%W") AS tgl_invoice FROM view_rekapmingguan);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for penjualanbarangmingguini
-- ----------------------------
DROP PROCEDURE IF EXISTS `penjualanbarangmingguini`;
delimiter ;;
CREATE PROCEDURE `penjualanbarangmingguini`()
BEGIN

SET @@lc_time_names = 'id_ID';
set @sql = (
    select group_concat(distinct
        concat(
            "sum(case when tgl_invoice='", tgl_invoice, "' then subtotal_barang end) as `", DATE_FORMAT(tgl_invoice, '%d-%m-%Y'), "`"
        )
    )
    from view_rekapmingguan WHERE tgl_invoice BETWEEN '2026-11-16' AND '2026-11-21'
);
set @sql = concat("select id_barang, nama_barang, ", @sql, " from view_rekapmingguan group by `id_barang`");
prepare stmt from @sql;
execute stmt;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for tanggalMingguan
-- ----------------------------
DROP PROCEDURE IF EXISTS `tanggalMingguan`;
delimiter ;;
CREATE PROCEDURE `tanggalMingguan`()
BEGIN
SET @startDate = adddate(CURRENT_DATE, INTERVAL 1-DAYOFWEEK(CURRENT_DATE) DAY);
SET @endWeek = adddate(curdate(), INTERVAL 7-DAYOFWEEK(curdate()) DAY);

SELECT DATE_FORMAT(@startDate, '%d-%m-%Y') as tgl_awal,DATE_FORMAT(@endWeek, '%d-%m-%Y') as tgl_akhir;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for ViewPenjualanMingguan
-- ----------------------------
DROP PROCEDURE IF EXISTS `ViewPenjualanMingguan`;
delimiter ;;
CREATE PROCEDURE `ViewPenjualanMingguan`(IN `TGL_AWAL` date,IN `TGL_AKHIR` date)
BEGIN

SET @@lc_time_names = 'id_ID';
set @sql = (
    SELECT group_concat(DISTINCT
        concat(
            "SUM(CASE WHEN tgl_invoice='", tgl_invoice, "' THEN subtotal_barang END) AS `", DATE_FORMAT(tgl_invoice, '%d-%m-%Y'), "`"
        )
    )
    FROM (SELECT
	p.id_penjualan AS id_penjualan,
	p.no_invoice AS no_invoice,
	p.tgl_invoice AS tgl_invoice,
	date_format( `p`.`tgl_invoice`, '%W' ) AS hari,
	pd.id_barang AS id_barang,
	b.nama_barang AS nama_barang,
	sum( pd.qty ) AS subtotal_barang,
	count( DISTINCT `p`.`id_customer` ) AS jml_transaksi,
	p.tgl_input AS tgl_input 
FROM
penjualan AS p
JOIN customer AS c USING(id_customer)
JOIN penjualan_detail AS pd USING(id_penjualan)
JOIN barang AS b USING(id_barang)
WHERE tgl_invoice BETWEEN `TGL_AWAL` AND `TGL_AKHIR`
GROUP BY
	p.tgl_invoice,
	pd.id_barang 
ORDER BY
	p.tgl_invoice ASC) as v
);
-- set @sql = concat("select id_barang, nama_barang, ", @sql, " from view_rekapmingguan group by `id_barang`");
set @sql = concat("select id_barang, nama_barang, ", @sql, " from ", 
"(SELECT
	p.id_penjualan AS id_penjualan,
	p.no_invoice AS no_invoice,
	p.tgl_invoice AS tgl_invoice,
	date_format( `p`.`tgl_invoice`, '%W' ) AS hari,
	pd.id_barang AS id_barang,
	b.nama_barang AS nama_barang,
	sum( pd.qty ) AS subtotal_barang,
	count( DISTINCT `p`.`id_customer` ) AS jml_transaksi,
	p.tgl_input AS tgl_input 
FROM
penjualan AS p 
JOIN customer AS c USING(id_customer)
JOIN penjualan_detail AS pd USING(id_penjualan)
JOIN barang AS b USING(id_barang)
WHERE tgl_invoice BETWEEN '",`TGL_AWAL`,"' AND '",`TGL_AKHIR`,"' 
GROUP BY
	p.tgl_invoice,
	pd.id_barang 
ORDER BY
	p.tgl_invoice ASC) as vr"," group by `id_barang`");
prepare stmt from @sql;
execute stmt;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for view_penjualan
-- ----------------------------
DROP PROCEDURE IF EXISTS `view_penjualan`;
delimiter ;;
CREATE PROCEDURE `view_penjualan`(IN `Tahun` year)
BEGIN
	#Routine body goes here...
SELECT
	p.id_penjualan AS id_penjualan,
	p.no_invoice AS no_invoice,
	p.tgl_invoice AS tgl_invoice,
	p.id_customer AS id_customer,
	c.nama_customer AS nama_customer,
	p.id_jenis_harga AS id_jenis_harga,
	jh.nama_jenis_harga AS nama_jenis_harga,
	p.diskon_jenis AS diskon_jenis,
	p.diskon_nilai AS diskon_nilai,
	p.diskon AS diskon,
	p.total_diskon AS total_diskon,
	p.sub_total AS sub_total,
	p.penyesuaian AS penyesuaian,
	p.pajak_display_text AS pajak_display_text,
	p.pajak_persen AS pajak_persen,
	p.pajak_nilai AS pajak_nilai,
	p.neto AS neto,
	p.total_bayar AS total_bayar,
	p.kembali AS kembali,
	p.kurang_bayar AS kurang_bayar,
	p.jenis_bayar AS jenis_bayar,
	p.`status` AS `status`,
	p.harga_pokok AS harga_pokok,
	p.untung_rugi AS untung_rugi,
	p.id_user_input AS id_user_input,
	p.tgl_input AS tgl_input 
FROM
	(
		( penjualan AS p LEFT JOIN jenis_harga AS jh ON ( ( p.id_jenis_harga = jh.id_jenis_harga ) ) )
		JOIN customer AS c ON ( ( p.id_customer = c.id_customer ) ) 
	) 
WHERE
	(
	YEAR ( `p`.`tgl_invoice` ) = `Tahun`);
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
