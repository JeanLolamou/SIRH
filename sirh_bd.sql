-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 17 mars 2022 à 10:05
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sirh_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id_actualite` int(11) NOT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `image` varchar(250) NOT NULL,
  `supprime_actualite` int(11) DEFAULT NULL,
  `id_sous_menu` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_publier` varchar(255) DEFAULT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id_actualite`, `titre`, `contenu`, `image`, `supprime_actualite`, `id_sous_menu`, `id_user`, `date_publier`, `supprimer`) VALUES
(1, 'Lancement 4eme édition de la compétition INNOVATIONS DAYS', '<p><em><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</strong></em><br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '1566993517.jpg', NULL, NULL, NULL, '2019-08-28', 0),
(2, 'Bus Escape Game', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '1566996900.jpg', NULL, NULL, NULL, '2019-08-28', 0),
(3, 'édition de la compétition', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '1567160265.jpg', NULL, NULL, NULL, '2019-08-30', 0),
(4, 'Escape Game', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '1567160297.jpg', NULL, NULL, NULL, '2019-08-30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` text DEFAULT NULL,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `supprimer`) VALUES
(1, 'Chargé d\'étute', 0),
(2, 'Superviseur', 0),
(3, 'Responsable Adjoint', 0),
(4, 'Responsable', 0),
(5, 'Directeur Adjoint', 0),
(6, 'Chauffeur', 0),
(7, 'Assistant', 0),
(8, 'Technicien Surface', 0);

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_debut` varchar(255) DEFAULT NULL,
  `date_fin` varchar(255) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `id_conge` int(11) DEFAULT NULL,
  `annulation` int(11) NOT NULL DEFAULT 0,
  `responsable` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `reponse` text DEFAULT NULL,
  `document` int(11) NOT NULL DEFAULT 0,
  `nbrjours` int(11) DEFAULT NULL,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id`, `id_user`, `date_debut`, `date_fin`, `statut`, `date`, `id_conge`, `annulation`, `responsable`, `type`, `libelle`, `commentaire`, `reponse`, `document`, `nbrjours`, `supprimer`) VALUES
(1, 13, '2019-11-28', '2019-11-30', 0, NULL, NULL, 0, 11, 2, NULL, 'test', NULL, 0, 2, 0),
(2, 12, '2019-11-28', '2019-12-10', 2, NULL, NULL, 0, 13, 1, NULL, 'test', 'annule', 0, 12, 0),
(3, 12, '2022-03-01', '2022-03-10', 0, NULL, NULL, 0, 13, 1, NULL, NULL, NULL, 0, 9, 0);

-- --------------------------------------------------------

--
-- Structure de la table `delegations`
--

CREATE TABLE `delegations` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `id_delegant` int(11) DEFAULT NULL,
  `id_delegue` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demandedocuments`
--

CREATE TABLE `demandedocuments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type_demande` varchar(255) DEFAULT NULL,
  `sujet` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `statut` varchar(255) DEFAULT '0',
  `reponse` text DEFAULT NULL,
  `document1` varchar(255) DEFAULT NULL,
  `document2` varchar(255) DEFAULT NULL,
  `document3` varchar(255) DEFAULT NULL,
  `document4` varchar(255) DEFAULT NULL,
  `document5` varchar(255) DEFAULT NULL,
  `document_user` varchar(255) DEFAULT NULL,
  `supprimer` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandedocuments`
--

INSERT INTO `demandedocuments` (`id`, `id_user`, `type_demande`, `sujet`, `description`, `date`, `statut`, `reponse`, `document1`, `document2`, `document3`, `document4`, `document5`, `document_user`, `supprimer`) VALUES
(1, 11, 'Demande document', 'Fichier attestation de travail', 'test', '2019-11-28', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 12, 'Demande document', 'Fichier attestation de travail', 'test', '2019-11-28', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 12, 'Demande document', 'Fichier attestation de travail', 'test', '2019-11-28', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 12, 'Demande document', 'Fichier attestation de travail', 'test', '2019-11-28', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 12, 'Demande document', 'test', 'test', '2022-03-01', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 13, 'Demande document', 'Demande Document Attestation', 'test', '2022-03-07', '1', 'Réponse fichier', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `demandevehicules`
--

CREATE TABLE `demandevehicules` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `heur_debut` varchar(255) DEFAULT NULL,
  `heur_fin` varchar(255) DEFAULT NULL,
  `id_vehicule` int(11) DEFAULT NULL,
  `annulation` int(11) NOT NULL DEFAULT 0,
  `responsable` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandevehicules`
--

INSERT INTO `demandevehicules` (`id`, `id_user`, `statut`, `date`, `heur_debut`, `heur_fin`, `id_vehicule`, `annulation`, `responsable`, `libelle`, `commentaire`, `supprimer`) VALUES
(1, 13, 0, '2022-03-16', '14:49', '14:50', 1, 0, 13, 'TEST', 'test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `directions`
--

CREATE TABLE `directions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `directeur` int(11) NOT NULL,
  `description` text NOT NULL,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `directions`
--

INSERT INTO `directions` (`id`, `nom`, `directeur`, `description`, `supprimer`) VALUES
(1, 'DESI', 13, 'DESI', 0),
(2, 'Communication', 13, 'Communication', 0);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `id_conge` int(11) DEFAULT NULL,
  `id_demande_doc` int(11) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `confidentialite` int(11) DEFAULT 0,
  `supprimer` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`id`, `id_user`, `type`, `libelle`, `id_conge`, `id_demande_doc`, `details`, `confidentialite`, `supprimer`) VALUES
(1, 13, 'document_profession', '1646575176.pdf', NULL, NULL, 'CV', 0, 0),
(2, 13, 'document_profession', '1646575197.pdf', NULL, NULL, 'Diplôme', 0, 0),
(3, 13, 'document_profession', '1646651968.pdf', NULL, NULL, 'MOTIVATION', 0, 1),
(4, NULL, 'demande_document', '1646652997.pdf', NULL, 6, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `droit_acces`
--

CREATE TABLE `droit_acces` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `acces` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entretiens`
--

CREATE TABLE `entretiens` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `id_type_entrentien` int(11) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `heur` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `reponse` text DEFAULT NULL,
  `statut` varchar(255) NOT NULL,
  `id_responsable` int(11) DEFAULT 0,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entretiens`
--

INSERT INTO `entretiens` (`id`, `id_user`, `libelle`, `id_type_entrentien`, `date`, `heur`, `description`, `reponse`, `statut`, `id_responsable`, `supprimer`) VALUES
(1, 12, 'MANAGER', NULL, '2019-11-28', '00:00', 'test', NULL, '0', NULL, 0),
(2, 12, 'MANAGER', NULL, '2019-11-28', '11:11', 'test', 'annule', '2', 13, 0),
(3, 12, 'RH', NULL, '2022-03-01', '11:44', 'test', NULL, '0', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `details` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `details`, `type`, `etat`, `id_user`) VALUES
(1, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(2, 'Vous avez une demande d\'entretiens validée', 'demande_entretien', 1, 11),
(3, 'Vous avez une demande de salle en attente', 'demande_salle', 1, 0),
(4, 'Vous avez une demande de salle en attente', 'demande_salle', 1, 0),
(5, 'Vous avez une demande de congé en attente', 'demande_conge', 1, 11),
(6, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(7, 'Vous avez une demande de congé en attente', 'demande_conge', 1, 11),
(8, 'Vous avez une demande de congé en attente', 'demande_conge', 1, 13),
(9, 'Vous avez une demande de congés validée', 'demande_conge', 1, 12),
(10, 'Vous avez une demande de documents en attente', 'demande_document', 1, 0),
(11, 'Vous avez une demande de congé en attente', 'demande_conge', 1, 13),
(12, 'Vous avez une demande de congé en attente', 'demande_conge', 1, 13),
(13, 'Vous avez une demande de documents en attente', 'demande_document', 1, 0),
(14, 'Vous avez une demande de documents en attente', 'demande_document', 1, 0),
(15, 'Vous avez une demande de documents en attente', 'demande_document', 1, 0),
(16, 'Vous avez une demande de salle en attente', 'demande_salle', 1, 0),
(17, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(18, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(19, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(20, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(21, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(22, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(23, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(24, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 13),
(25, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 13),
(26, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 13),
(27, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 13),
(28, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 13),
(29, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 13),
(30, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 13),
(31, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 13),
(32, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 13),
(33, 'Vous avez une demande d\'entretiens validée', 'demande_entretien', 1, 12),
(34, 'Vous avez une demande de congés validée', 'demande_conge', 1, 12),
(35, 'Vous avez une demande de congés annulée', 'demande_conge', 1, 12),
(36, 'Vous avez une demande d\'entretiens validée', 'demande_entretien', 1, 12),
(37, 'Vous avez une demande d\'entretiens annulée', 'demande_entretien', 1, 12),
(38, 'Vous avez une demande de salle en attente', 'demande_salle', 1, 0),
(39, 'Vous avez une demande de vehicule en attente', 'demande_vehicule', 1, 0),
(40, 'Vous avez une demande de vehicule en attente', 'demande_vehicule', 1, 0),
(41, 'Vous avez une demande de congé en attente', 'demande_conge', 1, 13),
(42, 'Vous avez une demande d\'entretiens en attente', 'demande_entretien', 1, 0),
(43, 'Vous avez une demande de documents en attente', 'demande_document', 1, 0),
(44, 'Vous avez une demande de documents en attente', 'demande_document', 1, 0),
(45, 'Vous avez une demande de documents validée et repondue', 'demande_document', 1, 13),
(46, 'Vous avez une demande de vehicule en attente', 'demande_vehicule', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `organigrammes`
--

CREATE TABLE `organigrammes` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `organigrammes`
--

INSERT INTO `organigrammes` (`id`, `image`, `date`) VALUES
(1, '1567006264.jpg', '2019-08-28');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reunions`
--

CREATE TABLE `reunions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `heur_debut` varchar(255) DEFAULT NULL,
  `heur_fin` varchar(255) DEFAULT NULL,
  `id_salle` int(11) DEFAULT NULL,
  `annulation` int(11) NOT NULL DEFAULT 0,
  `responsable` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reunions`
--

INSERT INTO `reunions` (`id`, `id_user`, `statut`, `date`, `heur_debut`, `heur_fin`, `id_salle`, `annulation`, `responsable`, `libelle`, `commentaire`, `supprimer`) VALUES
(1, 11, 1, '2021-06-10', '09:34', '11:36', 1, 0, 11, 'Reunion Desi', 'TEST', 0);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `libelle`, `description`) VALUES
(1, 'collaborateur', 'collaborateur'),
(2, 'manager', 'manager'),
(3, 'RH', 'RH'),
(4, 'logistique', 'Gestionnaire Logistique'),
(5, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_direction` int(11) NOT NULL,
  `responsable` int(11) DEFAULT NULL,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`, `description`, `id_direction`, `responsable`, `supprimer`) VALUES
(1, 'Reseaux', 'testa', 1, 13, 0);

-- --------------------------------------------------------

--
-- Structure de la table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `suggestion` text NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typesalles`
--

CREATE TABLE `typesalles` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `supprimer` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typesalles`
--

INSERT INTO `typesalles` (`id`, `nom`, `supprimer`) VALUES
(1, 'Salle de reunion1', 0),
(2, 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typesconges`
--

CREATE TABLE `typesconges` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `supprimer` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typesconges`
--

INSERT INTO `typesconges` (`id`, `libelle`, `description`, `supprimer`) VALUES
(1, 'Congé annuel', 'Congé annuel', 0),
(2, 'Congé maladie', 'Congé maladie', 0),
(3, 'test', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `types_entretiens`
--

CREATE TABLE `types_entretiens` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user.png',
  `formation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civilite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donnee_urgence` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `situation_familial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typecontrat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anciennete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sortie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preavis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diplome` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langue` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `id_direction` int(11) DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_urgence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `actif` int(11) DEFAULT 0,
  `id_service` int(11) DEFAULT NULL,
  `poste` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isadmin` int(11) DEFAULT 0,
  `islogistique` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `email`, `email_verified_at`, `password`, `id_role`, `photo`, `formation`, `civilite`, `donnee_urgence`, `situation_familial`, `adresse`, `naissance`, `entree`, `typecontrat`, `anciennete`, `sortie`, `preavis`, `diplome`, `langue`, `statut`, `id_direction`, `tel`, `tel_urgence`, `remember_token`, `created_at`, `updated_at`, `actif`, `id_service`, `poste`, `isadmin`, `islogistique`) VALUES
(11, 'Sakho', 'Lamine', 'rh@apipguinee.com', NULL, '$2y$10$Mt8SaW/nviGJKRBgRV6KP.IG3.9/h9aYNay4jtei9nC8nrSoSIObq', 3, '1567078889.jpg', '', '', '', '', 'Cosa', NULL, '', NULL, '', '', '', '', '', 1, NULL, '0620127930', '0620127930', 'S1HhwUjfV57gkuTSjPA0BQoQydOXfULYpjYLuyvDAW72JfcDTAp7sM5LtxjU', '2019-03-28 11:01:11', '2019-09-06 10:02:52', 0, NULL, 'RH', 0, 0),
(12, 'Collaborateur', 'Admin', 'collaborateur@apipguinee.com', NULL, '$2y$10$Mt8SaW/nviGJKRBgRV6KP.IG3.9/h9aYNay4jtei9nC8nrSoSIObq', 1, 'user.png', NULL, NULL, NULL, NULL, 'COSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '0654091546', '0654091546', 'OXRJjQp1aMmhVIUAZqvg0wQlzCgX7UOUK9pzp4RNkfdPH9rcVD7WNUqGYA5L', '2019-11-21 09:50:05', '2019-11-28 11:45:42', 0, NULL, 'collaborateur', 0, 0),
(13, 'Manager', 'Admin', 'manager@apipguinee.com', NULL, '$2y$10$Mt8SaW/nviGJKRBgRV6KP.IG3.9/h9aYNay4jtei9nC8nrSoSIObq', 2, 'user.png', NULL, NULL, NULL, NULL, 'COSA', '2022-03-06', '2022-03-06', 'Contractuel', NULL, NULL, NULL, NULL, NULL, 1, 1, '620127930', '0654091546', 'yddPTgLeVHIH2u144ojHxOJPQ8LlIGOiCsQHIrGZ0bLOZEBhlPOoDAclmjbI', '2019-11-21 09:50:50', '2022-03-06 13:59:09', 0, 1, 'Manager', 0, 0),
(15, 'DIALLO', 'ALIOU', 'aliou.diallo@apipguinee.com', NULL, '$2y$10$4ZQRczfilk9cG28FcebSV.7ihENzzRu51qzTaXujgKNDp3/xCYjBO', 3, 'user.png', NULL, NULL, NULL, NULL, 'COSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '+224 0620127930', '620127930', '3WG17bhD3Zc1lurHRI2QaBGdThwoOqZyfBZELfZvAXhEJ2zUi7K8pd0I27Gj', '2022-03-15 10:15:34', '2022-03-15 10:15:34', 0, 1, 'WEBDEV', 1, 0),
(16, 'Logistique', 'Admin', 'logistique@apipguinee.com', NULL, '$2y$10$WMhbV1cHDUdOOoiBax0QVOBtT12urPXzItDhR.3ox0DeTduo54iw6', 1, 'user.png', NULL, NULL, NULL, NULL, 'COSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '620127930', '+224 0620127930', '7qPrsWrIsnfQirHDo8pjhqDcZv2J1USZLL1rNuWr3rGk1ME5ETNIZ9N8gKcN', '2022-03-15 10:17:45', '2022-03-15 10:17:45', 0, 1, 'Chargé Logistique', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `responsable` text DEFAULT NULL,
  `supprimer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `nom`, `responsable`, `supprimer`) VALUES
(1, 'Vehicule 1', NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id_actualite`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delegations`
--
ALTER TABLE `delegations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demandedocuments`
--
ALTER TABLE `demandedocuments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demandevehicules`
--
ALTER TABLE `demandevehicules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droit_acces`
--
ALTER TABLE `droit_acces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entretiens`
--
ALTER TABLE `entretiens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `organigrammes`
--
ALTER TABLE `organigrammes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reunions`
--
ALTER TABLE `reunions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typesalles`
--
ALTER TABLE `typesalles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typesconges`
--
ALTER TABLE `typesconges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types_entretiens`
--
ALTER TABLE `types_entretiens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id_actualite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `conges`
--
ALTER TABLE `conges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `delegations`
--
ALTER TABLE `delegations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `demandedocuments`
--
ALTER TABLE `demandedocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `demandevehicules`
--
ALTER TABLE `demandevehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `directions`
--
ALTER TABLE `directions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `droit_acces`
--
ALTER TABLE `droit_acces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entretiens`
--
ALTER TABLE `entretiens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `organigrammes`
--
ALTER TABLE `organigrammes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reunions`
--
ALTER TABLE `reunions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typesalles`
--
ALTER TABLE `typesalles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `typesconges`
--
ALTER TABLE `typesconges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `types_entretiens`
--
ALTER TABLE `types_entretiens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
