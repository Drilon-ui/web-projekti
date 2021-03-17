-- phpMyAdmin SQL Dump
-- version 5.0.4
-- httpswww.phpmyadmin.net
--
-- Host 127.0.0.1
-- Generation Time Mar 17, 2021 at 0939 PM
-- Server version 10.4.17-MariaDB
-- PHP Version 8.0.1

SET SQL_MODE = NO_AUTO_VALUE_ON_ZERO;
START TRANSACTION;
SET time_zone = +0000;


!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS ;
!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION ;
!40101 SET NAMES utf8mb4 ;

--
-- Database `web-projekti`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(90) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `join_date`) VALUES
(3, 'drilon1', 'email@gmail.com', '3f75d62aa7619d46338ff090c1def3a5bdb4a1ea', '2021-03-16 095620');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=974;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ;
!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS ;
!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION ;
