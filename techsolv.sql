-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 01:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techsolv`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `fullname`, `phone`, `email`, `subject`, `message`, `ip_address`, `submission_date`) VALUES
(1, 'Anita devi', '8173914109', 'anita55@gmail.com', 'contact form', 'this is first  text form', '', '2024-03-07 11:25:35'),
(4, 'sgfd', '8173914105', 'anita50@gmail.com', 'dfgnfgh', ',zksdjfg sdfjhsdkjfh', '', '2024-03-07 11:41:50'),
(5, 'Himanshu Patel', '8143725498', 'himanshupatel2050@gmail.com', 'NZCz,mnv kajhfkjdf', 'aksdjfsd shfkjdfh', '::1', '2024-03-07 07:23:46'),
(6, 'nidhi', '8173914102', 'patel2050@gmail.com', ',admmffdg kafjjk', 'klfkwwlgkj', '::1', '2024-03-07 07:42:53'),
(7, 'deepti', '8254725209', 'sfs23@gmail.com', 'dvdn', 'svbfgn', '::1', '2024-03-07 07:44:10'),
(8, 'dfdsf', '8118725760', 'dv50@gmail.com', 'dsgdfhf', 'dsdjfgklkf sjgdgf', '::1', '2024-03-07 07:48:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
