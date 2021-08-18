-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 27 juil. 2021 à 14:57
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eval_grec`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(155) NOT NULL,
  `content` varchar(8000) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(155) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_article`),
  UNIQUE KEY `unique*` (`title`),
  KEY `fk_article_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `title`, `content`, `time`, `image`, `id_user`) VALUES
(22, 'Le tueur de dieux', 'Kratos est le principal protagoniste de la série God of War. Un guerrier spartiate, né à Sparta, Kratos était un soldat respecté et général jusqu\'à ce qu\'il perde sa femme et fille à cause de la tromperie d\'Arès, qu\'il servait alors. Une fois qu\'il a tué Arès et obtenu le pardon des autres dieux de l\'Olympe, il est devenu le nouveau Dieu de la guerre. Zeus le trahit ensuite, Kratos survit et décide de prendre sa revanche sur le Dieu des Dieux, libérant au passage les maux sur la Terre.\r\nAprès avoir réussi sa vengeance, Kratos s’échappa dans le monde des dieux nordiques en s’installant à Midgard dans l’ancienne Norvège où il épousa une autre femme nommée Faye et donna naissance à un fils nommé Atreus. cendres au plus haut sommet des neuf royaumes.', '2021-07-27 13:51:46', 'kratos.jpg', 6),
(23, 'Celle qui fait brûler ton cosmos', 'Athéna (アテナ, Atena) est un personnage de Saint Seiya. C\'est la déesse protagoniste des différentes séries Saint Seiya. Elle est la gardienne de la Terre et a créé une armée de chevaliers parmi les terriens afin de la protéger ainsi que leur planète contre les forces maléfiques qui sont souvent dirigées par des dieux. Elle se réincarne tous les 220 ans et ainsi eut plusieurs identités différentes au cours de ces réincarnations.', '2021-07-27 13:53:16', 'athena.jpg', 6),
(24, 'De zero en hero', 'Hercule est un jeune garçon, fils des dieux de l\'Olympe, enlevé et transformé en demi-mortel par son oncle, le terrible Hadès. Il cherche en vain à prouver à son père, le grand Zeus, qu\'il peut devenir quelqu\'un, plus particulièrement qu\'il peut réussir à être un héros et par ce fait, ne plus causer du tort aux gens mais les aider. Bien qu\'il possède une force surhumaine, Hercule semble néanmoins avoir un sens aigu pour s\'attirer les ennuis et une maladresse à toute épreuve. Il décide donc d\'aller trouver Philoctète, l\'entraîneur des héros les plus légendaires, afin qu\'il s\'occupe de lui. Celui-ci accepte (contraint et forcé) et fait de lui un grand héros…\r\n\r\nAprès avoir combattu les monstres envoyés par Hadès, en particulier, l’hydre de Lerne, Hercule devient la star en Grèce. Désormais le jeune adolescent maladroit est devenu célèbre, riche et musclé. Il s’estime être un véritable héros, mais est fortement perturbé quand Zeus lui dit qu\'il ne l’est pas encore tout à fait. Mégara, sous les ordres d’Hadès, l’aguiche sans penser qu’elle aussi pourrait tomber amoureuse. Philoctète, qui comprend que Mégara se joue de lui, le met en garde. Hercule ne le croit pas et tombe dans le piège. Il fait un pacte avec Hadès consistant à renoncer à sa force durant 24h (le temps de conquérir l’Olympe). Hadès lui révèle le rôle qu’avait Mégara dans son plan machiavélique et envoie, ensuite, un cyclope afin de tuer Hercule. Sans sa force surhumaine, Hercule est malmené, mais, grâce à son intelligence, il triomphe du monstre. Un pilier, tombé sur Mégara lors de la chute du cyclope, poussera Hercule à aller chercher l’âme de sa bien-aimée aux Enfers.\r\n\r\nAvant de sauver Mégara, il anéantit les Titans. Après avoir sauvé tous les dieux grecs, il se voit invité par son père à vivre sur le mont Olympe (ce qui, à l’origine, était son plus cher désir). Il décide néanmoins de vivre sa vie sur terre comme un homme et estime qu’une vie même immortelle sans Mégara ne vaudrait pas la peine d’être vécue..', '2021-07-27 13:54:22', 'heracles.jpg', 6),
(25, 'Des etincelles qui vendent du reve', 'Aptitude Leader : Augmente la/le(s) Puissance d\'Attaque du monstre allié de 33%.\r\n\r\nPoussée de force: 360%(dégâts)\r\nNiv.2 Dégâts +5%\r\nNiv.3 Dégâts +5%\r\nNiv.4 Dégâts +10%\r\nNiv.5 Dégâts +10%\r\n\r\nVague balayante: 270%(dégâts)(Réutilisable dans 5 tour(s))\r\nNiv.2 Temps de pause -1\r\n\r\nMaelström: 495%(dégâts)(Réutilisable dans 6 tour(s))\r\nNiv.2 Dégâts +10%\r\nNiv.3 Dégâts +10%\r\nNiv.4 Dégâts +10%\r\nNiv.5 Temps de pause -1', '2021-07-27 14:01:21', 'poseidon.jpg', 6),
(26, 'La moustache de la guerre', 'Arès est le redoutable Dieu de la Guerre et le fils de Zeus. Jaloux des hommes créés par son père, et les considérant comme néfastes pour la Terre, il voulut les éliminer, en faisant naître en eux la discorde, la haine, et la guerre. Arès s\'en prit par la suite aux autres Dieux et les tua tous, bien qu\'il fût vaincu par son père. Il refit surface pendant la Première Guerre Mondiale, montrant de l\'intérêt pour les nouvelles armes développées par les humains, spécifiquement le gaz mortel. Arès souhaitait amener l\'humanité à l\'utiliser contre elle-même.', '2021-07-27 14:02:25', 'ares.jpg', 6),
(27, 'Le point de retour dans ce dédale de l\'enfer', 'Hadès est le dieu des Enfers et des richesses minérales de la terre, le seigneur et maître de la Maison d\'Hadès et le père de Zagreus. Il est chargé de maintenir l\'ordre dans le monde souterrain, de déterminer les placements et les punitions des morts et d\'entendre les requêtes des ombres qui lui sont soumises.', '2021-07-27 14:06:37', 'hades.jpg', 6);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(155) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(3, 'admin'),
(4, 'classic');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(155) NOT NULL,
  `password` varchar(155) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `uniqu` (`pseudo`),
  KEY `fk_user_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `password`, `id_role`) VALUES
(6, 'admin', '$2y$10$KkWEJe5s8ICNyzTVU41Q5uk1Yv62hMf9ye8kNJnW5vuv6DyUefi9K', 3),
(7, 'test', '$2y$10$Y.dFXolPlZErxhE/uyUYLOJN6vdjImc.iriXJimltKEsDd.xL/W/.', 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
