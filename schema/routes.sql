CREATE TABLE IF NOT EXISTS `rutas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `horario` time NOT NULL,
  `weekday` tinyint(1) NOT NULL,
  `weekend` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32;

INSERT INTO `rutas` (`origen`, `destino`, `horario`, `weekday`, `weekend`) VALUES
('Mérida', 'Campeche', '09:00:00', 1, 0),
('Mérida', 'Campeche', '12:00:00', 1, 1),
('Mérida', 'Campeche', '15:00:00', 1, 1),
('Mérida', 'Campeche', '18:00:00', 1, 1),
('Mérida', 'Campeche', '21:00:00', 1, 1),
('Mérida', 'Campeche', '00:00:00', 0, 1),
('Mérida', 'Campeche', '02:00:00', 1, 0);