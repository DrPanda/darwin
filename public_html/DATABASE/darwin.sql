-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Dim 30 Novembre 2014 à 23:27
-- Version du serveur: 5.5.35
-- Version de PHP: 5.5.11-2+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `darwin`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

CREATE TABLE IF NOT EXISTS `exercices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8213 ;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`id`, `session_id`, `picture`, `first_name`, `last_name`, `comment`, `comment_user`) VALUES
(3491, 1, '', 'Tywin', 'Lannister', '', ''),
(4606, 1, '', 'Daario', 'Naharis', '', ''),
(5547, 1, '', 'Roose', 'Bolton', '', ''),
(6988, 1, '', 'Tommen', 'Baratheon', '', ''),
(7146, 1, '', 'Joffrey', 'Lannister', '', ''),
(7727, 1, '', 'Oberyn', 'Martell', '', ''),
(7813, 1, '', 'Robb', 'Stark', '', ''),
(7820, 1, '', 'Jaime', 'Lannister', '', ''),
(7962, 1, '', 'Sandor', 'Clegane', '', ''),
(7970, 1, '', 'Gregor', 'Clegane', '', ''),
(8013, 1, '', 'Eddard', 'Stark', '', ''),
(8026, 1, '', 'Jorah', 'Mormont', '', ''),
(8045, 1, '', 'Daenerys', 'Targaryen', '', ''),
(8066, 1, '', 'Robert', 'Baratheon', '', ''),
(8073, 1, '', 'Ramsay', 'Bolton', '', ''),
(8102, 1, '', 'Bran', 'Stark', '', ''),
(8118, 1, '', 'Tyrion', 'Lannister', '', ''),
(8124, 1, '', 'Renly', 'Baratheon', '', ''),
(8130, 1, '', 'Loras', 'Tyrell', '', ''),
(8133, 1, '', 'Stannis', 'Lannister', '', ''),
(8164, 1, '', 'Petyr', 'Baelish', '', ''),
(8175, 1, '', 'Theon', 'Greyjoy', '', ''),
(8212, 1, '', 'Arya', 'Stark', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `student_exercice`
--

CREATE TABLE IF NOT EXISTS `student_exercice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `exercice_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `exercice_id` (`exercice_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `unit_sessions`
--

CREATE TABLE IF NOT EXISTS `unit_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `unit_sessions`
--

INSERT INTO `unit_sessions` (`id`, `date_time`, `name`) VALUES
(1, '2014-11-30 22:51:00', 'toto');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_active`, `role`) VALUES
(2, 'anais', '7a913c1f7b1adc3e108ba1f3caf4ad6923d5c0b5', 1, 'admin'),
(3, 'will', '459b05ed881cecd0e1ee802097eafbec74ed1bb3', 1, 'admin'),
(18, 'panda', '5c0e40005d6679393325becac839cacc4d9ed6cb', 1, 'admin'),
(19, 'antoine', '95c44dee1bc461d10e973cb41e6f2c7f866ca58b', 1, 'admin');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `unit_sessions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `student_exercice`
--
ALTER TABLE `student_exercice`
  ADD CONSTRAINT `student_exercice_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_exercice_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_exercice_ibfk_2` FOREIGN KEY (`exercice_id`) REFERENCES `exercices` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
