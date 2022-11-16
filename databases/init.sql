CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED WITH mysql_native_password BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS admin (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(32) NOT NULL,
    password VARCHAR(256) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS seas (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    seasname VARCHAR(32) NOT NULL,
    dat VARCHAR(32) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(355) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO seas value (NULL, 'Адриатическое море', '12.12.2022-12.01.2023');
INSERT INTO seas value (NULL, 'Азовское море', '12.12.2022-12.01.2023');
INSERT INTO seas value (NULL, 'Мраморное море', '12.12.2022-12.01.2023');
INSERT INTO seas value (NULL, 'Восточно-Китайское море', '12.12.2022-12.01.2023');
INSERT INTO seas value (NULL, 'Карибское море', '12.12.2022-12.01.2023');

INSERT INTO admin value (NULL,'luba', '$apr1$4EoqnqZ3$C8dHTFqyxg6b9hR9kTzAv0');
INSERT INTO admin value (NULL,'misha', '$apr1$qDC0nkUp$y5.n/577GsAjwbEJ.Azqp0');

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES
(2, 'Иванов Иван Иванович', 'test', 'test@local.ru', '202cb962ac59075b964b07152d234b70', 'uploads/15698233144.png');





