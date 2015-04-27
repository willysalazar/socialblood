/*
CREATE TABLE IF NOT EXISTS `Users` (
  `UID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Fuid` varchar(100) NOT NULL,
  `Ffname` varchar(60) NOT NULL,
  `Femail` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`UID`)
);
*/

CREATE TABLE IF NOT EXISTS perfilUsuario ( 
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT , 
    `fbId` VARCHAR(100) NOT NULL , 
    `nome` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `permiteEnvioEmail` BOOLEAN NOT NULL,
	`dataPerfil` DATETIME NOT NULL,
	`dataUltimoLogin` DATETIME NULL,
	`dataExclusao` DATETIME NULL,	
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `local` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `solicitacao` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_perfilusuario` BIGINT UNSIGNED NOT NULL,
  `nome_paciente` VARCHAR(150) NOT NULL,
  `fk_local` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_solicitacao_perfilusuario`
    FOREIGN KEY (`fk_perfilusuario`)
    REFERENCES `perfilusuario` (id),
  CONSTRAINT `fk_solicitacao_local`
    FOREIGN KEY (fk_local)
    REFERENCES `local` (id)    
);