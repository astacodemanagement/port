-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_psi.agency
CREATE TABLE IF NOT EXISTS `agency` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_agency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.agency: ~2 rows (approximately)
INSERT INTO `agency` (`id`, `nama_agency`, `no_telp`, `email`, `alamat`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'Geranda', '08544354545', 'a@gmail.com', 'Jl. Kernada', 'Prettt', '2024-04-04 02:55:04', '2024-04-03 23:40:20'),
	(2, 'Pitsanda', '0987657754', 'a@gmail.com', 'Jl. Branoto', 'Prittt', '2024-04-04 06:39:34', '2024-04-03 23:40:04'),
	(3, 'Prindapan', '078967576', 'gasa@gmail.com', 'tes', 'tes', '2024-04-03 23:40:47', '2024-04-03 23:40:47');

-- Dumping structure for table db_psi.alasan
CREATE TABLE IF NOT EXISTS `alasan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_alasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.alasan: ~4 rows (approximately)
INSERT INTO `alasan` (`id`, `nama_alasan`, `keterangan`, `urutan`, `gambar`, `created_at`, `updated_at`) VALUES
	(3, 'Pasti Jaminan', 'Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim neque nisi sed.', '1', '1713756875_image-character-1.png', '2024-04-21 20:34:35', '2024-04-21 20:34:35'),
	(4, 'Pasti Transparan', 'Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim neque nisi sed.', '2', '1713756899_image-character-2.png', '2024-04-21 20:34:59', '2024-04-21 20:34:59'),
	(5, 'Pasti Resmi', 'Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim neque nisi sed.', '3', '1713756921_image-character-3.png', '2024-04-21 20:35:21', '2024-04-21 20:35:21'),
	(6, 'Pasti Prosedural', 'Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim neque nisi sed.', '4', '1713757143_image-character-4.png', '2024-04-21 20:39:03', '2024-04-21 20:39:03');

-- Dumping structure for table db_psi.benefit
CREATE TABLE IF NOT EXISTS `benefit` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` bigint NOT NULL,
  `nama_benefit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.benefit: ~3 rows (approximately)
INSERT INTO `benefit` (`id`, `job_id`, `nama_benefit`, `created_at`, `updated_at`) VALUES
	(41, 36, 'disediakan_tempat_tinggal', '2024-04-21 19:23:21', '2024-04-21 19:23:21'),
	(42, 36, 'disediakan_makan', '2024-04-21 19:23:22', '2024-04-21 19:23:22'),
	(43, 36, 'disediakan_tunjangan_makan', '2024-04-21 19:23:22', '2024-04-21 19:23:22');

-- Dumping structure for table db_psi.detail_bayar
CREATE TABLE IF NOT EXISTS `detail_bayar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seleksi_id` bigint NOT NULL DEFAULT '0',
  `tanggal_bayar` date DEFAULT NULL,
  `jumlah_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.detail_bayar: ~0 rows (approximately)

-- Dumping structure for table db_psi.employer
CREATE TABLE IF NOT EXISTS `employer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_employer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.employer: ~2 rows (approximately)
INSERT INTO `employer` (`id`, `nama_employer`, `no_telp`, `email`, `alamat`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'Rudi', '0855354354', 'a@gmail.com', 'Jl. Tajur Indah', 'Gelagar', '2024-04-04 02:52:56', '2024-04-04 02:52:57'),
	(2, 'Fasya', '08555r566', 'a@s.com', 'Jl. Rengas', 'Gass', NULL, NULL),
	(3, 'Burhan', '098765654654', 'gasa@gmail.com', 'sgdfgdf', 'dfgdfg', '2024-04-03 23:41:40', '2024-04-03 23:41:40');

-- Dumping structure for table db_psi.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table db_psi.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_psi.faq
CREATE TABLE IF NOT EXISTS `faq` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.faq: ~2 rows (approximately)
INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`, `urutan`, `created_at`, `updated_at`) VALUES
	(2, 'Siapa kamu ?', 'Aku kamu', '1', '2024-02-12 09:02:47', '2024-02-12 09:12:17'),
	(3, 'Dimana aku', 'Disini', '2', '2024-02-12 09:11:05', '2024-02-12 09:11:05');

-- Dumping structure for table db_psi.galeri
CREATE TABLE IF NOT EXISTS `galeri` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_galeri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.galeri: ~0 rows (approximately)

-- Dumping structure for table db_psi.gambar
CREATE TABLE IF NOT EXISTS `gambar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` bigint NOT NULL,
  `nama_gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.gambar: ~0 rows (approximately)

-- Dumping structure for table db_psi.job
CREATE TABLE IF NOT EXISTS `job` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_tutup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaji` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimasi_minimal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimasi_maksimal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaji_diterima` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kurs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_kurs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negara_id` bigint DEFAULT NULL,
  `nama_negara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_job_id` bigint DEFAULT NULL,
  `nama_kategori_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontrak_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuti_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masa_percobaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mata_uang_gaji` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kerja_lembur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahasa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rentang_usia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_bahasa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengalaman_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paragraf_galeri` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `link_video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_lain` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `disclaimer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.job: ~2 rows (approximately)
INSERT INTO `job` (`id`, `nama_job`, `nama_perusahaan`, `mitra`, `tanggal_tutup`, `gaji`, `jenis_pembayaran`, `estimasi_minimal`, `estimasi_maksimal`, `gaji_diterima`, `tanggal_kurs`, `nominal_kurs`, `negara_id`, `nama_negara`, `kategori_job_id`, `nama_kategori_job`, `kontrak_kerja`, `jam_kerja`, `hari_kerja`, `cuti_kerja`, `masa_percobaan`, `mata_uang_gaji`, `kerja_lembur`, `bahasa`, `deskripsi`, `jenis_kelamin`, `tinggi_badan`, `berat_badan`, `rentang_usia`, `level_bahasa`, `pengalaman_kerja`, `paragraf_galeri`, `link_video`, `info_lain`, `disclaimer`, `created_at`, `updated_at`) VALUES
	(1, 'Pelayan Restoran', 'Marriot Hotel', 'Mark Z', NULL, '2000000', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Rumania', 1, 'Manufacturing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'Bartender', 'Coffe Shop Indi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Slovakia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-21 19:23:21', '2024-04-21 19:23:21');

-- Dumping structure for table db_psi.kandidat
CREATE TABLE IF NOT EXISTS `kandidat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `usia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kawin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referensi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_referensi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hubungan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp_darurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_paspor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengeluaran_paspor` date DEFAULT NULL,
  `masa_kadaluarsa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kantor_paspor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi_paspor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_bahasa_inggris` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat_bahasa_inggris` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memiliki_anak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_anak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usia_anak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yakin_kerja_diluar_negeri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patuh_peraturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apa_anda_sehat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterbatasan_fisik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_keterbatasan_fisik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pernah_operasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_pernah_operasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_penyakit_rawat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_riwayat_penyakit_rawat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apa_anda_hamil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_akta_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_ijazah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_buku_nikah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_paspor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penjelasan_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paspor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat_kompetensi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paklaring` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_diri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blacklist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.kandidat: ~3 rows (approximately)
INSERT INTO `kandidat` (`id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `usia`, `agama`, `berat_badan`, `tinggi_badan`, `jenis_kelamin`, `pendidikan`, `status_kawin`, `nama_lengkap_ayah`, `nama_lengkap_ibu`, `alamat`, `kota`, `kecamatan`, `provinsi`, `referensi`, `nama_referensi`, `nama_keluarga`, `hubungan`, `no_telp_darurat`, `no_paspor`, `tanggal_pengeluaran_paspor`, `masa_kadaluarsa`, `kantor_paspor`, `kondisi_paspor`, `level_bahasa_inggris`, `sertifikat_bahasa_inggris`, `memiliki_anak`, `jumlah_anak`, `usia_anak`, `yakin_kerja_diluar_negeri`, `patuh_peraturan`, `motivasi`, `apa_anda_sehat`, `keterbatasan_fisik`, `keterangan_keterbatasan_fisik`, `pernah_operasi`, `keterangan_pernah_operasi`, `riwayat_penyakit_rawat`, `keterangan_riwayat_penyakit_rawat`, `apa_anda_hamil`, `ada_ktp`, `ada_kk`, `ada_akta_lahir`, `ada_ijazah`, `ada_buku_nikah`, `ada_paspor`, `penjelasan_dokumen`, `foto`, `paspor`, `ktp`, `kk`, `sertifikat_kompetensi`, `paklaring`, `video_diri`, `video_skill`, `email`, `no_hp`, `no_wa`, `password`, `status`, `blacklist`, `created_at`, `updated_at`) VALUES
	(1, '49799037055585', 'Valentine Marks Jr.', 'North Emilymouth', '1990-01-01', '34', 'Islam', '46', '86', 'Laki-laki', 'SMA', 'Cerai', 'Jaydon Kilback Jr.', 'Ophelia Halvorson', '2020 Durgan Mountains\nBalistrerihaven, MN 18449-9255', 'Donnellyport', 'furt', 'Maryland', 'quia', 'Garland Lesch', '111', NULL, NULL, '094062391492', '2022-07-10', '1974-04-13', 'Runolfsson-Schuster', 'Baik', 'Advanced', 'qui', 'Ya', '6', '4', 'Tidak', 'Ya', 'Reiciendis iste omnis odio et.', 'Ya', 'Tidak', 'Iusto a debitis qui et.', 'Ya', 'Eaque veritatis odio a ut optio et.', 'Ya', 'Libero ea officiis quas est fuga.', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Gaskeun', '3.png', 'https://via.placeholder.com/640x480.png/0011bb?text=deserunt', 'https://via.placeholder.com/640x480.png/006699?text=quo', 'https://via.placeholder.com/640x480.png/00ddff?text=in', 'https://via.placeholder.com/640x480.png/002299?text=nam', 'https://via.placeholder.com/640x480.png/007722?text=velit', 'http://www.schultz.com/in-magnam-est-voluptas-sunt-consequatur.html', 'http://nikolaus.org/sed-distinctio-odio-libero-dolorem-aliquam-consequuntur', 'c@gmail.com', '085320555396', '085320555396', '$2y$10$Z0zxztXIpstLbL2XZxcsH.0Fv6x/4v3FDsDYDbAUMKejmmedZSuhO', 'Pending', NULL, '2024-02-16 17:15:04', '2024-03-12 23:53:27'),
	(2, '86114661255961', 'Rafaela Nienow', 'Port Alan', '1990-01-01', '34', 'Other', '92', '953', 'Laki-laki', 'SMK', 'Cerai', 'Casimir Funk', 'Miss Hailee Christiansen PhD', '4970 Michael Freeway\nLake Manuel, WI 01902-8920', 'North Carolanne', 'haven', 'New Mexico', 'voluptatem', 'Mr. Sonny Bartoletti', 'Habib', 'Kakak', '08786757567', '405314701050', '1991-06-08', '1999-02-08', 'Homenick LLC', 'Baik', 'Intermediate', 'facilis', 'Ya', '8', '6', 'Tidak', 'Tidak', 'In iste at sed explicabo incidunt.', 'Tidak', 'Ya', 'Repellat delectus et quasi impedit corporis odit veritatis.', 'Ya', 'Animi veniam est enim provident est quidem consequatur.', 'Tidak', 'Sit et dolorem esse eum quia omnis quia.', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Bagus Lengkap nih bos', '4.png', 'https://via.placeholder.com/640x480.png/00eeff?text=pariatur', 'https://via.placeholder.com/640x480.png/00ee88?text=necessitatibus', 'https://via.placeholder.com/640x480.png/00ee00?text=doloribus', 'https://via.placeholder.com/640x480.png/005588?text=velit', 'https://via.placeholder.com/640x480.png/0022aa?text=eos', 'http://heaney.org/', 'http://www.schmitt.com/quam-quia-numquam-mollitia-nulla-et-aut-ut', 'd@gmail.com', '085320555397', '085320555397', '$2y$10$vEdEycGrM3uYZZplKFUwRuf103Ufjcl9dNh4z.4qSWelSEOjWCclq', 'Pending', NULL, '2024-02-16 17:15:05', '2024-03-12 23:50:58'),
	(3, '56999085947438', 'Ellis Hickle', 'Enolafort', '1994-01-01', '30', 'Buddhism', '23', '177', 'Laki-laki', 'S1', 'Menikah', 'Mr. Ferne Zemlak DVM', 'Kaylin Mayert', '8207 Kirk Trail\nEduardofort, CO 20047', 'North Velvashire', 'haven', 'Pennsylvania', 'amet', 'Prof. Reilly Homenick', '3333', NULL, NULL, '486608654481', '1993-09-26', '1998-10-28', 'Schuppe, Gerlach and Raynor', 'Rusak', 'Advanced', 'iure', 'Ya', '3', '9', 'Tidak', 'Ya', 'Dolor commodi sunt officia placeat.', 'Ya', 'Ya', 'Libero et architecto voluptates sunt occaecati qui expedita.', 'Ya', 'Ex aut dolor tenetur aut accusamus molestiae.', 'Tidak', 'Eius aliquam qui aspernatur.', 'Tidak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.png', 'https://via.placeholder.com/640x480.png/003311?text=deleniti', 'https://via.placeholder.com/640x480.png/00ee99?text=dolorem', 'https://via.placeholder.com/640x480.png/006611?text=provident', 'https://via.placeholder.com/640x480.png/004455?text=ipsa', 'https://via.placeholder.com/640x480.png/00aa55?text=rerum', 'http://www.green.com/ullam-aut-consequatur-quia-aut-omnis', 'http://www.wintheiser.com/commodi-eos-ex-maiores-soluta-autem-earum', 'e@gmail.com', '085320555398', '085320555398', '$2y$10$0c0u1EyRzjrp17oYEPNbIellSAFziqHUmo5WmC5zyNSrDuAEXv9oq', 'Pending', NULL, '2024-02-16 17:15:05', '2024-03-12 23:48:24');

-- Dumping structure for table db_psi.kategori_job
CREATE TABLE IF NOT EXISTS `kategori_job` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.kategori_job: ~3 rows (approximately)
INSERT INTO `kategori_job` (`id`, `nama_kategori_job`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'Manufacturing', '1', '2024-02-07 23:44:30', '2024-02-07 23:44:30'),
	(2, 'Hospitality', '2', '2024-02-07 23:44:44', '2024-02-07 23:44:44'),
	(3, 'Agriculture', '3', '2024-02-07 23:45:04', '2024-02-07 23:45:04');

-- Dumping structure for table db_psi.log_histori
CREATE TABLE IF NOT EXISTS `log_histori` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Tabel_Asal` varchar(50) DEFAULT NULL,
  `ID_Entitas` int DEFAULT NULL,
  `Aksi` enum('Create','Read','Update','Delete') DEFAULT NULL,
  `Waktu` timestamp NULL DEFAULT NULL,
  `Pengguna` varchar(50) DEFAULT NULL,
  `Data_Lama` text,
  `Data_Baru` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=928 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_psi.log_histori: ~11 rows (approximately)
INSERT INTO `log_histori` (`ID`, `Tabel_Asal`, `ID_Entitas`, `Aksi`, `Waktu`, `Pengguna`, `Data_Lama`, `Data_Baru`, `updated_at`, `created_at`) VALUES
	(917, 'Job', 36, 'Create', '2024-04-21 19:23:22', NULL, NULL, '{"nama_job":"Bartender","nama_perusahaan":"Coffe Shop Indi","negara_id":"2","nama_negara":"Slovakia","updated_at":"2024-04-22T02:23:21.000000Z","created_at":"2024-04-22T02:23:21.000000Z","id":36}', '2024-04-21 19:23:22', '2024-04-21 19:23:22'),
	(918, 'Slider', 11, 'Create', '2024-04-21 20:16:15', NULL, NULL, '{"nama_slider":"Siap bantu proses kamu untuk kerja di luar negeri","keterangan":"Kami adalah Perusahaan yang memiliki lisensi resmi P3MI (Penempatan Pekerja Migran Indonesia) dibawah naungan Kementrian Tenaga Kerja","urutan":"2","gambar":"1713755774_image-header.png","updated_at":"2024-04-22T03:16:14.000000Z","created_at":"2024-04-22T03:16:14.000000Z","id":11}', '2024-04-21 20:16:15', '2024-04-21 20:16:15'),
	(919, 'Slider', 8, 'Update', '2024-04-21 20:18:50', NULL, '{"id":8,"nama_slider":"The best jobsite for your future","gambar":"1713755930_image-header.png","keterangan":"We help you to find the best job to build your future","urutan":"1","created_at":"2024-02-12T13:47:34.000000Z","updated_at":"2024-04-22T03:18:50.000000Z"}', '{"id":8,"nama_slider":"The best jobsite for your future","gambar":"1713755930_image-header.png","keterangan":"We help you to find the best job to build your future","urutan":"1","created_at":"2024-02-12T13:47:34.000000Z","updated_at":"2024-04-22T03:18:50.000000Z"}', '2024-04-21 20:18:50', '2024-04-21 20:18:50'),
	(920, 'Alasan', 3, 'Create', '2024-04-21 20:34:35', NULL, NULL, '{"nama_alasan":"Pasti Jaminan","keterangan":"Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim neque nisi sed.","urutan":"1","gambar":"1713756875_image-character-1.png","updated_at":"2024-04-22T03:34:35.000000Z","created_at":"2024-04-22T03:34:35.000000Z","id":3}', '2024-04-21 20:34:35', '2024-04-21 20:34:35'),
	(921, 'Alasan', 4, 'Create', '2024-04-21 20:34:59', NULL, NULL, '{"nama_alasan":"Pasti Transparan","keterangan":"Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim neque nisi sed.","urutan":"2","gambar":"1713756899_image-character-2.png","updated_at":"2024-04-22T03:34:59.000000Z","created_at":"2024-04-22T03:34:59.000000Z","id":4}', '2024-04-21 20:34:59', '2024-04-21 20:34:59'),
	(922, 'Alasan', 5, 'Create', '2024-04-21 20:35:21', NULL, NULL, '{"nama_alasan":"Pasti Resmi","keterangan":"Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim neque nisi sed.","urutan":"3","gambar":"1713756921_image-character-3.png","updated_at":"2024-04-22T03:35:21.000000Z","created_at":"2024-04-22T03:35:21.000000Z","id":5}', '2024-04-21 20:35:21', '2024-04-21 20:35:21'),
	(923, 'Alasan', 6, 'Create', '2024-04-21 20:39:03', NULL, NULL, '{"nama_alasan":"Pasti Prosedural","keterangan":"Lorem ipsum dolor sit amet consectetur. Ullamcorper tellus amet duis enim dignissim neque nisi sed.","urutan":"4","gambar":"1713757143_image-character-4.png","updated_at":"2024-04-22T03:39:03.000000Z","created_at":"2024-04-22T03:39:03.000000Z","id":6}', '2024-04-21 20:39:03', '2024-04-21 20:39:03'),
	(924, 'Review', 5, 'Create', '2024-04-21 21:08:21', NULL, NULL, '{"nama_review":"~ Hellen Jummy -","keterangan":"Lacus vestibulum ultricies mi risus, duis non, volutpat nullam non. Magna\\r\\n                                    congue nisi maecenas elit aliquet eu sed consectetur. Vitae quis cras vitae\\r\\n                                    praesent morbi adipiscing purus consectetur mi","urutan":"3","gambar":"1713758901_image.png","updated_at":"2024-04-22T04:08:21.000000Z","created_at":"2024-04-22T04:08:21.000000Z","id":5}', '2024-04-21 21:08:21', '2024-04-21 21:08:21'),
	(925, 'review', 4, 'Delete', '2024-04-21 21:08:31', NULL, '{"id":4,"nama_review":"Galih Pangestu","jabatan":"","keterangan":"It is a long established fact that a reader will be distracted by readable content of a page when looking at its layout.","urutan":"2","gambar":null,"created_at":"2024-02-12T15:38:48.000000Z","updated_at":"2024-02-12T15:38:48.000000Z"}', NULL, '2024-04-21 21:08:31', '2024-04-21 21:08:31'),
	(926, 'review', 1, 'Delete', '2024-04-21 21:08:40', NULL, '{"id":1,"nama_review":"Muhamamd Rafi Heryadi, S.Kom","jabatan":"","keterangan":"It is a long established fact that a reader will be distracted by readable content of a page when looking at its layout.","urutan":"1","gambar":null,"created_at":"2024-02-12T15:18:37.000000Z","updated_at":"2024-02-12T15:29:23.000000Z"}', NULL, '2024-04-21 21:08:40', '2024-04-21 21:08:40'),
	(927, 'Review', 6, 'Create', '2024-04-21 21:12:11', NULL, NULL, '{"nama_review":"~ Julaekha Aparta-","keterangan":"Lacus vestibulum ultricies mi risus, duis non, volutpat nullam non. Magna\\r\\n                                    congue nisi maecenas elit aliquet eu sed consectetur. Vitae quis cras vitae\\r\\n                                    praesent morbi adipiscing purus consectetur mi.","urutan":"2","gambar":"1713759131_image.png","updated_at":"2024-04-22T04:12:11.000000Z","created_at":"2024-04-22T04:12:11.000000Z","id":6}', '2024-04-21 21:12:11', '2024-04-21 21:12:11');

-- Dumping structure for table db_psi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.migrations: ~10 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(27, '2024_02_29_143721_create_seleksis_table', 1),
	(28, '2024_03_09_073055_create_permission_tables', 2),
	(29, '2024_03_10_121755_create_pengaduans_table', 3),
	(30, '2024_03_10_151328_create_pengeluarans_table', 4),
	(31, '2024_03_10_152356_create_pemasukans_table', 5),
	(32, '2024_03_18_051002_create_detail_bayars_table', 6),
	(33, '2024_03_19_062157_create_refund_detail_bayars_table', 7),
	(34, '2024_03_26_064500_create_suppliers_table', 8),
	(35, '2024_04_04_022222_create_employers_table', 9),
	(36, '2024_04_04_022334_create_agencies_table', 10);

-- Dumping structure for table db_psi.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table db_psi.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.model_has_roles: ~0 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1);

-- Dumping structure for table db_psi.negara
CREATE TABLE IF NOT EXISTS `negara` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.negara: ~4 rows (approximately)
INSERT INTO `negara` (`id`, `kode_negara`, `nama_negara`, `created_at`, `updated_at`) VALUES
	(1, 'RMN', 'Rumania', '2024-02-08 00:10:19', '2024-02-08 00:10:19'),
	(2, 'SVK', 'Slovakia', '2024-02-08 00:10:32', '2024-02-08 00:10:32'),
	(3, 'PLN', 'Polandia', '2024-02-08 00:10:42', '2024-02-08 00:13:43');

-- Dumping structure for table db_psi.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.password_resets: ~0 rows (approximately)

-- Dumping structure for table db_psi.pemasukan
CREATE TABLE IF NOT EXISTS `pemasukan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_pemasukan` date NOT NULL,
  `nama_pemasukan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pemasukan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.pemasukan: ~0 rows (approximately)
INSERT INTO `pemasukan` (`id`, `tanggal_pemasukan`, `nama_pemasukan`, `jumlah_pemasukan`, `keterangan`, `pic`, `gambar`, `created_at`, `updated_at`) VALUES
	(4, '2024-03-20', 'Donasi', '1000000', 'tes', 'Rudi Aja', '1710899331_IMG_20221204_110935.jpg', '2024-03-19 18:48:51', '2024-03-19 18:48:51');

-- Dumping structure for table db_psi.pendaftaran
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `negara_id` bigint DEFAULT NULL,
  `nama_negara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_job_id` bigint DEFAULT NULL,
  `nama_kategori_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_reject` text COLLATE utf8mb4_unicode_ci,
  `blacklist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_cek_verifikasi` date DEFAULT NULL,
  `tanggal_sudah_verifikasi` date DEFAULT NULL,
  `tanggal_reject_verifikasi` date DEFAULT NULL,
  `bayar_cf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_tf_cf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_tf_cf` date DEFAULT NULL,
  `status_paid_cf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_refund_cf` date DEFAULT NULL,
  `bayar_refund_cf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.pendaftaran: ~3 rows (approximately)
INSERT INTO `pendaftaran` (`id`, `negara_id`, `nama_negara`, `kategori_job_id`, `nama_kategori_job`, `nik`, `nama_lengkap`, `status`, `alasan_reject`, `blacklist`, `tanggal_cek_verifikasi`, `tanggal_sudah_verifikasi`, `tanggal_reject_verifikasi`, `bayar_cf`, `bukti_tf_cf`, `tanggal_tf_cf`, `status_paid_cf`, `tanggal_refund_cf`, `bayar_refund_cf`, `created_at`, `updated_at`) VALUES
	(3, 1, 'Rumania', 1, 'Manufacturing', '49799037055585', 'Valentine Marks Jr.', 'Belum Verifikasi(Pending)', NULL, NULL, '2024-04-02', '2024-04-02', '2024-04-02', '3000000', '1711530066_Thumbnail YouTube  (1).png', '2024-03-27', 'Paid', '2024-04-02', '10000', '2024-02-16 17:15:04', '2024-04-02 09:37:20'),
	(4, 2, 'Slovakia', 2, 'Hospitality', '86114661255961', 'Rafaela Nienow', 'Belum Verifikasi(Pending)', NULL, NULL, '2024-04-02', '2024-04-02', '2024-04-02', '2000000', '1711993699_2062687104.png', '2024-03-18', 'Paid', '2024-04-02', '1000000', '2024-02-16 17:15:05', '2024-04-02 09:37:15'),
	(5, 3, 'Polandia', 3, 'Agriculture', '56999085947438', 'Ellis Hickle', 'Belum Verifikasi(Pending)', NULL, NULL, '2024-04-02', '2024-04-02', '2024-04-02', '2000000', '1710898542_Thumbnail YouTube  (1).png', '2024-03-20', 'Paid', NULL, '0', '2024-02-16 17:15:05', '2024-04-02 09:36:16');

-- Dumping structure for table db_psi.pengaduan
CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kandidat_id` bigint NOT NULL,
  `nama_kandidat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.pengaduan: ~0 rows (approximately)

-- Dumping structure for table db_psi.pengalaman_kerja
CREATE TABLE IF NOT EXISTS `pengalaman_kerja` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pendaftaran_id` bigint NOT NULL,
  `negara_tempat_kerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai_kerja` date DEFAULT NULL,
  `tanggal_selesai_kerja` date DEFAULT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.pengalaman_kerja: ~2 rows (approximately)
INSERT INTO `pengalaman_kerja` (`id`, `pendaftaran_id`, `negara_tempat_kerja`, `nama_perusahaan`, `tanggal_mulai_kerja`, `tanggal_selesai_kerja`, `posisi`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Malaysia', 'Walls', '2024-03-15', '2024-03-15', 'Admin', '2024-03-15 08:11:56', '2024-03-15 08:11:58'),
	(2, 1, 'Indonesia', 'PRA', '2024-03-15', '2024-03-15', 'HRD', '2024-03-15 08:12:31', '2024-03-15 08:12:31');

-- Dumping structure for table db_psi.pengeluaran
CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_pengeluaran` date NOT NULL,
  `nama_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.pengeluaran: ~0 rows (approximately)
INSERT INTO `pengeluaran` (`id`, `tanggal_pengeluaran`, `nama_pengeluaran`, `jumlah_pengeluaran`, `keterangan`, `pic`, `gambar`, `created_at`, `updated_at`) VALUES
	(3, '2024-03-20', 'Gaji Karyawan', '500000', 'gaji', 'Andrey', '1710899356_team-3.png', '2024-03-19 18:49:16', '2024-03-19 18:49:16');

-- Dumping structure for table db_psi.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.permissions: ~0 rows (approximately)

-- Dumping structure for table db_psi.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table db_psi.refund_detail_bayar
CREATE TABLE IF NOT EXISTS `refund_detail_bayar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seleksi_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_bayar_refund` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_bayar_refund` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_bayar_refund` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.refund_detail_bayar: ~0 rows (approximately)

-- Dumping structure for table db_psi.review
CREATE TABLE IF NOT EXISTS `review` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.review: ~2 rows (approximately)
INSERT INTO `review` (`id`, `nama_review`, `jabatan`, `keterangan`, `urutan`, `gambar`, `created_at`, `updated_at`) VALUES
	(5, '~ Hellen Jummy -', NULL, 'Lacus vestibulum ultricies mi risus, duis non, volutpat nullam non. Magna\r\n                                    congue nisi maecenas elit aliquet eu sed consectetur. Vitae quis cras vitae\r\n                                    praesent morbi adipiscing purus consectetur mi', '3', '1713758901_image.png', '2024-04-21 21:08:21', '2024-04-21 21:08:21'),
	(6, '~ Julaekha Aparta-', NULL, 'Lacus vestibulum ultricies mi risus, duis non, volutpat nullam non. Magna\r\n                                    congue nisi maecenas elit aliquet eu sed consectetur. Vitae quis cras vitae\r\n                                    praesent morbi adipiscing purus consectetur mi.', '2', '1713759131_image.png', '2024-04-21 21:12:11', '2024-04-21 21:12:11');

-- Dumping structure for table db_psi.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'web', '2024-03-10 12:12:15', '2024-03-10 12:12:16'),
	(2, 'admin', 'web', '2024-03-10 12:13:12', '2024-03-10 12:13:12'),
	(3, 'user', 'web', '2024-03-10 12:13:13', '2024-03-10 12:13:14');

-- Dumping structure for table db_psi.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.role_has_permissions: ~0 rows (approximately)

-- Dumping structure for table db_psi.seleksi
CREATE TABLE IF NOT EXISTS `seleksi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kandidat_id` bigint NOT NULL,
  `nama_kandidat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_id` bigint NOT NULL,
  `job_terselect` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaji_akhir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durasi_kontrak` bigint DEFAULT NULL,
  `tanggal_akhir_kontrak` date DEFAULT NULL,
  `employer_id` bigint DEFAULT NULL,
  `agency_id` bigint DEFAULT NULL,
  `tanggal_apply` date DEFAULT NULL,
  `tanggal_cek_kualifikasi` date DEFAULT NULL,
  `tanggal_lolos_kualifikasi` date DEFAULT NULL,
  `keterangan_dari_lolos_kualifikasi` text COLLATE utf8mb4_unicode_ci,
  `keterangan_interview` text COLLATE utf8mb4_unicode_ci,
  `tanggal_interview` date DEFAULT NULL,
  `tanggal_dari_interview` date DEFAULT NULL,
  `keterangan_dari_interview` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tanggal_dari_lolos_interview` date DEFAULT NULL,
  `keterangan_dari_lolos_interview` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tanggal_dalam_proses` date DEFAULT NULL,
  `status_dalam_kerja` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_dalam_proses` text COLLATE utf8mb4_unicode_ci,
  `tanggal_transfer_kf` date DEFAULT NULL,
  `status_kf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_refund_kf` date DEFAULT NULL,
  `jumlah_refund_kf` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_berangkat` date DEFAULT NULL,
  `jam_terbang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iktt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mjk` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jak` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ak` date DEFAULT NULL,
  `vt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_validity` date DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `tanggal_habis` date DEFAULT NULL,
  `pap` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keterangan_seleksi_terbang` text COLLATE utf8mb4_unicode_ci,
  `tanggal_seleksi_terbang` date DEFAULT NULL,
  `tanggal_selesai_kontrak` date DEFAULT NULL,
  `keterangan_selesai_kontrak` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tanggal_batal` date DEFAULT NULL,
  `keterangan_batal` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_penempatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_mcu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `total_biaya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sisa_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ktkln` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.seleksi: ~2 rows (approximately)
INSERT INTO `seleksi` (`id`, `kandidat_id`, `nama_kandidat`, `job_id`, `job_terselect`, `gaji_akhir`, `durasi_kontrak`, `tanggal_akhir_kontrak`, `employer_id`, `agency_id`, `tanggal_apply`, `tanggal_cek_kualifikasi`, `tanggal_lolos_kualifikasi`, `keterangan_dari_lolos_kualifikasi`, `keterangan_interview`, `tanggal_interview`, `tanggal_dari_interview`, `keterangan_dari_interview`, `tanggal_dari_lolos_interview`, `keterangan_dari_lolos_interview`, `tanggal_dalam_proses`, `status_dalam_kerja`, `keterangan_dalam_proses`, `tanggal_transfer_kf`, `status_kf`, `tanggal_refund_kf`, `jumlah_refund_kf`, `tanggal_berangkat`, `jam_terbang`, `mik`, `iktt`, `mjk`, `jak`, `tanggal_ak`, `vt`, `vd`, `tanggal_validity`, `tanggal_terbit`, `tanggal_habis`, `pap`, `supplier_id`, `keterangan_seleksi_terbang`, `tanggal_seleksi_terbang`, `tanggal_selesai_kontrak`, `keterangan_selesai_kontrak`, `tanggal_batal`, `keterangan_batal`, `status`, `biaya_penempatan`, `biaya_id`, `biaya_mcu`, `keterangan`, `total_biaya`, `total_bayar`, `sisa_bayar`, `id_ktkln`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Valentine Marks Jr.', 1, 'Office Boy', '1111111', 6, '2024-10-04', 2, 2, '2024-04-02', '2024-04-02', '2024-04-02', 'Keterangan dari Lolos Kualifikasi Menuju Interview', 'Intervoew Di Cafe lana', '2024-04-02', '2024-04-02', 'Keterangan dari Lolosnterview', '2024-04-02', 'Keterangan dari Lolos Interview', '2024-07-04', NULL, '123456', NULL, NULL, NULL, NULL, '2024-04-04', '17', '1', '1', '1', '1', '2024-04-03', '1', '0', '2024-04-05', '2024-04-06', '2024-04-07', '1', '1', NULL, '2024-04-04', '2024-03-20', NULL, '2024-03-27', NULL, 'Dalam Proses', '6000000', '500000', '1000000', 'Keterangan Dari Saya', '3000000', '0', '3000000', 'Sudah', '2024-03-17 06:04:43', '2024-04-03 21:13:25'),
	(2, 2, 'Rafaela Nienow', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-02', '2024-04-02', '2024-04-02', 'Keterangan Dari Lolos Kualifikasi :', 'Di Sana Yah', '2024-04-30', '2024-04-02', 'Keterangan Dari Interview :', '2024-04-02', 'Keterangan dari Lolos Interview', '2024-04-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', NULL, '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lolos Interview', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum', NULL, '2024-04-02 09:51:16');

-- Dumping structure for table db_psi.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.slider: ~2 rows (approximately)
INSERT INTO `slider` (`id`, `nama_slider`, `gambar`, `keterangan`, `urutan`, `created_at`, `updated_at`) VALUES
	(8, 'The best jobsite for your future', '1713755930_image-header.png', 'We help you to find the best job to build your future', '1', '2024-02-12 06:47:34', '2024-04-21 20:18:50'),
	(11, 'Siap bantu proses kamu untuk kerja di luar negeri', '1713755774_image-header.png', 'Kami adalah Perusahaan yang memiliki lisensi resmi P3MI (Penempatan Pekerja Migran Indonesia) dibawah naungan Kementrian Tenaga Kerja', '2', '2024-04-21 20:16:14', '2024-04-21 20:16:14');

-- Dumping structure for table db_psi.step
CREATE TABLE IF NOT EXISTS `step` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_step` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.step: ~0 rows (approximately)

-- Dumping structure for table db_psi.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.supplier: ~0 rows (approximately)
INSERT INTO `supplier` (`id`, `nama_supplier`, `no_telp`, `alamat`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'Makaroni 2 Saudara', '085320555394', 'Tasikmalaya', 'Tasikmalaya', '2024-03-25 23:58:49', '2024-03-25 23:58:49');

-- Dumping structure for event db_psi.update_status_kontrak_event
DELIMITER //
CREATE EVENT `update_status_kontrak_event` ON SCHEDULE EVERY 1 DAY STARTS '2024-04-04 11:11:45' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE seleksi
    SET status = 'Selesai Kontrak'
    WHERE tanggal_akhir_kontrak < CURDATE() AND status != 'Selesai Kontrak';
END//
DELIMITER ;

-- Dumping structure for table db_psi.users
CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Muhammad Rafi Heryadi', 'muhammadrafiheryadi94@gmail.com', NULL, '$2y$10$xoHgF8YFyQfazfZl/NBF..Nace3FKpyftd/ns7q2tUCwMnY/GIcDK', NULL, '2024-03-10 05:15:46', '2024-03-10 05:15:46');

-- Dumping structure for trigger db_psi.set_tanggal_akhir_kontrak_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `set_tanggal_akhir_kontrak_insert` BEFORE INSERT ON `seleksi` FOR EACH ROW BEGIN
    SET NEW.tanggal_akhir_kontrak = DATE_ADD(NEW.tanggal_berangkat, INTERVAL NEW.durasi_kontrak MONTH);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_psi.set_tanggal_akhir_kontrak_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `set_tanggal_akhir_kontrak_update` BEFORE UPDATE ON `seleksi` FOR EACH ROW BEGIN
    SET NEW.tanggal_akhir_kontrak = DATE_ADD(NEW.tanggal_berangkat, INTERVAL NEW.durasi_kontrak MONTH);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_psi.update_usia_trigger
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `update_usia_trigger` BEFORE INSERT ON `pendaftaran` FOR EACH ROW BEGIN
    DECLARE dob DATE;
    DECLARE today DATE;
    DECLARE age INT;
    
    SET dob = NEW.tanggal_lahir;
    SET today = CURDATE();
    SET age = TIMESTAMPDIFF(YEAR, dob, today);
    
    SET NEW.usia = age;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_psi.update_usia_trigger_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `update_usia_trigger_update` BEFORE UPDATE ON `kandidat` FOR EACH ROW BEGIN
    DECLARE dob DATE;
    DECLARE today DATE;
    DECLARE age INT;
    
    SET dob = NEW.tanggal_lahir;
    SET today = CURDATE();
    SET age = TIMESTAMPDIFF(YEAR, dob, today);
    
    SET NEW.usia = age;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
