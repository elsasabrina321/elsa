-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 05:50 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_spkbk`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisas`
--

CREATE TABLE `analisas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rule_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tingkat_kepercayaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analisas`
--

INSERT INTO `analisas` (`id`, `user_id`, `rule_id`, `jurusan_id`, `tingkat_kepercayaan`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(35, 3, 7, 9, '76.923076923077', '2022-12-09', 'Pending', '2022-12-09 12:39:09', '2022-12-09 12:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `analisa_id` bigint(20) UNSIGNED NOT NULL,
  `rule_id` bigint(20) UNSIGNED NOT NULL,
  `kepercayaan` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `analisa_id`, `rule_id`, `kepercayaan`, `created_at`, `updated_at`) VALUES
(71, 35, 4, 69.2308, '2022-12-09 12:39:09', '2022-12-09 12:39:09'),
(72, 35, 5, 69.2308, '2022-12-09 12:39:09', '2022-12-09 12:39:09'),
(73, 35, 6, 66.6667, '2022-12-09 12:39:09', '2022-12-09 12:39:09'),
(74, 35, 7, 76.9231, '2022-12-09 12:39:09', '2022-12-09 12:39:09'),
(75, 35, 8, 60, '2022-12-09 12:39:09', '2022-12-09 12:39:09'),
(76, 35, 9, 66.6667, '2022-12-09 12:39:09', '2022-12-09 12:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analisa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `persentase` float DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`id`, `user_id`, `analisa_id`, `persentase`, `tanggal`, `created_at`, `updated_at`) VALUES
(7, 3, 35, 73.3333, '2022-12-10 02:39:09', '2022-12-09 12:39:09', '2022-12-09 12:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `karakteristik_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kepribadian_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `kepribadian_id`, `jurusan`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(5, 1, 'Teknik Elektro', 'Mempelajari Tentang Arus Kuat', '622720a28c25f.jpg', '2022-11-18 05:35:01', '2022-12-12 01:50:57'),
(6, 1, 'Teknik Elektronika', 'Mempelajari Tentang Arus Lemah', 'clipart1870372(1).png', '2022-11-18 05:36:29', '2022-11-18 05:36:29'),
(7, 1, 'Teknik Mesin', 'Mempelajari Tentang Mesin', 'clipart1870372(1).png', '2022-11-18 05:36:55', '2022-11-18 05:36:55'),
(8, 2, 'Sistem Analis (Teknik Elektronika)', 'Mempelajari Tentang Sistem Informasi', 'clipart1870372.png', '2022-11-18 05:37:24', '2022-11-18 05:37:24'),
(9, 3, 'Teknik Sipil', 'Mempelajari Tentang Konstruksi', 'clipart1870372.png', '2022-11-18 05:37:56', '2022-11-18 05:37:56'),
(10, 4, 'Kedokteran', 'Mempelajari Tentang Kesehatan Masyarakat', 'clipart1870372.png', '2022-11-18 05:38:24', '2022-11-18 05:38:24'),
(11, 4, 'Keguruan', 'Mempelajari Tentang Ilmu Keguruan', 'clipart1870372.png', '2022-11-18 05:38:47', '2022-11-18 05:38:47'),
(12, 5, 'Teknik Otomotif', 'Mempelajari Tentang Kendaraan', 'clipart1870372.png', '2022-11-18 05:39:12', '2022-11-18 05:39:12'),
(13, 6, 'Teknik Pertambangan', 'Mempelajari Tentang Pertambangan', 'clipart1870372.png', '2022-11-18 05:39:41', '2022-11-18 05:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `karakteristiks`
--

CREATE TABLE `karakteristiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kepribadian_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `karakteristik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_pakar` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karakteristiks`
--

INSERT INTO `karakteristiks` (`id`, `kepribadian_id`, `kode`, `karakteristik`, `pertanyaan`, `nilai_pakar`, `created_at`, `updated_at`) VALUES
(199, 1, 'A1', 'Tidak menyukai perhatian', 'Saya mencoba untuk tidak menarik perhatian', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(200, 1, 'A2', 'Mengikuti jadwal', 'Saya lebih suka mengikuti jadwal', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(201, 1, 'A3', 'Menghindari konflik', 'Saya mencoba untuk menghindari konflik', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(202, 1, 'A4', 'Sedikit dalam berbicara', 'Saya sedikit dalam berbicara', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(203, 1, 'A5', 'Memperhatikan tenggat waktu', 'Saya sangat memperhatikan tenggat waktu', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(204, 1, 'A6', 'Menghabiskan waktu luang sendiri', 'Saya suka menghabiskan waktu luang saya sendirian', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(205, 1, 'A7', 'Menikmati rutinitas sehari-hari', 'Saya menikmati rutinitas sehari-hari', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(206, 1, 'A8', 'Sulit mengungkapkan pendapat', 'Saya merasa sulit dalam mengungkapkan pendapat', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(207, 1, 'A9', 'Menghindari kegiatan sosial', 'Saya menghindari kegiatan sosial', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(208, 1, 'A10', 'Menyukai pembelajaran praktisi daripada teori', 'Saya menyukai pembelajaran praktisi daripada teori', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(209, 1, 'A11', 'Senang bekerja dengan menggunakan alat-alat', 'Saya senang bekerja dengan menggunakan alat-alat', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(210, 1, 'A12', 'Tidak nyaman ketika tidak setuju dengan seseorang', 'Saya merasa tidak nyaman ketika saya tidak setuju dengan seseorang', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(211, 1, 'A13', 'Tidak suka bersaing dengan orang lain', 'Saya tidak suka bersaing dengan orang lain', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(212, 2, 'A14', 'Berpikir tentang orang lain lakukan', 'Saya berpikir tentang mengapa orang melakukan hal-hal yang mereka lakukan', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(213, 2, 'A15', 'Bersikap objektif saat membuat keputusan', 'Saya bersikap objektif saat membuat keputusan', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(214, 2, 'A16', 'Menyimpan barang-barang sesuai tempatnya', 'Saya menyimpan barang-barang saya di tempat semestinya', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(215, 2, 'A17', 'Menolak godaan', 'Saya menolak godaan', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(216, 2, 'A18', 'Berharap orang lain akan lebih logis', 'Saya berharap orang lain akan lebih logis', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(217, 2, 'A19', 'Menyelesaikan tugas sebelum waktunya', 'Saya menyelesaikan tugas sebelum waktunya', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(218, 2, 'A20', 'Memikirkan miseteri alam semesta', 'Saya senang memikirkan misteri alam semesta', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(219, 2, 'A21', 'Memikirkan ide-ide yang rumit', 'Saya senang memahami ide-ide yang rumit', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(220, 2, 'A22', 'Menghabiskan waktu untuk memahami diri sendiri', 'Saya menghabiskan waktu untuk mencoba memahami diri sendiri', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(221, 2, 'A23', 'Belajar teori-teori ilmiah', 'Saya senang belajar tentang teori-teori ilmiah', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(222, 2, 'A24', 'Menganalisis permasalahan untuk mendapatkan solusi', 'Saya suka menganalisis sebuah permasalahan untuk mendapatkan solusi', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(223, 2, 'A25', 'Belajar dalam memecahkan masalah matematika atau sains', 'Saya suka belajar dalam memecahkan masalah matematika atau sains', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(224, 2, 'A26', 'Tidak menyukai aktivitas yang berulang', 'Saya tidak menyukai kegiatan yang berulang', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(225, 3, 'A27', 'Memiliki imajinasi yang jelas', 'Saya memiliki imajinasi yang jelas', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(226, 3, 'A28', 'Tetap aktif', 'Saya suka tetap aktif', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(227, 3, 'A29', 'Mengerjakan pekerjaan sendiri', 'Saya suka mengerjakan pekerjaan saya sendiri', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(228, 3, 'A30', 'Tidak ketergantungan dengan orang lain', 'Saya tidak suka ketergantungan dengan orang lain', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(229, 3, 'A31', 'Membayangkan hal-hal yang baru', 'Saya senang membayangkan hal-hal baru', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(230, 3, 'A32', 'Mempelajari banyak hal baru', 'Saya suka mempelajari banyak hal baru', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(231, 3, 'A33', 'Berkomunikasi dengan cara yang ekspresif', 'Saya senang berkomunikasi dengan cara yang ekspresif', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(232, 3, 'A34', 'Memiliki fantasi yang kaya', 'Saya memiliki fantasi yang kaya', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(233, 3, 'A35', 'Percaya pada pentingnya seni', 'Saya percaya pada pentingnya seni', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(234, 3, 'A36', 'Membayangkan masa depan', 'Saya senang membayangkan masa depan', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(235, 3, 'A37', 'Tidak suka duduk diam untuk waktu yang lama', 'Saya tidak suka duduk diam untuk waktu yang lama', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(236, 3, 'A38', 'Peka terhadap perasaan orang lain', 'Saya peka terhadap perasaan orang lain', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(237, 3, 'A39', 'Mudah terganggu', 'Saya mudah terganggu', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(238, 4, 'A40', 'Berguna untuk orang-orang sekitar', 'Saya berguna untuk orang-orang di sekitar saya', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(239, 4, 'A41', 'Menghindari kesendirian', 'Saya menghindari kesendirian', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(240, 4, 'A42', 'Bermanfaat untuk orang lain ketika merasa sedih', 'Saya senang bermanfaat untuk orang lain ketika merasa sedih', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(241, 4, 'A43', 'Tidak menyukai jadwal yang ditetapkan', 'Saya tidak menyukai jadwal yang ditetapkan', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(242, 4, 'A44', 'Mudah berbicara dengan orang asing', 'Saya mudah berbicara dengan orang asing', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(243, 4, 'A45', 'Senang membantu orang lain dengan masalah pribadi mereka', 'Saya senang membantu orang lain dengan masalah pribadi mereka', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(244, 4, 'A46', 'Mendapatkan sensasi ketika bertemu orang baru', 'Saya mendapatkan sensasi ketika bertemu orang baru', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(245, 4, 'A47', 'Suka mendapatkan teman baru', 'Saya suka mendapatkan teman baru', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(246, 4, 'A48', 'Kesulitan untuk tetap berpegang terhadap rutinitas', 'Saya merasa kesulitan untuk tetap berpegang terhadap rutinitas', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(247, 4, 'A49', 'Bekerja untuk kebutuhan orang lain', 'Saya senang bekerja untuk kebutuhan orang lain', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(248, 4, 'A50', 'Bekerja keras untuk menyenangkan orang lain', 'Saya bekerja keras untuk menyenangkan orang lain', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(249, 5, 'A51', 'Senang menjadi pusat perhatian', 'Saya senang menjadi pusat perhatian', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(250, 5, 'A52', 'Berusaha untuk menjadi popular', 'Saya berusaha untuk menjadi popular', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(251, 5, 'A53', 'Kesulitan untuk mengendalikan impuls saya', 'Saya kesulitan untuk mengendalikan impuls saya', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(252, 5, 'A54', 'Berada di sekitar banyak orang memberi saya energi', 'Berada di sekitar banyak orang memberi saya energi', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(253, 5, 'A55', 'Ambisius dalam mengerjakan sesuatu', 'Saya ambisius dalam mengerjakan sesuatu', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(254, 5, 'A56', 'Suka mencoba hobi baru', 'Saya suka mencoba hobi baru', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(255, 5, 'A57', 'Menghabiskan waktu mencari pengalaman baru', 'Saya menghabiskan waktu mencari pengalaman baru', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(256, 5, 'A58', 'Suka membujuk orang lain', 'Saya suka membujuk orang lain', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(257, 5, 'A59', 'Suka didengar', 'Saya suka didengar', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(258, 5, 'A60', 'Tidak memiliki kemampuan dalam mempengaruhi orang lain', 'Saya tidak memiliki kemampuan dalam mempengaruhi orang lain', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(259, 6, 'A61', 'Suka meyelesaikan pekerjaan yang teratur dan terdefenisi dengan baik dalam lingkungan yang tersturktur', 'Saya suka meyelesaikan pekerjaan yang teratur dan terdefenisi dengan baik dalam lingkungan yang tersturktur', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(260, 6, 'A62', 'Bekerja dengan angka, data, dan file', 'Saya menyukai bekerja dengan angka, data, dan file', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(261, 6, 'A63', 'Menghargai akurasi dan presesi', 'Saya menghargai akurasi dan presesi', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(262, 6, 'A64', 'Bekerja sesuai dengan prosedur dan aturan yang jelas', 'Saya bekerja sesuai dengan prosedur dan aturan yang jelas', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(263, 6, 'A65', 'Tidak menyukai lingkungan kerja yang tidak terstruktur dan prosedur yang jelas', 'Saya tidak menyukai lingkungan kerja yang tidak terstruktur dan prosedur yang jelas', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04'),
(264, 6, 'A66', 'Suka pekerjaan yang metodis dan sistematis, dan tidak ingin mengada-ada', 'Saya menyukai pekerjaan yang metodis dan sistematis, dan tidak ingin mengada-ada', NULL, '2022-11-26 10:19:04', '2022-11-26 10:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `kepribadians`
--

CREATE TABLE `kepribadians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepribadian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kepribadians`
--

INSERT INTO `kepribadians` (`id`, `kode`, `kepribadian`, `deskripsi`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'R', 'Realistik', 'Pembangun: Suka pada pekerjaan yang melibatkan penggunaan alat, mesin, atau keterampilan fisik. Pembangun suka bekerja dengan tangan dan tubuh mereka, bekerja dengan tumbuhan dan hewan, dan bekerja di luar ruangan.', NULL, '2022-11-16 12:05:23', '2022-12-09 12:58:06'),
(2, 'I', 'Investigatif', 'Pemikir. Suka pada pekerjaan yang melibatkan teori, penelitian, dan penyelidikan intelektual. Pemikir suka bekerja dengan ide dan konsep, dan menikmati sains, teknologi, dan akademisi.', NULL, '2022-11-16 12:18:13', '2022-12-09 12:59:22'),
(3, 'A', 'Artistik', 'Pencipta. Suka pada pekerjaan melibatkan seni, desain, bahasa, dan ekspresi diri. Pencipta konten suka bekerja di lingkungan yang tidak terstruktur dan menghasilkan sesuatu yang unik.', NULL, '2022-11-16 12:18:24', '2022-12-09 12:58:58'),
(4, 'S', 'Sosial', 'Penolong. Suka pada pekerjaan melibatkan membantu, mengajar, melatih, dan melayani orang lain. Penolong suka bekerja di lingkungan yang kooperatif untuk meningkatkan kehidupan orang lain.', NULL, '2022-11-16 12:18:37', '2022-12-09 12:58:38'),
(5, 'E', 'Enterprising', 'Persuader. Suka pada pekerjaan yang melibatkan kepemimpinan, memotivasi, dan mempengaruhi orang lain. Persuader suka bekerja di posisi kekuasaan untuk membuat keputusan dan melaksanakan proyek.', NULL, '2022-11-16 12:18:52', '2022-12-09 13:00:00'),
(6, 'C', 'Conventional', 'Penyelenggara. Senang pada pekerjaan yang melibatkan pengelolaan data, informasi, dan proses. Penyelenggara suka bekerja di lingkungan terstruktur untuk menyelesaikan tugas dengan presisi dan akurasi.', NULL, '2022-11-16 12:19:06', '2022-12-09 13:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioners`
--

CREATE TABLE `kuisioners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuisioners`
--

INSERT INTO `kuisioners` (`id`, `soal`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 'Dalam beberapa tahun terakhir, orang tua saya memiliki pengaruh yang signifikan terhadap pilihan jurusan kuliah saya.', '-', '2022-12-07 09:01:29', '2022-12-07 09:01:29'),
(4, 'Orang tua saya mendorong saya untuk mengejar minat dan aspirasi jurusan kuliah saya', '-', '2022-12-07 09:02:00', '2022-12-07 09:02:00'),
(5, 'Bidang Keteknikan bukanlah pilihan pertama saya untuk kuliah', '-', '2022-12-07 09:03:12', '2022-12-07 09:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_11_16_143904_create_kepribadians_table', 2),
(7, '2022_11_16_144106_create_karakteristiks_table', 2),
(8, '2022_11_18_094940_create_jurusans_table', 3),
(9, '2022_11_18_170024_create_analisas_table', 4),
(10, '2022_11_18_181608_create_details_table', 4),
(11, '2022_11_18_182346_create_histories_table', 4),
(12, '2022_11_19_110847_create_rules_table', 5),
(13, '2022_12_07_032022_create_kuisioners_table', 6),
(14, '2022_12_07_032209_create_families_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `rule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `jurusan_id`, `rule`, `deskripsi`, `created_at`, `updated_at`) VALUES
(4, 7, '199,200,201,202,203,204,205,206,207,208,209,210,211', NULL, '2022-12-09 11:36:41', '2022-12-09 11:36:41'),
(5, 5, '199,200,201,202,203,204,205,206,207,208,209,210,211', NULL, '2022-12-09 12:00:05', '2022-12-09 12:00:05'),
(6, 6, '199,200,201,202,203,204,205,206,208,209,210,211', NULL, '2022-12-09 12:04:12', '2022-12-09 12:04:12'),
(7, 9, '225,226,227,228,229,230,231,232,233,234,235,236,237', NULL, '2022-12-09 12:10:44', '2022-12-09 12:10:44'),
(8, 12, '208,249,250,251,252,253,254,255,256,258', NULL, '2022-12-09 12:25:06', '2022-12-09 12:25:06'),
(9, 13, '259,260,261,262,263,264', NULL, '2022-12-09 12:28:04', '2022-12-09 12:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `avatar`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin', 'admin@google.com', NULL, '$2y$10$kGSVDEXkUpvZb5b8eW6w5.0WbHycJKAASI0Umf4kKfR8J04pjlDnS', NULL, 'admin', 'ad10d8434fc9aa2deda21721b3260d19.jpg', '2022-11-13 21:27:10', '2022-11-30 04:53:35'),
(7, 'mahasiswa', 'mahasiswa', 'mahasiswa@gmail.com', NULL, '$2y$10$En3wtYslJobHFfFUk.7zUuN/WPMTWbGsYrXbZxyt.tpGEQXBSjok2', NULL, 'mahasiswa', 'T615468910_g.jpg', '2022-11-30 01:39:34', '2022-11-30 04:58:35'),
(9, 'kaprodi', 'kaprodi', 'kaprodi@gmail.com', NULL, '$2y$10$NHbxlLKpTVA/p5gAv84aC.GND4VzvilY74T5S0MunhGOYph31RmiK', NULL, 'kaprodi', 'ad10d8434fc9aa2deda21721b3260d19.jpg', '2022-11-30 09:09:05', '2022-11-30 09:09:05'),
(10, 'maha', 'maha12', 'maha@gmail.com', NULL, '$2y$10$mNXp.2uew74m0aIQBGpbIOJKxjLFNc15F6c1NtXpaUCjm2x8SKviy', NULL, 'mahasiswa', 'WhatsApp Image 2022-12-09 at 13.14.39(1).jpeg', '2022-12-09 13:08:57', '2022-12-09 13:08:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisas`
--
ALTER TABLE `analisas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rule_id` (`rule_id`),
  ADD KEY `jurusan_id` (`jurusan_id`),
  ADD KEY `analisas_user_id_foreign` (`user_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rule_id` (`rule_id`),
  ADD KEY `details_analisa_id_foreign` (`analisa_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`),
  ADD KEY `families_analisa_id_foreign` (`analisa_id`),
  ADD KEY `families_user_id_foreign` (`user_id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_user_id_foreign` (`user_id`),
  ADD KEY `histories_karakteristik_id_foreign` (`karakteristik_id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusans_kepribadian_id_foreign` (`kepribadian_id`);

--
-- Indexes for table `karakteristiks`
--
ALTER TABLE `karakteristiks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karakteristiks_kepribadian_id_foreign` (`kepribadian_id`);

--
-- Indexes for table `kepribadians`
--
ALTER TABLE `kepribadians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kepribadians_kode_unique` (`kode`);

--
-- Indexes for table `kuisioners`
--
ALTER TABLE `kuisioners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rules_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisas`
--
ALTER TABLE `analisas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `karakteristiks`
--
ALTER TABLE `karakteristiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `kepribadians`
--
ALTER TABLE `kepribadians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kuisioners`
--
ALTER TABLE `kuisioners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analisas`
--
ALTER TABLE `analisas`
  ADD CONSTRAINT `analisas_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `analisas_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `analisas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_analisa_id_foreign` FOREIGN KEY (`analisa_id`) REFERENCES `analisas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `families`
--
ALTER TABLE `families`
  ADD CONSTRAINT `families_analisa_id_foreign` FOREIGN KEY (`analisa_id`) REFERENCES `analisas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `families_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_karakteristik_id_foreign` FOREIGN KEY (`karakteristik_id`) REFERENCES `karakteristiks` (`id`),
  ADD CONSTRAINT `histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD CONSTRAINT `jurusans_kepribadian_id_foreign` FOREIGN KEY (`kepribadian_id`) REFERENCES `kepribadians` (`id`);

--
-- Constraints for table `karakteristiks`
--
ALTER TABLE `karakteristiks`
  ADD CONSTRAINT `karakteristiks_kepribadian_id_foreign` FOREIGN KEY (`kepribadian_id`) REFERENCES `kepribadians` (`id`);

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
