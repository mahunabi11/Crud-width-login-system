-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 07:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creative`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `uname`, `email`, `cell`, `pass`, `photo`, `status`) VALUES
(17, 'Rohan Khan', 'Rohan', 'rohansia@yahoo.com', '013040400400', '$2y$10$SkgmRh0FjTXTAXM63Bqag.oWMCh9FrkBhiIvevyEgeXCUffi.JOe.', '8a19ca9c99def47b309d48bf84ce1e80.jpg', '1'),
(18, 'Jawad Khan', 'Jawad', 'jawa@yahoo.com', '01734555554', '$2y$10$p11c5HHMXsw2gvlzD8KYIefRDTbh8c/9oJYqCJn1CMUAP1KimjBCK', 'ff259f76ba29f684313978291725b304.jpg', '1'),
(19, 'Nowshin Sarkar', 'Nowshin', 'nowhin@gmail.com', '01734555553', '$2y$10$F8bfLTEMHLq9vNzjUhuA3eaDHW9D.KkqowhfJrvkq8KjsPyPkkwGi', '3abcfae506e99316964b7c1f8a3c2304.jpg', '1'),
(20, 'Janntul Ferdaus', 'Janna', 'janna@gmail.com', '017858858585', '$2y$10$7iYL9CKfS6Gpeo.9dRyFSedpRDaFT.ZNOavCStEQQfu7vc7NEaOMO', '5415ca7705280e0e4a46108ee31e0b86.jpg', '1'),
(21, 'Papia Nasrin', 'Papia', 'papia@hotmail.com', '0197577757575', '$2y$10$z63I/2ftZN28Y.e09rWvEOl1NF3rXxIvmzmTCsbGOLSnQLfP0wb/O', '76c7335ceaaf86645512d28f9b00a2da.jpg', '1'),
(22, 'Arian Mazahar', 'Arian', 'ami@coderstrust.com', '017178838383', '$2y$10$4IIn05HDdAFecf52XrIMbOwao6/lTX/xnIQYNdcnOP868y1MlxXjW', '3e40622e96a8c89f562f73155a865bdc.jpg', '1'),
(23, 'Rony Mazahar', 'Rony', 'rony@yahoo.com', '018383838555', '$2y$10$YApcRszt94fJSVQYV5vVzub3BMWRPjpYNB3pWjEnvnKFc7O7Dty9e', '530797e17ab760d4304d10c032e2d866.jpg', '1'),
(24, 'Rodela Amed', 'Rodela', 'rodela@hotmail.com', '01611132222', '$2y$10$LYi1cK7vo5rFMWLjv2Ima.jwfNNWPxi5qFHUSni4PZ6HNS.FXcmge', '84a9d7363a13c8a2dc9b9abbb65c4c29.jpg', '1'),
(25, 'Ringcon khan', 'Ringcon', 'ring@gmail.com', '01679499449', '$2y$10$KhZ1Ad7Z.Rexse2Azsuxx.zA27MvcFxUhiubiwzgTy2tV2T7mpihe', 'b63c1e72884fdec9372ae97bf6f1c4a7.jpg', '1'),
(26, 'Sazzad ahmed', 'Sazzad', 'sazzad@yahoo.com', '0156040040', '$2y$10$tvPW.5v93MrEU6PDOW4KHuW.Ea0GR0oTUzOC3TV/z4N5FIbDdU4W.', '699c9fadf1386b3d0b4a3b34bc949dfe.jpg', '1'),
(27, 'Sinthia Mazahar', 'sintia', 'sing@yahoo.com', '018959930300', '$2y$10$ayA9LfyMnIKrU2jyFYkgMelOTEXuI.gwYHUOlWlni8CyM7tFTmXHu', 'c007c1fcac32b53065cb43bfeb2da244.jpg', '1'),
(28, 'Sama Hoq', 'Sama', 'sama@coderstrust.com', '014903003033', '$2y$10$DeOIl.DjbacLm49cDXSk0.Y5oVRayXaeJJDun6Mk4egrHGHYKFHoO', '813201176d617e92416bf4d6ab676b90.jpg', '1'),
(29, 'Kakuli khatun', 'kakuli', 'kakuli@yahoo.com', '015600004004', '$2y$10$1qSdSEYoilF5P9JYKR0KeeeXH6CuOjX7IuXXodWfeUu9dGUhfoIN.', '02cf12833bb619a0e2433d79ec84bd61.jpg', '1'),
(30, 'Layla Jaman', 'Layla ', 'lay@gmail.com', '019595999559', '$2y$10$H2XuRps.cyOyTrpaRK9lXevnD0lXXzZXWPwfmfhqvmtwbM4QdCaEO', '9d2aaf5be5445b94423d96e2f8020a0b.jpg', '1'),
(31, 'Erin Rani', 'erin', 'erin@hotmail.com', '014555595959', '$2y$10$56MNjrflwyXFEYAFg.a57.NtcGAzBbUOuRDHMxbN/W/9hwxFq9S.u', 'd59095f1b092ef1af3d4937ebc141de1.jpg', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
