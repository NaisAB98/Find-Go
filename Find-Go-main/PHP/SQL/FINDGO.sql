-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 23 mars 2022 à 17:38
-- Version du serveur :  5.7.21-1
-- Version de PHP : 7.2.4-1+b1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `FINDGO`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_et` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `commentaire`, `id_et`, `id`) VALUES
(1, 'je viens de paris et passe des vacances en AlgÃ©rie Excellent accueil je suis y aller tout Ã  l\'heure et franchement c un des meilleur french tacos que g manger dans ma vie vous en faites mieux que certain tacos de france bravo ', 5, 1),
(2, 'Des tacos tout bonnement excellents, lieu assez Ã©troit, vaut mieux prendre a emportÃ©', 5, 3),
(3, 'Magnifique goÃ»t et service', 5, 4),
(4, 'Espace crÃ©e par mr soualah', 6, 5),
(5, 'Le service est top, les serveurs sont chaleureux ,et la nourriture trop bonne.', 1, 6),
(6, 'La dÃ©co de l\'hÃ´tel trÃ¨s raffinÃ©e, le parking gratuit, le buffet de petit dÃ©jeuner, l\'amabilitÃ© du personnel, Tout Ã©tait parfait.', 1, 1),
(7, 'Top , Rien a dire *_*.', 5, 5),
(8, 'La salle est magnifique , je suis vraiment motivÃ©.', 2, 2),
(9, 'Hotel magnifique', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(60) DEFAULT 'img/profile.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `email`, `password`, `img`) VALUES
(1, 'Yacine', 'yacinegauchi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'img/Photo.jpeg'),
(2, 'Amayas', 'amayas@gmail.com', 'bed128365216c019988915ed3add75fb', 'img/mayas.jpg'),
(3, 'Anais', 'anais@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'img/profile.jpeg'),
(4, 'Mouh', 'Mouhendbelkacemi2@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'img/profile.jpeg'),
(5, 'Inconnu', 'inconnu@hotmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'img/profile.jpeg'),
(6, 'Hakim', 'hakim@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'img/profile.jpeg'),
(7, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'img/profile.jpeg'),
(8, 'amine', 'ould@gmail.com', 'fbf103ea2f7402edacf3d54bf7a4ee4a', 'img/profile.jpeg'),
(9, 'samir', 'samir@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'img/profile.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id_et` int(11) NOT NULL,
  `nom_et` varchar(40) NOT NULL,
  `cat` varchar(40) NOT NULL,
  `descr` text NOT NULL,
  `adr` varchar(255) NOT NULL,
  `tel` int(12) DEFAULT NULL,
  `wilaya` varchar(40) NOT NULL,
  `image_et` varchar(60) DEFAULT 'img/default.jpg',
  `site` varchar(60) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `NbrLike` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`id_et`, `nom_et`, `cat`, `descr`, `adr`, `tel`, `wilaya`, `image_et`, `site`, `email`, `mdp`, `NbrLike`) VALUES
(1, 'The Twelve', 'Restaurant', 'The Twelve Est une chaÃ®ne de restauration rapide algÃ©rienne prÃ©sente dans la wilaya de Tizi-Ouzou, fondÃ©e en 2017.', 'Tour Ouarab Ali,Boulevard Krim Belkacem ,Tizi Ouzou', 541247854, 'Tizi Ouzou', 'img/twelve.jpg', NULL, NULL, NULL, 0),
(2, 'Need For Gym', 'Salle de sport', 'Centre sportif et de bien-Ãªtre de standing international situÃ© Ã  Tizi-Ouzou.', 'Lotissement sud ouest.', 26193969, 'Tizi Ouzou', 'img/Need.jpg', NULL, 'contact@needforgym.com', NULL, 0),
(3, 'Ittourar', 'Hotel', 'Lâ€™HOTEL ITTOURAR est un Ã©tablissement rÃ©pondant aux critÃ¨res de lâ€™originalitÃ© et la perfection du service ; prÃªt Ã  dÃ©tacher de nouveaux standards de conforts.', 'Lotissement Ameyoud 09 Bd nouvelle ville 15000 tizi-ouzou.', 26185050, 'Tizi Ouzou', 'img/ittourar.jpg', NULL, NULL, NULL, 0),
(4, 'RODINA HOTEL ', 'Hotel', 'Rodina .. La finesse de lâ€™hÃ´tellerie.', '47 Avenue de l\'ANP, Oran 31000', 41137138, 'Oran', 'img/rodina.jpg', NULL, NULL, NULL, 0),
(5, 'TACOS Burritos', 'Restaurant', 'GoÃ»tez la diffÃ©rence', 'Chemin sidi Yahia Bir Mourad rais 16000 Alger ,AlgÃ©ria', 560036969, 'Alger', 'img/tacos.jpg', NULL, 'tacosburritosfood@gmail.com', NULL, 0),
(6, 'Tp', 'espace vert', 'Tp11', 'nouvelle ville', 5478965, 'Tizi Ouzou', NULL, NULL, 'yacinne@gmail.com', NULL, 0),
(7, 'test', 'hopital', 'test de la soutenance', 'bastos tizi ouzou', 559736240, 'Tizi Ouzou', NULL, NULL, 'yacine@gmail.com', NULL, 0),
(8, 'test2', 'hotel', 'test 2', 'bastos tizi ouzou', 55976240, 'tizi Ouzou', NULL, NULL, 'test@gmail.com', NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id_et`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id_et` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
