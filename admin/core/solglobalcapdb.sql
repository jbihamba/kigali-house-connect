-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 03:43 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solglobalcapdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cotisation`
--

CREATE TABLE `cotisation` (
  `cotisationID` int(255) NOT NULL,
  `membreID` int(225) NOT NULL,
  `pID` int(225) NOT NULL,
  `cID` int(225) NOT NULL,
  `montant` int(255) NOT NULL,
  `total_cumul` int(255) NOT NULL,
  `sm` int(255) NOT NULL,
  `sc` int(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `cotisation_date` date NOT NULL,
  `c_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cotisation`
--

INSERT INTO `cotisation` (`cotisationID`, `membreID`, `pID`, `cID`, `montant`, `total_cumul`, `sm`, `sc`, `commentaire`, `cotisation_date`, `c_date`) VALUES
(1, 1, 1, 0, 50, 0, 0, 0, 'la cotisation', '2019-07-12', '2019-07-12 15:09:39.000000');

-- --------------------------------------------------------

--
-- Table structure for table `livre_de_caisse`
--

CREATE TABLE `livre_de_caisse` (
  `livre_de_caisseID` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `solde_initial` int(255) NOT NULL,
  `entree` int(255) NOT NULL,
  `sortie` int(255) NOT NULL,
  `en_caisse` int(255) NOT NULL,
  `op_key` int(255) NOT NULL,
  `c_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `membreID` int(225) NOT NULL,
  `membre_fname` varchar(255) NOT NULL,
  `membre_lname` varchar(255) NOT NULL,
  `membre_email` varchar(255) NOT NULL,
  `membre_phone` int(255) NOT NULL,
  `membre_status` int(255) NOT NULL,
  `membre_sign` varchar(255) NOT NULL,
  `type` int(255) NOT NULL,
  `pin` int(11) NOT NULL DEFAULT '0',
  `password` varchar(2000) NOT NULL DEFAULT '0206330182a97c04e48749554f2d3da4a818799b',
  `profile` varchar(2000) NOT NULL DEFAULT '../../dist/img/u.png',
  `c_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`membreID`, `membre_fname`, `membre_lname`, `membre_email`, `membre_phone`, `membre_status`, `membre_sign`, `type`, `pin`, `password`, `profile`, `c_date`) VALUES
(1, 'Admin', 'Ezpk', 'admin@gmail.com', 250258527, 1, '1', 1, 1, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '../../dist/img/u.png', '2019-07-12 13:30:30.000000'),
(2, 'EZPK', '', 'ezpk@gmail.com', 0, 1, '', 0, 0, '0206330182a97c04e48749554f2d3da4a818799b', '../../dist/img/u.png', '2019-07-12 14:29:30.000000'),
(3, 'User', 'Nelson', 'user@gmail.com', 0, 1, '', 0, 1, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '../../dist/img/u.png', '2019-07-12 15:32:45.000000');

-- --------------------------------------------------------

--
-- Table structure for table `pret`
--

CREATE TABLE `pret` (
  `pretID` int(225) NOT NULL,
  `membreID` int(225) NOT NULL,
  `pID` int(225) NOT NULL,
  `cID` int(225) NOT NULL,
  `montant` int(255) NOT NULL,
  `interet` int(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_echeance` date NOT NULL,
  `sm` int(255) NOT NULL,
  `sc` int(255) NOT NULL,
  `c_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pret`
--

INSERT INTO `pret` (`pretID`, `membreID`, `pID`, `cID`, `montant`, `interet`, `commentaire`, `date_emprunt`, `date_echeance`, `sm`, `sc`, `c_date`) VALUES
(1, 1, 1, 0, 50, 0, 'le pret', '2019-07-12', '2019-07-12', 0, 0, '2019-07-12 15:14:24.000000'),
(2, 2, 1, 0, 50, 0, 'le pret', '2019-07-12', '2019-07-12', 0, 0, '2019-07-12 15:20:18.000000');

-- --------------------------------------------------------

--
-- Table structure for table `remboursement`
--

CREATE TABLE `remboursement` (
  `remboursementID` int(225) NOT NULL,
  `membreID` int(225) NOT NULL,
  `pretID` int(225) NOT NULL,
  `pID` int(225) NOT NULL,
  `cID` int(225) NOT NULL,
  `montant` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `capital_restant` int(255) NOT NULL,
  `date_remboursement` date NOT NULL,
  `c_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remboursement`
--

INSERT INTO `remboursement` (`remboursementID`, `membreID`, `pretID`, `pID`, `cID`, `montant`, `total`, `capital_restant`, `date_remboursement`, `c_date`) VALUES
(1, 1, 1, 0, 0, 50, 0, 0, '2019-07-12', '2019-07-12 15:26:51.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cotisation`
--
ALTER TABLE `cotisation`
  ADD PRIMARY KEY (`cotisationID`);

--
-- Indexes for table `livre_de_caisse`
--
ALTER TABLE `livre_de_caisse`
  ADD PRIMARY KEY (`livre_de_caisseID`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`membreID`);

--
-- Indexes for table `pret`
--
ALTER TABLE `pret`
  ADD PRIMARY KEY (`pretID`);

--
-- Indexes for table `remboursement`
--
ALTER TABLE `remboursement`
  ADD PRIMARY KEY (`remboursementID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cotisation`
--
ALTER TABLE `cotisation`
  MODIFY `cotisationID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `livre_de_caisse`
--
ALTER TABLE `livre_de_caisse`
  MODIFY `livre_de_caisseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `membreID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pret`
--
ALTER TABLE `pret`
  MODIFY `pretID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `remboursement`
--
ALTER TABLE `remboursement`
  MODIFY `remboursementID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
