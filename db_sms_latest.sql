-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2021 at 09:42 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sms_latest`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `a_type_id` int(11) DEFAULT NULL,
  `BM` char(11) NOT NULL,
  `BA` char(11) NOT NULL,
  `MM` char(11) NOT NULL,
  `SN` char(11) NOT NULL,
  `SEJ` char(11) NOT NULL,
  `PQS` char(11) NOT NULL,
  `PSI` char(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `student_ic` varchar(55) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `student_id`, `a_type_id`, `BM`, `BA`, `MM`, `SN`, `SEJ`, `PQS`, `PSI`, `year`, `student_ic`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 'A+', 'A+', 'A', 'A', 'B+', 'A', 'A', 2021, '081230113333', NULL, '2021-07-03', NULL),
(2, 5, 2, 'A+', 'A+', 'A+', 'A+', 'A+', 'A+', 'A+', 2023, '081230114444', NULL, '2021-07-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `academic_types`
--

CREATE TABLE `academic_types` (
  `id` int(11) NOT NULL,
  `a_type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_types`
--

INSERT INTO `academic_types` (`id`, `a_type`) VALUES
(1, 'Penilaian Peperiksaan 1'),
(2, 'Peperiksaan Pertengahan Tahun'),
(3, 'Peperiksaan Percubaan'),
(4, 'Peperiksaan Akhir Tahun');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `gender_id` char(11) NOT NULL,
  `photo` text NOT NULL,
  `address` text NOT NULL,
  `marriage_status` varchar(55) NOT NULL,
  `salary` decimal(11,2) NOT NULL,
  `ic_no` varchar(55) NOT NULL,
  `ic_attachment` text NOT NULL,
  `spouse_name` varchar(55) DEFAULT NULL,
  `spouse_email` varchar(55) DEFAULT NULL,
  `spouse_phone` varchar(55) DEFAULT NULL,
  `spouse_occupation` varchar(55) DEFAULT NULL,
  `spouse_workplace_address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `name`, `email`, `phone`, `gender_id`, `photo`, `address`, `marriage_status`, `salary`, `ic_no`, `ic_attachment`, `spouse_name`, `spouse_email`, `spouse_phone`, `spouse_occupation`, `spouse_workplace_address`) VALUES
(1, 'admin', 'Aliah Afifah', 'aliah@gmail.com', '0122022202', 'F', 'face23.jpg', '--', 'Single', '3500.00', '12345', 'ic-test.jpg', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcement_date` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement_id`, `title`, `description`, `announcement_date`, `image`, `created_at`, `updated_at`) VALUES
(14, 'ANCMT-00000', 'Solat Hajat', 'some description of Solat Hajat will be placed here.  some description of Solat Hajat will be placed here.  some description of Solat Hajat will be placed here.', '2021-06-09', '20210627111448.jpg', '2021-06-27 03:14:48', '2021-06-27 03:14:48'),
(15, 'ANCMT-00001', 'Sambutan Berbuka Puasa', 'some description of Sambutan Berbuka Puasawill be placed here.  some description of Sambutan Berbuka Puasawill be placed here.  some description of Sambutan Berbuka Puasawill be placed here.', '2021-06-12', '20210627111532.jpg', '2021-06-27 03:15:32', '2021-06-27 03:15:32'),
(16, 'ANCMT-00002', 'Mencari Malam Lailatul Qadr', 'some description of Mencari Malam Lailatul Qadr will be placed here.  some description of Mencari Malam Lailatul Qadr will be placed here.  some description of Mencari Malam Lailatul Qadr will be placed here.', '2021-06-09', '1624792606.jpg', '2021-06-27 03:16:04', '2021-06-27 03:16:46'),
(17, 'ANCMT-00003', 'Sambutan Aidilfitri', 'some description of Sambutan Aidilfitri will be placed here.  some description of Sambutan Aidilfitri will be placed here.  some description of Sambutan Aidilfitri will be placed here.', '2021-06-08', '20210627111714.jpg', '2021-06-27 03:17:14', '2021-06-27 03:17:14');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `fee_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `fee_category_id`, `fee_type`, `fee_total`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yuran Pendaftaran', '100.00', NULL, NULL),
(3, 2, 'Cadar', '25.00', NULL, NULL),
(4, 2, 'Kain Jubah Coklat', '30.00', NULL, NULL),
(6, 3, 'Kain Jubah Coklat (Untuk pengajian sahaja)', '30.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee__categories`
--

CREATE TABLE `fee__categories` (
  `fee_category_id` bigint(20) UNSIGNED NOT NULL,
  `fee_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee__categories`
--

INSERT INTO `fee__categories` (`fee_category_id`, `fee_category`, `created_at`, `updated_at`) VALUES
(1, 'Keperluan Asas', NULL, NULL),
(2, 'Keperluan Pelajar Lelaki', NULL, NULL),
(3, 'Keperluan Pelajar Perempuan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Female', '2021-06-26 17:46:00', '2021-06-26 17:46:00'),
(2, 'Male', '2021-06-26 17:46:20', '2021-06-26 17:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship_id` int(11) NOT NULL,
  `ic_attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `username`, `name`, `gender_id`, `phone_no`, `email`, `photo`, `address`, `occupation`, `salary`, `relationship_id`, `ic_attachment`, `created_at`, `updated_at`) VALUES
(2, 'ahmad', 'Ahmad', '2', '0102540290', 'ahmad@gmail.com', '20210703065115.jpg', 'No 7 Jalan Ke Syurga, Langit ke 7. Taman-taman Syurga.', 'freelancer', '3000.00', 3, '20210703065115.jpg', '2021-07-02 22:51:15', '2021-07-02 22:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `hafazans`
--

CREATE TABLE `hafazans` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `day` varchar(55) DEFAULT NULL,
  `day_position` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `month` char(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `talaqi_start_juz` varchar(55) DEFAULT NULL,
  `talaqi_start_surah` varchar(55) DEFAULT NULL,
  `talaqi_start_halaman` varchar(55) DEFAULT NULL,
  `talaqi_end_juz` varchar(55) DEFAULT NULL,
  `talaqi_end_surah` varchar(55) DEFAULT NULL,
  `talaqi_end_halaman` varchar(55) DEFAULT NULL,
  `hafazan_start_juz` varchar(55) DEFAULT NULL,
  `hafazan_start_surah` varchar(55) DEFAULT NULL,
  `hafazan_start_halaman` varchar(55) DEFAULT NULL,
  `hafazan_end_juz` varchar(55) DEFAULT NULL,
  `hafazan_end_surah` varchar(55) DEFAULT NULL,
  `hafazan_end_halaman` varchar(55) DEFAULT NULL,
  `ulangan_baru_start_juz` varchar(55) DEFAULT NULL,
  `ulangan_baru_start_surah` varchar(55) DEFAULT NULL,
  `ulangan_baru_start_halaman` varchar(55) DEFAULT NULL,
  `ulangan_baru_end_juz` varchar(55) DEFAULT NULL,
  `ulangan_baru_end_surah` varchar(55) DEFAULT NULL,
  `ulangan_baru_end_halaman` varchar(55) DEFAULT NULL,
  `ulangan_lama_start_juz` varchar(55) DEFAULT NULL,
  `ulangan_lama_start_surah` varchar(55) DEFAULT NULL,
  `ulangan_lama_start_halaman` varchar(55) DEFAULT NULL,
  `ulangan_lama_end_juz` varchar(55) DEFAULT NULL,
  `ulangan_lama_end_surah` varchar(55) DEFAULT NULL,
  `ulangan_lama_end_halaman` varchar(55) DEFAULT NULL,
  `remark` text,
  `student_ic` varchar(55) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deletedd_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hafazans`
--

INSERT INTO `hafazans` (`id`, `student_id`, `date`, `day`, `day_position`, `week`, `month`, `year`, `talaqi_start_juz`, `talaqi_start_surah`, `talaqi_start_halaman`, `talaqi_end_juz`, `talaqi_end_surah`, `talaqi_end_halaman`, `hafazan_start_juz`, `hafazan_start_surah`, `hafazan_start_halaman`, `hafazan_end_juz`, `hafazan_end_surah`, `hafazan_end_halaman`, `ulangan_baru_start_juz`, `ulangan_baru_start_surah`, `ulangan_baru_start_halaman`, `ulangan_baru_end_juz`, `ulangan_baru_end_surah`, `ulangan_baru_end_halaman`, `ulangan_lama_start_juz`, `ulangan_lama_start_surah`, `ulangan_lama_start_halaman`, `ulangan_lama_end_juz`, `ulangan_lama_end_surah`, `ulangan_lama_end_halaman`, `remark`, `student_ic`, `created_at`, `updated_at`, `deletedd_at`) VALUES
(15, 4, '2021-05-20', 'Thu', NULL, 1, 'May', 2021, 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'tue', 'remark for tuesday', NULL, NULL, '2021-07-04', NULL),
(16, 5, '2021-05-21', 'Fri', NULL, 1, 'May', 2021, 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'sunday yasmin', 'remark for sunday yasminnnnn', NULL, NULL, '2021-07-04', NULL),
(17, 5, '2021-05-17', 'Mon', 2, 3, 'May', 2021, 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'monday yasmin', 'remark for monday yasmin', '081230114444', NULL, NULL, NULL),
(21, 4, '2021-07-15', 'Thu', NULL, 1, 'Jul', 2021, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'testtest', 'test', 'test', 'test', 'test', 'test', 'test', '4', '2021-07-04', '2021-07-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `UserID` varchar(50) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `UserLvl` int(11) NOT NULL DEFAULT '4',
  `Status` varchar(55) NOT NULL DEFAULT 'Active',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `UserID`, `Password`, `UserLvl`, `Status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', 1, 'Active', '2021-07-03', '2021-07-03', NULL),
(2, 'ahmad', 'ahmad', 4, 'Active', '2021-07-03', '2021-07-03', NULL),
(8, 'nadia', 'nadia', 2, 'Active', '2021-07-03', '2021-07-03', NULL),
(9, 'suhaila', 'suhaila', 3, 'Active', '2021-07-03', '2021-07-03', NULL);

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
(4, '2021_06_26_125230_create_teachers_table', 2),
(5, '2021_06_26_170630_create_students_table', 3),
(6, '2021_06_26_180328_create_parents_table', 4),
(7, '2021_06_26_181901_create_guardians_table', 5),
(8, '2021_06_26_184204_create_announcements_table', 6),
(9, '2014_10_12_200000_add_two_factor_columns_to_users_table', 7),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(11, '2021_06_26_190019_create_fees_table', 7),
(12, '2021_06_26_193506_create_sessions_table', 7),
(13, '2021_06_27_014125_create_genders_table', 8),
(14, '2021_06_28_135832_create_guardians_table', 9),
(15, '2021_06_28_151100_create_relationships_table', 10),
(16, '2021_06_29_150459_create_fees_table', 11),
(17, '2021_06_29_151137_create_fee__categories_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_fees`
--

CREATE TABLE `monthly_fees` (
  `id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `fee` decimal(11,2) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_fees`
--

INSERT INTO `monthly_fees` (`id`, `year`, `fee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2023, '250.00', NULL, '2021-07-03', NULL);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(55) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `student_ic` varchar(55) NOT NULL,
  `p_type_id` int(11) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `payment_option` varchar(55) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `paid_amount` decimal(11,2) NOT NULL,
  `balance` decimal(11,2) NOT NULL,
  `proof` text,
  `payment_status` varchar(55) NOT NULL DEFAULT 'Pending',
  `parent` varchar(55) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `student_id`, `payment_date`, `student_ic`, `p_type_id`, `month`, `year`, `payment_option`, `amount`, `paid_amount`, `balance`, `proof`, `payment_status`, `parent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'PAY00003', 5, '0000-00-00', '081230114444', 0, 0, 0, 'Cash', '0.00', '0.00', '0.00', '', 'Pending', '', NULL, NULL, NULL),
(4, 'PAY00004', 5, '2021-05-17', '081230114444', 1, 0, 0, 'Cash', '210.00', '210.00', '0.00', '', 'Paid', 'ahmad', NULL, NULL, NULL),
(5, 'PAY00005', 5, '2021-05-17', '081230114444', 2, 5, 2021, 'Cash', '250.00', '150.00', '100.00', '', 'Partial Paid', 'ahmad', NULL, NULL, NULL),
(6, 'PAY00006', 4, '2021-05-18', '081230115553', 1, 0, 0, 'cash', '210.00', '100.00', '110.00', '', 'Partial Paid', 'ahmad', NULL, NULL, NULL),
(7, 'PAY00007', 4, '2021-05-18', '081230115553', 2, 5, 2021, 'cash', '250.00', '100.00', '150.00', '', 'Partial Paid', 'ahmad', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`status_id`, `status`) VALUES
(1, 'Pending'),
(2, 'Declined'),
(3, 'Partial Paid'),
(4, 'Paid');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_fee`
--

CREATE TABLE `registration_fee` (
  `r_fee_id` int(11) NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `fee_type` varchar(55) NOT NULL,
  `fee` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_fee`
--

INSERT INTO `registration_fee` (`r_fee_id`, `fee_category_id`, `fee_type`, `fee`) VALUES
(1, 1, 'Yuran Pendaftaran', '100.00'),
(3, 2, 'Cadar', '25.00'),
(4, 2, 'Kain Jubah Coklat', '30.00'),
(5, 3, 'Cadar', '25.00'),
(6, 3, 'Kain Jubah Coklat (Untuk pengajian sahaja)', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `registration_status`
--

CREATE TABLE `registration_status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_status`
--

INSERT INTO `registration_status` (`status_id`, `status`) VALUES
(1, 'Processing'),
(2, 'Rejected'),
(3, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `relationship_id` int(11) NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`id`, `relationship_id`, `relationship`, `created_at`, `updated_at`) VALUES
(1, 1, 'Grandparents', NULL, NULL),
(2, 2, 'Parent', NULL, NULL),
(3, 3, 'Uncle', NULL, NULL),
(4, 4, 'Guardian', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('crXNdIGIDKAbn8bVoXlvz5R5Zstr1e0R7G4KB5sp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfdG9rZW4iO3M6NDA6IlFhNkZRS3psM2ZmY1Jnejc2bHBwTXhTdTdBMUZ1Sjl5Vktqa1VQNHIiO30=', 1625478075),
('z4i7BJYTiHme1ACk4kfEn44STPqIaqzCTYU95PpF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo3OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3ZpZXctY2hpbGQtcGVyZm9ybWFuY2UiO31zOjY6Il90b2tlbiI7czo0MDoiUnlRU3NzUFpURDhNa1JwajVJdUw3eGh6c2xHSFgwdDZHeXpLbUVWQSI7czo4OiJ1c2VybmFtZSI7czo1OiJhaG1hZCI7czo1OiJwaG90byI7czoxODoiMjAyMTA3MDMwNjUxMTUuanBnIjtzOjY6IlVzZXJJRCI7czo1OiJhaG1hZCI7czo3OiJVc2VyTHZsIjtpOjQ7fQ==', 1625399969);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_copy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `ic_no`, `dob`, `gender_id`, `photo`, `purpose`, `status`, `address`, `ic_copy`, `parent`, `created_at`, `updated_at`) VALUES
(4, 'Ahmad Amirul', '081230115553', '2021-07-08', '2', '20210703071003.jpg', 'SPM', 'Approved', 'no 18 jalan sepertiga malam', '20210703071003.jpg', '7', '2021-07-02 23:10:03', '2021-07-02 23:10:03'),
(5, 'Nur Yasmin', '081230114444', '2021-07-20', '1', '20210703074024.jpg', 'Both', 'Approved', 'no 7 jalan mesra', '20210703074024.jpg', '7', '2021-07-02 23:40:24', '2021-07-02 23:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marriage_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_workplace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `name`, `email`, `phone`, `gender_id`, `photo`, `type`, `address`, `marriage_status`, `salary`, `ic_no`, `ic_attachment`, `spouse_name`, `spouse_email`, `spouse_occupation`, `spouse_phone`, `spouse_workplace`, `created_at`, `updated_at`) VALUES
(8, 'nadia', 'Nur nadia', 'nadia@gmail.com', '0188088808', '1', '20210703064011.jpg', 'Tahfiz', 'no 7 jalan sesuci debu shah alam', 'single', '2500.00', '881230119999', '20210703064011.jpg', NULL, NULL, NULL, NULL, NULL, '2021-07-02 22:40:11', '2021-07-02 22:40:11'),
(9, 'suhaila', 'Siti Suhaila', 'suhaila@gmail.com', '0133033303', '1', '20210703064238.jpg', 'Academic', 'no 57 taman setia alam shah alam', 'married', '2500.00', '881230117777', '20210703064238.jpg', 'suhaimi', NULL, 'programmer', '0133303003', NULL, '2021-07-02 22:42:38', '2021-07-02 22:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_types`
--
ALTER TABLE `academic_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee__categories`
--
ALTER TABLE `fee__categories`
  ADD PRIMARY KEY (`fee_category_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hafazans`
--
ALTER TABLE `hafazans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_fees`
--
ALTER TABLE `monthly_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`) USING BTREE;

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `registration_fee`
--
ALTER TABLE `registration_fee`
  ADD PRIMARY KEY (`r_fee_id`);

--
-- Indexes for table `registration_status`
--
ALTER TABLE `registration_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `academic_types`
--
ALTER TABLE `academic_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fee__categories`
--
ALTER TABLE `fee__categories`
  MODIFY `fee_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hafazans`
--
ALTER TABLE `hafazans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `monthly_fees`
--
ALTER TABLE `monthly_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration_fee`
--
ALTER TABLE `registration_fee`
  MODIFY `r_fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration_status`
--
ALTER TABLE `registration_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
