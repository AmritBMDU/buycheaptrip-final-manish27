-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 01:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buycheaptrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `image`, `account_name`, `username`, `password`) VALUES
(1, 'Buycheaptrip-logo.png', 'Administrator', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id`, `image`) VALUES
(1, 'bg-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Noida'),
(2, 'Lucknow'),
(3, 'Sultanpur'),
(4, 'Kanpur'),
(5, 'Ayodhya');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `address_1` varchar(500) NOT NULL,
  `address_2` varchar(500) NOT NULL,
  `address_3` varchar(500) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `address_1`, `address_2`, `address_3`, `mobile`, `email`, `web`) VALUES
(1, 'Reg. Office - 5/324 Viram Khand-5', 'Gomati Nagar Lucknow', ' Uttar Pradesh-226010', '7887031889', ' info@apmleeducational.com', 'ampleeducationalsociety.org');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `hcity_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `hcity_id`) VALUES
(1, 'taj hotel', 1),
(10, 'Delhi Hotels', 3),
(12, 'hotel 1', 5),
(13, 'Noida Hotel', 2),
(14, 'BMDU hoteks', 4),
(15, 'manish hotel', 1),
(16, 'Satyam Hotel', 1),
(17, 'dlf mall', 1),
(18, 'hotel 2', 5),
(19, 'hotel 3', 5),
(20, 'hotel', 2),
(21, 'Lucknow hotel', 2),
(22, 'Lucknow hotel 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_categories`
--

CREATE TABLE `hotel_categories` (
  `hcategory_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `hc_id` int(10) NOT NULL,
  `prices` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_categories`
--

INSERT INTO `hotel_categories` (`hcategory_id`, `category_name`, `hc_id`, `prices`) VALUES
(2, 'Economy1', 1, 15000),
(17, 'VIP', 1, 15000),
(18, 'Economy', 1, 1500),
(19, 'Economy', 15, 100),
(20, 'Super DLX', 1, 10000),
(21, 'Economy', 12, 1000),
(22, 'Economy1', 18, 1500),
(23, 'Economy', 19, 750),
(24, 'Economy', 20, 2099),
(25, 'VIP', 12, 2000),
(26, 'Economy', 19, 200),
(27, 'VIP', 19, 300);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `image`) VALUES
(1, 'MANISH2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manage_offer`
--

CREATE TABLE `manage_offer` (
  `id` int(11) NOT NULL,
  `short_description` varchar(200) NOT NULL,
  `long_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_offer`
--

INSERT INTO `manage_offer` (`id`, `short_description`, `long_description`) VALUES
(1, 'hdfjkhdf', 'dfjlksdajflkdsj'),
(2, 'hhsaghkg', 'hhjhjh\r\n'),
(3, 'this is short description!!!!!!!!------------', 'this is long description');

-- --------------------------------------------------------

--
-- Table structure for table `sightseeing`
--

CREATE TABLE `sightseeing` (
  `sight_id` int(11) NOT NULL,
  `sight_name` varchar(150) NOT NULL,
  `prices` double NOT NULL,
  `tsight_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sightseeing`
--

INSERT INTO `sightseeing` (`sight_id`, `sight_name`, `prices`, `tsight_id`) VALUES
(1, 'rever Front2', 1520, 1),
(4, 'rever Front2', 15000, 3),
(5, 'rever Front3', 150000, 4),
(6, 'rever Front2', 200, 1),
(7, 'rever Front3', 300, 1),
(8, 'rever Front2', 3000, 2),
(9, 'rever Front3', 150, 2);

-- --------------------------------------------------------

--
-- Table structure for table `thailand_customers`
--

CREATE TABLE `thailand_customers` (
  `cust_id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `reff_id` varchar(10) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pax` int(20) NOT NULL,
  `package_inr` double NOT NULL,
  `persion_inr` double NOT NULL,
  `travel_date` varchar(50) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','cancel','confirm','') NOT NULL DEFAULT 'pending',
  `account_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_customers`
--

INSERT INTO `thailand_customers` (`cust_id`, `customer_name`, `reff_id`, `email`, `phone`, `pax`, `package_inr`, `persion_inr`, `travel_date`, `create_date`, `status`, `account_id`) VALUES
(85, 'manish', 'BCT892579', 'satyam@gmail.com', '9454969296', 1, 18190, 18190, '2024-04-21', '2024-04-19', 'cancel', ''),
(86, 'manish', 'BCT266119', 'solutionkey@gmail.com', '9454969296', 2, 48000, 24000, '2024-04-27', '2024-04-19', 'cancel', ''),
(87, 'Sydney Russell', 'BCT720272', 'qohe@mailinator.com', '22', 3, 0, 0, '1974-06-27', '2024-04-19', 'cancel', ''),
(88, 'Jemima Collier', 'BCT225342', 'fakymeca@mailinator.com', '4', 5, 0, 0, '1999-02-13', '2024-04-19', 'cancel', 'jay@gmail.com'),
(89, 'manish', 'BCT811781', 'manish01.bmdu@gmail.com', '9454969296', 2, 20450, 10225, '2024-04-23', '2024-04-19', 'cancel', 'manish@gmail.com'),
(90, 'pankaj', 'BCT928409', 'pankaj@gmail.com', '9876543210', 2, 7600, 3800, '2024-10-06', '2024-04-19', 'cancel', 'manish@gmail.com'),
(91, 'vinod', 'BCT056305', 'vinod@gmail.com', '6393805011', 2, 4550, 2275, '2024-04-27', '2024-04-19', 'cancel', 'manish@gmail.com'),
(92, 'manish', 'BCT741191', 'solutionkey@gmail.com', '9454969296', 1, 10719, 10719, '2024-04-24', '2024-04-20', 'cancel', 'jay@gmail.com'),
(93, 'manish', 'BCT960236', 'manish@gmail.com', '9454969296', 2, 5819, 2909.5, '2024-04-28', '2024-04-27', 'confirm', 'manish10@gmail.com'),
(94, 'manish', 'BCT308386', 'manish01.bmdu@gmail.com', '9454969296', 1, 35969, 35969, '2024-04-30', '2024-04-27', 'confirm', 'deepak1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `thailand_hotel`
--

CREATE TABLE `thailand_hotel` (
  `thailand_hotel_id` int(11) NOT NULL,
  `hotelcity_name` varchar(100) NOT NULL,
  `hotels` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `rooms` int(100) NOT NULL,
  `nights` int(100) NOT NULL,
  `ex_adults` varchar(100) DEFAULT NULL,
  `refer_id` varchar(50) NOT NULL,
  `prices` double DEFAULT NULL,
  `reff_id` varchar(20) NOT NULL,
  `hotel_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hotelCheckinDate` varchar(100) NOT NULL,
  `account_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_hotel`
--

INSERT INTO `thailand_hotel` (`thailand_hotel_id`, `hotelcity_name`, `hotels`, `category_name`, `rooms`, `nights`, `ex_adults`, `refer_id`, `prices`, `reff_id`, `hotel_date`, `hotelCheckinDate`, `account_id`) VALUES
(252, '5', '12', '2000', 1, 1, '0', '', NULL, '', '2024-04-19 15:45:07', '2024-04-21', NULL),
(253, '1', '15', '100', 1, 1, '1', '', NULL, '', '2024-04-19 15:45:07', '2024-04-23', NULL),
(254, '1', '15', '100', 1, 1, '0', '', NULL, 'BCT266119', '2024-04-19 15:40:53', '2024-04-27', NULL),
(255, '1', '1', '15000', 1, 2, '1', '', NULL, 'BCT266119', '2024-04-19 15:40:53', '2024-04-28', NULL),
(256, '2', '20', '2000', 1, 1, '0', '', NULL, 'BCT811781', '2024-04-19 16:02:33', '2024-04-23', 'manish@gmail.com'),
(257, '1', '1', '1500', 2, 2, '1', '', NULL, 'BCT811781', '2024-04-19 16:02:33', '2024-04-25', 'manish@gmail.com'),
(258, '2', '20', '2000', 1, 1, '0', '', NULL, 'BCT928409', '2024-04-19 16:20:05', '2024-10-06', 'manish@gmail.com'),
(259, '1', '15', '100', 1, 1, '0', '', NULL, 'BCT928409', '2024-04-19 16:20:05', '2024-10-07', 'manish@gmail.com'),
(260, '1', '15', '100', 1, 1, '0', '', NULL, 'BCT056305', '2024-04-19 22:51:23', '2024-04-27', 'manish@gmail.com'),
(261, '1', '15', '100', 1, 1, '1', '', NULL, 'BCT056305', '2024-04-19 22:51:23', '2024-04-28', 'manish@gmail.com'),
(262, '1', '15', '100', 1, 1, '0', '', NULL, 'BCT741191', '2024-04-20 15:59:04', '2024-04-24', 'jay@gmail.com'),
(263, '2', '20', '2099', 1, 1, '0', '', NULL, 'BCT741191', '2024-04-20 15:59:04', '2024-04-25', 'jay@gmail.com'),
(264, '1', '15', '100', 1, 2, '0', '', NULL, 'BCT960236', '2024-04-27 14:44:44', '2024-04-28', 'manish10@gmail.com'),
(265, '2', '20', '2099', 1, 1, '0', '', NULL, 'BCT960236', '2024-04-27 14:44:44', '2024-04-30', 'manish10@gmail.com'),
(266, '1', '1', '15000', 1, 2, '0', '', NULL, 'BCT308386', '2024-04-27 20:31:16', '2024-04-30', 'deepak1@gmail.com'),
(267, '2', '20', '2099', 1, 1, '0', '', NULL, 'BCT308386', '2024-04-27 20:31:16', '2024-05-02', 'deepak1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `thailand_payment`
--

CREATE TABLE `thailand_payment` (
  `pay_id` int(11) NOT NULL,
  `user_ammount` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(100) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `payment_id` varchar(15) NOT NULL,
  `debit` double DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `final_ammount` double DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `account_details` varchar(100) NOT NULL,
  `status` enum('Pending','Accept','Denied','') NOT NULL DEFAULT 'Pending',
  `reward` double DEFAULT NULL,
  `feedback` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_payment`
--

INSERT INTO `thailand_payment` (`pay_id`, `user_ammount`, `description`, `file`, `payment_date`, `payment_id`, `debit`, `credit`, `final_ammount`, `created_date`, `account_details`, `status`, `reward`, `feedback`) VALUES
(1, 1050, 'hgdhdgh', '662930822f4fd9.46205921.png', '2004-04-10', 'buy3885555', NULL, NULL, NULL, '2024-04-24 00:00:00', 'jay@gmail.com', 'Accept', NULL, ''),
(2, 1050, 'hgdhdgh', '66293285a58411.26470654.png', '2004-04-10', 'buy0304035', NULL, NULL, NULL, '2024-04-24 12:25:41', 'jay@gmail.com', 'Denied', NULL, ''),
(3, 1020, 'demo', '662942314a1176.95967554.png', '2024-04-19', 'buy0131472', NULL, NULL, NULL, '2024-04-24 13:32:33', 'jay@gmail.com', 'Pending', NULL, NULL),
(4, 2000, 'payment successfull', '662ad9da1dba76.21067888.png', '2024-04-24', 'buy9779306', NULL, NULL, NULL, '2024-04-25 18:31:54', 'satyam@gmail.com', 'Denied', NULL, 'dhhhhh'),
(5, 500, 'payment successfull', '662c1be5993493.64307872.png', '2024-04-25', 'buy5772795', NULL, NULL, NULL, '2024-04-26 17:25:57', 'satyam@gmail.com', 'Accept', NULL, ''),
(6, 200, 'hgdhdgh', '662c36e80d26d4.26010629.png', '2024-04-26', 'buy6044207', NULL, NULL, NULL, '2024-04-26 19:21:12', 'satyam@gmail.com', 'Accept', NULL, NULL),
(7, 10250, 'this is description', '662c37587615d7.27139746.png', '2024-04-28', 'buy2811348', NULL, NULL, NULL, '2024-04-26 19:23:04', 'satyam@gmail.com', 'Accept', NULL, NULL),
(8, 400, 'demo', '662c3a70acc446.63213968.png', '2024-04-25', 'buy9884109', NULL, NULL, NULL, '2024-04-26 19:36:16', 'satyam@gmail.com', 'Accept', NULL, NULL),
(9, 500, 'GHHGGHGH', '662c3d68790824.96670451.png', '2024-04-25', 'buy5151593', NULL, NULL, NULL, '2024-04-26 19:48:56', 'satyam@gmail.com', 'Accept', NULL, NULL),
(10, 1000, 'this payment ', '662d6110c0bec6.42761049.jpg', '2024-04-26', 'buy0183797', NULL, NULL, NULL, '2024-04-27 16:33:20', 'deepak1@gmail.com', 'Accept', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thailand_sightseeing`
--

CREATE TABLE `thailand_sightseeing` (
  `thailand_sight_id` int(255) NOT NULL,
  `sight_city` varchar(255) NOT NULL,
  `sightseeing` varchar(255) NOT NULL,
  `prices` varchar(255) NOT NULL,
  `sight_persion` varchar(255) NOT NULL,
  `sightCheckinDate` varchar(255) NOT NULL,
  `refer_id` varchar(255) NOT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `reff_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_sightseeing`
--

INSERT INTO `thailand_sightseeing` (`thailand_sight_id`, `sight_city`, `sightseeing`, `prices`, `sight_persion`, `sightCheckinDate`, `refer_id`, `account_id`, `reff_id`) VALUES
(164, '2', '3000', '', '1', '2024-04-21', '', NULL, ''),
(165, '1', '1520', '', '2', '2024-04-21', '', NULL, ''),
(166, '1', '200', '', '1', '2024-04-27', '', NULL, 'BCT266119'),
(167, '1', '200', '', '1', '2024-04-27', '', NULL, 'BCT266119'),
(168, '1', '200', '', '1', '2024-04-23', '', 'manish@gmail.com', 'BCT811781'),
(169, '2', '150', '', '2', '2024-04-23', '', 'manish@gmail.com', 'BCT811781'),
(170, '1', '300', '', '4', '2024-04-23', '', 'manish@gmail.com', 'BCT811781'),
(171, '1', '200', '', '1', '2024-10-06', '', 'manish@gmail.com', 'BCT928409'),
(172, '2', '150', '', '2', '2024-10-08', '', 'manish@gmail.com', 'BCT928409'),
(173, '2', '150', '', '1', '2024-04-27', '', 'manish@gmail.com', 'BCT056305'),
(174, '2', '150', '', '1', '2024-04-28', '', 'manish@gmail.com', 'BCT056305'),
(175, '1', '1520', '', '1', '2024-04-24', '', 'jay@gmail.com', 'BCT741191'),
(176, '1', '1520', '', '1', '2024-04-28', '', 'manish10@gmail.com', 'BCT960236'),
(177, '1', '1520', '', '1', '2024-04-30', '', 'deepak1@gmail.com', 'BCT308386'),
(178, '2', '150', '', '1', '2024-05-01', '', 'deepak1@gmail.com', 'BCT308386');

-- --------------------------------------------------------

--
-- Table structure for table `thailand_transport`
--

CREATE TABLE `thailand_transport` (
  `thailand_transport_id` int(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `prices` varchar(255) NOT NULL,
  `transport_city` varchar(255) NOT NULL,
  `refer_id` varchar(255) NOT NULL,
  `transCheckinDate` varchar(100) DEFAULT NULL,
  `account_id` varchar(100) DEFAULT NULL,
  `trans_pax` varchar(100) NOT NULL,
  `reff_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_transport`
--

INSERT INTO `thailand_transport` (`thailand_transport_id`, `transport`, `prices`, `transport_city`, `refer_id`, `transCheckinDate`, `account_id`, `trans_pax`, `reff_id`) VALUES
(191, '3', '', '1', '', '', NULL, '5000', ''),
(192, '4', '', '1', '', '', NULL, '5000', ''),
(193, '4', '', '1', '', '2024-04-27', NULL, '5000', 'BCT266119'),
(194, '3', '', '1', '', '2024-04-30', NULL, '5000', 'BCT266119'),
(195, '4', '', '1', '', '2024-04-23', 'manish@gmail.com', '5000', 'BCT811781'),
(196, '3', '', '1', '', '2024-04-25', 'manish@gmail.com', '5000', 'BCT811781'),
(197, '4', '', '1', '', '2024-10-06', 'manish@gmail.com', '5000', 'BCT928409'),
(198, '3', '', '1', '', '2024-04-27', 'manish@gmail.com', '2000', 'BCT056305'),
(199, '3', '', '1', '', '2024-04-28', 'manish@gmail.com', '2000', 'BCT056305'),
(200, '3', '', '1', '', '2024-04-24', 'jay@gmail.com', '5000', 'BCT741191'),
(201, '3', '', '1', '', '2024-04-24', 'jay@gmail.com', '2000', 'BCT741191'),
(202, '3', '', '1', '', '2024-04-28', 'manish10@gmail.com', '2000', 'BCT960236'),
(203, '3', '', '1', '', '2024-04-30', 'deepak1@gmail.com', '2000', 'BCT308386'),
(204, '5', '', '2', '', '2024-05-01', 'deepak1@gmail.com', '200', 'BCT308386');

-- --------------------------------------------------------

--
-- Table structure for table `thailand_upload`
--

CREATE TABLE `thailand_upload` (
  `upload_id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `upload_details` varchar(255) NOT NULL,
  `id_reff` varchar(100) NOT NULL,
  `account_file_id` varchar(100) NOT NULL,
  `reff_id` varchar(15) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thailand_upload`
--

INSERT INTO `thailand_upload` (`upload_id`, `file`, `upload_details`, `id_reff`, `account_file_id`, `reff_id`, `create_date`) VALUES
(75, '6626efa9ca5af5.00128318.png', 'sjhsusdus manish', 'BCT741191', 'jay@gmail.com', '', '2024-04-22'),
(76, '6626f00f8c3f26.57139729.png', 'sjhsusdus manish', 'BCT741191', 'jay@gmail.com', '', '2024-04-22'),
(77, '6628a91c68511_fd794cd2da78a7b3_Screenshot (19).png', 'pan card1', 'BCT811781', 'manish@gmail.com', '', '2024-04-22'),
(78, '6626f16e272836.29549320.png', 'adhar card', 'BCT811781', 'manish@gmail.com', '', '2024-04-22'),
(79, '6626f19b8d86b4.36858789.png', 'adhar card', 'BCT811781', 'manish@gmail.com', '', '2024-04-22'),
(80, '6626f626c8f246.58285677.png', 'adhar card', 'BCT056305', 'manish@gmail.com', '', '2024-04-22'),
(81, '662d6899eae84_54ed11766d46b673_26.jpg', 'adhar card1', 'BCT308386', 'deepak1@gmail.com', '', '2024-04-27'),
(82, '662d64fae7eb83.04376127.jpg', 'pan card', 'BCT308386', 'deepak1@gmail.com', '', '2024-04-27'),
(83, '662d692ebb7675.75374441.pdf', 'tkt', 'BCT308386', 'deepak1@gmail.com', '', '2024-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `type` enum('credit','debit','reward') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `message` text DEFAULT NULL,
  `remaining_balance` decimal(10,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','success','cancel','') NOT NULL DEFAULT 'success',
  `transactions_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `wallet_id`, `type`, `amount`, `message`, `remaining_balance`, `timestamp`, `status`, `transactions_id`) VALUES
(1, 5, 'credit', 100.00, 'Add balance', 100.00, '2024-04-25 03:19:48', 'success', ''),
(2, 5, 'credit', 100.00, 'add balance', 200.00, '2024-04-25 03:21:04', 'success', ''),
(3, 5, 'debit', 100.00, 'debit your balance 100 Rs', 100.00, '2024-04-26 16:19:29', 'success', ''),
(4, 7, 'credit', 100.00, 'add balance', 100.00, '2024-04-26 17:25:30', 'success', ''),
(5, 5, 'credit', 500.00, NULL, 0.00, '2024-04-26 23:18:41', 'success', 'buy5772795'),
(6, 5, 'credit', 200.00, NULL, 0.00, '2024-04-26 23:21:35', 'success', 'buy6044207'),
(7, 5, 'credit', 10250.00, NULL, 0.00, '2024-04-26 23:23:34', 'success', 'buy2811348'),
(8, 5, 'credit', 400.00, NULL, 11950.00, '2024-04-26 23:36:32', 'success', 'buy9884109'),
(9, 5, 'credit', 500.00, NULL, 12450.00, '2024-04-26 23:50:19', 'success', 'buy5151593'),
(10, 5, 'credit', 100.00, NULL, 12550.00, '2024-04-27 16:48:12', 'success', '0'),
(11, 5, 'credit', 10.00, NULL, 12560.00, '2024-04-27 16:53:19', 'success', '0'),
(12, 5, 'credit', 10.00, 'demo this payment', 12570.00, '2024-04-27 17:36:14', 'success', '0'),
(13, 5, 'credit', 20.00, 'this demo', 12600.00, '2024-04-27 17:44:40', 'success', '0'),
(14, 5, 'reward', 20.00, 'reward this manish', 12640.00, '2024-04-27 19:01:18', 'success', '0'),
(15, 5, 'reward', 40.00, 'reward', 12680.00, '2024-04-27 19:04:12', 'success', '0'),
(16, 5, 'reward', 20.00, 'HIII', 12700.00, '2024-04-27 19:04:33', 'success', '0'),
(17, 5, 'debit', 200.00, 'debit your balance sucessfully', 12900.00, '2024-04-27 19:22:58', 'success', '0'),
(18, 5, 'debit', 200.00, 'dibit', 12700.00, '2024-04-27 19:27:24', 'success', '0'),
(19, 8, 'credit', 1000.00, NULL, 1000.00, '2024-04-27 20:38:08', 'success', 'buy0183797'),
(20, 8, 'reward', 50.00, 'this is reward', 1050.00, '2024-04-27 20:40:38', 'success', '0'),
(21, 8, 'debit', 300.00, 'this payment Debit', 750.00, '2024-04-27 20:41:19', 'success', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `trans_id` int(11) NOT NULL,
  `transport_name` varchar(150) NOT NULL,
  `prices` double NOT NULL,
  `tcity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`trans_id`, `transport_name`, `prices`, `tcity_id`) VALUES
(1, '01 Way Taxi From Phuket to Krabi Hotel', 2000, 1),
(3, '01 Way Taxi From Phuket Airport to Krabi Hotel', 2000, 1),
(4, '01Why Taxi From Phuket Airport to Kharabi Hotel', 1500, 1),
(5, 'Lucknow to Airport', 150, 2),
(6, 'Airport to Lucknow ', 200, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transport_category`
--

CREATE TABLE `transport_category` (
  `tranport_cat_id` int(11) NOT NULL,
  `transport_category` varchar(150) NOT NULL,
  `prices` double NOT NULL,
  `transref_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport_category`
--

INSERT INTO `transport_category` (`tranport_cat_id`, `transport_category`, `prices`, `transref_id`) VALUES
(2, '1-8PAX', 5000, 3),
(3, '1-10 Pax', 5000, 3),
(4, '1-3PAX', 2000, 3),
(5, '1-3PAX', 200, 5),
(6, '1-8PAX', 400, 5),
(7, '1-10 Pax', 500, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `created_at` varchar(1000) NOT NULL DEFAULT current_timestamp(),
  `delete_at` varchar(255) NOT NULL,
  `status` enum('active','pending','reject','inactive') DEFAULT 'pending',
  `feedback` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `phone`, `email`, `password`, `created_at`, `delete_at`, `status`, `feedback`) VALUES
(22, 'Satyam', 'male', '9454969296', 'satyam@gmail.com', '123456', '2024-04-24 22:48:51', '', 'active', 'good user'),
(23, 'Sivam', 'male', '9876543214', 'sivam@gmail.com', '123456', '2024-04-24 22:53:03', '', 'active', 'good user'),
(24, 'Manish Kumar', 'male', '9454969280', 'manish10@gmail.com', '123456', '2024-04-24 22:55:54', '', 'active', 'good user'),
(25, 'Manish', 'male', '9616893299', 'manish@gmail.com', '123456', '2024-04-27 16:09:02', '', 'active', NULL),
(26, 'deepak', 'male', '9876543219', 'deepak@gmail.com', '123456', '2024-04-27 16:19:14', '', 'pending', NULL),
(29, 'subham', 'male', '9876543218', 'deepak1@gmail.com', '123456', '2024-04-27 16:27:33', '', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id_wallet` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `wallet_balance` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id_wallet`, `user_id`, `contact`, `wallet_balance`, `created_at`, `updated_at`) VALUES
(5, 'satyam@gmail.com', '9454969296', 12300.00, '2024-04-25 02:48:51', '2024-04-27 19:27:24'),
(6, 'sivam@gmail.com', '9876543214', 0.00, '2024-04-25 02:53:03', '2024-04-26 20:26:09'),
(7, 'manish10@gmail.com', '9454969280', 100.00, '2024-04-25 02:55:54', '2024-04-26 17:18:54'),
(8, 'deepak1@gmail.com', '9876543218', 750.00, '2024-04-27 20:27:33', '2024-04-27 20:41:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  ADD PRIMARY KEY (`hcategory_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_offer`
--
ALTER TABLE `manage_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sightseeing`
--
ALTER TABLE `sightseeing`
  ADD PRIMARY KEY (`sight_id`);

--
-- Indexes for table `thailand_customers`
--
ALTER TABLE `thailand_customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `reff_id` (`reff_id`);

--
-- Indexes for table `thailand_hotel`
--
ALTER TABLE `thailand_hotel`
  ADD PRIMARY KEY (`thailand_hotel_id`);

--
-- Indexes for table `thailand_payment`
--
ALTER TABLE `thailand_payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`);

--
-- Indexes for table `thailand_sightseeing`
--
ALTER TABLE `thailand_sightseeing`
  ADD PRIMARY KEY (`thailand_sight_id`);

--
-- Indexes for table `thailand_transport`
--
ALTER TABLE `thailand_transport`
  ADD PRIMARY KEY (`thailand_transport_id`);

--
-- Indexes for table `thailand_upload`
--
ALTER TABLE `thailand_upload`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Wallet_manage` (`wallet_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `transport_category`
--
ALTER TABLE `transport_category`
  ADD PRIMARY KEY (`tranport_cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id_wallet`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `phone` (`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  MODIFY `hcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_offer`
--
ALTER TABLE `manage_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sightseeing`
--
ALTER TABLE `sightseeing`
  MODIFY `sight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thailand_customers`
--
ALTER TABLE `thailand_customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `thailand_hotel`
--
ALTER TABLE `thailand_hotel`
  MODIFY `thailand_hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `thailand_payment`
--
ALTER TABLE `thailand_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `thailand_sightseeing`
--
ALTER TABLE `thailand_sightseeing`
  MODIFY `thailand_sight_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `thailand_transport`
--
ALTER TABLE `thailand_transport`
  MODIFY `thailand_transport_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `thailand_upload`
--
ALTER TABLE `thailand_upload`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transport_category`
--
ALTER TABLE `transport_category`
  MODIFY `tranport_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id_wallet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `Wallet_manage` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id_wallet`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
