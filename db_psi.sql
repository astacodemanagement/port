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

-- Dumping structure for table db_psi.alasan
CREATE TABLE IF NOT EXISTS `alasan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.alasan: ~0 rows (approximately)

-- Dumping structure for table db_psi.benefit
CREATE TABLE IF NOT EXISTS `benefit` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_id` bigint NOT NULL,
  `nama_benefit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.benefit: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.job: ~1 rows (approximately)

-- Dumping structure for table db_psi.kategori_job
CREATE TABLE IF NOT EXISTS `kategori_job` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.kategori_job: ~2 rows (approximately)
INSERT INTO `kategori_job` (`id`, `nama_kategori_job`, `urutan`, `created_at`, `updated_at`) VALUES
	(5, 'Manufacturing', '1', '2024-02-07 23:44:30', '2024-02-07 23:44:30'),
	(6, 'Hospitality', '2', '2024-02-07 23:44:44', '2024-02-07 23:44:44'),
	(7, 'Agriculture', '3', '2024-02-07 23:45:04', '2024-02-07 23:45:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=417 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_psi.log_histori: ~8 rows (approximately)
INSERT INTO `log_histori` (`ID`, `Tabel_Asal`, `ID_Entitas`, `Aksi`, `Waktu`, `Pengguna`, `Data_Lama`, `Data_Baru`, `updated_at`, `created_at`) VALUES
	(408, 'Pendaftaran', 5, 'Update', '2024-02-17 00:41:36', NULL, '{"id":5,"negara_id":82485,"nama_negara":"Antarctica (the territory South of 60 deg S)","kategori_job_id":8155,"nama_kategori_job":"Scientific Photographer","nik":"56999085947438","nama_lengkap":"Ellis Hickle","tempat_lahir":"Enolafort","tanggal_lahir":"2018-11-03","usia":"62","agama":"Buddhism","berat_badan":"23","tinggi_badan":"177","jenis_kelamin":"Laki-laki","status_kawin":"Menikah","nama_lengkap_ayah":"Mr. Ferne Zemlak DVM","nama_lengkap_ibu":"Kaylin Mayert","alamat":"8207 Kirk Trail\\nEduardofort, CO 20047","kota":"North Velvashire","kecamatan":"haven","provinsi":"Pennsylvania","referensi":"amet","nama_referensi":"Prof. Reilly Homenick","no_paspor":"486608654481","tanggal_pengeluaran_paspor":"1993-09-26","masa_kadaluarsa":"1998-10-28","kantor_paspor":"Schuppe, Gerlach and Raynor","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"iure","memiliki_anak":"Ya","jumlah_anak":"3","usia_anak":"9","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Dolor commodi sunt officia placeat.","apa_anda_sehat":"Ya","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Libero et architecto voluptates sunt occaecati qui expedita.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ex aut dolor tenetur aut accusamus molestiae.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Eius aliquam qui aspernatur.","apa_anda_hamil":"Tidak","foto":"1.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/003311?text=deleniti","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee99?text=dolorem","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/006611?text=provident","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/004455?text=ipsa","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa55?text=rerum","video_diri":"http:\\/\\/www.green.com\\/ullam-aut-consequatur-quia-aut-omnis","video_skill":"http:\\/\\/www.wintheiser.com\\/commodi-eos-ex-maiores-soluta-autem-earum","password":"$2y$10$0c0u1EyRzjrp17oYEPNbIellSAFziqHUmo5WmC5zyNSrDuAEXv9oq","status":"Pending","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-17T07:33:39.000000Z"}', '{"id":5,"negara_id":82485,"nama_negara":"Antarctica (the territory South of 60 deg S)","kategori_job_id":8155,"nama_kategori_job":"Scientific Photographer","nik":"56999085947438","nama_lengkap":"Ellis Hickle","tempat_lahir":"Enolafort","tanggal_lahir":"2018-11-03","usia":"62","agama":"Buddhism","berat_badan":"23","tinggi_badan":"177","jenis_kelamin":"Laki-laki","status_kawin":"Menikah","nama_lengkap_ayah":"Mr. Ferne Zemlak DVM","nama_lengkap_ibu":"Kaylin Mayert","alamat":"8207 Kirk Trail\\nEduardofort, CO 20047","kota":"North Velvashire","kecamatan":"haven","provinsi":"Pennsylvania","referensi":"amet","nama_referensi":"Prof. Reilly Homenick","no_paspor":"486608654481","tanggal_pengeluaran_paspor":"1993-09-26","masa_kadaluarsa":"1998-10-28","kantor_paspor":"Schuppe, Gerlach and Raynor","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"iure","memiliki_anak":"Ya","jumlah_anak":"3","usia_anak":"9","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Dolor commodi sunt officia placeat.","apa_anda_sehat":"Ya","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Libero et architecto voluptates sunt occaecati qui expedita.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ex aut dolor tenetur aut accusamus molestiae.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Eius aliquam qui aspernatur.","apa_anda_hamil":"Tidak","foto":"1.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/003311?text=deleniti","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee99?text=dolorem","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/006611?text=provident","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/004455?text=ipsa","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa55?text=rerum","video_diri":"http:\\/\\/www.green.com\\/ullam-aut-consequatur-quia-aut-omnis","video_skill":"http:\\/\\/www.wintheiser.com\\/commodi-eos-ex-maiores-soluta-autem-earum","password":"$2y$10$0c0u1EyRzjrp17oYEPNbIellSAFziqHUmo5WmC5zyNSrDuAEXv9oq","status":"Verifikasi","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-17T07:41:36.000000Z"}', '2024-02-17 00:41:36', '2024-02-17 00:41:36'),
	(409, 'Pendaftaran', 4, 'Update', '2024-02-17 01:13:36', NULL, '{"id":4,"negara_id":64,"nama_negara":"Tunisia","kategori_job_id":196402,"nama_kategori_job":"Precision Printing Worker","nik":"86114661255961","nama_lengkap":"Rafaela Nienow","tempat_lahir":"Port Alan","tanggal_lahir":"2010-03-13","usia":"26","agama":"Other","berat_badan":"92","tinggi_badan":"953","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Casimir Funk","nama_lengkap_ibu":"Miss Hailee Christiansen PhD","alamat":"4970 Michael Freeway\\nLake Manuel, WI 01902-8920","kota":"North Carolanne","kecamatan":"haven","provinsi":"New Mexico","referensi":"voluptatem","nama_referensi":"Mr. Sonny Bartoletti","no_paspor":"405314701050","tanggal_pengeluaran_paspor":"1991-06-08","masa_kadaluarsa":"1999-02-08","kantor_paspor":"Homenick LLC","kondisi_paspor":"Baik","level_bahasa_inggris":"Intermediate","sertifikat_bahasa_inggris":"facilis","memiliki_anak":"Ya","jumlah_anak":"8","usia_anak":"6","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Tidak","motivasi":"In iste at sed explicabo incidunt.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Repellat delectus et quasi impedit corporis odit veritatis.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Animi veniam est enim provident est quidem consequatur.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Sit et dolorem esse eum quia omnis quia.","apa_anda_hamil":"Tidak","foto":"4.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eeff?text=pariatur","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee88?text=necessitatibus","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee00?text=doloribus","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/005588?text=velit","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022aa?text=eos","video_diri":"http:\\/\\/heaney.org\\/","video_skill":"http:\\/\\/www.schmitt.com\\/quam-quia-numquam-mollitia-nulla-et-aut-ut","password":"$2y$10$vEdEycGrM3uYZZplKFUwRuf103Ufjcl9dNh4z.4qSWelSEOjWCclq","status":"Pending","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-17T07:36:03.000000Z"}', '{"id":4,"negara_id":64,"nama_negara":"Tunisia","kategori_job_id":196402,"nama_kategori_job":"Precision Printing Worker","nik":"86114661255961","nama_lengkap":"Rafaela Nienow","tempat_lahir":"Port Alan","tanggal_lahir":"2010-03-13","usia":"26","agama":"Other","berat_badan":"92","tinggi_badan":"953","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Casimir Funk","nama_lengkap_ibu":"Miss Hailee Christiansen PhD","alamat":"4970 Michael Freeway\\nLake Manuel, WI 01902-8920","kota":"North Carolanne","kecamatan":"haven","provinsi":"New Mexico","referensi":"voluptatem","nama_referensi":"Mr. Sonny Bartoletti","no_paspor":"405314701050","tanggal_pengeluaran_paspor":"1991-06-08","masa_kadaluarsa":"1999-02-08","kantor_paspor":"Homenick LLC","kondisi_paspor":"Baik","level_bahasa_inggris":"Intermediate","sertifikat_bahasa_inggris":"facilis","memiliki_anak":"Ya","jumlah_anak":"8","usia_anak":"6","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Tidak","motivasi":"In iste at sed explicabo incidunt.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Repellat delectus et quasi impedit corporis odit veritatis.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Animi veniam est enim provident est quidem consequatur.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Sit et dolorem esse eum quia omnis quia.","apa_anda_hamil":"Tidak","foto":"4.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eeff?text=pariatur","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee88?text=necessitatibus","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee00?text=doloribus","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/005588?text=velit","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022aa?text=eos","video_diri":"http:\\/\\/heaney.org\\/","video_skill":"http:\\/\\/www.schmitt.com\\/quam-quia-numquam-mollitia-nulla-et-aut-ut","password":"$2y$10$vEdEycGrM3uYZZplKFUwRuf103Ufjcl9dNh4z.4qSWelSEOjWCclq","status":"Reject","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-17T08:13:36.000000Z"}', '2024-02-17 01:13:36', '2024-02-17 01:13:36'),
	(410, 'Pendaftaran', 1, 'Update', '2024-02-17 01:13:59', NULL, '{"id":1,"negara_id":714,"nama_negara":"Swaziland","kategori_job_id":3602,"nama_kategori_job":"Answering Service","nik":"15794283298645","nama_lengkap":"Shania Conn","tempat_lahir":"Dedrickstad","tanggal_lahir":"1970-09-12","usia":"78","agama":"Christianity","berat_badan":"24","tinggi_badan":"492","jenis_kelamin":"Perempuan","status_kawin":"Belum Menikah","nama_lengkap_ayah":"Dr. Walker Schuster IV","nama_lengkap_ibu":"Tatyana Kuphal","alamat":"98793 Maddison Union\\nPort Emersonton, CO 28421-5083","kota":"South Natasha","kecamatan":"berg","provinsi":"New Mexico","referensi":"facilis","nama_referensi":"Prof. Dulce Christiansen IV","no_paspor":"098901245130","tanggal_pengeluaran_paspor":"2010-05-31","masa_kadaluarsa":"2003-03-10","kantor_paspor":"Goodwin-Medhurst","kondisi_paspor":"Baik","level_bahasa_inggris":"Beginner","sertifikat_bahasa_inggris":"maiores","memiliki_anak":"Ya","jumlah_anak":"4","usia_anak":"4","yakin_kerja_diluar_negeri":"Ya","patuh_peraturan":"Tidak","motivasi":"Eaque praesentium minus nihil molestiae incidunt.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Dolorem vitae nam consectetur occaecati praesentium aut facilis nemo.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Pariatur rerum explicabo laboriosam rerum.","riwayat_penyakit_rawat":"Ya","keterangan_riwayat_penyakit_rawat":"Vel consequatur delectus assumenda tempore vitae sapiente cum.","apa_anda_hamil":"Tidak","foto":"1.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccff?text=eum","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb99?text=voluptas","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011bb?text=tenetur","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/009933?text=esse","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/004444?text=et","video_diri":"http:\\/\\/www.beatty.com\\/modi-ea-qui-rerum-accusamus-assumenda-pariatur","video_skill":"http:\\/\\/senger.com\\/","password":"$2y$10$m.Cd6LLLcFJqVBQ2t4kqLOq.nRHSf\\/3OIoZVdIgrL.BXeoA9ZYHr2","status":"Pending","created_at":"2024-02-17T00:15:04.000000Z","updated_at":"2024-02-17T00:15:04.000000Z"}', '{"id":1,"negara_id":714,"nama_negara":"Swaziland","kategori_job_id":3602,"nama_kategori_job":"Answering Service","nik":"15794283298645","nama_lengkap":"Shania Conn","tempat_lahir":"Dedrickstad","tanggal_lahir":"1970-09-12","usia":"78","agama":"Christianity","berat_badan":"24","tinggi_badan":"492","jenis_kelamin":"Perempuan","status_kawin":"Belum Menikah","nama_lengkap_ayah":"Dr. Walker Schuster IV","nama_lengkap_ibu":"Tatyana Kuphal","alamat":"98793 Maddison Union\\nPort Emersonton, CO 28421-5083","kota":"South Natasha","kecamatan":"berg","provinsi":"New Mexico","referensi":"facilis","nama_referensi":"Prof. Dulce Christiansen IV","no_paspor":"098901245130","tanggal_pengeluaran_paspor":"2010-05-31","masa_kadaluarsa":"2003-03-10","kantor_paspor":"Goodwin-Medhurst","kondisi_paspor":"Baik","level_bahasa_inggris":"Beginner","sertifikat_bahasa_inggris":"maiores","memiliki_anak":"Ya","jumlah_anak":"4","usia_anak":"4","yakin_kerja_diluar_negeri":"Ya","patuh_peraturan":"Tidak","motivasi":"Eaque praesentium minus nihil molestiae incidunt.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Dolorem vitae nam consectetur occaecati praesentium aut facilis nemo.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Pariatur rerum explicabo laboriosam rerum.","riwayat_penyakit_rawat":"Ya","keterangan_riwayat_penyakit_rawat":"Vel consequatur delectus assumenda tempore vitae sapiente cum.","apa_anda_hamil":"Tidak","foto":"1.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccff?text=eum","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb99?text=voluptas","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011bb?text=tenetur","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/009933?text=esse","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/004444?text=et","video_diri":"http:\\/\\/www.beatty.com\\/modi-ea-qui-rerum-accusamus-assumenda-pariatur","video_skill":"http:\\/\\/senger.com\\/","password":"$2y$10$m.Cd6LLLcFJqVBQ2t4kqLOq.nRHSf\\/3OIoZVdIgrL.BXeoA9ZYHr2","status":"Reject","created_at":"2024-02-17T00:15:04.000000Z","updated_at":"2024-02-17T08:13:59.000000Z"}', '2024-02-17 01:13:59', '2024-02-17 01:13:59'),
	(411, 'Pendaftaran Disetujui', 6, 'Update', '2024-02-18 21:00:56', NULL, '{"id":6,"negara_id":49160325,"nama_negara":"Burundi","kategori_job_id":97146559,"nama_kategori_job":"Real Estate Appraiser","nik":"85097265815991","nama_lengkap":"Ansley Bauch","tempat_lahir":"New Britneyview","tanggal_lahir":"2005-12-26","usia":"85","agama":"Buddhism","berat_badan":"98","tinggi_badan":"506","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Murray Mitchell","nama_lengkap_ibu":"Delpha O\'Connell","alamat":"315 Sauer Light\\nSouth Karli, AZ 93724-7449","kota":"Borershire","kecamatan":"ton","provinsi":"Alaska","referensi":"eos","nama_referensi":"Nathanael Lind","no_paspor":"366919149138","tanggal_pengeluaran_paspor":"2012-06-10","masa_kadaluarsa":"1987-03-20","kantor_paspor":"Bechtelar, Yundt and Mann","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"ut","memiliki_anak":"Tidak","jumlah_anak":"7","usia_anak":"2","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Et odio soluta reiciendis sit.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Nobis quidem voluptatem illo quidem et magnam.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ipsa vero sit numquam ipsa rerum perferendis.","riwayat_penyakit_rawat":"Ya","keterangan_riwayat_penyakit_rawat":"Eos commodi assumenda cumque maxime doloribus.","apa_anda_hamil":"Ya","foto":"3.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb99?text=at","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff44?text=est","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ff?text=pariatur","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffaa?text=aut","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffff?text=accusantium","video_diri":"http:\\/\\/www.harris.com\\/","video_skill":"http:\\/\\/moore.com\\/rem-nisi-rerum-et-architecto-nam-eveniet","password":"$2y$10$5f2Bn2l6KT9FRP4LSPk4u.1Ko43dPmtE5V.MEjuxNPNs9Z\\/VqZBge","status":"Pending","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-17T07:40:56.000000Z"}', '{"id":6,"negara_id":49160325,"nama_negara":"Burundi","kategori_job_id":97146559,"nama_kategori_job":"Real Estate Appraiser","nik":"85097265815991","nama_lengkap":"Ansley Bauch","tempat_lahir":"New Britneyview","tanggal_lahir":"2005-12-26","usia":"85","agama":"Buddhism","berat_badan":"98","tinggi_badan":"506","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Murray Mitchell","nama_lengkap_ibu":"Delpha O\'Connell","alamat":"315 Sauer Light\\nSouth Karli, AZ 93724-7449","kota":"Borershire","kecamatan":"ton","provinsi":"Alaska","referensi":"eos","nama_referensi":"Nathanael Lind","no_paspor":"366919149138","tanggal_pengeluaran_paspor":"2012-06-10","masa_kadaluarsa":"1987-03-20","kantor_paspor":"Bechtelar, Yundt and Mann","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"ut","memiliki_anak":"Tidak","jumlah_anak":"7","usia_anak":"2","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Et odio soluta reiciendis sit.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Nobis quidem voluptatem illo quidem et magnam.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ipsa vero sit numquam ipsa rerum perferendis.","riwayat_penyakit_rawat":"Ya","keterangan_riwayat_penyakit_rawat":"Eos commodi assumenda cumque maxime doloribus.","apa_anda_hamil":"Ya","foto":"3.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb99?text=at","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff44?text=est","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ff?text=pariatur","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffaa?text=aut","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffff?text=accusantium","video_diri":"http:\\/\\/www.harris.com\\/","video_skill":"http:\\/\\/moore.com\\/rem-nisi-rerum-et-architecto-nam-eveniet","password":"$2y$10$5f2Bn2l6KT9FRP4LSPk4u.1Ko43dPmtE5V.MEjuxNPNs9Z\\/VqZBge","status":"Verifikasi","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-19T04:00:56.000000Z"}', '2024-02-18 21:00:56', '2024-02-18 21:00:56'),
	(412, 'Reject Verifikasi', 5, 'Update', '2024-02-19 20:48:55', NULL, '{"id":5,"negara_id":82485,"nama_negara":"Antarctica (the territory South of 60 deg S)","kategori_job_id":8155,"nama_kategori_job":"Scientific Photographer","nik":"56999085947438","nama_lengkap":"Ellis Hickle","tempat_lahir":"Enolafort","tanggal_lahir":"2018-11-03","usia":"62","agama":"Buddhism","berat_badan":"23","tinggi_badan":"177","jenis_kelamin":"Laki-laki","status_kawin":"Menikah","nama_lengkap_ayah":"Mr. Ferne Zemlak DVM","nama_lengkap_ibu":"Kaylin Mayert","alamat":"8207 Kirk Trail\\nEduardofort, CO 20047","kota":"North Velvashire","kecamatan":"haven","provinsi":"Pennsylvania","referensi":"amet","nama_referensi":"Prof. Reilly Homenick","no_paspor":"486608654481","tanggal_pengeluaran_paspor":"1993-09-26","masa_kadaluarsa":"1998-10-28","kantor_paspor":"Schuppe, Gerlach and Raynor","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"iure","memiliki_anak":"Ya","jumlah_anak":"3","usia_anak":"9","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Dolor commodi sunt officia placeat.","apa_anda_sehat":"Ya","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Libero et architecto voluptates sunt occaecati qui expedita.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ex aut dolor tenetur aut accusamus molestiae.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Eius aliquam qui aspernatur.","apa_anda_hamil":"Tidak","foto":"1.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/003311?text=deleniti","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee99?text=dolorem","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/006611?text=provident","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/004455?text=ipsa","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa55?text=rerum","video_diri":"http:\\/\\/www.green.com\\/ullam-aut-consequatur-quia-aut-omnis","video_skill":"http:\\/\\/www.wintheiser.com\\/commodi-eos-ex-maiores-soluta-autem-earum","password":"$2y$10$0c0u1EyRzjrp17oYEPNbIellSAFziqHUmo5WmC5zyNSrDuAEXv9oq","status":"Pending","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-17T07:41:36.000000Z"}', '{"id":5,"negara_id":82485,"nama_negara":"Antarctica (the territory South of 60 deg S)","kategori_job_id":8155,"nama_kategori_job":"Scientific Photographer","nik":"56999085947438","nama_lengkap":"Ellis Hickle","tempat_lahir":"Enolafort","tanggal_lahir":"2018-11-03","usia":"62","agama":"Buddhism","berat_badan":"23","tinggi_badan":"177","jenis_kelamin":"Laki-laki","status_kawin":"Menikah","nama_lengkap_ayah":"Mr. Ferne Zemlak DVM","nama_lengkap_ibu":"Kaylin Mayert","alamat":"8207 Kirk Trail\\nEduardofort, CO 20047","kota":"North Velvashire","kecamatan":"haven","provinsi":"Pennsylvania","referensi":"amet","nama_referensi":"Prof. Reilly Homenick","no_paspor":"486608654481","tanggal_pengeluaran_paspor":"1993-09-26","masa_kadaluarsa":"1998-10-28","kantor_paspor":"Schuppe, Gerlach and Raynor","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"iure","memiliki_anak":"Ya","jumlah_anak":"3","usia_anak":"9","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Dolor commodi sunt officia placeat.","apa_anda_sehat":"Ya","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Libero et architecto voluptates sunt occaecati qui expedita.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ex aut dolor tenetur aut accusamus molestiae.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Eius aliquam qui aspernatur.","apa_anda_hamil":"Tidak","foto":"1.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/003311?text=deleniti","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee99?text=dolorem","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/006611?text=provident","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/004455?text=ipsa","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa55?text=rerum","video_diri":"http:\\/\\/www.green.com\\/ullam-aut-consequatur-quia-aut-omnis","video_skill":"http:\\/\\/www.wintheiser.com\\/commodi-eos-ex-maiores-soluta-autem-earum","password":"$2y$10$0c0u1EyRzjrp17oYEPNbIellSAFziqHUmo5WmC5zyNSrDuAEXv9oq","status":"Verifikasi","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-20T03:48:54.000000Z"}', '2024-02-19 20:48:55', '2024-02-19 20:48:55'),
	(413, 'Reject Verifikasi', 4, 'Update', '2024-02-19 20:49:19', NULL, '{"id":4,"negara_id":64,"nama_negara":"Tunisia","kategori_job_id":196402,"nama_kategori_job":"Precision Printing Worker","nik":"86114661255961","nama_lengkap":"Rafaela Nienow","tempat_lahir":"Port Alan","tanggal_lahir":"2010-03-13","usia":"26","agama":"Other","berat_badan":"92","tinggi_badan":"953","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Casimir Funk","nama_lengkap_ibu":"Miss Hailee Christiansen PhD","alamat":"4970 Michael Freeway\\nLake Manuel, WI 01902-8920","kota":"North Carolanne","kecamatan":"haven","provinsi":"New Mexico","referensi":"voluptatem","nama_referensi":"Mr. Sonny Bartoletti","no_paspor":"405314701050","tanggal_pengeluaran_paspor":"1991-06-08","masa_kadaluarsa":"1999-02-08","kantor_paspor":"Homenick LLC","kondisi_paspor":"Baik","level_bahasa_inggris":"Intermediate","sertifikat_bahasa_inggris":"facilis","memiliki_anak":"Ya","jumlah_anak":"8","usia_anak":"6","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Tidak","motivasi":"In iste at sed explicabo incidunt.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Repellat delectus et quasi impedit corporis odit veritatis.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Animi veniam est enim provident est quidem consequatur.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Sit et dolorem esse eum quia omnis quia.","apa_anda_hamil":"Tidak","foto":"4.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eeff?text=pariatur","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee88?text=necessitatibus","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee00?text=doloribus","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/005588?text=velit","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022aa?text=eos","video_diri":"http:\\/\\/heaney.org\\/","video_skill":"http:\\/\\/www.schmitt.com\\/quam-quia-numquam-mollitia-nulla-et-aut-ut","password":"$2y$10$vEdEycGrM3uYZZplKFUwRuf103Ufjcl9dNh4z.4qSWelSEOjWCclq","status":"Pending","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-17T08:13:36.000000Z"}', '{"id":4,"negara_id":64,"nama_negara":"Tunisia","kategori_job_id":196402,"nama_kategori_job":"Precision Printing Worker","nik":"86114661255961","nama_lengkap":"Rafaela Nienow","tempat_lahir":"Port Alan","tanggal_lahir":"2010-03-13","usia":"26","agama":"Other","berat_badan":"92","tinggi_badan":"953","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Casimir Funk","nama_lengkap_ibu":"Miss Hailee Christiansen PhD","alamat":"4970 Michael Freeway\\nLake Manuel, WI 01902-8920","kota":"North Carolanne","kecamatan":"haven","provinsi":"New Mexico","referensi":"voluptatem","nama_referensi":"Mr. Sonny Bartoletti","no_paspor":"405314701050","tanggal_pengeluaran_paspor":"1991-06-08","masa_kadaluarsa":"1999-02-08","kantor_paspor":"Homenick LLC","kondisi_paspor":"Baik","level_bahasa_inggris":"Intermediate","sertifikat_bahasa_inggris":"facilis","memiliki_anak":"Ya","jumlah_anak":"8","usia_anak":"6","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Tidak","motivasi":"In iste at sed explicabo incidunt.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Repellat delectus et quasi impedit corporis odit veritatis.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Animi veniam est enim provident est quidem consequatur.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Sit et dolorem esse eum quia omnis quia.","apa_anda_hamil":"Tidak","foto":"4.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eeff?text=pariatur","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee88?text=necessitatibus","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee00?text=doloribus","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/005588?text=velit","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022aa?text=eos","video_diri":"http:\\/\\/heaney.org\\/","video_skill":"http:\\/\\/www.schmitt.com\\/quam-quia-numquam-mollitia-nulla-et-aut-ut","password":"$2y$10$vEdEycGrM3uYZZplKFUwRuf103Ufjcl9dNh4z.4qSWelSEOjWCclq","status":"Reject","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-20T03:49:19.000000Z"}', '2024-02-19 20:49:19', '2024-02-19 20:49:19'),
	(414, 'Reject Verifikasi', 6, 'Update', '2024-02-19 21:51:41', NULL, '{"id":6,"negara_id":49160325,"nama_negara":"Burundi","kategori_job_id":97146559,"nama_kategori_job":"Real Estate Appraiser","nik":"85097265815991","nama_lengkap":"Ansley Bauch","tempat_lahir":"New Britneyview","tanggal_lahir":"2005-12-26","usia":"85","agama":"Buddhism","berat_badan":"98","tinggi_badan":"506","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Murray Mitchell","nama_lengkap_ibu":"Delpha O\'Connell","alamat":"315 Sauer Light\\nSouth Karli, AZ 93724-7449","kota":"Borershire","kecamatan":"ton","provinsi":"Alaska","referensi":"eos","nama_referensi":"Nathanael Lind","no_paspor":"366919149138","tanggal_pengeluaran_paspor":"2012-06-10","masa_kadaluarsa":"1987-03-20","kantor_paspor":"Bechtelar, Yundt and Mann","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"ut","memiliki_anak":"Tidak","jumlah_anak":"7","usia_anak":"2","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Et odio soluta reiciendis sit.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Nobis quidem voluptatem illo quidem et magnam.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ipsa vero sit numquam ipsa rerum perferendis.","riwayat_penyakit_rawat":"Ya","keterangan_riwayat_penyakit_rawat":"Eos commodi assumenda cumque maxime doloribus.","apa_anda_hamil":"Ya","foto":"3.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb99?text=at","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff44?text=est","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ff?text=pariatur","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffaa?text=aut","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffff?text=accusantium","video_diri":"http:\\/\\/www.harris.com\\/","video_skill":"http:\\/\\/moore.com\\/rem-nisi-rerum-et-architecto-nam-eveniet","password":"$2y$10$5f2Bn2l6KT9FRP4LSPk4u.1Ko43dPmtE5V.MEjuxNPNs9Z\\/VqZBge","status":"Pending","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-19T04:00:56.000000Z"}', '{"id":6,"negara_id":49160325,"nama_negara":"Burundi","kategori_job_id":97146559,"nama_kategori_job":"Real Estate Appraiser","nik":"85097265815991","nama_lengkap":"Ansley Bauch","tempat_lahir":"New Britneyview","tanggal_lahir":"2005-12-26","usia":"85","agama":"Buddhism","berat_badan":"98","tinggi_badan":"506","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Murray Mitchell","nama_lengkap_ibu":"Delpha O\'Connell","alamat":"315 Sauer Light\\nSouth Karli, AZ 93724-7449","kota":"Borershire","kecamatan":"ton","provinsi":"Alaska","referensi":"eos","nama_referensi":"Nathanael Lind","no_paspor":"366919149138","tanggal_pengeluaran_paspor":"2012-06-10","masa_kadaluarsa":"1987-03-20","kantor_paspor":"Bechtelar, Yundt and Mann","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"ut","memiliki_anak":"Tidak","jumlah_anak":"7","usia_anak":"2","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Et odio soluta reiciendis sit.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Nobis quidem voluptatem illo quidem et magnam.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ipsa vero sit numquam ipsa rerum perferendis.","riwayat_penyakit_rawat":"Ya","keterangan_riwayat_penyakit_rawat":"Eos commodi assumenda cumque maxime doloribus.","apa_anda_hamil":"Ya","foto":"3.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb99?text=at","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff44?text=est","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ff?text=pariatur","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffaa?text=aut","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffff?text=accusantium","video_diri":"http:\\/\\/www.harris.com\\/","video_skill":"http:\\/\\/moore.com\\/rem-nisi-rerum-et-architecto-nam-eveniet","password":"$2y$10$5f2Bn2l6KT9FRP4LSPk4u.1Ko43dPmtE5V.MEjuxNPNs9Z\\/VqZBge","status":"Verifikasi","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-20T04:51:40.000000Z"}', '2024-02-19 21:51:41', '2024-02-19 21:51:41'),
	(415, 'Reject Verifikasi', 5, 'Update', '2024-02-19 21:52:18', NULL, '{"id":5,"negara_id":82485,"nama_negara":"Antarctica (the territory South of 60 deg S)","kategori_job_id":8155,"nama_kategori_job":"Scientific Photographer","nik":"56999085947438","nama_lengkap":"Ellis Hickle","tempat_lahir":"Enolafort","tanggal_lahir":"2018-11-03","usia":"62","agama":"Buddhism","berat_badan":"23","tinggi_badan":"177","jenis_kelamin":"Laki-laki","status_kawin":"Menikah","nama_lengkap_ayah":"Mr. Ferne Zemlak DVM","nama_lengkap_ibu":"Kaylin Mayert","alamat":"8207 Kirk Trail\\nEduardofort, CO 20047","kota":"North Velvashire","kecamatan":"haven","provinsi":"Pennsylvania","referensi":"amet","nama_referensi":"Prof. Reilly Homenick","no_paspor":"486608654481","tanggal_pengeluaran_paspor":"1993-09-26","masa_kadaluarsa":"1998-10-28","kantor_paspor":"Schuppe, Gerlach and Raynor","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"iure","memiliki_anak":"Ya","jumlah_anak":"3","usia_anak":"9","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Dolor commodi sunt officia placeat.","apa_anda_sehat":"Ya","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Libero et architecto voluptates sunt occaecati qui expedita.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ex aut dolor tenetur aut accusamus molestiae.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Eius aliquam qui aspernatur.","apa_anda_hamil":"Tidak","foto":"1.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/003311?text=deleniti","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee99?text=dolorem","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/006611?text=provident","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/004455?text=ipsa","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa55?text=rerum","video_diri":"http:\\/\\/www.green.com\\/ullam-aut-consequatur-quia-aut-omnis","video_skill":"http:\\/\\/www.wintheiser.com\\/commodi-eos-ex-maiores-soluta-autem-earum","password":"$2y$10$0c0u1EyRzjrp17oYEPNbIellSAFziqHUmo5WmC5zyNSrDuAEXv9oq","status":"Pending","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-20T03:48:54.000000Z"}', '{"id":5,"negara_id":82485,"nama_negara":"Antarctica (the territory South of 60 deg S)","kategori_job_id":8155,"nama_kategori_job":"Scientific Photographer","nik":"56999085947438","nama_lengkap":"Ellis Hickle","tempat_lahir":"Enolafort","tanggal_lahir":"2018-11-03","usia":"62","agama":"Buddhism","berat_badan":"23","tinggi_badan":"177","jenis_kelamin":"Laki-laki","status_kawin":"Menikah","nama_lengkap_ayah":"Mr. Ferne Zemlak DVM","nama_lengkap_ibu":"Kaylin Mayert","alamat":"8207 Kirk Trail\\nEduardofort, CO 20047","kota":"North Velvashire","kecamatan":"haven","provinsi":"Pennsylvania","referensi":"amet","nama_referensi":"Prof. Reilly Homenick","no_paspor":"486608654481","tanggal_pengeluaran_paspor":"1993-09-26","masa_kadaluarsa":"1998-10-28","kantor_paspor":"Schuppe, Gerlach and Raynor","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"iure","memiliki_anak":"Ya","jumlah_anak":"3","usia_anak":"9","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Dolor commodi sunt officia placeat.","apa_anda_sehat":"Ya","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Libero et architecto voluptates sunt occaecati qui expedita.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ex aut dolor tenetur aut accusamus molestiae.","riwayat_penyakit_rawat":"Tidak","keterangan_riwayat_penyakit_rawat":"Eius aliquam qui aspernatur.","apa_anda_hamil":"Tidak","foto":"1.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/003311?text=deleniti","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee99?text=dolorem","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/006611?text=provident","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/004455?text=ipsa","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa55?text=rerum","video_diri":"http:\\/\\/www.green.com\\/ullam-aut-consequatur-quia-aut-omnis","video_skill":"http:\\/\\/www.wintheiser.com\\/commodi-eos-ex-maiores-soluta-autem-earum","password":"$2y$10$0c0u1EyRzjrp17oYEPNbIellSAFziqHUmo5WmC5zyNSrDuAEXv9oq","status":"Reject","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-20T04:52:18.000000Z"}', '2024-02-19 21:52:18', '2024-02-19 21:52:18'),
	(416, 'Reject Verifikasi', 6, 'Update', '2024-02-24 23:07:11', NULL, '{"id":6,"negara_id":49160325,"nama_negara":"Burundi","kategori_job_id":97146559,"nama_kategori_job":"Real Estate Appraiser","nik":"85097265815991","nama_lengkap":"Ansley Bauch","tempat_lahir":"New Britneyview","tanggal_lahir":"2005-12-26","usia":"85","agama":"Buddhism","berat_badan":"98","tinggi_badan":"506","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Murray Mitchell","nama_lengkap_ibu":"Delpha O\'Connell","alamat":"315 Sauer Light\\nSouth Karli, AZ 93724-7449","kota":"Borershire","kecamatan":"ton","provinsi":"Alaska","referensi":"eos","nama_referensi":"Nathanael Lind","no_paspor":"366919149138","tanggal_pengeluaran_paspor":"2012-06-10","masa_kadaluarsa":"1987-03-20","kantor_paspor":"Bechtelar, Yundt and Mann","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"ut","memiliki_anak":"Tidak","jumlah_anak":"7","usia_anak":"2","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Et odio soluta reiciendis sit.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Nobis quidem voluptatem illo quidem et magnam.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ipsa vero sit numquam ipsa rerum perferendis.","riwayat_penyakit_rawat":"Ya","keterangan_riwayat_penyakit_rawat":"Eos commodi assumenda cumque maxime doloribus.","apa_anda_hamil":"Ya","ada_ktp":null,"ada_kk":null,"ada_akta_lahir":null,"ada_ijazah":null,"ada_buku_nikah":null,"ada_paspor":null,"penjelasan_dokumen":null,"foto":"3.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb99?text=at","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff44?text=est","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ff?text=pariatur","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffaa?text=aut","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffff?text=accusantium","video_diri":"http:\\/\\/www.harris.com\\/","video_skill":"http:\\/\\/moore.com\\/rem-nisi-rerum-et-architecto-nam-eveniet","email":null,"no_hp":null,"no_wa":null,"password":"$2y$10$5f2Bn2l6KT9FRP4LSPk4u.1Ko43dPmtE5V.MEjuxNPNs9Z\\/VqZBge","status":"Pending","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-20T04:51:40.000000Z"}', '{"id":6,"negara_id":49160325,"nama_negara":"Burundi","kategori_job_id":97146559,"nama_kategori_job":"Real Estate Appraiser","nik":"85097265815991","nama_lengkap":"Ansley Bauch","tempat_lahir":"New Britneyview","tanggal_lahir":"2005-12-26","usia":"85","agama":"Buddhism","berat_badan":"98","tinggi_badan":"506","jenis_kelamin":"Laki-laki","status_kawin":"Cerai","nama_lengkap_ayah":"Murray Mitchell","nama_lengkap_ibu":"Delpha O\'Connell","alamat":"315 Sauer Light\\nSouth Karli, AZ 93724-7449","kota":"Borershire","kecamatan":"ton","provinsi":"Alaska","referensi":"eos","nama_referensi":"Nathanael Lind","no_paspor":"366919149138","tanggal_pengeluaran_paspor":"2012-06-10","masa_kadaluarsa":"1987-03-20","kantor_paspor":"Bechtelar, Yundt and Mann","kondisi_paspor":"Rusak","level_bahasa_inggris":"Advanced","sertifikat_bahasa_inggris":"ut","memiliki_anak":"Tidak","jumlah_anak":"7","usia_anak":"2","yakin_kerja_diluar_negeri":"Tidak","patuh_peraturan":"Ya","motivasi":"Et odio soluta reiciendis sit.","apa_anda_sehat":"Tidak","keterbatasan_fisik":"Ya","keterangan_keterbatasan_fisik":"Nobis quidem voluptatem illo quidem et magnam.","pernah_operasi":"Ya","keterangan_pernah_operasi":"Ipsa vero sit numquam ipsa rerum perferendis.","riwayat_penyakit_rawat":"Ya","keterangan_riwayat_penyakit_rawat":"Eos commodi assumenda cumque maxime doloribus.","apa_anda_hamil":"Ya","ada_ktp":null,"ada_kk":null,"ada_akta_lahir":null,"ada_ijazah":null,"ada_buku_nikah":null,"ada_paspor":null,"penjelasan_dokumen":null,"foto":"3.png","paspor":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb99?text=at","ktp":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff44?text=est","kk":"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ff?text=pariatur","sertifikat_kompetensi":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffaa?text=aut","paklaring":"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffff?text=accusantium","video_diri":"http:\\/\\/www.harris.com\\/","video_skill":"http:\\/\\/moore.com\\/rem-nisi-rerum-et-architecto-nam-eveniet","email":null,"no_hp":null,"no_wa":null,"password":"$2y$10$5f2Bn2l6KT9FRP4LSPk4u.1Ko43dPmtE5V.MEjuxNPNs9Z\\/VqZBge","status":"Verifikasi","created_at":"2024-02-17T00:15:05.000000Z","updated_at":"2024-02-25T06:07:10.000000Z"}', '2024-02-24 23:07:11', '2024-02-24 23:07:11');

-- Dumping structure for table db_psi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.migrations: ~16 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2024_02_07_230139_create_kategori_jobs_table', 2),
	(7, '2024_02_08_065655_create_negaras_table', 3),
	(10, '2024_02_08_071958_create_jobs_table', 4),
	(12, '2024_02_10_054222_create_benefits_table', 6),
	(13, '2024_02_11_075140_create_sliders_table', 7),
	(14, '2024_02_10_054106_create_galeris_table', 8),
	(15, '2024_02_12_144717_create_reviews_table', 9),
	(16, '2024_02_12_154555_create_faqs_table', 10),
	(17, '2024_02_13_025047_create_alasans_table', 11),
	(18, '2024_02_13_035254_create_steps_table', 12),
	(20, '2024_02_15_064045_create_gambars_table', 13),
	(23, '2024_02_15_160032_create_kandidats_table', 14),
	(24, '2024_02_16_095714_create_pengalaman_kerjas_table', 15);

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

-- Dumping structure for table db_psi.pendaftaran
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `negara_id` bigint DEFAULT NULL,
  `nama_negara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_job_id` bigint DEFAULT NULL,
  `nama_kategori_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `usia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kawin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_paspor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengeluaran_paspor` date DEFAULT NULL,
  `masa_kadaluarsa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kantor_paspor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi_paspor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_bahasa_inggris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat_bahasa_inggris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memiliki_anak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_anak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usia_anak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yakin_kerja_diluar_negeri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patuh_peraturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apa_anda_sehat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterbatasan_fisik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_keterbatasan_fisik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pernah_operasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_pernah_operasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_penyakit_rawat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_riwayat_penyakit_rawat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apa_anda_hamil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_akta_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_buku_nikah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ada_paspor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penjelasan_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paspor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat_kompetensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paklaring` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_diri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_skill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.pendaftaran: ~6 rows (approximately)
INSERT INTO `pendaftaran` (`id`, `negara_id`, `nama_negara`, `kategori_job_id`, `nama_kategori_job`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `usia`, `agama`, `berat_badan`, `tinggi_badan`, `jenis_kelamin`, `status_kawin`, `nama_lengkap_ayah`, `nama_lengkap_ibu`, `alamat`, `kota`, `kecamatan`, `provinsi`, `referensi`, `nama_referensi`, `no_paspor`, `tanggal_pengeluaran_paspor`, `masa_kadaluarsa`, `kantor_paspor`, `kondisi_paspor`, `level_bahasa_inggris`, `sertifikat_bahasa_inggris`, `memiliki_anak`, `jumlah_anak`, `usia_anak`, `yakin_kerja_diluar_negeri`, `patuh_peraturan`, `motivasi`, `apa_anda_sehat`, `keterbatasan_fisik`, `keterangan_keterbatasan_fisik`, `pernah_operasi`, `keterangan_pernah_operasi`, `riwayat_penyakit_rawat`, `keterangan_riwayat_penyakit_rawat`, `apa_anda_hamil`, `ada_ktp`, `ada_kk`, `ada_akta_lahir`, `ada_ijazah`, `ada_buku_nikah`, `ada_paspor`, `penjelasan_dokumen`, `foto`, `paspor`, `ktp`, `kk`, `sertifikat_kompetensi`, `paklaring`, `video_diri`, `video_skill`, `email`, `no_hp`, `no_wa`, `password`, `status`, `created_at`, `updated_at`) VALUES
	(1, 714, 'Swaziland', 3602, 'Answering Service', '15794283298645', 'Shania Conn', 'Dedrickstad', '1970-09-12', '78', 'Christianity', '24', '492', 'Perempuan', 'Belum Menikah', 'Dr. Walker Schuster IV', 'Tatyana Kuphal', '98793 Maddison Union\nPort Emersonton, CO 28421-5083', 'South Natasha', 'berg', 'New Mexico', 'facilis', 'Prof. Dulce Christiansen IV', '098901245130', '2010-05-31', '2003-03-10', 'Goodwin-Medhurst', 'Baik', 'Beginner', 'maiores', 'Ya', '4', '4', 'Ya', 'Tidak', 'Eaque praesentium minus nihil molestiae incidunt.', 'Tidak', 'Ya', 'Dolorem vitae nam consectetur occaecati praesentium aut facilis nemo.', 'Ya', 'Pariatur rerum explicabo laboriosam rerum.', 'Ya', 'Vel consequatur delectus assumenda tempore vitae sapiente cum.', 'Tidak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://via.placeholder.com/640x480.png/00ccff?text=eum', 'https://via.placeholder.com/640x480.png/00bb99?text=voluptas', 'https://via.placeholder.com/640x480.png/0011bb?text=tenetur', 'https://via.placeholder.com/640x480.png/009933?text=esse', 'https://via.placeholder.com/640x480.png/004444?text=et', 'http://www.beatty.com/modi-ea-qui-rerum-accusamus-assumenda-pariatur', 'http://senger.com/', NULL, NULL, NULL, '$2y$10$m.Cd6LLLcFJqVBQ2t4kqLOq.nRHSf/3OIoZVdIgrL.BXeoA9ZYHr2', 'Pending', '2024-02-16 17:15:04', '2024-02-17 01:13:59'),
	(2, 26215386, 'Belgium', 99814656, 'Special Force', '12179039812424', 'Ms. Marian Rempel DDS', 'Fredychester', '1972-11-05', '64', 'Islam', '61', '111', 'Perempuan', 'Cerai', 'Elliot Pacocha', 'Patricia Funk', '422 Valentina Rue\nBeertown, MD 04337-6408', 'Salvadorville', 'mouth', 'Hawaii', 'rerum', 'Marques Davis', '091308008849', '2006-01-30', '2008-03-07', 'Franecki-Herzog', 'Rusak', 'Intermediate', 'porro', 'Tidak', '5', '8', 'Tidak', 'Tidak', 'Aperiam repellendus in labore quasi illo omnis ad.', 'Tidak', 'Ya', 'Velit et ut voluptatem modi assumenda ut et sed.', 'Tidak', 'Placeat delectus earum ut in repellendus maxime et.', 'Ya', 'Placeat molestiae et perferendis et sunt nostrum eius.', 'Tidak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2.png', 'https://via.placeholder.com/640x480.png/00ff99?text=illum', 'https://via.placeholder.com/640x480.png/00bb33?text=error', 'https://via.placeholder.com/640x480.png/008888?text=ut', 'https://via.placeholder.com/640x480.png/00bbdd?text=fuga', 'https://via.placeholder.com/640x480.png/0055aa?text=architecto', 'http://mcclure.com/dolores-quia-quia-nihil-laboriosam-vero-est-quia.html', 'http://www.hills.com/voluptas-minus-accusamus-veritatis-maxime-impedit-numquam-modi', NULL, NULL, NULL, '$2y$10$0s.Z5Z3oc0LOqYgE8RcPpOnuxOnyTfmjTkESOmyLnWKAyXjAomara', 'Pending', '2024-02-16 17:15:04', '2024-02-16 17:15:04'),
	(3, 368, 'Macao', 4772, 'Cleaners of Vehicles', '49799037055585', 'Valentine Marks Jr.', 'North Emilymouth', '2011-01-19', '12', 'Islam', '46', '86', 'Laki-laki', 'Cerai', 'Jaydon Kilback Jr.', 'Ophelia Halvorson', '2020 Durgan Mountains\nBalistrerihaven, MN 18449-9255', 'Donnellyport', 'furt', 'Maryland', 'quia', 'Garland Lesch', '094062391492', '2022-07-10', '1974-04-13', 'Runolfsson-Schuster', 'Baik', 'Advanced', 'qui', 'Ya', '6', '4', 'Tidak', 'Ya', 'Reiciendis iste omnis odio et.', 'Ya', 'Tidak', 'Iusto a debitis qui et.', 'Ya', 'Eaque veritatis odio a ut optio et.', 'Ya', 'Libero ea officiis quas est fuga.', 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.png', 'https://via.placeholder.com/640x480.png/0011bb?text=deserunt', 'https://via.placeholder.com/640x480.png/006699?text=quo', 'https://via.placeholder.com/640x480.png/00ddff?text=in', 'https://via.placeholder.com/640x480.png/002299?text=nam', 'https://via.placeholder.com/640x480.png/007722?text=velit', 'http://www.schultz.com/in-magnam-est-voluptas-sunt-consequatur.html', 'http://nikolaus.org/sed-distinctio-odio-libero-dolorem-aliquam-consequuntur', NULL, NULL, NULL, '$2y$10$Z0zxztXIpstLbL2XZxcsH.0Fv6x/4v3FDsDYDbAUMKejmmedZSuhO', 'Pending', '2024-02-16 17:15:04', '2024-02-16 17:15:04'),
	(4, 64, 'Tunisia', 196402, 'Precision Printing Worker', '86114661255961', 'Rafaela Nienow', 'Port Alan', '2010-03-13', '26', 'Other', '92', '953', 'Laki-laki', 'Cerai', 'Casimir Funk', 'Miss Hailee Christiansen PhD', '4970 Michael Freeway\nLake Manuel, WI 01902-8920', 'North Carolanne', 'haven', 'New Mexico', 'voluptatem', 'Mr. Sonny Bartoletti', '405314701050', '1991-06-08', '1999-02-08', 'Homenick LLC', 'Baik', 'Intermediate', 'facilis', 'Ya', '8', '6', 'Tidak', 'Tidak', 'In iste at sed explicabo incidunt.', 'Tidak', 'Ya', 'Repellat delectus et quasi impedit corporis odit veritatis.', 'Ya', 'Animi veniam est enim provident est quidem consequatur.', 'Tidak', 'Sit et dolorem esse eum quia omnis quia.', 'Tidak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4.png', 'https://via.placeholder.com/640x480.png/00eeff?text=pariatur', 'https://via.placeholder.com/640x480.png/00ee88?text=necessitatibus', 'https://via.placeholder.com/640x480.png/00ee00?text=doloribus', 'https://via.placeholder.com/640x480.png/005588?text=velit', 'https://via.placeholder.com/640x480.png/0022aa?text=eos', 'http://heaney.org/', 'http://www.schmitt.com/quam-quia-numquam-mollitia-nulla-et-aut-ut', NULL, NULL, NULL, '$2y$10$vEdEycGrM3uYZZplKFUwRuf103Ufjcl9dNh4z.4qSWelSEOjWCclq', 'Pending', '2024-02-16 17:15:05', '2024-02-19 20:49:19'),
	(5, 82485, 'Antarctica', 8155, 'Scientific Photographer', '56999085947438', 'Ellis Hickle', 'Enolafort', '2018-11-03', '62', 'Buddhism', '23', '177', 'Laki-laki', 'Menikah', 'Mr. Ferne Zemlak DVM', 'Kaylin Mayert', '8207 Kirk Trail\nEduardofort, CO 20047', 'North Velvashire', 'haven', 'Pennsylvania', 'amet', 'Prof. Reilly Homenick', '486608654481', '1993-09-26', '1998-10-28', 'Schuppe, Gerlach and Raynor', 'Rusak', 'Advanced', 'iure', 'Ya', '3', '9', 'Tidak', 'Ya', 'Dolor commodi sunt officia placeat.', 'Ya', 'Ya', 'Libero et architecto voluptates sunt occaecati qui expedita.', 'Ya', 'Ex aut dolor tenetur aut accusamus molestiae.', 'Tidak', 'Eius aliquam qui aspernatur.', 'Tidak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.png', 'https://via.placeholder.com/640x480.png/003311?text=deleniti', 'https://via.placeholder.com/640x480.png/00ee99?text=dolorem', 'https://via.placeholder.com/640x480.png/006611?text=provident', 'https://via.placeholder.com/640x480.png/004455?text=ipsa', 'https://via.placeholder.com/640x480.png/00aa55?text=rerum', 'http://www.green.com/ullam-aut-consequatur-quia-aut-omnis', 'http://www.wintheiser.com/commodi-eos-ex-maiores-soluta-autem-earum', NULL, NULL, NULL, '$2y$10$0c0u1EyRzjrp17oYEPNbIellSAFziqHUmo5WmC5zyNSrDuAEXv9oq', 'Pending', '2024-02-16 17:15:05', '2024-02-19 21:52:18'),
	(6, 49160325, 'Burundi', 97146559, 'Real Estate Appraiser', '85097265815991', 'Ansley Bauch', 'New Britneyview', '2005-12-26', '85', 'Buddhism', '98', '506', 'Laki-laki', 'Cerai', 'Murray Mitchell', 'Delpha O\'Connell', '315 Sauer Light\nSouth Karli, AZ 93724-7449', 'Borershire', 'ton', 'Alaska', 'eos', 'Nathanael Lind', '366919149138', '2012-06-10', '1987-03-20', 'Bechtelar, Yundt and Mann', 'Rusak', 'Advanced', 'ut', 'Tidak', '7', '2', 'Tidak', 'Ya', 'Et odio soluta reiciendis sit.', 'Tidak', 'Ya', 'Nobis quidem voluptatem illo quidem et magnam.', 'Ya', 'Ipsa vero sit numquam ipsa rerum perferendis.', 'Ya', 'Eos commodi assumenda cumque maxime doloribus.', 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.png', 'https://via.placeholder.com/640x480.png/00bb99?text=at', 'https://via.placeholder.com/640x480.png/00ff44?text=est', 'https://via.placeholder.com/640x480.png/0033ff?text=pariatur', 'https://via.placeholder.com/640x480.png/00ffaa?text=aut', 'https://via.placeholder.com/640x480.png/00ffff?text=accusantium', 'http://www.harris.com/', 'http://moore.com/rem-nisi-rerum-et-architecto-nam-eveniet', NULL, NULL, NULL, '$2y$10$5f2Bn2l6KT9FRP4LSPk4u.1Ko43dPmtE5V.MEjuxNPNs9Z/VqZBge', 'Verifikasi', '2024-02-16 17:15:05', '2024-02-24 23:07:10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.pengalaman_kerja: ~0 rows (approximately)

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

-- Dumping structure for table db_psi.review
CREATE TABLE IF NOT EXISTS `review` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.review: ~2 rows (approximately)
INSERT INTO `review` (`id`, `nama_review`, `keterangan`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'Muhamamd Rafi Heryadi, S.Kom', 'It is a long established fact that a reader will be distracted by readable content of a page when looking at its layout.', '1', '2024-02-12 08:18:37', '2024-02-12 08:29:23'),
	(4, 'Galih Pangestu', 'It is a long established fact that a reader will be distracted by readable content of a page when looking at its layout.', '2', '2024-02-12 08:38:48', '2024-02-12 08:38:48');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.slider: ~2 rows (approximately)
INSERT INTO `slider` (`id`, `nama_slider`, `gambar`, `keterangan`, `urutan`, `created_at`, `updated_at`) VALUES
	(8, 'The best jobsite for your future', '1707745654_Thumbnail YouTube  (1).png', 'We help you to find the best job to build your future', '1', '2024-02-12 06:47:34', '2024-02-12 06:53:11');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_psi.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
