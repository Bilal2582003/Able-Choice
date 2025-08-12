-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2025 at 10:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `able-choice`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--
DROP TABLE IF EXISTS address;
CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `postal_code` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `address`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'surjani karachi', 'karachi', 'sindh', '12345', 'paistan', '2023-10-10 12:20:11', NULL, NULL),
(2, 2, 'gulshan', 'karachi', 'sindh', '09876', 'pakistan', '2023-10-10 12:20:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `card_detail`
--
DROP TABLE IF EXISTS card_detail;
CREATE TABLE `card_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `per_amount` varchar(200) DEFAULT NULL,
  `total_amount` varchar(200) DEFAULT NULL,
  `ip_address` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_detail`
--

INSERT INTO `card_detail` (`id`, `user_id`, `product_id`, `qty`, `per_amount`, `total_amount`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(32, NULL, 1, 1, '8000', '8000', '::1', '2024-06-09 21:25:33', '2024-06-10 19:49:32', '2024-06-10 19:49:32'),
(33, NULL, 2, 2, '800', '1600.00', '::1', '2024-06-09 21:25:46', '2024-06-10 19:49:32', '2024-06-10 19:49:32'),
(34, NULL, 2, 1, '800', '800', '::1', '2024-06-09 21:58:51', '2024-06-10 19:49:32', '2024-06-10 19:49:32'),
(35, NULL, 1, 1, '400', '400', '::1', '2024-06-09 22:01:12', '2024-06-10 19:49:32', '2024-06-10 19:49:32'),
(36, NULL, 1, 2, '400', '800.00', '::1', '2024-06-10 19:42:57', '2024-06-10 19:49:32', '2024-06-10 19:49:32'),
(37, NULL, 2, 1, '800', '800', '::1', '2024-06-10 19:43:06', '2024-06-10 19:49:32', '2024-06-10 19:49:32'),
(38, NULL, 2, 3, '800', '2400', '::1', '2024-06-10 19:45:58', '2024-06-10 19:49:32', '2024-06-10 19:49:32'),
(39, NULL, 1, 2, '400', '800.00', '::1', '2024-06-10 19:47:51', '2024-06-10 19:49:32', '2024-06-10 19:49:32'),
(40, NULL, 2, 2, '800', '1600.00', '::1', '2024-06-11 00:37:06', '2025-06-10 14:28:51', '2025-06-10 11:28:51'),
(41, NULL, 2, 1, '800', '800', '0d15bfb68597ec7a2746c2be6d1e1769', '2025-06-10 14:28:57', '2025-07-27 11:49:40', '2025-07-27 08:49:40'),
(42, NULL, 2, 1, '800', '800', '92327ee2f0c7b24fc70ee21ab08fb598', '2025-07-27 13:13:22', '2025-07-27 13:16:51', '2025-07-27 13:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--
DROP TABLE IF EXISTS order;
CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
DROP TABLE IF EXISTS orders;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `net_amount` decimal(10,2) NOT NULL,
  `ip_address` varchar(500) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `address`, `city`, `state`, `postcode`, `country`, `phone1`, `phone2`, `notes`, `payment_method`, `total_amount`, `shipping_cost`, `net_amount`, `ip_address`, `order_date`) VALUES
(3, 0, '', '', '', '', '', '', '', '', '', '', 'banktransfer', 1600.00, 200.00, 1800.00, '::1', '2024-06-09 16:55:23'),
(4, 0, '', '', '', '', '', '', '', '', '', '', 'banktransfer', 800.00, 200.00, 1000.00, '::1', '2024-06-09 16:59:56'),
(5, 1, 'bilal', 'bilal@gmail.com', '', 'karachi', 'sindh', '12345', 'pak', '03132004040', '', 'afasfa', 'cashondeleivery', 400.00, 200.00, 600.00, '::1', '2024-06-09 17:01:44'),
(6, 0, 'bilal', 'bilal@gmail.com', '4k karachi', 'karachi', 'sindh', '2424', 'pak', '03130200300', '', 'asfafsdf', 'banktransfer', 800.00, 200.00, 1000.00, '::1', '2024-06-10 14:44:52'),
(7, 0, 'bilal', 'bilal@gmail.com', '123karachi', 'karachi', 'sindh', '2424', 'pak', '03130200300', '', 'kfayiofajlfoli', 'banktransfer', 3200.00, 200.00, 3400.00, '::1', '2024-06-10 14:49:32'),
(8, NULL, 'bilal', 'bilal@gmail.com', '123karachi', 'karachi', 'sindh', '232', 'pak', '1243124', '23423423', 'sdaasf', 'cashondelivery', 800.00, 200.00, 1000.00, '92327ee2f0c7b24fc70ee21ab08fb598', '2025-07-27 08:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--
DROP TABLE IF EXISTS order_items;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `per_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `is_active` int(11) DEFAULT 1,
  `is_cancelled` int(11) DEFAULT NULL,
  `is_completed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `per_amount`, `total_amount`, `created_at`, `update_at`, `is_active`, `is_cancelled`, `is_completed`) VALUES
(4, 3, 2, 2, 800.00, 1600.00, '2024-06-10 21:40:40', '2024-06-10 23:36:47', 1, 0, 0),
(5, 4, 2, 1, 800.00, 800.00, '2024-06-10 21:40:40', '2024-06-10 23:36:47', 1, 0, 0),
(6, 5, 1, 1, 400.00, 400.00, '2024-06-10 21:40:40', '2024-06-10 23:36:47', 1, 0, 0),
(7, 6, 2, 1, 800.00, 800.00, '2024-06-10 21:40:40', '2024-06-10 23:36:47', 1, 0, 0),
(8, 7, 2, 3, 800.00, 2400.00, '2024-06-10 21:40:40', '2024-06-10 23:51:23', 0, 1, 0),
(9, 7, 1, 2, 400.00, 800.00, '2024-06-10 21:40:40', '2024-06-10 23:36:47', 1, 0, 0),
(10, 8, 2, 1, 800.00, 800.00, '2025-07-27 13:16:51', '2025-07-27 13:18:24', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
DROP TABLE IF EXISTS product;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `image1` longtext DEFAULT NULL,
  `image2` longtext DEFAULT NULL,
  `image3` longtext DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_category_id`, `image1`, `image2`, `image3`, `name`, `description`, `qty`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ashtry_green.webp', 'ashtry_green1.webp', NULL, 'Astry', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\nbbbbbbbbbbbbbbbbbbbbbbbbb\r\nbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 20, 400, '2024-06-09 21:39:34', '2025-07-27 12:39:22', NULL),
(2, 2, 'massagerPink.webp', 'guashaPink.webp', 'massagerPink2.jpg', 'Massager Roller', 'massager roler massageer roller', 11, 800, '2024-06-09 21:39:34', '2025-07-27 13:13:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--
DROP TABLE IF EXISTS product_category;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'massager', '2023-10-08 03:30:04', NULL, NULL),
(2, 'game', '2023-10-08 03:30:59', NULL, NULL),
(3, 'bunch', '2023-10-17 20:23:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--
DROP TABLE IF EXISTS reviews;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `parent_name` varchar(500) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `parent_name`, `phone`, `password`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bilal', 'bilal@gmail.com', 'abubakar', '03132004040', '123', 'admin', '2023-10-10 12:18:09', '2024-06-11 21:08:05', NULL),
(2, 'hasan', 'abu@gmail.co', 'ali', '0310220200', '321', NULL, '2023-10-10 12:18:09', '2024-03-31 18:02:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_detail`
--
ALTER TABLE `card_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `card_detail`
--
ALTER TABLE `card_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
