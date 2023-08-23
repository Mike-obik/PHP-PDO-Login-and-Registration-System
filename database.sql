CREATE TABLE IF NOT EXISTS `users` (
 `users_id` int(11) NOT NULL AUTO_INCREMENT,
`fullname` varchar(100) NOT NULL,
 `firstname` varchar(150) NOT NULL,
 `lastname` varchar(100) NOT NULL,
 `email` varchar(150) NOT NULL,
 `username` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,

 PRIMARY KEY (`users_id`)
);