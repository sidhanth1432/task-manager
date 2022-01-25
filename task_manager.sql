-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 10:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `emp_isAdmin` int(1) NOT NULL,
  `emp_isFree` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_email`, `emp_password`, `emp_isAdmin`, `emp_isFree`) VALUES
(1, 'admin', 'admin@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0),
(2, 'sid', 'sid@email.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 1),
(4, 'diana', 'diana@email.com', '040b7cf4a55014e185813e0644502ea9', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_task`
--

CREATE TABLE `ordered_task` (
  `ordered_task_id` int(11) NOT NULL,
  `ordered_employer_id` int(11) NOT NULL,
  `ordered_employee_id` int(11) NOT NULL,
  `ordered_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_task`
--

INSERT INTO `ordered_task` (`ordered_task_id`, `ordered_employer_id`, `ordered_employee_id`, `ordered_date`) VALUES
(9, 1, 4, '2022-01-25 14:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `task_isAssigned` int(1) NOT NULL,
  `task_isComplete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_description`, `task_isAssigned`, `task_isComplete`) VALUES
(8, 'task1', 0, 0),
(9, 'task2', 1, 0),
(10, 'task 3', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `ordered_task`
--
ALTER TABLE `ordered_task`
  ADD PRIMARY KEY (`ordered_task_id`),
  ADD KEY `ordered_employee_id` (`ordered_employee_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordered_task`
--
ALTER TABLE `ordered_task`
  MODIFY `ordered_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_task`
--
ALTER TABLE `ordered_task`
  ADD CONSTRAINT `ordered_task_ibfk_1` FOREIGN KEY (`ordered_employee_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
