-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 03:17 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complete` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `total`, `payment`, `note`, `complete`, `created_at`, `updated_at`) VALUES
(4, 6, 32100000, 'ATM', NULL, NULL, '2017-11-13 19:05:27', '2017-11-13 19:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(6, 'Linh', 'nữ', 'linh@gmail.com', 'Ngọc Khánh, Hà Nội', '01685275068', NULL, '2017-11-13 19:05:27', '2017-11-13 19:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cate_id`, `description`, `unit_price`, `image`, `unit`, `created_at`, `updated_at`) VALUES
(3, 'Samsung Galaxy Note 8 Chính hãng', 3, 'Màn hình 6,3 inch, super AMOLED Độ phân giải 1440x2960 pixels.\r\nCamera 12MP f/1.7, 2160p. Phụ 8 MP, f/1.9\r\nRAM 6GB, CPU Exynos 8895 Octa\r\npin 3300 mAh\r\nCảm biến vân tay, cảm biến mống mắt. Chống bụi, chống nước chuẩn IP68', 24000000, 'note-8-black_1.jpg', '10', '2017-11-13 12:29:14', '2017-11-13 19:41:16'),
(4, 'Apple iPhone 6S Plus 16GB', 1, 'Màn hình 5,5 inch, full HD\r\nCamera 8MP f/2.2 1080p, phụ 1,2MP f/2.2\r\nRAM 1GB, cpu Apple A8\r\npin 2915 mAh\r\nCảm biến vân tay, ', 9600000, 'iphone-6s-plus-gold_3_4.jpg', '5', '2017-11-13 12:30:15', '2017-11-13 12:30:15'),
(5, 'Apple iPhone X 64GB Chính hãng', 1, 'Điện thoại iphone mới ra mắt của apple\r\nMàn hình 5,8 inch 1125x2436 pixels\r\nCamera 12MP 2160p, phụ 7MP 1080p\r\nCPU Apple A11 Bionic, 2GB RAM\r\npin 2716 mAh\r\nCảm biến khuôn mặt, sạc nhanh, sạc không dây. Chống nước chống bụi chuẩn IP67', 30600000, 'x-gray_5.jpg', '10', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(6, 'Điện thoại Xiaomi Redmi Note 5A - 16GB', 2, 'Xiaomi Redmi Note 5A là chiếc smartphone giá rẻ, có màn hình lớn sắc nét, chạy hệ điều hành Android 7.0 với giao diện MIUI 9 tuyệt đẹp và camera selfie nhiều chế độ làm đẹp hấp dẫn.\r\nMàn hình 5,5 inch, 1080x2160 pixels\r\ncamera 126MP, full HD\r\n4GB RAM, cpu snapdragon 660\r\npin 4000mAh\r\ncảm biến vân tay', 2750000, '5.jpg', '10', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(7, 'Điện thoại Xiaomi Redmi Note 4X - 64GB', 2, 'Cấu hình mạnh, cảm biến vân tay 1 chạm, camera tốt, thiết kế đẹp, pin khủng được hòa trung vào tổng thể của Redmi Note 4X. Những điều trên có thể khẳng định đây là một smartphone cực kì đáng mua.\r\nMàn hình 5,5 inch, full HD\r\nCamera 13MP quay video full HD\r\nRAM 4GB, cpu Snapdragon 625\r\npin 4000 mAh\r\nCảm biến vân tay', 4590000, '6.jpg', '10', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(8, 'Điện thoại Xiaomi Mi 5s - 64GB', 2, 'Xiaomi Mi 5S chính hãng là nâng cấp của Mi5 - Flagship Xiaomi 2016, cấu hình và chất lượng ngang tầm với Samsung S7, iPhone 6S, nhưng có mức giá rẻ chỉ bằng 1 nửa. Sản phẩm được thiết kế sang trọng với mặt lưng cong, viền kim loại. Chiệc điện thoại Xiaomi Mi 5S phù hợp với bạn nào thích 1 chiếc điện thoại đẹp, pin tốt, và nhỏ gọn\r\nMàn hình 5,15 inch, full HD\r\nCamera 12MP 2160p\r\n4GB RAM, chip Snapdragon 821\r\npin 3200 mAh\r\nCảm biến vân tay', 6790000, '7.jpg', '10', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(9, 'Điện thoại Xiaomi Mi Mix 2', 2, 'màn hình 5,99 inch, 1080x2160 pixels\r\nCamera 12 MP, 2160p\r\nchip Snapdragon 835, RAM 8GB\r\npin 3400 mAh\r\nCảm biến vân tay, sạc nhanh\r\nThiết kế đặc biệt với kính, nhôm và gốm', 12990000, '8.jpg', '10', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(10, 'Điện thoại Xiaomi Mi Mix Gold Edition', 2, 'Màn hình 6.4 inch, 1080x2040 pixels\r\ncamera 16 MP, 2160p\r\n6GB RAm, chip Snapdragon 821\r\npin 440 mAh\r\nCảm biến vân tay, sạc nhanh', 11490000, '9.jpg', '5', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(11, 'Điện thoại Xiaomi Mi 6-Ram 6GB', 2, 'Màn hình 5,15 inch, full HD\r\nCamera 12 MP 2160p\r\n6GB RAMSnapdragon 835\r\npin 3350 mAh\r\nCảm biến vân tay, sạc nhanh', 9490000, '10.jpg', '20', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(12, 'Điện thoại Xiaomi Redmi 4 Prime 2017', 2, 'Màn hình 5 inch, full HD\r\nCamera 13MP full HD\r\n3GB RAM, chip Snapdragon 625\r\npin 4100 mAh\r\nCảm biến vân tay, sạc nhanh', 4490000, '11.jpg', '15', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(13, 'Điện thoại Xiaomi Redmi Note 4', 2, 'Màn hình 5,5 inch, full HD\r\nCamera 13MP, full HD\r\n4GB RAM, chip Snapdragon 625\r\npin 4100 mAh\r\nCảm biến vân tay', 3875000, '12.jpg', '10', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(14, 'Điện thoại Samsung Galaxy Note 8 ', 3, 'Galaxy Note 8 là niềm hy vọng vực lại dòng Note danh tiếng của Samsung với diện mạo nam tính, sang trọng. Trang bị camera kép xóa phông thời thượng, màn hình vô cực như trên S8 Plus, bút Spen với nhiều tính năng mới và nhiều công nghệ được Samsung ưu ái đem lên Note 8.', 13450000, '13.jpg', '5', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(15, 'Điện thoại Samsung Galaxy J7 Plus - Chính hãng', 3, 'Galaxy J7+ là một lựa chọn smartphone phân khúc trung cấp khá nổi bật ở thời điểm hiện tại, máy sở hữu thiết kế kim loại nguyên khối, gia công cứng cáp, camera kép với ống kính khẩu độ lớn và khả năng xóa phông chuyên nghiệp, vi xử lý mạnh mẽ kết hợp với mức RAM 4GB cho trải nghiệm sử dụng tốt.\r\nMàn hình 5,5 inch, full HD\r\nCamera 13 MP, full HD\r\n3GB RAm, chip Exynos 7870 octa\r\npin 3600 mAh\r\ncảm biến vân tay\r\n', 8690000, '14.jpg', '10', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(16, 'Điện thoại Samsung Galaxy S8 Plus', 3, 'Màn hình 6.2 inch, 1440x2960 pixels\r\nCamera 12MP, 2160p. Phụ 8MP 1440p, f/1.7\r\nCPU Exynos 8895 Octa, RAM 6GB\r\npin 3500 mAh\r\nCảm biến vân tay, cảm biến mống mắt, chống bụi chống nước chuẩn IP68, sạc nhanh', 12990000, '15.jpg', '5', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(17, 'Điện thoại Samsung Galaxy C5', 3, 'Màn hình 5,2 inch, full HD\r\ncamera 16 MP, full HD\r\nRAM 4GB, chip Snapdragon 617\r\npin 2600 mAh\r\nCảm biến vân tay', 5390000, '16.jpg', '5', '2017-11-13 19:20:28', '2017-11-13 19:20:28'),
(18, 'Samsung Galaxy S7 Edge', 3, 'Màn hình 5,5 inch, 1440x2560 pixels\r\nCamera 12 MP, 2160p, phụ 5MP\r\n4GB RAM, chip Snapdragon 820\r\npin 3600 mAh\r\nChuẩn IP 68 Chống bụi chống nước\r\nCảm biến vân tay, sạc nhanh, thiết kế màn hình cong độc đáo', 9490000, '18.jpg', '12', '2017-11-22 04:20:20', '2017-11-23 10:24:22'),
(19, 'Sony Xperia Z3', 5, 'Màn hình 5,2 inch, full HD\r\nCamera 20MP, 2160p\r\n3GB RAm, chip Snapdragon 801. GPU Adreno 330\r\npin 3100 mAh\r\nChống nước, chống bụi chuẩn IP68\r\nSạc nhanh\r\n', 6900000, '19.jpg', '6', '2017-11-07 06:17:16', '2017-11-09 10:16:16'),
(20, 'Sony Xperia XA', 5, 'Màn hình 5inch, HD,\r\nCamera 13MP, full HD\r\n2GB RAM, chip MediaTek 6755 Helio P10\r\npin 2300mAh\r\nKính chống xước. sạc nhanh', 4400000, '20.jpg', '5', '2017-11-01 06:16:16', '2017-11-02 10:26:00'),
(21, 'Sony Xperia XZ', 5, 'Màn hình 5,2 inch full HD\r\nCamera 23 MP 2160p\r\n3GB RAM, chip Snapdragon 820\r\npin 2900 mAh\r\nchống nước chống bụi chuẩn IP68, Cảm biến vân tay, sạc nhanh. Thiết kế nhỏ gọn, nguyên khối', 12000000, '21.jpg', '11', '2017-11-02 00:00:24', '2017-11-10 00:00:18'),
(22, 'Sony Xperia Z5 Premium', 5, 'Màn hình 5,5 inch độ phân giải 2K\r\nCamera 23MP 2160p\r\n3GN RAM, chip Snapdragon 810\r\npin 3430 mAh\r\nChuẩn IP68 chống bụi chống nước, cảm biến vân tay, thiết kế nguyên khối kim loại độc đáo và gọn gàng', 13500000, '22.jpg', '15', '2017-11-02 00:25:21', '2017-11-03 00:00:29'),
(23, 'LG G3', 6, 'Màn hình 5,5 inch độ phân giải 2K\r\nCamera 13MP, 2160p\r\n3GB RAM, chip Snapdragon 801\r\npin 3000 mAh\r\n', 3000000, '23.jpg', '7', '2017-11-03 00:00:21', '2017-11-06 00:22:20'),
(24, 'LG G4', 6, 'Màn hình 5,5 inch độ phân giải 2K\r\nCamera 16 MP, 2160p\r\n3GBB RAM, chip Snapdragon 808\r\npin 3000 mAh\r\nThiết kế cong độc đáo, nhiều lựa chọn phiên bản ốp lưng. Sạc nhanh', 5000000, '24.jpg', '5', '2017-11-02 09:10:00', '2017-11-08 00:00:00'),
(25, 'LG G5', 6, 'Màn hình 5,3 inch, độ phân giải 2K\r\nCamera 16MP, 2160p\r\nRAM 4GB, chip Snapdragon 820\r\npin 2800 mAh\r\nThiết kế module độc đáo. Cảm biến vân tay, sạc nhanh', 9000000, '25.jpg', '17', '2017-11-03 00:18:00', '2017-11-10 00:27:25'),
(26, 'LG V10', 6, 'Màn hình 5,7 inch độ phân giải 2K (1440x2560 pixels)\r\nCamera 16MP 2160p\r\nRAM 4GB, chip Snapdragon 808\r\npin 3000mAh\r\nHiệu năng mạnh mẽ, sạc nhanh, cảm biến vân tay', 7000000, '26.jpg', '11', '2017-11-09 06:30:30', '2017-11-10 00:27:31'),
(27, 'Sony Xperia XZ Premium', 5, 'Màn hình 5,46 inch, độ phân giải gần 4K (\r\n3840x2160 pixels)\r\nCamera 19MP, 2160p\r\n4GB RAM, chip Snapdragon 835\r\npin 3230 mAh\r\nThiết kế hiện đại, thời trang. Hiệu năng mạng mẽ và Camera xuất sắc. Cảm biến vân tay, sạc nhanh, chống nước chống bụi chuẩn IP68', 15000000, '27.jpg', '20', '2017-11-09 00:16:00', '2017-11-10 09:25:00'),
(28, 'Bphone 2', 4, 'Màn hình5,5 inch full HD\r\nCamera 16 MP, phụ 8MP\r\nRAM 3GB, chip Snapdragon 625\r\npin 3000 mAh\r\nMade in Vietnam, cảm biến vân tay, chống nước chống bụi', 9369000, '28.jpg', '39', '2017-11-15 00:25:00', '2017-11-16 00:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_user` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
