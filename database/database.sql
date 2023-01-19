-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 jan. 2023 à 20:24
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`CartID`, `CustomerID`, `ItemID`, `Quantity`) VALUES
(12, 3, 4, 3);

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
(3, 'Vaisselle'),
(4, 'Rangements'),
(5, 'Casseroles, plats et poêles'),
(6, 'Electroménager'),
(7, 'Couteaux et ustensiles de cuisine'),
(8, 'Accessoires de nettoyage');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `ItemID` int NOT NULL,
  `StarRate` double NOT NULL,
  `Content` text NOT NULL,
  PRIMARY KEY (`CommentID`),
  KEY `CustomerID` (`UserID`),
  KEY `ItemID` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `Price` double NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Quantity` int NOT NULL,
  `BuyerID` int DEFAULT NULL,
  `StarRate` double NOT NULL,
  `SellerID` int DEFAULT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `BuyerID` (`BuyerID`),
  KEY `SellerID` (`SellerID`),
  KEY `SubCategoryID` (`SubCategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`ItemID`, `Name`, `SubCategoryID`, `Picture`, `Price`, `Description`, `Quantity`, `BuyerID`, `StarRate`, `SellerID`) VALUES
(1, 'Lot de casseroles en inox', 1, 'casseroles.jpg', 49.9, 'Un lot de 7 casseroles en inox neuves', 15, NULL, 3.2, NULL),
(2, 'Kit de poêles en téflon', 2, 'poeles.jpg', 39.9, 'Un kit de 3 poêles en téflon neuves', 7, NULL, 3.6, NULL),
(3, 'Meuble de rangement noir', 14, 'tiroirs.png', 359.9, 'Meuble de rangement avec tiroirs. Design pixel perfect.', 1, NULL, 4.4, NULL),
(4, 'Kit ustensiles dorés ', 23, 'ustenciles_or.png', 19.9, 'Kit d\'ustensiles de cuisine en inox plaqué doré.', 27, NULL, 3.9, NULL),
(9, 'Kit ustensiles inox', 23, 'ustencils_metal.jpg', 16.99, 'Kit d\'ustensiles de cuisine en inox ', 7, NULL, 2.6, NULL),
(10, 'Kit ustensiles bois', 26, 'ustencils_bois.jpg', 21.99, 'Kit très complet d\'ustensiles de cuisine en bois', 0, NULL, 1.2, NULL),
(11, 'Kit ustensiles silicone', 25, 'ustenciles_silicone.png', 22.9, 'Kit d\'ustensiles de cuisine en silicone', 10, NULL, 5, NULL),
(12, 'Kit ustensiles inox 2', 23, 'ustensiles-cuisine-3.png', 17.9, 'Un kit d\'ustensiles plutôt pas dégueu', 2, NULL, 4.2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `Status` enum('unpaid','delivering','delivered') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'unpaid',
  `Date` date NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `UserID` (`UserID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `Status`, `Date`) VALUES
(1, 2, 'unpaid', '0000-00-00'),
(2, 3, 'unpaid', '0000-00-00');

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
(1, 'Casseroles', 5),
(2, 'Poêles', 5),
(3, 'Plats', 5),
(4, 'Table', 1),
(5, 'Chaise', 1),
(6, 'Évier', 1),
(7, 'Four', 1),
(8, 'Plantes', 2),
(9, 'Luminaires', 2),
(10, 'Décorations diverses', 2),
(11, 'Couverts', 3),
(12, 'Assiettes', 3),
(13, 'Tasses', 3),
(14, 'Tiroirs', 4),
(15, 'Étagères', 4),
(16, 'Armoires', 4),
(17, 'Paniers', 4),
(18, 'Réfrigérateur', 6),
(19, 'Lave-vaisselle', 6),
(20, 'Micro-ondes', 6),
(21, 'Grille-pain', 6),
(22, 'Couteaux', 7),
(23, 'Kits inox', 7),
(24, 'Kits acier', 7),
(25, 'Kits silicone', 7),
(26, 'Kits bois', 7),
(27, 'Kit nettoyage évier', 8),
(28, 'Kit nettoyage sol', 8),
(29, 'Kit nettoyage cuisinière', 8);

-- --------------------------------------------------------

--
-- Structure de la table `totalcart`
--

DROP TABLE IF EXISTS `totalcart`;
CREATE TABLE IF NOT EXISTS `totalcart` (
  `CartID` int NOT NULL,
  `OrderID` int NOT NULL,
  PRIMARY KEY (`CartID`,`OrderID`) USING BTREE,
  KEY `totalcart_ibfk_3` (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `totalcart`
--

INSERT INTO `totalcart` (`CartID`, `OrderID`) VALUES
(12, 2);

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
  `City` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Phone` int NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `Name`, `BirthDate`, `Address1`, `Address2`, `PostalCode`, `City`, `Country`, `Phone`, `Email`, `Password`, `admin`) VALUES
(2, 'a', 'a', '2023-01-03', 'a', '', 'a', 'a', 'a', 0, 'a@a.a', 'a', 0),
(3, 'louis', 'legendre', '2000-03-08', '1 square g', 'appart 54658', '49000', 'Angers', 'France', 707070707, 'louis@gmail.com', 'network', 1);

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
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ItemID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`BuyerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `item_ibfk_4` FOREIGN KEY (`SellerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `item_ibfk_5` FOREIGN KEY (`SubCategoryID`) REFERENCES `subcategory` (`SubCategoryID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `totalcart`
--
ALTER TABLE `totalcart`
  ADD CONSTRAINT `totalcart_ibfk_2` FOREIGN KEY (`CartID`) REFERENCES `cart` (`CartID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `totalcart_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
