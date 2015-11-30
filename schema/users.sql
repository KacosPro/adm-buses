CREATE TABLE `Usernames` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `Usernames` (`Username`, `Password`, `FirstName`, `LastName`, `Id`) VALUES
('sbncacos@gmail.com', 'VivaEcuador', 'Carlos', 'Proaño', 1),
('chuchoyei@hotmail.com', 'VivaMexico', 'Jesus', 'Marin', 2),
('nasser@gmail.com', 'VivaSalvador', 'Carlos', 'Nasser', 3);