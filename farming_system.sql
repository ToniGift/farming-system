-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 02:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farming_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `bought_goods`
--

CREATE TABLE `bought_goods` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `good_name` varchar(190) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bought_goods`
--

INSERT INTO `bought_goods` (`id`, `farmer_id`, `good_name`, `price`, `quantity`, `time_added`) VALUES
(1, 3, 'Fertilizers', 500, 100, '2020-09-03 00:36:37'),
(2, 3, 'Manure Fertilizers', 500, 102, '2020-09-03 00:37:56'),
(3, 3, 'Cutlasses', 50, 25, '2020-09-03 00:38:24'),
(4, 3, 'Elumelu Fertilizers', 1200, 10, '2021-01-23 16:14:51'),
(5, 4, 'Rice', 2900, 30, '2025-02-01 12:25:17'),
(6, 4, 'Beans', 40183, 50, '2025-02-01 12:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `equipment` varchar(120) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `farmer_id`, `equipment`, `quantity`, `status`) VALUES
(1, 2, 'Cutlasses', 233, 'Good Condition'),
(4, 3, 'Hoes', 8, 'Fully Damaged'),
(5, 3, 'Cutlasses', 80, 'Due For Repair'),
(6, 3, 'Tractor', 100, 'Good Condition'),
(7, 4, 'trucks', 30, 'Good Condition'),
(8, 4, 'trailer', 10, 'Due For Repair');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(180) NOT NULL,
  `username` varchar(180) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(280) NOT NULL,
  `address` varchar(119) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `fullname`, `username`, `email`, `password`, `address`) VALUES
(1, 'Ayoola Bashiru', 'tijanidevit', 'thenewxpat@gmail.com', '80047cbb7ee39b73a48fd22ccec81042', '9, Sambo Ayede Street'),
(2, 'Iremide Basit', 'Basit', 'h@h.com', 'boy', '19, Idi orogbo hood'),
(3, 'Ayodeji Micheal', 'kabex', 'thenewxpaat@gmail.com', 'e0d4e556ea1b7cac962258392f3e179c', '8, Ayoola Close'),
(4, 'Afonughe Anthony', 'Toni', 'afonugheanthony1@gmail.com', 'aefe34008e63f1eb205dc4c4b8322253', 'Nakielska 227A');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` int(11) NOT NULL,
  `farmer_id` bigint(20) NOT NULL,
  `farm_name` varchar(180) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `product_name` varchar(180) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `farmer_id`, `product_name`, `price`, `description`, `status`) VALUES
(2, 2, 'Cashew Pulp', 2000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(3, 3, 'Berry', 200, 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 1),
(4, 1, 'Basket of Tomatoes', 1220, ' class=\"my-5\" class=\"my-5\" class=\"my-5\" class=\"my-5\" class=\"my-5\" class=\"my-5\" class=\"my-5\" class=\"my-5\" class=\"my-5\" class=\"my-5\" class=\"my-5\"', 1),
(5, 3, 'Cashew', 2500, 'This cashew will make you live forever. You doubt it? This cashew will make you live forever. You doubt it? This cashew will make you live forever. You doubt it? This cashew will make you live forever. You doubt it? This cashew will make you live forever. You doubt it? This cashew will make you live forever. You doubt it? ', 1),
(6, 4, 'Gas', 23000, ' wadqwcqew', 1),
(7, 4, 'potatoes', 31221, 'fcs cxxz\\', 0),
(8, 4, 'Wheat ', 5000, 'wheat Descriptions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `time_sold` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `quantity`, `total_amount`, `time_sold`) VALUES
(1, 2, 2000, 1, '2025-09-15 18:41:10'),
(2, 2, 6000, 3, '2020-09-01 18:41:50'),
(3, 3, 400, 2, '2024-09-19 00:23:01'),
(4, 4, 2440, 2, '2020-09-04 14:43:01'),
(5, 5, 12, 24000, '2021-01-23 16:12:49'),
(6, 5, 12, 30000, '2024-01-16 16:13:26'),
(7, 6, 39, 897000, '2025-02-01 12:23:41'),
(8, 7, 33, 1030293, '2025-02-01 12:23:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bought_goods`
--
ALTER TABLE `bought_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bought_goods`
--
ALTER TABLE `bought_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
