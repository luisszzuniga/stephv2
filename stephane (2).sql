-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 01 avr. 2021 à 09:53
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stephane`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(21, 'Île de Ré', 'de', '2021-03-30 09:51:38', '2021-03-30 09:51:38'),
(20, 'Nature', 'de', '2021-03-30 09:51:33', '2021-03-30 09:51:33'),
(22, 'Noir et blanc', 'de', '2021-03-30 09:51:43', '2021-03-30 09:51:43');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `name`, `description`, `category_id`, `sub_category_id`, `price`, `url`, `created_at`, `updated_at`) VALUES
(4, 'Monopoly', 'ded', 20, 8, 1, 'uploads/Nature/Félins/60632feb8d0ed5.81487789.jpg', '2021-03-30 12:04:27', '2021-03-30 12:22:16'),
(3, 'test', 'test', 21, 6, 1, 'uploads/Île de Ré/Oiseaux/60632178294883.98826233.jpg', '2021-03-30 11:02:48', '2021-03-30 11:02:48'),
(5, 'test', 'test', 21, 7, 1, 'uploads/Île de Ré/Plages/60639c7da9d468.04217470.jpg', '2021-03-30 19:47:41', '2021-03-30 19:47:41'),
(6, 'tettet', 'te', 21, 6, 1, 'uploads/Île de Ré/Oiseaux/60639c8c251ce6.90937721.jpg', '2021-03-30 19:47:56', '2021-03-30 19:47:56'),
(7, 'tete', 'tete', 21, 6, 7, 'uploads/Île de Ré/Oiseaux/60639cc6826959.97222466.jpg', '2021-03-30 19:48:54', '2021-03-30 19:48:54'),
(8, 'tetetet', 'ettetet', 21, 6, 7, 'uploads/Île de Ré/Oiseaux/60639ccfe53535.86613539.jpg', '2021-03-30 19:49:03', '2021-03-30 19:49:03'),
(9, 'tetet', 'etetet', 21, 6, 7, 'uploads/Île de Ré/Oiseaux/60639cd9c7b4b9.88725321.jpg', '2021-03-30 19:49:13', '2021-03-30 19:49:13'),
(10, 'etete', 'tetet', 21, 6, 3, 'uploads/Île de Ré/Oiseaux/60639cea3a9917.34521487.jpg', '2021-03-30 19:49:30', '2021-03-30 19:49:30'),
(11, 'tetete', 'tetetet', 21, 6, 7, 'uploads/Île de Ré/Oiseaux/60639cf53af613.06618267.jpg', '2021-03-30 19:49:41', '2021-03-30 19:49:41'),
(12, 'tetet', 'etetet', 21, 6, 3, 'uploads/Île de Ré/Oiseaux/60639d3c420fa9.51214214.jpg', '2021-03-30 19:50:52', '2021-03-30 19:50:52'),
(13, 'zfesfsdf', 'sdfsdfsdf', 21, 7, 10, 'uploads/Île de Ré/Plages/60639d4480d9a6.05032154.jpg', '2021-03-30 19:51:00', '2021-03-30 19:51:00'),
(14, 'sdfsfsd', 'fsdfsdfsd', 21, 6, 10, 'uploads/Île de Ré/Oiseaux/60639d4dece1a9.13577638.jpg', '2021-03-30 19:51:09', '2021-03-30 19:51:09'),
(15, 'test', 'test', 21, 0, 7, 'uploads/Île de Ré/606476354f7d76.89454845.png', '2021-03-31 11:16:37', '2021-03-31 11:16:37');

-- --------------------------------------------------------

--
-- Structure de la table `index_images`
--

DROP TABLE IF EXISTS `index_images`;
CREATE TABLE IF NOT EXISTS `index_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `index_images`
--

INSERT INTO `index_images` (`id`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL),
(2, 3, NULL, NULL),
(3, 8, '2021-04-01 07:24:06', '2021-04-01 07:24:06'),
(5, 9, '2021-04-01 07:32:28', '2021-04-01 07:32:28');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_03_29_133436_create_sessions_table', 1),
(7, '2021_03_29_133831_create_images_table', 1),
(8, '2021_03_29_133851_create_categories_table', 1),
(9, '2021_03_29_133902_create_sub_categories_table', 1),
(10, '2021_03_29_133927_create_admins_table', 1),
(12, '2021_03_29_134019_create_comments_table', 2),
(13, '2021_03_30_202626_create_index_images_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7xr1BnyaVEh898or17gCdRCzcCb2hTcZbsSjyLfB', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia0xROExFSmxWQVpzWVdJd2VHZmJmZndUa3JmYkRwNGhjNURwS1JiYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9waG90b2dyYXBoeS8lQzMlOEVsZSUyMGRlJTIwUiVDMyVBOSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRvSGhEenVmQ3VKdG11WThDN3dmZi8ueDhVVDhKYzVlWDhrQlJ5Sm5TeC5tMkhJZkQ3TVBncSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkb0hoRHp1ZkN1SnRtdVk4Qzd3ZmYvLng4VVQ4SmM1ZVg4a0JSeUpuU3gubTJISWZEN01QZ3EiO30=', 1617197151),
('oT4jEPd3Po4OqlG9PMQuW0iGl4j6eQHCs0cbmlCH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkxsTmRLUXczQWVCYnVrNnY0cko1TnRLTmlpSmNOTkZlZlBtZjRnTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9waG90b2dyYXBoeS8lQzMlOEVsZSUyMGRlJTIwUiVDMyVBOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1617227617),
('HTnnSKsKXBdRyF5AYoNw8xjogHUrDdT8Mqzz0KYR', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNmpZejBPcjV2bWhCUUJCSVkydVByQnNPZ2kyQjVDZDA4UWVkR0JNUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRvSGhEenVmQ3VKdG11WThDN3dmZi8ueDhVVDhKYzVlWDhrQlJ5Sm5TeC5tMkhJZkQ3TVBncSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkb0hoRHp1ZkN1SnRtdVk4Qzd3ZmYvLng4VVQ4SmM1ZVg4a0JSeUpuU3gubTJISWZEN01QZ3EiO30=', 1617269552);

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(6, 'Oiseaux', 'de', 21, '2021-03-30 09:51:54', '2021-03-30 09:51:54'),
(7, 'Plages', 'de', 21, '2021-03-30 09:52:02', '2021-03-30 09:52:02'),
(8, 'Félins', 'de', 20, '2021-03-30 09:52:10', '2021-03-30 09:52:10'),
(9, 'Elephants', 'de\r\n', 20, '2021-03-30 09:52:21', '2021-03-30 09:52:21'),
(10, 'Costa Rica', 'de', 22, '2021-03-30 09:52:32', '2021-03-30 09:52:32'),
(11, 'Portraits', 'dz', 22, '2021-03-30 09:52:38', '2021-03-30 09:52:38');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8_unicode_ci,
  `fav_images` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `fav_images`, `created_at`, `updated_at`) VALUES
(1, 'Luis Zuniga', 'Luiszu7779@gmail.com', NULL, '$2y$10$oHhDzufCuJtmuY8C7wff/.x8UT8Jc5eX8kBRyJnSx.m2HIfD7MPgq', NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-29 12:01:08', '2021-03-29 12:01:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
