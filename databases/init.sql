CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED WITH mysql_native_password BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
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

INSERT INTO seas value (NULL, "Адриатическое море", "12.12.2022-12.01.2023");
INSERT INTO seas value (NULL, "Азовское море", "12.12.2022-12.01.2023");
INSERT INTO seas value (NULL, "Мраморное море", "12.12.2022-12.01.2023");
INSERT INTO seas value (NULL, "Восточно-Китайское море", "12.12.2022-12.01.2023");
INSERT INTO seas value (NULL, "Карибское море", "12.12.2022-12.01.2023");






