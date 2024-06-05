-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 06 juin 2024 à 00:08
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
-- Base de données : `maindb`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id_billet` int(11) NOT NULL,
  `id_prix` int(11) NOT NULL,
  `id_diffusion` int(11) NOT NULL,
  `visa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `id_capteur` int(11) NOT NULL,
  `nom_capteur` text NOT NULL,
  `id_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`id_capteur`, `nom_capteur`, `id_salle`) VALUES
(1, 'capteur1', 1),
(2, 'capteur2', 2),
(3, 'capteur3', 3),
(4, 'capteur4', 4),
(5, 'capteur5', 5);

-- --------------------------------------------------------

--
-- Structure de la table `cgu`
--

CREATE TABLE `cgu` (
  `id_cgu` int(11) NOT NULL,
  `titre` text NOT NULL,
  `texte` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cgu`
--

INSERT INTO `cgu` (`id_cgu`, `titre`, `texte`) VALUES
(1, 'Objets', 'Les présentes Conditions Générales d\'Utilisation (CGU) ont pour objet de définir les modalités de mise à disposition des services du site de gestion de cinéma (ci-après \"le Site\") et les conditions d\'utilisation par l\'utilisateur (ci-après \"l\'Utilisateur\").\r\n'),
(2, 'Acceptation des CGU', 'L\'accès et l\'utilisation du Site sont soumis à l\'acceptation des présentes CGU. En accédant et en utilisant le Site, l\'Utilisateur accepte sans réserve les présentes CGU.\r\n'),
(3, 'Description des services', 'Le Site propose divers services liés à la gestion de cinéma, tels que :\r\n\r\n        La réservation de billets de cinéma\r\n        L\'affichage des horaires des séances\r\n        Visualisation des mesures capteurs\r\n'),
(4, 'Accès au site', 'Le Site est accessible gratuitement à tout Utilisateur disposant d\'un accès à Internet. Tous les coûts afférents à l\'accès au Site, que ce soit les frais matériels, logiciels ou d\'accès à Internet, sont exclusivement à la charge de l\'Utilisateur.\r\n'),
(5, 'Compte Utilisateur', 'Pour accéder à certains services, l\'Utilisateur doit créer un compte. L\'Utilisateur s\'engage à fournir des informations exactes et à jour. Il est responsable de la confidentialité de ses identifiants de connexion.\r\n'),
(6, 'Utilisation des services', 'L\'Utilisateur s\'engage à utiliser le Site conformément aux lois et règlements en vigueur. Il s\'interdit de :\r\n\r\n        Utiliser le Site de manière illégale ou frauduleuse\r\n        Perturber le bon fonctionnement du Site\r\n        Utiliser les données personnelles d\'autres Utilisateurs'),
(7, 'Propriété intelectuelle', 'Le contenu du Site, y compris mais sans s\'y limiter, les textes, images, vidéos, graphismes, logos, et icônes, est la propriété exclusive de la société SoundOnAir ou de ses partenaires. Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du Site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de SoundOnAir.\r\n'),
(8, 'Protection des données personnelles', 'Le traitement des données personnelles de l\'Utilisateur est effectué conformément à la politique de confidentialité accessible sur le Site.\r\n'),
(9, 'Limitation de responsabilité', 'SoundOnAir ne pourra être tenue responsable des dommages directs ou indirects résultant de l\'utilisation ou de l\'impossibilité d\'utiliser le Site. SoundOnAir décline toute responsabilité quant à l\'exactitude et à la pertinence des informations disponibles sur le Site.\r\n'),
(10, 'Modification des CGU', 'SoundOnAir se réserve le droit de modifier les présentes CGU à tout moment. Les modifications entreront en vigueur dès leur publication sur le Site. L\'Utilisateur est invité à consulter régulièrement les CGU.\r\n'),
(11, 'Droit applicable et juridiction compétente', 'Les présentes CGU sont régies par le droit français. Tout litige relatif à leur interprétation et/ou à leur exécution relève des tribunaux compétents de Paris.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `cinema`
--

CREATE TABLE `cinema` (
  `id_cinema` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `adresse` varchar(128) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(32) NOT NULL,
  `id_gerant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `types` set('ADMIN','OWNER','DEFAULT') NOT NULL DEFAULT 'DEFAULT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `mail`, `pwd`, `types`) VALUES
(1, 'matthieu.legarrec@eleve.isep.fr', '098f6bcd4621d373cade4e832627b4f6', 'ADMIN'),
(2, 'jade.lopes@eleve.isep.fr', '49d02d55ad10973b7b9d0dc9eba7fdf0', 'DEFAULT');

-- --------------------------------------------------------

--
-- Structure de la table `diffuser`
--

CREATE TABLE `diffuser` (
  `id_diffusion` int(11) NOT NULL,
  `heureDebut` varchar(7) NOT NULL,
  `heureFin` varchar(7) NOT NULL,
  `langue` varchar(11) NOT NULL COMMENT 'VOSFR / VF',
  `id_salle` int(11) NOT NULL,
  `visa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `diffuser`
--

INSERT INTO `diffuser` (`id_diffusion`, `heureDebut`, `heureFin`, `langue`, `id_salle`, `visa`) VALUES
(1, '17:00', '19:15', 'VOSTFR', 2, 10),
(2, '19:30', '21:45', 'VOSTFR', 3, 10),
(3, '21:55', '00:15', 'VF', 4, 10),
(14, '17:00', '19:15', 'VOSTFR', 1, 11),
(15, '17:00', '19:15', 'VOSTFR', 1, 12),
(16, '17:00', '19:15', 'VOSTFR', 1, 13),
(17, '17:00', '19:15', 'VOSTFR', 1, 14),
(18, '17:00', '19:15', 'VOSTFR', 1, 15),
(19, '17:00', '19:15', 'VOSTFR', 1, 16),
(20, '17:00', '19:15', 'VOSTFR', 1, 17),
(21, '17:00', '19:15', 'VOSTFR', 1, 18),
(22, '17:00', '19:15', 'VOSTFR', 1, 19),
(23, '17:00', '19:15', 'VOSTFR', 1, 20),
(24, '19:30', '21:45', 'VOSTFR', 3, 11),
(25, '19:30', '21:45', 'VOSTFR', 3, 12),
(26, '19:30', '21:45', 'VOSTFR', 3, 13),
(27, '19:30', '21:45', 'VOSTFR', 3, 14),
(28, '19:30', '21:45', 'VOSTFR', 3, 15),
(29, '19:30', '21:45', 'VOSTFR', 3, 16),
(30, '19:30', '21:45', 'VOSTFR', 3, 17),
(31, '19:30', '21:45', 'VOSTFR', 3, 21),
(32, '19:30', '21:45', 'VOSTFR', 3, 18),
(33, '19:30', '21:45', 'VOSTFR', 3, 19),
(34, '19:30', '21:45', 'VOSTFR', 3, 20),
(35, '21:55', '00:15', 'VF', 4, 11),
(37, '21:55', '00:15', 'VF', 4, 12),
(38, '21:55', '00:15', 'VF', 4, 13),
(39, '21:55', '00:15', 'VF', 4, 14),
(40, '21:55', '00:15', 'VF', 4, 15),
(41, '21:55', '00:15', 'VF', 4, 16),
(42, '21:55', '00:15', 'VF', 4, 17),
(43, '21:55', '00:15', 'VF', 4, 18),
(44, '21:55', '00:15', 'VF', 4, 19),
(45, '21:55', '00:15', 'VF', 4, 20);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `created_at`) VALUES
(2, 'Quels sont les horaires des séances ?', 'Les horaires des séances varient en fonction des films et des jours. Vous pouvez consulter les horaires actuels en visitant notre page de programmation sur notre site web ou en téléchargeant notre application mobile.', '2024-06-04 20:54:46'),
(3, 'Comment acheter des billets en ligne ?  ', 'Pour acheter des billets en ligne, sélectionnez le film et la séance de votre choix sur notre site, puis suivez les instructions pour finaliser votre achat. Vous recevrez vos billets par e-mail.', '2024-06-04 20:55:36'),
(4, 'Y a-t-il des réductions pour les enfants, les étudiants ou les seniors ?', 'Oui, nous offrons des tarifs réduits pour les enfants, les étudiants et les seniors. Veuillez présenter une pièce d\'identité valide au moment de l\'achat pour bénéficier de ces réductions.', '2024-06-04 20:56:16'),
(5, 'Quels types de films proposez-vous ?', 'Nous proposons une large sélection de films, y compris des nouveautés, des classiques, des films d\'auteur, des films en version originale et doublée, ainsi que des projections spéciales et des festivals de cinéma.', '2024-06-04 20:57:00'),
(6, 'Quels types de films proposez-vous ?', 'Nous proposons une large sélection de films, y compris des nouveautés, des classiques, des films d\'auteur, des films en version originale et doublée, ainsi que des projections spéciales et des festivals de cinéma.', '2024-06-04 21:00:28'),
(8, 'Avez-vous des offres spéciales pour les groupes ?', 'Oui, nous proposons des tarifs spéciaux pour les groupes. Veuillez contacter notre service clientèle pour plus d\'informations et pour faire une réservation de groupe.\r\n', '2024-06-04 21:02:16'),
(9, 'Puis-je apporter ma propre nourriture et boisson ?', 'Non, il est interdit d\'apporter de la nourriture et des boissons extérieures. Nous vous invitons à profiter de notre large sélection de snacks et de boissons disponibles à la concession.', '2024-06-04 21:03:27'),
(10, 'Proposez-vous des séances en langue originale ?', 'Oui, nous proposons régulièrement des séances en version originale sous-titrée. Consultez notre programmation pour connaître les horaires des séances en VO.', '2024-06-04 21:03:49');

-- --------------------------------------------------------

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
(14, 'Dune 2', 'Denis Villeneuve', 'Drame, Science Fiction', '2h46', 'Dans DUNE : DEUXIÈME PARTIE, Paul Atreides s’unit à Chani et aux Fremen pour mener la révolte contre ceux qui ont anéanti sa famille. Hanté par de sombres prémonitions, il se trouve confronté au plus grand des dilemmes : choisir entre l’amour de sa vie et le destin de l’univers.', 'Tout public avec avertissement\r\nAvertissement : des scènes, des propos ou des images peuvent heurter la sensibilité des spectateurs.', '28 février 2024', 'https://fr.web.img2.acsta.net/c_310_420/pictures/24/01/26/10/18/5392835.jpg'),
(15, 'Vice Versa 2', 'Kelsey Mann', 'Aventure, Animation, Comédie, Famille', '1h36', 'Fraichement diplômée, Riley est désormais une adolescente, ce qui n’est pas sans déclencher un chamboulement majeur au sein du quartier général qui doit faire face à quelque chose d’inattendu : l’arrivée de nouvelles émotions ! Joie, Tristesse, Colère, Peur et Dégoût - qui ont longtemps fonctionné avec succès - ne savent pas trop comment réagir lorsqu’Anxiété débarque. Et il semble qu\'elle ne soit pas la seule...\r\n\r\n', 'Tout public.', '19 juin 2024', 'https://fr.web.img5.acsta.net/c_310_420/img/f5/4c/f54c3310f101fe8ae4bba9e566bca1b5.jpg'),
(16, 'Kung Fu Panda 4', 'Mike Mitchell (V), Stephanie Stine', 'Aventure, Animation, Comédie, Famille, Arts Martiaux', '1h34', 'Après trois aventures dans lesquelles le guerrier dragon Po a combattu les maîtres du mal les plus redoutables grâce à un courage et des compétences en arts martiaux inégalés, le destin va de nouveau frapper à sa porte pour … l’inviter à enfin se reposer. Plus précisément, pour être nommé chef spirituel de la vallée de la Paix. Cela pose quelques problèmes évidents. Premièrement, Po maîtrise aussi bien le leadership spirituel que les régimes, et deuxièmement, il doit rapidement trouver et entraîner un nouveau guerrier dragon avant de pouvoir profiter des avantages de sa prestigieuse promotion. Pire encore, il est question de l’apparition récente d’une sorcière aussi mal intentionnée que puissante, Caméléone, une lézarde minuscule qui peut se métamorphoser en n\'importe quelle créature, et ce sans distinction de taille. Or Caméléone lorgne de ses petits yeux avides et perçants sur le bâton de sagesse de Po, à l’aide duquel elle espère bien pouvoir réinvoquer du royaume des esprits tous les maîtres maléfiques que notre guerrier dragon a vaincu. Po va devoir trouver de l’aide. Il va en trouver (ou pas ?) auprès de Zhen, une renarde corsac, voleuse aussi rusée que vive d\'esprit, qui a le don d’irriter Po mais dont les compétences vont s’avérer précieuses. Afin de réussir à protéger la Vallée de la Paix des griffes reptiliennes de Caméléone, ce drôle de duo va devoir trouver un terrain d’entente. Ce sera l’occasion pour Po de découvrir que les héros ne sont pas toujours là où on les attend.', 'Tout public.', '27 mars 2024', 'https://fr.web.img4.acsta.net/c_310_420/pictures/24/02/20/12/28/5505684.jpg'),
(17, 'Monkey Man', 'Dev Patel', 'Action, Thriller', '2h00', 'Ce film aborde la quête initiatique d\'un homme qui cherche à se venger des dirigeants corrompus qui ont assassiné sa mère et maintiennent les pauvres et les plus vulnérables de la société dans une constante précarité.\r\n\r\nInspiré de la légende d’Hanuman, l’homme singe, personnage mythique et véritable incarnation de la force et du courage en Inde, le film met en vedette Dev Patel lui-même, dans le rôle de Kid, un gamin des rues qui, après l\'horrible massacre de son village natal, a grandi orphelin dans les bas fonds de la ville fictive de Yatana. Il finit par gagner sa vie dans un club qui organise des combats clandestins où dissimulé derrière un masque de gorille, il se laisse battre au sang par des adversaires pour de l\'argent.\r\n\r\nAprès toutes ces années à contenir sa rage le jeune homme trouve le moyen d\'accéder à la sinistre élite de la ville. Subitement submergé par son traumatisme d\'enfance il va se retourner violemment contre ceux qui lui ont tout pris et trouver ce que les mystérieuses cicatrices de ses mains cachent en vérité.', 'Interdit - 12 ans. Certaines scènes particulièrement violentes sont susceptibles de choquer un public sensible.', '17 avril 2024', 'https://fr.web.img6.acsta.net/c_310_420/pictures/24/01/30/14/11/4017896.jpg'),
(18, 'Godzilla x Kong : Le Nouvel Empire', 'Adam Wingard', 'Action, Fantastique, Science Fiction', '1h55', 'Le tout-puissant Kong et le redoutable Godzilla unissent leurs forces contre une terrible menace encore secrète qui risque de les anéantir et qui met en danger la survie même de l’espèce humaine. GODZILLA X KONG : LE NOUVEL EMPIRE remonte à l’origine des deux titans et aux mystères de Skull Island, tout en révélant le combat mythique qui a contribué à façonner ces deux créatures hors du commun et lié leur sort à celui de l’homme pour toujours….', 'Tout public.', '3 avril 2024', 'https://fr.web.img3.acsta.net/c_310_420/pictures/24/02/20/16/25/2308963.jpg'),
(19, 'Furiosa: une saga Mad Max', 'George Miller ', 'Action, Science Fiction', '2h28', 'Dans un monde en déclin, la jeune Furiosa est arrachée à la Terre Verte et capturée par une horde de motards dirigée par le redoutable Dementus. Alors qu’elle tente de survivre à la Désolation, à Immortan Joe et de retrouver le chemin de chez elle, Furiosa n’a qu’une seule obsession : la vengeance.', '', '22 mai 2024', 'https://www.premiere.fr/sites/default/files/styles/scale_crop_border_white_1280x720/public/2023-12/Furiosa-poster.jpeg'),
(20, 'Challengers', 'Luca Guadagnino', 'Drame, Romance', '2h11', 'Durant leurs études, Patrick et Art, tombent amoureux de Tashi. À la fois amis, amants et rivaux, ils voient tous les trois leurs chemins se recroiser des années plus tard. Leur passé et leur présent s’entrechoquent et des tensions jusque-là inavouées refont surface.', 'Le film contient des scènes qui peuvent choquer, veuillez prendre en considération les avertissements pour une expérience cinématographique adaptée à votre sensibilité.', '24 avril 2024', 'https://fr.web.img2.acsta.net/c_310_420/pictures/24/01/15/10/08/2202044.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `gerant`
--

CREATE TABLE `gerant` (
  `id_gerant` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mail` varchar(320) NOT NULL,
  `id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gerant`
--

INSERT INTO `gerant` (`id_gerant`, `nom`, `prenom`, `mail`, `id_compte`) VALUES
(1, 'Le Garrec', 'Matthieu', 'matthieu.legarrec@eleve.isep.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mentions_legales`
--

CREATE TABLE `mentions_legales` (
  `id_ml` int(11) NOT NULL,
  `titre` text NOT NULL,
  `texte` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mentions_legales`
--

INSERT INTO `mentions_legales` (`id_ml`, `titre`, `texte`) VALUES
(1, 'Éditeur du site\r\n', 'Nom de l\'entreprise : SoundOnAir\r\n    Adresse : 10 rue des olivier Paris 75010\r\n    Téléphone : 06 07 08 09 10\r\n    Email : soundonaircontact@gmail.com\r\n    Directeur de la publication :\r\n'),
(2, 'Hébergeur du site', 'Nom de l\'hébergeur : [Nom de l\'hébergeur]\r\n    Adresse de l\'hébergeur : [Adresse de l\'hébergeur]\r\n    Téléphone : [Numéro de téléphone de l\'hébergeur]\r\n    Email : [Adresse email de l\'hébergeur]'),
(3, 'Protection des données personnelles', 'Conformément à la loi \"Informatique et Libertés\" du 6 janvier 1978 modifiée et au Règlement Général sur la Protection des Données (RGPD), l\'Utilisateur dispose d\'un droit d\'accès, de rectification, de suppression et d\'opposition aux données personnelles le concernant. Pour exercer ces droits, l\'Utilisateur peut contacter SoundOnAir à l\'adresse suivante : soundonaircontact@gmail.com.\r\n'),
(4, 'Propriété intellectuelle', 'Tous les contenus présents sur le Site sont protégés par les droits de propriété intellectuelle détenus par SoundOnAir ou ses partenaires. Toute reproduction, représentation, diffusion ou rediffusion, en tout ou partie, du contenu du Site, par quelque procédé que ce soit, sans l\'autorisation préalable et écrite de SoundOnAir, est interdite.\r\n'),
(5, 'Cookies', 'Le Site utilise des cookies pour améliorer l\'expérience de l\'Utilisateur. En naviguant sur le Site, l\'Utilisateur accepte l\'utilisation des cookies conformément à la politique de cookies disponible sur le Site.\r\n'),
(6, 'Liens hypertextes', 'Le Site peut contenir des liens hypertextes vers d\'autres sites. SoundOnAir n\'exerce aucun contrôle sur ces sites et décline toute responsabilité quant à leur contenu ou leur politique de confidentialité.\r\n\r\n    Pour toute question concernant les présentes mentions légales et les CGU, l\'Utilisateur peut contacter SoundOnAir via l\'adresse email suivante : soundonaircontact@gmail.com.\r\n\r\n    Assurez-vous de personnaliser les informations spécifiques, telles que le nom de l\'entreprise, les coordonnées, et d\'ajuster les termes selon les besoins particuliers de votre site de gestion de cinéma.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `objet` varchar(100) DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

CREATE TABLE `mesure` (
  `id_mesure` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `vol_snd` float NOT NULL COMMENT 'volume sonore(sound)',
  `pwr_dsp` float NOT NULL COMMENT 'puissance (power) DSP',
  `qualite` set('Très bonne','Moyene','Mauvaise') NOT NULL,
  `id_capteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mesure`
--

INSERT INTO `mesure` (`id_mesure`, `date`, `heure`, `vol_snd`, `pwr_dsp`, `qualite`, `id_capteur`) VALUES
(1, '2024-05-31', '17:45:00', 90, 1358, 'Très bonne', 1),
(2, '2024-05-31', '19:25:00', 81, 1780, 'Moyene', 2),
(3, '2024-05-31', '21:35:00', 70, 1214, 'Mauvaise', 3),
(4, '2024-05-31', '17:55:00', 90, 1214, 'Très bonne', 4),
(5, '2024-05-31', '18:45:00', 90, 1389, 'Très bonne', 5);

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

CREATE TABLE `prix` (
  `id_prix` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_diffusion` int(11) NOT NULL,
  `type` set('FULL','SENIOR','ETUDIANT','ENFANT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prix`
--

INSERT INTO `prix` (`id_prix`, `prix`, `id_diffusion`, `type`) VALUES
(1, 10, 1, 'FULL'),
(2, 12, 2, 'SENIOR'),
(3, 10, 3, 'FULL'),
(6, 10, 14, 'FULL'),
(7, 10, 15, 'FULL'),
(8, 10, 16, 'FULL'),
(9, 10, 17, 'FULL'),
(10, 10, 18, 'FULL'),
(11, 10, 19, 'FULL'),
(12, 10, 20, 'FULL'),
(13, 10, 21, 'FULL'),
(14, 10, 22, 'FULL'),
(15, 10, 23, 'FULL'),
(16, 10, 24, 'FULL'),
(17, 10, 25, 'FULL'),
(18, 10, 26, 'FULL'),
(19, 10, 27, 'FULL'),
(20, 10, 28, 'FULL'),
(21, 10, 29, 'FULL'),
(22, 10, 30, 'FULL'),
(23, 10, 31, 'FULL'),
(24, 10, 32, 'FULL'),
(25, 10, 33, 'FULL'),
(26, 10, 34, 'FULL'),
(27, 10, 35, 'FULL'),
(29, 10, 37, 'FULL'),
(30, 10, 38, 'FULL'),
(31, 10, 39, 'FULL'),
(32, 10, 40, 'FULL'),
(33, 10, 41, 'FULL'),
(34, 10, 42, 'FULL'),
(35, 10, 43, 'FULL'),
(36, 10, 44, 'FULL'),
(37, 10, 45, 'FULL');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(32) NOT NULL,
  `nb_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `nb_hp`) VALUES
(1, '1', 4),
(2, '2', 4),
(3, '3', 4),
(4, '4', 4);

-- --------------------------------------------------------

--
-- Structure de la table `spectateur`
--

CREATE TABLE `spectateur` (
  `id_spectateur` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `adresse` varchar(128) NOT NULL,
  `code_postal` char(5) NOT NULL,
  `ville` varchar(64) NOT NULL,
  `date_naissance` date NOT NULL,
  `mail` varchar(320) NOT NULL,
  `id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `spectateur`
--

INSERT INTO `spectateur` (`id_spectateur`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `date_naissance`, `mail`, `id_compte`) VALUES
(1, 'Lopes', 'Jade', '88 Avenue de Jean Jaures', '75019', 'Paris', '2003-05-03', 'jade.lopes@eleve.isep.fr', 2);

-- --------------------------------------------------------

--
-- Structure de la table `visionner`
--

CREATE TABLE `visionner` (
  `id_visionnage` int(11) NOT NULL,
  `id_spectateur` int(11) NOT NULL,
  `id_diffusion` int(11) NOT NULL,
  `critique` tinytext NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_billet`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id_capteur`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Index pour la table `cgu`
--
ALTER TABLE `cgu`
  ADD PRIMARY KEY (`id_cgu`);

--
-- Index pour la table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id_cinema`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`);

--
-- Index pour la table `diffuser`
--
ALTER TABLE `diffuser`
  ADD PRIMARY KEY (`id_diffusion`),
  ADD KEY `id_salle` (`id_salle`),
  ADD KEY `visa` (`visa`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`visa`);

--
-- Index pour la table `gerant`
--
ALTER TABLE `gerant`
  ADD PRIMARY KEY (`id_gerant`);

--
-- Index pour la table `mentions_legales`
--
ALTER TABLE `mentions_legales`
  ADD PRIMARY KEY (`id_ml`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD PRIMARY KEY (`id_mesure`);

--
-- Index pour la table `prix`
--
ALTER TABLE `prix`
  ADD PRIMARY KEY (`id_prix`),
  ADD KEY `id_diffusion` (`id_diffusion`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `spectateur`
--
ALTER TABLE `spectateur`
  ADD PRIMARY KEY (`id_spectateur`);

--
-- Index pour la table `visionner`
--
ALTER TABLE `visionner`
  ADD PRIMARY KEY (`id_visionnage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id_capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cgu`
--
ALTER TABLE `cgu`
  MODIFY `id_cgu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id_cinema` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `diffuser`
--
ALTER TABLE `diffuser`
  MODIFY `id_diffusion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `gerant`
--
ALTER TABLE `gerant`
  MODIFY `id_gerant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mentions_legales`
--
ALTER TABLE `mentions_legales`
  MODIFY `id_ml` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mesure`
--
ALTER TABLE `mesure`
  MODIFY `id_mesure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `prix`
--
ALTER TABLE `prix`
  MODIFY `id_prix` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `spectateur`
--
ALTER TABLE `spectateur`
  MODIFY `id_spectateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `visionner`
--
ALTER TABLE `visionner`
  MODIFY `id_visionnage` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `prix`
--
ALTER TABLE `prix`
  ADD CONSTRAINT `fk_id_diffusion` FOREIGN KEY (`id_diffusion`) REFERENCES `diffuser` (`id_diffusion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
