-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 03:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_id` int(11) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Phone_number` bigint(15) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  `Email_Address` varchar(255) NOT NULL,
  `IO` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_id`, `Password`, `Phone_number`, `Name`, `Address`, `Latitude`, `Longitude`, `Email_Address`, `IO`) VALUES
(1, 'chalwade', 918618696481, 'Swadeep Chalwade', 'A4, M S Keerthana Apartment, Bayarappa Layout, Suddaguntapalya', 12.964033, 77.674492, 'swadeepchalwade@gmail.com', 'Individual'),
(2, 'hande', 917263935332, 'Atharrva Hande', 'c3,shradha residency,golkote road,pune-63', 0, 0, 'atharrvahande@gmail.com', 'Individual'),
(3, 'uma', 7673637288, 'uma', '28 nd Floor, Chandok Niwas, 5th Cross Road, Near Khar Gymkhana,Mumbai-52', 0, 0, 'uma@gmail.com', 'Individual'),
(4, 'swadeep', 918618696481, 'Swadeep Chalwade', 'A4, M S Keerthana Apartment, Bayarappa Layout, Suddaguntapalya', 0, 0, 'swadeepchalwade@gmail.com', 'Individual'),
(5, 'swadeep', 918618696481, 'Swadeep Chalwade', 'A4, M S Keerthana Apartment, Bayarappa Layout, Suddaguntapalya', 0, 0, 'swadeepchalwade@gmail.com', 'Individual'),
(6, 'swadeep', 918618696481, 'Swadeep Chalwade', 'A4, M S Keerthana Apartment, Bayarappa Layout, Suddaguntapalya', 0, 0, 'swadeepchalwade@gmail.com', 'Individual');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Resto_id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Item_quantity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Resto_id`, `Item_id`, `Item_name`, `Item_quantity`) VALUES
(1, 1, 'Rice', 17),
(1, 2, 'Roti', 17),
(1, 3, 'Panner Masala', 36);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `Purchase_id` int(10) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Resto_id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `Purchase_quantity` int(11) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`Purchase_id`, `Customer_id`, `Resto_id`, `Item_id`, `Purchase_quantity`, `Status`) VALUES
(1, 4, 1, 1, 1, 0),
(2, 4, 1, 1, 1, 0),
(3, 4, 1, 1, 1, 0),
(4, 4, 1, 1, 1, 1),
(1, 4, 1, 2, 1, 0),
(2, 4, 1, 2, 1, 0),
(3, 4, 1, 2, 1, 0),
(4, 4, 1, 2, 1, 1),
(1, 4, 1, 3, 1, 0),
(2, 4, 1, 3, 1, 0),
(3, 4, 1, 3, 1, 0),
(4, 4, 1, 3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Resto_id` int(11) NOT NULL,
  `Email_Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone_number` bigint(15) NOT NULL,
  `Resto_name` varchar(255) DEFAULT NULL,
  `Image` text NOT NULL,
  `Address` longtext DEFAULT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Resto_id`, `Email_Address`, `Password`, `Phone_number`, `Resto_name`, `Image`, `Address`, `Latitude`, `Longitude`) VALUES
(1, 'vit.mess@gmail.com', 'vit', 0, 'VIT Mess', '1.jpg', '', 1.11111, 0),
(2, 'shanti.sagar@gmail.com', 'shanti', 0, 'Shanti Sagar', '2.jpg', '', 0, 0),
(3, 'lili@gmail.com', '', 0, 'Lili Canteen', '3.jpg', '', 0, 0),
(4, 'xyz.mess@gmail.com', '', 0, 'XYZ Mess', '4.jpg', '', 0, 0),
(5, 'goodlife@gmail.com', '', 0, 'Good Life Canteen', '5.jpg', '', 0, 0),
(6, 'iitm.mess@gmail.com', '', 0, 'IITM Mess', '6.jpg', '', 0, 0),
(7, 'iitb.mess@gmail.com', '', 0, 'IITB Mess', '7.jpg', '', 0, 0),
(8, 'iitk.mess@gmail.com', '', 0, 'IITK Mess', '8.jpg', '', 0, 0),
(9, 'pes.mess@gmail.com', '', 0, 'PES Mess', '9.jpg', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`Customer_id`,`Item_id`,`Purchase_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Resto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Resto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
