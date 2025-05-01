-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2025 at 06:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentalx`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loggable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loggable_id` bigint UNSIGNED NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `module`, `action_type`, `loggable_type`, `loggable_id`, `message`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 27, 'ApplicantProfile', 'create', 'App\\Models\\ApplicantProfile', 9, 'Applicant Profile created.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-28 12:40:22', '2025-04-28 12:40:22'),
(2, 29, 'DentistProfile', 'create', 'App\\Models\\DentistProfile', 8, 'Dentist Profile created.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-28 12:47:35', '2025-04-28 12:47:35'),
(3, 30, 'PatientProfile', 'create', 'App\\Models\\PatientProfile', 5, 'Patient Profile created.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-29 11:17:42', '2025-04-29 11:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profiles`
--

CREATE TABLE `applicant_profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_profiles`
--

INSERT INTO `applicant_profiles` (`id`, `user_id`, `phone`, `resume_path`, `experience`, `city_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, 'resumes/sllbY3iolq8250gJGqfvV3DbbGDf2JoNiWS9oAqe.pdf', 'A perferendis pariat', NULL, NULL, '2025-04-24 08:03:40', '2025-04-24 08:03:40'),
(2, 15, NULL, 'resumes/8eqVEpkfAtlMsu2rKKgB1bDlogEZ4m7DqGttyqSl.pdf', 'Labore molestiae atq', NULL, NULL, '2025-04-24 08:17:41', '2025-04-24 08:17:41'),
(3, 16, '+1 (862) 399-1882', 'resumes/QKxrwGfzoacmNDdPktnXhaG6IcaLbineTdKkMZGD.pdf', 'Labore quae neque se', 1, NULL, '2025-04-24 08:45:25', '2025-04-24 08:45:25'),
(4, 17, '+1 (115) 428-6619', 'resumes/qbslPIkdrsKCgHJ8lgXwoLENX0FQcUWOsG2ZRuj2.pdf', 'Facere esse ullamco', 3, NULL, '2025-04-24 08:55:46', '2025-04-24 08:55:46'),
(9, 27, '+1 (913) 446-7285', 'resumes/tWxi9T7wVprkrOjm0OP7PkNvfNnc3fn3lpj5LwkN.pdf', 'Nobis vitae dolore q', 15, NULL, '2025-04-28 12:40:22', '2025-04-28 12:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`, `slug`, `is_popular`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Berlin', NULL, 'berlin', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(2, 'Hamburg', NULL, 'hamburg', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(3, 'Munich', NULL, 'munich', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(4, 'Cologne', NULL, 'cologne', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(5, 'Frankfurt', NULL, 'frankfurt', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(6, 'Stuttgart', NULL, 'stuttgart', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(7, 'Düsseldorf', NULL, 'duesseldorf', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(8, 'Dortmund', NULL, 'dortmund', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(9, 'Essen', NULL, 'essen', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(10, 'Leipzig', NULL, 'leipzig', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(11, 'Bremen', NULL, 'bremen', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(12, 'Dresden', NULL, 'dresden', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(13, 'Hanover', NULL, 'hanover', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(14, 'Nuremberg', NULL, 'nuremberg', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(15, 'Duisburg', NULL, 'duisburg', 0, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` bigint UNSIGNED NOT NULL,
  `dentist_profile_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `verified_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dental_services`
--

CREATE TABLE `dental_services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dental_services`
--

INSERT INTO `dental_services` (`id`, `name`, `slug`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Zahnreinigung / Prophylaxe', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(2, 'Kontrolluntersuchung', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(3, 'Füllungstherapie', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(4, 'Parodontitisbehandlung', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(5, 'Wurzelbehandlung (Endodontie)', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(6, 'Zahnentfernung', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(7, 'Zahnerhalt', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(8, 'Bleaching / Zahnaufhellung', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(9, 'Veneers', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(10, 'Zahnkorrektur (Aligner/Schienen)', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(11, 'Feste Zahnspange', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(12, 'Lose Zahnspange', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(13, 'Zahnimplantate', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(14, 'Kronen & Brücken', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(15, 'Teil-/Vollprothesen', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(16, 'CAD/CAM Zahnersatz', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(17, 'Kinderzahnheilkunde', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(18, 'Behandlung von Angstpatienten', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(19, 'Seniorenzahnheilkunde', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(20, 'Digitale Zahnberatung', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(21, '3D-Röntgen / DVT', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(22, 'Zahnschmuck', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(23, 'Sportmundschutz', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `dentist_appointments`
--

CREATE TABLE `dentist_appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `dentist_profile_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `patient_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','confirmed','completed','cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentist_impressions`
--

CREATE TABLE `dentist_impressions` (
  `id` bigint UNSIGNED NOT NULL,
  `dentist_profile_id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search_query` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'organic',
  `viewed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentist_landing_pages`
--

CREATE TABLE `dentist_landing_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `dentist_profile_id` bigint UNSIGNED NOT NULL,
  `color_scheme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#3fbfd8',
  `template` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'classic',
  `header_style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'minimalist',
  `header_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_main_heading` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_sub_heading` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us_headline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us_subheading` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about_us_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_categories` json DEFAULT NULL,
  `show_contact_details` tinyint(1) NOT NULL DEFAULT '1',
  `show_reviews` tinyint(1) NOT NULL DEFAULT '1',
  `show_map` tinyint(1) NOT NULL DEFAULT '1',
  `show_opening_hours` tinyint(1) NOT NULL DEFAULT '1',
  `show_team_section` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seo_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentist_profiles`
--

CREATE TABLE `dentist_profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `plan_id` bigint UNSIGNED NOT NULL,
  `foundation_experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expertise_areas` json DEFAULT NULL,
  `practice_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `practice_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','claimed','unclaimed','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unclaimed',
  `landing_page_customized` tinyint(1) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `priority` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dentist_schedule_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dentist_profiles`
--

INSERT INTO `dentist_profiles` (`id`, `user_id`, `city_id`, `plan_id`, `foundation_experience`, `expertise_areas`, `practice_name`, `practice_description`, `permanent_address`, `postal_code`, `phone`, `latitude`, `longitude`, `website`, `logo`, `status`, `landing_page_customized`, `is_featured`, `priority`, `deleted_at`, `created_at`, `updated_at`, `dentist_schedule_id`) VALUES
(2, 13, 1, 6, 'not specified', NULL, 'Aretha Kelley', 'Mollit aliquid maxim', 'Commodo mollitia rer', NULL, '+1 (522) 445-9415', NULL, NULL, 'https://www.fenuhu.org.uk', NULL, 'unclaimed', 0, 0, 0, NULL, '2025-04-22 12:00:13', '2025-04-22 12:00:13', NULL),
(3, 18, 1, 6, 'not specified', NULL, 'Adrienne Branch', 'Distinctio Quia dol', 'Praesentium et volup', NULL, '+1 (781) 773-9031', NULL, NULL, 'https://www.jukemi.tv', NULL, 'unclaimed', 0, 0, 0, NULL, '2025-04-24 12:34:39', '2025-04-24 12:34:39', NULL),
(4, 19, 6, 7, 'not specified', NULL, 'Christine Hall', 'Voluptatem tempore', 'Optio nostrum qui n', NULL, '+1 (365) 141-8063', NULL, NULL, 'https://www.sogazywe.info', NULL, 'unclaimed', 0, 0, 0, NULL, '2025-04-24 12:37:52', '2025-04-24 12:37:52', NULL),
(5, 20, 11, 6, 'not specified', NULL, 'Chaney Molina', 'Dignissimos sed exer', 'Voluptatem numquam', NULL, '+1 (633) 602-3477', NULL, NULL, 'https://www.rycixobipe.mobi', NULL, 'unclaimed', 0, 0, 0, NULL, '2025-04-24 13:04:03', '2025-04-24 13:04:03', NULL),
(6, 21, 11, 6, 'not specified', NULL, 'Walter Alford', 'Neque quasi molestia', '187', NULL, '+1 (578) 275-8819', NULL, NULL, 'https://www.tixula.in', NULL, 'unclaimed', 0, 0, 0, NULL, '2025-04-24 14:15:07', '2025-04-24 14:15:07', NULL),
(8, 29, 1, 6, 'not specified', NULL, 'Kevin Blevins', 'Qui ut ut magni ulla', '659', NULL, '+1 (629) 221-3929', NULL, NULL, 'https://www.libyhivupisyj.cc', NULL, 'unclaimed', 0, 0, 0, NULL, '2025-04-28 12:47:35', '2025-04-28 12:47:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dentist_schedules`
--

CREATE TABLE `dentist_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `day` enum('monday','tuesday','wednesday','thursday','friday','saturday','sunday') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT '0',
  `clinic_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic_map` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentist_services`
--

CREATE TABLE `dentist_services` (
  `id` bigint UNSIGNED NOT NULL,
  `dentist_profile_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentist_settings`
--

CREATE TABLE `dentist_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `dentist_profile_id` bigint UNSIGNED NOT NULL,
  `booking_method` enum('integrated','external','inquiry') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'integrated',
  `default_duration` int NOT NULL DEFAULT '30',
  `min_lead_time` int NOT NULL DEFAULT '1',
  `bookable_services` json DEFAULT NULL,
  `send_confirmation` tinyint(1) NOT NULL DEFAULT '1',
  `send_reminders` tinyint(1) NOT NULL DEFAULT '1',
  `reminder_hours` int NOT NULL DEFAULT '24',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentist_teams`
--

CREATE TABLE `dentist_teams` (
  `id` bigint UNSIGNED NOT NULL,
  `dentist_profile_id` bigint UNSIGNED NOT NULL,
  `team_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specializations` json DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `payment_id` bigint UNSIGNED NOT NULL,
  `invoice_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_pdf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `issued_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint UNSIGNED NOT NULL,
  `job_post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `applicant_profile_id` bigint UNSIGNED NOT NULL,
  `resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','accepted','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `applied_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `dentist_profile_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` enum('full_time','part_time','contract') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'full_time',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `posted_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_04_15_100000_create_users_table', 1),
(2, '2025_04_15_100001_create_cache_table', 1),
(3, '2025_04_15_100002_create_jobs_table', 1),
(4, '2025_04_15_100003_create_permission_tables', 1),
(5, '2025_04_19_134511_create_cities_table', 1),
(6, '2025_04_19_134629_create_dental_services_table', 1),
(7, '2025_04_19_135328_create_plans_table', 1),
(8, '2025_04_19_135505_create_dentist_schedules_table', 1),
(9, '2025_04_19_140421_create_dentist_profiles_table', 1),
(10, '2025_04_19_143903_create_dentist_landing_pages_table', 1),
(11, '2025_04_19_144124_create_dentist_teams_table', 1),
(12, '2025_04_19_144216_create_patient_profiles_table', 1),
(13, '2025_04_19_144318_create_applicant_profiles_table', 1),
(14, '2025_04_19_144358_create_dentist_services_table', 1),
(15, '2025_04_19_144436_create_payments_table', 1),
(16, '2025_04_19_144539_create_invoices_table', 1),
(17, '2025_04_19_144621_create_job_posts_table', 1),
(18, '2025_04_19_144742_create_job_applications_table', 1),
(19, '2025_04_19_144854_create_reviews_table', 1),
(20, '2025_04_19_145049_create_claims_table', 1),
(21, '2025_04_19_145148_create_activity_logs_table', 1),
(22, '2025_04_19_145232_create_seo_metadata_table', 1),
(23, '2025_04_19_145334_create_dentist_impressions_table', 1),
(24, '2025_04_19_145421_create_dentist_appointments_table', 1),
(25, '2025_04_19_145539_create_dentist_settings_table', 1),
(26, '2025_04_20_125711_add_col_is_default_in_plans_table', 2),
(27, '2025_04_20_130046_add_col_is_default_in_plans_table', 3),
(28, '2025_04_20_130750_add_col_is_default_in_plans_table', 4),
(29, '2025_04_20_143308_add_price_tag_in_plans_table', 5),
(30, '2025_04_21_130012_add_postal_code_in_patient_profiles_table', 6),
(31, '2025_04_28_122809_add_deletd_at_col_in_users_table', 7),
(32, '2025_04_28_130056_add_deletd_at_col_in_applicant_profiles_table', 8),
(33, '2025_04_28_130256_add_deletd_at_col_in_claims_table', 8),
(34, '2025_04_28_130417_add_deletd_at_col_in_dentist_landing_pages_table', 8),
(35, '2025_04_28_130524_add_deletd_at_col_in_dentist_profiles_table', 8),
(36, '2025_04_28_130625_add_deletd_at_col_in_dentist_schedules_table', 8),
(37, '2025_04_28_130731_add_deletd_at_col_in_dentist_teams_table', 8),
(38, '2025_04_28_130835_add_deletd_at_col_in_job_applications_table', 8),
(39, '2025_04_28_130928_add_deletd_at_col_in_job_posts_table', 8),
(40, '2025_04_28_131022_add_deletd_at_col_in_patient_profiles_table', 8),
(41, '2025_04_28_131112_add_deletd_at_col_in_reviews_table', 8),
(42, '2025_04_28_173034_alter_activity_logs_user_id_nullable', 9),
(43, '2025_05_01_172603_add_stripe_fields_to_plans_table', 10),
(44, '2025_05_01_170833_create_customer_columns', 11),
(45, '2025_05_01_170834_create_subscriptions_table', 12),
(46, '2025_05_01_170835_create_subscription_items_table', 13),
(47, '2025_05_01_180920_add_deletd_at_col_in_plans_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 15),
(4, 'App\\Models\\User', 16),
(4, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 22),
(4, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_profiles`
--

CREATE TABLE `patient_profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `any_reference` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_profiles`
--

INSERT INTO `patient_profiles` (`id`, `user_id`, `phone`, `dob`, `gender`, `address`, `city`, `postal_code`, `patient_history`, `any_reference`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 9, '+1 (205) 383-4993', '2001-05-11', 'Not Specified', NULL, 'Rerum recusandae Au', 'Nulla', NULL, NULL, NULL, '2025-04-22 06:47:35', '2025-04-22 06:47:35'),
(4, 22, '+1 (625) 517-8517', '1993-02-28', 'Not Specified', NULL, 'Aliqua Placeat con', 'Sedfgdf', NULL, NULL, NULL, '2025-04-25 10:59:11', '2025-04-25 10:59:11'),
(5, 30, '+1 (496) 185-9109', NULL, 'not specified', 'Voluptas duis deleni', NULL, NULL, NULL, NULL, NULL, '2025-04-29 11:17:42', '2025-04-29 11:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `plan_id` bigint UNSIGNED NOT NULL,
  `gateway` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stripe',
  `billing_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','succeeded','failed','refunded') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'succeeded',
  `next_billing_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Unique payment gateway transaction ID',
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'e.g. stripe, paypal, razorpay',
  `amount` decimal(10,2) NOT NULL COMMENT 'Payment amount',
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'EUR' COMMENT 'Currency code',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'card, bank_transfer, etc.',
  `payment_method_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'JSON with payment method details',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `invoice_id` bigint UNSIGNED DEFAULT NULL,
  `subscription_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','completed','failed','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'Payment status',
  `paid_at` timestamp NULL DEFAULT NULL COMMENT 'When payment was completed',
  `failed_at` timestamp NULL DEFAULT NULL COMMENT 'When payment failed',
  `gateway_response` json DEFAULT NULL COMMENT 'Raw response from payment gateway',
  `gateway_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Status from payment gateway',
  `failure_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Reason for payment failure',
  `metadata` json DEFAULT NULL COMMENT 'Additional payment metadata',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Customer IP address',
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Customer user agent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view dashboard', 'web', '2025-04-23 11:39:00', '2025-04-23 11:39:00'),
(2, 'edit profile', 'web', '2025-04-23 11:39:00', '2025-04-23 11:39:00'),
(3, 'manage landing page', 'web', '2025-04-23 11:39:00', '2025-04-23 11:39:00'),
(4, 'edit practice details', 'web', '2025-04-23 11:39:00', '2025-04-23 11:39:00'),
(5, 'manage team members', 'web', '2025-04-23 11:39:01', '2025-04-23 11:39:01'),
(6, 'manage opening hours', 'web', '2025-04-23 11:39:01', '2025-04-23 11:39:01'),
(7, 'update contact information', 'web', '2025-04-23 11:39:01', '2025-04-23 11:39:01'),
(8, 'view subscription package', 'web', '2025-04-23 11:39:01', '2025-04-23 11:39:01'),
(9, 'post job ads', 'web', '2025-04-23 11:39:01', '2025-04-23 11:39:01'),
(10, 'edit job ads', 'web', '2025-04-23 11:39:01', '2025-04-23 11:39:01'),
(11, 'delete job ads', 'web', '2025-04-23 11:39:01', '2025-04-23 11:39:01'),
(12, 'view job applicants', 'web', '2025-04-23 11:39:02', '2025-04-23 11:39:02'),
(13, 'claim existing profile', 'web', '2025-04-23 11:39:02', '2025-04-23 11:39:02'),
(14, 'view reviews', 'web', '2025-04-23 11:39:02', '2025-04-23 11:39:02'),
(15, 'delete own review', 'web', '2025-04-23 11:39:02', '2025-04-23 11:39:02'),
(16, 'write review', 'web', '2025-04-23 11:39:02', '2025-04-23 11:39:02'),
(17, 'edit own review', 'web', '2025-04-23 11:39:02', '2025-04-23 11:39:02'),
(18, 'search dentists', 'web', '2025-04-23 11:39:02', '2025-04-23 11:39:02'),
(19, 'view dentist landing page', 'web', '2025-04-23 11:39:02', '2025-04-23 11:39:02'),
(20, 'save favorite dentists', 'web', '2025-04-23 11:39:02', '2025-04-23 11:39:02'),
(21, 'upload resume', 'web', '2025-04-23 11:39:03', '2025-04-23 11:39:03'),
(22, 'apply to job', 'web', '2025-04-23 11:39:03', '2025-04-23 11:39:03'),
(23, 'view applied jobs', 'web', '2025-04-23 11:39:03', '2025-04-23 11:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `stripe_product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_monthly` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stripe_price_monthly` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_yearly` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stripe_price_yearly` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` json DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `stripe_product_id`, `name`, `description`, `slug`, `price_monthly`, `stripe_price_monthly`, `price_yearly`, `stripe_price_yearly`, `price_tag`, `features`, `is_default`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, NULL, 'Basis', 'Der ideale Einstieg für Ihre Praxis', 'basis', '0.00', NULL, '0.00', NULL, 'Kostenlos', '[\"Lokale Sichtbarkeit auf Google\", \"Teilnahme am Bewertungssystem\"]', 1, 1, NULL, '2025-04-20 09:40:47', '2025-04-20 09:40:47'),
(7, NULL, 'PraxisPro', 'Perfekt für wachsende Praxen', 'praxispro', '59.00', NULL, '636.00', NULL, 'Beliebt', '[\"Eigene moderne Landingpage\", \"Sichtbarkeit auf Google und Dentalax\", \"Teilnahme am KI Chat Empfehlung\", \"Dashboard mit Tracking-Funktionen\", \"Neue Patienten gewinnen\"]', 0, 1, NULL, '2025-04-20 09:40:47', '2025-04-20 09:40:47'),
(8, NULL, 'PraxisPlus', 'Für etablierte und wachsende Praxen', 'praxisplus', '89.00', NULL, '960.00', NULL, 'Premium', '[\"Alle Vorteile von PraxisPro\", \"Eigene Jobanzeigen veröffentlichen\", \"Zugang zu exklusiven Bewerbungen\"]', 0, 1, NULL, '2025-04-20 09:40:47', '2025-04-20 09:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `reviewer_id` bigint UNSIGNED DEFAULT NULL,
  `reviewable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewable_id` bigint UNSIGNED NOT NULL,
  `rating` tinyint NOT NULL DEFAULT '5',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('published','draft') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `review_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` json DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(2, 'dentist', 'web', '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(3, 'patient', 'web', '2025-04-19 17:36:08', '2025-04-19 17:36:08'),
(4, 'applicant', 'web', '2025-04-19 17:36:08', '2025-04-19 17:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(1, 3),
(2, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(1, 4),
(2, 4),
(21, 4),
(22, 4),
(23, 4);

-- --------------------------------------------------------

--
-- Table structure for table `seo_metadata`
--

CREATE TABLE `seo_metadata` (
  `id` bigint UNSIGNED NOT NULL,
  `seoable_id` bigint UNSIGNED NOT NULL,
  `seoable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `canonical_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_robots` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'index, follow',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2EhcbMAmFxaHxqOzeoWkZQKQbffKI47N1fEMD5aq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVdiU25OQXlVOUlDbmtLRThHT0xHeFpMclVqeG1oNUZyMlZRbkVxRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC96YWhuYXJ6dC1yZWdpc3RyaWVyZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1745168536),
('6ICOI1yBrNtkUGWE0l9IdKKBnWN9QZKce1B3MWq2', NULL, '127.0.0.1', 'Dart/3.7 (dart:io)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDhGSDF4QVN3UktkV1locXJuamtzTnQ1YUtVTU40NFV5cm5mMzFTZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RyaWVyZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1745168204),
('6SUAyd8IF0WCDMVZtXlKtQuFtqld2LOZ44XTYL58', NULL, '127.0.0.1', 'Dart/3.7 (dart:io)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTNvUmxzNk1ScjdIMzY4dGxoTGlEeDk3YWtQVGp5S1pwanpoVXdFcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC96YWhuYXJ6dC1yZWdpc3RyaWVyZW4/YmlsbGluZ190eXBlPW1vbnRobHkmcGxhbj03Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745168857),
('AzJRqgVQwH67iHgOu978NjfgZ7haAcLZw70EpbG1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidGdyUG5IU3dyMmlFbEtKSjBGbEwyU3FHMm9ib2U3c0RaYVlJOU5uZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYWtldHdhaGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE2OiJzZWxlY3RlZF9wbGFuX2lkIjtzOjE6IjciO3M6MjE6InNlbGVjdGVkX2JpbGxpbmdfdHlwZSI7czo3OiJtb250aGx5Ijt9', 1745168572),
('FQaDBgV84y7lCUNdNysySQJ32RHZInFNhAWVJC9T', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibG5oNzdPYXY1NkNnY2dzRjVTVEFUWjNqam9Fc2pyeHJtRTZkNnZOSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYWtldHdhaGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE2OiJzZWxlY3RlZF9wbGFuX2lkIjtzOjE6IjciO3M6MjE6InNlbGVjdGVkX2JpbGxpbmdfdHlwZSI7czo3OiJtb250aGx5Ijt9', 1745168926),
('IoA83cNl0rTeTQcLLviHPvQuRMCIXvY6HAqIcC8J', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSUlDRWtBSjdjNWRCdXduMFJQc0hhaWdrSlBlVktCTXdMOXNtanppdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC96YWhuYXJ6dC1yZWdpc3RyaWVyZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE2OiJzZWxlY3RlZF9wbGFuX2lkIjtzOjE6IjciO3M6MjE6InNlbGVjdGVkX2JpbGxpbmdfdHlwZSI7czo3OiJtb250aGx5Ijt9', 1745168791),
('J3yEEDB7nls1caI1EQJ2pHaZH4BknniIj3AlMcC8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkNWZEdId2c1V1hTeExkSzhXbGtOWXJFOG1MS1FKa1d3VzRYdzlJeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC96YWhuYXJ6dC1yZWdpc3RyaWVyZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1745168551),
('JNZpPEShGiz4vggSRgrqH0gWUF7zHvfFKZHuXQCI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS3lYMFdxaXRrVGtZQWZCdVVEQ3E2Z0lCZ0NWUWpUTWFuVll2R2FEZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYWtldHdhaGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE2OiJzZWxlY3RlZF9wbGFuX2lkIjtzOjE6IjciO3M6MjE6InNlbGVjdGVkX2JpbGxpbmdfdHlwZSI7czo3OiJtb250aGx5Ijt9', 1745168717),
('LetUFFUXLaN3Ihu3Oqtb94a25DqVmL9Go07dPOn8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNENRMzhYTWNKWjc2R3F0VXBTdGlGWjdWdDlpSnN2endwaWwxQW9qSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RyaWVyZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE2OiJzZWxlY3RlZF9wbGFuX2lkIjtzOjE6IjciO3M6MjE6InNlbGVjdGVkX2JpbGxpbmdfdHlwZSI7czo3OiJtb250aGx5Ijt9', 1745168296),
('P3Wr2WGUHBqFLFc8DycKefYKizsENeCPJytwY8Wl', NULL, '127.0.0.1', 'Dart/3.7 (dart:io)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVEk3eXY5b2RSbGgxdHhqM3E5eFBOQjVZall0RnYxaVcwSEYzYnVLNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC96YWhuYXJ6dC1yZWdpc3RyaWVyZW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1745168210),
('RMrQrzwgjeYLjuXGBadeNkoMtZ6jVsbdJ1C0qRbe', NULL, '127.0.0.1', 'Dart/3.7 (dart:io)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0p3UVdXbk13TU9na2xUcU0yZ1Z4MlkyVXVxYnRKTFBjNjRIOFpBYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC96YWhuYXJ6dC1sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745168200),
('WoOetgO9P0aWgJThVAiuXAvULpcOS5TKXaRsAo7c', NULL, '127.0.0.1', 'Dart/3.7 (dart:io)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFlOY2dpazJsQlY3T0N1Y0tPbzlRc3NUU1FKbm9GZEk1ZEpReHhPcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC96YWhuYXJ6dC1yZWdpc3RyaWVyZW4/YmlsbGluZ190eXBlPW1vbnRobHkmcGxhbj03Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745168859),
('XfjOxH4cRETk1hqLHtwbAFOCLqcQci2WqvyekuQU', NULL, '127.0.0.1', 'Dart/3.7 (dart:io)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2pKQU1wWFNXU2doNGE0c0hqQzZkUlR5M0NsS0o5MnVjeFh1MmpNMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745168316),
('Ym6BnMBbuU5U2PQPyoLqU0vdP4UsTGISnn7sC74y', NULL, '127.0.0.1', 'Dart/3.7 (dart:io)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEt0TVR0bGc0aWVJZUVMZ002b2NNUVFrbU43bFpaaU9GTVVGWVVwcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb250YWt0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745168393);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint UNSIGNED NOT NULL,
  `subscription_id` bigint UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Admin', 'admin@dentalax.com', NULL, '$2y$12$xfO1BLN6s9H/.fBdRuC4Iuwu0rZtNI5XokyGWjPo0f19t/b/Fa6GG', NULL, NULL, NULL, '2025-04-19 17:36:08', '2025-04-19 17:36:08', NULL, NULL, NULL, NULL),
(9, 'Ora Graham', 'bedugo@mailinator.com', NULL, '$2y$12$gR7PxGn7J2TjSb20KgrBn.qjBKOspK.i1yVhiDITeYqeq4YkhY9Iy', NULL, NULL, NULL, '2025-04-22 06:47:35', '2025-04-22 06:47:35', NULL, NULL, NULL, NULL),
(12, 'Ryan Murphy', 'newycamov@mailinator.com', NULL, '$2y$12$7d0CHQTEz2WEJB83RKWsaesGS4vMGbOvxofejiNV8eiA4HljRaWBC', NULL, NULL, NULL, '2025-04-22 08:05:07', '2025-04-22 08:05:07', NULL, NULL, NULL, NULL),
(13, 'Karly Walton Harrison England', 'talugih@mailinator.com', NULL, '$2y$12$Jo0Gxxes/ZKIDxHcM8sF/uzBG1K7sZlSn4VRO.IVw2Z28.s41Mzpu', NULL, NULL, NULL, '2025-04-22 12:00:12', '2025-04-22 12:00:12', NULL, NULL, NULL, NULL),
(14, 'Gregory Ball', 'byledipag@mailinator.com', NULL, '$2y$12$svkVtHqm3Z5jenzI126bkO1rxZUm39H7BtebeuTaSo0JDYotbdLAm', NULL, NULL, NULL, '2025-04-24 08:03:39', '2025-04-24 08:03:39', NULL, NULL, NULL, NULL),
(15, 'Basil Jennings', 'romolejy@mailinator.com', NULL, '$2y$12$mDDI2NBQZ03/465KsyGCzOISw4yPae4GSlJolnttvApkhCr46d1iK', NULL, NULL, NULL, '2025-04-24 08:17:41', '2025-04-24 08:17:41', NULL, NULL, NULL, NULL),
(16, 'Dillon Sloan', 'poca@mailinator.com', NULL, '$2a$12$BIQvpZRNJSRsSH/IZOfbducu65VP6..U88IV1nAgy/qE1ca9f3UIy', NULL, NULL, NULL, '2025-04-24 08:45:25', '2025-04-24 08:45:25', NULL, NULL, NULL, NULL),
(17, 'Ezra Macias', 'tydek@mailinator.com', NULL, '$2y$12$su.ZxW1.w.N/fefBAgHFeeCsuhH4uGzyvFDdjfTAFsDq0OXNpCuh6', NULL, NULL, NULL, '2025-04-24 08:55:46', '2025-04-24 08:55:46', NULL, NULL, NULL, NULL),
(18, 'Cyrus Leonard Sylvester Phillips', 'wufuno@mailinator.com', NULL, '$2y$12$OpLT/y6KYwVNftTIgFGbfeOgSiPmyWG57Z6LqQ5epNJd.vY3kCWw.', NULL, NULL, NULL, '2025-04-24 12:34:39', '2025-04-24 12:34:39', NULL, NULL, NULL, NULL),
(19, 'Peter Salazar Ila Francis', 'jawodituf@mailinator.com', NULL, '$2y$12$3VpIKVckhpGLoOBUXCSGD.YmhG7dBNyv6BCiAdiUUecNayToiIJFy', NULL, NULL, NULL, '2025-04-24 12:37:52', '2025-04-24 12:37:52', NULL, NULL, NULL, NULL),
(20, 'Amber Ayers Brody Haley', 'pynizev@mailinator.com', NULL, '$2y$12$1orv.TPtISh6IljTOC4H6uGGqHUGgouz3OaB7cFyVYn77hgBcXwDa', NULL, NULL, NULL, '2025-04-24 13:04:03', '2025-04-24 13:04:03', NULL, NULL, NULL, NULL),
(21, 'Amir Lester', 'mepalore@mailinator.com', NULL, '$2y$12$pZCQ4RKlNZee8xOEWibdbutUeIYiNJyUQ2D9z5wjQK2VKlqxGS/0q', NULL, NULL, NULL, '2025-04-24 14:15:07', '2025-04-24 14:15:07', NULL, NULL, NULL, NULL),
(22, 'Blythe Wilcox', 'coxex@mailinator.com', NULL, '$2y$12$tKY0QAhfVQ1MkkW/0GKi..P/NCDOeu3bEqu83KyRcwDc8FVJ11XSu', NULL, NULL, NULL, '2025-04-25 10:59:11', '2025-04-25 10:59:11', NULL, NULL, NULL, NULL),
(27, 'Macon Heath', 'runaril@mailinator.com', NULL, '$2y$12$cp94oZKFJp1/IcztqlSDku.lJOlkeaC3LuQh70mmhpjoc0gJYqcdS', NULL, NULL, NULL, '2025-04-28 12:40:22', '2025-04-28 12:40:22', NULL, NULL, NULL, NULL),
(29, 'Azalia Bauer', 'vyquwap@mailinator.com', NULL, '$2y$12$hVSOVZ8tk9jhr7WjyOXh4ejuXgyNHRMK44D/mghz9jNmx7KpexQ16', NULL, NULL, NULL, '2025-04-28 12:47:35', '2025-04-28 12:47:35', NULL, NULL, NULL, NULL),
(30, 'Wyatt Petty', 'xaxyweho@mailinator.com', NULL, '$2y$12$MV9FnFNvGirUZtUIu3Twk.lrO4m6Ed6AE654ueaJvP1vjhHnTRdhC', NULL, NULL, NULL, '2025-04-29 11:17:41', '2025-04-29 11:17:41', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`),
  ADD KEY `activity_logs_loggable_type_loggable_id_index` (`loggable_type`,`loggable_id`);

--
-- Indexes for table `applicant_profiles`
--
ALTER TABLE `applicant_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_profiles_user_id_foreign` (`user_id`),
  ADD KEY `applicant_profiles_city_id_foreign` (`city_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_slug_unique` (`slug`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claims_dentist_profile_id_foreign` (`dentist_profile_id`),
  ADD KEY `claims_user_id_foreign` (`user_id`),
  ADD KEY `claims_verified_by_foreign` (`verified_by`);

--
-- Indexes for table `dental_services`
--
ALTER TABLE `dental_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dental_services_slug_unique` (`slug`);

--
-- Indexes for table `dentist_appointments`
--
ALTER TABLE `dentist_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dentist_appointments_dentist_profile_id_foreign` (`dentist_profile_id`),
  ADD KEY `dentist_appointments_service_id_foreign` (`service_id`),
  ADD KEY `dentist_appointments_user_id_foreign` (`user_id`);

--
-- Indexes for table `dentist_impressions`
--
ALTER TABLE `dentist_impressions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dentist_impressions_dentist_profile_id_viewed_at_index` (`dentist_profile_id`,`viewed_at`);

--
-- Indexes for table `dentist_landing_pages`
--
ALTER TABLE `dentist_landing_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dentist_landing_pages_dentist_profile_id_foreign` (`dentist_profile_id`);

--
-- Indexes for table `dentist_profiles`
--
ALTER TABLE `dentist_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dentist_profiles_user_id_foreign` (`user_id`),
  ADD KEY `dentist_profiles_city_id_foreign` (`city_id`),
  ADD KEY `dentist_profiles_plan_id_foreign` (`plan_id`),
  ADD KEY `dentist_profiles_dentist_schedule_id_foreign` (`dentist_schedule_id`);

--
-- Indexes for table `dentist_schedules`
--
ALTER TABLE `dentist_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentist_services`
--
ALTER TABLE `dentist_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dentist_services_dentist_profile_id_foreign` (`dentist_profile_id`),
  ADD KEY `dentist_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `dentist_settings`
--
ALTER TABLE `dentist_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dentist_settings_dentist_profile_id_foreign` (`dentist_profile_id`);

--
-- Indexes for table `dentist_teams`
--
ALTER TABLE `dentist_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dentist_teams_dentist_profile_id_foreign` (`dentist_profile_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`),
  ADD KEY `invoices_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_post_id_foreign` (`job_post_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`),
  ADD KEY `job_applications_applicant_profile_id_foreign` (`applicant_profile_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_posts_dentist_profile_id_foreign` (`dentist_profile_id`),
  ADD KEY `job_posts_city_id_foreign` (`city_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patient_profiles`
--
ALTER TABLE `patient_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_logs_user_id_foreign` (`user_id`),
  ADD KEY `payment_logs_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_slug_unique` (`slug`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_reviewer_id_foreign` (`reviewer_id`),
  ADD KEY `reviews_reviewable_type_reviewable_id_index` (`reviewable_type`,`reviewable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seo_metadata`
--
ALTER TABLE `seo_metadata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seo_metadata_slug_unique` (`slug`),
  ADD KEY `seo_metadata_seoable_id_seoable_type_index` (`seoable_id`,`seoable_type`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscription_items_subscription_id_stripe_price_index` (`subscription_id`,`stripe_price`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicant_profiles`
--
ALTER TABLE `applicant_profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dental_services`
--
ALTER TABLE `dental_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dentist_appointments`
--
ALTER TABLE `dentist_appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentist_impressions`
--
ALTER TABLE `dentist_impressions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentist_landing_pages`
--
ALTER TABLE `dentist_landing_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentist_profiles`
--
ALTER TABLE `dentist_profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dentist_schedules`
--
ALTER TABLE `dentist_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentist_services`
--
ALTER TABLE `dentist_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentist_settings`
--
ALTER TABLE `dentist_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentist_teams`
--
ALTER TABLE `dentist_teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `patient_profiles`
--
ALTER TABLE `patient_profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seo_metadata`
--
ALTER TABLE `seo_metadata`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `applicant_profiles`
--
ALTER TABLE `applicant_profiles`
  ADD CONSTRAINT `applicant_profiles_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `applicant_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `claims_dentist_profile_id_foreign` FOREIGN KEY (`dentist_profile_id`) REFERENCES `dentist_profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `claims_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `claims_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `dentist_appointments`
--
ALTER TABLE `dentist_appointments`
  ADD CONSTRAINT `dentist_appointments_dentist_profile_id_foreign` FOREIGN KEY (`dentist_profile_id`) REFERENCES `dentist_profiles` (`id`),
  ADD CONSTRAINT `dentist_appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `dental_services` (`id`),
  ADD CONSTRAINT `dentist_appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `dentist_impressions`
--
ALTER TABLE `dentist_impressions`
  ADD CONSTRAINT `dentist_impressions_dentist_profile_id_foreign` FOREIGN KEY (`dentist_profile_id`) REFERENCES `dentist_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dentist_landing_pages`
--
ALTER TABLE `dentist_landing_pages`
  ADD CONSTRAINT `dentist_landing_pages_dentist_profile_id_foreign` FOREIGN KEY (`dentist_profile_id`) REFERENCES `dentist_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dentist_profiles`
--
ALTER TABLE `dentist_profiles`
  ADD CONSTRAINT `dentist_profiles_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dentist_profiles_dentist_schedule_id_foreign` FOREIGN KEY (`dentist_schedule_id`) REFERENCES `dentist_schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dentist_profiles_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dentist_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dentist_services`
--
ALTER TABLE `dentist_services`
  ADD CONSTRAINT `dentist_services_dentist_profile_id_foreign` FOREIGN KEY (`dentist_profile_id`) REFERENCES `dentist_profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dentist_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `dental_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dentist_settings`
--
ALTER TABLE `dentist_settings`
  ADD CONSTRAINT `dentist_settings_dentist_profile_id_foreign` FOREIGN KEY (`dentist_profile_id`) REFERENCES `dentist_profiles` (`id`);

--
-- Constraints for table `dentist_teams`
--
ALTER TABLE `dentist_teams`
  ADD CONSTRAINT `dentist_teams_dentist_profile_id_foreign` FOREIGN KEY (`dentist_profile_id`) REFERENCES `dentist_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_applicant_profile_id_foreign` FOREIGN KEY (`applicant_profile_id`) REFERENCES `applicant_profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_job_post_id_foreign` FOREIGN KEY (`job_post_id`) REFERENCES `job_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD CONSTRAINT `job_posts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `job_posts_dentist_profile_id_foreign` FOREIGN KEY (`dentist_profile_id`) REFERENCES `dentist_profiles` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `patient_profiles`
--
ALTER TABLE `patient_profiles`
  ADD CONSTRAINT `patient_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD CONSTRAINT `payment_logs_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payment_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_reviewer_id_foreign` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
