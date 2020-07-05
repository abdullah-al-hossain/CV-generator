-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 05:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv`
--

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
(26, 27, 'Noah', 'Naomohol Buchapul 83/C, Mymensingh', 'u1404111@student.cuet.ac.bd', '01533609794, 01400332371', '1593853215.png', 'Some career objective . . .', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(35, 28, 'Noah', 'Naomohol Buchapul 83/C, Mymensingh', 'u1404111@student.cuet.ac.bd', '01533609794, 01400332371', '1593859240.png', 'To secure a challenging position in a reputable organization to expand my learning, knowledge, and skills. Secure a responsible career opportunity to fully utilize my training and skills, while making a significant contribution to the success of the company.', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
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
(52, 31, 'Noah', 'Dhaka', 'dummy@gmail.com', '01533609794', '1593864672.png', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12');

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
(66, 27, 'MZS', 'SSC', '5.0', '2012', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(67, 27, 'NDC', 'HSC', '5.0', '2014', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(68, 27, 'CUET', 'BSc', '2.0', '2019', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(93, 28, 'MZS', 'SSC', '5.0', '2012', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
(94, 28, 'NDC', 'HSC', '5.0', '2014', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
(95, 28, 'CUET', 'BSc', '2.0', '2019', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
(96, 31, 'a', 'a', 'a', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12');

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
(9, '2020_07_01_084029_add_google_id_column', 3);

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
(60, 27, 'Ecommerce', 'This is one of my new Projects.', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(61, 27, 'CV generator', 'A CV generator.', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(62, 27, 'Hostel', 'A hostel management project .', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(87, 28, 'Ecommerce', 'This is one of my new Projects.', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
(88, 28, 'CV generator', 'A CV generator.', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
(89, 28, 'Hostel', 'A hostel management project .', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
(90, 31, 'a', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12'),
(91, 31, 'a', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12'),
(92, 31, 'adsf', 'asdf', '2020-07-04 06:11:12', '2020-07-04 06:11:12');

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
(54, 27, 'Programming', 'C, C++.', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(55, 27, 'Language', 'Bangla, English.', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(56, 27, 'Other', 'Sports.', '2020-07-04 03:41:06', '2020-07-04 03:41:06'),
(81, 28, 'Programming', 'C, C++.', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
(82, 28, 'Language', 'Bangla, English.', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
(83, 28, 'Other', 'Sports.', '2020-07-04 05:24:52', '2020-07-04 05:24:52'),
(84, 31, 'a', 'a', '2020-07-04 06:11:12', '2020-07-04 06:11:12');

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
(28, 'Hridoy Khan Hilaali', 'hello2441139abcd@gmail.com', 0, NULL, '$2y$10$yWEV4Hz5knewiYoIgpU4yOdHuANMerlEsZNCGxtBce4b12HwOZfhe', NULL, '2020-07-04 01:39:15', '2020-07-04 01:39:15', NULL, NULL),
(30, 'Abdullah Al Hossain', 'dummy@gmail.com', 0, NULL, '$2y$10$lKKxgnzFQWSsN8Q1SS.ONuKPxzkUN.OCwJHAS92.0exiMdzVSqBzi', NULL, '2020-07-04 03:43:40', '2020-07-04 03:43:40', NULL, NULL),
(31, 'Hassan Jameel', 'hassan@gmail.com', 0, NULL, '$2y$10$lZJ5bYDCQxvh3UuHDayh6.F5mIxojlzhOwX9LnG.DY3hanG4MSDOm', NULL, '2020-07-04 05:50:32', '2020-07-04 05:50:32', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

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
