-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tanidigital_db
CREATE DATABASE IF NOT EXISTS `skinfadev` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `skinfadev`;

-- Dumping structure for table tanidigital_db.gudang
CREATE TABLE IF NOT EXISTS `gudang` (
  `kodegudang` varchar(10) NOT NULL,
  `namagudang` varchar(100) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kodegudang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tanidigital_db.gudang: ~2 rows (approximately)
INSERT INTO `gudang` (`kodegudang`, `namagudang`, `golongan`, `keterangan`, `created_at`) VALUES
	('G01', 'Gudang Utama', 'Sayur', 'Sayuran', '2025-10-18 22:25:49'),
	('G02', 'Gudang Cabang', 'Buah', 'Buah-buahan', '2025-10-18 22:25:49');

-- Dumping structure for table tanidigital_db.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(12,2) NOT NULL DEFAULT '0.00',
  `satuan` enum('pcs','g','kg','ton') DEFAULT NULL,
  `kodegudang` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`),
  KEY `fk_produk_gudang` (`kodegudang`),
  CONSTRAINT `fk_produk_gudang` FOREIGN KEY (`kodegudang`) REFERENCES `gudang` (`kodegudang`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- Dumping data for table tanidigital_db.produk: ~2 rows (approximately)
INSERT INTO `produk` (`id`, `kode`, `nama`, `harga`, `satuan`, `kodegudang`, `image`, `created_at`) VALUES
	(1, 'PRD-001', 'Bawang Merah', 34500.00, 'kg', NULL, 'eacf06adc35b50bd_1758979031.jpg', '2025-09-09 00:37:03'),
	(2, 'PRD-002', 'Kol Putih', 12750.00, 'pcs', NULL, '944e6343e9fdc009_1758979254.jpg', '2025-09-18 05:21:53');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
