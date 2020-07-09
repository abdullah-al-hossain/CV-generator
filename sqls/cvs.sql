-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 05:33 PM
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
(53, 27, 'Noah', 'Naomohol Buchapul 83/C, Mymensingh', 'u1404111@student.cuet.ac.bd', '01533609794, 01400332371', '1593932484.jpeg', 'Some career objective . . .', '2020-07-05 01:01:24', '2020-07-05 01:01:24'),
(54, 28, 'Noah', 'Naomohol Buchapul 83/C, Mymensingh', 'u1404111@student.cuet.ac.bd', '01533609794, 01400332371', '1593859240.png', 'To secure a challenging position in a reputable organization to expand my learning, knowledge, and skills. Secure a responsible career opportunity to fully utilize my training and skills, while making a significant contribution to the success of the company.', '2020-07-07 10:04:17', '2020-07-07 10:04:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
