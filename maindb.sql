-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 04:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `billet`
--

CREATE TABLE `billet` (
  `id_billet` int(24) NOT NULL,
  `id_prix` int(15) NOT NULL,
  `id_diffusion` int(15) NOT NULL,
  `visa` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `capteur`
--

CREATE TABLE `capteur` (
  `id_capteur` int(11) NOT NULL,
  `id_salle` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id_cinema` int(8) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `adresse` varchar(128) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `ville` varchar(32) NOT NULL,
  `id_gerant` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `type` set('ADMIN','OWNER','DEFAULT') NOT NULL DEFAULT 'DEFAULT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diffuser`
--

CREATE TABLE `diffuser` (
  `id_diffusion` int(16) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `id_salle` int(8) NOT NULL,
  `visa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

-- Structure de la table `film`
--

CREATE TABLE `film` (
  `visa` int(11) NOT NULL COMMENT 'Visa d''exploitation',
  `titre` varchar(256) NOT NULL,
  `realisateur` varchar(64) NOT NULL,
  `categorie` text NOT NULL,
  `duree` varchar(7) NOT NULL,
  `synopsis` text NOT NULL,
  `avertissement` text NOT NULL,
  `annee` text NOT NULL COMMENT 'date de sortie',
  `image` text NOT NULL COMMENT 'lien de l''image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`visa`, `titre`, `realisateur`, `categorie`, `duree`, `synopsis`, `avertissement`, `annee`, `image`) VALUES
(10, 'Fall Guy', 'David Leitch', 'Action, Comédie, Drame', '2h06', 'C\'est l\'histoire d\'un cascadeur, et comme tous les cascadeurs, il se fait tirer dessus, exploser, écraser, jeter par les fenêtres et tombe toujours de plus en plus haut… pour le plus grand plaisir du public. Après un accident qui a failli mettre fin à sa carrière, ce héros anonyme du cinéma va devoir retrouver une star portée disparue, déjouer un complot et tenter de reconquérir la femme de sa vie tout en bravant la mort tous les jours sur les plateaux. Que pourrait-il lui arriver de pire ?', 'Ce film contient des scènes de violence et de suspense qui peuvent ne pas convenir à tous les publics. La supervision parentale est recommandée pour les jeunes spectateurs.', '1er Mai 2024', 'https://fr.web.img3.acsta.net/r_1280_720/img/a9/6f/a96f3d0efdada3f8f497d1ebb6270205.jpg'),
(11, 'Civil War', 'Alex Garland', 'Action, Thriller', '1h49', 'Une course effrénée à travers une Amérique fracturée qui, dans un futur proche, est plus que jamais sur le fil du rasoir.', 'Interdit - 12 ans. Ce film contient des scènes de violence et de suspense qui peuvent ne pas convenir à tous les publics. La supervision parentale est recommandée pour les jeunes spectateurs.', '17 avril 2024', 'https://fr.web.img2.acsta.net/c_310_420/pictures/24/03/08/08/44/3432270.jpg'),
(12, 'La Planète des Singes : Le Nouveau Royaume', 'Wes Ball', ' Action, Aventure, Science Fiction', '2h25', 'Plusieurs générations après le règne de César, les singes ont définitivement pris le pouvoir. Les humains, quant à eux, ont régressé à l\'état sauvage et vivent en retrait. Alors qu\'un nouveau chef tyrannique construit peu à peu son empire, un jeune singe entreprend un périlleux voyage qui l\'amènera à questionner tout ce qu\'il sait du passé et à faire des choix qui définiront l\'avenir des singes et des humains...', 'Plusieurs scènes de violence peuvent générer une certaine angoisse et impressionner les personnes sensibles.', '8 mai 2024', 'https://fr.web.img2.acsta.net/c_310_420/pictures/23/11/03/09/01/4866574.jpg'),
(13, 'Une vie', 'James Hawes', 'Biopic, Drame', '1h 49', 'Prague, 1938. Alors que la ville est sur le point de tomber aux mains des nazis, un banquier londonien va tout mettre en œuvre pour sauver des centaines d’enfants promis à une mort certaine dans les camps de concentration. Au péril de sa vie, Nicholas Winton va organiser des convois vers l’Angleterre, où 669 enfants juifs trouveront refuge.\r\n\r\nCette histoire vraie, restée méconnue pendant des décennies, est dévoilée au monde entier lorsqu’en 1988, une émission britannique invite Nicholas à témoigner. Celui-ci ne se doute pas que dans le public se trouvent les enfants – désormais adultes – qui ont survécu grâce à lui...', 'Tout public.', '21 février 2024', 'https://fr.web.img6.acsta.net/c_310_420/pictures/24/01/29/09/23/3346514.jpg'),
(14, 'Dune 2', 'Denis Villeneuve', 'Drame, Science Fiction', '2h46', 'Dans DUNE : DEUXIÈME PARTIE, Paul Atreides s’unit à Chani et aux Fremen pour mener la révolte contre ceux qui ont anéanti sa famille. Hanté par de sombres prémonitions, il se trouve confronté au plus grand des dilemmes : choisir entre l’amour de sa vie et le destin de l’univers.', 'Tout public avec avertissement\r\nAvertissement : des scènes, des propos ou des images peuvent heurter la sensibilité des spectateurs.', '28 février 2024', 'https://fr.web.img2.acsta.net/c_310_420/pictures/24/01/26/10/18/5392835.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`visa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- --------------------------------------------------------

--
-- Table structure for table `gerant`
--

CREATE TABLE `gerant` (
  `id_gerant` int(8) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `tel` char(10) NOT NULL,
  `id_compte` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mesure`
--

CREATE TABLE `mesure` (
  `id_mesure` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `vol_snd` float NOT NULL COMMENT 'volume sonore(sound)',
  `pwr_dsp` float NOT NULL COMMENT 'puissance (power) DSP',
  `id_capteur` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prix`
--

CREATE TABLE `prix` (
  `id_prix` int(15) NOT NULL,
  `prix` decimal(2,2) NOT NULL,
  `id_diffusion` int(16) NOT NULL,
  `type` set('FULL','SENIOR','ETUDIANT','ENFANT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(8) NOT NULL,
  `nom_salle` varchar(32) NOT NULL,
  `nb_hp` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spectateur`
--

CREATE TABLE `spectateur` (
  `id_spectateur` int(10) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `adresse` varchar(128) NOT NULL,
  `code_postal` char(5) NOT NULL,
  `ville` varchar(64) NOT NULL,
  `date_naissance` date NOT NULL,
  `mail` varchar(320) NOT NULL,
  `id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visionner`
--

CREATE TABLE `visionner` (
  `id_visionnage` int(15) NOT NULL,
  `id_spectateur` int(8) NOT NULL,
  `id_diffusion` int(11) NOT NULL,
  `critique` tinytext NOT NULL,
  `note` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_billet`);

--
-- Indexes for table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id_capteur`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id_cinema`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`);

--
-- Indexes for table `diffuser`
--
ALTER TABLE `diffuser`
  ADD PRIMARY KEY (`id_diffusion`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`visa`);

--
-- Indexes for table `gerant`
--
ALTER TABLE `gerant`
  ADD PRIMARY KEY (`id_gerant`);

--
-- Indexes for table `mesure`
--
ALTER TABLE `mesure`
  ADD PRIMARY KEY (`id_mesure`);

--
-- Indexes for table `prix`
--
ALTER TABLE `prix`
  ADD PRIMARY KEY (`id_prix`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Indexes for table `spectateur`
--
ALTER TABLE `spectateur`
  ADD PRIMARY KEY (`id_spectateur`);

--
-- Indexes for table `visionner`
--
ALTER TABLE `visionner`
  ADD PRIMARY KEY (`id_visionnage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_billet` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id_capteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id_cinema` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diffuser`
--
ALTER TABLE `diffuser`
  MODIFY `id_diffusion` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gerant`
--
ALTER TABLE `gerant`
  MODIFY `id_gerant` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mesure`
--
ALTER TABLE `mesure`
  MODIFY `id_mesure` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prix`
--
ALTER TABLE `prix`
  MODIFY `id_prix` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spectateur`
--
ALTER TABLE `spectateur`
  MODIFY `id_spectateur` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visionner`
--
ALTER TABLE `visionner`
  MODIFY `id_visionnage` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
