-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 03:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taraikhabar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mobile`, `role_id`, `email`, `password`, `designation`, `address`, `dob`, `join_date`, `salary`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'तराई खबर', '9851198830', 1, 'info@admin.com', '$2y$10$1G0sVBb9GX5LgLgDJ3L5w.PnM6WG1ILQu/iF/S0U4VYT9OrEVlpvi', 'Admin', '', '2022-2-22', NULL, NULL, '', 1, NULL, NULL, NULL, '2022-10-17 03:51:57'),
(5, 'ज्ञानेन्द्र यादव', '9849182629', 2, 'gyanendra.contact@gmail.com', '$2y$10$SuJJ86eArO0nNvOk9/JRuefCDmEuOBogo16DJFaKHSluwb/y6wngC', 'Admin', 'काठमाडौं, नेपाल', NULL, '10/17/2022', NULL, NULL, 1, NULL, NULL, '2022-08-30 11:25:39', '2022-10-17 03:54:35'),
(8, 'Shreenarayan Mahato', '9840114722', 4, 'shreenarayan@taraikhabar.com', '$2y$10$4r7CzXXxn9w5xxW3H2nGk.0hrldDW6p4cQ6xiLAr1l65oQW70Yh/.', 'Reporter', 'Birgunj', NULL, '28th September 2022', NULL, NULL, 1, NULL, NULL, '2022-09-28 17:37:18', '2022-09-28 17:37:18'),
(9, 'Antu Kumari Yadav', '9813312185', 4, 'antuyadav.contact@gail.com', '$2y$10$Vp/9lnd9f2TJuxNui0BJOeIBW3/sQBWTamWZNRMpdIuX5DKqZHD2K', 'Reporter', 'Kathmandu, Nepal', NULL, '28th September 2022', NULL, NULL, 1, NULL, NULL, '2022-09-28 17:39:17', '2022-09-28 17:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bcategory_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 0,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `is_feature` tinyint(4) DEFAULT 0,
  `is_province` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `level`, `order_level`, `icon`, `meta_keywords`, `meta_descriptions`, `status`, `is_feature`, `is_province`, `created_at`, `updated_at`) VALUES
(1, 'समाचार', 'समाचार', 0, 0, 2, NULL, 'समाचार', 'समाचार', 1, 0, 0, '2022-09-09 00:51:10', '2022-09-09 01:05:25'),
(2, 'अदालत/प्रशासन', 'अदालत-प्रशासन', 1, 1, 0, NULL, 'अदालत/प्रशासन', 'अदालत/प्रशासन', 1, 0, 0, '2022-09-09 00:54:16', '2022-09-09 00:54:16'),
(3, 'सुरक्षा/अपराध', 'सुरक्षा-अपराध', 1, 1, 0, NULL, 'सुरक्षा/अपराध', 'सुरक्षा/अपराध', 1, 0, 0, '2022-09-09 00:54:38', '2022-09-09 00:54:38'),
(4, 'हेडलाइन', 'हेडलाइन', 1, 1, 0, NULL, 'हेडलाइन', 'हेडलाइन', 1, 0, 0, '2022-09-09 00:54:54', '2022-09-09 00:54:54'),
(5, 'राजनीति', 'राजनीति', 0, 0, 3, NULL, 'राजनीति', 'राजनीति', 1, 0, 0, '2022-09-09 00:55:32', '2022-09-09 00:55:54'),
(6, 'प्रदेश', 'प्रदेश', 0, 0, 4, NULL, 'प्रदेश', 'प्रदेश', 1, 0, 0, '2022-09-09 00:56:04', '2022-09-09 00:56:04'),
(7, 'प्रदेश १', 'प्रदेश-१', 6, 1, 0, NULL, 'प्रदेश १', 'प्रदेश १', 1, 0, 0, '2022-09-09 00:56:21', '2022-09-09 00:56:21'),
(8, 'मधेस प्रदेश', 'मधेस-प्रदेश', 6, 1, 0, NULL, 'मधेस प्रदेश', 'मधेस प्रदेश', 1, 0, 0, '2022-09-09 00:56:34', '2022-09-09 00:56:34'),
(9, 'बागमती प्रदेश', 'बागमती-प्रदेश', 6, 1, 0, NULL, 'बागमती प्रदेश', 'बागमती प्रदेश', 1, 0, 0, '2022-09-09 00:56:48', '2022-09-09 00:56:48'),
(10, 'गण्डकी प्रदेश', 'गण्डकी-प्रदेश', 6, 1, 0, NULL, 'गण्डकी प्रदेश', 'गण्डकी प्रदेश', 1, 0, 0, '2022-09-09 00:57:13', '2022-09-09 00:57:13'),
(11, 'लुम्बिनी प्रदेश', 'लुम्बिनी-प्रदेश', 6, 1, 0, NULL, 'लुम्बिनी प्रदेश', 'लुम्बिनी प्रदेश', 1, 0, 0, '2022-09-09 00:57:26', '2022-09-09 00:57:26'),
(12, 'कर्णाली प्रदेश', 'कर्णाली-प्रदेश', 6, 1, 0, NULL, 'कर्णाली प्रदेश', 'कर्णाली प्रदेश', 1, 0, 0, '2022-09-09 00:57:37', '2022-09-09 00:57:37'),
(13, 'सुदूरपश्चिम प्रदेश', 'सुदूरपश्चिम-प्रदेश', 6, 1, 0, NULL, 'सुदूरपश्चिम प्रदेश', 'सुदूरपश्चिम प्रदेश', 1, 0, 0, '2022-09-09 00:57:49', '2022-09-09 00:57:49'),
(14, 'अर्थतन्त्र', 'अर्थतन्त्र', 0, 0, 5, NULL, 'अर्थतन्त्र', 'अर्थतन्त्र', 1, 0, 0, '2022-09-09 00:58:19', '2022-09-09 00:58:19'),
(15, 'अर्थ : अन्तरवार्ता', 'अर्थ-अन्तरवार्ता', 14, 1, 0, NULL, 'अर्थ : अन्तरवार्ता', 'अर्थ : अन्तरवार्ता', 1, 0, 0, '2022-09-09 00:58:47', '2022-09-09 00:58:47'),
(16, 'सेयर मार्केट', 'सेयर-मार्केट', 14, 1, 0, NULL, 'सेयर मार्केट', 'सेयर मार्केट', 1, 0, 0, '2022-09-09 00:58:59', '2022-09-09 00:58:59'),
(17, 'बैंक/बिमा', 'बैंक-बिमा', 14, 1, 0, NULL, 'बैंक/बिमा', 'बैंक/बिमा', 1, 0, 0, '2022-09-09 00:59:11', '2022-09-09 00:59:11'),
(18, 'कर्पोरेट', 'कर्पोरेट', 14, 1, 0, NULL, 'कर्पोरेट', 'कर्पोरेट', 1, 0, 0, '2022-09-09 00:59:22', '2022-09-09 00:59:22'),
(19, 'बजारमा नयाँ', 'बजारमा-नयाँ', 14, 1, 0, NULL, 'बजारमा नयाँ', 'बजारमा नयाँ', 1, 0, 0, '2022-09-09 00:59:34', '2022-09-09 00:59:34'),
(20, 'खेलकुद', 'खेलकुद', 0, 0, 6, NULL, 'खेलकुद', 'खेलकुद', 1, 0, 0, '2022-09-09 01:00:03', '2022-09-09 01:00:03'),
(21, 'मनोरन्जन', 'मनोरन्जन', 0, 0, 6, NULL, 'मनोरन्जन', 'मनोरन्जन', 1, 0, 0, '2022-09-09 01:00:16', '2022-09-09 01:00:16'),
(22, 'जीवनशैली', 'जीवनशैली', 0, 0, 7, NULL, 'जीवनशैली', 'जीवनशैली', 1, 0, 0, '2022-09-09 01:00:30', '2022-09-09 01:00:30'),
(23, 'अन्य', 'अन्य', 0, 0, 10, NULL, 'अन्य', 'अन्य', 1, 0, 0, '2022-09-09 01:01:28', '2022-09-09 01:01:28'),
(24, 'धर्म–संस्कृति/रीतिथिति', 'धर्म–संस्कृति-रीतिथिति', 23, 1, 7, NULL, 'धर्म–संस्कृति/रीतिथिति', 'धर्म–संस्कृति/रीतिथिति', 1, 0, 0, '2022-09-09 01:01:54', '2022-09-09 01:01:54'),
(25, 'अन्तरवार्ता', 'अन्तरवार्ता', 0, 0, 8, NULL, 'अन्तरवार्ता', 'अन्तरवार्ता', 1, 0, 0, '2022-09-09 01:02:13', '2022-09-09 01:02:13'),
(26, 'साहित्य', 'साहित्य', 23, 1, 0, NULL, 'साहित्य', 'साहित्य', 1, 0, 0, '2022-09-09 01:02:29', '2022-09-09 01:02:29'),
(27, 'पत्रपत्रिकाबाट', 'पत्रपत्रिकाबाट', 23, 1, 0, NULL, 'पत्रपत्रिकाबाट', 'पत्रपत्रिकाबाट', 1, 0, 0, '2022-09-09 01:02:42', '2022-09-09 01:02:42'),
(28, 'विश्व', 'विश्व', 23, 1, 0, NULL, 'विश्व', 'विश्व', 1, 0, 0, '2022-09-09 01:02:54', '2022-09-09 01:02:54'),
(29, 'रोचक', 'रोचक', 23, 1, 0, NULL, 'रोचक', 'रोचक', 1, 0, 0, '2022-09-09 01:03:07', '2022-09-09 01:03:07'),
(30, 'पर्यटन', 'पर्यटन', 0, 9, 0, NULL, 'पर्यटन', 'पर्यटन', 1, 0, 0, '2022-09-09 01:03:18', '2022-09-09 01:03:18'),
(31, 'प्रवास', 'प्रवास', 23, 1, 0, NULL, 'प्रवास', 'प्रवास', 1, 0, 0, '2022-09-09 01:03:31', '2022-09-09 01:03:31'),
(32, 'बालसंसार', 'बालसंसार', 23, 1, 0, NULL, 'बालसंसार', 'बालसंसार', 1, 0, 0, '2022-09-09 01:03:42', '2022-09-09 01:03:42'),
(33, 'मुख्य पाना', 'मुख्य-पाना', 0, 0, 1, NULL, 'मुख्य पाना', 'मुख्य पाना', 1, 0, 0, '2022-09-09 03:06:52', '2022-09-09 03:06:52'),
(34, 'तराई-खबर स्पेसल', 'तराई-खबर0स्पेसल', 0, 0, 9, NULL, 'तराई-खबर स्पेसल', 'तराई-खबर स्पेसल', 1, 0, 0, '2022-09-10 08:28:58', '2022-09-10 08:28:58'),
(35, 'विचार', 'विचार', 23, 1, 0, NULL, 'विचार', 'विचार', 1, 0, 0, '2022-09-10 08:35:43', '2022-09-10 08:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment_body`, `session_id`, `created_at`, `updated_at`) VALUES
(2, 1, 15, 'कृष्णसिंह बस्नेत लगायतसँग छलफलपछि जोशीको शरीर अध्ययनका लागि दिने सहमति भयो ।', NULL, '2022-11-04 04:13:27', '2022-11-04 04:13:27'),
(3, 1, 15, 'कृष्णसिंह बस्नेत लगायतसँग छलफलपछि जोशीको शरीर अध्ययनका लागि दिने सहमति भयो ।', NULL, '2022-11-04 04:13:42', '2022-11-04 04:13:42'),
(4, 1, 21, 'sdfds', NULL, '2022-11-07 16:26:20', '2022-11-07 16:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(10) UNSIGNED NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `views`, `created_at`, `updated_at`) VALUES
(1, 1517, '2022-09-03 09:25:03', '2022-11-12 14:45:15');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like_dislikes`
--

CREATE TABLE `like_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `like` smallint(6) NOT NULL DEFAULT 0,
  `dislike` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_dislikes`
--

INSERT INTO `like_dislikes` (`id`, `post_id`, `like`, `dislike`, `created_at`, `updated_at`) VALUES
(1, 21, 1, 0, '2022-11-07 16:17:53', '2022-11-07 16:17:53'),
(2, 21, 1, 0, '2022-11-07 16:18:07', '2022-11-07 16:18:07'),
(3, 21, 0, 1, '2022-11-07 16:18:15', '2022-11-07 16:18:15'),
(4, 21, 1, 0, '2022-11-07 16:40:35', '2022-11-07 16:40:35'),
(5, 21, 0, 1, '2022-11-07 16:41:36', '2022-11-07 16:41:36'),
(6, 21, 1, 0, '2022-11-07 16:42:41', '2022-11-07 16:42:41'),
(7, 21, 1, 0, '2022-11-07 16:43:00', '2022-11-07 16:43:00'),
(8, 21, 1, 0, '2022-11-07 16:48:19', '2022-11-07 16:48:19'),
(9, 21, 0, 1, '2022-11-07 16:48:22', '2022-11-07 16:48:22'),
(10, 3, 1, 0, '2022-11-07 18:41:15', '2022-11-07 18:41:15'),
(11, 21, 1, 0, '2022-11-12 12:28:09', '2022-11-12 12:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Setting', 1, '87293840-6f95-4cc4-a9de-49d44d438dde', 'logo', '9602', '9602.jpg', 'image/jpeg', 'public', 'public', 10392, '[]', '[]', '[]', '[]', 1, '2022-11-01 12:45:30', '2022-11-01 12:45:30'),
(2, 'App\\Models\\Setting', 1, 'bb6ea5d4-a066-4ce0-80fa-fad308602d1a', 'favicon', '55504', '55504.png', 'image/png', 'public', 'public', 2065, '[]', '[]', '[]', '[]', 2, '2022-11-01 12:45:30', '2022-11-01 12:45:30'),
(3, 'App\\Models\\Setting', 1, '0ed18b49-5b7e-4a47-8b54-6ddb15f34fd1', 'loader', '55504', '55504.png', 'image/png', 'public', 'public', 2065, '[]', '[]', '[]', '[]', 3, '2022-11-01 12:45:30', '2022-11-01 12:45:30'),
(4, 'App\\Models\\Setting', 1, '78fc5bf4-7b7c-46da-962b-23786544a787', 'login_background_image', '92055', '92055.jpg', 'image/jpeg', 'public', 'public', 151031, '[]', '[]', '[]', '[]', 4, '2022-11-01 12:45:31', '2022-11-01 12:45:31');

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
(9, '2022_08_27_144116_create_settings_table', 2),
(10, '2022_08_27_145151_create_admins_table', 2),
(11, '2022_08_27_145542_create_roles_table', 2),
(12, '2022_08_27_145635_create_permissions_table', 2),
(13, '2022_08_31_143005_create_categories_table', 3),
(14, '2022_09_01_013631_create_news_table', 4),
(16, '2022_09_02_024721_create_blogs_table', 6),
(20, '2022_09_03_060929_create_pages_table', 9),
(21, '2022_09_03_074233_create_advertisements_table', 10),
(22, '2022_09_03_092002_create_counters_table', 11),
(28, '2022_09_03_115959_create_sitemaps_table', 12),
(30, '2022_09_02_021844_create_blog_categories_table', 13),
(32, '2022_09_15_195734_create_media_table', 15),
(34, '2022_09_16_213418_create_category_news_table', 16),
(35, '2022_10_10_132148_create_news_categories_table', 17),
(36, '2022_09_02_150856_create_polls_table', 18),
(37, '2022_10_25_183902_create_newsletter_subscribes_table', 18),
(38, '2022_10_25_185132_create_jobs_table', 18),
(39, '2022_11_01_063430_create_tags_table', 19),
(41, '2022_11_01_205210_create_comments_table', 20),
(42, '2022_11_07_080240_create_like_dislikes_table', 21),
(43, '2022_11_01_063654_create_news_tags_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pradesh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `feature_image`, `banner_tags`, `short_description`, `description`, `pradesh`, `news_type`, `video_id`, `author_name`, `status`, `created_by`, `updated_by`, `view_count`, `meta_title`, `meta_keywords`, `meta_descriptions`, `created_at`, `updated_at`) VALUES
(1, 'कांग्रेस सुध्रियोस् भनेर बागीहरुलाई समर्थन गरेका हौं : शंकर पोखरेल', 'jpg_51352.jpg', NULL, '२६ असोज, काठमाडौं । नेकपा एमालेका महासचिव शंकर पोखरेलले कांग्रेसले कुनै विचार, सिद्धान्त बेगर गठबन्धन बनाउँदा त्यस दलका कार्यकर्ताहरुमा निराशा छाएकाले एमालेले उनीहरुलाई साथ दिएको बताएका छन् ।', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">२६ असोज, काठमाडौं । नेकपा एमालेका महासचिव शंकर पोखरेलले कांग्रेसले कुनै विचार, सिद्धान्त बेगर गठबन्धन बनाउँदा त्यस दलका कार्यकर्ताहरुमा निराशा छाएकाले एमालेले उनीहरुलाई साथ दिएको बताएका छन् ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">अनलाइनखबरसँग अन्तर्वार्ताका क्रममा महासचिव पोखरेलले कांग्रेसमा सुधार आओस् भनेर एमालेले उसका असन्तुष्ट उम्मेदवारहरुलाई साथ दिएको तर्क गरे ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories okam-device-desktop\" data-alias=\"single-inbetween-stories\" data-device-type=\"desktop\" style=\"display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\"><div class=\"okam-each-ad\" id=\"okam-ad-1092\" data-verification=\"02814079062f19c7cf2e8c60c72ca3d6\" style=\"margin-bottom: 15px;\"><a href=\"https://tvsnepal.com/dashain/form\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/3AF5EEDF-04F6-457C-93AE-2B267187ED0D.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-998\" data-verification=\"e23928c2755b024b0411a57c6e3e87bf\" style=\"margin-bottom: 15px;\"><a href=\"https://globalimebank.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/03/250x2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-82\" data-verification=\"75745be58dda84fba811fcfd336a2bd5\" style=\"margin-bottom: 0px;\"><a href=\"https://bit.ly/3Dahbt6\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/250X2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">‘कांग्रेस पुरानो र एमालेसँग प्रतिस्पर्धा गर्न सक्ने बलियो शक्ति हुँदाहुँदै पनि राजनीतिक वैचारिक जगमा उभिन सकेन, त्यसका कार्यकर्ताहरु यसैकारण नेतृत्वसँग निराश छन्’, पोखरेलले भने, ‘त्यसैले हामीले चितवन, डडेलधुरालगायतका ठाउँमा कांग्रेसका बागी उम्मेदवारलाई सघाउन आफ्ना उम्मेदवारलाई फिर्ता बोलायौं । खासमा ती बागी पनि होइनन्, ती त कांग्रेसको विचार बोक्ने मूलप्रवाहका उम्मेदवार हुन् ।’</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">उनलाई अनलाइनखबरले सोध्यो, ‘तपाईंहरु दुई साताअघिसम्म गठबन्धन गर्नु भनेको ढोडको वैशाखी टेक्नुसरह हो, एमाले एक्लै हिँड्छ भन्दै हुनुहुन्थ्यो । अहिले जसपा, राप्रपासँग गठबन्धन गर्न पुग्नु भो नि ?’</p>', NULL, 'राजनीति', NULL, NULL, 1, 'Suresh Bohara', NULL, 8, 'कांग्रेस सुध्रियोस् भनेर बागीहरुलाई समर्थन गरेका हौं : शंकर पोखरेल', 'आम निर्वाचन,नेपाली कांग्रेस,प्रचण्ड,राजनीति', '२६ असोज, काठमाडौं । नेकपा एमालेका महासचिव शंकर पोखरेलले कांग्रेसले कुनै विचार, सिद्धान्त बेगर गठबन्धन बनाउँदा त्यस दलका कार्यकर्ताहरुमा निराशा छाएकाले एमालेले उनीहरुलाई साथ दिएको बताएका छन् ।', '2022-10-13 08:03:51', '2022-10-27 02:06:26'),
(2, 'क्राउन प्लाजा होटलमा छिरेको १० मिनेटमै युवती जलिन्', 'jpg_53968.jpg', 'समाचार', 'असोज २४ मा बिहान दुईजना नक्सालस्थित क्राउन प्लाजा होटलमा गए । होटलमा पुगेको १० मिनेटमा युवती जल्न थालिन् ।', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">असोज २४ मा बिहान दुईजना नक्सालस्थित क्राउन प्लाजा होटलमा गए । होटलमा पुगेको १० मिनेटमा युवती जल्न थालिन् ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-paraAd paraAd\" style=\"margin: 0px 0px 30px; padding: 0px 0px 1em; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(204, 204, 204); border-left-color: initial; border-image: initial; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: flex; flex-direction: row; height: 270px; float: left; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://tatacars.sipradi.com.np/inquiry2?utm_source=Ratopati&amp;utm_medium=Online&amp;utm_campaign=NexonNo1&amp;utm_id=MA_NexonNo1\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://click.daraz.com.np/e/_6Z8Bx\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div></div><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">उनी हुन्, चावहिल घर भएकी २३ वर्षीया फिउइ खनाल । ​फिउइसँगै गएका केशव रिजालले होटलमा राखिएको फायर एक्स्टिङगुइसर प्रयोग गरेर आगो निभाउने प्रयास गरेका थिए । त्यसपछि ट्याक्सी बोलाएर तत्काल उनलाई रिजालले अस्पताल लगे । कीर्तिपुरस्थित बर्न अस्पतालमा उनको मृत्यु भयो ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.laxmibank.com/deposit/fixed-deposit/#recurring-deposit\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">बिहानको घटना प्रहरीले साँझ ७ बजेतिर मात्रै जानकारी पायो । कीर्तिपुर अस्पतालमा युवतीको मृत्यु भएपछि मात्र घटनाबारे थाहा पाएको जिल्ला प्रहरी परिसर काठमाडौंका एसएसपी भरत बोहराले रातोपाटीलाई बताए ।​&nbsp;फिउइको मृत्युपछि प्रहरीले बाराको जितपुर सिमरा उप–महानगरपालिका घर भएका २६ वर्षीया केशव रिजाल र होटल संचालक ३७ वर्षीय पदम कुमार श्रेष्ठलाई पक्राउ गरेको छ । उनीहरूमाथि ज्यान सम्बन्धी कसुरमा म्याद लिएर अनुसन्धान भइरहेको एसएसपी बोहराले जानकारी दिए ।</p>', NULL, 'राजनीति', NULL, NULL, 1, 'Suresh Bohara', NULL, 8, 'क्राउन प्लाजा होटलमा छिरेको १० मिनेटमै युवती जलिन्', 'निर्वाचन,आम निर्वाचन,नेपाली कांग्रेस', 'असोज २४ मा बिहान दुईजना नक्सालस्थित क्राउन प्लाजा होटलमा गए । होटलमा पुगेको १० मिनेटमा युवती जल्न थालिन् ।', '2022-10-13 21:14:26', '2022-11-07 09:51:10'),
(3, 'कृष्णप्रसाद सिटौलासँग अन्तर्वार्ता ‘शहीद सम्झेर एमालेका समर्थकले राजावादीलाई बोक्न छोड्नुपर्छ’', 'jpg_11262.jpg', 'कृष्णप्रसाद सिटौलासँग अन्तर्वार्ता', 'यो जिल्ला एमालेका कार्यकर्ताहरूको निकै ठूलो संघर्ष भएको जिल्ला हो । विगतमा एकपटक राजावादीलाई मत हाल्न लगाए भन्दैमा यसपटक पनि लगाउलान् जस्तो लाग्दैन । कम्तीमा गणतन्त्रको आन्दोलन हाम्रो हो । त्यसैले आफ्नै शहीदहरूलाई सम्झेर पनि राजावादीलाई एमालेका मतदाताले छोड्नुपर्छ ।', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">२८ असोज, काठमाडौं । लामो समयपछि प्रेससामु उपलब्ध भए कांग्रेस नेता&nbsp;<strong>कृष्णप्रसाद सिटौला</strong>&nbsp;। झापा-३ बाट प्रतिनिधिसभा सदस्यमा कांग्रेस उम्मेदवार बनेका उनी राप्रपा अध्यक्ष राजेन्द्र लिङ्देनसँग प्रतिस्पर्धामा छन् ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">तत्कालीन विद्रोही माओवादीसँग बाह्रबुँदे सहमति, शान्ति प्रक्रिया, संविधान निर्माणसम्म महत्वपूर्ण भूमिका खेलेका उनी बीचका केही वर्ष छायाँमा रहे ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories okam-device-desktop\" data-alias=\"single-inbetween-stories\" data-device-type=\"desktop\" style=\"display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\"><div class=\"okam-each-ad\" id=\"okam-ad-1092\" data-verification=\"02814079062f19c7cf2e8c60c72ca3d6\" style=\"margin-bottom: 15px;\"><a href=\"https://tvsnepal.com/dashain/form\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/3AF5EEDF-04F6-457C-93AE-2B267187ED0D.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-998\" data-verification=\"e23928c2755b024b0411a57c6e3e87bf\" style=\"margin-bottom: 15px;\"><a href=\"https://globalimebank.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/03/250x2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-82\" data-verification=\"75745be58dda84fba811fcfd336a2bd5\" style=\"margin-bottom: 0px;\"><a href=\"https://bit.ly/3Dahbt6\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/250X2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">आसन्न चुनावका लागि सत्ता गठबन्धनभित्रको सिट बाँडफाटसम्बन्धी कार्यदलमा संयोजक भई काम गरेका उनी राष्ट्रिय राजनीतिको केन्द्रमा फेरि एकपल्ट देखिने क्रममा छन् । उनीसँग अनलाइनखबरले गरेको कुराकानी :</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\"><strong>बीचमा तपाईंलाई निकै समय हेर्न, सुन्न पाइएन । कस्तो चल्दैछ चुनावको राजनीतिक माहोल ?</strong></p><div class=\"okam-ad-position-wrap single-inbetween-stories-2 okam-device-desktop single-inbetween-stories\" data-alias=\"single-inbetween-stories-2\" data-device-type=\"desktop\" style=\"display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\"><div class=\"okam-each-ad\" id=\"okam-ad-1159\" data-verification=\"28a7a9aeab5fe9a64532ca70ad9db344\" style=\"margin-bottom: 15px;\"><a href=\"https://www.himalayatv.com/shark-tank-application/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/06/SHARK-TANK-250x250px.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-1218\" data-verification=\"e040cd534fe0699e53d2a0e0b875f098\" style=\"margin-bottom: 15px;\"><a href=\"https://www.nepalhomes.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/10/gif_Ad-NH.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-1180\" data-verification=\"414516253159c75be97e0b18f53b4a1c\" style=\"margin-bottom: 0px;\"><a href=\"https://nyefstartupawards.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/ezgif.com-gif-maker7.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">तपाईंले ठीकै भन्नुभयो । म आजकाल प्रेससँग एकदमै कम गइराखेको मान्छे हुँ । मलाई सम्झेर अन्तर्वार्ता लिइदिनुभएकोमा तपाईंलाई धन्यवाद । समग्र माहोल हाम्रो अनुकूल नै छ । सत्ता गठबन्धनको बीचमा धेरै चरणमा छलफल र अन्तरक्रिया गरिसकेपछि सिट बाँडफाट भएको छ ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">त्यसमा कांग्रेसको तर्फबाट धेरै साथी संघ र प्रदेश सभामा उम्मेदवार बन्नुभएको छ । म उहाँहरूसहित गठबन्धनका सबै साथीको सफलताका लागि वातावरण बनाउने भूमिकामा लागें । अहिले भर्खरै झापा आएको छु । यहाँको चुनावी माहोल एकदमै राम्रो छ । यसपल्ट विजय हुन्छ भन्ने कुरामा मलाई एकदमै विश्वास भएको छ ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\"><strong>विगतमा तपाईंले जित्दै आउनुभएको प्रतिस्पर्धीले अघिल्लो चुनावमा तपाईंलाई हराउनुभयो । यो पल्टको प्रतिस्पर्धा कस्तो होला ?</strong></p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">चुनावमा म यहाँबाट निरन्तर उम्मेदवार छु । तर मैले चुनाव जितेको जम्मा तीनपल्ट हो । मध्यावधिमा, २०५६ मा र दोस्रो संविधानसभामा । तर विभिन्न परिस्थितिका कारण पूरा कार्यकाल बिताउने अवसर मिलेन ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">मैले पूरा कार्यकाल बिताएको भनेको दोस्रो संविधानसभामा मात्रै हो भन्दा पनि हुन्छ । किनभने २०५६ मा जितेको केही समयमै राजाको शासन सुरु भयो । त्यसपछि हामी आन्दोलनमा जानु परिहाल्यो । पहिलो संविधानसभामा पराजित भइयो ।</p>', NULL, 'banner', NULL, NULL, 1, 'Suresh Bohara', NULL, 12, 'कृष्णप्रसाद सिटौलासँग अन्तर्वार्ता ‘शहीद सम्झेर एमालेका समर्थकले राजावादीलाई बोक्न छोड्नुपर्छ’', 'राजनीति,नेपाली कांग्रेस,नेपाल प्रहरी', 'यो जिल्ला एमालेका कार्यकर्ताहरूको निकै ठूलो संघर्ष भएको जिल्ला हो । विगतमा एकपटक राजावादीलाई मत हाल्न लगाए भन्दैमा यसपटक पनि लगाउलान् जस्तो लाग्दैन । कम्तीमा गणतन्त्रको आन्दोलन हाम्रो हो । त्यसैले आफ्नै शहीदहरूलाई सम्झेर पनि राजावादीलाई एमालेका मतदाताले छोड्नुपर्छ ।', '2022-10-14 16:48:16', '2022-11-07 18:40:52'),
(4, 'लुम्बिनी प्रदेशसभा क्षेत्रमा एकीकृत समाजवादीले पाएन सत्ता गठबन्धनको समर्थन', 'jpg_69048.jpg', NULL, '२८ असोज, बुटवल । लुम्बिनी प्रदेशका सबै ५२ वटा प्रदेश सभा निर्वाचन क्षेत्रमा नेकपा एकीकृत समाजवादीले सत्तरुढ गठबन्धनको समर्थन पाउन सकेन ।', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">२८ असोज, बुटवल । लुम्बिनी प्रदेशका सबै ५२ वटा प्रदेश सभा निर्वाचन क्षेत्रमा नेकपा एकीकृत समाजवादीले सत्तरुढ गठबन्धनको समर्थन पाउन सकेन ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">सत्ता गठबन्धनमा रहेका दल नेपाली कांग्रेसले ३३, नेकपा माओवादी केन्द्रले १७, राष्ट्रिय जनमोर्चा र लोकतान्त्रिक समाजवादी पार्टीले एक–एक निर्वाचन क्षेत्रमा उम्मेदवार उठाउँदा एकीकृत समाजवादी भने भागवण्डामा एक सिट पनि पाउन सकेन ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories okam-device-desktop\" data-alias=\"single-inbetween-stories\" data-device-type=\"desktop\" style=\"display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\"><div class=\"okam-each-ad\" id=\"okam-ad-1092\" data-verification=\"02814079062f19c7cf2e8c60c72ca3d6\" style=\"margin-bottom: 15px;\"><a href=\"https://tvsnepal.com/dashain/form\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/3AF5EEDF-04F6-457C-93AE-2B267187ED0D.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-998\" data-verification=\"e23928c2755b024b0411a57c6e3e87bf\" style=\"margin-bottom: 15px;\"><a href=\"https://globalimebank.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/03/250x2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-82\" data-verification=\"75745be58dda84fba811fcfd336a2bd5\" style=\"margin-bottom: 0px;\"><a href=\"https://bit.ly/3Dahbt6\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/250X2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">प्रतिनिधि सभा सदस्यतर्फ प्रदेशका २६ सिटमा दाङ–१, पाल्पा २, गुल्मी–२ र रुपन्देही–२ गरी ४ सिट पाएको एकीकृत समाजवादी प्रदेशसभाको प्रत्यक्षतर्फ भने शून्य उम्मेदवार भएपछि भावी प्रदेश सरकारमा उपस्थिति नहुने सम्भावनाले पार्टीभित्र असन्तुष्टी बढेको छ ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">प्रतिनिधि सभामा चार सिट पाएकाले र उनीहरुको जितका लागि कांग्रेस र नेकपा माओवादी केन्द्रको मत पनि आवश्यक पर्ने भएकाले प्रदेशसभामा टिकट नपाएको विषय एकीकृत समाजवादीका नेताहरुले उठाउन सकेका छैनन् ।</p>', NULL, 'मुख्य समाचार', NULL, NULL, 1, 'Suresh Bohara', NULL, 14, 'लुम्बिनी प्रदेशसभा क्षेत्रमा एकीकृत समाजवादीले पाएन सत्ता गठबन्धनको समर्थन', 'प्रचण्ड,निर्वाचन ०७९,प्रदेश,नेकपा-एमाले,राजनीति', '२८ असोज, बुटवल । लुम्बिनी प्रदेशका सबै ५२ वटा प्रदेश सभा निर्वाचन क्षेत्रमा नेकपा एकीकृत समाजवादीले सत्तरुढ गठबन्धनको समर्थन पाउन सकेन ।', '2022-10-14 16:51:19', '2022-10-18 20:34:46'),
(5, 'चितवन–३ र डडेलधुराबाट किन पछि हट्यो एमाले ?', 'jpg_66639.jpg', 'आम निर्वाचन ०७९', NULL, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 23px; letter-spacing: 0.5px; text-align: justify;\">नेकपा एमालेले मङ्सिरमा हुने प्रतिनिधि सभा सदस्य र प्रदेश सभा सदस्य निर्वाचनका लागि चितवन–३ र डडेलधुरामा दिएको उम्मेदवारी फिर्ता लिएको छ । चितवन–३ २०७४ को निर्वाचनमा माओवादी केन्द्रका अध्यक्ष पुष्पकमल दाहाल ‘प्रचण्ड’ निर्वाचित भएको क्षेत्र हो । यस पटक भने प्रचण्ड अन्तिम समयमा चितवन–३ छोडेर गोरखा उक्लेका छन् । त्यस्तै डडेलधुरा प्रधानमन्त्री तथा कांग्रेस सभापति शेरबहादुर देउवाको गृह र निर्वाचन क्षेत्र हो । एमालेले डडेलधुराबाट नेता चक्र स्नेही र चितवन ३ बाट रामप्रसाद न्यौपानेलाई उम्मेदवारी दिन लगाएर पनि पछि फिर्ता लिएको हो ।</span><br></p><p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 23px; letter-spacing: 0.5px; text-align: justify;\"><br></span></p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 23px; letter-spacing: 0.5px; text-align: justify;\">मङ्सिरको निर्वाचनमा एमाले भर्सेस&nbsp;सत्ता गठबन्धनबीच चुनावी प्रतिस्पर्धा हुने निश्चित भएका बेला एमालेले सत्ता गठबन्धनकै नेताका जिल्लामा भने उम्मेदवारी फिर्ता गरेर उनीहरूलाई नै सजिलो बनाउन लागेको त होइन ? उम्मेदवारी फिर्ता गरेपछि कतिपयले यस्तो प्रश्न समेत गरेका छन् । तर, एमालेको रणनीति यो बुझाई भन्दा ठिक विपरीत छ । अर्थात् एमालेले सत्ता गठबन्धनका नेता वा उम्मेदवारलाई सजिलो बनाउन र जिताउन नभई हराउन उम्मेदवारी फिर्ता लिएको हो ।</span>', NULL, 'खेलकुद', NULL, NULL, 1, 'Suresh Bohara', NULL, 15, 'चितवन–३ र डडेलधुराबाट किन पछि हट्यो एमाले ?', 'राजनीति,प्रचण्ड,निर्वाचन,प्रदेश', '', '2022-10-14 16:55:34', '2022-10-19 13:36:01'),
(6, 'कांग्रेसलाई ‘टिट फर ट्याट’, माओवादी र नेकपा (एस) लाई ‘टच’ गरेन जसपाले', 'jpg_12692.jpg', 'मधेस प्रदेश', 'जनता समाजवादी पार्टी नेपालले मधेस प्रदेश सरकारबाट कांग्रेसका मन्त्रीलाई हटाए पनि सत्ता गठबन्धनमा रहेका दुई दल पुष्पकमल दाहाल ‘प्रचण्ड’ नेतृत्वको माओवादी केन्द्र र माधवकुमार नेपाल नेतृत्वको नेकपा एकीकृत समाजवादीलाई ‘टच’ गरेन', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">जनता समाजवादी पार्टी नेपालले मधेस प्रदेश सरकारबाट कांग्रेसका मन्त्रीलाई हटाए पनि सत्ता गठबन्धनमा रहेका दुई दल पुष्पकमल दाहाल ‘प्रचण्ड’ नेतृत्वको माओवादी केन्द्र र माधवकुमार नेपाल नेतृत्वको नेकपा एकीकृत समाजवादीलाई ‘टच’ गरेन । जब कि गठबन्धनमा सहमति गरेर नै प्रधानमन्त्री शेरबहादुर देउवाले संघीय सरकारमा जसपाका चारजना मन्त्रीलाई बर्खास्त गरेका थिए । जसपाका मन्त्रीलाई हटाउन गठबन्धनमा रहेका दल माओवादी केन्द्रका अध्यक्ष प्रचण्ड र नेकपा (एस) का अध्यक्ष माधव कुमार नेपालले पनि सहमति दिएका थिए ।&nbsp;</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-paraAd paraAd\" style=\"margin: 0px 0px 30px; padding: 0px 0px 1em; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(204, 204, 204); border-left-color: initial; border-image: initial; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: flex; flex-direction: row; height: 270px; float: left; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://tatacars.sipradi.com.np/inquiry2?utm_source=Ratopati&amp;utm_medium=Online&amp;utm_campaign=NexonNo1&amp;utm_id=MA_NexonNo1\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://click.daraz.com.np/e/_6Z8Bx\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div></div><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">तर यी दुई दलका मन्त्रीलाई जसपाले किन हटाएन भनेर प्रश्न उठेको छ । जसपाका प्रवक्ता एवं कार्यकारिणी सदस्य मनिष सुमन भन्छन्, ‘हामीले सत्ता गठबन्धनमा रहेका माओवादी केन्द्र र नेकपा (एस) सँग मित्रवत व्यवहार गरेका छौँ । काँग्रेसले हामीसँग जस्तो व्यवहार गरेको छ त्यस्तै व्यवहार हामीले पनि गर्‍यौँ, टिट फर ट्याट ।’</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.laxmibank.com/deposit/fixed-deposit/#recurring-deposit\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">प्रधानमन्त्री शेरबहादुर देउवाले सत्ता गठबन्धनको सहमतिमा भन्दा पनि एकल निर्णयबाट आफ्ना पार्टीका मन्त्रीहरूलाई हटाएको बताउँदै उनले आफूहरूले पनि कांग्रेसकै मन्त्रीलाई मात्र हटाएको बताए ।</p>', NULL, 'विचार', NULL, NULL, 1, 'Suresh Bohara', NULL, 23, 'कांग्रेसलाई ‘टिट फर ट्याट’, माओवादी र नेकपा (एस) लाई ‘टच’ गरेन जसपाले', 'राजनीति,आम निर्वाचन,नेपाल प्रहरी,मनोरञ्जन', 'जनता समाजवादी पार्टी नेपालले मधेस प्रदेश सरकारबाट कांग्रेसका मन्त्रीलाई हटाए पनि सत्ता गठबन्धनमा रहेका दुई दल पुष्पकमल दाहाल ‘प्रचण्ड’ नेतृत्वको माओवादी केन्द्र र माधवकुमार नेपाल नेतृत्वको नेकपा एकीकृत समाजवादीलाई ‘टच’ गरेन', '2022-10-14 16:59:59', '2022-10-19 16:20:44'),
(7, 'जो क्रिकेट खेल्न लगातार २३ घण्टा हिँडेर पोखरा आइन्', 'jpg_10104.jpg', NULL, '२८ असोज, पोखरा । रोल्पाकी शर्मिला रोकामगर भैरहवामा भएको लुम्बिनी प्रदेशको महिला क्रिकेट टिमको छनोट खेल खेलेर दशैं मनाउन दाङ पुगिन् । मन बेचैन थियो – टिममा परिन्छ कि परिँदैन ? टिममा परेको खबर आए दशैंलगत्तै उनी नवौं राष्ट्रिय खेलकुद प्रतियोगितामा क्रिकेट खेल्न पोखरा पुग्नुपर्ने थियो', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">२८ असोज, पोखरा । रोल्पाकी शर्मिला रोकामगर भैरहवामा भएको लुम्बिनी प्रदेशको महिला क्रिकेट टिमको छनोट खेल खेलेर दशैं मनाउन दाङ पुगिन् । मन बेचैन थियो – टिममा परिन्छ कि परिँदैन ?</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">टिममा परेको खबर आए दशैंलगत्तै उनी नवौं राष्ट्रिय खेलकुद प्रतियोगितामा क्रिकेट खेल्न पोखरा पुग्नुपर्ने थियो । तर १८ असोजमा उनलाई भाइले पुर्ख्यौली घर रोल्पा जने प्रस्ताव गरे । काठमाडौंमा स्नातकोत्तर गरिरहेकी शर्मिला गृह जिल्ला नपुगेको वर्षौं भइसकेको थियो । त्यसैते १९ गते साँझ नै फर्किने गरी दाङबाट रोल्पा जान राजी भइन् ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories okam-device-desktop\" data-alias=\"single-inbetween-stories\" data-device-type=\"desktop\" style=\"display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\"><div class=\"okam-each-ad\" id=\"okam-ad-1092\" data-verification=\"02814079062f19c7cf2e8c60c72ca3d6\" style=\"margin-bottom: 15px;\"><a href=\"https://tvsnepal.com/dashain/form\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/3AF5EEDF-04F6-457C-93AE-2B267187ED0D.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-998\" data-verification=\"e23928c2755b024b0411a57c6e3e87bf\" style=\"margin-bottom: 15px;\"><a href=\"https://globalimebank.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/03/250x2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-82\" data-verification=\"75745be58dda84fba811fcfd336a2bd5\" style=\"margin-bottom: 0px;\"><a href=\"https://bit.ly/3Dahbt6\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/250X2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">१८ गते अपरान्ह ४ बजे रोल्पाको सुलीचौर पुग्दा लुम्बिनी प्रदेशको महिला क्रिकेट टिमका प्रशिक्षक सञ्जु केसीले शर्मिलालाई फोन गरेर टिममा परेको जनकारी दिए । त्यतिबेलासम्म पनि आकाश सफा थियो, मौसम खुलेकै थियो । उनले प्रशिक्षकलाई भनिन्, ‘हुन्छ दाइ म भोलि साँझसम्म (१९ गते) दाङ आइपुग्छु ।’</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; color: rgb(0, 0, 0); font-family: mukta, sans-serif;\">रोल्पा सदरमुकाम लिबाङबाट २० किलोमिटर टाढा पेवा भन्ने गाउँमा पुग्दा साँझको ८ बजिसकेको थियो । तर, शर्मिला पेवास्थित बहिनी ज्वाइँको घरमा पुगेको केहीबेरमै पानी पर्न थाल्यो । ‘ठूलो पानी पर्‍यो भने कसरी फर्किने भन्ने चिन्ताले सताउन थाल्यो,’ शर्मिला सुनिन्छन्, ‘नभन्दै अर्को दिन पनि पानी रोकिने छाँट देखाएन । झरीझरी झन्झन् बढ्न थाल्यो ।’</p>', NULL, 'तराई-खबर स्पेसल', NULL, NULL, 1, 'Suresh Bohara', NULL, 2, 'जो क्रिकेट खेल्न लगातार २३ घण्टा हिँडेर पोखरा आइन्', 'निर्वाचन ०७९,आम निर्वाचन,प्रचण्ड,राजनीति', '२८ असोज, पोखरा । रोल्पाकी शर्मिला रोकामगर भैरहवामा भएको लुम्बिनी प्रदेशको महिला क्रिकेट टिमको छनोट खेल खेलेर दशैं मनाउन दाङ पुगिन् । मन बेचैन थियो – टिममा परिन्छ कि परिँदैन ? टिममा परेको खबर आए दशैंलगत्तै उनी नवौं राष्ट्रिय खेलकुद प्रतियोगितामा क्रिकेट खेल्न पोखरा पुग्नुपर्ने थियो', '2022-10-14 21:22:12', '2022-10-16 16:36:05'),
(8, 'नेपालबाट घरेलु कामदार लैजान कतारको दबाब, कामदार नलैजानेसम्मको चेतावनी', 'jpg_76602.jpg', NULL, NULL, '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">कतारले घरेलु कामदारमाथिको प्रतिबन्ध खोल्न नेपाललाई दबाब दिएको छ । आफ्नो देशमा घरेलु कामदारको अभाव चर्किएपछि कतारले नेपालबाट घरेलु कामदार लैजाने खोजेको थियो । तर, नेपालमा २०७३ सालदेखि नै घरेलु कामदार पठाउन प्रतिबन्ध छ ।&nbsp;</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-paraAd paraAd\" style=\"margin: 0px 0px 30px; padding: 0px 0px 1em; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(204, 204, 204); border-left-color: initial; border-image: initial; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: flex; flex-direction: row; height: 270px; float: left; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://tatacars.sipradi.com.np/inquiry2?utm_source=Ratopati&amp;utm_medium=Online&amp;utm_campaign=NexonNo1&amp;utm_id=MA_NexonNo1\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://click.daraz.com.np/e/_6Z8Bx\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div></div><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">कतारले विभिन्न प्रलोभन देखाउनेदेखि लिएर कामदार रोक्नेसम्मको धम्की नेपाललाई दिएको हो । कतारमा अहिले साढे ३ लाख भन्दा बढी जना घरेलु कामदारको माग छ । त्यो माग परिपूर्ति गर्न कतारले म्यानमार, फिलिपिन्स लगायतका देशबाट कामदार लगिरहेको छ ।&nbsp;कतारमा अन्य क्षेत्रमा कामदार पठाइरहेको नेपाललाई घरेलु क्षेत्रमा पनि कामदार पठाउन आग्रह गर्दै आएको हो । यसका लागि कतारले विभिन्न अफरदेखि धम्कीसमेत दिने गरेको छ ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.laxmibank.com/deposit/fixed-deposit/#recurring-deposit\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">जनवरी २०२१ मा नेपाल र कतारको संयुक्त&nbsp;कमिटीको बैठक बसेको थियो । जसमा कतारले घरेलु कामदार पठाउन आग्रह गरेको थियो । त्यसपछिको भेटघाटको क्रममा पनि कतारले घरेलु कामदारको विषय पटक-पटक उठान गर्दै आएको थियो ।&nbsp;</p><div><br></div>', NULL, 'मुख्य समाचार', NULL, NULL, 1, 'Suresh Bohara', NULL, 1, 'नेपालबाट घरेलु कामदार लैजान कतारको दबाब, कामदार नलैजानेसम्मको चेतावनी', 'राजनीति,नेपाली कांग्रेस,नेपाल प्रहरी', '', '2022-10-14 22:33:07', '2022-10-14 22:33:07');
INSERT INTO `news` (`id`, `title`, `feature_image`, `banner_tags`, `short_description`, `description`, `pradesh`, `news_type`, `video_id`, `author_name`, `status`, `created_by`, `updated_by`, `view_count`, `meta_title`, `meta_keywords`, `meta_descriptions`, `created_at`, `updated_at`) VALUES
(9, 'टिमवर्कको सफल उदाहरणः प्रेमगीत-३', 'jpg_96577.jpg', 'सरोकार', 'प्रेमगीत-३ का कारण विश्वबजारमा नेपाली सिनेमाको सहज बाटो तय', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">कोरोना महामारी अन्त्यसँगै नेपाली चलचित्र क्षेत्रले गति लिन थालेको छ । यसैबीच नेपाली चलचित्र क्षेत्रको इतिहासमै पहिलो पटक विश्व बजारमा चलचित्र प्रेमगीत–३ ले निकै तरंग ल्याएको छ ।&nbsp;</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-paraAd paraAd\" style=\"margin: 0px 0px 30px; padding: 0px 0px 1em; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(204, 204, 204); border-left-color: initial; border-image: initial; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: flex; flex-direction: row; height: 270px; float: left; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://tatacars.sipradi.com.np/inquiry2?utm_source=Ratopati&amp;utm_medium=Online&amp;utm_campaign=NexonNo1&amp;utm_id=MA_NexonNo1\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://click.daraz.com.np/e/_6Z8Bx\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div></div><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">प्रेमगीत–३ नेपाली भाषाबाहेक हिन्दी, उर्दु लगायत अंग्रेजी सबटाइटलमा ५० भन्दा बढी देशमा एकसाथ सिनेमा घरको सिस्टममा प्रदर्शन भयो । यो पंक्तिकार प्रेमगीत–३ को कार्यकारी निर्माताको नाताले भन्नैपर्ने हुन्छ कि यसको निर्माणमा निकै मेहनत परेको छ । संस्थापक निर्देशक छेतेन गुरुङ, सन्तोष सेनको क्याप्टेनसिप अनि स्पट ब्वाइदेखि डाइरेक्टरसम्म टिमको अथक मेहनत छ यसमा । काठमाडौंदेखि मनाङको माइनस २९ सम्मको तापक्रम अनि दुई वर्ष भारतको मुम्बईका गल्ली गल्लीका संघर्षको कथा निकै लामो छ ।&nbsp;</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.laxmibank.com/deposit/fixed-deposit/#recurring-deposit\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">टिमवर्कको सफल उदाहरण नै अहिलेको प्रेमगीत–३ सफलताको श्रेय हो भन्ने मैले बुझेको छु । चलचित्र छायाँकनको लागी जब हामी १३० जनाभन्दा बढीको टोली मनाङ पुगेका थियौं । त्यो समय निकै कष्टकर थियो । प्रतिकुल मौसम दिनहुँको हिमपात माईनस २९ सम्मको तापक्रममा काम गर्नुपर्ने स्थिति निकै तनावपूर्ण थियो ।&nbsp;</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F3BEihuD%3Ffbclid%3DIwAR1Sdj2Z1IJ_zj3qxGdleQJKIFBXIG2K7wbVPdb6Te0RCouqR5aJXT3yxls&amp;h=AT09PQCY8szJlDedn9_OX3uZosPuxGReiDrAZP8y_vNQOhyrOS2MUCDO7vCvc6puOSrn5LYrgONBZAiaW-bkgLIubh5dBRLT3mBkuBqs1NmVctkkY2e6V_M5JSmaDrFQxlz3iA\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/sales_berry_upadte_oct_22.gif\" src=\"https://ratopatis.prixacdn.net/media/sales_berry_upadte_oct_22.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">हात्तीढुङ्गाको गीतको छायांकनको बेला कोरसका कैयन साथीहरु एक्कासी अग्लो उचाईमा आएको कारण नाकमुखबाट रगत बगेर लडेको डरलाग्दो स्थितिसमेत आयो । टिमका अन्य साथीहरुले बोकेर नजिकैको अन्नपूर्ण संरक्षण क्षेत्र परियोजना (एक्याप) को स्वास्थ्य चौकीको सहयोग लिएर उपचार गरेको घटना कसरी बिर्सिनु ? यो काम निकै संवेदनशील थियो । कति काम त भगवान भरोसा नै थियो ।&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">हुन त केही गाह्रो भए हामीले हवाई रेस्क्यूको लागि पोखरामा हेली तम्तयार राखेका थियौ । तर केही भैहाले पनि प्रतिकुल मौसम भारी हिमपातको कारण हेली आउन सक्ने सम्भावना पनि निकै कम रहन्थ्यो । त्यहाँका स्थानीय होटल ब्यवसायीको निकै ठुलो साथ सहयोग गरेको कारण हामीले राम्रोसँग काम सम्पन्न गर्न सक्यौं ।&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">आज प्रेमगीत–३ को चर्चा संसारभर चलिरहँदा भने हामी निकै भावुक भएका छौं, खुशीको सीमा नै&nbsp;छैन । संसारका दर्शकले जुन प्रतिक्रिया दिएका छन् त्यो नै सबै टिमको खुशी हो जस्तो लाग्छ ।&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">नेपाली चलचित्रको बजार सानो छ, दर्शक सीमित छन् । चलचित्र उत्कृष्ट बन्न नसकिरहेको अवस्थामा प्रेमगीत–३ र यसको टिमले जुन साहस गरेको छ, त्यो समग्र नेपाली चलचित्रको लागि नै नयाँ ढोका खुलेको चलचित्र नगरीमा चर्चा हुन थालेको छ ।&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">मेकरका लागि पनि स्तरीय चलचित्र बनाउन सकेमा अव नेपाली चलचित्र विश्व बजारमा पुर्याउन सकिने साहस बढेको छ । प्रेमगीत–३ को कथा, कलाकारहरुको काम, निर्देशकीय पक्ष कस्तो छ भन्दा&nbsp; पनि आमदर्शकले प्रेमगीत–३ ले संसारभर खोलेको ढोकामा साथ समर्थन जनाइरहेका छन् । यो साथ समर्थन नै चलचित्रको ठुलो सफलता हो भन्ने लाग्छ ।&nbsp;</p>', NULL, 'राजनीति', NULL, NULL, 1, 'Suresh Bohara', NULL, 8, 'टिमवर्कको सफल उदाहरणः प्रेमगीत-३', 'मनोरञ्जन', 'प्रेमगीत-३ का कारण विश्वबजारमा नेपाली सिनेमाको सहज बाटो तय', '2022-10-15 11:20:43', '2022-10-19 04:24:40'),
(10, 'एक सातामा प्रतितोला ११ सयले बढ्यो सुनको मूल्य', 'jpg_65577.jpg', NULL, 'यो साता नेपाली बजारमा सुनको मूल्य प्रतितोला १ हजार १०० रुपैयाँले बढेको छ । नेपाल सुनचाँदी व्यवसायी महासंघका अनुसार दसैँअघि कारोबार बन्द भएको दिनदेखि यो शुक्रबारसम्मको तुलनामा उक्त मूल्य बढेको हो ।', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">यो साता नेपाली बजारमा सुनको मूल्य प्रतितोला १ हजार १०० रुपैयाँले बढेको छ । नेपाल सुनचाँदी व्यवसायी महासंघका अनुसार दसैँअघि कारोबार बन्द भएको दिनदेखि यो शुक्रबारसम्मको तुलनामा उक्त मूल्य बढेको हो ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-paraAd paraAd\" style=\"margin: 0px 0px 30px; padding: 0px 0px 1em; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(204, 204, 204); border-left-color: initial; border-image: initial; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: flex; flex-direction: row; height: 270px; float: left; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://tatacars.sipradi.com.np/inquiry2?utm_source=Ratopati&amp;utm_medium=Online&amp;utm_campaign=NexonNo1&amp;utm_id=MA_NexonNo1\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" src=\"https://ratopatis.prixacdn.net/media/250x250.jpg\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://click.daraz.com.np/e/_6Z8Bx\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" src=\"https://ratopatis.prixacdn.net/media/250-by-250_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div></div><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">दसैं अघिको शुक्रबार (१४ असोज) मा सुनको मूल्य प्रतितोला ९३ हजार रुपैयाँ थियो । सोही मितिमा तेजाबी सुनको मूल्य प्रतितोला ९२ हजार ५०० रुपैयाँ थियो । जुन, हिजो शुक्रबारसम्ममा छापावाल सुनको मूल्य तोलामा ९४ हजार १०० रुपैयाँ छ । यस्तै, तेजाबी सुनको मूल्य तोलामा ९३ हजार ६०० रुपैयाँ छ ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.laxmibank.com/deposit/fixed-deposit/#recurring-deposit\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">यो साताको आइतबार दसैंपछि पहिलो कारोबार खुल्दा सुनको मूल्य तोलामा एकैदिन ३०० रुपैयाँले बढेको थियो । यस्तै, सोमबार ८०० र मंगलबार १२ सय रुपैयाँले घटेको थियो । बुधबार तोलामा १०० रुपैयाँले बढेको सुनको मूल्य बिहीबार स्थिर कायम थियो । शुक्रबार १०० रुपैयाँले घट्दै ९४ हजार १०० कायम भएको हो ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F3BEihuD%3Ffbclid%3DIwAR1Sdj2Z1IJ_zj3qxGdleQJKIFBXIG2K7wbVPdb6Te0RCouqR5aJXT3yxls&amp;h=AT09PQCY8szJlDedn9_OX3uZosPuxGReiDrAZP8y_vNQOhyrOS2MUCDO7vCvc6puOSrn5LYrgONBZAiaW-bkgLIubh5dBRLT3mBkuBqs1NmVctkkY2e6V_M5JSmaDrFQxlz3iA\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/sales_berry_upadte_oct_22.gif\" src=\"https://ratopatis.prixacdn.net/media/sales_berry_upadte_oct_22.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">यसैगरी, यस अवधिमा चाँदीको मूल्य तोलामा १५ रुपैयाँले बढेको छ । महासंघकाअनुसार असोज १४ गते शुक्रबार चाँदीको मूल्य तोलामा ११ सय ७० रुपैयाँ थियो । जुन, हिजो शुक्रबारसम्ममा आइपुग्दा ११ सय ८५ रुपैयाँ कायम भएको छ ।</p>', NULL, 'मुख्य-समाच', NULL, NULL, 1, 'Suresh Bohara', NULL, 10, 'एक सातामा प्रतितोला ११ सयले बढ्यो सुनको मूल्य', 'राजनीति,नेपाल प्रहरी,निर्वाचन ०७९', 'यो साता नेपाली बजारमा सुनको मूल्य प्रतितोला १ हजार १०० रुपैयाँले बढेको छ । नेपाल सुनचाँदी व्यवसायी महासंघका अनुसार दसैँअघि कारोबार बन्द भएको दिनदेखि यो शुक्रबारसम्मको तुलनामा उक्त मूल्य बढेको हो ।', '2022-10-15 11:29:21', '2022-10-19 11:32:35'),
(11, 'भीम रावलबिना अछाममा एमालेलाई कति चुनौती ? यस्ता छन् प्रतिस्पर्धी', 'jpg_61313.jpg', 'आम निर्वाचन ०७९', 'प्रतिनिधिसभा अन्तर्गत दुई निर्वाचन क्षेत्र रहेको अछाममा सत्तारुढ गठबन्धन र एमालेबीच नै आसन्न निर्वाचनमा मुख्य प्रतिस्पर्धा हुने देखिएको छ । अछाम क्षेत्र नम्बर १ मा ६ र क्षेत्र नम्बर २ मा ५ उम्मेदवार छन् । क्षेत्र नम्बर १ मा एमालेले झपटबहादुर बोहोरालाई उम्मेदवार बनाएको छ ।', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 23px; letter-spacing: 0.5px; text-align: justify;\">प्रतिनिधिसभा अन्तर्गत दुई निर्वाचन क्षेत्र रहेको अछाममा सत्तारुढ गठबन्धन र एमालेबीच नै आसन्न निर्वाचनमा मुख्य प्रतिस्पर्धा हुने देखिएको छ ।&nbsp;अछाम क्षेत्र नम्बर १ मा ६ र क्षेत्र नम्बर २ मा ५ उम्मेदवार छन् । क्षेत्र नम्बर १ मा एमालेले झपटबहादुर बोहोरालाई उम्मेदवार बनाएको छ ।</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 23px; letter-spacing: 0.5px; text-align: justify; background-color: var(--cui-card-bg); font-weight: var(--cui-body-font-weight);\">भीम रावललाई मौका नदिएको एमालेलाई यो क्षेत्रमा सत्तारुढ गठबन्धनबाट संघीय मन्त्री शेरबहादुर कुँवरले चुनौती दिँदैछन् । उनी नेकपा एकीकृत समाजवादीबाट उम्मेदवार बनेका हुन् । यो क्षेत्रमा हाम्रो नेपाली पार्टीबाट तेजप्रसाद शर्मा उम्मेदवार छन् । यहाँ राजन कुँवर, महेन्द्रबहादुर बोगटी र हिक्मत कुँवर स्वतन्त्र उम्मेदवार छन् ।</span><br></p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.laxmibank.com/deposit/fixed-deposit/#recurring-deposit\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">यस्तै क्षेत्र नम्बर २ मा एमालेले यज्ञबहादुर बोगटीलाई उम्मेदवार बनाएको छ । यहाँ सत्तारुढ गठबन्धनबाट नेपाली कांग्रेसका पुष्पबहादुर शाह उम्मेदवार छन् । यस क्षेत्रमा राप्रपाले मीनबहादुर शाही र नेमकिपाले झंकरबहादुर शाहीलाई उम्मेदवार बनाएको छ । यस क्षेत्रमा चन्द्रप्रसाद ढुंगानाले स्वतन्त्र उम्मेदवारी दिएका छन् ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F3BEihuD%3Ffbclid%3DIwAR1Sdj2Z1IJ_zj3qxGdleQJKIFBXIG2K7wbVPdb6Te0RCouqR5aJXT3yxls&amp;h=AT09PQCY8szJlDedn9_OX3uZosPuxGReiDrAZP8y_vNQOhyrOS2MUCDO7vCvc6puOSrn5LYrgONBZAiaW-bkgLIubh5dBRLT3mBkuBqs1NmVctkkY2e6V_M5JSmaDrFQxlz3iA\" target=\"_blank\" style=\"background: 0px 0px; color: rgb(75, 74, 74); text-decoration-line: none; -webkit-tap-highlight-color: transparent; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/sales_berry_upadte_oct_22.gif\" src=\"https://ratopatis.prixacdn.net/media/sales_berry_upadte_oct_22.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important; color: rgb(0, 0, 0) !important;\">नेकपा एमालेमा प्रभावशाली मानिएका भीम रावललाई थन्क्याएर एमालेले क्षेत्र नम्बर १ मा बोहरा र २ मा बोगटीलाई उम्मेदवार बनाएको छ । अछाममा प्रभावशाली मानिएका रावलबिना यो निर्वाचनमा एमालेलाई गठबन्धनको सामना गर्न निकै चुनौती हुने जानकारहरु बताउँछन् ।</p>', NULL, 'banner', NULL, NULL, 1, 'Suresh Bohara', NULL, 13, 'भीम रावलबिना अछाममा एमालेलाई कति चुनौती ? यस्ता छन् प्रतिस्पर्धी', 'राजनीति,नेकपा-एमाले', 'प्रतिनिधिसभा अन्तर्गत दुई निर्वाचन क्षेत्र रहेको अछाममा सत्तारुढ गठबन्धन र एमालेबीच नै आसन्न निर्वाचनमा मुख्य प्रतिस्पर्धा हुने देखिएको छ । अछाम क्षेत्र नम्बर १ मा ६ र क्षेत्र नम्बर २ मा ५ उम्मेदवार छन् । क्षेत्र नम्बर १ मा एमालेले झपटबहादुर बोहोरालाई उम्मेदवार बनाएको छ ।', '2022-10-15 11:35:44', '2022-10-19 11:32:42'),
(12, 'दुर्गा पौडेलसँग कुनै प्रतिस्पर्धा छैनः सूर्य थापा', 'webp_84082.webp', NULL, 'काठमाडौं, २९ असोज । नेकपा एमाले प्युठानका प्रतिनिधिसभा उम्मेदवार सूर्य थापाले सत्ता गठबन्धनकी दुर्गा पौडेलसँग प्रतिस्पर्धा नै नहुने दाबी गरेका छन् । ‘गठबन्धन बदनाम छ', '<p><span style=\"color: rgb(51, 51, 51); font-family: mukta, sans-serif; font-size: 19.2px; text-align: justify;\">काठमाडौं, २९ असोज । नेकपा एमाले प्युठानका प्रतिनिधिसभा उम्मेदवार सूर्य थापाले सत्ता गठबन्धनकी दुर्गा पौडेलसँग प्रतिस्पर्धा नै नहुने दाबी गरेका छन् ।</span><br style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-family: mukta, sans-serif; font-size: 19.2px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: mukta, sans-serif; font-size: 19.2px; text-align: justify;\">‘गठबन्धन बदनाम छ । निरन्तर खिइँदो, टाक्सिँदो छ । प्युठानको हकमा गठबन्धन एमालेलाई त्यति ठूलो चुनौती होइन । दुर्गा पौडेल २०७४ तिर एमाले, २०७९ मा कांग्रेसतिर ढल्केको मतदाताले रुचाएका छैनन् । उहाँलाई पहिले हामीले मानोमा मुरी मिसाइदिएको हो । तर चुनावपछि फर्केर कहीं मुख नदेखाएको भन्ने छ । उहाँ गठबन्धनको असाध्यै कमजोर र चुनौतीको घेराका रुपमा रहेको उम्मेदवार हो । हामीसँग उहाँको प्रतिस्पर्धा हुने स्थिति छैन,’ नेपाली रेडियो नेटवर्क (एनआरएन) को कार्यक्रम ‘नेपाली बहस’का लागि पत्रकार ऋषि धमलासँग कुरा गर्दै थापाले भने ।</span><br style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-family: mukta, sans-serif; font-size: 19.2px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: mukta, sans-serif; font-size: 19.2px; text-align: justify;\">एउटा-दुइटा स्थानमा उम्मेदवारी दिन पार्टीेले देशको विकास गर्न नसक्ने पनि उनको टिप्पणी छ । उनले भने, ‘मेरो अठोट जनताको जीवन बदल्ने हो । प्युठानको हैसियत बदल्ने हो । सिंहदरबारले उपेक्षा गर्न नसक्ने ठाउँमा पुर्‍याउने हो ।’</span><br></p>', NULL, 'अर्थतन्त्र', 'rwLKnez4b-Q', NULL, 1, 'Suresh Bohara', NULL, 8, 'दुर्गा पौडेलसँग कुनै प्रतिस्पर्धा छैनः सूर्य थापा', 'राजनीति,प्रचण्ड,नेपाली कांग्रेस', 'काठमाडौं, २९ असोज । नेकपा एमाले प्युठानका प्रतिनिधिसभा उम्मेदवार सूर्य थापाले सत्ता गठबन्धनकी दुर्गा पौडेलसँग प्रतिस्पर्धा नै नहुने दाबी गरेका छन् । ‘गठबन्धन बदनाम छ', '2022-10-15 11:40:37', '2022-10-19 11:32:43'),
(13, 'दीपक खड्काको उम्मेदवारीले संखुवासभाली जनतामा खुशियाली, यस्तो छ चुनावी एजेण्डा', 'webp_67792.webp', NULL, 'काठमाडौं, २९ असोज । नेपाली कांग्रेसका प्रभावशाली नेता तथा पूर्वमन्त्री दीपक खड्काले आगामी मंसिर ४ गते हुने निर्वाचनको लागि संखुवासभाबाट प्रतिनिधिसभाका लागि उम्मेदवारी दर्ता गरेसँगै जिल्लावासीमा खुशियाली छाएको छ । नेता खड्का जिल्लाको समग्र विकासमा राजनीतिमा लागेदेखि नै सक्रिय छन् ।', '<p style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 1.2em; font-family: mukta, sans-serif; text-align: justify;\">काठमाडौं, २९ असोज । नेपाली कांग्रेसका प्रभावशाली नेता तथा पूर्वमन्त्री दीपक खड्काले आगामी मंसिर ४ गते हुने निर्वाचनको लागि संखुवासभाबाट प्रतिनिधिसभाका लागि उम्मेदवारी दर्ता गरेसँगै जिल्लावासीमा खुशियाली छाएको छ । नेता खड्का जिल्लाको समग्र विकासमा राजनीतिमा लागेदेखि नै सक्रिय छन् ।</p><p style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 1.2em; font-family: mukta, sans-serif; text-align: justify;\">उनले जिल्लाको हरेक सुख र दुःखमा साथ दिएका छन् । बोलेको कुरा पूरा गर्ने नेताको छवि बनाएका खड्का विकासप्रेमी नेताको रुपमा परिचित छन् । खड्काले यसपालिको निर्वाचनमा ‘समृद्ध संखुवासभा, सम्मानित संखुवासभाली’ भन्ने मूल नारा बोकेका छन् । उनी यतिवेला आफ्नो क्षेत्रमा चुनावी प्रचारमा व्यस्त छन् ।</p><p style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 1.2em; font-family: mukta, sans-serif; text-align: justify;\">मोटरसाईकलको पछि बसेर उनी जनताको घरदैलोमा पुगिरहेका छन् । सो क्षेत्रका जनताले पनि खड्काको उम्मेदवारीलाई लिए हर्ष व्यक्त गर्ने गरेका छन् । उनले जिल्लामा विकास निर्माणमा जोड दिने, भ्रष्टाचार हुन नदिने र सुशासन कायम गरिने एजेण्डा बोकेका छन् ।</p><p style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 1.2em; font-family: mukta, sans-serif; text-align: justify;\">उनले प्रत्येक घरमा खानेपानीको सुविधा पुर्याउने र युवाहरुलाई रोजगारी सिर्जना गर्ने आफ्नो एजेण्डा सुनाएका छन् । उनले भारत र चीनजस्ता ठूला मुलुकहरुको व्यवसायिक केन्द्र संखुवासभामा बनाउने र पर्यटकीय क्षेत्रलाई विस्तार गर्ने पनि योजना सुनाएका छन्</p>', NULL, 'खेलकुद', 'r_b1vXeiuJw', NULL, 1, 'Suresh Bohara', NULL, 6, 'दीपक खड्काको उम्मेदवारीले संखुवासभाली जनतामा खुशियाली, यस्तो छ चुनावी एजेण्डा', 'निर्वाचन ०७९,नेपाली कांग्रेस,प्रचण्ड', 'काठमाडौं, २९ असोज । नेपाली कांग्रेसका प्रभावशाली नेता तथा पूर्वमन्त्री दीपक खड्काले आगामी मंसिर ४ गते हुने निर्वाचनको लागि संखुवासभाबाट प्रतिनिधिसभाका लागि उम्मेदवारी दर्ता गरेसँगै जिल्लावासीमा खुशियाली छाएको छ । नेता खड्का जिल्लाको समग्र विकासमा राजनीतिमा लागेदेखि नै सक्रिय छन् ।', '2022-10-15 11:42:41', '2022-10-19 17:17:48'),
(14, 'एकीकृत समाजवादीका बाजुरा अध्यक्ष फर्किए एमालेमा', 'jpg_5113.jpg', NULL, 'नेकपा (एकीकृत समाजवादी) का बाजुरा जिल्ला अध्यक्ष गगन रावल नेकपा (एमाले) मा प्रवेश गरेका छन्।', '<p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: justify;\">नेकपा (एकीकृत समाजवादी) का बाजुरा जिल्ला अध्यक्ष गगन रावल नेकपा (एमाले) मा प्रवेश गरेका छन्।</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: justify;\">बाजुरामा शुक्रबार आयोजित कार्यक्रममा रावलसहित जिल्लाका केही नेता-कार्यकर्ता एकीकृत समाजवादी छोडेर एमाले प्रवेश गरेका हुन्।</p><div class=\"meda a-item desktop-bigyaapan-only\" style=\"outline: 0px; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34);\"><a href=\"https://heraldcollege.edu.np/\" title=\"invotech\" style=\"outline: 0px; margin: 0px; padding: 0px; color: rgb(51, 122, 183); text-decoration-line: none; background-color: transparent; touch-action: manipulation; border: 0px; font: inherit; vertical-align: baseline; transition: all 0.3s ease-in-out 0s; display: inline;\"><img src=\"https://img.setopaty.com/uploads/bigyaapan/28384000.gif\" alt=\"invotech\" class=\"pull-img-left\" style=\"outline: 0px; margin-right: 30px; padding: 0px; vertical-align: baseline; border: 0px; font: inherit; float: left; height: unset; width: 595px; margin-top: 0px !important; margin-bottom: 30px !important; margin-left: 0px !important; max-width: 824px !important;\"></a></div><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: justify;\">नवप्रवेशीलाई एमाले स्थायी कमिटी सदस्य कर्णबहादुर थापा, पोलिटब्युरो सदस्य लालबहादुर थापा लगायतले पार्टी प्रवेश गराएका हुन्।</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: justify;\">बाजुरामा गठबन्धनका तर्फबाट संघीय संसद र प्रदेश सबैतिर नेपाली कांग्रेसले उम्मेदवारी दिएको छ।</p>', NULL, 'मनोरञ्जन', NULL, NULL, 1, 'Suresh Bohara', NULL, 13, 'एकीकृत समाजवादीका बाजुरा अध्यक्ष फर्किए एमालेमा', 'राजनीति,नेपाली कांग्रेस,नेपाल प्रहरी', 'नेकपा (एकीकृत समाजवादी) का बाजुरा जिल्ला अध्यक्ष गगन रावल नेकपा (एमाले) मा प्रवेश गरेका छन्।', '2022-10-15 11:58:29', '2022-10-19 16:22:03'),
(15, 'शताब्दी पुरुष : अब चिकित्साशास्त्रका विद्यार्थीका लागि प्रयोगशाला', 'gif_76080.gif', NULL, '३० असोज, काठमाडौं । शताब्दी पुरुष सत्यमोहन जोशीको आइतबार विहान १०३ वर्षको उमेरमा निधन भयो । उनको पार्थिव शरीरको अन्त्येष्टि गरिएन, बरु दुई छोरा अनुराज र डा. पूर्णराजले साँझपख शंखमुलस्थित बागमती घाटमा बाबुको जन्मकुण्डली जलाए । परिवारले जोशीको शव भने ललितपुरस्थित किस्ट मेडिकल कलेजलाई हस्तान्तरण गरेको छ । कलेजका...', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif; text-align: justify;\"><b>३० असोज, काठमाडौं </b>। शताब्दी पुरुष सत्यमोहन जोशीको आइतबार विहान १०३ वर्षको उमेरमा निधन भयो । उनको पार्थिव शरीरको अन्त्येष्टि गरिएन, बरु दुई छोरा अनुराज र डा. पूर्णराजले साँझपख शंखमुलस्थित बागमती घाटमा बाबुको जन्मकुण्डली जलाए ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif; text-align: justify;\">परिवारले जोशीको शव भने ललितपुरस्थित किस्ट मेडिकल कलेजलाई हस्तान्तरण गरेको छ । कलेजका कार्यकारी निर्देशक डा. सुरज ब्रजाचार्यका अनुसार जोशीले आफू जीवित हुँदै शरीर दान गर्ने इच्छापत्रमा हस्ताक्षर गरेका थिए ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories okam-device-desktop\" data-alias=\"single-inbetween-stories\" data-device-type=\"desktop\" style=\"display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative; font-family: mukta, sans-serif;\"><div class=\"okam-each-ad\" id=\"okam-ad-1092\" data-verification=\"02814079062f19c7cf2e8c60c72ca3d6\" style=\"margin-bottom: 15px;\"><a href=\"https://tvsnepal.com/dashain/form\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/3AF5EEDF-04F6-457C-93AE-2B267187ED0D.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-998\" data-verification=\"e23928c2755b024b0411a57c6e3e87bf\" style=\"margin-bottom: 15px;\"><a href=\"https://globalimebank.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/03/250x2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-82\" data-verification=\"75745be58dda84fba811fcfd336a2bd5\" style=\"margin-bottom: 0px;\"><a href=\"https://bit.ly/3Dahbt6\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/250X2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif; text-align: justify;\">‘जीवित हुँदा हस्ताक्षर गरेपनि मृत्यु पछि के गर्ने भन्ने सबै अधिकार परिवारमा जान्थ्यो’, उनले भने, ‘त्यहीअनुसार छोरा अनुराज जोशी लगायतलाई खबर गरेका थियौं, उहाँहरुसँग छलफलपछि अन्तिम संस्कार नगर्ने टुंगो लाग्यो ।’</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif; text-align: justify;\">जोशीको पारिवारिक स्रोत अनुसार मृत शरीरलाई मेडिकल कलेजमा कसरी राखिएला ? राम्रो संरक्षण होला कि नहोला ? भन्ने चिन्ता भएकाले शव अस्पताललाई राख्न स्वीकृति दिने वा नदिने भन्नेमा परिवार अलमलिएको थियो । अस्पतालका एनाटोमी एवं फरेन्सिक विभागका प्रमुख प्रा. डा. कृष्णसिंह बस्नेत लगायतसँग छलफलपछि जोशीको शरीर अध्ययनका लागि दिने सहमति भयो ।</p>', NULL, 'जीवनशैली', 'IirTSXwFW2o', NULL, 1, 'Suresh Bohara', NULL, 39, 'शताब्दी पुरुष : अब चिकित्साशास्त्रका विद्यार्थीका लागि प्रयोगशाला', 'निर्वाचन ०७९,नेपाली कांग्रेस,नेकपा-एमाले', '३० असोज, काठमाडौं । शताब्दी पुरुष सत्यमोहन जोशीको आइतबार विहान १०३ वर्षको उमेरमा निधन भयो । उनको पार्थिव शरीरको अन्त्येष्टि गरिएन, बरु दुई छोरा अनुराज र डा. पूर्णराजले साँझपख शंखमुलस्थित बागमती घाटमा बाबुको जन्मकुण्डली जलाए । परिवारले जोशीको शव भने ललितपुरस्थित किस्ट मेडिकल कलेजलाई हस्तान्तरण गरेको छ । कलेजका...', '2022-10-16 22:08:44', '2022-11-04 04:13:42');
INSERT INTO `news` (`id`, `title`, `feature_image`, `banner_tags`, `short_description`, `description`, `pradesh`, `news_type`, `video_id`, `author_name`, `status`, `created_by`, `updated_by`, `view_count`, `meta_title`, `meta_keywords`, `meta_descriptions`, `created_at`, `updated_at`) VALUES
(16, '‘गणेशमानले रुँदै पार्टी छाड्नुभो, मैले विद्रोह गरें’', 'jpg_1231.jpg', 'कांग्रेसका बागी महादेव गुरुङसँग अन्तर्वार्ता', '२ कात्तिक, पोखरा । पञ्चायत विरोधी आन्दोलनका क्रममा बीपी कोइराला स्याङ्जाको आम सभालाई सम्बोधन गर्न पुग्दा प्रहरीले गोली चलायो । बीपीलाई युवा तथा विद्यार्थी परिचालन कमिटीका संयोजक रहेका कास्कीका महादेव गुरुङले बचाए । आफूलाई बचाएका गुरुङलाई बीपीले त्यतिबेलै नेपाल विद्यार्थी संघको महामन्त्री बनाइदिए । ज्ञानेन्द्रबहादुर कार्की नेविसंघको अध्यक्ष हुँदा...', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">२ कात्तिक, पोखरा । पञ्चायत विरोधी आन्दोलनका क्रममा बीपी कोइराला स्याङ्जाको आम सभालाई सम्बोधन गर्न पुग्दा प्रहरीले गोली चलायो । बीपीलाई युवा तथा विद्यार्थी परिचालन कमिटीका संयोजक रहेका कास्कीका महादेव गुरुङले बचाए । आफूलाई बचाएका गुरुङलाई बीपीले त्यतिबेलै नेपाल विद्यार्थी संघको महामन्त्री बनाइदिए ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">ज्ञानेन्द्रबहादुर कार्की नेविसंघको अध्यक्ष हुँदा महामन्त्री बनेका गुरुङ गिरिजाप्रसाद कोइरालाका पनि प्रिय थिए । शेरबहादुर देउवाले कांग्रेस प्रजातान्त्रिक बनाउँदा बालकृष्ण खाँण पनि उतै लागेपछि गिरिजाप्रसादले गुरुङलाई तरुण दलको अध्यक्ष बनाएका थिए । २०५६ सालमा कास्की क्षेत्र नम्बर २ बाट चुनाव जितेर पर्यटन राज्यमन्त्री भए । कास्कीमा हक्की र केन्द्रीय नेताहरूसँग नडराई आफ्ना कुरा राख्न सक्ने नेताको परिचय बनाएका गुरुङले २०७० सालमा टिकट पाएर पनि जित्न सकेनन् ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories okam-device-desktop\" data-alias=\"single-inbetween-stories\" data-device-type=\"desktop\" style=\"display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative; font-family: mukta, sans-serif;\"><div class=\"okam-each-ad\" id=\"okam-ad-1092\" data-verification=\"02814079062f19c7cf2e8c60c72ca3d6\" style=\"margin-bottom: 15px;\"><a href=\"http://www.riddhisiddhicements.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/10/250.250.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-998\" data-verification=\"e23928c2755b024b0411a57c6e3e87bf\" style=\"margin-bottom: 15px;\"><a href=\"https://globalimebank.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/03/250x2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-82\" data-verification=\"75745be58dda84fba811fcfd336a2bd5\" style=\"margin-bottom: 0px;\"><a href=\"https://bit.ly/3Dahbt6\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/250X2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">२०७४ सालमा टिकटै नपाएका गुरुङ यसपटक समानुपातिकमा नाम सिफारिस भएर पनि परेनन् भने प्रत्यक्षको पनि टिकट पाएनन् । विचार नमिल्नेसँग गठबन्धन र देउवाले टिकट किनबेच गरेको आरोप लगाउँदै उनले बागी उम्मेदवारी दिएका छन् ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">सत्ता गठबन्धनको भागबण्डामा एकीकृत समाजवादीले पाएको कास्की क्षेत्र नं. २ मा प्रतिनिधिसभा सदस्यका लागि उम्मेदवारी दिएका गुरुङलाई सभापति देउवाले नाम फिर्ता लिन आग्रह गरेका थिए । तर, कारबाही सहने भन्दै उनी चुनावी मैदानमा होमिएका छन् ।</p>', NULL, 'banner', NULL, NULL, 1, 'तराई खबर', NULL, 9, '‘गणेशमानले रुँदै पार्टी छाड्नुभो, मैले विद्रोह गरें’', 'नेपाल प्रहरी,निर्वाचन ०७९,नेपाली कांग्रेस,नेकपा-एमाले', '२ कात्तिक, पोखरा । पञ्चायत विरोधी आन्दोलनका क्रममा बीपी कोइराला स्याङ्जाको आम सभालाई सम्बोधन गर्न पुग्दा प्रहरीले गोली चलायो । बीपीलाई युवा तथा विद्यार्थी परिचालन कमिटीका संयोजक रहेका कास्कीका महादेव गुरुङले बचाए । आफूलाई बचाएका गुरुङलाई बीपीले त्यतिबेलै नेपाल विद्यार्थी संघको महामन्त्री बनाइदिए । ज्ञानेन्द्रबहादुर कार्की नेविसंघको अध्यक्ष हुँदा...', '2022-10-19 13:07:51', '2022-11-05 13:04:13'),
(17, 'देउवा–ओली–प्रचण्डको चुनावी कमाण्डर को छन् ?', 'png_49916.png', NULL, '२ कात्तिक, काठमाडौ. । ४ मंसिरको प्रतिनिधिसभा चुनावका लागि दल र उम्मेदवारहरु हाल प्रचार प्रसारमा छन् । दल र उम्मेदवारले आआफ्नो निर्वाचन क्षेत्रको प्रचार प्रसारलाई प्रभावकारी बनाउन चुनाव परिचालन समिति पनि बनाउने गरेका छन् । प्रमुख दलका शीर्ष नेताले आफ्नो चुनाव क्षेत्रबाहेक अन्यत्र पनि समय दिनुपर्ने भएकाले उनीहरुले आफ्नो...', '<p><div class=\"col colspan3\" style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: mukta, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"left_add\" style=\"box-sizing: border-box;\"><div class=\"okam-ad-position-wrap single-after-content okam-device-desktop\" data-alias=\"single-after-content\" data-device-type=\"desktop\" style=\"box-sizing: border-box; margin-bottom: 30px;\"></div></div></div></p><div class=\"ok18-single-post-content-wrap\" style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: mukta, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">२ कात्तिक, काठमाडौ. । ४ मंसिरको प्रतिनिधिसभा चुनावका लागि दल र उम्मेदवारहरु हाल प्रचार प्रसारमा छन् । दल र उम्मेदवारले आआफ्नो निर्वाचन क्षेत्रको प्रचार प्रसारलाई प्रभावकारी बनाउन चुनाव परिचालन समिति पनि बनाउने गरेका छन् ।</p><p style=\"text-align: center; font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">प्रमुख दलका शीर्ष नेताले आफ्नो चुनाव क्षेत्रबाहेक अन्यत्र पनि समय दिनुपर्ने भएकाले उनीहरुले आफ्नो विश्वास पात्रको नेतृत्वमा चुनाव परिचालन समिति बनाएका छन् ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories okam-device-desktop\" data-alias=\"single-inbetween-stories\" data-device-type=\"desktop\" style=\"font-weight: 400; box-sizing: border-box; display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative;\"><div class=\"okam-each-ad\" id=\"okam-ad-1092\" data-verification=\"02814079062f19c7cf2e8c60c72ca3d6\" style=\"box-sizing: border-box; margin-bottom: 15px;\"><a href=\"http://www.riddhisiddhicements.com/\" target=\"_blank\" style=\"box-sizing: border-box;\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/10/250.250.gif\" alt=\"\" style=\"box-sizing: border-box; max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-998\" data-verification=\"e23928c2755b024b0411a57c6e3e87bf\" style=\"box-sizing: border-box; margin-bottom: 15px;\"><a href=\"https://globalimebank.com/\" target=\"_blank\" style=\"box-sizing: border-box;\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/03/250x2502.gif\" alt=\"\" style=\"box-sizing: border-box; max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-82\" data-verification=\"75745be58dda84fba811fcfd336a2bd5\" style=\"box-sizing: border-box; margin-bottom: 0px;\"><a href=\"https://bit.ly/3Dahbt6\" target=\"_blank\" style=\"box-sizing: border-box;\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/250X2502.gif\" alt=\"\" style=\"box-sizing: border-box; max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">प्रधानमन्त्री तथा कांग्रेस सभापति शेरबहादुर देउवाको निर्वाचन क्षेत्रको प्रचार प्रसारको कमाण्ड सम्हाल्ने जिम्मेवारी कांग्रेसका डडेलधुरा जिल्ला सभापति भीमबहादुर साउदले पाएका छन् ।</p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">नेकपा एमालेका अध्यक्ष केपी शर्मा ओली उम्मेदवार भएको झापा–५ को चुनाव प्रचार प्रसारको नेतृत्व राष्ट्रिय सभा सदस्य देवेन्द्र दाहालले सम्हालेका छन् । त्यसैगरी गोरखा–२ बाट उम्मेदवार रहेका नेकपा माओवादी केन्द्रका अध्यक्ष पुष्पकमल दाहाल प्रचण्डको प्रचार प्रसारको ‘कमाण्डर’ माओवादीका पोलिट्ब्यूरो सदस्य हरिराज अधिकारी तोकिएका छन् ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories-2 okam-device-desktop single-inbetween-stories\" data-alias=\"single-inbetween-stories-2\" data-device-type=\"desktop\" style=\"font-weight: 400; box-sizing: border-box; display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative;\"><div class=\"okam-each-ad\" id=\"okam-ad-1223\" data-verification=\"2de423dfec77a50f068fe247111ef367\" style=\"box-sizing: border-box; margin-bottom: 15px;\"><a href=\"https://www.nabilbank.com/individual\" target=\"_blank\" style=\"box-sizing: border-box;\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/10/250X2502.gif\" alt=\"\" style=\"box-sizing: border-box; max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-1218\" data-verification=\"e040cd534fe0699e53d2a0e0b875f098\" style=\"box-sizing: border-box; margin-bottom: 15px;\"><a href=\"https://www.nepalhomes.com/\" target=\"_blank\" style=\"box-sizing: border-box;\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/10/gif_Ad-NH.gif\" alt=\"\" style=\"box-sizing: border-box; max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-1180\" data-verification=\"414516253159c75be97e0b18f53b4a1c\" style=\"box-sizing: border-box; margin-bottom: 0px;\"><a href=\"https://nyefstartupawards.com/\" target=\"_blank\" style=\"box-sizing: border-box;\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/09/ezgif.com-gif-maker7.gif\" alt=\"\" style=\"box-sizing: border-box; max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">कांग्रेस सभापति देउवा सातौं पटक डडेलधुराबाट प्रतिनिधिसभा सदस्य उम्मेदवार बनेका छन् ।</p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">यसै पनि चुनाव प्रचार प्रसारमा कम समय दिने देउवा हाल प्रधानमन्त्री समेत रहेकाले निर्वाचन क्षेत्रमा धेरै जान नसक्ने कांग्रेसका नेताहरु बताउँछन् । त्यसैले देउवाको चुनाव प्रचार प्रसार र सत्तारुढ गठबन्धनको चुनावी सभा तय गर्न साउद नेतृत्वमा निर्वाचन परिचालन समिति बनाएको कांग्रेसको भनाइ छ ।</p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">निर्वाचन परिचालन मूल समिति र उप समितिहरु बनेको साउदले जानकारी दिए । प्रदेश स्तरीय निर्वाचन परिचालन समिति भने गठन गर्न बाँकी छ । ‘चुनावी छलफल त भएको छ ।आचारसंहिताले भेला सभा गर्न मिलेको छैन । गाउँतिर जाने भेटघाट गर्ने काम भइरहेको छ । गठबन्धन दलहरुको संयुक्त रुपमा चुनाव प्रचार गरिरहेका छौं’, साउदले भने ।</p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">सत्तारुढ गठबन्धनका दलहरु बीच एक आपसमा आरोप प्रत्यारोप नगरी कार्यकर्ता परिचालन साउदले बताए । निर्वाचन आयोगले तोके अनुसार कात्तिक १७ पछि चुनावी सभा गर्ने उनको भनाइ छ । उनले भने, ‘प्रधानमन्त्री चुनावी कार्यक्रमका लागि आउने निश्चित भएकोे छैन । तिहार पछि प्रचारका अरु कार्यक्रम बन्छन् ।’</p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">प्रमुख प्रतिपक्षी दल नेकपा एमालेका अध्यक्ष केपी शर्मा ओलीले चुनावी कार्यक्रमका लागि झापा ५ पुग्ने क्रमलाई बाक्लो बनाएका छन् । मंगलबार ओली आफ्नो गृह क्षेत्रमा पुगेका छन् । मंगलबार स्वास्थ्यमा समस्या देखिएका ओली बुधबारका चुनावी कार्यक्रममा भने सहभागी हुने भएका छन् ।</p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">ओलीले आफ्नो क्षेत्रको चुनाव प्रचार प्रसारको मुख्य जिम्मेवारी एमाले नेता देवेन्द्र दाहाललाई तोकेका छन् । ओलीको क्षेत्रको निर्वाचन परिचालन मूल समितिका संयोजक दाहाल छन् । संघ, प्रदेश र पालिका स्तरमा चुनावी प्रचार समिति गठन गरिसकिएको दाहालले अनलाइनखबरलाई जानकारी दिए ।</p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">कार्यकर्तासँग अन्तर्क्रिया गर्ने गरी प्रदेश सभाका उम्मेदवारले कार्यक्रम गरिसकेका छन् । पार्टी अध्यक्ष ओलीको उपस्थितिमा झापा ५ मा बुधबार बृहत कार्यकर्ता भेला राखिएको छ ।</p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">मतदातासँग प्रत्यक्ष भेटघाट गर्ने गरी दुई कार्यक्रम तय भएको दाहालले जानकारी दिए । ‘कात्तिक १७ पछि क्षेत्रलाई तीन भागमा छुट्याएर अध्यक्षले चुनावी सभालाई सम्बोधन गर्ने तयारी गरेका छौं’, दाहालले भने । झापा ५ मा एमालेले राप्रपासँग तालमेल गरेको छ ।</p><p style=\"box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\"><b>प्रत्येक पटक निर्वाचन क्षेत्र परिवर्तन गरिरहेको आरोप खेपेका माओवादी केन्द्रका पुष्पकमल दाहाल अध्यक्ष प्रचण्ड यसपटक गोरखा २ बाट उम्मेदवार बनेका छन् । उनले प्रचार प्रसार हेर्ने जिम्मेवारी माओवादी केन्द्रका पोलिट्व्यूरो सदस्य हरिराज अधिकारीलाई दिएका छन् । पार्टी अध्यक्ष प्रचण्डले पुरै समय क्षेत्रमा लाग्ने अवस्था नभएकाले गोरखा २ को चुनावी अभियानको नेतृत्व आफूले गरिरहेको अधिकारीले बताए ।</b></p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">प्रतिनिधिसभादेखि वडा तहसम्म निर्वाचन परिचालनको संरचना बनाइसकेको अधिकारीले जानकारी दिए । ‘उम्मेदवारका घोषणापत्र मतदाता कहाँ पुर्‍याउँछौं । त्यसमाथि छलफल बहस गराउँछौं । कात्तिक १७ पछि अध्यक्षले सम्वोधन गर्ने गरी सभाहरुको तयारीमा लागेका छौं’, उनले भने ।</p><p style=\"font-weight: 400; box-sizing: border-box; font-size: 22px; margin: 0px 0px 28px; line-height: 1.8;\">गोरखामा स्थानीय तहको मतको आधारमा माओवादी केन्द्र पहिलो स्थानमा छ । गठबन्धनको नेतृत्वकर्ता दल कांग्रेसले दोस्रो स्थानको मत ल्याएको छ ।</p></div>', NULL, 'अन्तर्वार्ता', 'hkHJRpBMTvU', NULL, 1, 'तराई खबर', NULL, 8, 'देउवा–ओली–प्रचण्डको चुनावी कमाण्डर को छन् ?', 'नेपाल प्रहरी,आम निर्वाचन,नेकपा-एमाले,नेपाली कांग्रेस', '२ कात्तिक, काठमाडौ. । ४ मंसिरको प्रतिनिधिसभा चुनावका लागि दल र उम्मेदवारहरु हाल प्रचार प्रसारमा छन् । दल र उम्मेदवारले आआफ्नो निर्वाचन क्षेत्रको प्रचार प्रसारलाई प्रभावकारी बनाउन चुनाव परिचालन समिति पनि बनाउने गरेका छन् । प्रमुख दलका शीर्ष नेताले आफ्नो चुनाव क्षेत्रबाहेक अन्यत्र पनि समय दिनुपर्ने भएकाले उनीहरुले आफ्नो...', '2022-10-19 15:35:35', '2022-11-01 12:45:59'),
(18, 'गिरिजाप्रसादले तीन पटक जितेको क्षेत्र सुजातालाई कत्तिको सहज ?', 'jpg_49580.jpg', NULL, 'काठमाडौं, १४ कार्तिक । निर्वाचनको मिति मङ्सिर ४ गते नजिकिएसँगै जिल्लाका गाउँगाउँमा राजनीतिक दलहरू आफ्नो उम्मेदवार र चुनावी एजेण्डासहित पुगिसकेका छन् । मोरङको छ वटा निर्वाचन क्षेत्रमध्ये क्षेत्र नम्बर २ लाई यस पटक मतदाताले रोचक ढङ्गले नियालिरहेका छन् ।', '<p><span style=\"color: rgb(51, 51, 51); font-family: mukta, sans-serif; font-size: 19.2px; text-align: justify; background-color: rgb(255, 255, 255);\">काठमाडौं, १४ कार्तिक ।&nbsp;निर्वाचनको मिति मङ्सिर ४ गते नजिकिएसँगै जिल्लाका गाउँगाउँमा राजनीतिक दलहरू आफ्नो उम्मेदवार र चुनावी एजेण्डासहित पुगिसकेका छन् । मोरङको छ वटा निर्वाचन क्षेत्रमध्ये क्षेत्र नम्बर २ लाई यस पटक मतदाताले रोचक ढङ्गले नियालिरहेका छन् ।</span><br></p>', NULL, 'पर्यटन', NULL, NULL, 1, 'तराई खबर', NULL, 36, 'शेरबहादुर देउवा', 'गिरिजाप्रसादले तीन पटक जितेको क्षेत्र सुजातालाई कत्तिको सहज ?', 'काठमाडौं, १४ कार्तिक । निर्वाचनको मिति मङ्सिर ४ गते नजिकिएसँगै जिल्लाका गाउँगाउँमा राजनीतिक दलहरू आफ्नो उम्मेदवार र चुनावी एजेण्डासहित पुगिसकेका छन् । मोरङको छ वटा निर्वाचन क्षेत्रमध्ये क्षेत्र नम्बर २ लाई यस पटक मतदाताले रोचक ढङ्गले नियालिरहेका छन् ।', '2022-11-01 17:05:23', '2022-11-07 09:58:42'),
(19, 'निर्वाचन आयोगले कोमल वलीलाई सोध्यो स्पष्टीकरण', 'jpg_56789.jpg', NULL, '१९ कात्तिक, काठमाडौं । निर्वाचन आयोगले दाङ-३ बाट प्रतिनिधिसभा सदस्यमा नेकपा एमालेकी उम्मेदवार कोमल वलीलाई चुनाव प्रचारमा बालबालिका प्रयोग गरेको विषयमा स्पष्टीकरण सोधेको छ । निर्वाचन आचारसंहितामा चुनाव प्रचारमा', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">१९ कात्तिक, काठमाडौं । निर्वाचन आयोगले दाङ-३ बाट प्रतिनिधिसभा सदस्यमा नेकपा एमालेकी उम्मेदवार कोमल वलीलाई चुनाव प्रचारमा बालबालिका प्रयोग गरेको विषयमा स्पष्टीकरण सोधेको छ ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">निर्वाचन आचारसंहितामा चुनाव प्रचारमा दल र उम्मेदवारले बालबालिकाको प्रयोग गर्न नहुने व्यवस्था रहेको तर वलीले बालबालिकाको प्रयोग गरेको भन्दै आयोगले स्पष्टीकरण सोधेको हो । उनलाई स्पष्टीकरणको जवाफ २४ घण्टाभित्र दिन भनिएको छ ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories okam-device-desktop\" data-alias=\"single-inbetween-stories\" data-device-type=\"desktop\" style=\"display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative; font-family: mukta, sans-serif;\"><div class=\"okam-each-ad\" id=\"okam-ad-1092\" data-verification=\"02814079062f19c7cf2e8c60c72ca3d6\" style=\"margin-bottom: 15px;\"><a href=\"https://www.facebook.com/RiddhiSiddhiCements\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/11/250x250-ridhi-sidhi-cement-1.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-998\" data-verification=\"e23928c2755b024b0411a57c6e3e87bf\" style=\"margin-bottom: 15px;\"><a href=\"https://globalimebank.com/\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/03/250x2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div><div class=\"okam-each-ad\" id=\"okam-ad-82\" data-verification=\"75745be58dda84fba811fcfd336a2bd5\" style=\"margin-bottom: 0px;\"><a href=\"https://bit.ly/3Wv4QqD\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/11/250X2507.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">शुक्रबार वलीले&nbsp;<a href=\"https://www.onlinekhabar.com/2022/11/1213071\" target=\"_blank\" rel=\"noopener\" style=\"font-weight: 700; color: rgb(34, 96, 191);\">विद्यार्थीलाई राखेर चुनावी कार्यक्रम</a>&nbsp;गरेकी थिइन् ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">‘‍…निर्वाचनका प्रक्रियाहरू अगाडि बढिसकेको तथा निर्वाचन आचारसंहिता लागू भइसकेको अवस्थामा तपाईंले किन जानाजान रूपमा निर्वाचन आचारसंहिताको उल्लंघन हुने कार्य गर्नुभएको हो ?’ आयोगको स्पष्टीकरणमा भनिएको छ ।</p><div class=\"okam-ad-position-wrap single-inbetween-stories-2 okam-device-desktop single-inbetween-stories\" data-alias=\"single-inbetween-stories-2\" data-device-type=\"desktop\" style=\"display: flex; border-top: 1px solid rgba(0, 0, 0, 0.14); border-bottom: 1px solid rgba(0, 0, 0, 0.14); padding: 40px 0px 20px; margin-bottom: 28px; justify-content: space-around; position: relative; font-family: mukta, sans-serif;\"><div class=\"okam-each-ad\" id=\"okam-ad-1223\" data-verification=\"2de423dfec77a50f068fe247111ef367\" style=\"margin-bottom: 0px;\"><a href=\"https://www.nabilbank.com/individual\" target=\"_blank\"><img src=\"https://www.onlinekhabar.com/wp-content/uploads/2022/10/250X2502.gif\" alt=\"\" style=\"max-width: 100%; vertical-align: top; object-position: center top; border-radius: 4px;\"></a></div></div><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">आयोगले निर्वाचन प्रचारप्रसारमा बालबालिकाको प्रयोग गर्नु हुँदैन भन्ने जानकारी हुँदाहुँदै सो कार्य गरेको देखिएकोले आचारसंहिताको उल्लंघनमा किन कारबाही नगर्ने भनेर पनि प्रश्न सोधेको छ ।</p>', NULL, 'विचार', NULL, NULL, 1, 'तराई खबर', NULL, 3, 'निर्वाचन आयोगले कोमल वलीलाई सोध्यो स्पष्टीकरण', 'कोमल,वलीलाई', '१९ कात्तिक, काठमाडौं । निर्वाचन आयोगले दाङ-३ बाट प्रतिनिधिसभा सदस्यमा नेकपा एमालेकी उम्मेदवार कोमल वलीलाई चुनाव प्रचारमा बालबालिका प्रयोग गरेको विषयमा स्पष्टीकरण सोधेको छ । निर्वाचन आचारसंहितामा चुनाव प्रचारमा', '2022-11-06 16:25:58', '2022-11-06 16:27:26'),
(20, 'देशमा लोकतन्त्रको नाममा लुटतन्त्र मच्चियो : अध्यक्ष लिङदेन', 'jpg_30999.jpg', NULL, 'राष्ट्रिय प्रजातन्त्र पार्टीका अध्यक्ष राजेन्द्र लिङदेनले लोकतन्त्रको नाममा देशमा लुटतन्त्र मच्चिरहेको बताएका छन्  । शनिबार गोरखामा आयोजति राप्रपाको चुनावी सभालाई सम्बोधन गर्दै उनले यस्तो बताएका हुन् । उनले वाइडबडी, ललिता निवासदेखि स्थानीय तहसम्म पुगेर लोकतन्त्रको ना...', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">राष्ट्रिय प्रजातन्त्र पार्टीका अध्यक्ष राजेन्द्र लिङदेनले लोकतन्त्रको नाममा देशमा लुटतन्त्र मच्चिरहेको बताएका छन् &nbsp;। शनिबार गोरखामा आयोजति राप्रपाको चुनावी सभालाई सम्बोधन गर्दै उनले यस्तो बताएका हुन् । उनले वाइडबडी, ललिता निवासदेखि स्थानीय तहसम्म पुगेर लोकतन्त्रको नाममा भ्रष्टाचार मच्चाइरहेको बताए ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"flex-paraAd paraAd\" style=\"margin: 0px 0px 30px; padding: 0px 0px 1em; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(204, 204, 204); border-left-color: initial; border-image: initial; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); display: flex; flex-direction: row; height: 270px; float: left; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://tatacars.sipradi.com.np/inquiry2?utm_source=Ratopati&amp;utm_medium=Online&amp;utm_campaign=NexonNo1&amp;utm_id=MA_NexonNo1\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250x250_4.gif\" src=\"https://ratopatis.prixacdn.net/media/250x250_4.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div></div><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">अध्यक्ष लिङदेनले विभिन्न पार्टी भनेर देखावटी भनाभन गरेपनि भ्रष्टाचार गर्ने बेलामा सबै एक ठाउँमा उभिने परिपाटी ठूला भनिएका राजनीतिक दलहरूमा रहने गरेको बताए । उनले राजनीतिक दलहरूको मनोमानीका कारण समाज विभाजित भइरहेको र देशको एकता संकटमा परेको उल्लेख गरे ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.laxmibank.com/deposit/fixed-deposit/#recurring-deposit\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">उनले नेकपा&nbsp;(माओवादी केन्द्र) का अध्यक्ष पुष्पकमल दाहालप्रति इंगित गर्दै अहिले ठूला भनिएका राजनीतिक दलहरूले जनताको लागि नभइ विदेशीहरूका लागि सरकार बनाउँछु भन्ने भाषण गर्दै हिँडेको समेत बताए । उनले नेपालको संविधान कस्तो हुनुपर्छ भन्नेकुरा विदेशीहरुलाई भन्ने गरेको उल्लेख गरे&nbsp;। उनले&nbsp;नेपालको राजनीतिमा विदेशीको आशीर्वाद, समर्थन बिना मन्त्री, प्रधानमन्त्री हुनसक्ने स्थिति नरहेको पनि दाबी गरे । उनले नेपाली नेताहरूमा विदेशीअघि आत्मसमर्पणको प्रवृत्ति हाबी भएको बताए ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F3BEihuD%3Ffbclid%3DIwAR1Sdj2Z1IJ_zj3qxGdleQJKIFBXIG2K7wbVPdb6Te0RCouqR5aJXT3yxls&amp;h=AT09PQCY8szJlDedn9_OX3uZosPuxGReiDrAZP8y_vNQOhyrOS2MUCDO7vCvc6puOSrn5LYrgONBZAiaW-bkgLIubh5dBRLT3mBkuBqs1NmVctkkY2e6V_M5JSmaDrFQxlz3iA\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/Ratopati--885x125_1.gif\" src=\"https://ratopatis.prixacdn.net/media/Ratopati--885x125_1.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">उनले भने– ‘यो देशमा कसले खाएको छैन, वाइडबडीमा कसले खाएको छैन, ललितानिवास जग्गा प्रकरणमा कसले खाएको छैन । माथिको के कुरा गर्नुहुन्छ, गाउँतिरै हुने भ्रष्टाचारमा कुन पार्टी खाएका छन् । भन्दा अलगअलग पार्टी मारामार जस्तो गर्ने, खाने बेलामा एकै ठाउँ जम्मा हुने । प्रजातन्त्र, लोकतन्त्र, गणतन्त्रको नाममा देशमा लुटतन्त्र मच्चाइरहेका छन् । हामीले कहिल्यै नेदेखेको, कहिल्यै कल्पना नगरेको आज समाज विभाजित छ । हाम्रो एकता, सद्भाव, संकटमा परेको छ । देशको लागि सरकार बनाउने होइन, विदेशीहरुको सहज, खुशीका लागि हामी कम्फरटेबल सरकार बनाउँछौँ भन्छन् हाम्रा देशका नेताहरु । कहाँ गइरहेको छ देश । हामी नेपाली जनताका लागि सरकार बनाउँछौं भन्नुपर्ने ठाउँमा विदेशीहरुको खुशी, सजिलोका लागि भनिरहेका छन् । विदेशीको लागि म प्रधानमन्त्री भएँ भने सजिलो हुन्छ । उनीहरू भनिरहेका छन् तर पनि हामी तिनीहरुलाई नेता मानिरहेका छौँ ।’&nbsp;</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.nabilbank.com/individual\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/885X90_4.gif\" src=\"https://ratopatis.prixacdn.net/media/885X90_4.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">अध्यक्ष लिङदेनले आगामी मंसिर ४ गते हुने प्रतिनिधिसभा र प्रदेश सभा निर्वाचन आम जनताको आकंक्षा पूरा गर्ने र देश बचाउने मौका भएको दाबी गरे । पछिल्लो समय आसन्न मंसिर ४ गतेको प्रतिनिधिसभा र प्रदेशसभा लक्षित चुनावी प्रचारप्रसार तीब्र बन्दै गएको छ । विभिन्न दलका शीर्ष नेताहरूले विभिन्न स्थानमा पुगेर चुनावी प्रचारप्रसार गरिरहेका छन् । राप्रपाले पनि गोरखा, नवलपरासी, चितवन लगायत देशभरका विभिन्न स्थानमा चुनावी प्रचारप्रसारलाई तीव्र पारेको छ ।&nbsp; &nbsp;</p>', NULL, 'तराई-खबर-स्पेसल', NULL, NULL, 1, 'तराई खबर', NULL, 2, 'शेरबहादुर देउवा', 'avc', 'राष्ट्रिय प्रजातन्त्र पार्टीका अध्यक्ष राजेन्द्र लिङदेनले लोकतन्त्रको नाममा देशमा लुटतन्त्र मच्चिरहेको बताएका छन्  । शनिबार गोरखामा आयोजति राप्रपाको चुनावी सभालाई सम्बोधन गर्दै उनले यस्तो बताएका हुन् । उनले वाइडबडी, ललिता निवासदेखि स्थानीय तहसम्म पुगेर लोकतन्त्रको ना...', '2022-11-06 16:36:10', '2022-11-07 18:35:17'),
(21, 'केपी ओलीको आरोप : वर्तमान गठबन्धन सरकार स्वाभिमान नभएको कठपुलती', 'jpg_16449.jpg', 'आम निर्वाचन ०७९', 'काठमाडौं, १९ कार्तिक । नेकपा (एमाले) का अध्यक्ष केपी शर्मा ओलीले आफ्नो पार्टी देश बनाउने स्पष्ट दृष्टिकोण, योजना र प्रतिवद्धता भएको एकमात्र पार्टी भएको बताएका', '<p style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 1.2em; font-family: mukta, sans-serif; text-align: justify; background-color: rgb(255, 255, 255);\">काठमाडौं, १९ कार्तिक । नेकपा (एमाले) का अध्यक्ष केपी शर्मा ओलीले आफ्नो पार्टी देश बनाउने स्पष्ट दृष्टिकोण, योजना र प्रतिवद्धता भएको एकमात्र पार्टी भएको बताएका छन् । प्रवासी नेपाली मञ्चको प्रथम अन्तर्राष्ट्रिय अधिवेशनको आज (शनिबार) उद्घाटन गर्दै अध्यक्ष ओलीले नेपाललाई समृद्ध र बलियो बनाउने पार्टी एमाले भएको बताएका हुन् ।</p><div class=\"dhamalako-hamala\" style=\"box-sizing: inherit; color: rgb(33, 37, 41); font-family: mukta, sans-serif; text-align: justify; background-color: rgb(255, 255, 255);\"><section class=\"widget\" style=\"box-sizing: inherit; width: 810px;\"><img width=\"710\" height=\"125\" src=\"https://i0.wp.com/www.reportersnepal.com/wp-content/uploads/2022/10/710x125-Optimized.gif?fit=710%2C125&amp;ssl=1\" class=\"image wp-image-730924  attachment-full size-full\" alt=\"\" loading=\"lazy\" style=\"box-sizing: inherit; height: auto; max-width: 100%; border-style: none; width: 810px; margin-bottom: 5px; padding: 5px;\"></section></div><p style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 1.2em; font-family: mukta, sans-serif; text-align: justify; background-color: rgb(255, 255, 255);\">उनले भने,‘नेपाललाई अहिले नीति, कार्यक्रम, योजना र प्रतिवद्धतासहितको बलियो राष्ट्रिय शक्ति चाहिएको छ र त्यो आवश्यकता एमालेले मात्र पूरा गर्न सक्छ ।’ वर्तमान गठबन्धन सरकार स्वाभिमान नभएको कठपुलती भएको वताउँदै आगामी मंसिर ४ गतेको निर्वाचनबाट यिनीहरु महाभारतमा कौरव जसरी समाप्त हुने विश्वास व्यक्त गरे ।</p><p style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 1.2em; font-family: mukta, sans-serif; text-align: justify; background-color: rgb(255, 255, 255);\">उनले मुलुक अत्यन्तै निर्णायक मोडमा रहेकाले आगामी निर्वाचनमा एमालेले बहुमत ल्याउनैपर्ने बताए । उनले भने,‘सामान्यतया अहिलेको निर्वाचनबाट एउटा पार्टीलाई बहुमत आउने सम्भावना कमै हुने भए पनि अहिले असामान्य परिस्थिति भएकाले असामान्यरुपमै एमालेले शानदार बहुमत ल्याउँछ ।’</p>', NULL, 'banner', NULL, NULL, 1, 'तराई खबर', NULL, 48, 'शेरबहादुर देउवा', 'आम निर्वाचन ०७९', 'काठमाडौं, १९ कार्तिक । नेकपा (एमाले) का अध्यक्ष केपी शर्मा ओलीले आफ्नो पार्टी देश बनाउने स्पष्ट दृष्टिकोण, योजना र प्रतिवद्धता भएको एकमात्र पार्टी भएको बताएका', '2022-11-06 16:41:18', '2022-11-12 12:27:34'),
(22, 'काठमाडौंबाट रूकुमकोट जाँदै गरेको बस त्रिशुली किनारमा खस्यो', 'jpg_11540.jpg', NULL, NULL, '<p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); background-color: rgb(255, 255, 255); text-align: justify;\">काठमाडौंबाट रूकुमकोट&nbsp;जाँदै गरेको बस त्रिशुलीमा खसेको छ।&nbsp;</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); background-color: rgb(255, 255, 255); text-align: justify;\">शनिबार राति सवा ६ बजे बेनिघाट रोराङ गाउँपालिका-१० हुग्दिखोलास्थित&nbsp;त्रिशुली किनारमा बस खसेको जिल्ला प्रहरी कार्यालय धादिङका डिएसपी श्यामबहादुर खत्रीले जानकारी दिए।</p><div class=\"meda a-item desktop-bigyaapan-only\" style=\"outline: 0px; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); background-color: rgb(255, 255, 255);\"><a href=\"https://heraldcollege.edu.np/\" title=\"invotech\" style=\"outline: 0px; margin: 0px; padding: 0px; text-decoration: none; touch-action: manipulation; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; vertical-align: baseline; transition: all 0.3s ease-in-out 0s; display: inline;\"><img src=\"https://img.setopaty.com/uploads/bigyaapan/28384000.gif\" alt=\"invotech\" class=\"pull-img-left\" style=\"outline: 0px; margin-right: 30px; padding: 0px; vertical-align: baseline; border: 0px; font: inherit; float: left; height: unset; width: 595px; margin-top: 0px !important; margin-bottom: 30px !important; margin-left: 0px !important; max-width: 824px !important;\"></a></div><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); background-color: rgb(255, 255, 255); text-align: justify;\">बा ४ ख ५७९० नम्बरको बस २०० मिटर तल खसेको खत्रीले बताए।&nbsp;</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); background-color: rgb(255, 255, 255); text-align: justify;\">दुर्घटना हुँदा चालकसहित १६&nbsp;जना घाइते छन्। उनीहरूको उपचारका लागि स्थानीय मेडिकल पठाएको छ।&nbsp;</p><div class=\"insert-ad\" style=\"outline: 0px; margin: 0px 0px 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; float: left; color: rgb(34, 34, 34); background-color: rgb(255, 255, 255);\"><div class=\"items desktop-bigyaapan-only\" style=\"outline: 0px; margin: 0px 15px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left;\"><a href=\"https://esewamoneytransfer.com/blog/MeroDigitalDesh\" title=\"Esewa\" style=\"outline: 0px; margin: 0px; padding: 0px; text-decoration: none; touch-action: manipulation; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; vertical-align: baseline; transition: all 0.3s ease-in-out 0s; display: inline;\"><img src=\"https://img.setopaty.com/uploads/bigyaapan/86186200.gif\" alt=\"Esewa\" style=\"outline: 0px; margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; vertical-align: baseline; border: 0px; font: inherit; max-width: 100%; display: block; float: left; height: unset; width: 188px; margin-bottom: 30px !important;\"></a></div><div class=\"items desktop-bigyaapan-only\" style=\"outline: 0px; margin: 0px 15px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left;\"><a href=\"https://softwarica.edu.np/\" title=\"softwarica\" style=\"outline: 0px; margin: 0px; padding: 0px; text-decoration: none; touch-action: manipulation; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; vertical-align: baseline; transition: all 0.3s ease-in-out 0s; display: inline;\"><img src=\"https://img.setopaty.com/uploads/bigyaapan/39599900.gif\" alt=\"softwarica\" style=\"outline: 0px; margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; vertical-align: baseline; border: 0px; font: inherit; max-width: 100%; display: block; float: left; height: unset; width: 188px; margin-bottom: 30px !important;\"></a></div><div class=\"items desktop-bigyaapan-only box-ad-last\" style=\"outline: 0px; margin: 0px 15px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; float: left;\"><a href=\"https://bit.ly/3uCfMXE\" title=\"nic\" style=\"outline: 0px; margin: 0px; padding: 0px; text-decoration: none; touch-action: manipulation; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; vertical-align: baseline; transition: all 0.3s ease-in-out 0s; display: inline;\"><img src=\"https://img.setopaty.com/uploads/bigyaapan/49264900.gif\" alt=\"nic\" style=\"outline: 0px; margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; vertical-align: baseline; border: 0px; font: inherit; max-width: 100%; display: block; float: left; height: unset; width: 188px; margin-bottom: 30px !important;\"></a></div></div><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); background-color: rgb(255, 255, 255); text-align: justify;\">बस त्रिशुली किनारमै रहेको प्रहरीले जनाएको छ। घटनास्थलमा इलाका प्रहरी कार्यालय गजुरीबाट डिएसपीको कमान्डमा प्रहरीको टोली खटिएको छ।</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 22px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); background-color: rgb(255, 255, 255);\">घाइतेहरूको विवरण आउन बाँकी रहेको प्रहरीले जनाएको छ।</p>', NULL, 'banneraराजनीति', NULL, NULL, 1, 'तराई खबर', NULL, 1, 'शेरबहादुर देउवा', 'vxvd', '', '2022-11-06 16:49:19', '2022-11-06 16:49:19'),
(23, 'चुनावमा सामाजिक सञ्जाल : एकतर्फी प्रचार, निगरानी कठिन', 'png_83253.png', NULL, 'यस पटक युवा मतदाता बढी भएकाले पनि दल र नेताहरूले डिजिटल चुनावी प्रचारलाई तीव्रता दिएका छन् । यस पटकको चुनावमा समग्र नतिजालाई युवा मतले फरक पार्न सक्ने विश्लेषण गरिएको छ ।', '<p style=\"margin-top: 0.2em; color: rgb(42, 42, 42); font-family: Mukta, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 1.041em !important;\">काठमाडौँ — स्थानीय तहको चुनावमा काठमाडौंको मेयरमा निर्वाचित हुन बालेन शाहले सामाजिक सञ्जालको प्रभावकारी प्रयोगमार्फत पाएको सफलतापश्चात् राजनीतिक दल र उम्मेदवारहरू सामाजिक सञ्जालमार्फत हुने विज्ञापनमा आकर्षित भएको देखिन्छ&nbsp;। शाहले विभिन्न सामाजिक सञ्जाल प्लाटफर्मलाई आफ्नो अनुकूल प्रयोग गरी सफलता हासिल गर्न सकेको भनेर विभिन्न मुख्य राजनीतिक दलका नेताहरूले नामै तोकेर उनको आलोचनासमेत गरेका थिए&nbsp;।&nbsp;</p><div class=\"image landscape\" style=\"position: relative; padding: 0.5em 0px 0px; margin: 1.5em auto 0px; text-align: center; color: rgb(42, 42, 42); font-family: Mukta, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 19.2377px;\"><figure style=\"margin-block: 0px; margin-inline: 0px; width: 698.547px;\"><img class=\"image-9603799\" alt=\"\" src=\"https://assets-cdn-api.kantipurdaily.com/thumb.php?src=https://assets-cdn.kantipurdaily.com/uploads/source/news/kantipur/2022/third-party/untitled-1-05112022120518-1000x0.jpg&amp;w=1000&amp;h=0\" style=\"max-width: 100%; height: auto;\"></figure></div><p style=\"color: rgb(42, 42, 42); font-family: Mukta, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 1.041em !important;\">केही महिनापछि हुन लागेको अहिलेको प्रतिनिधिसभा र प्रदेशसभाको निर्वाचन मिति नजिँकिदै गर्दा सामाजिक सञ्जालमा अनेक किसिमका चुनावी अभियानले तीव्रता पाइरहेका छन्&nbsp;। दल, उम्मेदवार, कार्यकर्ता तथा इन्फ्लुएन्सरहरूले चुनावी विज्ञापन र प्रचार सामग्रीहरू धमाधम पोस्ट गर्न थालेका छन् भने स्थापित र अनुभवी नेताको कामप्रति असन्तुष्ट एक जमातले ‘नो, नट अगेन’ लगायत अभियानलाई साथ दिएका छन्&nbsp;।</p>', NULL, 'मुख्य-समाच', NULL, NULL, 1, 'तराई खबर', NULL, 1, 'शेरबहादुर देउवा', 'dsd', 'यस पटक युवा मतदाता बढी भएकाले पनि दल र नेताहरूले डिजिटल चुनावी प्रचारलाई तीव्रता दिएका छन् । यस पटकको चुनावमा समग्र नतिजालाई युवा मतले फरक पार्न सक्ने विश्लेषण गरिएको छ ।', '2022-11-06 17:09:00', '2022-11-06 17:09:00');
INSERT INTO `news` (`id`, `title`, `feature_image`, `banner_tags`, `short_description`, `description`, `pradesh`, `news_type`, `video_id`, `author_name`, `status`, `created_by`, `updated_by`, `view_count`, `meta_title`, `meta_keywords`, `meta_descriptions`, `created_at`, `updated_at`) VALUES
(24, 'करको दरमा छुट दिने निर्णय २४ घण्टाभित्र बदर गर्न गण्डकी सरकारलाई निर्देशन', 'jpg_44644.jpg', NULL, NULL, '<p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 19px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(17, 17, 17); background-color: rgb(255, 255, 255); text-align: justify;\">काठमाडौं । निर्वाचन आयोगले करका दरहरू परिवर्तन गरिएको बारे गण्डकी प्रदेश सरकारलाई स्पष्टीकरण सोधेको छ । निर्वाचन आचारसंहिता लागु भइसकेको अवस्थामा प्रदेश राजपत्रमा सूचना प्रकाशित गरी करका दरहरू परिवर्तन गरेको देखिएको भन्दै स्पष्टीकरण सोधिएको हो ।</p><p style=\"outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 19px; line-height: inherit; font-family: Mukta, sans-serif; vertical-align: baseline; color: rgb(17, 17, 17); background-color: rgb(255, 255, 255); text-align: justify;\">आयोगले गण्डकी प्रदेश सरकारका मुख्यमन्त्री तथा मन्त्रिपरिषद्को कार्यालयलाई निर्णय बदर गरी जानकारी गराउन निर्देशन दिएको छ । ‘गण्डकी प्रदेश सरकारले २०७९।०६।२७ गतेको प्रदेश राजपत्र खण्ड–५, संख्या ५ मा सरकारले विभिन्न करका दरहरूमा छुट दिने गरी सूचना प्रकाशन गरेको देखिएको’ स्पष्टीकरणपत्रमा उल्लेख छ ।</p>', NULL, 'अर्थतन्त्र', NULL, NULL, 1, 'तराई खबर', NULL, 3, 'शेरबहादुर देउवा', 'xz', '', '2022-11-06 17:19:53', '2022-11-12 12:28:26'),
(25, 'बलदेव-बलराम : पूर्वसहकर्मी आमनेसामने, काे कति बलियाे ?', 'jpeg_12614.jpeg', NULL, NULL, '<p style=\"margin-bottom: 0px; font-size: 22px; line-height: 40px; text-align: justify; padding: 0px 15px 30px; color: rgb(33, 37, 41); font-family: Mukta, sans-serif;\">प्रतिनिधिसभाअन्तर्गत कपिलवस्तु–१ मा सत्तागठबन्धनका साझा उम्मेदवार चक्रपाणि खनाल (बलदेव) र एमालेका बलराम अधिकारीबीच रोचक भिडन्त हुने देखिन्छ।</p><p style=\"margin-bottom: 0px; font-size: 22px; line-height: 40px; text-align: justify; padding: 0px 15px 30px; color: rgb(33, 37, 41); font-family: Mukta, sans-serif;\">नेकपा माओवादी केन्द्रका केन्द्रीय सचिव तथा पूर्वमन्त्रीसमेत रहेका चक्रपाणि खनाल (बलदेव) र नेकपा एमालेका जिल्ला इन्चार्ज एवं संविधानसभा सदस्य बलराम अधिकारीबीच कडा भिडन्त हुने देखिएको &nbsp;हो।&nbsp;</p><p style=\"margin-bottom: 0px; font-size: 22px; line-height: 40px; text-align: justify; padding: 0px 15px 30px; color: rgb(33, 37, 41); font-family: Mukta, sans-serif;\">तीन निर्वाचन क्षेत्र रहेको कपिलवस्तुमा क्षेत्र नम्बर १ मा ‘हेबिवेट’ उम्मेदवार बलदेवलाई टक्कर दिन बलराम निर्वाचनमा होमिएका हुन्। कपिलवस्तु–१ मा दुवैतर्फका यी उम्मेदवार जिल्लामा पाका एवं हक्की नेताका रूपमा समेत परिचित &nbsp;देखिएका छन्।&nbsp;</p>', NULL, 'खेलकुद', NULL, NULL, 1, 'तराई खबर', NULL, 1, 'बलदेव-बलराम : पूर्वसहकर्मी आमनेसामने, काे कति बलियाे ?', 'बलदेव-बलराम : पूर्वसहकर्मी आमनेसामने, काे कति बलियाे ?', '', '2022-11-06 17:26:54', '2022-11-06 17:26:54'),
(26, 'शरद र रोशनीको मृत्यु विद्युतीय धरापमा परेर भएको प्रहरीको निष्कर्ष', 'jpg_7012.jpg', NULL, '१९ कात्तिक, दाङ । दाङ तुलसीपुरको दमार गाउँको जंगलमा शव भेटिएका शरद आचार्य र रोशनी महतराको मृत्यु विद्युतीय धरापमा परेर भएको प्रहरीले निश्कर्ष निकालेको छ ।', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">१९ कात्तिक, दाङ । दाङ तुलसीपुरको दमार गाउँको जंगलमा शव भेटिएका शरद आचार्य र रोशनी महतराको मृत्यु विद्युतीय धरापमा परेर भएको प्रहरीले निश्कर्ष निकालेको छ ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">गत असोज ३० गते दमार गाउँकी १५ वर्षीया रोशनी महतरा र सोही ठाउँमा बस्ने दंगीशरण गाउँपालिका–६ थपगाउँका–१४ वर्षीय शरद आचार्यको शव जंगलमा एकै ठाउँमा फेला परेको थियो । सुरुमा शव फेला पर्दा हत्या भएको हुन सक्ने प्रहरीको आशंका थियो ।</p>', NULL, 'मनोरञ्जन', NULL, NULL, 1, 'तराई खबर', NULL, 1, 'अपराध', 'नेपाल प्रहरी,अपराध', '१९ कात्तिक, दाङ । दाङ तुलसीपुरको दमार गाउँको जंगलमा शव भेटिएका शरद आचार्य र रोशनी महतराको मृत्यु विद्युतीय धरापमा परेर भएको प्रहरीले निश्कर्ष निकालेको छ ।', '2022-11-06 17:53:27', '2022-11-06 17:53:27'),
(27, 'जसपाको प्रतिबद्धतापत्र : कार्यकारी राष्ट्रपति, संविधानको पुनर्लेखन !', 'jpg_41586.jpg', NULL, 'दुई वर्षमा खाद्यान्नमा आत्मनिर्भर हुने, पाँच वर्षमा गरिबी हटाउने', 'जनता समाजवादी पार्टी नेपाले मङ्सिर ४ गते हुने प्रतिनिधिसभा र प्रदेशसभा चुनावका लागि आफ्नो प्रतिबद्धता पत्र सार्वजनिक गरेको छ । प्रतिबद्धता पत्रमा पार्टीले संविधान संशोधन, परिमार्जन तथा पुनर्लेखनको आवश्यकता औँल्याएको छ । पहिचान र सामर्थ्यको आधारमा राज्य पुनर्संरचना, शासकीय स्वरूप, निर्वाचन प्रणाली तथा न्याय प्रणालीमा परिवर्तन आवश्यक रहेको जिकिर गरेको हो ।', NULL, 'जीवनशैली', NULL, NULL, 1, 'तराई खबर', NULL, 1, 'जसपाको प्रतिबद्धतापत्र : कार्यकारी राष्ट्रपति, संविधानको पुनर्लेखन !', 'जसपाको प्रतिबद्धतापत्र : कार्यकारी राष्ट्रपति, संविधानको पुनर्लेखन !', 'दुई वर्षमा खाद्यान्नमा आत्मनिर्भर हुने, पाँच वर्षमा गरिबी हटाउने', '2022-11-06 18:03:36', '2022-11-06 18:03:36'),
(28, 'जसपाको प्रतिबद्धतापत्र : कार्यकारी राष्ट्रपति, संविधानको पुनर्लेखन !', 'jpg_27171.jpg', NULL, 'दुई वर्षमा खाद्यान्नमा आत्मनिर्भर हुने, पाँच वर्षमा गरिबी हटाउने', 'जनता समाजवादी पार्टी नेपाले मङ्सिर ४ गते हुने प्रतिनिधिसभा र प्रदेशसभा चुनावका लागि आफ्नो प्रतिबद्धता पत्र सार्वजनिक गरेको छ । प्रतिबद्धता पत्रमा पार्टीले संविधान संशोधन, परिमार्जन तथा पुनर्लेखनको आवश्यकता औँल्याएको छ । पहिचान र सामर्थ्यको आधारमा राज्य पुनर्संरचना, शासकीय स्वरूप, निर्वाचन प्रणाली तथा न्याय प्रणालीमा परिवर्तन आवश्यक रहेको जिकिर गरेको हो ।', NULL, 'अन्तर्वार्ता', NULL, NULL, 1, 'तराई खबर', NULL, 4, 'जसपाको प्रतिबद्धतापत्र : कार्यकारी राष्ट्रपति, संविधानको पुनर्लेखन !', 'जसपाको प्रतिबद्धतापत्र : कार्यकारी राष्ट्रपति, संविधानको पुनर्लेखन !', 'दुई वर्षमा खाद्यान्नमा आत्मनिर्भर हुने, पाँच वर्षमा गरिबी हटाउने', '2022-11-06 18:05:11', '2022-11-12 12:35:30'),
(29, 'जसपा अध्यक्ष यादवको प्रचार प्रसार गर्ने चिकित्सकलाई आयोगको स्पष्टिकरण', 'jpg_5909.jpg', NULL, 'जसपाका अध्यक्ष एवं सप्तरीका उम्मेदवार उपेन्द्र यादवको प्रचार गरेको बारे रामराजाप्रसाद सिंह प्रतिष्ठानका कार्यकारी निर्देशक डा. रन्जितकुमार सिंहलाई निर्वाचन आयोगले स्पष्टीकरण सोधेको छ ।', 'जसपाका अध्यक्ष एवं सप्तरीका उम्मेदवार उपेन्द्र यादवको प्रचार गरेको बारे रामराजाप्रसाद सिंह प्रतिष्ठानका कार्यकारी निर्देशक डा. रन्जितकुमार सिंहलाई निर्वाचन आयोगले स्पष्टीकरण सोधेको छ । \r\n\r\n\r\nयादवले सेयर गरेको फेसबुक पेजमा डा. झाले गरेको प्रचार प्रसार बारे २४ घण्टाभित्र स्पष्टीकरण दिन आयोगले निर्देशन दिएको छ ।\r\n\r\n\r\nनिर्वाचन आयोगले एमालेबाट दाङकी उम्मेदवार कोमल ओलीलाई पनि स्पष्टीकरण सोधेको छ । उनले स्थानीय एक  विद्यालयमा विद्यार्थीहरूलाई टिफिन टाइममा पार्टीको प्रचार गरेको आरोप छ ।', NULL, 'पर्यटन', NULL, NULL, 1, 'तराई खबर', NULL, 1, 'जसपा अध्यक्ष यादवको प्रचार प्रसार गर्ने चिकित्सकलाई आयोगको स्पष्टिकरण', 'जसपा अध्यक्ष यादवको प्रचार प्रसार गर्ने चिकित्सकलाई आयोगको स्पष्टिकरण', 'जसपाका अध्यक्ष एवं सप्तरीका उम्मेदवार उपेन्द्र यादवको प्रचार गरेको बारे रामराजाप्रसाद सिंह प्रतिष्ठानका कार्यकारी निर्देशक डा. रन्जितकुमार सिंहलाई निर्वाचन आयोगले स्पष्टीकरण सोधेको छ ।', '2022-11-06 18:08:35', '2022-11-06 18:08:35'),
(30, 'कलाकारले राजनीतिकर्मीबाट अभिव्यक्ति स्वतन्त्रताको ग्यारेन्टी खोजिरहेका छन् : नीर शाह', 'jpg_80220.jpg', 'नीर शाह', NULL, 'काठमाडौं । बरिष्ठ फिल्म निर्देशक तथा अभिनेता नीर शाहले राजनीतिकर्मीबाट कलाकारले अभिव्यक्ति स्वतन्त्रताको ग्यारेन्टी खोजिरहेको बताएका छन् ।\r\n\r\nनेपाली कांग्रेसले चलाएको निर्वाचन संवादमा कुरा गर्दै शाहले संगीत, नाटक र चलचित्र क्षेत्रका मान्छेहरु निरकुंशताको पक्षमा उभिन नसक्ने बताए ।', NULL, 'विचार', NULL, NULL, 1, 'तराई खबर', NULL, 1, 'कलाकारले राजनीतिकर्मीबाट अभिव्यक्ति स्वतन्त्रताको ग्यारेन्टी खोजिरहेका छन् : नीर शाह', 'कलाकारले राजनीतिकर्मीबाट अभिव्यक्ति स्वतन्त्रताको ग्यारेन्टी खोजिरहेका छन् : नीर शाह', '', '2022-11-06 18:14:34', '2022-11-06 18:14:34'),
(31, 'विश्व–अग्निको एउटै नियति : आफ्नैसँग डर', 'jpg_47267.jpg', 'स्थलगत झापा– १', 'एमालेभित्रको मत सजिलै तान्न सक्छौं भन्ने जुन कफिन्डेन्स झापा १ का कांग्रेस नेता कार्यकर्तामा छ, त्यो विश्वास आफ्नै मत जोगाउँछौं भन्नेमा चाहिं छैन । ठ्याक्कै यही अवस्था एमालेमा पनि छ । त्यसैले विश्व र अग्निको चुनावी परिणाम पार्टीभित्रको मत कति जोगाउन सक्छन् भन्नेमा भर पर्छ ।', '२० कात्तिक, धुलाबारी (झापा) । झापामा कांग्रेस मात्रै होइन, गैरकांग्रेस वृत्तमा पनि एउटा भनाइ चर्चित छ, नेताहरु कृष्णप्रसाद सिटौला र विश्वप्रकाश शर्मा दिनभर आफ्नो निर्वाचन क्षेत्रमा केन्द्रित हुन्छन्, रात परेपछि एकअर्काको निर्वाचन क्षेत्रमा जान्छन् । यो भनाइ उनीहरु एक अर्काको निर्वाचन क्षेत्रमा आपसमा सघाउन र एकअर्कालाई बलियो बनाउन यसो गर्छन् भन्ने सन्दर्भमा आएको हैन । बरु निर्वाचनमा एकअर्कालाई कसरी पराजित गर्ने भन्ने प्रसंगमा झापाभित्र यो भनाइ चर्चित भएको हो ।\r\n\r\nयसपालि पनि निर्वाचन क्षेत्र जोडिएको झापा १ र ३ मा नेपाली कांग्रेसबाट उनै विश्वप्रकाश शर्मा र कृष्णप्रसाद सिटौला उम्मेदवार छन् । २०५१ को उपनिर्वाचनपछि झापा ३ मा निरन्तर चुनाव लडिरहेका सिटौला क्षेत्र नम्बर ३ मा यसपटक मलाई अन्तिम भोट दिनुस् भनेर भोट माग्दै गर्दा झापा १ मा विश्वप्रकाश शर्मा हारको ह्याट्रिक टार्न चाहन्छन् ।', NULL, 'तराई-खबर-स्पेसल', NULL, NULL, 1, 'तराई खबर', NULL, 3, 'विश्व–अग्निको एउटै नियति : आफ्नैसँग डर', 'विश्व–अग्निको एउटै नियति : आफ्नैसँग डर', 'एमालेभित्रको मत सजिलै तान्न सक्छौं भन्ने जुन कफिन्डेन्स झापा १ का कांग्रेस नेता कार्यकर्तामा छ, त्यो विश्वास आफ्नै मत जोगाउँछौं भन्नेमा चाहिं छैन । ठ्याक्कै यही अवस्था एमालेमा पनि छ । त्यसैले विश्व र अग्निको चुनावी परिणाम पार्टीभित्रको मत कति जोगाउन सक्छन् भन्नेमा भर पर्छ ।', '2022-11-07 09:27:17', '2022-11-12 12:35:22'),
(32, '‘मङ्सिर ४ पछि माधव नेपालको पार्टी कार्यालय उठ्नेवाला छ’', 'jpg_24406.jpg', NULL, '​कांग्रेसले ४५ सिट जित्छौँ भनेको छ : विष्णु रिमाल (भिडियोसहित)', 'प्राविधिक र सैद्धान्तिक ज्ञानका जानकार रहेका नेकपा एमालेका उपमहासचिव विष्णु रिमाल पार्टी सङ्गठन निर्माणमा बाहिरी रूपमा त्यति धेरै नदेखिए पनि आन्तरिक हिसाब किताब र अन्तरपार्टी जोडघटाउमा व्यस्त रहन्छन् । उनै रिमालसहितको नेतृत्वले झन्डै चार महिना लगाएर लेखेको एमालेको घोषणापत्र बोकेर एमालेका उम्मेदवारहरू मत माग्न हिँडिसकेका छन् । \r\n\r\n\r\nएमाले नेताहरूले आगामी निर्वाचनमा १५० सिटसहित बहुमत ल्याउने दाबीसमेत गरेको अवस्थामा त्यसको बस्तुगत धरातल के छ ? एमालेमा एकसेएक नेता हुँदाहुँदै भावी प्रधानमन्त्रीमा अध्यक्ष ओली नै किन ? लगायतका प्रश्न रातोपाटीले नेता रिमाललाई सोधेको छ । प्रस्तुत छ फणिन्द्र नेपाल र शिव सत्यालले रिमालसँग गरेको कुराकानी :', NULL, 'राजनीति', NULL, NULL, 1, 'तराई खबर', NULL, 2, '‘मङ्सिर ४ पछि माधव नेपालको पार्टी कार्यालय उठ्नेवाला छ’', '‘मङ्सिर ४ पछि माधव नेपालको पार्टी कार्यालय उठ्नेवाला छ’', '​कांग्रेसले ४५ सिट जित्छौँ भनेको छ : विष्णु रिमाल (भिडियोसहित)', '2022-11-07 10:03:42', '2022-11-12 12:36:59'),
(33, 'प्रचण्डले ल्याए गोरखाका लागि रणनीतिक महत्वका ४५ योजना', 'jfif_16827.jfif', NULL, NULL, 'नेकपा माओवादी केन्द्रका अध्यक्ष पुष्पकमल दाहाल‘प्रचण्ड’ गोरखा क्षेत्र नम्बर २ का लागि ४५ रणनीतिक महत्वका योजना अघि सारेका छन् । गोरखा २ का उम्मेदवार प्रचण्डले गोरखाली जनता पक्षमा ४५ रणनीतिक योजनासहित प्रतिवद्धतापत्र सार्वजनिक गरेका हुन् । \r\n\r\n\r\nगोरखा २ अन्तर्गत पर्ने सडक, शिक्षा, स्वास्थ्य, पर्यटन प्रवर्द्धन, कृषि, जडिबुटी, व्यावसायिक पशुपालन, सीपमुलक तालिम, साहित्य कला संस्कृतिको संरक्षण गर्ने भन्दै प्रतिवद्धता पत्र सार्वजनिक गरेका छन् । गोरखाबाटै आर्थिक विकास निर्माण र समृद्धिको सुरुवात हुने प्रचण्डको भनाई छ ।', NULL, 'अर्थतन्त्र', NULL, NULL, 1, 'तराई खबर', NULL, 2, 'प्रचण्डले ल्याए गोरखाका लागि रणनीतिक महत्वका ४५ योजना', 'प्रचण्डले ल्याए गोरखाका लागि रणनीतिक महत्वका ४५ योजना', '', '2022-11-07 10:06:24', '2022-11-07 10:07:54'),
(34, 'शेखर–लालबाबुको क्षेत्रका मतदाताको गुनासो : न मन्दिर बन्यो न शौचालय !', 'jpg_82599.jpg', NULL, 'नागरिकता नहुँदा कतिपय व्यक्ति भोट हाल्नबाट वञ्चित', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">विराटनगर उपमहानगर–४ खारजी कोहबरा सुकुमबासी टोलका हिरालाल ऋषिदेवले ३ वर्ष पहिले शौचालय बनाउन भनेर इँटा ल्याए । तर, अर्काको जग्गामा बसेका उनलाई जग्गाधनीले पक्की शौचालय बनाउन दिएनन् ।&nbsp;<br>मंसिर ४ गते निर्वाचनले हिरालालको टोलमा पनि घर घरमा झण्डा टाँग्ने होडबाजी चलेको छ । आइतबार बिहानै सीके राउतका राष्ट्रिय जनमत पार्टीका कार्यकर्ताले चुनावचिन्ह अंकित झण्डा टोलै भरी छोडेर हिँडेका छन् ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"flex-paraAd paraAd\" style=\"margin: 0px 0px 30px; padding: 0px 0px 1em; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(204, 204, 204); border-left-color: initial; border-image: initial; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); display: flex; flex-direction: row; height: 270px; float: left; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://tatacars.sipradi.com.np/inquiry2?utm_source=Ratopati&amp;utm_medium=Online&amp;utm_campaign=NexonNo1&amp;utm_id=MA_NexonNo1\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 lazy-hidden\" data-src=\"https://ratopatis.prixacdn.net/media/250x250_4.gif\" src=\"https://ratopatis.prixacdn.net/media/250x250_4.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.984px; width: 250px; object-fit: cover;\"></a></div></div><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">हजुरबाको पालादेखि कुनै एक पार्टीमा भोट हालेको बताउने&nbsp;मोरङ निर्वाचन क्षेत्र नम्बर –६ ​का उनले मात्र आश्वासनका पोका सधैँजसो सुनिरहेका छन् । तर, उनको टोलमा शौचालय बनाउने, पक्की बाटो बनाउने कुरा त परै जाओस्, आफ्नो समुदायको आस्थाको धरोहर दिनाभद्री मन्दिरका लागि सानो छाप्रो बनाउन समेत सकेका छैनन् ।&nbsp;</p>', NULL, 'अर्थतन्त्र', NULL, NULL, 1, 'तराई खबर', NULL, 1, 'शेरबहादुर देउवा', 'adsads', 'नागरिकता नहुँदा कतिपय व्यक्ति भोट हाल्नबाट वञ्चित', '2022-11-07 18:14:22', '2022-11-07 18:14:22'),
(35, 'ललितपुरमा दुई सय ९० मतदान केन्द्र', 'jpg_5213.jpg', NULL, NULL, 'ङ्सिर ४ गते हुने प्रतिनिधिसभा र प्रदेशसभा निर्वाचनका लागि ललितपुरमा दुई सय ९० मतदान केन्द्र निर्धारण गरिएको छ ।\r\n\r\n\r\nनिर्वाचन कार्यालय ललितपुरका अनुसार दुई सय ९० मतदान केन्द्रमा एक सय ३१ मतदानस्थल र दुई वटा अस्थायी मतदान केन्द्र छनोट गरिएको छ । ललितपुरमा कूल दुई लाख ५० हजार चार सय १० मतदाता छन् ।  निर्वाचन कार्यालयसँगको समन्वयमा मतदान अधिकृत, सहायक मतदान अधिकृतलगायत अन्य कर्मचारीको व्यवस्थापनको काम अन्तिम चरणमा पुगेको प्रमुख जिल्ला अधिकारी जयनारायण आचार्यले बताए ।', NULL, 'विचार', NULL, 'Suresh Bohara', 1, 'तराई खबर', NULL, 2, 'ललितपुरमा दुई सय ९० मतदान केन्द्र', 'ललितपुरमा दुई सय ९० मतदान केन्द्र', '', '2022-11-07 18:18:11', '2022-11-07 18:49:56'),
(36, 'म एक्लो देखिएँ हुँला, तर निरन्तर प्रश्न उठाइराख्ने छु', 'jpg_90044.jpg', NULL, '‘तत्काललाई म एक्लै देखिएको हुँला, तर गलत कार्य र प्रवृत्तिविरुद्ध निरन्तर प्रश्न उठाइराख्ने छु । नागरिकलाई आफ्ना प्रश्नहरु उठाइदिने र त्यसको जवाफ खोज्ने प्रतिनिधि चाहिन्छ । मैले पहिलेदेखि नै लड्न चाहेको क्षेत्रमा आएर चुनाव लड्दै छु ।’', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif; text-align: justify;\">९ कात्तिक, रुपन्देही ।&nbsp;काठमाडाैं र अन्यत्रको पहिचान अलग्गै होला, तर चुनावी घरदैलो र संयुक्त कार्यक्रमहरूमा घनश्याम भूसाललाई वाम लोकतान्त्रिक गठबन्धनका साझा उम्मेदवार भनी चिनाइन्छ । एमालेमा अध्यक्ष केपी ओलीसँग लामो अन्तरसंघर्षबीच भूसालले आसन्न चुनावका लागि टिकट पाएनन् । त्यसपछि उनले अपमानकाे लामो शृंखलामा बिराम लगाएको घोषणा गर्दै पार्टी त्यागे ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif; text-align: justify;\">हाल उनको चुनाव चिह्न कायम भएको छ त्रिभुज । कांग्रेस, माओवादी, एकीकृत समाजवादी र जनमाेर्चाले खडा गरेका उम्मेदवार भूसाललाई स्थानीय स्तरमा जनमुक्ति पार्टीले पनि साथ दिने घोषणा गरेको छ । एमाले उम्मेदवार छविलाल विश्वकर्मासँग रुपन्देही-१ बाट प्रतिष्पर्धा गरिररहेका भूसाललाई हामीले तिलाेत्तमाका विभिन्न ठाउँमा पछ्यायाै‌ं । त्यसपछि भएको यो अन्तर्वार्तामा उनले आफ्नाे चुनावी माहोल तथा आगामी यात्राको बारेमा खुलेर बोले ।</p>', NULL, 'अन्तर्वार्ता', NULL, NULL, 1, 'तराई खबर', NULL, 2, 'म एक्लो देखिएँ हुँला, तर निरन्तर प्रश्न उठाइराख्ने छु', 'म एक्लो देखिएँ हुँला, तर निरन्तर प्रश्न उठाइराख्ने छु', '‘तत्काललाई म एक्लै देखिएको हुँला, तर गलत कार्य र प्रवृत्तिविरुद्ध निरन्तर प्रश्न उठाइराख्ने छु । नागरिकलाई आफ्ना प्रश्नहरु उठाइदिने र त्यसको जवाफ खोज्ने प्रतिनिधि चाहिन्छ । मैले पहिलेदेखि नै लड्न चाहेको क्षेत्रमा आएर चुनाव लड्दै छु ।’', '2022-11-07 18:22:19', '2022-11-07 18:23:26'),
(37, 'एमालेमा नवप्रवेशीलाई प्राथमिकता, वाम तालमेल भन्नेहरू रिङआउट', 'jpg_72970.jpg', NULL, '२९ असोज, काठमाडौं । प्रतिनिधिसभा सदस्यको टिकटतिर लागेकै कारण राष्ट्रियसभा सदस्य पद गुमाएका खिमलाल भट्टराई, अहिले नेकपा एमालेका उम्मेदवार जिताउने अभियानमा खटिएका छन्', '<p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">९ असोज, काठमाडौं । प्रतिनिधिसभा सदस्यको टिकटतिर लागेकै कारण राष्ट्रियसभा सदस्य पद गुमाएका खिमलाल भट्टराई, अहिले नेकपा एमालेका उम्मेदवार जिताउने अभियानमा खटिएका छन् । रुपन्देही क्षेत्र नम्बर ५ मा उनलाई एमालेले चुनाव परिचालन कमिटीको कमाण्डर बनाएको छ ।</p><p style=\"font-size: 22px; margin-right: 0px; margin-bottom: 28px; margin-left: 0px; line-height: 1.8; font-family: mukta, sans-serif;\">चुनाव परिचालनको नेतृत्व लिएकाले एमाले उम्मेदवार वासुदेव घिमिरेलाई जिताउनु भट्टराईको मूल दायित्व हो । जबकी केही दिन अगाडिसम्म उनी आफैं यो क्षेत्रका निर्विरोध उम्मेदवार थिए । एमाले पोलिटब्यूरो सदस्य भट्टराईको नाम निर्वाचन क्षेत्रीय कमिटी, जिल्ला कमिटी र प्रदेश कमिटीले सर्वसहमत रुपमा एकल सिफारिस गरेको थियो । तर उम्मेदवारी दर्ता हुने (२३ असोजमा) अघिल्लो साँझ उनको निर्वाचन क्षेत्रबाट तिलोत्तमा नगरका पूर्वमेयर घिमिरेले टिकट पाए ।</p>', NULL, 'अन्तर्वार्ता', NULL, NULL, 1, 'तराई खबर', NULL, 4, 'एमालेमा नवप्रवेशीलाई प्राथमिकता, वाम तालमेल भन्नेहरू रिङआउट', 'एमालेमा नवप्रवेशीलाई प्राथमिकता, वाम तालमेल भन्नेहरू रिङआउट', '२९ असोज, काठमाडौं । प्रतिनिधिसभा सदस्यको टिकटतिर लागेकै कारण राष्ट्रियसभा सदस्य पद गुमाएका खिमलाल भट्टराई, अहिले नेकपा एमालेका उम्मेदवार जिताउने अभियानमा खटिएका छन्', '2022-11-07 18:27:16', '2022-11-07 18:32:59'),
(38, 'समाचार हटाउने निर्देशनबाट आयोग पछि हट्यो,काउन्सिलले सेतोपाटीलाई सोध्यो २४ घण्टे स्पष्टीकरण', 'jfif_27794.jfif', NULL, 'काठमाडौँ — निर्वाचन आयोगले समाचार हटाउनका लागि सेतोपाटी अनलाईनलाई दिएको निर्देशन फिर्ता लिएको छ । प्रमुख निर्वचन आयुक्त दिनेश थपलिया काठमाडौ बाहिर रहेका बेला आयुक्त रामप्रसाद भण्डारीले क्षेत्राधिकार बाहिर गएर झापा-१ का एमाले उम्मेवार अग्नि खरेलका छोराबारे लेखिएको समाचार हटाउन निर्देशन दिएका थिए ।', '<p style=\"color: rgb(42, 42, 42); font-family: Mukta, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 1.041em !important;\">संचार माध्यम अनुगमनको काम हाम्रो होइन सम्बन्धित निकायले नै गर्छ\' प्रमुख आयुक्त थपलियाले कान्तिपुरसँग भने,\'आयोगको निर्णयमा भएको कमजोरी आयोगले सच्चाएको छ, उक्त निर्णय कार्यान्वयन हुँदैन&nbsp;।\'<br></p><div class=\"ekans-wrapper\" style=\"margin-top: 20px; margin-bottom: 20px; color: rgb(42, 42, 42); font-family: Mukta, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 19.2377px;\"><div class=\"ekans-row\" style=\"display: flex; width: 698.547px; align-items: center; justify-content: center;\"><div class=\"ekans-col portrait\" style=\"padding: 10px;\"><a href=\"https://bit.ly/3sWckoO\" target=\"_blank\" style=\"cursor: pointer; text-decoration: none; color: rgb(34, 34, 34); transition: all 0.3s ease-in 0s;\"><img src=\"https://assets-cdn.kantipurdaily.com/uploads/source/ads/250x250-04112022020836.gif\" style=\"max-width: 100%; height: auto; background: rgb(221, 221, 221);\"></a></div><div class=\"ekans-col portrait\" style=\"padding: 10px;\"><a href=\"https://www.facebook.com/slsbry/\" target=\"_blank\" style=\"cursor: pointer; text-decoration: none; color: rgb(34, 34, 34); transition: all 0.3s ease-in 0s;\"><img src=\"https://assets-cdn.kantipurdaily.com/uploads/source/ads/250-x-250-px-kantipur-06112022105904.jpg\" style=\"max-width: 100%; height: auto; background: rgb(221, 221, 221);\"></a></div></div></div><p style=\"color: rgb(42, 42, 42); font-family: Mukta, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 1.041em !important;\">आयुक्त भण्डारीले गरेको उक्त निर्णय र निर्देशन विवादमा परेपछि आइतबार झापाबाट काठमाडौं फर्केर प्रमुख आयुक्त थपलियाले शनिबारको निर्णय फिर्ता गरेका हुन्&nbsp;।</p><p style=\"color: rgb(42, 42, 42); font-family: Mukta, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 1.041em !important;\">स्रोतका अनुसार निर्णय विवादमा परेपछि शनिबार राती नै आयोगका पदाधिकारी र कर्मचारीहरुको आयोग कार्यालयमा लामो बैठक बसेको थियो&nbsp;। तर भण्डारी आफ्नो निर्णयबाट पछि नहट्ने अडान लिएका थिए&nbsp;। आइतबार राजधानी फर्केपछि प्रमुख आयुक्त थपलियाले सार्वजनिक कार्यक्रमबाटै निर्णय सच्याउने बताएका थिए&nbsp;। त्यसपछि आइतबार साँझ बसेको बैठकले निर्णय कार्यान्वयन नगर्ने निर्णय गरेको हो&nbsp;। आयोगले निर्णय नसच्याए उक्त निर्णयविरुद्ध सेतोपाटीले अदालत जाने बताएको थियो&nbsp;।</p>', NULL, 'banner', NULL, NULL, 1, 'तराई खबर', NULL, 3, 'समाचार हटाउने निर्देशनबाट आयोग पछि हट्यो,काउन्सिलले सेतोपाटीलाई सोध्यो २४ घण्टे स्पष्टीकरण', 'समाचार हटाउने निर्देशनबाट आयोग पछि हट्यो,काउन्सिलले सेतोपाटीलाई सोध्यो २४ घण्टे स्पष्टीकरण', 'काठमाडौँ — निर्वाचन आयोगले समाचार हटाउनका लागि सेतोपाटी अनलाईनलाई दिएको निर्देशन फिर्ता लिएको छ । प्रमुख निर्वचन आयुक्त दिनेश थपलिया काठमाडौ बाहिर रहेका बेला आयुक्त रामप्रसाद भण्डारीले क्षेत्राधिकार बाहिर गएर झापा-१ का एमाले उम्मेवार अग्नि खरेलका छोराबारे लेखिएको समाचार हटाउन निर्देशन दिएका थिए ।', '2022-11-07 18:48:42', '2022-11-12 12:33:20'),
(39, 'सत्तारुढ गठबन्धनका उम्मेदवारहरूलाई विजयी गराउन प्रचण्डको अपील', 'jpg_15004.jpg', NULL, 'नेकपा (माओवादी केन्द्र)का अध्यक्ष एवम् पूर्वप्रधानमन्त्री पुष्पकमल दाहाल ‘प्रचण्ड’ ले सत्तारुढ गठबन्धनका उम्मेदवारहरूलाई अत्याधिक मतका साथ विजयी गराउन अपील गरेका छन्', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">नेकपा (माओवादी केन्द्र)का अध्यक्ष एवम् पूर्वप्रधानमन्त्री पुष्पकमल दाहाल ‘प्रचण्ड’ ले सत्तारुढ गठबन्धनका उम्मेदवारहरूलाई अत्याधिक मतका साथ विजयी गराउन अपील गरेका छन् । शनिबार चितवनमा आयोजित सत्तारुढ गठबन्धनको चुनावी सभामा बोल्दै अध्यक्ष दाहालले गठबन्धनका उम्मेदवारहरूलाई अत्याधिक मतका साथ विजयी गराउन अपील गरेका हुन ।&nbsp;</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"flex-paraAd paraAd\" style=\"margin: 0px 0px 30px; padding: 0px 0px 1em; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(204, 204, 204); border-left-color: initial; border-image: initial; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); display: flex; flex-direction: row; height: 270px; float: left; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://tatacars.sipradi.com.np/inquiry2?utm_source=Ratopati&amp;utm_medium=Online&amp;utm_campaign=NexonNo1&amp;utm_id=MA_NexonNo1\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250x250_4.gif\" src=\"https://ratopatis.prixacdn.net/media/250x250_4.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.986px; width: 249.991px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div></div><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">प्रतिगामी र अवसरवादी तत्वहरुले फेरि मुलुकमा राजनीतिक दुर्घटना निम्त्याउन नदिन पनि आम मतदाताले आसन्न प्रतिनिधिसभा र प्रदेश सभा निर्वाचनमा सत्तारुढ गठबन्धनका उम्मेदवारहरूलाई विजयी गराउनुपर्ने उनको भनाई थियो । अध्यक्ष दाहालले फेरि प्रतिगमनले टाउको उठाउन नपाउने गरी नेपाली जनताले निर्वाचनमा एकता प्रदर्शन गर्नुपर्ने धारणा समेत राखे । निर्वाचनलाई अग्रगमन रोज्ने र कि प्रतिगमन रोज्ने जनमत संग्रहको रुपमा अर्थ्याउँदै उनले नेपाली जनताले अग्रगमनको पक्षमा मतदान गर्ने विश्वास समेत व्यक्त गरे ।</p>', NULL, 'banner', NULL, NULL, 1, 'तराई खबर', NULL, 3, 'सत्तारुढ गठबन्धनका उम्मेदवारहरूलाई विजयी गराउन प्रचण्डको अपील', 'गठबन्धनका,सत्तारुढ,प्रचण्डको', 'नेकपा (माओवादी केन्द्र)का अध्यक्ष एवम् पूर्वप्रधानमन्त्री पुष्पकमल दाहाल ‘प्रचण्ड’ ले सत्तारुढ गठबन्धनका उम्मेदवारहरूलाई अत्याधिक मतका साथ विजयी गराउन अपील गरेका छन्', '2022-11-12 12:32:13', '2022-11-12 12:36:01'),
(40, 'अनिल भर्सेस जुलीमा विमलेन्द्र फ्याक्टर !', 'jpg_87175.jpg', NULL, 'मङ्सिर ४ गतेको चुनाव जतिजति नजिकिँदै छ, धनुषा–३ नम्बर क्षेत्रमा दबाब त्यति नै बढी रहेको छ । हरेक चुनावमा चर्चामा रहने धनुषा–३ लाई यसपटक पनि चासोका साथ हेरिएको छ  ।', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">मङ्सिर ४ गतेको चुनाव जतिजति नजिकिँदै छ, धनुषा–३ नम्बर क्षेत्रमा दबाब त्यति नै बढी रहेको छ । हरेक चुनावमा चर्चामा रहने धनुषा–३ लाई यसपटक पनि चासोका साथ हेरिएको छ&nbsp; ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"flex-paraAd paraAd\" style=\"margin: 0px 0px 30px; padding: 0px 0px 1em; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(204, 204, 204); border-left-color: initial; border-image: initial; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); display: flex; flex-direction: row; height: 270px; float: left; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"flex-image\" style=\"margin: 0px 20px 0px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; flex: 1 1 0%; overflow: hidden; width: 250px;\"><a href=\"https://tatacars.sipradi.com.np/inquiry2?utm_source=Ratopati&amp;utm_medium=Online&amp;utm_campaign=NexonNo1&amp;utm_id=MA_NexonNo1\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; width: 100%;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/250x250_4.gif\" src=\"https://ratopatis.prixacdn.net/media/250x250_4.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: 0px; padding: 0px; outline: 0px; background: 0px 0px; height: 242.986px; width: 249.991px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn;\"></a></div></div><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">मधेस प्रदेशको राजधानी सोही क्षेत्रमा पर्ने भएको हुनाले त्यहाँ चुनाव जित्नका लागि दलहरूको बीचमा निकै कडा प्रतिस्पर्धा हुने देखिएको छ । सो क्षेत्रमा प्रतिनिधि सभा सदस्यका लागि ३१ जना प्रतिस्पर्धामा छन् । त्यसमध्ये २१ जना त स्वतन्त्र उम्मेदवार नै छन् ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.laxmibank.com/deposit/fixed-deposit/#recurring-deposit\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" src=\"https://ratopatis.prixacdn.net/media/810_x_100_1_new.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\"><span style=\"font-weight: 700; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px;\">को–को छन् प्रतिस्पर्धामा ?</span></p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.nabilbank.com/individual\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/885X90_4.gif\" src=\"https://ratopatis.prixacdn.net/media/885X90_4.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">नेकपा एमालेबाट जुली महतो, राप्रपाबाट रामपदारथ साह तेली, लोसपाबाट अनिलकुमार झा, जनमत पार्टीबाट शम्भु साह, राप्रपा नेपालबाटबाट हुसैन कवारी, बहुजन एकता पार्टी नेपालबाट लक्ष्मी मण्डल खत्वे, नेपाल जनता पार्टीबाट पुनम चौधरी, इतिहासिक प्रजातन्त्रिक जनता पार्टी नेपालबाट प्रविणकुमारी ठाकुर, राष्ट्रिय स्वतन्त्र पार्टीबाट रञ्जित परियारले प्रतिनिधि सभाका लागि प्रतिस्पर्धामा छन् ।</p><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1em; margin-bottom: 1em; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><div class=\"row paraAd detailbannerAd \" style=\"margin: 0px -15px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify;\"><div class=\"col-md-12\" style=\"margin: 0px; padding: 0px 15px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px; position: relative; min-height: 1px; float: left; width: 840px;\"><a class=\"inline_disp\" href=\"https://www.sanimabank.com/products/accounts--deposits/sanima-family-super-saving\" target=\"_blank\" style=\"background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(75, 74, 74); text-decoration: none; -webkit-tap-highlight-color: transparent; font-weight: 500; margin-top: 7px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; transition: all 0.2s ease 0s; float: left; display: block; width: 810px; margin-right: 10px !important;\"><img class=\"inline_disp__image1 animated fadeIn\" data-src=\"https://ratopatis.prixacdn.net/media/Family-Super-Saving_885x90px.gif\" src=\"https://ratopatis.prixacdn.net/media/Family-Super-Saving_885x90px.gif\" style=\"border: 0px; vertical-align: bottom; max-width: 100%; margin: -15px 0px 10px; padding: 0px; outline: 0px; background: 0px 0px; width: 810px; object-fit: cover; animation-duration: 1s; animation-fill-mode: both; animation-name: fadeIn; min-width: 100%; height: auto !important;\"></a></div></div><hr style=\"box-sizing: content-box; height: 1px; margin-top: 1px; margin-bottom: 1px; border-top-color: rgb(204, 204, 204); padding: 0px; color: rgb(75, 74, 74); font-family: &quot;Ek Mukta&quot;, sans-serif; font-size: 26.026px; letter-spacing: 0.5px; text-align: justify; background-color: rgb(255, 255, 255);\"><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">पूजा साह, सत्यनारायण शाह, बैदेही रमण ठाकुर, त्रिदेवकुमार मिश्र, मो.जासिम नदाफ, मातृकाप्रसाद दास, श्यामकिशोर साह, अरविन्दकुमार पासवान, अनिलकुमार यादव, अजयकुमार यादव, राजकुमार साह, उमेश साह, मिलनकुमारी शाह, चन्द्र शेखर साह, शिलकान्त झा, उमेश चौधरी, ज्योति कुमारी साह, जीवन कुमारी साह तेली, सुनिलकुमार कर्ण, अमरेन्द्र कण्ठ र कृष्ण यादवले स्वतन्त्र उम्मेदवारी दिएका छन् ।</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\"><span style=\"font-weight: 700; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px;\">झा र महतोबीच मुख्य प्रतिस्पर्धा</span></p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">यति धेरै उम्मेदवार भएपनि धनुषा–३ मा दुई गठबन्धन बीचमा प्रतिस्पर्धा हुने देखिएको छ । सत्ता गठबन्धनको तर्फबाट लोकतान्त्रिक समाजवादी पार्टी नेपालका कार्यकारिणी सदस्य अनिलकुमार झाले उम्मेदवारी दिएका छन् भने जसपा–एमाले गठबन्धनको तर्फबाट एमालेकी नेतृ जुली महतोले उम्मेदवारी दिएकी छन् ।</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">दुई जना नेता नै हेभीवेट मानिन्छन् । वैशाखमा सम्पन्न स्थानीय तहको चुनावमा प्राप्त मतको हिसाबले सत्ता गठबन्धनका साझा उम्मेदवार अनिलकुमार झाले निकै अगाडि देखिन्छन् । महतोसँग दुई दलको मत मात्र भए पनि उनले झालाई कडा टक्कर दिइरहेकी छन् ।</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; line-height: 1.8em; letter-spacing: 0.5px; border: 0px; outline: 0px; vertical-align: bottom; background: 0px 0px rgb(255, 255, 255); font-family: &quot;Ek Mukta&quot;, sans-serif; text-align: justify; font-size: 23px !important;\">जनकपुरका पत्रकार नवलकिशोर यादव धनुषा क्षेत्र नम्बर ३ यस्तो क्षेत्र हो जहाँ चुनावको नतिजा दलीय आधारमा भन्दा पनि जातीयता, क्षेत्रियता र चिनजानले फरक पार्ने बताउँछन् । ‘विगतका चुनावहरुको अध्ययन गर्दा यो क्षेत्रमा कुन बेला के हुन्छ केही थाह हुँदैन । दुई जनामध्ये अनिलकुमार झासँग कागजी मत सङ्ख्या अहिले बढी देखिए पनि एमालेकी जुली महतो पनि कमजोर देखिएकी छैनन्,’ उनले भने ।</p>', NULL, 'banner', NULL, NULL, 1, 'तराई खबर', NULL, 2, 'अनिल भर्सेस जुलीमा विमलेन्द्र फ्याक्टर !', 'अनिल भर्सेस जुलीमा विमलेन्द्र फ्याक्टर !', 'मङ्सिर ४ गतेको चुनाव जतिजति नजिकिँदै छ, धनुषा–३ नम्बर क्षेत्रमा दबाब त्यति नै बढी रहेको छ । हरेक चुनावमा चर्चामा रहने धनुषा–३ लाई यसपटक पनि चासोका साथ हेरिएको छ  ।', '2022-11-12 14:37:44', '2022-11-12 14:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribes`
--

CREATE TABLE `newsletter_subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscribes`
--

INSERT INTO `newsletter_subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'boharas371@gmail.com', NULL, NULL),
(2, 'vron371@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `category_id`, `news_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 5, 1, NULL, NULL),
(3, 1, 2, NULL, NULL),
(4, 5, 2, NULL, NULL),
(5, 20, 1, NULL, NULL),
(6, 14, 2, NULL, NULL),
(7, 20, 2, NULL, NULL),
(8, 21, 2, NULL, NULL),
(9, 22, 2, NULL, NULL),
(10, 25, 2, NULL, NULL),
(11, 30, 2, NULL, NULL),
(12, 33, 2, NULL, NULL),
(13, 1, 3, NULL, NULL),
(14, 5, 3, NULL, NULL),
(15, 14, 3, NULL, NULL),
(16, 20, 3, NULL, NULL),
(17, 21, 3, NULL, NULL),
(18, 22, 3, NULL, NULL),
(19, 25, 3, NULL, NULL),
(20, 30, 3, NULL, NULL),
(21, 1, 4, NULL, NULL),
(22, 5, 4, NULL, NULL),
(23, 14, 4, NULL, NULL),
(24, 20, 4, NULL, NULL),
(25, 21, 4, NULL, NULL),
(26, 22, 4, NULL, NULL),
(27, 25, 4, NULL, NULL),
(28, 30, 4, NULL, NULL),
(29, 1, 5, NULL, NULL),
(30, 5, 5, NULL, NULL),
(31, 7, 5, NULL, NULL),
(32, 14, 5, NULL, NULL),
(33, 20, 5, NULL, NULL),
(34, 21, 5, NULL, NULL),
(35, 22, 5, NULL, NULL),
(36, 25, 5, NULL, NULL),
(37, 30, 5, NULL, NULL),
(38, 1, 6, NULL, NULL),
(39, 5, 6, NULL, NULL),
(40, 8, 6, NULL, NULL),
(41, 14, 6, NULL, NULL),
(42, 20, 6, NULL, NULL),
(43, 21, 6, NULL, NULL),
(44, 22, 6, NULL, NULL),
(45, 23, 6, NULL, NULL),
(46, 25, 6, NULL, NULL),
(47, 30, 6, NULL, NULL),
(48, 21, 7, NULL, NULL),
(49, 25, 8, NULL, NULL),
(50, 1, 9, NULL, NULL),
(51, 22, 9, NULL, NULL),
(52, 14, 10, NULL, NULL),
(53, 17, 10, NULL, NULL),
(54, 1, 11, NULL, NULL),
(55, 5, 11, NULL, NULL),
(56, 13, 11, NULL, NULL),
(57, 4, 12, NULL, NULL),
(58, 27, 12, NULL, NULL),
(59, 22, 13, NULL, NULL),
(60, 1, 14, NULL, NULL),
(61, 3, 14, NULL, NULL),
(62, 13, 14, NULL, NULL),
(63, 35, 14, NULL, NULL),
(64, 21, 15, NULL, NULL),
(65, 29, 15, NULL, NULL),
(66, 1, 16, NULL, NULL),
(67, 5, 16, NULL, NULL),
(68, 27, 16, '2022-10-19 14:08:38', NULL),
(69, 1, 17, NULL, NULL),
(70, 5, 17, NULL, NULL),
(71, 27, 17, NULL, NULL),
(72, 1, 18, NULL, NULL),
(73, 5, 18, NULL, NULL),
(74, 1, 19, NULL, NULL),
(75, 5, 19, NULL, NULL),
(76, 1, 20, NULL, NULL),
(77, 7, 20, NULL, NULL),
(78, 27, 20, NULL, NULL),
(79, 1, 21, NULL, NULL),
(80, 4, 21, NULL, NULL),
(81, 5, 21, NULL, NULL),
(82, 1, 22, NULL, NULL),
(83, 3, 22, NULL, NULL),
(84, 1, 23, NULL, NULL),
(85, 1, 24, NULL, NULL),
(86, 5, 24, NULL, NULL),
(87, 1, 25, NULL, NULL),
(88, 1, 26, NULL, NULL),
(89, 3, 26, NULL, NULL),
(90, 27, 26, NULL, NULL),
(91, 1, 27, NULL, NULL),
(92, 5, 27, NULL, NULL),
(93, 1, 28, NULL, NULL),
(94, 5, 28, NULL, NULL),
(95, 1, 29, NULL, NULL),
(96, 4, 29, NULL, NULL),
(97, 5, 29, NULL, NULL),
(98, 8, 29, NULL, NULL),
(99, 21, 30, NULL, NULL),
(100, 1, 31, NULL, NULL),
(101, 4, 31, NULL, NULL),
(102, 5, 31, NULL, NULL),
(103, 7, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_tags`
--

CREATE TABLE `news_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `short_description`, `description`, `meta_keyword`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'About Us', 'about-us', '<p>short description</p>', '<p>long description</p>', '[{\"value\":\"taraikhabar\"},{\"value\":\"about us\"}]', '<p>short description</p>', 1, 1, 1, '2022-09-03 01:45:35', '2022-09-11 16:44:27');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"role\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"permission\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"user\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"tags\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"category\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"news\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"bcategory\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"blogs\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"poll\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"pages\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"advertisement\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"}}', 1, 1, '2022-08-31 08:23:02', '2022-11-01 15:06:18'),
(2, '{\"role\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\"},\"permission\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\"},\"users\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"}}', 2, 1, '2022-08-31 08:23:36', '2022-08-31 11:00:13'),
(4, '{\"role\":{\"add\":\"1\",\"view\":\"1\"},\"permission\":{\"add\":\"1\",\"view\":\"1\"},\"users\":{\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\"}}', 3, 1, '2022-08-31 08:27:57', '2022-08-31 11:00:25'),
(5, '{\"news\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"blogs\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"advertisement\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"}}', 4, 1, '2022-09-13 14:36:21', '2022-09-13 14:36:21');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yes_vote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_vote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `question`, `yes_vote`, `no_vote`, `no_comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 'फेसबुकको शेयर, ट्याग, कमेन्टमा पनि निर्वाचन आयोगको निगरानी', '201', '500', '40', 1, '2022-10-27 02:03:46', '2022-10-27 02:05:01'),
(2, 'जता गए पनि अबको प्रधानमन्त्री तपाईं नै हो भन्छन् : प्रचण्ड', '400', '2301', '20', 1, '2022-10-27 02:05:42', '2022-10-27 02:06:26'),
(3, 'ओली नीति : आफू जित्न तालमेल, एकल प्रतिस्पर्धामा अरु नेता', '2', '1', '2', 1, '2022-10-27 02:06:49', '2022-11-06 16:27:26'),
(4, 'जसपाको नजरमा काँग्रेस पूँजीवादी उदारवादी र कम्युनिष्ट अवसरवादी', '1', '0', '0', 1, '2022-11-06 16:28:38', '2022-11-11 11:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2022-09-02 21:48:58', '2022-09-02 21:48:58'),
(2, 'Super Admin', 1, '2022-09-02 21:49:10', '2022-09-02 21:49:10'),
(3, 'Sub Admin', 1, '2022-09-02 21:49:15', '2022-09-02 21:49:15'),
(4, 'Reporter', 1, '2022-09-02 21:49:22', '2022-09-02 21:49:22'),
(5, 'Home Desk', 1, '2022-09-02 21:49:54', '2022-09-02 21:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `system_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loader` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_right_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_status` tinyint(4) DEFAULT 0,
  `email_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkdin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chief_edtor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advisor_editor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assistant_editor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_editor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desk_editor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookie_consent_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookie_consent_btn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookie_status` tinyint(4) DEFAULT 0,
  `cube_status` tinyint(4) DEFAULT 0,
  `popup_content_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popup_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popup_status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `footer_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_name`, `logo`, `favicon`, `loader`, `login_background_image`, `system_timezone`, `contact_number1`, `contact_number2`, `address`, `email_1`, `email_2`, `pan_vat`, `reg_no`, `copy_right`, `copy_right_link`, `smtp_status`, `email_host`, `email_port`, `email_encryption`, `email_user`, `email_pass`, `email_from`, `email_from_name`, `contact_email`, `facebook`, `twitter`, `youtube`, `linkdin`, `instagram`, `tiktok`, `chief_edtor`, `chairman`, `editor`, `advisor_editor`, `assistant_editor`, `sub_editor`, `desk_editor`, `meta_title`, `meta_keywords`, `meta_description`, `cookie_consent_message`, `cookie_consent_btn`, `cookie_status`, `cube_status`, `popup_content_message`, `popup_image`, `popup_status`, `created_at`, `updated_at`, `footer_text`, `facebook_comment`) VALUES
(1, 'तराई खबर, नेपाल, प्रा.लि.', '', '', NULL, NULL, NULL, '+977-9849000000', '+977-9849123456', 'पुरानो बानेश्वर, काठमाडौं', 'email@gmail.com', 'contact.email@gmail.com', '123456/55', '1234567/988', 'Taraikhabar&nbsp;|&nbsp;All rights reserved.&nbsp;', 'www.freelancerunit.com', 1, 'ww', 'dd', NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'twitter', 'youtube', 'Linkdin', NULL, NULL, 'ज्ञानेन्द्र यादव', 'ज्ञानेन्द्र यादव', NULL, NULL, NULL, NULL, NULL, 'title', 'suresh', NULL, NULL, NULL, 1, 0, 'text', '1546.png', 1, NULL, '2022-11-06 16:44:13', 'स्रोतहरू खुलाइएका बाहेक तराई-खबर मा प्रकाशित सम्पूर्ण सामग्रीहरू डिस्कवरी न्युज नेटवर्कका सम्पत्ति हुन् । यसमा प्रकाशित कुनै पनि सामग्रीहरू छापा, विद्युतीय, प्रसारण वा अन्य कुनै पनि माध्यमबाट पुनःप्रकाशन वा प्रसारण गर्नुअघि अनुमति लिनुहुन अनुरो', '<div class=\"fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop\" data-width=\"100%\" data-href=\"https://www.meronews.com/2022/02/104518.html\" data-numposts=\"7\" fb-xfbml-state=\"rendered\" fb-iframe-plugin-query=\"app_id=844459216167725&amp;container_width=777&amp;height=100&amp;href=https%3A%2F%2Fwww.meronews.com%2F2022%2F02%2F104518.html&amp;locale=en_US&amp;numposts=7&amp;sdk=joey&amp;version=v10.0&amp;width=\" style=\"width: 100%;\"><span style=\"vertical-align: bottom; width: 100%; height: 287px;\"><iframe name=\"fb7f135b887358\" width=\"1000px\" height=\"100px\" data-testid=\"fb:comments Facebook Social Plugin\" title=\"fb:comments Facebook Social Plugin\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" allow=\"encrypted-media\" src=\"https://www.facebook.com/v10.0/plugins/comments.php?app_id=844459216167725&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df18a28e6cd52b9%26domain%3Dwww.meronews.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fwww.meronews.com%252Ff1a52ca84a95928%26relation%3Dparent.parent&amp;container_width=777&amp;height=100&amp;href=https%3A%2F%2Fwww.meronews.com%2F2022%2F02%2F104518.html&amp;locale=en_US&amp;numposts=7&amp;sdk=joey&amp;version=v10.0&amp;width=\" style=\"border: none; visibility: visible; width: 100%; height: 287px;\" class=\"\"></iframe></span></div>');

-- --------------------------------------------------------

--
-- Table structure for table `sitemaps`
--

CREATE TABLE `sitemaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitemap_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitemaps`
--

INSERT INTO `sitemaps` (`id`, `sitemap_url`, `filename`, `created_at`, `updated_at`) VALUES
(1, '/yy', 'sitemap6320abee36eeb.xml', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `order_level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'कोरोना भाइरस', 'कोरोना-भाइरस', 0, 1, '2022-11-01 15:23:23', '2022-11-01 15:23:23'),
(2, 'केपी शर्मा ओली', 'केपी-शर्मा-ओली', 10, 1, NULL, NULL),
(3, 'नेपाली कांग्रेस', 'नेपाली-कांग्रेस', 0, 1, NULL, NULL),
(4, 'प्रहरी', 'प्रहरी', 0, 1, NULL, NULL),
(5, 'चीन', 'चीन', 0, 1, NULL, NULL),
(6, 'शेरबहादुर देउवा', 'शेरबहादुर-देउवा', 0, 1, NULL, NULL),
(7, 'भारत', 'भारत', 0, 1, NULL, NULL),
(8, 'चुनाव २०७९ ', 'चुनाव', 0, 1, NULL, NULL),
(9, 'प्रचण्ड', 'प्रचण्ड', 0, 1, NULL, NULL),
(10, 'विद्यादेवी भण्डारी', 'विद्यादेवी-भण्डारी', 0, 1, NULL, NULL),
(11, 'अपराध', 'अपराध', 0, 1, NULL, NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'suresh Bohara', 'info@admin.com', NULL, '$2y$10$gicGlp9JJsNy5IMzKa9I1u5MaHQ7IQGIooxRkEgZFYf8oaFf1Y7TW', NULL, '2022-11-03 14:58:26', '2022-11-03 14:58:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribes`
--
ALTER TABLE `newsletter_subscribes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscribes_email_unique` (`email`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_tags`
--
ALTER TABLE `news_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `polls_question_unique` (`question`) USING HASH;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitemaps`
--
ALTER TABLE `sitemaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `newsletter_subscribes`
--
ALTER TABLE `newsletter_subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `news_tags`
--
ALTER TABLE `news_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sitemaps`
--
ALTER TABLE `sitemaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
