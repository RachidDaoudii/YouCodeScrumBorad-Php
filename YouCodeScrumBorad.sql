-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 02 nov. 2022 à 17:21
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scrumboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `priorites`
--

CREATE TABLE `priorites` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `priorites`
--

INSERT INTO `priorites` (`Id`, `Name`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High'),
(4, 'Critical');

-- --------------------------------------------------------

--
-- Structure de la table `statuses`
--

CREATE TABLE `statuses` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statuses`
--

INSERT INTO `statuses` (`Id`, `Name`) VALUES
(1, 'To Do'),
(2, 'In Progress'),
(3, 'Done');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Type_id` int(11) DEFAULT NULL,
  `Priority_id` int(11) DEFAULT NULL,
  `Status_id` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`Id`, `Title`, `Type_id`, `Priority_id`, `Status_id`, `Description`, `Date`) VALUES
(1, 'Keep all the updated requirements in one place', 1, 3, 1, 'There is hardly anything more frustrating than having to look for current requirements in tens of comments under the actual description or having to decide which commenter is actually authorized to change the requirements. The goal here is to keep all the', '2022-10-28'),
(3, 'Describe steps to reproduce an issue', 2, 2, 2, 'ncluding as many details as possible.', '2022-10-25'),
(5, 'Provide access to logs', 2, 1, 3, 'as they can be helpful in reproducing the steps that caused the problem in the first place.', '2022-10-25'),
(6, 'Consider creating an acceptance criteria list', 1, 1, 1, 'Descriptive requirements are very helpful when it comes to understanding the context of a problem, yet finally it is good to precisely specify what is expected. Thus the developer will not have to look for the actual requirements in a long, descriptive text but he will be able to easily get to the essence. One might find that sometimes â€” when acceptance criteria are well defined â€” there is little or no need for any additional information. Example:\r\n        a) User navigates to â€œ/accountsâ€ and clicks on red download CSV button\r\n        b) Popup appears with two buttons: â€œThis yearâ€ and â€œLast yearâ€\r\n        c) If user clicked on â€œLast yearâ€ download is initiated\r\n        d) CSV downloaded includes following columnsâ€¦', '2000-12-12'),
(7, 'Provide mockups', 2, 1, 1, 'A textual requirements description is essential in most cases, but an image is often worth more than a thousand words. Even a simple mockup can limit misunderstandings by a great factor. There are many apps out there that might be helpful here, like Balsamiq, InVision or Mockingbird, but manipulating screenshots of an existing app also works.', '2022-10-28'),
(8, 'Provide examples, credentials, etc', 2, 4, 1, 'If the expectation is to process or generate some file â€” attach an example of such a file. If the goal is to integrate what is being developed with some service, ensure your devs have access to this service and its documentation. This list could go on and on â€” the bottom line is â€” if there is something that our developer might make use of, try to foresee it and provide them with (access to) it.', '2022-10-28'),
(9, 'rovide access', 1, 3, 2, 'to the affected account and services if possible. It might be hard to reproduce the exact environment on a local machine.', '2022-10-28'),
(10, 'Provide environment information', 1, 3, 2, 'i.e., browser version, operating system version etc. Sometimes a list of installed browser plugins and extensions might be helpful as well.', '2022-10-28'),
(11, 'Provide a link to an exception and/or a stack trace', 2, 4, 2, 'as investigating those is usually the first step to take in resolving the problem.', '2022-10-28'),
(12, 'Provide access to the affected server or database dump', 1, 1, 3, 'If it is possible and when it does not violate security policies, it is usually helpful for the developer to access the original data that might have played a role in the problem.', '2022-10-28'),
(13, 'Make a screencast', 2, 2, 3, 'It is not always necessary, but many times a short screencast (or at least a screenshot) says more than a thousand words. While working on MacOS you can use QuickTime Player for the purpose but there are plenty of tools available for other operating systems as well.', '2022-10-28'),
(14, 'Provide contact information', 2, 4, 3, 'of the person that reported the bug. This will not always be possible, but in some cases it might be advantageous and most effective if a developer can have a chat with a person that actually experienced the bug, especially if the steps to reproduce a problem are not deterministic.', '2022-10-28'),
(15, 'Keep all the updated requirements in one place', 1, 3, 1, 'There is hardly anything more frustrating than having to look for current requirements in tens of comments under the actual description or having to decide which commenter is actually authorized to change the requirements. The goal here is to keep all the', '2022-10-28');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`Id`, `Name`) VALUES
(1, 'feature'),
(2, 'bug');

-- --------------------------------------------------------

--
-- Structure de la table `user_compte`
--

CREATE TABLE `user_compte` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_compte`
--

INSERT INTO `user_compte` (`id`, `Nom`, `Prenom`, `Email`, `Password`) VALUES
(1, 'daoudi', 'rachid', 'daoudi@gmail.com', '123'),
(4, 'Fathi', 'Amine', 'Fathi@gmail.com', '1234'),
(6, 'Jamh', 'mohamed', 'jamh@gmail.com', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `priorites`
--
ALTER TABLE `priorites`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Type_id` (`Type_id`),
  ADD KEY `Priority_id` (`Priority_id`),
  ADD KEY `Status_id` (`Status_id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `user_compte`
--
ALTER TABLE `user_compte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `priorites`
--
ALTER TABLE `priorites`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_compte`
--
ALTER TABLE `user_compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`Type_id`) REFERENCES `types` (`Id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`Priority_id`) REFERENCES `priorites` (`Id`),
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`Status_id`) REFERENCES `statuses` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
