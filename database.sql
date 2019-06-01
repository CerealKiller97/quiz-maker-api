-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema quiz_maker
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema quiz_maker
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `quiz_maker` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;
USE `quiz_maker` ;

-- -----------------------------------------------------
-- Table `quiz_maker`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_maker`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quiz_maker`.`quizes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_maker`.`quizes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_quizes_users_idx` (`user_id` ASC),
  CONSTRAINT `fk_quizes_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `quiz_maker`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quiz_maker`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_maker`.`questions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(1000) NOT NULL,
  `quiz_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_questions_quizes1_idx` (`quiz_id` ASC),
  CONSTRAINT `fk_questions_quizes1`
    FOREIGN KEY (`quiz_id`)
    REFERENCES `quiz_maker`.`quizes` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quiz_maker`.`answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz_maker`.`answers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `answer` VARCHAR(500) NOT NULL,
  `correct` TINYINT(1) NULL DEFAULT 0,
  `question_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_answers_questions1_idx` (`question_id` ASC),
  CONSTRAINT `fk_answers_questions1`
    FOREIGN KEY (`question_id`)
    REFERENCES `quiz_maker`.`questions` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
