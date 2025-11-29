-- --------------------------------------------------------
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `buku_tamu`;
USE `buku_tamu`;

CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `tamu` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `tanggal_kegiatan`, `lokasi`) VALUES
    (1, 'Karya Wisata', '2025-11-29', 'Perpustakaan');