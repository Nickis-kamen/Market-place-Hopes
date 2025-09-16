-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 16 sep. 2025 à 07:12
-- Version du serveur : 8.0.43-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `market_place2`
--

-- --------------------------------------------------------

--
-- Structure de la table `boosts`
--

CREATE TABLE `boosts` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `amount` int NOT NULL,
  `duration_days` int NOT NULL,
  `starts_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `boosts`
--

INSERT INTO `boosts` (`id`, `product_id`, `user_id`, `amount`, `duration_days`, `starts_at`, `ends_at`, `created_at`, `updated_at`, `is_approved`) VALUES
(1, 4, 3, 5000, 1, '2025-06-16 17:08:08', '2025-06-17 17:08:08', '2025-06-16 17:04:26', '2025-06-16 17:08:08', 1),
(2, 15, 5, 5000, 1, '2025-06-16 17:08:27', '2025-06-17 17:08:27', '2025-06-16 17:05:23', '2025-06-16 17:08:27', 1),
(3, 10, 4, 15000, 3, '2025-06-16 17:08:29', '2025-06-19 17:08:29', '2025-06-16 17:06:14', '2025-06-16 17:08:29', 1),
(4, 19, 6, 5000, 1, '2025-06-16 17:16:38', '2025-06-17 17:16:38', '2025-06-16 17:15:48', '2025-06-16 17:16:38', 1),
(5, 8, 3, 5000, 1, '2025-06-19 08:39:10', '2025-06-20 08:39:10', '2025-06-19 08:13:03', '2025-06-19 08:39:10', 1),
(6, 14, 4, 5000, 1, '2025-06-19 12:32:59', '2025-06-20 12:32:59', '2025-06-19 12:29:52', '2025-06-19 12:32:59', 1),
(7, 23, 5, 15000, 3, '2025-06-20 13:39:45', '2025-06-23 13:39:45', '2025-06-20 09:19:17', '2025-06-20 13:39:45', 1),
(8, 13, 4, 5000, 1, '2025-06-20 16:01:39', '2025-06-21 16:01:39', '2025-06-20 15:56:37', '2025-06-20 16:01:39', 1),
(9, 8, 3, 15000, 3, '2025-06-20 16:32:57', '2025-06-23 16:32:57', '2025-06-20 16:27:19', '2025-06-20 16:32:57', 1),
(10, 16, 5, 5000, 1, '2025-06-20 16:32:54', '2025-06-21 16:32:54', '2025-06-20 16:32:29', '2025-06-20 16:32:54', 1),
(11, 12, 4, 5000, 1, '2025-06-21 06:35:13', '2025-06-22 06:35:13', '2025-06-21 06:34:46', '2025-06-21 06:35:13', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Autre', 'Catégorie des produits par defaut', 'autre', '2025-06-16 15:31:22', '2025-06-16 15:31:22'),
(2, 'Mode & Vêtements', 'Vêtements pour hommes, femmes et enfants, chaussures, accessoires de mode.', 'mode-vetements', '2025-06-16 15:33:51', '2025-06-16 15:33:51'),
(3, 'Électronique', 'Smartphones, tablettes, ordinateurs, télévisions, gadgets et accessoires.', 'electronique', '2025-06-16 15:34:32', '2025-06-16 15:34:32'),
(4, 'Maison & Décoration', 'Meubles, luminaires, articles de cuisine, décoration.', 'maison-decoration', '2025-06-16 15:36:21', '2025-06-16 15:42:18'),
(5, 'Informatique', 'Ordinateurs portables, composants, imprimantes, périphériques.', 'informatique', '2025-06-16 15:37:46', '2025-06-16 15:37:46'),
(6, 'Électroménager', 'Réfrigérateurs, machines à laver, micro-ondes, robots de cuisine.', 'electromenager', '2025-06-16 15:38:31', '2025-06-16 15:38:31'),
(7, 'Jeux & Consoles', 'Jeux vidéo, consoles, accessoires gaming, figurines.', 'jeux-consoles', '2025-06-16 15:39:05', '2025-06-16 15:39:05'),
(8, 'Bricolage & Outils', 'Outillage, visserie, matériaux, peinture, jardinage.', 'bricolage-outils', '2025-06-16 15:39:34', '2025-06-16 15:39:34'),
(9, 'Animaux', 'Nourriture, accessoires pour chiens, chats, oiseaux et autres animaux.', 'animaux', '2025-06-16 15:39:58', '2025-06-16 15:39:58'),
(10, 'Bijoux & Montres', 'Bagues, colliers, bracelets, montres, bijoux fantaisie ou précieux.', 'bijoux-montres', '2025-06-16 15:40:21', '2025-06-16 15:40:21'),
(11, 'Photo & Caméras', 'Appareils photo, caméras, drones, trépieds, cartes mémoire.', 'photo-cameras', '2025-06-16 15:40:40', '2025-06-16 15:40:40'),
(12, 'Sport & Loisirs', 'Équipements sportifs, vêtements, vélos, activités de plein air.', 'sport-loisirs', '2025-06-16 15:41:18', '2025-06-16 15:41:18'),
(13, 'Produits artisanaux', 'Créations locales, objets faits main, artisanat traditionnel.', 'produits-artisanaux', '2025-06-16 15:41:35', '2025-06-16 15:41:35'),
(14, 'Aliments & Cuisine', 'Produits d\'alimentation et fourniture de cuisine et autre', 'aliments-cuisine', '2025-06-16 16:55:20', '2025-06-16 16:55:20'),
(16, 'Accessoires', 'Différente accessoires pour les appareil électroniques ou toute autres appareils', 'accessoires', '2025-06-20 14:00:16', '2025-06-20 14:00:16');

-- --------------------------------------------------------

--
-- Structure de la table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint UNSIGNED NOT NULL,
  `categorie_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category_product`
--

INSERT INTO `category_product` (`id`, `categorie_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 10, 1, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 10, 2, NULL, NULL),
(5, 2, 3, NULL, NULL),
(6, 10, 3, NULL, NULL),
(7, 2, 4, NULL, NULL),
(8, 10, 4, NULL, NULL),
(9, 3, 5, NULL, NULL),
(12, 3, 6, NULL, NULL),
(14, 12, 6, NULL, NULL),
(15, 3, 7, NULL, NULL),
(17, 12, 7, NULL, NULL),
(19, 4, 8, NULL, NULL),
(21, 12, 8, NULL, NULL),
(25, 11, 9, NULL, NULL),
(26, 12, 9, NULL, NULL),
(27, 3, 10, NULL, NULL),
(29, 3, 11, NULL, NULL),
(32, 3, 12, NULL, NULL),
(34, 12, 12, NULL, NULL),
(37, 10, 13, NULL, NULL),
(38, 12, 13, NULL, NULL),
(42, 3, 15, NULL, NULL),
(43, 5, 15, NULL, NULL),
(45, 2, 16, NULL, NULL),
(46, 3, 16, NULL, NULL),
(47, 10, 16, NULL, NULL),
(48, 8, 17, NULL, NULL),
(49, 12, 17, NULL, NULL),
(50, 9, 18, NULL, NULL),
(52, 14, 19, NULL, NULL),
(54, 14, 20, NULL, NULL),
(55, 4, 21, NULL, NULL),
(56, 6, 21, NULL, NULL),
(57, 14, 22, NULL, NULL),
(58, 3, 23, NULL, NULL),
(60, 2, 24, NULL, NULL),
(61, 11, 8, NULL, NULL),
(62, 16, 8, NULL, NULL),
(63, 16, 5, NULL, NULL),
(64, 16, 7, NULL, NULL),
(65, 16, 6, NULL, NULL),
(66, 16, 14, NULL, NULL),
(67, 16, 12, NULL, NULL),
(68, 16, 11, NULL, NULL),
(69, 3, 13, NULL, NULL),
(70, 16, 10, NULL, NULL),
(71, 16, 9, NULL, NULL),
(72, 14, 18, NULL, NULL),
(73, 14, 25, NULL, NULL),
(74, 13, 26, NULL, NULL),
(76, 13, 28, NULL, NULL),
(77, 14, 28, NULL, NULL),
(78, 2, 29, NULL, NULL),
(79, 2, 30, NULL, NULL),
(80, 2, 31, NULL, NULL),
(82, 14, 33, NULL, NULL),
(83, 6, 33, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_15_194627_create_shops_table', 1),
(5, '2025_05_21_155243_create_categories_table', 1),
(6, '2025_05_21_155258_create_products_table', 1),
(7, '2025_05_21_161501_create_category_product_table', 1),
(8, '2025_05_27_151634_create_ratings_table', 1),
(9, '2025_06_02_130200_create_ratings_shops_table', 1),
(10, '2025_06_04_164938_add_stripe_account_id_to_users_table', 1),
(11, '2025_06_05_065456_add_first_name_to_users_table', 1),
(12, '2025_06_05_070521_add_date_naissance_to_users_table', 1),
(13, '2025_06_06_050504_create_orders_table', 1),
(14, '2025_06_06_050522_create_order_items_table', 1),
(15, '2025_06_06_102925_add_stripe_session_id_to_orders_table', 1),
(16, '2025_06_09_104604_add_boost_to_products_table', 1),
(17, '2025_06_11_150304_create_boosts_table', 1),
(18, '2025_06_12_142539_add_is_approved_to_boosts_table', 1),
(19, '2025_06_16_204138_add_is_blocked_to_users_table', 2),
(20, '2025_06_20_111619_add_is_viewed_to_orders_table', 3),
(21, '2025_06_20_115304_add_is_viewed_by_admin_to_users_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `total_amount` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en attente',
  `stripe_session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_viewed_by_vendor` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `vendor_id`, `total_amount`, `status`, `stripe_session_id`, `created_at`, `updated_at`, `is_viewed_by_vendor`) VALUES
(1, 2, 5, 1500000, 'paid', 'pi_3RagjTRf1T1bkQpB0MZOlXth', '2025-06-16 17:22:11', '2025-06-20 09:18:37', 1),
(2, 2, 4, 30000, 'paid', 'pi_3Ragk8Rf1T1bkQpB0L96Ne08', '2025-06-16 17:22:52', '2025-06-20 08:42:29', 1),
(3, 7, 4, 350000, 'paid', 'pi_3RagqPRf1T1bkQpB1cWmTrVd', '2025-06-16 17:29:22', '2025-06-20 08:42:29', 1),
(4, 7, 5, 70000, 'paid', 'pi_3Ragr1Rf1T1bkQpB0YngOQKK', '2025-06-16 17:29:59', '2025-06-20 09:18:37', 1),
(5, 9, 3, 12000, 'paid', 'pi_3Rb1caRf1T1bkQpB0u5W1Vuq', '2025-06-17 15:40:29', '2025-06-20 08:47:29', 1),
(6, 10, 5, 1500000, 'paid', 'pi_3Rb1jJRf1T1bkQpB0enJOvbV', '2025-06-17 15:47:26', '2025-06-20 09:18:37', 1),
(7, 10, 4, 150000, 'paid', 'pi_3Rb1kRRf1T1bkQpB0N3zqCZw', '2025-06-17 15:48:35', '2025-06-20 08:42:29', 1),
(8, 2, 12, 15000, 'paid', 'pi_3RbPQFRf1T1bkQpB1xRdYi7N', '2025-06-18 17:05:20', '2025-06-20 09:17:17', 1),
(9, 11, 3, 60000, 'paid', 'pi_3Rbe2zRf1T1bkQpB1rEsncZK', '2025-06-19 08:42:17', '2025-06-20 08:47:29', 1),
(10, 11, 6, 5000, 'paid', 'pi_3Rbe6HRf1T1bkQpB1AzvapiV', '2025-06-19 08:45:41', '2025-06-20 14:13:20', 1),
(11, 2, 5, 4000000, 'paid', 'pi_3RbhXBRf1T1bkQpB1iCskPKr', '2025-06-19 12:25:42', '2025-06-20 09:18:37', 1),
(12, 10, 4, 180000, 'paid', 'pi_3Rc0dSRf1T1bkQpB03klcavT', '2025-06-20 08:49:27', '2025-06-20 08:50:26', 1),
(13, 16, 12, 20000, 'paid', 'pi_3Rc7DlRf1T1bkQpB13JOSk9C', '2025-06-20 15:51:21', '2025-06-20 15:53:25', 1),
(14, 7, 5, 2000000, 'paid', 'pi_3RcLsdRf1T1bkQpB0VicsUTZ', '2025-06-21 07:30:31', '2025-06-21 07:33:34', 1),
(15, 2, 5, 2000000, 'en attente', 'pi_3S0OPRRf1T1bkQpB0OMppfcP', '2025-08-26 15:03:45', '2025-08-26 15:06:35', 1),
(16, 2, 5, 2000000, 'paid', 'pi_3S0OPRRf1T1bkQpB0OMppfcP', '2025-08-26 15:05:05', '2025-08-26 15:07:22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 15, 1, 1500000, '2025-06-16 17:22:11', '2025-06-16 17:22:11'),
(2, 2, 14, 1, 30000, '2025-06-16 17:22:53', '2025-06-16 17:22:53'),
(3, 3, 12, 2, 40000, '2025-06-16 17:29:22', '2025-06-16 17:29:22'),
(4, 3, 13, 3, 90000, '2025-06-16 17:29:22', '2025-06-16 17:29:22'),
(5, 4, 18, 1, 70000, '2025-06-16 17:29:59', '2025-06-16 17:29:59'),
(6, 5, 4, 1, 12000, '2025-06-17 15:40:29', '2025-06-17 15:40:29'),
(7, 6, 15, 1, 1500000, '2025-06-17 15:47:26', '2025-06-17 15:47:26'),
(8, 7, 13, 1, 90000, '2025-06-17 15:48:35', '2025-06-17 15:48:35'),
(9, 7, 10, 1, 60000, '2025-06-17 15:48:35', '2025-06-17 15:48:35'),
(10, 8, 22, 3, 5000, '2025-06-18 17:05:20', '2025-06-18 17:05:20'),
(11, 9, 8, 1, 60000, '2025-06-19 08:42:17', '2025-06-19 08:42:17'),
(12, 10, 19, 5, 1000, '2025-06-19 08:45:41', '2025-06-19 08:45:41'),
(13, 11, 23, 2, 2000000, '2025-06-19 12:25:42', '2025-06-19 12:25:42'),
(14, 12, 13, 2, 90000, '2025-06-20 08:49:27', '2025-06-20 08:49:27'),
(15, 13, 28, 1, 20000, '2025-06-20 15:51:21', '2025-06-20 15:51:21'),
(16, 14, 23, 1, 2000000, '2025-06-21 07:30:31', '2025-06-21 07:30:31'),
(17, 15, 23, 1, 2000000, '2025-08-26 15:03:45', '2025-08-26 15:03:45'),
(18, 16, 23, 1, 2000000, '2025-08-26 15:05:05', '2025-08-26 15:05:05');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `shop_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_boosted` tinyint(1) NOT NULL DEFAULT '0',
  `boosted_until` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `shop_id`, `title`, `slug`, `description`, `price`, `quantity`, `image`, `created_at`, `updated_at`, `is_boosted`, `boosted_until`) VALUES
(1, 1, 'Mascara', 'mascara', 'Cils déployés et volume extrême, le mascara est l\'atout glamour pour un regard de biche.', 20000, 15, 'uploads/products/VjcuIAhJ1kiw5OdLhXrNImZ54YXZiNjTohT8ARsK.webp', '2025-06-16 16:05:41', '2025-06-16 16:05:41', 0, NULL),
(2, 1, 'Maquillage', 'maquillage', 'Essentiel beauté incontournable, le maquillage est notre meilleur allié ! Teint frais, lèvres gourmandes et smoky eyes,', 25000, 20, 'uploads/products/6pAKKFjwwmA3agpDu1Os8Bjx1n7TwRBhWjj22st8.webp', '2025-06-16 16:06:45', '2025-06-16 16:06:45', 0, NULL),
(3, 1, 'Rouge à lèvre', 'rouge-a-levre', 'Entre glamour et sensualité, le rouge à lèvres est votre plus belle arme.', 15000, 21, 'uploads/products/dykNsCJbrtg5LaaV06J15u7xVqsIAP4Fzdh37vPw.webp', '2025-06-16 16:07:48', '2025-06-16 16:07:48', 0, NULL),
(4, 1, 'Vernis à ongles', 'vernis-a-ongles', 'Le vernis à ongles est un produit cosmétique destiné à embellir, à protéger l\'ongle ou à en masquer certains défauts', 12000, 19, 'uploads/products/6xm7g6mBNCStrmaeagPFOq4VW4CwroOTHqgajdFu.webp', '2025-06-16 16:09:05', '2025-06-17 15:44:08', 1, '2025-06-17 17:08:08'),
(5, 1, 'Chargeur MagSafe', 'chargeur-magsafe', 'Découvrez MagSafe, une nouvelle gamme d\'accessoires rapides à fixer pour iPhone 12.', 50000, 15, 'uploads/products/J9IkJKOo8FRtwIdQ98yIlcvM2Yfk4sPKhxogbqQV.webp', '2025-06-16 16:10:49', '2025-06-20 14:03:51', 0, NULL),
(6, 1, 'Speaker', 'speaker-1', 'Speakers et réalisateurs prennent soin de décrire les décors et les jeux de scène, créant une atmosphère appropriée', 50000, 25, 'uploads/products/npyLQe2dp8Y8M52WeJ20q16uVA2PjZZP5jfenvPU.webp', '2025-06-16 16:13:12', '2025-06-20 14:03:36', 0, NULL),
(7, 1, 'Ecouteur bluetooth', 'ecouteur-bluetooth-1', 'Écouteurs intra-auriculaires, avec technologie de bruit active pour réduire les bruits environnants, double ou triple micro, capteur vocal', 30000, 50, 'uploads/products/91YwJ17oz4veZ1mafQ9SAVI1IalkJR0WwydBP1Yd.webp', '2025-06-16 16:14:24', '2025-06-20 14:03:24', 0, NULL),
(8, 1, 'Led Selfie', 'led-selfie-1', 'LED Selfie Ring Light avec Trépied, Anneau Lumineux 10, avec Télécommande Wireless pour Maquillage, Youtube, TikTok,', 60000, 14, 'uploads/products/zO9sPcSLAgin5GQJZZ0MGK1i6NYkojFwEkFf6Owh.webp', '2025-06-16 16:19:09', '2025-06-20 17:26:30', 1, '2025-06-23 16:32:57'),
(9, 2, 'Support magnétique', 'support-magnetique-1', 'Support aimanté rotatif 360°, compatible tous smartphones, Cameras.', 50000, 35, 'uploads/products/w0g3AmJCAC5LX1NJdrn9QTSVngSynqFLOvGv7Yz5.webp', '2025-06-16 16:27:09', '2025-06-20 14:07:47', 0, NULL),
(10, 2, 'PowerBank MageSafe', 'powerbank-magesafe-1', 'Batterie externe Force Power MagSafe Powerbank 15 W Blanc · Batterie externe Apple MagSafe Blanc ·', 60000, 49, 'uploads/products/8YLYG7RGkC7f4Q0WGKAgRrZaA4ixbEkQIoYlUAGr.webp', '2025-06-16 16:28:29', '2025-06-20 14:07:00', 1, '2025-06-19 17:08:29'),
(11, 2, 'Support téléphone magnétique', 'support-telephone-magnetique-1', 'Support voiture aimanté rotatif 360°, compatible tous smartphones.', 20000, 15, 'uploads/products/Wm6cbWWCEN6Cw6YTDJTnwgolWI90lnLoPSjrsLG5.webp', '2025-06-16 16:29:26', '2025-06-20 14:06:23', 0, NULL),
(12, 2, 'EarPods', 'earpods-1', 'Les écouteurs EarPods avec connecteur Lightning vous permettent de répondre à des appels, de régler le volume et de contrôler la lecture audio et vidéo.', 40000, 23, 'uploads/products/fwKuOM1AFr9JUbM3I69exsAlCID8jc9vOO1hLmpH.webp', '2025-06-16 16:30:29', '2025-06-21 06:35:13', 1, '2025-06-22 06:35:13'),
(13, 2, 'Apple Watch', 'apple-watch-1', 'L\'Apple Watch est votre alliée idéale pour une vie saine. Trois modèles : Apple Watch Ultra 2, Apple Watch Series 10 et Apple Watch SE.', 90000, 30, 'uploads/products/bu2ITTKVJEAZRVvdfdxqAkZadR5S26rkG9ZM7tRu.webp', '2025-06-16 16:31:36', '2025-06-20 16:01:39', 1, '2025-06-21 16:01:39'),
(14, 2, 'Housse Gomme', 'housse-gomme-1', 'Pour IPhone 12/13\r\nAnti-Choc', 30000, 29, 'uploads/products/DfwCW2j7E0KPTGhfGYSse4t5GxlwqsEFO0hJKeVk.webp', '2025-06-16 16:32:57', '2025-06-20 14:05:12', 1, '2025-06-20 12:32:59'),
(15, 3, 'Macbook Air M2', 'macbook-air-m2-1', 'Cet ordinateur de 13,6 pouces possède une puce M2 au GPU élevé, une RAM pouvant aller de 8 à 24 Go et une mémoire interne pouvant atteindre 2 To', 1500000, 3, 'uploads/products/snWubRB8jozJZsfv0LrvG2GROBZA0IRWmTRexMIR.webp', '2025-06-16 16:41:33', '2025-06-20 14:12:28', 1, '2025-06-17 17:08:27'),
(16, 3, 'Rolex', 'rolex', '· Montres Rolex · Nouveaux modèles 2025 · Trouvez votre Rolex · La collection · Air‑King · Cosmograph Daytona · Savoir‑faire horloger', 200000, 15, 'uploads/products/SyaHHBQDkwx1J1rtYWBauO8ELZZkT5PHSto3H7Ag.webp', '2025-06-16 16:42:43', '2025-06-20 16:32:54', 1, '2025-06-21 16:32:54'),
(17, 3, 'Panier de basket', 'panier-de-basket', 'Panier de Basket de porte AUSTIN à accroche bonne qualité', 20000, 18, 'uploads/products/o4e85X9IsX6xvD5AodxQRZVhTpeGVZbNTpCSfe2C.webp', '2025-06-16 16:44:32', '2025-06-16 16:44:32', 0, NULL),
(18, 3, 'Royal Canin', 'royal-canin-1', 'Elles sont complètes et équilibrées pour répondre aux besoins de votre chien en fonction de son âge, de sa taille, de son activité', 70000, 28, 'uploads/products/W7Heo6HWHjI0ZOx6Ddjzl8jHntM0aa1lyou3Zckx.webp', '2025-06-16 16:46:25', '2025-06-20 14:10:08', 0, NULL),
(19, 4, 'Pomme', 'pomme-1', 'Fruit à pépins du pommier, généralement de forme ronde, de couleur et de saveur variables selon les espèces, à pulpe ferme et dont le jus fermenté produit le cidre', 1000, 45, 'uploads/products/ItgwgeCyAb9ymrGkEjfeP9E9qea4ZDtKF2ZHKc9u.webp', '2025-06-16 16:53:47', '2025-06-20 14:14:04', 1, '2025-06-17 17:16:38'),
(20, 4, 'Fouet', 'fouet-1', 'ouet Cuisine Fouetter les fouilles de cuisine avec des crochets 9 \"11\", ballon fouetter for cuisiner mélange fouettant en remuant de mousse,', 15000, 26, 'uploads/products/YOgjvuttjGC66AeZKt6hpZ16CnODv8y01CXodBKG.webp', '2025-06-16 16:57:30', '2025-06-20 14:14:19', 0, NULL),
(21, 5, 'Lit en bois', 'lit-en-bois', 'Deux places  Finition Verni Teinté Palissandre, Verni Teinté Mauve, Verni naturel, Verni Pastel Rose', 400000, 5, 'uploads/products/E8y3cz4cVlNJ1QL2xGIwtNTZOF78AjSJVBznnFTU.webp', '2025-06-18 16:34:32', '2025-06-18 16:34:32', 0, NULL),
(22, 5, 'Viande', 'viande', 'Viande de bœuf frais par kg', 5000, 22, 'uploads/products/Lb4qEM7M4LVF8qUiLYEMe7Nu0cUPwutTqxMfThCW.webp', '2025-06-18 16:36:29', '2025-06-20 09:17:17', 0, NULL),
(23, 3, 'IPhone 13 Pro Max', 'iphone-13-pro-max-1', 'Stockage 256go /\r\nModel LL /\r\nFace Id', 2000000, 11, 'uploads/products/skKWj1X2Jq0gYyxzJmiYWKSHxa3WIwlYCEBK7kh3.webp', '2025-06-18 16:41:40', '2025-08-26 15:07:22', 1, '2025-06-23 13:39:45'),
(24, 7, 'Mascara', 'mascara-1', 'Cils déployés et volume extrême, le mascara est l\'atout glamour pour un regard de biche. Noir intense, vert sapin ou marron glacé,', 10000, 25, 'uploads/products/mINuqpNCSHB12q53QpDqBZFMCbcavmcgXyhHIx8r.webp', '2025-06-20 08:08:12', '2025-06-20 08:08:12', 0, NULL),
(25, 4, 'Huile de tournesaul 1L', 'huile-de-tournesaul-1l', 'Conditions d\'utilisation : A froid : pour salades, crudités, marinades, mayonnaises…A chaud : pour cuissons à la poêle ou au four, fritures, pâtisseries.', 10000, 25, 'uploads/products/0g1aZljhxYGXRiFmOlv4MHlqd2kDUeIIbuTy24pQ.webp', '2025-06-20 14:16:40', '2025-06-20 14:16:40', 0, NULL),
(26, 4, 'Huile d\'argan', 'huile-dargan', 'Cette huile originaire du Maroc, riche en vitamine E et en insaponifiables, est réputée pour ses propriétés nourrissantes, régénérantes et restructurantes.', 20000, 50, 'uploads/products/s2V5kXuxCdzUbznSWGlIP37kENoAG8ugjYE7bplw.png', '2025-06-20 14:34:21', '2025-06-20 14:34:21', 0, NULL),
(28, 5, 'Miel de Madagascar 250ml', 'miel-de-madagascar-250ml', '100% Naturel , la Compagnie du miel a emmené le miel de Madagascar dans l\'exigeante sphère de la haute gastronomie.', 20000, 49, 'uploads/products/22d2MlG5l9M0XBZXL5X9FTCQZPoUtlc2gYQ2BSeP.webp', '2025-06-20 15:22:48', '2025-06-20 15:53:24', 0, NULL),
(29, 8, 'Parfum', 'parfum', 'une odeur ou plus souvent une composition odorante plus ou moins persistante naturellement émise par une plante, un animal, un champignon', 10000, 50, 'uploads/products/bCwOiRFNo7ipjni7xcf4etVB8VSIQ1a3Anu7F3MZ.webp', '2025-06-20 16:43:45', '2025-06-20 16:43:45', 0, NULL),
(30, 8, 'Nike Air Jordan One', 'nike-air-jordan-one', 'Véritable cuir pointure 36 à 42', 100000, 50, 'uploads/products/OwAd5GFU5MGqNYrjYgF3yOcG6zLHgd2GQc1lWQjq.webp', '2025-06-20 17:04:44', '2025-06-20 17:04:44', 0, NULL),
(31, 8, 'Puma', 'puma', 'veritable daim pointure 36 à 42', 30000, 20, 'uploads/products/C5hi5PYk5q4pR9NzCTHCkLCYrcaJrlSzogo9DMT7.webp', '2025-06-20 17:05:56', '2025-06-20 17:05:56', 0, NULL),
(33, 8, 'Mixer Vista', 'mixer-vista-1', 'Bol verre 1,75 L, Puissance 800 W, Verrouillage sûr, Ergonomique, Broyeur à grains, Smoothies, Glace pilée, Blendforce, Noir ...', 40000, 5, 'uploads/products/960JsRi1rKhwQFzX6mxHuyn25qqXlivSi7BXWLIH.webp', '2025-06-20 17:10:49', '2025-06-20 17:11:03', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `rating` tinyint NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 15, 5, 'Trop cool', '2025-06-16 17:20:30', '2025-06-16 17:20:30'),
(2, 2, 14, 4, 'Cool', '2025-06-16 17:21:11', '2025-06-16 17:21:11'),
(3, 7, 4, 4, NULL, '2025-06-16 17:31:32', '2025-06-16 17:31:32'),
(4, 7, 15, 3, 'moyen', '2025-06-16 17:33:09', '2025-06-16 17:33:09'),
(5, 7, 13, 2, 'Mauvais', '2025-06-16 17:33:38', '2025-06-16 17:33:38'),
(6, 8, 23, 5, 'Bonne qualité', '2025-06-18 17:12:27', '2025-06-18 17:12:27'),
(7, 2, 10, 3, NULL, '2025-06-19 06:15:56', '2025-06-19 06:15:56'),
(8, 2, 13, 5, NULL, '2025-06-19 06:16:49', '2025-06-19 06:16:49'),
(9, 2, 16, 5, NULL, '2025-06-19 06:17:16', '2025-06-19 06:17:16'),
(10, 2, 22, 4, 'Delicieux', '2025-06-19 06:45:31', '2025-06-19 06:45:31'),
(11, 16, 28, 4, 'Cool', '2025-06-20 15:48:06', '2025-06-20 15:48:06'),
(12, 2, 23, 4, 'oauu', '2025-08-26 15:02:10', '2025-08-26 15:02:10');

-- --------------------------------------------------------

--
-- Structure de la table `ratings_shops`
--

CREATE TABLE `ratings_shops` (
  `id` bigint UNSIGNED NOT NULL,
  `shop_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` tinyint NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ratings_shops`
--

INSERT INTO `ratings_shops` (`id`, `shop_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 5, 'Service rapide', '2025-06-16 17:30:24', '2025-06-16 17:30:24'),
(2, 3, 7, 5, 'Cool', '2025-06-16 17:30:50', '2025-06-16 17:30:50'),
(3, 4, 7, 3, 'moyen', '2025-06-16 17:31:06', '2025-06-16 17:31:06'),
(4, 2, 11, 3, NULL, '2025-06-18 12:29:09', '2025-06-18 12:29:09'),
(5, 3, 2, 4, NULL, '2025-06-18 16:57:39', '2025-06-18 16:57:39'),
(6, 5, 16, 4, NULL, '2025-06-20 15:47:45', '2025-06-20 15:47:45');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KwmQB9gV61FAmSkVqXlP6BTsO109yyIlQaAD9Yse', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUE4zM3FMaWRpQ29lekx4V1I3a2ZCS3FMVXR2UHdTZ1FFWjB5dnlpOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1756220867);

-- --------------------------------------------------------

--
-- Structure de la table `shops`
--

CREATE TABLE `shops` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`id`, `name`, `user_id`, `slug`, `description`, `adresse`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Boutique de Kamen', 3, 'boutique-de-kamen', 'Boutique de vêtements tendance pour jeunes, style streetwear et casual.', 'Andavamamba', 'uploads/shops/oC4Vvre3OXt1vevXCFi7ss4qKaXN01IKwsTFa9nA.jpg', '2025-06-16 15:53:10', '2025-06-16 15:53:10'),
(2, 'Boutique de Rakoto', 4, 'boutique-de-rakoto', 'Vente de differente article de technologie et autre', 'Andravoahangy', 'uploads/shops/shop_default.jpg', '2025-06-16 16:22:01', '2025-06-16 16:22:01'),
(3, 'Naivo Boutique', 5, 'naivo-boutique', 'Vente de vetement et different accessoire a la maison', 'Anosy', 'uploads/shops/FNO2JAq2yyGMz94yhl1zs7H6lSIXA5J3FnlZUKft.png', '2025-06-16 16:37:00', '2025-06-16 16:37:00'),
(4, 'Boutique Flash', 6, 'boutique-flash', 'Vente de diffirente article de mode et d\'alimentation', 'Analakely', 'uploads/shops/YGATMajspiexHuW6qD3pPULNRdmRYm2wGDy8lUXJ.png', '2025-06-16 16:49:39', '2025-06-16 16:49:39'),
(5, 'Katsaka Boutique', 12, 'katsaka-boutique', 'Vente d\'électroménager et d\'autre article', 'Analakely', 'uploads/shops/ystpNzRFbZOtCtFya0I2fFucm5VguGW4kF6Dd5rf.png', '2025-06-18 16:23:58', '2025-06-18 16:23:58'),
(7, 'Boutique de Kamen', 14, 'boutique-de-kamen-1', 'Vente article de maison', 'Manjakaray', 'uploads/shops/shop_default.jpg', '2025-06-20 07:58:20', '2025-06-20 07:58:20'),
(8, 'BoutiqueMbe', 13, 'boutiquembe', 'Vente d\'article électroménager', 'Itaosy', 'uploads/shops/shop_default.jpg', '2025-06-20 16:39:11', '2025-06-20 16:39:23');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/user_default.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('customer','vendor','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `is_viewed_by_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `is_verified`, `verification_token`, `password`, `role`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`, `stripe_account_id`, `first_name`, `date_naissance`, `is_blocked`, `is_viewed_by_admin`) VALUES
(1, 'admin', 'images/user_default.png', 'admin@gmail.com', '2025-06-16 15:31:21', 1, NULL, '$2y$12$AKNLyzA37UkA6zq9a/WIHuBgMdb.FbV7wS0sTOk4WtCoV4iPC0uyG', 'admin', '0330683879', '123 Main St', 'sXBsqmOLZi2fROhmXaxh56nRZSzUkYQpSQhQ6bSccaHuDFc8adB9lLdYncy6', '2025-06-16 15:31:22', '2025-06-20 16:06:17', NULL, NULL, NULL, 0, 1),
(2, 'Nickis', 'profile_images/TfqsA9kBWjWcvYRb9Df1o4rzjfLoyuHX8PgBJVZb.jpg', 'client@gmail.com', '2025-06-16 15:46:17', 1, NULL, '$2y$12$zpf3eDYw4eajU.DA6BMyn.IXroK6FySQ.7ArcGY62wU5U.IB1zX3.', 'customer', '0330683879', 'Manjakaray', NULL, '2025-06-16 15:45:55', '2025-06-20 09:07:08', NULL, 'Kamen', '2002-05-01', 0, 1),
(3, 'Kamen', 'profile_images/hoAMRLSOmJt6pXyk3Vc4PdgWeVB6eSuOCMkUQuDf.jpg', 'vendeur@gmail.com', '2025-06-16 15:48:17', 1, NULL, '$2y$12$vBTwvyfGAzvE2NxcGmJ5BuHY7mXLrE1TnnU.bZOQ.i5pmVg/illCO', 'vendor', '0330683879', 'Manjakaray', NULL, '2025-06-16 15:48:09', '2025-06-20 09:07:08', 'acct_1RafLpD5RXptVx6i', 'Nickis', '2002-05-02', 0, 1),
(4, 'Rakoto', 'images/user_default.png', 'vendeur2@gmail.com', '2025-06-16 16:20:50', 1, NULL, '$2y$12$HTwiuJvtbf./pHtxlTIIjOnRx4PPpk.tyYqcmauPTJXedVecOV3fK', 'vendor', '0330683875', 'Manjakaray', NULL, '2025-06-16 16:20:44', '2025-06-20 09:07:08', 'acct_1RafnUD79WTDfpTS', 'Test', '2003-01-05', 0, 1),
(5, 'Naivo', 'images/user_default.png', 'vendeur3@gmail.com', '2025-06-16 16:35:04', 1, NULL, '$2y$12$9kVQ5pQ.flUinsuYa26RQ.xVXMJ3v0yDqjfjy5n9DzJrPu6FaOnJG', 'vendor', '0340683879', 'Itaosy', NULL, '2025-06-16 16:34:59', '2025-06-20 09:07:08', 'acct_1Rag20Rcz6e3yxnQ', 'Vendeur', '1995-03-05', 0, 1),
(6, 'John', 'images/user_default.png', 'vendeur4@gmail.com', '2025-06-16 16:48:22', 1, NULL, '$2y$12$CsxKdtslegDzKJ4qD/n21Oi/.G1Cdn91hERQxQYa89HAnJx0pbMsm', 'vendor', '0380683879', 'Analakely', NULL, '2025-06-16 16:48:10', '2025-06-20 09:07:08', 'acct_1RagECRmcq5bJ0Iv', 'Doe', '2004-12-15', 0, 1),
(7, 'Bema', 'images/user_default.png', 'client2@gmail.com', '2025-06-16 17:27:40', 1, NULL, '$2y$12$1hgsHBbyF9RE9rjgGmu11eNRR4Ew3WgQdgiUVjovn9ik5Ik.WdDfu', 'customer', '0340683877', 'Manjakaray', NULL, '2025-06-16 17:27:32', '2025-06-20 09:07:08', NULL, 'Koto', '2005-06-25', 0, 1),
(8, 'Jack', 'images/user_default.png', 'client3@gmail.com', '2025-06-18 17:09:46', 1, NULL, '$2y$12$3up2mWqR2Cv/jdZZBFiRbuWzDYZ37dsZ0xJEyapGR0FjLIRexBslC', 'customer', '0325683879', 'Ankorondrano', NULL, '2025-06-17 15:32:07', '2025-06-20 09:07:08', NULL, 'Client', '2005-06-03', 0, 1),
(9, 'Jack', 'images/user_default.png', 'client4@gmail.com', '2025-06-17 15:38:42', 1, NULL, '$2y$12$jA6/arFL.6KPunrTlxikc.g4zlJEMqu8NBQqySgz.OtgJxHh/Nsyi', 'customer', '0325683779', 'Ankorondrano', NULL, '2025-06-17 15:38:32', '2025-06-20 09:07:08', NULL, 'Rose', '2002-07-08', 0, 1),
(10, 'Jean', 'images/user_default.png', 'client5@gmail.com', '2025-06-17 15:45:32', 1, NULL, '$2y$12$QCnzWBqjRW/ZYDcTMWRR5ulf4c1OMm0PcffJ8EGS8//lue5RmxoGa', 'customer', '0370583879', 'Manjakaray', NULL, '2025-06-17 15:45:26', '2025-06-20 09:07:08', NULL, 'Vier', '2007-05-06', 0, 1),
(11, 'Naina', 'images/user_default.png', 'client6@gmail.com', '2025-06-18 12:28:30', 1, NULL, '$2y$12$nPHa3gN41cZ7JJ/cy/.qyegrdP71kn3q00QJrNURY5PJdXhTj0Vfm', 'customer', '0388683879', 'Anjanahary', NULL, '2025-06-18 12:28:13', '2025-06-20 09:07:08', NULL, 'Rabe', '2002-05-15', 0, 1),
(12, 'Katsaka', 'images/user_default.png', 'vendeur5@gmail.com', '2025-06-18 16:17:52', 1, NULL, '$2y$12$NeoRDkwUtljAWLNNaNBq1.ItcesKfhYgqs8VoSZfrPiDu.3YlC6ou', 'vendor', '0333983879', 'Analakely', NULL, '2025-06-18 16:11:44', '2025-06-20 09:07:08', 'acct_1RbOmdRWikUQmkoo', 'test', '2004-06-28', 0, 1),
(13, 'Katsaka', 'images/user_default.png', 'vendeur6@gmail.com', '2025-06-18 16:13:28', 1, NULL, '$2y$12$2dkaa/jOZJcNlW3Gb0azK.X0cIUfeoUzRdXduo3/nQNqVZtRKs6xi', 'vendor', '0333983879', 'Analakely', NULL, '2025-06-18 16:13:16', '2025-06-20 16:39:45', 'acct_1Rc7ybRYXK9UZqpS', 'test', '2004-06-28', 0, 1),
(14, 'Niaina', 'images/user_default.png', 'vendeur7@gmail.com', '2025-06-20 07:55:01', 1, NULL, '$2y$12$cJoM/aYvAa4PfKggx/ye0OtSlbuMUABD7KMtyxBoUhCdNTM77/6Pi', 'vendor', '0371683879', 'Ankorondrano', NULL, '2025-06-20 07:54:46', '2025-06-20 09:07:08', 'acct_1RbzqZDA9BMDdct5', 'Vendeur', '2001-02-06', 0, 1),
(15, 'Rindra', 'images/user_default.png', 'client7@gmail.com', '2025-06-20 09:12:09', 1, NULL, '$2y$12$0/.h184Lb2MudX8tC6qPX.NzA8Tq5J9zpssFnqziPkyroC.mv7Wja', 'customer', '0325883879', 'Manjakaray', NULL, '2025-06-20 09:12:03', '2025-06-20 09:12:41', NULL, 'Client', '2000-06-13', 0, 1),
(16, 'Kill', 'images/user_default.png', 'client8@gmail.com', '2025-06-20 15:46:36', 1, NULL, '$2y$12$cYfp9LJzhEg4WkYKwXip5.mI4m44lyJpMyJw4f/QII8vWpTTCrWV6', 'customer', '0388883879', 'Manjakaray', NULL, '2025-06-20 15:46:21', '2025-06-20 15:58:34', NULL, 'Client', '2000-05-12', 0, 1),
(17, 'Kamen', 'images/user_default.png', 'tahina@gmail.com.com', NULL, 0, 'jcPolhfhb5kkw5nWymnm2NFbS25zz1B6l9mENRKiGmTOFlQInAdHNlquyjWdWQm0', '$2y$12$IUzxpB1o3PL45l4yTkgNeu2DrdZP2kOvGfnZIWmwz.nE6j5gCap4u', 'vendor', '0330683879', 'Ankorondrano', NULL, '2025-06-21 07:42:26', '2025-06-21 07:46:12', NULL, 'Tahina', '1999-02-01', 0, 1),
(18, 'Kamen', 'images/user_default.png', 'client10@gmail.com', NULL, 0, 'abFJUGOeis4WCmfS7T3Kni64jERlPHMAyrsh5fOGg8FzvD1gZRFKX8ti8ms8jHwY', '$2y$12$WFTr7.NAoAh0ipLIM/NAFOemphd0XFENH8ZyLLNjUl5CAobyLhBz2', 'customer', '0330683879', 'Manjakaray', NULL, '2025-08-16 08:11:09', '2025-08-16 08:11:09', NULL, 'Test', '2002-08-08', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boosts`
--
ALTER TABLE `boosts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boosts_product_id_foreign` (`product_id`),
  ADD KEY `boosts_user_id_foreign` (`user_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Index pour la table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_categorie_id_foreign` (`categorie_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_vendor_id_foreign` (`vendor_id`);

--
-- Index pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_shop_id_foreign` (`shop_id`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ratings_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`);

--
-- Index pour la table `ratings_shops`
--
ALTER TABLE `ratings_shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ratings_shops_shop_id_user_id_unique` (`shop_id`,`user_id`),
  ADD KEY `ratings_shops_user_id_foreign` (`user_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shops_slug_unique` (`slug`),
  ADD KEY `shops_user_id_foreign` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boosts`
--
ALTER TABLE `boosts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `ratings_shops`
--
ALTER TABLE `ratings_shops`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boosts`
--
ALTER TABLE `boosts`
  ADD CONSTRAINT `boosts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `boosts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ratings_shops`
--
ALTER TABLE `ratings_shops`
  ADD CONSTRAINT `ratings_shops_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
