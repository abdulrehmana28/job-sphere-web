-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 09:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsphere_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `apply_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `age` varchar(2) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(60) NOT NULL,
  `education` varchar(250) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `job_title` varchar(55) NOT NULL,
  `job_salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`apply_id`, `name`, `email`, `age`, `phone`, `address`, `education`, `company_name`, `job_title`, `job_salary`) VALUES
(3, 'david james', 'davidjames@email.com', '35', '92-222-1234', 'paleto bay area street no. 3', 'Bachelor in Data Science from Paleto Bay Institute of Technology', 'Google', 'Senior Data Engineer', '105k');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `source` enum('search_engine','friend','social_media','other') NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`contact_id`, `name`, `email`, `phone`, `source`, `message`) VALUES
(1, 'admin', 'admin@email.com', '92-321-1234', 'social_media', 'hello job sphere'),
(2, 'testing123', 'test123@test.com', '92-123-1234', 'search_engine', 'hi want some information about jobsphere');

-- --------------------------------------------------------

--
-- Table structure for table `joblistings`
--

CREATE TABLE `joblistings` (
  `job_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `job_level` varchar(30) NOT NULL,
  `job_type` varchar(30) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `job_description` varchar(100) NOT NULL,
  `job_salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `joblistings`
--

INSERT INTO `joblistings` (`job_id`, `company_name`, `job_level`, `job_type`, `job_title`, `job_description`, `job_salary`) VALUES
(1, 'Meta', 'Entry Level', 'Full-Time', 'Junior Product Designer', 'We are seeking a passionate Junior Product Designer to join our dynamic team.', '85k'),
(2, 'Amazon', 'Expert Level', 'Full-Time', 'AI Solutions Architect', 'As an AI Solutions Architect, you will lead the design and implementation of cloud solutions.', '190k'),
(3, 'Google', 'Expert Level', 'Full-Time', 'Senior Data Engineer', 'We are looking for a skilled Senior Data Engineer to join and lead our team.', '105k'),
(4, 'Meta', 'Mid level', 'Full Time', 'Frontend Software Engineer', 'We are seeking a passionate Frontend Development to join our   dynamic team.', '185k'),
(5, 'Databricks', 'Expert Level', 'Full-Time', 'Senior Data Engineer', 'we want a Expert Data Engineer to join our team.', '115k');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` enum('job_seeker','employer','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `password`, `usertype`) VALUES
(2, 'Abd', 'abd@email.com', '$2y$10$o1891Z0KBnqVfyByPXWSLO/0GGP6xTkuwb94HoiK9ro1m7eQWuSIa', 'job_seeker'),
(3, 'test2', 'test2@email.com', '$2y$10$ZwkZEVyIC5mY8.O6DBt6FuNojTesTMJZUfvWHbHv9HIW5R1RQjamy', 'job_seeker'),
(4, 'abdul', 'abdul@a28.com', '$2y$10$n03l8.7.ulmdfCFMlbl0r.KPwQEyu20g/o00AkLGsLZGIM.1W9kH6', 'job_seeker'),
(6, 'david', 'david@test.com', '$2y$10$aP9ae9cRR23zuly3W4NSPeEAxfzXJcJlrKnx9nVcg4h57ZN6Vlij6', 'job_seeker'),
(9, 'Ali', 'hr@company.com', '$2y$10$UOhwcIBy5xTV6hgs.uMii.mEOKbJxKpLBQLHTjdpT5EQIzkqxGgvm', 'employer'),
(10, 'admin', 'admin@jobsphere.com', '$2y$10$z6JC9tIwIMjb0QY9wNeRc.hvz3JWO3ts7Nm4ZjmNJTk3cW88Wfsbm', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `joblistings`
--
ALTER TABLE `joblistings`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `joblistings`
--
ALTER TABLE `joblistings`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
