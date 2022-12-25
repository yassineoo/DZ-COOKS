CREATE TABLE `recipe` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`name` varchar(20) NOT NULL ,
	`preparationTime` INT(20) NOT NULL DEFAULT 0,
	`restTime` INT(20) NOT NULL  DEFAULT 0,
	`categorie` varchar(20) NOT NULL,
	`cookingTime` INT(5) NOT NULL,
	`aprroved`  INT(1) NOT NULL DEFAULT 0 ,
	`impPath` varchar(255) NOT NULL,
	`videoPath` varchar(255),
	`cookingMethode` varchar(255) NOT NULL,
	`party` varchar(255) ,
	`writer` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `user` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`FirstName` varchar(30) NOT NULL ,
	`lastName` varchar(30) NOT NULL ,
	`email` varchar(50) NOT NULL ,
	`password` varchar(60) NOT NULL ,
	`sex` varchar(1) NOT NULL ,
	`birth` DATE NOT NULL ,
	`confirmed` INT DEFAULT 0 NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `admin` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`FirstName` varchar(30) NOT NULL ,
	`lastName` varchar(30) NOT NULL ,
	`email` varchar(50) NOT NULL ,
	`password` varchar(60) NOT NULL ,
	`sex` varchar(1) NOT NULL ,
	`birth` DATE NOT NULL ,
	PRIMARY KEY (`id`)
);

CREATE TABLE `noter` (
	`idUser` INT NOT NULL,
	`idRecipe` INT NOT NULL,
	`note` INT NOT NULL,
	PRIMARY KEY (`idUser`,`idRecipe`)
);

CREATE TABLE `Ingredient` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`name` varchar(20) NOT NULL UNIQUE,
	`saison` varchar(5) NOT NULL ,
	`healthy` INT(3) NOT NULL ,
	`calorie` INT NOT NULL,
	`glucides` INT NOT NULL,
	`lipides` INT NOT NULL,
	`minéraux` INT NOT NULL,
	`vitamines` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `prefer` (
	`idUser` BINARY NOT NULL,
	`idRecipe` BINARY NOT NULL,
	PRIMARY KEY (`idUser`,`idRecipe`)
);

CREATE TABLE `makeIN` (
	`idUser` INT NOT NULL,
	`idRecipe` INT NOT NULL,
	`quentity` varchar(255) NOT NULL,
	PRIMARY KEY (`idUser`,`idRecipe`)
);

CREATE TABLE `categorie` (
	`name` varchar(100) NOT NULL ,
	`id` INT (20) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `step` (
	`id` INT NOT NULL,
	`idRecipe` INT NOT NULL,
	`order` INT NOT NULL,
	`description` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `news` (
	`idNews` INT NOT NULL,
	`Description` varchar(255) NOT NULL,
	`title` varchar(255) NOT NULL,
	`imgPath` varchar(255) NOT NULL,
	`videoPath` varchar(255),
	`writer` INT NOT NULL,
	PRIMARY KEY (`idNews`)
);

CREATE TABLE `party` (
	`name` varchar(100) NOT NULL ,
	`id` INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
);

ALTER TABLE `recipe` ADD CONSTRAINT `recipe_fk0` FOREIGN KEY (`categorie`) REFERENCES `categorie`(`id`);

ALTER TABLE `recipe` ADD CONSTRAINT `recipe_fk1` FOREIGN KEY (`cookingTime`) REFERENCES `categorie`(`name`);

ALTER TABLE `recipe` ADD CONSTRAINT `recipe_fk2` FOREIGN KEY (`party`) REFERENCES `party`(`id`);

ALTER TABLE `recipe` ADD CONSTRAINT `recipe_fk3` FOREIGN KEY (`writer`) REFERENCES `user`(`id`);

ALTER TABLE `noter` ADD CONSTRAINT `noter_fk0` FOREIGN KEY (`idUser`) REFERENCES `user`(`id`);

ALTER TABLE `noter` ADD CONSTRAINT `noter_fk1` FOREIGN KEY (`idRecipe`) REFERENCES `recipe`(`id`);

ALTER TABLE `prefer` ADD CONSTRAINT `prefer_fk0` FOREIGN KEY (`idUser`) REFERENCES `user`(`id`);

ALTER TABLE `prefer` ADD CONSTRAINT `prefer_fk1` FOREIGN KEY (`idRecipe`) REFERENCES `recipe`(`id`);

ALTER TABLE `makeIN` ADD CONSTRAINT `makeIN_fk0` FOREIGN KEY (`idUser`) REFERENCES `Ingredient`(`id`);

ALTER TABLE `makeIN` ADD CONSTRAINT `makeIN_fk1` FOREIGN KEY (`idRecipe`) REFERENCES `recipe`(`id`);

ALTER TABLE `step` ADD CONSTRAINT `step_fk0` FOREIGN KEY (`idRecipe`) REFERENCES `recipe`(`id`);

ALTER TABLE `news` ADD CONSTRAINT `news_fk0` FOREIGN KEY (`writer`) REFERENCES `admin`(`id`);












