DROP TABLE IF EXISTS `Login`;
CREATE TABLE `Login` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `view_permission` varchar(1) DEFAULT 'Y',
  `last_viewed` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

