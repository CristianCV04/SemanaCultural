CREATE DATABASE IF NOT EXISTS `semanacultural` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `semanacultural`;

CREATE TABLE IF NOT EXISTS `calificacion` (
  `idCalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Evento_idEvento` int(11) NOT NULL,
  `calificacion` int(1) NOT NULL,
  PRIMARY KEY (`idCalificacion`),
  KEY `fk_Calificacion_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Calificacion_Evento1_idx` (`Evento_idEvento`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `chat` (
  `idChat` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idChat`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `comentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Evento_idEvento` int(11) NOT NULL,
  `Comentario_idComentario` int(11) DEFAULT NULL,
  `comentario` varchar(150) NOT NULL,
  `subida` datetime NOT NULL,  
  PRIMARY KEY (`idComentario`),
  KEY `fk_Comentario_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Comentario_Evento1_idx` (`Evento_idEvento`),
  KEY `fk_Comentario_Comentario1_idx` (`Comentario_idComentario`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `Programacion_idProgramacion` int(11) NOT NULL,
  `Lugar_idLugar` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  PRIMARY KEY (`idEvento`),
  KEY `fk_Evento_Programacion1_idx` (`Programacion_idProgramacion`),
  KEY `fk_Evento_Lugar1_idx` (`Lugar_idLugar`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `favorito` (
  `idFavorito` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Evento_idEvento` int(11) NOT NULL,
  PRIMARY KEY (`idFavorito`),
  KEY `fk_Favorito_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Favorito_Evento1_idx` (`Evento_idEvento`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `lugar` (
  `idLugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idLugar`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `mensajechat` (
  `idMensajeChat` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Chat_idChat` int(11) NOT NULL,
  `mensaje` varchar(150) NOT NULL,
  `subida` datetime NOT NULL,
  PRIMARY KEY (`idMensajeChat`),
  KEY `fk_Mensaje_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Mensaje_Chat1_idx` (`Chat_idChat`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `multimedia` (
  `idMultimedia` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Evento_idEvento` int(11) NOT NULL,
  `TipoMultimedia_idTipoMultimedia` int(11) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `subida` datetime NOT NULL,
  PRIMARY KEY (`idMultimedia`),
  KEY `fk_Multimedia_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Multimedia_Evento1_idx` (`Evento_idEvento`),
  KEY `fk_Multimedia_TipoMultimedia1_idx` (`TipoMultimedia_idTipoMultimedia`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `notificacion` (
  `idNotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Evento_idEvento` int(11) NOT NULL,
  `PasoPaso_idPasoPaso` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL DEFAULT FALSE,
  `creado` datetime NOT NULL,  
  PRIMARY KEY (`idNotificacion`),
  KEY `fk_Notificacion_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Notificacion_Evento1_idx` (`Evento_idEvento`),
  KEY `fk_Notificacion_PasoPaso1_idx` (`PasoPaso_idPasoPaso`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `pasopaso` (
  `idPasoPaso` int(11) NOT NULL AUTO_INCREMENT,
  `Evento_idEvento` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `tiempo` time NOT NULL,
  PRIMARY KEY (`idPasoPaso`),
  KEY `fk_PasoPaso_Evento1_idx` (`Evento_idEvento`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `programacion` (
  `idProgramacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `creado` year NOT NULL,
  PRIMARY KEY (`idProgramacion`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `restauracion` (
  `idRestauracion` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int(11) NOT NULL,
  `token` varchar(45) NOT NULL,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`idRestauracion`),
  UNIQUE KEY `token_UNIQUE` (`token`),
  KEY `fk_Restauracion_Usuario1_idx` (`Usuario_idUsuario`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `tipomultimedia` (
  `idTipoMultimedia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idTipoMultimedia`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `TipoUsuario_idTipoUsuario` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellido1` varchar(60) NOT NULL,
  `apellido2` varchar(60) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `bloqueado` tinyint(1) DEFAULT FALSE,
  `confirmado` tinyint(1) DEFAULT FALSE,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario_idTipoUsuario`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `visita` (
  `idVisita` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int(11) NOT NULL,
  `ingreso` datetime NOT NULL,
  PRIMARY KEY (`idVisita`),
  KEY `fk_Visita_Usuario1_idx` (`Usuario_idUsuario`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificacion_ibfk2` FOREIGN KEY (`Evento_idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE;
    
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk2` FOREIGN KEY (`Evento_idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk3` FOREIGN KEY (`Comentario_idComentario`) REFERENCES `comentario` (`idComentario`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk1` FOREIGN KEY (`Programacion_idProgramacion`) REFERENCES `programacion` (`idProgramacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento_ibfk2` FOREIGN KEY (`Lugar_idLugar`) REFERENCES `lugar` (`idLugar`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorito_ibfk2` FOREIGN KEY (`Evento_idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `mensajechat`
  ADD CONSTRAINT `mensajechat_ibfk1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajechat_ibfk2` FOREIGN KEY (`Chat_idChat`) REFERENCES `chat` (`idChat`) ON DELETE CASCADE ON UPDATE CASCADE;
    
ALTER TABLE `multimedia`
  ADD CONSTRAINT `multimedia_ibfk1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `multimedia_ibfk2` FOREIGN KEY (`Evento_idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `multimedia_ibfk3` FOREIGN KEY (`TipoMultimedia_idTipoMultimedia`) REFERENCES `tipomultimedia` (`idTipoMultimedia`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificacion_ibfk2` FOREIGN KEY (`Evento_idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificacion_ibfk3` FOREIGN KEY (`PasoPaso_idPasoPaso`) REFERENCES `pasopaso` (`idPasoPaso`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `pasopaso`
  ADD CONSTRAINT `pasopaso_ibfk1` FOREIGN KEY (`Evento_idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `restauracion`
  ADD CONSTRAINT `restauracion_ibfk1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk1` FOREIGN KEY (`TipoUsuario_idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE EVENT IF NOT EXISTS `restauraPassword`
    ON SCHEDULE EVERY 1 MINUTE STARTS NOW() DO DELETE FROM `restauracion` WHERE subida <= DATE_SUB(NOW(), INTERVAL 1 HOUR);