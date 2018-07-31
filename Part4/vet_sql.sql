-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 02:33 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet.sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `name`, `address`, `phone`, `email`, `password`) VALUES
(1234482, 'Darren Naish', '245 Greety Dr', '682-262-2455', 'darren.naish@gmail.com', '$2y$12$Af8dWU6AX2K8PPzB1hWS2uwN9xvQyz//cJGwxJLB5OM.m9/8uOLUm'),
(1234483, 'Lara Holtz', 'kindersley dr', '682-262-9090', 'lara.holtz@gmail.com', '$2y$12$VyKOPYjZ47DSPuRfpeIydeXLcxJI/FrXjGFzZVR7wu0MWBQD1BxN6'),
(1234484, 'sam priddy', '1516 simon street', '682-678-1516', 'sam.priddy@gmail.com', '$2y$12$GwM1LBQJW2O5b/cZRj/d2.WQHN3i3M3DzlgQ//fudD3MbrQBG/gYe'),
(1234485, 'a', 'aa', '682-262-1111', 'nj.hbidsh@gmail.com', '$2y$12$T1wLuCv9jUHnA2YHaC7KCeVb6VIGwzdhoDFQzuJEGpygP/NQvnwVG'),
(1234486, 'abbb', '1516 simon street', '682-262-1122', 'bhbh.koko@gmail.com', '$2y$12$MbSipbTpZatc1.H6BT/iSOxws5PG4y967NVIfAOflv3VcqN/hRHEu');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `comments`) VALUES
('sarah powell', 'sarah.powell@gmail.com', 'what are your working hours?'),
('amy oliver', 'amy.oliver@gmail.com', 'How to cancel an appointment?'),
('priddy p', 'priddy.pp@gmail.com', 'How to contact hospital in case of emergency?'),
('jo ryan', 'jo.ryan@gmail.com', 'Is it okay if my dog eats peanuts?');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petid` int(10) NOT NULL,
  `petname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petid`, `petname`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Pig'),
(4, 'Rabbit');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionid` int(10) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionid`, `question`, `answer`) VALUES
(1, 'What are the hours of operation?', 'The hospital is open to receive clients from 8 am to 5 pm M-F, and on Saturday from 8 a.m. to 1 p.m. for discharges only.Few services are available for Saturday appointments. Please call for more information.'),
(2, 'Is the Hospital open 24 hours a day for emergencies?', 'Yes,the Hospital is open for emergencies 24 hours a day. Afterhours calls are answered by an onsite emergency clinician or ICU technician. In addition, we provide 24/7 care to hospitalized patients.'),
(3, 'Do I need to do anything before my appointment?', 'If applicable, please have your pets veterinarian fax any/all records pertaining to the reason (diagnosis) for your appointment. We will also need a copy of your pets current vaccine records.'),
(4, 'How do I receive a copy of my pets medical record?', 'You may contact the Medical Records Department to request copies of your pets medical record.Medical Records staff will indicate the charges for processing photo copies and they will fax and/or mail a Release of Information consent form to you to be completed prior to processing your request.');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceid` int(10) NOT NULL,
  `servicename` varchar(25) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `servicename`, `description`) VALUES
(1, 'Medical Service', 'We offer state-ot-the-art equipment and technology.'),
(2, 'Surgical Services', 'Full range of surgical procedures including orthopedics and emergency sugerries.'),
(3, 'Dental Care', 'A dental exam can determine whether your pet needs preventive dental care such as scaling and polishing.'),
(4, 'House Calls', 'The elderly,physcically challanged, and multiple pet households often find our in-home veterinary service helpful and convenient.'),
(5, 'Emergencies', 'At least one of our doctors is on call every day and night.');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `clientid` int(10) NOT NULL,
  `serviceid` int(10) NOT NULL,
  `petid` int(10) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`clientid`, `serviceid`, `petid`, `date`) VALUES
(1234481, 4, 3, '2017-11-20'),
(1234482, 1, 1, '2017-11-20'),
(1234483, 5, 1, '2017-11-20'),
(1234484, 3, 4, '2017-11-20'),
(1234483, 1, 3, '2017-11-20'),
(1234486, 2, 2, '2017-11-21'),
(1234484, 2, 3, '2017-11-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD KEY `clientid` (`clientid`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234487;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
