-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 07:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `created_at`, `updated_at`, `is_active`) VALUES
(2, 'Nike', '2021-04-22 11:04:31', '2021-05-02 02:54:36', 1),
(4, 'Puma', '2021-04-23 03:49:36', '2021-04-23 03:49:36', 0),
(5, 'Adidas', '2021-05-02 02:52:33', '2021-05-02 02:54:44', 1),
(6, 'Seiko', '2021-05-02 04:45:25', '2021-05-02 04:45:25', 1),
(7, 'Casio', '2021-05-02 04:45:55', '2021-05-02 04:45:55', 1),
(8, 'PNJ', '2021-05-02 05:31:10', '2021-05-02 05:31:10', 1),
(9, 'Gucci', '2021-05-02 05:44:53', '2021-05-02 05:44:53', 1),
(10, 'khala', '2021-05-02 05:45:11', '2021-05-02 05:45:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_code`, `product_color`, `price`, `size`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 'sku_dh_2', '', 1161, '', 1, '', 'QYsVIsb9XAe3aF1HBEocR3edFbdN5e6KIfMgrjus', NULL, NULL),
(2, 25, 'NMD R1.V2', 'sku_giay_2', '', 9000, '', 1, '', 'QYsVIsb9XAe3aF1HBEocR3edFbdN5e6KIfMgrjus', NULL, NULL),
(3, 33, 'SEIKO SRPD85K1 – NAM – AUTOMATIC (TỰ ĐỘNG) – DÂY VẢI', 'sku_dh_5', '', 4800000, '', 1, '', 'QYsVIsb9XAe3aF1HBEocR3edFbdN5e6KIfMgrjus', NULL, NULL),
(4, 30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 'sku_dh_2', '', 1161, '', 2, '', 'lgCuaRWolEYkWUbjEZXiJVAyyxaffpln24dggYLH', NULL, NULL),
(5, 39, 'Áo Thun Nam ngắn tay An Phước - ATH000491', 'KL-tt-1', '', 1800000, '', 1, 'admin@admin.com', '9VIavGbaXBb4NoLrEraz0xhGyXRi8aOnbBtOxXEP', NULL, NULL),
(6, 35, 'Almira Dress', 'sku_tt_1', '', 800, '', 1, 'admin@admin.com', '9VIavGbaXBb4NoLrEraz0xhGyXRi8aOnbBtOxXEP', NULL, NULL),
(7, 30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 'sku_dh_2', '', 1161, '', 1, '', '8FBBo32jxiJzOeLk3xprcdU4nJo3qoUAwW4Hh5xW', NULL, NULL),
(8, 27, 'NIKE ZOOM WINFLO 6 \'COOL GREY\'', 'sku_giay_4', '', 6240000, '', 1, '', '8FBBo32jxiJzOeLk3xprcdU4nJo3qoUAwW4Hh5xW', NULL, NULL),
(9, 30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 'sku_dh_2', '', 1161, '', 1, '', 'GYhmcYTczPzQ1P5LznDdRJEYuzHkQKKlc7DfpDQv', NULL, NULL),
(10, 33, 'SEIKO SRPD85K1 – NAM – AUTOMATIC (TỰ ĐỘNG) – DÂY VẢI', 'sku_dh_5', '', 4800000, '', 1, '', 'GYhmcYTczPzQ1P5LznDdRJEYuzHkQKKlc7DfpDQv', NULL, NULL),
(13, 30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 'sku_dh_2', '', 1161, '', 1, '', 'JUVZYUUMDK6DI7Z82XOSYmyNMqovYSJtCdhpGoU4', NULL, NULL),
(14, 39, 'Áo Thun Nam ngắn tay An Phước - ATH000491', 'KL-tt-1', '', 1800000, '', 1, 'chau@gmail.com', 'K2ozAXZ1tK6JZ75kjY1he3GZH8gNeCsT7WIjuRBB', NULL, NULL),
(15, 37, 'SƠMI CROP LINEN NGẮN TAY', 'sku_tt_3', '', 1000000, '', 1, 'chau@gmail.com', 'K2ozAXZ1tK6JZ75kjY1he3GZH8gNeCsT7WIjuRBB', NULL, NULL),
(16, 36, 'Vera Rose Dress', 'sku_tt_2', '', 720, '', 1, 'chau@gmail.com', 'K2ozAXZ1tK6JZ75kjY1he3GZH8gNeCsT7WIjuRBB', NULL, NULL),
(17, 33, 'SEIKO SRPD85K1 – NAM – AUTOMATIC (TỰ ĐỘNG) – DÂY VẢI', 'sku_dh_5', '', 4800000, '', 1, '', 'x4nY8DOWvt8cWYPV4biddeMZa0r3v5kyzqy9f16Q', NULL, NULL),
(18, 12, 'Sản phẩm ánh sáng 3', 'KL-AS-3', '', 810000, '', 1, '', 'VSwqApfUX3zcyrUskn7lLTqv9U8oQfLpLyWShQk3', NULL, NULL),
(19, 23, 'YEEZY BOOST 700 ANALOG', 'sku_giay_1', '', 90000, '', 1, '', 'x4nY8DOWvt8cWYPV4biddeMZa0r3v5kyzqy9f16Q', NULL, NULL),
(20, 27, 'NIKE ZOOM WINFLO 6 \'COOL GREY\'', 'sku_giay_4', '', 6240000, '', 1, '', 'x4nY8DOWvt8cWYPV4biddeMZa0r3v5kyzqy9f16Q', NULL, NULL),
(21, 36, 'Vera Rose Dress', 'sku_tt_2', '', 720, '', 1, '', 'DXHMYalFJYoXWyBNkf9ttywmscxXys0BDiHUwtzA', NULL, NULL),
(22, 35, 'Almira Dress', 'sku_tt_1', '', 800, '', 1, '', 'DXHMYalFJYoXWyBNkf9ttywmscxXys0BDiHUwtzA', NULL, NULL),
(23, 30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 'sku_dh_2', '', 1161, '', 2, '', 'TxIjxggGWuEWmu0ddkdKguxUXt5ukyRAUIYNs9hZ', NULL, NULL),
(24, 30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 'sku_dh_2', '', 1161, '', 1, '', 'lyd545QITRORBWfcqdIWM2vUXh3p1aFQ79HbJTBc', NULL, NULL),
(25, 39, 'Áo Thun Nam ngắn tay An Phước - ATH000491', 'KL-tt-1', '', 1800000, '', 1, '', 'lyd545QITRORBWfcqdIWM2vUXh3p1aFQ79HbJTBc', NULL, NULL),
(26, 30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 'sku_dh_2', '', 1161, '', 1, '', 'qVC0N8TWRmpLMVpDC1oeI8MI9Z9iZKqrIz3OO7HR', NULL, NULL),
(27, 36, 'Vera Rose Dress', 'sku_tt_2', '', 720, '', 1, '', 'qVC0N8TWRmpLMVpDC1oeI8MI9Z9iZKqrIz3OO7HR', NULL, NULL),
(28, 37, 'SƠMI CROP LINEN NGẮN TAY', 'sku_tt_3', '', 1000000, '', 1, '', 's7J9PfFe9HRPcSyhuzFtc6N3esIjkCHdTqkYefUg', NULL, NULL),
(29, 30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 'sku_dh_2', '', 1161, '', 1, '', 'qF0Yd1cMVeJqZaZJnEgPTrheqpawjOtyM3LCAVLb', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) UNSIGNED DEFAULT '0',
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `parent_id`, `featured`, `created_at`, `updated_at`, `is_active`, `image`) VALUES
(69, 'Thời trang', 'Các mẫu hiện đại về thời trang của chúng tôi', NULL, 1, '2021-04-20 20:36:33', '2021-05-08 03:29:30', 1, 'Thời_trang.jpg'),
(72, 'Giày', 'Các loại giày mới nhất luôn được cập nhật', NULL, 1, '2021-04-23 11:55:52', '2021-05-04 09:41:42', 1, 'Giày.jpg'),
(73, 'Trang sức', 'Trang sức đủ màu sắc,đủ kiểu', NULL, 0, '2021-05-01 09:50:48', '2021-05-03 03:23:27', 1, 'Trang_sức.jpg'),
(74, 'Đồng hồ', 'Đồng hồ uy tín', NULL, 1, '2021-05-01 09:51:32', '2021-05-08 03:28:05', 1, 'Đồng_hồ.jpg'),
(75, 'Thời trang nữ', 'Thời trang nữ cao cấp', 69, 1, '2021-05-03 09:17:25', '2021-05-03 09:17:25', 1, 'Thời_trang_nữ.jpg'),
(76, 'Quần áo', 'Quần áo thời trang nữ cao cấp', 75, 1, '2021-05-03 09:18:29', '2021-05-03 09:18:29', 1, 'Quần_áo.jpg'),
(77, 'Túi xách nữ', 'Túi xách nữ cao cấp', 75, 1, '2021-05-03 09:19:52', '2021-05-03 09:19:52', 1, 'Túi_xách_nữ.jpg'),
(78, 'Thời trang nam', 'Thời trang nam cao cấp', 69, 1, '2021-05-03 09:20:28', '2021-05-03 09:20:28', 1, NULL),
(87, 'Thể thao', NULL, NULL, 0, '2021-05-04 01:30:55', '2021-05-04 01:30:55', 0, NULL),
(91, 'test', NULL, NULL, 0, '2021-05-04 01:37:54', '2021-05-04 01:43:13', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_features`
--

CREATE TABLE `category_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_type` tinyint(4) NOT NULL COMMENT '1 => text, 2 => color',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_features`
--

INSERT INTO `category_features` (`id`, `field_title`, `field_type`, `category_id`, `created_at`, `updated_at`) VALUES
(119, 'L', 1, 72, '2021-05-08 00:31:10', '2021-05-08 00:31:10'),
(120, 'M', 1, 72, '2021-05-08 00:31:10', '2021-05-08 00:31:10'),
(121, 'Blue', 2, 72, '2021-05-08 00:31:10', '2021-05-08 00:31:10'),
(122, 'XL', 1, 72, '2021-05-08 00:31:10', '2021-05-08 00:31:10'),
(123, 'Yellow', 2, 72, '2021-05-08 00:31:10', '2021-05-08 00:31:10'),
(124, 'Red', 2, 72, '2021-05-08 00:31:10', '2021-05-08 00:31:10'),
(125, 'XXLL', 1, 72, '2021-05-08 00:31:10', '2021-05-08 00:31:10'),
(126, 'Green', 2, 72, '2021-05-08 00:31:10', '2021-05-08 00:31:10'),
(127, 'Black', 2, 72, '2021-05-08 00:31:10', '2021-05-08 00:31:10'),
(128, 'L', 1, 74, '2021-05-08 03:28:05', '2021-05-08 03:28:05'),
(129, 'M', 1, 74, '2021-05-08 03:28:05', '2021-05-08 03:28:05'),
(130, 'K', 1, 74, '2021-05-08 03:28:05', '2021-05-08 03:28:05'),
(131, 'XL', 1, 74, '2021-05-08 03:28:05', '2021-05-08 03:28:05'),
(132, 'Red', 2, 74, '2021-05-08 03:28:05', '2021-05-08 03:28:05'),
(133, 'Yellow', 2, 74, '2021-05-08 03:28:05', '2021-05-08 03:28:05'),
(134, 'Pink', 2, 74, '2021-05-08 03:28:05', '2021-05-08 03:28:05'),
(135, 'M', 1, 69, '2021-05-08 03:29:31', '2021-05-08 03:29:31'),
(136, 'L', 1, 69, '2021-05-08 03:29:31', '2021-05-08 03:29:31'),
(137, 'K', 1, 69, '2021-05-08 03:29:31', '2021-05-08 03:29:31'),
(138, 'Red', 2, 69, '2021-05-08 03:29:31', '2021-05-08 03:29:31'),
(139, 'Yellow', 2, 69, '2021-05-08 03:29:31', '2021-05-08 03:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `cat_news`
--

CREATE TABLE `cat_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cat_news`
--

INSERT INTO `cat_news` (`id`, `title`, `description`, `parent_id`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Danh mục tin tức 2', 'mô tả danh mục tin tức 2', NULL, 'Danh_mục_tin_tức_2.jpg', 1, '2021-05-25 09:02:09', '2021-05-25 09:02:09'),
(4, 'Danh mục tin tức 3', 'mô tả danh mục tin tức 3', NULL, 'Danh_mục_tin_tức_3.jpg', 1, '2021-05-25 09:05:08', '2021-05-27 03:24:09'),
(5, 'Danh mục tin tức 4', 'mô tả danh mục tin tức 4', NULL, 'Danh_mục_tin_tức_4.jpg', 1, '2021-05-25 09:06:52', '2021-05-25 09:06:52'),
(6, 'Danh mục tin tức 2.1', 'mô tả danh mục tin tức 2.1', 2, NULL, 1, '2021-05-26 11:28:59', '2021-05-26 11:28:59'),
(7, 'Danh mục tin tức 2.2', 'mô tả danh mục 2.2', 2, NULL, 1, '2021-05-26 11:29:27', '2021-05-26 11:29:27'),
(8, 'Danh mục tin tức 2.1.1', 'mô tả danh mục 2.1.1', 6, NULL, 1, '2021-05-26 11:29:58', '2021-05-26 11:29:58'),
(9, 'Danh mục tin tức 5', NULL, NULL, NULL, 1, '2021-05-26 11:30:20', '2021-05-26 11:30:20'),
(10, 'Giới thiệu', NULL, NULL, NULL, 1, '2021-05-26 11:30:33', '2021-05-28 10:36:46'),
(11, 'Danh mục tin tức 3.1', NULL, 4, NULL, 1, '2021-05-26 21:09:08', '2021-05-26 21:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TP HCM', NULL, NULL),
(2, 'Hà Nội', NULL, NULL),
(3, 'Hải Phòng', NULL, NULL),
(4, 'Đà Nẵng', NULL, NULL),
(5, 'An Giang', NULL, NULL),
(6, 'Bà Rịa - Vũng Tàu', NULL, NULL),
(7, 'Bắc Giang', NULL, NULL),
(8, 'Bắc Kạn', NULL, NULL),
(9, 'Bạc Liêu', NULL, NULL),
(10, 'Bắc Ninh', NULL, NULL),
(11, 'Bến Tre', NULL, NULL),
(12, 'Bình Định', NULL, NULL),
(13, 'Bình Dương', NULL, NULL),
(14, 'Bình Phước', NULL, NULL),
(15, 'Bình Thuận', NULL, NULL),
(16, 'Cà Mau', NULL, NULL),
(17, 'Cao Bằng', NULL, NULL),
(18, 'Cần Thơ', NULL, NULL),
(19, 'Đắk Lắk', NULL, NULL),
(20, 'Đắk Nông', NULL, NULL),
(21, 'Điện Biên', NULL, NULL),
(22, 'Đồng Nai', NULL, NULL),
(23, 'Đồng Tháp', NULL, NULL),
(24, 'Gia Lai', NULL, NULL),
(25, 'Hà Giang', NULL, NULL),
(26, 'Hà Nam', NULL, NULL),
(27, 'Hà Tĩnh', NULL, NULL),
(28, 'Hải Dương', NULL, NULL),
(29, 'Hậu Giang', NULL, NULL),
(30, 'Hòa Bình', NULL, NULL),
(31, 'Hưng Yên', NULL, NULL),
(32, 'Khánh Hòa', NULL, NULL),
(33, 'Kiên Giang', NULL, NULL),
(34, 'Kon Tum', NULL, NULL),
(35, 'Lai Châu', NULL, NULL),
(36, 'Lâm Đồng', NULL, NULL),
(37, 'Lạng Sơn', NULL, NULL),
(38, 'Lào Cai', NULL, NULL),
(39, 'Long An', NULL, NULL),
(40, 'Nam Định', NULL, NULL),
(41, 'Nghệ An', NULL, NULL),
(42, 'Ninh Bình', NULL, NULL),
(43, 'Ninh Thuận', NULL, NULL),
(44, 'Phú Thọ', NULL, NULL),
(45, 'Quảng Bình', NULL, NULL),
(46, 'Quảng Nam', NULL, NULL),
(47, 'Quảng Ngãi', NULL, NULL),
(48, 'Quảng Ninh', NULL, NULL),
(49, 'Quảng Trị', NULL, NULL),
(50, 'Sóc Trăng', NULL, NULL),
(51, 'Sơn La', NULL, NULL),
(52, 'Tây Ninh', NULL, NULL),
(53, 'Thái Bình', NULL, NULL),
(54, 'Thái Nguyên', NULL, NULL),
(55, 'Thanh Hóa', NULL, NULL),
(56, 'Thừa Thiên Huế', NULL, NULL),
(57, 'Tiền Giang', NULL, NULL),
(58, 'Trà Vinh', NULL, NULL),
(59, 'Tuyên Quang', NULL, NULL),
(60, 'Vĩnh Long', NULL, NULL),
(61, 'Vĩnh Phúc', NULL, NULL),
(62, 'Yên Bái', NULL, NULL),
(63, 'Phú Yên', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mobile`, `email`, `message`, `created_at`, `updated_at`, `status`) VALUES
(3, 'test', '9090090909', 'tranvantuan@gmail.com', 'fdafdad', '2021-05-29 21:18:04', '2021-05-29 21:18:04', 0),
(4, 'ki la', '09-0', 'dokhaclam@gmail.com', 'tetetetete', NULL, NULL, 0),
(5, 'tran van a', '543543', 'tranvan@gamil.com', 'aaaaaaaaaaaaaaa', NULL, NULL, 0),
(6, 'Lam Do', '0909090789', 'dokhaclam@gmail.com', 'fdafda', '2021-06-03 12:07:06', '2021-06-03 12:07:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `is_active`, `created_at`, `updated_at`) VALUES
(4, '20%', 20, 'Phần trăm', '2021-05-17', 1, '2021-05-11 10:21:21', '2021-05-11 22:56:55'),
(5, 'fix020', 80, 'Cố định', '2021-05-26', 1, '2021-05-11 10:22:03', '2021-05-11 10:22:03'),
(6, '10%', 10, 'Phần trăm', '2021-06-22', 1, '2021-05-11 10:22:31', '2021-05-17 21:55:57'),
(7, '789', 900, 'Cố định', '2021-06-24', 1, '2021-05-11 10:23:05', '2021-05-11 22:55:55'),
(8, '456', 10, 'Cố định', '2021-05-19', 1, '2021-05-11 10:51:18', '2021-05-11 22:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `mobile`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 2, 'dokhanhkhanh@gmail.com', 'do chi cuong', '456 lac long quan sua', 'Bạc Liêu', '11 sua', '7676767676 sua', NULL, '2021-05-15 05:29:31', '2021-05-18 10:19:57'),
(2, 3, 'dokhanhthy@gmail.com.sua', 'Chau sua', '456 lac long quan sua', 'Hà Nội', '11 sua', '0906077097 sua', NULL, '2021-05-18 03:38:38', '2021-05-31 10:58:47'),
(3, 4, 'chau@gmail.com.sua', 'minh chau sua', '345 lac long quan sua', 'Hà Nội', '11 sua', '0909090 sua', NULL, '2021-06-02 09:15:21', '2021-06-02 09:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_15_074346_create_categories_table', 1),
(5, '2021_04_15_074445_create_category_features_table', 1),
(6, '2021_04_15_074458_create_brands_table', 1),
(7, '2021_04_15_074509_create_products_table', 1),
(8, '2021_04_15_074520_create_product_gallery_table', 1),
(9, '2021_04_15_074532_create_product_features_table', 1),
(10, '2021_04_15_074547_create_shopping_cart_table', 1),
(11, '2021_04_15_074600_create_shipping_addresses_table', 1),
(12, '2021_04_15_074611_create_payment_methods_table', 1),
(13, '2021_04_15_074625_create_orders_table', 1),
(14, '2021_04_15_075024_create_order_details_table', 1),
(15, '2021_04_15_075358_add_is_super_admin_to_users_table', 1),
(16, '2021_04_15_081910_create_sliders_table', 1),
(17, '2021_04_15_082817_create_tags_table', 1),
(18, '2021_04_15_083020_create_product_tag_table', 1),
(19, '2021_04_15_154917_create_reviews_table', 1),
(20, '2021_04_15_180349_create_permission_tables', 2),
(21, '2021_04_15_181942_create_settings_table', 3),
(22, '2021_04_17_083013_add_column_to_users_table', 4),
(23, '2021_04_17_092235_add_column_image_to_users_table', 5),
(24, '2021_04_20_174144_add_column_is_active_to_categories_tables', 6),
(25, '2021_04_22_064327_add_column_is_active_to_brands_table', 7),
(26, '2021_04_22_174304_add_column_is_active_to_sliders_table', 8),
(27, '2021_04_22_174443_add_column_names_to_sliders_table', 9),
(28, '2021_04_23_160522_add_colunm_image_to_categories_table', 10),
(29, '2021_04_23_160615_add_colunm_is_active_to_settings_table', 10),
(30, '2021_04_23_170446_add_colunm_type_to_settings_table', 11),
(31, '2021_04_24_074228_add_column_is_active_to_products_table', 12),
(32, '2021_04_24_095459_add_column_image_to_products_table', 13),
(33, '2021_04_27_171122_create_coupon_table', 14),
(34, '2021_05_01_100133_add_column_namefour_to_sliders_table', 15),
(35, '2021_05_06_082553_add_column_new_to_products_table', 16),
(36, '2021_05_06_162729_add_column_additional_to_products_table', 17),
(37, '2021_05_07_075039_create_cart_table', 18),
(38, '2021_05_13_172157_add_column_info_address_to_users_table', 19),
(39, '2021_05_13_173237_add_column_info_address_to_users_table', 20),
(40, '2021_05_13_173711_add_column_mobile_to_users_table', 21),
(41, '2021_05_13_193054_create_city_table', 22),
(42, '2021_05_14_160953_create_delivery_address_table', 23),
(43, '2021_05_17_050030_add_column_extra_to_orders_table', 24),
(44, '2021_05_17_051803_create_orders_products_table', 24),
(45, '2021_05_17_100040_add_column_color_to_orders_products_table', 25),
(46, '2021_05_18_102058_add_column_ma_order_to_orders_table', 26),
(47, '2021_05_19_111035_add_column_rating_to_products_table', 27),
(48, '2021_05_19_124642_add_column_status_to_reviews_table', 28),
(49, '2021_05_25_103953_create_cat_news_controllers_table', 29),
(50, '2021_05_25_171301_create_news_table', 30),
(51, '2021_05_26_093117_create_taggable_table', 31),
(52, '2021_05_28_051539_create_contacts_table', 32),
(53, '2021_05_30_173850_add_column_noi_bat_to_products_table', 33),
(54, '2021_05_30_174008_add_column_product_id_to_orders_table', 33),
(55, '2021_06_03_123342_add_column_status_to_contacts_table', 34),
(56, '2021_06_03_174731_create_newsletters_table', 35),
(57, '2021_06_03_184827_add_column_status_to_newsletters_table', 36),
(58, '2021_06_06_182727_change_type_price_column_products_table', 37),
(59, '2021_06_07_055112_change_default_rating_products_table', 38),
(60, '2021_06_07_055754_change_default_rating__one_products_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cat_news_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `user_id`, `cat_news_id`, `title`, `description`, `content`, `image_path`, `image_name`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 'tin tức thuộc danh mục 3', 'mô tả danh mục tin tức 3', '<p>Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna. Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus.</p>', NULL, 'tin_tức_thuộc_danh_mục_3.jpg', 0, '2021-05-25 23:03:27', '2021-05-26 21:45:25'),
(4, 1, 2, 'tin tức thuộc danh mục 2', 'mô tả dang cập nhật', '<p>nội dung đang cập nhật</p>', NULL, 'tin_tức_thuộc_danh_mục_2.jpg', 1, '2021-05-26 02:24:52', '2021-05-26 02:24:52'),
(5, 1, 2, 'test tag', 'Cơ hội đầu tiên của trận đấu thuộc về MU ngay ở phút thứ 7. Từ một pha tấn công bên cánh trái, Rashford đi bóng xâm nhập vòng cấm trước khi nhả về tuyến hai cho McTominay thực hiện cú sút xa đi chệch khung thành của Villarreal.', '<p>Cơ hội đầu ti&ecirc;n của trận đấu thuộc về MU ngay ở ph&uacute;t thứ 7. Từ một pha tấn c&ocirc;ng b&ecirc;n c&aacute;nh tr&aacute;i, Rashford đi b&oacute;ng x&acirc;m nhập v&ograve;ng cấm&nbsp;trước khi nhả về tuyến hai cho McTominay thực hiện c&uacute; s&uacute;t xa đi chệch khung th&agrave;nh của Villarreal.</p>\r\n<p>Sau hơn 10 ph&uacute;t đầu bị l&eacute;p vế, Villarreal v&ugrave;ng l&ecirc;n mạnh mẽ v&agrave; kh&ocirc;ng ngần ngại uy hiếp khung th&agrave;nh của MU. Ph&uacute;t 23, Bacca tạt b&oacute;ng kiểu rabona đầy ngẫu hứng v&agrave;o trong cho Pau Torres đ&aacute;nh đầu đi vọt x&agrave; ngang. V&agrave; chỉ 6 ph&uacute;t sau, &ldquo;T&agrave;u ngầm v&agrave;ng&rdquo; đ&atilde; t&igrave;m được b&agrave;n thắng mở tỷ số. Parejo treo b&oacute;ng kh&oacute; chịu v&agrave;o v&ograve;ng cấm tạo điều kiện cho&nbsp;Moreno chọn điểm rơi ch&iacute;nh x&aacute;c trước khi&nbsp;dứt điểm tung lưới MU.</p>\r\n<div id=\"ADS_159_15s\" class=\"txtCent\">\r\n<div id=\"ADS_159_15stxtBnrHor\"></div>\r\n</div>\r\n<p>Bị dẫn b&agrave;n, MU đẩy cao đội h&igrave;nh l&ecirc;n tấn c&ocirc;ng nhưng những đường chuyền cuối c&ugrave;ng của &ldquo;Quỷ đỏ&rdquo; đều dễ d&agrave;ng bị h&agrave;ng thủ của Villarreal h&oacute;a giải. Cho đến hết hiệp 1, MU thậm ch&iacute; c&ograve;n kh&ocirc;ng tung ra nổi một c&uacute; dứt điểm ra nguy hiểm. T&igrave;nh huống đ&aacute;ng ch&uacute; &yacute; nhất của &ldquo;Quỷ đỏ&rdquo; đến ở những ph&uacute;t b&ugrave; giờ,&nbsp;nỗ lực căng ngang của Greenwood khiến Albiol l&oacute;ng ng&oacute;ng ph&aacute; b&oacute;ng về khung th&agrave;nh&nbsp;nhưng thủ m&ocirc;n Rulli đ&atilde; chơi tập trung.</p>\r\n<p>Sau giờ nghỉ giải lao, MU vẫn loay hoay trong việc t&igrave;m đường v&agrave;o khung th&agrave;nh của Villarreal. Nhưng trong t&igrave;nh thế kh&oacute; khăn, &ldquo;Quỷ đỏ&rdquo; lại bất ngờ t&igrave;m được b&agrave;n gỡ&nbsp;đầy may mắn ở ph&uacute;t 55. Rashford dứt điểm từ ngo&agrave;i v&ograve;ng cấm v&ocirc; t&igrave;nh tạo ra t&igrave;nh huống lộn xộn trong v&ograve;ng cấm v&agrave; Cavani c&oacute; mặt đ&uacute;ng l&uacute;c đ&uacute;ng chỗ để dễ d&agrave;ng đưa b&oacute;ng v&agrave;o lưới Villarreal.</p>\r\n<p align=\"center\"><img class=\"news-image initial loaded\" src=\"https://cdn.24h.com.vn/upload/2-2021/images/2021-05-27/Ket-qua-Europa-League-Villarreal---MU-5-1622067387-144-width660height396.jpg\" alt=\"Kết quả chung kết Europa League, Villarreal - MU: 120 ph&uacute;t nghẹt thở, người h&ugrave;ng chấm lu&acirc;n lưu - 3\" data-original=\"https://cdn.24h.com.vn/upload/2-2021/images/2021-05-27/Ket-qua-Europa-League-Villarreal---MU-5-1622067387-144-width660height396.jpg\" data-was-processed=\"true\" /></p>\r\n<p class=\"img_chu_thich_0407\">Cavani gỡ h&ograve;a cho MU trong hiệp 2</p>\r\n<p>B&agrave;n thắng gỡ h&ograve;a gi&uacute;p MU thi đấu hưng phấn hơn v&agrave; li&ecirc;n tiếp uy hiếp khung th&agrave;nh của Villarreal nhưng kh&ocirc;ng c&oacute; th&ecirc;m b&agrave;n thắng n&agrave;o được ghi. H&ograve;a nhau 1-1 sau 90 ph&uacute;t, hai đội đ&agrave;nh phải bước v&agrave;o hiệp phụ để ph&acirc;n định thắng thua.</p>\r\n<p>Tại đ&acirc;y, tốc độ trận đấu bị&nbsp;giảm xuống r&otilde; rệt&nbsp;bởi&nbsp;cả MU v&agrave; Villarreal đều thi đấu thận trọng. T&igrave;nh huống đ&aacute;ng ch&uacute; &yacute; nhất đến ở ph&uacute;t 112 khi b&oacute;ng dường như đ&atilde; chạm v&agrave;o tay Fred sau pha dứt điểm của Moreno nhưng trọng t&agrave;i quyết định kh&ocirc;ng c&oacute; penalty d&agrave;nh cho &ldquo;T&agrave;u ngầm v&agrave;ng&rdquo;. Kết th&uacute;c hai hiệp phụ, hai đội tiếp tục bất ph&acirc;n thắng bại.</p>\r\n<p>Loạt đ&aacute; lu&acirc;n lưu chứng kiến c&aacute;c cầu thủ của cả hai b&ecirc;n thực hiện th&agrave;nh c&ocirc;ng tới&nbsp;10 lượt s&uacute;t. Bước ngoặt chỉ đến ở lượt s&uacute;t thứ&nbsp;11, thủ m&ocirc;n Rulli thự hiện th&agrave;nh c&ocirc;ng nhưng De Gea lại&nbsp;kh&ocirc;ng thể đ&aacute;nh bại được người đồng nghiệp b&ecirc;n kia chiến tuyến. Thua chung cuộc 10-11 tr&ecirc;n chấm lu&acirc;n lưu, MU đ&agrave;nh nh&igrave;n Villarreal n&acirc;ng cao chức v&ocirc; địch Europa League.</p>', NULL, 'test_tag.jpg', 1, '2021-05-26 03:58:31', '2021-05-26 21:39:37'),
(6, 1, 10, 'Giới Thiệu', 'Đang cập nhật', '<section class=\"about-section\">\r\n<div class=\"container\">\r\n<h2 class=\"title mb-lg-9\">Nội dung đang cập nhật</h2>\r\n</div>\r\n</section>', NULL, 'Giới_Thiệu.jpg', 1, '2021-05-28 10:36:12', '2021-06-04 04:37:00'),
(7, 1, 9, 'test tin tức', 'mô tả  đang cập nhật', '<p>nội dung đang cập nhật</p>', NULL, NULL, 1, '2021-06-04 04:39:48', '2021-06-04 04:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`, `status`) VALUES
(1, 'quyen@gmail.com', '2021-06-03 12:11:34', '2021-06-03 12:11:34', 0),
(3, 'thy@gmail.com', '2021-06-03 21:29:36', '2021-06-03 21:29:36', 0),
(4, 'chicuong@gmail.com', '2021-06-03 21:30:07', '2021-06-03 21:38:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status_message` text COLLATE utf8mb4_unicode_ci,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_price` decimal(18,2) DEFAULT NULL,
  `paypal_order_identifier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_given_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_payer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charges` double(8,2) DEFAULT NULL,
  `coupon_code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` double(8,2) DEFAULT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_order` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `status_message`, `payment_method_id`, `shipping_address_id`, `total_price`, `paypal_order_identifier`, `paypal_email`, `paypal_given_name`, `paypal_payer_id`, `created_at`, `updated_at`, `user_email`, `name`, `address`, `city`, `state`, `mobile`, `postal_code`, `shipping_charges`, `coupon_code`, `coupon_amount`, `payment_method`, `ma_order`, `product_id`) VALUES
(1, 4, 'Đang xử lý', NULL, NULL, NULL, '1800720.00', NULL, NULL, NULL, NULL, '2021-09-03 04:34:58', '2021-09-03 04:34:58', 'chau@gmail.com', 'chau le', '346 le van quoi', 'TP HCM', '11', '7676767676', NULL, NULL, '', 0.00, 'Sau khi nhận hàng', 'KL-o8jalHt3hcx', NULL),
(2, 4, 'Đang xử lý', NULL, NULL, NULL, '1002400.00', NULL, NULL, NULL, NULL, '2021-09-03 04:37:10', '2021-09-03 04:37:10', 'chau@gmail.com', 'chau le', '346 le van quoi', 'TP HCM', '11', '7676767676', NULL, NULL, '', 0.00, 'Sau khi nhận hàng', 'KL-AG68UYbyikX', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(18,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`, `product_color`) VALUES
(1, 1, 4, 39, 'KL-tt-1', 'Áo Thun Nam ngắn tay An Phước - ATH000491', '', 1800000.00, 1, '2021-09-03 04:34:58', '2021-09-03 04:34:58', ''),
(2, 1, 4, 36, 'sku_tt_2', 'Vera Rose Dress', '', 720.00, 1, '2021-09-03 04:34:58', '2021-09-03 04:34:58', ''),
(3, 2, 4, 26, 'sku_giay_3', 'FALCON PINK PURPLE', '', 1000000.00, 1, '2021-09-03 04:37:10', '2021-09-03 04:37:10', ''),
(4, 2, 4, 23, 'sku_giay_1', 'YEEZY BOOST 700 ANALOG', 'M', 800.00, 3, '2021-09-03 04:37:10', '2021-09-03 04:37:10', 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', 'paypal', NULL, NULL),
(2, 'Pay on delivery', 'cash', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create_product', 'web', '2021-04-15 11:33:01', '2021-04-15 11:33:01'),
(2, 'edit_product', 'web', '2021-04-15 11:33:01', '2021-04-15 11:33:01'),
(3, 'delete_product', 'web', '2021-04-15 11:33:01', '2021-04-15 11:33:01'),
(4, 'list_product', 'web', '2021-04-15 11:33:01', '2021-04-15 11:33:01'),
(5, 'create_slider', 'web', '2021-04-15 11:33:01', '2021-04-15 11:33:01'),
(6, 'edit_slider', 'web', '2021-04-15 11:33:01', '2021-04-15 11:33:01'),
(7, 'delete_slider', 'web', '2021-04-15 11:33:02', '2021-04-15 11:33:02'),
(8, 'list_slider', 'web', '2021-04-15 11:33:02', '2021-04-15 11:33:02'),
(9, 'create_category', 'web', '2021-04-15 11:33:02', '2021-04-15 11:33:02'),
(10, 'edit_category', 'web', '2021-04-15 11:33:02', '2021-04-15 11:33:02'),
(11, 'delete_category', 'web', '2021-04-15 11:33:02', '2021-04-15 11:33:02'),
(12, 'list_category', 'web', '2021-04-15 11:33:02', '2021-04-15 11:33:02'),
(13, 'edit_comment', 'web', '2021-04-16 22:26:40', '2021-04-16 22:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `price` bigint(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_start_date` date DEFAULT NULL,
  `discount_end_date` date DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new` tinyint(4) NOT NULL DEFAULT '1',
  `additional` text COLLATE utf8mb4_unicode_ci,
  `pro_total_rating` int(11) NOT NULL DEFAULT '1' COMMENT 'Tổng số đánh giá',
  `pro_total_number` int(11) NOT NULL DEFAULT '1' COMMENT 'Tổng số đánh giá',
  `noi_bat` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `amount`, `discount`, `discount_start_date`, `discount_end_date`, `created_by`, `category_id`, `brand_id`, `product_code`, `featured`, `created_at`, `updated_at`, `is_active`, `image`, `new`, `additional`, `pro_total_rating`, `pro_total_number`, `noi_bat`) VALUES
(22, 'Mặt dây chuyền Vàng 18K đính đá CZ PNJ XMXMY000283', '<div class=\"pnj-title main-title\">\r\n<h2>Mặt d&acirc;y chuyền V&agrave;ng 18K đ&iacute;nh đ&aacute; CZ PNJ</h2>\r\n</div>\r\n<div class=\"pnj-block-description-wrapper\">\r\n<div class=\"pnj-block-description\">\r\n<p>H&atilde;y c&ugrave;ng kh&aacute;m ph&aacute; n&eacute;t đẹp duy&ecirc;n d&aacute;ng v&agrave; đầy sự quyến rũ của&nbsp;<a href=\"https://www.pnj.com.vn/day-chuyen/mat-day-chuyen/mat-day-chuyen-vang/\">mặt d&acirc;y chuyền</a>&nbsp;v&agrave;ng 18K đến từ thương hiệu trang sức PNJ. Sở hữu thiết kế với c&aacute;c chi tiết đ&iacute;nh đ&aacute; được lồng gh&eacute;p với nhau một c&aacute;ch tinh tế tr&ecirc;n chất liệu v&agrave;ng, chiếc mặt d&acirc;y chuyền v&agrave;ng PNJ t&ocirc;n vinh vẻ đẹp hiện đại v&agrave; sang trọng của phụ nữ Việt cũng như thể hiện sự đẳng cấp cho chủ sở hữu.</p>\r\n</div>\r\n</div>', 800, 56, 4, '2021-04-26', '2021-04-30', 1, 73, 2, 'sku_das_1', 1, '2021-04-26 04:27:04', '2021-05-02 05:30:51', 1, 'Mặt_dây_chuyền_Vàng_18K_đính_đá_CZ_PNJ_XMXMY000283.png', 1, NULL, 0, 0, 1),
(23, 'YEEZY BOOST 700 ANALOG', '<p>&bull; Đừng ng&acirc;m gi&agrave;y trong nước qu&aacute; l&acirc;u. Gi&agrave;y kh&aacute;c với quần &aacute;o v&igrave; n&oacute; c&oacute; keo d&aacute;n giữa th&acirc;n gi&agrave;y v&agrave; đế gi&agrave;y. Phần keo d&aacute;n n&agrave;y kh&ocirc;ng th&iacute;ch bị ng&acirc;m nước đ&acirc;u. M&igrave;nh thường d&ugrave;ng v&ograve;i nước xịt thẳng v&agrave;o bề mặt gi&agrave;y để tống khứ vết bẩn, nhanh gọn lẹ.<br />&bull; Hạn chế d&ugrave;ng x&agrave; b&ocirc;ng. Trừ khi gi&agrave;y qu&aacute; dơ d&ugrave;ng nước kh&ocirc;ng sạch, bạn mới n&ecirc;n sử dụng x&agrave; b&ocirc;ng pha lo&atilde;ng.<br />&bull; D&ugrave;ng giấy b&aacute;o nh&eacute;t v&ocirc; gi&agrave;y sau khi giặt xong. Bạn c&oacute; để &yacute; mỗi lần mua gi&agrave;y về đều thấy c&oacute; giấy nh&eacute;t trong gi&agrave;y kh&ocirc;ng? Mục đ&iacute;ch của n&oacute; l&agrave; để giữ form gi&agrave;y. V&igrave; thế, mỗi lần giặt xong, bạn n&ecirc;n kiếm giấy b&aacute;o nh&eacute;t v&ocirc; gi&agrave;y rồi mới đem phơi.</p>\r\n<p>&nbsp;</p>', 100000, 100, 10, '2021-05-02', '2021-05-27', 1, 72, 5, 'sku_giay_1', 1, '2021-05-02 03:03:22', '2021-05-20 02:39:57', 1, 'YEEZY_BOOST_700_ANALOG.jpg', 1, NULL, 4, 13, 1),
(25, 'NMD R1.V2', '<p>đang cập nhật</p>', 9000, 55, 0, NULL, NULL, 1, 72, 5, 'sku_giay_2', 1, '2021-05-02 03:43:01', '2021-05-30 03:54:34', 1, 'NMD_R1.V2.jpg', 1, NULL, 2, 7, 1),
(26, 'FALCON PINK PURPLE', '<p>đ&acirc;ng cập nhật</p>', 1000000, 1000, 0, NULL, NULL, 1, 72, 5, 'sku_giay_3', 1, '2021-05-02 03:57:46', '2021-05-02 03:57:46', 1, 'FALCON_PINK_PURPLE.jpg', 1, NULL, 0, 0, 1),
(27, 'NIKE ZOOM WINFLO 6 \'COOL GREY\'', '<p>đang cập nhật</p>', 7800000, 90, 20, '2021-05-02', '2021-05-18', 1, 72, 2, 'sku_giay_4', 1, '2021-05-02 04:09:34', '2021-05-02 04:09:34', 1, 'NIKE_ZOOM_WINFLO_6_\'COOL_GREY\'.jpg', 1, NULL, 0, 0, 1),
(28, 'AIR FORCE 1 LX MULTI', '<p>đ&acirc;ng cập nhật</p>', 700000, 10, 0, NULL, NULL, 1, 72, 2, 'sku_giay_5', 1, '2021-05-02 04:13:04', '2021-05-02 04:13:04', 1, 'AIR_FORCE_1_LX_MULTI.jpg', 1, NULL, 0, 0, 1),
(29, 'DÂY KIM LOẠI (EF-328D-7AVUDF)', '<h2><strong>REVIEW CHI TIẾT ĐỒNG HỒ CASIO EF-328D-7AVUDF</strong></h2>\r\n<p><a href=\"https://donghohaitrieu.com/tu-khoa/casio-edifice\" target=\"_blank\" rel=\"noopener noreferrer\" data-wpel-link=\"internal\">Casio Edifice</a>&nbsp;kh&ocirc;ng c&ograve;n qu&aacute; xa lạ đối với c&aacute;c t&iacute;n đồ y&ecirc;u th&iacute;ch đồng hồ thể thao b&igrave;nh d&acirc;n. Tuy l&agrave; d&ograve;ng đồng hồ cao cấp hơn một ch&uacute;t khi ch&uacute;ng ta so s&aacute;nh với những mẫu đồng hồ kh&aacute;c của Casio nhưng mức gi&aacute; tr&ecirc;n d&ograve;ng Edifice vẫn lu&ocirc;n được giữ vững hợp l&yacute;.</p>\r\n<p>Về vẻ ngo&agrave;i của sản phẩm, bạn c&oacute; thể dễ d&agrave;ng nhận thấy Edifice mang đậm d&aacute;ng vẻ của một chiếc đồng hồ thể thao nhưng từng đường n&eacute;t dường như c&oacute; phần h&agrave;i h&ograve;a, tinh tế v&agrave; thanh lịch hơn một ch&uacute;t.</p>\r\n<p><img class=\"aligncenter lazyloaded\" src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/09/casio-nam-quartz-pin-day-kim-loai-ef-328d-7avudf-1.jpg\" alt=\"Đồng hồ Casio EF-328D-7AVUDF thay pin miễn ph&iacute; trọn đời - Ảnh 1\" width=\"728\" height=\"485\" loading=\"lazy\" data-ll-status=\"loaded\" /></p>\r\n<p><em>Đồng hồ Casio EF-328D-7AVUDF với thiết kế nam t&iacute;nh, đẹp mắt chắc chắn sẽ l&agrave; một trong những người bạn đồng h&agrave;nh kh&ocirc;ng thể thiếu của ph&aacute;i mạnh</em></p>\r\n<p>&nbsp;</p>\r\n<p>Thuộc ph&acirc;n kh&uacute;c cao cấp hơn một ch&uacute;t n&ecirc;n chắc chắn rằng c&aacute;c chất liệu tr&ecirc;n Casio EF-328D-7AVUDF đều l&agrave; c&aacute;c chất liệu tốt, được đ&aacute;nh gi&aacute; cực kỳ cao bởi c&aacute;c chuy&ecirc;n gia.</p>\r\n<p>Phi&ecirc;n bản Casio EF-328D-7AVUDF sẽ được trang bị đầy đủ&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-thach-anh-la-gi-cach-hoat-dong-dong-ho-thach-anh-ra-sao.html\" target=\"_blank\" rel=\"noopener noreferrer\" data-wpel-link=\"internal\">m&aacute;y quartz</a>,&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/12-kieu-day-dong-ho-kim-loai-noi-tieng-nhat-the-gioi.html\" target=\"_blank\" rel=\"noopener noreferrer\" data-wpel-link=\"internal\">d&acirc;y kim loại</a>,&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/kinh-cung-dong-ho-la-gi-kinh-khoang-dong-ho-la-gi.html\" target=\"_blank\" rel=\"noopener noreferrer\" data-wpel-link=\"internal\">k&iacute;nh cứng</a>, kim&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/3-cach-khac-phuc-da-quang-dong-ho-bi-yeu-ngay-tai-nha.html\" target=\"_blank\" rel=\"noopener noreferrer\" data-wpel-link=\"internal\">dạ quang</a>, c&aacute;c t&iacute;nh năng thể thao v&agrave; tất cả đều đạt chuẩn&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-chu-japan-movt-nghia-la-gi-khi-co-tren-dong-ho.html\" target=\"_blank\" rel=\"noopener noreferrer\" data-wpel-link=\"internal\">Japan Movt</a>.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>SỬ DỤNG HỌA TIẾT GUILLOCHE</strong></h3>\r\n<p>Tuy phi&ecirc;n bản&nbsp;<a href=\"https://donghohaitrieu.com/danh-muc/dong-ho-nam\" target=\"_blank\" rel=\"noopener noreferrer\" data-wpel-link=\"internal\">đồng hồ nam</a>&nbsp;Casio EF-328D-7AVUDF thuộc ph&acirc;n kh&uacute;c b&igrave;nh d&acirc;n nhưng c&oacute; vẻ Casio đ&atilde; đặt kh&aacute; nhiều t&acirc;m huyết cho sản phẩm n&agrave;y. Họ rất &lsquo;m&aacute;t tay&rsquo; khi t&iacute;ch hợp th&ecirc;m c&aacute;c họa tiết Guilloche tr&ecirc;n&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/nhan-biet-cac-kieu-mat-dong-ho-deo-tay-pho-bien-nhat-hien-nay.html\" target=\"_blank\" rel=\"noopener noreferrer\" data-wpel-link=\"internal\">mặt đồng hồ</a>.</p>\r\n<p>Guilloche lu&ocirc;n nổi tiếng l&agrave; một trong những họa tiết đồng hồ kh&aacute; thường thấy tr&ecirc;n những chiếc đồng hồ cao cấp. Từng họa tiết đều được đi&ecirc;u khắc cực kỳ tinh tế, vừa tạo được điểm nhấn lại c&oacute; thể gi&uacute;p mặt số m&agrave;u trắng trở n&ecirc;n đẹp mắt, kh&ocirc;ng c&ograve;n đơn điệu.</p>', 9000, 90, 0, NULL, NULL, 1, 74, 7, 'sku_dh_1', 1, '2021-05-02 04:53:58', '2021-05-02 04:53:58', 1, 'DÂY_KIM_LOẠI_(EF-328D-7AVUDF).jpg', 1, NULL, 0, 0, 1),
(30, 'CASIO EFR-527L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', '<p>Đồng hồ Casio EFR-527L-7AVUDF với vẻ đẹp lịch l&atilde;m từ mặt số tr&ograve;n lớn, nền trắng sang trọng, điểm nhấn l&agrave; 3 mặt đồng hồ phụ được phủ m&agrave;u đen nổi bật, d&acirc;y đeo v&acirc;n n&acirc;u nam t&iacute;nh, mạnh mẽ.</p>', 2321, 90, 50, '2021-05-10', '2021-05-31', 1, 74, 7, 'sku_dh_2', 1, '2021-05-02 05:03:33', '2021-05-02 05:03:33', 1, 'CASIO_EFR-527L-7AVUDF_–_NAM_–_QUARTZ_(PIN)_–_DÂY_DA.jpg', 1, NULL, 0, 0, 1),
(31, 'CASIO NAM – QUARTZ (PIN) – DÂY KIM LOẠI (EF-539D-1A5VUDF)', '<p>Đồng hồ nam Edifice Casio EF-539D-1A5VUDF được thiết kế mạnh mẽ với mặt số đồng hồ nền đen viền v&agrave;ng đồng c&ugrave;ng với 3 &ocirc; phụ viền v&agrave;ng đồng, chữ số vạch trắng, 6 kim chỉ v&agrave; 1 lịch ng&agrave;y.</p>', 1000000, 10, 10, NULL, NULL, 1, 74, 7, 'sku_dh_3', 1, '2021-05-02 05:09:22', '2021-05-02 05:09:22', 1, 'CASIO_NAM_–_QUARTZ_(PIN)_–_DÂY_KIM_LOẠI_(EF-539D-1A5VUDF).jpg', 1, NULL, 0, 0, 1),
(32, 'SEIKO SRPE65K1 – NAM – AUTOMATIC (TỰ ĐỘNG) – DÂY VẢI – MẶT SỐ 40MM', '<p><span style=\"font-family: \'times new roman\', times, serif;\">Mẫu Seiko SRPE65K1 phi&ecirc;n bản d&acirc;y vải phối tone m&agrave;u xanh trẻ trung năng động c&ugrave;ng với thiết kế c&aacute;c chi tiết kim chỉ c&ugrave;ng cọc vạch số được phủ dạ quang nổi bật tr&ecirc;n nền mặt số size 40mm.</span></p>', 1000000, 90, 50, '2021-04-30', '2021-05-31', 1, 74, 6, 'sku_dh_4', 1, '2021-05-02 05:16:05', '2021-05-07 03:31:05', 1, 'SEIKO_SRPE65K1_–_NAM_–_AUTOMATIC_(TỰ_ĐỘNG)_–_DÂY_VẢI_–_MẶT_SỐ_40MM.jpg', 1, NULL, 0, 0, 1),
(33, 'SEIKO SRPD85K1 – NAM – AUTOMATIC (TỰ ĐỘNG) – DÂY VẢI', '<p>Mẫu Seiko SRPD85K1 phien bản Seiko 5 với cọc chấm tr&ograve;ng trắng phủ dạ quang nổi bật tr&ecirc;n mặt số size 42,5mm, nam t&iacute;nh thời trang với mẫu d&acirc;y vải tone m&agrave;u n&acirc;u.</p>', 6000000, 80, 20, NULL, NULL, 1, 74, 6, 'sku_dh_5', 1, '2021-05-02 05:20:38', '2021-05-19 21:40:00', 1, 'SEIKO_SRPD85K1_–_NAM_–_AUTOMATIC_(TỰ_ĐỘNG)_–_DÂY_VẢI.jpg', 1, 'Đang cập nhật', 1, 4, 1),
(34, 'Vòng tay cưới Vàng trắng 14K đính ngọc trai Akoya PNJ True Love PAXMW000018', '<p>Đang cap nhật</p>', 1000000, 90, 0, NULL, NULL, 1, 73, 8, 'sku_ts_2', 1, '2021-05-02 05:37:38', '2021-05-02 05:37:38', 1, 'Vòng_tay_cưới_Vàng_trắng_14K_đính_ngọc_trai_Akoya_PNJ_True_Love_PAXMW000018.png', 1, NULL, 0, 0, 1),
(35, 'Almira Dress', '<p>đang cập nhật</p>', 800, 9, 0, NULL, NULL, 1, 69, 10, 'sku_tt_1', 0, '2021-05-02 05:46:49', '2021-05-07 02:20:22', 1, 'Almira_Dress.jpg', 1, 'Đang cập nhật', 0, 0, 1),
(36, 'Vera Rose Dress', '<p>đang cập nhật</p>', 900, 80, 20, '2021-05-02', '2021-05-29', 1, 69, 10, 'sku_tt_2', 0, '2021-05-02 05:50:49', '2021-05-06 09:37:27', 1, 'Vera_Rose_Dress.png', 1, '<ul class=\"list-none\">\r\n											<li><label>Màu:</label>\r\n												<p>Đỏ,đen,vàng</p>\r\n											</li>\r\n											<li><label>Loại:</label>\r\n												<p>Vintage</p>\r\n											</li>\r\n											<li><label>Chất liệu:</label>\r\n												<p>PU, Da </p>\r\n											</li>\r\n											\r\n											<li><label>Kích cỡ:</label>\r\n												<p>L,XL,M</p>\r\n											</li>\r\n											<li><label>Cân nặng:</label>\r\n												<p>50 gam</p>\r\n											</li>\r\n										</ul>', 0, 0, 1),
(37, 'SƠMI CROP LINEN NGẮN TAY', '<p>dang cap nhat</p>', 1000000, 79, 0, NULL, NULL, 1, 69, 10, 'sku_tt_3', 0, '2021-05-08 10:40:57', '2021-05-30 11:01:18', 1, 'SƠMI_CROP_LINEN_NGẮN_TAY.jpg', 1, 'dang cap nhat', 1, 5, 0),
(38, 'san pham test', '<p>dfada</p>', 90000, 89, 0, NULL, NULL, 1, 69, 2, 'fdafdasfdas', 0, '2021-05-08 11:35:54', '2021-06-08 04:37:44', 1, 'san_pham_test.jpg', 0, 'fdafda', 0, 0, 0),
(39, 'Áo Thun Nam ngắn tay An Phước - ATH000491', '<p>fdafda</p>\r\n<p><img src=\"/shop2/public//storage/photos/1/an-ap0491_4-1.jpg\" alt=\"\" width=\"1800\" height=\"1800\" /></p>', 2000000, 78, 10, NULL, NULL, 1, 78, 2, 'KL-tt-1', 1, '2021-06-10 21:27:56', '2021-06-10 21:27:56', 1, 'Áo_Thun_Nam_ngắn_tay_An_Phước_-_ATH000491.jpg', 1, 'fdafda', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `field_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `field_id`, `field_value`, `created_at`, `updated_at`) VALUES
(106, 28, 119, '900', '2021-05-08 00:37:36', '2021-05-08 00:37:36'),
(107, 28, 120, '800', '2021-05-08 00:37:36', '2021-05-08 00:37:36'),
(108, 28, 121, '#0e0be0', '2021-05-08 00:37:36', '2021-05-08 00:37:36'),
(109, 28, 123, '#000000', '2021-05-08 00:37:36', '2021-05-08 00:37:36'),
(110, 28, 124, '#000000', '2021-05-08 00:37:36', '2021-05-08 00:37:36'),
(111, 28, 126, '#000000', '2021-05-08 00:37:36', '2021-05-08 00:37:36'),
(112, 28, 127, '#000000', '2021-05-08 00:37:36', '2021-05-08 00:37:36'),
(113, 23, 119, '900', '2021-05-08 03:31:56', '2021-05-08 03:31:56'),
(114, 23, 120, '1000', '2021-05-08 03:31:56', '2021-05-08 03:31:56'),
(115, 23, 121, '#1029e5', '2021-05-08 03:31:56', '2021-05-08 03:31:56'),
(116, 23, 123, '#000000', '2021-05-08 03:31:56', '2021-05-08 03:31:56'),
(117, 23, 124, '#000000', '2021-05-08 03:31:56', '2021-05-08 03:31:56'),
(118, 23, 126, '#000000', '2021-05-08 03:31:56', '2021-05-08 03:31:56'),
(119, 23, 127, '#000000', '2021-05-08 03:31:56', '2021-05-08 03:31:56'),
(181, 33, 128, '5900000', '2021-05-10 11:09:59', '2021-05-10 11:09:59'),
(182, 33, 129, '6100000', '2021-05-10 11:09:59', '2021-05-10 11:09:59'),
(183, 33, 130, '6500000', '2021-05-10 11:09:59', '2021-05-10 11:09:59'),
(184, 33, 132, '#ea0606', '2021-05-10 11:09:59', '2021-05-10 11:09:59'),
(185, 33, 133, '#fcf403', '2021-05-10 11:09:59', '2021-05-10 11:09:59'),
(186, 33, 134, '#f85de6', '2021-05-10 11:09:59', '2021-05-10 11:09:59'),
(187, 25, 119, '8000', '2021-05-10 22:47:13', '2021-05-10 22:47:13'),
(188, 25, 120, '9100', '2021-05-10 22:47:13', '2021-05-10 22:47:13'),
(189, 25, 121, '#0b1aea', '2021-05-10 22:47:13', '2021-05-10 22:47:13'),
(190, 25, 122, '6000', '2021-05-10 22:47:13', '2021-05-10 22:47:13'),
(191, 25, 123, '#f4f740', '2021-05-10 22:47:13', '2021-05-10 22:47:13'),
(192, 25, 124, '#f10909', '2021-05-10 22:47:13', '2021-05-10 22:47:13'),
(193, 25, 126, '#52e90c', '2021-05-10 22:47:13', '2021-05-10 22:47:13'),
(194, 25, 127, '#0d0c0c', '2021-05-10 22:47:13', '2021-05-10 22:47:13'),
(198, 37, 135, '800', '2021-05-30 11:01:18', '2021-05-30 11:01:18'),
(199, 37, 138, '#ea1014', '2021-05-30 11:01:18', '2021-05-30 11:01:18'),
(395, 38, 136, '980000', '2021-06-10 21:25:27', '2021-06-10 21:25:27'),
(396, 38, 138, '#ed0c0c', '2021-06-10 21:25:27', '2021-06-10 21:25:27'),
(397, 38, 139, '#f0f40b', '2021-06-10 21:25:27', '2021-06-10 21:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(72, '1620233237d1c38a09acc34845c6be3a127a5aacaf.jpg', 25, '2021-05-05 09:47:17', '2021-05-05 09:47:17'),
(73, '162023323700411460f7c92d2124a67ea0f4cb5f85.jpg', 25, '2021-05-05 09:47:18', '2021-05-05 09:47:18'),
(74, '16202332373cef96dcc9b8035d23f69e30bb19218a.jpg', 25, '2021-05-05 09:47:19', '2021-05-05 09:47:19'),
(75, '162023323710a5ab2db37feedfdeaab192ead4ac0e.jpg', 25, '2021-05-05 09:47:20', '2021-05-05 09:47:20'),
(76, '1620236515eaae339c4d89fc102edd9dbdb6a28915.jpg', 36, '2021-05-05 10:41:55', '2021-05-05 10:41:55'),
(77, '1620236515f47d0ad31c4c49061b9e505593e3db98.jpg', 36, '2021-05-05 10:41:55', '2021-05-05 10:41:55'),
(78, '1620236515605ff764c617d3cd28dbbdd72be8f9a2.png', 36, '2021-05-05 10:41:56', '2021-05-05 10:41:56'),
(79, '1620236515816b112c6105b3ebd537828a39af4818.png', 36, '2021-05-05 10:41:57', '2021-05-05 10:41:57'),
(80, '16202365158d34201a5b85900908db6cae92723617.jpg', 36, '2021-05-05 10:41:58', '2021-05-05 10:41:58'),
(81, '1620236553ffd52f3c7e12435a724a8f30fddadd9c.jpg', 35, '2021-05-05 10:42:33', '2021-05-05 10:42:33'),
(82, '1620236553cf67355a3333e6e143439161adc2d82e.jpg', 35, '2021-05-05 10:42:33', '2021-05-05 10:42:33'),
(83, '162023655353e3a7161e428b65688f14b84d61c610.jpg', 35, '2021-05-05 10:42:34', '2021-05-05 10:42:34'),
(88, '16202366253dd48ab31d016ffcbf3314df2b3cb9ce.jpg', 33, '2021-05-05 10:43:45', '2021-05-05 10:43:45'),
(89, '162023662567e103b0761e60683e83c559be18d40c.jpg', 33, '2021-05-05 10:43:45', '2021-05-05 10:43:45'),
(90, '16202366255ea1649a31336092c05438df996a3e59.jpg', 33, '2021-05-05 10:43:46', '2021-05-05 10:43:46'),
(91, '16202366255f93f983524def3dca464469d2cf9f3e.jpg', 33, '2021-05-05 10:43:46', '2021-05-05 10:43:46'),
(92, '1620236655bac9162b47c56fc8a4d2a519803d51b3.jpg', 32, '2021-05-05 10:44:15', '2021-05-05 10:44:15'),
(93, '16202366555ec91aac30eae62f4140325d09b9afd0.jpg', 32, '2021-05-05 10:44:16', '2021-05-05 10:44:16'),
(94, '1620236655ca75910166da03ff9d4655a0338e6b09.jpg', 32, '2021-05-05 10:44:16', '2021-05-05 10:44:16'),
(95, '1620236655b2eb7349035754953b57a32e2841bda5.jpg', 32, '2021-05-05 10:44:17', '2021-05-05 10:44:17'),
(96, '1620236655217eedd1ba8c592db97d0dbe54c7adfc.jpg', 32, '2021-05-05 10:44:17', '2021-05-05 10:44:17'),
(97, '1620236697addfa9b7e234254d26e9c7f2af1005cb.jpg', 31, '2021-05-05 10:44:57', '2021-05-05 10:44:57'),
(98, '16202366976bc24fc1ab650b25b4114e93a98f1eba.jpg', 31, '2021-05-05 10:44:57', '2021-05-05 10:44:57'),
(99, '1620236697ab88b15733f543179858600245108dd8.jpg', 31, '2021-05-05 10:44:58', '2021-05-05 10:44:58'),
(100, '16202366973644a684f98ea8fe223c713b77189a77.jpg', 31, '2021-05-05 10:44:58', '2021-05-05 10:44:58'),
(101, '1620236743fde9264cf376fffe2ee4ddf4a988880d.jpg', 30, '2021-05-05 10:45:43', '2021-05-05 10:45:43'),
(102, '1620236743a2557a7b2e94197ff767970b67041697.jpg', 30, '2021-05-05 10:45:44', '2021-05-05 10:45:44'),
(103, '1620236743e6b4b2a746ed40e1af829d1fa82daa10.jpg', 30, '2021-05-05 10:45:44', '2021-05-05 10:45:44'),
(104, '1620236743dd45045f8c68db9f54e70c67048d32e8.jpg', 30, '2021-05-05 10:45:45', '2021-05-05 10:45:45'),
(105, '1620236789bd686fd640be98efaae0091fa301e613.jpg', 29, '2021-05-05 10:46:29', '2021-05-05 10:46:29'),
(106, '162023678974bba22728b6185eec06286af6bec36d.jpg', 29, '2021-05-05 10:46:29', '2021-05-05 10:46:29'),
(107, '1620236789a3d68b461bd9d3533ee1dd3ce4628ed4.jpg', 29, '2021-05-05 10:46:30', '2021-05-05 10:46:30'),
(108, '1620236789f5f8590cd58a54e94377e6ae2eded4d9.jpg', 29, '2021-05-05 10:46:30', '2021-05-05 10:46:30'),
(109, '1620236789cbcb58ac2e496207586df2854b17995f.jpg', 29, '2021-05-05 10:46:31', '2021-05-05 10:46:31'),
(110, '1620236823a7aeed74714116f3b292a982238f83d2.jpg', 28, '2021-05-05 10:47:03', '2021-05-05 10:47:03'),
(111, '1620236823e3796ae838835da0b6f6ea37bcf8bcb7.jpg', 28, '2021-05-05 10:47:06', '2021-05-05 10:47:06'),
(112, '1620236823aeb3135b436aa55373822c010763dd54.jpg', 28, '2021-05-05 10:47:09', '2021-05-05 10:47:09'),
(113, '16202368233dc4876f3f08201c7c76cb71fa1da439.jpg', 28, '2021-05-05 10:47:12', '2021-05-05 10:47:12'),
(114, '1620236862d5cfead94f5350c12c322b5b664544c1.jpg', 27, '2021-05-05 10:47:42', '2021-05-05 10:47:42'),
(115, '16202368621068c6e4c8051cfd4e9ea8072e3189e2.jpg', 27, '2021-05-05 10:47:43', '2021-05-05 10:47:43'),
(116, '1620236862fe8c15fed5f808006ce95eddb7366e35.jpg', 27, '2021-05-05 10:47:44', '2021-05-05 10:47:44'),
(117, '16202368628b16ebc056e613024c057be590b542eb.jpg', 27, '2021-05-05 10:47:45', '2021-05-05 10:47:45'),
(118, '1620236895a8f15eda80c50adb0e71943adc8015cf.jpg', 26, '2021-05-05 10:48:15', '2021-05-05 10:48:15'),
(119, '16202368953a066bda8c96b9478bb0512f0a43028c.jpg', 26, '2021-05-05 10:48:16', '2021-05-05 10:48:16'),
(120, '162023689548ab2f9b45957ab574cf005eb8a76760.jpg', 26, '2021-05-05 10:48:17', '2021-05-05 10:48:17'),
(121, '1620236895291597a100aadd814d197af4f4bab3a7.jpg', 26, '2021-05-05 10:48:17', '2021-05-05 10:48:17'),
(122, '1620236937b337e84de8752b27eda3a12363109e80.jpg', 23, '2021-05-05 10:48:57', '2021-05-05 10:48:57'),
(123, '1620236937e205ee2a5de471a70c1fd1b46033a75f.jpg', 23, '2021-05-05 10:48:57', '2021-05-05 10:48:57'),
(124, '1620236937a97da629b098b75c294dffdc3e463904.jpg', 23, '2021-05-05 10:48:58', '2021-05-05 10:48:58'),
(125, '16202369379908279ebbf1f9b250ba689db6a0222b.jpg', 23, '2021-05-05 10:48:59', '2021-05-05 10:48:59'),
(126, '162023693782aa4b0af34c2313a562076992e50aa3.jpg', 23, '2021-05-05 10:49:00', '2021-05-05 10:49:00'),
(127, '1620236937acc3e0404646c57502b480dc052c4fe1.jpg', 23, '2021-05-05 10:49:01', '2021-05-05 10:49:01'),
(128, '1620237032b86e8d03fe992d1b0e19656875ee557c.png', 34, '2021-05-05 10:50:32', '2021-05-05 10:50:32'),
(129, '16202370325d44ee6f2c3f71b73125876103c8f6c4.png', 34, '2021-05-05 10:50:32', '2021-05-05 10:50:32'),
(130, '1620237032816b112c6105b3ebd537828a39af4818.png', 34, '2021-05-05 10:50:33', '2021-05-05 10:50:33'),
(131, '1620237032a733fa9b25f33689e2adbe72199f0e62.png', 34, '2021-05-05 10:50:33', '2021-05-05 10:50:33'),
(132, '1620237032b56a18e0eacdf51aa2a5306b0f533204.jpg', 34, '2021-05-05 10:50:33', '2021-05-05 10:50:33'),
(133, '16202370655487315b1286f907165907aa8fc96619.png', 22, '2021-05-05 10:51:05', '2021-05-05 10:51:05'),
(134, '16202370653cf166c6b73f030b4f67eeaeba301103.png', 22, '2021-05-05 10:51:06', '2021-05-05 10:51:06'),
(135, '1620237065b86e8d03fe992d1b0e19656875ee557c.png', 22, '2021-05-05 10:51:06', '2021-05-05 10:51:06'),
(136, '1620237065ca46c1b9512a7a8315fa3c5a946e8265.jpg', 22, '2021-05-05 10:51:07', '2021-05-05 10:51:07'),
(200, '1623385351258be18e31c8188555c2ff05b4d542c3.jpg', 38, '2021-06-10 21:22:50', '2021-06-10 21:22:50'),
(201, '1623385355c4b31ce7d95c75ca70d50c19aef08bf1.jpg', 38, '2021-06-10 21:23:14', '2021-06-10 21:23:14'),
(202, '1623385358acf4b89d3d503d8252c9c4ba75ddbf6d.jpg', 38, '2021-06-10 21:23:33', '2021-06-10 21:23:33'),
(203, '1623385362b137fdd1f79d56c7edf3365fea7520f2.jpg', 38, '2021-06-10 21:23:52', '2021-06-10 21:23:52'),
(204, '16233853666974ce5ac660610b44d9b9fed0ff9548.jpg', 38, '2021-06-10 21:24:14', '2021-06-10 21:24:14'),
(205, '1623385680c32d9bf27a3da7ec8163957080c8628e.jpg', 39, '2021-06-10 21:28:23', '2021-06-10 21:28:23'),
(206, '1623385684b56a18e0eacdf51aa2a5306b0f533204.jpg', 39, '2021-06-10 21:28:44', '2021-06-10 21:28:44'),
(207, '16233856870deb1c54814305ca9ad266f53bc82511.jpg', 39, '2021-06-10 21:29:04', '2021-06-10 21:29:04'),
(208, '1623385691892c91e0a653ba19df81a90f89d99bcd.jpg', 39, '2021-06-10 21:29:22', '2021-06-10 21:29:22'),
(209, '1623385698903ce9225fca3e988c2af215d4e544d3.jpg', 39, '2021-06-10 21:29:43', '2021-06-10 21:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`, `status`) VALUES
(1, 23, 2, 5, 'tuyet voi', NULL, NULL, 0),
(2, 23, 2, 3, 'tam duoc', '2021-05-19 05:41:25', '2021-05-19 05:41:25', 0),
(3, 25, 2, 3, 'san pham tamduoc', '2021-05-19 09:18:08', '2021-05-19 09:18:08', 0),
(4, 33, 4, 4, 'Sản phảm tốt', '2021-05-19 21:40:00', '2021-05-19 21:40:00', 0),
(5, 37, 4, 5, 'Tuyệt vời quá', '2021-05-19 21:42:46', '2021-05-19 21:42:46', 0),
(6, 23, 4, 4, 'rat tot', '2021-05-20 02:39:57', '2021-05-20 02:39:57', 0),
(7, 25, 4, 4, 'sản phẩm tốt', '2021-05-30 03:54:34', '2021-05-30 03:54:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Quản lý sản phẩm và slider', 'web', '2021-04-17 00:47:13', '2021-04-17 01:00:22'),
(2, 'Quản lý', 'web', '2021-04-17 00:53:16', '2021-04-17 00:53:16'),
(5, 'Quản lý danh mục sản phẩm', 'web', '2021-04-22 03:19:55', '2021-04-22 03:19:55'),
(6, 'Quản lý sản phẩm', 'web', '2021-04-28 12:05:34', '2021-04-28 12:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(2, 1),
(2, 2),
(2, 6),
(3, 1),
(3, 2),
(3, 6),
(4, 1),
(4, 2),
(4, 6),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 2),
(9, 5),
(10, 2),
(10, 5),
(11, 2),
(11, 5),
(12, 2),
(12, 5),
(13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`, `created_at`, `updated_at`, `is_active`, `type`) VALUES
(3, 'Vận chuyển', '<h4 class=\"icon-box-title\">Vận chuyển</h4>    \r\n<p>Miễn phí vận chuyển hóa đơn trên 200 ngàn</p>', '2021-04-23 10:32:25', '2021-06-18 09:13:39', 1, 'Textarea'),
(4, 'Hỗ trợ khách hàng', '<h4 class=\"icon-box-title\">Hỗ trợ</h4>\r\n <p>Hỗ trợ khách hàng 24/7</p>', '2021-05-01 01:01:48', '2021-05-01 03:07:34', 1, 'Textarea'),
(5, 'Bảo mật', '<h4 class=\"icon-box-title\">Bảo mật thông tin</h4>\r\n<p>Chúng tôi bảo mật thông tin khách hàng khi thanh toán!</p>', '2021-05-01 01:20:43', '2021-05-01 01:20:43', 1, 'Textarea'),
(6, 'Đổi trả hàng', '<h4 class=\"icon-box-title\">Đổi trả hàng</h4>\r\n<p>Đổi trả hàng lỗi trong 30 ngày</p>', '2021-05-05 03:50:59', '2021-05-05 03:50:59', 1, 'Textarea'),
(7, 'Chính sách sản phẩm', '<p>Các quy đình đổi trả hàng tuân theo quy định của shop</p>\r\n<p>Có thắc mắc hay hàng lỗi xin liên hệ về shop</p>\r\n<p>Bảo đảm làm vừa lòng quý khách</p>', '2021-05-06 09:56:31', '2021-05-06 10:00:55', 1, 'Textarea');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_primary` tinyint(4) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `nametwo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namethree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namefour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `content`, `image_path`, `image_name`, `created_at`, `updated_at`, `is_active`, `nametwo`, `namethree`, `namefour`) VALUES
(1, 'Mua 2 Tặng 1', 'mô tả slider 1 sua', '<p>noi dung slider 1 sua</p>\r\n<p><img src=\"/shop2/public//storage/photos/1/sliders/girl1.jpg\" alt=\"\" width=\"484\" height=\"441\" /></p>\r\n<p><img src=\"/shop2/public//storage/photos/1/sliders/girl2.jpg\" alt=\"\" width=\"484\" height=\"441\" /></p>', NULL, 'Mua_2_Tặng_1.jpg', '2021-04-23 03:56:32', '2021-05-01 09:03:52', 1, 'Phụ nữ được giảm 30%', 'Giảm', 'Miễn phí vận chuyển với hóa đơn trên 60 ngàn sua'),
(2, 'Mừng sinh nhật', 'mô tả mưng sinnh nhật', '<p>nội dung mừng sinh nhật</p>\r\n<p><img src=\"/shop2/public//storage/photos/1/sliders/girl2.jpg\" alt=\"\" width=\"484\" height=\"441\" /></p>\r\n<p>&nbsp;</p>', NULL, 'Mừng_sinh_nhật.jpg', '2021-04-23 04:08:15', '2021-05-01 09:04:43', 1, 'Shop lần 3', 'Giảm', '70 % tất cả các mặt hàng');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`id`, `tag_id`, `taggable_type`, `taggable_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'App\\Models\\News', 5, '2021-05-26 03:58:32', '2021-05-26 03:58:32'),
(2, 6, 'App\\Models\\News', 5, '2021-05-26 03:58:32', '2021-05-26 03:58:32'),
(5, 5, 'App\\Models\\News', 2, '2021-05-26 04:39:50', '2021-05-26 04:39:50'),
(6, 7, 'App\\Models\\News', 2, '2021-05-26 04:39:50', '2021-05-26 04:39:50'),
(7, 7, 'App\\Models\\News', 4, '2021-05-26 21:40:14', '2021-05-26 21:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'php', '2021-05-26 03:40:12', '2021-05-26 03:40:12'),
(6, 'js', '2021-05-26 03:40:12', '2021-05-26 03:40:12'),
(7, 'html', '2021-05-26 04:35:04', '2021-05-26 04:35:04'),
(8, 'asp', '2021-05-26 04:35:04', '2021-05-26 04:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_super_admin`, `is_active`, `image`, `address`, `country`, `city`, `postal_code`, `state`, `mobile`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$G1WFpLP2WvN7GbxvGxLeLufXe8jFV0BM8bS5qMr.Aj57uUGagzm3W', 'Abd7MUxfrEalwQAu6Hsz71oh1wujOU7isumO7Wypb4EXqs6DGPgS8XecGXXv', '2021-04-30 17:00:00', '2021-05-13 22:57:32', 1, 1, '1618676608.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Do chi cuong', 'dochicuong@gmail.com', NULL, '$2y$10$1qVXTwZ6lJEoVxaYnDtn6eQH/ZKl4iCeMFO3Z37en8ZBMcABZnMmK', NULL, '2021-05-12 04:43:33', '2021-05-31 04:41:43', 0, 1, '1621504971_.png', '346 le van quoi', NULL, 'Hà Nội', NULL, '11', '0906077097'),
(3, 'Thy', 'dokhanhthy@gmail.com.sua', NULL, '$2y$10$1qVXTwZ6lJEoVxaYnDtn6eQH/ZKl4iCeMFO3Z37en8ZBMcABZnMmK', NULL, '2021-05-12 04:47:36', '2021-06-03 04:32:02', 0, 1, '1622719909_.png', '249 lllq sưa', NULL, 'Hà Nội', NULL, '11 sưa', '0906077097 sưa'),
(4, 'chau le', 'chau@gmail.com', NULL, '$2y$10$OCpp0er5/tJBnQ/NUUVpPO0M3zNkJEGymKVuBBlgwQAyOn/P4CLcK', NULL, '2021-05-12 04:50:49', '2021-09-03 04:37:10', 0, 1, '1622719752_.png', '346 le van quoi', NULL, 'TP HCM', NULL, '11', '7676767676'),
(5, 'boy', 'boy@gmail.com', NULL, '$2y$10$K22tEuQcgaWq4qG8W0mtquuAxzYA9j6rvfx18k5fSTPjWN3LkTOby', NULL, '2021-05-12 06:00:13', '2021-09-03 04:06:48', 0, 1, NULL, '436', NULL, 'TP HCM', NULL, '11', '9089'),
(6, 'boycuong', 'boycuong@gmail.com', NULL, '$2y$10$zS3vNJ2gIPJrMu8jTzuWUuky/WjXno72QcgHHzJ50lXI0WY5SqTQm', NULL, '2021-05-12 06:04:35', '2021-05-12 06:04:35', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'cuong thy', 'docuongthy@gmail.com', NULL, '$2y$10$1d.Tw6KRcZBKEc3AB/.STegLGEd0rQ5eQUFjd4ehgDXQVdr6U4vkC', NULL, '2021-05-13 05:49:36', '2021-05-13 05:49:36', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_features`
--
ALTER TABLE `category_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_features_category_id_foreign` (`category_id`);

--
-- Indexes for table `cat_news`
--
ALTER TABLE `cat_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_news_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`),
  ADD KEY `news_cat_news_id_foreign` (`cat_news_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `orders_shipping_address_id_foreign` (`shipping_address_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_slug_unique` (`slug`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_features_product_id_foreign` (`product_id`),
  ADD KEY `product_features_field_id_foreign` (`field_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_gallery_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tag_product_id_foreign` (`product_id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_setting_key_unique` (`setting_key`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_cart_user_id_foreign` (`user_id`),
  ADD KEY `shopping_cart_product_id_foreign` (`product_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taggables_tag_id_foreign` (`tag_id`),
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `category_features`
--
ALTER TABLE `category_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `cat_news`
--
ALTER TABLE `cat_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `product_tag`
--
ALTER TABLE `product_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_features`
--
ALTER TABLE `category_features`
  ADD CONSTRAINT `category_features_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cat_news`
--
ALTER TABLE `cat_news`
  ADD CONSTRAINT `cat_news_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cat_news` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_cat_news_id_foreign` FOREIGN KEY (`cat_news_id`) REFERENCES `cat_news` (`id`),
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`),
  ADD CONSTRAINT `orders_shipping_address_id_foreign` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_addresses` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_features`
--
ALTER TABLE `product_features`
  ADD CONSTRAINT `product_features_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `category_features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_features_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `product_gallery_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
