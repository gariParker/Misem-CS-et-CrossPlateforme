-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2024 at 10:08 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `laravel_crud_api`
--

CREATE TABLE `laravel_crud_api` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laravel_crud_api`
--

INSERT INTO `laravel_crud_api` (`id`, `name`, `lastname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(24, 'Test', 'ohatra', 'testets@gmail.com', '$2y$12$obsinwgFGFjilq5awDBGd.UhSGjLq7hzuxx5hlQZmS40IwCRC/sOi', '2024-05-22 23:26:22', '2024-05-22 23:41:20'),
(27, 'Manampisoa', 'Sitrakiniaina', 'dasy@gmail.com', '$2y$12$tlZnffaCg9ZrqmUu6WOLrujC1MBmq4SDLlE3Lb1mWECdaeXKYItFW', '2024-05-23 15:43:21', '2024-06-05 15:15:36'),
(28, 'Ladino', 'Sedy', 'sedera@gmail.com', '$2y$12$QNiMlrmry74UVVpAwtlWVuel1GK5OKvChwxo9K1oAZo0uj42dZg9y', '2024-05-23 16:18:05', '2024-05-23 16:21:07'),
(31, 'Gary', 'Parker', 'onjaniainamapionona@gmail.com', '$2y$12$g.ddKdJ4aX628AUyzmPdkumPwAFvPhBOWOTJ94bMDMPnKsQts4D1C', '2024-06-09 17:09:55', '2024-06-09 17:09:55'),
(32, 'Lalaina', 'Rajoelison', 'raj@gmail.com', '$2y$12$58W4J6iGuYPM4UreB7qCJOTULIuipu.P5kUuAnLBwKdnvQft3W2jG', '2024-06-10 17:11:11', '2024-06-10 17:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_15_211558_create_laravel_crud_apis_table', 1),
(6, '2024_06_07_204825_create_table_users_table', 2),
(7, '2024_06_07_214654_create_table_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\table_user', 2, 'auth_token', '3e30c90dff4d4e766440277d0826dc4d6674dc048ca523e728a3a13e1f669c76', '[\"*\"]', NULL, NULL, '2024-06-09 16:53:53', '2024-06-09 16:53:53'),
(2, 'App\\Models\\table_user', 2, 'auth_token', '8008cd59ae6e9c012f6ee0612ec19089b5d54feef7c8b2c61ba71c5cd59173c4', '[\"*\"]', NULL, NULL, '2024-06-09 16:55:51', '2024-06-09 16:55:51'),
(3, 'App\\Models\\table_user', 2, 'auth_token', '3b5fa911d0270d04393641c5e3a5dcd0380141f62bef175400d12bfa1bf78292', '[\"*\"]', NULL, NULL, '2024-06-09 17:04:08', '2024-06-09 17:04:08'),
(4, 'App\\Models\\table_user', 1, 'auth_token', '63d38bf84f938f8ddc08b70a88f963f205fa450a2c5f00491ceecdfd90b8cab5', '[\"*\"]', NULL, NULL, '2024-06-09 17:07:42', '2024-06-09 17:07:42'),
(5, 'App\\Models\\table_user', 3, 'auth_token', '26c85c5ba44b12d704c7b58c7fda69af12ed5c62a22018acf664d65cbdbf1016', '[\"*\"]', NULL, NULL, '2024-06-09 17:09:29', '2024-06-09 17:09:29'),
(6, 'App\\Models\\table_user', 1, 'auth_token', 'fedb55bb40afb6629d9ef8d25e9da9a72a87cc38b1abe55cc26a199a8e99bdfc', '[\"*\"]', NULL, NULL, '2024-06-10 00:38:22', '2024-06-10 00:38:22'),
(7, 'App\\Models\\table_user', 1, 'auth_token', 'b024323cadd6382650e749242f6b4da6f07c23a8869128a1a30dfc49077b63cf', '[\"*\"]', NULL, NULL, '2024-06-10 16:13:16', '2024-06-10 16:13:16'),
(8, 'App\\Models\\table_user', 1, 'auth_token', '7f90737819a13b8f381039f1544cfd2c66685cbd94d6103925556fe110c57443', '[\"*\"]', NULL, NULL, '2024-06-10 17:45:59', '2024-06-10 17:45:59'),
(9, 'App\\Models\\table_user', 1, 'auth_token', '67c00d2b73c6bac7826f6c48eefd1a9756c57d6cb51fa1a751b02c6733714da6', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:17', '2024-06-10 18:00:17'),
(10, 'App\\Models\\table_user', 1, 'auth_token', '114950cdbc1e1490fa2f8808a3f2c3601e0aa0a285dcdada08e77a5158d4d0b3', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:24', '2024-06-10 18:00:24'),
(11, 'App\\Models\\table_user', 1, 'auth_token', '79794eaa146d4f60b390c330ddf9d327ee631a9f621632bf916510f94ccc2535', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:25', '2024-06-10 18:00:25'),
(12, 'App\\Models\\table_user', 1, 'auth_token', '9b9b103299f003d4e51ffb57f7e74fcc883eb8e43651683cc9df33bb02f27581', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:26', '2024-06-10 18:00:26'),
(13, 'App\\Models\\table_user', 1, 'auth_token', 'dd4a03dbc7af569848c0cfdbfdf56cddb766645426a41e456969c4a7640bd73e', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:26', '2024-06-10 18:00:26'),
(14, 'App\\Models\\table_user', 1, 'auth_token', '1546a8cd79b9b025aa73ef71227281c99849b370b3080a83b567f8f658760342', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:27', '2024-06-10 18:00:27'),
(15, 'App\\Models\\table_user', 1, 'auth_token', 'dcafff11c109dd285a0416d425517a5590545f62600038a2f064edf94acab8a3', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:28', '2024-06-10 18:00:28'),
(16, 'App\\Models\\table_user', 1, 'auth_token', 'af1e98ac6bb53fe2ded50ec5f1f069d971b83de48c9460d598e4a28c40b58fbd', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:30', '2024-06-10 18:00:30'),
(17, 'App\\Models\\table_user', 1, 'auth_token', '03d52d275de012c56095d56860b64b6e162aa5923f50956e02ea9855cb199529', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:31', '2024-06-10 18:00:31'),
(18, 'App\\Models\\table_user', 1, 'auth_token', 'f3fe5e2fe04c6b73aae3710dc172d6ff9bf83b3b6ffac43cf6b817177c060d1b', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:31', '2024-06-10 18:00:31'),
(19, 'App\\Models\\table_user', 1, 'auth_token', '1f2899911757520c22e04eb35b32ea2f71e37ff11394f3a6fda334161c7a0129', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:33', '2024-06-10 18:00:33'),
(20, 'App\\Models\\table_user', 1, 'auth_token', '8c8f303e3b4832222f90e35b24d8d781161e4d05b88a980eb7ddfbdbc9773050', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:33', '2024-06-10 18:00:33'),
(21, 'App\\Models\\table_user', 1, 'auth_token', '708ce5d9dc32423051b4e37a47d38a8e86100d3c377d19124b1c8c3665c67203', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:34', '2024-06-10 18:00:34'),
(22, 'App\\Models\\table_user', 1, 'auth_token', '37adb6d01f4189b5e0ee64affa40dba695844cd489b02dd4405f86e40f80f5ee', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:35', '2024-06-10 18:00:35'),
(23, 'App\\Models\\table_user', 1, 'auth_token', 'a387983412fcd929c24153de001a7998445d4c260cb8ac789ceadf6bea0f4661', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:36', '2024-06-10 18:00:36'),
(24, 'App\\Models\\table_user', 1, 'auth_token', 'f222c523986e8f921343f61893b63c4fca5eb41f1a5852dbc2ae619857bf4236', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:37', '2024-06-10 18:00:37'),
(25, 'App\\Models\\table_user', 1, 'auth_token', '30ddbc2b1094c941e5b39fdf051d488132a77952bfa7cdf205e9f78c844d0158', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:38', '2024-06-10 18:00:38'),
(26, 'App\\Models\\table_user', 1, 'auth_token', '856de600b1806180ad9a798abe5213e96bd298ed4df232435453bd489b2b3162', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:38', '2024-06-10 18:00:38'),
(27, 'App\\Models\\table_user', 1, 'auth_token', 'f3a50adf91213f83aae801a8c0b8b72fe9b90f34f68a5a8ddab36dadfac5dda1', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:39', '2024-06-10 18:00:39'),
(28, 'App\\Models\\table_user', 1, 'auth_token', 'd8797abd91c65edf471ce140f01ca85a3bd28e169223b8c740cf05d86e557f6b', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:40', '2024-06-10 18:00:40'),
(29, 'App\\Models\\table_user', 1, 'auth_token', '4ffae3a11603cd3ecf7159a81b19615720bc6f862c6b7b625f1e0a3dd3be9a9c', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:41', '2024-06-10 18:00:41'),
(30, 'App\\Models\\table_user', 1, 'auth_token', '708525934d4126ba88c465420c7099cc656ca347ec12434ff2172bb6422b79c5', '[\"*\"]', NULL, NULL, '2024-06-10 18:00:41', '2024-06-10 18:00:41'),
(31, 'App\\Models\\table_user', 1, 'auth_token', 'f24910c3315c139ada46e26efa9ef66ba896317810f268901b837e16daef33a1', '[\"*\"]', NULL, NULL, '2024-06-10 18:01:05', '2024-06-10 18:01:05'),
(32, 'App\\Models\\table_user', 1, 'auth_token', '7a28b1ef957dcead0bf437de2660252d09f8f933f1ecc151ed81a149f458c8db', '[\"*\"]', NULL, NULL, '2024-06-10 18:01:06', '2024-06-10 18:01:06'),
(33, 'App\\Models\\table_user', 1, 'auth_token', '7d2b4c80c9fbe324778b3915455ffc4c6a620482a44229006db3027ceff94850', '[\"*\"]', NULL, NULL, '2024-06-10 18:01:07', '2024-06-10 18:01:07'),
(34, 'App\\Models\\table_user', 1, 'auth_token', '106370862064c43066beba1ede0bee4b520aeba8c1282242cb815e8246595437', '[\"*\"]', NULL, NULL, '2024-06-10 18:01:08', '2024-06-10 18:01:08'),
(35, 'App\\Models\\table_user', 1, 'auth_token', 'b3fd3791e3d79fba814a3814d04ff20161498fe0b7fa07508a90f45ddeb43099', '[\"*\"]', NULL, NULL, '2024-06-10 18:01:09', '2024-06-10 18:01:09'),
(36, 'App\\Models\\table_user', 1, 'auth_token', '1ddc1157c3d9e446b7ab0eadc94e84b93aae7ab14eb357de984bf191457573ea', '[\"*\"]', NULL, NULL, '2024-06-10 18:01:10', '2024-06-10 18:01:10'),
(37, 'App\\Models\\table_user', 1, 'auth_token', '3a037fb4b8315d83317d6ce17fdd061751d9c3e077cfb3895e56d153279d731f', '[\"*\"]', NULL, NULL, '2024-06-10 18:01:11', '2024-06-10 18:01:11'),
(38, 'App\\Models\\table_user', 1, 'auth_token', '987692e676e7f70b27e1b5063d50d98902fc3ab904a975831295225f80677eac', '[\"*\"]', NULL, NULL, '2024-06-10 18:01:11', '2024-06-10 18:01:11'),
(39, 'App\\Models\\table_user', 1, 'auth_token', 'f5ef2793703fc40c8958c1e20a160637157d80058477480d45a84265eadf5615', '[\"*\"]', NULL, NULL, '2024-06-10 18:01:12', '2024-06-10 18:01:12'),
(40, 'App\\Models\\table_user', 1, 'auth_token', '6e294a12e83c70809d690e3d7e18f4d90405b2da39b24aefa5a8e56ef073c156', '[\"*\"]', NULL, NULL, '2024-06-10 18:07:39', '2024-06-10 18:07:39'),
(41, 'App\\Models\\table_user', 5, 'auth_token', '542a4d709782532825d2722bb02cd2377165d0cf156061dacce1585528016907', '[\"*\"]', NULL, NULL, '2024-06-10 18:48:23', '2024-06-10 18:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` bigint UNSIGNED NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_confirm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `name_user`, `email_user`, `password_user`, `password_confirm`, `created_at`, `updated_at`) VALUES
(1, 'Onjaniaina', 'onja303@gmail.com', '$2y$12$9jrBiS5CaWbCpg2GJBoN5uKevnJeJeLbRSQh0JCf29TMLoBfqcIcC', '$2y$12$zT/t0Scr1Rnb6kiGN0dMS.F2TKI/0ZBzN0oPlO9Zp5fc3cdQS5MJq', '2024-06-07 19:38:14', '2024-06-07 19:38:14'),
(2, 'Tinasoa Rasolonantenaina', 'tix@gmail.com', '$2y$12$2u5BmgJKRgYFz9bpSK9tR.cc/5VgjJyOsMDmI/x5xL5AfOXCL/Zm2', '$2y$12$EymdQbqktHxWuq6M8yJyp.y7Bjk/5Au/fAcrAN/9msC1BmHXSBg96', '2024-06-09 15:29:59', '2024-06-09 15:29:59'),
(3, 'Sitraka', 'sitrakami@gmail.com', '$2y$12$xiL9k/YhgIECrtE4bjRzoOTcCnUow9mqCU78Hav7YKHiqQLrxWUC.', '$2y$12$mFKgxLuPHjW//ZPjR5bdK.WffUVL0A1l9tJ7vJHxluEnqmQsqq0AS', '2024-06-09 17:08:52', '2024-06-09 17:08:52'),
(4, 'Faniry', 'faniry@gmail.com', '$2y$12$zUrKbrY942VHmVZUihvlsOTEudVq2V4kRX.l1BJMybvnWgQIWMSyO', '$2y$12$eplYp4LxMZRVqN5Q4oz.7O7RJymnuflAjT9x5dc7x98ylkqEsNLFW', '2024-06-10 00:39:26', '2024-06-10 00:39:26'),
(5, 'Ravoangy', 'voangy@gmail.com', '$2y$12$1n/o4dNQKsAAumuFiPC9Oeo0tDmf0564e1Zl94xlK.e6zUuXjWJ9u', '$2y$12$mXhMANb5gYIPbHuBXP3fZe/RWj51lg/E5qGovO.po.ePJXk85s0li', '2024-06-10 18:47:06', '2024-06-10 18:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `laravel_crud_api`
--
ALTER TABLE `laravel_crud_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_user_email_user_unique` (`email_user`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravel_crud_api`
--
ALTER TABLE `laravel_crud_api`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
