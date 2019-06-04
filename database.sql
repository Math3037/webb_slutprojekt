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
    `password` VARCHAR(60) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `phone_number` VARCHAR(10) NOT NULL,
    `points` INT(10) NULL DEFAULT 100,
    `visits` INT(4) NULL DEFAULT 0
);

-- FORGOTTEN PASSWORD
CREATE TABLE forgotten(
    `id` INT(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `token` VARCHAR(32) NOT NULL,
    `user` INT(8) NOT NULL,
    `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (`user`) REFERENCES users(id)
);

-- MENU
CREATE TABLE menu_items(
     `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
     `category` VARCHAR(21) NOT NULL,
     `name` VARCHAR(50) NOT NULL,
     `desc` TEXT NOT NULL,
     `price` FLOAT NOT NULL,
     `strength` INT(1) NULL DEFAULT 0
);

-- Opening hours
CREATE TABLE opening_hours(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `day_value` INT(1) NOT NULL,
    `open_value` VARCHAR(8) NOT NULL,
    `close_value` VARCHAR(8) NOT NULL,
    `closed` INT(1) NOT NULL DEFAULT 0
);

CREATE TABLE abnormal_opening_hours(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `date_value` DATE NOT NULL,
    `open_value` VARCHAR(8) NOT NULL,
    `close_value` VARCHAR(8) NOT NULL,
    `closed` INT(1) NOT NULL DEFAULT 0
);

-- TABLE BOOKINGS
CREATE TABLE dinner_table(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `seats` INT(2) NOT NULL
);

CREATE TABLE time_slot(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `day` INT(1) NOT NULL,
    `start` VARCHAR(10) NOT NULL,
    `end` VARCHAR(10) NOT NULL
);

CREATE TABLE bookings(
    `id` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `table` INT(8) NOT NULL,
    `user` INT(8) DEFAULT NULL,
    `name` VARCHAR(50) DEFAULT NULL,
    `phone_number` VARCHAR(10) DEFAULT NULL,
    `timeslot` INT(8) NOT NULL,

    FOREIGN KEY (`timeslot`) REFERENCES time_slot(id),
    FOREIGN KEY (`user`) REFERENCES users(id),
    FOREIGN KEY (`table`) REFERENCES dinner_table(id)
);

INSERT INTO info(info_key, info_value) VALUES('phone', "070 021 05 91");
INSERT INTO info(info_key, info_value) VALUES('email', "info@sakana.se");

-- #region OPENING HOURS
INSERT INTO opening_hours(day_value, open_value, close_value, closed) VALUES(1, '', '', 1);
INSERT INTO opening_hours(day_value, open_value, close_value, closed) VALUES(2, '', '', 1);
INSERT INTO opening_hours(day_value, open_value, close_value, closed) VALUES(3, '16', '23', 0);
INSERT INTO opening_hours(day_value, open_value, close_value, closed) VALUES(4, '16', '23', 0);
INSERT INTO opening_hours(day_value, open_value, close_value) VALUES(5, '18', '01');
INSERT INTO opening_hours(day_value, open_value, close_value) VALUES(6, '18', '01');
INSERT INTO opening_hours(day_value, open_value, close_value) VALUES(7, '16', '23');
-- #endregion OPENING HOURS

-- #region TIME SLOTS
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(3, '16:00', '17:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(3, '17:30', '19:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(3, '19:00', '20:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(3, '20:30', '22:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(3, '22:00', '23:00');

INSERT INTO time_slot(`day`, `start`, `end`) VALUES(4, '16:00', '17:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(4, '17:30', '19:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(4, '19:00', '20:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(4, '20:30', '22:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(4, '22:00', '23:00');

INSERT INTO time_slot(`day`, `start`, `end`) VALUES(5, '18:00', '19:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(5, '19:30', '21:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(5, '21:00', '22:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(5, '22:30', '00:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(5, '00:00', '01:00');

INSERT INTO time_slot(`day`, `start`, `end`) VALUES(6, '18:00', '19:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(6, '19:30', '21:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(6, '21:00', '22:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(6, '22:30', '00:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(6, '00:00', '01:00');

INSERT INTO time_slot(`day`, `start`, `end`) VALUES(7, '16:00', '17:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(7, '17:30', '19:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(7, '19:00', '20:30');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(7, '20:30', '22:00');
INSERT INTO time_slot(`day`, `start`, `end`) VALUES(7, '22:00', '23:00');
-- #endregion TIME SLOTS

-- #region TABLES
INSERT INTO dinner_table(seats) VALUES(2); -- TABLE 1
INSERT INTO dinner_table(seats) VALUES(2); -- TABLE 2
INSERT INTO dinner_table(seats) VALUES(2); -- TABLE 3

INSERT INTO dinner_table(seats) VALUES(4); -- TABLE 4
INSERT INTO dinner_table(seats) VALUES(4); -- TABLE 5
INSERT INTO dinner_table(seats) VALUES(4); -- TABLE 6
INSERT INTO dinner_table(seats) VALUES(4); -- TABLE 7

INSERT INTO dinner_table(seats) VALUES(8); -- TABLE 8
INSERT INTO dinner_table(seats) VALUES(8); -- TABLE 9
-- #endregion TABLES

-- #region MENU ITEMS
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('starter', 'Shrimp Dumplings', 'Black tiger shrimp, sambal soy sauce', 25);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('starter', 'Pan Seared Crab Cakes', 'Pico de gallo, lemon, cracked pepper aioli', 25);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('starter', 'Gyu Tataki', 'Thin slices of seared beef fillet in ponzu sauce', 50);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('starter', 'Age Dashi Dofu', 'Deep fried bean curd with tempura sauce', 30);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('starter', 'Hijiki', 'Hijiki seaweed cooked with soy sauce and mirin', 15);

INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('main', 'Sushi 6 pieces', 'Create your own mix from the following sushi rolls: salmon, shrimp tempura, avocado, serrano cucumber, unagi sauce', 100);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('main', 'Sushi 8 pieces', 'Create your own mix from the following sushi rolls: salmon, shrimp tempura, avocado, serrano cucumber, unagi sauce', 110);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('main', 'Sushi 10 pieces', 'Create your own mix from the following sushi rolls: salmon, shrimp tempura, avocado, serrano cucumber, unagi sauce', 120);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('main', 'Sushi 12 pieces', 'Create your own mix from the following sushi rolls: salmon, shrimp tempura, avocado, serrano cucumber, unagi sauce', 130);

INSERT INTO menu_items(`category`, `name`, `desc`, `price`, `strength`) VALUES('main', 'Roasted Salmon', 'Pan roasted salmon, sautéed fresno chile, gai lan, shimeji & shiitake mushrooms, kaffirlime leaf, sweet miso, pea shoots', 320, 2);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('main', 'Koshu Braised Wagyu Short Ribs', 'Slow braised boneless ribs served with truffle polenta & glazed carrots', 200);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('main', 'Long-Bone Ribeye', '32oz ginger garlic marinated long-bone ribeye, yuzu koshu butter', 120);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`, `strength`) VALUES('main', 'Filet Mignon', '8 oz filet, pea shoots, red wine reduction, sriracha sesame aioli', 120, 4);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('main', 'Beeler Farms Belly-On Pork Handle', 'Smoked & grilled to medium, yama-hog sauce', 120);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`, `strength`) VALUES('main', 'Wagyu Burger', '200g Japanese wagyu beef, applewood smoked bacon, beemster cheese, beefsteak tomato, Japanese dijon, brioche bun, furikake fries',120, 3);

INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Soda', 'Choose between: coca-cola, coca-cola zero, fanta, sprite', 30);

INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Wines', 'divider', 0);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Ile Four Yuzu', 'Fruity, sweet, very sour taste with a clear character of yuzu, hints of herbs and lemon', 60);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Umepon', 'Fruity, sweet taste with hints of mandarin, almond paste, yellow plums, honey and grapefruit shell', 75);

INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Sake', 'divider', 0);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Junmai Ginjo Shu', 'Floral taste with sweetness, hints of honey melon, green banana, mineral, almond and citrus', 75);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Matsukura', 'Elegant taste with sweetness, elements of pears, almonds, minerals and jasmine', 75);

INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Beers', 'divider', 0);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Wheat King Wit', 'Spicy flavor with hints of light bread, honey, coriander seeds, apricot and orange', 60);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('drinks', 'Yuzu Saison', 'Fruity, slightly sour taste with hints of grapefruit, mandarin, nectarine and lemon balm', 80);

INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('desserts', 'Banana Spring Rolls', 'Caramelized banana, filo, caramel sauce', 50);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('desserts', 'Chocolate Fondant', '', 50);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('desserts', 'Vanilla ice cream', '2 scoops vanilla ice cream topped with chocolate sauce and strawberries', 35);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('desserts', 'Fortune cookie', '', 10);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('desserts', 'Cappuccino', '', 20);
INSERT INTO menu_items(`category`, `name`, `desc`, `price`) VALUES('desserts', 'Jasmine Flower Tea', '', 20);
-- #endregion MENU ITEMS


-- USERNAME: admin@sakana.se
-- PASSWORD: admin
INSERT INTO users(user_id, email, password, name, phone_number, visits) VALUES(1234, "admin@sakana.se", "$2y$10$z9WaZMOQIzQtQ43LEg0wY..gsCLM1gj4rsYQFdFWJGugZ.6plMQ0i", "Admin User", "0123456789", 1);