-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2025 at 10:37 AM
-- Server version: 10.11.14-MariaDB
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resellertwo_rrr360`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_by_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
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
(1, 'Appartments', 'لوريم إيبسوم', '2025-04-22 10:46:13', '2025-09-17 08:59:53', NULL),
(2, 'Villas', 'فلل', '2025-09-11 07:09:03', '2025-09-11 07:09:03', NULL),
(3, 'Lands', 'اراضي', '2025-09-11 07:09:21', '2025-09-17 08:57:27', '2025-09-17 08:57:27'),
(4, 'TownHouse', 'اسطح', '2025-09-11 07:09:34', '2025-09-17 09:14:20', NULL),
(5, 'gfdgfd', NULL, '2025-09-14 09:44:15', '2025-09-17 07:50:22', '2025-09-17 07:50:22');

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
(1, 'Title english', 'لوريم ايبسوم', 'Description english', 'التكامل في تقديم الخدمات.', '2025-08-16 08:03:26', '2025-09-21 10:29:26', '2025-09-21 10:29:26'),
(2, 'How do I search for properties on RRR360?', NULL, 'You can easily search for properties using our intuitive search tool. Filter by property type, location, price range, or other criteria to quickly find listings that match your needs.', NULL, '2025-09-21 10:30:20', '2025-09-21 10:30:20', NULL),
(3, 'Can I list my property on RRR360?', NULL, 'RRR360 allows property owners, developers, and agents to list residential, commercial, and investment properties. Simply create an account and follow our step-by-step listing process to showcase your property to a wide audience.', NULL, '2025-09-21 10:30:35', '2025-09-21 10:30:35', NULL),
(4, 'Is there a fee to use RRR360?', NULL, 'Browsing and searching properties on RRR360 is completely free. Listing fees for property owners or agents vary depending on the type and duration of the listing. Please refer to our pricing page for detailed information.', NULL, '2025-09-21 10:30:48', '2025-09-21 10:30:48', NULL),
(5, 'How do I contact a property owner or agent?', NULL, 'Each property listing includes contact options, such as phone numbers, email, or direct messaging through our platform. You can reach out directly to the owner or agent to schedule a viewing or request additional details.', NULL, '2025-09-21 10:30:59', '2025-09-21 10:30:59', NULL),
(6, 'Can I save my favorite properties?', NULL, 'RRR360 allows registered users to save and organize their favorite properties for easy access later. Simply click the “Save” or “Favorite” button on any listing to add it to your personal collection.', NULL, '2025-09-21 10:31:12', '2025-09-21 10:31:12', NULL),
(7, 'How do I know if a listing is verified?', NULL, 'RRR360 prioritizes trust and transparency. Verified listings are clearly marked on the platform, and we work closely with reputable agents and property owners to ensure accuracy and reliability.', NULL, '2025-09-21 10:31:41', '2025-09-21 10:31:41', NULL),
(8, 'Can I get help with property investment advice?', NULL, 'Absolutely. RRR360 offers professional guidance and insights for investors, helping you identify high-potential opportunities and make informed decisions based on current market trends.', NULL, '2025-09-21 10:31:54', '2025-09-21 10:31:54', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lorem Ipsum', 'لوريم إيبسوم', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', '2025-08-27 09:15:56', '2025-09-21 10:31:58', '2025-09-21 10:31:58'),
(2, 'Website Design & Development', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-09-15 06:07:23', '2025-09-21 10:32:00', '2025-09-21 10:32:00'),
(3, 'Website Design & Development', NULL, 'A construction engineer is a professional responsible for planning, design, managing, and overseeing construction projects. They play a crucial role in ensuring.\'', NULL, '2025-09-15 06:07:53', '2025-09-21 10:32:02', '2025-09-21 10:32:02'),
(4, 'Digital Marketing', NULL, 'Description english', NULL, '2025-09-15 06:08:00', '2025-09-21 10:32:04', '2025-09-21 10:32:04'),
(5, 'Website Design & Development', NULL, 'Description english', NULL, '2025-09-15 06:22:46', '2025-09-21 10:32:06', '2025-09-21 10:32:06'),
(6, 'Website Design & Development', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-09-15 06:22:54', '2025-09-21 10:32:08', '2025-09-21 10:32:08'),
(7, 'Website Design & Development', NULL, 'Description english', NULL, '2025-09-15 06:23:08', '2025-09-21 10:32:10', '2025-09-21 10:32:10'),
(8, 'Website Design & Development', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-09-21 10:32:47', '2025-09-21 10:32:47', NULL),
(9, 'Website Design & Development', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-09-21 10:33:12', '2025-09-21 10:33:12', NULL),
(10, 'Website Design & Development', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-09-21 10:33:33', '2025-09-21 10:33:33', NULL),
(11, 'Website Design & Development', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-09-21 10:33:51', '2025-09-21 10:33:51', NULL),
(12, 'Website Design & Development', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-09-21 10:34:16', '2025-09-21 10:34:16', NULL),
(13, 'Website Design & Development', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-09-21 10:34:30', '2025-09-21 10:34:30', NULL),
(14, 'Website Design & Development', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2025-09-21 10:34:58', '2025-09-21 10:34:58', NULL);

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
  `support_title_en` varchar(255) DEFAULT NULL,
  `support_title_ar` varchar(255) DEFAULT NULL,
  `support_brief_en` text DEFAULT NULL,
  `support_brief_ar` text DEFAULT NULL,
  `support_description_en` text DEFAULT NULL,
  `support_description_ar` text DEFAULT NULL,
  `important_pop_up_title_en` varchar(255) DEFAULT NULL,
  `important_pop_up_title_ar` varchar(255) DEFAULT NULL,
  `important_pop_up_description_en` text DEFAULT NULL,
  `important_pop_up_description_ar` text DEFAULT NULL,
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

INSERT INTO `info` (`id`, `keywords_en`, `keywords_ar`, `title_en`, `title_ar`, `description_en`, `description_ar`, `vision_en`, `vision_ar`, `call_action_en`, `call_action_ar`, `portfolio_en`, `portfolio_ar`, `faq_en`, `faq_ar`, `article_en`, `article_ar`, `get_quote_introduction_en`, `get_quote_introduction_ar`, `get_quote_sub_title_en`, `get_quote_sub_title_ar`, `get_quote_paragraph_en`, `get_quote_paragraph_ar`, `testimonial_en`, `testimonial_ar`, `google_rate`, `about_title_en`, `about_title_ar`, `about_description_en`, `about_description_ar`, `about_full_description_en`, `about_full_description_ar`, `support_title_en`, `support_title_ar`, `support_brief_en`, `support_brief_ar`, `support_description_en`, `support_description_ar`, `important_pop_up_title_en`, `important_pop_up_title_ar`, `important_pop_up_description_en`, `important_pop_up_description_ar`, `address`, `phone`, `email`, `mobile`, `contact_email`, `daily_work`, `daily_hours`, `map`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'RRR360, real estate, property listings, apartments for sale, villas for rent, commercial properties, investment opportunities, Jordan real estate', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'RRR360', 'RRR360', 'RRR360 is a comprehensive real estate platform offering a wide range of properties, from modern apartments and luxury villas to commercial spaces. Our mission is to connect buyers, sellers, and renters with the best opportunities in the market through a seamless and user-friendly experience.', 'قيادة القيمة المبتكرة بشكل كامل مع وجود نماذج خارج الصندوق. متابعة الأسواق المستقلة بشكل تفاعلي بعد قول النتائج العالمية.', 'To become the leading real estate hub in the region, providing transparent, reliable, and innovative solutions that empower clients to make informed property decisions with confidence', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'Find answers to the most common questions about our services, properties, and platform. Our FAQ section is designed to provide quick, clear, and helpful information to guide you through your real estate journey with confidence.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 'GET QUOTE', 'GET QUOTE', 'Planning to transport your vehicle? HB Transit Logistics makes it simple.', 'Planning to transport your vehicle? HB Transit Logistics makes it simple.', 'Our quotes are 100% free, with no hidden fees or obligations. Whether you’re shipping a car, motorcycle, boat, or specialty vehicle, we guarantee clear pricing and reliable service tailored to your needs. Start your journey today with confidence.', 'Our quotes are 100% free, with no hidden fees or obligations. Whether you’re shipping a car, motorcycle, boat, or specialty vehicle, we guarantee clear pricing and reliable service tailored to your needs. Start your journey today with confidence.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', 5.00, 'About Us', 'العقارات', 'At RRR360, we believe real estate is more than property—it’s perspective. Our 360° approach blends market expertise, innovative technology, and a deep understanding of client needs to deliver seamless property experiences from every angle. Whether buying, selling, or investing, we provide a panoramic view of opportunities, guiding you through each step with clarity, integrity, and vision. From prime residential spaces to high-value commercial investments, RRR360 is your trusted partner in turning possibilities into lasting realities.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', '<h3 data-start=\"157\" data-end=\"237\"><strong data-start=\"161\" data-end=\"235\">ABOUT RRR360 – CONNECTING YOU TO EXCEPTIONAL REAL ESTATE OPPORTUNITIES</strong></h3><p data-start=\"239\" data-end=\"749\"><strong data-start=\"239\" data-end=\"251\">OVERVIEW</strong><br data-start=\"251\" data-end=\"254\">\r\nRRR360 is a <strong data-start=\"266\" data-end=\"313\">dynamic and innovative real estate platform</strong> dedicated to bridging the gap between buyers, sellers, renters, and investors. With a focus on <strong data-start=\"409\" data-end=\"450\">quality, diversity, and accessibility</strong>, we showcase a wide array of properties including <strong data-start=\"501\" data-end=\"588\">modern apartments, luxury villas, prime land plots, and strategic commercial spaces</strong>. Our platform is designed to provide <strong data-start=\"626\" data-end=\"683\">seamless access to the best real estate opportunities</strong> in the region, catering to every lifestyle and investment need.</p><h3 data-start=\"751\" data-end=\"772\"><strong data-start=\"755\" data-end=\"770\">OUR MISSION</strong></h3><p data-start=\"773\" data-end=\"1204\">Our mission is to <strong data-start=\"791\" data-end=\"843\">simplify the property search and listing process</strong> by offering an <strong data-start=\"859\" data-end=\"896\">intuitive, user-friendly platform</strong> combined with <strong data-start=\"911\" data-end=\"954\">accurate and up-to-date market insights</strong>. Whether you are looking to <strong data-start=\"983\" data-end=\"1079\">purchase your dream home, secure a commercial space, or invest in high-potential real estate</strong>, RRR360 equips you with the <strong data-start=\"1108\" data-end=\"1153\">tools, guidance, and professional support</strong> necessary to make informed, confident decisions.</p><h3 data-start=\"1206\" data-end=\"1242\"><strong data-start=\"1210\" data-end=\"1240\">DIVERSE PROPERTY PORTFOLIO</strong></h3><p data-start=\"1243\" data-end=\"1378\">At RRR360, we pride ourselves on offering a <strong data-start=\"1287\" data-end=\"1328\">comprehensive selection of properties</strong> tailored to a variety of needs and preferences:</p><ul data-start=\"1379\" data-end=\"1743\">\r\n<li data-start=\"1379\" data-end=\"1502\">\r\n<p data-start=\"1381\" data-end=\"1502\"><strong data-start=\"1381\" data-end=\"1408\">Residential Properties:</strong> From stylish apartments to expansive luxury villas, designed for comfort and modern living.</p>\r\n</li>\r\n<li data-start=\"1503\" data-end=\"1627\">\r\n<p data-start=\"1505\" data-end=\"1627\"><strong data-start=\"1505\" data-end=\"1527\">Commercial Spaces:</strong> Prime offices, retail locations, and strategic business hubs for professionals and entrepreneurs.</p>\r\n</li>\r\n<li data-start=\"1628\" data-end=\"1743\">\r\n<p data-start=\"1630\" data-end=\"1743\"><strong data-start=\"1630\" data-end=\"1659\">Investment Opportunities:</strong> High-potential properties and land plots carefully selected for long-term growth.</p>\r\n</li>\r\n</ul><h3 data-start=\"1745\" data-end=\"1779\"><strong data-start=\"1749\" data-end=\"1777\">COMMITMENT TO EXCELLENCE</strong></h3><p data-start=\"1780\" data-end=\"2104\">We operate with a <strong data-start=\"1798\" data-end=\"1874\">strong commitment to transparency, innovation, and customer satisfaction</strong>, ensuring that every interaction is smooth, reliable, and trustworthy. At RRR360, we believe that <strong data-start=\"1973\" data-end=\"2015\">real estate is more than a transaction</strong> — it is the start of a new chapter in life, whether for living, working, or investing.</p><h3 data-start=\"2106\" data-end=\"2133\"><strong data-start=\"2110\" data-end=\"2131\">WHY CHOOSE RRR360</strong></h3><p data-start=\"2134\" data-end=\"2483\">By combining <strong data-start=\"2147\" data-end=\"2229\">cutting-edge technology, professional expertise, and a passion for real estate</strong>, RRR360 redefines the property experience in the region. Our platform empowers users to <strong data-start=\"2318\" data-end=\"2377\">explore, compare, and select properties with confidence</strong>, offering a personalized approach that makes property discovery <strong data-start=\"2442\" data-end=\"2480\">efficient, engaging, and rewarding</strong>.</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"2485\" data-end=\"2627\"><strong data-start=\"2485\" data-end=\"2625\">RRR360 is not just a platform—it’s your trusted partner in navigating the world of real estate and turning property dreams into reality.</strong></p>', '<h3 data-start=\"112\" data-end=\"130\" style=\"text-align: right; \">لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.</h3>', 'This is Sausan', 'This is Sausan', 'Chat with Sausan', NULL, 'Need help finding your perfect property or listing your real estate? Our support team is here to assist you every step of the way. Chat with us for quick answers, expert guidance, and personalized solutions — anytime you need us.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n        standard dummy text ever since the 1500s.', 'Important Note Title Goes Here', 'Important Note Title Goes Here', 'About RRR360\r\nAt RRR360, we redefine the real estate experience by offering a complete, 360-degree perspective on property solutions. Our name reflects our vision: Reliable, Resourceful, and Results-driven — all delivered with a panoramic approach that covers every angle of your real estate journey. Whether you’re buying your first home, expanding your investment portfolio, or seeking premium commercial spaces, we combine market expertise, innovative technology, and personalized service to turn opportunities into lasting value.\r\nWith a commitment to transparency, precision, and client satisfaction, RRR360 is more than a real estate company — we are your strategic partner in navigating the property market with confidence and clarity', 'Important Note Title Goes HereImportant Note Title Goes HereImportant Note Title Goes HereImportant Note Title Goes HereImportant Note Title Goes HereImportant Note Title Goes HereImportant Note Title Goes HereImportant Note Title Goes HereImportant Note Title Goes HereImportant Note Title Goes Here', 'A108 Adam Street  New York, NY 535022', '962797300664', 'info@example.com', '962793131000', 'contact@example.com', 'Monday - Friday', '9:00AM - 05:00PM', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10746.886712483318!2d35.89676062232835!3d31.959344326153033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca076535df843%3A0x796660fbe467ee11!2sKing%20Abdullah%20I%20Mosque!5e0!3m2!1sen!2sjo!4v1744196619050!5m2!1sen!2sjo\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-04-22 06:47:26', '2025-09-21 10:28:49', NULL);

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
(1, 'https://www.flaticon.com/', '2025-08-27 11:05:13', '2025-09-22 06:53:52', '2025-09-22 06:53:52'),
(2, 'https://www.instagram.com/p/DOtffF9DCKQ/?utm_source=ig_web_copy_link&igsh=dGppd3A1OTVqeWl5', '2025-09-22 07:01:54', '2025-09-22 07:49:49', '2025-09-22 07:49:49'),
(3, 'https://www.instagram.com/p/DOtg9qADEzn/?utm_source=ig_web_copy_link', '2025-09-22 07:08:47', '2025-09-22 07:49:45', '2025-09-22 07:49:45'),
(4, 'https://www.instagram.com/p/DOtffF9DCKQ/?utm_source=ig_web_copy_link', '2025-09-22 07:50:53', '2025-09-22 07:50:53', NULL),
(5, 'https://www.instagram.com/p/DOUKnfHDL5g/?utm_source=ig_web_copy_link', '2025-09-22 07:52:41', '2025-09-22 07:52:41', NULL);

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
(22, 'App\\Models\\Link', 1, '1d112ceb-1bf8-425d-b568-7533a9e74bfe', 'photo', '68aee6b04e3c1_Logos-16', '68aee6b04e3c1_Logos-16.png', 'image/png', 'public', 'public', 28440, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-08-27 11:06:25', '2025-08-27 11:06:25'),
(23, 'App\\Models\\Info', 1, '51fefee1-f494-4374-8e99-f79288083da1', 'logo', '68c274371df44_Logo', '68c274371df44_Logo.png', 'image/png', 'public', 'public', 99622, '[]', '[]', '[]', 6, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-11 07:05:05', '2025-09-11 07:05:10'),
(24, 'App\\Models\\Info', 1, '74647a3c-503f-4ae8-bd93-c8797457ad56', 'favicon', '68c2743a3bda8_AboutBG', '68c2743a3bda8_AboutBG.png', 'image/png', 'public', 'public', 40542, '[]', '[]', '[]', 7, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-11 07:05:10', '2025-09-11 07:05:13'),
(25, 'App\\Models\\Info', 1, 'c3825d49-c381-4203-bf41-799a35b21a42', 'about_photo', '68c2743dcf97a_AboutCEO', '68c2743dcf97a_AboutCEO.png', 'image/png', 'public', 'public', 6901481, '[]', '[]', '[]', 8, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-11 07:05:13', '2025-09-11 07:05:21'),
(26, 'App\\Models\\Info', 1, '63bb948f-8c54-4816-b96e-813af8419892', 'about_video', '68c274995912d_8d0e401f03790a9e89087c48a75d7190', '68c274995912d_8d0e401f03790a9e89087c48a75d7190.mp4', 'video/x-m4v', 'public', 'public', 1173639, '[]', '[]', '[]', 9, '[]', '2025-09-11 07:05:21', '2025-09-11 07:05:21'),
(28, 'App\\Models\\Info', 1, '2a5fc0af-d109-477e-811c-f25564475396', 'support', '68c6784940fcb_Support', '68c6784940fcb_Support.jpg', 'image/jpeg', 'public', 'public', 532737, '[]', '[]', '[]', 10, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_support\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-14 08:09:49', '2025-09-14 08:09:52'),
(31, 'App\\Models\\Slider', 4, '7a62ceb8-7716-407c-9087-c2bb34b62d9b', 'picture', '68c6b2e94276f_2019-02-12T000000Z_918761862_MT1NURPHO00070XP01_RTRMADP_3_JORDAN-DAILY-LIFE', '68c6b2e94276f_2019-02-12T000000Z_918761862_MT1NURPHO00070XP01_RTRMADP_3_JORDAN-DAILY-LIFE.jpg', 'image/jpeg', 'public', 'public', 1007136, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-14 12:19:54', '2025-09-14 12:19:56'),
(32, 'App\\Models\\Slider', 3, 'b13bba45-b315-4a63-86c4-870997fe379c', 'picture', '68c6b2fe56449_2', '68c6b2fe56449_2.jpeg', 'image/jpeg', 'public', 'public', 2265741, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-14 12:20:15', '2025-09-14 12:20:16'),
(45, 'App\\Models\\Gallery', 1, '74420fe7-46ab-4051-b4b3-e24636a071f9', 'photo', '68c7a8820bc7b_1', '68c7a8820bc7b_1.jpeg', 'image/jpeg', 'public', 'public', 2088626, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-15 05:47:48', '2025-09-15 05:47:50'),
(46, 'App\\Models\\Gallery', 2, '9fbc58be-0bf5-4b55-9ed7-1912c832ff19', 'photo', '68c7a8bb327fd_2', '68c7a8bb327fd_2.jpeg', 'image/jpeg', 'public', 'public', 2265741, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-15 06:07:24', '2025-09-15 06:07:25'),
(47, 'App\\Models\\Gallery', 3, '1a0ca0ed-059b-4873-845e-a6c24954df36', 'photo', '68c7ad3595f0c_15', '68c7ad3595f0c_15.jpeg', 'image/jpeg', 'public', 'public', 3736121, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-15 06:07:53', '2025-09-15 06:07:53'),
(48, 'App\\Models\\Gallery', 4, 'f7e0e5fe-c977-4e91-9287-877b42b7218b', 'photo', '68c7ad3dd59a5_16', '68c7ad3dd59a5_16.jpeg', 'image/jpeg', 'public', 'public', 3350038, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-15 06:08:00', '2025-09-15 06:08:01'),
(49, 'App\\Models\\Gallery', 5, 'cce43854-4426-49bf-aaf0-fad04dfd20f1', 'photo', '68c7b0b3ec301_6', '68c7b0b3ec301_6.jpeg', 'image/jpeg', 'public', 'public', 2333690, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-15 06:22:46', '2025-09-15 06:22:47'),
(50, 'App\\Models\\Gallery', 6, '6c80972f-d5f0-494f-994e-01d6f3b2c347', 'photo', '68c7b0bbecfb1_10', '68c7b0bbecfb1_10.jpeg', 'image/jpeg', 'public', 'public', 2460118, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-15 06:22:54', '2025-09-15 06:22:55'),
(51, 'App\\Models\\Gallery', 7, '1e76a7df-818b-43b4-bba0-4ffa72e1dbe3', 'photo', '68c7b0c94c9cc_2', '68c7b0c94c9cc_2.jpeg', 'image/jpeg', 'public', 'public', 2265741, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-15 06:23:08', '2025-09-15 06:23:08'),
(52, 'App\\Models\\Info', 1, '03365168-0dc1-4a8c-9fb5-ee982c9801ec', 'logo', '68c7bb83a020c_Logo', '68c7bb83a020c_Logo.png', 'image/png', 'public', 'public', 99622, '[]', '[]', '[]', 12, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_support\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-15 07:09:24', '2025-09-15 07:09:27'),
(53, 'App\\Models\\Info', 1, '9d14d2bf-8e1e-4358-9338-de5ad1af95e7', 'support', '68c7bb8752fee_Support', '68c7bb8752fee_Support.jpg', 'image/jpeg', 'public', 'public', 532737, '[]', '[]', '[]', 13, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_support\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-15 07:09:27', '2025-09-15 07:09:30'),
(54, 'App\\Models\\Info', 1, 'f137cd51-096b-4af7-b762-addc564b5ad1', 'favicon', '68c7bb8a5eee4_AboutBG', '68c7bb8a5eee4_AboutBG.png', 'image/png', 'public', 'public', 40542, '[]', '[]', '[]', 14, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_support\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-15 07:09:30', '2025-09-15 07:09:33'),
(55, 'App\\Models\\Info', 1, 'c9dfe9c1-0920-466e-a31b-23f51b6650a0', 'about_photo', '68c7bb8dccd5d_AboutCEO', '68c7bb8dccd5d_AboutCEO.png', 'image/png', 'public', 'public', 6901481, '[]', '[]', '[]', 15, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_support\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-15 07:09:33', '2025-09-15 07:09:40'),
(57, 'App\\Models\\Info', 1, '99d1fea1-a77f-46dd-b66c-cd5d137beb78', 'logo', '68c93c2a03b25_Logo', '68c93c2a03b25_Logo.png', 'image/png', 'public', 'public', 99622, '[]', '[]', '[]', 17, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_support\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-16 10:30:30', '2025-09-16 10:30:32'),
(58, 'App\\Models\\Info', 1, '21b4a056-c608-441a-82b0-daf6e5e453d1', 'support', '68c93c303950b_Support', '68c93c303950b_Support.jpg', 'image/jpeg', 'public', 'public', 532737, '[]', '[]', '[]', 18, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_support\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-16 10:30:32', '2025-09-16 10:30:33'),
(59, 'App\\Models\\Info', 1, '702ebc2c-1eee-47b6-a717-b6f4f7973808', 'favicon', '68c93c33eb6e3_AboutBG', '68c93c33eb6e3_AboutBG.png', 'image/png', 'public', 'public', 40542, '[]', '[]', '[]', 19, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_support\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-16 10:30:33', '2025-09-16 10:30:34'),
(61, 'App\\Models\\Slider', 4, '6bd21a42-3cec-491d-b925-3d7d0ab1ce41', 'picture', '68c93cbd14e67_IMGRF', '68c93cbd14e67_IMGRF.jpg', 'image/jpeg', 'public', 'public', 37516, '[]', '[]', '[]', 4, '{\"thumb\":true}', '2025-09-16 10:32:30', '2025-09-16 10:32:30'),
(62, 'App\\Models\\Slider', 3, '3afd8cb4-15ef-4c15-8578-9aa9717c863a', 'picture', '68c93cc5669eb_IMGRF', '68c93cc5669eb_IMGRF.jpg', 'image/jpeg', 'public', 'public', 37516, '[]', '[]', '[]', 4, '{\"thumb\":true}', '2025-09-16 10:32:39', '2025-09-16 10:32:39'),
(63, 'App\\Models\\Info', 1, 'a52eeeff-6ee1-47da-a074-c0751836f576', 'about_photo', '68c93d505c81f_AboutCEO', '68c93d505c81f_AboutCEO.png', 'image/png', 'public', 'public', 6901481, '[]', '[]', '[]', 20, '{\"thumb\":true,\"thumb_logo\":true,\"thumb_support\":true,\"thumb_footer\":true,\"thumb_favicon\":true,\"thumb_get_quote\":true,\"thumb_how_photo\":true,\"thumb_about_photo\":true}', '2025-09-16 10:34:59', '2025-09-16 10:35:06'),
(65, 'App\\Models\\Property', 4, '01554a66-4460-4b0b-b50b-0d838b5895bd', 'photos', '68c93d9ce663f_IMGRF', '68c93d9ce663f_IMGRF.jpg', 'image/jpeg', 'public', 'public', 37516, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-16 10:36:15', '2025-09-16 10:36:15'),
(67, 'App\\Models\\Property', 6, 'd7871e8b-dc37-46dc-a12d-cbbe39313b57', 'photos', '68ca6a666a6e0_download (1)', '68ca6a666a6e0_download-(1).jpg', 'image/jpeg', 'public', 'public', 7164, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 08:00:01', '2025-09-17 08:00:01'),
(68, 'App\\Models\\Property', 7, 'e16d884f-183f-4c87-8e33-a395b2e1312f', 'photos', '68ca6b9e8da2f_roof', '68ca6b9e8da2f_roof.jpg', 'image/jpeg', 'public', 'public', 11404, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 08:05:12', '2025-09-17 08:05:12'),
(69, 'App\\Models\\Property', 8, 'c5ada13a-f869-4950-8f1b-29ad151de612', 'photos', '68ca6c70f0b86_land', '68ca6c70f0b86_land.jpg', 'image/jpeg', 'public', 'public', 10854, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 08:10:05', '2025-09-17 08:10:05'),
(70, 'App\\Models\\Info', 1, 'ab7eb8b2-7ce4-42f0-95de-ec27d9514dda', 'about_video', '68ca72a17e5db_Dream home in Sydney, Australia - Cordony Group (1080p, h264)', '68ca72a17e5db_Dream-home-in-Sydney,-Australia---Cordony-Group-(1080p,-h264).mp4', 'application/x-empty', 'public', 'public', 0, '[]', '[]', '[]', 21, '[]', '2025-09-17 08:34:48', '2025-09-17 08:34:48'),
(71, 'App\\Models\\Info', 1, 'bdad5dcf-4c64-4cb2-8149-94388dcdd09f', 'about_video', '68ca7405d118a_Fairytale Tudor  A Luxury House Tour - J Frisk Film & Photo (1080p, h264)', '68ca7405d118a_Fairytale-Tudor--A-Luxury-House-Tour---J-Frisk-Film-&-Photo-(1080p,-h264).mp4', 'video/mp4', 'public', 'public', 50750546, '[]', '[]', '[]', 22, '[]', '2025-09-17 08:40:43', '2025-09-17 08:40:43'),
(72, 'App\\Models\\Info', 1, '38390189-db5d-4c84-b418-724f23c9915b', 'about_video', '68ca7767e1c39_How Logistics Real Estate Powers the U.S. Economy - Link Logistics (1080p, h264)', '68ca7767e1c39_How-Logistics-Real-Estate-Powers-the-U.S.-Economy---Link-Logistics-(1080p,-h264).mp4', 'video/mp4', 'public', 'public', 66971617, '[]', '[]', '[]', 23, '[]', '2025-09-17 08:55:09', '2025-09-17 08:55:09'),
(73, 'App\\Models\\Property', 9, '0bfb9e3b-db86-46a8-a83e-f874897ae54f', 'photos', '68ca8bcf00b12_appartment', '68ca8bcf00b12_appartment.jpeg', 'image/jpeg', 'public', 'public', 73550, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 10:26:56', '2025-09-17 10:26:56'),
(74, 'App\\Models\\Property', 9, '7a8bd131-b918-4e97-b4d5-fb9e99819730', 'photos', '68ca8d962a7fd_appartment', '68ca8d962a7fd_appartment.jpeg', 'image/avif', 'public', 'public', 6892, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 10:33:16', '2025-09-17 10:33:16'),
(75, 'App\\Models\\Property', 9, '33a8b61b-8a82-417e-a0b4-4a72fd0098fe', 'photos', '68ca8e2e77a3b_gym appartment', '68ca8e2e77a3b_gym-appartment.jpeg', 'image/jpeg', 'public', 'public', 73207, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 10:33:16', '2025-09-17 10:33:16'),
(76, 'App\\Models\\Property', 5, '01268579-734c-4dc9-b059-b5e95645eecb', 'photos', '68ca926a74674_ae474bb4-e7ea-47ed-bfba-e1197f30c398-ezgif.com-avif-to-jpg-converter', '68ca926a74674_ae474bb4-e7ea-47ed-bfba-e1197f30c398-ezgif.com-avif-to-jpg-converter.jpg', 'image/jpeg', 'public', 'public', 91095, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 11:03:50', '2025-09-17 11:03:50'),
(77, 'App\\Models\\Property', 5, '831c1e7d-0c20-43b6-beca-b48144843738', 'photos', '68ca952d4f22b_6ce9ae1a-c10d-45ef-93e0-3530c396bf05-ezgif.com-avif-to-jpg-converter', '68ca952d4f22b_6ce9ae1a-c10d-45ef-93e0-3530c396bf05-ezgif.com-avif-to-jpg-converter.jpg', 'image/jpeg', 'public', 'public', 309331, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 11:03:50', '2025-09-17 11:03:50'),
(78, 'App\\Models\\Property', 5, '5967ccba-ac32-4c0a-a83b-877b81dab9b4', 'photos', '68ca957fe4e82_3f033b3e-6afa-4507-926d-3d5284da2c71-ezgif.com-avif-to-jpg-converter', '68ca957fe4e82_3f033b3e-6afa-4507-926d-3d5284da2c71-ezgif.com-avif-to-jpg-converter.jpg', 'image/jpeg', 'public', 'public', 377607, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 11:03:50', '2025-09-17 11:03:50'),
(79, 'App\\Models\\Property', 10, '7441cb30-0e2e-4911-8c3a-a0556403c5fe', 'photos', '68ca9789af66f_07ba97df-fdab-40d9-98f7-8290202044cd-ezgif.com-avif-to-jpg-converter', '68ca9789af66f_07ba97df-fdab-40d9-98f7-8290202044cd-ezgif.com-avif-to-jpg-converter.jpg', 'image/jpeg', 'public', 'public', 168427, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 11:14:21', '2025-09-17 11:14:21'),
(80, 'App\\Models\\Property', 10, '786add9c-d178-4d77-bb76-3591d58b1cd7', 'photos', '68ca978d201d4_a8d65e99-900c-4bea-a69c-f8403343f60d-ezgif.com-avif-to-jpg-converter', '68ca978d201d4_a8d65e99-900c-4bea-a69c-f8403343f60d-ezgif.com-avif-to-jpg-converter.jpg', 'image/jpeg', 'public', 'public', 181699, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 11:14:21', '2025-09-17 11:14:21'),
(81, 'App\\Models\\Property', 10, '1f7eea3d-bb36-49f3-a0fa-527f208a56f8', 'photos', '68ca978f8e6d3_770e6fd4-825c-4b17-89c1-a5bd38b11d58-ezgif.com-avif-to-jpg-converter', '68ca978f8e6d3_770e6fd4-825c-4b17-89c1-a5bd38b11d58-ezgif.com-avif-to-jpg-converter.jpg', 'image/jpeg', 'public', 'public', 102956, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 11:14:21', '2025-09-17 11:14:21'),
(82, 'App\\Models\\Property', 11, '3ad0094d-3b3d-48ab-9010-6bf8af206642', 'photos', '68ca9a5ca0376_b33371d3-9f57-4747-917b-c7d3bd8df9fe-ezgif.com-avif-to-jpg-converter', '68ca9a5ca0376_b33371d3-9f57-4747-917b-c7d3bd8df9fe-ezgif.com-avif-to-jpg-converter.jpg', 'image/jpeg', 'public', 'public', 17755, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 11:25:44', '2025-09-17 11:25:44'),
(83, 'App\\Models\\Property', 11, 'ff160bd2-9c6e-4df0-8b3b-af93460d866c', 'photos', '68ca9a5ea571f_7dd5dbdf-034e-4ff8-8a26-016cc3c8ec97-ezgif.com-avif-to-jpg-converter', '68ca9a5ea571f_7dd5dbdf-034e-4ff8-8a26-016cc3c8ec97-ezgif.com-avif-to-jpg-converter.jpg', 'image/jpeg', 'public', 'public', 98032, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 11:25:44', '2025-09-17 11:25:45'),
(84, 'App\\Models\\Property', 11, 'e7f87b91-5d26-4556-a157-71c5d1fcfb2d', 'photos', '68ca9a60e0b68_0957fc8b-c7e1-415a-8194-1d9433027ff6-ezgif.com-avif-to-jpg-converter', '68ca9a60e0b68_0957fc8b-c7e1-415a-8194-1d9433027ff6-ezgif.com-avif-to-jpg-converter.jpg', 'image/jpeg', 'public', 'public', 305354, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 11:25:45', '2025-09-17 11:25:45'),
(85, 'App\\Models\\Property', 12, '57f6b51d-831a-41d1-acac-0d46943f9c1e', 'photos', '68caa8341991a_ext_3_3165246', '68caa8341991a_ext_3_3165246.jpg', 'image/jpeg', 'public', 'public', 419745, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 12:24:46', '2025-09-17 12:24:46'),
(86, 'App\\Models\\Property', 12, '7f8cef92-2e65-40c1-9cea-1bfcc13ba244', 'photos', '68caa83c1c32a_ext_6_3165246', '68caa83c1c32a_ext_6_3165246.jpg', 'image/jpeg', 'public', 'public', 436266, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 12:24:46', '2025-09-17 12:24:47'),
(87, 'App\\Models\\Property', 12, 'c0b4b189-3903-4723-80b1-b4817e965471', 'photos', '68caa840e0407_ext_2_3165246', '68caa840e0407_ext_2_3165246.jpg', 'image/jpeg', 'public', 'public', 567496, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 12:24:47', '2025-09-17 12:24:47'),
(88, 'App\\Models\\Property', 13, '75758fea-ddb8-4de2-92ad-71cd832f5add', 'photos', '68caa9b52c052_ext_0_4290153', '68caa9b52c052_ext_0_4290153.jpg', 'image/jpeg', 'public', 'public', 496060, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 12:31:35', '2025-09-17 12:31:35'),
(89, 'App\\Models\\Property', 13, '09a777e0-edc4-41db-b870-a5b213bab6c8', 'photos', '68caa9b6cb405_ext_2_4290153', '68caa9b6cb405_ext_2_4290153.jpg', 'image/jpeg', 'public', 'public', 662862, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 12:31:35', '2025-09-17 12:31:35'),
(90, 'App\\Models\\Property', 13, 'ee04174e-8af1-437a-8f4d-3a1e21544645', 'photos', '68caa9bbdbe1d_ext_1_4290153', '68caa9bbdbe1d_ext_1_4290153.jpg', 'image/jpeg', 'public', 'public', 908492, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 12:31:35', '2025-09-17 12:31:35'),
(91, 'App\\Models\\Property', 14, '93d7ce39-eada-4628-828c-f841e20a124a', 'photos', '68caab3ebefdc_ext_3_4049459', '68caab3ebefdc_ext_3_4049459.jpg', 'image/jpeg', 'public', 'public', 623119, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 12:38:03', '2025-09-17 12:38:03'),
(92, 'App\\Models\\Property', 14, '66f05e54-58ba-4022-9b3d-f611a2649787', 'photos', '68caab4532b7c_ext_5_4049459', '68caab4532b7c_ext_5_4049459.jpg', 'image/jpeg', 'public', 'public', 601854, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 12:38:03', '2025-09-17 12:38:03'),
(93, 'App\\Models\\Property', 14, '9f50b94a-ddff-4720-b9e2-0c73ab76298f', 'photos', '68caab527a1d1_ext_1_4049459', '68caab527a1d1_ext_1_4049459.jpg', 'image/jpeg', 'public', 'public', 718750, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 12:38:03', '2025-09-17 12:38:03'),
(94, 'App\\Models\\Property', 15, '19dd35f0-69da-47eb-9e54-a2157d96eaed', 'photos', '68caad48c4093_ext_6_4334127', '68caad48c4093_ext_6_4334127.jpg', 'image/jpeg', 'public', 'public', 436437, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 12:45:42', '2025-09-17 12:45:42'),
(95, 'App\\Models\\Property', 15, '425c6afa-16c0-4261-b835-0f08d69ae85b', 'photos', '68caad4d8b9c0_ext_1_4334127', '68caad4d8b9c0_ext_1_4334127.jpg', 'image/jpeg', 'public', 'public', 424793, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 12:45:42', '2025-09-17 12:45:42'),
(96, 'App\\Models\\Property', 15, '3562890b-f4b1-4e55-9424-32f64de4478f', 'photos', '68caad523ee9e_ext_5_4334127', '68caad523ee9e_ext_5_4334127.jpg', 'image/jpeg', 'public', 'public', 591451, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 12:45:42', '2025-09-17 12:45:42'),
(97, 'App\\Models\\Property', 16, '71828c99-1b93-4ae7-9880-455d13a70435', 'photos', '68caaed1611ff_ext_0_4280406', '68caaed1611ff_ext_0_4280406.jpg', 'image/jpeg', 'public', 'public', 838514, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 12:52:32', '2025-09-17 12:52:33'),
(98, 'App\\Models\\Property', 16, '3db1282b-35d1-488d-b754-bf1088902ec7', 'photos', '68caaed5766bb_ext_4_4280406', '68caaed5766bb_ext_4_4280406.jpg', 'image/jpeg', 'public', 'public', 228183, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 12:52:33', '2025-09-17 12:52:33'),
(99, 'App\\Models\\Property', 16, '828311bf-4af5-45dc-b00d-890d5f1b5a66', 'photos', '68caaed9a26f8_ext_6_4280406', '68caaed9a26f8_ext_6_4280406.jpg', 'image/jpeg', 'public', 'public', 147107, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 12:52:33', '2025-09-17 12:52:33'),
(100, 'App\\Models\\Property', 17, '391fb025-6d6c-4242-b71b-7a1bae8263bb', 'photos', '68cab07d71821_ext_0_3569417', '68cab07d71821_ext_0_3569417.jpg', 'image/jpeg', 'public', 'public', 748255, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 12:59:05', '2025-09-17 12:59:05'),
(101, 'App\\Models\\Property', 17, '515ea3f3-cff4-4f34-910c-e740eba9f22e', 'photos', '68cab07e807d2_ext_3_3569417', '68cab07e807d2_ext_3_3569417.jpg', 'image/jpeg', 'public', 'public', 603318, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 12:59:05', '2025-09-17 12:59:05'),
(102, 'App\\Models\\Property', 17, '50db34c5-7972-46cc-8a79-ee833e19f91c', 'photos', '68cab082a9212_ext_6_3569417', '68cab082a9212_ext_6_3569417.jpg', 'image/jpeg', 'public', 'public', 788076, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 12:59:05', '2025-09-17 12:59:05'),
(103, 'App\\Models\\Property', 18, 'da2ec6f7-5513-4e92-ba71-4ba380819c97', 'photos', '68cab24d8a99b_ext_0_4061678', '68cab24d8a99b_ext_0_4061678.jpg', 'image/jpeg', 'public', 'public', 719068, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 13:07:30', '2025-09-17 13:07:30'),
(104, 'App\\Models\\Property', 18, 'd5030e66-25dd-450e-a249-8a71079707a8', 'photos', '68cab2507876c_ext_1_4061678', '68cab2507876c_ext_1_4061678.jpg', 'image/jpeg', 'public', 'public', 569582, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 13:07:30', '2025-09-17 13:07:30'),
(105, 'App\\Models\\Property', 18, 'e69839df-06cc-4fa7-9c26-498f19064b04', 'photos', '68cab25363281_ext_5_4061678', '68cab25363281_ext_5_4061678.jpg', 'image/jpeg', 'public', 'public', 634772, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 13:07:30', '2025-09-17 13:07:30'),
(106, 'App\\Models\\Property', 19, 'c5532841-2ab0-4efd-8264-db8634426b1e', 'photos', '68caba3c3a509_03cb6a3820c62e8704346b046944a51a-cc_ft_1152', '68caba3c3a509_03cb6a3820c62e8704346b046944a51a-cc_ft_1152.webp', 'image/webp', 'public', 'public', 157292, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 13:40:23', '2025-09-17 13:40:23'),
(107, 'App\\Models\\Property', 19, 'f8c964ad-b965-4c5a-8c3b-1622278df9db', 'photos', '68caba3d9c793_4528adceab2d00e83e4d1cbd386cd5b4-cc_ft_1152', '68caba3d9c793_4528adceab2d00e83e4d1cbd386cd5b4-cc_ft_1152.webp', 'image/webp', 'public', 'public', 95028, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 13:40:23', '2025-09-17 13:40:23'),
(108, 'App\\Models\\Property', 19, '33d252b5-4605-41df-9d6d-f516d8484322', 'photos', '68caba4038f34_523af924a80d65be409781619b63f863-cc_ft_1152', '68caba4038f34_523af924a80d65be409781619b63f863-cc_ft_1152.webp', 'image/webp', 'public', 'public', 102056, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 13:40:23', '2025-09-17 13:40:23'),
(109, 'App\\Models\\Property', 20, '6fcab5d2-048d-4c0d-97ee-fce60f760f5e', 'photos', '68cabb271f9ce_3968788d84b2fa197eb3f1d0d8924026-cc_ft_1152', '68cabb271f9ce_3968788d84b2fa197eb3f1d0d8924026-cc_ft_1152.webp', 'image/webp', 'public', 'public', 281516, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 13:45:19', '2025-09-17 13:45:19'),
(110, 'App\\Models\\Property', 20, 'e3a60618-cf94-4c95-858d-6b207fdd3fd7', 'photos', '68cabb2ab7611_608bb29b593d3b14ae07eccf4bff721f-cc_ft_1152', '68cabb2ab7611_608bb29b593d3b14ae07eccf4bff721f-cc_ft_1152.webp', 'image/webp', 'public', 'public', 170528, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 13:45:19', '2025-09-17 13:45:19'),
(111, 'App\\Models\\Property', 20, '1bc3d898-31cf-4dae-9b0e-f5d4b07c6281', 'photos', '68cabb2d4adb0_0c84acd1771d021dc1bdb2508928c8ce-cc_ft_576', '68cabb2d4adb0_0c84acd1771d021dc1bdb2508928c8ce-cc_ft_576.webp', 'image/webp', 'public', 'public', 34292, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 13:45:19', '2025-09-17 13:45:19'),
(113, 'App\\Models\\Property', 21, '661ec962-7466-442a-a0f2-8635d67f2b0f', 'photos', '68cabc3cca1c6_e727edfcf743287802aca70ee0abada1-cc_ft_576', '68cabc3cca1c6_e727edfcf743287802aca70ee0abada1-cc_ft_576.webp', 'image/webp', 'public', 'public', 36438, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 13:49:32', '2025-09-17 13:49:32'),
(114, 'App\\Models\\Property', 21, '238291aa-59b6-4862-80c9-3c7b9c48e5dc', 'photos', '68cabc3f480af_dd363d3dc3a12393a6e9547ac6f04139-cc_ft_576', '68cabc3f480af_dd363d3dc3a12393a6e9547ac6f04139-cc_ft_576.webp', 'image/webp', 'public', 'public', 37790, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 13:49:32', '2025-09-17 13:49:33'),
(115, 'App\\Models\\Property', 22, '93407513-1b7a-4f2c-a967-b674203a1f44', 'photos', '68cabd2d8cb6f_3b29653b279f2bfc2f9386739a035d54-cc_ft_1152', '68cabd2d8cb6f_3b29653b279f2bfc2f9386739a035d54-cc_ft_1152.webp', 'image/webp', 'public', 'public', 266258, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-17 13:53:59', '2025-09-17 13:53:59'),
(116, 'App\\Models\\Property', 22, 'ae678b60-58ff-40f7-952e-84ee514356c2', 'photos', '68cabd30b90b4_1cfd233e27ac593865bebabc82484b04-cc_ft_1152', '68cabd30b90b4_1cfd233e27ac593865bebabc82484b04-cc_ft_1152.webp', 'image/webp', 'public', 'public', 115738, '[]', '[]', '[]', 2, '{\"thumb\":true}', '2025-09-17 13:53:59', '2025-09-17 13:53:59'),
(117, 'App\\Models\\Property', 22, '726664f3-4962-403e-b46b-d1517767b3f2', 'photos', '68cabd333c8fe_35c9b7895b0523e5402fe2260a87fd86-cc_ft_576', '68cabd333c8fe_35c9b7895b0523e5402fe2260a87fd86-cc_ft_576.webp', 'image/webp', 'public', 'public', 42558, '[]', '[]', '[]', 3, '{\"thumb\":true}', '2025-09-17 13:53:59', '2025-09-17 13:53:59'),
(118, 'App\\Models\\Slider', 4, '3003beee-6a30-46e8-85e2-f370a696fe03', 'picture', '68cfcc5e5c7e4_Modern-design-kitchen-in-Shanghai_Valcucine', '68cfcc5e5c7e4_Modern-design-kitchen-in-Shanghai_Valcucine.jpg', 'image/jpeg', 'public', 'public', 489726, '[]', '[]', '[]', 5, '{\"thumb\":true}', '2025-09-21 09:58:55', '2025-09-21 09:58:56'),
(119, 'App\\Models\\Slider', 5, '25298ae4-eaf2-4706-bb8b-3f9d838890d5', 'picture', '68cfcce294590_44604_00-2025-01-08-1522', '68cfcce294590_44604_00-2025-01-08-1522.jpg', 'image/jpeg', 'public', 'public', 303055, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-21 10:01:29', '2025-09-21 10:01:30'),
(120, 'App\\Models\\Info', 1, '49c055fc-63e5-4633-9803-a3b507ee84f5', 'about_video', '68cfcf3c0b88a_How to be a SUCCESSFUL Real Estate Agent in 7 Steps  Ryan Serhant - Ryan Serhant (720p, h264)', '68cfcf3c0b88a_How-to-be-a-SUCCESSFUL-Real-Estate-Agent-in-7-Steps--Ryan-Serhant---Ryan-Serhant-(720p,-h264).mp4', 'video/mp4', 'public', 'public', 63648996, '[]', '[]', '[]', 24, '[]', '2025-09-21 10:11:10', '2025-09-21 10:11:10'),
(121, 'App\\Models\\Gallery', 8, '1ad7a394-0fb2-45ba-bb2e-0e764f30d091', 'photo', '68cfd44a94ff5_shutterstock_436927078', '68cfd44a94ff5_shutterstock_436927078.jpg', 'image/jpeg', 'public', 'public', 733775, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-21 10:32:47', '2025-09-21 10:32:47'),
(122, 'App\\Models\\Gallery', 9, '59b23e07-f9b8-4760-80ed-d0dbc357f68c', 'photo', '68cfd465a2022_hurghadiansproperty_A_modern_living_room_with_large_windows_off_f106fc83-b943-474e-84eb-b401c86bb567', '68cfd465a2022_hurghadiansproperty_A_modern_living_room_with_large_windows_off_f106fc83-b943-474e-84eb-b401c86bb567.webp', 'image/webp', 'public', 'public', 89614, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-21 10:33:12', '2025-09-21 10:33:12'),
(123, 'App\\Models\\Gallery', 10, '12e1ff2f-c7d1-451e-9775-a1904641d74f', 'photo', '68cfd47a02d57_shutterstock_2250770283-1-scaled', '68cfd47a02d57_shutterstock_2250770283-1-scaled.jpg', 'image/jpeg', 'public', 'public', 896391, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-21 10:33:33', '2025-09-21 10:33:33'),
(124, 'App\\Models\\Gallery', 11, 'deb64ec3-6147-4aca-bfb6-c77e9b0a09ab', 'photo', '68cfd48c62131_skyview-waterside-city-luxury-apartment-pool-gym-16afba578771c29ab816803c5964bcf6', '68cfd48c62131_skyview-waterside-city-luxury-apartment-pool-gym-16afba578771c29ab816803c5964bcf6.jpg', 'image/jpeg', 'public', 'public', 85402, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-21 10:33:51', '2025-09-21 10:33:51'),
(125, 'App\\Models\\Gallery', 12, '341bcc18-c306-4b50-83fb-3a4b537a35d4', 'photo', '68cfd4a57e0ff_luxury-apartment-in-mumbai', '68cfd4a57e0ff_luxury-apartment-in-mumbai.png', 'image/png', 'public', 'public', 1040477, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-21 10:34:16', '2025-09-21 10:34:17'),
(126, 'App\\Models\\Gallery', 13, '4a5734d0-02c2-4ef4-b1fc-84054dbe2b78', 'photo', '68cfd4b34a86b_Interior-design-of-luxurious-apartment-02', '68cfd4b34a86b_Interior-design-of-luxurious-apartment-02.jpg', 'image/jpeg', 'public', 'public', 255301, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-21 10:34:30', '2025-09-21 10:34:30'),
(127, 'App\\Models\\Gallery', 14, '4cd16520-2d97-454d-b80b-9c1e11daba3d', 'photo', '68cfd4cf8d756_8-Interior-Design-Trends-for-Luxury-Apartments', '68cfd4cf8d756_8-Interior-Design-Trends-for-Luxury-Apartments.webp', 'image/webp', 'public', 'public', 576858, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-21 10:34:58', '2025-09-21 10:34:58'),
(128, 'App\\Models\\Link', 2, '1a7ad8df-db6b-4a59-87b4-94733fb625a5', 'photo', '68d0f46053a41_549373707_17943789795025646_2364635224441442840_n', '68d0f46053a41_549373707_17943789795025646_2364635224441442840_n.webp', 'image/webp', 'public', 'public', 130488, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-22 07:01:54', '2025-09-22 07:01:54'),
(129, 'App\\Models\\Link', 3, '5e171dc1-323e-4608-82a7-cbb516c3d360', 'photo', '68d0f5c1d9e24_549926107_17943791604025646_5086461096294869824_n', '68d0f5c1d9e24_549926107_17943791604025646_5086461096294869824_n.webp', 'image/webp', 'public', 'public', 145714, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-22 07:08:47', '2025-09-22 07:08:47'),
(130, 'App\\Models\\Link', 4, 'd6d36574-cddf-4a9e-b10f-7a08fd5667c4', 'photo', '68d0ffd867f9a_549373707_17943789795025646_2364635224441442840_n', '68d0ffd867f9a_549373707_17943789795025646_2364635224441442840_n.webp', 'image/webp', 'public', 'public', 130488, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-22 07:50:53', '2025-09-22 07:50:53'),
(131, 'App\\Models\\Link', 5, 'b6a559e1-141e-4870-b65c-60872d2d744d', 'photo', '68d10047e2669_542632945_17942768523025646_1955113508573873508_n', '68d10047e2669_542632945_17942768523025646_1955113508573873508_n.webp', 'image/webp', 'public', 'public', 192388, '[]', '[]', '[]', 1, '{\"thumb\":true}', '2025-09-22 07:52:41', '2025-09-22 07:52:41');

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
(1, NULL, 'alaa', '9SGYkSzztzmDjvnpLWtFz0nk6gY73GQPIuF8s5Oy', NULL, 'http://localhost', 1, 0, 0, '2025-08-26 12:58:47', '2025-08-26 12:58:47'),
(2, NULL, 'Mohammad AL-Turk', 'FbLozgfd2qnI0pDYVpN0SRXlp21qOAyjpkel3jqR', NULL, 'http://localhost', 1, 0, 0, '2025-09-11 06:50:00', '2025-09-11 06:50:00');

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
(1, 1, '2025-08-26 12:58:47', '2025-08-26 12:58:47'),
(2, 2, '2025-09-11 06:50:00', '2025-09-11 06:50:00');

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
(146, 'subscriber_delete', '2025-08-23 07:00:50', '2025-08-23 07:00:50', NULL),
(147, 'visitor_access', '2025-09-14 08:51:12', '2025-09-14 08:51:12', NULL),
(148, 'visitor_create', '2025-09-14 08:51:19', '2025-09-14 08:51:19', NULL),
(149, 'visitor_edit', '2025-09-14 08:51:24', '2025-09-14 08:51:24', NULL),
(150, 'visitor_show', '2025-09-14 08:51:30', '2025-09-14 08:51:30', NULL),
(151, 'visitor_delete', '2025-09-14 08:51:49', '2025-09-14 08:51:49', NULL);

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
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151);

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
(1, 1, 'This is an example of portfolio details', 'لوريم إيبسوم', NULL, NULL, 'Jordan - Amman', 'Jordan - Amman', '<p>\r\n                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.\r\n              </p>\r\n              <p>\r\n                Amet consequatur qui dolore veniam voluptatem voluptatem sit. Non aspernatur atque natus ut cum nam et. Praesentium error dolores rerum minus sequi quia veritatis eum. Eos et doloribus doloremque nesciunt molestiae laboriosam.\r\n              </p>\r\n\r\n              <div class=\"testimonial-item\">\r\n                <p>\r\n                  <i class=\"bi bi-quote quote-icon-left\"></i>\r\n                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>\r\n                  <i class=\"bi bi-quote quote-icon-right\"></i>\r\n                </p>\r\n                <div>\r\n                  <img src=\"/TabanaTimplate/assets/img/testimonials/testimonials-2.jpg\" class=\"testimonial-img\" alt=\"\">\r\n                  <h3>Sara Wilsson</h3>\r\n                  <h4>Designer</h4>\r\n                </div>\r\n              </div>\r\n\r\n              <p>\r\n                Impedit ipsum quae et aliquid doloribus et voluptatem quasi. Perspiciatis occaecati earum et magnam animi. Quibusdam non qui ea vitae suscipit vitae sunt. Repudiandae incidunt cumque minus deserunt assumenda tempore. Delectus voluptas necessitatibus est.\r\n              </p>\r\n\r\n              <p>\r\n                Sunt voluptatum sapiente facilis quo odio aut ipsum repellat debitis. Molestiae et autem libero. Explicabo et quod necessitatibus similique quis dolor eum. Numquam eaque praesentium rem et qui nesciunt.\r\n              </p>', '<h3><b>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</b></h3><p><b>لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم</b></p><p><b><br></b></p><p> إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</p><p> لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;</p>', 'ASU Company', '2025-03-12', 'https://31-agency.com/', '2025-04-22 12:55:32', '2025-09-11 07:09:52', '2025-09-11 07:09:52'),
(2, 1, 'Lorem Ipsum', 'لوريم إيبسوم', NULL, NULL, 'Jordan - Amman', 'Jordan - Amman', '<div bis_skin_checked=\"1\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div bis_skin_checked=\"1\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div>', '<h3 style=\"color: rgb(20, 20, 20);\"><span style=\"font-weight: 700;\">لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</span></h3><p><span style=\"font-weight: 700;\">لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم</span></p><p><span style=\"font-weight: 700;\"><br></span></p><p>إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</p><p>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;</p>', NULL, NULL, NULL, '2025-08-14 11:32:53', '2025-09-11 07:09:54', '2025-09-11 07:09:54'),
(3, 1, 'Lorem Ipsum', 'لوريم إيبسوم', NULL, NULL, 'Jordan - Amman', 'Jordan - Amman', '<div bis_skin_checked=\"1\" style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div bis_skin_checked=\"1\" style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div>', '<h3 style=\"color: rgb(20, 20, 20);\"><span style=\"font-weight: 700;\">لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</span></h3><p><span style=\"font-weight: 700;\">لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم</span></p><p><span style=\"font-weight: 700;\"><br></span></p><p>إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم</p><p>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;<br><br><br><br>لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم لوريم إيبسوم&nbsp;</p>', NULL, NULL, NULL, '2025-08-14 11:33:00', '2025-09-11 07:09:56', '2025-09-11 07:09:56'),
(4, 1, 'Website Design & Development', 'التسويق الالكتروني', NULL, NULL, 'Jordan -Amman - Dabouq', 'Jordan -Amman - Dabouq', '<h2 data-start=\"282\" data-end=\"334\">🏡 Example Full Customized Property Description</h2><h3 data-start=\"336\" data-end=\"347\">Title</h3><p data-start=\"348\" data-end=\"421\">✨ Modern 3-Bedroom Apartment with Panoramic City Views in Abdoun, Amman</p><h3 data-start=\"423\" data-end=\"440\">Short Intro</h3><p data-start=\"441\" data-end=\"642\">Discover your dream home in the heart of Abdoun! This stunning 3-bedroom apartment combines modern architecture with luxury finishes, offering a perfect balance of comfort, elegance, and convenience.</p><h3 data-start=\"644\" data-end=\"669\">Property Highlights</h3><ul data-start=\"670\" data-end=\"1233\">\r\n<li data-start=\"670\" data-end=\"691\">\r\n<p data-start=\"672\" data-end=\"691\"><strong data-start=\"672\" data-end=\"681\">Size:</strong> 180 sqm</p>\r\n</li>\r\n<li data-start=\"692\" data-end=\"750\">\r\n<p data-start=\"694\" data-end=\"750\"><strong data-start=\"694\" data-end=\"707\">Bedrooms:</strong> 3 spacious rooms with built-in wardrobes</p>\r\n</li>\r\n<li data-start=\"751\" data-end=\"832\">\r\n<p data-start=\"753\" data-end=\"832\"><strong data-start=\"753\" data-end=\"767\">Bathrooms:</strong> 3 (including 1 en-suite master bathroom with premium fixtures)</p>\r\n</li>\r\n<li data-start=\"833\" data-end=\"918\">\r\n<p data-start=\"835\" data-end=\"918\"><strong data-start=\"835\" data-end=\"853\">Living Spaces:</strong> Open-plan living and dining area with floor-to-ceiling windows</p>\r\n</li>\r\n<li data-start=\"919\" data-end=\"1013\">\r\n<p data-start=\"921\" data-end=\"1013\"><strong data-start=\"921\" data-end=\"933\">Kitchen:</strong> Fully fitted with modern appliances, sleek cabinetry, and granite countertops</p>\r\n</li>\r\n<li data-start=\"1014\" data-end=\"1088\">\r\n<p data-start=\"1016\" data-end=\"1088\"><strong data-start=\"1016\" data-end=\"1028\">Balcony:</strong> Private balcony with breathtaking city and mountain views</p>\r\n</li>\r\n<li data-start=\"1089\" data-end=\"1141\">\r\n<p data-start=\"1091\" data-end=\"1141\"><strong data-start=\"1091\" data-end=\"1103\">Parking:</strong> 2 secure underground parking spaces</p>\r\n</li>\r\n<li data-start=\"1142\" data-end=\"1233\">\r\n<p data-start=\"1144\" data-end=\"1233\"><strong data-start=\"1144\" data-end=\"1163\">Extra Features:</strong> Central heating &amp; cooling, smart home system, double-glazed windows</p>\r\n</li>\r\n</ul><h3 data-start=\"1235\" data-end=\"1261\">Community &amp; Location</h3><p data-start=\"1262\" data-end=\"1560\">Located in one of Amman’s most prestigious neighborhoods, this apartment provides easy access to top restaurants, international schools, shopping centers, and embassies. Abdoun is known for its vibrant lifestyle, security, and community atmosphere, making it ideal for families and professionals.</p><h3 data-start=\"1562\" data-end=\"1588\">Lifestyle &amp; Benefits</h3><ul data-start=\"1589\" data-end=\"1846\">\r\n<li data-start=\"1589\" data-end=\"1657\">\r\n<p data-start=\"1591\" data-end=\"1657\">Enjoy sunrise views while sipping coffee on your private balcony</p>\r\n</li>\r\n<li data-start=\"1658\" data-end=\"1719\">\r\n<p data-start=\"1660\" data-end=\"1719\">Entertain guests in the spacious open-concept living area</p>\r\n</li>\r\n<li data-start=\"1720\" data-end=\"1792\">\r\n<p data-start=\"1722\" data-end=\"1792\">Relax in the luxurious master suite designed for comfort and privacy</p>\r\n</li>\r\n<li data-start=\"1793\" data-end=\"1846\">\r\n<p data-start=\"1795\" data-end=\"1846\">Benefit from 24/7 security and concierge services</p>\r\n</li>\r\n</ul><h3 data-start=\"1848\" data-end=\"1870\">Investment Value</h3><p data-start=\"1871\" data-end=\"2018\">With Abdoun’s high demand and steady property value growth, this apartment is not only a beautiful home but also a strong investment opportunity.</p><h3 data-start=\"2020\" data-end=\"2041\">Price &amp; Contact</h3><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"2042\" data-end=\"2143\">💰 Price: 250,000 JOD<br data-start=\"2063\" data-end=\"2066\">\r\n📞 Contact us today to book a private viewing and make this property yours!</p>', '<p>Jordan -Amman - Dabouq</p>', NULL, NULL, NULL, '2025-09-11 07:27:08', '2025-09-17 08:00:51', '2025-09-17 08:00:51'),
(5, 1, 'Appartment in abdoun', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<p><strong>MODERN 2-BEDROOM APARTMENT IN PRESTIGIOUS ABDOUN – 120 M²</strong></p>\r\n<p><strong>OVERVIEW</strong><br>\r\nDiscover the pinnacle of contemporary urban living with this exceptional <strong>2-bedroom apartment</strong> located in the heart of <strong>ABDOUN</strong>, Amman’s most prestigious and vibrant neighborhood. Spanning <strong>120 M²</strong>, this residence is thoughtfully designed to combine <strong>ELEGANCE, COMFORT, AND FUNCTIONALITY</strong>, catering perfectly to young professionals, small families, or anyone seeking a luxurious lifestyle in one of the city’s most desirable locations.</p>\r\n<p><strong>LIVING &amp; ENTERTAINING SPACES</strong><br>\r\nStep inside to a spacious, <strong>OPEN-PLAN LIVING AREA</strong> where natural light pours in through <strong>FLOOR-TO-CEILING WINDOWS</strong>, creating a <strong>warm and inviting atmosphere</strong>. The lounge, dining, and kitchen areas seamlessly blend together, encouraging both relaxation and social gatherings. The <strong>MODERN KITCHEN</strong> is equipped with <strong>PREMIUM APPLIANCES</strong> and a sleek <strong>BREAKFAST BAR</strong>, ideal for casual dining or entertaining guests in style. From the living room, step onto your <strong>PRIVATE BALCONY</strong> and soak in <strong>STUNNING PANORAMIC VIEWS</strong> of Amman’s skyline—a perfect retreat for morning coffee or evening sunsets.</p>\r\n<p><strong>BEDROOMS &amp; PRIVATE RETREATS</strong><br>\r\nThe apartment features <strong>TWO GENEROUSLY SIZED BEDROOMS</strong>, each designed with <strong>COMFORT AND PRACTICALITY</strong> in mind. The <strong>MASTER SUITE</strong> offers an <strong>EN-SUITE BATHROOM</strong> and extensive wardrobe space, providing a serene and private sanctuary. The <strong>SECOND BEDROOM</strong> is versatile, suitable as a guest room, home office, or children’s room, adapting to your lifestyle needs.</p>\r\n<p><strong>MODERN AMENITIES &amp; CONVENIENCE</strong><br>\r\nFor modern convenience, the home comes integrated with a <strong>STATE-OF-THE-ART SMART HOME SYSTEM</strong>, allowing you to control <strong>LIGHTING, CLIMATE, AND SECURITY</strong> at your fingertips. Additionally, <strong>UNDERGROUND PARKING</strong> ensures your vehicle is safe and accessible at all times.</p>\r\n<p><strong>PRIME LOCATION</strong><br>\r\nPositioned in <strong>ABDOUN</strong>, this property places you within minutes of <strong>BOUTIQUE SHOPS, FINE DINING, INTERNATIONAL SCHOOLS, AND KEY BUSINESS DISTRICTS</strong>, making every necessity and luxury easily reachable. Whether you’re enjoying a quiet evening at home, entertaining friends, or exploring the vibrant surroundings, this apartment offers an unparalleled combination of <strong>SOPHISTICATION, PRACTICALITY, AND LIFESTYLE</strong> in Amman’s most sought-after district.</p>', NULL, NULL, NULL, NULL, '2025-09-17 07:56:16', '2025-09-21 10:15:19', NULL),
(6, 2, 'Villa UM Uthaina', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<p data-start=\"156\" data-end=\"215\"><strong data-start=\"156\" data-end=\"213\">CONTEMPORARY LUXURY VILLA – EXCLUSIVE GATED COMMUNITY</strong></p>\r\n<p data-start=\"217\" data-end=\"589\"><strong data-start=\"217\" data-end=\"229\">OVERVIEW</strong><br data-start=\"229\" data-end=\"232\">\r\nExperience the ultimate in modern luxury with this <strong data-start=\"283\" data-end=\"314\">stunning contemporary villa</strong>, where sleek architectural design meets exceptional comfort. Nestled in a <strong data-start=\"389\" data-end=\"420\">prestigious gated community</strong>, this residence offers the perfect balance of <strong data-start=\"467\" data-end=\"505\">privacy, elegance, and convenience</strong>, making it an ideal choice for discerning homeowners seeking a refined lifestyle.</p>\r\n<p data-start=\"591\" data-end=\"1159\"><strong data-start=\"591\" data-end=\"623\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"623\" data-end=\"626\">\r\nStep into <strong data-start=\"636\" data-end=\"671\">spacious open-plan living areas</strong> flooded with natural light, thanks to <strong data-start=\"710\" data-end=\"742\">floor-to-ceiling glass walls</strong> that provide breathtaking views of the <strong data-start=\"782\" data-end=\"811\">private landscaped garden</strong> and <strong data-start=\"816\" data-end=\"833\">infinity pool</strong>. The seamless connection between indoor and outdoor spaces creates an inviting environment for <strong data-start=\"929\" data-end=\"952\">entertaining guests</strong> or enjoying tranquil moments with family. Every corner of this villa has been thoughtfully designed to blend <strong data-start=\"1062\" data-end=\"1102\">functionality with modern aesthetics</strong>, offering a home that is both beautiful and practical.</p>\r\n<p data-start=\"1161\" data-end=\"1618\"><strong data-start=\"1161\" data-end=\"1192\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1192\" data-end=\"1195\">\r\nThe villa features <strong data-start=\"1214\" data-end=\"1243\">generously sized bedrooms</strong>, each designed as a serene private retreat. The <strong data-start=\"1292\" data-end=\"1308\">master suite</strong> includes an <strong data-start=\"1321\" data-end=\"1342\">en-suite bathroom</strong>, a spacious wardrobe, and direct access to the garden or pool area, creating a personal sanctuary of comfort and luxury. Additional bedrooms are versatile, perfect for guests, children, or a private home office, while maintaining an atmosphere of sophistication throughout.</p>\r\n<p data-start=\"1620\" data-end=\"2006\"><strong data-start=\"1620\" data-end=\"1655\">MODERN AMENITIES &amp; SMART LIVING</strong><br data-start=\"1655\" data-end=\"1658\">\r\nEquipped with a <strong data-start=\"1674\" data-end=\"1712\">state-of-the-art smart home system</strong>, this villa allows residents to effortlessly control <strong data-start=\"1766\" data-end=\"1801\">lighting, climate, and security</strong>, providing both convenience and peace of mind. Additional amenities include <strong data-start=\"1878\" data-end=\"1898\">an infinity pool</strong>, <strong data-start=\"1900\" data-end=\"1922\">landscaped gardens</strong>, and secure parking, all designed to enhance everyday living with style and ease.</p>\r\n<p data-start=\"2008\" data-end=\"2447\"><strong data-start=\"2008\" data-end=\"2038\">PRIME LOCATION &amp; LIFESTYLE</strong><br data-start=\"2038\" data-end=\"2041\">\r\nLocated within an <strong data-start=\"2059\" data-end=\"2088\">exclusive gated community</strong>, this villa offers <strong data-start=\"2108\" data-end=\"2142\">unmatched privacy and prestige</strong>, while still being conveniently close to <strong data-start=\"2184\" data-end=\"2231\">fine dining, shopping, and top-tier schools</strong>. Whether hosting gatherings, enjoying family time by the pool, or relaxing in the garden, this villa promises a lifestyle of <strong data-start=\"2357\" data-end=\"2396\">luxury, comfort, and sophistication</strong> in one of the city’s most coveted neighborhoods.</p>', NULL, NULL, NULL, NULL, '2025-09-17 08:00:01', '2025-09-21 10:16:27', NULL),
(7, 4, 'roof', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<p>perfect view</p>', NULL, NULL, NULL, NULL, '2025-09-17 08:05:12', '2025-09-17 09:14:52', '2025-09-17 09:14:52'),
(8, 3, 'LAND FOR SALE', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<p>LAND FOR SALE IN ABDOUN 1900 METER&nbsp;</p>', NULL, NULL, NULL, NULL, '2025-09-17 08:10:05', '2025-09-17 09:15:33', '2025-09-17 09:15:33'),
(9, 1, 'Appartment in dubai', NULL, NULL, NULL, 'UAE-dubai', NULL, '<li><ul><ul><p><strong>Luxury Waterfront 3-Bedroom Apartment in Dubai – 200 m²</strong></p><p><strong></strong>\r\n</p><p>Indulge in the ultimate luxury lifestyle with this <strong>200 m² waterfront residence</strong> located in one of Dubai’s most prestigious addresses. Designed for discerning buyers, this <strong>3-bedroom, 3-bathroom apartment</strong> offers unmatched elegance, privacy, and panoramic water views.</p>\r\n<p>Step into a <strong>spacious open-plan living area</strong> where natural light pours in through floor-to-ceiling glass doors, leading to a <strong>large private terrace</strong> — the perfect setting for morning coffee or evening gatherings while overlooking the serene waterfront.</p>\r\n<p>Each bedroom is a private retreat, featuring <strong>en-suite bathrooms</strong>, <strong>walk-in closets</strong>, and premium finishes. The <strong>master suite</strong> offers direct terrace access and a spa-inspired bathroom with designer fixtures.</p>\r\n<p>This residence is enhanced by <strong>exclusive amenities</strong>:</p>\r\n<ul><li><strong>Private elevator access</strong> for ultimate privacy</li>\r\n<li><strong>Concierge service</strong> catering to your every need</li>\r\n<li><strong>State-of-the-art gym</strong> and <strong>resort-style swimming pool</strong></li>\r\n<li>Secure underground parking</li>\r\n</ul>\r\n<p>Located minutes from <strong>Dubai Marina, luxury shopping destinations, and world-class dining</strong>, this property offers both prestige and convenience. Whether as a primary residence or an investment, it delivers the perfect blend of sophistication and lifestyle.</p></ul>\r\n</ul></li>', NULL, NULL, NULL, NULL, '2025-09-17 10:26:56', '2025-09-17 11:50:08', NULL),
(10, 1, 'SWAILEH APPARTMENT', NULL, NULL, NULL, 'AMMAN JORDAN', NULL, '<p data-start=\"180\" data-end=\"246\"><strong data-start=\"180\" data-end=\"244\">MEDITERRANEAN-INSPIRED LUXURY VILLA – PRIVATE GARDENS &amp; POOL</strong></p>\r\n<p data-start=\"248\" data-end=\"613\"><strong data-start=\"248\" data-end=\"260\">OVERVIEW</strong><br data-start=\"260\" data-end=\"263\">\r\nExperience the timeless charm of the Mediterranean with this <strong data-start=\"324\" data-end=\"342\">stunning villa</strong>, designed to combine rustic elegance with modern comfort. Featuring <strong data-start=\"411\" data-end=\"490\">warm terracotta roofing, a rustic stone façade, and inviting outdoor spaces</strong>, this property offers a perfect sanctuary for families or anyone seeking a serene retreat with style and sophistication.</p>\r\n<p data-start=\"615\" data-end=\"1108\"><strong data-start=\"615\" data-end=\"647\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"647\" data-end=\"650\">\r\nStep inside to discover <strong data-start=\"674\" data-end=\"707\">airy rooms with high ceilings</strong> that create a light-filled, relaxed atmosphere throughout the villa. The open-plan design seamlessly blends <strong data-start=\"816\" data-end=\"852\">living, dining, and lounge areas</strong>, providing ample space for both everyday family life and entertaining guests. Large windows and French doors open onto the terrace and garden, ensuring natural light flows effortlessly and the outdoor beauty becomes part of your daily living experience.</p>\r\n<p data-start=\"1110\" data-end=\"1546\"><strong data-start=\"1110\" data-end=\"1141\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1141\" data-end=\"1144\">\r\nThe villa features <strong data-start=\"1163\" data-end=\"1192\">generously sized bedrooms</strong>, each designed as a tranquil retreat. The <strong data-start=\"1235\" data-end=\"1251\">master suite</strong> offers luxurious finishes, a private en-suite bathroom, and direct access to the terrace or garden, providing a serene escape from the world. Additional bedrooms are equally spacious, ideal for children, guests, or home offices, all reflecting the villa’s <strong data-start=\"1508\" data-end=\"1543\">Mediterranean-inspired elegance</strong>.</p>\r\n<p data-start=\"1548\" data-end=\"1952\"><strong data-start=\"1548\" data-end=\"1581\">OUTDOOR AMENITIES &amp; LIFESTYLE</strong><br data-start=\"1581\" data-end=\"1584\">\r\nThe <strong data-start=\"1588\" data-end=\"1609\">expansive terrace</strong> is perfect for <strong data-start=\"1625\" data-end=\"1645\">al fresco dining</strong>, sunset gatherings, or quiet morning coffees. A <strong data-start=\"1694\" data-end=\"1710\">private pool</strong> is surrounded by lush gardens filled with <strong data-start=\"1753\" data-end=\"1778\">fruit and olive trees</strong>, creating a peaceful, natural environment that enhances outdoor living. Every corner of the garden has been thoughtfully designed to offer privacy, beauty, and relaxation.</p>\r\n<p data-start=\"1954\" data-end=\"2366\"><strong data-start=\"1954\" data-end=\"1991\">PRIME LOCATION &amp; FAMILY LIFESTYLE</strong><br data-start=\"1991\" data-end=\"1994\">\r\nSituated in a <strong data-start=\"2008\" data-end=\"2047\">prestigious and serene neighborhood</strong>, this villa offers both <strong data-start=\"2072\" data-end=\"2099\">privacy and convenience</strong>, while remaining close to fine dining, shopping, and cultural attractions. Perfect for families seeking a <strong data-start=\"2206\" data-end=\"2252\">luxurious Mediterranean-inspired lifestyle</strong>, this villa combines <strong data-start=\"2274\" data-end=\"2315\">elegance, comfort, and natural beauty</strong>, making it a rare and highly desirable property.</p>', NULL, NULL, NULL, NULL, '2025-09-17 11:14:21', '2025-09-21 10:17:50', NULL),
(11, 1, 'Sweifeh Appartment', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<p data-start=\"162\" data-end=\"213\"><strong data-start=\"162\" data-end=\"211\">EXCLUSIVE 3-BEDROOM LUXURY APARTMENT – 200 M²</strong></p>\r\n<p data-start=\"215\" data-end=\"611\"><strong data-start=\"215\" data-end=\"227\">OVERVIEW</strong><br data-start=\"227\" data-end=\"230\">\r\nStep into a world of unparalleled elegance with this <strong data-start=\"283\" data-end=\"316\">exclusive 3-bedroom apartment</strong>, perfectly designed for those who demand the finest in life. Spanning <strong data-start=\"387\" data-end=\"397\">200 m²</strong>, this residence offers an exceptional combination of <strong data-start=\"451\" data-end=\"489\">space, sophistication, and privacy</strong>, tailored for high-income buyers seeking a truly premium lifestyle in one of the city’s most prestigious neighborhoods.</p>\r\n<p data-start=\"613\" data-end=\"1119\"><strong data-start=\"613\" data-end=\"645\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"645\" data-end=\"648\">\r\nThe apartment boasts a <strong data-start=\"671\" data-end=\"716\">generous open-plan living and dining area</strong>, seamlessly blending comfort and style. Large windows flood the interiors with natural light while framing <strong data-start=\"824\" data-end=\"846\">breathtaking views</strong> of the surrounding cityscape. The design emphasizes <strong data-start=\"899\" data-end=\"922\">functional elegance</strong>, creating a welcoming space for both everyday living and sophisticated entertaining. Every detail, from flooring to fixtures, has been meticulously selected to reflect <strong data-start=\"1091\" data-end=\"1116\">luxury and refinement</strong>.</p>\r\n<p data-start=\"1121\" data-end=\"1550\"><strong data-start=\"1121\" data-end=\"1152\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1152\" data-end=\"1155\">\r\nEach of the <strong data-start=\"1167\" data-end=\"1195\">three expansive bedrooms</strong> features its own <strong data-start=\"1213\" data-end=\"1234\">en-suite bathroom</strong>, ensuring complete privacy and comfort for every resident. The <strong data-start=\"1298\" data-end=\"1314\">master suite</strong> is a true sanctuary, offering luxurious finishes, ample wardrobe space, and a serene retreat from the bustling city. Additional bedrooms are equally spacious and versatile, ideal for family members, guests, or a personal home office.</p>\r\n<p data-start=\"1552\" data-end=\"1698\"><strong data-start=\"1552\" data-end=\"1587\">PREMIUM AMENITIES &amp; CONVENIENCE</strong><br data-start=\"1587\" data-end=\"1590\">\r\nResidents enjoy access to <strong data-start=\"1616\" data-end=\"1639\">exclusive amenities</strong>, designed to enhance lifestyle and wellbeing, including:</p>\r\n<ul data-start=\"1699\" data-end=\"1963\">\r\n<li data-start=\"1699\" data-end=\"1761\">\r\n<p data-start=\"1701\" data-end=\"1761\"><strong data-start=\"1701\" data-end=\"1741\">24/7 concierge and security services</strong> for peace of mind</p>\r\n</li>\r\n<li data-start=\"1762\" data-end=\"1812\">\r\n<p data-start=\"1764\" data-end=\"1812\"><strong data-start=\"1764\" data-end=\"1783\">Private parking</strong> for convenience and safety</p>\r\n</li>\r\n<li data-start=\"1813\" data-end=\"1884\">\r\n<p data-start=\"1815\" data-end=\"1884\"><strong data-start=\"1815\" data-end=\"1850\">Fitness and wellness facilities</strong> to maintain a healthy lifestyle</p>\r\n</li>\r\n<li data-start=\"1885\" data-end=\"1963\">\r\n<p data-start=\"1887\" data-end=\"1963\"><strong data-start=\"1887\" data-end=\"1922\">Swimming pool and leisure areas</strong>, perfect for relaxation and recreation</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1965\" data-end=\"2395\"><strong data-start=\"1965\" data-end=\"1995\">PRIME LOCATION &amp; LIFESTYLE</strong><br data-start=\"1995\" data-end=\"1998\">\r\nLocated in a <strong data-start=\"2011\" data-end=\"2039\">prestigious neighborhood</strong>, this apartment places you moments away from <strong data-start=\"2085\" data-end=\"2141\">fine dining, luxury shopping, and cultural landmarks</strong>, offering a lifestyle that goes beyond living—it’s a statement of success. With its unmatched combination of <strong data-start=\"2251\" data-end=\"2289\">elegance, comfort, and exclusivity</strong>, this residence promises a life of <strong data-start=\"2325\" data-end=\"2343\">refined luxury</strong> in one of the city’s most sought-after addresses.</p>', NULL, NULL, NULL, NULL, '2025-09-17 11:25:44', '2025-09-21 10:17:04', NULL),
(12, 2, 'Villa in Dabuq', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<li><p data-start=\"180\" data-end=\"246\"><strong data-start=\"180\" data-end=\"244\">MEDITERRANEAN-INSPIRED LUXURY VILLA – PRIVATE GARDENS &amp; POOL</strong></p>\r\n<p data-start=\"248\" data-end=\"613\"><strong data-start=\"248\" data-end=\"260\">OVERVIEW</strong><br data-start=\"260\" data-end=\"263\">\r\nExperience the timeless charm of the Mediterranean with this <strong data-start=\"324\" data-end=\"342\">stunning villa</strong>, designed to combine rustic elegance with modern comfort. Featuring <strong data-start=\"411\" data-end=\"490\">warm terracotta roofing, a rustic stone façade, and inviting outdoor spaces</strong>, this property offers a perfect sanctuary for families or anyone seeking a serene retreat with style and sophistication.</p>\r\n<p data-start=\"615\" data-end=\"1108\"><strong data-start=\"615\" data-end=\"647\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"647\" data-end=\"650\">\r\nStep inside to discover <strong data-start=\"674\" data-end=\"707\">airy rooms with high ceilings</strong> that create a light-filled, relaxed atmosphere throughout the villa. The open-plan design seamlessly blends <strong data-start=\"816\" data-end=\"852\">living, dining, and lounge areas</strong>, providing ample space for both everyday family life and entertaining guests. Large windows and French doors open onto the terrace and garden, ensuring natural light flows effortlessly and the outdoor beauty becomes part of your daily living experience.</p>\r\n<p data-start=\"1110\" data-end=\"1546\"><strong data-start=\"1110\" data-end=\"1141\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1141\" data-end=\"1144\">\r\nThe villa features <strong data-start=\"1163\" data-end=\"1192\">generously sized bedrooms</strong>, each designed as a tranquil retreat. The <strong data-start=\"1235\" data-end=\"1251\">master suite</strong> offers luxurious finishes, a private en-suite bathroom, and direct access to the terrace or garden, providing a serene escape from the world. Additional bedrooms are equally spacious, ideal for children, guests, or home offices, all reflecting the villa’s <strong data-start=\"1508\" data-end=\"1543\">Mediterranean-inspired elegance</strong>.</p>\r\n<p data-start=\"1548\" data-end=\"1952\"><strong data-start=\"1548\" data-end=\"1581\">OUTDOOR AMENITIES &amp; LIFESTYLE</strong><br data-start=\"1581\" data-end=\"1584\">\r\nThe <strong data-start=\"1588\" data-end=\"1609\">expansive terrace</strong> is perfect for <strong data-start=\"1625\" data-end=\"1645\">al fresco dining</strong>, sunset gatherings, or quiet morning coffees. A <strong data-start=\"1694\" data-end=\"1710\">private pool</strong> is surrounded by lush gardens filled with <strong data-start=\"1753\" data-end=\"1778\">fruit and olive trees</strong>, creating a peaceful, natural environment that enhances outdoor living. Every corner of the garden has been thoughtfully designed to offer privacy, beauty, and relaxation.</p>\r\n<p data-start=\"1954\" data-end=\"2366\"><strong data-start=\"1954\" data-end=\"1991\">PRIME LOCATION &amp; FAMILY LIFESTYLE</strong><br data-start=\"1991\" data-end=\"1994\">\r\nSituated in a <strong data-start=\"2008\" data-end=\"2047\">prestigious and serene neighborhood</strong>, this villa offers both <strong data-start=\"2072\" data-end=\"2099\">privacy and convenience</strong>, while remaining close to fine dining, shopping, and cultural attractions. Perfect for families seeking a <strong data-start=\"2206\" data-end=\"2252\">luxurious Mediterranean-inspired lifestyle</strong>, this villa combines <strong data-start=\"2274\" data-end=\"2315\">elegance, comfort, and natural beauty</strong>, making it a rare and highly desirable property.</p></li>', NULL, NULL, NULL, NULL, '2025-09-17 12:24:46', '2025-09-21 10:17:58', NULL),
(13, 2, 'Villa in Jarash', NULL, NULL, NULL, 'Jarash - Jordan', NULL, '<p data-start=\"232\" data-end=\"596\"><strong data-start=\"232\" data-end=\"244\">OVERVIEW</strong><br data-start=\"244\" data-end=\"247\">\r\nExperience the ultimate in coastal living with this <strong data-start=\"299\" data-end=\"354\">stunning villa positioned directly on the shoreline</strong>, offering <strong data-start=\"365\" data-end=\"392\">uninterrupted sea views</strong> and immediate access to the beach. Combining <strong data-start=\"438\" data-end=\"485\">modern elegance with natural coastal beauty</strong>, this property is a sanctuary for those seeking privacy, luxury, and a lifestyle intertwined with the ocean.</p>\r\n<p data-start=\"598\" data-end=\"1131\"><strong data-start=\"598\" data-end=\"630\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"630\" data-end=\"633\">\r\nThe villa’s <strong data-start=\"645\" data-end=\"671\">open-plan living areas</strong> are designed to maximize light and views, featuring <strong data-start=\"724\" data-end=\"780\">expansive windows, light tones, and natural textures</strong> throughout. Interiors flow seamlessly into outdoor spaces, creating a harmonious connection with the surrounding seascape. The <strong data-start=\"908\" data-end=\"926\">outdoor lounge</strong> and <strong data-start=\"931\" data-end=\"947\">firepit area</strong> provide the perfect backdrop for <strong data-start=\"981\" data-end=\"1046\">sunset gatherings, evening relaxation, or entertaining guests</strong>, while the <strong data-start=\"1058\" data-end=\"1075\">infinity pool</strong> appears to merge effortlessly with the ocean horizon.</p>\r\n<p data-start=\"1133\" data-end=\"1569\"><strong data-start=\"1133\" data-end=\"1164\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1164\" data-end=\"1167\">\r\nThe villa features <strong data-start=\"1186\" data-end=\"1221\">spacious, light-filled bedrooms</strong>, each offering a serene retreat with stunning views of the sea. The <strong data-start=\"1290\" data-end=\"1306\">master suite</strong> is a private sanctuary with a luxurious en-suite bathroom, direct pool access, and panoramic ocean vistas. Additional bedrooms are equally refined, ideal for family members or guests, all reflecting the property’s <strong data-start=\"1521\" data-end=\"1566\">coastal elegance and sophisticated design</strong>.</p>\r\n<p data-start=\"1571\" data-end=\"1993\"><strong data-start=\"1571\" data-end=\"1604\">OUTDOOR AMENITIES &amp; LIFESTYLE</strong><br data-start=\"1604\" data-end=\"1607\">\r\nDesigned to fully embrace seaside living, the villa offers a <strong data-start=\"1668\" data-end=\"1741\">private infinity pool, sun-drenched terraces, and direct beach access</strong>. Outdoor spaces are thoughtfully crafted for <strong data-start=\"1787\" data-end=\"1841\">relaxation, social gatherings, and private moments</strong>, surrounded by the natural beauty of the coast. Every detail enhances the sense of <strong data-start=\"1925\" data-end=\"1951\">tranquility and luxury</strong>, making this home a true seaside haven.</p>\r\n<p data-start=\"1995\" data-end=\"2431\"><strong data-start=\"1995\" data-end=\"2030\">PRIME LOCATION &amp; COASTAL LIVING</strong><br data-start=\"2030\" data-end=\"2033\">\r\nSituated in a <strong data-start=\"2047\" data-end=\"2082\">prestigious beachfront location</strong>, this villa provides both <strong data-start=\"2109\" data-end=\"2136\">privacy and convenience</strong>, while being close to fine dining, leisure activities, and coastal attractions. Perfect for buyers seeking a <strong data-start=\"2246\" data-end=\"2279\">luxurious beachside lifestyle</strong>, this property offers an unmatched combination of <strong data-start=\"2330\" data-end=\"2371\">elegance, comfort, and natural beauty</strong>, making it a rare and highly desirable coastal residence.</p><p data-start=\"1995\" data-end=\"2431\"><br></p>', NULL, NULL, NULL, NULL, '2025-09-17 12:31:35', '2025-09-21 10:18:45', NULL);
INSERT INTO `properties` (`id`, `category_id`, `title_en`, `title_ar`, `sub_title_en`, `sub_title_ar`, `location_en`, `location_ar`, `description_en`, `description_ar`, `client_name`, `project_date`, `project_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 2, 'Red Building Villa', NULL, NULL, NULL, 'AMMAN JORDAN', NULL, '<p data-start=\"244\" data-end=\"621\"><strong data-start=\"244\" data-end=\"256\">OVERVIEW</strong><br data-start=\"256\" data-end=\"259\">\r\nDesigned with family life in mind, this <strong data-start=\"299\" data-end=\"317\">stunning villa</strong> combines <strong data-start=\"327\" data-end=\"400\">spacious interiors, versatile outdoor areas, and thoughtful amenities</strong> to create the perfect environment for creating lasting memories. Located in a <strong data-start=\"479\" data-end=\"520\">safe and family-oriented neighborhood</strong>, this residence offers comfort, style, and functionality for families seeking a premium lifestyle.</p>\r\n<p data-start=\"623\" data-end=\"1156\"><strong data-start=\"623\" data-end=\"655\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"655\" data-end=\"658\">\r\nStep inside to discover <strong data-start=\"682\" data-end=\"720\">expansive lounges and living areas</strong> that provide ample space for <strong data-start=\"750\" data-end=\"800\">relaxation, entertainment, and everyday living</strong>. The open-plan design seamlessly connects indoor and outdoor spaces, allowing natural light to fill the home and creating a welcoming atmosphere. Multiple lounges and seating areas ensure everyone in the family has a space to unwind or socialize, while elegant finishes and attention to detail elevate the home’s sophisticated yet comfortable aesthetic.</p>\r\n<p data-start=\"1158\" data-end=\"1609\"><strong data-start=\"1158\" data-end=\"1189\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1189\" data-end=\"1192\">\r\nThe villa features <strong data-start=\"1211\" data-end=\"1240\">generously sized bedrooms</strong>, each designed as a peaceful retreat for family members. The <strong data-start=\"1302\" data-end=\"1318\">master suite</strong> offers a luxurious en-suite bathroom and a private space to relax, while additional bedrooms accommodate children or guests with comfort and style. A <strong data-start=\"1469\" data-end=\"1492\">separate guesthouse</strong> provides <strong data-start=\"1502\" data-end=\"1545\">privacy for visitors or extended family</strong>, ensuring everyone enjoys their own space without compromise.</p>\r\n<p data-start=\"1611\" data-end=\"2076\"><strong data-start=\"1611\" data-end=\"1651\">OUTDOOR AMENITIES &amp; FAMILY LIFESTYLE</strong><br data-start=\"1651\" data-end=\"1654\">\r\nThe property’s <strong data-start=\"1669\" data-end=\"1708\">backyard is a haven for family life</strong>, featuring a <strong data-start=\"1722\" data-end=\"1740\">sparkling pool</strong> and a <strong data-start=\"1747\" data-end=\"1782\">dedicated children’s playground</strong>, perfect for hours of fun and recreation. Expansive terraces and garden areas provide <strong data-start=\"1869\" data-end=\"1906\">outdoor lounges and dining spaces</strong>, ideal for entertaining or simply enjoying the outdoors. Every corner of the garden is thoughtfully designed to combine beauty, functionality, and safety for all ages.</p>\r\n<p data-start=\"2078\" data-end=\"2501\"><strong data-start=\"2078\" data-end=\"2127\">PRIME LOCATION &amp; FAMILY-FRIENDLY NEIGHBORHOOD</strong><br data-start=\"2127\" data-end=\"2130\">\r\nSituated in a <strong data-start=\"2144\" data-end=\"2178\">secure and welcoming community</strong>, this villa offers <strong data-start=\"2198\" data-end=\"2231\">peace of mind and convenience</strong>, with easy access to schools, shopping, and leisure amenities. Perfect for families who value space, comfort, and lifestyle, this residence is more than just a home—it’s a place where <strong data-start=\"2416\" data-end=\"2498\">memories are made, connections are strengthened, and everyday life is elevated</strong>.</p><p data-start=\"2078\" data-end=\"2501\"><br></p>', NULL, NULL, NULL, NULL, '2025-09-17 12:38:03', '2025-09-21 10:19:22', NULL),
(15, 2, 'White Villa', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<p data-start=\"236\" data-end=\"607\"><strong data-start=\"236\" data-end=\"248\">OVERVIEW</strong><br data-start=\"248\" data-end=\"251\">\r\nPositioned in the <strong data-start=\"269\" data-end=\"290\">heart of the city</strong>, this <strong data-start=\"297\" data-end=\"328\">stunning contemporary villa</strong> offers the perfect blend of <strong data-start=\"357\" data-end=\"405\">modern architecture, convenience, and luxury</strong>. Designed for professionals and discerning buyers seeking a prestigious urban lifestyle, this residence delivers both sophistication and practicality in one of the city’s most sought-after locations.</p>\r\n<p data-start=\"609\" data-end=\"1119\"><strong data-start=\"609\" data-end=\"641\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"641\" data-end=\"644\">\r\nThe villa’s <strong data-start=\"656\" data-end=\"685\">double-height living room</strong> creates a dramatic and airy atmosphere, providing a sense of grandeur that impresses from the moment you enter. Open-plan living areas are designed for <strong data-start=\"838\" data-end=\"894\">entertaining, family gatherings, or quiet relaxation</strong>, with expansive windows that frame the dynamic city skyline. Each floor is seamlessly connected by a <strong data-start=\"996\" data-end=\"1016\">private elevator</strong>, ensuring effortless access throughout the home while adding a touch of exclusivity and convenience.</p>\r\n<p data-start=\"1121\" data-end=\"1580\"><strong data-start=\"1121\" data-end=\"1152\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1152\" data-end=\"1155\">\r\nGenerously sized bedrooms offer <strong data-start=\"1187\" data-end=\"1208\">peaceful retreats</strong> in the midst of the city, each thoughtfully designed with comfort, elegance, and functionality in mind. The <strong data-start=\"1317\" data-end=\"1333\">master suite</strong> includes a luxurious en-suite bathroom and wardrobe space, providing a serene sanctuary for rest and relaxation. Additional bedrooms can serve family members, guests, or home offices, all reflecting the villa’s <strong data-start=\"1545\" data-end=\"1577\">refined urban sophistication</strong>.</p>\r\n<p data-start=\"1582\" data-end=\"1954\"><strong data-start=\"1582\" data-end=\"1613\">ROOFTOP &amp; OUTDOOR AMENITIES</strong><br data-start=\"1613\" data-end=\"1616\">\r\nA <strong data-start=\"1618\" data-end=\"1645\">private rooftop terrace</strong> delivers <strong data-start=\"1655\" data-end=\"1707\">breathtaking panoramic views of the city skyline</strong>, creating an ideal space for evening gatherings, sunset dinners, or simply enjoying the vibrant urban atmosphere. The property also features <strong data-start=\"1849\" data-end=\"1879\">secure underground parking</strong>, providing peace of mind and easy access to vehicles in the city center.</p>\r\n<p data-start=\"1956\" data-end=\"2405\"><strong data-start=\"1956\" data-end=\"1992\">PRIME LOCATION &amp; URBAN LIFESTYLE</strong><br data-start=\"1992\" data-end=\"1995\">\r\nSituated in a <strong data-start=\"2009\" data-end=\"2049\">central and prestigious neighborhood</strong>, this villa places residents within walking distance of <strong data-start=\"2106\" data-end=\"2172\">fine dining, shopping, cultural attractions, and business hubs</strong>, offering unparalleled convenience. Perfect for professionals or those seeking a <strong data-start=\"2254\" data-end=\"2282\">luxurious city lifestyle</strong>, this home combines <strong data-start=\"2303\" data-end=\"2347\">style, sophistication, and functionality</strong>, making it a rare and highly desirable urban residence.</p>', NULL, NULL, NULL, NULL, '2025-09-17 12:45:42', '2025-09-21 10:20:02', NULL),
(16, 2, 'Villa in Abdoun', NULL, NULL, NULL, 'AMMAN JORDAN', NULL, '<p data-start=\"257\" data-end=\"623\"><strong data-start=\"257\" data-end=\"269\">OVERVIEW</strong><br data-start=\"269\" data-end=\"272\">\r\nEmbrace a lifestyle that <strong data-start=\"297\" data-end=\"350\">balances luxury with environmental responsibility</strong> in this remarkable <strong data-start=\"370\" data-end=\"393\">eco-conscious villa</strong>. Designed for modern buyers who value <strong data-start=\"432\" data-end=\"476\">sustainability, innovation, and elegance</strong>, this residence combines <strong data-start=\"502\" data-end=\"535\">cutting-edge green technology</strong> with sophisticated design to create a home that is as responsible as it is luxurious.</p>\r\n<p data-start=\"625\" data-end=\"1088\"><strong data-start=\"625\" data-end=\"664\">SUSTAINABLE DESIGN &amp; GREEN FEATURES</strong><br data-start=\"664\" data-end=\"667\">\r\nThe villa incorporates <strong data-start=\"690\" data-end=\"706\">solar panels</strong> and a <strong data-start=\"713\" data-end=\"744\">rainwater harvesting system</strong>, significantly reducing its environmental footprint while promoting energy efficiency. A <strong data-start=\"834\" data-end=\"858\">green rooftop garden</strong> provides a serene and private retreat, perfect for relaxation, meditation, or enjoying panoramic views. Every aspect of this home is carefully designed to <strong data-start=\"1014\" data-end=\"1039\">harmonize with nature</strong> while maintaining modern comfort and elegance.</p>\r\n<p data-start=\"1090\" data-end=\"1412\"><strong data-start=\"1090\" data-end=\"1119\">SMART LIVING &amp; TECHNOLOGY</strong><br data-start=\"1119\" data-end=\"1122\">\r\nInside, <strong data-start=\"1130\" data-end=\"1164\">state-of-the-art smart systems</strong> manage lighting, climate, and security, ensuring maximum efficiency, convenience, and comfort. The villa seamlessly integrates <strong data-start=\"1292\" data-end=\"1322\">sustainability with luxury</strong>, allowing residents to enjoy advanced technology while minimizing environmental impact.</p>\r\n<p data-start=\"1414\" data-end=\"1833\"><strong data-start=\"1414\" data-end=\"1446\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"1446\" data-end=\"1449\">\r\nOpen-plan living areas are bathed in natural light, connecting indoor spaces with outdoor terraces and gardens. The design encourages <strong data-start=\"1583\" data-end=\"1619\">relaxation and social gatherings</strong>, blending <strong data-start=\"1630\" data-end=\"1673\">modern elegance with sustainable living</strong>. Every room has been thoughtfully crafted with <strong data-start=\"1721\" data-end=\"1787\">premium finishes, natural textures, and eco-friendly materials</strong>, creating a refined, harmonious atmosphere.</p>\r\n<p data-start=\"1835\" data-end=\"2267\"><strong data-start=\"1835\" data-end=\"1865\">PRIME LOCATION &amp; LIFESTYLE</strong><br data-start=\"1865\" data-end=\"1868\">\r\nPerfectly situated in a <strong data-start=\"1892\" data-end=\"1933\">prestigious and tranquil neighborhood</strong>, this villa offers both <strong data-start=\"1958\" data-end=\"1985\">privacy and convenience</strong>, close to fine dining, shopping, and cultural amenities. Ideal for buyers who wish to <strong data-start=\"2072\" data-end=\"2138\">embrace a sustainable lifestyle without compromising on luxury</strong>, this property represents a rare opportunity to live in a home that is both <strong data-start=\"2215\" data-end=\"2264\">eco-conscious and exceptionally sophisticated</strong>.</p>', NULL, NULL, NULL, NULL, '2025-09-17 12:52:32', '2025-09-21 10:20:48', NULL),
(17, 2, 'Villa in wood', NULL, NULL, NULL, 'UAE-dubai', NULL, '<p data-start=\"238\" data-end=\"577\"><strong data-start=\"238\" data-end=\"250\">OVERVIEW</strong><br data-start=\"250\" data-end=\"253\">\r\nPerched elegantly on a hillside, this <strong data-start=\"291\" data-end=\"309\">stunning villa</strong> offers an unmatched combination of <strong data-start=\"345\" data-end=\"398\">dramatic natural scenery and sophisticated design</strong>. With <strong data-start=\"405\" data-end=\"464\">sweeping views of both the mountains and the city below</strong>, this residence is perfect for buyers seeking a luxurious retreat that blends tranquility, privacy, and style.</p>\r\n<p data-start=\"579\" data-end=\"1110\"><strong data-start=\"579\" data-end=\"611\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"611\" data-end=\"614\">\r\nThe villa features <strong data-start=\"633\" data-end=\"666\">spacious multi-level terraces</strong>, providing abundant outdoor living areas for <strong data-start=\"712\" data-end=\"761\">entertaining, relaxation, or quiet reflection</strong>. Expansive windows and <strong data-start=\"785\" data-end=\"806\">glass balustrades</strong> ensure that the breathtaking vistas are uninterrupted, allowing natural light to flow throughout the home and creating a seamless connection between indoor and outdoor spaces. The design emphasizes <strong data-start=\"1005\" data-end=\"1036\">modern elegance and comfort</strong>, offering versatile areas for both family living and social gatherings.</p>\r\n<p data-start=\"1112\" data-end=\"1595\"><strong data-start=\"1112\" data-end=\"1143\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1143\" data-end=\"1146\">\r\nGenerously sized bedrooms serve as serene sanctuaries, each designed to maximize <strong data-start=\"1227\" data-end=\"1258\">comfort and panoramic views</strong>. The <strong data-start=\"1264\" data-end=\"1280\">master suite</strong> is a private oasis with luxurious en-suite facilities and direct access to the terraces, offering the perfect vantage point for sunrises, sunsets, or quiet mornings. Additional bedrooms provide flexibility for guests, children, or home offices while maintaining a cohesive sense of elegance throughout the villa.</p>\r\n<p data-start=\"1597\" data-end=\"2043\"><strong data-start=\"1597\" data-end=\"1630\">OUTDOOR AMENITIES &amp; LIFESTYLE</strong><br data-start=\"1630\" data-end=\"1633\">\r\nThe <strong data-start=\"1637\" data-end=\"1659\">infinity-edge pool</strong> serves as a dramatic centerpiece, reflecting the surrounding mountains and cityscape. Multi-level terraces and landscaped gardens enhance outdoor living, creating an environment ideal for <strong data-start=\"1848\" data-end=\"1902\">sunbathing, alfresco dining, or evening gatherings</strong>. Every detail has been thoughtfully designed to elevate the <strong data-start=\"1963\" data-end=\"2010\">experience of living in harmony with nature</strong> while enjoying premium luxury.</p>\r\n<p data-start=\"2045\" data-end=\"2452\"><strong data-start=\"2045\" data-end=\"2081\">PRIME LOCATION &amp; HILLSIDE LIVING</strong><br data-start=\"2081\" data-end=\"2084\">\r\nSituated on a <strong data-start=\"2098\" data-end=\"2122\">prestigious hillside</strong>, this villa offers <strong data-start=\"2142\" data-end=\"2187\">privacy, security, and breathtaking views</strong>, all within easy reach of city amenities, fine dining, and cultural attractions. Perfect for buyers seeking a <strong data-start=\"2298\" data-end=\"2342\">luxurious retreat with panoramic scenery</strong>, this property provides an unparalleled lifestyle that combines <strong data-start=\"2407\" data-end=\"2449\">serenity, elegance, and natural beauty</strong>.</p>', NULL, NULL, NULL, NULL, '2025-09-17 12:59:05', '2025-09-21 10:21:48', NULL),
(18, 2, 'Aqaba Villa', NULL, NULL, NULL, 'Aqaba - Jordan', NULL, '<li><ul>\r\n</ul>\r\n<p><strong data-start=\"183\" data-end=\"253\">ARABIAN HERITAGE VILLA – TRADITIONAL ELEGANCE WITH MODERN COMFORTS</strong></p><p data-start=\"257\" data-end=\"636\"><strong data-start=\"257\" data-end=\"269\">OVERVIEW</strong><br data-start=\"269\" data-end=\"272\">\r\nCelebrate the timeless beauty of <strong data-start=\"305\" data-end=\"329\">Arabian architecture</strong> with this exquisite villa, thoughtfully designed to <strong data-start=\"382\" data-end=\"428\">blend cultural heritage with modern luxury</strong>. Featuring <strong data-start=\"440\" data-end=\"510\">intricate arches, ornate detailing, and a serene central courtyard</strong>, this residence is perfect for buyers who value <strong data-start=\"559\" data-end=\"601\">tradition, sophistication, and privacy</strong> in a refined living environment.</p><p data-start=\"638\" data-end=\"1096\"><strong data-start=\"638\" data-end=\"670\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"670\" data-end=\"673\">\r\nStep inside to discover <strong data-start=\"697\" data-end=\"751\">spacious interiors enriched with cultural elegance</strong>, where every detail reflects Arabian craftsmanship. The villa includes a <strong data-start=\"825\" data-end=\"843\">private majlis</strong>, providing a dedicated and inviting space for <strong data-start=\"890\" data-end=\"929\">hosting guests or family gatherings</strong>. Open-plan living areas connect seamlessly with the central courtyard, allowing natural light to fill the home while creating a <strong data-start=\"1058\" data-end=\"1093\">peaceful, harmonious atmosphere</strong>.</p><p data-start=\"1098\" data-end=\"1551\"><strong data-start=\"1098\" data-end=\"1129\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1129\" data-end=\"1132\">\r\nGenerously proportioned bedrooms serve as <strong data-start=\"1174\" data-end=\"1201\">serene private retreats</strong>, offering comfort and tranquility. The <strong data-start=\"1241\" data-end=\"1257\">master suite</strong> includes a luxurious en-suite bathroom and refined finishes that blend <strong data-start=\"1329\" data-end=\"1390\">traditional design elements with contemporary convenience</strong>. Additional bedrooms provide flexibility for family members, guests, or personal spaces, all maintaining a consistent theme of <strong data-start=\"1518\" data-end=\"1548\">heritage-inspired elegance</strong>.</p><p data-start=\"1553\" data-end=\"1934\"><strong data-start=\"1553\" data-end=\"1593\">OUTDOOR AMENITIES &amp; COURTYARD LIVING</strong><br data-start=\"1593\" data-end=\"1596\">\r\nThe villa’s <strong data-start=\"1608\" data-end=\"1645\">central courtyard with a fountain</strong> serves as the heart of the home, creating a tranquil setting for <strong data-start=\"1711\" data-end=\"1776\">morning reflections, evening relaxation, or social gatherings</strong>. High privacy walls ensure complete seclusion, while landscaped gardens and outdoor lounges provide ample opportunities for enjoying the outdoors in style.</p><p>\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"1936\" data-end=\"2338\"><strong data-start=\"1936\" data-end=\"1975\">PRIME LOCATION &amp; CULTURAL LIFESTYLE</strong><br data-start=\"1975\" data-end=\"1978\">\r\nSituated in a <strong data-start=\"1992\" data-end=\"2031\">prestigious and secure neighborhood</strong>, this villa offers both <strong data-start=\"2056\" data-end=\"2083\">privacy and convenience</strong>, while reflecting the richness of Arabian heritage. Perfect for those who appreciate <strong data-start=\"2169\" data-end=\"2226\">timeless design, cultural elegance, and modern luxury</strong>, this residence represents a rare opportunity to experience <strong data-start=\"2287\" data-end=\"2335\">tradition reimagined for contemporary living</strong>.</p></li>', NULL, NULL, NULL, NULL, '2025-09-17 13:07:30', '2025-09-21 10:22:24', NULL),
(19, 4, 'ARJAN TOWNHOUSE', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<p><strong></strong></p><p data-start=\"250\" data-end=\"607\"><strong data-start=\"250\" data-end=\"262\">OVERVIEW</strong><br data-start=\"262\" data-end=\"265\">\r\nSituated in a <strong data-start=\"279\" data-end=\"309\">vibrant urban neighborhood</strong>, this <strong data-start=\"316\" data-end=\"336\">modern townhouse</strong> perfectly combines <strong data-start=\"356\" data-end=\"404\">contemporary style, convenience, and comfort</strong>. Designed for those who value <strong data-start=\"435\" data-end=\"494\">easy access to city life without compromising on luxury</strong>, this residence is ideal for professionals, small families, or anyone seeking a sophisticated urban lifestyle.</p><p data-start=\"609\" data-end=\"1069\"><strong data-start=\"609\" data-end=\"641\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"641\" data-end=\"644\">\r\nStep into a <strong data-start=\"656\" data-end=\"701\">spacious open-plan living and dining area</strong>, thoughtfully designed to create a <strong data-start=\"737\" data-end=\"770\">welcoming and airy atmosphere</strong>. Natural light flows freely throughout the space, enhancing the home’s modern aesthetic and making it perfect for <strong data-start=\"885\" data-end=\"936\">hosting guests or enjoying quiet family moments</strong>. Elegant finishes and a seamless layout balance <strong data-start=\"985\" data-end=\"1013\">style with functionality</strong>, offering a space that is both practical and refined.</p><p data-start=\"1071\" data-end=\"1481\"><strong data-start=\"1071\" data-end=\"1102\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1102\" data-end=\"1105\">\r\nThe townhouse features <strong data-start=\"1128\" data-end=\"1158\">well-proportioned bedrooms</strong>, each designed as a private sanctuary for rest and relaxation. The <strong data-start=\"1226\" data-end=\"1242\">master suite</strong> offers luxurious comfort with an en-suite bathroom and ample storage, while additional bedrooms are versatile, ideal for children, guests, or a home office. Every room reflects the <strong data-start=\"1424\" data-end=\"1456\">modern, sophisticated design</strong> that defines the home.</p><p data-start=\"1483\" data-end=\"1792\"><strong data-start=\"1483\" data-end=\"1514\">ROOFTOP &amp; OUTDOOR AMENITIES</strong><br data-start=\"1514\" data-end=\"1517\">\r\nA <strong data-start=\"1519\" data-end=\"1546\">private rooftop terrace</strong> provides <strong data-start=\"1556\" data-end=\"1596\">stunning panoramic views of the city</strong>, creating the perfect setting for <strong data-start=\"1631\" data-end=\"1692\">evening gatherings, weekend brunches, or quiet relaxation</strong>. Secure <strong data-start=\"1701\" data-end=\"1720\">covered parking</strong> ensures peace of mind and convenience, making city living effortless.</p><p data-start=\"1794\" data-end=\"2199\"><strong data-start=\"1794\" data-end=\"1830\">PRIME LOCATION &amp; URBAN LIFESTYLE</strong><br data-start=\"1830\" data-end=\"1833\">\r\nLocated in the heart of a <strong data-start=\"1859\" data-end=\"1889\">dynamic urban neighborhood</strong>, this townhouse keeps you within easy reach of <strong data-start=\"1937\" data-end=\"1998\">shopping, dining, business hubs, and cultural attractions</strong>. Combining <strong data-start=\"2010\" data-end=\"2069\">central convenience, modern design, and stylish comfort</strong>, this residence offers a truly <strong data-start=\"2101\" data-end=\"2127\">premium city lifestyle</strong>, ideal for those who want the best of urban living at their doorstep.</p><p>\r\n\r\n\r\n\r\n<br></p>', NULL, NULL, NULL, NULL, '2025-09-17 13:40:23', '2025-09-21 10:22:51', NULL),
(20, 4, 'abdoun townhouse', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<p><strong></strong></p><p data-start=\"251\" data-end=\"596\"><strong data-start=\"251\" data-end=\"263\">OVERVIEW</strong><br data-start=\"263\" data-end=\"266\">\r\nDesigned with families in mind, this <strong data-start=\"303\" data-end=\"325\">charming townhouse</strong> offers a perfect blend of <strong data-start=\"352\" data-end=\"400\">comfort, functionality, and community living</strong>. Nestled in a <strong data-start=\"415\" data-end=\"449\">peaceful suburban neighborhood</strong>, it provides a safe and welcoming environment for families seeking a balanced lifestyle close to schools, shopping, and recreational facilities.</p><p data-start=\"598\" data-end=\"1028\"><strong data-start=\"598\" data-end=\"630\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"630\" data-end=\"633\">\r\nStep inside to discover <strong data-start=\"657\" data-end=\"679\">spacious interiors</strong> that foster both relaxation and togetherness. The <strong data-start=\"730\" data-end=\"767\">open-plan living and dining areas</strong> create a warm and inviting atmosphere, ideal for <strong data-start=\"817\" data-end=\"861\">family gatherings or casual entertaining</strong>. The <strong data-start=\"867\" data-end=\"909\">spacious kitchen with a breakfast nook</strong> serves as the heart of the home, where morning routines, casual meals, and lively family conversations come to life.</p><p data-start=\"1030\" data-end=\"1424\"><strong data-start=\"1030\" data-end=\"1061\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1061\" data-end=\"1064\">\r\nThe townhouse features <strong data-start=\"1087\" data-end=\"1110\">well-sized bedrooms</strong>, designed to provide restful private retreats for family members. The <strong data-start=\"1181\" data-end=\"1197\">master suite</strong> offers comfort and practicality, while additional bedrooms are versatile, perfect for children, guests, or a home office. Each room reflects thoughtful planning to ensure <strong data-start=\"1369\" data-end=\"1401\">both style and functionality</strong> throughout the home.</p><p data-start=\"1426\" data-end=\"1743\"><strong data-start=\"1426\" data-end=\"1466\">OUTDOOR AMENITIES &amp; COMMUNITY LIVING</strong><br data-start=\"1466\" data-end=\"1469\">\r\nThe property includes a <strong data-start=\"1493\" data-end=\"1519\">small private backyard</strong>, ideal for gardening, children’s play, or quiet outdoor moments. Residents also enjoy access to <strong data-start=\"1616\" data-end=\"1636\">shared amenities</strong>, including a <strong data-start=\"1650\" data-end=\"1677\">community pool and park</strong>, encouraging an <strong data-start=\"1694\" data-end=\"1727\">active and sociable lifestyle</strong> for families.</p><p data-start=\"1745\" data-end=\"2157\"><strong data-start=\"1745\" data-end=\"1782\">PRIME LOCATION &amp; FAMILY LIFESTYLE</strong><br data-start=\"1782\" data-end=\"1785\">\r\nConveniently located near <strong data-start=\"1811\" data-end=\"1865\">schools, supermarkets, and recreational facilities</strong>, this townhouse offers both <strong data-start=\"1894\" data-end=\"1921\">comfort and convenience</strong> in a safe, family-friendly environment. Perfect for those seeking a <strong data-start=\"1990\" data-end=\"2021\">balanced suburban lifestyle</strong>, it combines <strong data-start=\"2035\" data-end=\"2100\">modern living, community amenities, and family-focused design</strong> to create an ideal home for building lasting memories.</p><p>\r\n\r\n\r\n\r\n<br></p>', NULL, NULL, NULL, NULL, '2025-09-17 13:45:19', '2025-09-21 10:23:26', NULL),
(21, 4, 'Townhouse in khalda', NULL, NULL, NULL, 'AMMAN JORDAN', NULL, '<p data-start=\"256\" data-end=\"593\"><strong data-start=\"256\" data-end=\"268\">OVERVIEW</strong><br data-start=\"268\" data-end=\"271\">\r\nExperience the perfect blend of <strong data-start=\"303\" data-end=\"355\">modern sophistication and waterfront tranquility</strong> with this <strong data-start=\"366\" data-end=\"392\">contemporary townhouse</strong>. Offering a rare opportunity to live by the water, this residence is ideal for <strong data-start=\"472\" data-end=\"500\">professionals or couples</strong> who seek a stylish, serene retreat without sacrificing convenience or urban accessibility.</p><p data-start=\"595\" data-end=\"1071\"><strong data-start=\"595\" data-end=\"627\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"627\" data-end=\"630\">\r\nStep inside to discover <strong data-start=\"654\" data-end=\"683\">sleek, high-end interiors</strong> that exude elegance and modernity. The <strong data-start=\"723\" data-end=\"760\">open-plan living and dining areas</strong> are designed to maximize comfort and natural light, creating an inviting space for <strong data-start=\"844\" data-end=\"881\">relaxation or entertaining guests</strong>. From the living room, step onto the <strong data-start=\"919\" data-end=\"966\">balcony overlooking serene waterfront views</strong>, where morning coffees, sunset reflections, and quiet evenings take on a new sense of calm and luxury.</p><p data-start=\"1073\" data-end=\"1461\"><strong data-start=\"1073\" data-end=\"1104\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1104\" data-end=\"1107\">\r\nThe townhouse features <strong data-start=\"1130\" data-end=\"1157\">well-appointed bedrooms</strong>, each designed to provide a private and tranquil sanctuary. The <strong data-start=\"1222\" data-end=\"1238\">master suite</strong> combines comfort with elegance, featuring premium finishes and a relaxing atmosphere that complements the peaceful waterfront setting. Additional bedrooms offer flexibility for guests, home offices, or personal retreats.</p><p data-start=\"1463\" data-end=\"1818\"><strong data-start=\"1463\" data-end=\"1498\">PRACTICALITY &amp; MODERN AMENITIES</strong><br data-start=\"1498\" data-end=\"1501\">\r\nA <strong data-start=\"1503\" data-end=\"1551\">private garage with additional storage space</strong> adds practicality to the home’s refined elegance, ensuring convenience without compromising style. Every detail has been thoughtfully considered, from high-quality finishes to smart space planning, delivering a seamless combination of <strong data-start=\"1787\" data-end=\"1815\">luxury and functionality</strong>.</p><p>\r\n\r\n\r\n\r\n</p><p data-start=\"1820\" data-end=\"2215\"><strong data-start=\"1820\" data-end=\"1850\">PRIME LOCATION &amp; LIFESTYLE</strong><br data-start=\"1850\" data-end=\"1853\">\r\nNestled within easy reach of <strong data-start=\"1882\" data-end=\"1928\">dining, shopping, and leisure destinations</strong>, this townhouse provides the perfect balance of <strong data-start=\"1977\" data-end=\"2010\">tranquility and accessibility</strong>. Living by the water, with serene views and contemporary elegance, this property is an exceptional opportunity for those who value <strong data-start=\"2142\" data-end=\"2185\">style, comfort, and a premium lifestyle</strong> in a sought-after location.</p><p data-start=\"1820\" data-end=\"2215\"><br></p>', NULL, NULL, NULL, NULL, '2025-09-17 13:49:32', '2025-09-21 10:23:57', NULL),
(22, 4, 'Al rasheed Townhouse', NULL, NULL, NULL, 'Jordan - Amman', NULL, '<p data-start=\"258\" data-end=\"605\"><strong data-start=\"258\" data-end=\"270\">OVERVIEW</strong><br data-start=\"270\" data-end=\"273\">\r\nSituated in an <strong data-start=\"288\" data-end=\"317\">exclusive gated community</strong>, this <strong data-start=\"324\" data-end=\"344\">luxury townhouse</strong> redefines upscale living by combining <strong data-start=\"383\" data-end=\"429\">prestige, convenience, and modern elegance</strong>. Designed for discerning buyers who value both <strong data-start=\"477\" data-end=\"504\">style and functionality</strong>, this residence offers a sophisticated lifestyle in one of the city’s most sought-after addresses.</p><p data-start=\"607\" data-end=\"1027\"><strong data-start=\"607\" data-end=\"639\">LIVING &amp; ENTERTAINING SPACES</strong><br data-start=\"639\" data-end=\"642\">\r\nStep inside to discover <strong data-start=\"666\" data-end=\"704\">spacious, well-appointed interiors</strong> connected by a <strong data-start=\"720\" data-end=\"740\">private elevator</strong> for effortless access to all floors. The home features <strong data-start=\"796\" data-end=\"833\">open-plan living and dining areas</strong>, perfect for <strong data-start=\"847\" data-end=\"916\">family gatherings, entertaining guests, or quiet evenings at home</strong>. Expansive windows fill the space with natural light, creating a bright and welcoming atmosphere throughout.</p><p data-start=\"1029\" data-end=\"1374\"><strong data-start=\"1029\" data-end=\"1060\">ROOFTOP &amp; OUTDOOR AMENITIES</strong><br data-start=\"1060\" data-end=\"1063\">\r\nThe <strong data-start=\"1067\" data-end=\"1093\">private rooftop lounge</strong> serves as an exceptional entertaining space, complete with a <strong data-start=\"1155\" data-end=\"1167\">BBQ area</strong> for hosting friends and family against a backdrop of city views. Multi-level terraces and outdoor areas provide additional opportunities for relaxation, socializing, or enjoying serene moments in privacy.</p><p data-start=\"1376\" data-end=\"1757\"><strong data-start=\"1376\" data-end=\"1407\">BEDROOMS &amp; PRIVATE RETREATS</strong><br data-start=\"1407\" data-end=\"1410\">\r\nGenerously sized bedrooms are designed as <strong data-start=\"1452\" data-end=\"1471\">serene retreats</strong>, offering comfort and privacy. The <strong data-start=\"1507\" data-end=\"1523\">master suite</strong> features a luxurious en-suite bathroom and ample wardrobe space, while additional bedrooms are versatile for family, guests, or a home office. Every room is thoughtfully designed to combine <strong data-start=\"1714\" data-end=\"1754\">modern finishes with elegant details</strong>.</p><p data-start=\"1759\" data-end=\"2063\"><strong data-start=\"1759\" data-end=\"1793\">EXCLUSIVE AMENITIES &amp; SECURITY</strong><br data-start=\"1793\" data-end=\"1796\">\r\nResidents enjoy access to a full range of <strong data-start=\"1838\" data-end=\"1869\">premium community amenities</strong>, including a <strong data-start=\"1883\" data-end=\"1920\">clubhouse, gym, and swimming pool</strong>, enhancing the overall lifestyle experience. <strong data-start=\"1966\" data-end=\"1983\">24/7 security</strong> ensures peace of mind, while secure parking adds convenience to daily living.</p><p>\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"2065\" data-end=\"2423\"><strong data-start=\"2065\" data-end=\"2103\">PRIME LOCATION &amp; UPSCALE LIFESTYLE</strong><br data-start=\"2103\" data-end=\"2106\">\r\nLocated near <strong data-start=\"2119\" data-end=\"2177\">high-end retail, fine dining, and leisure destinations</strong>, this townhouse offers a rare combination of <strong data-start=\"2223\" data-end=\"2261\">prestige, practicality, and luxury</strong>. Perfect for buyers seeking an <strong data-start=\"2293\" data-end=\"2332\">exclusive gated-community lifestyle</strong>, this property delivers comfort, sophistication, and convenience in one elegant package.</p>', NULL, NULL, NULL, NULL, '2025-09-17 13:53:59', '2025-09-21 10:24:27', NULL);

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
(3, 'Welcome to your luxury home', 'لوريم ايبسوم', 'Fulfilling your aspirations with the finest properties and exceptional service, delivering an unmatched experience of luxury and comfort.', 'لوريم إيبسوم', NULL, NULL, 'https://www.facebook.com', '2025-04-22 06:06:41', '2025-09-21 09:58:46', '2025-09-21 09:58:46'),
(4, 'Welcome to your luxury home', 'لوريم إيبسوم', 'Fulfilling your aspirations with the finest properties and exceptional service, delivering an unmatched experience of luxury and comfort.', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى.', NULL, NULL, 'https://www.facebook.com', '2025-08-26 13:10:50', '2025-09-16 13:22:32', NULL),
(5, 'Among the most attractive features of a luxury apartment', NULL, 'community are the amenities. Luxury apartment communities feature some or all of the following: • Clubhouse • Fitness Center • Movie Theater • Billiards Room', NULL, NULL, NULL, 'https://www.godwinvaapts.com/what-makes-a-luxury-apartment/', '2025-09-21 10:01:29', '2025-09-21 10:01:29', NULL);

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
(6, 1, '180 m²', 'لوريم إيبسوم', '2025-08-27 07:56:19', '2025-08-27 07:56:19', NULL),
(7, 4, 'Beedrooms', 'Beedrooms', '2025-09-11 07:27:45', '2025-09-11 07:27:45', NULL),
(8, 4, 'dfgdfgd', 'لوريم إيبسوم', '2025-09-14 09:18:36', '2025-09-14 09:18:36', NULL),
(9, 4, 'dfgdfgd', 'لوريم إيبسوم', '2025-09-14 09:20:12', '2025-09-14 09:20:12', NULL),
(10, 4, 'Digital Marketing', NULL, '2025-09-14 09:23:12', '2025-09-14 09:23:12', NULL),
(11, 11, 'View', NULL, '2025-09-17 11:27:40', '2025-09-21 09:42:50', NULL),
(12, 11, '2 baths', NULL, '2025-09-17 11:27:48', '2025-09-17 11:27:48', NULL),
(13, 11, '150m²', NULL, '2025-09-17 11:28:15', '2025-09-21 09:42:38', NULL),
(14, 10, '450m²', NULL, '2025-09-17 11:33:52', '2025-09-21 09:42:24', NULL),
(15, 10, '3 Bathrooms', NULL, '2025-09-17 11:34:24', '2025-09-17 11:34:24', NULL),
(16, 10, '4 Bedrooms', NULL, '2025-09-17 11:34:59', '2025-09-17 11:34:59', NULL),
(17, 9, '250m²', NULL, '2025-09-17 11:36:58', '2025-09-21 09:41:56', NULL),
(18, 9, '3 Bedrooms,', NULL, '2025-09-17 11:37:25', '2025-09-21 09:41:59', '2025-09-21 09:41:59'),
(19, 9, '3 Bathrooms', NULL, '2025-09-17 11:37:43', '2025-09-17 11:37:43', NULL),
(20, 5, 'Size: 120', NULL, '2025-09-17 11:38:39', '2025-09-17 11:38:39', NULL),
(21, 5, 'Bathrooms: 2', NULL, '2025-09-17 11:39:06', '2025-09-17 11:39:16', '2025-09-17 11:39:16'),
(22, 5, '2 Bedrooms', NULL, '2025-09-17 11:39:35', '2025-09-21 09:40:06', NULL),
(23, 5, '2 Bathrooms', NULL, '2025-09-17 11:39:53', '2025-09-21 09:40:02', '2025-09-21 09:40:02'),
(24, 6, '- Private landscaped garden', NULL, '2025-09-17 12:14:58', '2025-09-21 09:39:02', '2025-09-21 09:39:02'),
(25, 6, '- Infinity swimming pool', NULL, '2025-09-17 12:15:33', '2025-09-21 09:39:04', '2025-09-21 09:39:04'),
(26, 6, '- Floor-to-ceiling glass walls', NULL, '2025-09-17 12:15:48', '2025-09-21 09:39:06', '2025-09-21 09:39:06'),
(27, 6, '- Smart home automation system', NULL, '2025-09-17 12:16:05', '2025-09-21 09:39:09', '2025-09-21 09:39:09'),
(28, 12, 'Spacious outdoor dining terrace', NULL, '2025-09-17 12:25:34', '2025-09-21 09:43:06', '2025-09-21 09:43:06'),
(29, 12, 'Lush fruit and olive trees in the garden', NULL, '2025-09-17 12:25:49', '2025-09-21 09:43:08', '2025-09-21 09:43:08'),
(30, 12, 'Private swimming pool', NULL, '2025-09-17 12:26:16', '2025-09-21 09:43:10', '2025-09-21 09:43:10'),
(31, 12, 'Terracotta roof and stone façade', NULL, '2025-09-17 12:26:30', '2025-09-21 09:43:12', '2025-09-21 09:43:12'),
(32, 13, '- Direct beach access', NULL, '2025-09-17 12:31:54', '2025-09-21 09:43:50', '2025-09-21 09:43:50'),
(33, 13, '- Panoramic sea views', NULL, '2025-09-17 12:32:11', '2025-09-21 09:43:52', '2025-09-21 09:43:52'),
(34, 13, '- Private infinity pool', NULL, '2025-09-17 12:32:38', '2025-09-21 09:43:54', '2025-09-21 09:43:54'),
(35, 14, '- Large backyard with playground', NULL, '2025-09-17 12:38:41', '2025-09-21 09:49:17', '2025-09-21 09:49:17'),
(36, 14, '- Private swimming pool', NULL, '2025-09-17 12:39:11', '2025-09-21 09:49:19', '2025-09-21 09:49:19'),
(37, 14, '240m²', NULL, '2025-09-17 12:40:00', '2025-09-21 09:49:30', NULL),
(38, 15, '- Private elevator', NULL, '2025-09-17 12:46:23', '2025-09-21 09:49:54', '2025-09-21 09:49:54'),
(39, 15, '- Double-height living room', NULL, '2025-09-17 12:46:40', '2025-09-21 09:49:56', '2025-09-21 09:49:56'),
(40, 15, '- Secure underground parking', NULL, '2025-09-17 12:46:58', '2025-09-21 09:49:58', '2025-09-21 09:49:58'),
(41, 16, '- Green rooftop garden', NULL, '2025-09-17 12:53:09', '2025-09-21 09:50:27', '2025-09-21 09:50:27'),
(42, 16, '- Rainwater harvesting', NULL, '2025-09-17 12:53:30', '2025-09-21 09:50:25', '2025-09-21 09:50:25'),
(43, 16, '- Smart lighting and climate control', NULL, '2025-09-17 12:53:47', '2025-09-21 09:50:23', '2025-09-21 09:50:23'),
(44, 17, '- Elevated position with mountain and city views', NULL, '2025-09-17 12:59:28', '2025-09-21 09:50:48', '2025-09-21 09:50:48'),
(45, 17, '- Glass balustrades for unobstructed views', NULL, '2025-09-17 12:59:46', '2025-09-21 09:50:50', '2025-09-21 09:50:50'),
(46, 17, '- Infinity-edge pool', NULL, '2025-09-17 13:00:10', '2025-09-21 09:50:52', '2025-09-21 09:50:52'),
(47, 18, '- High privacy walls', NULL, '2025-09-17 13:07:47', '2025-09-21 09:51:12', '2025-09-21 09:51:12'),
(48, 18, '- Central courtyard with fountain', NULL, '2025-09-17 13:08:08', '2025-09-21 09:51:15', '2025-09-21 09:51:15'),
(49, 18, '- Traditional arches and ornate detailing', NULL, '2025-09-17 13:09:07', '2025-09-21 09:51:32', '2025-09-21 09:51:32'),
(50, 19, '- Private rooftop terrace with city views', NULL, '2025-09-17 13:41:04', '2025-09-21 09:52:34', '2025-09-21 09:52:34'),
(51, 19, '- Open-plan living and dining area', NULL, '2025-09-17 13:41:27', '2025-09-21 09:52:36', '2025-09-21 09:52:36'),
(52, 19, '- Secure covered parking', NULL, '2025-09-17 13:41:45', '2025-09-21 09:52:51', '2025-09-21 09:52:51'),
(53, 20, '- Access to shared community pool and park', NULL, '2025-09-17 13:45:51', '2025-09-21 09:53:23', '2025-09-21 09:53:23'),
(54, 20, '- Spacious kitchen with breakfast nook', NULL, '2025-09-17 13:46:05', '2025-09-21 09:53:25', '2025-09-21 09:53:25'),
(55, 20, '- Small private backyard with garden space', NULL, '2025-09-17 13:46:20', '2025-09-21 09:53:26', '2025-09-21 09:53:26'),
(56, 21, '- High-end finishes and modern interiors', NULL, '2025-09-17 13:50:11', '2025-09-21 09:54:17', '2025-09-21 09:54:17'),
(57, 21, '- Private garage with storage space', NULL, '2025-09-17 13:50:24', '2025-09-21 09:54:15', '2025-09-21 09:54:15'),
(58, 21, '- Balcony with direct waterfront views', NULL, '2025-09-17 13:50:53', '2025-09-21 09:54:13', '2025-09-21 09:54:13'),
(59, 22, '- Private elevator connecting all floors', NULL, '2025-09-17 13:54:26', '2025-09-21 09:54:49', '2025-09-21 09:54:49'),
(60, 22, '- Access to clubhouse, gym, and swimming pool', NULL, '2025-09-17 13:54:43', '2025-09-21 09:54:51', '2025-09-21 09:54:51'),
(61, 22, '- Rooftop lounge with BBQ area', NULL, '2025-09-17 13:55:06', '2025-09-21 09:54:53', '2025-09-21 09:54:53'),
(62, 6, '200 m', NULL, '2025-09-21 09:39:26', '2025-09-21 09:41:23', '2025-09-21 09:41:23'),
(63, 6, '2 Bedrooms', NULL, '2025-09-21 09:39:33', '2025-09-21 09:41:27', NULL),
(64, 5, 'Teras', NULL, '2025-09-21 09:40:12', '2025-09-21 09:40:33', NULL),
(65, 6, '500m²', NULL, '2025-09-21 09:41:19', '2025-09-21 09:41:19', NULL),
(66, 9, '2 Bedrooms', NULL, '2025-09-21 09:42:07', '2025-09-21 09:42:07', NULL),
(67, 12, '400m²', NULL, '2025-09-21 09:43:16', '2025-09-21 09:43:16', NULL),
(68, 12, 'View', NULL, '2025-09-21 09:43:22', '2025-09-21 09:43:22', NULL),
(69, 12, '2 Bedrooms', NULL, '2025-09-21 09:43:28', '2025-09-21 09:43:28', NULL),
(70, 13, '350m²', NULL, '2025-09-21 09:44:28', '2025-09-21 09:44:28', NULL),
(71, 13, 'Teras', NULL, '2025-09-21 09:44:33', '2025-09-21 09:44:33', NULL),
(72, 13, 'View', NULL, '2025-09-21 09:44:38', '2025-09-21 09:44:38', NULL),
(73, 14, '2 Bedrooms', NULL, '2025-09-21 09:49:38', '2025-09-21 09:49:38', NULL),
(74, 14, 'Teras', NULL, '2025-09-21 09:49:46', '2025-09-21 09:49:46', NULL),
(75, 15, '300m²', NULL, '2025-09-21 09:50:04', '2025-09-21 09:50:04', NULL),
(76, 15, '2 Bedrooms', NULL, '2025-09-21 09:50:10', '2025-09-21 09:50:10', NULL),
(77, 15, 'Isolated', NULL, '2025-09-21 09:50:14', '2025-09-21 09:50:14', NULL),
(78, 16, '300m²', NULL, '2025-09-21 09:50:31', '2025-09-21 09:50:31', NULL),
(79, 16, 'Isolated', NULL, '2025-09-21 09:50:39', '2025-09-21 09:50:39', NULL),
(80, 17, '100m²', NULL, '2025-09-21 09:50:55', '2025-09-21 09:50:55', NULL),
(81, 17, 'Teras', NULL, '2025-09-21 09:51:01', '2025-09-21 09:51:01', NULL),
(82, 17, 'View', NULL, '2025-09-21 09:51:04', '2025-09-21 09:51:04', NULL),
(83, 18, '250m²', NULL, '2025-09-21 09:52:07', '2025-09-21 09:52:07', NULL),
(84, 18, 'Teras', NULL, '2025-09-21 09:52:10', '2025-09-21 09:52:10', NULL),
(85, 18, 'Pool', NULL, '2025-09-21 09:52:25', '2025-09-21 09:52:25', NULL),
(86, 19, '350m²', NULL, '2025-09-21 09:52:57', '2025-09-21 09:52:57', NULL),
(87, 19, 'High Area', NULL, '2025-09-21 09:53:07', '2025-09-21 09:53:07', NULL),
(88, 19, 'Warehouse', NULL, '2025-09-21 09:53:16', '2025-09-21 09:53:16', NULL),
(89, 20, '300m²', NULL, '2025-09-21 09:53:30', '2025-09-21 09:53:30', NULL),
(90, 20, 'Pool', NULL, '2025-09-21 09:53:35', '2025-09-21 09:53:35', NULL),
(91, 20, 'Warehouse', NULL, '2025-09-21 09:53:42', '2025-09-21 09:53:51', NULL),
(92, 21, '200m²', NULL, '2025-09-21 09:54:32', '2025-09-21 09:54:32', NULL),
(93, 21, '3 Beedrooms', NULL, '2025-09-21 09:54:37', '2025-09-21 09:54:37', NULL),
(94, 21, '2 Bathrooms', NULL, '2025-09-21 09:54:41', '2025-09-21 09:54:41', NULL),
(95, 22, '250m²', NULL, '2025-09-21 09:55:01', '2025-09-21 09:55:01', NULL),
(96, 22, 'Teras 20m²', NULL, '2025-09-21 09:55:12', '2025-09-21 09:55:12', NULL),
(97, 22, '2 Bathrooms', NULL, '2025-09-21 09:55:17', '2025-09-21 09:55:17', NULL);

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
(1, 'HLXDDN7M7266URMT', 'zPgmnae5h4zjxt0DRHXx924aZcAiQ0SL', 'Main Admin', '0', 'admin@admin.com', '2024-07-17 10:40:39', '$2y$10$vj5XJlkrk4ucKWe8ppEZxeGNDfqKWjLUukL9gCEOhSQBvMiOGrOFe', 'AYgn983NBFK1bTQp3USvwIbDYl81awIchyiEJqdLbZHzLVYDUvdgBFeMTZRh', '2019-09-16 04:53:12', '2025-09-22 06:52:35', NULL),
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

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '127.0.0.1', '2025-09-14 09:05:13', '2025-09-15 08:27:31', '2025-09-15 08:27:31'),
(2, '127.0.0.1', '2025-09-15 08:31:29', '2025-09-15 08:31:29', NULL),
(3, '185.51.214.213', '2025-09-16 10:30:45', '2025-09-16 10:30:45', NULL),
(4, '43.135.186.135', '2025-09-17 03:35:50', '2025-09-17 03:35:50', NULL);

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
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

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
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
