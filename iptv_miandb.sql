-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2018 at 08:33 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iptv_maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `iptv_contact`
--

CREATE TABLE `iptv_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `msg` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iptv_contact`
--

INSERT INTO `iptv_contact` (`id`, `name`, `email`, `phone`, `msg`, `date_time`) VALUES
(1, 'Jena Karlisf', 'member1@linkup.com', '7567856', '', '2018-06-14 09:45:25'),
(2, 'Jena Karlisf', 'member1@linkup.com', '7567856', 'test', '2018-06-14 09:47:11'),
(3, 'test', 'test@gmail.com', '7567856', 'testing', '2018-06-14 09:48:14'),
(4, 'Jena Karlisf', 'member1@linkup.com', '7567856', 'fdf', '2018-06-14 09:48:45'),
(5, '', '', '', 'fdf', '2018-06-14 09:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `iptv_features`
--

CREATE TABLE `iptv_features` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `icon_image` varchar(400) NOT NULL,
  `status` enum('Enabled','Disbaled') NOT NULL DEFAULT 'Enabled',
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iptv_features`
--

INSERT INTO `iptv_features` (`id`, `title`, `description`, `icon_image`, `status`, `date_time`) VALUES
(1, 'Live Sports', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.', '80a809136ecadaea6344.png', 'Enabled', '2018-06-14 13:03:10'),
(2, 'Movie VOD', 'Minim veniam, quis nostrud exercitation quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino.', '2080a4c13e66b9ba6abb.png', 'Enabled', '2018-06-14 13:09:50'),
(3, 'Live TV Channels', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.', '89c74005465c9d4938fe.png', 'Enabled', '2018-06-14 13:10:10'),
(4, 'TV Series', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.', '0e5130af5b382ac6d4ac.png', 'Enabled', '2018-06-14 13:10:34'),
(5, 'Sports On-Demand', 'Minim veniam, quis nostrud exercitation ostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino.', '1f595fb8565f48a7a3cd.png', 'Enabled', '2018-06-14 13:10:52'),
(6, 'Home Workout Videos', 'Duis aute irure dolor in reprehenderit in voluptate velit esse in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.', 'd2e531a02f407d9fbbd9.png', 'Enabled', '2018-06-14 13:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `iptv_pricing_plans`
--

CREATE TABLE `iptv_pricing_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_title` varchar(400) NOT NULL,
  `plan_price` varchar(400) NOT NULL,
  `plan_duration` varchar(400) NOT NULL,
  `status` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `created_at` datetime NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iptv_pricing_plans`
--

INSERT INTO `iptv_pricing_plans` (`plan_id`, `plan_title`, `plan_price`, `plan_duration`, `status`, `created_at`, `date_time`) VALUES
(2, '1 Month', '18', '1 Month', 'Enabled', '2018-06-13 12:20:40', '2018-06-13 12:20:40'),
(3, '3 Month', '38', '3 Month', 'Enabled', '2018-06-13 12:20:55', '2018-06-13 12:20:55'),
(4, '6 Month', '60', '6 Month', 'Enabled', '2018-06-13 12:21:12', '2018-06-13 12:21:12'),
(5, '1 Year', '80', '1 Year', 'Enabled', '2018-06-13 12:21:24', '2018-06-13 12:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `iptv_testimonials`
--

CREATE TABLE `iptv_testimonials` (
  `testi_id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `name` varchar(400) NOT NULL,
  `designation` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `date_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iptv_testimonials`
--

INSERT INTO `iptv_testimonials` (`testi_id`, `title`, `name`, `designation`, `description`, `image`, `status`, `date_time`) VALUES
(3, '', 'Jena Karlisf', 'Store Owner', 'Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.', 'e6ee96c62e95de403062.jpg', 'Enabled', 2018),
(2, '', 'Jena Karlisf', 'Store Owner', 'Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.', 'c6e718ba913260256b1d.jpg', 'Enabled', 2018),
(4, '', 'Jena Karlisf', 'Store Owner', 'Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.', '406f6272305dc535fcfb.jpg', 'Enabled', 2018),
(5, '', 'Jena Karlisf', 'Store Owner', 'Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.', '6209cb6f1460b4086d4d.jpg', 'Enabled', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `iptv_users`
--

CREATE TABLE `iptv_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(500) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `user_type` enum('Admin','User') NOT NULL DEFAULT 'User',
  `profile_image` varchar(300) NOT NULL,
  `status` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `registered_at` datetime NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iptv_users`
--

INSERT INTO `iptv_users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `user_type`, `profile_image`, `status`, `registered_at`, `date_time`) VALUES
(1, 'Admin', 'User', 'admin@gmail.com', '07787964a1e74335c923a46348e1e865', '9876543210', 'Admin', '1a7dfd1b3027dc06cad4.jpg', 'Enabled', '2018-06-22 03:13:15', '2018-06-13 01:07:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iptv_contact`
--
ALTER TABLE `iptv_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iptv_features`
--
ALTER TABLE `iptv_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iptv_pricing_plans`
--
ALTER TABLE `iptv_pricing_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `iptv_testimonials`
--
ALTER TABLE `iptv_testimonials`
  ADD PRIMARY KEY (`testi_id`);

--
-- Indexes for table `iptv_users`
--
ALTER TABLE `iptv_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iptv_contact`
--
ALTER TABLE `iptv_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iptv_features`
--
ALTER TABLE `iptv_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `iptv_pricing_plans`
--
ALTER TABLE `iptv_pricing_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iptv_testimonials`
--
ALTER TABLE `iptv_testimonials`
  MODIFY `testi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `iptv_users`
--
ALTER TABLE `iptv_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
