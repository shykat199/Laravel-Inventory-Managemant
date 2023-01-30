-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 01:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attendance_date` varchar(255) NOT NULL,
  `attendance_year` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL DEFAULT '0',
  `edit_date` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`id`, `employee_id`, `attendance_date`, `attendance_year`, `attendance`, `edit_date`, `created_at`, `updated_at`) VALUES
(1, 2, '26-01-23', '2023', '0', '26_01_23', NULL, '2023-01-26 12:54:33'),
(2, 3, '26-01-23', '2023', '0', '26_01_23', NULL, '2023-01-26 12:54:33'),
(3, 4, '26-01-23', '2023', '0', '26_01_23', NULL, '2023-01-26 12:54:33'),
(4, 5, '26-01-23', '2023', '1', '26_01_23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Car', '2023-01-21 08:38:40', '2023-01-22 08:32:04'),
(3, 'Truck', '2023-01-22 08:32:19', '2023-01-22 08:32:19'),
(4, 'Bycycle', '2023-01-22 08:32:30', '2023-01-22 08:32:39'),
(5, 'Electronive EV', '2023-01-22 08:32:57', '2023-01-22 08:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `shopName` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `bankAccount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `shopName`, `photo`, `bankAccount`, `created_at`, `updated_at`) VALUES
(2, 'Xavier', 'tehehilitu@mailinator.com', '+1 (875) 322-3156', 'Aliquam quibusdam qu', 'Unity Herman', 'public/customer/a4q5i5ZFlNaLwToYiY7N5daDOIaDXlFPnt3PCzW4.jpg', '144785455', '2023-01-17 01:38:52', '2023-01-17 01:38:52'),
(3, 'Lucius Goodman', 'rudakyc@mailinator.com', '+1 (608) 332-3773', 'Sunt vel iusto magna', 'Mark Bates', 'public/customer/A0l98iUW0aEDFwSzaByr1mKNcOfQ83H3Xz9vBsR0.png', '1458465', '2023-01-17 01:39:07', '2023-01-17 01:39:07'),
(4, 'Alma Gallegos', 'nikedubob@mailinator.com', '+1 (533) 608-5852', 'Est natus accusantiu', 'abc', 'public/customer/f6lUiIZRUigN8xiW6WcIDbMbsba5szybLqyw1unz.jpg', '154875485', '2023-01-27 07:41:42', '2023-01-27 07:41:42'),
(5, 'Madeline Todd', 'fawiwaxyh@mailinator.com', '+1 (683) 917-7168', 'Delectus autem', 'Kylan', 'public/customer/cJAtFyZgdB1dv2LlpLcqrUHKH00Z5h484Y9dBZ5L.jpg', '148745856', '2023-01-27 07:44:37', '2023-01-27 07:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `vacation` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `experience`, `photo`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
(2, 'Fatima ', 'vujoximate@mailinator.com', '+1 (642) 142-6787', 'Voluptas eveniet si', '4', 'public/employee/KUOwcMlVgj2AxzxEshlMT6I81KmxF7xVaRQq1dLn.jpg', '4444', '2', 'Est ut maxime incid', '2023-01-16 12:30:15', '2023-01-16 12:30:15'),
(3, 'Channing Ingram', 'luhofytafy@mailinator.com', '+1 (991) 423-3814', 'Nulla voluptatibus m', '5', 'public/employee/94fLJX9nsniwMDuezX9Hf6OLKDyPnEC2MNT5hsAc.jpg', '23522', '2', 'Dolor pariatur Obca', '2023-01-16 12:33:29', '2023-01-16 12:33:29'),
(4, 'Kaden Mcneil', 'jerahodir@mailinator.com', '+1 (433) 613-3729', 'Qui eveniet culpa', '3', 'public/employee/C4pydB1Ss5t5E8CmhbExXmquQli7ZssllD3Aa4DD.jpg', '1111', '7', 'Esse quia vitae lab', '2023-01-16 12:35:30', '2023-01-16 12:35:30'),
(5, 'Bernard Cash', 'jimase@mailinator.com', '+1 (589) 259-6434', 'Fuga Dolores minus', 'Veritatis praesentiu', 'public/employee/2ECpGnpOPgrVzsRDG4n0JDXOY5I0ylnKk3KVKTPu.jpg', 'In quo accusantium p', 'Asperiores accusamus', 'Irure aut quos et ma', '2023-01-16 21:39:08', '2023-01-16 21:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` text NOT NULL,
  `amount` int(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(1, 'gjgfghffhfghgfytf', 7000, 'January', '23-01-23', '2023', '2023-01-23 09:05:59', '2023-01-23 09:05:59'),
(2, 'gjgfghffhfghgfytf', 5000, 'January', '23-01-23', '2023', '2023-01-23 09:07:42', '2023-01-23 09:07:42'),
(3, 'Ut odit tempore per', 1972, 'January', '23-01-23', '2023', '2023-01-23 09:08:06', '2023-01-23 09:08:06'),
(4, 'Architecto tempore', 1985, 'January', '23-01-23', '2023', '2023-01-23 09:08:39', '2023-01-23 09:08:39'),
(5, 'Est eius est do ci', 2004, 'January', '23-01-23', '2023', '2023-01-23 10:16:04', '2023-01-23 10:16:04'),
(8, 'Ea id culpa aut off', 2018, 'January', '24-01-23', '2023', '2023-01-24 00:09:02', '2023-01-24 00:09:02'),
(9, 'Adipisci dolor omnis', 58445, 'January', '24-01-23', '2023', '2023-01-24 00:09:17', '2023-01-24 00:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_01_15_182754_create_employees_table', 2),
(6, '2023_01_17_065918_create_customers_table', 3),
(7, '2023_01_17_103953_create_supliers_table', 4),
(8, '2023_01_18_151428_create_salaries_table', 5),
(9, '2023_01_21_050730_create_pay_salaries_table', 6),
(10, '2023_01_21_130421_create_categories_table', 7),
(11, '2023_01_21_165946_create_products_table', 8),
(12, '2023_01_23_141524_create_expenses_table', 9),
(13, '2023_01_24_060115_add_store_id_to_users_table', 10),
(14, '2023_01_24_060240_add_year_to_expenses_table', 10),
(15, '2023_01_26_101709_create_attendences_table', 11),
(16, '2023_01_28_052829_create_orders_table', 12),
(17, '2023_01_28_052845_create_order_details_table', 12),
(18, '2023_01_30_063431_create_settings_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `pay` varchar(255) DEFAULT NULL,
  `due` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `vat`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(5, 3, '28-01-23', 'approve', '5', '2,250.00', '472.50', '2,722.50', 'Cash On Delivery', '500', '722', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unitcost` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `unitcost`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '1', '450', '544.5', NULL, NULL),
(2, 5, 1, '5', '450', '2722.5', NULL, NULL),
(3, 6, 1, '5', '450', '2722.5', NULL, NULL),
(4, 7, 1, '10', '450', '5445', NULL, NULL);

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
-- Table structure for table `pay_salaries`
--

CREATE TABLE `pay_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_month` varchar(255) NOT NULL,
  `paid_mount` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `suplier_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_warehouse` varchar(255) NOT NULL,
  `product_route` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `buy_date` varchar(255) NOT NULL,
  `expire_date` varchar(255) NOT NULL,
  `buying_price` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `suplier_id`, `product_code`, `product_warehouse`, `product_route`, `product_image`, `buy_date`, `expire_date`, `buying_price`, `selling_price`, `created_at`, `updated_at`) VALUES
(1, 'Gavin Hutchinson', 4, 4, 'pc-kih5d', 'Warehouse 2', 'row-2', 'public/product/j7Q8h9PjS4keVMN2BzeQopuGqS9CwnNVyfWCojSd.jpg', '2001-12-22', '1976-03-31', '350', '450', '2023-01-22 09:52:32', '2023-01-23 07:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `advance_salary` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `total_salary` int(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `month`, `advance_salary`, `year`, `total_salary`, `created_at`, `updated_at`) VALUES
(1, 2, 'February', '4025', '2022', NULL, '2023-01-20 09:34:00', '2023-01-20 12:10:43'),
(2, 3, 'January', '4000', '2023', NULL, '2023-01-20 09:34:28', '2023-01-20 09:34:28'),
(3, 5, 'March', '4000', '2023', NULL, '2023-01-20 09:34:39', '2023-01-20 09:34:39'),
(7, 4, 'April', NULL, '2005', NULL, '2023-01-20 23:24:30', '2023-01-20 23:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sight_title` varchar(255) NOT NULL,
  `sight_sub_title` varchar(255) DEFAULT NULL,
  `sight_logo` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sight_title`, `sight_sub_title`, `sight_logo`, `company_address`, `created_at`, `updated_at`) VALUES
(1, 'ABC', 'Omnis ut eius conseq', 'public/logo/Eix50VF99BMOaRuHuAnByzu6gGSHH9Y5kuOR8ZKH.jpg', 'Koch and Bates Associates', '2023-01-30 02:41:37', '2023-01-30 02:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `shop` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `name`, `email`, `phone`, `address`, `account`, `shop`, `photo`, `city`, `type`, `created_at`, `updated_at`) VALUES
(4, 'Aphrodite', 'tihoru@mailinator.com', '+1 (453) 503-8211', 'Illo debitis irure d', 'Tempora laborum inve', 'Vivian Wilkinson', 'public/supplier/dVUMM07jY7l8wUu9xaXRhqRuDh8D89e93Uxx1Atm.jpg', 'Amet dolor ut Nam', 'Whole Seller', '2023-01-18 08:35:24', '2023-01-18 08:35:24'),
(5, 'Maia Joseph', 'logygabej@mailinator.com', '+1 (944) 729-1509', 'Voluptas ea qui nisi', '145845856', 'Miranda Shaffer', 'public/supplier/2r4JQE45hfRlDtCaVQAccgnejBd54tq42fSjvxvt.jpg', 'Dolore blanditiis vo', 'Whole Seller', '2023-01-22 08:31:21', '2023-01-22 08:31:21'),
(6, 'Hedy Spears', 'cisixib@mailinator.com', '+1 (233) 687-3697', 'Nihil laudantium se', '44775845862', 'Donovan Waters', 'public/supplier/q2b5rmKGoheIh4bnRZG2Io3n1BA0gnE5GqOgbRmr.jpg', 'Iste corporis ut dol', 'Whole Seller', '2023-01-22 08:31:34', '2023-01-22 08:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shykat roy', 'admin@gmail.com', NULL, '$2y$10$aml62ZNdHETKSa5sQxDXC.59uYVUA2HsQQ8I7XN50wsqeyTv1Q9Jm', NULL, '2023-01-15 06:26:59', '2023-01-15 06:26:59'),
(2, 'shykat roy', 'shykatroy.11815813@gmail.com', NULL, '$2y$10$b9PKqyYaB1e6wowOnEv2C.7evwhCUK82L4koQjVIxEcpvhT40s0aS', NULL, '2023-01-15 09:21:23', '2023-01-15 09:21:23'),
(3, 'shykat roy', 'shykatroy11815813@gmail.com', NULL, '$2y$10$IvHtjjX9J1QDzb//MyvvjuE8ZTMRWTlW5Ro6uoMa30mt7mgNlB4c6', NULL, '2023-01-15 09:23:45', '2023-01-15 09:23:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pay_salaries`
--
ALTER TABLE `pay_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
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
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pay_salaries`
--
ALTER TABLE `pay_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
