CREATE DATABASE malasngoding;
USE malasngoding;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `usia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
 
 
INSERT INTO `user` (`id`, `nama`, `alamat`, `usia`) VALUES
(1, 'Andi', 'Jakarta', 20),
(3, 'Budi', 'Bandung', 30);