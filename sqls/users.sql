-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 05:34 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
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
(28, 'Hridoy Khan Hilaali', 'hello2441139abcd@gmail.com', 1, NULL, '$2y$10$yWEV4Hz5knewiYoIgpU4yOdHuANMerlEsZNCGxtBce4b12HwOZfhe', NULL, '2020-07-04 01:39:15', '2020-07-04 01:39:15', NULL, NULL),
(30, 'Abdullah Al Hossain', 'dummy@gmail.com', 0, NULL, '$2y$10$lKKxgnzFQWSsN8Q1SS.ONuKPxzkUN.OCwJHAS92.0exiMdzVSqBzi', NULL, '2020-07-04 03:43:40', '2020-07-04 03:43:40', NULL, NULL),
(31, 'Hassan Jameel', 'hassan@gmail.com', 0, NULL, '$2y$10$lZJ5bYDCQxvh3UuHDayh6.F5mIxojlzhOwX9LnG.DY3hanG4MSDOm', NULL, '2020-07-04 05:50:32', '2020-07-04 05:50:32', NULL, NULL),
(32, 'Noah Tak', 'hello2441139@gmail.com', 1, NULL, '$2y$10$EHrNdkRjeTPkM5tRNJsj7uEe6T.gJZVdXwbcy5VOzLx4hUk1VqPXq', NULL, '2020-07-06 11:32:53', '2020-07-06 11:32:53', NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
