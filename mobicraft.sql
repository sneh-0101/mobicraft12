-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2025 at 07:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobicraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin`, `password`) VALUES
('admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'yosdf', 'uttamrajpopat54@gmail.com', 'fsdfdsf', 'sdfsdf'),
(2, 'jau', 'ajit@gmail.com', 'mobai', 'sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `aplicationnumber` varchar(100) NOT NULL,
  `screensize` varchar(100) NOT NULL,
  `cornerradiius` varchar(100) NOT NULL,
  `thikness` varchar(100) NOT NULL,
  `powerbutton` varchar(100) NOT NULL,
  `volumebutton` varchar(100) NOT NULL,
  `speaker` varchar(100) NOT NULL,
  `screentype` varchar(100) NOT NULL,
  `refreshrate` varchar(100) NOT NULL,
  `brightness` varchar(100) NOT NULL,
  `resolution` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `rom` varchar(100) NOT NULL,
  `gpu` varchar(100) NOT NULL,
  `postion` varchar(100) NOT NULL,
  `count` varchar(100) NOT NULL,
  `moduleshape` varchar(100) NOT NULL,
  `style` varchar(100) NOT NULL,
  `maincamera` varchar(100) NOT NULL,
  `microcamera` varchar(100) NOT NULL,
  `telecamera` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `wiredcharging` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `wirelesschargin` varchar(100) NOT NULL,
  `fingerprint` varchar(100) NOT NULL,
  `sim` varchar(100) NOT NULL,
  `connectivity` varchar(100) NOT NULL,
  `ai` varchar(100) NOT NULL,
  `nfc` varchar(100) NOT NULL,
  `fontcamera` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `design` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobail` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `other detail` varchar(100) NOT NULL,
  `date` text NOT NULL,
  `progress` text NOT NULL,
  `yearofwaranty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`aplicationnumber`, `screensize`, `cornerradiius`, `thikness`, `powerbutton`, `volumebutton`, `speaker`, `screentype`, `refreshrate`, `brightness`, `resolution`, `processor`, `ram`, `rom`, `gpu`, `postion`, `count`, `moduleshape`, `style`, `maincamera`, `microcamera`, `telecamera`, `capacity`, `wiredcharging`, `type`, `wirelesschargin`, `fingerprint`, `sim`, `connectivity`, `ai`, `nfc`, `fontcamera`, `material`, `color`, `design`, `price`, `fullname`, `email`, `mobail`, `address`, `other detail`, `date`, `progress`, `yearofwaranty`) VALUES
('MOBI-061025-5346', '5', '20', '7', 'right', 'left', 'bottom', 'flat', '60', '1000', '1080', 'medG95', '8', '128', 'balanced', 'left', '1', 'square', 'circle', '50', '10', '12', '4000', '20', 'Lithium-ion', 'No', 'display', 'nano', '4g', 'none', 'none', 'dot', 'glass', '#1a1a1a', 'none', '21800', 'karan samiai', 'ajit@gmail.com', '7894561237', 'dsfsd', 'dsvfs', '2025-10-06 19:29:03', 'Under Processing', '365'),
('MOBI-260925-3260', '6.7', '23', '9', 'right', 'right', 'bottom', 'curved', '121', '2600', '2k', 'appleA16', '16', '1024', 'performance', 'left', '3', 'futuristic', 'circle', '50', '10', '12', '6500', '130', 'Lithium-ion', 'Yes', 'display', 'nano', '4g', 'none', 'none', 'dot', 'leather', '#ffffff', 'matte', '61170', 'mit tanna', 'mittanna@gmail.com', '9313599945', 'santahli', 'please speed', '2025-09-26 11:37:30', 'Delivered', '365'),
('MOBI-260925-9556', '6.7', '20', '7', 'right', 'right', 'bottom', 'curved', '119', '2750', '1080', 'snap8gen2', '16', '1024', 'balanced', 'middle', '3', 'futuristic', 'circle', '83', '15', '19', '7000', '100', 'Lithium-ion', 'Yes', 'side', 'hybrid', '5g', 'yes', 'yes', 'dot', 'leather', '#df0c0c', 'none', '56005', 'ajit lambriya', 'ajit@gmail.com', '9172722847', 'sdfsdf', 'dfdsffsd', '2025-09-26 06:15:31', 'Out of Delivery', '730'),
('MOBI-270925-1759', '6.7', '56', '12', 'right', 'right', 'bottom', 'curved', '114', '2600', '2k', 'snap8gen2', '12', '512', 'performance', 'left', '3', 'futuristic', 'circle', '93', '16', '17', '6000', '80', 'Lithium-ion', 'Yes', 'display', 'nano', '5g', 'none', 'none', 'dot', 'leather', '#f00000', 'glossy', '48680', 'jd sir', 'mukesh@gmial.com', '07896541258', 'sfdsfsdf', 'sdfsdf', '2025-09-27 05:30:31', 'Under Processing', '730'),
('MOBI-270925-1941', '6.7', '20', '7', 'right', 'left', 'bottom', 'curved', '112', '2150', '2k', 'appleA15', '16', '1024', 'balanced', 'left', '1', 'square', 'circle', '50', '10', '12', '6500', '105', 'Lithium-ion', 'No', 'display', 'nano', '4g', 'yes', 'yes', 'dot', 'leather', '#ec2222', 'none', '51490', 'uttam rajpopat', 'uttamrajpopat65@gmail.com', '9313599945', 'sanathli', 'kkl', '2025-09-27 10:32:13', 'Under Processing', '730'),
('MOBI-270925-5481', '6.8', '20', '7', 'right', 'left', 'bottom', 'curved', '116', '2500', '1080', 'snap8gen2', '16', '512', 'balanced', 'left', '1', 'futuristic', 'circle', '50', '10', '12', '5000', '95', 'Lithium-ion', 'No', 'display', 'nano', '4g', 'none', 'none', 'dot', 'glass', '#1a1a1a', 'none', '42170', 'jay', 'mukesh@gmial.com', '07896541258', 'krishnagar 15 near svaminaryan chock rajkot', 'jkj', '2025-09-27 10:39:22', 'Under Processing', '365'),
('MOBI-280925-2664', '6.4', '39', '7', 'right', 'left', 'bottom', 'curved', '91', '2450', '1080', 'medG95', '8', '128', 'balanced', 'middle', '3', 'futuristic', 'circle', '50', '10', '12', '4000', '20', 'Lithium-ion', 'No', 'display', 'nano', '4g', 'none', 'none', 'dot', 'glass', '#1a1a1a', 'none', '27970', 'Rajpopat Uttam Rajendrabhai', 'uttamrajpopat65@gmail.com', '09313599945', 'krishnagar 15 near svaminaryan chock rajkot\r\nrakot', 'jnjknjk', '2025-09-28 08:08:36', 'Under Processing', '365'),
('MOBI-280925-2689', '5', '20', '7', 'right', 'left', 'bottom', 'flat', '60', '1000', '1080', 'medG95', '8', '128', 'balanced', 'left', '1', 'square', 'circle', '50', '10', '12', '4000', '20', 'Lithium-ion', 'No', 'display', 'nano', '4g', 'none', 'none', 'dot', 'glass', '#1a1a1a', 'none', '20800', 'Rajpopat Uttam Rajendrabhai', 'uttamrajpopat65@gmail.com', '09313599945', 'krishnagar 15 near svaminaryan chock rajkot\r\nrakot', 'mkml', '2025-09-28 08:12:24', 'Under Processing', '365'),
('MOBI-280925-5694', '6.6', '20', '7', 'right', 'left', 'bottom', 'flat', '60', '1000', '1080', 'snap8gen2', '16', '1024', 'balanced', 'left', '3', 'futuristic', 'circle', '50', '10', '12', '7000', '115', 'Lithium-ion', 'Yes', 'display', 'nano', '5g', 'yes', 'yes', 'dot', 'leather', '#dbd7d7', 'matte', '47750', 'Rajpopat Uttam Rajendrabhai', 'uttamrajpopat65@gmail.com', '09313599945', 'krishnagar 15 near svaminaryan chock rajkot\r\nrakot', 'jnjknjk', '2025-09-28 07:55:11', 'Under Processing', '365');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail_simple`
--

CREATE TABLE `orderdetail_simple` (
  `id` int(11) NOT NULL,
  `aplicationnumber` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobail` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `other_detail` text DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetail_simple`
--

INSERT INTO `orderdetail_simple` (`id`, `aplicationnumber`, `fullname`, `email`, `mobail`, `address`, `other_detail`, `payment_id`, `date_created`) VALUES
(1, 'MOBI-280925-9828', 'ganesh', 'uttamrajpopa45@gmail.com', '9512519271', 'sanathlisdfsdf', 'msfdsf', 'pay_RMvPVlAbvcY8XA', '2025-09-28 06:29:38'),
(2, 'MOBI-280925-6748', 'ganesh', 'ganesh@gmail.com', '7894561237', 'sanasfdsfs', 'sfdsf', 'pay_RMvROjh0xkeQAS', '2025-09-28 06:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `application_number` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `other_details` text DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `screen_size` varchar(20) DEFAULT NULL,
  `corner_radius` varchar(20) DEFAULT NULL,
  `thickness` varchar(20) DEFAULT NULL,
  `power_button` varchar(20) DEFAULT NULL,
  `volume_button` varchar(20) DEFAULT NULL,
  `speaker` varchar(20) DEFAULT NULL,
  `screen_type` varchar(20) DEFAULT NULL,
  `refresh_rate` varchar(20) DEFAULT NULL,
  `brightness` varchar(20) DEFAULT NULL,
  `resolution` varchar(20) DEFAULT NULL,
  `processor` varchar(50) DEFAULT NULL,
  `ram` varchar(20) DEFAULT NULL,
  `rom` varchar(20) DEFAULT NULL,
  `gpu` varchar(20) DEFAULT NULL,
  `camera_position` varchar(20) DEFAULT NULL,
  `camera_count` varchar(20) DEFAULT NULL,
  `module_shape` varchar(20) DEFAULT NULL,
  `camera_style` varchar(20) DEFAULT NULL,
  `main_camera` varchar(20) DEFAULT NULL,
  `micro_camera` varchar(20) DEFAULT NULL,
  `tele_camera` varchar(20) DEFAULT NULL,
  `battery_capacity` varchar(20) DEFAULT NULL,
  `wired_charging` varchar(20) DEFAULT NULL,
  `battery_type` varchar(50) DEFAULT NULL,
  `wireless_charging` varchar(20) DEFAULT NULL,
  `fingerprint` varchar(20) DEFAULT NULL,
  `sim` varchar(20) DEFAULT NULL,
  `connectivity` varchar(20) DEFAULT NULL,
  `ai` varchar(20) DEFAULT NULL,
  `nfc` varchar(20) DEFAULT NULL,
  `front_camera` varchar(20) DEFAULT NULL,
  `material` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `design` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `progress` varchar(50) DEFAULT 'Under Processing',
  `warranty_days` int(11) DEFAULT 365
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partsprice`
--

CREATE TABLE `partsprice` (
  `screenbase` int(10) NOT NULL,
  `screenperinch` int(10) NOT NULL,
  `flatdis` int(10) NOT NULL,
  `curveddis` int(10) NOT NULL,
  `amoladdis` int(10) NOT NULL,
  `30hz` int(10) NOT NULL,
  `perhz` int(10) NOT NULL,
  `720p` int(10) NOT NULL,
  `1080p` int(10) NOT NULL,
  `2k` int(10) NOT NULL,
  `mediatekg95` int(10) NOT NULL,
  `snapdragan870` int(10) NOT NULL,
  `snapdragan888` int(10) NOT NULL,
  `exynos2200` int(10) NOT NULL,
  `kirin9000` int(10) NOT NULL,
  `snapdragan8gen1` int(10) NOT NULL,
  `dimensity8000` int(10) NOT NULL,
  `snapdragan8gen2` int(10) NOT NULL,
  `a15` int(10) NOT NULL,
  `a16` int(10) NOT NULL,
  `4gb` int(10) NOT NULL,
  `8gb` int(10) NOT NULL,
  `12gb` int(10) NOT NULL,
  `16gb` int(10) NOT NULL,
  `64gb` int(10) NOT NULL,
  `128gb` int(10) NOT NULL,
  `256gb` int(10) NOT NULL,
  `512gb` int(10) NOT NULL,
  `1tb` int(10) NOT NULL,
  `3000mah` int(10) NOT NULL,
  `per500mah` int(10) NOT NULL,
  `5w` int(10) NOT NULL,
  `+per5w` int(10) NOT NULL,
  `wireless` int(10) NOT NULL,
  `camera1` int(10) NOT NULL,
  `camera2` int(10) NOT NULL,
  `camera3` int(10) NOT NULL,
  `permg` int(10) NOT NULL,
  `function` int(10) NOT NULL,
  `glass` int(10) NOT NULL,
  `plastic` int(10) NOT NULL,
  `aluminum` int(10) NOT NULL,
  `lether` int(10) NOT NULL,
  `chossdesing` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partsprice`
--

INSERT INTO `partsprice` (`screenbase`, `screenperinch`, `flatdis`, `curveddis`, `amoladdis`, `30hz`, `perhz`, `720p`, `1080p`, `2k`, `mediatekg95`, `snapdragan870`, `snapdragan888`, `exynos2200`, `kirin9000`, `snapdragan8gen1`, `dimensity8000`, `snapdragan8gen2`, `a15`, `a16`, `4gb`, `8gb`, `12gb`, `16gb`, `64gb`, `128gb`, `256gb`, `512gb`, `1tb`, `3000mah`, `per500mah`, `5w`, `+per5w`, `wireless`, `camera1`, `camera2`, `camera3`, `permg`, `function`, `glass`, `plastic`, `aluminum`, `lether`, `chossdesing`) VALUES
(5000, 200, 500, 2000, 3000, 600, 20, 500, 1700, 2500, 1000, 2500, 3500, 4200, 4500, 5000, 6000, 7000, 11000, 12000, 500, 1500, 2000, 2500, 1500, 2000, 3000, 5000, 7500, 900, 200, 0, 200, 0, 1000, 1500, 2000, 25, 500, 1000, 500, 800, 1500, 500);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `cardnumber` int(100) NOT NULL,
  `cvv` int(100) NOT NULL,
  `exparydate` int(100) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`cardnumber`, `cvv`, `exparydate`, `name`) VALUES
(0, 123, 12, 'uttam rajpopat'),
(0, 0, 0, 'UPI User'),
(0, 0, 0, 'uttam rajpopat');

-- --------------------------------------------------------

--
-- Table structure for table `test_orders`
--

CREATE TABLE `test_orders` (
  `id` int(11) NOT NULL,
  `app_number` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_orders`
--

INSERT INTO `test_orders` (`id`, `app_number`, `name`, `email`, `phone`, `payment_id`, `created_at`) VALUES
(1, 'MOBI-280925-5816', 'riya pujara', 'riyaxxx@gmail.com', '8826274568', 'pay_RMvlflj4HPGIEe', '2025-09-28 06:50:37'),
(2, 'MOBI-280925-5811', 'uthgj', 'yt@gmail.com', '9659636252', 'pay_RMvogXp0h7MFfm', '2025-09-28 06:53:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`aplicationnumber`);

--
-- Indexes for table `orderdetail_simple`
--
ALTER TABLE `orderdetail_simple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_orders`
--
ALTER TABLE `test_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderdetail_simple`
--
ALTER TABLE `orderdetail_simple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test_orders`
--
ALTER TABLE `test_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
