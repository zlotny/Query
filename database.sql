-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema tsw-ndrs-es
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tsw-ndrs-es
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tsw-ndrs-es` DEFAULT CHARACTER SET latin1 ;
USE `tsw-ndrs-es` ;

-- -----------------------------------------------------
-- Table `tsw-ndrs-es`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tsw-ndrs-es`.`users` ;

CREATE TABLE IF NOT EXISTS `tsw-ndrs-es`.`users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `profile_pic_route` VARCHAR(80) NULL DEFAULT NULL,
  `email` VARCHAR(50) NOT NULL,
  `pass` VARCHAR(40) NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tsw-ndrs-es`.`queries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tsw-ndrs-es`.`queries` ;

CREATE TABLE IF NOT EXISTS `tsw-ndrs-es`.`queries` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `content` TEXT NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `user_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_querys_users_idx` (`user_id` ASC),
  CONSTRAINT `fk_queries_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `tsw-ndrs-es`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tsw-ndrs-es`.`comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tsw-ndrs-es`.`comments` ;

CREATE TABLE IF NOT EXISTS `tsw-ndrs-es`.`comments` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `content` TEXT NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `user_id` INT(10) NOT NULL,
  `query_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comments_users1_idx` (`user_id` ASC),
  INDEX `fk_comments_querys1_idx` (`query_id` ASC),
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `tsw-ndrs-es`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_queries1`
    FOREIGN KEY (`query_id`)
    REFERENCES `tsw-ndrs-es`.`queries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tsw-ndrs-es`.`comments_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tsw-ndrs-es`.`comments_users` ;

CREATE TABLE IF NOT EXISTS `tsw-ndrs-es`.`comments_users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `vote` INT(1) NOT NULL,
  `user_id` INT(10) NOT NULL,
  `comment_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`, `user_id`, `comment_id`),
  INDEX `fk_users_has_comments_comments1_idx` (`comment_id` ASC),
  INDEX `fk_users_has_comments_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_comments_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `tsw-ndrs-es`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_comments_comments1`
    FOREIGN KEY (`comment_id`)
    REFERENCES `tsw-ndrs-es`.`comments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tsw-ndrs-es`.`queries_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tsw-ndrs-es`.`queries_users` ;

CREATE TABLE IF NOT EXISTS `tsw-ndrs-es`.`queries_users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `vote` INT(1) NOT NULL,
  `user_id` INT(10) NOT NULL,
  `query_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`, `user_id`, `query_id`),
  INDEX `fk_users_has_querys_querys1_idx` (`query_id` ASC),
  INDEX `fk_users_has_querys_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_queries_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `tsw-ndrs-es`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_querys_queries1`
    FOREIGN KEY (`query_id`)
    REFERENCES `tsw-ndrs-es`.`queries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
