CREATE TABLE Donadores (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE Donativos (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metodo` tinyint(1) NOT NULL,
  `monto` double NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `comprobante_donativo` varchar(255)  DEFAULT NULL,
  `comprobante_fiscal` tinyint(1) NOT NULL DEFAULT 0,
  `id_donador` int(11) NOT NULL,
  `comentario` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_Donativos_1_idx` (`id_donador`),
  KEY `fk_Donativos_2_idx` (`metodo`),
  CONSTRAINT `fk_Donativos_1` FOREIGN KEY (`id_donador`) REFERENCES `Donadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Donativos_2` FOREIGN KEY (`metodo`) REFERENCES `metodo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE Apadrinamientos (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_donativo` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_Apadrinamientos_1_idx` (`id_donativo`),
  KEY `fk_Apadrinamientos_2_idx` (`id_solicitud`),
  CONSTRAINT `fk_Apadrinamientos_1` FOREIGN KEY (`id_donativo`) REFERENCES `Donativos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Apadrinamientos_2` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE Relaciones (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_donador` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_Relaciones_1_idx` (`id_donador`),
  KEY `fk_Relaciones_2_idx` (`id_page`),
  CONSTRAINT `fk_Relaciones_1` FOREIGN KEY (`id_donador`) REFERENCES `Donadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Relaciones_2` FOREIGN KEY (`id_page`) REFERENCES `solicitud` (`id_page`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8  DEFAULT COLLATE utf8_spanish_ci;


/*CREATE TABLE metodo (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

show create table metodo;*/
