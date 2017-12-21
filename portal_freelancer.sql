-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2017 at 10:25 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portal_freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'Web Development', NULL, '2017-11-13 00:55:21', '2017-11-13 00:55:21'),
(2, 0, 'Mobile Development', NULL, '2017-11-13 00:55:29', '2017-11-13 00:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_profiles`
--

CREATE TABLE IF NOT EXISTS `freelancer_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `freelancer_profiles`
--

INSERT INTO `freelancer_profiles` (`id`, `user_id`, `job_title`, `country`, `city`, `timezone`, `hourly_rate`, `profetional_skills`, `overview`, `availability`, `availability_type`, `not_available_text`, `created_at`, `updated_at`) VALUES
(1, 8, 'Senior PHP ghh', NULL, NULL, NULL, NULL, NULL, 'ghghghg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `category`, `job_type`, `job_title`, `budget`, `job_description`, `project_type`, `fl_number`, `job_skills`, `experience_level`, `job_duration`, `job_time`, `job_questions`, `job_cover_letter`, `job_boost`, `is_draft`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development', 1, 'Htaccess', '30.00', 'Expert HTaccess needed', '1', 1, 'PHP, Apache', '2', '3', '2', 's:72:"a:3:{i:0;s:10:"Question 1";i:1;s:10:"Question 2";i:2;s:10:"Question 3";}";', 1, 0, 0, 1, '2017-11-13 00:57:34', '2017-11-13 03:01:02'),
(2, 1, 'Mobile Development', 1, 'Wordpress', '200.00', 'test', '1', 1, 'PHP', '2', '3', '2', 'a:4:{i:0;s:10:"question 2";i:1;s:10:"question 3";i:2;s:10:"question 4";i:3;s:13:"Test question";}', 1, 0, 0, 1, '2017-11-13 03:16:57', '2017-11-13 03:37:59'),
(3, 1, 'Web Development', 2, 'Fullstack PHP developer', '500.00', 'Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description Demo description', '2', 1, 'PHP, Apache', '1', '2', '2', 'a:3:{i:0;s:10:"question 1";i:1;s:10:"Question 2";i:2;s:10:"Question 3";}', 1, 0, 0, 1, '2017-11-13 03:39:43', '2017-11-13 03:39:43'),
(4, 2, 'Mobile Development', 1, 'TEST JOB', '200.00', 'TEST DESC', '1', 1, 'PHP MYSQL', '3', '4', '3', 'a:3:{i:0;s:10:"question 3";i:1;s:10:"question 4";i:2;s:10:"question 6";}', 1, 0, 0, 1, '2017-11-15 11:15:13', '2017-11-15 11:15:13'),
(5, 2, 'Mobile Development', 1, 'TEST JOB', '100.00', 'TEST DESCriptoin TEST DESCriptoin TEST DESCriptoin TEST DESCriptoin \r\nTEST DESCriptoin TEST DESCriptoin \r\nTEST DESCriptoin TEST DESCriptoin', '1', 2, 'PHP, MYSQL', '1', '1', '1', 'a:5:{i:0;s:10:"question 3";i:1;s:10:"question 6";i:2;s:10:"question 3";i:3;s:10:"question 6";i:4;s:10:"question 3";}', 1, 0, 0, 1, '2017-11-15 12:22:54', '2017-11-22 20:12:57'),
(6, 2, 'Web Development', 1, 'PHP Job', '200.00', 'Example job', '1', 2, 'PHP Expert', '2', '5', '3', 'a:3:{i:0;s:10:"question 3";i:1;s:10:"question 6";i:2;s:10:"question 4";}', 1, 0, 0, 1, '2017-11-15 12:33:14', '2017-11-15 12:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=43 ;

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

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profetionls`
--

CREATE TABLE IF NOT EXISTS `profetionls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profetionls`
--

INSERT INTO `profetionls` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'HTML', NULL, '2017-11-15 11:50:36', '2017-11-15 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE IF NOT EXISTS `proposals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_amount` decimal(8,0) NOT NULL,
  `pay_amount` decimal(8,0) NOT NULL,
  `cover_letter` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_ans` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_file` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `job_id`, `user_id`, `bid_amount`, `pay_amount`, `cover_letter`, `question_ans`, `duration`, `attachment_file`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '500', '488', 'Test Cover letter', 'a:3:{i:0;s:10:"question 1";i:1;s:10:"question 1";i:2;s:10:"question 1";}', 'Less then a month', '0', '2017-11-13 03:55:25', '2017-11-13 03:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'freelancer',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `username`, `user_type`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shariful', 'Islam', NULL, 'freelancer', 'sirony25@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'jydzkZB8RuoohVNuMLKKzhTp7fQ1G4wZC6vzUpLx4Oh9iaD6le39PiOzMc6i', '2017-11-13 00:54:53', '2017-11-13 00:54:53'),
(2, 'Shariful', 'Islam', NULL, 'client', 'client@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4CeODoHTlN65eoHwJnuQyavjOE8kNcGO2OCzbyilzPmBevNI4MsQWQDZMZtu', '2017-11-13 00:54:53', '2017-11-13 00:54:53'),
(3, 'Shariful', 'Islam', NULL, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4CeODoHTlN65eoHwJnuQyavjOE8kNcGO2OCzbyilzPmBevNI4MsQWQDZMZtu', '2017-11-13 00:54:53', '2017-11-13 00:54:53'),
(4, 'Rofiqul', 'Islam', NULL, 'freelancer', 'colourrocky989@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2017-11-14 20:05:01', '2017-11-14 20:05:01'),
(5, 'Client', 'Shariful', NULL, 'client', 'shariful_client@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(7, 'Client', 'Shariful', NULL, 'client', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(8, 'abdullah', 'belal', NULL, 'freelancer', 'belal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL),
(9, 'Amit', 'Gautam', NULL, 'client', 'amitgautam31@gmail.com', '68b81745d70772cb61d5a3ae328620d1', NULL, NULL, NULL),
(10, 'Ismail', 'Hossen', NULL, 'client', 'ismail13hossen@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE IF NOT EXISTS `user_education` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `school` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `degree` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_of_study` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_languages`
--

CREATE TABLE IF NOT EXISTS `user_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lang_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_skill` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_languages`
--

INSERT INTO `user_languages` (`id`, `user_id`, `lang_name`, `lang_skill`, `created_at`, `updated_at`) VALUES
(1, 8, 'English', 'Fluent', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
