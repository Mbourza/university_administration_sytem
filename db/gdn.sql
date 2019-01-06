-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 15 Mai 2015 à 18:05
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gdn`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE IF NOT EXISTS `absence` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_prof` int(11) NOT NULL,
  `session` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'etud', '{"etud" : 1}'),
(2, 'prof', '{"prof" : 1}'),
(3, 'admin', '{"admin" : 1}');

-- --------------------------------------------------------

--
-- Structure de la table `matiers`
--

CREATE TABLE IF NOT EXISTS `matiers` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prof` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `matiers`
--

INSERT INTO `matiers` (`id`, `name`, `prof`) VALUES
(1, 'francais', 'abdrahmen'),
(2, 'math', 'azize');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(11) NOT NULL,
  `memb_nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `memb_prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `memb_pass` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `memb_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `memb_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `memb_dNaissance` date NOT NULL,
  `gender` enum('m','f') COLLATE utf8_unicode_ci NOT NULL,
  `matier` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `memb_joinned` date NOT NULL,
  `memb_group` int(11) NOT NULL,
  `memb_salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `memb_pic` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `memb_nom`, `memb_prenom`, `memb_pass`, `memb_email`, `memb_code`, `memb_dNaissance`, `gender`, `matier`, `memb_joinned`, `memb_group`, `memb_salt`, `memb_pic`) VALUES
(21, 'allkes', 'kullen', '0680866dc36dc6a8b4bedbf819cf613cfaf3ab8ba9eecb895ec59142fd32fc70', 'kullen@gmail.com', 'boughazae', '2000-12-12', 'm', 'genie logiciel', '2015-04-10', 3, 'í»äwˆaÑ‘\0bC5EUÍÎä¦Hó[µ}Õº Ø#Ô', '10444408_887950634582175_5638405092648813539_n.jpg'),
(34, 'allenkas', 'kullen', '54f24264f911e6ff8eff5ffb38891f107122a3b8beb729c3fbf7ce194ca98c1f', 'allen@gmail.com', 'boughaza', '1994-08-26', 'm', '', '2015-05-13', 1, 'W!¬Ï¿Áâ—/ Õ|r¬8ß°òðƒl6{d9', ''),
(35, 'allena', 'kullen', '95147a9dc3fa6d6ef012515ec1fcc6336f91f6c168bf206af3a202aa81ca3fd0', 'mukurorok@gmail.com', 'boughazaz', '1994-08-26', 'm', '', '2015-05-13', 2, '6yˆ¿¬½“®½ÙÍ£ð¡Í’CžátDJŽYel)', '');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `sento_id` int(11) NOT NULL,
  `sentf_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mssg` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `read` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `sento_id`, `sentf_id`, `title`, `mssg`, `date`, `read`) VALUES
(55, 25, 22, 'about our meaning', 'hi there how r u are u fine ', '2015-04-11 20:13:50', '0'),
(58, 28, 22, 'hanta chouf', 'fjjmlrdhf', '2015-04-27 19:39:29', '0'),
(59, 29, 22, 'hanta chouf', 'fjjmlrdhf', '2015-04-27 19:39:29', '0'),
(61, 28, 22, 'here is a test mssg', 'hijkj,', '2015-05-04 15:41:27', '0'),
(62, 29, 22, 'here is a test mssg', 'hijkj,', '2015-05-04 15:41:27', '0');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
`id` int(11) NOT NULL,
  `etud` int(11) NOT NULL,
  `matier` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pro_emploi`
--

CREATE TABLE IF NOT EXISTS `pro_emploi` (
`id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `jour` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `val1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `val2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `val3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `val4` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pro_emploi`
--

INSERT INTO `pro_emploi` (`id`, `pro_id`, `jour`, `val1`, `val2`, `val3`, `val4`) VALUES
(1, 21, 'lundi', '', '', 'off', ''),
(2, 21, 'mardi', 'off', '', '', ''),
(3, 21, 'mercredi', '', 'off', '', ''),
(4, 21, 'jeudi', '', '', 'off', ''),
(5, 21, 'vendredi', 'off', '', '', ''),
(6, 21, 'samedi', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `regg`
--

CREATE TABLE IF NOT EXISTS `regg` (
`id` int(11) NOT NULL,
  `site_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `site_logo` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `regg`
--

INSERT INTO `regg` (`id`, `site_title`, `site_logo`) VALUES
(1, 'Gestion Des Notes', '11156243_10204103691901313_5467970123434390697_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `securitys`
--

CREATE TABLE IF NOT EXISTS `securitys` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('m','f') COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
`id` int(11) NOT NULL,
  `memb_id` int(11) NOT NULL,
  `hash` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `temps`
--

CREATE TABLE IF NOT EXISTS `temps` (
`id` int(11) NOT NULL,
  `jour` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `val1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `val2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `val3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `val4` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `temps`
--

INSERT INTO `temps` (`id`, `jour`, `val1`, `val2`, `val3`, `val4`) VALUES
(20, 'lundi', '', 'Genie Logiciel ', 'POO C++', 'Genie Logiciel  TD'),
(21, 'mardi', 'Genie Logiciel  TD', 'Sys Exploitation 2', 'POO C++', ''),
(22, 'mercredi', 'Structure De DonnÃ©e', 'Structure De DonnÃ©e Tp', 'POO C++', ''),
(23, 'jeudi', 'Sys Exploitation 2', '', 'Structure De DonnÃ©e', 'SQL Td'),
(24, 'vendredi', 'Sys Exploitation 2 Td', 'Web Dynamique Tp', 'Web Dynamique cours', ''),
(25, 'samedi', 'SQL Cours', '', '', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiers`
--
ALTER TABLE `matiers`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pro_emploi`
--
ALTER TABLE `pro_emploi`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regg`
--
ALTER TABLE `regg`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `securitys`
--
ALTER TABLE `securitys`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temps`
--
ALTER TABLE `temps`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `matiers`
--
ALTER TABLE `matiers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pro_emploi`
--
ALTER TABLE `pro_emploi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `regg`
--
ALTER TABLE `regg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `securitys`
--
ALTER TABLE `securitys`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `temps`
--
ALTER TABLE `temps`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
