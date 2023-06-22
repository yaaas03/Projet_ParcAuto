-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 juil. 2022 à 15:28
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parc_auto`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mpass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `email`, `mpass`) VALUES
(2, 'AYA', 'zouity', 'Ayazouity@gmail.com', '$2y$10$.vAlmZnKedAY7DDpvgWHH.N.638yAQE0zJA6j83kJKX74bXyehaZ2');

-- --------------------------------------------------------

--
-- Structure de la table `affectation_vehicule`
--

CREATE TABLE `affectation_vehicule` (
  `id_affectation` int(11) NOT NULL,
  `date_affectation` date NOT NULL,
  `date_recuperation` date NOT NULL,
  `id_personne` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `affectation_vehicule`
--

INSERT INTO `affectation_vehicule` (`id_affectation`, `date_affectation`, `date_recuperation`, `id_personne`, `id_vehicule`) VALUES
(23, '2022-07-27', '2022-07-27', 7, 13),
(24, '2022-07-27', '0000-00-00', 6, 15);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_Facture` int(11) NOT NULL,
  `date_facture` date NOT NULL,
  `total` float NOT NULL,
  `TVA` float NOT NULL,
  `prix_ht` float NOT NULL,
  `nature_charge` varchar(200) NOT NULL,
  `numcharge` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id_Facture`, `date_facture`, `total`, `TVA`, `prix_ht`, `nature_charge`, `numcharge`, `id_vehicule`) VALUES
(12, '2022-07-27', 165, 10, 150, 'Vignette', 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `id_affectation` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `date_affectation` date NOT NULL,
  `date_recuperation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id`, `id_affectation`, `id_vehicule`, `id_personne`, `date_affectation`, `date_recuperation`) VALUES
(13, 23, 13, 7, '2022-07-27', '2022-07-27'),
(14, 24, 15, 6, '2022-07-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `cin` varchar(20) NOT NULL,
  `tel` int(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `service` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cnss` int(11) NOT NULL,
  `date_naissance` date NOT NULL,
  `date_engagement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `cin`, `tel`, `adresse`, `service`, `email`, `cnss`, `date_naissance`, `date_engagement`) VALUES
(6, 'zouity', 'aya', 'bw4578', 605609444, 'casa, ainchok', 'informatique', 'aya@gmail.com', 2147483647, '2001-09-29', '2022-07-07'),
(7, 'sadik', 'mohamed  yassine', 'bb45789', 65875986, 'casa, hay mohamadi', 'stock', 'yassine@gmail.com', 2147483647, '2001-11-13', '2022-07-01');

-- --------------------------------------------------------

--
-- Structure de la table `proces`
--

CREATE TABLE `proces` (
  `numproces` int(11) NOT NULL,
  `nature` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `montant` float NOT NULL,
  `date_paiement` date NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `proces`
--

INSERT INTO `proces` (`numproces`, `nature`, `description`, `montant`, `date_paiement`, `id_personne`) VALUES
(24, 'ceinture', 'il n\'a pas porter sa ceinture, ce qui met les autres conducteurs en danger', 300, '0000-00-00', 7),
(25, 'vitesse', 'plus de 160km/h', 150, '2022-07-27', 6);

-- --------------------------------------------------------

--
-- Structure de la table `type_charge`
--

CREATE TABLE `type_charge` (
  `numcharge` int(11) NOT NULL,
  `typecharge` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_charge`
--

INSERT INTO `type_charge` (`numcharge`, `typecharge`) VALUES
(1, 'Fixes'),
(2, 'Divers');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `immatriculation` varchar(100) NOT NULL,
  `categorie` varchar(200) NOT NULL,
  `model` year(4) NOT NULL,
  `type` varchar(30) NOT NULL,
  `marque` varchar(30) NOT NULL,
  `Date_circulation` date NOT NULL,
  `Date_visitepro` date NOT NULL,
  `date_achat` date NOT NULL,
  `Compagnie` varchar(250) NOT NULL,
  `couleur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `immatriculation`, `categorie`, `model`, `type`, `marque`, `Date_circulation`, `Date_visitepro`, `date_achat`, `Compagnie`, `couleur`) VALUES
(13, '4800_A_55', 'Camion', 2018, 'Diesel', 'Volvo', '2018-10-27', '2023-10-27', '2018-09-27', 'RMA', ''),
(15, '2314_B_23', 'Camionnette', 2017, 'Essence', 'Renault', '2017-07-23', '2023-07-27', '2017-06-27', 'MAMDA', ''),
(16, '321_C_5434', 'Car', 2017, 'Diesel', 'Opel', '2017-07-19', '2022-07-19', '2017-06-29', 'AtlantaSanad', '');

-- --------------------------------------------------------

--
-- Structure de la table `visite_technique`
--

CREATE TABLE `visite_technique` (
  `numVT` int(11) NOT NULL,
  `date_visite` date NOT NULL,
  `nature_visite` varchar(200) NOT NULL,
  `montant` float NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visite_technique`
--

INSERT INTO `visite_technique` (`numVT`, `date_visite`, `nature_visite`, `montant`, `id_vehicule`) VALUES
(11, '2022-07-27', 'panne', 1500, 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `affectation_vehicule`
--
ALTER TABLE `affectation_vehicule`
  ADD PRIMARY KEY (`id_affectation`),
  ADD KEY `id_p` (`id_personne`),
  ADD KEY `id_v` (`id_vehicule`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_Facture`),
  ADD KEY `facture_ibfk_2` (`id_vehicule`),
  ADD KEY `numcharge` (`numcharge`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historique_ibfk_1` (`id_personne`),
  ADD KEY `id_vehicule` (`id_vehicule`),
  ADD KEY `id_affectation` (`id_affectation`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `proces`
--
ALTER TABLE `proces`
  ADD PRIMARY KEY (`numproces`),
  ADD KEY `id_personne` (`id_personne`);

--
-- Index pour la table `type_charge`
--
ALTER TABLE `type_charge`
  ADD PRIMARY KEY (`numcharge`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`);

--
-- Index pour la table `visite_technique`
--
ALTER TABLE `visite_technique`
  ADD PRIMARY KEY (`numVT`),
  ADD KEY `id_V` (`id_vehicule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `affectation_vehicule`
--
ALTER TABLE `affectation_vehicule`
  MODIFY `id_affectation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_Facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `proces`
--
ALTER TABLE `proces`
  MODIFY `numproces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `type_charge`
--
ALTER TABLE `type_charge`
  MODIFY `numcharge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `visite_technique`
--
ALTER TABLE `visite_technique`
  MODIFY `numVT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectation_vehicule`
--
ALTER TABLE `affectation_vehicule`
  ADD CONSTRAINT `affectation_vehicule_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE,
  ADD CONSTRAINT `affectation_vehicule_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`) ON DELETE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_3` FOREIGN KEY (`numcharge`) REFERENCES `type_charge` (`numcharge`) ON DELETE CASCADE,
  ADD CONSTRAINT `facture_ibfk_4` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`) ON DELETE CASCADE;

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `historique_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historique_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historique_ibfk_3` FOREIGN KEY (`id_affectation`) REFERENCES `affectation_vehicule` (`id_affectation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proces`
--
ALTER TABLE `proces`
  ADD CONSTRAINT `proces_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `visite_technique`
--
ALTER TABLE `visite_technique`
  ADD CONSTRAINT `visite_technique_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
