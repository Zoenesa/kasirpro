CREATE TABLE `bank` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `account_number` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '0',
  `account_name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '0',
  `swift_code` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '0',
  `credit` double(20,2) NOT NULL DEFAULT '0.00',
  `debit` double(20,2) NOT NULL DEFAULT '0.00',
  `saldo` double(20,2) DEFAULT NULL,
  `logo` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `bank` VALUES ('1','BCA','Jogja','123214113122321','Khoerul','-','0','1000000','100000000','','2026-10-06 11:20:30','2026-10-06 11:20:52');


CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cache` VALUES ('admin@admin.com|103.177.101.45','i:1;','1760386557');
INSERT INTO `cache` VALUES ('admin@admin.com|103.177.101.45:timer','i:1760386557;','1760386557');
INSERT INTO `cache` VALUES ('admin@admin|182.5.9.136','i:1;','1755308718');
INSERT INTO `cache` VALUES ('admin@admin|182.5.9.136:timer','i:1755308718;','1755308718');
INSERT INTO `cache` VALUES ('admin@example.com|114.10.144.192','i:1;','1762895340');
INSERT INTO `cache` VALUES ('admin@example.com|114.10.144.192:timer','i:1762895340;','1762895340');
INSERT INTO `cache` VALUES ('admin@example.com|182.2.144.119','i:3;','1754903078');
INSERT INTO `cache` VALUES ('admin@example.com|182.2.144.119:timer','i:1754903078;','1754903078');
INSERT INTO `cache` VALUES ('admin@gmail.com|114.10.158.31','i:1;','1762653199');
INSERT INTO `cache` VALUES ('admin@gmail.com|114.10.158.31:timer','i:1762653199;','1762653199');
INSERT INTO `cache` VALUES ('admin@gmail.com|182.2.40.226','i:1;','1776611121');
INSERT INTO `cache` VALUES ('admin@gmail.com|182.2.40.226:timer','i:1776611121;','1776611121');
INSERT INTO `cache` VALUES ('admin@gmail.com|2404:8000:1052:5d5:d8ae:1ec6:721a:d2fc','i:1;','1759905796');
INSERT INTO `cache` VALUES ('admin@gmail.com|2404:8000:1052:5d5:d8ae:1ec6:721a:d2fc:timer','i:1759905796;','1759905796');
INSERT INTO `cache` VALUES ('admin@gmail.com|2404:c0:ba01:15:210a:5cfa:b361:15fa','i:2;','1778634898');
INSERT INTO `cache` VALUES ('admin@gmail.com|2404:c0:ba01:15:210a:5cfa:b361:15fa:timer','i:1778634898;','1778634898');
INSERT INTO `cache` VALUES ('admin1@mail.com|182.253.117.101','i:1;','1757140137');
INSERT INTO `cache` VALUES ('admin1@mail.com|182.253.117.101:timer','i:1757140137;','1757140137');
INSERT INTO `cache` VALUES ('arcstore@mail.com|114.122.7.16','i:1;','1765718675');
INSERT INTO `cache` VALUES ('arcstore@mail.com|114.122.7.16:timer','i:1765718675;','1765718675');
INSERT INTO `cache` VALUES ('arcstore@mail.com|140.213.17.249','i:2;','1765188206');
INSERT INTO `cache` VALUES ('arcstore@mail.com|140.213.17.249:timer','i:1765188206;','1765188206');
INSERT INTO `cache` VALUES ('arissetiyanto24@gmail.com|157.119.223.11','i:1;','1757579138');
INSERT INTO `cache` VALUES ('arissetiyanto24@gmail.com|157.119.223.11:timer','i:1757579138;','1757579138');
INSERT INTO `cache` VALUES ('arkastore@gmail.com|182.1.211.194','i:1;','1759731621');
INSERT INTO `cache` VALUES ('arkastore@gmail.com|182.1.211.194:timer','i:1759731621;','1759731621');
INSERT INTO `cache` VALUES ('arkastore@mail.com|103.144.169.101','i:1;','1763436238');
INSERT INTO `cache` VALUES ('arkastore@mail.com|103.144.169.101:timer','i:1763436238;','1763436238');
INSERT INTO `cache` VALUES ('arkastore@mail.com|114.4.83.164','i:1;','1757406624');
INSERT INTO `cache` VALUES ('arkastore@mail.com|114.4.83.164:timer','i:1757406623;','1757406623');
INSERT INTO `cache` VALUES ('arkastore@mail.com|182.8.122.63','i:2;','1760473142');
INSERT INTO `cache` VALUES ('arkastore@mail.com|182.8.122.63:timer','i:1760473142;','1760473142');
INSERT INTO `cache` VALUES ('arkastore@mail.com|2001:448a:c130:56:5fcf:c877:30bf:9288','i:1;','1768478000');
INSERT INTO `cache` VALUES ('arkastore@mail.com|2001:448a:c130:56:5fcf:c877:30bf:9288:timer','i:1768478000;','1768478000');
INSERT INTO `cache` VALUES ('arkastore@mail.com|27.124.95.118','i:2;','1760599932');
INSERT INTO `cache` VALUES ('arkastore@mail.com|27.124.95.118:timer','i:1760599932;','1760599932');
INSERT INTO `cache` VALUES ('arkatore@mail.com|114.4.83.164','i:1;','1757406600');
INSERT INTO `cache` VALUES ('arkatore@mail.com|114.4.83.164:timer','i:1757406600;','1757406600');
INSERT INTO `cache` VALUES ('arkstor@mail.com|114.125.6.52','i:1;','1756715519');
INSERT INTO `cache` VALUES ('arkstor@mail.com|114.125.6.52:timer','i:1756715519;','1756715519');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.105.78.197','i:1;','1763606199');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.105.78.197:timer','i:1763606199;','1763606199');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.144.169.101','i:2;','1763350678');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.144.169.101:timer','i:1763350678;','1763350678');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.156.96.68','i:2;','1755741440');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.156.96.68:timer','i:1755741440;','1755741440');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.157.62.233','i:2;','1789407320');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.157.62.233:timer','i:1789407320;','1789407320');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.159.96.125','i:1;','1781271123');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.159.96.125:timer','i:1781271123;','1781271123');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.181.254.140','i:2;','1762831887');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|103.181.254.140:timer','i:1762831887;','1762831887');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|110.137.72.145','i:1;','1757116337');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|110.137.72.145:timer','i:1757116337;','1757116337');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|111.94.114.219','i:1;','1760570439');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|111.94.114.219:timer','i:1760570439;','1760570439');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|114.10.82.203','i:2;','1784940439');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|114.10.82.203:timer','i:1784940439;','1784940439');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|114.122.43.222','i:2;','1756721575');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|114.122.43.222:timer','i:1756721575;','1756721575');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|114.122.70.109','i:1;','1758360130');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|114.122.70.109:timer','i:1758360130;','1758360130');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|118.99.91.14','i:1;','1762566102');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|118.99.91.14:timer','i:1762566102;','1762566102');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|125.166.119.146','i:1;','1768615127');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|125.166.119.146:timer','i:1768615127;','1768615127');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|139.0.140.180','i:1;','1759888115');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|139.0.140.180:timer','i:1759888115;','1759888115');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|140.213.217.112','i:2;','1757124801');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|140.213.217.112:timer','i:1757124801;','1757124801');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|158.140.182.36','i:1;','1757073915');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|158.140.182.36:timer','i:1757073915;','1757073915');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|160.191.233.99','i:2;','1784652664');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|160.191.233.99:timer','i:1784652664;','1784652664');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|180.249.62.155','i:2;','1759721039');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|180.249.62.155:timer','i:1759721039;','1759721039');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.1.211.194','i:2;','1759731635');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.1.211.194:timer','i:1759731635;','1759731635');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.10.99.47','i:1;','1761824962');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.10.99.47:timer','i:1761824962;','1761824962');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.253.163.195','i:1;','1777727592');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.253.163.195:timer','i:1777727592;','1777727592');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.3.43.98','i:2;','1758860485');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.3.43.98:timer','i:1758860485;','1758860485');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.3.46.85','i:2;','1758484370');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.3.46.85:timer','i:1758484370;','1758484370');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.8.122.205','i:2;','1761832214');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.8.122.205:timer','i:1761832214;','1761832214');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.8.183.59','i:1;','1791287491');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.8.183.59:timer','i:1791287491;','1791287491');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.9.161.79','i:1;','1756709935');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|182.9.161.79:timer','i:1756709935;','1756709935');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:2050:c341:e009:5a88:9cd8:cab6','i:1;','1793259455');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:2050:c341:e009:5a88:9cd8:cab6:timer','i:1793259455;','1793259455');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:20a3:9b11:35c1:8bc4:a211:6663','i:1;','1760421885');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:20a3:9b11:35c1:8bc4:a211:6663:timer','i:1760421885;','1760421885');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:20b0:11d0:f843:e2e0:151e:dc9','i:2;','1770457088');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:20b0:11d0:f843:e2e0:151e:dc9:timer','i:1770457088;','1770457088');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:5010:28e7:11a7:3218:7b23:2c26','i:2;','1775122877');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:5010:28e7:11a7:3218:7b23:2c26:timer','i:1775122877;','1775122877');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:7030:347:c4f6:9004:c99c:7911','i:1;','1761046985');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2001:448a:7030:347:c4f6:9004:c99c:7911:timer','i:1761046985;','1761046985');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|202.152.139.146','i:1;','1756270602');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|202.152.139.146:timer','i:1756270602;','1756270602');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2404:c0:20e0::4db6:cc62','i:3;','1754557079');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2404:c0:20e0::4db6:cc62:timer','i:1754557079;','1754557079');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2404:c0:5a20::639:fc16','i:2;','1770247887');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2404:c0:5a20::639:fc16:timer','i:1770247887;','1770247887');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2404:c0:ba01:15:210a:5cfa:b361:15fa','i:1;','1778635328');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|2404:c0:ba01:15:210a:5cfa:b361:15fa:timer','i:1778635328;','1778635328');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|36.71.163.80','i:1;','1758627408');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|36.71.163.80:timer','i:1758627408;','1758627408');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|36.79.65.116','i:2;','1755415557');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|36.79.65.116:timer','i:1755415557;','1755415557');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|36.83.230.188','i:2;','1755354288');
INSERT INTO `cache` VALUES ('arkstore@gmail.com|36.83.230.188:timer','i:1755354288;','1755354288');
INSERT INTO `cache` VALUES ('arkstore@mai.com|114.122.111.50','i:1;','1785561395');
INSERT INTO `cache` VALUES ('arkstore@mai.com|114.122.111.50:timer','i:1785561395;','1785561395');
INSERT INTO `cache` VALUES ('arkstore@mail.com|103.156.16.95','i:2;','1764833246');
INSERT INTO `cache` VALUES ('arkstore@mail.com|103.156.16.95:timer','i:1764833246;','1764833246');
INSERT INTO `cache` VALUES ('arkstore@mail.con|114.10.40.75','i:1;','1771832924');
INSERT INTO `cache` VALUES ('arkstore@mail.con|114.10.40.75:timer','i:1771832924;','1771832924');
INSERT INTO `cache` VALUES ('arkstore@mail|101.255.212.38','i:1;','1768652183');
INSERT INTO `cache` VALUES ('arkstore@mail|101.255.212.38:timer','i:1768652183;','1768652183');
INSERT INTO `cache` VALUES ('arkstore@mail|180.242.69.206','i:1;','1759113411');
INSERT INTO `cache` VALUES ('arkstore@mail|180.242.69.206:timer','i:1759113411;','1759113411');
INSERT INTO `cache` VALUES ('arkstore@mil.com|202.150.80.23','i:1;','1765857623');
INSERT INTO `cache` VALUES ('arkstore@mil.com|202.150.80.23:timer','i:1765857623;','1765857623');
INSERT INTO `cache` VALUES ('arstore@mail.com|103.129.150.90','i:1;','1757320346');
INSERT INTO `cache` VALUES ('arstore@mail.com|103.129.150.90:timer','i:1757320346;','1757320346');
INSERT INTO `cache` VALUES ('articflap@gmail.com|127.0.0.1','i:1;','1731944601');
INSERT INTO `cache` VALUES ('articflap@gmail.com|127.0.0.1:timer','i:1731944601;','1731944601');
INSERT INTO `cache` VALUES ('bkw295@gmail.com|36.83.230.236','i:2;','1767153716');
INSERT INTO `cache` VALUES ('bkw295@gmail.com|36.83.230.236:timer','i:1767153716;','1767153716');
INSERT INTO `cache` VALUES ('ismailmahaputra@gmail.com|182.5.9.136','i:1;','1755308607');
INSERT INTO `cache` VALUES ('ismailmahaputra@gmail.com|182.5.9.136:timer','i:1755308607;','1755308607');
INSERT INTO `cache` VALUES ('ismailmahaputra01@gmail.com|182.5.9.136','i:1;','1755308644');
INSERT INTO `cache` VALUES ('ismailmahaputra01@gmail.com|182.5.9.136:timer','i:1755308644;','1755308644');
INSERT INTO `cache` VALUES ('its@dev.com|114.10.158.31','i:1;','1762667292');
INSERT INTO `cache` VALUES ('its@dev.com|114.10.158.31:timer','i:1762667292;','1762667292');
INSERT INTO `cache` VALUES ('iyenpatmorgana@gmail.com|36.74.13.215','i:1;','1757749476');
INSERT INTO `cache` VALUES ('iyenpatmorgana@gmail.com|36.74.13.215:timer','i:1757749476;','1757749476');
INSERT INTO `cache` VALUES ('jojohair285@gmail.com|103.217.224.206','i:3;','1762490063');
INSERT INTO `cache` VALUES ('jojohair285@gmail.com|103.217.224.206:timer','i:1762490063;','1762490063');
INSERT INTO `cache` VALUES ('juliaamarwati0907@gmail.com|103.156.16.95','i:2;','1764901483');
INSERT INTO `cache` VALUES ('juliaamarwati0907@gmail.com|103.156.16.95:timer','i:1764901483;','1764901483');
INSERT INTO `cache` VALUES ('juliaambarwati0907@gmail.com|103.156.16.95','i:1;','1764902653');
INSERT INTO `cache` VALUES ('juliaambarwati0907@gmail.com|103.156.16.95:timer','i:1764902653;','1764902653');
INSERT INTO `cache` VALUES ('karyamustikainterior@gmail.com|182.5.9.136','i:1;','1755308634');
INSERT INTO `cache` VALUES ('karyamustikainterior@gmail.com|182.5.9.136:timer','i:1755308634;','1755308634');
INSERT INTO `cache` VALUES ('kasir@gmail.com|2404:8000:1052:5d5:d8ae:1ec6:721a:d2fc','i:1;','1759905817');
INSERT INTO `cache` VALUES ('kasir@gmail.com|2404:8000:1052:5d5:d8ae:1ec6:721a:d2fc:timer','i:1759905817;','1759905817');
INSERT INTO `cache` VALUES ('kasir@mail.com|160.22.205.253','i:3;','1757500454');
INSERT INTO `cache` VALUES ('kasir@mail.com|160.22.205.253:timer','i:1757500454;','1757500454');
INSERT INTO `cache` VALUES ('kasir@mail.com|180.254.227.139','i:1;','1769563170');
INSERT INTO `cache` VALUES ('kasir@mail.com|180.254.227.139:timer','i:1769563170;','1769563170');
INSERT INTO `cache` VALUES ('kasir@mail.com|182.10.97.109','i:1;','1761027020');
INSERT INTO `cache` VALUES ('kasir@mail.com|182.10.97.109:timer','i:1761027020;','1761027020');
INSERT INTO `cache` VALUES ('kontak.ecobox@gmail.com|114.10.45.171','i:2;','1757513883');
INSERT INTO `cache` VALUES ('kontak.ecobox@gmail.com|114.10.45.171:timer','i:1757513883;','1757513883');
INSERT INTO `cache` VALUES ('masrudinur@gmail.com|103.144.169.101','i:2;','1763436123');
INSERT INTO `cache` VALUES ('masrudinur@gmail.com|103.144.169.101:timer','i:1763436123;','1763436123');
INSERT INTO `cache` VALUES ('mitrakaryapertama@gmail.com|182.5.9.136','i:1;','1755308620');
INSERT INTO `cache` VALUES ('mitrakaryapertama@gmail.com|182.5.9.136:timer','i:1755308620;','1755308620');
INSERT INTO `cache` VALUES ('mnofafikaafthon@gmail.com|182.6.66.152','i:2;','1757408014');
INSERT INTO `cache` VALUES ('mnofafikaafthon@gmail.com|182.6.66.152:timer','i:1757408014;','1757408014');
INSERT INTO `cache` VALUES ('officewonosobo@gmail.com|2404:c0:3079:9c97:5ab8:8e0e:2356:a38a','i:1;','1771109187');
INSERT INTO `cache` VALUES ('officewonosobo@gmail.com|2404:c0:3079:9c97:5ab8:8e0e:2356:a38a:timer','i:1771109187;','1771109187');
INSERT INTO `cache` VALUES ('officewonosobo1@gmail.com|125.166.116.66','i:1;','1771173887');
INSERT INTO `cache` VALUES ('officewonosobo1@gmail.com|125.166.116.66:timer','i:1771173887;','1771173887');
INSERT INTO `cache` VALUES ('sali8295@gmail.com|36.68.54.117','i:2;','1759609454');
INSERT INTO `cache` VALUES ('sali8295@gmail.com|36.68.54.117:timer','i:1759609454;','1759609454');
INSERT INTO `cache` VALUES ('superadmin@laravel.com|2001:448a:1160:15ec:8560:77de:aa24:90e8','i:1;','1769482297');
INSERT INTO `cache` VALUES ('superadmin@laravel.com|2001:448a:1160:15ec:8560:77de:aa24:90e8:timer','i:1769482297;','1769482297');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|114.10.40.128','i:1;','1774146469');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|114.10.40.128:timer','i:1774146469;','1774146469');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|114.8.216.92','i:1;','1761153186');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|114.8.216.92:timer','i:1761153186;','1761153186');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|2001:448a:1160:15ec:8560:77de:aa24:90e8','i:1;','1769482313');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|2001:448a:1160:15ec:8560:77de:aa24:90e8:timer','i:1769482313;','1769482313');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|202.67.44.13','i:1;','1762437086');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|202.67.44.13:timer','i:1762437086;','1762437086');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|43.247.37.170','i:1;','1756179555');
INSERT INTO `cache` VALUES ('superadmin@laravel.kit|43.247.37.170:timer','i:1756179555;','1756179555');
INSERT INTO `cache` VALUES ('superadmin@mail.com|180.252.83.20','i:2;','1754120162');
INSERT INTO `cache` VALUES ('superadmin@mail.com|180.252.83.20:timer','i:1754120162;','1754120162');
INSERT INTO `cache` VALUES ('superadmin@mail.com|182.253.117.101','i:1;','1757140185');
INSERT INTO `cache` VALUES ('superadmin@mail.com|182.253.117.101:timer','i:1757140185;','1757140185');
INSERT INTO `cache` VALUES ('superadmin@mail.com|202.67.44.13','i:1;','1762437137');
INSERT INTO `cache` VALUES ('superadmin@mail.com|202.67.44.13:timer','i:1762437137;','1762437137');
INSERT INTO `cache` VALUES ('zonalaundrymks02@mail.com|140.213.217.77','i:2;','1757209193');
INSERT INTO `cache` VALUES ('zonalaundrymks02@mail.com|140.213.217.77:timer','i:1757209193;','1757209193');
INSERT INTO `cache` VALUES ('zonalaundrymks02@mail.com|182.1.210.144','i:4;','1757152829');
INSERT INTO `cache` VALUES ('zonalaundrymks02@mail.com|182.1.210.144:timer','i:1757152829;','1757152829');


CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_categories_categories` (`parent_id`),
  CONSTRAINT `FK_categories_categories` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `categories` VALUES ('1','Bahan Bangunan','','2026-10-29 14:52:06','2026-10-29 14:52:06');


CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `expense_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `expense_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `expense_id` bigint unsigned NOT NULL DEFAULT '0',
  `expense_category_id` int NOT NULL DEFAULT '0',
  `user_id` bigint unsigned NOT NULL DEFAULT '0',
  `customer_id` int DEFAULT '0',
  `amount` double NOT NULL,
  `note` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_expense_items_expense_categories` (`expense_category_id`),
  KEY `FK_expense_items_expenses` (`expense_id`),
  KEY `FK_expense_items_users` (`user_id`),
  KEY `FK_expense_items_customers` (`customer_id`),
  CONSTRAINT `FK_expense_items_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `FK_expense_items_expense_categories` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`),
  CONSTRAINT `FK_expense_items_expenses` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_expense_items_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `expense_payment` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `expense_id` bigint unsigned NOT NULL,
  `payment_method` enum('cash','bank_transfer') COLLATE utf8mb3_unicode_ci NOT NULL,
  `bank_id` bigint unsigned DEFAULT NULL,
  `amount_paid` double NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_note` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_expense_payment_expenses` (`expense_id`),
  KEY `FK_expense_payment_bank` (`bank_id`),
  CONSTRAINT `FK_expense_payment_bank` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`),
  CONSTRAINT `FK_expense_payment_expenses` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_id` bigint unsigned NOT NULL,
  `payment_method` enum('cash','bank_transfer','tempo') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `total_amount` double NOT NULL,
  `remaining_amount` double NOT NULL,
  `status` enum('lunas','belum lunas') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `expense_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_expenses_stores` (`store_id`),
  CONSTRAINT `FK_expenses_stores` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `layout_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `layout_id` int DEFAULT NULL,
  `sidebar_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link_hover_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_brand_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `navbar_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_hover_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `layout_id` (`layout_id`),
  CONSTRAINT `layout_settings_ibfk_1` FOREIGN KEY (`layout_id`) REFERENCES `layouts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `layout_settings` VALUES ('15','1','#0F172A','#E0E7FF','#93C5FD','#FF6F61','#1E3A8A','#3B82F6','#60A5FA','Poppins, sans-serif');
INSERT INTO `layout_settings` VALUES ('16','2','#2F855A','#F0FFF4','#68D391','#48BB78','#276749','#38A169','#81E6D9','Lora, serif');
INSERT INTO `layout_settings` VALUES ('17','3','#1A1F24','#ECF0F1','#3498DB','#E67E22','#34495E','#E74C3C','#C0392B','Roboto, sans-serif');


CREATE TABLE `layouts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `layouts` VALUES ('1','Layout 1','ini layout 1');
INSERT INTO `layouts` VALUES ('2','Layout 2','ini layout 2');
INSERT INTO `layouts` VALUES ('3','Layout 3','ini layout 3 dengan dominan warna biru');


CREATE TABLE `menu_permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `menu_id` (`menu_id`) USING BTREE,
  KEY `permission_id` (`permission_id`) USING BTREE,
  CONSTRAINT `menu_permissions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `menu_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menu_permissions` VALUES ('1','1','1','2024-08-06 19:33:50','2024-08-06 19:33:50');
INSERT INTO `menu_permissions` VALUES ('2','2','2','2024-08-06 19:34:26','2024-08-06 19:34:26');
INSERT INTO `menu_permissions` VALUES ('3','3','3','2024-08-06 19:34:40','2024-08-06 19:34:40');
INSERT INTO `menu_permissions` VALUES ('4','4','3','2024-08-06 19:34:54','2024-08-06 19:34:54');
INSERT INTO `menu_permissions` VALUES ('62','10','3','2024-08-14 18:47:33','2024-08-14 18:47:33');
INSERT INTO `menu_permissions` VALUES ('63','11','2','2024-08-14 11:49:51','2024-08-14 11:49:51');
INSERT INTO `menu_permissions` VALUES ('64','12','2','2024-08-14 11:49:58','2024-08-14 11:49:58');
INSERT INTO `menu_permissions` VALUES ('65','16','36','2024-08-14 11:50:03','2024-08-14 11:50:03');
INSERT INTO `menu_permissions` VALUES ('66','17','37','2024-08-14 13:44:09','2024-08-14 13:44:09');
INSERT INTO `menu_permissions` VALUES ('67','18','38','2024-08-14 14:48:12','2024-08-14 14:48:12');
INSERT INTO `menu_permissions` VALUES ('68','19','39','2024-08-14 14:57:46','2024-08-14 14:57:46');
INSERT INTO `menu_permissions` VALUES ('69','20','40','2024-08-15 03:18:41','2024-08-15 03:18:41');
INSERT INTO `menu_permissions` VALUES ('70','23','41','2024-08-15 06:15:03','2024-08-15 06:15:03');
INSERT INTO `menu_permissions` VALUES ('71','22','41','2024-08-15 06:15:16','2024-08-15 06:15:16');
INSERT INTO `menu_permissions` VALUES ('72','21','41','2024-08-15 06:16:08','2024-08-15 06:16:08');
INSERT INTO `menu_permissions` VALUES ('73','24','42','2024-08-15 06:25:45','2024-08-15 06:25:45');
INSERT INTO `menu_permissions` VALUES ('74','25','43','2024-08-15 06:32:52','2024-08-15 06:32:52');
INSERT INTO `menu_permissions` VALUES ('75','26','44','2024-08-15 10:52:16','2024-08-15 10:52:16');
INSERT INTO `menu_permissions` VALUES ('76','27','45','2024-08-19 09:15:51','2024-08-19 09:15:51');
INSERT INTO `menu_permissions` VALUES ('77','28','46','2024-08-19 09:19:12','2024-08-19 09:19:12');
INSERT INTO `menu_permissions` VALUES ('78','29','47','2024-08-23 02:17:47','2024-08-23 02:17:47');
INSERT INTO `menu_permissions` VALUES ('79','30','47','2024-08-23 02:18:00','2024-08-23 02:18:00');
INSERT INTO `menu_permissions` VALUES ('80','31','47','2024-08-23 02:18:12','2024-08-23 02:18:12');
INSERT INTO `menu_permissions` VALUES ('81','32','48','2024-08-23 02:18:23','2024-08-23 02:18:23');
INSERT INTO `menu_permissions` VALUES ('82','33','48','2024-08-23 02:18:32','2024-08-23 02:18:32');
INSERT INTO `menu_permissions` VALUES ('83','34','48','2024-08-23 02:18:39','2024-08-23 02:18:39');
INSERT INTO `menu_permissions` VALUES ('84','35','49','2024-08-28 02:15:30','2024-08-28 02:15:30');
INSERT INTO `menu_permissions` VALUES ('85','36','47','2024-08-30 05:35:07','2024-08-30 05:35:07');
INSERT INTO `menu_permissions` VALUES ('86','37','48','2024-09-04 01:26:09','2024-09-04 01:26:09');
INSERT INTO `menu_permissions` VALUES ('87','38','50','2024-09-10 12:13:54','2024-09-10 12:13:54');
INSERT INTO `menu_permissions` VALUES ('88','39','51','2024-09-10 12:14:54','2024-09-10 12:14:54');
INSERT INTO `menu_permissions` VALUES ('89','40','47','2024-09-12 01:19:07','2024-09-12 01:19:07');
INSERT INTO `menu_permissions` VALUES ('90','41','48','2024-09-12 03:49:38','2024-09-12 03:49:38');
INSERT INTO `menu_permissions` VALUES ('91','42','51','2024-09-12 03:50:04','2024-09-12 03:50:04');
INSERT INTO `menu_permissions` VALUES ('92','43','51','2024-09-12 03:50:13','2024-09-12 03:50:13');
INSERT INTO `menu_permissions` VALUES ('93','44','51','2024-09-12 03:50:20','2024-09-12 03:50:20');
INSERT INTO `menu_permissions` VALUES ('94','45','50','2024-09-12 03:50:29','2024-09-12 03:50:29');
INSERT INTO `menu_permissions` VALUES ('95','46','50','2024-09-12 03:50:34','2024-09-12 03:50:34');
INSERT INTO `menu_permissions` VALUES ('96','47','52','2024-09-17 15:12:56','2024-09-17 15:12:56');
INSERT INTO `menu_permissions` VALUES ('97','48','53','2024-09-20 17:27:58','2024-09-20 17:27:58');
INSERT INTO `menu_permissions` VALUES ('98','49','53','2024-09-20 17:28:07','2024-09-20 17:28:07');
INSERT INTO `menu_permissions` VALUES ('99','50','53','2024-09-20 17:28:18','2024-09-20 17:28:18');
INSERT INTO `menu_permissions` VALUES ('100','51','52','2024-09-24 16:48:01','2024-09-24 16:48:01');
INSERT INTO `menu_permissions` VALUES ('101','52','52','2024-09-26 18:59:13','2024-09-26 18:59:13');
INSERT INTO `menu_permissions` VALUES ('102','53','52','2024-09-26 18:59:29','2024-09-26 18:59:29');
INSERT INTO `menu_permissions` VALUES ('103','54','37','2024-10-19 09:23:38','2024-10-19 09:23:38');
INSERT INTO `menu_permissions` VALUES ('104','55','36','2024-10-19 15:09:47','2024-10-19 15:09:47');
INSERT INTO `menu_permissions` VALUES ('105','56','36','2024-10-19 15:11:09','2024-10-19 15:11:09');
INSERT INTO `menu_permissions` VALUES ('106','57','36','2024-10-19 16:10:49','2024-10-19 16:10:49');
INSERT INTO `menu_permissions` VALUES ('107','58','54','2024-11-18 22:18:08','2024-11-18 22:18:08');


CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `parent_id` (`parent_id`) USING BTREE,
  CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` VALUES ('1','Dashboard','dashboard','','bx-home','1','2024-08-04 19:56:05','2024-08-06 19:27:25');
INSERT INTO `menus` VALUES ('2','Users Management','','','bx-user','12','2024-08-04 19:56:05','2024-08-15 17:55:29');
INSERT INTO `menus` VALUES ('3','Menu Management','','','bx-data','13','2024-08-04 19:56:05','2024-08-15 17:55:32');
INSERT INTO `menus` VALUES ('4','Master Menu','menus','3','','96','2024-08-06 12:20:26','2024-08-10 09:00:22');
INSERT INTO `menus` VALUES ('10','Menu Permission','menupermission','3','','98','2024-08-07 02:28:10','2024-08-07 09:35:16');
INSERT INTO `menus` VALUES ('11','User Roles','userroles','2','','99','2024-08-08 04:39:12','2024-08-08 06:32:39');
INSERT INTO `menus` VALUES ('12','Master User','users','2','','98','2024-08-08 04:39:49','2024-08-10 08:59:07');
INSERT INTO `menus` VALUES ('16','Settings','','','bx-cog','22','2024-08-12 05:49:55','2024-10-19 15:09:12');
INSERT INTO `menus` VALUES ('17','Daftar Produk','products','24','','99','2024-08-14 13:43:43','2024-08-15 09:19:50');
INSERT INTO `menus` VALUES ('18','Daftar Merek','brands','24','bx-heart','99','2024-08-14 14:46:39','2025-12-16 15:27:56');
INSERT INTO `menus` VALUES ('19','Toko','stores','','bx-store','4','2024-08-14 14:57:29','2024-08-15 17:55:54');
INSERT INTO `menus` VALUES ('20','Daftar Unit','units','24','bx-list-ul','99','2024-08-15 03:18:09','2024-08-15 17:50:04');
INSERT INTO `menus` VALUES ('21','Kontak','','','bx-phone','3','2024-08-15 06:13:54','2024-08-15 17:55:42');
INSERT INTO `menus` VALUES ('22','Daftar Customer','customers','21','','99','2024-08-15 06:14:14','2024-08-15 17:53:18');
INSERT INTO `menus` VALUES ('23','Daftar Supplier','suppliers','21','','99','2024-08-15 06:14:34','2024-08-15 17:53:23');
INSERT INTO `menus` VALUES ('24','Produk','','','bx-box','2','2024-08-15 06:24:21','2024-08-15 17:54:45');
INSERT INTO `menus` VALUES ('25','Daftar Kategori','categories','24','','99','2024-08-15 06:32:17','2024-08-15 17:50:22');
INSERT INTO `menus` VALUES ('26','Print Barcode','product-barcode','24','','99','2024-08-15 10:51:48','2024-08-28 20:21:20');
INSERT INTO `menus` VALUES ('27','Bank','bank','','bxs-bank','6','2024-08-19 09:15:30','2024-08-19 18:46:01');
INSERT INTO `menus` VALUES ('28','Pajak','pajak','','bxs-briefcase-alt','5','2024-08-19 09:18:55','2024-08-19 18:45:58');
INSERT INTO `menus` VALUES ('29','Penjualan','','','bx-cart-add','15','2024-08-23 02:13:38','2024-08-23 09:24:34');
INSERT INTO `menus` VALUES ('30','Tambah Penjualan','sales-transaction','29','','97','2024-08-23 02:15:03','2024-08-30 12:36:09');
INSERT INTO `menus` VALUES ('31','Retur Penjualan','sales-return','29','','99','2024-08-23 02:15:24','2024-09-09 14:47:51');
INSERT INTO `menus` VALUES ('32','Pembelian','','','bxs-cart','16','2024-08-23 02:15:40','2024-08-23 09:25:23');
INSERT INTO `menus` VALUES ('33','Daftar Pembelian','purchase-list','32','','98','2024-08-23 02:16:03','2024-09-07 17:21:42');
INSERT INTO `menus` VALUES ('34','Retur Pembelian','purchase-return','32','','99','2024-08-23 02:16:23','2024-09-12 11:38:51');
INSERT INTO `menus` VALUES ('35','Role & Permission Kasir','role-permission-kasir','','bx-user','17','2024-08-28 02:13:11','2024-08-28 09:17:34');
INSERT INTO `menus` VALUES ('36','Daftar Penjualan','sales-list','29','','98','2024-08-30 05:33:31','2024-08-30 15:02:12');
INSERT INTO `menus` VALUES ('37','Tambah Pembelian','purchase-transaction','32','','97','2024-09-04 01:25:36','2024-09-04 10:11:02');
INSERT INTO `menus` VALUES ('38','Transfer Stok','','','bx-box','18','2024-09-10 12:13:24','2024-09-10 12:13:24');
INSERT INTO `menus` VALUES ('39','Biaya Pengeluaran','','','bx-money','20','2024-09-10 12:14:22','2024-09-20 17:29:50');
INSERT INTO `menus` VALUES ('40','Laporan penjualan','sales-report','47','','99','2024-09-12 01:18:43','2024-09-17 15:13:22');
INSERT INTO `menus` VALUES ('41','Laporan Pembelian','purchase-report','47','','99','2024-09-12 03:47:08','2024-09-17 15:13:33');
INSERT INTO `menus` VALUES ('42','Daftar Biaya','biaya-pengeluaran-list','39','','99','2024-09-12 03:47:42','2024-09-19 21:49:27');
INSERT INTO `menus` VALUES ('43','Tambah Biaya','biaya-pengeluaran','39','','98','2024-09-12 03:48:04','2024-09-20 10:58:48');
INSERT INTO `menus` VALUES ('44','Kategori Biaya','biaya-kategori','39','','99','2024-09-12 03:48:26','2024-09-12 03:48:26');
INSERT INTO `menus` VALUES ('45','Daftar Transfer Stock','stocktransfer-list','38','','99','2024-09-12 03:48:52','2024-09-12 03:48:52');
INSERT INTO `menus` VALUES ('46','Tambah Transfer Stock','stock-transfer','38','','98','2024-09-12 03:49:23','2024-09-20 17:30:40');
INSERT INTO `menus` VALUES ('47','Laporan','','','bx-note','21','2024-09-17 15:12:08','2024-09-20 17:29:52');
INSERT INTO `menus` VALUES ('48','Stock Opname','','','bx-pen','19','2024-09-20 17:26:20','2024-09-20 17:29:55');
INSERT INTO `menus` VALUES ('49','Tambah StockOpname','stockopname-add','48','','98','2024-09-20 17:26:59','2024-09-20 17:30:26');
INSERT INTO `menus` VALUES ('50','Daftar StockOpname','stockopname-list','48','','99','2024-09-20 17:27:26','2024-09-20 17:27:26');
INSERT INTO `menus` VALUES ('51','Laporan Stok','stock-report','47','','99','2024-09-24 16:47:32','2024-09-24 16:47:32');
INSERT INTO `menus` VALUES ('52','Laporan Laba Rugi','labarugi-report','47','','99','2024-09-26 18:58:26','2024-09-26 18:58:26');
INSERT INTO `menus` VALUES ('53','Laporan Akun Bank','bank-report','47','','99','2024-09-26 18:58:56','2024-09-26 18:58:56');
INSERT INTO `menus` VALUES ('54','Import Product','import-product','24','','99','2024-10-19 09:19:54','2024-10-19 09:19:54');
INSERT INTO `menus` VALUES ('55','Layout','settings','16','','99','2024-10-19 15:08:58','2024-10-19 15:08:58');
INSERT INTO `menus` VALUES ('56','Backup Database','backup-database','16','','99','2024-10-19 15:10:38','2024-10-19 15:10:51');
INSERT INTO `menus` VALUES ('57','Reset Database','reset-database','16','','99','2024-10-19 16:10:28','2024-10-19 16:10:28');
INSERT INTO `menus` VALUES ('58','Update App','update','','bx-sync','23','2024-11-18 22:17:28','2024-11-18 22:17:28');


CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` VALUES ('1','0001_01_01_000000_create_users_table','1');
INSERT INTO `migrations` VALUES ('2','0001_01_01_000001_create_cache_table','1');
INSERT INTO `migrations` VALUES ('3','0001_01_01_000002_create_jobs_table','1');
INSERT INTO `migrations` VALUES ('4','2024_08_05_001045_create_permission_tables','1');
INSERT INTO `migrations` VALUES ('5','2024_08_12_053304_create_settings_table','1');


CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_roles` VALUES ('1','App\\Models\\User','1');
INSERT INTO `model_has_roles` VALUES ('2','App\\Models\\User','3');
INSERT INTO `model_has_roles` VALUES ('2','App\\Models\\User','4');
INSERT INTO `model_has_roles` VALUES ('2','App\\Models\\User','5');
INSERT INTO `model_has_roles` VALUES ('2','App\\Models\\User','6');
INSERT INTO `model_has_roles` VALUES ('4','App\\Models\\User','9');


CREATE TABLE `pajak` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `discount_value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `pajak` VALUES ('1','PPN 10%','Pertambahan Nilai','10.00','1','2024-08-19 17:31:02','2024-08-28 01:25:00');
INSERT INTO `pajak` VALUES ('2','PPH 2%','Pajak Penghasilan','2.00','0','2024-08-19 10:39:44','2024-08-28 01:24:49');
INSERT INTO `pajak` VALUES ('4','PPN 11%','New','11.00','1','2024-08-26 10:20:15','2025-08-29 10:02:26');
INSERT INTO `pajak` VALUES ('5','DPP 12','Dpp','12.00','1','2025-08-07 17:21:30','2025-08-07 17:21:30');


CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `payment_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint unsigned NOT NULL,
  `payment_method` enum('cash','bank_transfer') COLLATE utf8mb3_unicode_ci NOT NULL,
  `bank_id` bigint unsigned DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `transaction_id` (`transaction_id`) USING BTREE,
  KEY `payment_methods_ibfk_2` (`bank_id`),
  CONSTRAINT `payment_methods_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `sales_transactions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payment_methods_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` VALUES ('1','dashboard.view','web','2024-08-05 13:38:42','2024-08-05 13:38:44');
INSERT INTO `permissions` VALUES ('2','users.view','web','2024-08-05 13:00:05','2024-08-05 13:00:05');
INSERT INTO `permissions` VALUES ('3','menus.view','web','2024-08-05 13:00:05','2024-08-05 13:00:05');
INSERT INTO `permissions` VALUES ('13','users.edit','web','2024-08-07 05:41:39','2024-08-07 05:41:39');
INSERT INTO `permissions` VALUES ('14','users.delete','web','2024-08-07 05:41:48','2024-08-07 05:41:48');
INSERT INTO `permissions` VALUES ('19','users.add','web','2024-08-07 09:07:01','2024-08-07 09:07:01');
INSERT INTO `permissions` VALUES ('36','settings.view','web','2024-08-12 05:50:18','2024-08-12 05:50:18');
INSERT INTO `permissions` VALUES ('37','products.view','web','2024-08-14 13:44:02','2024-08-14 13:44:02');
INSERT INTO `permissions` VALUES ('38','brand.view','web','2024-08-14 14:48:03','2024-08-14 14:48:03');
INSERT INTO `permissions` VALUES ('39','stores.view','web','2024-08-14 14:57:37','2024-08-14 14:57:37');
INSERT INTO `permissions` VALUES ('40','units.view','web','2024-08-15 03:18:31','2024-08-15 03:18:31');
INSERT INTO `permissions` VALUES ('41','contacts.view','web','2024-08-15 06:14:49','2024-08-15 06:14:49');
INSERT INTO `permissions` VALUES ('42','items.view','web','2024-08-15 06:25:33','2024-08-15 06:25:33');
INSERT INTO `permissions` VALUES ('43','category.view','web','2024-08-15 06:32:42','2024-08-15 06:32:42');
INSERT INTO `permissions` VALUES ('44','barcode.view','web','2024-08-15 10:52:02','2024-08-15 10:52:02');
INSERT INTO `permissions` VALUES ('45','bank.view','web','2024-08-19 09:15:41','2024-08-19 09:15:41');
INSERT INTO `permissions` VALUES ('46','pajak.view','web','2024-08-19 09:19:02','2024-08-19 09:19:02');
INSERT INTO `permissions` VALUES ('47','penjualan.view','web','2024-08-23 02:17:21','2024-08-23 02:17:21');
INSERT INTO `permissions` VALUES ('48','pembelian.view','web','2024-08-23 02:17:29','2024-08-23 02:17:29');
INSERT INTO `permissions` VALUES ('49','rolepermissionkasir.view','web','2024-08-28 02:13:30','2024-08-28 02:13:30');
INSERT INTO `permissions` VALUES ('50','transfer_stock.view','web','2024-09-10 12:13:45','2024-09-10 12:13:45');
INSERT INTO `permissions` VALUES ('51','pengeluaran.view','web','2024-09-10 12:14:34','2024-09-10 12:14:34');
INSERT INTO `permissions` VALUES ('52','laporan.view','web','2024-09-17 15:12:44','2024-09-17 15:12:44');
INSERT INTO `permissions` VALUES ('53','stockopname.view','web','2024-09-20 17:27:46','2024-09-20 17:27:46');
INSERT INTO `permissions` VALUES ('54','update.view','web','2024-11-18 22:17:54','2024-11-18 22:17:54');


CREATE TABLE `product_category` (
  `product_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_pricing_id` bigint unsigned NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_pricing_id` (`product_pricing_id`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_pricing_id`) REFERENCES `product_pricing` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `product_pricing` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `variasi_1` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `variasi_2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `variasi_3` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `purchase_price` int DEFAULT NULL,
  `sale_price` int DEFAULT NULL,
  `stock` int NOT NULL,
  `weight` double NOT NULL DEFAULT '0',
  `store_id` bigint unsigned DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_sku_per_store` (`store_id`,`sku`),
  UNIQUE KEY `unique_barcode_per_store` (`store_id`,`barcode`),
  KEY `product_id` (`product_id`),
  KEY `store_id` (`store_id`),
  CONSTRAINT `product_pricing_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_pricing_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `brand_id` bigint unsigned DEFAULT NULL,
  `unit_id` bigint unsigned DEFAULT NULL,
  `has_varian` enum('Y','N') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  KEY `unit_id` (`unit_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `purchase_expenses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int NOT NULL,
  `expense_category_id` int NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `note` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_expenses_ibfk_1` (`purchase_order_id`),
  KEY `purchase_expenses_ibfk_2` (`expense_category_id`),
  CONSTRAINT `purchase_expenses_ibfk_1` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_expenses_ibfk_2` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `purchase_order_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int NOT NULL DEFAULT '0',
  `product_pricing_id` bigint unsigned NOT NULL,
  `purchase_price` int NOT NULL,
  `diskon` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL,
  `remaining_quantity` int NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_pricing_id` (`product_pricing_id`),
  KEY `FK_purchase_order_detail_purchase_orders` (`purchase_order_id`),
  CONSTRAINT `FK_purchase_order_detail_purchase_orders` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_history_fk_product_pricing` FOREIGN KEY (`product_pricing_id`) REFERENCES `product_pricing` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



CREATE TABLE `purchase_orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `supplier_id` int NOT NULL,
  `reference_no` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `payment_method` enum('cash','bank_transfer','tempo') COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` enum('dipesan','diterima') COLLATE utf8mb3_unicode_ci NOT NULL,
  `isreturn` enum('yes','no') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `payment_status` enum('lunas','belum lunas') COLLATE utf8mb3_unicode_ci NOT NULL,
  `total_amount` decimal(15,2) DEFAULT NULL COMMENT 'exclude biaya lain2',
  `discount` decimal(10,2) DEFAULT NULL,
  `remaining_payment` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'include biaya lain2',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `store_id` (`store_id`),
  CONSTRAINT `purchase_orders_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `purchase_orders_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `purchase_payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` enum('cash','bank_transfer') COLLATE utf8mb3_unicode_ci NOT NULL,
  `bank_id` bigint unsigned DEFAULT NULL,
  `amount_paid` decimal(15,2) NOT NULL,
  `payment_note` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_payments_ibfk_1` (`purchase_order_id`),
  KEY `FK_purchase_payments_bank` (`bank_id`),
  CONSTRAINT `FK_purchase_payments_bank` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_payments_ibfk_1` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `return_purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `return_no` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `purchase_order_id` int NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `supplier_id` int NOT NULL,
  `store_id` bigint unsigned NOT NULL DEFAULT '0',
  `return_date` date NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT '0.00',
  `note` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `return_purchase_ibfk_1` (`purchase_order_id`) USING BTREE,
  KEY `FK_return_purchase_suppliers` (`supplier_id`),
  KEY `FK_return_purchase_stores` (`store_id`),
  KEY `FK_return_purchase_users` (`user_id`),
  CONSTRAINT `FK_return_purchase_stores` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  CONSTRAINT `FK_return_purchase_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `FK_return_purchase_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `return_purchase_ibfk_1` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `return_purchase_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `return_purchase_id` int NOT NULL,
  `purchase_order_detail_id` bigint unsigned NOT NULL DEFAULT '0',
  `product_pricing_id` bigint unsigned NOT NULL,
  `quantity_purchased` int NOT NULL,
  `quantity_returned` int NOT NULL,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `discount_item` decimal(15,2) NOT NULL DEFAULT '0.00',
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `product_pricing_id` (`product_pricing_id`) USING BTREE,
  KEY `return_purchase_detail_ibfk_1` (`return_purchase_id`) USING BTREE,
  KEY `FK_return_purchase_detail_purchase_order_detail` (`purchase_order_detail_id`),
  CONSTRAINT `FK_return_purchase_detail_purchase_order_detail` FOREIGN KEY (`purchase_order_detail_id`) REFERENCES `purchase_order_detail` (`id`) ON DELETE CASCADE,
  CONSTRAINT `return_purchase_detail_ibfk_1` FOREIGN KEY (`return_purchase_id`) REFERENCES `return_purchase` (`id`) ON DELETE CASCADE,
  CONSTRAINT `return_purchase_detail_ibfk_2` FOREIGN KEY (`product_pricing_id`) REFERENCES `product_pricing` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `return_sales_transaction_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `return_sales_transaction_id` bigint unsigned NOT NULL,
  `sales_transaction_item_id` bigint unsigned NOT NULL,
  `product_pricing_id` bigint unsigned NOT NULL,
  `quantity_sold` int NOT NULL,
  `quantity_returned` int NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `discount_item` decimal(15,2) DEFAULT '0.00',
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `return_sales_transaction_id` (`return_sales_transaction_id`),
  KEY `sales_transaction_item_id` (`sales_transaction_item_id`),
  KEY `product_pricing_id` (`product_pricing_id`),
  CONSTRAINT `return_sales_transaction_items_ibfk_1` FOREIGN KEY (`return_sales_transaction_id`) REFERENCES `return_sales_transactions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `return_sales_transaction_items_ibfk_2` FOREIGN KEY (`sales_transaction_item_id`) REFERENCES `sales_transaction_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `return_sales_transaction_items_ibfk_3` FOREIGN KEY (`product_pricing_id`) REFERENCES `product_pricing` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `return_sales_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `return_no` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `return_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_transaction_id` bigint unsigned NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `customer_id` int NOT NULL,
  `total_return` decimal(15,2) NOT NULL,
  `tax_return` decimal(15,2) NOT NULL,
  `discount_return` decimal(15,2) NOT NULL,
  `note` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `return_no` (`return_no`),
  KEY `sales_transaction_id` (`sales_transaction_id`),
  KEY `return_sales_transactions_ibfk_2` (`store_id`),
  KEY `return_sales_transactions_ibfk_3` (`customer_id`),
  CONSTRAINT `return_sales_transactions_ibfk_1` FOREIGN KEY (`sales_transaction_id`) REFERENCES `sales_transactions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `return_sales_transactions_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `return_sales_transactions_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_has_permissions` VALUES ('1','1');
INSERT INTO `role_has_permissions` VALUES ('2','1');
INSERT INTO `role_has_permissions` VALUES ('3','1');
INSERT INTO `role_has_permissions` VALUES ('13','1');
INSERT INTO `role_has_permissions` VALUES ('14','1');
INSERT INTO `role_has_permissions` VALUES ('19','1');
INSERT INTO `role_has_permissions` VALUES ('49','1');
INSERT INTO `role_has_permissions` VALUES ('54','1');
INSERT INTO `role_has_permissions` VALUES ('1','2');
INSERT INTO `role_has_permissions` VALUES ('36','2');
INSERT INTO `role_has_permissions` VALUES ('37','2');
INSERT INTO `role_has_permissions` VALUES ('38','2');
INSERT INTO `role_has_permissions` VALUES ('39','2');
INSERT INTO `role_has_permissions` VALUES ('40','2');
INSERT INTO `role_has_permissions` VALUES ('41','2');
INSERT INTO `role_has_permissions` VALUES ('42','2');
INSERT INTO `role_has_permissions` VALUES ('43','2');
INSERT INTO `role_has_permissions` VALUES ('44','2');
INSERT INTO `role_has_permissions` VALUES ('45','2');
INSERT INTO `role_has_permissions` VALUES ('46','2');
INSERT INTO `role_has_permissions` VALUES ('47','2');
INSERT INTO `role_has_permissions` VALUES ('48','2');
INSERT INTO `role_has_permissions` VALUES ('50','2');
INSERT INTO `role_has_permissions` VALUES ('51','2');
INSERT INTO `role_has_permissions` VALUES ('52','2');
INSERT INTO `role_has_permissions` VALUES ('53','2');
INSERT INTO `role_has_permissions` VALUES ('1','3');
INSERT INTO `role_has_permissions` VALUES ('37','3');
INSERT INTO `role_has_permissions` VALUES ('38','3');
INSERT INTO `role_has_permissions` VALUES ('39','3');
INSERT INTO `role_has_permissions` VALUES ('40','3');
INSERT INTO `role_has_permissions` VALUES ('41','3');
INSERT INTO `role_has_permissions` VALUES ('42','3');
INSERT INTO `role_has_permissions` VALUES ('43','3');
INSERT INTO `role_has_permissions` VALUES ('44','3');
INSERT INTO `role_has_permissions` VALUES ('45','3');
INSERT INTO `role_has_permissions` VALUES ('46','3');
INSERT INTO `role_has_permissions` VALUES ('47','3');
INSERT INTO `role_has_permissions` VALUES ('48','3');
INSERT INTO `role_has_permissions` VALUES ('1','4');
INSERT INTO `role_has_permissions` VALUES ('46','4');
INSERT INTO `role_has_permissions` VALUES ('47','4');


CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` VALUES ('1','superadmin','web','2024-08-08 14:35:57','2024-08-08 14:35:57');
INSERT INTO `roles` VALUES ('2','kasir','web','2024-08-14 11:51:16','2024-08-14 11:51:16');
INSERT INTO `roles` VALUES ('3','admin','web','2024-08-14 23:31:04','2024-08-14 23:31:04');
INSERT INTO `roles` VALUES ('4','oprator','web','2025-08-12 09:05:31','2025-08-12 09:05:31');


CREATE TABLE `sales_note` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint unsigned NOT NULL,
  `reference_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `source` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sales_note_sales_transactions` (`transaction_id`),
  CONSTRAINT `FK_sales_note_sales_transactions` FOREIGN KEY (`transaction_id`) REFERENCES `sales_transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sales_note` VALUES ('1','398','tes','tes','tes','2026-07-19 13:21:20','2026-07-19 13:21:20');
INSERT INTO `sales_note` VALUES ('2','399','tes','tes','tes','2026-07-19 13:21:20','2026-07-19 13:21:20');


CREATE TABLE `sales_transaction_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint unsigned NOT NULL,
  `product_pricing_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `discount_item` decimal(15,2) DEFAULT '0.00',
  `note` text COLLATE utf8mb3_unicode_ci,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `transaction_id` (`transaction_id`) USING BTREE,
  KEY `product_pricing_id` (`product_pricing_id`) USING BTREE,
  CONSTRAINT `sales_transaction_items_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `sales_transactions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sales_transaction_items_ibfk_2` FOREIGN KEY (`product_pricing_id`) REFERENCES `product_pricing` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `sales_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `store_id` bigint unsigned NOT NULL,
  `customer_id` int NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `discount_amount` decimal(15,2) DEFAULT '0.00',
  `tax_amount` decimal(15,2) DEFAULT '0.00',
  `payment_method` enum('cash','bank_transfer','tempo') COLLATE utf8mb3_unicode_ci NOT NULL,
  `total_payment` decimal(15,2) NOT NULL DEFAULT '0.00',
  `change_payment` decimal(15,2) NOT NULL DEFAULT '0.00',
  `remaining_payment` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` enum('lunas','tempo') COLLATE utf8mb3_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `isreturn` enum('yes','no') COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `store_id` (`store_id`) USING BTREE,
  KEY `customer_id` (`customer_id`) USING BTREE,
  KEY `FK_sales_transactions_users` (`user_id`),
  CONSTRAINT `FK_sales_transactions_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `sales_transactions_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  CONSTRAINT `sales_transactions_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` VALUES ('1v9jFpkPNhVV8UtgUrT6qwO3EMurVuiqDnUBVgzT','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXNkV0dzdzZxb2dtYW5kT1VYNTNIT2puSHVRNHhCNnVkdDdDekFnUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793786032');
INSERT INTO `sessions` VALUES ('62NPOGqD6ZpDvBuy1bPilD6Xxy345HFzwNNCbwUN','3','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidjdkekZnbDdLTnVEOElNWm1FZ0ljSEtydEJGZmUyTlhIZEVydGxPZCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly93cG9zLml1cWlhLmNvbS9iYWNrdXAtZGF0YWJhc2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19','1793786134');
INSERT INTO `sessions` VALUES ('6TcQDNq5DozVbE4ZIFzbxSvMR7L86ifbIf9DPO95','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWtaSHJrY0g0VjJwUlhUSVdMTXhPTFk4ajkzZGEwMFM4T2t6NnhFRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793786124');
INSERT INTO `sessions` VALUES ('CfNCYjrBb7DZE2Iipr7TPOw4hI0N65jexX5XLhV6','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidWRkaG5nV21ncDFPNUVtbFpVOFVRNTh3QlB2MFFXRzNJcjBuSjF1OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793786094');
INSERT INTO `sessions` VALUES ('g6NPquYhTdSsJcJ2i7k2CInOvkbDcX1yFxEBJMcH','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXBkdjZMajFtVjBHV0ZlZFhVRW52RzZ2UkVHa0lQRkVQaGJWZG1kRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793786135');
INSERT INTO `sessions` VALUES ('I3vkFVMMnc080roPFQHdkVkLlryuNbRcDGnQdFIg','','170.83.176.205','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSUdoeEdLallnS2p5SkJ6OWxhUzc0OTFiRXBYb1VxNmtnVEVuNnI2dSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly93cG9zLml1cWlhLmNvbS9kYXNoYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyODoiaHR0cHM6Ly93cG9zLml1cWlhLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793784202');
INSERT INTO `sessions` VALUES ('KEPZQWfSx1J9SCkiZZ8vxADxOoSGEs4hI4zOVpyv','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVB4aHdtUnRwdDFGRGYwTEk2aVdIUGNieGVhcmJxSUZhRkxTQXlPeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793786121');
INSERT INTO `sessions` VALUES ('l8kEXucatjjIFec4L2dZWigLKf3JyN1hXvLsIaXq','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVE91anNlWU4xaUpwemNsRDdIQzltWjJCdDFMTE02ZEx1R2t4b0xxWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793786064');
INSERT INTO `sessions` VALUES ('LzHeW6Y10jf7tMEkrGBC1BoQZj7X7uERcHF9ivEr','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkxWNjc4UlZxZDBicEZqWnpja1ozaXVLaFJxWHllb2ZUWVQ5MGtkYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793785972');
INSERT INTO `sessions` VALUES ('nFblT016rv1Ph85OXM64NWap7o08MWYzgUAD4ZDs','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMm5HWTFVdjh4OFR1aVBRZ3ZSU2VNTndvV3g2TlZVTEZuTVVNdGpFOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793786059');
INSERT INTO `sessions` VALUES ('nx6eJjNpPPxqRDaFyagChzH1Nl5cFL7jWzHpnh6D','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmxuMm1mMjZiMzVNQVByTVpMZ1F6dVBWb0pKb1o2OFBucWhleFFTRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793785979');
INSERT INTO `sessions` VALUES ('uazv9v2lrrBg7u1F5Po9qjAoCOBGx6HDIekEO5uS','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieHFXdmJ1ajNqVkNpRzVsRUZSNHZnREF4M3N5eHpWcE5vMVpKNWlqbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793786082');
INSERT INTO `sessions` VALUES ('ySH7jRATpcIT00qgFOR8a3shTKnMedgvt0BUeWo1','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGZnWThBTGlhRkFaaEVqUDVPQnBvRHdkd2RRR2dwUnZJWFlLVHRvUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793785992');
INSERT INTO `sessions` VALUES ('ZcGqW4c5SLKL8hgv4yc0kFlU7s2KyW2hYdaeHm4h','','2001:448a:2050:c341:91cb:6fe5:4150:9e3e','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzZiTEQyMWhLVFU2c2pOdGdGNExrRm5LTlpLZkdDY1plRkVEUnZ0WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3Bvcy5pdXFpYS5jb20vbWFuaWZlc3QuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=','1793786112');


CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Laravel S-Kit',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sidebarcolor` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` VALUES ('1','Aplikasi Kasir','1769569391.png','2024-08-15 05:03:17','2026-01-28 10:03:11','#fff');


CREATE TABLE `stock_opname` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `note` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `store_id` (`store_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `stock_opname_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stock_opname_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `stock_opname_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stock_opname_id` bigint unsigned NOT NULL,
  `product_pricing_id` bigint unsigned NOT NULL,
  `system_stock` int NOT NULL,
  `physical_stock` int NOT NULL,
  `stock_difference` int NOT NULL,
  `unit_price` int NOT NULL,
  `total_loss` int DEFAULT NULL,
  `id_reason` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `stock_opname_id` (`stock_opname_id`) USING BTREE,
  KEY `product_pricing_id` (`product_pricing_id`) USING BTREE,
  KEY `FK_stock_opname_items_stock_opname_reason` (`id_reason`),
  CONSTRAINT `FK_stock_opname_items_stock_opname_reason` FOREIGN KEY (`id_reason`) REFERENCES `stock_opname_reason` (`id`),
  CONSTRAINT `stock_opname_items_ibfk_1` FOREIGN KEY (`stock_opname_id`) REFERENCES `stock_opname` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stock_opname_items_ibfk_2` FOREIGN KEY (`product_pricing_id`) REFERENCES `product_pricing` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `stock_opname_reason` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `stock_transfer_expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stock_transfer_id` bigint unsigned NOT NULL,
  `expense_category_id` int NOT NULL,
  `amount` double NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `stock_transfer_id` (`stock_transfer_id`),
  KEY `expense_category_id` (`expense_category_id`),
  CONSTRAINT `stock_transfer_expenses_ibfk_1` FOREIGN KEY (`stock_transfer_id`) REFERENCES `stock_transfers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stock_transfer_expenses_ibfk_2` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `stock_transfer_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stock_transfer_id` bigint unsigned NOT NULL,
  `product_pricing_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `quantity_received` int NOT NULL DEFAULT '0',
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `stock_transfer_id` (`stock_transfer_id`),
  KEY `product_pricing_id` (`product_pricing_id`),
  CONSTRAINT `stock_transfer_items_ibfk_1` FOREIGN KEY (`stock_transfer_id`) REFERENCES `stock_transfers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stock_transfer_items_ibfk_2` FOREIGN KEY (`product_pricing_id`) REFERENCES `product_pricing` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `stock_transfer_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stock_transfer_id` bigint unsigned NOT NULL,
  `payment_method` enum('cash','bank_transfer') COLLATE utf8mb3_unicode_ci NOT NULL,
  `bank_id` bigint unsigned DEFAULT NULL,
  `amount_paid` double NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_note` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `stock_transfer_id` (`stock_transfer_id`),
  KEY `FK_stock_transfer_payments_bank` (`bank_id`),
  CONSTRAINT `FK_stock_transfer_payments_bank` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`),
  CONSTRAINT `stock_transfer_payments_ibfk_1` FOREIGN KEY (`stock_transfer_id`) REFERENCES `stock_transfers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `stock_transfers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `from_store_id` bigint unsigned NOT NULL,
  `to_store_id` bigint unsigned NOT NULL,
  `shipping_status` enum('dikirim','diterima') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'dikirim',
  `transfer_date` date DEFAULT NULL,
  `payment_method` enum('cash','bank_transfer','tempo') COLLATE utf8mb3_unicode_ci NOT NULL,
  `payment_status` enum('lunas','belum_lunas') COLLATE utf8mb3_unicode_ci NOT NULL,
  `total_amount` decimal(15,2) NOT NULL COMMENT 'exclude biaya lain-lain',
  `discount` decimal(10,2) DEFAULT NULL,
  `remaining_payment` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'include biaya lain-lain',
  `received_by` bigint unsigned DEFAULT NULL,
  `received_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `from_store_id` (`from_store_id`),
  KEY `to_store_id` (`to_store_id`),
  KEY `FK_stock_transfers_users` (`user_id`),
  KEY `FK_stock_transfers_users_2` (`received_by`) USING BTREE,
  CONSTRAINT `FK_stock_transfers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_stock_transfers_users_2` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`),
  CONSTRAINT `stock_transfers_ibfk_1` FOREIGN KEY (`from_store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `stock_transfers_ibfk_2` FOREIGN KEY (`to_store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `store_layout_preferences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `store_id` bigint unsigned DEFAULT NULL,
  `layout_id` int DEFAULT NULL,
  `sidebar_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link_hover_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_brand_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `navbar_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_hover_color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `store_id` (`store_id`),
  KEY `layout_id` (`layout_id`),
  CONSTRAINT `store_layout_preferences_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  CONSTRAINT `store_layout_preferences_ibfk_2` FOREIGN KEY (`layout_id`) REFERENCES `layouts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `store_layout_preferences` VALUES ('8','1','1','','','','','','','','');
INSERT INTO `store_layout_preferences` VALUES ('9','1','1','','','','','','','','');
INSERT INTO `store_layout_preferences` VALUES ('10','1','1','','','','','','','','');


CREATE TABLE `store_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `store_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `store_id` (`store_id`),
  CONSTRAINT `store_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `store_user_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `store_user` VALUES ('19','3','1','2024-08-28 12:49:59','2024-10-19 20:37:58');
INSERT INTO `store_user` VALUES ('21','5','1','2024-09-03 14:19:26','2024-10-19 20:38:02');
INSERT INTO `store_user` VALUES ('22','6','1','2024-09-03 14:24:25','2024-10-19 20:38:05');
INSERT INTO `store_user` VALUES ('25','4','1','2024-10-08 11:18:47','2024-10-19 20:38:08');
INSERT INTO `store_user` VALUES ('26','4','1','2024-10-08 11:18:47','2024-10-19 20:38:17');
INSERT INTO `store_user` VALUES ('27','3','2','2024-10-19 22:27:28','2024-10-19 22:27:28');
INSERT INTO `store_user` VALUES ('28','9','1','2025-08-12 21:19:20','2025-08-12 21:19:20');
INSERT INTO `store_user` VALUES ('29','9','2','2025-08-12 21:19:20','2025-08-12 21:19:20');


CREATE TABLE `stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `stores` VALUES ('1','PT Sejahtera','i.maulana.azn@gmail.com','0889440123102','adsasdsadd','store_logos/IHWDddFkUWMdStf1ER5oYPVHyp0OehxVHi7DtzRR.png','2026-10-06 11:22:18','2026-10-06 11:22:18');


CREATE TABLE `suppliers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `pic_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `units` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;



CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` VALUES ('1','Super Admin','mukhlishidayat30@gmail.com','','$2y$12$vN49paYUtYjXIjNWu1ON1.pQbRhmudv7lpFAyuzKMQZM2IhjxPira','','2024-08-08 14:35:57','2025-08-02 14:39:44');
INSERT INTO `users` VALUES ('3','kasir1_arkstore','arkstore@mail.com','','$2y$12$HdhSgI0LhhWqBrTuivUEQOUu8YYwcMXToXvA0vsNctM7nsG9.0bv2','72BRMahgaJmFKUJDNyEvq7iEumj0sirsc0iGGSRlJpB1txW2kz1G1HzHTJB5','2024-08-14 11:52:10','2024-09-03 07:25:17');
INSERT INTO `users` VALUES ('4','admin','admin@mail.com','','$2y$12$OO0LVno5ZcwaEoKzUPuXeu7J1cxgDmYOe9OlS0LOiRUa/c1a.pZ6G','','2024-08-14 23:31:34','2024-08-14 23:31:34');
INSERT INTO `users` VALUES ('5','kasir1_mikastore','mikastore@mail.com','','$2y$12$H4VlqD/7Ea4F/.nNafgM1u26xtZ5Bt9nSd.1xtMdf50NJMiLITt5e','','2024-08-28 03:34:04','2024-09-03 07:25:35');
INSERT INTO `users` VALUES ('6','kasir2_arkstore','kasir2_ark@mail.com','','$2y$12$Fkm8ZfrHmy4N9s0hgANBf.j5AnSj978mGpPZgx5RJeItYuOjgZWeO','','2024-09-03 07:23:57','2024-11-04 10:01:16');
INSERT INTO `users` VALUES ('9','oprator','oprator@mail.com','','$2y$12$IS54lvIH4yat1pDIY/Ax4u7nwEwRWrzg.mlrtvPOlgp8UqrMpwT7K','','2025-08-12 21:15:36','2025-08-12 21:15:36');
INSERT INTO `users` VALUES ('10','Aadmin','aadmin@gmail.com','','$2y$12$ryw3n1y3L8AjmtaHbn1WuevRaBxtN5Gd/xModJalFYFTTboYZH.qG','','2025-09-04 15:04:40','2025-09-04 15:04:40');
INSERT INTO `users` VALUES ('11','Coba','ytnubb@gmail.com','','$2y$12$4o54PblO45vKk5ZOoySKueAXHsvERdXgGobA.Hz1GAMU6G1No1FXC','','2025-11-03 09:02:32','2025-11-03 09:02:32');
INSERT INTO `users` VALUES ('12','BEKTI KUSUMA WIJAYA','bkw295@gmail.com','','$2y$12$8vd1YJg.ZDwLc7cYToPxFuJ/vYv2wWmeXrtPDlCEoU/PbYjPCOlOe','','2025-12-31 11:02:53','2025-12-31 11:02:53');
INSERT INTO `users` VALUES ('13','jhones','jhonesnakal@gmail.com','','$2y$12$KuinkZvvNLmVTIlelmH9LeReTYAPlRHodYQ3CKYBvCZLTTmvJ/VTu','','2026-01-13 13:37:15','2026-01-13 13:37:15');
INSERT INTO `users` VALUES ('14','tes','tes@mail.com','','$2y$12$f0ZJdxlsUr8RsDqCaKRBUOZNFUBPM5kGIcTCsFjy3ayrPn9WAWUia','','2026-08-01 11:20:44','2026-08-01 11:20:44');


