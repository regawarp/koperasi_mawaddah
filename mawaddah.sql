/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100116
 Source Host           : localhost:3306
 Source Schema         : mawaddah

 Target Server Type    : MySQL
 Target Server Version : 100116
 File Encoding         : 65001

 Date: 02/01/2018 07:01:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_anggota
-- ----------------------------
DROP TABLE IF EXISTS `tbl_anggota`;
CREATE TABLE `tbl_anggota`  (
  `nik` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pekerjaan` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gaji_perbulan` int(9) NOT NULL,
  `persentasi` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`nik`) USING BTREE,
  INDEX `fk_pekerjaan_anggota`(`pekerjaan`) USING BTREE,
  CONSTRAINT `fk_pekerjaan_anggota` FOREIGN KEY (`pekerjaan`) REFERENCES `tbl_pekerjaan` (`id_pekerjaan`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_anggota
-- ----------------------------
BEGIN;
INSERT INTO `tbl_anggota` VALUES ('3273050403980002', 'Regawa Rama Prayoga', 'Bandung', 'P001', 8000000, 20), ('3277010908980002', 'Ilham Gibran Achmad Mudzakir', 'Cimahi', 'P001', 8000000, 30);
COMMIT;

-- ----------------------------
-- Table structure for tbl_angsuran
-- ----------------------------
DROP TABLE IF EXISTS `tbl_angsuran`;
CREATE TABLE `tbl_angsuran`  (
  `id_angsuran` int(6) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(6) NOT NULL,
  `harga_tambahan` int(11) NOT NULL,
  `dp` int(11) NOT NULL DEFAULT 0,
  `tgl_awal` date NOT NULL,
  `tgl_lunas` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_angsuran`) USING BTREE,
  INDEX `fk_transaksi_angusran`(`id_transaksi`) USING BTREE,
  CONSTRAINT `fk_transaksi_angusran` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_angsuran
-- ----------------------------
BEGIN;
INSERT INTO `tbl_angsuran` VALUES (1, 1, 16500000, 0, '2017-12-31', '2018-12-31');
COMMIT;

-- ----------------------------
-- Table structure for tbl_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang`;
CREATE TABLE `tbl_barang`  (
  `id_barang` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kategori` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `perkiraan_harga` int(9) NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `spesifikasi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_barang`) USING BTREE,
  INDEX `fk_kategori_barang`(`kategori`) USING BTREE,
  CONSTRAINT `fk_kategori_barang` FOREIGN KEY (`kategori`) REFERENCES `tbl_kategori_barang` (`id_kategori`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_barang
-- ----------------------------
BEGIN;
INSERT INTO `tbl_barang` VALUES ('B00001', 'Motor Honda', 'K002', 20000000, NULL, 'Speedforce Barry Allen'), ('B00002', 'sdasdas', 'K001', 12312, 'lenovo-laptop-yoga-920-feature-4.jpg', 'fsdfadsfsfsafasfsdfsadfdasfad'), ('B00003', 'Lenovo Yoga 920', 'K001', 14000000, 'lenovo-laptop-yoga-920-feature-4.jpg', '1.8GHz Intel Core i7-8550U (4GHz boost) 4 cores, 8 threads');
COMMIT;

-- ----------------------------
-- Table structure for tbl_detail_angsuran
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detail_angsuran`;
CREATE TABLE `tbl_detail_angsuran`  (
  `id_detail` int(9) NOT NULL AUTO_INCREMENT,
  `id_angsuran` int(6) NOT NULL,
  `tgl_angsuran` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `besar_angsuran` int(9) NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail`) USING BTREE,
  INDEX `fk_detail_angsuran`(`id_angsuran`) USING BTREE,
  CONSTRAINT `fk_detail_angsuran` FOREIGN KEY (`id_angsuran`) REFERENCES `tbl_angsuran` (`id_angsuran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_detail_angsuran
-- ----------------------------
BEGIN;
INSERT INTO `tbl_detail_angsuran` VALUES (1, 1, '2018-01-01 14:48:23.711748', 1400000);
COMMIT;

-- ----------------------------
-- Table structure for tbl_kategori_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kategori_barang`;
CREATE TABLE `tbl_kategori_barang`  (
  `id_kategori` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kategori_barang` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_kategori_barang
-- ----------------------------
BEGIN;
INSERT INTO `tbl_kategori_barang` VALUES ('K001', 'Elektronik'), ('K002', 'Alat Transportasi'), ('K003', 'Usaha');
COMMIT;

-- ----------------------------
-- Table structure for tbl_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pekerjaan`;
CREATE TABLE `tbl_pekerjaan`  (
  `id_pekerjaan` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pekerjaan` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pekerjaan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_pekerjaan
-- ----------------------------
BEGIN;
INSERT INTO `tbl_pekerjaan` VALUES ('P001', 'System Analyst');
COMMIT;

-- ----------------------------
-- Table structure for tbl_pengajuan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pengajuan`;
CREATE TABLE `tbl_pengajuan`  (
  `id_pengajuan` int(6) NOT NULL AUTO_INCREMENT,
  `tgl_pengajuan` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `pengaju` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `barang` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `peruntukan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jml_angsur` int(2) NULL DEFAULT 0,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengajuan`) USING BTREE,
  INDEX `fk_ajuan_anggota`(`pengaju`) USING BTREE,
  INDEX `fk_ajuan_barang`(`barang`) USING BTREE,
  CONSTRAINT `fk_ajuan_anggota` FOREIGN KEY (`pengaju`) REFERENCES `tbl_anggota` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ajuan_barang` FOREIGN KEY (`barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_pengajuan
-- ----------------------------
BEGIN;
INSERT INTO `tbl_pengajuan` VALUES (1, '2017-12-21 12:16:59.424191', '3273050403980002', 'B00002', 'sadasldjaslkdjaslk', 12, 0), (4, '2017-12-27 13:08:47.534435', '3273050403980002', 'B00003', 'Buat Main Minesweeper', 12, 3);
COMMIT;

-- ----------------------------
-- Table structure for tbl_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE `tbl_transaksi`  (
  `id_transaksi` int(6) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `pengajuan` int(6) NULL DEFAULT NULL,
  `harga_asli` int(11) NOT NULL,
  `banyak_angsuran` int(3) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE,
  INDEX `fk_transaksi_pengajuan`(`pengajuan`) USING BTREE,
  CONSTRAINT `fk_transaksi_pengajuan` FOREIGN KEY (`pengajuan`) REFERENCES `tbl_pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_transaksi
-- ----------------------------
BEGIN;
INSERT INTO `tbl_transaksi` VALUES (1, '2017-12-31 21:51:51.987178', 4, 15000000, 12, 0);
COMMIT;

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int(9) NOT NULL AUTO_INCREMENT,
  `username` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hak_akses` enum('ADMIN','ANGGOTA') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  INDEX `fk_anggota_user`(`username`) USING BTREE,
  CONSTRAINT `fk_anggota_user` FOREIGN KEY (`username`) REFERENCES `tbl_anggota` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
BEGIN;
INSERT INTO `tbl_user` VALUES (1, '3277010908980002', 'cef4feb87eee46ac6d8b9afa342efcd2', 'ADMIN'), (2, '3273050403980002', 'f020f1fe4770170f615d6732049cf1ec', 'ANGGOTA');
COMMIT;

-- ----------------------------
-- Triggers structure for table tbl_anggota
-- ----------------------------
DROP TRIGGER IF EXISTS `tg_user`;
delimiter ;;
CREATE TRIGGER `tg_user` AFTER INSERT ON `tbl_anggota` FOR EACH ROW INSERT into tbl_user(username,password,hak_akses) VALUES(NEW.nik,'e10adc3949ba59abbe56e057f20f883e','ANGGOTA')
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tbl_transaksi
-- ----------------------------
DROP TRIGGER IF EXISTS `tr_transaksi_angsuran`;
delimiter ;;
CREATE TRIGGER `tr_transaksi_angsuran` AFTER INSERT ON `tbl_transaksi` FOR EACH ROW INSERT INTO tbl_angsuran(id_transaksi,harga_tambahan,dp,tgl_awal,tgl_lunas) 
			 VALUES(NEW.id_transaksi,((0.83*NEW.banyak_angsuran)*NEW.harga_asli),0,NEW.tgl_transaksi,DATE_ADD(NEW.tgl_transaksi,INTERVAL NEW.banyak_angsuran MONTH))
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
