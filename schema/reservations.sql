CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `ruta_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ruta_id` (`ruta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;