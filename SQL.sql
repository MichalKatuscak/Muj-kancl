-- Adminer 3.6.0 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id_activity` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_czech_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  PRIMARY KEY (`id_activity`),
  KEY `user_id` (`user_id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `activities_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_user_id` int(11) NOT NULL,
  `note` varchar(1000) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_client`),
  KEY `user_id` (`user_id`),
  KEY `client_user_id` (`client_user_id`),
  CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`client_user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `contracts`;
CREATE TABLE `contracts` (
  `id_contract` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_contract`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `permissions` varchar(1000) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `groups` (`id_group`, `name`, `permissions`) VALUES
(1,	'Administrátor',	''),
(2,	'Podnikatel',	''),
(3,	'Zákazník',	''),
(4,	'Dodavatel',	''),
(5,	'Podnikatel',	'Omezeně všeho'),
(6,	'Podnikatel',	'Zdarma'),
(8,	'Podnikatel',	'Neomezeně všeho'),
(9,	'Demo',	'');

DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items` (
  `id_invoice_item` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `item` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `dph` int(2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `price_without_dph` float NOT NULL,
  PRIMARY KEY (`id_invoice_item`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id_invoice`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id_invoice` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_user_id` int(11) NOT NULL,
  `number` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `splatnost` date NOT NULL,
  `vystaveni` date NOT NULL,
  `duzp` date NOT NULL,
  `zaplaceno` tinyint(1) NOT NULL,
  `forma_uhrady` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `prijata` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(50) COLLATE utf8_czech_ci NOT NULL DEFAULT 'Faktura',
  `variabilni_symbol` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `specificky_symbol` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `konstantni_symbol` varchar(4) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_invoice`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `subject` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `text` varchar(2000) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `user_id` (`user_id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `messages_ibfk_4` FOREIGN KEY (`client_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `project_task_bugs`;
CREATE TABLE `project_task_bugs` (
  `id_project_task_bug` int(11) NOT NULL AUTO_INCREMENT,
  `id_bug` int(11) NOT NULL,
  `project_task_id` int(11) NOT NULL,
  `bug` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `found` datetime NOT NULL,
  `fixed` datetime NOT NULL,
  PRIMARY KEY (`id_project_task_bug`),
  KEY `project_task_id` (`project_task_id`),
  CONSTRAINT `project_task_bugs_ibfk_2` FOREIGN KEY (`project_task_id`) REFERENCES `project_tasks` (`id_project_task`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `project_task_files`;
CREATE TABLE `project_task_files` (
  `id_project_task_file` int(11) NOT NULL AUTO_INCREMENT,
  `project_task_id` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `uploaded` datetime NOT NULL,
  PRIMARY KEY (`id_project_task_file`),
  KEY `project_task_id` (`project_task_id`),
  CONSTRAINT `project_task_files_ibfk_2` FOREIGN KEY (`project_task_id`) REFERENCES `project_tasks` (`id_project_task`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `project_tasks`;
CREATE TABLE `project_tasks` (
  `id_project_task` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `condition` int(2) NOT NULL,
  `task` text COLLATE utf8_czech_ci NOT NULL,
  `price_from_client` float NOT NULL,
  `price_from_supplier` float NOT NULL,
  `price` float NOT NULL,
  `start_work` datetime NOT NULL,
  `end_work` datetime NOT NULL,
  `entered` datetime NOT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_project_task`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_project`),
  KEY `user_id` (`user_id`),
  KEY `client_user_id` (`client_user_id`),
  CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `projects_ibfk_4` FOREIGN KEY (`client_user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `note` varchar(1000) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_supplier`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `todo`;
CREATE TABLE `todo` (
  `id_todo` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `color` char(3) COLLATE utf8_czech_ci NOT NULL,
  `position_x` smallint(6) NOT NULL,
  `position_y` smallint(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_todo`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `todo_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `entity` varchar(2) COLLATE utf8_czech_ci NOT NULL DEFAULT 'FO',
  `first_name` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `login` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `www` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `ic` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `dic` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `bank_name` varchar(30) COLLATE utf8_czech_ci DEFAULT NULL,
  `bank_number` varchar(30) COLLATE utf8_czech_ci DEFAULT NULL,
  `swift_code` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `iban` varchar(30) COLLATE utf8_czech_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_czech_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `last_update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registration_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `paid_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `money` varchar(20) COLLATE utf8_czech_ci DEFAULT '0Kč',
  `blocked` tinyint(1) DEFAULT NULL,
  `note` varchar(1000) COLLATE utf8_czech_ci DEFAULT NULL,
  `parent_user_id` int(11) DEFAULT '2',
  `invoice_note` varchar(200) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `goup_id` (`group_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id_group`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Information about users.';

INSERT INTO `users` (`id_user`, `entity`, `first_name`, `last_name`, `login`, `password`, `email`, `www`, `group_id`, `ic`, `dic`, `bank_name`, `bank_number`, `swift_code`, `iban`, `phone`, `address`, `last_update_time`, `last_login_time`, `registration_time`, `paid_to`, `money`, `blocked`, `note`, `parent_user_id`, `invoice_note`) VALUES
(0,	'FO',	'žádný',	'',	'',	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2012-07-09 15:20:53',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'0Kč',	NULL,	NULL,	2,	NULL),
(1,	'FO',	'Demo',	'Demo',	'demo',	'fe01ce2a7fbac8fafaed7c982a04e229',	'demo@demo.cz',	'',	8,	'',	'',	'',	'',	'',	'',	'',	'',	'2013-03-13 09:04:38',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'2029-04-26 15:54:07',	'0Kč',	0,	'',	2,	NULL);

-- 2013-03-13 09:09:26
