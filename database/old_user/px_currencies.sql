-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2022 at 12:36 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamleshyadav_yatharthrealestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `px_currencies`
--

CREATE TABLE `px_currencies` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `currency_symbol` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `px_currencies`
--

INSERT INTO `px_currencies` (`id`, `currency_name`, `currency_code`, `currency_symbol`) VALUES
(1, 'Australian dollar', 'AUD', '\0$'),
(2, 'Brazilian real', 'BRL', 'R$'),
(3, 'Canadian dollar', 'CAD', '\0$'),
(4, 'Chinese Renmenbi', 'CNY', '¥'),
(5, 'Czech koruna', 'CZK', 'Kč'),
(6, 'Danish krone', 'DKK', 'Kr'),
(7, 'Euro', 'EUR', '€'),
(8, 'Hong Kong dollar', 'HKD', 'HK$'),
(9, 'Hungarian forint ', 'HUF', 'Ft'),
(10, 'Israeli new shekel', 'ILS', '₪'),
(11, 'Japanese yen', 'JPY', '¥'),
(12, 'Malaysian ringgit', 'MYR', 'RM'),
(13, 'Mexican peso', 'MXN', 'Mex$'),
(14, 'New Taiwan dollar', 'TWD', 'NT$'),
(15, 'New Zealand dollar', 'NZD', '\0$'),
(16, 'Norwegian krone', 'NOK', 'kr'),
(17, 'Philippine peso', 'PHP', '₱'),
(18, 'Polish zloty', 'PLN', 'zł'),
(19, 'Pound sterling', 'GBP', '£'),
(20, 'Russian ruble', 'RUB', '₽'),
(21, 'Singapore dollar', 'SGD', 'S$'),
(22, 'Swedish krona', 'SEK', 'kr'),
(23, 'Swiss franc', 'CHF', 'CHf'),
(24, 'Thai baht', 'THB', '฿'),
(25, 'United States dollar', 'USD', '\0$'),
(26, 'India Rupee', 'INR', '₹');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `px_currencies`
--
ALTER TABLE `px_currencies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `px_currencies`
--
ALTER TABLE `px_currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
