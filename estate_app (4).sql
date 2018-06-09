-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 05:40 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hassan', 'hassan@gmail.com', '$2y$10$sPgimO24tBgLaLHzJrYVVOPjMqVs3MYG.iiVOKpoS6FMw6qqhEEEe', 'iPrYWwFl8Mq41uPCXqzAi0iiLiTCYgdML0O3C6AlUwK47QOi5vbPZ6xBkfri', '2017-12-03 21:36:22', '2017-12-03 16:36:22'),
(2, 'hassan shahid', 'hassanshan@gmail.com', '$2y$10$XWtjdttAi3Iv64euDHL8See1uU6LrCP7uzVga.XtOiKGD2ABi/i1O', NULL, '2017-12-05 12:19:07', '2017-12-05 12:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `admin_purchase`
--

CREATE TABLE `admin_purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_tag` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `amount` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_purchase`
--

INSERT INTO `admin_purchase` (`purchase_id`, `purchase_tag`, `address`, `details`, `amount`, `location`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asdsa', 'hfghf', 'gffhgfhg', 67565456, 'gfdgfdgfd', 56465456, '1', '2017-12-08 16:27:32', '2017-12-08 16:27:32'),
(2, 'asdsa', 'hfghf', 'gffhgfhg', 67565456, 'gfdgfdgfd', 56465456, '1', '2017-12-08 16:28:01', '2017-12-08 16:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_rent`
--

CREATE TABLE `admin_rent` (
  `rent_id` int(11) NOT NULL,
  `rent_tag` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `amount` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_rent`
--

INSERT INTO `admin_rent` (`rent_id`, `rent_tag`, `address`, `details`, `amount`, `location`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 'super', 'sadsad', 'hfhfhgfghfghf', 7657576, 'yghfh', 675765, '0', '2017-12-08 14:09:19', '2017-12-08 14:09:19'),
(2, 'asdas', 'yfghfg', 'ghfhgfhg', 675675, 'hfhgfgh', 6756756, '1', '2017-12-08 14:11:34', '2017-12-08 14:11:34'),
(3, 'asdas', 'yfghfg', 'ghfhgfhg', 675675, 'hfhgfgh', 6756756, '1', '2017-12-08 14:15:25', '2017-12-08 14:15:25'),
(4, 'asdas', 'yfghfg', 'ghfhgfhg', 675675, 'hfhgfgh', 6756756, '1', '2017-12-08 14:24:49', '2017-12-08 14:24:49'),
(5, 'asdas', 'yfghfg', 'ghfhgfhg', 675675, 'hfhgfgh', 6756756, '1', '2017-12-08 14:26:59', '2017-12-08 14:26:59'),
(6, 'asdas', 'yfghfg', 'ghfhgfhg', 675675, 'hfhgfgh', 6756756, '1', '2017-12-08 14:27:28', '2017-12-08 14:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sales`
--

CREATE TABLE `admin_sales` (
  `sale_id` int(11) NOT NULL,
  `sale_tag` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `amount` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sales`
--

INSERT INTO `admin_sales` (`sale_id`, `sale_tag`, `address`, `details`, `amount`, `location`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(15, 'sdsa', 'gfddfgd', 'gfdgfdgfdgf', 556456, 'fgdgfd', 65564, '0', '2017-12-07 21:41:01', '2017-12-07 15:05:13'),
(16, 'adsa', 'dfgd', 'dgfdfgd', 5456, 'gfdfgdfd', 54564, '1', '2017-12-07 15:07:35', '2017-12-07 15:07:35'),
(17, 'adsa', 'dfgd', 'dgfdfgd', 5456, 'gfdfgdfd', 54564, '1', '2017-12-07 15:08:05', '2017-12-07 15:08:05'),
(18, 'adsa', 'dfgd', 'dgfdfgd', 5456, 'gfdfgdfd', 54564, '1', '2017-12-07 15:10:46', '2017-12-07 15:10:46'),
(19, 'ggfgh', 'ghfhgf', 'ghfghfghfgh', 656, 'ghfghfghf', 564654, '1', '2017-12-07 15:11:25', '2017-12-07 15:11:25'),
(20, 'gfghf', 'ghfghf', 'hgfhfhgfghh', 656565, 'gfgfghf', 65566, '1', '2017-12-07 15:14:55', '2017-12-07 15:14:55'),
(21, 'has', 'sad', 'asdasdasdas', 5455445, 'asdas', 455454, '1', '2017-12-07 15:30:03', '2017-12-07 15:30:03'),
(22, 'hasss', 'sadsa', 'hfhfhg', 675675, 'hyfhfhg', 765675, '1', '2017-12-07 15:39:51', '2017-12-07 15:39:51'),
(23, 'asd', 'hgfhgf', 'gfdgdfgdfgdgf', 656567, 'hgffgh', 56567, '1', '2017-12-07 15:52:17', '2017-12-07 15:52:17'),
(24, 'asd', 'hgfhgf', 'gfdgdfgdfgdgf', 656567, 'hgffgh', 56567, '1', '2017-12-07 15:53:31', '2017-12-07 15:53:31'),
(25, 'asd', 'hgfhgf', 'gfdgdfgdfgdgf', 656567, 'hgffgh', 56567, '1', '2017-12-07 15:53:46', '2017-12-07 15:53:46'),
(26, 'sdasa', 'asdsa', 'gfdghfghfgh', 54564, 'dgfdgd', 65456456, '1', '2017-12-07 15:54:17', '2017-12-07 15:54:17'),
(27, 'sdasa', 'asdsa', 'gfdghfghfgh', 54564, 'dgfdgd', 65456456, '1', '2017-12-07 15:54:42', '2017-12-07 15:54:42'),
(28, 'sads', 'gfghf', 'hgfghfghfgh', 6546, 'fgdgfdgf', 546456, '1', '2017-12-07 16:00:34', '2017-12-07 16:00:34'),
(29, 'ad', 'gfghf', 'gfghfghfg', 654654, 'gfdgfd', 65456456, '1', '2017-12-07 16:02:16', '2017-12-07 16:02:16'),
(30, 'ad', 'gfghf', 'gfghfghfg', 654654, 'gfdgfd', 65456456, '1', '2017-12-07 16:03:37', '2017-12-07 16:03:37'),
(31, 'super', 'abc', 'asdsadsadsadsa', 123, 'abc', 12312312, '1', '2017-12-07 16:09:53', '2017-12-07 16:09:53'),
(32, 'super', 'xyz', 'abc', 2500, 'abca', 34254555, 'deactive', '2017-12-14 12:58:52', '2017-12-14 12:58:52'),
(33, 'super', 'xyz', 'abc', 2500, 'abca', 34254555, 'deactive', '2017-12-14 13:00:06', '2017-12-14 13:00:06'),
(34, 'super', 'hassan xyz', 'abc', 2500, 'abca', 34254555, 'active', '2017-12-14 13:01:07', '2017-12-14 13:01:07'),
(35, 'super', 'hassan xyz', 'abc', 2500, 'abca', 34254555, 'active', '2017-12-14 13:01:16', '2017-12-14 13:01:16'),
(36, 'super', 'hassan xyz', 'abc', 2500, 'abca', 34254555, 'active', '2017-12-14 13:02:22', '2017-12-14 13:02:22'),
(37, 'hot', 'shan xyz', 'abc', 2500, 'abc', 34254555, 'active', '2017-12-14 13:35:44', '2017-12-14 13:35:44'),
(38, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active', '2017-12-14 14:12:19', '2017-12-14 14:12:19'),
(39, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active', '2017-12-14 14:12:56', '2017-12-14 14:12:56'),
(40, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active', '2017-12-14 14:13:46', '2017-12-14 14:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `refferal_id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `contact` int(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `refferal_id`, `name`, `contact`, `address`, `email`, `updated_at`, `created_at`) VALUES
(1, 123, 'hassan', 344258454, 'sadsad', 'hassan@gmail.com', '2017-12-12 20:16:03', '2017-12-11 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` varchar(250) NOT NULL,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`id`, `name`, `details`, `image`, `status`, `updated_at`, `created_at`) VALUES
(1, 'painter asd', 'asdasdsasa ssss', '165497.jpg', '', '2017-12-14 06:02:25', '0000-00-00 00:00:00'),
(2, 'hassan shahid', 'good', '165497.jpg', 'Active', '2017-12-14 05:38:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `purchase_tag` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `amount` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `contact` int(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `user_id`, `purchase_tag`, `address`, `details`, `amount`, `location`, `contact`, `status`) VALUES
(1, 3, 'super', 'xyz', 'good', 111, 'xyz', 34254555, 'active'),
(2, 3, 'pro', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(3, 3, 'superp', 'abca', 'abc', 2500, 'abca', 34254555, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_images`
--

CREATE TABLE `purchase_images` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `images` varchar(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_images`
--

INSERT INTO `purchase_images` (`id`, `purchase_id`, `images`, `user_id`, `updated_at`, `created_at`) VALUES
(1, 3, '926148.jpg', 3, '2017-12-08 21:26:14', '0000-00-00 00:00:00'),
(2, 3, '639313.jpg', 3, '2017-12-08 21:26:14', '0000-00-00 00:00:00'),
(3, 2, '196198.jpg', NULL, '2017-12-08 16:28:01', '2017-12-08 16:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `rent_tag` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `amount` int(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` int(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `user_id`, `rent_tag`, `address`, `details`, `amount`, `location`, `contact`, `status`) VALUES
(1, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(2, 3, 'super', 'asdasdsa', 'asdsa', 32131, 'asdsad', 764763274, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rent_images`
--

CREATE TABLE `rent_images` (
  `id` int(11) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `rent_id` int(11) NOT NULL,
  `images` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent_images`
--

INSERT INTO `rent_images` (`id`, `user_id`, `rent_id`, `images`, `updated_at`, `created_at`) VALUES
(1, NULL, 1, '858704.jpg', '2017-12-08 18:44:20', '0000-00-00 00:00:00'),
(2, NULL, 1, '569184.jpg', '2017-12-08 18:44:20', '0000-00-00 00:00:00'),
(3, NULL, 6, '41260.jpg', '2017-12-08 14:27:28', '2017-12-08 14:27:28'),
(4, NULL, 6, '749054.jpg', '2017-12-08 14:27:29', '2017-12-08 14:27:29'),
(5, NULL, 6, '132996.jpg', '2017-12-08 14:27:29', '2017-12-08 14:27:29'),
(6, NULL, 6, '529511.png', '2017-12-08 14:27:29', '2017-12-08 14:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `sale_tag` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `amount` int(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` int(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `user_id`, `sale_tag`, `address`, `details`, `amount`, `location`, `contact`, `status`) VALUES
(1, 3, 'hot', 'abca', 'abc', 2500, 'abc', 34254555, 'active'),
(2, 3, 'hota', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(3, 3, 'hota', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(4, 3, 'hota', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(5, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(6, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(7, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(8, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(9, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(10, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(11, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(12, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(13, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active'),
(14, 3, 'super', 'abca', 'abc', 2500, 'abca', 34254555, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sales_images`
--

CREATE TABLE `sales_images` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `sales_id` int(11) NOT NULL,
  `images` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_images`
--

INSERT INTO `sales_images` (`id`, `user_id`, `sales_id`, `images`, `updated_at`, `created_at`) VALUES
(1, 3, 14, '909180.jpg', '2017-12-07 21:03:27', '0000-00-00 00:00:00'),
(2, 3, 14, '962708.jpg', '2017-12-11 19:42:32', '0000-00-00 00:00:00'),
(3, 3, 14, '909180.jpg', '2017-12-12 20:42:51', '0000-00-00 00:00:00'),
(4, 3, 14, '909180.jpg', '2017-12-12 20:42:56', '0000-00-00 00:00:00'),
(5, NULL, 30, '620148.jpg', '2017-12-12 20:43:42', '2017-12-07 16:03:37'),
(6, NULL, 30, '82215.jpg', '2017-12-07 16:03:37', '2017-12-07 16:03:37'),
(7, NULL, 31, '994355.jpg', '2017-12-07 16:09:53', '2017-12-07 16:09:53'),
(8, NULL, 31, '26978.jpg', '2017-12-07 16:09:53', '2017-12-07 16:09:53'),
(9, NULL, 36, '4792.jpg', '2017-12-14 18:25:41', '2017-12-07 16:09:53'),
(10, NULL, 36, '384430.png', '2017-12-14 13:02:22', '2017-12-14 13:02:22'),
(11, NULL, 37, '576478.png', '2017-12-14 13:35:44', '2017-12-14 13:35:44'),
(12, NULL, 40, '269837.909180.jpg', '2017-12-14 14:13:46', '2017-12-14 14:13:46'),
(13, NULL, 40, '882660.962708.jpg', '2017-12-14 14:13:46', '2017-12-14 14:13:46'),
(14, NULL, 40, '539795.909180.jpg', '2017-12-14 14:13:47', '2017-12-14 14:13:47'),
(15, NULL, 40, '839386.909180.jpg', '2017-12-14 14:13:47', '2017-12-14 14:13:47'),
(16, NULL, 40, '729188.jpg', '2017-12-14 14:13:47', '2017-12-14 14:13:47'),
(17, NULL, 40, '264374.jpg', '2017-12-14 14:13:47', '2017-12-14 14:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` int(255) DEFAULT NULL,
  `referral_id` int(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_token` varchar(500) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `referral_id`, `email`, `password`, `api_token`, `updated_at`, `created_at`) VALUES
(1, 'hasssan', 922211222, 123, 'hassan@gmail@com', 'hassan123', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QvcmVhbHN0YXRlL3NlcnZpY2VzL2FwaS92MS9sb2dpbiIsImlhdCI6MTUxMjg0NzI0NCwiZXhwIjoxNTEyODUwODQ0LCJuYmYiOjE1MTI4NDcyNDQsImp0aSI6IldYbjhjc2tZSEpld283U2MifQ.APA0IUz4jrBmDFo7Bix-uEXTCfuI26Fxw_r_LJFUTig', '2017-12-09 14:20:44', '0000-00-00 00:00:00'),
(2, 'sameer', 324554545, 255565, 'sameer@gmail.com', 'sameer123', 'jhgasdsa75d67sa5d67sa5d7as65d', '2017-11-27 18:14:21', '0000-00-00 00:00:00'),
(3, 'hassan132', 34526454, 222, 'hassan@gmail.com', '$2y$10$IH0g3u/TifBSvx1BUq4dOevzcMgnTv2eKvUFFqNGmAueT3s2a3u2G', NULL, '2017-12-09 14:14:36', '2017-11-27 14:22:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_purchase`
--
ALTER TABLE `admin_purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `sale_id` (`purchase_id`);

--
-- Indexes for table `admin_rent`
--
ALTER TABLE `admin_rent`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `sale_id` (`rent_id`);

--
-- Indexes for table `admin_sales`
--
ALTER TABLE `admin_sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `purchase_images`
--
ALTER TABLE `purchase_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `rent_id` (`rent_id`);

--
-- Indexes for table `rent_images`
--
ALTER TABLE `rent_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_id` (`rent_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Indexes for table `sales_images`
--
ALTER TABLE `sales_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_purchase`
--
ALTER TABLE `admin_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_rent`
--
ALTER TABLE `admin_rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admin_sales`
--
ALTER TABLE `admin_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `purchase_images`
--
ALTER TABLE `purchase_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rent_images`
--
ALTER TABLE `rent_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sales_images`
--
ALTER TABLE `sales_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
