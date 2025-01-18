-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 02:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ap_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `KodeDepartemen` char(5) NOT NULL,
  `NamaDepartemen` varchar(100) DEFAULT NULL,
  `KodeFakultas` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`KodeDepartemen`, `NamaDepartemen`, `KodeFakultas`) VALUES
('DP01', 'Hukum Perdata', 'FK01'),
('DP02', 'Hukum Pidana', 'FK01'),
('DP03', 'Sastra Inggris', 'FK02'),
('DP04', 'Sastra Indonesia', 'FK02'),
('DP05', 'Teknik Informatika', 'FK05'),
('DP06', 'MIPA', 'FK02');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `KodeDosen` char(5) NOT NULL,
  `NamaDosen` varchar(100) DEFAULT NULL,
  `TmpLahir` varchar(50) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Gender` enum('L','P') DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Kepakaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`KodeDosen`, `NamaDosen`, `TmpLahir`, `TglLahir`, `Gender`, `Alamat`, `Kepakaran`) VALUES
('D001', 'Prof. Diana Putri', 'Makassar', '1976-08-18', 'P', 'Jl. Pantai No. 80, Makassar', 'Hukum Adat'),
('D002', 'Dr. Joko Wibowo', 'Malang', '1983-12-11', 'L', 'Jl. Raya Malang No. 50, Malang', 'Sastra Inggris'),
('D003', 'Prof. Laila Fitri', 'Bali', '1979-06-25', 'P', 'Jl. Kuta No. 5, Bali', 'Basis Data'),
('D004', 'Dr. Hendra Wijaya', 'Semarang', '1984-09-04', 'L', 'Jl. Diponegoro No. 15, Semarang', 'Jaringan Komputer'),
('D005', 'Prof. Maya Sari', 'Padang', '1977-01-20', 'P', 'Jl. Pahlawan No. 25, Palembang', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `KodeFakultas` char(5) NOT NULL,
  `NamaFakultas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`KodeFakultas`, `NamaFakultas`) VALUES
('FK01', 'Fakultas Hukum'),
('FK02', 'Fakultas Ilmu Budaya'),
('FK03', 'Fakultas Pertanian'),
('FK04', 'Fakultas Psikologi'),
('FK05', 'Fakultas Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` char(10) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `TmpLahir` varchar(50) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Gender` enum('L','P') DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `NoHP` varchar(15) DEFAULT NULL,
  `KodeProdi` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `TmpLahir`, `TglLahir`, `Gender`, `Alamat`, `NoHP`, `KodeProdi`) VALUES
('M001000001', 'Dewi Lestari', 'Makassar', '2000-11-12', 'P', 'Jl. Pettarani No. 4, Makassar', '086789012345', 'PR01'),
('M001000002', 'Agus Setiawan', 'Malang', '1999-02-14', 'L', 'Jl. Ijen No. 7, Malang', '087890123456', 'PR02'),
('M001000003', 'Tina Wahyuni', 'Semarang', '2001-09-09', 'P', 'Jl. Pandanaran No. 2, Semarang', '088901234567', 'PR03'),
('M001000004', 'Fajar Pratama', 'Denpasar', '2000-07-22', 'L', 'Jl. Sunset Road No. 6, Denpasar', '089012345678', 'PR04'),
('M001000005', 'Lisa Mariana', 'Payakumbuh', '1999-01-30', 'P', 'Jl. Angkatan 45 No. 9, Palembang', '081123456789', 'PR05');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `IdMK` char(5) NOT NULL,
  `NamaMK` varchar(100) DEFAULT NULL,
  `KodeMK` char(10) DEFAULT NULL,
  `KodeSemester` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`IdMK`, `NamaMK`, `KodeMK`, `KodeSemester`) VALUES
('MK01', 'Hukum Adat', 'HA001', 'S001'),
('MK02', 'Sastra Inggris Lanjutan', 'SI001', 'S002'),
('MK03', 'Sistem Basis Data', 'BD001', 'S003'),
('MK04', 'Jaringan Komputer', 'JK001', 'S004'),
('MK05', 'Rekayasa Perangkat Lunak', 'RP001', 'S005'),
('MK06', 'Hukum Adat', 'HA001', 'S001');

-- --------------------------------------------------------

--
-- Table structure for table `memiliki`
--

CREATE TABLE `memiliki` (
  `KodeDosen` char(5) NOT NULL,
  `IdPenelitian` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memiliki`
--

INSERT INTO `memiliki` (`KodeDosen`, `IdPenelitian`) VALUES
('D001', 'P001'),
('D002', 'P002'),
('D003', 'P003'),
('D004', 'P004'),
('D005', 'P005');

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `KodeDosen` char(5) NOT NULL,
  `IdMK` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`KodeDosen`, `IdMK`) VALUES
('D001', 'MK01'),
('D002', 'MK02'),
('D003', 'MK03'),
('D004', 'MK04'),
('D005', 'MK05');

-- --------------------------------------------------------

--
-- Table structure for table `mengikuti`
--

CREATE TABLE `mengikuti` (
  `NIM` char(10) NOT NULL,
  `IdMK` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mengikuti`
--

INSERT INTO `mengikuti` (`NIM`, `IdMK`) VALUES
('M001000001', 'MK01'),
('M001000002', 'MK02'),
('M001000003', 'MK03'),
('M001000004', 'MK04'),
('M001000005', 'MK05');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `IdPenelitian` char(5) NOT NULL,
  `NamaPenelitian` varchar(100) DEFAULT NULL,
  `AreaPenelitian` varchar(100) DEFAULT NULL,
  `DurasiPenelitian` int(11) DEFAULT NULL,
  `SumberBiaya` varchar(100) DEFAULT NULL,
  `BiayaPenelitian` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`IdPenelitian`, `NamaPenelitian`, `AreaPenelitian`, `DurasiPenelitian`, `SumberBiaya`, `BiayaPenelitian`) VALUES
('P001', 'Penelitian Hukum Adat', 'Hukum', 12, 'Dana Universitas', '15000000.00'),
('P002', 'Pengembangan Sastra Inggris', 'Sastra', 10, 'Hibah', '20000000.00'),
('P003', 'Penerapan Teknologi Cloud', 'Cloud Computing', 18, 'Kerjasama Internasional', '30000000.00'),
('P004', 'Analisis Jaringan Komputer', 'Networking', 15, 'Hibah Internasional', '25000000.00'),
('P005', 'Pengembangan RPL Efisien', 'Rekayasa Perangkat Lunak', 9, 'Dana Universitas', '10000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `programstudi`
--

CREATE TABLE `programstudi` (
  `KodeProdi` char(5) NOT NULL,
  `NamaProdi` varchar(100) DEFAULT NULL,
  `KodeDepartemen` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programstudi`
--

INSERT INTO `programstudi` (`KodeProdi`, `NamaProdi`, `KodeDepartemen`) VALUES
('PR01', 'Hukum Keluarga', 'DP01'),
('PR02', 'Hukum Tata Negara', 'DP02'),
('PR03', 'Kesusastraan Inggris', 'DP03'),
('PR04', 'Kesusastraan Indonesia', 'DP04'),
('PR05', 'Rekayasa Perangkat Lunak', 'DP05'),
('PR07', 'Sastra jerman', 'DP04');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `KodeSemester` char(5) NOT NULL,
  `NamaSemester` varchar(50) DEFAULT NULL,
  `StatusSemester` enum('Aktif','Non-Aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`KodeSemester`, `NamaSemester`, `StatusSemester`) VALUES
('S001', 'Semester Ganjil 2022/2023', 'Aktif'),
('S002', 'Semester Genap 2022/2023', 'Non-Aktif'),
('S003', 'Semester Ganjil 2023/2024', 'Non-Aktif'),
('S004', 'Semester Genap 2023/2024', 'Aktif'),
('S005', 'Semester Ganjil 2024/2025', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`KodeDepartemen`),
  ADD KEY `KodeFakultas` (`KodeFakultas`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`KodeDosen`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`KodeFakultas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `KodeProdi` (`KodeProdi`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`IdMK`),
  ADD KEY `KodeSemester` (`KodeSemester`);

--
-- Indexes for table `memiliki`
--
ALTER TABLE `memiliki`
  ADD PRIMARY KEY (`KodeDosen`,`IdPenelitian`),
  ADD KEY `IdPenelitian` (`IdPenelitian`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`KodeDosen`,`IdMK`),
  ADD KEY `IdMK` (`IdMK`);

--
-- Indexes for table `mengikuti`
--
ALTER TABLE `mengikuti`
  ADD PRIMARY KEY (`NIM`,`IdMK`),
  ADD KEY `IdMK` (`IdMK`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`IdPenelitian`);

--
-- Indexes for table `programstudi`
--
ALTER TABLE `programstudi`
  ADD PRIMARY KEY (`KodeProdi`),
  ADD KEY `KodeDepartemen` (`KodeDepartemen`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`KodeSemester`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`KodeProdi`) REFERENCES `programstudi` (`KodeProdi`);

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`KodeSemester`) REFERENCES `semester` (`KodeSemester`);

--
-- Constraints for table `memiliki`
--
ALTER TABLE `memiliki`
  ADD CONSTRAINT `memiliki_ibfk_1` FOREIGN KEY (`KodeDosen`) REFERENCES `dosen` (`KodeDosen`),
  ADD CONSTRAINT `memiliki_ibfk_2` FOREIGN KEY (`IdPenelitian`) REFERENCES `penelitian` (`IdPenelitian`);

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `mengajar_ibfk_1` FOREIGN KEY (`KodeDosen`) REFERENCES `dosen` (`KodeDosen`),
  ADD CONSTRAINT `mengajar_ibfk_2` FOREIGN KEY (`IdMK`) REFERENCES `matakuliah` (`IdMK`);

--
-- Constraints for table `mengikuti`
--
ALTER TABLE `mengikuti`
  ADD CONSTRAINT `mengikuti_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `mengikuti_ibfk_2` FOREIGN KEY (`IdMK`) REFERENCES `matakuliah` (`IdMK`);

--
-- Constraints for table `programstudi`
--
ALTER TABLE `programstudi`
  ADD CONSTRAINT `programstudi_ibfk_1` FOREIGN KEY (`KodeDepartemen`) REFERENCES `departemen` (`KodeDepartemen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
