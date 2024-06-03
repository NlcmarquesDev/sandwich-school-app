-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 03, 2024 at 08:08 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broodjesVDAB`
--

-- --------------------------------------------------------

--
-- Table structure for table `bread_types`
--

CREATE TABLE `bread_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bread_types`
--

INSERT INTO `bread_types` (`id`, `type`, `image`, `price`) VALUES
(1, 'witbrood', './public/images/broodje1.jpg', 3.5),
(2, 'bruinbrood', './public/images/broodje1.jpg', 3.5),
(3, 'volkorenbrood', './public/images/broodje1.jpg', 3.5),
(4, 'meergranenbrood', './public/images/broodje1.jpg', 3.5),
(5, 'kleinbrood', './public/images/broodje1.jpg', 3.5),
(6, 'roggebrood', './public/images/broodje1.jpg', 3.5),
(7, 'pistolet', './public/images/broodje1.jpg', 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `image`, `price`) VALUES
(15, 'hesp', './public/images/broodje1.jpg', 0.5),
(16, 'kaas', './public/images/broodje1.jpg', 0.5),
(17, 'sla', './public/images/broodje1.jpg', 0.5),
(18, 'tomaat', './public/images/broodje1.jpg', 0.5),
(19, 'komkommer', './public/images/broodje1.jpg', 0.5),
(20, 'augurk', './public/images/broodje1.jpg', 0.5),
(21, 'ei', './public/images/broodje1.jpg', 0.5),
(22, 'kipcurry', './public/images/broodje1.jpg', 0.5),
(23, 'tonijn salade', './public/images/broodje1.jpg', 0.5),
(24, 'boter', './public/images/broodje1.jpg', 0.5),
(25, 'paprika', './public/images/broodje1.jpg', 0.5),
(26, 'omelet', './public/images/broodje1.jpg', 0.5),
(27, 'honing', './public/images/broodje1.jpg', 0.5),
(28, 'mosterdsaus', './public/images/broodje1.jpg', 0.5),
(29, 'avocado', './public/images/broodje1.jpg', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_done` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `created_at`, `payment_done`) VALUES
(18, 15, 5.5, '2024-05-31 08:34:04', 'payed'),
(19, 14, 11, '2024-05-31 08:35:43', 'later'),
(20, 15, 9.5, '2024-05-31 14:10:47', 'payed'),
(21, 14, 4.5, '2024-05-31 14:19:00', 'payed'),
(22, 14, 9.5, '2024-05-31 14:19:37', 'later'),
(23, 14, 4, '2024-05-31 14:22:42', 'payed'),
(24, 14, 4, '2024-05-31 14:24:45', 'payed'),
(25, 14, 4.5, '2024-05-31 14:25:00', 'payed');

-- --------------------------------------------------------

--
-- Table structure for table `sandwiches`
--

CREATE TABLE `sandwiches` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `bread_id` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sandwiches`
--

INSERT INTO `sandwiches` (`id`, `order_id`, `bread_id`, `price`) VALUES
(16, 20, 3, 3.5),
(17, 20, 7, 3.5),
(18, 21, 2, 3.5),
(19, 22, 1, 3.5),
(20, 22, 7, 3.5),
(21, 23, 5, 3.5),
(22, 24, 4, 3.5),
(23, 25, 6, 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `sandwich_ingredients`
--

CREATE TABLE `sandwich_ingredients` (
  `sandwich_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sandwich_ingredients`
--

INSERT INTO `sandwich_ingredients` (`sandwich_id`, `ingredient_id`, `price`) VALUES
(16, 17, 0.5),
(16, 18, 0.5),
(17, 15, 0.5),
(17, 19, 0.5),
(17, 21, 0.5),
(18, 16, 0.5),
(18, 17, 0.5),
(19, 15, 0.5),
(19, 16, 0.5),
(20, 21, 0.5),
(20, 22, 0.5),
(20, 26, 0.5),
(21, 17, 0.5),
(22, 18, 0.5),
(23, 15, 0.5),
(23, 16, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `temp_pass` varchar(100) DEFAULT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expire_at` datetime DEFAULT NULL,
  `account_activation_hash` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `temp_pass`, `reset_token_hash`, `reset_token_expire_at`, `account_activation_hash`) VALUES
(1, 'Nuno', 'nuno@gmail.com', 'nuno12345', NULL, NULL, NULL, NULL),
(13, 'dylan', 'dylan@gmail.com', '$2y$10$zrxQTIcPPYIm.oJPW19/p.C04IIAlYbfNkAwHlAs7PxU01mL1B4sy', 'MbEC', NULL, NULL, NULL),
(14, 'Matilde', 'mat@gmail.com', '$2y$10$edCbo6jrIj.FlGT9dbAREu3w3Enq99lBpLt1EhQ4BDtFDQfIMMXKu', 'W7s1', NULL, NULL, NULL),
(15, 'ines', 'ines@gmail.com', '$2y$10$r6TlAwk9WyPSH1IstJbRQuH3SocozNdkTPbO.zDTtQ8Pbcobcteiu', 'DKVj', NULL, NULL, NULL),
(16, 'inin', 'in@gmail.com', '$2y$10$flfBahNTftOrCvtcYYAE4.wbweIzaCnylooMasNrYxXXAVUwBENbG', 'f3CQ', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bread_types`
--
ALTER TABLE `bread_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sandwiches`
--
ALTER TABLE `sandwiches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `bread_id` (`bread_id`);

--
-- Indexes for table `sandwich_ingredients`
--
ALTER TABLE `sandwich_ingredients`
  ADD PRIMARY KEY (`sandwich_id`,`ingredient_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `account_activatio_hash` (`account_activation_hash`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bread_types`
--
ALTER TABLE `bread_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sandwiches`
--
ALTER TABLE `sandwiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sandwiches`
--
ALTER TABLE `sandwiches`
  ADD CONSTRAINT `sandwiches_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sandwiches_ibfk_2` FOREIGN KEY (`bread_id`) REFERENCES `bread_types` (`id`);

--
-- Constraints for table `sandwich_ingredients`
--
ALTER TABLE `sandwich_ingredients`
  ADD CONSTRAINT `sandwich_ingredients_ibfk_1` FOREIGN KEY (`sandwich_id`) REFERENCES `sandwiches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sandwich_ingredients_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
