-- phpMyAdmin SQL Dump

-- version 5.2.1

-- https://www.phpmyadmin.net/

--

-- Hôte : localhost:8889

-- Généré le : mar. 13 août 2024 à 07:28

-- Version du serveur : 8.0.35

-- Version de PHP : 8.2.20



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";





/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;



--

-- Base de données : `FUT`

--



-- --------------------------------------------------------



--

-- Structure de la table `Players`

--



CREATE TABLE `Players` (

  `ID` int NOT NULL,

  `Name` varchar(50) NOT NULL,

  `Poste` varchar(50) NOT NULL,

  `Nation` varchar(50) NOT NULL,

  `Club` varchar(50) NOT NULL,

  `Note` int NOT NULL,

  `Price` int NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



-- --------------------------------------------------------



--

-- Structure de la table `Poste`

--



CREATE TABLE `Poste` (

  `ID` int NOT NULL,

  `Poste` varchar(50) NOT NULL,

  `Players_id` varchar(50) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



-- --------------------------------------------------------



--

-- Structure de la table `Transfert`

--



CREATE TABLE `Transfert` (

  `ID` int NOT NULL,

  `Players_id` varchar(50) NOT NULL,

  `Poste` varchar(50) NOT NULL,

  `Club` int NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



--

-- Index pour les tables déchargées

--



--

-- Index pour la table `Players`

--

ALTER TABLE `Players`

  ADD PRIMARY KEY (`ID`);



--

-- Index pour la table `Poste`

--

ALTER TABLE `Poste`

  ADD PRIMARY KEY (`ID`);



--

-- Index pour la table `Transfert`

--

ALTER TABLE `Transfert`

  ADD PRIMARY KEY (`ID`);



--

-- AUTO_INCREMENT pour les tables déchargées

--



--

-- AUTO_INCREMENT pour la table `Players`

--

ALTER TABLE `Players`

  MODIFY `ID` int NOT NULL AUTO_INCREMENT;



--

-- AUTO_INCREMENT pour la table `Poste`

--

ALTER TABLE `Poste`

  MODIFY `ID` int NOT NULL AUTO_INCREMENT;



--

-- AUTO_INCREMENT pour la table `Transfert`

--

ALTER TABLE `Transfert`

  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;