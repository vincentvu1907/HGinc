-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 10:39 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housesgardens`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute_pages`
--

CREATE TABLE `attribute_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_pages`
--

INSERT INTO `attribute_pages` (`id`, `favicon`, `title`, `description`, `created_at`, `updated_at`, `banner`, `quote`, `url`, `special_id`) VALUES
(1, NULL, 'This is title', 'this is description', NULL, '2019-12-08 23:15:22', 'how-to-decorate-christmas-spotlight-3-1575564924.png', 'How to Decorate a Christmas Tree Like a Pro', 'url', 2);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backlink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `url`, `backlink`, `description`, `created_at`, `updated_at`) VALUES
(1, 'anonymous', 'anonymous', NULL, NULL, '2019-11-20 10:05:45', '2019-11-20 10:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sticky` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `url`, `parent_category_id`, `created_at`, `updated_at`, `sticky`) VALUES
(1, 'Houses', 'Interior design ideas from the iconic archives of House & Garden magazine.', 'houses', NULL, '2019-11-20 10:15:06', '2019-11-21 03:34:16', '0'),
(2, 'Decorations', 'Decoration inspiration - house decoration, home design and accessories', 'decorations', NULL, '2019-11-20 10:15:46', '2019-11-21 23:05:01', '0'),
(3, 'Gardens', 'Everything House &amp;amp; Garden knows about Gardens, including the latest news, features and images.', 'gardens', NULL, '2019-11-20 10:16:16', '2019-11-20 10:16:16', '0'),
(4, 'Recipes', 'Recipes for both the new and experienced cook, punctuated with wine and drink ideas', 'recipes', NULL, '2019-11-20 10:17:07', '2019-11-20 10:17:07', '0'),
(5, 'Travel & Lifestyle', 'Everything House &amp;amp; Garden knows about Travel, including the latest news, features and images', 'travel-lifestyle', NULL, '2019-11-20 10:17:53', '2019-11-21 03:36:06', '0'),
(6, 'Farm Houses', 'Everything House & Garden knows about Farmhouses, including the latest news, features and images.', 'farm-houses', 1, '2019-11-21 00:24:49', '2019-11-21 00:24:49', '0'),
(7, 'Cottages', 'Everything House & Garden knows about Farmhouses, including the latest news, features and images.', 'cottages', 1, '2019-11-21 00:25:37', '2019-11-21 00:25:37', '0'),
(8, 'Flats', 'Everything House & Garden knows about Farmhouses, including the latest news, features and images.', 'flats', 1, '2019-11-21 00:29:20', '2019-11-21 00:29:20', '0'),
(9, 'Chalets', 'Everything House & Garden knows about Farmhouses, including the latest news, features and images.', 'chalets', 1, '2019-11-21 00:29:37', '2019-11-21 00:29:37', '0'),
(10, 'Style File', 'Everything House & Garden knows about Style File, including the latest news, features and images.', 'style-file', 2, '2019-11-21 00:31:18', '2019-11-21 00:31:18', '0'),
(12, 'Fabric & Wallpaper', 'Everything House &amp;amp; Garden knows about Style File, including the latest news, features and images.', 'fabric-wallpaper', 2, '2019-11-21 00:32:06', '2019-12-14 11:06:26', '0'),
(13, 'Design Ideas', 'Everything House &amp;amp; Garden knows about Style File, including the latest news, features and images.', 'design-ideas', 2, '2019-11-21 00:32:36', '2019-11-21 00:32:36', '0'),
(14, 'Buy For Your House', 'Everything House &  Garden knows about Style File, including the latest news, features and images.', 'buy-for-your-house', 2, '2019-11-21 00:33:20', '2019-11-21 00:33:20', '0'),
(15, 'City Gardens', 'Everything House &  Garden knows about Style File, including the latest news, features and images.', 'city-gardens', 3, '2019-11-21 00:34:31', '2019-11-21 00:34:31', '0'),
(16, 'Country Gardens', 'Everything House &  Garden knows about Style File, including the latest news, features and images.', 'country-gardens', 3, '2019-11-21 00:34:44', '2019-11-21 00:34:44', '0'),
(17, 'Gardening Calendar', 'Everything House &  Garden knows about Style File, including the latest news, features and images.', 'gardening-calendar', 3, '2019-11-21 00:35:52', '2019-11-21 00:35:52', '0'),
(18, 'Breakfast & Brunch', 'All the latest breakfast recipe ideas for both new and experienced cooks with food and drink inspiration for brunch , From House & Garden Ideas', 'breakfast-&-brunch', 4, '2019-11-21 00:37:18', '2019-11-21 00:37:18', '0'),
(19, 'Mains', 'All the latest breakfast recipe ideas for both new and experienced cooks with food and drink inspiration for brunch , From House & Garden Ideas', 'mains', 4, '2019-11-21 00:37:28', '2019-11-21 00:37:28', '0'),
(20, 'Salads', 'All the latest breakfast recipe ideas for both new and experienced cooks with food and drink inspiration for brunch , From House & Garden Ideas', 'salads', 4, '2019-11-21 00:37:44', '2019-11-21 00:37:44', '0'),
(21, 'Desserts and Cakes', 'All the latest desserts and cakes recipe ideas for both new and experienced cooks with food and drink inspiration for brunch , From House & Garden Ideas', 'desserts-and-cakes', NULL, '2019-11-21 00:38:17', '2019-11-21 00:38:45', '0'),
(22, 'Drinks & Cocktails', 'Explore our drinks & salad recipes on HOUSE - design, food and travel by House &amp;amp; Garden. This can easily be made dairy- and gluten-free', 'drinks-cocktails', 4, '2019-11-21 00:39:40', '2019-11-21 00:39:40', '0'),
(23, 'Destinations', 'Destinations', 'destinations', 5, '2019-11-21 00:40:08', '2019-11-21 00:40:08', '0');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `email`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Duong Vu', NULL, 'duongvu.survive@gmail.com', NULL, '2019-12-13 01:46:20', '2019-12-13 01:46:20'),
(2, 'Duong Vu', NULL, 'duongcn07@gmail.com', NULL, '2019-12-13 01:55:35', '2019-12-13 01:55:35');

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
(4, '2019_11_13_183414_create_categories_table', 1),
(5, '2019_11_13_184830_create_posts_table', 1),
(6, '2019_11_13_184933_create_products_table', 1),
(7, '2019_11_13_185005_create_customers_table', 1),
(8, '2019_11_13_185035_create_attribute_pages_table', 1),
(9, '2019_11_15_073223_create_comments_table', 1),
(10, '2019_11_15_074757_create_authors_table', 1),
(11, '2019_11_15_074958_add_author_id_to_posts', 1),
(12, '2019_11_15_075628_create_posts_categories_table', 1),
(13, '2019_11_15_080022_create_tags_table', 1),
(14, '2019_11_15_080057_create_posts_tags_table', 1),
(15, '2019_11_15_080157_create_posts_related_table', 1),
(16, '2019_11_15_082253_create_posts_products_table', 1),
(17, '2019_11_15_082620_add_post_id_to_comments', 1),
(18, '2019_11_16_105959_add_status_to_posts', 1),
(19, '2019_11_20_170749_add_sticky_to_posts', 2),
(20, '2019_11_20_170812_add_sticky_to_categories', 3),
(21, '2019_12_08_173401_add_banner_and_title_to_attribute_pages', 4),
(22, '2019_12_08_193825_create_table_specials', 5),
(23, '2019_12_08_201338_create_table_posts_specials', 6),
(24, '2019_12_13_050835_create_reports_table', 7);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `status` enum('draft','publish') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sticky` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `thumbnail`, `content`, `views`, `url`, `created_at`, `updated_at`, `author_id`, `status`, `sticky`) VALUES
(1, 'Sách tâm lý & kỹ năng sống', '123', 'bg_3.jpg', '<p>123</p>', 0, 'sach-tam-ly-&-ky-nang-song', '2019-11-20 10:19:32', '2019-12-09 04:55:08', 1, 'publish', '0'),
(4, '23 Fall Decorating Ideas That\'ll Spice Up Your Home for Autumn', 'Bring on the fall decorations, because those leaves can\'t turn fast enough.', '7781396-d4e-e43-p1-c3-aug19-b3-4019-1-1566849289.jpg', '<p>Bring on the fall decorations, because those leaves can&#39;t turn fast enough.</p>', 0, '23-fall-decorating-ideas-that\'ll-spice-up-your-home-for-autumn', '2019-11-21 22:53:21', '2019-12-09 04:55:08', 1, 'publish', '0'),
(5, '50 Stylish Bathroom Design Ideas for the Fastest and Freshest Makeover', 'We spent a lot of time in the bathroom, so give your space the design upgrade it deserves with some easy decor fixes.', 'white-bathroom-freestanding-tub-1563999078.jpg', '<p>We spent a lot of time in the bathroom, so give your space the design upgrade it deserves with some easy decor fixes. Fresh houseplants, bold rugs, and&nbsp;smart storage swaps&nbsp;will refresh a powder room in minutes, or invest in a total remodel for even bigger impact. Add more zen to your evenings with a freestanding bathtub or make the morning routine that much easier by adding his-and-hers sinks. Laying down colorful tile, adding wallpaper, or replacing hardware can create the big visual change you&#39;re looking for.</p>', 0, '50-stylish-bathroom-design-ideas-for-the-fastest-and-freshest-makeover', '2019-11-21 23:08:37', '2019-12-09 04:55:08', 1, 'publish', '0'),
(6, 'Shawn Mendes & Camila Cabello - Señorita (Lyrics) NOTD Remix', '123', '5ceXnPeHvOvP7781396-d4e-e43-p1-c3-aug19-b3-4019-1-1566849289.jpg', '<p>123</p>', 0, 'shawn-mendes-camila', '2019-11-21 23:54:02', '2019-11-29 01:36:51', 1, 'publish', '0'),
(7, '11 Best Nonstick Cookware Sets of 2019, According to Kitchen Pros', '123', 'ghi-best-cookware-sets-1574201266.png', '<div>\r\n<p>123</p>\r\n</div>', 0, '11-best-nonstick-cookware-sets-of-2019,-according-to-kitchen-pros', '2019-12-09 04:54:49', '2019-12-09 04:55:01', 1, 'publish', '1');

-- --------------------------------------------------------

--
-- Table structure for table `posts_categories`
--

CREATE TABLE `posts_categories` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_categories`
--

INSERT INTO `posts_categories` (`post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 15, NULL, NULL),
(4, 9, NULL, NULL),
(5, 7, NULL, NULL),
(5, 15, NULL, NULL),
(6, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_products`
--

CREATE TABLE `posts_products` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_products`
--

INSERT INTO `posts_products` (`post_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_related`
--

CREATE TABLE `posts_related` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `post_related_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts_specials`
--

CREATE TABLE `posts_specials` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `special_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_specials`
--

INSERT INTO `posts_specials` (`post_id`, `special_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL),
(4, 2, NULL, NULL),
(5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(7, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `network` bigint(20) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `affilate_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `url`, `name`, `description`, `network`, `price`, `affilate_link`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 'gin123', '123123123', NULL, 123, '123', 'how-to-decorate-christmas-spotlight-3-1575564924.png', '2019-12-09 02:07:17', '2019-12-09 02:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `report` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `customer_id`, `report`, `created_at`, `updated_at`) VALUES
(3, 1, '132', '2019-12-13 01:50:44', '2019-12-13 01:50:44'),
(4, 2, 'thank you', '2019-12-13 01:55:35', '2019-12-13 01:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Category 01', 'category-01', '123123', '2019-12-08 13:18:24', '2019-12-08 13:18:33'),
(3, 'Category 02', 'category-02', '123', '2019-12-08 22:34:06', '2019-12-08 22:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'tags', '2019-11-20 10:19:32', '2019-11-20 10:19:32'),
(2, '123', '2019-12-09 04:54:49', '2019-12-09 04:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Duong Vu', 'duongcn07@gmail.com', NULL, NULL, '$2y$10$udHcF5tU.OvT5NSpHh1pg.BcfIgMshfN6dHo6ZqAzJXz6WhZaCNTu', NULL, '2019-11-20 10:03:59', '2019-11-20 10:03:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute_pages`
--
ALTER TABLE `attribute_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_customer_id_foreign` (`customer_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Indexes for table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD PRIMARY KEY (`post_id`,`category_id`),
  ADD KEY `posts_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `posts_products`
--
ALTER TABLE `posts_products`
  ADD PRIMARY KEY (`post_id`,`product_id`),
  ADD KEY `posts_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `posts_related`
--
ALTER TABLE `posts_related`
  ADD PRIMARY KEY (`post_id`,`post_related_id`);

--
-- Indexes for table `posts_specials`
--
ALTER TABLE `posts_specials`
  ADD PRIMARY KEY (`post_id`,`special_id`),
  ADD KEY `posts_specials_special_id_foreign` (`special_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `posts_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `attribute_pages`
--
ALTER TABLE `attribute_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

--
-- Constraints for table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD CONSTRAINT `posts_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_categories_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts_products`
--
ALTER TABLE `posts_products`
  ADD CONSTRAINT `posts_products_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts_related`
--
ALTER TABLE `posts_related`
  ADD CONSTRAINT `posts_related_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts_specials`
--
ALTER TABLE `posts_specials`
  ADD CONSTRAINT `posts_specials_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_specials_special_id_foreign` FOREIGN KEY (`special_id`) REFERENCES `specials` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `posts_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
