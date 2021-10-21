-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 07:12 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_17_100849_create_pizzas_table', 2),
(6, '2021_10_19_054612_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `small_pizza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `medium_pizza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `large_pizza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `phone`, `date`, `time`, `pizza_id`, `small_pizza`, `medium_pizza`, `large_pizza`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '01730891770', '2021-10-19', '08:14:56 pm', 2, '0', '2', '0', 'test orders', 'Accepted', '2021-10-19 14:13:38', '2021-10-20 13:17:12'),
(2, 1, '01730891770', '2021-10-19', '08:14:56 pm', 2, '0', '2', '0', 'test orders', 'Rejected', '2021-10-19 14:13:38', '2021-10-20 13:17:17'),
(3, 2, '01730891770', '2021-10-21', '10:00', 9, '0', '0', '2', 'test', 'pending', '2021-10-20 14:33:34', '2021-10-20 14:33:34'),
(4, 1, '01730891770', '2021-10-21', '19:18', 6, '0', '1', '1', 'treserasfs sdf', 'pending', '2021-10-21 03:14:28', '2021-10-21 03:14:28');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_price` int(11) NOT NULL,
  `medium_price` int(11) NOT NULL,
  `large_price` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `name`, `description`, `small_price`, `medium_price`, `large_price`, `category`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Pepperoni', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc', 13, 16, 21, 'Vegetarian', 'public/pizza/j9jkRVoYMSgwoa1ogEEsMPfpxU9QAJQoX6QR1LC1.png', '2021-10-18 03:32:23', '2021-10-21 07:51:50'),
(2, 'Four Cheese', '\'Content here, content here\', making it look like readable English. Many desktop publishing packages and web', 10, 15, 23, 'Non-Vegetarian', 'public/pizza/czFeKaGifc3N6pfaZQXPEd87aXgU8GRH7zS039bU.png', '2021-10-18 03:49:49', '2021-10-21 07:57:59'),
(3, 'Barbeque Chicken', '\'Content here, content here\', making it look like readable English. Many  it look like readable English. Many', 16, 20, 26, 'Traditional', 'public/pizza/KCfbzaeF8nakd4QKotNsvMjgSkmlLlrhUnTfHUEn.png', '2021-10-18 21:00:38', '2021-10-21 07:59:17'),
(5, 'Vegetarian', '\'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem', 12, 16, 19, 'Vegetarian', 'public/pizza/8AgCw2HQ1nWNDxqfRVl3505NvxuzMMgGZ2T9nSt7.png', '2021-10-18 21:17:40', '2021-10-21 08:00:42'),
(6, 'Swiss Mushroom', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for', 16, 22, 29, 'Non-Vegetarian', 'public/pizza/3ROXMui9ds1pRfBwtyrUtuaiekVPc3IogvpgxwNs.png', '2021-10-18 22:30:51', '2021-10-21 08:01:19'),
(7, 'Hawaiian', 'Pizza \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors', 6, 11, 15, 'Vegetarian', 'public/pizza/DTI1tqwmEqpJsLo9slXDb1wkbl92g8UAeiCY8Q8r.png', '2021-10-18 22:33:15', '2021-10-21 08:02:07'),
(8, 'Begetable Pizza', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 7, 12, 16, 'Traditional', 'public/pizza/7HDLHoS01SU0cAm9EiXS74C287vJtJe054swJMf3.png', '2021-10-20 12:03:44', '2021-10-21 08:03:25'),
(9, 'Ceaser Salad', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 9, 14, 20, 'Traditional', 'public/pizza/KiZpjXw8DPnZPQyWstptBDVfmaHvg15DgkORvEiD.png', '2021-10-20 12:04:20', '2021-10-21 08:04:08'),
(10, 'Sea Food Noodles', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 12, 16, 20, 'Traditional', 'public/pizza/UslO8vskKjwsiAOJvYKspBSBiH94l3dnyU0z3T0L.png', '2021-10-20 12:05:54', '2021-10-21 08:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` bigint(20) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mehedi', 'mehedi@gmail.com', NULL, '$2y$10$J2i3SgaaR69Utv60rZBn8OKBHETJIvnQibBxHFZXP1sI3T7mv.G0O', 0, NULL, '2021-10-16 11:41:07', '2021-10-16 11:41:07'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$UcbIJMD7BvPkLLOhOxwRS.aPkbIFON1NwAImFBPQUdR6LcoDcbnEW', 1, NULL, '2021-10-18 23:10:31', '2021-10-18 23:10:31'),
(3, 'Savanah Crist', 'mhermann@example.com', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'IOL7luqs8j', '2021-10-21 07:34:22', '2021-10-21 07:34:22'),
(4, 'Mrs. Ophelia Ward', 'ogerhold@example.com', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'pQoCbLr1Ou', '2021-10-21 07:34:22', '2021-10-21 07:34:22'),
(5, 'Sonny Torphy', 'glittle@example.com', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'brVQZKtnaW', '2021-10-21 07:34:22', '2021-10-21 07:34:22'),
(6, 'Joanny Mitchell', 'allan52@example.com', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'mbLOehCMcI', '2021-10-21 07:34:22', '2021-10-21 07:34:22'),
(7, 'Dr. Rory Feil', 'josephine.abbott@example.org', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'tHwKYnrbIF', '2021-10-21 07:34:22', '2021-10-21 07:34:22'),
(8, 'Adonis Gleichner', 'jhintz@example.com', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '6bzqGMeDne', '2021-10-21 07:34:22', '2021-10-21 07:34:22'),
(9, 'Dr. Gino Witting I', 'wilderman.yvonne@example.net', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'IBiz9JvC8j', '2021-10-21 07:34:22', '2021-10-21 07:34:22'),
(10, 'Dr. Abby McKenzie Jr.', 'rohan.broderick@example.net', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '9yg9AsCX0o', '2021-10-21 07:34:22', '2021-10-21 07:34:22'),
(11, 'Julien Wolff', 'mschmitt@example.org', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'b9y51ehLg1', '2021-10-21 07:34:22', '2021-10-21 07:34:22'),
(12, 'Wilfrid Stiedemann', 'dickens.reba@example.com', '2021-10-21 07:34:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '8Cbyf930kG', '2021-10-21 07:34:22', '2021-10-21 07:34:22');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
