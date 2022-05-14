-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2022 at 07:46 AM
-- Server version: 10.3.34-MariaDB-log-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futuolgq_surong`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `heading_one`, `heading_two`, `description`, `status`, `photo`, `created_at`, `updated_at`) VALUES
(4, 'Spring 2022', 'New Collection', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque cupiditate esse laudantium molestiae quas velit!', 1, '5mGrheader-02.jpg', '2022-04-14 10:45:02', '2022-04-14 10:45:02'),
(5, 'Summer Sale', '-70%', 'Free shipping With Promo Code FRESH', 1, '6lCLheader-03.jpg', '2022-04-14 10:46:06', '2022-04-14 10:46:06'),
(6, 'Cloth Hacks', 'For Women', 'How to dress like every day is a Sunday trip to the market', 1, 'XJ1gheader-04.jpg', '2022-04-14 10:47:35', '2022-04-14 10:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `blogcomments`
--

CREATE TABLE `blogcomments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `details`, `photo`, `category_id`, `tags`, `meta_keywords`, `meta_descriptions`, `created_at`, `updated_at`) VALUES
(1, 'Top 25 Pieces From The Spring Online stores sale', 'top-25-pieces-from-the-spring-online-stores-sale', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>', '[\"ssC4blog-post-01.jpg\"]', 1, 'tag', '[{\"value\":\"tag\"}]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 15', '2022-03-26 23:08:49', '2022-03-26 23:08:49'),
(2, 'The Most Flattering blouses under $100', 'the-most-flattering-blouses-under-100', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>', '[\"8QvHblog-post-02.jpg\"]', 1, 'tag', '[{\"value\":\"tag\"}]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s', '2022-03-26 23:10:03', '2022-03-26 23:10:03'),
(3, '5 Little Luxuries That Make a Big Difference', '5-little-luxuries-that-make-a-big-difference', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>', '[\"EWStblog-post-03.jpg\"]', 1, 'tag', '[{\"value\":\"tag\"}]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s', '2022-03-26 23:11:07', '2022-03-26 23:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'By Admin', 'By-Admin', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `is_popular` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `photo`, `status`, `is_popular`, `created_at`, `updated_at`) VALUES
(6, 'Polo', 'Polo', 'K4bkpolo.jpg', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generated_cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `generated_cart_id`, `product_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 'LABCK707', 19, 2, '2022-05-10 10:13:07', '2022-05-10 10:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `is_feature` tinyint(4) DEFAULT 1,
  `serial` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `photo`, `meta_keywords`, `meta_descriptions`, `status`, `is_feature`, `serial`, `created_at`, `updated_at`) VALUES
(9, 'Man', 'Man', 'XYCjmane.jpg', '[{\"value\":\"man\"}]', 'man', 1, 1, 0, NULL, NULL),
(10, 'Women', 'Women', 'Tp4listockphoto-1319763830-170667a.jpg', '[{\"value\":\"Women\"}]', 'Women', 1, 1, 0, NULL, NULL),
(11, 'Child', 'Child', 'KBTwphoto-1581841899040-8b5e38bae033.jpg', '[{\"value\":\"Child\"}]', 'Child', 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactmessages`
--

CREATE TABLE `contactmessages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `display_sliders`
--

CREATE TABLE `display_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `display_sliders`
--

INSERT INTO `display_sliders` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'eAfgbanner-04.jpg', '2022-03-26 21:33:49', '2022-03-26 21:33:49'),
(2, 'VRiDbanner-05.jpg', '2022-03-26 21:33:59', '2022-03-26 21:33:59'),
(3, 'ecG2banner-06.jpg', '2022-03-26 21:34:15', '2022-03-26 21:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd'),
(15, 2, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd'),
(19, 2, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd'),
(44, 6, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `photo`, `created_at`, `updated_at`) VALUES
(20, 19, 'vsRKtshirt1.jpeg', NULL, NULL),
(21, 19, 'Kz3otshirt2.jpg', NULL, NULL),
(22, 19, 'J0Rqtshirt3.webp', NULL, NULL),
(23, 20, 'sO3GRectangle 1 (5).jpg', NULL, NULL),
(24, 20, 'EpTwRectangle 1 (6).jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instagrams`
--

CREATE TABLE `instagrams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instagrams`
--

INSERT INTO `instagrams` (`id`, `photo`, `link`, `created_at`, `updated_at`) VALUES
(8, 'LKB0insta-01.jpg', '#', '2022-04-14 10:48:10', '2022-04-14 10:48:10'),
(9, 'FJ9Finsta-02.jpg', '#', '2022-04-14 10:48:42', '2022-04-14 10:48:42'),
(10, 'Abcainsta-03.jpg', '#', '2022-04-14 10:48:54', '2022-04-14 10:48:54'),
(11, 'XaKVinsta-04.jpg', '#', '2022-04-14 10:49:06', '2022-04-14 10:49:06'),
(12, 'cBdwinsta-05.jpg', '#', '2022-04-14 10:49:18', '2022-04-14 10:49:18'),
(13, 'ztTlinsta-06.jpg', '#', '2022-04-14 10:49:31', '2022-04-14 10:49:31'),
(14, 'jeiginsta-07.jpg', '#', '2022-04-14 10:49:46', '2022-04-14 10:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `lproducts`
--

CREATE TABLE `lproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lproducts`
--

INSERT INTO `lproducts` (`id`, `year`, `heading`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, '2022', 'Our First Product', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '1648358616img-thumb(5).jpg', '2022-03-26 22:26:20', '2022-03-26 23:23:36'),
(2, '2020', 'Our First Product', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 'N0Bkimg-thumb(2).jpg', '2022-03-26 23:24:19', '2022-03-26 23:24:19'),
(3, '2018', 'Our First Product', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 'Psckimg-thumb(1).jpg', '2022-03-26 23:24:46', '2022-03-26 23:24:46'),
(4, '2016', 'Our First Product', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 'bcEdimg-thumb(2).jpg', '2022-03-26 23:25:21', '2022-03-26 23:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2022_02_06_062616_create_categories_table', 2),
(9, '2022_02_09_115338_create_brands_table', 3),
(10, '2022_02_09_130849_create_galleries_table', 4),
(11, '2022_02_07_135113_create_products_table', 5),
(15, '2022_02_13_105233_create_banners_table', 6),
(16, '2022_02_14_040029_create_blogs_table', 7),
(17, '2022_02_14_041431_create_blog_categories_table', 7),
(18, '2022_02_14_102036_create_teams_table', 8),
(20, '2022_02_16_113341_create_settings_table', 9),
(21, '2022_02_17_061710_create_socials_table', 10),
(22, '2022_03_20_114205_create_display_sliders_table', 11),
(23, '2022_03_21_035918_create_instagrams_table', 12),
(24, '2022_03_21_121042_create_wishlists_table', 13),
(25, '2022_03_22_204838_create_carts_table', 14),
(29, '2022_03_24_134805_create_contactmessages_table', 16),
(30, '2022_03_24_143940_create_lproducts_table', 17),
(33, '2022_03_23_183853_create_orders_table', 18),
(34, '2022_03_25_044010_create_orderdetails_table', 18),
(35, '2022_03_26_100915_create_blogcomments_table', 19),
(36, '2022_03_26_103628_create_messages_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` int(11) DEFAULT 0,
  `category_id` int(11) DEFAULT 0,
  `brand_id` int(11) DEFAULT 0,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_specification` tinyint(4) DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` double DEFAULT 0,
  `previous_price` double DEFAULT 0,
  `stock` int(11) DEFAULT 0,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `category_id`, `brand_id`, `name`, `slug`, `tags`, `sort_details`, `specification_name`, `specification_description`, `is_specification`, `details`, `photo`, `discount_price`, `previous_price`, `stock`, `meta_keywords`, `meta_description`, `status`, `is_type`, `file`, `created_at`, `updated_at`) VALUES
(19, 3, 9, 6, 'Saree 2', 'Saree--', 'sdfa', 'sadf', '[\"sdf\"]', '[\"sdf\"]', 1, 'sdfasdfasfd', '1650874984Rectangle 1 (3).jpg', 1150, 1500, 201, 'sadf', 'sdf', 1, 'new', NULL, '2022-04-14 10:41:57', '2022-04-25 12:23:04'),
(20, 3, 9, 6, 'Saree', 'Saree', 'saree', 'short Description', '[\"yes\"]', '[\"yes\"]', 1, 'Description', '1650874845Rectangle 1 (4).jpg', 12000, 13000, 200, 'meta', 'meta description', 1, 'new', NULL, '2022-04-25 12:20:45', '2022-04-25 12:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nav_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_collection_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_story_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_story_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_story_quote` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_story_top_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_story_bottom_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_shop_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_shop_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_shop_top_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_shop_bottom_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_conditions` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privecy_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_refund` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_getway_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_time_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_time_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_detail_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_detail_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_about_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_about_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arraivle_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arraivle_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wish_banner_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wish_banner_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_detail_related_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_recent_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_product_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_product_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail_related_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serch_banner_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serch_banner_bg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insta_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insta_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nav_logo`, `footer_logo`, `favicon`, `new_collection_banner`, `address`, `phone`, `email`, `about_story_heading`, `about_story_description`, `about_story_quote`, `about_story_top_photo`, `about_story_bottom_photo`, `about_shop_heading`, `about_shop_description`, `about_shop_top_photo`, `about_shop_bottom_photo`, `map`, `terms_conditions`, `privecy_policy`, `return_refund`, `payment_getway_image`, `social_link`, `office_time_day`, `office_time_hour`, `contact_detail_heading`, `contact_detail_description`, `copyright`, `footer_about_heading`, `footer_about_description`, `blog_title`, `blog_bg`, `arraivle_title`, `arraivle_bg`, `wish_banner_heading`, `wish_banner_bg`, `blog_heading`, `blog_detail_related_heading`, `blog_recent_post`, `new_product_heading`, `best_product_heading`, `product_detail_related_heading`, `serch_banner_heading`, `serch_banner_bg`, `insta_heading`, `insta_profile`, `created_at`, `updated_at`) VALUES
(1, '1645068770Logo-dark.png', '1645068783logo-light.png', '1645069586favicon.png', '1645068966banner-07.jpg', '4850 Trainer Avenue, Seattle', '01999999999', 'opamo@info.com', 'About Our Store', 'Lorem ipsum dolor sit amet, sale nemore equidem duo ad, et qui rebum aeque. In quo possit omnium delectus, vis latine partiendo dignissim ne. Pri at suscipiantur interpretaris, eu tamquam suscipit eum, agam facete expetendis ut eam. Nisl sumo iuvaret eam ei. Pro mazim debitis pertinax an.', 'dfgdfvis singulis elaboraret, dicta salutatus eum ne. Velit honestatis sed partem euismod his ei, vel ex decore expetendis. In mea prima alterum accumsan, eu quo option constituam scripserit, mel alia probo contentiones no. Vide noluisse sit cu, odio alterum pri et.', '1645071660img-thumb(2).jpg', '1645071680img-thumb(1).jpg', 'Shop info', 'Lorem ipsum dolor sit amet, sale nemore equidem duo ad, et qui rebum aeque. In quo possit omnium delectus, vis latine partiendo dignissim ne. Pri at suscipiantur interpretaris, eu tamquam suscipit eum, agam facete expetendis ut eam. Nisl sumo iuvaret eam ei. Pro mazim debitis pertinax an.', '1645073101img-thumb(2).jpg', '1645073110img-thumb(1).jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.854299131859!2d90.36850561498142!3d23.75257458458829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bff65241d09f%3A0x9ac2bd24c9f5766e!2sShurung!5e0!3m2!1sen!2sbd!4v1639320871839!5m2!1sen!2sbd', '<h3><strong>Liability</strong></h3><p>Content available on iubenda.com (http://www.iubenda.com/) and documents generated using the Service are intended for general information purposes only. Although all clauses and provisions inside the generator database have been drafted by a team of highly qualified legal experts and regularly undergo reviews and updates, documents are generated in a fully automated manner and therefore do not constitute or substitute the rendering of legal advice, nor does any assistance and customer support provided by iubenda establish an attorney-client relationship. This is why, despite all efforts in offering the best possible service, iubenda cannot guarantee generated documents to be fully compliant with applicable law. Users should therefore not rely upon documents generated using iubenda without seeking legal advice from an attorney licensed in the relevant jurisdiction(s).</p>', '<p>sdf<strong>Liability</strong></p><p>Content available on iubenda.com (http://www.iubenda.com/) and documents generated using the Service are intended for general information purposes only. Although all clauses and provisions inside the generator database have been drafted by a team of highly qualified legal experts and regularly undergo reviews and updates, documents are generated in a fully automated manner and therefore do not constitute or substitute the rendering of legal advice, nor does any assistance and customer support provided by iubenda establish an attorney-client relationship. This is why, despite all efforts in offering the best possible service, iubenda cannot guarantee generated documents to be fully compliant with applicable law. Users should therefore not rely upon documents generated using iubenda without seeking legal advice from an attorney licensed in the relevant jurisdiction(s).</p>', '<h3><strong>Liability</strong></h3><p>Content available on iubenda.com (http://www.iubenda.com/) and documents generated using the Service are intended for general information purposes only. Although all clauses and provisions inside the generator database have been drafted by a team of highly qualified legal experts and regularly undergo reviews and updates, documents are generated in a fully automated manner and therefore do not constitute or substitute the rendering of legal advice, nor does any assistance and customer support provided by iubenda establish an attorney-client relationship. This is why, despite all efforts in offering the best possible service, iubenda cannot guarantee generated documents to be fully compliant with applicable law. Users should therefore not rely upon documents generated using iubenda without seeking legal advice from an attorney licensed in the relevant jurisdiction(s).</p>', '1649917051SSL-Commerz-Pay-With-logo-All-Size-01.png', '{\"icons\":[\"fab fa-facebook-f\",\"fab fa-twitter\",\"fab fa-youtube\",\"fab fa-linkedin\"],\"links\":[\"https:\\/\\/www.facebook.com\",\"https:\\/\\/www.twitter.com\",\"https:\\/\\/www.youtube.com\",\"https:\\/\\/www.linkedin.com\"]}', 'Mon-Sun', '9:00-19:00', 'We are here to Hear from you!', 'Lorem ipsum dolor sit amet, sale nemore equidem duo ad, et qui rebum aeque. In quo possit omnium delectus, vis latine partiendo dignissim ne. Lorem ipsum dolor sit amet, sale nemore equidem duo ad, et qui rebum aeque. In quo possit omnium delectus, vis latine partiendo dignissim ne.', '© All rights reserved SHURUNG', 'ABOUT US', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eum illo itaque mollitia officiis pariatur perspiciatis sed temporibus ullam, voluptatibus.', 'BLOG', '1648117469bg-04.jpg', 'Always make your own style', 'Always make your own style', 'WISHLIST', '1649915447header-06.jpg', 'Our latest news', 'Related Post', 'Recent posts', 'New Products', 'Best seller', 'You may also like', 'Always make your own style', '1649916976bg-07.jpg', 'Instagram', 'www.instagram.com', '2022-03-15 06:37:40', '2022-04-14 10:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'tShirt', 'tShirt', 9, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `photo`, `linkedin_link`, `twitter_link`, `instagram_link`, `facebook_link`, `created_at`, `updated_at`) VALUES
(1, 'Sara Smith', 'Founder', '9OGMteam(1).jpg', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', NULL, NULL),
(2, 'Sara Smith', 'Founder', 'Be6Cteam(2).jpg', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', NULL, NULL),
(3, 'Sara Smith', 'Founder', 'k7hbteam(3).jpg', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', NULL, NULL),
(4, 'Sara Smith', 'Founder', '26Cbteam(4).jpg', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', 'https://surung.futureinltd.com/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `role` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$vDFH5lCF214rsZ.yMQX5AuXHhC2q9D3lMf3ZJst0bwW1gE80be.Tu', 'default.png', 1, 'HrANV2qiRgD7HzrHneILch6RvgTI1zRMAc10pmTYezwgKlFeqHgKQCvDk743', '2022-02-06 00:22:51', '2022-02-06 00:22:51'),
(2, 'Perves', 'user@gmail.com', '$2y$10$ymOCFUUVYeweP1ZgAC8JEeAC9ol3AD5LHa/VjGKFp3MOWDJ2PBeGe', 'default.png', 2, NULL, '2022-03-25 11:24:12', '2022-03-25 12:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcomments`
--
ALTER TABLE `blogcomments`
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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactmessages`
--
ALTER TABLE `contactmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `display_sliders`
--
ALTER TABLE `display_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagrams`
--
ALTER TABLE `instagrams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lproducts`
--
ALTER TABLE `lproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogcomments`
--
ALTER TABLE `blogcomments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contactmessages`
--
ALTER TABLE `contactmessages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `display_sliders`
--
ALTER TABLE `display_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `instagrams`
--
ALTER TABLE `instagrams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lproducts`
--
ALTER TABLE `lproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
