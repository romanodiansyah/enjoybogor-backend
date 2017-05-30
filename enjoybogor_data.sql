-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 03:17 PM
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
(-1, -1, 'Belum Ada Makanan', 0, 0, '-', 0, 'NULL', 'NULL'),
(5, 1, 'test', 10000, 4, 'enak', 2, 'NULL', 'NULL'),
(5, 2, 'zul', 0, 10, 'zul bakar', 2, 'NULL', 'NULL'),
(11, 4, 'goyang ipul', 0, 0, '-', 2, 'NULL', 'NULL'),
(5, 5, 'Zul', 2, 2, 'zul', 1, 'NULL', 'NULL');

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
(12, 5, 'test comment', 3),
(17, 5, 'coba\r\n', 3),
(12, 8, 'test', 3),
(17, 8, 'test', 3);

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
  `sumrating` int(11) NOT NULL DEFAULT '0',
  `counterrating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `restaurant_name`, `restaurant_address`, `restaurant_category`, `restaurant_contact`, `restaurant_description`, `latitude`, `longitude`, `active`, `user_id`, `image`, `sumrating`, `counterrating`) VALUES
(-1, 'Tidak Ada Restaurant', '-', 'none', 0, '-', 0, 0, 0, 0, '', 0, 1),
(5, 'test', 'lagi', 'terus', 7812, 'tes', 0, 0, 2, 0, '', 3, 3),
(6, 'tes1', 'tes1', 'tes1', 0, 'tes1', 0, 0, 0, 0, '', 0, 1),
(8, 'tes1', 'tes1', 'tes1', 251, 'tes1', 0, 0, 2, 0, '', 6, 3),
(9, 'Ayam Geprek', 'Jl Dramaga', 'Ayam', 6253, 'Ayam geprek pejuang bisa deliv order gratis looo', 0, 0, 0, -1, '', 0, 0),
(10, 'Kentaki Fred Ciken', 'Jl Pajajaran', 'Ayam', 251, 'kulit ayamnya enak, kalo mau makan bareng zul biar dapet kulit extra', 0, 0, 0, -1, 'NULL', 0, 0),
(11, 'Tampomas', 'Jl Dramaga', 'mie', 2513, 'warung tegal', 0, 0, 2, 18, 'NULL', 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants_images`
--

INSERT INTO `restaurants_images` (`image_id`, `restaurant_id`, `image`, `user_id`, `active`) VALUES
(1, 5, '1494776770_', -1, 1),
(2, 5, '1494776770_', -1, 1);

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
(12, 'JODHI', 'jodhi', '2017-05-13 07:03:11', 0, 4546, 'jodhi@gmail.com', '53cad8e01bd4376c3c75f202a38176ecb23b73d6d76abaa3784db4913539008f', 1, '1494776770_tmp_Untitled-3.png'),
(13, 'tes1', 'tes1', '2017-05-16 03:34:57', 0, 251, 'tes@gmail.com', '970f3fce6e109b8e83d902c4de153d8b0386f0ccba23ac71e070859d5091ff84', 1, ''),
(14, 'Zul', 'Zulfahmi Ibnu Habibi', '2017-05-17 09:37:56', 0, 8128486, 'zul@gmail.com', '6d8b7d9bb3c616e4effbc1d6f8e65ae05f68ce0a158aeac40a7017a3afa3ebe7', 1, ''),
(16, 'ROMANODIANSYAH', 'Mohammad Romano Diansyah', '2017-05-24 04:01:57', 0, 81284863256, 'romano.diansyah@gmail.com', '5c60fe0d492919d196e3a57352d609c34ba12ddc21f9a69ef442b210d6ed5153', 1, ''),
(17, 'PENDY1234', 'Pendy Prasetya', '2017-05-24 09:40:38', 0, 81284863256, 'pendy@pendy.com', 'e7d0d0d4a73d534926d9b92dae78dc211b2e35d209037c97c751ba6bb3b1f688', 1, ''),
(18, 'BANGSAT', 'Nuh Satria', '2017-05-25 14:48:07', 100, 6666666, 'bang@sat.com', '4077902c11d06e1058060d1bd789e7c5a1db2bbecbc39b8d161c1d131c2ac1b7', 1, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `restaurant_id` (`restaurant_id`);

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
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `restaurants_images`
--
ALTER TABLE `restaurants_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `restaurants_images_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
