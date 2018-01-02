-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 02 Janvier 2018 à 23:15
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `panierpiano`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(20) NOT NULL,
  `nom_categorie` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `descr_categorie` varchar(180) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_vendeur` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `descr_categorie`, `id_vendeur`) VALUES
(1, 'categorie 1', 'categorie 1, categorie categorie categorie', 1),
(2, 'categorie 2', 'esytdrtygiyygkukfvyfut huhuoo', 1),
(3, 'categorie 3', 'esytdrtygiyygkukfvyfut huhuoo', 1),
(4, 'categorie 1', 'esytdrtygiyygkukfvyfut huhuoo', 2),
(5, 'categorie 2', 'esytdrtygiyygkukfvyfut huhuoo tfukkfufukfukfufufyufuf, fukufygyhl u ug luu hjm h l oi hh h j ulk ig, tdiuytukitd dtydtyu gukijlhhuol fsdfsddsfds dsfsdfsdf dfssdfdsf sdfdfsfsdsfdsd', 2);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(20) NOT NULL,
  `nom_client` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom_client` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `adresse` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mdp` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom_util` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `num_tel` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `adresse`, `mdp`, `nom_util`, `num_tel`, `email`) VALUES
(1, 'client', '1', '\01\0,\0 \0r\0u\0e\0 \0k\0l\0g\0g\0,\0 \05\05\05\05\05\0,\0 \0p\0a\0r\0i\0s', 'client', 'pseudo', '0102030405', ''),
(2, 'clicli', 'meh', '\00\0,\0 \0r\0u\0e\0 \0d\0u\0 \0m\0e\0h\0,\0 \00\00\00\00\00\0,\0 \0M\0e\0h', 'meh', 'meh', '0102030405', ''),
(3, 'cher', 'ami', '\01\05\0,\0 \0r\0u\0e\0 \0r\0a\0n\0d\0o\0m\0,\0 \04\05\06\01\02\0,\0 \0L\0i\0e\0u', 'mot', 'cherAmi', '0102030405', ''),
(4, '', '', '11112', 'test', 'test1', '', ''),
(5, 'client', '2', '1 rue du test 11111 test', 'test', 'test2', '0111111111', ''),
(6, 'test ', 'test', '  ', 'test', 'test3', 'rer', 'test3@test.fr');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(20) NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_vendeur` int(20) NOT NULL,
  `id_client` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `date`, `etat`, `id_vendeur`, `id_client`) VALUES
(1, '2017-12-22', 'en_attente', 1, 2),
(2, '2017-12-30', 'en_cours', 1, 1),
(3, '2017-01-17', 'annulee', 1, 1),
(4, '2017-11-03', 'validee', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
  `id_contient` int(11) NOT NULL,
  `id_commande` int(20) NOT NULL,
  `id_produit` int(20) NOT NULL,
  `quantite_prod` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contient`
--

INSERT INTO `contient` (`id_contient`, `id_commande`, `id_produit`, `quantite_prod`) VALUES
(7, 4, 6, 1),
(8, 4, 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(20) NOT NULL,
  `nom_produit` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `descr_produit` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prix` float NOT NULL,
  `image_produit_1` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_produit_2` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_produit_3` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_categorie` int(20) NOT NULL,
  `date_ajout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `descr_produit`, `prix`, `image_produit_1`, `image_produit_2`, `image_produit_3`, `id_categorie`, `date_ajout`) VALUES
(6, 'test modiiiif', 'test modif description', 1245, '6.1.jpg', '6.2.jpg', '6.3.jpg', 3, '0000-00-00'),
(7, 'produit 7', 'produit produit', 1554.22, '', '', '', 5, '0000-00-00'),
(8, 'produit 8', 'produit produit', 15.252, '', '', '', 5, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `id_vendeur` int(20) NOT NULL,
  `nom_vendeur` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom_vendeur` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom_util` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mdp` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vendeur`
--

INSERT INTO `vendeur` (`id_vendeur`, `nom_vendeur`, `prenom_vendeur`, `nom_util`, `mdp`, `email`, `adresse`) VALUES
(1, 'doe', 'john', 'vendeur 1', 'pass_not_cripted', '', ''),
(2, 'al', 'fred', 'alfred', 'alfred', '', ''),
(3, 'test', '1', 'test1', 'test', '', ''),
(4, 'test', '2', 'test2', 'test', '', ''),
(5, 'test', '3', 'test3', '$2y$11$A74EIydQZYuZ.4e6MSu3U.KLagKmoQrGtGyviUlPsdL', 'test3@test.fr', '3 rue du test 33333 test');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD KEY `id_vendeur` (`id_vendeur`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_vendeur` (`id_vendeur`,`id_client`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
  ADD PRIMARY KEY (`id_contient`),
  ADD KEY `id_panier` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`id_vendeur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `contient`
--
ALTER TABLE `contient`
  MODIFY `id_contient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `id_vendeur` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_vendeur`) REFERENCES `vendeur` (`id_vendeur`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_vendeur`) REFERENCES `vendeur` (`id_vendeur`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
