SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `games` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Opponent` varchar(50) NOT NULL,
  `Goals` int(11) NOT NULL,
  `Spectators` int(11) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `GameType` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `games` (`ID`, `Opponent`, `Goals`, `Spectators`, `Location`, `GameType`) VALUES
(1, 'Espanyol', 5, 100000, 'Camp Nou', 'Pffocial'),
(2, 'PDG', 4, 99000, 'ElSadar', 'Friendly'),
(3, 'Real Madrid', 6, 98552, 'Sanchez', 'Training'),
(4, 'Levante', 4, 120000, 'Garbajosa', 'Friendly'),
(5, 'Elche', 8, 130000, 'Sadad', 'Official'),
(6, 'Villareal', 0, 150000, 'Olympic', 'Friendly'),
(7, 'Societad', 1, 325000, 'Vileneuve', 'Official'),
(8, 'Manchester', 6, 125365, 'PrincePark', 'Friendly'),
(9, 'Chelsea', 9, 153000, 'Madrid', 'Official'),
(10, 'Bordeau', 5, 215002, 'PrincePark', 'Friendly'),
(11, 'Lyon', 7, 250123, 'Paris', 'Official'),
(12, 'Millan', 3, 235123, 'Garbajosa', 'Friendly');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
