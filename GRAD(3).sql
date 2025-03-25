-- Adminer 4.8.1 MySQL 5.5.5-10.5.19-MariaDB-0+deb11u2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `GRAD`;
CREATE DATABASE `GRAD` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `GRAD`;

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_produit` (`user`,`produit`),
  KEY `produit` (`produit`),
  KEY `quantite` (`quantite`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`user`) REFERENCES `connexio` (`id`),
  CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`produit`) REFERENCES `produit` (`id`),
  CONSTRAINT `commande_ibfk_3` FOREIGN KEY (`user`) REFERENCES `connexio` (`id`),
  CONSTRAINT `commande_ibfk_4` FOREIGN KEY (`produit`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `commande` (`id`, `user`, `produit`, `quantite`, `prix`) VALUES
(38,	1,	4,	1,	8),
(39,	1,	2,	3,	9),
(42,	1,	1,	1,	5)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user` = VALUES(`user`), `produit` = VALUES(`produit`), `quantite` = VALUES(`quantite`), `prix` = VALUES(`prix`);

DROP TABLE IF EXISTS `connexio`;
CREATE TABLE `connexio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `connexio` (`id`, `pseudo`, `password`, `role`) VALUES
(1,	'user',	'ee11cbb19052e40b07aac0ca060c23ee',	'user'),
(2,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'admin'),
(3,	'a',	'0cc175b9c0f1b6a831c399e269772661',	'user'),
(4,	'user',	'ee11cbb19052e40b07aac0ca060c23ee',	'user'),
(5,	'victor',	'ee11cbb19052e40b07aac0ca060c23ee',	'user'),
(6,	'paul',	'ee11cbb19052e40b07aac0ca060c23ee',	'user')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `pseudo` = VALUES(`pseudo`), `password` = VALUES(`password`), `role` = VALUES(`role`);

DROP TABLE IF EXISTS `Contact`;
CREATE TABLE `Contact` (
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Ville` varchar(20) NOT NULL,
  `Codepostale` varchar(20) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Messag` text NOT NULL,
  `Etat` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Contact` (`Nom`, `Prenom`, `Mail`, `Ville`, `Codepostale`, `Telephone`, `Messag`, `Etat`, `id`) VALUES
('dupont',	'luc',	'luc.dup@gmail.com',	'toulouse',	'17532',	'961656869',	'',	'Encours',	1),
('Marc',	'Dupont',	'dfws',	'paris',	'17520',	'51555',	'slut',	'Traite',	2)
ON DUPLICATE KEY UPDATE `Nom` = VALUES(`Nom`), `Prenom` = VALUES(`Prenom`), `Mail` = VALUES(`Mail`), `Ville` = VALUES(`Ville`), `Codepostale` = VALUES(`Codepostale`), `Telephone` = VALUES(`Telephone`), `Messag` = VALUES(`Messag`), `Etat` = VALUES(`Etat`), `id` = VALUES(`id`);

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bois` varchar(20) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `produit` (`id`, `bois`, `prix`) VALUES
(1,	'Douglas',	5),
(2,	'bois Kebony ',	3),
(3,	'accoya',	4),
(4,	'thermofrene',	8)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `bois` = VALUES(`bois`), `prix` = VALUES(`prix`);

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `site` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produit` (`produit`),
  CONSTRAINT `stocks_ibfk_2` FOREIGN KEY (`produit`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `stocks` (`id`, `produit`, `qte`, `site`) VALUES
(1,	1,	1000,	0),
(2,	2,	560,	0)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `produit` = VALUES(`produit`), `qte` = VALUES(`qte`), `site` = VALUES(`site`);

-- 2023-12-15 10:54:35
