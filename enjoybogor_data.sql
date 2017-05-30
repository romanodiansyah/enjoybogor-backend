-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 06:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enjoybogor_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `assoc`
--

CREATE TABLE `assoc` (
  `user_id` int(11) NOT NULL DEFAULT '-1',
  `voucher_id` int(11) NOT NULL DEFAULT '-1',
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `restaurant_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `portion_size` tinyint(100) NOT NULL,
  `menu_description` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `image1` varchar(255) NOT NULL DEFAULT 'NULL.jpg',
  `image2` varchar(255) NOT NULL DEFAULT 'NULL.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`restaurant_id`, `menu_id`, `food_name`, `price`, `portion_size`, `menu_description`, `active`, `image1`, `image2`) VALUES
(-1, -1, 'Belum Ada Makanan', 0, 0, '-', 0, 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `ratings_and_comments`
--

CREATE TABLE `ratings_and_comments` (
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings_and_comments`
--

INSERT INTO `ratings_and_comments` (`user_id`, `restaurant_id`, `comment`, `rating`) VALUES
(1, 1, 'banyaakk\r\n', 5);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_address` text NOT NULL,
  `restaurant_category` varchar(20) NOT NULL,
  `restaurant_contact` int(13) NOT NULL,
  `restaurant_description` text NOT NULL,
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '-1',
  `image` varchar(255) NOT NULL DEFAULT 'NULL',
  `date_made` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `restaurant_name`, `restaurant_address`, `restaurant_category`, `restaurant_contact`, `restaurant_description`, `latitude`, `longitude`, `active`, `user_id`, `image`, `date_made`) VALUES
(-1, 'Tidak Ada Restaurant', '-', 'none', 0, '-', 0, 0, 0, 0, 'NULL.jpg', '0000-00-00 00:00:00'),
(1, 'zul', 'zul', 'zul', 81232, 'ksas', 0, 0, 2, 1, '0_Capture1.PNG', '2017-05-30 22:33:49'),
(2, 'jodhi', 'jodhi', 'jodhi', 213, 'jodhi', 0, 0, 1, 1, '2_Capture.PNG', '2017-05-30 22:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants_images`
--

CREATE TABLE `restaurants_images` (
  `image_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL DEFAULT '-1',
  `image` varchar(11) NOT NULL DEFAULT 'NULL',
  `user_id` int(11) NOT NULL DEFAULT '-1',
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `date_signup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `points` int(11) DEFAULT '0',
  `user_contact` bigint(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_name`, `date_signup`, `points`, `user_contact`, `email`, `password`, `active`, `image`) VALUES
(-1, 'ADMIN', 'Admin', '2017-05-07 13:50:50', 0, 0, 'admin@enjoybogor.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, ''),
(1, 'JODHI', 'jodhi', '2017-05-30 15:09:32', 100, 0, 'jodhi@gmail.com', '53cad8e01bd4376c3c75f202a38176ecb23b73d6d76abaa3784db4913539008f', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucher_id` int(11) NOT NULL,
  `voucher_name` varchar(255) NOT NULL,
  `points_needed` int(11) NOT NULL,
  `voucher_type` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher_id`, `voucher_name`, `points_needed`, `voucher_type`, `active`, `quantity`, `image`) VALUES
(1, 'Jodhi', 100, 'banyak', 1, 2, '1_Image_93e8526.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assoc`
--
ALTER TABLE `assoc`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `voucher_id` (`voucher_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `ratings_and_comments`
--
ALTER TABLE `ratings_and_comments`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `restaurants_images`
--
ALTER TABLE `restaurants_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `restaurants_images`
--
ALTER TABLE `restaurants_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assoc`
--
ALTER TABLE `assoc`
  ADD CONSTRAINT `assoc_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `assoc_ibfk_2` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`voucher_id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);

--
-- Constraints for table `ratings_and_comments`
--
ALTER TABLE `ratings_and_comments`
  ADD CONSTRAINT `ratings_and_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `ratings_and_comments_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);

--
-- Constraints for table `restaurants_images`
--
ALTER TABLE `restaurants_images`
  ADD CONSTRAINT `restaurants_images_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`),
  ADD CONSTRAINT `restaurants_images_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
