-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2025 at 06:39 PM
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
-- Database: `dev-sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` varchar(5) NOT NULL,
  `category` varchar(20) NOT NULL,
  `leader` varchar(30) NOT NULL,
  `work_flow` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`, `leader`, `work_flow`) VALUES
('A17', 'Sockliner', 'Muannas Salim', ''),
('A26', 'Laminating', 'Ngarso', ''),
('B53', 'No Sew', 'Juliah', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(5) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `address` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `customer`, `address`) VALUES
('IA', 'PT. Adis Dimension Footwear', 'Jalan Raya Serang Km. 24, Balaraja, Tangerang, Banten'),
('JV', 'PT. Ching Luh Victory', 'Jl. Raya Serang No.KM. 16, Talaga, Kec. Cikupa, Kabupaten Tangerang, B'),
('UMK', 'PT. Unimitra Kharisma', 'Jl. Raya Jonggol - Cileungsi No.KM. 17, Cileungsi, Kec. Cileungsi, Kab');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id_document` varchar(10) NOT NULL,
  `id_project` varchar(20) NOT NULL,
  `document` varchar(50) NOT NULL,
  `format` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id_document`, `id_project`, `document`, `format`, `type`) VALUES
('A0001', 'P-IAA260001', 'PFC Laminating - Challange Pro - Foxing', 'PDF', 'PFC Laminating'),
('F0001', 'P-IAA170004', 'PO - Giannis Immortality 4', 'PDF', 'PO');

-- --------------------------------------------------------

--
-- Table structure for table `operate`
--

CREATE TABLE `operate` (
  `id_operate` varchar(20) NOT NULL,
  `id_product` varchar(20) NOT NULL,
  `id_step` varchar(20) NOT NULL,
  `nik_user` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `note` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operate`
--

INSERT INTO `operate` (`id_operate`, `id_product`, `id_step`, `nik_user`, `type`, `note`, `created_at`) VALUES
('P-IAA170004-401-01', 'P-IAA170004-401', 'P-IAA170004-601', '8000867', 'Progress', 'Tidak Ada Concern', '2025-07-15 00:28:09'),
('P-IAA260001-401-01', 'P-IAA260001-401', 'P-IAA260001-601', '8000567', 'Progress', 'Tidak Ada Concern', '2025-07-15 00:28:09'),
('P-IAA260001-401-02', 'P-IAA260001-401', 'P-IAA260001-602', '8000867', 'Concern', 'Terdapat Kesalahan pada Tracking data', '2025-07-15 00:28:09'),
('P-IAA260001-402-01', 'P-IAA260001-402', 'P-IAA260001-601', '8000867', 'Progress', 'Tidak Ada Concern', '2025-07-15 00:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` varchar(20) NOT NULL,
  `id_project` varchar(20) NOT NULL,
  `model` varchar(30) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `stage` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `completion_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_project`, `model`, `spesifikasi`, `stage`, `qty`, `uom`, `completion_date`) VALUES
('P-IAA170004-401', 'P-IAA170004', 'Giannis Immortality 4', 'Micro Hood Black - Eva 4mm - No Logo', 'Development', 10, 'Pairs', '2025-07-14 19:19:14'),
('P-IAA260001-401', 'P-IAA260001', 'Challange Pro', 'Vamp - Micro Hood + Firm Foam 4mm + Tricot - 44\"', 'Development', 10, 'Meter', '2025-07-14 19:19:14'),
('P-IAA260001-402', 'P-IAA260001', 'Jordan Stadium', 'Reinforce - Finn Knit + Firm Foam 4mm + Tricot - 44\"', 'Development', 5, 'Meter', '2025-07-14 19:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` varchar(20) NOT NULL,
  `id_category` varchar(5) NOT NULL,
  `id_customer` varchar(5) NOT NULL,
  `project` varchar(50) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `due_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `id_category`, `id_customer`, `project`, `start_date`, `due_date`, `status`, `progress`) VALUES
('P-IAA170004', 'A17', 'IA', 'GGP SP26 Sockliner', '2025-07-15 11:11:28', '2025-07-17 19:11:28', 'Delay', 45),
('P-IAA260001', 'A26', 'IA', 'Trial Laminating HO26 Challange Pro', '2025-07-15 09:11:28', '2025-07-14 19:11:28', 'On Track', 70);

-- --------------------------------------------------------

--
-- Table structure for table `step`
--

CREATE TABLE `step` (
  `id_step` varchar(20) NOT NULL,
  `id_project` varchar(20) NOT NULL,
  `nik_user` varchar(10) NOT NULL,
  `step` varchar(30) NOT NULL,
  `area` varchar(20) NOT NULL,
  `plan_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `step`
--

INSERT INTO `step` (`id_step`, `id_project`, `nik_user`, `step`, `area`, `plan_date`) VALUES
('P-IAA170004-601', 'P-IAA170004', '8000567', 'Email Request', 'Development', '2025-07-17 23:19:05'),
('P-IAA170004-602', 'P-IAA170004', '8000567', 'Tracking Data', 'Development', '2025-07-17 23:19:05'),
('P-IAA260001-601', 'P-IAA260001', '8000567', 'Email Request', 'PCC Adis', '2025-07-17 23:19:05'),
('P-IAA260001-602', 'P-IAA260001', '8000567', 'Tracking Data', 'Development', '2025-07-17 23:19:05'),
('P-IAA260001-603', 'P-IAA260001', '8000567', 'Ambil Matrial', 'Warehouse', '2025-07-17 23:19:05'),
('P-IAA260001-604', 'P-IAA260001', '8000567', 'Tracking Matrial', 'Development', '2025-07-17 23:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nik` varchar(10) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `call_name` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nik`, `full_name`, `call_name`, `username`, `password`, `role`) VALUES
('8000011', 'Kasmiran', 'Kasmiran', 'kasmiran', '$2b$10$kj3jx4h23oi4h2343ee', 'Team Member'),
('8000388', 'Tajul Tabrizi', 'Tajul', 'tajul_tabrizi', '$2b$10$d3pCJsyZxFDYblk3h42l3jk', 'Team Member'),
('8000412', 'Zakaria Al-Amsori', 'Zakaria', 'zakaria_al_amsori', '$2b$10$324h3c483n9238', 'Team Member'),
('8000567', 'Reza Eka Erlangga', 'Reza', 'reza_eka', '$2b$10$6Q7I3f/yS8AzZ5bTnFLw9u', 'Administrator'),
('8000867', 'A. Evan Sopian', 'Evan', 'evan_sopian', '$2b$10$d3pCJsyZxFDYbzy4Qq6N4', 'Team Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `document_project` (`id_project`);

--
-- Indexes for table `operate`
--
ALTER TABLE `operate`
  ADD PRIMARY KEY (`id_operate`),
  ADD KEY `operate_product` (`id_product`),
  ADD KEY `operate_step` (`id_step`),
  ADD KEY `operate_user` (`nik_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_project` (`id_project`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `project_category` (`id_category`),
  ADD KEY `project_customer` (`id_customer`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`id_step`),
  ADD KEY `step_project` (`id_project`),
  ADD KEY `step_user` (`nik_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operate`
--
ALTER TABLE `operate`
  ADD CONSTRAINT `operate_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operate_step` FOREIGN KEY (`id_step`) REFERENCES `step` (`id_step`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operate_user` FOREIGN KEY (`nik_user`) REFERENCES `user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `step_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `step_user` FOREIGN KEY (`nik_user`) REFERENCES `user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
