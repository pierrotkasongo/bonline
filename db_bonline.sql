-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 sep. 2021 à 12:46
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_bonline`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_admin`
--


DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `postnom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nom`, `postnom`, `email`, `password`) VALUES
(1, 'jason', 'philippe', 'jason@gmail.com', 'mutombo');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat` text NOT NULL,
  `description_cat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `nom_cat`, `description_cat`) VALUES
(5, 'mmmmm', 'mmmmmmm');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_marques`
--

DROP TABLE IF EXISTS `tbl_marques`;
CREATE TABLE IF NOT EXISTS `tbl_marques` (
  `id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_marques`
--

INSERT INTO `tbl_marques` (`id_marque`, `marque`) VALUES
(2, 'mlkjhgf');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_panier`
--

DROP TABLE IF EXISTS `tbl_panier`;
CREATE TABLE IF NOT EXISTS `tbl_panier` (
  `idPanier` int(11) NOT NULL AUTO_INCREMENT,
  `sId` text NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `datePanier` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPanier`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_panier`
--

INSERT INTO `tbl_panier` (`idPanier`, `sId`, `id_produit`, `quantite`, `datePanier`) VALUES
(13, 'csu9gfhbe62irf6tjgehkvnlt8', 20, 1, '2021-09-13 11:39:26'),
(12, 'csu9gfhbe62irf6tjgehkvnlt8', 20, 1, '2021-09-13 11:38:58'),
(11, 'csu9gfhbe62irf6tjgehkvnlt8', 21, 1, '2021-09-13 11:38:53'),
(10, 'csu9gfhbe62irf6tjgehkvnlt8', 21, 1, '2021-09-13 11:34:06');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_produits`
--

DROP TABLE IF EXISTS `tbl_produits`;
CREATE TABLE IF NOT EXISTS `tbl_produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prixunitaire` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `marqueId` int(11) NOT NULL,
  `photo` text DEFAULT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_produits`
--

INSERT INTO `tbl_produits` (`id_produit`, `nom`, `description`, `prixunitaire`, `catId`, `marqueId`, `photo`) VALUES
(17, 'zerttyhj', 'cvl', '22555', 5, 2, '../public/produits/PROb8db6d2.img4.png'),
(20, 'fghjklmù', 'zertyuiopmlkjhgfdsq', '3256', 5, 2, '../public/produits/PRO4c8acd7.img3.jpg'),
(21, 'sdfghlmù', 'ertyuiop^$', '25', 5, 2, '../public/produits/PRObb763b0.img8.png'),
(22, 'zertyuiop', 'diopmlkjhgfd', '365', 5, 2, '../public/produits/PRO3203dde.img11.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
