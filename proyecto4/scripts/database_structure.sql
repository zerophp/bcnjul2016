-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`genders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`genders` (
  `idgender` INT NOT NULL AUTO_INCREMENT,
  `gender` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgender`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cities` (
  `idcity` INT NOT NULL AUTO_INCREMENT,
  `city` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcity`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `iduser` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `photo` VARCHAR(255) NULL,
  `created` TIMESTAMP NULL,
  `updated` TIMESTAMP NULL,
  `geopos` VARCHAR(255) NULL,
  `device` VARCHAR(255) NULL,
  `genders_idgender` INT NOT NULL,
  `cities_idcity` INT NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_users_genders_idx` (`genders_idgender` ASC),
  INDEX `fk_users_cities1_idx` (`cities_idcity` ASC),
  CONSTRAINT `fk_users_genders`
    FOREIGN KEY (`genders_idgender`)
    REFERENCES `mydb`.`genders` (`idgender`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_cities1`
    FOREIGN KEY (`cities_idcity`)
    REFERENCES `mydb`.`cities` (`idcity`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`transports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`transports` (
  `idtransport` INT NOT NULL AUTO_INCREMENT,
  `transport` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtransport`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`languages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`languages` (
  `idlanguage` INT NOT NULL AUTO_INCREMENT,
  `language` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idlanguage`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users_has_languages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users_has_languages` (
  `users_iduser` VARCHAR(255) NOT NULL,
  `languages_idlanguage` INT NOT NULL,
  PRIMARY KEY (`users_iduser`, `languages_idlanguage`),
  INDEX `fk_users_has_languages_languages1_idx` (`languages_idlanguage` ASC),
  INDEX `fk_users_has_languages_users1_idx` (`users_iduser` ASC),
  CONSTRAINT `fk_users_has_languages_users1`
    FOREIGN KEY (`users_iduser`)
    REFERENCES `mydb`.`users` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_languages_languages1`
    FOREIGN KEY (`languages_idlanguage`)
    REFERENCES `mydb`.`languages` (`idlanguage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users_has_transports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users_has_transports` (
  `users_iduser` VARCHAR(255) NOT NULL,
  `transports_idtransport` INT NOT NULL,
  PRIMARY KEY (`users_iduser`, `transports_idtransport`),
  INDEX `fk_users_has_transports_transports1_idx` (`transports_idtransport` ASC),
  INDEX `fk_users_has_transports_users1_idx` (`users_iduser` ASC),
  CONSTRAINT `fk_users_has_transports_users1`
    FOREIGN KEY (`users_iduser`)
    REFERENCES `mydb`.`users` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_transports_transports1`
    FOREIGN KEY (`transports_idtransport`)
    REFERENCES `mydb`.`transports` (`idtransport`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
