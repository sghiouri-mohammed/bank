-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 03 jan. 2024 à 00:34
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bank`
--

-- --------------------------------------------------------

--
-- Structure de la table `CategorieEmploye`
--

CREATE TABLE `CategorieEmploye` (
  `idCategorie` int(11) NOT NULL,
  `categori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `CategorieEmploye`
--

INSERT INTO `CategorieEmploye` (`idCategorie`, `categori`) VALUES
(0, 'agent'),
(1, 'conseiller'),
(2, 'directeur');

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `numtel` varchar(20) DEFAULT NULL,
  `situation` varchar(50) DEFAULT NULL,
  `idEmploye` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`idClient`, `nom`, `prenom`, `adresse`, `mail`, `numtel`, `situation`, `idEmploye`) VALUES
(1, 'Alice', 'Adams', '789 Elm St', 'alice@example.com', '555-1111', 'Single', 2),
(2, 'Bob', 'Browny', '101', 'bob@example.com', '555-2222', 'Married', 6),
(3, 'Charlie', 'Clark', '8888-9999', 'charlie@example.com', '555-3333', 'Single', 7),
(4, 'Diana', 'Davis', '303 Maple St', 'diana@example.com', '555-4444', 'Divorced', 2),
(5, 'Eva', 'Evans', '404 Birch St', 'eva@example.com', '555-5555', 'Married', 7),
(6, 'Frank', 'Fisher', '505 Cedar St', 'frank@example.com', '555-6666', 'Single', 6),
(7, 'icheal', 'Micheal', 'Paris', 'micheal@gmail.Com', '55555-2222', 'célibataire', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Compte`
--

CREATE TABLE `Compte` (
  `idCompte` int(11) NOT NULL,
  `type_compte` varchar(50) NOT NULL,
  `pieces_a_fournir` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Compte`
--

INSERT INTO `Compte` (`idCompte`, `type_compte`, `pieces_a_fournir`) VALUES
(4, 'PCL', 'Acte de naissance, Passport, adresse'),
(5, 'Épargne', 'Pièces standard'),
(6, 'Chèques', 'Pièces standard'),
(7, 'Privilège', 'Documents spécifiques'),
(8, 'Entreprise', 'Documents entreprise'),
(9, 'Jeunesse', 'Pièces jeunes');

-- --------------------------------------------------------

--
-- Structure de la table `CompteClient`
--

CREATE TABLE `CompteClient` (
  `idCompteClient` int(11) NOT NULL,
  `dateOuverture` date DEFAULT NULL,
  `solde` decimal(10,2) DEFAULT NULL,
  `montantDecouvert` decimal(10,2) DEFAULT NULL,
  `idCompte` int(16) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `CompteClient`
--

INSERT INTO `CompteClient` (`idCompteClient`, `dateOuverture`, `solde`, `montantDecouvert`, `idCompte`, `idClient`) VALUES
(3, '2001-01-01', 20545.00, 1000.00, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Contrat`
--

CREATE TABLE `Contrat` (
  `idContrat` int(11) NOT NULL,
  `nomContrat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Contrat`
--

INSERT INTO `Contrat` (`idContrat`, `nomContrat`) VALUES
(1, 'Test'),
(2, 'Compte Courant'),
(3, 'Épargne'),
(4, 'Prêt Hypothécaire'),
(5, 'Carte de Crédit'),
(6, 'Placement Financier'),
(7, 'Assurance vie');

-- --------------------------------------------------------

--
-- Structure de la table `ContratClient`
--

CREATE TABLE `ContratClient` (
  `idContratClient` int(11) NOT NULL,
  `dateContrat` date DEFAULT NULL,
  `tarifMensuel` float DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  `idContrat` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ContratClient`
--

INSERT INTO `ContratClient` (`idContratClient`, `dateContrat`, `tarifMensuel`, `idClient`, `idContrat`) VALUES
(1, '2024-01-01', 2000, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Employe`
--

CREATE TABLE `Employe` (
  `idEmploye` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Employe`
--

INSERT INTO `Employe` (`idEmploye`, `nom`, `username`, `mdp`, `idCategorie`) VALUES
(1, 'John Doe', 'john_doe', '12345', 0),
(2, 'Jane Smith', 'jane_smith', '12345', 1),
(3, 'Robert Johnson', 'robert_j', '12345', 2),
(5, 'Bob Brown', 'bob_b', '12345', 0),
(6, 'Charlie Clark', 'charlie_c', '12345', 1),
(7, 'Diana Davis', 'diana_d', '12345', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Operation`
--

CREATE TABLE `Operation` (
  `idOperation` int(11) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `typeOp` varchar(50) NOT NULL,
  `idClient` int(11) DEFAULT NULL,
  `idCompte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Operation`
--

INSERT INTO `Operation` (`idOperation`, `montant`, `typeOp`, `idClient`, `idCompte`) VALUES
(1, 20145.00, 'Retrait', 2, 4),
(2, 20245.00, 'Retrait', 2, 4),
(3, 20545.00, 'Depot', 2, 4),
(4, 20545.00, 'Depot', 2, 4),
(5, 20545.00, 'Depot', 2, 4),
(6, 20045.00, 'Retrait', 2, 4),
(7, 20545.00, 'Depot', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `Rdv`
--

CREATE TABLE `Rdv` (
  `idRdv` int(11) NOT NULL,
  `motifRdv` varchar(255) DEFAULT NULL,
  `nomClient` varchar(50) DEFAULT NULL,
  `prenomClient` varchar(50) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  `listPiece` text DEFAULT NULL,
  `nomEmploye` varchar(50) DEFAULT NULL,
  `idEmploye` int(11) DEFAULT NULL,
  `dateRdv` date DEFAULT NULL,
  `timeRdv` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Rdv`
--

INSERT INTO `Rdv` (`idRdv`, `motifRdv`, `nomClient`, `prenomClient`, `idClient`, `listPiece`, `nomEmploye`, `idEmploye`, `dateRdv`, `timeRdv`) VALUES
(1, 'Entretien Bancaire', 'Dupont', 'Jean', 3, 'Carte d\'identité, RIB', 'Martin', 5, '2024-01-15', '15:30:00'),
(4, 'Ouverture de Compte', 'Diana', 'Davis', 4, 'Identité, Acte de naissance', 'Robert Johnson', 3, '2024-01-04', '15:45:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `CategorieEmploye`
--
ALTER TABLE `CategorieEmploye`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`idClient`),
  ADD KEY `idEmploye` (`idEmploye`);

--
-- Index pour la table `Compte`
--
ALTER TABLE `Compte`
  ADD PRIMARY KEY (`idCompte`);

--
-- Index pour la table `CompteClient`
--
ALTER TABLE `CompteClient`
  ADD PRIMARY KEY (`idCompteClient`);

--
-- Index pour la table `Contrat`
--
ALTER TABLE `Contrat`
  ADD PRIMARY KEY (`idContrat`);

--
-- Index pour la table `ContratClient`
--
ALTER TABLE `ContratClient`
  ADD PRIMARY KEY (`idContratClient`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idContrat` (`idContrat`);

--
-- Index pour la table `Employe`
--
ALTER TABLE `Employe`
  ADD PRIMARY KEY (`idEmploye`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `Operation`
--
ALTER TABLE `Operation`
  ADD PRIMARY KEY (`idOperation`);

--
-- Index pour la table `Rdv`
--
ALTER TABLE `Rdv`
  ADD PRIMARY KEY (`idRdv`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `CategorieEmploye`
--
ALTER TABLE `CategorieEmploye`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Compte`
--
ALTER TABLE `Compte`
  MODIFY `idCompte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `CompteClient`
--
ALTER TABLE `CompteClient`
  MODIFY `idCompteClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Contrat`
--
ALTER TABLE `Contrat`
  MODIFY `idContrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ContratClient`
--
ALTER TABLE `ContratClient`
  MODIFY `idContratClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Employe`
--
ALTER TABLE `Employe`
  MODIFY `idEmploye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Operation`
--
ALTER TABLE `Operation`
  MODIFY `idOperation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Rdv`
--
ALTER TABLE `Rdv`
  MODIFY `idRdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `Employe` (`idEmploye`);

--
-- Contraintes pour la table `ContratClient`
--
ALTER TABLE `ContratClient`
  ADD CONSTRAINT `contratclient_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `Client` (`idClient`),
  ADD CONSTRAINT `contratclient_ibfk_2` FOREIGN KEY (`idContrat`) REFERENCES `Contrat` (`idContrat`);

--
-- Contraintes pour la table `Employe`
--
ALTER TABLE `Employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `CategorieEmploye` (`idCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
