-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2019 at 08:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `profile` varchar(2000) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `phone`, `adress`, `status`, `pin`, `password`, `profile`, `c_date`) VALUES
(1, 'Ezpk', 'Ezechiel', 'ezpk@gmail.com', '078564543456', 'Gisozi', 1, 1, '1ebccd7f1306241b8d2427a1dbc3e6c6a8254fa1', 'img/profile/u.png', '2019-10-08 21:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `house_id`, `client_id`, `payment_id`, `status`, `c_date`) VALUES
(1, 1, 1, 1, 1, '2019-10-16 00:08:21'),
(2, 3, 3, 2, 1, '2019-10-16 18:30:37'),
(3, 4, 4, 3, 1, '2019-10-16 18:38:42'),
(4, 2, 5, 4, 1, '2019-10-16 22:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `profile` varchar(2000) NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fname`, `lname`, `email`, `phone`, `adress`, `status`, `pin`, `password`, `profile`, `c_date`) VALUES
(1, 'client', 'client', 'client@gmail.com', '0787567', 'Gisozi', 1, 1, 'd2a04d71301a8915217dd5faf81d12cffd6cd958', 'img/profile/Screenshot from 2019-10-02 14-56-44.png', '2019-10-16'),
(2, 'ezechiel', 'ezpk', 'ezechiel@gmai.com', '07845676', 'Gisozi', 1, 1, 'ee63de610e542592d2e8aceeeb63eb534707b58a', 'img/profile/Screenshot from 2019-10-02 14-56-44.png', '2019-10-16'),
(3, 'ezechiel', 'Ezechiel', 'ez@gmail.com', '07865678', 'Gisozi', 1, 1, '4aca359fa1b78e51bc8226c4f161d16fdc1e21c8', 'img/profile/IMG_0241.jpg', '2019-10-16'),
(4, 'jos', 'jos', 'jos@gmail.com', '078743456', 'Gisozi', 1, 1, '30446d562301c34308155183a2f0ff23652fa4d7', 'img/profile/9.jpg', '2019-10-16'),
(5, 'ben', 'ben', 'ben@gmail.com', '078765', 'Gisozi', 1, 1, '73675debcd8a436be48ec22211dcf44fe0df0a64', 'img/profile/9.jpg', '2019-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district_name`) VALUES
(1, 'Kicukiro'),
(2, 'Gasabo'),
(3, 'Nyarugenge');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `house_id` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `house_id`, `c_date`) VALUES
(1, 'hh', 'hh@gmail.com', 'fghjkjhgfgk', 0, '2019-10-10 00:34:44'),
(2, 'jkj', 'ghjh@hjh.com', 'fghjkhg', 0, '2019-10-10 00:36:47'),
(3, 'Ezechie', 'eze@gmail.com', 'hey i want the answer??', 0, '2019-10-10 00:41:53'),
(4, 'Ezechie', 'ezechiel@gmai.com', 'hey there .. the houses are ...', 0, '2019-10-10 00:43:21'),
(5, 'EzechieL', 'ezechiel@gmai.com', 'good evening i need to find a house of 5 rooms', 0, '2019-10-10 00:45:07'),
(6, 'hh', 'hh@gmail.com', 'hey there ..', 0, '2019-10-10 00:46:06'),
(7, 'dvdf', 'ghjh@hjh.com', 'csdcs', 0, '2019-10-10 01:18:16'),
(8, 'svcws', 'hh@gmail.com', 'svcvse', 1, '2019-10-10 01:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `district_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `main_picture` varchar(2000) NOT NULL,
  `picture_1` varchar(2000) NOT NULL,
  `picture_2` varchar(2000) NOT NULL,
  `picture_3` varchar(2000) NOT NULL,
  `garage` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `description` text NOT NULL,
  `house_owner_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `category`, `price`, `district_id`, `sector_id`, `adress`, `location`, `main_picture`, `picture_1`, `picture_2`, `picture_3`, `garage`, `bathroom`, `bedroom`, `description`, `house_owner_id`, `status`, `c_date`) VALUES
(1, 'For Rent', 70000, 1, 1, 'Kibanza', 'KG-890', '1.jpg', '2.jpg', '3.jpg', '4.jpg', 3, 3, 2, 'iuygvfdsuyvcbsubvucsyvdbcysvdyc', 10, 1, '2019-10-15 22:19:36'),
(2, 'For Sale', 8000, 1, 5, 'Kamasha', 'KM-340', '6.jpg', '5.jpg', '7.jpg', '8.jpg', 3, 9, 1, 'HYGSCYDSVCJSDCHSVDCHJSHDHYCDS', 1, 1, '2019-10-15 22:37:05'),
(3, 'For Sale', 120000, 2, 18, 'Kibanza', 'KG-123', 'mension3.jpg', 'mension7.jpg', 'mension6.jpg', 'apart8.jpg', 1, 3, 5, 'The houseThe houseThe houseThe houseThe houseThe houseThe houseThe houseThe houseThe houseThe houseThe houseThe house', 10, 1, '2019-10-16 18:24:43'),
(4, 'For Sale', 8000, 1, 1, '87000', 'KG-123', 'single10.JPG', 'apart7.jpg', 'apart6.jpg', 'apart5.jpg', 3, 2, 5, 'edjkhgfdsfghjklkjhgfdfghjhgf', 10, 1, '2019-10-16 18:36:15'),
(5, 'For Rent', 100000, 1, 2, 'kinisagara', 'KG-298', 'apart12.jpg', '12.jpg', '10.jpg', 'apart9.jpg', 3, 2, 1, 'ychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkutur', 10, 0, '2019-10-16 23:01:24'),
(6, 'For Sale', 230000, 1, 4, 'rugunga', 'KG-90', 'fam10.jpg', 'fam2.jpg', 'fam9.jpg', 'fam12.jpg', 7, 4, 2, 'ychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkuturychycdsyvcygshjcsdvgcvhgd cvxcgdhgvhjxhjxzvhjcdvgfhjygdvhjgfvyhjcvjgyudfrkjvciygdurfiurufjkjdvfugurkutur', 10, 0, '2019-10-16 23:06:04'),
(7, 'For Sale', 250000, 2, 18, 'Kibanza', 'KG-950', '1.jpg', '2.jpg', '3.jpg', '4.jpg', 2, 4, 3, 'The house has 4 rooms and The house has 4 rooms and The house has 4 rooms and The house has 4 rooms and The house has 4 rooms and The house has 4 rooms and The house has 4 rooms and The house has 4 rooms and The house has 4 rooms and ', 11, 0, '2019-10-17 20:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `house_owners`
--

CREATE TABLE `house_owners` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `profile` varchar(2000) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_owners`
--

INSERT INTO `house_owners` (`id`, `fname`, `lname`, `email`, `phone`, `adress`, `status`, `pin`, `password`, `profile`, `c_date`) VALUES
(1, 'eze', 'eze', 'eze@gmail.com', '07856876', 'Gisozi', 1, 1, '0b639864a6cfd746081db8c9a75671e91ad35383', 'img/profile/u.png', '2019-10-08 22:41:39'),
(2, 'aa', 'bbb', 'aabbb@gmail.com', '08787545', 'g', 1, 1, '0b639864a6cfd746081db8c9a75671e91ad35383', 'img/profile/u.png', '2019-10-08 22:45:27'),
(3, 'OWNER', 'OWNER', 'owner@gmail.com', '08798876', 'Gisozi', 1, 1, '0b639864a6cfd746081db8c9a75671e91ad35383', 'img/profile/u.png', '2019-10-09 19:41:57'),
(4, 'DD', 'DD', 'dd@gmail.com', '07867656', 'Gisozi', 1, 0, '8cb2237d0679ca88db6464eac60da96345513964', 'img/profile/u.png', '2019-10-10 21:34:44'),
(6, 'House', 'Owner', 'howner@gmail.com', '07867', 'Gisozi', 1, 0, '7323a5431d1c31072983a6a5bf23745b655ddf59', '1.jpg', '2019-10-10 22:12:08'),
(7, 'Aaa', 'bb', 'aabbb@gmail.com', '08798876', 'Gisozi', 1, 1, '0b639864a6cfd746081db8c9a75671e91ad35383', 'img/profile/u.png', '2019-10-10 22:23:47'),
(8, 'ggg', 'jjj', 'gg@gmail.com', '079876543', 'Gisozi', 0, 0, '7323a5431d1c31072983a6a5bf23745b655ddf59', 'Screenshot from 2019-10-02 14-56-44.png', '2019-10-15 18:16:31'),
(9, 'ggg', 'hhhy', 'yyy@gmail.com', '0987654567', 'Gisozi', 0, 0, '186154712b2d5f6791d85b9a0987b98fa231779c', 'Screenshot from 2019-10-02 14-56-44.png', '2019-10-15 18:20:24'),
(10, 'Ezpk', 'hhhy', 'kl@gmail.com', '089755', 'Gisozi', 1, 0, '24140a67a2c322f317f218fe8fdc73da6d462468', 'img/profile/u.png', '2019-10-15 18:22:18'),
(11, 'Shema', 'House', 'shema@gmail.com', '0785544343', 'Gisozi', 1, 0, '78c9366f4d8f188760b144b920f602663ff29b24', 'img/profile/Screenshot from 2019-10-15 11-51-31.png', '2019-10-17 20:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `amount_paid` double NOT NULL,
  `slip_number` varchar(256) NOT NULL,
  `slip_picture` varchar(2000) NOT NULL,
  `house_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `bank_name`, `payment_date`, `amount_paid`, `slip_number`, `slip_picture`, `house_id`, `client_id`, `c_date`) VALUES
(1, 'Access Bank', '2019-10-15', 9000, '56787', 'Screenshot from 2019-10-02 14-56-44.png', 2, 1, '2019-10-16 00:08:21'),
(2, 'Bank of Kigali', '2019-10-16', 12000, '565443', 'Screenshot from 2019-10-02 14-56-44.png', 3, 3, '2019-10-16 18:30:37'),
(3, 'Bank of Kigali', '2019-10-16', 60000, '7654', 'single8.jpg', 4, 4, '2019-10-16 18:38:41'),
(4, 'Bank of Kigali', '2019-10-16', 80000, '345678', 'apart4.jpg', 2, 5, '2019-10-16 22:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `sector_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `sector_name`, `district_id`) VALUES
(1, 'Ngoma', 1),
(2, 'Masaka', 1),
(3, 'Cyimo', 1),
(4, 'Nyarugunga', 1),
(5, 'Kamashashi', 1),
(6, 'Bumbogo', 2),
(7, 'Gikomero', 2),
(8, 'Rutunga', 2),
(9, 'Nduba', 2),
(10, 'Jabana', 2),
(11, 'Jali', 2),
(12, 'Rusororo', 2),
(13, 'Ndera', 2),
(14, 'Kimihurura', 2),
(15, 'Kacyiru', 2),
(16, 'Kimironko', 2),
(17, 'Remera', 2),
(18, 'Gisozi', 2),
(19, 'Kinyinya', 2),
(20, 'Gatsata', 2),
(21, 'Gahanga', 2),
(22, 'Gatenga', 2),
(23, 'Gikondo', 2),
(24, 'Kagunga', 2),
(25, 'Kanombe', 2),
(26, 'Rubirizi', 2),
(27, 'Kagarama', 2),
(28, 'Kimihurura', 2),
(29, 'Rukatsa', 2),
(30, 'Niboye', 2),
(31, 'Gatare', 2),
(32, 'Taba', 2),
(33, 'Kigarama', 2),
(34, 'Nyenyeri', 2),
(35, 'Bwerankori', 2),
(36, 'Gitega', 3),
(37, 'Kimisagara', 3),
(38, 'Muhima', 3),
(39, 'Nyakabanda', 3),
(40, 'Nyamirambo', 3),
(41, 'Nyarugenge', 3),
(42, 'Rwezamenyo', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_owners`
--
ALTER TABLE `house_owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `house_owners`
--
ALTER TABLE `house_owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
