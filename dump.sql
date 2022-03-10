CREATE TABLE `utilisateurs` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255) NOT NULL,
	`prenom` VARCHAR(255) NOT NULL,
	`photo` varchar(255) NOT NULL,
	`mail` varchar(255) NOT NULL,
	`mdp` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `admin` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255) NOT NULL,
	`prenom` VARCHAR(255) NOT NULL,
	`photo` varchar(255) NOT NULL,
	`mail` varchar(255) NOT NULL,
	`mdp` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `a_propos` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`image` varchar(255) NOT NULL,
	`titre` VARCHAR(255) NOT NULL,
	`texte` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `services` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`titre` varchar(255) NOT NULL,
	`texte` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `portfolio` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`image` varchar(255) NOT NULL,
	`alt` TEXT(255) NOT NULL,
	`categorie` TEXT(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `avis` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_utilisateur` INT NOT NULL,
	`metier` VARCHAR(255) NOT NULL,
	`texte_avis` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `blog` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`image` varchar(255) NOT NULL,
	`categorie` VARCHAR(255) NOT NULL,
	`date` TIMESTAMP NOT NULL,
	`titre` VARCHAR(255) NOT NULL,
	`texte` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `contact` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255) NOT NULL,
	`mail` varchar(255) NOT NULL,
	`sujet` VARCHAR(255) NOT NULL,
	`texte` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `avis` ADD CONSTRAINT `avis_fk0` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs`(`id`);









