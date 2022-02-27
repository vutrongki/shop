-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2021 lúc 03:14 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'women', 0, 'women', '2021-10-27 19:13:04', '2021-10-27 19:13:04', NULL),
(2, 'men', 0, 'men', '2021-10-27 19:13:11', '2021-10-27 19:13:11', NULL),
(3, 'bag', 0, 'bag', '2021-10-27 19:13:17', '2021-10-27 19:13:17', NULL),
(4, 'shoes', 0, 'shoes', '2021-10-27 19:13:38', '2021-10-27 19:13:38', NULL),
(5, 'watches', 0, 'watches', '2021-10-27 19:13:49', '2021-10-27 19:13:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`, `product_id`) VALUES
(3, 'red', '2021-10-28 05:49:07', '2021-10-28 05:49:07', 16),
(4, 'black', '2021-10-28 05:49:07', '2021-10-28 05:49:07', 16),
(7, 'white', '2021-10-31 06:57:52', '2021-10-31 06:57:52', 17),
(8, 'black', '2021-10-31 06:57:52', '2021-10-31 06:57:52', 17),
(9, 'white', '2021-10-31 06:58:39', '2021-10-31 06:58:39', 18),
(10, 'blue', '2021-10-31 06:58:39', '2021-10-31 06:58:39', 18),
(11, 'white', '2021-10-31 06:59:37', '2021-10-31 06:59:37', 19),
(12, 'blue', '2021-10-31 06:59:37', '2021-10-31 06:59:37', 19),
(13, 'black', '2021-10-31 06:59:37', '2021-10-31 06:59:37', 19),
(14, 'black', '2021-10-31 07:00:32', '2021-10-31 07:00:32', 20),
(15, 'white', '2021-10-31 07:00:32', '2021-10-31 07:00:32', 20),
(16, 'black', '2021-10-31 07:01:27', '2021-10-31 07:01:27', 21),
(17, 'white', '2021-10-31 07:01:27', '2021-10-31 07:01:27', 21),
(18, 'black', '2021-10-31 07:02:48', '2021-10-31 07:02:48', 22),
(19, 'white', '2021-10-31 07:02:48', '2021-10-31 07:02:48', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'kienvu99', '123', '2021-10-28 06:58:45', '2021-10-28 06:58:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2021_09_18_065945_create_categories_table', 1),
(24, '2021_09_18_080042_add_deleted_at_to_categories_table', 1),
(25, '2021_09_18_081209_create_products_table', 1),
(26, '2021_09_18_083034_create_product_images_table', 1),
(27, '2021_09_18_083102_create_product_tags_table', 1),
(28, '2021_09_18_083119_create_tags_table', 1),
(29, '2021_09_18_085252_add_feature_image_name_to_products_table', 1),
(30, '2021_09_18_095656_add_delete_at_to_products_table', 1),
(31, '2021_09_18_100929_create_sliders_table', 1),
(32, '2021_09_18_101711_add_delete_at_to_sliders_table', 1),
(33, '2021_09_18_103346_create_settings_table', 1),
(34, '2021_09_18_103731_add_delete_at_to_settings_table', 1),
(35, '2021_09_20_143158_add_discount_to_products_table', 1),
(36, '2021_09_20_150112_create_news_table', 1),
(37, '2021_09_24_120338_create_customers_table', 1),
(38, '2021_10_28_015614_create_colors_table', 1),
(39, '2021_10_28_024745_create_colors_table', 2),
(40, '2021_10_28_025654_add_product_id_to_colors_table', 3),
(43, '2021_10_28_140311_create_orders_table', 4),
(44, '2021_10_28_140526_create_order_details_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `image`, `description`, `content`, `created_at`, `updated_at`) VALUES
(1, '8 Inspiring Ways to Wear Dresses in the Winter', '/storage/news/1/r2u2ewvk6ZoDMIGwsEO4.jpg', 'Duis ut velit gravida nibh bibendum commodo. Suspendisse pellentesque mattis augue id euismod. Interdum et male-suada fames', '<p>abc</p>', '2021-10-31 07:04:14', '2021-10-31 07:04:14'),
(2, 'The Great Big List of Men’s Gifts for the Holidays', '/storage/news/1/7qRtat2LttwFX1fCM51z.jpg', 'Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame', '<p>abc</p>', '2021-10-31 07:05:13', '2021-10-31 07:05:13'),
(3, '5 Winter-to-Spring Fashion Trends to Try Now', '/storage/news/1/X0t6afAb56YHE5GjewG2.jpg', 'Duis ut velit gravida nibh bibendum commodo. Suspendisse pellentesque mattis augue id euismod. Interdum et male-suada fames', '<p>abc</p>', '2021-10-31 07:05:34', '2021-10-31 07:05:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `feature_image_name`, `deleted_at`, `discount`) VALUES
(1, 'Esprit Ruffle Shirt', '16.64', '/storage/products/1/P7foUaeoyCXFSBSxT0fH.jpg', '<p>abc</p>', 1, 1, '2021-10-27 19:15:30', '2021-10-31 06:51:10', 'product-01.jpg', '2021-10-31 06:51:10', '0'),
(2, 'Herschel supply', '35.31', '/storage/products/1/gKvO70N1DDPdyNvxYFxS.jpg', '<p>abc</p>', 1, 1, '2021-10-27 19:16:28', '2021-10-31 06:51:08', 'product-02.jpg', '2021-10-31 06:51:08', '5'),
(3, 'Only Check Trouser', '25.50', '/storage/products/1/L4iAyalvwjFEK5qwE84b.jpg', '<p>abc</p>', 1, 2, '2021-10-27 19:18:11', '2021-10-31 06:51:18', 'product-03.jpg', '2021-10-31 06:51:18', '0'),
(4, 'Vintage Inspired Classic', '93.20', '/storage/products/1/Y4TVWP9JRnUD45uwKEY6.jpg', '<p>abc</p>', 1, 5, '2021-10-27 19:19:15', '2021-10-31 06:51:22', 'product-06.jpg', '2021-10-31 06:51:22', '0'),
(5, 'Front Pocket Jumper', '34.75', '/storage/products/1/g49zV2rFciztHwsUHe1I.jpg', '<p>abc</p>', 1, 1, '2021-10-27 19:20:48', '2021-10-31 06:51:24', 'product-05.jpg', '2021-10-31 06:51:24', '5'),
(6, 'Classic Trench Coat', '75.00', '/storage/products/1/ITqiNpZuGumajPskfwO1.jpg', '<p>abc</p>', 1, 1, '2021-10-27 19:24:43', '2021-10-31 06:51:27', 'product-04.jpg', '2021-10-31 06:51:27', '0'),
(7, 'Converse All Star Hi Plimsolls', '75.00', '/storage/products/1/wxMWuEeiE0OJl4tGJSoQ.jpg', '<p>abc</p>', 1, 4, '2021-10-27 19:26:05', '2021-10-31 06:51:02', 'product-09.jpg', '2021-10-31 06:51:02', '0'),
(8, 'Herschel supply', '63.15', '/storage/products/1/k70NMDvwQCY7IoQyb6qU.jpg', '<p>abc</p>', 1, 3, '2021-10-27 19:27:03', '2021-10-31 06:50:59', 'product-12.jpg', '2021-10-31 06:50:59', '5'),
(9, 'Mini Silver Mesh Watch', '86.85', '/storage/products/1/meULWmqg82TGtkkmIzWn.jpg', '<p>abc</p>', 1, 5, '2021-10-27 19:28:34', '2021-10-31 06:50:56', 'product-15.jpg', '2021-10-31 06:50:56', '0'),
(10, 'Herschel supply', '63.16', '/storage/products/1/sDFbGrJFXbiiY6qliGsy.jpg', '<p>abc</p>', 1, 2, '2021-10-27 19:29:45', '2021-10-31 06:50:52', 'product-11.jpg', '2021-10-31 06:50:52', '5'),
(16, 'Pretty Little Thing', '54.79', '/storage/products/1/veqt8Dq5WUuJN3yWK0dU.jpg', '<p>abc</p>', 1, 1, '2021-10-28 05:49:07', '2021-10-28 05:49:07', 'product-14.jpg', NULL, '0'),
(17, 'Esprit Ruffle Shirt', '16.64', '/storage/products/1/I2g4pQmSQ3RCugV8477M.jpg', '<p>abc</p>', 1, 1, '2021-10-31 06:57:52', '2021-10-31 06:57:52', 'product-01.jpg', NULL, '0'),
(18, 'Only Check Trouser', '25.50', '/storage/products/1/xCgnPeiWl49wQ1xi2Lpn.jpg', '<p>abc</p>', 1, 2, '2021-10-31 06:58:39', '2021-10-31 06:58:39', 'product-03.jpg', NULL, '0'),
(19, 'Herschel supply', '75.00', '/storage/products/1/DKWxjIvLMjI9AoEuI2kk.jpg', '<p>abc</p>', 1, 2, '2021-10-31 06:59:37', '2021-10-31 06:59:37', 'product-11.jpg', NULL, '5'),
(20, 'Mini Silver Mesh Watch', '86.85', '/storage/products/1/3Ojkzsp4x5Va7hmjd0U2.jpg', '<p>abc</p>', 1, 5, '2021-10-31 07:00:32', '2021-10-31 07:00:32', 'product-06.jpg', NULL, '0'),
(21, 'Femme T-Shirt In Stripe', '25.85', '/storage/products/1/pIiUL5WCmbHiQxlF773X.jpg', '<p>abc</p>', 1, 1, '2021-10-31 07:01:27', '2021-10-31 07:01:27', 'product-10.jpg', NULL, '5'),
(22, 'Converse All Star Hi Plimsolls', '75.00', '/storage/products/1/UOszcSsyg94jyOqywZja.jpg', '<p>abc</p>', 1, 4, '2021-10-31 07:02:48', '2021-10-31 07:02:48', 'product-09.jpg', NULL, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '/storage/products/1/Y3lUTUEICzGHA9i0zxNm.jpg', 'product-01.jpg', 1, '2021-10-27 19:15:30', '2021-10-27 19:15:30'),
(2, '/storage/products/1/NZEwhu1JqlV1XRZd6pKa.jpg', 'product-02.jpg', 2, '2021-10-27 19:16:28', '2021-10-27 19:16:28'),
(3, '/storage/products/1/HOHgtyS7yLbT00dZoWF0.jpg', 'product-03.jpg', 3, '2021-10-27 19:18:11', '2021-10-27 19:18:11'),
(4, '/storage/products/1/SSgKt3OqmFetQw8bAAFh.jpg', 'product-06.jpg', 4, '2021-10-27 19:19:15', '2021-10-27 19:19:15'),
(5, '/storage/products/1/OYB1gTO9B3GizWfropIj.jpg', 'product-05.jpg', 5, '2021-10-27 19:20:48', '2021-10-27 19:20:48'),
(6, '/storage/products/1/JiBs7al36sV3BAWQ6I7e.jpg', 'product-04.jpg', 6, '2021-10-27 19:24:43', '2021-10-27 19:24:43'),
(7, '/storage/products/1/TjirqFFV2WYpksWMG7kw.jpg', 'product-09.jpg', 7, '2021-10-27 19:26:05', '2021-10-27 19:26:05'),
(8, '/storage/products/1/I40kfg2IToV2UJuKPNqL.jpg', 'product-12.jpg', 8, '2021-10-27 19:27:03', '2021-10-27 19:27:03'),
(9, '/storage/products/1/yhuBaePXVIaJ0yb6BCA9.jpg', 'product-15.jpg', 9, '2021-10-27 19:28:34', '2021-10-27 19:28:34'),
(10, '/storage/products/1/p5urzbeL9E8Q2sitpbhp.jpg', 'product-11.jpg', 10, '2021-10-27 19:29:45', '2021-10-27 19:29:45'),
(16, '/storage/products/1/hmcw42WEVpDIAnFbmJ63.jpg', 'product-14.jpg', 16, '2021-10-28 05:49:07', '2021-10-28 05:49:07'),
(17, '/storage/products/1/YuJGzAltrVB6HwK2Vtkp.jpg', 'product-01.jpg', 17, '2021-10-31 06:57:52', '2021-10-31 06:57:52'),
(18, '/storage/products/1/Kp7Rc92tosx5ZAGHVmW2.jpg', 'product-03.jpg', 18, '2021-10-31 06:58:39', '2021-10-31 06:58:39'),
(19, '/storage/products/1/1zIRadYC8d25Pp4qa9kU.jpg', 'product-11.jpg', 19, '2021-10-31 06:59:37', '2021-10-31 06:59:37'),
(20, '/storage/products/1/og76uYswEjcQhKgEWCC1.jpg', 'product-06.jpg', 20, '2021-10-31 07:00:32', '2021-10-31 07:00:32'),
(21, '/storage/products/1/P6d6KimOAMCCZck1BkoW.jpg', 'product-10.jpg', 21, '2021-10-31 07:01:27', '2021-10-31 07:01:27'),
(22, '/storage/products/1/9If4egTGURuFyGVEsaPV.jpg', 'product-09.jpg', 22, '2021-10-31 07:02:48', '2021-10-31 07:02:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-10-27 19:15:30', '2021-10-27 19:15:30'),
(2, 2, 1, '2021-10-27 19:16:28', '2021-10-27 19:16:28'),
(3, 3, 2, '2021-10-27 19:18:11', '2021-10-27 19:18:11'),
(4, 4, 3, '2021-10-27 19:19:15', '2021-10-27 19:19:15'),
(5, 5, 1, '2021-10-27 19:20:48', '2021-10-27 19:20:48'),
(6, 6, 1, '2021-10-27 19:24:43', '2021-10-27 19:24:43'),
(7, 7, 4, '2021-10-27 19:26:05', '2021-10-27 19:26:05'),
(8, 8, 5, '2021-10-27 19:27:03', '2021-10-27 19:27:03'),
(9, 9, 3, '2021-10-27 19:28:34', '2021-10-27 19:28:34'),
(10, 10, 2, '2021-10-27 19:29:45', '2021-10-27 19:29:45'),
(11, 16, 1, '2021-10-28 05:49:07', '2021-10-28 05:49:07'),
(12, 10, 10, '2021-10-31 06:32:17', '2021-10-31 06:32:17'),
(13, 17, 1, '2021-10-31 06:57:52', '2021-10-31 06:57:52'),
(14, 18, 2, '2021-10-31 06:58:39', '2021-10-31 06:58:39'),
(15, 19, 2, '2021-10-31 06:59:37', '2021-10-31 06:59:37'),
(16, 20, 11, '2021-10-31 07:00:32', '2021-10-31 07:00:32'),
(17, 21, 1, '2021-10-31 07:01:27', '2021-10-31 07:01:27'),
(18, 22, 4, '2021-10-31 07:02:48', '2021-10-31 07:02:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Men Collection 2018', 'New arrivals', '/storage/sliders/1/mkTOZaE5BelWGxTcsVDs.jpg', '2021-10-27 19:31:19', '2021-10-27 19:31:19', NULL),
(2, 'Men New-Season', 'Jackets & Coats', '/storage/sliders/1/I3njgTWbovYa4YZTnGSu.jpg', '2021-10-27 19:32:30', '2021-10-27 19:32:30', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'women', '2021-10-27 19:15:30', '2021-10-27 19:15:30'),
(2, 'men', '2021-10-27 19:18:11', '2021-10-27 19:18:11'),
(3, 'watches', '2021-10-27 19:19:15', '2021-10-27 19:19:15'),
(4, 'shoes', '2021-10-27 19:26:05', '2021-10-27 19:26:05'),
(5, 'bag', '2021-10-27 19:27:03', '2021-10-27 19:27:03'),
(10, 'white', '2021-10-31 06:32:17', '2021-10-31 06:32:17'),
(11, 'watch', '2021-10-31 07:00:32', '2021-10-31 07:00:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kien Vu', 'Kien Vu', 'bestxedvn@gmail.com', NULL, '$2y$10$.74Rw7.kx/qmxzrps6dlC.aryhON6ueGd05S/MrMGtT5wi1Dc6fCa', NULL, '2021-10-27 19:12:46', '2021-10-27 19:12:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
