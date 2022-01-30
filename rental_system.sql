-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 10:23 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(30) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UptationDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fullname`, `UserName`, `Password`, `UptationDate`) VALUES
(13, 'Administrator ', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2021-10-24 14:26:47'),
(21, 'Mostafa', 'admin2', '25d55ad283aa400af464c76d713c07ad', '2021-12-02 18:01:47'),
(25, 'Glenna White', 'higivy', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2022-01-07 10:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `total_days` int(11) NOT NULL,
  `pickup` varchar(255) NOT NULL,
  `dropoff` varchar(255) NOT NULL,
  `from_date` varchar(30) NOT NULL,
  `to_date` varchar(30) NOT NULL,
  `country_code` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `license_image` varchar(255) DEFAULT NULL,
  `message` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `booking_date` varchar(40) NOT NULL,
  `status` varchar(55) NOT NULL,
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `full_name`, `email_id`, `vehicle`, `price`, `total`, `total_days`, `pickup`, `dropoff`, `from_date`, `to_date`, `country_code`, `contact`, `license_image`, `message`, `booking_date`, `status`, `LastUpdationDate`) VALUES
(62, 'Mostafa Ahmed', 'mostafaahmedmaa1@gmail.com', 'Yaris', '65.00', '195.00', 3, 'Nicosia', 'Magusa', '2022-01-12', '2022-01-15', '90', '5488771507', 'License_image_228.jpeg', 'Thank you!!', '2022-01-11 02:17:41pm', 'Delivered', '2022-01-15 08:56:27'),
(67, 'Mostafa Ahmed', 'itsswarez@gmail.com', 'BMW 7 Series', '60.00', '180.00', 3, 'Gonyeli', 'Ercan', '2022-01-12', '2022-01-15', '90', '5488771507', 'License_image_7.jpeg', 'Thank you!!', '2022-01-12 10:46:17am', 'Cancelled', '2022-01-12 09:47:39'),
(68, 'abo hadid', 'itsswarez@gmail.com', 'A class', '70.00', '350.00', 5, 'Nicosia', 'Magusa', '2022-01-14', '2022-01-19', '90', '5488771732', 'License_image_101.jpeg', 'nothing', '2022-01-12 02:34:00pm', 'Cancelled', '2022-01-12 13:43:33'),
(69, 'mostafa ahmed', 'mostafaahmedmaa1@gmail.com', 'Fiesta', '21.00', '84.00', 4, 'Magusa', 'Girne', '2022-01-15', '2022-01-19', '90', '5488771507', 'License_image_392.jpeg', 'Thanks!!', '2022-01-15 09:54:43am', 'On Delivery', '2022-01-15 08:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `featured` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand`, `featured`, `active`) VALUES
(4, 'BMW', 'Yes', 'Yes'),
(5, 'Mercedes ', 'Yes', 'Yes'),
(6, 'Hyundai ', 'Yes', 'Yes'),
(7, 'Mazda', 'Yes', 'Yes'),
(8, 'Honda', 'Yes', 'Yes'),
(9, 'Ford', 'Yes', 'Yes'),
(10, 'Volkswagen', 'Yes', 'Yes'),
(11, 'Toyota ', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(100) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `title`, `image_name`, `featured`, `active`) VALUES
(10, 'Economy', 'Car_Category_602.jpg', 'Yes', 'Yes'),
(11, 'Compact', 'Car_Category_515.jpg', 'Yes', 'Yes'),
(12, 'Luxury', 'Car_Category_927.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(2, 'Mostafa Ahmed', 'mostafaahmedmaa1@gmail.com', '$2y$10$VPNKcZcUWCCoGU.jPgGgT.DQp86HsKFve.4dBM/JSDxqcd5bWSOvW', 0, 'verified'),
(9, 'munther qadous', 'montherdirar4@gmail.com', '$2y$10$bL2z7pYUiatBiUVGhq0gtOfRnYME3zM5qWpaqk8.fhIEc9qCXtm46', 0, 'verified'),
(12, 'mukhtar ', 'mukka187@gmail.com', '$2y$10$X94fuUyycR0UftjpV76pXO4t8NfXj7lgmbp37Z8RYJrYqjnbh/Fuu', 0, 'verified'),
(22, 'Mostafa', 'itsswarez@gmail.com', '$2y$10$emD2Oj9VYFJrwnOolqOOEeUJHw6O1b.s38CLyfpfnf8wjLr6b6lo2', 0, 'verified'),
(23, 'NURUDEEN', 'nurudeenayansina@gmail.com', '$2y$10$fHM9spxHqvLN9EhqT7beNeVn24aaGOPwawT6KxAYzpUv96FfNHryS', 0, 'verified'),
(25, 'Carly Hernandez', 'syza@mailinator.com', '$2y$10$.IGXpVBXYZwWuIoi1VeCLOOcG9Y3Ob62eLz.Uzy9jAUFmoUXe3igK', 528895, 'notverified');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(30) UNSIGNED NOT NULL,
  `vehicle_title` varchar(50) DEFAULT NULL,
  `brand_id` varchar(50) DEFAULT NULL,
  `vehicles_overview` longtext DEFAULT NULL,
  `price_day` decimal(11,2) DEFAULT NULL,
  `fuel_type` varchar(100) DEFAULT NULL,
  `model_year` int(6) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `category_id` int(100) UNSIGNED NOT NULL,
  `active_vehicles` varchar(10) NOT NULL,
  `featured_vehicles` varchar(10) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_title`, `brand_id`, `vehicles_overview`, `price_day`, `fuel_type`, `model_year`, `seats`, `image1`, `image2`, `image3`, `image4`, `category_id`, `active_vehicles`, `featured_vehicles`, `RegDate`, `LastUpdationDate`) VALUES
(80, 'Polo', '10', 'The Polo comes with cruise control, auto AC with rear AC vents, rain-sensing wipers, and a 6.5-inch touchscreen infotainment system with Apple CarPlay and Android Auto. ', '25.00', 'Petrol', 2019, 5, 'Vehicle-4583.jpg', 'Vehicle-378.jpg', 'Vehicle-3715.jpg', 'Vehicle-9329.jpg', 10, 'Yes', 'Yes', '2022-01-11 17:37:52', NULL),
(81, 'Mazda 3', '7', 'The Sport trim is powered by a 2.0-liter four-cylinder engine (155 horsepower, 150 pound-feet of torque). The Touring and Grand Touring models get a 2.5-liter engine (184 hp, 185 lb-ft). A six-speed manual transmission is standard for all Mazda 3s, with a six-speed automatic available as an option.', '35.00', 'Petrol', 2018, 5, 'Vehicle-8167.jpg', 'Vehicle-2547.jpg', 'Vehicle-3763.jpg', 'Vehicle-8494.jpg', 11, 'Yes', 'Yes', '2022-01-11 17:42:21', NULL),
(82, 'Fiesta', '9', 'The 2018 Ford Fiesta is powered by a 1.6-liter I-4 that produces 120 hp and 112 lb-ft of torque in all models except the ST. The 1.6-liter delivers an EPA-rated 27/35 mpg city/highway with the standard five-speed manual transmission and 27/37 mpg with the optional six-speed dual clutch automatic.', '21.00', 'Petrol', 2018, 5, 'Vehicle-1230.jpg', 'Vehicle-1312.jpg', 'Vehicle-8417.jpg', 'Vehicle-5885.jpg', 10, 'Yes', 'Yes', '2022-01-11 17:45:53', NULL),
(83, 'Yaris', '11', 'All Yaris models have an impressive infotainment screen and 25,000-mile free maintenance schedule. The 2020 Yaris iA is offered in one, decently outfitted trim. The sedan has 16-inch wheels, a rearview camera, keyless ignition, Bluetooth connectivity, and a 7.0-inch infotainment screen.', '26.00', 'Petrol', 2020, 5, 'Vehicle-677.jpg', 'Vehicle-2831.jpg', 'Vehicle-1978.jpg', 'Vehicle-5645.jpg', 10, 'Yes', 'Yes', '2022-01-11 17:48:27', NULL),
(84, 'Civic', '8', 'The 2021 Honda Civic sedan is offered in LX, Sport, EX, EX-L and Touring trims. The LX and Sport are driven by a 2.0-liter four-cylinder engine with 158 horsepower and 138 lb-ft of torque on tap. EX and above models come with a turbocharged 1.5-liter four-cylinder (174 hp, 162 lb-ft) that we think is far superior.', '40.00', 'Petrol', 2021, 5, 'Vehicle-5275.png', 'Vehicle-4517.jpg', 'Vehicle-875.jpg', 'Vehicle-8494.jpeg', 11, 'Yes', 'No', '2022-01-11 17:56:16', NULL),
(85, 'A class', '5', 'With the 2021 A-class, the sole engine choice is a turbocharged 2.0-liter four-cylinder that generates 188 horsepower and 221 lb-ft of torque. Front-wheel drive is standard with the A220, while the A220 4Matic adds all-wheel drive. A seven-speed dual-clutch automatic transmission handles the gear shifts.', '70.00', 'Petrol', 2021, 5, 'Vehicle-4195.jpg', 'Vehicle-921.jpg', 'Vehicle-4819.jpg', 'Vehicle-6787.jpg', 12, 'Yes', 'No', '2022-01-11 18:02:34', NULL),
(86, 'BMW 7 Series', '4', 'BMW 7 Series models are available with a 3.0 L-liter gas engine or a 4.4 L-liter gas engine, with output up to 523 hp, depending on engine type. The 2020 BMW 7 Series comes with rear wheel drive, and all wheel drive. Available transmissions include: 8-speed shiftable automatic.', '60.00', 'Petrol', 2020, 5, 'Vehicle-1180.jpg', 'Vehicle-8714.jpg', 'Vehicle-1713.jpg', 'Vehicle-9507.jpg', 12, 'Yes', 'No', '2022-01-11 18:09:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
