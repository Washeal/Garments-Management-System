-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 10:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--
drop table if EXISTS attendances;
CREATE TABLE `attendances` (
  `id` int(15) PRIMARY key AUTO_INCREMENT ,
  `empoloyee_id` int(30) NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `present_date` date DEFAULT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `empoloyee_id`, `in_time`, `out_time`, `present_date`) VALUES
(1, 1, '08:00:00', '17:00:00', '2021-07-04'),
(2, 3, '09:11:00', '09:11:00', '2021-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--
drop table if EXISTS categorys;

CREATE TABLE `categorys` (
  `id` int(40) PRIMARY key AUTO_INCREMENT ,
  `category` varchar(50) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `category`) VALUES
(1, 'meal'),
(2, 'femail'),
(3, 'Cardigang');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--
drop table if EXISTS colors;

CREATE TABLE `colors` (
  `id` int(10) PRIMARY key AUTO_INCREMENT,
  `name` varchar(100) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'red'),
(2, 'YELLOW');

-- --------------------------------------------------------

--
-- Table structure for table `depertments`
--
drop table if EXISTS depertments;

CREATE TABLE `depertments` (
  `id` int(10) PRIMARY key AUTO_INCREMENT ,
  `depertment` varchar(100) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depertments`
--

INSERT INTO `depertments` (`id`, `depertment`) VALUES
(1, 'PHP'),
(4, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--
drop table if EXISTS designations;

CREATE TABLE `designations` (
  `id` int(40) PRIMARY key AUTO_INCREMENT ,
  `designation` varchar(50) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`) VALUES
(1, 'CEO'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `employees`

drop table if EXISTS employees;

DROP TABLE IF EXISTS employees;
CREATE TABLE `employees` (
  `id` int(40) PRIMARY key AUTO_INCREMENT,
  `emp_name` varchar(30) NOT NULL,
  `nid` varchar(37) NOT NULL,
  `present_address` varchar(300) DEFAULT NULL,
  `permanent_address` varchar(50) DEFAULT NULL,
  `edu_qulification` varchar(30) NOT NULL,
  `depertment_id` int(10) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `email` varchar(110) NOT NULL,
  `phone` int(11) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `created_at` timestamp
); 

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_name`, `nid`, `present_address`, `permanent_address`, `edu_qulification`, `depertment_id`, `designation_id`, `gender`, `email`, `phone`, `joining_date`, `created_at`) VALUES
(1, 'Tawrat islam', '2322422323', 'rongpur', 'dhaka', 'diploma', 3, 2, 'Male', 'md.tawrat@gmail.com', 2147483647, '1995-02-02', '0000-00-00 00:00:00'),
(2, 'shamim islam', '232344212', 'khulna', 'dhaka', 'HSC', 1, 1, 'Male', 'md.shamil@gmail.com', 2147483647, '2021-07-04', '0000-00-00 00:00:00'),
(3, 'shaidul islam', '23224223232', 'dhaka', 'savare', 'diploma', 3, 2, 'Female', 'shaidul@gmail.com', 2147483647, '2021-07-04', '0000-00-00 00:00:00'),
(4, 'Anisul Islam', '2322422323', 'Borishal', 'dhaka', 'HSC', 1, 1, 'Male', 'anisul@gmail.com', 2147483647, '2021-07-05', '0000-00-00 00:00:00'),
(5, 'ROBIUL ISLAM', '2322422323', 'chittagong', 'dhaka', 'diploma', 1, 2, 'Male', 'robi@gmail.com', 2147483647, '2021-07-04', '0000-00-00 00:00:00'),
(6, 'Riz vy', '2323442', 'rongpur', 'dhaka', 'diploma', 1, 1, 'Male', 'riz@gmail.com', 2147483647, '2021-07-18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--
DROP TABLE IF EXISTS manufactures;

CREATE TABLE `manufactures` (
  `id` int(10) PRIMARY key AUTO_INCREMENT ,
  `product_id` int(10) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `price` varchar(45) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`

DROP TABLE IF EXISTS manufactures;

DROP TABLE IF EXISTS orders;
CREATE TABLE `orders` (
  `id` int(10) PRIMARY key AUTO_INCREMENT ,
  `customer_id` int(10) NOT NULL,
  `order_date` varchar(150) NOT NULL,
  `shipping_address` varchar(150) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `vat` varchar(150) NOT NULL,
  `due_date` varchar(150) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `shipping_address`, `discount`, `vat`, `due_date`) VALUES
(1, 4, '2021-08-09', 'na', '0', '0', '2021-08-15'),
(2, 4, '2021-08-09', 'na', '0', '0', '2021-08-11'),
(3, 1, '1970-01-01', 'na', '0', '0', '1970-01-01'),
(4, 1, '1970-01-01', 'na', '0', '0', '1970-01-01'),
(5, 5, '2021-08-09', 'na', '0', '0', '2021-08-10'),
(6, 5, '2021-08-09', 'na', '0', '0', '2021-08-10'),
(7, 4, '2021-08-10', 'na', '0', '0', '2021-08-18'),
(8, 4, '2021-08-11', 'na', '0', '0', '2021-08-23'),
(9, 4, '2021-08-11', 'na', '0', '0', '2021-08-23'),
(11, 1, '', 'na', '0', '0', ''),
(12, 4, '2021-08-09', 'na', '0', '0', '2021-08-10'),
(13, 5, '2021-08-11', 'na', '0', '0', '2021-08-24'),
(14, 1, '', 'na', '0', '0', ''),
(15, 5, '2021-08-11', 'Dhaka', '0', '0', '2021-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--



DROP TABLE IF EXISTS order_details;

CREATE TABLE `order_details` (
  `id` int(10) PRIMARY key AUTO_INCREMENT ,
  `order_id` int(10) NOT NULL,
  `product_id` int(13) NOT NULL,
  `price` varchar(13) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `discount` varchar(10) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `qty`, `discount`) VALUES
(2, 10, 7, '13323', '1', '1'),
(3, 11, 15, '100', '12', '0'),
(4, 11, 7, '100', '12', '0'),
(5, 12, 7, '13323', '11', '0'),
(7, 13, 7, '34', '2', '0'),
(8, 13, 15, '34', '2', '0'),
(10, 14, 2, '100', '4', '1'),
(11, 14, 7, '100', '2', '1'),
(12, 14, 1, '100', '2', '1'),
(13, 15, 7, '47', '22', '0'),
(14, 15, 16, '47', '22', '0');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--
DROP TABLE IF EXISTS purchases;

CREATE TABLE `purchases` (
  `id` int(12) PRIMARY key AUTO_INCREMENT,
  `saplayer_id` int(10) NOT NULL,
  `parces_date` varchar(100) NOT NULL,
  `delebery_date` varchar(100) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `saplayer_id`, `parces_date`, `delebery_date`) VALUES
(1, 0, '2021-08-17', '2021-08-10'),
(2, 0, '2021-08-17', '2021-08-10'),
(3, 0, '2021-08-10', '2021-08-12'),
(4, 1, '2021-08-10', '2021-08-18'),
(5, 1, '2021-08-10', '2021-08-18'),
(6, 2, '2021-08-10', '2021-08-19'),
(7, 2, '2021-08-10', '2021-08-19'),
(8, 2, '2021-08-17', '2021-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `purc_details`
--
DROP TABLE IF EXISTS purc_details;

CREATE TABLE `purc_details` (
  `id` int(12) PRIMARY key AUTO_INCREMENT ,
  `purchases_id` int(10) NOT NULL,
  `sample_id` int(10) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purc_details`
--

INSERT INTO `purc_details` (`id`, `purchases_id`, `sample_id`, `price`, `discount`) VALUES
(1, 10, 2, '13323', '5'),
(2, 10, 16, '13323', '5');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS registrations;

DROP TABLE IF EXISTS registrations;
CREATE TABLE `registrations` (
  `id` int(10) PRIMARY key AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pasport` int(15) DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `name`, `country`, `pasport`, `gender`, `email`, `mobile`, `comment`) VALUES
(1, 'Washeal Ah', 'Chanada', 2147483647, 'mele', 'Md.washeal@gmail.com', 1999779054, 'He is my New client'),
(3, 'washeal', 'Srilanka', 3435435, 'mele', 'Mdwasheal@gmail.com', 1999779054, 'He is my New client'),
(4, 'Anisul', 'uganda', 19327373, 'mele', 'anisul@gmail.com', 194384833, 'He is not my New client'),
(5, 'Tawrat Isl', 'Nepal', 322432445, 'mele', 'tawarat@gmail.com', 194384832, 'He is not my New client'),
(6, 'Shamim hos', 'bangladesh', 2324324, 'mele', 'mdwas@gmail.com', 1999779054, 'He is my New client');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--
DROP TABLE IF EXISTS roles;

DROP TABLE IF EXISTS roles;
CREATE TABLE `roles` (
  `id` int(10) PRIMARY key AUTO_INCREMENT,
  `name` varchar(50) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT into roles(name)VALUES('Admin');

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'ceo'),
(2, 'admin'),
(3, 'manager'),
(5, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--



DROP TABLE IF EXISTS samples;

CREATE TABLE `samples` (
  `id` int(40) PRIMARY key AUTO_INCREMENT ,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `samples`
--

INSERT INTO `samples` (`id`, `name`, `price`) VALUES
(1, 'T-Shart', '500'),
(2, 'Shart', '1000'),
(7, 'Sheart', '100'),
(16, 'Sarfexcel', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `saplayer`
--
DROP TABLE IF EXISTS saplayer;

CREATE TABLE `saplayer` (
  `id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pasport` int(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saplayer`
--

INSERT INTO `saplayer` (`id`, `name`, `country`, `pasport`, `email`, `mobile`) VALUES
(1, 'washeal', 'Srilanka', 2147483647, 'washeal@gmail.com', 1999779054),
(2, 'Jui mental', 'uganda', 298843874, 'juipagli@gmail.com', 1977423464);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--
DROP TABLE IF EXISTS sizes;

CREATE TABLE `sizes` (
  `id` int(12) PRIMARY key AUTO_INCREMENT ,
  `name` varchar(100) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(1, '34-40'),
(2, '25-30');

-- --------------------------------------------------------

--
-- Table structure for table `steatus`
--
DROP TABLE IF EXISTS steatus;
CREATE TABLE `steatus` (
  `id` int(10) PRIMARY key AUTO_INCREMENT ,
  `name` varchar(150) NOT NULL
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steatus`
--

INSERT INTO `steatus` (`id`, `name`) VALUES
(1, 'RUNNING'),
(2, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT ,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `created_at` datetime
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO users(username,password,role_id,created_at)VALUES('washeal','111','1',now());

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `created_at`) VALUES
(13, 'washeal', '111111', 3, '2021-06-28 19:04:35'),
(14, '', '', 0, '2021-06-29 16:01:28'),
(16, 'pd', '2323442', 0, '2021-06-29 16:05:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depertments`
--
ALTER TABLE `depertments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purc_details`
--
ALTER TABLE `purc_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasport` (`pasport`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saplayer`
--
ALTER TABLE `saplayer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasport` (`pasport`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steatus`
--
ALTER TABLE `steatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `depertments`
--
ALTER TABLE `depertments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purc_details`
--
ALTER TABLE `purc_details`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `saplayer`
--
ALTER TABLE `saplayer`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `steatus`
--
ALTER TABLE `steatus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
