-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 02:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rrr_360`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_by_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title_en` mediumtext NOT NULL,
  `title_ar` mediumtext NOT NULL,
  `description_en` longtext NOT NULL,
  `description_ar` longtext NOT NULL,
  `full_description_en` longtext NOT NULL,
  `full_description_ar` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `created_by_id`, `category_id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `full_description_en`, `full_description_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Title english', 'لوريم ايبسوم', 'Description english', 'التكامل في تقديم الخدمات.', '<p>Description englishgdfgfdgfd</p>', '<p>التكامل في تقديم الخدمات.g fdg dfgdf</p>', '2025-08-16 08:05:09', '2025-08-16 08:05:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `article_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blocked_ips`
--

CREATE TABLE `blocked_ips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A108 Adam Street', '2025-04-22 07:11:33', '2025-04-22 07:11:33', NULL),
(2, 'New York, NY 535022', '2025-04-22 07:11:39', '2025-04-22 07:11:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` mediumtext DEFAULT NULL,
  `title_ar` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Title english', 'لوريم إيبسوم', '2025-04-22 10:46:13', '2025-08-12 08:44:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'gfdgdgdfg', '2025-08-16 07:23:23', '2025-08-16 07:23:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` mediumtext DEFAULT NULL,
  `title_ar` mediumtext DEFAULT NULL,
  `sub_title_en` mediumtext DEFAULT NULL,
  `sub_title_ar` mediumtext DEFAULT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `title_en`, `title_ar`, `sub_title_en`, `sub_title_ar`, `number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Title english', NULL, 'This nothing but a dummy text just to show content', NULL, 5, '2025-04-23 06:23:40', '2025-04-23 06:23:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` text DEFAULT NULL,
  `title_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Title english', 'لوريم ايبسوم', 'Description english', 'التكامل في تقديم الخدمات.', '2025-08-16 08:03:26', '2025-08-16 08:03:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `full_name`, `email`, `subject`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ala\' Alra\'i', 'alra3ealaa3@live.com', 'You are name is bader, just talk in support children', 'sdsdfsdfdsf', '2025-04-22 08:55:11', '2025-04-22 08:55:11', NULL),
(2, 'Ala\' Alra\'i', 'saddsadsad@live.com', 'You are name is bader, just talk in support children', 'sadsadsadsadsad', '2025-04-22 09:03:23', '2025-04-22 09:03:23', NULL),
(3, 'Ala\' Alra\'i', 'info@starlet-it.com', 'You are name is bader, just talk in support children', 'fsdfdsfdsfdsf', '2025-04-23 11:44:49', '2025-04-23 11:44:49', NULL),
(4, 'Ala\' Alra\'i', 'gfhgfh@starlet-it.com', 'You are name is bader, just talk in support childrenhgfh', 'gfhhfghgfhgfhgfhgfhf', '2025-04-23 11:45:43', '2025-04-23 11:45:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` mediumtext DEFAULT NULL,
  `title_ar` mediumtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lorem Ipsum', 'لوريم إيبسوم', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'https://www.facebook.com', '2025-08-27 09:15:56', '2025-08-27 09:27:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(10) UNSIGNED NOT NULL,
  `keywords_en` mediumtext DEFAULT NULL,
  `keywords_ar` mediumtext DEFAULT NULL,
  `title_en` mediumtext DEFAULT NULL,
  `title_ar` mediumtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `vision_en` mediumtext DEFAULT NULL,
  `vision_ar` mediumtext DEFAULT NULL,
  `call_action_en` mediumtext DEFAULT NULL,
  `call_action_ar` mediumtext DEFAULT NULL,
  `portfolio_en` mediumtext DEFAULT NULL,
  `portfolio_ar` mediumtext DEFAULT NULL,
  `faq_en` mediumtext DEFAULT NULL,
  `faq_ar` mediumtext DEFAULT NULL,
  `article_en` text DEFAULT NULL,
  `article_ar` text DEFAULT NULL,
  `get_quote_introduction_en` text DEFAULT NULL,
  `get_quote_introduction_ar` text DEFAULT NULL,
  `get_quote_sub_title_en` text DEFAULT NULL,
  `get_quote_sub_title_ar` text DEFAULT NULL,
  `get_quote_paragraph_en` text DEFAULT NULL,
  `get_quote_paragraph_ar` text DEFAULT NULL,
  `testimonial_en` mediumtext DEFAULT NULL,
  `testimonial_ar` mediumtext DEFAULT NULL,
  `google_rate` float(5,2) NOT NULL DEFAULT 0.00,
  `about_title_en` mediumtext DEFAULT NULL,
  `about_title_ar` mediumtext DEFAULT NULL,
  `about_description_en` mediumtext DEFAULT NULL,
  `about_description_ar` mediumtext DEFAULT NULL,
  `about_full_description_en` longtext DEFAULT NULL,
  `about_full_description_ar` longtext DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `daily_work` varchar(255) DEFAULT NULL,
  `daily_hours` varchar(255) DEFAULT NULL,
  `map` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `keywords_en`, `keywords_ar`, `title_en`, `title_ar`, `description_en`, `description_ar`, `vision_en`, `vision_ar`, `call_action_en`, `call_action_ar`, `portfolio_en`, `portfolio_ar`, `faq_en`, `faq_ar`, `article_en`, `article_ar`, `get_quote_introduction_en`, `get_quote_introduction_ar`, `get_quote_sub_title_en`, `get_quote_sub_title_ar`, `get_quote_paragraph_en`, `get_quote_paragraph_ar`, `testimonial_en`, `testimonial_ar`, `google_rate`, `about_title_en`, `about_title_ar`, `about_description_en`, `about_description_ar`, `about_full_description_en`, `about_full_description_ar`, `address`, `phone`, `email`, `mobile`, `contact_email`, `daily_work`, `daily_hours`, `map`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'RRR360', 'RRR360', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'قيادة القيمة المبتكرة بشكل كامل مع وجود نماذج خارج الصندوق. متابعة الأسواق المستقلة بشكل تفاعلي بعد قول النتائج العالمية.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'GET QUOTE', 'GET QUOTE', 'Planning to transport your vehicle? HB Transit Logistics makes it simple.', 'Planning to transport your vehicle? HB Transit Logistics makes it simple.', 'Our quotes are 100% free, with no hidden fees or obligations. Whether you’re shipping a car, motorcycle, boat, or specialty vehicle, we guarantee clear pricing and reliable service tailored to your needs. Start your journey today with confidence.', 'Our quotes are 100% free, with no hidden fees or obligations. Whether you’re shipping a car, motorcycle, boat, or specialty vehicle, we guarantee clear pricing and reliable service tailored to your needs. Start your journey today with confidence.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 5.00, 'REAL ESTATE', 'العقارات', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', '<p>\r\n                        Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.\r\n                    </p>\r\n                    <ul>\r\n                        <li>\r\n                            <i class=\"bi bi-diagram-3\"></i>\r\n                            <div>\r\n                                <h5> Feature 1 </h5>\r\n                                <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>\r\n                            </div>\r\n                        </li>\r\n                        <li>\r\n                            <i class=\"bi bi-fullscreen-exit\"></i>\r\n                            <div>\r\n                                <h5> Feature 2 </h5>\r\n                                <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>\r\n                            </div>\r\n                        </li>\r\n                        <li>\r\n                            <i class=\"bi bi-broadcast\"></i>\r\n                            <div>\r\n                                <h5> Feature 3 </h5>\r\n                                <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam</p>\r\n                            </div>\r\n                        </li>\r\n                    </ul>\r\n                    <p>\r\n                        Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.\r\n                    </p>', '<h3 data-start=\"112\" data-end=\"130\" style=\"text-align: right; \">لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.</h3>', 'A108 Adam Street  New York, NY 535022', '962797300664', 'info@example.com', '962793131000', 'contact@example.com', 'Monday - Friday', '9:00AM - 05:00PM', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10746.886712483318!2d35.89676062232835!3d31.959344326153033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca076535df843%3A0x796660fbe467ee11!2sKing%20Abdullah%20I%20Mosque!5e0!3m2!1sen!2sjo!4v1744196619050!5m2!1sen!2sjo\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-04-22 06:47:26', '2025-08-27 08:48:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'https://www.flaticon.com/', '2025-08-27 11:05:13', '2025-08-27 11:05:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` longtext NOT NULL,
  `custom_properties` longtext NOT NULL,
  `responsive_images` longtext NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `generated_conversions` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `generated_conversions`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Slider', 4, '90c7c33c-6a81-4dde-999c-4d130184080e', 'picture', '68adb25861813_download', '68adb25861813_download.webp', 'image/webp', 'public', 'public', 496852, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-08-26 13:10:50', '2025-08-26 13:10:51'),
(2, 'App\\Models\\Slider', 3, 'fde0acea-57bb-4dc3-875a-b2dafe116414', 'picture', '68adb2a11afa3_download', '68adb2a11afa3_download.jpg', 'image/jpeg', 'public', 'public', 661605, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-08-26 13:12:02', '2025-08-26 13:12:03'),
(3, 'App\\Models\\Slider', 4, '7370ab34-7289-4227-9825-86bc3fb97227', 'picture', '68adb32a67edd_download', '68adb32a67edd_download.webp', 'image/webp', 'public', 'public', 496852, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-08-26 13:14:20', '2025-08-26 13:14:20'),
(4, 'App\\Models\\Slider', 3, '6b1b902d-44a8-4da6-9e86-36c94c102e0d', 'picture', '68adb34ddbe54_download', '68adb34ddbe54_download.jpg', 'image/jpeg', 'public', 'public', 661605, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-08-26 13:14:55', '2025-08-26 13:14:56'),
(8, 'App\\Models\\Property', 2, '7678324f-0038-4eb5-9afb-90112eb27660', 'photos', '68aeaa3a669ea_Group 1', '68aeaa3a669ea_Group-1.png', 'image/png', 'public', 'public', 72856, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-08-27 06:48:28', '2025-08-27 06:48:28'),
(9, 'App\\Models\\Property', 3, 'be6e454a-c2ab-48e4-a8e9-eee172597222', 'photos', '68aeaa5e4f565_download', '68aeaa5e4f565_download.webp', 'image/webp', 'public', 'public', 496852, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-08-27 06:49:21', '2025-08-27 06:49:21'),
(11, 'App\\Models\\Property', 1, 'c846a474-24e9-44b6-a6bd-c75647eb66d2', 'photos', '68aead468cfe7_news-4', '68aead468cfe7_news-4.jpg', 'image/jpeg', 'public', 'public', 115012, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-08-27 07:01:29', '2025-08-27 07:01:29'),
(12, 'App\\Models\\Property', 1, '0f443662-10bc-4d02-88fc-7a46fed361e0', 'photos', '68aead46abf6e_slides-1', '68aead46abf6e_slides-1.jpg', 'image/jpeg', 'public', 'public', 87910, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-08-27 07:01:29', '2025-08-27 07:01:29'),
(13, 'App\\Models\\Property', 1, '70d71bf4-3a4a-43d0-9a04-c3a892385556', 'photos', '68aead46c9af8_slides-2', '68aead46c9af8_slides-2.jpg', 'image/jpeg', 'public', 'public', 70502, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-08-27 07:01:29', '2025-08-27 07:01:29'),
(14, 'App\\Models\\Property', 1, '915f94e3-f814-46ca-ae32-f13fcca3c214', 'photos', '68aead46ec3ee_slides-3', '68aead46ec3ee_slides-3.jpg', 'image/jpeg', 'public', 'public', 97983, '[]', '[]', '[]', 4, '{\"thumb\":true}', '2025-08-27 07:01:29', '2025-08-27 07:01:30'),
(15, 'App\\Models\\Info', 1, '225a7481-9bd5-49e2-9a02-cc1418273cac', 'about_photo', '68aead703d855_AboutCEO', '68aead703d855_AboutCEO.png', 'image/png', 'public', 'public', 6901481, '[]', '[]', '[]', 1, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true}', '2025-08-27 07:03:36', '2025-08-27 07:03:43'),
(16, 'App\\Models\\Info', 1, 'e69268e4-7d26-4e63-8a5c-5d12b7f50328', 'logo', '68aeaddcc63f9_Logo', '68aeaddcc63f9_Logo.png', 'image/png', 'public', 'public', 99622, '[]', '[]', '[]', 2, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true}', '2025-08-27 07:04:48', '2025-08-27 07:04:52'),
(17, 'App\\Models\\Info', 1, '0d5d1edd-09f9-47b9-b420-cfb4104f751b', 'favicon', '68aeadf9ee5fa_download', '68aeadf9ee5fa_download.png', 'image/png', 'public', 'public', 40542, '[]', '[]', '[]', 3, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true}', '2025-08-27 07:04:52', '2025-08-27 07:04:55'),
(18, 'App\\Models\\Info', 1, '415dc4ea-860d-42dc-8c24-d3e13689e1b7', 'about_video', '68aeaf9be1c5f_L1', '68aeaf9be1c5f_L1.mp4', 'video/mp4', 'public', 'public', 788493, '[]', '[]', '[]', 4, '[]', '2025-08-27 07:11:27', '2025-08-27 07:11:27'),
(19, 'App\\Models\\Info', 1, '961106d3-c7bb-44df-b6f2-fffc50b890e7', 'about_photo', '68aeb027a76bc_AboutCEO', '68aeb027a76bc_AboutCEO.png', 'image/png', 'public', 'public', 6901481, '[]', '[]', '[]', 5, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-08-27 07:13:46', '2025-08-27 07:13:54'),
(20, 'App\\Models\\Gallery', 1, '63c50221-15a8-4ba9-8fef-e06adcb299c0', 'photo', '68aeccc69999d_download', '68aeccc69999d_download.jpg', 'image/jpeg', 'public', 'public', 131206, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-08-27 09:15:56', '2025-08-27 09:15:56'),
(21, 'App\\Models\\Link', 1, '580f4da0-8dbb-4c86-8fe1-60dd4303c0c5', 'photo', '68aee65f9db77_Logos-15', '68aee65f9db77_Logos-15.png', 'image/png', 'public', 'public', 70287, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-08-27 11:05:13', '2025-08-27 11:05:14'),
(22, 'App\\Models\\Link', 1, '1d112ceb-1bf8-425d-b568-7533a9e74bfe', 'photo', '68aee6b04e3c1_Logos-16', '68aee6b04e3c1_Logos-16.png', 'image/png', 'public', 'public', 28440, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-08-27 11:06:25', '2025-08-27 11:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` mediumtext DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` mediumtext DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` mediumtext NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'alaa', '9SGYkSzztzmDjvnpLWtFz0nk6gY73GQPIuF8s5Oy', NULL, 'http://localhost', 1, 0, 0, '2025-08-26 12:58:47', '2025-08-26 12:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-08-26 12:58:47', '2025-08-26 12:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` text DEFAULT NULL,
  `vehicle_type_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pickup_location` text NOT NULL,
  `delivery_location` text NOT NULL,
  `preferred_pickup_date` date NOT NULL,
  `notes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(2, 'permission_create', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(3, 'permission_edit', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(4, 'permission_show', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(5, 'permission_delete', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(6, 'permission_access', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(7, 'role_create', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(8, 'role_edit', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(9, 'role_show', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(10, 'role_delete', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(11, 'role_access', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(12, 'user_create', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(13, 'user_edit', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(14, 'user_show', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(15, 'user_delete', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(16, 'user_access', '2019-09-16 04:56:46', '2019-09-16 04:56:46', NULL),
(17, 'article_access', '2024-07-01 07:36:48', '2025-01-31 16:28:30', NULL),
(18, 'article_create', '2024-07-01 07:36:57', '2025-01-31 16:28:27', NULL),
(19, 'article_edit', '2024-07-01 07:37:02', '2025-01-31 16:28:23', NULL),
(20, 'article_show', '2024-07-01 07:37:06', '2025-01-31 16:28:19', NULL),
(21, 'article_delete', '2024-07-01 07:37:13', '2025-01-31 16:28:15', NULL),
(22, 'category_access', '2024-07-01 07:37:24', '2024-07-01 07:37:24', NULL),
(23, 'category_create', '2024-07-01 07:37:30', '2024-07-01 07:37:30', NULL),
(24, 'category_edit', '2024-07-01 07:37:35', '2024-07-01 07:37:35', NULL),
(25, 'category_delete', '2024-07-01 07:37:41', '2024-07-01 07:37:41', NULL),
(26, 'category_show', '2024-07-01 07:37:45', '2024-07-01 07:37:45', NULL),
(27, 'client_access', '2024-07-01 07:37:55', '2024-07-01 07:37:55', NULL),
(28, 'client_create', '2024-07-01 07:38:00', '2024-07-01 07:38:00', NULL),
(29, 'client_edit', '2024-07-01 07:38:05', '2024-07-01 07:38:05', NULL),
(30, 'client_show', '2024-07-01 07:38:11', '2024-07-01 07:38:11', NULL),
(31, 'client_delete', '2024-07-01 07:38:16', '2024-07-01 07:38:16', NULL),
(32, 'gallery_access', '2024-07-01 07:38:28', '2024-11-24 04:24:59', NULL),
(33, 'gallery_create', '2024-07-01 07:38:35', '2024-11-24 04:24:55', NULL),
(34, 'gallery_edit', '2024-07-01 07:38:39', '2024-11-24 04:24:36', NULL),
(35, 'gallery_show', '2024-07-01 07:38:46', '2024-11-24 04:24:31', NULL),
(36, 'gallery_delete', '2024-07-01 07:38:52', '2024-11-24 04:24:26', NULL),
(37, 'property_access', '2024-07-01 07:39:01', '2025-08-26 13:53:18', NULL),
(38, 'property_create', '2024-07-01 07:39:07', '2025-08-26 13:53:14', NULL),
(39, 'property_edit', '2024-07-01 07:39:11', '2025-08-26 13:53:10', NULL),
(40, 'property_show', '2024-07-01 07:39:17', '2025-08-26 13:53:05', NULL),
(41, 'property_delete', '2024-07-01 07:39:23', '2025-08-26 13:52:56', NULL),
(42, 'quote_access', '2024-07-01 07:39:38', '2024-07-01 07:39:38', NULL),
(43, 'quote_create', '2024-07-01 07:39:43', '2024-07-01 07:39:43', NULL),
(44, 'quote_edit', '2024-07-01 07:39:47', '2024-07-01 07:39:47', NULL),
(45, 'quote_show', '2024-07-01 07:39:54', '2024-07-01 07:39:54', NULL),
(46, 'quote_delete', '2024-07-01 07:39:59', '2024-07-01 07:39:59', NULL),
(47, 'rate_access', '2024-07-01 07:40:10', '2024-07-01 07:40:10', NULL),
(48, 'rate_create', '2024-07-01 07:40:15', '2024-07-01 07:40:15', NULL),
(49, 'rate_edit', '2024-07-01 07:40:19', '2024-07-01 07:40:19', NULL),
(50, 'rate_show', '2024-07-01 07:40:24', '2024-07-01 07:40:24', NULL),
(51, 'rate_delete', '2024-07-01 07:40:30', '2024-07-01 07:40:30', NULL),
(52, 'service_access', '2024-07-01 07:40:41', '2024-07-01 07:40:41', NULL),
(53, 'service_create', '2024-07-01 07:40:46', '2024-07-01 07:40:46', NULL),
(54, 'service_edit', '2024-07-01 07:40:51', '2024-07-01 07:40:51', NULL),
(55, 'service_show', '2024-07-01 07:40:59', '2024-07-01 07:40:59', NULL),
(56, 'service_delete', '2024-07-01 07:41:03', '2024-07-01 07:41:03', NULL),
(57, 'specification_access', '2024-07-01 07:41:14', '2024-07-01 07:41:14', NULL),
(58, 'specification_create', '2024-07-01 07:41:19', '2024-07-01 07:41:19', NULL),
(59, 'specification_edit', '2024-07-01 07:41:24', '2024-07-01 07:41:24', NULL),
(60, 'specification_show', '2024-07-01 07:41:30', '2024-07-01 07:41:30', NULL),
(61, 'specification_delete', '2024-07-01 07:41:35', '2024-07-01 07:41:35', NULL),
(62, 'step_access', '2024-07-01 07:41:46', '2024-07-01 07:41:46', NULL),
(63, 'step_create', '2024-07-01 07:41:51', '2024-07-01 07:41:51', NULL),
(64, 'step_edit', '2024-07-01 07:41:55', '2024-07-01 07:41:55', NULL),
(65, 'step_show', '2024-07-01 07:41:59', '2024-07-01 07:41:59', NULL),
(66, 'step_delete', '2024-07-01 07:42:03', '2024-07-01 07:42:03', NULL),
(67, 'tag_access', '2024-07-01 07:42:17', '2024-07-01 07:42:17', NULL),
(68, 'tag_create', '2024-07-01 07:42:22', '2024-07-01 07:42:22', NULL),
(69, 'tag_edit', '2024-07-01 07:42:26', '2024-07-01 07:42:26', NULL),
(70, 'tag_delete', '2024-07-01 07:42:31', '2024-07-01 07:42:31', NULL),
(71, 'tag_show', '2024-07-01 07:42:41', '2024-07-01 07:42:41', NULL),
(72, 'team_access', '2024-07-01 07:43:10', '2024-07-01 07:43:10', NULL),
(73, 'team_create', '2024-07-01 07:43:16', '2024-07-01 07:43:16', NULL),
(74, 'team_edit', '2024-07-01 07:43:21', '2024-07-01 07:43:21', NULL),
(75, 'team_show', '2024-07-01 07:43:25', '2024-07-01 07:43:25', NULL),
(76, 'team_delete', '2024-07-01 07:43:29', '2024-07-01 07:43:29', NULL),
(77, 'slider_access', '2024-07-01 12:33:02', '2024-07-01 12:33:02', NULL),
(78, 'slider_create', '2024-07-01 12:33:08', '2024-07-01 12:33:08', NULL),
(79, 'slider_edit', '2024-07-01 12:33:12', '2024-07-01 12:33:12', NULL),
(80, 'slider_show', '2024-07-01 12:33:16', '2024-07-01 12:33:16', NULL),
(81, 'slider_delete', '2024-07-01 12:33:20', '2024-07-01 12:33:20', NULL),
(82, 'info_access', '2024-07-01 13:06:56', '2024-07-01 13:06:56', NULL),
(83, 'info_create', '2024-07-01 13:07:02', '2024-07-01 13:07:02', NULL),
(84, 'info_edit', '2024-07-01 13:07:06', '2024-07-01 13:07:06', NULL),
(85, 'info_show', '2024-07-01 13:07:11', '2024-07-01 13:07:11', NULL),
(86, 'info_delete', '2024-07-01 13:07:15', '2024-07-01 13:07:15', NULL),
(87, 'link_access', '2024-07-03 13:58:54', '2024-07-03 13:58:54', NULL),
(88, 'link_create', '2024-07-03 13:59:00', '2024-07-03 13:59:00', NULL),
(89, 'link_edit', '2024-07-03 13:59:03', '2024-07-03 13:59:03', NULL),
(90, 'link_show', '2024-07-03 13:59:08', '2024-07-03 13:59:08', NULL),
(91, 'link_delete', '2024-07-03 13:59:15', '2024-07-03 13:59:15', NULL),
(92, 'counter_access', '2024-08-22 06:41:20', '2024-08-22 06:41:20', NULL),
(93, 'counter_create', '2024-08-22 06:41:25', '2024-08-22 06:41:25', NULL),
(94, 'counter_edit', '2024-08-22 06:41:29', '2024-08-22 06:41:29', NULL),
(95, 'counter_show', '2024-08-22 06:41:35', '2024-08-22 06:41:35', NULL),
(96, 'counter_delete', '2024-08-22 06:41:39', '2024-08-22 06:41:43', NULL),
(97, 'reel_access', '2024-08-22 06:41:56', '2024-08-22 06:41:56', NULL),
(98, 'reel_create', '2024-08-22 06:42:01', '2024-08-22 06:42:01', NULL),
(99, 'reel_edit', '2024-08-22 06:42:06', '2024-08-22 06:42:06', NULL),
(100, 'reel_show', '2024-08-22 06:42:13', '2024-08-22 06:42:13', NULL),
(101, 'reel_delete', '2024-08-22 06:42:18', '2024-08-22 06:42:18', NULL),
(102, 'social_access', '2024-09-23 09:12:22', '2024-09-23 09:12:22', NULL),
(103, 'social_create', '2024-09-23 09:12:28', '2024-09-23 09:12:28', NULL),
(104, 'social_edit', '2024-09-23 09:12:32', '2024-09-23 09:12:32', NULL),
(105, 'social_show', '2024-09-23 09:12:36', '2024-09-23 09:12:36', NULL),
(106, 'social_delete', '2024-09-23 09:12:41', '2024-09-23 09:12:41', NULL),
(107, 'gallery_access', '2024-12-09 06:43:58', '2025-08-27 09:14:10', NULL),
(108, 'gallery_create', '2024-12-09 06:44:02', '2025-08-27 09:14:06', NULL),
(109, 'gallery_edit', '2024-12-09 06:44:06', '2025-08-27 09:14:02', NULL),
(110, 'gallery_show', '2024-12-09 06:44:11', '2025-08-27 09:13:59', NULL),
(111, 'gallery_delete', '2024-12-09 06:44:16', '2025-08-27 09:13:55', NULL),
(112, 'branch_access', '2024-12-17 13:54:13', '2024-12-17 13:54:13', NULL),
(113, 'branch_create', '2024-12-17 13:54:18', '2024-12-17 13:54:18', NULL),
(114, 'branch_edit', '2024-12-17 13:54:22', '2024-12-17 13:54:22', NULL),
(115, 'branch_show', '2024-12-17 13:54:27', '2024-12-17 13:54:27', NULL),
(116, 'branch_delete', '2024-12-17 13:54:31', '2024-12-17 13:54:31', NULL),
(117, 'project_access', '2025-02-10 10:03:29', '2025-02-10 10:03:29', NULL),
(118, 'project_create', '2025-02-10 10:03:34', '2025-02-10 10:03:34', NULL),
(119, 'project_edit', '2025-02-10 10:03:38', '2025-02-10 10:03:38', NULL),
(120, 'project_show', '2025-02-10 10:03:42', '2025-02-10 10:03:42', NULL),
(121, 'project_delete', '2025-02-10 10:03:46', '2025-02-10 10:03:46', NULL),
(122, 'feed_access', '2025-04-22 08:31:39', '2025-04-22 08:31:39', NULL),
(123, 'feed_create', '2025-04-22 08:31:47', '2025-04-22 08:31:47', NULL),
(124, 'feed_edit', '2025-04-22 08:31:53', '2025-04-22 08:31:53', NULL),
(125, 'feed_show', '2025-04-22 08:31:58', '2025-04-22 08:31:58', NULL),
(126, 'feed_delete', '2025-04-22 08:32:03', '2025-04-22 08:32:03', NULL),
(127, 'faq_access', '2025-08-12 09:45:47', '2025-08-12 09:45:47', NULL),
(128, 'faq_create', '2025-08-12 09:45:55', '2025-08-12 09:45:55', NULL),
(129, 'faq_edit', '2025-08-12 09:45:59', '2025-08-12 09:45:59', NULL),
(130, 'faq_show', '2025-08-12 09:46:04', '2025-08-12 09:46:04', NULL),
(131, 'faq_delete', '2025-08-12 09:46:10', '2025-08-12 09:46:10', NULL),
(132, 'order_access', '2025-08-16 06:45:11', '2025-08-16 06:45:11', NULL),
(133, 'order_create', '2025-08-16 06:45:17', '2025-08-16 06:45:17', NULL),
(134, 'order_edit', '2025-08-16 06:45:22', '2025-08-16 06:45:22', NULL),
(135, 'order_show', '2025-08-16 06:45:27', '2025-08-16 06:45:27', NULL),
(136, 'order_delete', '2025-08-16 06:45:32', '2025-08-16 06:45:32', NULL),
(137, 'vehicle_type_access', '2025-08-23 05:32:31', '2025-08-23 05:32:31', NULL),
(138, 'vehicle_type_create', '2025-08-23 05:32:36', '2025-08-23 05:32:36', NULL),
(139, 'vehicle_type_edit', '2025-08-23 05:32:40', '2025-08-23 05:32:40', NULL),
(140, 'vehicle_type_show', '2025-08-23 05:32:45', '2025-08-23 05:32:45', NULL),
(141, 'vehicle_type_delete', '2025-08-23 05:32:50', '2025-08-23 05:32:50', NULL),
(142, 'subscriber_access', '2025-08-23 07:00:32', '2025-08-23 07:00:32', NULL),
(143, 'subscriber_create', '2025-08-23 07:00:37', '2025-08-23 07:00:37', NULL),
(144, 'subscriber_edit', '2025-08-23 07:00:41', '2025-08-23 07:00:41', NULL),
(145, 'subscriber_show', '2025-08-23 07:00:45', '2025-08-23 07:00:57', NULL),
(146, 'subscriber_delete', '2025-08-23 07:00:50', '2025-08-23 07:00:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(1, 139),
(1, 140),
(1, 141),
(1, 142),
(1, 143),
(1, 144),
(1, 145),
(1, 146);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` text NOT NULL,
  `sub_title_en` text NOT NULL,
  `description_en` longtext NOT NULL,
  `title_ar` text NOT NULL,
  `sub_title_ar` text NOT NULL,
  `description_ar` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title_en` mediumtext DEFAULT NULL,
  `title_ar` mediumtext DEFAULT NULL,
  `sub_title_en` mediumtext DEFAULT NULL,
  `sub_title_ar` mediumtext DEFAULT NULL,
  `location_en` text DEFAULT NULL,
  `location_ar` text DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `project_date` date DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `category_id`, `title_en`, `title_ar`, `sub_title_en`, `sub_title_ar`, `location_en`, `location_ar`, `description_en`, `description_ar`, `client_name`, `project_date`, `project_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'This is an example of portfolio details', 'لوريم إيبسوم', NULL, NULL, 'Jordan - Amman', 'Jordan - Amman', '<p>\r\n                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.\r\n              </p>\r\n              <p>\r\n                Amet consequatur qui dolore veniam voluptatem voluptatem sit. Non aspernatur atque natus ut cum nam et. Praesentium error dolores rerum minus sequi quia veritatis eum. Eos et doloribus doloremque nesciunt molestiae laboriosam.\r\n              </p>\r\n\r\n              <div class=\"testimonial-item\">\r\n                <p>\r\n                  <i class=\"bi bi-quote quote-icon-left\"></i>\r\n                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>\r\n                  <i class=\"bi bi-quote quote-icon-right\"></i>\r\n                </p>\r\n                <div>\r\n                  <img src=\"/TabanaTimplate/assets/img/testimonials/testimonials-2.jpg\" class=\"testimonial-img\" alt=\"\">\r\n                  <h3>Sara Wilsson</h3>\r\n                  <h4>Designer</h4>\r\n                </div>\r\n              </div>\r\n\r\n              <p>\r\n                Impedit ipsum quae et aliquid doloribus et voluptatem quasi. Perspiciatis occaecati earum et magnam animi. Quibusdam non qui ea vitae suscipit vitae sunt. Repudiandae incidunt cumque minus deserunt assumenda tempore. Delectus voluptas necessitatibus est.\r\n              </p>\r\n\r\n              <p>\r\n                Sunt voluptatum sapiente facilis quo odio aut ipsum repellat debitis. Molestiae et autem libero. Explicabo et quod necessitatibus similique quis dolor eum. Numquam eaque praesentium rem et qui nesciunt.\r\n              </p>', '<h3><b>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</b></h3><p><b>لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم</b></p><p><b><br></b></p><p> إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</p><p> لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;</p>', 'ASU Company', '2025-03-12', 'https://31-agency.com/', '2025-04-22 12:55:32', '2025-08-27 07:17:24', NULL),
(2, 1, 'Lorem Ipsum', 'لوريم إيبسوم', NULL, NULL, 'Jordan - Amman', 'Jordan - Amman', '<div bis_skin_checked=\"1\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div bis_skin_checked=\"1\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div>', '<h3 style=\"color: rgb(20, 20, 20);\"><span style=\"font-weight: 700;\">لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</span></h3><p><span style=\"font-weight: 700;\">لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم</span></p><p><span style=\"font-weight: 700;\"><br></span></p><p>إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</p><p>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;</p>', NULL, NULL, NULL, '2025-08-14 11:32:53', '2025-08-27 07:17:18', NULL),
(3, 1, 'Lorem Ipsum', 'لوريم إيبسوم', NULL, NULL, 'Jordan - Amman', 'Jordan - Amman', '<div bis_skin_checked=\"1\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div bis_skin_checked=\"1\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div>', '<h3 style=\"color: rgb(20, 20, 20);\"><span style=\"font-weight: 700;\">لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</span></h3><p><span style=\"font-weight: 700;\">لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم</span></p><p><span style=\"font-weight: 700;\"><br></span></p><p>إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</p><p>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;</p>', NULL, NULL, NULL, '2025-08-14 11:33:00', '2025-08-27 07:17:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `name_en` mediumtext DEFAULT NULL,
  `name_ar` mediumtext DEFAULT NULL,
  `position` mediumtext DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `name_en`, `name_ar`, `position`, `value`, `description_en`, `description_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Name english', 'علاء الراعي', 'Software Development', 4, 'Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.', 'عربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربيعربي', '2025-04-22 09:29:19', '2025-08-16 07:19:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` mediumtext NOT NULL,
  `title_ar` mediumtext NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reels`
--

CREATE TABLE `reels` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` mediumtext DEFAULT NULL,
  `title_ar` mediumtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2019-09-16 04:53:12', '2019-09-16 04:53:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` mediumtext DEFAULT NULL,
  `title_ar` mediumtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `full_description_en` longtext DEFAULT NULL,
  `full_description_ar` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `full_description_en`, `full_description_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Title english', 'لوريم ايبسوم', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'التكامل في تقديم الخدمات.', '<h3>Temporibus et in vero dicta aut eius lidero plastis trand lined voluptas dolorem ut voluptas</h3>\r\n            <p>\r\n              Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque consequuntur. Accusantium labore reprehenderit error temporibus saepe perferendis fuga doloribus vero. Qui omnis quo sit. Dolorem architecto eum et quos deleniti officia qui.\r\n            </p>\r\n            <ul>\r\n              <li><i class=\"bi bi-check-circle\"></i> <span>Aut eum totam accusantium voluptatem.</span></li>\r\n              <li><i class=\"bi bi-check-circle\"></i> <span>Assumenda et porro nisi nihil nesciunt voluptatibus.</span></li>\r\n              <li><i class=\"bi bi-check-circle\"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>\r\n            </ul>\r\n            <p>\r\n              Est reprehenderit voluptatem necessitatibus asperiores neque sed ea illo. Deleniti quam sequi optio iste veniam repellat odit. Aut pariatur itaque nesciunt fuga.\r\n            </p>\r\n            <p>\r\n              Sunt rem odit accusantium omnis perspiciatis officia. Laboriosam aut consequuntur recusandae mollitia doloremque est architecto cupiditate ullam. Quia est ut occaecati fuga. Distinctio ex repellendus eveniet velit sint quia sapiente cumque. Et ipsa perferendis ut nihil. Laboriosam vel voluptates tenetur nostrum. Eaque iusto cupiditate et totam et quia dolorum in. Sunt molestiae ipsum at consequatur vero. Architecto ut pariatur autem ad non cumque nesciunt qui maxime. Sunt eum quia impedit dolore alias explicabo ea.\r\n            </p>', NULL, '2025-04-22 13:42:37', '2025-08-16 07:03:41', NULL),
(2, 'This is an example ofhfghgf', 'لوريم ايبسوم', 'gfhgfhgf', 'التكامل في تقديم الخدمات.', NULL, NULL, '2025-07-20 11:28:09', '2025-08-16 07:03:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` mediumtext DEFAULT NULL,
  `title_ar` mediumtext DEFAULT NULL,
  `sub_title_en` mediumtext DEFAULT NULL,
  `sub_title_ar` mediumtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_en`, `title_ar`, `sub_title_en`, `sub_title_ar`, `description_en`, `description_ar`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Title 3 english', NULL, 'This nothing but a dummy text just to show content', NULL, NULL, NULL, '', '2025-04-22 06:04:25', '2025-07-20 10:22:43', '2025-07-20 10:22:43'),
(2, 'Title 2 english', NULL, 'This nothing but a dummy text just to show content', NULL, NULL, NULL, '', '2025-04-22 06:06:34', '2025-07-20 10:22:38', '2025-07-20 10:22:38'),
(3, 'Lorem Ipsum is simply dummy text', 'لوريم ايبسوم', 'How are you', 'لوريم إيبسوم', NULL, NULL, 'https://www.facebook.com', '2025-04-22 06:06:41', '2025-08-26 13:22:55', NULL),
(4, 'Lorem Ipsum', 'لوريم إيبسوم', 'This nothing but a dummy text just to show content', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', NULL, NULL, 'https://www.facebook.com', '2025-08-26 13:10:50', '2025-08-26 13:22:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `title`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fab fa-whatsapp', 'https://www.facebook.com', '2025-04-22 07:01:06', '2025-08-14 11:46:33', NULL),
(2, 'fab fa-facebook', 'https://www.facebook.com', '2025-04-22 07:01:29', '2025-08-14 11:43:35', NULL),
(3, 'fab fa-instagram', 'https://www.facebook.com', '2025-04-22 07:01:38', '2025-08-14 11:43:27', NULL),
(4, 'fab fa-linkedin', 'https://www.facebook.com', '2025-04-22 07:01:48', '2025-08-14 11:44:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `title_en` mediumtext DEFAULT NULL,
  `title_ar` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `property_id`, `title_en`, `title_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '3 Beds', 'لوريم إيبسوم', '2025-08-27 07:30:40', '2025-08-27 07:45:32', NULL),
(2, 2, '2 Baths', 'لوريم إيبسوم', '2025-08-27 07:45:47', '2025-08-27 07:45:47', NULL),
(3, 3, '180 m²', 'لوريم إيبسوم', '2025-08-27 07:46:01', '2025-08-27 07:46:01', NULL),
(4, 2, '180 m²', 'لوريم إيبسوم', '2025-08-27 07:55:50', '2025-08-27 07:55:50', NULL),
(5, 3, '180 m²', 'لوريم إيبسوم', '2025-08-27 07:56:06', '2025-08-27 07:56:06', NULL),
(6, 1, '180 m²', 'لوريم إيبسوم', '2025-08-27 07:56:19', '2025-08-27 07:56:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` mediumtext NOT NULL,
  `title_ar` mediumtext NOT NULL,
  `description_en` longtext NOT NULL,
  `description_ar` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `phone`, `message`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', '', '', 'info@starlet-it.com', '2025-08-23 07:03:38', '2025-08-23 07:03:38', NULL),
(2, 'Ala\' Alra\'i', '0797300664', 'cxgxcgcxgcx', 'alra3ealaa3@live.com', '2025-08-23 07:16:31', '2025-08-27 10:56:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` mediumtext NOT NULL,
  `title_ar` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` mediumtext DEFAULT NULL,
  `name_ar` mediumtext DEFAULT NULL,
  `position` mediumtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ar` longtext DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `experience` mediumtext DEFAULT NULL,
  `facebook` mediumtext DEFAULT NULL,
  `twitter` mediumtext DEFAULT NULL,
  `linkedin` mediumtext DEFAULT NULL,
  `instagram` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name_en`, `name_ar`, `position`, `description_en`, `description_ar`, `phone`, `email`, `experience`, `facebook`, `twitter`, `linkedin`, `instagram`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Name english', NULL, 'Software Development', NULL, NULL, NULL, NULL, NULL, 'https://facebook.com/', 'https://facebook.com/StarletIT', 'https://facebook.com/StarletIT', 'https://facebook.com/', '2025-04-22 09:12:31', '2025-04-22 09:12:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `batch_id` char(36) NOT NULL,
  `family_hash` varchar(255) DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `google2fa_secret` varchar(255) DEFAULT NULL,
  `two_fa_token` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google2fa_secret`, `two_fa_token`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HLXDDN7M7266URMT', 'LwEOmQXmlSEfkFijR7GAI4O51e9XwpBZ', 'Main Admin', '0', 'admin@admin.com', '2024-07-17 10:40:39', '$2y$10$vj5XJlkrk4ucKWe8ppEZxeGNDfqKWjLUukL9gCEOhSQBvMiOGrOFe', 'AYgn983NBFK1bTQp3USvwIbDYl81awIchyiEJqdLbZHzLVYDUvdgBFeMTZRh', '2019-09-16 04:53:12', '2025-08-27 06:18:54', NULL),
(2, NULL, NULL, 'Test Account', '9627780993933', 'test@user.com', NULL, '$2y$10$XjNtZpw/pw4CyMBPv4tX4ecYXO2As1bWL8iL2pHTQ5dR3aBURq2Pe', NULL, '2024-12-08 07:56:27', '2025-07-20 10:46:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `title_ar` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Title english', 'لوريم ايبسوم', '2025-08-23 05:38:56', '2025-08-23 05:38:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `otp` mediumtext NOT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocked_ips`
--
ALTER TABLE `blocked_ips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_344225` (`role_id`),
  ADD KEY `permission_id_fk_344225` (`permission_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reels`
--
ALTER TABLE `reels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_344234` (`user_id`),
  ADD KEY `role_id_fk_344234` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD PRIMARY KEY (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `telescope_monitoring`
--
ALTER TABLE `telescope_monitoring`
  ADD PRIMARY KEY (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blocked_ips`
--
ALTER TABLE `blocked_ips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reels`
--
ALTER TABLE `reels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_344225` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_344225` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_344234` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_344234` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
