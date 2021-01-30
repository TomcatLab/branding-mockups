-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2020 at 10:30 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `branding_mockups`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ZqYsbDnbT4', 'jaus5mhf26@gmail.com', '$2y$10$OQ/em04Tl431fOTAxecBWOryedFMq4nIhEKQhch5AjV3k0Jum2ffq', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint UNSIGNED NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `group_id`, `name`, `default`, `value`, `validations`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'API', '123456789', NULL, 'required', NULL, NULL, NULL),
(2, 2, 'Facebook', '', NULL, NULL, NULL, NULL, NULL),
(3, 2, 'Pinterest', '', NULL, NULL, NULL, NULL, NULL),
(4, 2, 'Twitter', '', NULL, NULL, NULL, NULL, NULL),
(5, 2, 'Instgram', '', NULL, NULL, NULL, NULL, NULL),
(6, 2, 'Dribbler', '', NULL, NULL, NULL, NULL, NULL),
(7, 3, 'Title', 'Branding Mockups', NULL, 'required', NULL, NULL, NULL),
(8, 3, 'Keyword', '', NULL, NULL, NULL, NULL, NULL),
(9, 3, 'Description', '', NULL, NULL, NULL, NULL, NULL),
(10, 3, 'Copyright Text', 'Branding Mockups', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configuration_groups`
--

CREATE TABLE `configuration_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configuration_groups`
--

INSERT INTO `configuration_groups` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Behance', NULL, NULL, NULL),
(2, 'Social Media', NULL, NULL, NULL),
(3, 'Global Settings', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `subject`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sign up', 'Sign Up Email', 'test content sdsdfgdf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_extensions`
--

CREATE TABLE `file_extensions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_extensions`
--

INSERT INTO `file_extensions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PSD', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(55, '2014_10_12_000000_create_users_table', 1),
(56, '2014_10_12_100000_create_password_resets_table', 1),
(57, '2019_08_19_000000_create_failed_jobs_table', 1),
(58, '2020_11_05_133627_create_admins_table', 1),
(59, '2020_11_05_162043_create_showcases_table', 1),
(60, '2020_11_05_162953_create_mockup_categories_table', 1),
(65, '2020_11_06_043539_create_file_extensions_table', 1),
(67, '2020_11_06_041523_create_mockups_table', 2),
(78, '2020_11_06_050610_create_page_contents_table', 8),
(83, '2020_11_06_042859_create_emails_table', 12),
(84, '2020_11_06_045939_create_page_groups_table', 13),
(87, '2020_11_20_120921_create_sliders_table', 16),
(89, '2020_11_06_050332_create_pages_table', 17),
(90, '2020_11_06_042532_create_configuration_groups_table', 18),
(92, '2020_11_06_042648_create_configurations_table', 19),
(93, '2020_11_06_050044_create_page_types_table', 20),
(94, '2020_11_23_195303_create_banners_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `mockups`
--

CREATE TABLE `mockups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` int NOT NULL,
  `author` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `file_extension` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` bigint UNSIGNED DEFAULT NULL,
  `license` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mockups`
--

INSERT INTO `mockups` (`id`, `name`, `keywords`, `description`, `price`, `author`, `category_id`, `slug`, `info`, `file_extension`, `size`, `dimensions`, `license`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sample Mockup', 'Keywords', 'Description', 3, 1, 1, 'nothing-solve', 'sadf', 1, '1', 1, 1, NULL, '2020-11-20 03:50:58', NULL),
(2, 'Sample', 'asdf', 'asdf', 12, 1, 1, 'nothing-solve', NULL, 1, '1', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mockup_categories`
--

CREATE TABLE `mockup_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mockup_categories`
--

INSERT INTO `mockup_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Branding Mockups', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home` tinyint(1) DEFAULT NULL,
  `slider_id` bigint UNSIGNED DEFAULT NULL,
  `parent_id` bigint UNSIGNED NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `link`, `keywords`, `description`, `home`, `slider_id`, `parent_id`, `group_id`, `type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mockups', 'mockups', NULL, NULL, NULL, 1, 1, 0, 1, 1, '2020-11-21 10:29:55', '2020-11-21 10:29:55', NULL),
(2, 'Freebies', 'freebies', NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '2020-11-21 13:04:29', '2020-11-21 13:04:29', NULL),
(3, 'Showcase', 'showcase', NULL, NULL, NULL, NULL, NULL, 0, 1, 1, '2020-11-21 13:46:08', '2020-11-21 13:46:08', NULL),
(4, 'Mockup', 'mockup', NULL, NULL, NULL, NULL, NULL, 9, 1, 3, '2020-11-21 14:43:26', '2020-11-21 14:43:26', NULL),
(5, 'Packaging', 'packaging', NULL, NULL, NULL, NULL, NULL, 0, 2, 1, '2020-11-23 17:36:14', '2020-11-23 17:36:14', NULL),
(6, 'Stationery', 'stationery', NULL, NULL, NULL, NULL, NULL, 0, 2, 1, '2020-11-23 17:36:38', '2020-11-23 17:36:38', NULL),
(7, 'Become a Seller', 'become-a-seller', NULL, NULL, NULL, NULL, NULL, 0, 4, 1, '2020-11-23 17:38:01', '2020-11-23 17:38:01', NULL),
(8, 'Contact Us', 'contact-us', NULL, NULL, NULL, NULL, NULL, 0, 4, 1, '2020-11-23 17:38:35', '2020-11-23 17:38:35', NULL),
(9, 'Privacy Policy', 'privacy-policy', NULL, NULL, NULL, NULL, NULL, 0, 5, 1, '2020-11-23 17:39:43', '2020-11-23 17:39:43', NULL),
(10, 'Terms of Service', 'terms-of-service', NULL, NULL, NULL, NULL, NULL, 0, 5, 1, '2020-11-23 17:40:29', '2020-11-23 17:40:29', NULL),
(11, 'License', 'license', NULL, NULL, NULL, NULL, NULL, 0, 5, 1, '2020-11-23 17:40:58', '2020-11-23 17:40:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `styles` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `page_id`, `value`, `styles`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 1, NULL, NULL, '2020-11-21 10:29:55', '2020-11-21 10:29:55', NULL),
(10, 2, NULL, NULL, '2020-11-21 13:04:29', '2020-11-21 13:04:29', NULL),
(11, 3, NULL, NULL, '2020-11-21 13:46:08', '2020-11-21 13:46:08', NULL),
(12, 4, NULL, NULL, '2020-11-21 14:43:26', '2020-11-21 14:43:26', NULL),
(13, 5, NULL, NULL, '2020-11-23 17:36:14', '2020-11-23 17:36:14', NULL),
(14, 6, NULL, NULL, '2020-11-23 17:36:38', '2020-11-23 17:36:38', NULL),
(15, 7, NULL, NULL, '2020-11-23 17:38:01', '2020-11-23 17:38:01', NULL),
(16, 8, NULL, NULL, '2020-11-23 17:38:35', '2020-11-23 17:38:35', NULL),
(17, 9, NULL, NULL, '2020-11-23 17:39:43', '2020-11-23 17:39:43', NULL),
(18, 10, NULL, NULL, '2020-11-23 17:40:29', '2020-11-23 17:40:29', NULL),
(19, 11, NULL, NULL, '2020-11-23 17:40:58', '2020-11-23 17:40:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_groups`
--

CREATE TABLE `page_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_groups`
--

INSERT INTO `page_groups` (`id`, `name`, `key`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Main Menu', 'main-menu', NULL, NULL, NULL),
(2, 'Products', 'products', NULL, NULL, NULL),
(4, 'Support', 'support', NULL, NULL, NULL),
(5, 'Further Information', 'further-information', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_types`
--

CREATE TABLE `page_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hide` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_types`
--

INSERT INTO `page_types` (`id`, `name`, `action`, `show`, `hide`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Page', 'content', 'keywords,description', 'link', NULL, NULL, NULL),
(2, 'Link', 'url', 'link', 'keywords,description', NULL, NULL, NULL),
(3, 'Inner Page', 'innerpage', 'keywords,description', 'link', NULL, NULL, NULL);

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
-- Table structure for table `showcases`
--

CREATE TABLE `showcases` (
  `id` bigint UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `behance_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showcases`
--

INSERT INTO `showcases` (`id`, `label`, `user`, `category_id`, `behance_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sample Showcase', NULL, 1, 'http://behance.com/project/', NULL, NULL, NULL),
(2, 'Sample Showcase 1', NULL, 1, 'http://behance.com/project/', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'biju', 'bijub1989@gmail.com', NULL, '$2y$10$u2MKYl3xsrhHFNqYMtng9OXpHc8auSDR7XdQJSm.H6d8btYVhhsRi', NULL, '2020-11-18 16:01:18', '2020-11-18 16:01:18');

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
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration_groups`
--
ALTER TABLE `configuration_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_extensions`
--
ALTER TABLE `file_extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mockups`
--
ALTER TABLE `mockups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mockup_categories`
--
ALTER TABLE `mockup_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_groups`
--
ALTER TABLE `page_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_types`
--
ALTER TABLE `page_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `showcases`
--
ALTER TABLE `showcases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `configuration_groups`
--
ALTER TABLE `configuration_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_extensions`
--
ALTER TABLE `file_extensions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `mockups`
--
ALTER TABLE `mockups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mockup_categories`
--
ALTER TABLE `mockup_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `page_groups`
--
ALTER TABLE `page_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_types`
--
ALTER TABLE `page_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `showcases`
--
ALTER TABLE `showcases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
