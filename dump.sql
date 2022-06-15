-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour tempsdaime
CREATE DATABASE IF NOT EXISTS `tempsdaime` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `tempsdaime`;

-- Listage de la structure de la table tempsdaime. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tempsdaime.admin : ~1 rows (environ)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `nom`, `prenom`, `mail`, `mdp`) VALUES
	(4, 'Hine', 'Philipe', 'philipe@gmail.com', '$2y$10$LEKhiuVvv2TXn1l8Ncjd7./ogJhA4tiilpWbwiQYAGoVPUsgleWDm');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Listage de la structure de la table tempsdaime. a_propos
CREATE TABLE IF NOT EXISTS `a_propos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `descriptif_image` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `texte` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tempsdaime.a_propos : ~3 rows (environ)
/*!40000 ALTER TABLE `a_propos` DISABLE KEYS */;
INSERT INTO `a_propos` (`id`, `image`, `descriptif_image`, `titre`, `texte`) VALUES
	(1, 'app/public/Front/img/voyage.jpg', 'Voyage', 'I\'m designer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec sollicitudin dui. Vivamus eu luctus nisl, et tincidunt est. Suspendisse eleifend ante mi, non placerat eros semper ac.'),
	(2, 'app/public/Front/img/street.jpg', 'Ruelle de nuit', 'I\'m designer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec sollicitudin dui. Vivamus eu luctus nisl, et tincidunt est. Suspendisse eleifend ante mi, non placerat eros semper ac.'),
	(3, 'app/public/Front/img/plante.jpg', 'plante', 'I\'m designer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec sollicitudin dui. Vivamus eu luctus nisl, et tincidunt est. Suspendisse eleifend ante mi, non placerat eros semper ac.');
/*!40000 ALTER TABLE `a_propos` ENABLE KEYS */;

-- Listage de la structure de la table tempsdaime. blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `descriptif_image` varchar(255) NOT NULL,
  `id_categorie` int(11) unsigned NOT NULL,
  `date_article` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titre` varchar(255) NOT NULL,
  `texte` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`),
  CONSTRAINT `FK_blog_categories` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tempsdaime.blog : ~6 rows (environ)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `image`, `descriptif_image`, `id_categorie`, `date_article`, `titre`, `texte`) VALUES
	(13, 'app/public/Front/img/cat.jpg', 'Logo Chat', 3, '2022-04-21 14:18:18', 'Chat Pristi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id euismod ipsum, non vehicula neque. Mauris iaculis arcu ut ex blandit dictum. Fusce sit amet orci semper, posuere massa in, dapibus ipsum. Etiam maximus est lacus, non gravida dui pharetra vitae. Etiam consectetur tortor est. Ut dapibus massa at interdum auctor. Aenean justo sapien, scelerisque eget dolor non, eleifend lacinia neque.'),
	(14, 'app/public/Front/img/design-fleur.jpg', 'Design Fleur', 1, '2022-04-22 09:57:54', 'Design Fleur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id euismod ipsum, non vehicula neque. Mauris iaculis arcu ut ex blandit dictum. Fusce sit amet orci semper, posuere massa in, dapibus ipsum. Etiam maximus est lacus, non gravida dui pharetra vitae. Etiam consectetur tortor est. Ut dapibus massa at interdum auctor. Aenean justo sapien, scelerisque eget dolor non, eleifend lacinia neque.'),
	(15, 'app/public/Front/img/baskets-bleu.jpg', 'Chaussures Bleues', 3, '2022-04-22 10:04:52', 'Chaussures Bleues', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id euismod ipsum, non vehicula neque. Mauris iaculis arcu ut ex blandit dictum. Fusce sit amet orci semper, posuere massa in, dapibus ipsum. Etiam maximus est lacus, non gravida dui pharetra vitae. Etiam consectetur tortor est. Ut dapibus massa at interdum auctor. Aenean justo sapien, scelerisque eget dolor non, eleifend lacinia neque.'),
	(16, 'app/public/Front/img/cat.jpg', 'Logo Chat', 1, '2022-04-21 14:18:18', 'Chat Prisiti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id euismod ipsum, non vehicula neque. Mauris iaculis arcu ut ex blandit dictum. Fusce sit amet orci semper, posuere massa in, dapibus ipsum. Etiam maximus est lacus, non gravida dui pharetra vitae. Etiam consectetur tortor est. Ut dapibus massa at interdum auctor. Aenean justo sapien, scelerisque eget dolor non, eleifend lacinia neque.'),
	(17, 'app/public/Front/img/design-fleur.jpg', 'Design Fleur', 2, '2022-04-22 09:57:54', 'Design Fleur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id euismod ipsum, non vehicula neque. Mauris iaculis arcu ut ex blandit dictum. Fusce sit amet orci semper, posuere massa in, dapibus ipsum. Etiam maximus est lacus, non gravida dui pharetra vitae. Etiam consectetur tortor est. Ut dapibus massa at interdum auctor. Aenean justo sapien, scelerisque eget dolor non, eleifend lacinia neque.'),
	(18, 'app/public/Front/img/baskets-bleu.jpg', 'Chaussures Bleues', 2, '2022-04-22 10:04:52', 'Chaussures Bleues', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id euismod ipsum, non vehicula neque. Mauris iaculis arcu ut ex blandit dictum. Fusce sit amet orci semper, posuere massa in, dapibus ipsum. Etiam maximus est lacus, non gravida dui pharetra vitae. Etiam consectetur tortor est. Ut dapibus massa at interdum auctor. Aenean justo sapien, scelerisque eget dolor non, eleifend lacinia neque.');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Listage de la structure de la table tempsdaime. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tempsdaime.categories : ~3 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `categorie`) VALUES
	(1, 'Voyage'),
	(2, 'Lifestyle'),
	(3, 'Cuisine');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table tempsdaime. categories_folio
CREATE TABLE IF NOT EXISTS `categories_folio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tempsdaime.categories_folio : ~4 rows (environ)
/*!40000 ALTER TABLE `categories_folio` DISABLE KEYS */;
INSERT INTO `categories_folio` (`id`, `nom`) VALUES
	(1, 'Branding'),
	(2, 'Logo'),
	(3, 'Ui/Ux'),
	(4, 'Web Design');
/*!40000 ALTER TABLE `categories_folio` ENABLE KEYS */;

-- Listage de la structure de la table tempsdaime. contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `texte` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tempsdaime.contact : ~9 rows (environ)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `nom`, `mail`, `sujet`, `texte`, `created_at`) VALUES
	(1, 'Nala', 'nala@gmail.com', 'Devis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit velit, lobortis in nisl eu, ornare imperdiet eros. Sed eget arcu non nisl mollis commodo. Donec vel condimentum ante. In vehicula pharetra enim eu luctus. Proin eu dapibus ante. Duis maximus gravida enim non ultricies. Nulla facilisi. Ut elit justo, tempor id ultrices a, maximus at eros. Pellentesque massa massa, sagittis quis eros nec, venenatis tristique leo. Nulla congue nisl dolor, ullamcorper tincidunt felis porttitor non. Ut interdum ligula sed tortor vehicula porttitor.', '2022-06-14 11:23:17'),
	(2, 'Hiko', 'hiko@gmail.com', 'Devis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit velit, lobortis in nisl eu, ornare imperdiet eros. Sed eget arcu non nisl mollis commodo. Donec vel condimentum ante. In vehicula pharetra enim eu luctus. Proin eu dapibus ante. Duis maximus gravida enim non ultricies. Nulla facilisi. Ut elit justo, tempor id ultrices a, maximus at eros. Pellentesque massa massa, sagittis quis eros nec, venenatis tristique leo. Nulla congue nisl dolor, ullamcorper tincidunt felis porttitor non. Ut interdum ligula sed tortor vehicula porttitor.', '2022-06-14 11:23:17'),
	(3, 'Noé', 'noe@gmail.com', 'Devis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit velit, lobortis in nisl eu, ornare imperdiet eros. Sed eget arcu non nisl mollis commodo. Donec vel condimentum ante. In vehicula pharetra enim eu luctus. Proin eu dapibus ante. Duis maximus gravida enim non ultricies. Nulla facilisi. Ut elit justo, tempor id ultrices a, maximus at eros. Pellentesque massa massa, sagittis quis eros nec, venenatis tristique leo. Nulla congue nisl dolor, ullamcorper tincidunt felis porttitor non. Ut interdum ligula sed tortor vehicula porttitor.', '2022-06-14 11:23:17'),
	(5, 'Lilith', 'lilith@gmail.com', 'Devis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit velit, lobortis in nisl eu, ornare imperdiet eros. Sed eget arcu non nisl mollis commodo. Donec vel condimentum ante. In vehicula pharetra enim eu luctus. Proin eu dapibus ante. Duis maximus gravida enim non ultricies. Nulla facilisi. Ut elit justo, tempor id ultrices a, maximus at eros. Pellentesque massa massa, sagittis quis eros nec, venenatis tristique leo. Nulla congue nisl dolor, ullamcorper tincidunt felis porttitor non. Ut interdum ligula sed tortor vehicula porttitor.', '2022-06-14 11:23:17'),
	(10, 'Amara', 'amara@gmail.com', 'Devis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit velit, lobortis in nisl eu, ornare imperdiet eros. Sed eget arcu non nisl mollis commodo. Donec vel condimentum ante. In vehicula pharetra enim eu luctus. Proin eu dapibus ante. Duis maximus gravida enim non ultricies. Nulla facilisi. Ut elit justo, tempor id ultrices a, maximus at eros. Pellentesque massa massa, sagittis quis eros nec, venenatis tristique leo. Nulla congue nisl dolor, ullamcorper tincidunt felis porttitor non. Ut interdum ligula sed tortor vehicula porttitor.', '2022-06-14 11:23:17'),
	(11, 'Noé', 'noe@gmail.com', 'Devis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit velit, lobortis in nisl eu, ornare imperdiet eros. Sed eget arcu non nisl mollis commodo. Donec vel condimentum ante. In vehicula pharetra enim eu luctus. Proin eu dapibus ante. Duis maximus gravida enim non ultricies. Nulla facilisi. Ut elit justo, tempor id ultrices a, maximus at eros. Pellentesque massa massa, sagittis quis eros nec, venenatis tristique leo. Nulla congue nisl dolor, ullamcorper tincidunt felis porttitor non. Ut interdum ligula sed tortor vehicula porttitor.', '2022-06-14 11:23:17'),
	(12, 'Amara', 'amara@gmail.com', 'Devis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit velit, lobortis in nisl eu, ornare imperdiet eros. Sed eget arcu non nisl mollis commodo. Donec vel condimentum ante. In vehicula pharetra enim eu luctus. Proin eu dapibus ante. Duis maximus gravida enim non ultricies. Nulla facilisi. Ut elit justo, tempor id ultrices a, maximus at eros. Pellentesque massa massa, sagittis quis eros nec, venenatis tristique leo. Nulla congue nisl dolor, ullamcorper tincidunt felis porttitor non. Ut interdum ligula sed tortor vehicula porttitor.', '2022-06-14 11:23:17'),
	(13, 'Hiko', 'hiko@gmail.com', 'Devis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit velit, lobortis in nisl eu, ornare imperdiet eros. Sed eget arcu non nisl mollis commodo. Donec vel condimentum ante. In vehicula pharetra enim eu luctus. Proin eu dapibus ante. Duis maximus gravida enim non ultricies. Nulla facilisi. Ut elit justo, tempor id ultrices a, maximus at eros. Pellentesque massa massa, sagittis quis eros nec, venenatis tristique leo. Nulla congue nisl dolor, ullamcorper tincidunt felis porttitor non. Ut interdum ligula sed tortor vehicula porttitor.', '2022-06-14 11:23:17'),
	(14, 'Nala', 'nala@gmail.com', 'Devis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit velit, lobortis in nisl eu, ornare imperdiet eros. Sed eget arcu non nisl mollis commodo. Donec vel condimentum ante. In vehicula pharetra enim eu luctus. Proin eu dapibus ante. Duis maximus gravida enim non ultricies. Nulla facilisi. Ut elit justo, tempor id ultrices a, maximus at eros. Pellentesque massa massa, sagittis quis eros nec, venenatis tristique leo. Nulla congue nisl dolor, ullamcorper tincidunt felis porttitor non. Ut interdum ligula sed tortor vehicula porttitor.', '2022-06-14 11:23:17');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Listage de la structure de la table tempsdaime. portfolio
CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `alt` text NOT NULL,
  `id_catfolio` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_catfolio` (`id_catfolio`),
  CONSTRAINT `FK_portfolio_categories_folio` FOREIGN KEY (`id_catfolio`) REFERENCES `categories_folio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tempsdaime.portfolio : ~9 rows (environ)
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` (`id`, `image`, `alt`, `id_catfolio`) VALUES
	(1, 'app/public/Front/img/wolf.jpg', 'Logo Loup', 1),
	(2, 'app/public/Front/img/rose.jpg', 'Design Rose', 4),
	(3, 'app/public/Front/img/arbre-main.jpg', 'Arbre', 3),
	(4, 'app/public/Front/img/cuisine.jpg', 'Design Cuisine', 3),
	(18, 'app/public/Front/img/baskets-roses.jpg', 'Baskets Rose', 2),
	(19, 'app/public/Front/img/logo-chat.jpg', 'Logo de chat', 2),
	(20, 'app/public/Front/img/wolf.jpg', 'Logo Loup', 4),
	(21, 'app/public/Front/img/rose.jpg', 'Design Rose', 2),
	(22, 'app/public/Front/img/arbre-main.jpg', 'Arbre', 1);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;

-- Listage de la structure de la table tempsdaime. services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `alt_logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tempsdaime.services : ~3 rows (environ)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id`, `titre`, `texte`, `logo`, `alt_logo`) VALUES
	(1, 'UI/UX Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie volutpat metus. In eu molestie orci, ut ultrices eros. Sed.', 'app/public/Front/img/SVG/papillon-jaune.svg', 'Papillon Jaune'),
	(2, 'Digital Marketing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie volutpat metus. In eu molestie orci, ut ultrices eros. Sed.', 'app/public/Front/img/SVG/papillon-bleu.svg', 'Papillon Bleu'),
	(3, 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie volutpat metus. In eu molestie orci, ut ultrices eros. Sed.', 'app/public/Front/img/SVG/papillon-rose.svg', 'Papillon Rose');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
