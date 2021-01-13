-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 17 oct. 2020 à 09:55
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `recrutement_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_rm_candidats`
--

CREATE TABLE `tb_rm_candidats` (
  `candidat_id` int(11) NOT NULL,
  `nom_complet` varchar(75) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(75) DEFAULT NULL,
  `sexe` varchar(25) DEFAULT NULL,
  `etat_civil` varchar(25) DEFAULT NULL,
  `adresse` varchar(75) DEFAULT NULL,
  `telephone` varchar(75) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `niveau_etude` varchar(75) DEFAULT NULL,
  `matricule` varchar(10) DEFAULT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modif` datetime NOT NULL,
  `observation_candidat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_rm_candidats`
--

INSERT INTO `tb_rm_candidats` (`candidat_id`, `nom_complet`, `date_naissance`, `lieu_naissance`, `sexe`, `etat_civil`, `adresse`, `telephone`, `email`, `niveau_etude`, `matricule`, `date_ajout`, `date_modif`, `observation_candidat`) VALUES
(1, 'Sarah Kapinga', '2019-10-17', 'Lubumbashi', 'Homme', NULL, 'Gecamines, Lubumbashi, Haut-Katanga, RDC', '0821733330', 'kapinga@gmail.com', 'Licencie en CSI', '', '2020-10-17 08:15:11', '0000-00-00 00:00:00', 'RAS'),
(2, 'Betty Mwila', '1999-11-06', 'Lubumbashi', 'Femme', NULL, 'Kilobelobe, Lubumbashi, Haut-Katanga, RDC', '0976300163', 'mwila@gmail.com', 'Licencie en Marketing', '', '2020-10-17 08:55:13', '0000-00-00 00:00:00', 'Candidat en portefeuille');

-- --------------------------------------------------------

--
-- Structure de la table `tb_rm_demandes`
--

CREATE TABLE `tb_rm_demandes` (
  `demande_id` int(11) NOT NULL,
  `offre_sid` int(11) DEFAULT NULL,
  `candidat_sid` int(11) DEFAULT NULL,
  `date_postule` date DEFAULT NULL,
  `date_validation` date DEFAULT NULL,
  `observation_demande` text,
  `date_ajout` datetime DEFAULT NULL,
  `date_modif` datetime DEFAULT NULL,
  `statut_demande` varchar(25) DEFAULT NULL,
  `nom_dossier` varchar(75) DEFAULT NULL,
  `piece_jointe_cv` varchar(75) DEFAULT NULL,
  `piece_jointe_motivation` varchar(75) DEFAULT NULL,
  `piece_jointe_demande` varchar(75) DEFAULT NULL,
  `piece_jointe_identity` varchar(75) DEFAULT NULL,
  `piece_jointe_autres` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_rm_demandes`
--

INSERT INTO `tb_rm_demandes` (`demande_id`, `offre_sid`, `candidat_sid`, `date_postule`, `date_validation`, `observation_demande`, `date_ajout`, `date_modif`, `statut_demande`, `nom_dossier`, `piece_jointe_cv`, `piece_jointe_motivation`, `piece_jointe_demande`, `piece_jointe_identity`, `piece_jointe_autres`) VALUES
(1, 1, 1, '2020-10-17', '2020-10-17', 'RAS', '2020-10-17 09:36:27', '2020-10-17 09:50:44', 'Encours', '2020-01-SK', NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, '2020-10-17', '2020-10-17', 'RAS', NULL, '2020-10-17 09:49:22', 'Encours', '2020-01-SK', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tb_rm_offres`
--

CREATE TABLE `tb_rm_offres` (
  `offre_id` int(11) NOT NULL,
  `intitule` text,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `observation_offre` text,
  `duree` varchar(25) DEFAULT NULL,
  `date_pub` datetime DEFAULT NULL,
  `date_modif` datetime DEFAULT NULL,
  `type_contrat` varchar(75) DEFAULT NULL,
  `statut_offre` varchar(25) DEFAULT NULL,
  `poste_offre` varchar(75) DEFAULT NULL,
  `reference` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_rm_offres`
--

INSERT INTO `tb_rm_offres` (`offre_id`, `intitule`, `date_debut`, `date_fin`, `observation_offre`, `duree`, `date_pub`, `date_modif`, `type_contrat`, `statut_offre`, `poste_offre`, `reference`) VALUES
(1, 'Informaticien programmeur', NULL, NULL, 'Offre d\'emploi a duree determinee', NULL, '2020-10-17 09:09:53', NULL, 'CDD', NULL, 'Chef de projets', '2020/CDD/G');

-- --------------------------------------------------------

--
-- Structure de la table `tb_rm_users`
--

CREATE TABLE `tb_rm_users` (
  `id_asset` int(11) NOT NULL,
  `asset_fullname` varchar(75) NOT NULL,
  `asset_username` varchar(50) DEFAULT NULL,
  `asset_password` varchar(60) DEFAULT NULL,
  `asset_email` varchar(50) DEFAULT NULL,
  `asset_sexe` varchar(10) DEFAULT NULL,
  `asset_phone` varchar(50) DEFAULT NULL,
  `asset_type` varchar(20) DEFAULT 'agent',
  `date_ajout` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_connected` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `account_activated` varchar(25) DEFAULT 'active',
  `asset_avatar` varchar(75) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `asset_fonction` varchar(75) NOT NULL,
  `asset_matricule` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_rm_users`
--

INSERT INTO `tb_rm_users` (`id_asset`, `asset_fullname`, `asset_username`, `asset_password`, `asset_email`, `asset_sexe`, `asset_phone`, `asset_type`, `date_ajout`, `date_connected`, `account_activated`, `asset_avatar`, `date_update`, `asset_fonction`, `asset_matricule`) VALUES
(21, 'Elie Mwez', 'eliemwez', '$2y$12$lgSZ78FDfw7MUBBIrMgsfOB2BEBDapoD4jIJEtr.arj6dSYRoBDZG', 'eliemwez.rubuz@gmail.com', 'Masculin', '+243858533285', 'admin', '2020-09-11 10:08:58', '2020-09-21 10:02:11', 'active', 'global/img/avatars/avatar-eliemwez2.jpg', '2020-09-19 14:07:30', 'admin', '11220'),
(27, 'Administrateur', 'admin', '$2y$12$bGYGbrhUKpkUVun35wVyq.E3xoHKEsztWso0Hw6xlP4pRPrhNqxpu', 'admin@gmail.com', 'Homme', '+243+243903774951', 'admin', '2020-09-21 10:01:52', '2020-10-17 07:54:15', 'active', 'global/img/avatars/IMG_20200309_110637_241.jpg', '2020-10-17 09:00:00', 'admin', '2020010');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tb_rm_candidats`
--
ALTER TABLE `tb_rm_candidats`
  ADD PRIMARY KEY (`candidat_id`);

--
-- Index pour la table `tb_rm_demandes`
--
ALTER TABLE `tb_rm_demandes`
  ADD PRIMARY KEY (`demande_id`),
  ADD KEY `candidat_sid` (`candidat_sid`),
  ADD KEY `offre_sid` (`offre_sid`);

--
-- Index pour la table `tb_rm_offres`
--
ALTER TABLE `tb_rm_offres`
  ADD PRIMARY KEY (`offre_id`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- Index pour la table `tb_rm_users`
--
ALTER TABLE `tb_rm_users`
  ADD PRIMARY KEY (`id_asset`),
  ADD UNIQUE KEY `asset_username` (`asset_username`,`asset_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tb_rm_candidats`
--
ALTER TABLE `tb_rm_candidats`
  MODIFY `candidat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tb_rm_demandes`
--
ALTER TABLE `tb_rm_demandes`
  MODIFY `demande_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tb_rm_offres`
--
ALTER TABLE `tb_rm_offres`
  MODIFY `offre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tb_rm_users`
--
ALTER TABLE `tb_rm_users`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tb_rm_demandes`
--
ALTER TABLE `tb_rm_demandes`
  ADD CONSTRAINT `tb_rm_demandes_ibfk_1` FOREIGN KEY (`candidat_sid`) REFERENCES `tb_rm_candidats` (`candidat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rm_demandes_ibfk_2` FOREIGN KEY (`offre_sid`) REFERENCES `tb_rm_offres` (`offre_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
