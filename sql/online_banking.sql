-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 02:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` text NOT NULL,
  `full_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `subject` varchar(55) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Nahom', 'nahom@gmail.com', 'Speed', 'Your website is very slow!'),
(2, 'Dani Hailu', 'dani@g.com', 'Nice Interface!', 'Thank you! Best Interface I have ever seen!'),
(3, 'Book', 'admin@gmail.com', 'Speed', 'ertyu'),
(4, 'tito', 'admin@gmail.com', 'Speed', 'wqewqe'),
(5, 'Book', 'admin@gmail.com', 'Nice Interface!', 'qwerty'),
(6, 'Dani', 'admin@gmail.com', 'Nice Work', 'This is test'),
(7, 'Gizachew', 'gizei@gmail.com', 'Gize', 'You are my thank.'),
(8, 'erwer', 'dani@g.com', 'wer', 'ewrer'),
(9, 'Nahom', 'dani@g.com', 'qwqw', 'qwqw'),
(10, 'Dani Hailu', 'teacher@gmail.com', 'wer', 'sdfsdf'),
(11, 'Nahom', 'nahom@gmail.com', 'wer', 'qwerty'),
(12, 'erwer', 'teacher@gmail.com', 'ert', 'ert'),
(13, 'sdfsd', 'dani@g.com', 'sdfsdfdsdsdfds', 'fsdf');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `time`) VALUES
(1, 'titushailu125@gmail.com', '2022-02-12 10:49:33'),
(2, 'tito@gmail.com', '2022-02-12 10:50:49'),
(3, 'tit#@.com', '2022-02-12 10:51:10'),
(4, 'hailutito@mgail.com', '2022-02-12 11:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `sender` varchar(33) NOT NULL,
  `receiver` varchar(33) NOT NULL,
  `amount` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender`, `receiver`, `amount`, `remark`, `time`) VALUES
(1, '10000', '10007', 3004, NULL, '2022-02-10 07:06:14'),
(2, '10000', '10009', 300, NULL, '2022-02-10 14:47:27'),
(3, '10000', '10009', 10, NULL, '2022-02-10 14:48:18'),
(4, '10000', '10009', 120, NULL, '2022-02-10 14:49:03'),
(5, '10000', '10009', 120, NULL, '2022-02-10 14:49:34'),
(6, '10000', '10009', 130, NULL, '2022-02-10 14:49:43'),
(7, '10000', '10009', 40, NULL, '2022-02-10 14:50:17'),
(8, '10000', '10012', 200, NULL, '2022-02-10 22:36:08'),
(9, '10012', '10000', 20, NULL, '2022-02-10 22:37:53'),
(10, '10000', '10012', 100, NULL, '2022-02-10 22:40:25'),
(11, '10000', '10012', 10, NULL, '2022-02-10 22:46:34'),
(12, '10000', '10006', 1000, NULL, '2022-02-11 07:37:12'),
(13, '10000', '10005', 800, NULL, '2022-02-11 07:37:48'),
(14, '10000', '10003', 100, NULL, '2022-02-11 10:08:39'),
(15, '10003', '10000', 20, NULL, '2022-02-11 10:09:27'),
(16, '10000', '10014', 250, NULL, '2022-02-11 20:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `account_number` int(11) NOT NULL,
  `fname` varchar(33) NOT NULL,
  `lname` varchar(33) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  `balance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`account_number`, `fname`, `lname`, `phone`, `password`, `status`, `balance`) VALUES
(10000, 'Titus', 'Hailuu', '0938273254', '35056cf3019b02c1b7c4cbcfec9d39f0', '1', 2624),
(10001, 'Natan', 'Yimam', '12345678', '18dcb0929987319bcb41e933e23c4a4f', '1', 0),
(10002, 'Arefeayne', 'Demsew', '123456789', 'fcf36ff6e382a58d4c2a3cf7e53e444f', '1', 90),
(10003, 'Dani', 'Hailu', '930829030', '55b7e8b895d047537e672250dd781555', '1', 80),
(10004, 'Yotor', 'Hailu', '912345678', '3c9c8974eec14dab0ea0f2238b919481', '1', 0),
(10005, 'Ruth', 'Endale', '911224455', '81ea66d57d6b827ef722f4f20f8a669c', '1', 1363),
(10006, 'Kewser', 'Jemal', '91122', 'b6751d526d3a87f4a171ea4739869297', '1', 1122),
(10007, 'Mahi', 'Father', '912345', '99941a8015cd830b498cd9f0ddf4a500', '1', 3947),
(10008, '', '', '0', '81dc9bdb52d04dc20036dbd8313ed055', '1', 0),
(10009, 'New', 'Hailu', '1234567', '22af645d1859cb5ca6da0c484f1f37ea', '1', 720),
(10010, 'sdfsdf', 'sdfsdf', '21312321', '81dc9bdb52d04dc20036dbd8313ed055', '1', 0),
(10011, '1234567', 'fhfh', '2147483647', '434396ac8830a3d9e49c031301514f8b', '1', 0),
(10012, 'Ababa', 'Yehu', '898989', '22af645d1859cb5ca6da0c484f1f37ea', '1', 290),
(10013, 'Qwerty', 'Asdfgh', '56565656', '6cc5a3e8b68a97ca3cea363febf87151', '1', 0),
(10014, 'Zerihun', 'Tesfaye', '0910152949', 'aeef0710cd51f60cdb008d5af7a54a69', '1', 250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`account_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `account_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10015;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
