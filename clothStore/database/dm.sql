-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 12:25 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'kids'),
(4, 'dress'),
(5, 'dresss');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `name`, `email`, `password`, `contact`, `gender`, `date`, `address`, `city`, `state`) VALUES
(1, 'naresh', 'nk@gmail.com', '456', 789456123, 'male', '2018-02-27 19:35:57', '', '', ''),
(5, 'chhaya', 'ch@gmail.com', '123', 1234567890, 'female', '2018-03-03 09:45:00', '', '', ''),
(6, 'rakesh', 'rakesh@gmail.com', '123456', 7894561230, 'male', '2018-03-03 10:38:17', '', '', ''),
(7, 'sarjit', 'sarjit@gmail.com', '789', 4567890021, 'male', '2018-03-03 11:07:17', '', '', ''),
(8, 'nancy', 'nancy@gmail.com', '21899', 1234567890, 'female', '2018-03-05 07:36:26', '', '', ''),
(9, 'harshini', 'h@gmail.com', '222', 1234567890, 'male', '2018-03-07 12:55:56', '', '', ''),
(10, 'farhad ', 'farhad@gmail.com', '123', 654224487766, 'male', '2018-03-08 11:23:42', '', '', ''),
(11, 'Mrunali', 'm@yahoo.in', '123', 1234567890, 'female', '2018-03-08 11:42:08', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `name`, `email`, `contact`, `title`, `msg`, `date`) VALUES
(1, 'Alkesh', 'alkesh@yahoo.in', 9016647480, 'Regarding My Product ', 'This for Testing', '2018-02-27 19:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry`
--

CREATE TABLE IF NOT EXISTS `tbl_inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`id`, `name`, `email`, `contact`, `title`, `msg`, `date`) VALUES
(1, 'Alkesh', 'alkesh@yahoo.in', 9016647480, 'Regarding My Product ', 'This for Testing', '2018-02-27 19:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'nesar', 'nesar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `date`, `customer_id`, `status`) VALUES
(1, '2018-03-08', 1, 'pending'),
(2, '2018-03-06', 1, 'pending'),
(5, '2018-03-08', 10, 'pending'),
(6, '2018-03-08', 10, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `o_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`o_id`, `product_id`, `quantity`, `price`, `order_id`) VALUES
(1, 2, 1, '5000', 1),
(2, 10, 2, '900', 2),
(3, 12, 1, '700', 3),
(4, 17, 1, '100', 4),
(5, 16, 1, '800', 5),
(6, 16, 2, '800', 5),
(7, 5, 1, '31000', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `size` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `stock` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `pname`, `cat_id`, `subcat_id`, `price`, `size`, `description`, `stock`, `image`) VALUES
(2, 'Blue Shirt', 1, 1, '5000', 's,m', 'This is for Testing', 'In', 'logo.jpg'),
(4, 'HP Core i3 6th Gen leptop', 4, 12, '25000', 'l', 'HP Core i3 6th Gen - (4 GB/1 TB HDD/Windows 10 Home) 14-ar004TU Laptop  (14 inch, Turbo SIlver, 1.94 kg)\r\n', 'In', 'images6.jpg'),
(5, 'Dell Inspiron 15-3567 Black', 4, 12, '31000', 'l', 'Dell Inspiron 15-3567 (7th Gen i5/4GB/1TB/39.62cm(15.6)/DOS) Black', 'In', 'images.jpg'),
(6, 'CLOTHING', 2, 8, '700', 'l', 'Best Indian Sarees', 'In', '1610fe3a0d3d59d6fab108546c2d20a4--blouse-online-online-shopping.jpg'),
(7, 'Purse', 2, 7, '800', 'm', 'Purse', 'In', 'download.jpg'),
(8, '', 2, 7, '800', 's,m,l', 'Best Tops', 'In', 'download (1).jpg'),
(9, 'T-shirt', 2, 2, '400', 's,m,l', 'T-shirt', 'In', 'download (2).jpg'),
(10, 'T-shirt', 1, 2, '900', 's,m,l,xl', 'T-shirt', 'In', 'black-solid-knit-crew-t-shirt-21281C_1_1.jpg'),
(11, 'Shirt', 1, 4, '900', 's,m,l,xl', 'Shirt  Shirt', 'In', 'download (3).jpg'),
(12, 'Watches,', 1, 16, '700', 'm', 'watches, ', 'In', 'download (4).jpg'),
(13, '', 1, 5, '800', 'm,l', 'a', 'In', 'download (5).jpg'),
(16, 'Jeans', 3, 5, '800', 'xl', 'cool', 'In', 'download (5).jpg'),
(17, 'Lux', 4, 19, '100', 'xl', 'mst hai ', 'In', '1610fe3a0d3d59d6fab108546c2d20a4--blouse-online-online-shopping.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `subcat_name`, `cat_id`) VALUES
(2, 'Tshirts', 1),
(4, 'Shirts', 1),
(5, 'Jeans', 1),
(6, 'Dresses', 2),
(7, 'Tops', 2),
(8, 'Sarees', 2),
(13, 'Women Tshirts', 2),
(14, 'IPhone', 6),
(15, 'samsung', 6),
(16, 'Watches', 1),
(17, 'Boys Clothing', 3),
(18, 'Girls Clothing', 3),
(19, 'Kruti', 4),
(20, 'Anarkali', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
