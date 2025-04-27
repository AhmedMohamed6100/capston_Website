-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 11:05 PM
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
-- Database: `capston_test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `full_name`, `email`, `address`, `phone`, `note`, `order_date`) VALUES
(5, 1, 'Mohamed', 'admin@example.com', '29Elslam street elharm\r\n3', '01129718176', '', '2025-04-27 20:11:52'),
(6, 1, 'Mohamed', 'ahmedgoda6100@gmail.com', '29Elslam street elharm\r\n3', '01129718176', '', '2025-04-27 20:22:43'),
(7, 1, 'Mohamed', 'admin@example.com', '29Elslam street elharm\r\n3', '01129718176', '', '2025-04-27 20:26:33'),
(8, 1, 'manar hassan ', 'manar100@gmail.com', '29Elslam street elharm\r\n3', '01129718176', '', '2025-04-27 20:27:51'),
(9, 1, 'manora', 'MMMMM@gmail.com', '29Elslam street elharm\r\n3', '01129718176', '', '2025-04-27 20:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `sales_product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `sales_product_id`, `quantity`) VALUES
(1, 5, NULL, 5),
(2, 5, NULL, 1),
(3, 6, NULL, 5),
(4, 6, NULL, 1),
(5, 7, NULL, 1),
(6, 8, NULL, 1),
(7, 9, NULL, 5),
(8, 9, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image_url`) VALUES
(1, 'chair', 'image/chair.webp'),
(2, 'T-Shirt', 'image/EID-796ccd44cf6fe3b71d8bc02d6e38193f158edd80.webp'),
(3, 'Hoodies', 'image/product1.webp'),
(4, 'trousers', 'image/product2.webp'),
(5, 'basic-hoody', 'image/product3.webp'),
(6, 'Grey-Hoodies', 'image/product4.webp'),
(7, 'Sport', 'image/product5.webp'),
(8, 'blue-hoody', 'image/product6.webp'),
(9, 'CLASSIC', 'image/product9.webp'),
(10, 'T-SHIRT', 'image/EID-796ccd44cf6fe3b71d8bc02d6e38193f158edd80.webp');

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

CREATE TABLE `sales_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_products`
--

INSERT INTO `sales_products` (`id`, `name`, `price`, `image_url`, `product_id`, `product_link`) VALUES
(1, 'Hoddy', 500.00, '../image/product1.webp', 1, '../productpage/product.php'),
(2, 'chair', 490.00, '../image/chair.webp', 2, '../productpage/product2.php'),
(3, 'KARGO', 490.00, '../image/pro1.webp', 3, '../productpage/product3.php'),
(4, 'cajwal', 1490.00, '../image/product3.webp', 4, '../productpage/product4.php'),
(5, 'Basic-HODDY', 590.00, '../image/product4.webp', 5, '../productpage/product5.php'),
(6, 'SPORT', 999.00, '../image/product5.webp', 6, '../productpage/product6.php'),
(7, 'BLUE-HODDY', 590.00, '../image/product6.webp', 7, '../productpage/product7.php'),
(8, 'HOODY', 490.00, '../image/product7.webp', 8, '../productpage/product8.php'),
(9, 'CLASSIC', 1200.00, '../image/product9.webp', 9, '../productpage/product9.php'),
(10, 'T-SHIRT', 500.00, '../image/EID-796ccd44cf6fe3b71d8bc02d6e38193f158edd80.webp', 10, '../productpage/product10.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `is_admin`) VALUES
(1, 'ahmed', 'ahmedgoda6100@gmail.com', '$2y$10$jVgAsw6dyNjrCCPrRapx.uumSD5qXdrc5xagqdUvFgGvnuqX0.Gx2', '2025-04-27 19:18:10', 0),
(2, 'manar', 'manar@gmail.com', '123456', '2025-04-27 19:52:10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `sales_product_id` (`sales_product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`sales_product_id`) REFERENCES `sales_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD CONSTRAINT `sales_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
