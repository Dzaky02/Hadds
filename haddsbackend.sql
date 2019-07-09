-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 02:39 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haddsbackend`
--

-- --------------------------------------------------------

--
-- Table structure for table `building_floors`
--

CREATE TABLE `building_floors` (
  `id_floor` int(11) NOT NULL,
  `floor_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat_top_left` double NOT NULL,
  `lng_top_left` double NOT NULL,
  `lat_top_right` double NOT NULL,
  `lng_top_right` double NOT NULL,
  `lat_bottom_right` double NOT NULL,
  `lng_bottom_right` double NOT NULL,
  `lat_bottom_left` double NOT NULL,
  `lng_bottom_left` double NOT NULL,
  `floor_map` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_building` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `building_floors`
--

INSERT INTO `building_floors` (`id_floor`, `floor_name`, `lat_top_left`, `lng_top_left`, `lat_top_right`, `lng_top_right`, `lat_bottom_right`, `lng_bottom_right`, `lat_bottom_left`, `lng_bottom_left`, `floor_map`, `id_building`) VALUES
(1, 'Lantai Dasar', -6.97269, 107.6321, -6.97269, 107.6331, -6.97369, 107.6331, -6.97369, 107.6321, 'peta_lantai_dasar.pn', 0),
(2, 'Lantai 1', -6.97269, 107.6321, -6.97269, 107.6331, -6.97369, 107.6331, -6.97369, 107.6321, 'peta_lantai_1.png', 0),
(3, 'Lantai 2', -6.97269, 107.6321, -6.97269, 107.6331, -6.97369, 107.6331, -6.97369, 107.6321, 'peta_lantai_2.png', 0),
(4, 'Lantai 3', -6.97269, 107.6321, -6.97269, 107.6331, -6.97369, 107.6331, -6.97369, 107.6321, 'peta_lantai_3.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coordinate_point`
--

CREATE TABLE `coordinate_point` (
  `id_coordinate` int(11) NOT NULL,
  `latitude_coordinate` double NOT NULL,
  `longitude_coordinate` double NOT NULL,
  `created_date` date NOT NULL,
  `id_floor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_building`
--

CREATE TABLE `main_building` (
  `id_building` int(3) NOT NULL,
  `building_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `center_latitude` double NOT NULL,
  `center_longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_building`
--

INSERT INTO `main_building` (`id_building`, `building_name`, `center_latitude`, `center_longitude`) VALUES
(0, 'Fakultas Ilmu Terapan', -6.973212, 107.632584);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building_floors`
--
ALTER TABLE `building_floors`
  ADD PRIMARY KEY (`id_floor`),
  ADD KEY `fk_building` (`id_building`);

--
-- Indexes for table `coordinate_point`
--
ALTER TABLE `coordinate_point`
  ADD PRIMARY KEY (`id_coordinate`),
  ADD KEY `fk_floor` (`id_floor`);

--
-- Indexes for table `main_building`
--
ALTER TABLE `main_building`
  ADD PRIMARY KEY (`id_building`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building_floors`
--
ALTER TABLE `building_floors`
  MODIFY `id_floor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coordinate_point`
--
ALTER TABLE `coordinate_point`
  MODIFY `id_coordinate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `building_floors`
--
ALTER TABLE `building_floors`
  ADD CONSTRAINT `fk_building` FOREIGN KEY (`id_building`) REFERENCES `main_building` (`id_building`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coordinate_point`
--
ALTER TABLE `coordinate_point`
  ADD CONSTRAINT `fk_floor` FOREIGN KEY (`id_floor`) REFERENCES `building_floors` (`id_floor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
