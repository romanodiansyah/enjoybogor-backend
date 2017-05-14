-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 04:53 PM
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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL DEFAULT '0',
  `food_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `portion_size` tinyint(100) NOT NULL,
  `menu_description` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `restaurant_id`, `food_name`, `price`, `portion_size`, `menu_description`, `active`) VALUES
(-1, -1, 'Belum Ada Makanan', 0, 0, '-', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_address` text NOT NULL,
  `restaurant_category` varchar(20) NOT NULL,
  `restaurant_contact` int(13) NOT NULL,
  `restaurant_description` text NOT NULL,
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `menu_id`, `restaurant_name`, `restaurant_address`, `restaurant_category`, `restaurant_contact`, `restaurant_description`, `latitude`, `longitude`, `active`, `user`) VALUES
(-1, -1, 'Tidak Ada Restaurant', '-', 'none', 0, '-', 0, 0, 0, 0),
(5, -1, 'test', 'lagi', 'terus', 7812, 'tes', 0, 0, 2, 0);

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
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_name`, `date_signup`, `points`, `user_contact`, `email`, `password`, `active`) VALUES
(-1, 'admin', 'Admin', '2017-05-07 13:50:50', 0, 0, 'admin@enjoybogor.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1),
(12, 'jodhi', 'jodhi', '2017-05-13 07:03:11', 0, 4546, 'jodhi@gmail.com', '53cad8e01bd4376c3c75f202a38176ecb23b73d6d76abaa3784db4913539008f', 1);

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
  `quantity` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
  ADD KEY `user` (`user`),
  ADD KEY `menu_id` (`menu_id`);

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
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

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
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`menu_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
