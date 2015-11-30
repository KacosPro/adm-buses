CREATE TABLE IF NOT EXISTS `Usernames` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `Usernames` (`Username`, `Password`, `Id`) VALUES
('KakosPro@gmail.com', 'VivaEcuador', 1),
('chuchoyei@hotmail.com', 'VivaMexico', 2),
('nasser@gmail.com', 'VivaSalvador', 3);