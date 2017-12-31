-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 07:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'Web Development', NULL, '2017-11-13 00:55:21', '2017-11-13 00:55:21'),
(2, 0, 'Mobile Development', NULL, '2017-11-13 00:55:29', '2017-11-13 00:55:29'),
(3, 0, 'ios', NULL, '2017-12-23 10:16:09', '2017-12-23 10:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(255) NOT NULL,
  `job_type` tinyint(4) NOT NULL,
  `job_title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` decimal(8,2) NOT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fl_number` int(11) NOT NULL,
  `job_skills` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_level` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_duration` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_time` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_questions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_cover_letter` tinyint(4) NOT NULL DEFAULT '0',
  `job_boost` tinyint(4) NOT NULL DEFAULT '0',
  `is_draft` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `user_id`, `category_id`, `job_type`, `job_title`, `budget`, `job_description`, `project_type`, `fl_number`, `job_skills`, `experience_level`, `job_duration`, `job_time`, `job_questions`, `job_cover_letter`, `job_boost`, `is_draft`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 'Htaccess', '30.00', 'Expert HTaccess needed', '1', 1, 'PHP, Apache', '2', '3', '2', 's:72:\"a:3:{i:0;s:10:\"Question 1\";i:1;s:10:\"Question 2\";i:2;s:10:\"Question 3\";}\";', 1, 0, 0, 1, '2017-11-13 00:57:34', '2017-11-13 03:01:02'),
(2, 1, 0, 1, 'Wordpress', '200.00', 'test', '1', 1, 'PHP', '2', '3', '2', 'a:4:{i:0;s:10:\"question 2\";i:1;s:10:\"question 3\";i:2;s:10:\"question 4\";i:3;s:13:\"Test question\";}', 1, 0, 0, 1, '2017-11-13 03:16:57', '2017-11-13 03:37:59'),
(3, 1, 0, 2, 'Fullstack PHP developer', '500.00', 'Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description', '2', 1, 'PHP, Apache', '1', '2', '2', 'a:3:{i:0;s:10:\"question 1\";i:1;s:10:\"Question 2\";i:2;s:10:\"Question 3\";}', 1, 0, 0, 1, '2017-11-13 03:39:43', '2017-11-13 03:39:43'),
(4, 2, 0, 1, 'TEST JOB', '200.00', 'TEST DESC', '1', 1, 'PHP MYSQL', '3', '4', '3', 'a:3:{i:0;s:10:\"question 3\";i:1;s:10:\"question 4\";i:2;s:10:\"question 6\";}', 1, 0, 0, 1, '2017-11-15 11:15:13', '2017-11-15 11:15:13'),
(5, 2, 0, 1, 'TEST JOB', '100.00', 'TEST DESCriptoin TEST DESCriptoin TEST DESCriptoin TEST DESCriptoin \r\nTEST DESCriptoin TEST DESCriptoin \r\nTEST DESCriptoin TEST DESCriptoin', '1', 2, 'PHP, MYSQL', '1', '1', '1', 'a:5:{i:0;s:10:\"question 3\";i:1;s:10:\"question 6\";i:2;s:10:\"question 3\";i:3;s:10:\"question 6\";i:4;s:10:\"question 3\";}', 1, 0, 0, 1, '2017-11-15 12:22:54', '2017-11-22 20:12:57'),
(6, 2, 0, 1, 'PHP Job', '200.00', 'Example job', '1', 2, 'PHP Expert', '2', '5', '3', 'a:3:{i:0;s:10:\"question 3\";i:1;s:10:\"question 6\";i:2;s:10:\"question 4\";}', 1, 0, 0, 1, '2017-11-15 12:33:14', '2017-11-15 12:33:14'),
(7, 3, 0, 1, 'test job', '25.00', 'dfgsfgsdf', '1', 1, 'html', '2', '1', '3', 'a:3:{i:0;s:11:\"adfasdfasdf\";i:1;s:10:\"sdfsfsdfsd\";i:2;s:9:\"ertertert\";}', 1, 1, 0, 1, '2017-12-21 10:16:07', '2017-12-21 10:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login activity`
--

CREATE TABLE `login activity` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `login_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_resets_table', 1),
(34, '2017_10_03_133917_create_freelancer_profiles_table', 1),
(35, '2017_10_03_155049_create_languages_table', 1),
(36, '2017_10_03_160851_create_profetional_skills_table', 1),
(37, '2017_10_03_171512_create_categories_table', 1),
(38, '2017_10_09_133630_create_user_languages_table', 1),
(39, '2017_10_13_092215_create_table_portfolios', 1),
(40, '2017_10_14_083832_create_table_user_education', 1),
(41, '2017_11_06_042305_create_jobs_table', 1),
(42, '2017_11_09_105922_create_proposals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `old_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `portfolio_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_overview` text COLLATE utf8mb4_unicode_ci,
  `thumb_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_file` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `project_url` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completion_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profetionls`
--

CREATE TABLE `profetionls` (
  `profetional_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profetionls`
--

INSERT INTO `profetionls` (`profetional_id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'HTML', NULL, '2017-11-15 11:50:36', '2017-11-15 11:50:36'),
(2, 2, 'new profetain vdfge', 'swertvertgrthysr', '2017-12-23 10:15:32', '2017-12-23 10:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `proposal_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_amount` decimal(8,0) NOT NULL,
  `pay_amount` decimal(8,0) NOT NULL,
  `cover_letter` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_ans` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_file` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`proposal_id`, `job_id`, `user_id`, `bid_amount`, `pay_amount`, `cover_letter`, `question_ans`, `duration`, `attachment_file`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '500', '488', 'Test Cover letter', 'a:3:{i:0;s:10:\"question 1\";i:1;s:10:\"question 1\";i:2;s:10:\"question 1\";}', 'Less then a month', '0', '2017-11-13 03:55:25', '2017-11-13 03:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'freelancer',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `last_name`, `username`, `user_role`, `email`, `password`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Shariful', 'Islam', NULL, '0', 'sirony25@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'jydzkZB8RuoohVNuMLKKzhTp7fQ1G4wZC6vzUpLx4Oh9iaD6le39PiOzMc6i', '2017-11-13 00:54:53', '2017-11-13 00:54:53'),
(2, 'Shariful', 'Islam', NULL, 'client', 'client@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4CeODoHTlN65eoHwJnuQyavjOE8kNcGO2OCzbyilzPmBevNI4MsQWQDZMZtu', '2017-11-13 00:54:53', '2017-11-13 00:54:53'),
(3, 'Shariful', 'Islam', NULL, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4CeODoHTlN65eoHwJnuQyavjOE8kNcGO2OCzbyilzPmBevNI4MsQWQDZMZtu', '2017-11-13 00:54:53', '2017-11-13 00:54:53'),
(4, 'Rofiqul', 'Islam', NULL, '0', 'colourrocky989@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2017-11-14 20:05:01', '2017-11-14 20:05:01'),
(5, 'Client', 'Shariful', NULL, '0', 'shariful_client@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(7, 'Client', 'Shariful', NULL, 'freelancer', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(8, 'abdullah', 'belal', NULL, '0', 'belal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(9, 'Amit', 'Gautam', NULL, '0', 'amitgautam31@gmail.com', '68b81745d70772cb61d5a3ae328620d1', NULL, NULL, NULL),
(10, 'Ismail', 'Hossen', NULL, '0', 'ismail13hossen@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `school` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `degree` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_of_study` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_languages`
--

CREATE TABLE `user_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `lang_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_skill` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_languages`
--

INSERT INTO `user_languages` (`id`, `user_id`, `lang_name`, `lang_skill`, `created_at`, `updated_at`) VALUES
(1, 8, 'English', 'Fluent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourly_rate` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profetional_skills` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci,
  `availability` int(11) DEFAULT NULL,
  `availability_type` int(11) DEFAULT NULL,
  `not_available_text` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `job_title`, `country`, `city`, `timezone`, `hourly_rate`, `profetional_skills`, `overview`, `availability`, `availability_type`, `not_available_text`, `created_at`, `updated_at`) VALUES
(1, 8, 'Senior PHP ghh', NULL, NULL, NULL, NULL, NULL, 'ghghghg', NULL, NULL, NULL, NULL, NULL),
(2, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login activity`
--
ALTER TABLE `login activity`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user` (`user_id`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `password_resets_email_index` (`email`(250)),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`portfolio_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `portfolio_id` (`portfolio_id`);

--
-- Indexes for table `profetionls`
--
ALTER TABLE `profetionls`
  ADD PRIMARY KEY (`profetional_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `profetional_id` (`profetional_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`proposal_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `proposal_id` (`proposal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_languages`
--
ALTER TABLE `user_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login activity`
--
ALTER TABLE `login activity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `portfolio_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profetionls`
--
ALTER TABLE `profetionls`
  MODIFY `profetional_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `proposal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_languages`
--
ALTER TABLE `user_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
