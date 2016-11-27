-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 27 Novembre 2016 à 14:07
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ce`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `coordonnee`
--

CREATE TABLE IF NOT EXISTS `coordonnee` (
  `id_coordonnee` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  PRIMARY KEY (`id_coordonnee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `coordonnee`
--

INSERT INTO `coordonnee` (`id_coordonnee`, `latitude`, `longitude`) VALUES
(3, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_evenement` varchar(255) NOT NULL,
  `description_evenement` text NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_coordonnee` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `id_ville` (`id_ville`),
  KEY `id_coordonnee` (`id_coordonnee`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_evenement`, `description_evenement`, `date_debut`, `date_fin`, `id_type`, `id_coordonnee`, `id_ville`) VALUES
(1, 'Vaux Le Vicomte - Fete de Noel', 'Découvrir Vaux-le-Vicomte à Noël est la promesse d’une parenthèse enchantée hors du temps, dans un château merveilleux racontant les contes de votre enfance. Une foret féerique dans le Grand Salon, des feux de cheminées crépitants, des illuminations dans les jardins et un vrai Saint Nicolas compléteront cette journée parfaite !', '2016-12-02 19:00:00', '2016-12-04 21:00:00', 5, 3, 2),
(3, '35e Marche de Noel des artisans alsaciens a la Gare de l''Est', 'Du 1er au 16 Decembre 2016, le Marche de Noel Alsacien de la Gare de l’Est installe un petit morceau d’Alsace sur le parvis de la gare !\n\nPour cette nouvelle édition, les artisans du marché invitent à la découverte des traditions gourmandes des Noëls Alsaciens… ', '2016-12-01 09:00:00', '2016-12-16 19:00:00', 4, 3, 5),
(4, 'Concert Music ', 'Concert Music POP', '2016-12-02 16:00:00', '2016-12-02 23:00:00', 5, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `gare`
--

CREATE TABLE IF NOT EXISTS `gare` (
  `id_gare` int(11) NOT NULL AUTO_INCREMENT,
  `id_ville` int(11) NOT NULL,
  `id_trajet` int(11) NOT NULL,
  `nom_gare` varchar(255) NOT NULL,
  PRIMARY KEY (`id_gare`),
  KEY `id_ville` (`id_ville`),
  KEY `id_trajet` (`id_trajet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `gare`
--

INSERT INTO `gare` (`id_gare`, `id_ville`, `id_trajet`, `nom_gare`) VALUES
(5, 2, 1, 'Gare FONTAINEBLEAU - AVON'),
(6, 3, 1, 'Gare MONTBARD'),
(7, 3, 1, 'GARE MONTBARD'),
(8, 4, 1, 'GARE CHAMPIGNY SUR YONNE'),
(9, 5, 1, 'GARE CHAMPAGNE SUR SEINE'),
(10, 5, 1, 'PARIS BERCY'),
(11, 5, 1, 'PARIS GARE DE LYON'),
(12, 6, 1, 'GARE DIJON VILLE');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` text NOT NULL,
  `id_evenement` int(11) NOT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `id_evenement` (`id_evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `point_interet`
--

CREATE TABLE IF NOT EXISTS `point_interet` (
  `id_point` int(11) NOT NULL AUTO_INCREMENT,
  `nom_point` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_coordonnee` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  PRIMARY KEY (`id_point`),
  KEY `id_type` (`id_type`),
  KEY `id_coordonnee` (`id_coordonnee`),
  KEY `id_ville` (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `point_interet`
--

INSERT INTO `point_interet` (`id_point`, `nom_point`, `description`, `id_type`, `id_coordonnee`, `id_ville`) VALUES
(16, 'Musée Buffon de Montbard', 'Aménagé par Buffon dès 1734 sur le site d’un ancien château des Ducs de Bourgogne, ce jardin classé monument historique en 1947 et ses quatorze terrasses offrent un panorama remarquable sur Montbard et la vallée de la Brenne.', 2, 3, 3),
(17, 'Château d''Ancy-le-Franc', 'Le Château d’Ancy-le-Franc est un fleuron de la Renaissance situé au coeur d’un grand parc en Bourgogne, au bord du canal et à quelques heures de Paris.', 2, 3, 4),
(18, 'Vignobles de Chablis', 'Tout au long de l''année, les viticulteurs vous ouvrent les portes de leur domaine. Ils partageront avec vous la passion de leur métier et vous feront déguster leurs meilleurs vins en toute convivialité.', 4, 3, 4),
(19, 'Forêt de Fontainebleau', 'Avec une superficie de 25 000 hectares la forêt de Fontainebleau demeure un pur bonheur pour les amoureux de la nature, par sa faune et sa flore très dense et diversifiée. Elle offre plus de 1600 km de routes forestières et circuits pédestres pour le plaisir des promeneurs dont 300 km de sentiers balisés. De nombreuses activités vont sont proposées de la varappe, des promenades à pied, à cheval ou à vélo.\r\n', 5, 3, 2),
(20, 'Parc des Princes', 'Le Parc des Princes est un stade situé au sud-ouest de la ville de Paris, dans le 16e arrondissement, et sur le périphérique parisien. C''est le cinquième plus grand stade français mais aussi l''un des plus anciens et plus connus de la région parisienne. ', 5, 3, 5),
(21, 'Musée du Louvre', 'Le musée du Louvre est un musée d''art et d''antiquités situé au centre de Paris dans le palais du Louvre. C''est l''un des plus grands musées du monde, par sa surface d''exposition de 60 600 m28, et ses collections qui comprennent près de 460 000 œuvres.', 3, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `nom_region` varchar(20) NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `region`
--

INSERT INTO `region` (`id_region`, `nom_region`) VALUES
(1, 'dsfdsfdsf'),
(2, 'Bourgogne'),
(3, 'Île-de-France');

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE IF NOT EXISTS `trajet` (
  `id_trajet` int(11) NOT NULL AUTO_INCREMENT,
  `gare_depart` varchar(255) NOT NULL,
  `gare_arrive` varchar(255) NOT NULL,
  PRIMARY KEY (`id_trajet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `trajet`
--

INSERT INTO `trajet` (`id_trajet`, `gare_depart`, `gare_arrive`) VALUES
(1, 'GARE DIJON VILLE', 'PARIS GARE DE LYON ');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom_event` varchar(50) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `nom_event`) VALUES
(2, 'Histoire'),
(3, 'Art'),
(4, 'Gastronomie'),
(5, 'Loisirs');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `email`, `mdp`, `token`, `flag`) VALUES
(1, 'dfsdfd', 'dflkjfdsl@gfgd.com', 'dskldslk', '', 0),
(2, 'younes', 'younes@gmail.com', '497071716189645732c962f7a5b45420', '', 0),
(3, 'christophe', 'christophe@gmail.com', 'aade86c627bef71f7c0ea9991e5aa268', '', 0),
(4, 'amine', 'amine@gmail.com', 'bd82dd2a8b944f131d0a53bc1b473029', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(20) NOT NULL,
  `id_region` int(11) NOT NULL,
  PRIMARY KEY (`id_ville`),
  KEY `id_region` (`id_region`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `nom_ville`, `id_region`) VALUES
(1, 'gfdfgf', 1),
(2, 'Avon', 3),
(3, 'MONTBARD', 2),
(4, 'Yonne', 2),
(5, 'Paris', 3),
(6, 'Dijon', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`),
  ADD CONSTRAINT `evenement_ibfk_2` FOREIGN KEY (`id_coordonnee`) REFERENCES `coordonnee` (`id_coordonnee`),
  ADD CONSTRAINT `evenement_ibfk_3` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`);

--
-- Contraintes pour la table `gare`
--
ALTER TABLE `gare`
  ADD CONSTRAINT `gare_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`),
  ADD CONSTRAINT `gare_ibfk_2` FOREIGN KEY (`id_trajet`) REFERENCES `trajet` (`id_trajet`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`);

--
-- Contraintes pour la table `point_interet`
--
ALTER TABLE `point_interet`
  ADD CONSTRAINT `point_interet_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`),
  ADD CONSTRAINT `point_interet_ibfk_2` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`),
  ADD CONSTRAINT `point_interet_ibfk_3` FOREIGN KEY (`id_coordonnee`) REFERENCES `coordonnee` (`id_coordonnee`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
