-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 25 Mars 2015 à 20:48
-- Version du serveur: 5.1.53
-- Version de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bdd_walkaway`
--

-- --------------------------------------------------------

--
-- Structure de la table `comspersos`
--

CREATE TABLE IF NOT EXISTS `comspersos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `membre` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comspersos`
--


-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `pseudo` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `forum`
--


-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `motdepasse`) VALUES
(1, 'alexis', 'alexis/18');

-- --------------------------------------------------------

--
-- Structure de la table `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `lien` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `music`
--

INSERT INTO `music` (`id`, `titre`, `lien`) VALUES
(1, 'My Medicine', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/118400566'),
(2, 'Yellow', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/118400997'),
(3, 'Pieces', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/118400128'),
(4, 'Supermassive Black Hole', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/118401180');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` int(11) NOT NULL,
  `titre` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `date` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `contenu` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `img`, `titre`, `date`, `contenu`) VALUES
(1, 1, 'MJ de Montoir de Bretagne', '12/05/2012', 'Premier concert avec nos amis de <b>Even Hell</b> dans le cadre d''une soirée proposée par la maison de quartier de Montoir de Bretagne. Horaire : 19h'),
(2, 2, 'Aperock Café', '21/06/2013', 'Nous jouerons ce samedi 21 juin, à l'' <b>Apérock Café</b> de Saint Brévin, dans le cadre de la fête de la musique. Nous rejoindra sur scène le groupe <b>Plate of the Day</b>.  /!\\ Nous recherchons quelqu''un de disponible pour prendre des photos et des vidéos de quelques répetes et des concerts.'),
(3, 3, 'Informations aux guitaristes', '08/2013', ' Nous cherchons un guitariste qui pourrait se déplacer sur St Marc pour les répètes, et motivé pour des concerts.  Mais aussi une personne motivée pour prendre photos et vidéos de nos concerts, et pourquoi pas, de quelques répétitions.'),
(4, 4, 'Reprise des répètes !', 'Rentrée 2013', 'Nous reprenons les répétitions ce week-end, et cette fois ci au VIP !'),
(5, 5, 'Recherche de concerts', 'Rentrée 2013', 'Nous cherchons quelques lieux où nous pourrions nous produire pendant les vacances. Si vous même, ou une connaissance, pourriez nous aider dans notre recherche, ce ne serait d''aucun refus.  Seul bémol pour le moment : Nous n\\''avons pas encore de maquette (en cours de réflexion).  Pour nous contacter : Facebook ou mail'),
(6, 6, 'Are you roadies ?', '09/10/2013', 'Nous cherchons un "reporter" qui serait disponible fin octobre pour prendre des photos et vidéos, dans le but de faire une maquette. Voulant réaliser une maquette d''assez bonne qualité, nous voudrions une personne compétente. Il sera possible de vous dédommager financièrement.'),
(7, 7, 'Where is the guitarist ?...', '04/11/2013', 'Nous cherchons un guitariste qui pourrait se déplacer sur St Marc pour les répètes, et motivé pour des concerts.'),
(8, 8, 'Aperock Café', '19/12/2013', 'Pour bien digérer les repas de fin d''année, quoi de mieux qu''un concert à l''Apérock Café de Saint Brévin (les Pins) ! Ce petit digestif se jouera la samedi 4 janvier. Début des hostilités aux alentours de 21h ! '),
(9, 9, 'Act&Music', '04/2014', 'Nous venons de nous mettre en association, afin de facilité l’aspect administratif de nos concerts.'),
(10, 10, 'Apérock Café', '19/06/2014', 'Rendez-vous ce samedi à l''Apérock Café pour fêter comme il se doit la fête de la musique. Sera sur scène avant nous le groupe <b>Sau-Lau & Compagnie</b>. Début des hostilités entre 20h et 21h !'),
(11, 11, 'Vamos a Pénestin !', '07 et 09/08/2014', 'Nous partons en mini tournée ce week-end sur Pénestin pour trois concerts endiablés !<br />Nous jouerons au bar à tapas "A l''Ouest Tapas" jeudi soir, et nous féliciterons les gagnants du contest de skate avec un dernier concert le samedi soir ;)');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `date` text NOT NULL,
  `chemin` text NOT NULL,
  `citation` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `videos`
--

