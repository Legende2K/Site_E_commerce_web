-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 15 jan. 2023 à 14:05
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `CartID` int NOT NULL AUTO_INCREMENT,
  `CustomerID` int NOT NULL,
  `ItemID` int NOT NULL,
  `Quantity` int NOT NULL,
  PRIMARY KEY (`CartID`),
  KEY `CustomerID` (`CustomerID`),
  KEY `ItemID` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int NOT NULL,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`CategoryID`, `Name`) VALUES
(1, 'Ameublement'),
(2, 'Décoration'),
(3, 'Vaiselle'),
(4, 'Rangements'),
(5, 'Casseroles, plats et poêles'),
(6, 'Electroménager'),
(7, 'Couteaux et ustensiles de cuisine'),
(8, 'Accessoires de nettoyage'),
(9, 'Café, thé et expresso');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `ItemID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `SubCategoryID` int NOT NULL,
  `Picture` text NOT NULL,
  `Price` int NOT NULL,
  `Description` varchar(500) NOT NULL,
  `BuyerID` int DEFAULT NULL,
  `StarRate` int DEFAULT NULL,
  `SellerID` int DEFAULT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `BuyerID` (`BuyerID`),
  KEY `SellerID` (`SellerID`),
  KEY `SubCategoryID` (`SubCategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`ItemID`, `Name`, `SubCategoryID`, `Picture`, `Price`, `Description`, `BuyerID`, `StarRate`, `SellerID`) VALUES
(1, 'Lot de casseroles en inox', 1, 'casseroles.jpg', 50, 'Un lot de 5 casseroles en inox neuves', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `StockID` int NOT NULL AUTO_INCREMENT,
  `ItemID` int NOT NULL,
  `Quantity` int NOT NULL,
  PRIMARY KEY (`StockID`),
  KEY `ItemID` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `SubCategoryID` int NOT NULL,
  `Name` varchar(50) NOT NULL,
  `CategoryID` int NOT NULL,
  PRIMARY KEY (`SubCategoryID`),
  KEY `CategoryID` (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `subcategory`
--

INSERT INTO `subcategory` (`SubCategoryID`, `Name`, `CategoryID`) VALUES
(1, 'Casseroles', 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `Address1` varchar(100) NOT NULL,
  `Address2` varchar(100) NOT NULL,
  `PostalCode` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Phone` int NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ItemID`);

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`BuyerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `item_ibfk_4` FOREIGN KEY (`SellerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `item_ibfk_5` FOREIGN KEY (`SubCategoryID`) REFERENCES `subcategory` (`SubCategoryID`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ItemID`);

--
-- Contraintes pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
