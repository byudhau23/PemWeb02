# Host: localhost  (Version 5.5.5-10.4.27-MariaDB)
# Date: 2023-04-10 00:11:05
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "jenis_produk"
#

DROP TABLE IF EXISTS `jenis_produk`;
CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "jenis_produk"
#

INSERT INTO `jenis_produk` VALUES (1,'elektronik'),(2,'furniture'),(3,'makanan'),(4,'minuman'),(5,'komputer');

#
# Structure for table "kartu"
#

DROP TABLE IF EXISTS `kartu`;
CREATE TABLE `kartu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(6) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `iuran` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_UNIQUE` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "kartu"
#

INSERT INTO `kartu` VALUES (1,'GOLD','Gold Utama',0.05,100000),(2,'PLAT','Platinum Jaya',0.1,150000),(3,'SLV','Silver',0.025,50000),(4,'NO','Non Member',0,0),(5,'PEK','Kepokkk',4,5);

#
# Structure for table "pelanggan"
#

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jk` char(1) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `kartu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pelanggan_kartu1_idx` (`kartu_id`),
  KEY `idx_nama_pelanggan` (`nama`),
  KEY `idx_tgllahir_pelanggan` (`tgl_lahir`),
  CONSTRAINT `fk_pelanggan_kartu1` FOREIGN KEY (`kartu_id`) REFERENCES `kartu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "pelanggan"
#

INSERT INTO `pelanggan` VALUES (22,'112','Apit','L','Lampung','2023-03-02','apitcnrr@gmail.com',4),(23,'111','Ipul','L','Bandung','2023-03-20','ipul@gmail.com',4),(24,'015','Zubaedah','P','Sukabumi','2023-04-05','zubaedah22@gmail.com',3),(30,'0112','Bunga Aprilia Arianto','P','Depok','2023-04-06','okwokwe@gmail.com',4),(34,'014','Hibban','L','Bandung','2023-04-08','hibban@gmail.com',2);

#
# Structure for table "pesanan"
#

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `pelanggan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pesanan_customer_idx` (`pelanggan_id`),
  CONSTRAINT `fk_pesanan_customer` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "pesanan"
#


#
# Structure for table "pembayaran"
#

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nokuitansi` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `ke` int(11) DEFAULT NULL,
  `pesanan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nokuitansi_UNIQUE` (`nokuitansi`),
  KEY `fk_pembayaran_pesanan1_idx` (`pesanan_id`),
  CONSTRAINT `fk_pembayaran_pesanan1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "pembayaran"
#


#
# Structure for table "produk"
#

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `min_stok` int(11) DEFAULT NULL,
  `jenis_produk_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_UNIQUE` (`kode`),
  KEY `fk_produk_jenis_produk1_idx` (`jenis_produk_id`),
  CONSTRAINT `fk_produk_jenis_produk1` FOREIGN KEY (`jenis_produk_id`) REFERENCES `jenis_produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "produk"
#

INSERT INTO `produk` VALUES (1,'TV01','Televisi 21 inch',3500000,5040000,5,2,1),(2,'TV02','Televisi 40 inch',5500000,7440000,4,2,1),(3,'K001','Kulkas 2 pintu',3500000,4680000,6,2,1),(4,'M001','Meja Makan',500000,600000,4,3,2),(5,'TK01','Teh Kotak',3000,3500,6,10,4),(7,'TB01','Teh Botol',2000,2500,53,10,4),(8,'AC01','Notebook Acer',8000000,9600000,7,2,3),(9,'LN01','Notebook Lenovo',9000000,12000000,9,2,5),(10,'L004','Laptop HP',12000000,13000000,20,5,5),(11,'KS111','Kulkas',200000,240000,1,3,1);

#
# Structure for table "pesanan_items"
#

DROP TABLE IF EXISTS `pesanan_items`;
CREATE TABLE `pesanan_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pesanan_items_pesanan1_idx` (`pesanan_id`),
  KEY `fk_pesanan_items_produk1_idx` (`produk_id`),
  CONSTRAINT `fk_pesanan_items_pesanan1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pesanan_items_produk1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "pesanan_items"
#


#
# Structure for table "vendor"
#

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `kontak` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor` (`nomor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

#
# Data for table "vendor"
#

INSERT INTO `vendor` VALUES (1,'V001','PT Guna Samudra','Surabaya','Ali Nurdin'),(2,'V002','PT Pondok C9','Depok','Putri Ramadhani'),(3,'V003','CV Jaya Raya Semesta','Jakarta','Dwi Rahayu'),(4,'V004','PT Lekulo X','Kebumen','Mbambang G'),(5,'V005','PT IT Prima','Jakarta','David W'),(8,'44','shope','banjarsari','panjul');

#
# Structure for table "pembelian"
#

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(45) DEFAULT NULL,
  `nomor` varchar(10) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_UNIQUE` (`nomor`),
  KEY `produk_id` (`produk_id`),
  KEY `vendor_id` (`vendor_id`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "pembelian"
#

INSERT INTO `pembelian` VALUES (1,'2019-10-10','P001',2,2,3500000,2),(2,'2019-11-20','P002',NULL,5,5500000,2),(3,'2019-12-12','P003',3,5,5400000,2),(4,'2020-01-20','P007',NULL,200,1800,3),(5,'2020-01-20','P005',NULL,100,2300,4),(7,'2023-04-25','222',NULL,3,2222,4),(10,'2023-04-25','44',NULL,3,2222,4),(11,'2023-04-30','P44',5,2,222,1),(12,'2023-04-16','P555',3,300,2222,2),(14,'2023-04-26','P405',NULL,300,222,5),(15,'2023-05-03','P223',NULL,3,200,2),(16,'2023-04-26','400',10,2,45,4),(17,'2023-04-19','p2234',5,6,2244,5);
