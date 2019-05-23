-- SAKAND DB
DROP DATABASE sakana;
CREATE DATABASE sakana;
USE sakana;

-- INFO
CREATE TABLE info(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `info_key` VARCHAR(32) NOT NULL,
    `info_value` TEXT NOT NULL
);

-- USERS
CREATE TABLE users(
    `id` INT(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `user_id` INT(4) NOT NULL,
    `email` VARCHAR(128) NOT NULL,
    `password` VARCHAR(128) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `phone_number` VARCHAR(10) NOT NULL,
    `points` INT(10) NULL DEFAULT 100,
    `visits` INT(4) NULL DEFAULT 0
);

-- MENU
CREATE TABLE menu_items(
     `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
     `category` VARCHAR(21) NOT NULL,
     `name` VARCHAR(50) NOT NULL,
     `desc` TEXT NOT NULL,
     `price` FLOAT NOT NULL,
     `strength` INT(1) NULL DEFAULT 0,
     `position` INT(2) NULL
);

-- Opening hours
CREATE TABLE opening_hours(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `day_value` INT(1) NOT NULL,
    `open_value` VARCHAR(8) NOT NULL,
    `close_value` VARCHAR(8) NOT NULL,
    `closed` INT(1) NOT NULL
);

CREATE TABLE abnormal_opening_hours(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `date_value` DATE NOT NULL,
    `open_value` VARCHAR(8) NOT NULL,
    `close_value` VARCHAR(8) NOT NULL,
    `closed` INT(1) NOT NULL
);

-- TABLE BOOKINGS
CREATE TABLE dinner_table(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `table_id` INT(2) NOT NULL,
    `seats` INT(2) NOT NULL
);

CREATE TABLE bookings(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `table` INT(8) NOT NULL,
    `user` INT(8) DEFAULT NULL,
    `name` VARCHAR(50) DEFAULT NULL,
    `phone_number` VARCHAR(10) DEFAULT NULL,
    `start` TIME NOT NULL,
    `end` TIME NOT NULL,

    FOREIGN KEY (`user`) REFERENCES users(id),
    FOREIGN KEY (`table`) REFERENCES dinner_table(id)
);

INSERT INTO info(info_key, info_value) VALUES('phone', "070 021 05 91");
INSERT INTO info(info_key, info_value) VALUES('email', "info@sakana.se");

INSERT INTO opening_hours(day_value, open_value, close_value, closed) VALUES(1, '', '', 1);
INSERT INTO opening_hours(day_value, open_value, close_value, closed) VALUES(2, '', '', 1);
INSERT INTO opening_hours(day_value, open_value, close_value, closed) VALUES(3, '16', '23', 0);
INSERT INTO opening_hours(day_value, open_value, close_value, closed) VALUES(4, '16', '23', 0);
INSERT INTO opening_hours(day_value, open_value, close_value) VALUES(5, '18', '01');
INSERT INTO opening_hours(day_value, open_value, close_value) VALUES(6, '18', '01');
INSERT INTO opening_hours(day_value, open_value, close_value) VALUES(7, '16', '23');