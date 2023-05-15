CREATE DATABASE `buchfuerung` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
-- buchfuerung.accounts definition


-- buchfuerung.items definition

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `should_number` int(11) DEFAULT NULL,
  `should_value` float DEFAULT NULL,
  `have_number` int(11) DEFAULT NULL,
  `have_value` float DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  KEY `should_number` (`should_number`),
  KEY `have_number` (`have_number`),
  CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`should_number`) REFERENCES `items` (`item_id`),
  CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`have_number`) REFERENCES `items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- buchfuerung.balance definition

CREATE TABLE `balance` (
  `balance_id` int(11) NOT NULL AUTO_INCREMENT,
  `activa_number` int(11) DEFAULT NULL,
  `activa_value` float DEFAULT NULL,
  `passiva_number` int(11) DEFAULT NULL,
  `passiva_float` float DEFAULT NULL,
  `type` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`balance_id`),
  KEY `activa_number` (`activa_number`),
  KEY `passiva_number` (`passiva_number`),
  CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`activa_number`) REFERENCES `items` (`item_id`),
  CONSTRAINT `balance_ibfk_2` FOREIGN KEY (`passiva_number`) REFERENCES `items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- buchfuerung.users definition

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `user_year_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `year_id` (`user_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- buchfuerung.years definition

CREATE TABLE `years` (
  `year_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` date DEFAULT NULL,
  `start_balance` int(11) DEFAULT NULL,
  `end_balance` int(11) DEFAULT NULL,
  PRIMARY KEY (`year_id`),
  KEY `start_balance` (`start_balance`),
  KEY `end_balance` (`end_balance`),
  CONSTRAINT `years_ibfk_1` FOREIGN KEY (`start_balance`) REFERENCES `balance` (`balance_id`),
  CONSTRAINT `years_ibfk_2` FOREIGN KEY (`end_balance`) REFERENCES `balance` (`balance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- buchfuerung.user_years definition

CREATE TABLE `user_years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `year_id` (`year_id`),
  CONSTRAINT `user_years_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `user_years_ibfk_2` FOREIGN KEY (`year_id`) REFERENCES `years` (`year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;









