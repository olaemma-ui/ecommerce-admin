-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 07:42 PM
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
-- Database: `blvck_collections`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `email`, `full_name`, `phone`, `password`, `role_id`, `createdAt`) VALUES
('0987654321234567890', 'olaemma4213@gmail.com', 'Ola Emma', '08166720760', 'a422ad8ec142d7f7bc1f3eec73727289fc14770e', 1, '2024-05-11 02:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `attribute_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `logo_url`, `dateCreated`, `dateUpdated`) VALUES
(6, 'Nike', '/ecommerce-admin/core/uploads/brand/brand_664260af9c6df.jpg', '2024-05-14 03:49:19', '2024-05-13 18:49:19'),
(7, 'Lois Vuiton', '/ecommerce-admin/core/uploads/brand/brand_664264804dea9.jpg', '2024-05-14 04:05:36', '2024-05-13 19:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `dateUpdated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `dateCreated`, `dateUpdated`) VALUES
(1, 'T SHirts', '2024-05-12 11:30:21', NULL),
(2, 'T SHirts', '2024-05-12 11:30:48', NULL),
(3, 'T SHirts', '2024-05-12 11:39:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `sold` int(11) DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `color` varchar(255) NOT NULL,
  `available_size` varchar(255) NOT NULL,
  `product_images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `description`, `created_at`, `updated_at`, `gender`, `brand_id`, `quantity`, `sold`, `category_id`, `size_id`, `color`, `available_size`, `product_images`) VALUES
('product_664d2a4a82a6c', 'Black Hodie', '300', 'The first product', '2024-05-22 01:12:10', '2024-05-22 01:12:10', 'Female', 6, 10, 0, 2, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2a4a8193b.jpg[#]/ecommerce-admin/core/uploads/product/uuid_664d2a4a81e19.jpg[#]/ecommerce-admin/core/uploads/product/uuid_664d2a4a8225e.jpg[#]/ecommerce-admin/core/uploads/product/uuid_664d2a4a826de.jpg'),
('product_664d2ab18e714', 'Black Hodie', '300', 'deee', '2024-05-22 01:13:53', '2024-05-22 01:13:53', 'Female', 6, 10, 0, 1, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2ab18e277.jpg'),
('product_664d2ac98b2eb', 'Black Hodie', '300', 'deee', '2024-05-22 01:14:17', '2024-05-22 01:14:17', 'Female', 6, 10, 0, 1, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2ac98afcf.jpg'),
('product_664d2b6b240db', 'Black Hodie', '300,00,000', 'deee', '2024-05-22 01:16:59', '2024-05-22 01:16:59', 'Female', 6, 10, 0, 1, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2b6b23c87.jpg'),
('product_664d2c1d9edee', 'Black Hodie', '300', 'derfrewrf3rferf', '2024-05-22 01:19:57', '2024-05-22 01:19:57', 'Female', 6, 10, 0, 1, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2c1d9e36b.jpg'),
('product_664d2e79362b4', 'James', '300', 'sdghjkllkjhg', '2024-05-22 01:30:01', '2024-05-22 01:30:01', 'Unisex', 7, 10, 0, 2, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2e7935c75.jpg'),
('product_664d2eaa24836', 'James', '300', 'fvvfff', '2024-05-22 01:30:50', '2024-05-22 01:30:50', 'Female', 7, 10, 0, 2, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2eaa2432c.jpg'),
('product_664d2f3b84111', 'James', '300', 'fvvfff', '2024-05-22 01:33:15', '2024-05-22 01:33:15', 'Female', 7, 10, 0, 2, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2f3b83a61.jpg'),
('product_664d2fd4452f9', 'James', '300', 'fvvfff', '2024-05-22 01:35:48', '2024-05-22 01:35:48', 'Female', 7, 10, 0, 2, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2fd444d07.jpg'),
('product_664d2ff7b7726', 'James', '300', 'fvvfff', '2024-05-22 01:36:23', '2024-05-22 01:36:23', 'Female', 7, 10, 0, 2, NULL, '', '@', '/ecommerce-admin/core/uploads/product/uuid_664d2ff7b725c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `date_created` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `date_created`) VALUES
(1, 'SUPER ADMIN', '2024-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `product_sizes` (`size_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
