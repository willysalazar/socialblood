/*
CREATE TABLE IF NOT EXISTS `Users` (
  `UID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Fuid` varchar(100) NOT NULL,
  `Ffname` varchar(60) NOT NULL,
  `Femail` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`UID`)
);
*/

CREATE TABLE perfilUsuario ( 
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

