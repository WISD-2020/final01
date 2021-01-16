-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `final01` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `final01`;

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_id` bigint(20) unsigned NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_food_id_foreign` (`food_id`),
  CONSTRAINT `carts_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_major` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `user_id`, `date`, `title`, `content`, `is_major`, `created_at`, `updated_at`) VALUES
(1,	'Member',	'2021-01-15',	'好吃！',	'照三餐吃爆！',	NULL,	'2021-01-15 04:50:26',	'2021-01-15 04:50:26');

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coupons_user_id_foreign` (`user_id`),
  CONSTRAINT `coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `is_selling` tinyint(1) NOT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `food` (`id`, `name`, `price`, `is_selling`, `is_hot`, `image`, `created_at`, `updated_at`) VALUES
(1,	'鹽酥雞',	50,	0,	0,	'img/1610713232.jpg',	'2021-01-15 04:20:36',	'2021-01-15 04:20:36'),
(2,	'紐約街頭雞上飯',	80,	0,	0,	'img/1610713257.jpg',	'2021-01-15 04:20:57',	'2021-01-15 04:20:57'),
(3,	'雞湯',	55,	0,	0,	'img/1610713276.jpg',	'2021-01-15 04:21:16',	'2021-01-15 04:21:16'),
(4,	'白玉紅茶拿鐵',	55,	0,	0,	'img/1610713291.jpg',	'2021-01-15 04:21:31',	'2021-01-15 04:21:31'),
(5,	'鮮牛肉河粉',	60,	0,	0,	'img/1610713313.jpg',	'2021-01-15 04:21:53',	'2021-01-15 04:21:53'),
(6,	'鹹水雞',	50,	0,	0,	'img/1610713329.jpeg',	'2021-01-15 04:22:09',	'2021-01-15 04:22:09'),
(7,	'培根起司牛肉漢堡',	100,	0,	0,	'img/1610713341.jpg',	'2021-01-15 04:22:21',	'2021-01-15 04:22:21'),
(8,	'烤雞腿飯',	85,	0,	0,	'img/1610713354.jpg',	'2021-01-15 04:22:34',	'2021-01-15 04:22:34'),
(9,	'皮蛋瘦肉粥',	65,	0,	0,	'img/1610713371.jpg',	'2021-01-15 04:22:51',	'2021-01-15 04:22:51'),
(10,	'櫻花蜂蜜珍珠奶茶',	65,	0,	0,	'img/1610713394.jpg',	'2021-01-15 04:23:14',	'2021-01-15 04:23:14');

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `order_id` bigint(20) unsigned NOT NULL,
  `food_id` bigint(20) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `items_order_id_foreign` (`order_id`),
  KEY `items_food_id_foreign` (`food_id`),
  CONSTRAINT `items_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`),
  CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `items` (`order_id`, `food_id`, `amount`, `total`, `created_at`, `updated_at`) VALUES
(1,	1,	2,	50,	'2021-01-15 04:43:04',	'2021-01-15 04:43:04'),
(1,	4,	3,	55,	'2021-01-15 04:43:04',	'2021-01-15 04:43:04');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(62,	'2014_10_12_000000_create_users_table',	1),
(63,	'2014_10_12_100000_create_password_resets_table',	1),
(64,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(65,	'2019_08_19_000000_create_failed_jobs_table',	1),
(66,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(67,	'2020_12_18_025146_create_sessions_table',	1),
(68,	'2020_12_29_113829_create_food_table',	1),
(69,	'2020_12_29_114606_create_carts_table',	1),
(70,	'2020_12_29_114831_create_coupons_table',	1),
(71,	'2020_12_29_114913_create_orders_table',	1),
(72,	'2020_12_29_115013_create_items_table',	1),
(73,	'2020_12_29_115049_create_comments_table',	1),
(74,	'2021_01_12_164809_change_comments_date_type',	1);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `is_discount` tinyint(1) NOT NULL,
  `last_price` int(11) DEFAULT NULL,
  `us_check` tinyint(1) NOT NULL,
  `ma_check` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `user_id`, `date`, `time`, `is_discount`, `last_price`, `us_check`, `ma_check`, `created_at`, `updated_at`) VALUES
(1,	'Member',	'2021-01-15',	'12:43:04',	0,	NULL,	0,	0,	'2021-01-15 04:43:04',	'2021-01-15 04:43:04');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mtAnmP2A4mI41IG0clmlGKPGEToDF0oYooUwOVwV',	1,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36',	'YTo3OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5hZ2UvY29tbWVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJUYVF6NUNaNHZyMVY2ZHRrU1I4djdaa2ExVU5IclhMRUY0UUFGNFNkIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbnMxdzVqUks4eWgvczNIcTNqNTFRT0RNWjdxa1VUNmhqWXE5OTJmekl3eXpwOGpYVm1XV3kiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJG5zMXc1alJLOHloL3MzSHEzajUxUU9ETVo3cWtVVDZoallxOTkyZnpJd3l6cDhqWFZtV1d5Ijt9',	1610715043),
('oVzvSLXzoLdkbDd07oapW2LSXqEG9xYVo9XkZw3r',	1,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36',	'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVGRkWjNyVHU2N0F6SkRhNTlEMzJIaFBMVHhWTzl4NWNFaDlWV0k4OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5hZ2UvY29tbWVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRuczF3NWpSSzh5aC9zM0hxM2o1MVFPRE1aN3FrVVQ2aGpZcTk5MmZ6SXd5enA4alhWbVdXeSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkbnMxdzVqUks4eWgvczNIcTNqNTFRT0RNWjdxa1VUNmhqWXE5OTJmekl3eXpwOGpYVm1XV3kiO30=',	1610760507);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `birthday` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `class` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `sex`, `birthday`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `phone`, `email`, `email_verified_at`, `class`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	1,	'2021-01-01',	'$2y$10$ns1w5jRK8yh/s3Hq3j51QODMZ7qkUT6hjYq992fzIwyzp8jXVmWWy',	'',	'',	'0987654321',	'admin@gmail.com',	NULL,	1,	'',	NULL,	'',	'2021-01-15 04:16:10',	'2021-01-15 04:16:10'),
(2,	'Member',	0,	'2021-01-11',	'$2y$10$mJEUSQOC65Szs86QUWWQAuuTe9YjCOpH2tRGFIbQym9PnqA6DiwaO',	NULL,	NULL,	'0987987987',	'member@gmail.com',	NULL,	0,	NULL,	NULL,	NULL,	'2021-01-15 04:40:28',	'2021-01-15 04:40:28');

-- 2021-01-16 02:05:49
