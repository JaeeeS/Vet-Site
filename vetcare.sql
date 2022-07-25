-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 09:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apt_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `pet_name` varchar(10) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apt_id`, `login_id`, `date`, `time`, `pet_name`, `reason`, `status`) VALUES
(1, 1, '2022-07-26', '12:07:00', 'Bengo', 'Vaccine', 'Approved'),
(2, 2, '2022-07-28', '14:11:00', 'Ringo', 'Check-up', 'Processing'),
(3, 2, '2022-07-01', '15:39:00', 'Oreo ', 'Vaccine', 'Cancelled'),
(4, 3, '2022-07-15', '06:08:00', 'Nana', 'Allergy', 'Processing'),
(5, 1, '2022-07-11', '06:25:00', 'Lala', 'Vaccine', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `cancelled`
--

CREATE TABLE `cancelled` (
  `cancel_id` int(11) NOT NULL,
  `apt_id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancelled`
--

INSERT INTO `cancelled` (`cancel_id`, `apt_id`, `reason`) VALUES
(1, 3, 'No veterinarian available during that time.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Lea', 'jane@yahoo.com', 'abcd', 'client'),
(2, 'Marijae_', 'jake@yahoo.com', 'efgh', 'client'),
(3, 'ABC', 'jave@yahoo.com', '123', 'client'),
(4, 'admin', '0', 'password', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `med_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `medicine` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`med_id`, `pet_id`, `medicine`, `date`) VALUES
(1, 1, 'Deworming', '2022-07-11'),
(2, 1, 'Pneumex', '2022-07-04'),
(3, 2, 'Deworming', '2022-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `ownerpet`
--

CREATE TABLE `ownerpet` (
  `pet_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ownerpet`
--

INSERT INTO `ownerpet` (`pet_id`, `login_id`) VALUES
(1, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pendingvaccine`
--

CREATE TABLE `pendingvaccine` (
  `pending_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `vaccine` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendingvaccine`
--

INSERT INTO `pendingvaccine` (`pending_id`, `pet_id`, `vaccine`, `date`) VALUES
(1, 1, '5 in 1 vaccine ', '2023-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `petdetails`
--

CREATE TABLE `petdetails` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petdetails`
--

INSERT INTO `petdetails` (`pet_id`, `pet_name`, `doctor`) VALUES
(1, 'Bengo', 'Dr. Garcia'),
(2, 'Oreo', 'Dr. Sy'),
(3, 'Ringo', 'Dr. Garcia');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `vac_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `vaccine_name` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccination`
--

INSERT INTO `vaccination` (`vac_id`, `pet_id`, `vaccine_name`, `date`) VALUES
(1, 1, '5 in 1 vaccine', '2022-07-11'),
(2, 1, 'Anti-rabies', '2022-07-12'),
(3, 2, 'Anti-rabies', '2022-07-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apt_id`);

--
-- Indexes for table `cancelled`
--
ALTER TABLE `cancelled`
  ADD PRIMARY KEY (`cancel_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `ownerpet`
--
ALTER TABLE `ownerpet`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `pendingvaccine`
--
ALTER TABLE `pendingvaccine`
  ADD PRIMARY KEY (`pending_id`);

--
-- Indexes for table `petdetails`
--
ALTER TABLE `petdetails`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`vac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cancelled`
--
ALTER TABLE `cancelled`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ownerpet`
--
ALTER TABLE `ownerpet`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendingvaccine`
--
ALTER TABLE `pendingvaccine`
  MODIFY `pending_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petdetails`
--
ALTER TABLE `petdetails`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `vac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
