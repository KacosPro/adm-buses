CREATE TABLE IF NOT EXISTS `usernames` (
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  CHARSET=utf32 AUTO_INCREMENT=4 ;

INSERT INTO `usernames` (`username`, `password`, `firstName`, `lastName`, `Id`) VALUES
('sbncacos@gmail.com', 'VivaEcuador', 'Carlos', 'Proaño', 1),
('chuchoyei@hotmail.com', 'VivaMexico', 'Jesus', 'Marin', 2),
('nasser@gmail.com', 'VivaSalvador', 'Carlos', 'Nasser', 3);