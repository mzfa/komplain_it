-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2023 at 08:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wa_blast`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `akun_id` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nama_akun` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `code_wa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`akun_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `nama_akun`, `no_telp`, `code_wa`) VALUES
(2, 0, '2023-03-21 20:42:47', 0, '2023-03-21 21:10:45', NULL, NULL, 'zulfikar febri', '6289673145111', 'zulfikarfebri'),
(3, 0, '2023-03-26 20:26:51', NULL, NULL, NULL, NULL, 'rsup', '6285777789022', 'rsup');

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `hakakses_id` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nama_hakakses` varchar(255) DEFAULT NULL,
  `menu_id` varchar(255) DEFAULT NULL,
  `akses_bagian` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`hakakses_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `nama_hakakses`, `menu_id`, `akses_bagian`) VALUES
(1, 0, '2023-02-16 00:33:32', 0, '2023-03-14 09:20:53', NULL, NULL, 'Administrator', '6|7|8|9|11|28|30|31|32|34|35|', '|1|3|4|5|6|7|8|9|'),
(2, 306, '2023-02-16 04:37:19', NULL, NULL, 0, '2023-02-25 04:21:17', 'User', '25|', NULL),
(3, 0, '2023-02-25 04:20:49', 0, '2023-03-08 03:25:38', NULL, NULL, 'Kepala Bagian', '25|', '|3|4|5|7|'),
(4, 0, '2023-02-25 04:21:02', 0, '2023-03-14 09:22:39', NULL, NULL, 'Kepala Unit', '25|', '|4|'),
(5, 0, '2023-02-25 04:21:14', 0, '2023-02-28 02:10:45', NULL, NULL, 'Kepala RS', '25|26|', '|3|4|5|6|7|8|'),
(6, 0, '2023-02-27 07:27:43', NULL, NULL, NULL, NULL, 'Kordinator Pengadaan', '25|', NULL),
(7, 0, '2023-02-27 07:28:46', 0, '2023-03-08 03:24:57', NULL, NULL, 'Wakars', '25|26|', '|2|3|4|5|6|7|8|'),
(8, 0, '2023-02-27 07:30:24', 0, '2023-03-01 04:25:14', NULL, NULL, 'Direktur PT KGM', '25|26|', '|1|2|3|4|5|6|7|8|9|'),
(9, 0, '2023-02-28 01:36:52', NULL, NULL, 0, '2023-03-07 03:13:33', 'Kepala', NULL, '|3|4|5|7|'),
(10, 0, '2023-03-14 08:46:38', NULL, NULL, 0, '2023-03-23 00:14:39', 'tes', NULL, '|26|27|28|'),
(11, 0, '2023-03-18 01:36:16', NULL, NULL, NULL, NULL, 'pengadaan', '29|', '|4|6|'),
(14, 0, '2023-03-23 00:13:52', 0, '2023-03-23 00:13:59', 0, '2023-03-23 00:14:04', '1tes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nama_menu` varchar(255) DEFAULT NULL,
  `icon_menu` varchar(255) DEFAULT NULL,
  `url_menu` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `nama_menu`, `icon_menu`, `url_menu`, `parent_id`) VALUES
(6, 306, '2023-02-16 04:39:05', 0, '2023-03-03 01:35:57', NULL, NULL, 'Konfigurasi', 'fa fa-cogs', NULL, 0),
(7, 306, '2023-02-16 04:39:43', 0, '2023-03-03 01:35:37', NULL, NULL, 'Hak Akses', 'fa fa-tasks', 'hakakses.index', 6),
(8, 306, '2023-02-16 04:40:53', 0, '2023-02-23 14:41:42', NULL, NULL, 'Menu', NULL, 'menu.index', 6),
(9, 306, '2023-02-16 04:41:28', 0, '2023-03-03 01:36:23', NULL, NULL, 'Master Data', 'fa fa-database', NULL, 0),
(10, 306, '2023-02-16 04:54:06', NULL, NULL, 306, '2023-02-16 04:54:32', 'Bagian', NULL, 'bagian.index', 9),
(11, 306, '2023-02-16 04:54:26', NULL, NULL, NULL, NULL, 'User', NULL, 'user.index', 9),
(12, 306, '2023-02-16 04:54:45', NULL, NULL, 306, '2023-02-16 04:54:49', 'Bagian', NULL, 'bagian.index', 0),
(13, 306, '2023-02-16 04:55:06', NULL, NULL, 0, '2023-03-21 23:02:11', 'Bagian', NULL, 'bagian.index', 9),
(14, 306, '2023-02-16 04:55:32', NULL, NULL, 0, '2023-03-21 23:02:06', 'Profesi', NULL, 'profesi.index', 9),
(15, 306, '2023-02-16 04:56:09', NULL, NULL, 0, '2023-03-21 23:01:59', 'Pegawai', NULL, 'pegawai.index', 9),
(16, 306, '2023-02-16 04:56:44', NULL, NULL, 0, '2023-02-23 14:32:42', 'Jenis Pendidikan', NULL, 'jenis_pendidikan.index', 9),
(17, 306, '2023-02-16 04:57:40', NULL, NULL, 0, '2023-02-23 14:32:47', 'Jenis Pelatihan', NULL, 'jenis_pelatihan.index', 9),
(18, 0, '2023-02-16 14:02:37', NULL, NULL, 0, '2023-02-23 14:32:52', 'PROFILE', 'bi bi-person', 'profile.index', 0),
(19, 0, '2023-02-16 14:03:28', 0, '2023-02-16 14:05:38', 0, '2023-02-23 14:32:55', 'PEKERJAAN', 'bi bi-certificate', 'pekerjaan.index', 0),
(20, 0, '2023-02-16 14:06:06', NULL, NULL, 0, '2023-02-23 14:32:58', 'PELATIHAN', 'bi bi-certificate', 'pelatihan.index', 0),
(21, 0, '2023-02-16 14:06:43', NULL, NULL, 0, '2023-02-23 14:33:01', 'Kinerja', 'bi bi-indicator', 'kinerja.index', 0),
(22, 0, '2023-02-16 14:07:16', NULL, NULL, 0, '2023-02-23 14:33:03', 'Kompetensi', 'bi bi-certificate', 'kompetensi.index', 0),
(23, 0, '2023-02-18 15:03:37', NULL, NULL, 0, '2023-02-23 14:33:05', 'PENDIDIKAN', 'bi bi-school', 'pendidikan.index', 0),
(24, 0, '2023-02-20 02:25:48', NULL, NULL, 0, '2023-02-23 14:33:07', 'LAPORAN', 'bi bi-paper', NULL, 0),
(25, 0, '2023-02-24 12:04:13', 0, '2023-03-03 08:58:52', 0, '2023-03-21 23:02:31', 'Surat Menyurat', 'fa fa-envelope', 'message.index', 0),
(26, 0, '2023-03-03 01:33:03', NULL, NULL, 0, '2023-03-21 23:02:35', 'MONITORING', 'fa fa-tasks', 'monitoring.index', 0),
(27, 0, '2023-03-03 09:00:46', 0, '2023-03-06 03:20:16', 0, '2023-03-21 23:02:38', 'SPB', 'fa fa-file', 'spb.index', 0),
(28, 0, '2023-03-13 09:44:39', NULL, NULL, NULL, NULL, 'Struktur', NULL, 'struktur.index', 9),
(29, 0, '2023-03-16 00:48:30', 0, '2023-03-16 00:58:32', 0, '2023-03-21 23:01:20', 'ARSIP', 'fa fa-bookmark', 'arsipsurat.index', 0),
(30, 0, '2023-03-21 23:02:57', NULL, NULL, NULL, NULL, 'Akun', NULL, 'list_akun.index', 9),
(31, 0, '2023-03-23 00:18:30', NULL, NULL, NULL, NULL, 'Tamplate Pesan', NULL, 'pesan.index', 0),
(32, 0, '2023-03-23 19:06:10', 0, '2023-03-25 00:06:58', NULL, NULL, 'PESAN', NULL, 'tes_pesan.index', 0),
(33, 0, '2023-03-25 00:02:07', NULL, NULL, 0, '2023-03-25 00:04:22', 'Import Pesan', NULL, 'import_pesan.index', 0),
(34, 0, '2023-03-25 00:03:43', NULL, NULL, NULL, NULL, 'Import Pesan', NULL, 'import_pesan.index', 32),
(35, 0, '2023-03-25 00:04:16', NULL, NULL, NULL, NULL, 'Tes Pesan', NULL, 'tes_pesan.index', 32);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `pesan_id` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `judul_pesan` varchar(255) DEFAULT NULL,
  `isi_pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pesan_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `judul_pesan`, `isi_pesan`) VALUES
(1, 0, '2023-03-23 18:38:22', 0, '2023-03-25 00:01:25', NULL, NULL, 'Reminder Poli v1', 'Dear Bapak / Ibu \r\n\r\nNama : *[var1]*\r\nTanggal lahir : *[var2]*\r\nBagaimana Kabar nya hari ini? Semoga senantiasa sehat dan bersemangat selalu\r\n\r\nKami dari Poliklinik [var3] *Rumah Sakit Umum Pekerja* ingin mengingatkan untuk kontrol rutin dan menginfokan Bapak /Ibu sudah terbooking pada :\r\nHari / Tanggal : *[var4]*\r\nJam : *[var5]*\r\nTujuan Poliklinik : *[var6]*\r\nDokter  : *[var7]*\r\n\r\n_PESAN BERIKUT INI ADALAH SEBAGAI BUKTI BAPAK/IBU SUDAH MASUK DALAM LIST KUOTA KONSULTASI DENGAN DOKTER , MOHON TETAP MENDAFTAR DI LOKET REGISTRASI KAMI ._\r\n\r\n*KETENTUAN MENDAFTAR KE POLIKLINIK RS UMUM PEKERJA :*\r\n\r\n*BAGI YANG SUDAH MEMILIKI SURAT PERJANJIAN , SILAHKAN MENDAFTAR DI MESIN APM DI LOBBY RS*\r\n\r\n*1. Membawa surat rujukan dari faskes pertama dan di pastikan masih berlaku bila dengan jaminan BPJS Kesehatan.*\r\n*2. Mengambil nomor antrian di lobby Rumah Sakit kami 30 menit sebelum Dokter praktek.*\r\n*3. Membawa Kartu BPJS Kesehatan*\r\n*4. Pasien kontrol pertama setelah pulang rawat inap tidak perlu membawa surat rujukan , cukup membawa surat resume yang diserahkan pada saat pulang rawat.*\r\n*5. Pasien kontrol ke-2 setelah pulang rawat inap HARUS MEMBAWA RUJUKAN*\r\n*6. Wajib melakukan booking untuk konsultasi berikutnya di Loket Perjanjian.*\r\n\r\nMohon untuk membalas OK pada pesan ini , untuk memverifikasi kehadiran .\r\n\r\nTerimakasih banyak \r\nSehat dan semangat selalu ya Ibu /Bapak 🌷🌷🌷\r\nRumah Sakit Umum Pekerja \r\nTempat Terbaik Teman Terpercaya'),
(2, 0, '2023-03-24 21:08:47', NULL, NULL, NULL, NULL, 'Coba yaa', 'ini coba\r\nyang dikirim ke [var1]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pegawai_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `pegawai_id`) VALUES
(0, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'mzfa', 'mzfa', NULL, 'mzfa', 'HG2qInycCaAdiG0II3pPuv4loYBTQ2tjijilbUtMm4sBx3UAzv8VnrZLbKeW', 0),
(1, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'ADMINISTRATOR', 'admin', NULL, 'qwerty123', NULL, 1),
(2, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'TEST DOKTER I', 'TEST DOKTER', NULL, '654321', NULL, 120),
(3, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'TEST REGISTRASI', 'TEST REGISTRASI', NULL, '1234567', NULL, 121),
(4, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'TEST PERAWAT', 'audit perawat', NULL, '123456', NULL, 122),
(6, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'TEST FARMASI', 'TEST FARMASI', NULL, '123456', NULL, 124),
(7, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'TEST GUDANG OBAT', 'TEST GUDANG OBAT', NULL, '123456', NULL, 125),
(8, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'TEST KASIR', 'TEST KASIR', NULL, '123456', NULL, 126),
(9, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'MUSTARI', 'MUSTARI', NULL, 'fedora', NULL, 25),
(10, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Aldityas Eko, dr., Sp.THT-KL', 'aldi', NULL, '123456', NULL, 33),
(11, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Vriyanka', 'Vriyanka', NULL, '123456', NULL, 49),
(12, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'TEST FISIOTERAPI', 'TEST FISIOTERAPI', NULL, '123456', NULL, 128),
(13, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Achmad Agus Sudarwin Haryanto, Sp.B', 'darwin', NULL, '123456', NULL, 12),
(14, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'drg. Arum Nurdiana Sari, MM', 'Arum', NULL, '123456', NULL, 23),
(15, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Herdiana Elizabeth, Sp.A', 'Herdiana', NULL, '123456', NULL, 24),
(16, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Mira Fauziah, Sp.A, Mked.', '0720380', NULL, '123456', NULL, 26),
(17, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Irwan Amin, Sp. AN-K', 'Irwan', NULL, '123456', NULL, 27),
(18, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Gina Adriana Nainggolan, Sp.An', 'Gina', NULL, '123456', NULL, 28),
(19, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Vincent Chrisnata, Sp.AN', 'Vincent', NULL, '123456', NULL, 29),
(20, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Andri Suhandi, dr., Sp. B', 'Andri', NULL, '123456', NULL, 30),
(21, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Afria Arista, Sp. KK', 'Afria', NULL, '123456', NULL, 31),
(22, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Hanekung Titisari, Sp.THT', 'Hanekung', NULL, '123456', NULL, 32),
(23, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Muhammad Andi Yassiin, Sp. JP', 'Andi Yassiin', NULL, '123456789', NULL, 34),
(24, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Martua Silalahi, dr., Sp.JP', 'Martua', NULL, '123456', NULL, 35),
(25, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nadia Prawitra, dr., Sp.S', 'Nadia', NULL, 'Neuro1', NULL, 36),
(26, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ahmad Thamrin, dr., Sp.OG', 'Thamrin', NULL, '123456', NULL, 37),
(27, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Muhammad Anggawiyatna, Sp.OT', 'Anggawiyatna', NULL, '123456', NULL, 38),
(28, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Naindra Kemala Dewi, Sp. P', 'Kemala', NULL, '123456', NULL, 39),
(29, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Febriana Novariska, Sp.P', 'Febriana', NULL, '123456', NULL, 40),
(30, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Isabella Valentina, Sp.PK', 'Isabella', NULL, '123456', NULL, 41),
(31, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Deka Larasati, M. Biomed.', 'Deka', NULL, '123456', NULL, 42),
(32, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Indria Yogani, Sp.PD', 'Indria', NULL, '123456', NULL, 43),
(33, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Felix Satwika, dr., Sp.PD', 'Felix', NULL, '987654', NULL, 44),
(34, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Tatan Saefudin, dr., Sp.Rad', 'Tatan', NULL, '123456', NULL, 45),
(35, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Tunjung Prasetyo Nugroho, Sp. Rad', 'Tunjung', NULL, '123456', NULL, 46),
(36, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Pangeran Indal Patra Abbas, dr.', 'Patra', NULL, '123456', NULL, 47),
(37, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Fariha', 'Fariha', NULL, '123456', NULL, 48),
(38, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Erish Harry Angkat', 'Erish', NULL, '121212', NULL, 50),
(39, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Ramadani Kurniawan', 'Ramadani', NULL, '123456', NULL, 51),
(40, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Fachdepy Maulana Ngangi', 'Fachdepy', NULL, '123456', NULL, 52),
(41, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Soraya Alamudi', 'Soraya', NULL, '123456', NULL, 53),
(42, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Rivki Wida Sarandi', 'Rivki', NULL, '123456', NULL, 54),
(43, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ns. Eka Riadi, S. Kep', 'Eka Riadi', NULL, '123456', NULL, 63),
(44, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ns. Vita  Sry Sulastri, S.Kep', 'Vita', NULL, '123456', NULL, 64),
(45, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ns. Anggraeni, S.Kep', 'Anggraeni', NULL, '220270', NULL, 65),
(46, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Marselia Yuli Pratiwi A.Md. Kep', 'Marselia', NULL, '654321', NULL, 68),
(47, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Solawatun Mustaekah, A.Md.Kep', 'Solawatun', NULL, '222222', NULL, 69),
(48, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yolanda Mastin Samaowati,A.Md.Kep', 'Yolanda Mastin', NULL, '7654321', NULL, 70),
(49, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dede Nuraeni, AMK', 'Dede Nuraeni', NULL, '290466', NULL, 71),
(50, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Patricia Sitinjak, A.Md.Kep', 'Patricia', NULL, '111333', NULL, 72),
(51, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dheni Hendra Bangsawan, A.Md.Kep', 'Dheni', NULL, '112323', NULL, 73),
(52, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ummi Zahrah Muntazzah,A.Md.Kep', 'Zahrah', NULL, '221292', NULL, 74),
(53, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ainun, A.Md. Kep', 'Ainun', NULL, '123456', NULL, 75),
(54, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Mega Nur Komala, AMK', 'ega mala', NULL, '292929', NULL, 76),
(55, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Pangestu S.W.D., A.Md.Kep', 'Pangestu', NULL, '654321', NULL, 77),
(56, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Putri Budy Utami, A.Md.Kep', 'Putri Budy', NULL, '224455', NULL, 78),
(57, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Anggun Cikita Dewi, A.Md.Kep', 'Anggun', NULL, '090497', NULL, 79),
(58, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Farid Fikri Akbar, A.Md.Kep', 'Farid Fikri', NULL, '16021997', NULL, 80),
(59, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Maya Riandari, A.Md.Kep', 'Maya Riandari', NULL, '123456', NULL, 81),
(60, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yumba Laras Sati, A.Md. Kep', 'Yumba', NULL, '060606', NULL, 82),
(61, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yolanda, A.Md. Kep', '1221097', NULL, '123456', NULL, 83),
(62, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Agustinus Hamonangan, A.Md. Kep', 'Agustinus', NULL, '123456', NULL, 84),
(63, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Inas Nur Afifah, A.Md. Kep', 'Inas', NULL, '200497', NULL, 85),
(64, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Wayan Sudiarta, A.Md.Kep', 'Wayan', NULL, '123456', NULL, 86),
(65, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Maria Esther Luciana,A.Md.Kep', 'Maria Esther', NULL, '123456', NULL, 87),
(66, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Hotmauli Siregar, AMK', 'Hotmauli', NULL, '123456', NULL, 88),
(67, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ni Ketut Murniati', 'Ni Ketut', NULL, '123456', NULL, 89),
(68, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Friska Magdalena, A.Md.Kep', 'Friska', NULL, '123456', NULL, 90),
(69, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Kurnia, AMK', 'niaaf', NULL, '777777', NULL, 91),
(70, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Novita Sari, A.Md.Kep', 'Novita Sari', NULL, '123456', NULL, 92),
(71, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Bio Riski Maulana,A.Md.Kep', 'Bio Riski', NULL, '123456', NULL, 93),
(72, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Sea Rahayu, AMK', 'Sea Rahayu', NULL, '070618', NULL, 94),
(73, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Eriyandi Harahap, AMK', 'Eriyandi', NULL, '123456', NULL, 95),
(74, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Abdul Rouf Supiyanto, A.Md. Kep', 'Abdul Rouf', NULL, '123456', NULL, 96),
(75, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Jumiaty, AMK', 'Jumiaty', NULL, '828282', NULL, 97),
(76, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Alifatus Safariyah, A.Md.Kep', 'Alifatus', NULL, '123456', NULL, 98),
(77, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Rahayu Biyanti, AMK', 'Rahayu Biyanti', NULL, '222222', NULL, 99),
(78, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Mardihyana, A.Md.Kep', 'Mardihyana', NULL, '123456', NULL, 100),
(79, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Wa Wahyu Dian Rostary', 'Dian Rostary', NULL, '200395', NULL, 101),
(80, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Rahmayuli Ardian Putri, AMD, Kep', 'Rahmayuli', NULL, '100791', NULL, 102),
(81, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Putri Adijaya Sakti, A.Md.Kep', 'Putri Adijaya', NULL, 'putridijay', NULL, 103),
(82, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Robby, Amd.Kep', 'Robby', NULL, '060690', NULL, 104),
(83, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nathasia Jeanet Christy Irala, Amd.Kep', 'Nathasia Jeanet', NULL, '123456', NULL, 105),
(84, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Feri Susanto, AMK', 'Feri Susanto', NULL, '123456', NULL, 106),
(88, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yudi Sukmara, A.Md.MPRS', 'Yudi', NULL, '850416', NULL, 109),
(89, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Roziana Mega Dewi, A.Md.RMIK', 'Roziana Mega', NULL, '227788', NULL, 110),
(90, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Siti Hardianti Handayani, A.Md. RMIK', 'Siti Hardianti', NULL, '310896', NULL, 111),
(91, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nasrullah', 'Nasrullah', NULL, '312322', NULL, 112),
(92, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Firni Dwi Astuti, S.Farm', 'Firni', NULL, '123456', NULL, 7),
(93, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Apt. Hadijah., S.Si.', 'Hadijah', NULL, 'yaarahman', NULL, 17),
(94, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Apt. Siti Fatimah., S.Farm', 'Siti Fatimah', NULL, '111111', NULL, 18),
(95, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Tri Meiyuliyanti', 'buzz', NULL, '808011', NULL, 55),
(96, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Apt. Ari Marliyana., S.Farm', 'Ari Marliyana', NULL, 'akuadalahaku', NULL, 56),
(97, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Fitriyatul Zabariyah, S.Farm', 'Fitriyatul', NULL, '123456', NULL, 113),
(98, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Gilang Mahardika, A.Md. AK', 'dnm', NULL, '123456', NULL, 10),
(99, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nur Hikmah, A.Md.AK', 'Nur Hikmah', NULL, '123456', NULL, 13),
(100, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ema Supiani, A.Md.AK', 'ema supiani', NULL, '123456', NULL, 14),
(101, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ipung Purwono, A.Md. AK', 'Ipung', NULL, '123456', NULL, 15),
(102, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dewi Yuliana A.Md. AK', 'Awie', NULL, '654321', NULL, 16),
(103, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'TEST PENUNJANG', '100001', NULL, '123456', NULL, 127),
(104, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Rusliadi Kustiawan, A.Md. RMIK', 'Rusliadi', NULL, '789456', NULL, 5),
(105, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Imam Hari Santoso, A.Md. Rad', 'Imam', NULL, '123456', NULL, 107),
(106, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Fadhillah Apriani, A.Md.Rad', 'Fadhillah', NULL, 'dila99', NULL, 6),
(107, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Lia Avriani, A.Md. Rad', 'Lia Avriani', NULL, '123456', NULL, 108),
(108, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Noor Rizky Zulfira, SE. Ak', 'Rizky', NULL, '654321', NULL, 8),
(109, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yoesi Febriansyah, SE.', 'Yoesi', NULL, '010108', NULL, 61),
(110, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Bagoes Riyadi Kurniawan, SE', 'Bagoes', NULL, '654321', NULL, 62),
(111, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'R. A. Afiani Putri Utaminingsih, SS', 'tami', NULL, '123456', NULL, 11),
(112, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Endang Lestariningsih, A.Md.Keb', 'Endang', NULL, '789789', NULL, 22),
(113, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Vinda Lyan Nofrin D., A.Md.Keb', 'Vinda', NULL, '123456', NULL, 20),
(114, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Pahma Rahmi S., A.Md.Keb', 'Rahmi', NULL, '123456', NULL, 19),
(115, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Fay Ferry Pardomuan Lambok P. Simanjuntak, dr., Sp. OG', 'Fay', NULL, '123123', NULL, 130),
(116, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Tengku Muhammad Iskandar, dr., Sp.OG', 'iskandar', NULL, '123456', NULL, 131),
(117, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Bambang Riyadi Agus P', 'Bambang Riyadi', NULL, '123456', NULL, 132),
(118, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Ery Wildan, Sp.OT', 'Ery', NULL, '111222', NULL, 133),
(119, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Maryanne Sri Andriawati, A.Md. Keb', 'Maryanne', NULL, '5555555', NULL, 118),
(120, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Maya Zelika Paradita', 'Maya Zelika', NULL, 'qwerty', NULL, 134),
(121, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr M. Candrasa Widya Wardhana', 'Candrasa', NULL, '1234567', NULL, 135),
(122, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Ade Dewi Naralia', 'Naralia', NULL, '300916', NULL, 136),
(123, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Yetti Muthiah, MKK.', 'Yetti', NULL, '123456', NULL, 137),
(124, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr Cut Shelma', 'cut', NULL, '1234567', NULL, 138),
(125, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Sri Nurlaelah, A.Md. Keb', 'Cicie', NULL, '1234567', NULL, 117),
(126, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Amia Della, A.Md.Keb', 'Amia', NULL, '031294', NULL, 3),
(127, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Syarifudin, dr., Sp.P', 'syarif', NULL, '123123', NULL, 139),
(128, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Sintha Damayanti, A.Md.Kep', 'shinta', NULL, '333111', NULL, 141),
(129, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Syifa Pauziah, A.Md.Kep', 'Syifa', NULL, '131097', NULL, 142),
(130, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Rifatul Choiriyah, A.Md.Keb', 'Rifatul', NULL, '1234567', NULL, 140),
(131, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Irenne Purnama, MSc.,Sp.A', 'irenne', NULL, '123456', NULL, 144),
(132, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Damba dwisepto aulia,dr. Sp JP', 'Damba', NULL, '123456', NULL, 145),
(133, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ainur Rahmah, dr., Sp.M', 'Ainur', NULL, 'Terserah1985', NULL, 143),
(134, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Beta Agustia Wisman, Sp.PD', 'Beta', NULL, '123456', NULL, 146),
(135, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Junariah, A.Md.Kep', 'Junariah', NULL, '123456', NULL, 147),
(136, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'ruangan mawar', 'mawar', NULL, '123456', NULL, 148),
(137, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'ruangan melati', 'melati', NULL, '123456', NULL, 149),
(138, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Syarifuddin, dr., Sp.P (y)', 'Dr Riyadi', NULL, '654321', NULL, 150),
(139, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'ruang teratai', 'Teratai', NULL, '123456', NULL, 151),
(140, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'ruang anggrek', 'Anggrek', NULL, '123456', NULL, 152),
(141, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Galih Arif Azhari', 'Gazari', NULL, '311219', NULL, 153),
(142, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Himawan Tryatmaja, Dr.', 'Himawan', NULL, '283010', NULL, 154),
(143, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhsin Ali Sahbana, S.Farm.Apt', 'muhsin', NULL, '123456', NULL, 167),
(144, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Siti Nahriah', 'siti nahriah', NULL, '123456', NULL, 156),
(145, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yana Aprianingsih Tampubolon, A.Md.Kep', 'Yana Aprianingsih', NULL, '123456', NULL, 171),
(146, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, '', '', NULL, '123456', NULL, NULL),
(147, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Wyasa Andrianto, dr., Sp.KFR', 'wyasa', NULL, '123456', NULL, 4),
(148, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Siti Fathonah, S.TR.Kes', 'fatho96', NULL, '456789', NULL, 164),
(149, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Marisa,S.farm', 'marisa', NULL, '252594', NULL, 170),
(150, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Syarifuddin, dr., Sp.P (y)', 'ryadi', NULL, '123456', NULL, 172),
(151, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Astari arum sari, dr., Sp.AN', 'Astari Arum', NULL, '123456', NULL, 173),
(152, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Trias Wibowo, SE.', 'trias', NULL, '1120976', NULL, 119),
(153, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nunuk handini, S.Farm', 'nunu', NULL, 'Qirani03', NULL, 169),
(154, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Fajar Nurul Hadi, SE.', 'Fajar', NULL, '123456', NULL, 158),
(155, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'HCU', 'Hcu', NULL, '123456', NULL, 178),
(156, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Asysyukriati, Sp.P', 'asy', NULL, '123456', NULL, 179),
(157, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'isolasi', 'isolasi', NULL, '123456', NULL, 180),
(158, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ahdi Pratama', 'ahdi', NULL, '321321', NULL, 2),
(159, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Cici Diah Cahyanti, AMd. Rad', 'Cici Diah', NULL, 'cicidiah13', NULL, 166),
(160, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Lulus Lusmana, A.Md.Rad', 'Lulus', NULL, '123456789', NULL, 165),
(161, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dina Septiyanti, AMG', 'Dina', NULL, '654321', NULL, 66),
(162, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Niken Alia Taskya, dr.,Sp.KFR', 'niken', NULL, '123456', NULL, 192),
(163, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Sony Bagaskara, A.Md.Kep', 'sony', NULL, '1234567', NULL, 181),
(164, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Eka Apriliana, A.Md.Kep', 'eka a', NULL, '1234567', NULL, 183),
(165, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Fadhilah Ukhrainy, A.Md.Kep', 'fadhilah', NULL, '123456', NULL, 182),
(166, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Vivi Nadillah, A.Md.Kep', 'vivi', NULL, '131313', NULL, 188),
(167, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Agung Dwi Saputra, A.Md.Kep', 'agung', NULL, '1234567', NULL, 186),
(168, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Syifa Nur Faujiah, A.Md.Kep', 'syifa n', NULL, '1234567', NULL, 184),
(169, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Riza Fahlevi, A.Md.Kep', 'riza', NULL, '123456', NULL, 189),
(170, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ahmad Rifai, Amd.Kep', 'rifai', NULL, '123456', NULL, 193),
(171, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Siti Joharatul Fikriah, A.Md.Kep', 'johar', NULL, '925089', NULL, 185),
(172, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Erwin D', '170301', NULL, '123456', NULL, 196),
(173, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dwi Indra Prasetyo, AMK', 'dwi', NULL, '654321', NULL, 175),
(174, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Mardiana Ismaningsih, dr.', 'Mardiana', NULL, '654321', NULL, 195),
(175, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Mardiana Ismaningsih, dr', 'Mardiana Ismaningsih', NULL, '123456', NULL, 197),
(176, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Bagus Tridana Mulia, A.Md.Kep', 'bagus', NULL, '302798', NULL, 187),
(177, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ruthsuyata Siagian, dr.', 'ruthsuyata', NULL, '123456', NULL, 199),
(178, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Sondang Virginia, dr.', 'virginia', NULL, '123456', NULL, 201),
(179, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Arevia Mega Diduta Utami. dr', 'arevia', NULL, '123456', NULL, 202),
(180, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Victor Anderson CH Nguru, dr.', 'victor', NULL, '123456', NULL, 203),
(181, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Ganjar Nugraha', 'ganjar', NULL, '070023', NULL, 198),
(182, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Kasmiyati, AMK', 'kas', NULL, '654321', NULL, 174),
(183, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Danang Adi Kusuma, A.Md.Kep', 'Danang', NULL, '12345678', NULL, 206),
(184, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yuliana Sartika, A.Md.Kep', 'Yuliana', NULL, '123456', NULL, 207),
(185, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yuliana Ade Putri, A.Md.Kep', 'yuliana ade', NULL, 'ANGEL21', NULL, 208),
(186, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Atmiati', 'Atmiati', NULL, '123456', NULL, 209),
(187, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Merty Supriharti Dr', 'Merty', NULL, '123456', NULL, 210),
(188, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ratna Dillah', 'Ratna', NULL, 'pelangi', NULL, 205),
(189, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Wika Karunia Lestari, S.Tr.Keb', 'wika', NULL, 'alhamdulillah', NULL, 212),
(190, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Umairoh', 'umairoh', NULL, 'p@ssw0rd', NULL, 204),
(191, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Siti Farhah. A.Md.RMIK', 'farhah', NULL, '159159', NULL, 159),
(192, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Gigih Herlambang', 'gigih', NULL, '123456', 'rTyKrKq0l8T8Ulh9Xq3bzxKB0iDx7kXBLFIP79Crrnn5uqYI40qtDueDz20M', 216),
(193, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dahlia', 'Dahlia', NULL, '123456', NULL, 217),
(194, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'EDELWEIS', 'EDELWEIS', NULL, '123456', NULL, 218),
(195, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Indah Ari Utari', 'indah', NULL, '123456', NULL, 214),
(196, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Vitriyana Manalu', 'vitri', NULL, '123456', NULL, 215),
(197, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Angga Meda Mahardhika, dr', 'Angga', NULL, '1234567', NULL, 224),
(198, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Astuti Irani, AMd. AK.', 'Rani', NULL, '123456', NULL, 155),
(199, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nopa, AMK', 'nopa', NULL, '123456', NULL, 222),
(200, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nunung Latofah, S.AP', 'nunung', NULL, '123456', NULL, 157),
(201, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhlisoh, A.Md.Keb', 'lilis', NULL, '121212', NULL, 221),
(202, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Arziani Thasya', 'Arziani', NULL, '123456', NULL, 226),
(203, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ayu Pratidina', 'Ayu P', NULL, '220397', NULL, 227),
(204, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. ANA VERAWATY', 'ana', NULL, '654321', NULL, 230),
(205, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'AHMAD AZHARI', 'azhari', NULL, '121212', 'td6POCanayaUoCPzsTKAaY82AFTJAaUPhDb1bQhZNtwfXxaBPsqEVrwf7mdi', 229),
(206, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ns. Pita Romawati, S.Kep', 'pita', NULL, '290909', NULL, 223),
(207, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Winny, Sp.KFR', 'winny', NULL, 'William.1961', NULL, 232),
(208, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ellyo Ahmad Reza', 'Ellyo', NULL, '123456', NULL, 235),
(209, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dr. Muhamad Yugo Hario Sakti Dua, Sp.P.D', 'hario', NULL, '000000', NULL, 236),
(210, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Adhika Nugraha', 'adhika', NULL, '526532', NULL, 234),
(211, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Sheila Dwi A P', 'Sheila', NULL, '654321', NULL, 238),
(212, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Puji Rahayu', 'puji', NULL, '123456', NULL, 239),
(213, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Siti Rokhmah', 'siti r', NULL, '654321', NULL, 240),
(214, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Zulaikha Ayu Hakli', 'zulaikha', NULL, '123456', NULL, 241),
(215, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Eva Widiyanti', 'eva', NULL, 'gaktau', NULL, 242),
(216, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ayu Meliyani Solihah', 'ayu meliyanih', NULL, '654321', NULL, 243),
(217, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Olivia Widha Pratiwi', 'olivia', NULL, '123456', NULL, 244),
(218, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dina Widyaningrum', 'dina w', NULL, '777777', NULL, 245),
(219, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nada Putri Rubiyana', 'nada', NULL, '654321', NULL, 246),
(220, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Susy Ambar Wati', 'susy', NULL, '654321', NULL, 247),
(221, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Choirunisa', 'choirunisa', NULL, '332211', NULL, 250),
(222, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Gita Afriani', 'gita', NULL, '654321', NULL, 251),
(223, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Rita Oktavia', 'rita', NULL, '654321', NULL, 252),
(224, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Indah Nurjanah', 'indah n', NULL, 'wkwkwk', NULL, 253),
(225, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ijtihad Nur Habibah', 'ijtihad', NULL, '160399', NULL, 254),
(226, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Mia Amalia', 'mia', NULL, '1234567', NULL, 255),
(227, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ajeng Putriyani', 'ajeng', NULL, '000000', NULL, 256),
(228, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Bella Sonia Junita', 'bella', NULL, '123456', NULL, 257),
(229, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Gita Fepbri Widdona', 'gita f', NULL, '123456', NULL, 258),
(230, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Feberianti Sihotang', 'Febri', NULL, '123456', NULL, 259),
(231, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Aulia Nur Afifah', 'aulia', NULL, '222222', NULL, 261),
(232, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Erdin Dwi Prasetya', 'Erdin', NULL, '123456', NULL, 262),
(233, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Wiwin Rigianti', 'wiwin', NULL, '112233', NULL, 263),
(234, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Reza Amelia', 'amelia', NULL, '654321', NULL, 265),
(235, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Wayan Lia Suwastuti', 'lia', NULL, '7777777', NULL, 266),
(236, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Daifi Sukmasari', 'daifi', NULL, 'D191100', NULL, 267),
(237, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Ramdhani Hartono Saputra', 'ramdhani', NULL, '1234567', NULL, 264),
(238, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Diah Kurnia Yussela, A.Md.Keb, SKM', 'diah', NULL, '771988', NULL, 21),
(239, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Rizka Aulia Safitri', 'rizka', NULL, '123456', NULL, 233),
(240, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'R. Muhammad Wawan Purwana Wahyudin', 'wawan', NULL, '654321', NULL, 272),
(241, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Subhan Galih Prakasi', 'subhan', NULL, 'subhan190993', NULL, 270),
(242, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Madha Surya', 'madha', NULL, '123456', NULL, 271),
(243, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dr. Satriyo Kusbandono, Sp.PD', 'satriyo', NULL, '123456', NULL, 275),
(244, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Apt. Ari Tuti Widia Astuti., S.Farm', 'widia', NULL, '220496', NULL, 237),
(245, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Apt. Dyna Oki Wulandari., S.Farm', 'dyna', NULL, 'fufu1221', NULL, 268),
(246, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dita Puspa Wulansari', 'dita', NULL, 'ditapuspa17', NULL, 260),
(247, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nur Ardianty', 'Ardianty', NULL, '123456', NULL, 277),
(248, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Reza Dwi Saputra', 'reza', NULL, '020317', NULL, 269),
(249, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Evi Septiani', 'Evi', NULL, 'septiani', NULL, 276),
(250, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Rafli Mahendra Priyatno', 'Rafli', NULL, '160598', NULL, 274),
(251, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'transit igd', 'TRANSIT IGD', NULL, '123456', NULL, 278),
(252, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'wijaya kusuma', 'wijaya kusuma', NULL, '123456', NULL, 319),
(253, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'SAKURA', 'sakura', NULL, '123456', NULL, 334),
(254, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Anderias Julius Bainkabel', 'Anderias', NULL, '654321', NULL, 318),
(255, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Kristia Heriyati', 'kristia', NULL, '123456', NULL, 284),
(256, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Heni Setia Wati', 'heni', NULL, '123456', NULL, 332),
(257, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ermawati', 'ermawati', NULL, '123456', NULL, 279),
(258, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Heri Saputra', 'heri', NULL, '123456', NULL, 280),
(259, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ocsha Galuh Pradana', 'ocsha', NULL, '123456', NULL, 306),
(260, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Indrawati', 'indrawati', NULL, '123456', NULL, 314),
(261, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Riki Taufiki Firdausy', 'riki', NULL, '123456', NULL, 341),
(262, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'M. Pebuarivan Rahman', 'Pebuarivan', NULL, '123456', NULL, 305),
(263, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Iqbal Maulana Putra', 'iqbal', NULL, '123456', NULL, 291),
(264, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Cahya Annisa Putri', 'cahya', NULL, '123456', NULL, 339),
(265, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Teddy Lahengkeng S', 'Teddy', NULL, '123456', NULL, 342),
(266, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Arista Nevyana Bella', 'arista', NULL, '123456', NULL, 293),
(267, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhamad Redho Rahman Pratama', 'redho', NULL, '123456', NULL, 322),
(268, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Kartika Widyasari', 'kara', NULL, '123456', NULL, 340),
(269, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'M. Rusdi', 'rusdi', NULL, '123456', NULL, 299),
(270, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Suchipto', 'suchipto', NULL, '123456', NULL, 297),
(271, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Winda Sulistyowati', 'winda', NULL, '123456', NULL, 331),
(272, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Augustin Mega Anjani', 'augustin', NULL, '123456', NULL, 324),
(273, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Riska Safitri', 'riska', NULL, '123456', NULL, 295),
(274, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nok Nur Fitria', 'nur', NULL, '123456', NULL, 281),
(275, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Juandi', 'juandi', NULL, '123456', NULL, 307),
(276, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Rosse Anggraeny', 'rosse', NULL, '123456', NULL, 294),
(277, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nathalia Dora', 'nathalia', NULL, '123456', NULL, 320),
(278, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Raehana', 'raehana123', NULL, '123456', NULL, 315),
(279, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nurul Ami Fahlatul Ambia', 'ami', NULL, '123456', NULL, 303),
(280, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Neni Kania, SE. MPH.', 'neni', NULL, '260469sam', NULL, 349),
(281, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhammad Ari Pratama', 'ari', NULL, '123456', NULL, 300),
(282, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhammad Ripay Nur Sepdi', 'ripay', NULL, '123456', NULL, 321),
(283, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Lovena Sari, M. Ked (DV), Sp. DV', 'lovena', NULL, '999999', NULL, 351),
(284, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Rima Melati, Sp. AK, Sp. OK', 'rima', NULL, '654321', NULL, 352),
(285, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Adrian Ridski Harsono, Sp. N', 'Adrian', NULL, 'arhspn', NULL, 356),
(286, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Cempaka Dwi Setyasih', 'Cempaka', NULL, '162404', NULL, 357),
(287, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ayu Fitri Lestianti, A.md, RMIK', 'Ayu F', NULL, '010101', NULL, 220),
(288, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Dhony Abdul Kharist', 'dhony', NULL, '654321', NULL, 333),
(289, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Andi Ayu Faradiba Mudjahidin', 'yoe', NULL, '654321', NULL, 311),
(290, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Diah Ayu Adiati', 'Ayu', NULL, '654321', NULL, 309),
(291, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Siti Juhroh', 'juhroh', NULL, '230798', NULL, 345),
(292, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Riri Amiati', 'RIRI', NULL, '777777', NULL, 359),
(293, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhammad Nino Farizal', 'nino', NULL, 'guaganteng', NULL, 343),
(294, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhammad Khoerurrijal', 'khoerurrijal', NULL, '122021', NULL, 365),
(295, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'drg. Michael Pangestu, Sp. KG', 'michael', NULL, 'hahaha', NULL, 364),
(296, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Riady Ashari, Sp. A', 'riyadi', NULL, '123456', NULL, 363),
(297, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Zousepin Akbar', 'zousepin', NULL, '852000', NULL, 366),
(298, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. M Darussalam Darwis', 'Darwis', NULL, '123456', NULL, 371),
(299, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Ranggahesa Wibawa Yudhisty Pramana', 'Rangga', NULL, '123456', NULL, 372),
(300, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Roy Martino, Sp. An', 'Roy', NULL, '777777', NULL, 374),
(301, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Novy Dewi Rahayu', 'novy d', NULL, '110606', NULL, 370),
(302, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Riezalisnoor Maulana Akbar', 'rieza', NULL, '000107', NULL, 375),
(303, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Rudi Hermansyah, Sp. B', 'Rudi', NULL, '1234567', NULL, 376),
(304, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Pipit Kasiani', 'Pipit', NULL, '112233', NULL, 355),
(305, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Laily Ridawati, Sp.PD', 'Laily', NULL, '24061988', NULL, 377),
(306, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Syam Apriansyah', 'syam', NULL, 'syamuhuy', 'lWSnmX28BzqFRyL9934e4Rd80Mg6ksM2wNlXHRfx2Evd1N3uMZLDNE4GsP94', 354),
(307, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Sultan Alfian', 'alfian', NULL, '654321', NULL, 382),
(308, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Endah Rizqi Winantri', 'endah', NULL, '150699', NULL, 373),
(309, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Vania Shaula', 'Vania', NULL, '123456', NULL, 386),
(310, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Vannessa Karenina', 'Vannessa', NULL, '123456', NULL, 385),
(311, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Syari Maisyarah Rahman, Sp. Rad', 'Maisyarah', NULL, '123456', NULL, 387),
(312, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Aminah Asri', 'aminah', NULL, '100519', NULL, 383),
(313, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Laili Fathiyah, MPH', 'lailifathiyah', NULL, '17zabran', NULL, 388),
(314, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ratna Komari, AMK', 'komari', NULL, 'Tahun2023', NULL, 57),
(315, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ade Novianti', 'ade novianti', NULL, '123456', NULL, 389),
(316, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Baktiar Aprianto', 'Baktiar', NULL, '7654321', NULL, 368),
(317, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Putri Cahya Kamila Paputungan', 'Putri c', NULL, '123456', NULL, 380),
(318, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Edi Supriadi', 'Edi S', NULL, '123456', NULL, 384),
(319, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Siti Sarah Rachmadianti', 'Siti Sarah', NULL, '111111', NULL, 390),
(320, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'drg. Cut Fadluna Paramita, Sp. Ort', 'Fadluna', NULL, 'Maryam08', NULL, 391),
(321, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nurul Fatimah', 'nurullfatiimah', NULL, '123456', NULL, 58),
(322, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Eva Handini', 'handinieva', NULL, '12345678', NULL, 362),
(323, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nurjanah', 'cenung', NULL, '250622', NULL, 60),
(324, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Viviana Suwikno', 'viviana', NULL, '210292', NULL, 59),
(325, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Anisa Habsari Sulistyo Rini', 'anisa', NULL, '123456', NULL, 190),
(326, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Raedy Ruwanda Susanto, Sp A.', 'raedy', NULL, '112006', NULL, 395),
(327, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Khonita Adian Utami, Sp. N', 'khonita', NULL, '654321', NULL, 396),
(328, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Aprilia Dian Kusuma Rini', 'aprilia', NULL, '112233', NULL, 393),
(329, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Supandi Rejeki', 'supandi', NULL, '260894', NULL, 397),
(330, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Wandra Yardi  D', 'Wandra', NULL, '123456789', NULL, 381),
(331, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Nur’aini Alamanda, Sp.An', 'manda', NULL, 'PisanganBaru04', NULL, 399),
(332, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Rivo Mario Warouw Lintuuran, Sp.KJ', 'rivo', NULL, '123456', NULL, 400),
(333, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ive Hana Ruth Sitepu', 'ivehana', NULL, 'chiba123', NULL, 405),
(334, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yosep Pransiskus Riki Dosi', 'yosep', NULL, '987654321', NULL, 404),
(335, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Vina Arum Sari', 'vinaarum', NULL, 'qwerty', NULL, 407),
(336, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Raehana', 'raehana', NULL, '011120', NULL, 408),
(337, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Eka Ajheng Widyawati', 'ekaajheng', NULL, '210497', NULL, 406),
(338, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Iriani Utami Ramdona', 'iriani', NULL, '220198', NULL, 411),
(339, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Vista Yulistia', 'vista', NULL, '654321', NULL, 416),
(340, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Fauziah Hasanah', 'fauziah', NULL, '140456', NULL, 413),
(341, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Siti Latifah', 'siti', NULL, '040900', NULL, 415),
(342, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Krisna Ramadhan Saputra', 'krisna', NULL, '654321', NULL, 403),
(343, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhammad Zulfa', 'm zulfa', NULL, '162758', NULL, 414),
(344, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Andi Febrina Sosiawati', 'febrina', NULL, '150297', NULL, 412),
(345, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Tiara Kusuma Dewi', 'tiara', NULL, '123456', NULL, 418),
(346, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Shaula Adrea Rusdiana Nasution', 'shaula', NULL, '112345', NULL, 420),
(347, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Wiji Tri Sayekti', 'wiji', NULL, '234567', NULL, 417),
(348, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Yusron Azkiyah', 'Yusron', NULL, '123456', NULL, 378),
(349, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Josse Nathan Goenawan', 'nathan', NULL, '123456', NULL, 428),
(350, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Isma Fadlilatus Sadiyah', 'isma', NULL, '654321', NULL, 429),
(351, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Bahesty Cut Nyak Din', 'bahesty', NULL, '111111', NULL, 427),
(352, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhammad Taufiq R. Dengo', 'taufiq', NULL, '123456', NULL, 392),
(353, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Ahmad Samdani, SKM., MPH.', 'samdani', NULL, '260469sam', NULL, 436),
(354, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Priyanka Ganesa Utami, Sp. N', 'Priyanka', NULL, '022079', NULL, 439),
(355, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Arrival Rahman', 'arrival', NULL, '123456', NULL, 430),
(356, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Delvina Anastasia Pertiwi', 'delvina', NULL, '123456', NULL, 431),
(357, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Semadela Solichin Putri', 'semadela', NULL, '123456', NULL, 437),
(358, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Adillah Afrilia Syahwina Pado', 'adillah', NULL, '123456', NULL, 438),
(359, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nina Nurjanah', 'ninur', NULL, '123456', NULL, 435),
(360, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Eka Sarima Hardiani', 'eka', NULL, '123456', NULL, 434),
(361, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Frodine Satriati Aer', 'inne', NULL, '123456', NULL, 367),
(362, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Farida Nurhayati', 'farida', NULL, '123456', NULL, 442),
(363, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'drg. Febrianti Adi Satria', 'Febrianti', NULL, '123456', NULL, 443),
(364, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Siti Mariah', 'siti m', NULL, '123456', NULL, 433),
(365, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Rossmeryanda Rezina', 'Rezina', NULL, '123456', NULL, 423),
(366, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Cendy Andestria', 'Cendy', NULL, '123456', NULL, 444),
(367, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. R. Luthfi Nur Fajri', 'luthfi', NULL, '123456', NULL, 447),
(368, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'drg. Sylvia Widhihapsari, Sp. KG', 'sylvia', NULL, '123456', NULL, 448),
(369, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'dr. Puji Astuti Tri Kusumawati, Sp. PD', 'puji a', NULL, '123456', NULL, 449),
(370, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Muhammad Zulfikar F A', 'mzfa', NULL, 'mzfamzfa', NULL, 446),
(371, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Luthfi Lectya Qanita', 'Luthfi l', NULL, '123456', NULL, 450),
(372, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Wulan Afriyanti', 'wulan', NULL, 'KIYREN12', NULL, 419),
(373, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'ACHMAD MAWARDI, S.H., M.H.', 'mawardi', NULL, '123456', NULL, 398),
(374, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Hikmah Nur Safitri', 'hikmah', NULL, '123456', NULL, 445),
(375, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Firdaus', 'firdaus', NULL, '123456', NULL, 114),
(376, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Nyoman Intan Cesarra, S.Pd', 'intan', NULL, '123456', NULL, 163),
(377, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Andri Yulianto', 'andriyulianto', NULL, '123456', NULL, 211),
(378, 0, '2023-03-16 03:10:41', NULL, NULL, NULL, NULL, 'Usep Andri', 'usep', NULL, '123456', 'Uj5A2HxLp3P1ZTqX9oO6QyXPCfSfF1n6Rl1JFb4n489mLbQElJDruBk0STnK', 160);

-- --------------------------------------------------------

--
-- Table structure for table `user_akses`
--

CREATE TABLE `user_akses` (
  `user_akses_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hakakses_id` int(11) NOT NULL,
  `jenis_akses` varchar(255) DEFAULT NULL,
  `akses_bagian_tambahan` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_akses`
--

INSERT INTO `user_akses` (`user_akses_id`, `user_id`, `hakakses_id`, `jenis_akses`, `akses_bagian_tambahan`) VALUES
(1, 0, 1, NULL, NULL),
(3, 306, 4, NULL, NULL),
(4, 313, 5, NULL, NULL),
(5, 104, 4, NULL, NULL),
(6, 109, 4, NULL, NULL),
(7, 108, 3, NULL, NULL),
(8, 241, 4, NULL, NULL),
(9, 37, 3, NULL, NULL),
(10, 205, 6, NULL, NULL),
(11, 353, 7, NULL, NULL),
(12, 98, 4, NULL, NULL),
(13, 373, 8, NULL, NULL),
(14, 378, 4, NULL, NULL),
(15, 192, 11, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`akun_id`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`hakakses_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`pesan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`user_akses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `akun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `hakakses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `pesan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_akses`
--
ALTER TABLE `user_akses`
  MODIFY `user_akses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
