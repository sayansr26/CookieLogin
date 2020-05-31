-- CREATE DATABASE IF NOT EXIST

CREATE DATABASE IF NOT EXISTS `login_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login_db`;

-- CREATE TABLE user_info

CREATE TABLE `user_info`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) DEFAULT NOT NULL,
    `password` VARCHAR(255) DEFAULT NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- INSERT DATA INTO user_info TABLE

INSERT INTO `user_info`(`username`,`password`) VALUES(`testuser`,md5(12345));


