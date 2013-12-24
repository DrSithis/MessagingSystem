-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 24 Décembre 2013 à 21:33
-- Version du serveur: 5.5.34
-- Version de PHP: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `chat`
--
CREATE DATABASE `chat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chat`;

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE IF NOT EXISTS `minichat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `pseudo` int(11) NOT NULL,
  `content` text NOT NULL,
  `pseudoreceiver` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pseudo` (`pseudo`),
  KEY `pseudoreceiver` (`pseudoreceiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `minichat`
--

INSERT INTO `minichat` (`id`, `time`, `pseudo`, `content`, `pseudoreceiver`) VALUES
(6, 1387912048, 16, 'bonjour', 1),
(12, 1387915535, 16, 'test', 17),
(13, 1387916088, 16, 'hi', 1),
(14, 1387916396, 16, 'avec test', 17);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speudo` text NOT NULL,
  `password` text NOT NULL,
  `sid` int(11) NOT NULL,
  `connect` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `speudo`, `password`, `sid`, `connect`) VALUES
(1, 'solo', 'admin', 481526, 0),
(16, 'root', '1578155ca0c3e67949de6ee5a5815082', 90373, 1),
(17, 'test', '098f6bcd4621d373cade4e832627b4f6', 340656, 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD CONSTRAINT `minichat_ibfk_2` FOREIGN KEY (`pseudoreceiver`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `minichat_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
