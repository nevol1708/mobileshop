-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2017 at 07:37 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(4, 6, 32100000, 'ATM', NULL, '2017-11-13 19:05:27', '2017-11-13 19:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE IF NOT EXISTS `bill_details` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(3, 4, 3, 1, 22500000, '2017-11-13 19:05:27', '2017-11-13 19:05:27'),
(4, 4, 4, 1, 9600000, '2017-11-13 19:05:27', '2017-11-13 19:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Apple', NULL, NULL, '2017-11-12 15:59:43', '2017-11-12 15:59:43'),
(2, 'Xiaomi', NULL, NULL, '2017-11-12 15:59:49', '2017-11-12 15:59:49'),
(3, 'Samsung', NULL, NULL, '2017-11-12 15:59:55', '2017-11-12 15:59:55'),
(4, 'Bkav', NULL, NULL, '2017-11-12 16:00:00', '2017-11-12 16:00:00'),
(5, 'Sony', NULL, NULL, '2017-11-12 16:00:04', '2017-11-12 16:00:04'),
(6, 'LG Mobile', NULL, NULL, '2017-11-12 16:00:24', '2017-11-12 16:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(4, 'Phạm Tiến Thành', 'nam', 'nevol.love@gmail.com', 'Hà Nội', '01683135028', 'Giao hàng nhanh', '2017-11-12 19:40:47', '2017-11-12 19:40:47'),
(5, 'Chu Văn Quang', 'nam', 'quangchu@gmail.com', 'Vĩnh Phúc', '01685275028', NULL, '2017-11-13 11:50:56', '2017-11-13 11:50:56'),
(6, 'Linh', 'nữ', 'linh@gmail.com', 'Ngọc Khánh, Hà Nội', '01685275068', NULL, '2017-11-13 19:05:27', '2017-11-13 19:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cate_id`, `description`, `unit_price`, `image`, `unit`, `created_at`, `updated_at`) VALUES
(3, 'Samsung Galaxy Note 8 Chính hãng', 3, NULL, 24000000, 'note-8-black_1.jpg', '10', '2017-11-13 12:29:14', '2017-11-13 19:41:16'),
(4, 'Apple iPhone 6S Plus 16GB', 1, 'Không phải là sản phẩm đi đầu trong lĩnh vực phablet (smartphone lai máy tính bảng) nhưng iPhone 6S Plus 16 GB là một trong những chiếc điện thoại màn hình lớn đáng mua nhất trên thị trường hiện nay.', 9600000, 'iphone-6s-plus-gold_3_4.png', '5', '2017-11-13 12:30:15', '2017-11-13 12:30:15'),
(5, 'Apple iPhone X 64GB Chính hãng', 1, 'Điện thoại iphone mới ra mắt của apple', 30600000, 'x-gray_5.jpg', '10', '2017-11-13 19:20:28', '2017-11-13 19:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_user` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Tiến Thành', 'admin@gmail.com', '$2y$10$Dwj1ahKqVYSO5MjCHl0Hu.qbgvD8lNKEwS9yEnk.3tHCXuZBOkG4e', '1', 'RyMRGAdwFzMvLdeFcXKjBaEFxWCa8aYDgp7PYShunldxsAxHknPo1fHRHVt9', '2017-11-12 15:58:42', '2017-11-12 15:58:42'),
(2, 'Vũ Mạnh Tùng', 'user@gmail.com', '$2y$10$Loepzzh4ixZlNgHsCQKcBOVxNELThYbZ/NjbQXz88BVSQHSoDBqHK', '0', 'mlUYsp4jOf2jUthLBNret3SV2vsI11LKnuYPzXUy6mMny2mpuYJ7NcN1H8iG', '2017-11-13 19:58:24', '2017-11-13 19:58:24'),
(3, 'Chu Văn Quang', 'guest@gmail.com', '$2y$10$1KSSzEZW9csNnQw3pzTMhuc7SCDjH.I33qHeUazDh52ms4AIaqr1m', '0', NULL, '2017-11-13 20:52:48', '2017-11-13 20:52:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_idx` (`id_customer`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_idx` (`id_product`),
  ADD KEY `fk_bills_idx` (`id_bill`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
