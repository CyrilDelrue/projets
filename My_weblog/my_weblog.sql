-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 05 Juillet 2015 à 17:25
-- Version du serveur :  5.6.24-0ubuntu2
-- Version de PHP :  5.6.10-1+deb.sury.org~vivid+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `my_weblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE IF NOT EXISTS `billet` (
`id_billet` int(11) NOT NULL,
  `id_user` int(3) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `billet`
--

INSERT INTO `billet` (`id_billet`, `id_user`, `created`, `updated`, `title`, `content`) VALUES
(1, 2, '2015-06-29 07:33:24', '2015-06-29 07:33:24', '', 'J''ecrit mon premier article pour vous dire que sa avancerMais c''est toujours lent d''avancer .....GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG'),
(4, 2, '2015-06-29 08:36:33', '2015-06-29 08:36:33', '', 'ATRR'),
(5, 2, '2015-06-29 08:49:17', '2015-06-29 08:49:17', '', 'ATRR'),
(6, 2, '2015-06-29 08:49:23', '2015-06-29 08:49:23', '', 'ATRR'),
(7, 2, '2015-06-29 08:53:27', '2015-06-29 08:53:27', '', 'ATRR'),
(9, 2, '2015-06-29 08:54:13', '2015-06-29 08:54:13', '', 'ATRR'),
(10, 2, '2015-06-29 08:56:22', '2015-06-29 08:56:22', '', 'ATRR'),
(11, 2, '2015-06-29 08:57:33', '2015-06-29 08:57:33', '', 'ATRR'),
(12, 2, '2015-06-29 08:58:41', '2015-06-29 08:58:41', '', 'ATRR'),
(13, 2, '2015-06-29 09:00:34', '2015-06-29 09:00:34', 'MDR', 'ATRR'),
(14, 2, '2015-06-29 09:02:32', '2015-06-29 09:02:32', 'MDR', 'ATRR'),
(15, 2, '2015-06-29 09:02:34', '2015-06-29 09:02:34', 'MDR', 'ATRR'),
(16, 2, '2015-06-29 14:19:44', '2015-06-29 14:19:44', '', 'ATRRATRR\nJ''espre que sa va le modifier'),
(17, 2, '2015-07-05 14:02:29', '2015-07-05 14:02:29', 'Test', 'Voila mon test'),
(18, 2, '2015-07-05 15:11:01', '2015-07-05 15:11:01', '', 'Voila mon test pour voir si tout marche encore sur des roulette'),
(19, 2, '2015-07-05 15:14:57', '2015-07-05 15:14:57', 'e', 'Voila mon test pour voir si tout marche encore sur des roulette eee'),
(20, 2, '2015-07-05 15:15:24', '2015-07-05 15:15:24', 'rrrrrrrrrrrrr', 'Voila mon test pour voir si tout marche encore sur des roulette eee');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
`id` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_billet`, `id_user`, `content`, `date`) VALUES
(1, 20, 2, 'mdrrrrrrrrrrrrrrrrrr', '2015-07-05 15:23:03');

-- --------------------------------------------------------

--
-- Structure de la table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id_level` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `level`
--

INSERT INTO `level` (`id_level`, `nom`) VALUES
(1, 'admin'),
(2, 'blogger'),
(3, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id_tag` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id_tag`, `nom`) VALUES
(1, 'Culture'),
(2, 'Informatique'),
(3, 'High-tech'),
(4, 'Sexe'),
(5, 'Education'),
(6, 'Manga'),
(7, 'Science'),
(8, 'Ecologie'),
(9, 'Economie'),
(10, 'Univers'),
(11, 'Jeux-video'),
(12, 'Bande-dessinee'),
(13, 'Animation'),
(14, 'Film'),
(15, 'Attraction'),
(16, 'Vacance');

-- --------------------------------------------------------

--
-- Structure de la table `tags_billet`
--

CREATE TABLE IF NOT EXISTS `tags_billet` (
  `id_tag` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tags_billet`
--

INSERT INTO `tags_billet` (`id_tag`, `id_billet`) VALUES
(7, 0),
(8, 0),
(6, 0),
(3, 0),
(5, 0),
(6, 0),
(9, 0),
(3, 13),
(9, 13),
(3, 14),
(9, 14),
(11, 14),
(3, 15),
(9, 15),
(11, 15),
(10, 17),
(6, 18),
(8, 18),
(11, 19),
(12, 20);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_naissance` date NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `login`, `pwd`, `email`, `date_inscription`, `date_naissance`, `sexe`, `id_level`) VALUES
(1, 'root', '$2y$10$j6Y6MtA3upH7a6QUIzdZa.5vsSGV91hNF744WpSnifxwx4cM/Ita2', 'dell@dell.fr', '2015-06-24 23:44:24', '0000-00-00', 'F', 1),
(2, 't', '$2y$10$7VvakUkhas.Jm/xYyR3e5eHHXcruByGlI4iKG34VE8fWyrU/xfaES', 'dell@dell.frmmmmm', '2015-06-24 23:47:28', '2015-06-07', 'H\n			', 1),
(5, 'minipouceambulan', '$2y$10$WyBB1hfpnkINKUeqYX6iO.qvMXkCPW9Hj2yHjJ5tnwgfX1GvRC1om', 'mini@mini.fr', '2015-06-26 15:04:21', '2015-06-07', 'F\n			', 3),
(7, 'Kimouss', '$2y$10$JQz8BAyKQZkWChFC2TOsEugKDQd8RWKuMTviFJagy7gx3oTlrQrky', 'kim@blabla.dot', '2015-06-26 15:19:03', '2015-05-24', 'H', 1),
(16, 'lol', '$2y$10$mK3VRTlcFk4LjguDt7WtLe3GLhmWX7s1RY88pdbiby.oGRJHo066O', 'dell@dell.fr', '2015-06-27 21:41:40', '2015-06-01', 'H', 1),
(18, 'rooooot', '$2y$10$SMytUSt24IdFcV0QRYxkA.EsmpWfpQ1.ZIDeaA0LCV8o86D8ORfXK', 'dell@dell.fr', '2015-06-27 21:42:56', '0000-00-00', 'F ', 2),
(19, 'cyril', '$2y$10$NaH14RTHcXTzYuyEpAc6oOlCrDkiQUMKYND2MX7RC39LbpI.VLl7S', 'cyril.delrue@epitech.eu', '2015-06-27 21:44:05', '0000-00-00', 'H\n			', 1),
(21, 'lo', '$2y$10$Rxn0Ob3.lZUMBlOOd4f6rOrhlNpqmX3onrK6h69kcbfAXRxaHGFvi', 'dell@dell.fr', '2015-06-27 21:52:26', '0000-00-00', 'H', 3),
(22, 'test', '$2y$10$s/ggoEwCsSurMXrZWLBXHe4N0mdRwEHKLKwmuUzwrKRpo4h9lt3Vq', 'dell@dell.fr', '2015-07-05 12:10:23', '1944-10-03', 'H', 3),
(23, 'test', '$2y$10$542giLDTlgCM2tPfEjHFw.ZgwORVJs9DPpF3VNgD3e2QzlyBenIPm', 'dell@dell.fr', '2015-07-05 12:13:39', '1944-10-03', 'H', 3),
(24, 'test', '$2y$10$Y.3d2vzD5.MDVylaGl8usep9Fyl6WrFeF.hGHdFd8.7rc/a354Q1G', 'dell@dell.fr', '2015-07-05 12:15:05', '1944-10-03', 'H', 3),
(25, 'test', '$2y$10$LXwnx.Ec4ZLf0R923gQGBOp83mjHeYtOV0sGDNwhCCQ8FSfxXTDDa', 'dell@dell.fr', '2015-07-05 12:21:11', '1944-10-03', 'H', 3),
(26, 'test', '$2y$10$PJX7jqe9z516VTX0s0BgwuslizFZsKj47sbSRiSLK4u1kxtfk9RXK', 'dell@dell.fr', '2015-07-05 12:21:41', '1944-10-03', 'H', 3),
(27, 'test', '$2y$10$H0V5s.uMH1Aw9Mun6iU9Jerd1Q0slNGzJAHQ68MoyKiCjcwnykd5u', 'dell@dell.fr', '2015-07-05 12:22:34', '1944-10-03', 'H', 3),
(28, 'test', '$2y$10$VvVG6rO1DX/IcCyt/rtdyOJPbBbJii8VREEtBNcWuzWDoEElboKEO', 'dell@dell.fr', '2015-07-05 12:22:58', '1944-10-03', 'H', 3),
(29, 'test', '$2y$10$IJORcavTodFQMzu5tGbJQul7aoGW8XCCNfkMj.r2tKqYgIu1G9k3W', 'dell@dell.fr', '2015-07-05 12:23:15', '1944-10-03', 'H', 3),
(30, 'test', '$2y$10$L/A/2sGhfW3KVVxR05040ev96g4bMBAd4E2msaFle.O9jV3jt/vgC', 'dell@dell.fr', '2015-07-05 12:23:37', '1944-10-03', 'H', 3),
(31, 'test', '$2y$10$HCc0GrqsbO2UknCOnZtPtuc/NGUn.g4TKoE0At1nZ9cTmnCwhi3Hm', 'dell@dell.fr', '2015-07-05 12:23:54', '1944-10-03', 'H', 3),
(32, 'test', '$2y$10$HEyZddOJwdzQEwhUcYMCU.sRTSWEejgs2VLBBYyZngMghtAtH6seK', 'dell@dell.fr', '2015-07-05 12:24:16', '1944-10-03', 'H', 3),
(33, 'test', '$2y$10$xOws6GoaBJ.Tu5WtGrxiQ.XJG.V.JMpIJLonJ4tPMRKPtEvgQxPZO', 'dell@dell.fr', '2015-07-05 12:25:39', '1944-10-03', 'H', 3),
(34, 'user', '$2y$10$02919Clw6WurBnZR.Cavc.viGpFAyCo4swHaIJe.K3h7vZdoazLKa', 'dell@dell.fr', '2015-07-05 13:10:25', '1910-02-02', 'H', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
 ADD PRIMARY KEY (`id_billet`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`id_level`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id_tag`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `level`
--
ALTER TABLE `level`
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
