-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 12:38 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvgenerator`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_init_price` bigint(20) UNSIGNED NOT NULL,
  `bid_start` datetime NOT NULL,
  `bid_end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `product_id`, `product_init_price`, `bid_start`, `bid_end`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 4, 1200, '2020-07-08 16:30:00', '2020-07-08 17:00:00', '2020-07-08 10:20:17', '2020-07-08 10:21:00', '2020-07-08 10:21:00'),
(4, 5, 1200, '2020-07-09 00:00:00', '2020-07-09 00:00:00', '2020-07-08 10:23:31', '2020-07-08 10:24:21', '2020-07-08 10:24:21'),
(5, 5, 1210, '2020-07-10 00:00:00', '2020-07-27 00:00:00', '2020-07-08 10:23:50', '2020-07-08 10:24:21', '2020-07-08 10:24:21'),
(6, 6, 1200, '2020-07-08 16:30:00', '2020-07-08 16:45:00', '2020-07-08 10:27:49', '2020-07-08 10:56:02', '2020-07-08 10:56:02'),
(7, 6, 1210, '2020-07-08 16:44:00', '2020-07-08 16:46:00', '2020-07-08 10:45:50', '2020-07-08 11:12:30', '2020-07-08 11:12:30'),
(8, 6, 1200, '2020-07-08 17:00:00', '2020-07-08 17:47:00', '2020-07-08 11:11:01', '2020-07-08 11:12:30', '2020-07-08 11:12:30'),
(9, 7, 1200, '2020-07-08 05:00:00', '2020-07-08 17:20:00', '2020-07-08 11:18:19', '2020-07-08 11:18:19', NULL),
(10, 7, 1201, '2020-07-09 00:00:00', '2021-07-08 00:00:00', '2020-07-08 11:48:20', '2021-06-30 11:02:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE `bidders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bidding_price` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidders`
--

INSERT INTO `bidders` (`id`, `auction_id`, `user_id`, `bidding_price`, `created_at`, `updated_at`) VALUES
(81, 6, 32, 1202, '2020-07-08 10:40:26', '2020-07-08 10:40:26'),
(82, 9, 32, 1201, '2020-07-08 11:19:12', '2020-07-08 11:19:12'),
(84, 9, 32, 1203, '2020-07-08 11:19:48', '2020-07-08 11:19:48'),
(86, 10, 32, 1202, '2021-06-30 11:14:29', '2021-06-30 11:14:29'),
(87, 10, 32, 1203, '2021-06-30 11:14:36', '2021-06-30 11:14:36'),
(88, 10, 32, 1500, '2021-06-30 11:14:44', '2021-06-30 11:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carObj` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `user_id`, `name`, `address`, `email`, `mobile`, `image`, `carObj`, `created_at`, `updated_at`) VALUES
(39, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863735.png', 'a', '2020-07-04 05:55:35', '2020-07-04 05:55:35'),
(40, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863760.png', 'a', '2020-07-04 05:56:00', '2020-07-04 05:56:00'),
(41, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863776.png', 'a', '2020-07-04 05:56:16', '2020-07-04 05:56:16'),
(42, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863790.png', 'a', '2020-07-04 05:56:30', '2020-07-04 05:56:30'),
(43, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863801.png', 'a', '2020-07-04 05:56:41', '2020-07-04 05:56:41'),
(44, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863847.png', 'a', '2020-07-04 05:57:27', '2020-07-04 05:57:27'),
(45, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863873.png', 'a', '2020-07-04 05:57:53', '2020-07-04 05:57:53'),
(46, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863934.png', 'a', '2020-07-04 05:58:54', '2020-07-04 05:58:54'),
(47, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863950.png', 'a', '2020-07-04 05:59:10', '2020-07-04 05:59:10'),
(48, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593863991.png', 'a', '2020-07-04 05:59:51', '2020-07-04 05:59:51'),
(49, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593864224.png', 'a', '2020-07-04 06:03:44', '2020-07-04 06:03:44'),
(50, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593864416.png', 'a', '2020-07-04 06:06:56', '2020-07-04 06:06:56'),
(51, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593864606.png', 'a', '2020-07-04 06:10:06', '2020-07-04 06:10:06'),
(52, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593864672.png', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12'),
(53, 27, 'Noah', 'Naomohol Buchapul 83/C, Mymensingh', 'u1404111@student.cuet.ac.bd', '01533609794, 01400332371', '1593932484.jpeg', 'Some career objective . . .', '2020-07-05 01:01:24', '2020-07-05 01:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `debts`
--

CREATE TABLE `debts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `query_id` bigint(20) UNSIGNED NOT NULL,
  `dept_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `debts`
--

INSERT INTO `debts` (`id`, `query_id`, `dept_name`, `created_at`, `updated_at`) VALUES
(1, 44, 'ete', '2020-07-06 02:49:40', '2020-07-06 02:49:40'),
(2, 44, 'urp', '2020-07-06 02:49:40', '2020-07-06 02:49:40'),
(3, 44, 'wre', '2020-07-06 02:49:40', '2020-07-06 02:49:40'),
(4, 45, 'eee', '2020-07-06 02:55:26', '2020-07-06 02:55:26'),
(5, 45, 'pme', '2020-07-06 02:55:26', '2020-07-06 02:55:26'),
(6, 45, 'wre', '2020-07-06 02:55:26', '2020-07-06 02:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `user_id`, `institution`, `degree`, `grade`, `duration`, `created_at`, `updated_at`) VALUES
(96, 31, 'a', 'a', 'a', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12'),
(97, 27, 'MZS', 'SSC', '5.0', '2012', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(98, 27, 'NDC', 'HSC', '5.0', '2014', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(99, 27, 'CUET', 'BSc', '2.0', '2019', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(100, 28, 'MZS', 'SSC', '5.0', '2012', '2020-07-07 10:04:17', '2020-07-07 10:04:17'),
(101, 28, 'NDC', 'HSC', '5.0', '2014', '2020-07-07 10:04:17', '2020-07-07 10:04:17'),
(102, 28, 'CUET', 'BSc', '2.0', '2019', '2020-07-07 10:04:17', '2020-07-07 10:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_27_083734_create_cvs_table', 1),
(5, '2020_06_27_130415_create_projects_table', 1),
(6, '2020_06_27_131035_create_educations_table', 1),
(7, '2020_06_27_131109_create_skills_table', 1),
(8, '2020_07_01_075438_create_social_logins_table', 2),
(13, '2020_07_05_064105_create_jqueries_table', 3),
(14, '2020_07_05_065811_create_queries_table', 4),
(15, '2020_07_05_070329_create_debts_table', 5),
(18, '2020_07_06_164738_create_bidders_table', 6),
(21, '2020_07_06_162024_create_products_table', 7),
(22, '2020_07_06_164009_create_auctions_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dasummy@gmail.com', '$2y$10$c1YFSVAubeY13xDhkXgR8eFz4SHHoEGoqEqZpR9EQ18q0E0GILiXa', '2020-07-01 08:13:55'),
('u1404111@student.cuet.ac.bd', '$2y$10$ZqSfZ3FFAJPSs7kf9.G33uUWQVVQjocjYZSn9lrdTU27Sa8tJLuT.', '2020-07-01 09:05:33'),
('hello2441139abcd@gmail.com', '$2y$10$4sXUNwJNHmpU.z2mruKcYu7ByYcII3yf283KZH75SuWfiPtSJgGuq', '2020-07-01 09:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'asdf', 'asdf', 'asdf', '1594203582.jpeg', '2020-07-08 10:21:00', '2020-07-08 10:19:42', '2020-07-08 10:21:00'),
(5, 'PES', 'games', 'This is an exclusive product.', '1594203798.jpeg', '2020-07-08 10:24:21', '2020-07-08 10:23:18', '2020-07-08 10:24:21'),
(6, 'PES21', 'games', 'An exclusive product.', '1594203968.jpeg', '2020-07-08 11:12:30', '2020-07-08 10:26:08', '2020-07-08 11:12:30'),
(7, 'PES', 'Another', 'hhhhh', '1594207039.jpeg', NULL, '2020-07-08 11:17:19', '2020-07-08 11:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(90, 31, 'a', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12'),
(91, 31, 'a', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12'),
(92, 31, 'adsf', 'asdf', '2020-07-04 06:11:12', '2020-07-04 06:11:12'),
(93, 27, 'Ecommerce', 'This is one of my new Projects.', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(94, 27, 'CV generator', 'A CV generator.', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(95, 27, 'Hostel', 'A hostel management project .', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(96, 28, 'Ecommerce', 'This is one of my new Projects.', '2020-07-07 10:04:17', '2020-07-07 10:04:17'),
(97, 28, 'CV generator', 'A CV generator.', '2020-07-07 10:04:17', '2020-07-07 10:04:17'),
(98, 28, 'Hostel', 'A hostel management project .', '2020-07-07 10:04:17', '2020-07-07 10:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(25,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `card`, `zip`, `gender`, `price`, `created_at`, `updated_at`) VALUES
(44, 28, 'Noah', 'dummy@gmail.com', '01533609794', 'Dhaka', '4111111111111', '1500', 'male', '10800.00', '2020-07-06 02:49:40', '2020-07-06 02:49:40'),
(45, 27, 'Abdullah Al Hassan', 'hacked@fooled.com', '01400332371', 'Begunbari, Mymensingh', '4211111111111119', '65210', 'male', '12000.00', '2020-07-06 02:55:26', '2020-07-06 02:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(84, 31, 'a', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12'),
(85, 27, 'Programming', 'C, C++.', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(86, 27, 'Language', 'Bangla, English.', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(87, 27, 'Other', 'Sports.', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(88, 28, 'Programming', 'C, C++.', '2020-07-07 10:04:17', '2020-07-07 10:04:17'),
(89, 28, 'Language', 'Bangla, English.', '2020-07-07 10:04:17', '2020-07-07 10:04:17'),
(90, 28, 'Other', 'Sports.', '2020-07-07 10:04:17', '2020-07-07 10:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `social_logins`
--

CREATE TABLE `social_logins` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_logins`
--

INSERT INTO `social_logins` (`user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(12, '651820022071481', 'facebook', '2020-07-01 02:27:06', '2020-07-01 02:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PostalCode` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `CustomerName`, `Address`, `City`, `PostalCode`, `Country`) VALUES
(1, 'X', 'something', 'dhaka', '1200', 'Bangladesh'),
(2, 'y', 'something1', 'ctg', '2200', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_id` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `linkedin_id`) VALUES
(27, 'ABDULLAH AL HOSSAIN 1404111', 'u1404111@student.cuet.ac.bd', 0, NULL, 'eyJpdiI6IjU5cnNDQnkyUWtvaFN1c0hsM0xCNlE9PSIsInZhbHVlIjoiUW1NMGg1R2VrZU5WMVdFS3cxcWNPZz09IiwibWFjIjoiYjA5OTdhNjExZTc1NDU3NTUyYjhkZjBhOTlmNTE4YzczMTdmNjRiZDc0MjI2OTdlZTE5YzIyOTI5MTE4MWUwOCJ9', NULL, '2020-07-04 01:29:23', '2020-07-04 01:29:23', '105899697363933211379', NULL),
(30, 'Abdullah Al Hossain', 'dummy@gmail.com', 0, NULL, '$2y$10$EHrNdkRjeTPkM5tRNJsj7uEe6T.gJZVdXwbcy5VOzLx4hUk1VqPXq', NULL, '2020-07-04 03:43:40', '2020-07-04 03:43:40', NULL, NULL),
(31, 'Hassan Jameel', 'hassan@gmail.com', 0, NULL, '$2y$10$lZJ5bYDCQxvh3UuHDayh6.F5mIxojlzhOwX9LnG.DY3hanG4MSDOm', NULL, '2020-07-04 05:50:32', '2020-07-04 05:50:32', NULL, NULL),
(32, 'Noah Tak', 'admin@example.com', 1, NULL, '$2y$10$EHrNdkRjeTPkM5tRNJsj7uEe6T.gJZVdXwbcy5VOzLx4hUk1VqPXq', NULL, '2020-07-06 11:32:53', '2020-07-06 11:32:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` int(11) NOT NULL,
  `bidder_id` bigint(20) NOT NULL,
  `auction_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`id`, `bidder_id`, `auction_id`, `created_at`, `updated_at`) VALUES
(11, 81, 6, '2020-07-08 16:45:00', '2020-07-08 16:45:00'),
(12, 85, 9, '2020-07-08 17:20:00', '2020-07-08 17:20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auctions_product_id_index` (`product_id`);

--
-- Indexes for table `bidders`
--
ALTER TABLE `bidders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidders_auction_id_user_id_index` (`auction_id`,`user_id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debts`
--
ALTER TABLE `debts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `debts_query_id_foreign` (`query_id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidder_id` (`bidder_id`),
  ADD KEY `auction_id` (`auction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bidders`
--
ALTER TABLE `bidders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `debts`
--
ALTER TABLE `debts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `debts`
--
ALTER TABLE `debts`
  ADD CONSTRAINT `debts_query_id_foreign` FOREIGN KEY (`query_id`) REFERENCES `queries` (`id`);

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
