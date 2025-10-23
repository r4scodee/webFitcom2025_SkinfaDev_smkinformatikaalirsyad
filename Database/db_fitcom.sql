-- --------------------------------------------------------
-- Database SkinfaDev Full Structure
-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `skinfadev` 
CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `skinfadev`;

-- ========================================================
-- Table: gudang
-- ========================================================
CREATE TABLE IF NOT EXISTS `gudang` (
  `kodegudang` VARCHAR(10) NOT NULL,
  `namagudang` VARCHAR(100) NOT NULL,
  `golongan` VARCHAR(50) NOT NULL,
  `keterangan` TEXT,
  `alamat` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kodegudang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data dummy gudang
INSERT INTO `gudang` (`kodegudang`, `namagudang`, `golongan`, `keterangan`, `alamat`) VALUES
('G01', 'Gudang Utama', 'Sayur', 'Sayuran segar', 'Jl. Raya No.1, Kota A'),
('G02', 'Gudang Cabang', 'Buah', 'Buah-buahan segar', 'Jl. Kebon No.5, Kota B');

-- ========================================================
-- Table: produk
-- ========================================================
CREATE TABLE IF NOT EXISTS `produk` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` VARCHAR(50) NOT NULL,
  `nama` VARCHAR(255) NOT NULL,
  `harga` DECIMAL(12,2) NOT NULL DEFAULT '0.00',
  `stok` INT UNSIGNED DEFAULT 0,
  `satuan` ENUM('pcs','g','kg','ton') DEFAULT NULL,
  `kodegudang` VARCHAR(10) DEFAULT NULL,
  `image` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`),
  KEY `fk_produk_gudang` (`kodegudang`),
  CONSTRAINT `fk_produk_gudang` FOREIGN KEY (`kodegudang`) REFERENCES `gudang` (`kodegudang`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data dummy produk
INSERT INTO `produk` (`kode`, `nama`, `harga`, `stok`, `satuan`, `kodegudang`, `image`) VALUES
('PRD-001', 'Bawang Merah', 34500.00, 50, 'kg', 'G01', 'bawang_merah.jpg'),
('PRD-002', 'Kol Putih', 12750.00, 100, 'pcs', 'G02', 'kol_putih.jpg');

-- ========================================================
-- Table: kendaraan
-- ========================================================
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `kodekendaraan` VARCHAR(10) NOT NULL,
  `namakendaraan` VARCHAR(100) NOT NULL,
  `platnomor` VARCHAR(20) NOT NULL,
  `kapasitas` INT DEFAULT 0,
  `status` ENUM('Tersedia','Sedang Kirim','Servis') DEFAULT 'Tersedia',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kodekendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data dummy kendaraan
INSERT INTO `kendaraan` (`kodekendaraan`, `namakendaraan`, `platnomor`, `kapasitas`, `status`) VALUES
('K01', 'Truk A', 'B 1234 CD', 1000, 'Tersedia'),
('K02', 'Pickup B', 'B 5678 EF', 500, 'Tersedia');

-- ========================================================
-- Table: pengiriman
-- ========================================================
CREATE TABLE IF NOT EXISTS `pengiriman` (
  `kodepengiriman` VARCHAR(10) NOT NULL,
  `kendaraan` VARCHAR(10) NOT NULL,
  `tujuan` VARCHAR(255) NOT NULL,
  `tanggal` DATE NOT NULL,
  `status` ENUM('Pending','Berjalan','Selesai') DEFAULT 'Pending',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kodepengiriman`),
  CONSTRAINT `fk_pengiriman_kendaraan` FOREIGN KEY (`kendaraan`) REFERENCES `kendaraan` (`kodekendaraan`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data dummy pengiriman
INSERT INTO `pengiriman` (`kodepengiriman`, `kendaraan`, `tujuan`, `tanggal`, `status`) VALUES
('P001', 'K01', 'Pasar Kota A', '2025-10-25', 'Pending'),
('P002', 'K02', 'Supermarket Kota B', '2025-10-26', 'Pending');

