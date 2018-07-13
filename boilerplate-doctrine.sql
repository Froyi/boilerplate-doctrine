CREATE DATABASE `boilerplate-doctrine` /*!40100 COLLATE 'utf8_general_ci' */;

CREATE TABLE `user` (
	`userId` VARCHAR(200) NOT NULL,
	`firstname` VARCHAR(200) NOT NULL,
	PRIMARY KEY (`userId`)
)
ENGINE=MyISAM
;
