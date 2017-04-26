/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : motor_db

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-12-05 10:35:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bayar_cicilan`
-- ----------------------------
DROP TABLE IF EXISTS `bayar_cicilan`;
CREATE TABLE `bayar_cicilan` (
  `cicilan_kode` char(10) NOT NULL,
  `kredit_kode` char(10) NOT NULL,
  `cicilan_tanggal` date NOT NULL,
  `cicilan_jumlah` decimal(8,0) NOT NULL,
  `cicilan_ke` decimal(8,0) NOT NULL,
  `cicilan_sisa_ke` decimal(8,0) NOT NULL,
  `cicilan_sisa_harga` double NOT NULL,
  PRIMARY KEY (`cicilan_kode`),
  KEY `kredit_kode` (`kredit_kode`),
  CONSTRAINT `bayar_cicilan_ibfk_1` FOREIGN KEY (`kredit_kode`) REFERENCES `beli_kredit` (`kredit_kode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bayar_cicilan
-- ----------------------------
INSERT INTO `bayar_cicilan` VALUES ('CC20073803', 'KK20071558', '2015-02-20', '1000000', '1', '14', '14000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073809', 'KK20071558', '2015-02-20', '1000000', '2', '13', '13000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073815', 'KK20071558', '2015-02-20', '1000000', '3', '12', '12000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073821', 'KK20071558', '2015-02-20', '1000000', '4', '11', '11000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073825', 'KK20071558', '2015-02-20', '1000000', '5', '10', '10000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073833', 'KK20071558', '2015-02-20', '1000000', '6', '9', '9000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073839', 'KK20071558', '2015-02-20', '1000000', '7', '8', '8000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073843', 'KK20071558', '2015-02-20', '1000000', '8', '7', '7000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073848', 'KK20071558', '2015-02-20', '1000000', '9', '6', '6000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073853', 'KK20071558', '2015-02-20', '1000000', '10', '5', '5000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073857', 'KK20071558', '2015-02-20', '1000000', '11', '4', '4000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073904', 'KK20071558', '2015-02-20', '1000000', '12', '3', '3000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073907', 'KK20071558', '2015-02-20', '1000000', '13', '2', '2000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073918', 'KK20071558', '2015-02-20', '1000000', '14', '1', '1000000');
INSERT INTO `bayar_cicilan` VALUES ('CC20073935', 'KK20071558', '2015-02-20', '1000000', '15', '0', '0');
INSERT INTO `bayar_cicilan` VALUES ('CC22063527', 'KK20071558', '2015-02-22', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `beli_cash`
-- ----------------------------
DROP TABLE IF EXISTS `beli_cash`;
CREATE TABLE `beli_cash` (
  `cash_kode` char(10) NOT NULL,
  `pembeli_no_ktp` varchar(17) NOT NULL,
  `motor_kode` char(10) NOT NULL,
  `cash_tanggal` date NOT NULL,
  `cash_bayar` double NOT NULL,
  PRIMARY KEY (`cash_kode`),
  KEY `pembeli_no_ktp` (`pembeli_no_ktp`),
  KEY `motor_kode` (`motor_kode`) USING BTREE,
  CONSTRAINT `beli_cash_ibfk_1` FOREIGN KEY (`pembeli_no_ktp`) REFERENCES `pembeli` (`pembeli_no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `beli_cash_ibfk_2` FOREIGN KEY (`motor_kode`) REFERENCES `motor` (`motor_kode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of beli_cash
-- ----------------------------
INSERT INTO `beli_cash` VALUES ('CK01', '08272123123', 'MK01', '2015-01-29', '30000000');
INSERT INTO `beli_cash` VALUES ('CK02', '08272123123', 'MK01', '2015-02-17', '30000000');
INSERT INTO `beli_cash` VALUES ('CK09', '08272123123', 'MK01', '2015-02-18', '90000000');

-- ----------------------------
-- Table structure for `beli_kredit`
-- ----------------------------
DROP TABLE IF EXISTS `beli_kredit`;
CREATE TABLE `beli_kredit` (
  `kredit_kode` char(10) NOT NULL,
  `pembeli_no_ktp` varchar(17) NOT NULL,
  `paket_kode` char(10) NOT NULL,
  `motor_kode` char(10) NOT NULL,
  `kredit_tanggal` date NOT NULL,
  `fotokopi_ktp` enum('sudah','belum') DEFAULT NULL,
  `fotokopi_kk` enum('sudah','belum') DEFAULT NULL,
  `fotokopi_slip_gaji` enum('sudah','belum') DEFAULT NULL,
  PRIMARY KEY (`kredit_kode`),
  KEY `pembeli_no_ktp` (`pembeli_no_ktp`),
  KEY `paket_kode` (`paket_kode`),
  KEY `motor_kode` (`motor_kode`),
  CONSTRAINT `beli_kredit_ibfk_1` FOREIGN KEY (`pembeli_no_ktp`) REFERENCES `pembeli` (`pembeli_no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `beli_kredit_ibfk_2` FOREIGN KEY (`paket_kode`) REFERENCES `kredit_paket` (`paket_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `beli_kredit_ibfk_3` FOREIGN KEY (`motor_kode`) REFERENCES `motor` (`motor_kode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of beli_kredit
-- ----------------------------
INSERT INTO `beli_kredit` VALUES ('KK20071558', '08272123123', 'PK20064401', 'MK01', '2015-02-20', 'sudah', 'sudah', 'sudah');
INSERT INTO `beli_kredit` VALUES ('KK20075334', '08272123123', 'PK20064401', 'MK01', '2015-02-20', 'belum', 'sudah', 'sudah');

-- ----------------------------
-- Table structure for `kredit_paket`
-- ----------------------------
DROP TABLE IF EXISTS `kredit_paket`;
CREATE TABLE `kredit_paket` (
  `paket_kode` char(10) NOT NULL,
  `paket_harga_cash` double NOT NULL,
  `paket_uang_muka` double NOT NULL,
  `paket_jumlah_cicilan` decimal(2,0) NOT NULL,
  `paket_bunga` double NOT NULL,
  `paket_nilai_cicilan` double NOT NULL,
  PRIMARY KEY (`paket_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kredit_paket
-- ----------------------------
INSERT INTO `kredit_paket` VALUES ('PK20064401', '15000000', '1000000', '15', '10', '1000000');

-- ----------------------------
-- Table structure for `motor`
-- ----------------------------
DROP TABLE IF EXISTS `motor`;
CREATE TABLE `motor` (
  `motor_kode` char(10) NOT NULL,
  `motor_merk` varchar(15) NOT NULL,
  `motor_type` varchar(15) NOT NULL,
  `motor_warna_pilihan` varchar(70) NOT NULL,
  `motor_harga` double NOT NULL,
  `motor_gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`motor_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of motor
-- ----------------------------
INSERT INTO `motor` VALUES ('MK01', 'Jupiter MX', 'Bebek', 'Biru', '200000', './upload/0510322779.jpg');
INSERT INTO `motor` VALUES ('MK18093933', 'Honda Supra X', 'Bebek', 'Biru', '200000', './upload/0510325293.jpg');

-- ----------------------------
-- Table structure for `pembeli`
-- ----------------------------
DROP TABLE IF EXISTS `pembeli`;
CREATE TABLE `pembeli` (
  `pembeli_no_ktp` varchar(17) NOT NULL,
  `pembeli_nama` varchar(25) NOT NULL,
  `pembeli_alamat` varchar(60) NOT NULL,
  `pembeli_telpon` decimal(15,0) NOT NULL,
  `pembeli_hp` decimal(15,0) NOT NULL,
  PRIMARY KEY (`pembeli_no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembeli
-- ----------------------------
INSERT INTO `pembeli` VALUES ('08272123123', 'user1', 'Jakarta', '85725549988', '85725549988');
INSERT INTO `pembeli` VALUES ('092821312311', 'user2', 'Surabayar', '82123124512', '82912313232');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
