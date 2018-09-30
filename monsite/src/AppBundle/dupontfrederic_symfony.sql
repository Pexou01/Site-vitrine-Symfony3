-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-dupontfrederic.alwaysdata.net
-- Generation Time: Jul 10, 2018 at 11:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dupontfrederic_symfony`
--
CREATE DATABASE IF NOT EXISTS `dupontfrederic_symfony` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dupontfrederic_symfony`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jeux_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `message`, `nom`, `jeux_id`) VALUES
(1, 30, '', '', NULL),
(10, NULL, 'super jeu', 'fred', 2),
(11, NULL, 'super jeu', 'fred', 2),
(12, NULL, 'super jeu', 'coucou', 2),
(13, NULL, 'Cool', 'Super jeu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `suject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ville_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `suject`, `message`, `ville_id`) VALUES
(1, 'Dupont', 'pexou01@gmail.com', 'demande', 'coucou toi', 4),
(40, 'zaaaa', 'zaaa@gdd.fr', 'HUUUUUMMM', 'DEVELOPPEUR FULL STACK', 4),
(41, 'fredeic DUPONT', 'PEXOU01@GMAIL.COM', 'Super', 'Support', 1),
(42, 'FREDERIC DUPONT', 'PEXOU01@GMAIL.COM', 'Gg', 'Hhggy', 4),
(43, 'FREDERIC DUPONT', 'PEXOU01@GMAIL.COM', 'Coucou', 'Bonjour', 4),
(44, 'FREDERIC DUPONT', 'PEXOU01@GMAIL.COM', 'GGGGG', 'HHHHHHHHH', 2),
(45, 'DUPONt FREDERIc', 'pexou01@gmail.com', 'Super', 'Super', 1),
(46, 'fredeic DUPONT', 'marinewallois@orange.fr', 'Coucou', 'bbbbb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_telephone`
--

DROP TABLE IF EXISTS `contact_telephone`;
CREATE TABLE `contact_telephone` (
  `contact_id` int(11) NOT NULL,
  `telephone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE `jeux` (
  `id` int(11) NOT NULL,
  `nom_jeu` varchar(75) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jeux`
--

INSERT INTO `jeux` (`id`, `nom_jeu`) VALUES
(1, 'snake'),
(2, 'casse briques');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `username_id` int(11) DEFAULT NULL,
  `jeu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telephone`
--

DROP TABLE IF EXISTS `telephone`;
CREATE TABLE `telephone` (
  `id` int(11) NOT NULL,
  `telephone` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telephone_user`
--

DROP TABLE IF EXISTS `telephone_user`;
CREATE TABLE `telephone_user` (
  `telephone_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ville_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `ville_id`) VALUES
(27, 'pexou01', '$2y$10$vsUmDWjXBo1mK0m964gQYe62oqKvfrUW1WvDjFXP5ne0THguMLXBS', 'pexou01@gmail.com', NULL),
(30, 'Fredric', '$2y$10$pV8fGk9EkyK9d6HJzU02b.nrmbVcBuCh9GKZvObftE5GZ/47G2XkO', 'frederidupont95@gmail.com', NULL),
(37, 'gh', '$2y$10$McugyxX/wBcvOySFbwo8HOd/X6JyABdKaKm2u.raufBF7WDsqKXPW', 'hjk', NULL),
(38, 'popo', '$2y$10$R/U2w.thpxsD.pMpdOrpwO4jvUzJRFn/68w.SowfKCKfAmGZ8wLYW', 'pop@po', NULL),
(39, 'DUPONT', '$2y$10$p6Vxuosc11vEMccfMxzmLui48vrM2QnHKUceK7j/wkF49fH7Oelq2', 'PEXOU01@GMAIL.COM', NULL),
(40, 'fred', '$2y$10$8LBtj82mpvqyo4aNkvbH8OViZ5aJN8eulk4j1VOmK9B9aWhFkOifi', 'pexou01@gmail.com', NULL),
(41, 'Loulou', '$2y$10$M1TIZN6pc17ViBQCeSCVCezBbPp4m/IMmjBNySEc2U63RqQnn02Uq', 'PEXOU01@GMAIL.COM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `ville_nom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ville_departement` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ville_code_postal` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `ville_nom`, `ville_departement`, `ville_code_postal`) VALUES
(1, 'PONTOISE', '95', '95300'),
(2, 'CERGY', '95', '95800'),
(3, 'OSNY', '95', '95520'),
(4, 'BOURG EN  BRESSE', '01', '01000'),
(5, 'LYON', '69', '69000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5F9E962AA76ED395` (`user_id`),
  ADD KEY `IDX_5F9E962AEC2AA9D2` (`jeux_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4C62E638A73F0036` (`ville_id`);

--
-- Indexes for table `contact_telephone`
--
ALTER TABLE `contact_telephone`
  ADD PRIMARY KEY (`contact_id`,`telephone_id`),
  ADD KEY `IDX_2BFED36BE7A1254A` (`contact_id`),
  ADD KEY `IDX_2BFED36BFE649A29` (`telephone_id`);

--
-- Indexes for table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_32993751ED766068` (`username_id`),
  ADD KEY `IDX_329937518C9E392E` (`jeu_id`);

--
-- Indexes for table `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telephone_user`
--
ALTER TABLE `telephone_user`
  ADD PRIMARY KEY (`telephone_id`,`user_id`),
  ADD KEY `IDX_B062DB0AFE649A29` (`telephone_id`),
  ADD KEY `IDX_B062DB0AA76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `IDX_8D93D649A73F0036` (`ville_id`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telephone`
--
ALTER TABLE `telephone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_5F9E962AEC2AA9D2` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E638A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`);

--
-- Constraints for table `contact_telephone`
--
ALTER TABLE `contact_telephone`
  ADD CONSTRAINT `FK_2BFED36BE7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2BFED36BFE649A29` FOREIGN KEY (`telephone_id`) REFERENCES `telephone` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `FK_329937518C9E392E` FOREIGN KEY (`jeu_id`) REFERENCES `jeux` (`id`),
  ADD CONSTRAINT `FK_32993751ED766068` FOREIGN KEY (`username_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `telephone_user`
--
ALTER TABLE `telephone_user`
  ADD CONSTRAINT `FK_B062DB0AFE649A29` FOREIGN KEY (`telephone_id`) REFERENCES `telephone` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `telephone_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
