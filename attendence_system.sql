-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 06:36 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendence_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `date` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`id`, `user_id`, `course_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 4, 23, NULL, NULL, NULL),
(2, 4, 23, NULL, NULL, NULL),
(3, 4, 23, NULL, NULL, NULL),
(6, 5, 23, NULL, NULL, NULL),
(7, 5, 25, NULL, NULL, NULL),
(8, 4, 43, NULL, '2018-08-13 10:20:45', '2018-08-13 10:20:45'),
(9, 4, 43, NULL, '2018-08-13 10:20:59', '2018-08-13 10:20:59'),
(12, 5, 24, NULL, '2018-08-13 10:29:45', '2018-08-13 10:29:45'),
(13, 5, 24, NULL, '2018-08-13 10:29:48', '2018-08-13 10:29:48'),
(14, 4, 24, NULL, '2018-08-13 10:34:26', '2018-08-13 10:34:26'),
(15, 4, 24, NULL, '2018-08-13 10:34:28', '2018-08-13 10:34:28'),
(16, 5, 24, NULL, '2018-08-13 10:34:48', '2018-08-13 10:34:48'),
(17, 5, 23, NULL, '2018-09-05 00:08:50', '2018-09-05 00:08:50'),
(18, 4, 24, NULL, '2018-09-10 00:06:27', '2018-09-10 00:06:27'),
(19, 4, 24, NULL, '2018-09-10 01:27:06', '2018-09-10 01:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `course_code`, `session`, `semester`, `teacher_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(23, NULL, 'CSE-201', 2014, '4/1', 7, NULL, NULL, '2018-08-11 23:00:54', '2018-08-11 23:00:54'),
(24, NULL, 'CSE-202', 2014, '4/1', 7, NULL, NULL, '2018-08-11 23:00:54', '2018-08-11 23:00:54'),
(25, NULL, 'CSE-203', 2014, '4/1', 7, NULL, NULL, '2018-08-11 23:00:54', '2018-08-11 23:00:54'),
(26, NULL, 'CSE-204', 2014, '4/1', 7, NULL, NULL, '2018-08-11 23:00:54', '2018-08-11 23:00:54'),
(27, NULL, 'CSE-205', 2014, '4/1', 7, NULL, NULL, '2018-08-11 23:00:54', '2018-08-11 23:00:54'),
(28, NULL, 'CSE-206', 2014, '4/1', 8, NULL, NULL, '2018-08-11 23:00:55', '2018-08-11 23:00:55'),
(29, NULL, 'CSE-207', 2014, '4/1', 8, NULL, NULL, '2018-08-11 23:00:55', '2018-08-11 23:00:55'),
(30, NULL, 'CSE-208', 2014, '4/1', 8, NULL, NULL, '2018-08-11 23:00:55', '2018-08-11 23:00:55'),
(31, NULL, 'CSE-209', 2014, '4/1', 8, NULL, NULL, '2018-08-11 23:00:55', '2018-08-11 23:00:55'),
(32, NULL, 'CSE-210', 2014, '4/1', 8, NULL, NULL, '2018-08-11 23:00:55', '2018-08-11 23:00:55'),
(33, NULL, 'CSE-301', 2013, '4/2', 7, NULL, NULL, '2018-08-11 23:00:55', '2018-08-11 23:00:55'),
(34, NULL, 'CSE-302', 2013, '4/2', 7, NULL, NULL, '2018-08-11 23:00:56', '2018-08-11 23:00:56'),
(35, NULL, 'CSE-303', 2013, '4/2', 7, NULL, NULL, '2018-08-11 23:00:56', '2018-08-11 23:00:56'),
(36, NULL, 'CSE-304', 2013, '4/2', 7, NULL, NULL, '2018-08-11 23:00:56', '2018-08-11 23:00:56'),
(37, NULL, 'CSE-305', 2013, '4/2', 7, NULL, NULL, '2018-08-11 23:00:56', '2018-08-11 23:00:56'),
(38, NULL, 'CSE-306', 2013, '4/2', 8, NULL, NULL, '2018-08-11 23:00:56', '2018-08-11 23:00:56'),
(39, NULL, 'CSE-307', 2013, '4/2', 8, NULL, NULL, '2018-08-11 23:00:56', '2018-08-11 23:00:56'),
(40, NULL, 'CSE-308', 2013, '4/2', 8, NULL, NULL, '2018-08-11 23:00:56', '2018-08-11 23:00:56'),
(41, NULL, 'CSE-309', 2013, '4/2', 8, NULL, NULL, '2018-08-11 23:00:57', '2018-08-11 23:00:57'),
(42, NULL, 'CSE-310', 2013, '4/2', 8, NULL, NULL, '2018-08-11 23:00:57', '2018-08-11 23:00:57'),
(43, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2018-08-13 05:25:55', '2018-08-13 05:25:55');

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
(3, '2017_09_22_143449_create_permission_tables', 1),
(4, '2017_09_26_110837_create_user_infos_table', 1),
(5, '2018_02_07_133259_create_courses_table', 1),
(6, '2018_03_24_143753_create_uploads_table', 1),
(7, '2018_04_09_112632_create_pictures_table', 1),
(8, '2018_04_12_104143_create_temp_files_table', 1),
(9, '2018_07_02_112853_create_attendences_table', 1),
(10, '2018_07_16_161425_create_routines_table', 1),
(11, '2019_01_21_062736_create_tests_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(3, 4, 'App\\Models\\User'),
(3, 5, 'App\\Models\\User'),
(2, 7, 'App\\Models\\User'),
(2, 8, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2018-08-04 00:40:45', '2018-08-04 00:40:45'),
(2, 'teacher', 'web', '2018-08-04 00:40:45', '2018-08-04 00:40:45'),
(3, 'student', 'web', '2018-08-04 00:40:45', '2018-08-04 00:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `course_id`, `start_time`, `end_time`, `day`, `room`, `created_at`, `updated_at`) VALUES
(1, 23, '09:00:00', '10:00:00', 'Sunday', '331', '2018-08-13 05:25:52', '2018-08-13 05:25:53'),
(2, 24, '09:00:00', '10:00:00', 'Monday', '331', '2018-08-13 05:25:53', '2018-08-13 05:25:53'),
(3, 25, '09:00:00', '10:00:00', 'Tuesday', '331', '2018-08-13 05:25:53', '2018-08-13 05:25:53'),
(4, 26, '09:00:00', '10:00:00', 'Wednesday', '331', '2018-08-13 05:25:53', '2018-08-13 05:25:53'),
(5, 27, '09:00:00', '10:00:00', 'thirsday', '331', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(6, 28, '10:00:00', '11:00:00', 'Sunday', '331', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(7, 29, '10:00:00', '11:00:00', 'Monday', '331', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(8, 30, '10:00:00', '11:00:00', 'Tuesday', '331', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(9, 31, '11:00:00', '00:00:00', 'Sunday', '331', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(10, 32, '11:00:00', '00:00:00', 'Monday', '331', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(11, 33, '09:00:00', '10:00:00', 'Sunday', '332', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(12, 34, '09:00:00', '10:00:00', 'Monday', '332', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(13, 35, '09:00:00', '10:00:00', 'Tuesday', '332', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(14, 36, '09:00:00', '10:00:00', 'Wednesday', '332', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(15, 37, '09:00:00', '10:00:00', 'thirsday', '332', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(16, 38, '10:00:00', '11:00:00', 'Sunday', '332', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(17, 39, '10:00:00', '11:00:00', 'Monday', '332', '2018-08-13 05:25:54', '2018-08-13 05:25:54'),
(18, 40, '10:00:00', '11:00:00', 'Tuesday', '332', '2018-08-13 05:25:55', '2018-08-13 05:25:55'),
(19, 41, '11:00:00', '00:00:00', 'Sunday', '332', '2018-08-13 05:25:55', '2018-08-13 05:25:55'),
(20, 42, '11:00:00', '00:00:00', 'Monday', '332', '2018-08-13 05:25:55', '2018-08-13 05:25:55'),
(21, 43, '00:00:00', '00:00:00', NULL, NULL, '2018-08-13 05:25:55', '2018-08-13 05:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `temp_files`
--

CREATE TABLE `temp_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `reg_no`, `created_at`, `updated_at`) VALUES
(1, '999', '2019-01-21 00:34:13', '2019-01-21 00:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `resized_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$7UeVXW5hqxk5q4E2llHnyO4RKhHJXZd2iplBijbiZpQGUvSoaPKry', 'o8dzzHLUckloXQ4fxINwINkQQJ7RFUEQt4tOlZcCcVOgMsjKVL8XGaMq2ZVq', '2018-08-04 00:40:46', '2018-08-04 00:40:46'),
(2, 'user', 'ta@gmail.com', '$2y$10$0pa8LPCAikGInScuU7xk8eeixzkzfcEk3cO3TKPx2xDKrMi/CGVca', 'kowQcRlpcOujXMhiBpAs7TGWIu4z77zNRpHIVOtUsf6TViuRDIrNAb1MWBEq', '2018-08-04 00:40:46', '2018-08-04 00:40:46'),
(4, NULL, 'hasan@gmail.com', '$2y$10$8D8qoHh95BbkzLoRGwiavO2HvXzXTtVIZkK1RBfgdVxpwr2YSvw8.', NULL, '2018-08-04 00:50:31', '2018-08-04 00:50:31'),
(5, NULL, 'motaher@gmail.com', '$2y$10$sVH5CiV3nB3zEjpJM12/A.DWKe/XSJCicY96QAbLCOD8fgFAYooeq', NULL, '2018-08-04 00:51:10', '2018-08-04 00:51:10'),
(7, 'AI', 'arif@gmail.com', '$2y$10$Fjoi32JiV6XLHVdz7HjeSOOIiOWKA6DqMYjjJss2GrPxlUUakTDqK', NULL, '2018-08-04 00:53:38', '2018-08-04 00:53:38'),
(8, 'SAS', 'sayem@gmail.com', '$2y$10$lrzKyFsWdKlMbZAFT88ADeJkH0gZyT1WuLmWjFkppsigtPZ1eWCLW', NULL, '2018-08-04 00:56:30', '2018-08-04 00:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `regid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `name`, `phone`, `image`, `photo`, `status`, `session`, `regid`, `created_at`, `updated_at`) VALUES
(2, 4, 'Md. Hasan', '01925010901', 0, NULL, 'student', 2014, '2014331069', '2018-08-04 00:50:31', '2018-08-04 02:15:55'),
(3, 5, 'Md. Motaher Hossain', '01721548043', 0, NULL, 'student', 2014, '2014331013', '2018-08-04 00:51:10', '2018-08-04 02:22:53'),
(5, 7, 'Ariful Islam', '0821-713491', 0, NULL, 'teacher', NULL, NULL, '2018-08-04 00:53:39', '2018-08-04 00:53:39'),
(6, 8, 'Shehab Ahmed Sayem', '01925010901', 0, NULL, 'teacher', NULL, NULL, '2018-08-04 00:56:30', '2018-08-04 00:56:30'),
(8, 1, 'Admin', '0000000', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 2, 'User', '0000000', 0, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendences_user_id_foreign` (`user_id`),
  ADD KEY `attendences_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routines_course_id_foreign` (`course_id`);

--
-- Indexes for table `temp_files`
--
ALTER TABLE `temp_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_infos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `temp_files`
--
ALTER TABLE `temp_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendences`
--
ALTER TABLE `attendences`
  ADD CONSTRAINT `attendences_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `routines`
--
ALTER TABLE `routines`
  ADD CONSTRAINT `routines_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD CONSTRAINT `user_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
