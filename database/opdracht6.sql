-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 10 Oca 2023, 20:32:21
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `opdracht6`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auto`
--

DROP TABLE IF EXISTS `auto`;
CREATE TABLE IF NOT EXISTS `auto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Kenteken` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Type` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `InstructeurId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Auto_InstructeurId_Instructeur_Id` (`InstructeurId`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `auto`
--

INSERT INTO `auto` (`Id`, `Kenteken`, `Type`, `InstructeurId`) VALUES
(1, 'AU-67-IO', 'Golf', 3),
(2, 'TH-78-KL', 'Ferrari', 2),
(3, '90-KL-TR', 'Fiat 500', 4),
(4, 'YY-OP-78', 'Mercedes', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `autoo`
--

DROP TABLE IF EXISTS `autoo`;
CREATE TABLE IF NOT EXISTS `autoo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Kenteken` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `Type` varchar(25) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `autoo`
--

INSERT INTO `autoo` (`Id`, `Kenteken`, `Type`) VALUES
(1, 'AU-67-IO', 'Golf'),
(2, 'TH-78-KL', 'Ferrari'),
(3, '90-KL-TR', 'Fiat 500'),
(4, 'YY-OP-78', 'Mercedes');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `instructeur`
--

DROP TABLE IF EXISTS `instructeur`;
CREATE TABLE IF NOT EXISTS `instructeur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `instructeur`
--

INSERT INTO `instructeur` (`Id`, `Naam`, `Email`) VALUES
(1, 'Groen', 'groen@gmail.com'),
(2, 'Manhoi', 'manhoi@gmail.com'),
(3, 'Zoyi', 'zoyi@gmail.com\r\n'),
(4, 'Berthold', 'berthold@gmail.com'),
(5, 'Denekamp', 'denekamp@gmail.com\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `instructeurr`
--

DROP TABLE IF EXISTS `instructeurr`;
CREATE TABLE IF NOT EXISTS `instructeurr` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Naam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `instructeurr`
--

INSERT INTO `instructeurr` (`Id`, `Email`, `Naam`) VALUES
(1, 'groen@mail.nl', 'Groen'),
(2, 'konijn@google.com', 'Konijn'),
(3, 'frasi@google.sp', 'Frasi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kilometerstand`
--

DROP TABLE IF EXISTS `kilometerstand`;
CREATE TABLE IF NOT EXISTS `kilometerstand` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AutoId` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `KmStand` int(5) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_kilometerstand_AutoId_auto_Id` (`AutoId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `kilometerstand`
--

INSERT INTO `kilometerstand` (`Id`, `AutoId`, `Datum`, `KmStand`) VALUES
(1, 4, '2022-12-05', 70788),
(2, 2, '2022-12-05', 12670),
(3, 1, '2022-12-06', 60345),
(4, 3, '2022-12-07', 21300),
(5, 1, '2022-12-07', 60900);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `leerling`
--

INSERT INTO `leerling` (`Id`, `Naam`) VALUES
(3, 'Konijn'),
(4, 'Slavink'),
(6, 'Otto');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `les`
--

DROP TABLE IF EXISTS `les`;
CREATE TABLE IF NOT EXISTS `les` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Datum` date NOT NULL,
  `LeerlingId` int(3) NOT NULL,
  `InstructeurId` int(3) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_les_InstructeurId_Instructeur_Id` (`InstructeurId`),
  KEY `FK_les_LeerlingId_Leerling_Id` (`LeerlingId`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `les`
--

INSERT INTO `les` (`Id`, `Datum`, `LeerlingId`, `InstructeurId`) VALUES
(45, '2022-05-20', 3, 1),
(46, '2022-05-20', 6, 3),
(47, '2022-05-21', 4, 2),
(48, '2022-05-21', 6, 3),
(49, '2022-05-22', 3, 1),
(50, '2022-05-28', 4, 2),
(51, '2022-06-01', 3, 2),
(52, '2022-06-12', 3, 1),
(53, '2022-06-22', 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mankement`
--

DROP TABLE IF EXISTS `mankement`;
CREATE TABLE IF NOT EXISTS `mankement` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AutoId` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Mankement` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Mankement_AutoId_Auto_Id` (`AutoId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `mankement`
--

INSERT INTO `mankement` (`Id`, `AutoId`, `Datum`, `Mankement`) VALUES
(1, 4, '2023-01-04', 'Profiel rechterband minder dan 2 mm'),
(2, 2, '2023-01-02', 'Rechter achterlicht kapot'),
(3, 1, '2023-01-02', 'Spiegel links afgebroken'),
(4, 2, '2023-01-06', 'Bumper rechtsachter ingedeukt'),
(5, 2, '2023-01-08', 'Radio kapot'),
(6, 2, '2023-01-09', 'merhababa'),
(7, 2, '2023-01-09', 'ssdfds');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `onderwerp`
--

DROP TABLE IF EXISTS `onderwerp`;
CREATE TABLE IF NOT EXISTS `onderwerp` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `LesId` int(3) NOT NULL,
  `Onderwerp` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_onderwerp_LesId _Les_Id` (`LesId`)
) ENGINE=InnoDB AUTO_INCREMENT=2368 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `onderwerp`
--

INSERT INTO `onderwerp` (`Id`, `LesId`, `Onderwerp`) VALUES
(2343, 45, 'File parkeren'),
(2344, 46, 'Achteruit rijden'),
(2345, 49, 'File parkeren'),
(2346, 49, 'Invoegen snelweg'),
(2347, 50, 'Achteruit rijden'),
(2348, 52, 'Achteruit rijden'),
(2349, 52, 'Invoegen snelweg'),
(2350, 52, 'File parkeren'),
(2354, 50, 'test'),
(2355, 50, 'retet'),
(2356, 51, 'A'),
(2357, 51, 'aaa'),
(2358, 51, 'a'),
(2359, 51, 'p'),
(2360, 51, ''),
(2361, 51, ''),
(2362, 51, ''),
(2363, 51, ''),
(2364, 51, ''),
(2365, 51, ''),
(2367, 51, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `opmerking`
--

DROP TABLE IF EXISTS `opmerking`;
CREATE TABLE IF NOT EXISTS `opmerking` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `LesId` int(3) NOT NULL,
  `Opmerking` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_les_LesId _les_Id` (`LesId`)
) ENGINE=InnoDB AUTO_INCREMENT=1130 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `opmerking`
--

INSERT INTO `opmerking` (`Id`, `LesId`, `Opmerking`) VALUES
(1123, 45, 'File parkeren kan beter'),
(1124, 46, 'Beter in spiegel kijken'),
(1125, 49, 'Opletten op aankomend verkeer'),
(1126, 49, 'Langer doorrijden bij invoegen'),
(1127, 50, 'Langzaam aan'),
(1128, 52, 'Beter in spiegels kijken'),
(1129, 52, 'richtingaanwijzer aan');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `les`
--
ALTER TABLE `les`
  ADD CONSTRAINT `FK_les_InstructeurId_Instructeur_Id` FOREIGN KEY (`InstructeurId`) REFERENCES `instructeurr` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_les_LeerlingId_Leerling_Id` FOREIGN KEY (`LeerlingId`) REFERENCES `leerling` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `onderwerp`
--
ALTER TABLE `onderwerp`
  ADD CONSTRAINT `FK_onderwerp_LesId _Les_Id` FOREIGN KEY (`LesId`) REFERENCES `les` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `opmerking`
--
ALTER TABLE `opmerking`
  ADD CONSTRAINT `FK_les_LesId _les_Id` FOREIGN KEY (`LesId`) REFERENCES `les` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
