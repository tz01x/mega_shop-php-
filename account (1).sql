-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 12:04 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`name`) VALUES
('laptop'),
('tach');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT curdate(),
  `payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created`, `payment_id`) VALUES
(1, 30, '2019-11-27', NULL),
(2, 30, '2019-11-27', NULL),
(3, 30, '2019-11-27', NULL),
(4, 30, '2019-11-27', NULL),
(5, 30, '2019-11-27', NULL),
(6, 30, '2019-11-27', 2),
(7, 30, '2019-11-27', NULL),
(8, 30, '2019-11-27', NULL),
(9, 30, '2019-11-27', NULL),
(10, 30, '2019-11-28', NULL),
(11, 30, '2019-11-28', NULL),
(12, 30, '2019-11-28', NULL),
(13, 30, '2019-11-28', NULL),
(14, 30, '2019-11-28', NULL),
(15, 30, '2019-11-28', NULL),
(16, 30, '2019-11-28', NULL),
(17, 30, '2019-11-28', NULL),
(18, 30, '2019-11-28', NULL),
(19, 30, '2019-11-28', NULL),
(20, 30, '2019-11-28', NULL),
(21, 30, '2019-11-28', NULL),
(22, 30, '2019-11-28', 6),
(23, 30, '2019-11-28', 8),
(24, 30, '2019-11-28', 9);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_q` int(11) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `created` date DEFAULT curdate(),
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `product_id`, `product_q`, `product_price`, `created`, `order_id`) VALUES
(1, 2, 15, 55550.5, '2019-11-27', 5),
(2, 2, 66, 55550.5, '2019-11-27', 6),
(3, 1, 165, 55550.5, '2019-11-27', 6),
(4, 2, 166, 55550.5, '2019-11-28', 22),
(5, 1, 16, 55550.5, '2019-11-28', 22),
(6, 1, 15, 55550.5, '2019-11-28', 23),
(7, 2, 15, 55550.5, '2019-11-28', 23),
(8, 1, 155, 55550.5, '2019-11-28', 24),
(9, 2, 55, 55550.5, '2019-11-28', 24);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `card_num` varchar(200) NOT NULL,
  `card_expiration` varchar(200) NOT NULL,
  `card_cvv` varchar(200) NOT NULL,
  `total_amount` float NOT NULL,
  `orserid` int(11) DEFAULT NULL,
  `paymentMethod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `card_num`, `card_expiration`, `card_cvv`, `total_amount`, `orserid`, `paymentMethod`) VALUES
(1, 5, '552', '525', '54523', 55, 32, ''),
(2, NULL, '', '', '', 0, NULL, ''),
(3, NULL, '', '', '', 0, NULL, ''),
(4, 5, 'j', 'x', 's', 0, NULL, 'pp'),
(5, 30, '123', '444', '66', 10110200, 20, 'credit_card'),
(6, 30, '123', '444', '66', 10110200, 21, 'credit_card'),
(7, 30, '123', '444', '66', 10110200, 22, 'credit_card'),
(8, 30, '123', '12356', '888', 1666520, 23, 'paypal'),
(9, 30, '4566', '252', '111', 11665600, 24, 'credit_card');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `c_name` varchar(20) DEFAULT NULL,
  `catagory_name` varchar(30) DEFAULT NULL,
  `created` date DEFAULT curdate(),
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `c_name`, `catagory_name`, `created`, `description`) VALUES
(1, 'aspier 5', 55550.5, 5, 'accer', 'laptop', '2019-11-23', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa               sint voluptatibus!               Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.'),
(2, 'aspier 5 gx 4gb ram', 55550.5, 5, 'accer2', 'tach', '2019-11-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `profle`
--

CREATE TABLE `profle` (
  `id` int(11) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profle`
--

INSERT INTO `profle` (`id`, `address`, `phone`) VALUES
(24, 'Banasry Dhaka', '01773032999'),
(25, 'Banasry Dhaka', '01773032999'),
(26, 'Banasry Dhaka', '01773032999'),
(27, 'Banasry Dhaka', '01773032999'),
(28, 'Banasry Dhaka', '01773032999'),
(29, 'Banasry Dhaka', '01773032999'),
(30, 'Banasry Dhaka', '01773032999');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `email` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `c_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`email`, `phone`, `c_name`) VALUES
('email@g.com', '3o3u48888', 'accer'),
('emaiel@g.com', '3o3u48888', 'accer2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(234) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `is_staff` tinyint(1) NOT NULL DEFAULT 0,
  `is_superuser` tinyint(1) NOT NULL DEFAULT 0,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `is_staff`, `is_superuser`, `first_name`, `last_name`, `active`) VALUES
(24, 'admin', '098f6bcd4621d373cade4e832627b4f6', 'a@g.com', 0, 0, 'Shahoriar', 'Fahim', 1),
(25, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'abdur@gmail.com', 0, 0, 'Shahoriar', 'Fahim', 1),
(26, 'admin', '098f6bcd4621d373cade4e832627b4f6', 'abdur963rahman@email.com', 0, 0, 'Shahoriar', 'Fahim', 1),
(27, 'admin', '202cb962ac59075b964b07152d234b70', 'ab@g.com', 0, 0, 'Shahoriar', 'Fahim', 1),
(28, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'shahoriar.fahim@gmail.com', 0, 0, 'Shahoriar', 'Fahim', 1),
(29, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1shahoriar.fahim@gmail.com', 0, 0, 'Shahoriar', 'Fahim', 1),
(30, 'admin', '202cb962ac59075b964b07152d234b70', 'ag123@g.com', 0, 0, 'Shahoriar', 'Fahim', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `payment_fk` (`payment_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_fk` (`product_id`),
  ADD KEY `order_fk` (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_fk` (`c_name`),
  ADD KEY `catagory_fk` (`catagory_name`);

--
-- Indexes for table `profle`
--
ALTER TABLE `profle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`c_name`),
  ADD UNIQUE KEY `c_name` (`c_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profle`
--
ALTER TABLE `profle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `payment_fk` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `p_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `catagory_fk` FOREIGN KEY (`catagory_name`) REFERENCES `catagory` (`name`),
  ADD CONSTRAINT `supplier_fk` FOREIGN KEY (`c_name`) REFERENCES `supplier` (`c_name`) ON DELETE CASCADE;

--
-- Constraints for table `profle`
--
ALTER TABLE `profle`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
