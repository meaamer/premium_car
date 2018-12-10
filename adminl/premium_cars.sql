-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 08:09 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `premium_cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`) VALUES
(2, 'rico', 'rico', 123);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `vendor_id` bigint(255) NOT NULL,
  `company_id` bigint(255) NOT NULL,
  `from_city` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `alternate_number` int(50) NOT NULL,
  `pickup_address` text NOT NULL,
  `traveling_time` varchar(50) NOT NULL,
  `traveling_date` varchar(50) NOT NULL,
  `no_of_days` int(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sub_type` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `cab_id`, `vendor_id`, `company_id`, `from_city`, `first_name`, `last_name`, `mobile_number`, `alternate_number`, `pickup_address`, `traveling_time`, `traveling_date`, `no_of_days`, `type`, `sub_type`, `status`) VALUES
(1, 2, 0, 5, 'aurangabd', 'suavi', 'rico', '9158479443', 121212, 'center naka', '5', '02-09-2017', 10, 'local', 'ammer', '1'),
(3, 3, 0, 53, 'arungabad', 'abdul', 'aamer', 'atharab74@gmail.com', 2147483647, 'kiradpura aurangabd\r\nk', '1025', '10/04/2017', 10, 'outstation', '', ''),
(4, 3, 0, 53, 'arungabad', 'abdul', 'aamer', 'atharab74@gmail.com', 2147483647, 'kiradpura aurangabd\r\nk', '10', '10/04/2017', 10, 'outstation', '', ''),
(5, 3, 0, 53, 'AURANGABAD', 'abdul', 'aamer', '9158479443', 2147483647, 'HOUSE NO:08-20-336 KIRADPURA CIDCO ROAD AURANGABAD', '19:30', '10/04/2017', 20, 'outstation', '', ''),
(6, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '18:30', '10/04/2017', 20, 'outstation', '', ''),
(7, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '04-10-2017', 0, 'transfer', '', ''),
(8, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '04-10-2017', 0, 'local', '', ''),
(9, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '04-10-2017', 0, 'local', '', ''),
(10, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '04-10-2017', 0, 'local', '', ''),
(11, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '04-10-2017', 0, 'local', '', ''),
(12, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'local', '', ''),
(13, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'local', '', ''),
(14, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'local', '', ''),
(15, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'local', 'local', ''),
(16, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(17, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(18, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(19, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(20, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(21, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(22, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(23, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(24, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(25, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(26, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(27, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '06-10-2017', 0, 'transfer', '', ''),
(28, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '06-10-2017', 0, 'transfer', '', ''),
(29, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '06-10-2017', 0, 'transfer', '', ''),
(30, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '06-10-2017', 0, 'transfer', '', ''),
(31, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '06-10-2017', 0, 'transfer', '', ''),
(32, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '06-10-2017', 0, 'transfer', '', ''),
(33, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '06-10-2017', 0, 'transfer', '', ''),
(34, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '06-10-2017', 0, 'transfer', '', ''),
(35, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(36, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(37, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(38, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(39, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(40, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 0, 'transfer', '', ''),
(41, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '18:30', '55658', 0, 'transfer', '', ''),
(42, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '18:30', '55658', 0, 'transfer', '', ''),
(43, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '32132', '23123', 0, 'transfer', '', ''),
(44, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '32132', '23123', 0, 'transfer', '', ''),
(45, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '21', '32132', 0, 'transfer', '', ''),
(46, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '21', '32132', 0, 'transfer', '', ''),
(47, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '18:30', '4546', 0, 'transfer', '', ''),
(48, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '18:30', '4564', 0, 'transfer', 'fullday', ''),
(49, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '4554', '5454', 10, 'outstation', 'fullday', ''),
(50, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '655', '4565', 56, 'outstation', 'fullday', '1'),
(51, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '+919158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '04-10-2017', 20, 'outstation', '', ''),
(52, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '+919158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '05-10-2017', 20, 'outstation', '', ''),
(53, 2, 0, 53, 'arungabad', 'AFFDAF', 'DFSDFDF', '09158666644', 2147483647, 'AEFFSADF\r\n5', '10:30 AM', '05-10-2017', 0, 'local', 'local', ''),
(54, 2, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '04-10-2017', 0, 'transfer', '', ''),
(55, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '11:00 AM', '07-10-2017', 0, 'transfer', '', ''),
(56, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '11:00 AM', '07-10-2017', 0, 'transfer', '', ''),
(57, 3, 0, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '11:00 AM', '07-10-2017', 0, 'transfer', '', ''),
(58, 3, 0, 53, 'arungabad', 'AFFDAF', 'DFSDFDF', '9158666644', 2147483647, 'AEFFSADF\r\n5', '10:00 AM', '07-10-2017', 0, 'transfer', '', ''),
(59, 6, 0, 53, 'AURANGABAD', 'Yaser', 'Baravi', '9158479443', 2147483647, 'HOUSE NO:08-20-336 KIRADPURA CIDCO ROAD AURANGABAD', '11:00 AM', '10-10-2017', 0, 'transfer', '', ''),
(60, 2, 4, 53, 'arungabad', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '07-10-2017', 0, 'local', 'fullday', ''),
(61, 2, 0, 53, 'Pune, Maharashtra, India', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '09-10-2017', 2, 'outstation', '', ''),
(62, 6, 0, 53, 'Aurangabad, Maharashtra, India', 'Yaser', 'Basravi', '9158479443', 2147483647, 'Rosh', '11:00 AM', '10-10-2017', 20, 'outstation', '', ''),
(63, 3, 0, 53, 'pune', 'Yaser', 'Basravi', '9158479443', 2147483647, 'Roshan Gate', '10:00 AM', '10-10-2017', 2, 'outstation', '', ''),
(64, 2, 0, 53, 'Aurangabad, Maharashtra, India', 'abdul', 'aamer', '9158479443', 91584, 'kiradpura aurangabd\r\nk', '10:00 AM', '10-10-2017', 4, 'outstation', '', ''),
(65, 2, 0, 53, 'Aurangabad, Maharashtra, India', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '10-10-2017', 4, 'outstation', '', ''),
(66, 2, 0, 53, 'Aurangabad, Maharashtra, India', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '10-10-2017', 20, 'outstation', '', ''),
(67, 2, 0, 53, 'PUNE', 'abdul', 'aamer', '9158479443', 2147483647, 'kiradpura aurangabd\r\nk', '10:00 AM', '10-10-2017', 3, 'outstation', '', ''),
(68, 2, 0, 53, 'Aurangabad, Maharashtra, India', 'abdul', 'DFSDFDF', '9158479443', 2147483647, 'jlkfjsklj', '10:00 AM', '10-10-2017', 2, 'outstation', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking__local`
--

CREATE TABLE `booking__local` (
  `booking_local_Id` bigint(255) NOT NULL,
  `booking_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `full_day` varchar(255) NOT NULL,
  `half_day` varchar(255) NOT NULL,
  `extra_hour` varchar(255) NOT NULL,
  `extra_kilometer` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking__local`
--

INSERT INTO `booking__local` (`booking_local_Id`, `booking_id`, `cab_id`, `full_day`, `half_day`, `extra_hour`, `extra_kilometer`) VALUES
(2, 14, 2, '3423', '342', '342', 3435),
(3, 15, 2, '3423', '342', '342', 3435),
(4, 53, 2, '3423', '342', '342', 3435),
(5, 60, 2, '2000', '1000', '100', 8);

-- --------------------------------------------------------

--
-- Table structure for table `booking__outstaion`
--

CREATE TABLE `booking__outstaion` (
  `booking_outstation_id` bigint(255) NOT NULL,
  `booking_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `to_city` varchar(255) NOT NULL,
  `outstation_per_kilometer` double DEFAULT NULL,
  `extra_per_kilometer` double NOT NULL,
  `average_per_kilometer` double NOT NULL,
  `totat_kilometer` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking__outstaion`
--

INSERT INTO `booking__outstaion` (`booking_outstation_id`, `booking_id`, `cab_id`, `to_city`, `outstation_per_kilometer`, `extra_per_kilometer`, `average_per_kilometer`, `totat_kilometer`) VALUES
(1, 4, 3, 'arungabad', 0, 0, 0, 0),
(2, 5, 3, 'AURANGABAD', NULL, 0, 0, 0),
(3, 6, 3, 'arungabad', 0, 0, 0, 0),
(4, 49, 3, 'arungabad', NULL, 5000, 500, 0),
(5, 50, 3, 'arungabad', 10000, 5000, 500, 0),
(6, 52, 3, 'arungabad', 10000, 5000, 500, 0),
(7, 61, 2, 'Aurangabad, Maharashtra, India', 50, 60, 500, 0),
(8, 62, 6, 'Pune, Maharashtra, India', 20, 10, 100, 0),
(9, 63, 3, 'Aurangabad, Maharashtra, India', 40, 50, 600, 0),
(10, 64, 2, 'pune', 50, 60, 500, 0),
(11, 65, 2, 'punr', 50, 60, 500, 0),
(12, 66, 2, 'pune', 50, 60, 500, 0),
(13, 67, 2, 'Aranjuez, Spain', 50, 60, 500, 0),
(14, 68, 2, 'Pune, Maharashtra, India', 50, 60, 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking__transfer`
--

CREATE TABLE `booking__transfer` (
  `booking_transfer_id` bigint(255) NOT NULL,
  `booking_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `pickup_point` varchar(255) NOT NULL,
  `drop_point` varchar(255) NOT NULL,
  `transfer_rate` double NOT NULL,
  `waiting_charges` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking__transfer`
--

INSERT INTO `booking__transfer` (`booking_transfer_id`, `booking_id`, `cab_id`, `pickup_point`, `drop_point`, `transfer_rate`, `waiting_charges`) VALUES
(1, 7, 3, 'kiradpura aurangabd\r\nk', 'kiradpura aurangabd\r\nk', 0, 0),
(2, 40, 3, 'kiradpura aurangabd\r\nk', 'kiradpura aurangabd\r\nk', 2000, 50),
(3, 48, 3, 'kiradpura aurangabd\r\nk', 'kiradpura aurangabd\r\nk', 2000, 50),
(4, 54, 2, 'kiradpura aurangabd\r\nk', 'kiradpura aurangabd\r\nk', 5000, 10),
(5, 55, 3, 'kiradpura aurangabd\r\nk', 'kiradpura aurangabd\r\nk', 2000, 50),
(6, 56, 3, 'kiradpura aurangabd\r\nk', 'kiradpura aurangabd\r\nk', 2000, 50),
(7, 57, 3, 'kiradpura aurangabd\r\nk', 'kiradpura aurangabd\r\nk', 2000, 50),
(8, 58, 3, 'AEFFSADF\r\n5', 'AEFFSADF\r\n5', 2000, 50),
(9, 59, 6, 'HOUSE NO:08-20-336 KIRADPURA CIDCO ROAD AURANGABAD', 'HOUSE NO:08-20-336 KIRADPURA CIDCO ROAD AURANGABAD', 5000, 250);

-- --------------------------------------------------------

--
-- Table structure for table `cabs`
--

CREATE TABLE `cabs` (
  `cab_id` bigint(255) NOT NULL,
  `cab_name` varchar(255) NOT NULL,
  `cab_description` text NOT NULL,
  `cab_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabs`
--

INSERT INTO `cabs` (`cab_id`, `cab_name`, `cab_description`, `cab_image`) VALUES
(2, 'BMW', 'BMW', 'f247d8d4766f1c20952d4a4879fb7dc7.jpg'),
(3, 'Mahindra', 'Mahindra', 'ae7f90bc83d9bc507539923724a06849.jpg'),
(4, 'I 20', 'I 20', '8492710ac2394d366ef52aa844b2823b.jpg'),
(5, 'Alto', 'Alto', '271cde82af709e9a4e0cdc7379a979ba.jpg'),
(6, 'Nano', 'Nano', 'e9487b25cd9fd372ed15a53607db6117.jpg'),
(7, 'Swift ', 'Swift', 'a9ed4513f4049125296d751fb86550bd.jpg'),
(8, 'Innova', 'AC', '50da7ce34203d06e4cdbe2c4e741367d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` bigint(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_username` varchar(255) NOT NULL,
  `company_password` varchar(255) NOT NULL,
  `company_person_name` varchar(255) NOT NULL,
  `company_contact_no` int(20) NOT NULL,
  `company_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_username`, `company_password`, `company_person_name`, `company_contact_no`, `company_city`) VALUES
(53, 'Garware', 'rico', '123', 'Rahul', 2147483647, 'arungabad'),
(54, 'Pespsi Co', 'sharma', '9158666644', 'Shame', 2147483647, 'arungabad'),
(55, 'Sony', 'ramesh', '9158666644', 'ramesh', 2147483647, 'arungabad'),
(58, 'LG India', 'manish_lg1214', '1234456', 'Manish112123', 2147483647, 'Aurangabad');

-- --------------------------------------------------------

--
-- Table structure for table `company__local`
--

CREATE TABLE `company__local` (
  `company_local_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `company_id` bigint(255) NOT NULL,
  `full_day` varchar(255) NOT NULL,
  `half_day` varchar(255) NOT NULL,
  `extra_hour` varchar(255) NOT NULL,
  `extra_kilometer` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company__local`
--

INSERT INTO `company__local` (`company_local_id`, `cab_id`, `company_id`, `full_day`, `half_day`, `extra_hour`, `extra_kilometer`) VALUES
(11, 2, 53, '2000', '1000', '100', 8),
(12, 3, 53, '1000', '500', '50', 5),
(13, 4, 53, '3000', '1500', '25', 12),
(14, 5, 53, '4000', '2000', '200', 100),
(15, 6, 53, '500', '250', '25', 10),
(16, 7, 53, '5000', '2500', '500', 250),
(17, 8, 53, '6000', '3000', '400', 200);

-- --------------------------------------------------------

--
-- Table structure for table `company__outstation`
--

CREATE TABLE `company__outstation` (
  `company_outstation_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `company_id` bigint(255) NOT NULL,
  `outstation_per_kilometer` double NOT NULL,
  `extra_per_kilometer` bigint(50) NOT NULL,
  `average_per_kilometer` bigint(50) NOT NULL,
  `driver_charges` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company__outstation`
--

INSERT INTO `company__outstation` (`company_outstation_id`, `cab_id`, `company_id`, `outstation_per_kilometer`, `extra_per_kilometer`, `average_per_kilometer`, `driver_charges`) VALUES
(2, 2, 53, 50, 60, 500, 1000),
(3, 3, 53, 40, 50, 600, 800),
(4, 4, 53, 70, 35, 200, 500),
(5, 5, 53, 90, 50, 600, 1200),
(6, 6, 53, 20, 10, 100, 400),
(7, 7, 53, 60, 20, 500, 1000),
(8, 8, 53, 500, 200, 1000, 150);

-- --------------------------------------------------------

--
-- Table structure for table `company__transfer`
--

CREATE TABLE `company__transfer` (
  `company_transfer_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `company_id` bigint(255) NOT NULL,
  `transfer_rate` int(255) NOT NULL,
  `waiting_charges` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company__transfer`
--

INSERT INTO `company__transfer` (`company_transfer_id`, `cab_id`, `company_id`, `transfer_rate`, `waiting_charges`) VALUES
(6, 3, 53, 2000, 50),
(7, 2, 53, 5000, 10),
(8, 4, 53, 6000, 50),
(9, 5, 53, 10000, 1000),
(10, 6, 53, 5000, 250),
(11, 7, 53, 6000, 150),
(12, 8, 53, 20000, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` bigint(255) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_username` varchar(255) NOT NULL,
  `vendor_password` varchar(255) NOT NULL,
  `vendor_person_name` varchar(255) NOT NULL,
  `vendor_contact_no` varchar(255) NOT NULL,
  `vendor_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_username`, `vendor_password`, `vendor_person_name`, `vendor_contact_no`, `vendor_city`) VALUES
(4, 'aamer', 'rico', '123', 'qq', '9158479443', 'aurangabad'),
(5, 'Faiz', 'admin1222', '123', 'aamer', '9158479443', 'pune');

-- --------------------------------------------------------

--
-- Table structure for table `vendor__local`
--

CREATE TABLE `vendor__local` (
  `vendor_local_id` bigint(255) NOT NULL,
  `vendor_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `full_day` varchar(255) NOT NULL,
  `half_day` varchar(25) NOT NULL,
  `extra_hours` double NOT NULL,
  `extra_kilometer` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor__local`
--

INSERT INTO `vendor__local` (`vendor_local_id`, `vendor_id`, `cab_id`, `full_day`, `half_day`, `extra_hours`, `extra_kilometer`) VALUES
(1, 5, 2, '22', '221', 555555, 22);

-- --------------------------------------------------------

--
-- Table structure for table `vendor__outstation`
--

CREATE TABLE `vendor__outstation` (
  `vendor_outstation_id` bigint(255) NOT NULL,
  `vendor_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `outstation_per_kilometer` double NOT NULL,
  `extra_per_kilometer` double NOT NULL,
  `average_per_kilometer` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor__outstation`
--

INSERT INTO `vendor__outstation` (`vendor_outstation_id`, `vendor_id`, `cab_id`, `outstation_per_kilometer`, `extra_per_kilometer`, `average_per_kilometer`) VALUES
(1, 4, 2, 777, 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `vendor__transfer`
--

CREATE TABLE `vendor__transfer` (
  `vendor_transfer_id` bigint(255) NOT NULL,
  `cab_id` bigint(255) NOT NULL,
  `vendor_id` bigint(255) NOT NULL,
  `transfer_rate` double NOT NULL,
  `waiting_charges` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor__transfer`
--

INSERT INTO `vendor__transfer` (`vendor_transfer_id`, `cab_id`, `vendor_id`, `transfer_rate`, `waiting_charges`) VALUES
(1, 3, 5, 55, 2),
(2, 2, 4, 22, 22),
(3, 7, 4, 78, 87);

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
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking__local`
--
ALTER TABLE `booking__local`
  ADD PRIMARY KEY (`booking_local_Id`);

--
-- Indexes for table `booking__outstaion`
--
ALTER TABLE `booking__outstaion`
  ADD PRIMARY KEY (`booking_outstation_id`);

--
-- Indexes for table `booking__transfer`
--
ALTER TABLE `booking__transfer`
  ADD PRIMARY KEY (`booking_transfer_id`);

--
-- Indexes for table `cabs`
--
ALTER TABLE `cabs`
  ADD PRIMARY KEY (`cab_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company__local`
--
ALTER TABLE `company__local`
  ADD PRIMARY KEY (`company_local_id`);

--
-- Indexes for table `company__outstation`
--
ALTER TABLE `company__outstation`
  ADD PRIMARY KEY (`company_outstation_id`);

--
-- Indexes for table `company__transfer`
--
ALTER TABLE `company__transfer`
  ADD PRIMARY KEY (`company_transfer_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor__local`
--
ALTER TABLE `vendor__local`
  ADD PRIMARY KEY (`vendor_local_id`);

--
-- Indexes for table `vendor__outstation`
--
ALTER TABLE `vendor__outstation`
  ADD PRIMARY KEY (`vendor_outstation_id`);

--
-- Indexes for table `vendor__transfer`
--
ALTER TABLE `vendor__transfer`
  ADD PRIMARY KEY (`vendor_transfer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `booking__local`
--
ALTER TABLE `booking__local`
  MODIFY `booking_local_Id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `booking__outstaion`
--
ALTER TABLE `booking__outstaion`
  MODIFY `booking_outstation_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `booking__transfer`
--
ALTER TABLE `booking__transfer`
  MODIFY `booking_transfer_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cabs`
--
ALTER TABLE `cabs`
  MODIFY `cab_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `company__local`
--
ALTER TABLE `company__local`
  MODIFY `company_local_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `company__outstation`
--
ALTER TABLE `company__outstation`
  MODIFY `company_outstation_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `company__transfer`
--
ALTER TABLE `company__transfer`
  MODIFY `company_transfer_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vendor__local`
--
ALTER TABLE `vendor__local`
  MODIFY `vendor_local_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendor__outstation`
--
ALTER TABLE `vendor__outstation`
  MODIFY `vendor_outstation_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendor__transfer`
--
ALTER TABLE `vendor__transfer`
  MODIFY `vendor_transfer_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
