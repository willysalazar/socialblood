-- MySQL Script generated by MySQL Workbench
-- 04/26/15 21:15:56
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema socialblood
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema socialblood
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `socialblood` DEFAULT CHARACTER SET latin1 ;
USE `socialblood` ;

-- -----------------------------------------------------
-- Table `socialblood`.`uf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialblood`.`uf` (
  `id` INT(11) NOT NULL,
  `sigla` VARCHAR(2) NOT NULL,
  `nome` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `socialblood`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialblood`.`cidade` (
  `id` INT(11) NOT NULL,
  `nome` VARCHAR(35) NOT NULL,
  `fk_uf` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cidade_uf` (`fk_uf` ASC),
  CONSTRAINT `fk_cidade_uf`
    FOREIGN KEY (`fk_uf`)
    REFERENCES `socialblood`.`uf` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `socialblood`.`local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialblood`.`local` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cep` CHAR(9) NOT NULL,
  `logradouro` VARCHAR(100) NOT NULL,
  `numero` INT(11) NULL DEFAULT NULL,
  `bairro` VARCHAR(60) NOT NULL,
  `latitude` DECIMAL(12,8) NULL DEFAULT NULL,
  `longetude` DECIMAL(12,8) NULL DEFAULT NULL,
  `fk_cidade` INT(11) NOT NULL,
  `telefone` VARCHAR(14) NOT NULL,
  `horario` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_local_cidade` (`fk_cidade` ASC),
  CONSTRAINT `fk_local_cidade`
    FOREIGN KEY (`fk_cidade`)
    REFERENCES `socialblood`.`cidade` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `socialblood`.`perfilusuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialblood`.`perfilusuario` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fbId` VARCHAR(100) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `permiteEnvioEmail` TINYINT(1) NOT NULL,
  `dataPerfil` DATETIME NOT NULL,
  `dataUltimoLogin` DATETIME NULL DEFAULT NULL,
  `dataExclusao` DATETIME NULL DEFAULT NULL,
  `ativo` TINYINT(1) NULL DEFAULT '1',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `socialblood`.`solicitacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialblood`.`solicitacao` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_perfilusuario` BIGINT(20) UNSIGNED NOT NULL,
  `nome_paciente` VARCHAR(150) NOT NULL,
  `mensagem` VARCHAR(200),
  `fk_local` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_solicitacao_perfilusuario` (`fk_perfilusuario` ASC),
  INDEX `fk_solicitacao_local` (`fk_local` ASC),
  CONSTRAINT `fk_solicitacao_perfilusuario`
    FOREIGN KEY (`fk_perfilusuario`)
    REFERENCES `socialblood`.`perfilusuario` (`id`),
  CONSTRAINT `fk_solicitacao_local`
    FOREIGN KEY (`fk_local`)
    REFERENCES `socialblood`.`local` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
