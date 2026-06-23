-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2026 at 05:24 AM
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
-- Database: `gpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user`, `action`, `details`, `timestamp`) VALUES
(1, 'Geo Admin', 'Delete', 'Deleted faculty ID: 2', '2026-06-04 13:30:39'),
(2, 'Geo Admin', 'Add', 'Added new faculty: erheh', '2026-06-04 13:30:48'),
(3, 'Geo Admin', 'Add', 'Added gallery photo: tyjy', '2026-06-04 13:31:15'),
(4, 'Geo Admin', 'Delete', 'Deleted faculty ID: 3', '2026-06-04 13:38:46'),
(5, 'Geo Admin', 'Delete', 'Deleted gallery photo ID: 1', '2026-06-04 13:39:08'),
(6, 'Geo Admin', 'Add', 'Added gallery photo: GARDENNN', '2026-06-04 13:39:41'),
(7, 'Geo Admin', 'Add', 'Added new faculty: BHIMA', '2026-06-04 13:40:58'),
(8, 'Geo Admin', 'Delete', 'Deleted message ID: 2', '2026-06-04 14:22:15'),
(9, 'Geo Admin', 'Login', 'Geo Admin logged in successfully', '2026-06-08 08:14:09'),
(10, 'Geo Admin', 'Login', 'Geo Admin logged in successfully', '2026-06-13 06:03:12'),
(11, 'Geo Admin', 'Delete', 'Deleted gallery photo ID: 2', '2026-06-13 06:03:22'),
(12, 'Geo Admin', 'Delete', 'Deleted faculty ID: 4', '2026-06-13 06:03:27'),
(13, 'Geo Admin', 'Add', 'Added new faculty: bhima', '2026-06-13 06:03:55'),
(14, 'Geo Admin', 'Logout', 'Geo Admin logged out', '2026-06-13 06:06:58'),
(15, 'Geo Admin', 'Login', 'Geo Admin logged in successfully', '2026-06-13 06:07:05'),
(16, 'Geo Admin', 'Delete', 'Deleted faculty ID: 5', '2026-06-13 06:30:18'),
(17, 'Geo Admin', 'Add', 'Added new faculty: BHIMA', '2026-06-13 06:30:58'),
(18, 'Geo Admin', 'Add', 'Added gallery photo: da', '2026-06-13 06:50:59'),
(19, 'Geo Admin', 'Delete', 'Deleted gallery photo ID: 3', '2026-06-13 06:51:20'),
(20, 'Geo Admin', 'Add', 'Added new faculty: karan', '2026-06-13 09:52:14'),
(21, 'Geo Admin', 'Add', 'Added gallery photo: NITRO', '2026-06-13 09:52:32'),
(22, 'Geo Admin', 'Add', 'Added gallery photo: campus', '2026-06-13 09:52:54'),
(23, 'Geo Admin', 'Add', 'Added new Classroom/Lab: b111', '2026-06-13 10:06:32'),
(24, 'Geo Admin', 'Add', 'Added new Classroom/Lab: c201', '2026-06-13 10:07:13'),
(25, 'Geo Admin', 'Logout', 'Geo Admin logged out', '2026-06-13 11:25:58'),
(26, 'Geo Admin', 'Login', 'Geo Admin logged in successfully', '2026-06-13 11:26:14'),
(27, 'Geo Admin', 'Delete', 'Deleted message ID: 1', '2026-06-13 13:25:19'),
(28, 'Geo Admin', 'Status Change', 'Accepted student application ID: 2', '2026-06-13 13:30:29'),
(29, 'Geo Admin', 'Status Change', 'Accepted student application ID: 1', '2026-06-13 13:30:30'),
(30, 'Geo Admin', 'Status Change', 'Rejected student application ID: 3', '2026-06-13 14:12:43'),
(31, 'Geo Admin', 'Login', 'Geo Admin logged in successfully', '2026-06-13 19:19:27'),
(32, 'Geo Admin', 'Login', 'Geo Admin logged in successfully', '2026-06-14 06:35:58'),
(33, 'Geo Admin', 'Status Change', 'Accepted student application ID: 4', '2026-06-14 06:50:40'),
(34, 'Geo Admin', 'Status Change', 'Accepted student application ID: 4', '2026-06-14 06:50:43'),
(35, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 06:52:34'),
(36, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 06:58:08'),
(37, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 06:58:13'),
(38, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 07:25:17'),
(39, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 07:28:37'),
(40, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 07:28:42'),
(41, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 07:29:52'),
(42, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 07:29:58'),
(43, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 07:30:02'),
(44, 'Geo Admin', 'Status Change', 'Accepted student application ID: 5', '2026-06-14 07:30:29'),
(45, 'Geo Admin', 'Status Change', 'Accepted student application ID: 6', '2026-06-14 07:31:10'),
(46, 'Geo Admin', 'Status Change', 'Accepted student application ID: 6', '2026-06-14 07:45:00'),
(47, 'Geo Admin', 'Status Change', 'Accepted student application ID: 7', '2026-06-14 07:46:43'),
(48, 'Geo Admin', 'Status Change', 'Accepted student application ID: 8', '2026-06-14 07:48:42'),
(49, 'Geo Admin', 'Status Change', 'Accepted student application ID: 9', '2026-06-14 07:54:42'),
(50, 'Geo Admin', 'Login', 'Geo Admin logged in successfully', '2026-06-15 12:32:09'),
(51, 'Geo Admin', 'Status Change', 'Accepted student application ID: 10', '2026-06-15 12:42:03'),
(52, 'Geo Admin', 'Status Change', 'Accepted student application ID: 11', '2026-06-15 12:50:14'),
(53, 'Geo Admin', 'Status Change', 'Accepted student application ID: 12', '2026-06-15 12:59:35'),
(54, 'Geo Admin', 'Status Change', 'Accepted student application ID: 12', '2026-06-15 13:02:41'),
(55, 'Geo Admin', 'Status Change', 'Accepted student application ID: 12', '2026-06-15 13:02:42'),
(56, 'Geo Admin', 'Status Change', 'Accepted student application ID: 12', '2026-06-15 13:02:42'),
(57, 'Geo Admin', 'Status Change', 'Accepted student application ID: 12', '2026-06-15 13:02:43'),
(58, 'Geo Admin', 'Status Change', 'Accepted student application ID: 12', '2026-06-15 13:05:17'),
(59, 'Geo Admin', 'Status Change', 'Accepted student application ID: 12', '2026-06-15 13:05:24'),
(60, 'Geo Admin', 'Status Change', 'Accepted student application ID: 13', '2026-06-15 13:09:08'),
(61, 'Geo Admin', 'Status Change', 'Accepted student application ID: 14', '2026-06-15 13:16:08'),
(62, 'Geo Admin', 'Status Change', 'Accepted student application ID: 15', '2026-06-15 13:21:32'),
(63, 'Geo Admin', 'Status Change', 'Accepted student application ID: 16', '2026-06-15 13:24:22'),
(64, 'Geo Admin', 'Status Change', 'Accepted student application ID: 16', '2026-06-15 13:24:44'),
(65, 'Geo Admin', 'Status Change', 'Rejected student application ID: 17', '2026-06-15 13:28:12'),
(66, 'Geo Admin', 'Login', 'Geo Admin logged in successfully', '2026-06-20 11:08:54'),
(67, 'Geo Admin', 'Status Change', 'Accepted student application ID: 18', '2026-06-20 11:17:08'),
(68, 'Geo Admin', 'Login', 'Geo Admin logged in successfully', '2026-06-22 17:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  `document_path` varchar(255) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Accepted','Rejected') NOT NULL DEFAULT 'Pending',
  `fee_status` enum('Unpaid','Paid') NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `full_name`, `email`, `phone`, `course`, `document_path`, `submitted_at`, `status`, `fee_status`) VALUES
(1, 'Bhimaodedara', 'bhimaodedara909@gmail.com', '6354392443', 'Computer Engineering', 'uploads/app_6a2d5b00bef09.png', '2026-06-13 13:28:32', 'Accepted', 'Paid'),
(3, 'karan', 'bhimaodedara099@gmail.com', '9834567890', 'Computer Engineering', 'uploads/app_6a2d65394047f.png', '2026-06-13 14:12:09', 'Rejected', 'Unpaid'),
(17, 'bharti', 'bhimaodedara077@gmail.com', '6435363423', 'Computer Engineering', 'uploads/app_6a2ffde605a97.png', '2026-06-15 13:28:06', 'Rejected', 'Unpaid'),
(18, 'karan ratiya', 'bhimaodedara707@gmail.com', '9292128128', 'Computer Engineering', 'uploads/app_6a36769f6079b.png', '2026-06-20 11:16:47', 'Accepted', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `facilities` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `room_no`, `capacity`, `facilities`, `img_path`, `created_at`) VALUES
(1, 'b111', 100, 'projector', 'uploads/classroom_6a2d2ba8a69c3.jpg', '2026-06-13 10:06:32'),
(2, 'c201', 100, 'PC\'s', 'uploads/classroom_6a2d2bd17b000.png', '2026-06-13 10:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `qual` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `role`, `qual`, `img`) VALUES
(6, 'BHIMA', 'CREATOR', 'GOD', 'uploads/faculty_6a2cf92217733.jpg'),
(7, 'karan', 'co creator', 'also god', 'uploads/faculty_6a2d284eac0e3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `category`, `description`, `img_path`) VALUES
(4, 'NITRO', 'academic', 'abc', 'uploads/gallery_6a2d2860e77c5.jpg'),
(5, 'campus', 'campus-life', 'campus', 'uploads/gallery_6a2d2876ae9e0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
