-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 29 avr. 2023 à 22:17
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `food-order`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(21, 'hamza kaabi', 'hamza kb', '698d51a19d8a121ce581499d7b701668'),
(20, 'med kaabi', 'med', '202cb962ac59075b964b07152d234b70'),
(24, 'administarateur', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(23, 'administarateur', 'yassin', '202cb962ac59075b964b07152d234b70'),
(32, 'amine dhouibi', 'amine DH', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(39, 'pizza', 'Food_Category_473.jpg', 'Yes', 'Yes'),
(37, 'Burger', 'Food_Category_256.jpg', 'Yes', 'Yes'),
(40, 'salad', 'Food_Category_555.jpg', 'Yes', 'Yes'),
(42, 'fast food', 'Food_Category_892.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'salada of chicken', 'delicius', '3.00', 'Food-Name-2877.jpg', 37, 'Yes', 'Yes'),
(7, 'salade ', 'very cool', '7500.00', 'Food-Name-4607.jpg', 38, 'Yes', 'Yes'),
(15, 'salsa', 'salsa', '45.00', 'Food-Name-2804.jpg', 42, 'Yes', 'Yes'),
(8, 'fish', 'delicious', '5000.00', 'Food-Name-4361.jpg', 40, 'Yes', 'Yes'),
(11, 'test', 'test', '33.00', 'Food-Name-2112.jpg', 41, 'Yes', 'Yes'),
(12, 'pasta', 'pasta', '89.00', 'Food-Name-4477.jpg', 40, 'Yes', 'Yes'),
(13, 'test', 'test', '33.00', 'Food-Name-5446.jpg', 39, 'Yes', 'Yes'),
(14, 'ee', 'eee', '5.00', 'Food-Name-6462.jpg', 39, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, '', '0.00', 0, '0.00', '0000-00-00 00:00:00', '', 'yassin kaabi', '25733243', 'yassin@gmail.com', 'tunis,kairouan,44');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(44, 'yassine.kaabi', 'yassinkaabi14@gmail.com', '7c37be7260f8cd7c1f5e4dbdd7bc5b23', 0),
(38, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 0),
(43, 'yassin', 'yassin14kaabi@gmail.com', '1f41be88a50af4c6eae8f09c20004843', 0),
(42, 'test', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(45, 'admin', 'hamza@gmail.com', '7c37be7260f8cd7c1f5e4dbdd7bc5b23', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
