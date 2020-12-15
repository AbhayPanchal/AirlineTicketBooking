-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 05:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




--
-- Database: `airlineticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `Flightnumber` int(11) NOT NULL,
  `Airline` varchar(11) NOT NULL,
  `Departure` varchar(100) NOT NULL,
  `Arrival` varchar(100) NOT NULL,
  `Cost` int(11) NOT NULL
) 

--
-- Dumping data for table `airlines`
--


-- --------------------------------------------------------

--
-- Table structure for table `cencellog`
--

CREATE TABLE `cencellog` (
  `Cencelid` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Reason` varchar(1000) NOT NULL
) 

--
-- Dumping data for table `cencellog`
--

INSERT INTO `cencellog` (`Cencelid`, `Userid`, `Email`, `Reason`) VALUES
(2, 11, 'a@gmail.com', 'swqdwdwq'),
(3, 19, 'w@gmail.com', 'bewhbfuhwef'),
(4, 19, 'w@gmail.com', 'bewhbfuhwef');

-- --------------------------------------------------------

--
-- Table structure for table `userticketdata`
--

CREATE TABLE `userticketdata` (
  `Ticketid` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `Flightnumber` int(11) NOT NULL,
  `Airline` varchar(100) NOT NULL
) 

--
-- Dumping data for table `userticketdata`
--

INSERT INTO `userticketdata` (`Ticketid`, `Userid`, `Flightnumber`, `Airline`) VALUES
(17, 12, 1, 'Air Canada'),
(18, 18, 1, 'Air Canada'),
(19, 18, 1, 'Air Canada'),
(20, 18, 1, 'Air Canada');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `Userid` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Phonenumber` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Passwords` varchar(300) NOT NULL
) 

--
-- Dumping data for table `user_information`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`Flightnumber`);

--
-- Indexes for table `cencellog`
--
ALTER TABLE `cencellog`
  ADD PRIMARY KEY (`Cencelid`),
  ADD KEY `Userid` (`Userid`);

--
-- Indexes for table `userticketdata`
--
ALTER TABLE `userticketdata`
  ADD PRIMARY KEY (`Ticketid`),
  ADD KEY `Userid` (`Userid`),
  ADD KEY `Flightnumber` (`Flightnumber`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cencellog`
--
ALTER TABLE `cencellog`
  MODIFY `Cencelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userticketdata`
--
ALTER TABLE `userticketdata`
  MODIFY `Ticketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cencellog`
--
ALTER TABLE `cencellog`
  ADD CONSTRAINT `cencellog_ibfk_1` FOREIGN KEY (`Userid`) REFERENCES `user_information` (`Userid`);

--
-- Constraints for table `userticketdata`
--
ALTER TABLE `userticketdata`
  ADD CONSTRAINT `userticketdata_ibfk_1` FOREIGN KEY (`Userid`) REFERENCES `user_information` (`Userid`);
COMMIT;


