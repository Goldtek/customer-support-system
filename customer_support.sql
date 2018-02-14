-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 10:05 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_support`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `creator` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `company`, `email`, `phone`, `creator`, `created`) VALUES
(1, 'mike', 'ugochukwu', 'Rytegate', 'ugochukwu.m@gmail.com', '08066379681', 1, '2018-01-24 07:46:23'),
(2, 'John', 'Okafor', 'Blissful ', 'johnson@gmail.com', '0806637969', 1, '2018-01-24 08:07:01'),
(3, 'Desmond', 'Orji', 'Premier Net', 'orji.des@gmail.com', '09034567846', 5, '2018-01-24 08:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `active`, `created`) VALUES
(1, 'Admin', '1', '2017-06-26 00:00:00'),
(2, 'Front Desk', '1', '2017-01-30 00:00:00'),
(3, 'Human Resource', '1', '2017-10-18 00:00:00'),
(4, 'Operations', '1', '2017-11-18 00:00:00'),
(5, 'Software Development', '1', '2018-01-23 00:00:00'),
(6, 'Architecture', '1', '2018-01-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `submitter` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `submitter`, `department_id`, `subject`, `status`, `user_id`, `priority`, `client_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 5, 3, 'ticket 2', 3, 4, 3, 1, '   Please look into Mr. please issues.', '2018-01-24 08:03:41', '2018-01-24 07:03:41'),
(3, 5, 5, 'Job Portal', 1, 5, 2, 1, ' please below are some file for you to create a job Portal for lagos state. This is an internal Project', '2018-01-24 07:29:25', '2018-01-24 06:29:25'),
(4, 5, 5, 'Ops Manager Development', 1, 5, 1, 1, 'Development of Ops Manager Application', '2018-01-24 06:34:03', '2018-01-24 06:34:03'),
(5, 5, 4, 'Be consistent with your rate', 2, 4, 3, 2, '      Please try and be consistent with the delivery process', '2018-01-24 07:39:12', '2018-01-24 06:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `active`, `firstname`, `lastname`, `phone`, `department_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'Admin', 'super', '08066379689', 1, '$2y$10$cWeRO2srILi.mQQcnwW42uEWDcSONQpSopjTO8dPU9mZptPN8D4QK', 'JD6MzMYOJwiTcuCTbVek7pAUc9FmP9Z6mkExQGGYDYsWyYTBvm2c5NUKMZqO', '2018-01-24 08:35:09', '2018-01-24 07:35:09'),
(4, 'banji@gmail.com', 1, 'Banji', 'Ademitirin', '08077560359', 4, '$2y$10$9lfh4lCRmPXCHpsX07TNrurlkQG6Nq7X8Fnw1LOvUp.l7Ag.yCW6y', NULL, '2018-01-23 21:51:11', '2018-01-23 21:51:11'),
(5, 'dike4mii4real@gmail.com', 1, 'Chisom', 'Dike', '08066379681', 5, '$2y$10$wtuTgshdRdUUZwLWgpbdv.rmN6KkhHqdp9JCWPoe52ucbW.XL8dqa', 'ePwaAs3N8MKjNY8mmdr75AyXdP8SmVKlgRZ8roCFBdI0kPipEkxo9nqyfZ2y', '2018-01-24 08:02:21', '2018-01-24 07:02:21'),
(6, 'john456', 1, 'John', 'Olori', '0907760403', 5, '$2y$10$vK5O2P5zPcJV7f.Z7GVxQuYf0Wz2YarUonL9ZQmr7mbhrv8z4wNR6', NULL, '2018-01-24 06:58:42', '2018-01-24 06:58:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
