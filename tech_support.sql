CREATE DATABASE IF NOT EXISTS tech_support;
USE tech_support;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE IF NOT EXISTS administrators (
  adminID INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  passwordHash VARCHAR(255) NOT NULL,
  PRIMARY KEY (adminID),
  UNIQUE KEY username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO administrators (adminID, username, passwordHash) VALUES
(1, 'admin', '$2y$10$exampleexampleexampleexampleexampleexampleexampleex')
ON DUPLICATE KEY UPDATE username=VALUES(username);

CREATE TABLE IF NOT EXISTS countries (
  countryCode CHAR(2) NOT NULL,
  countryName VARCHAR(100) NOT NULL,
  PRIMARY KEY (countryCode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO countries (countryCode, countryName) VALUES
('CA', 'Canada'),
('US', 'United States')
ON DUPLICATE KEY UPDATE countryName=VALUES(countryName);

CREATE TABLE IF NOT EXISTS customers (
  customerID INT NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(50) NOT NULL,
  lastName VARCHAR(50) NOT NULL,
  address VARCHAR(100),
  city VARCHAR(50),
  state VARCHAR(50),
  postalCode VARCHAR(20),
  countryCode CHAR(2),
  phone VARCHAR(25),
  email VARCHAR(100),
  passwordHash VARCHAR(255),
  PRIMARY KEY (customerID),
  UNIQUE KEY email (email),
  KEY fk_customers_country (countryCode),
  CONSTRAINT fk_customers_country
    FOREIGN KEY (countryCode)
    REFERENCES countries (countryCode)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO customers (customerID, firstName, lastName, address, city, state, postalCode, countryCode, phone, email, passwordHash) VALUES
(1,'Alex','Morgan','10 King St','Toronto','ON','M5H 1A1','CA','416-111-2222','alex@example.com',NULL),
(2,'Jamie','Lee','200 Main Ave','Buffalo','NY','14201','US','716-333-4444','jamie@example.com',NULL)
ON DUPLICATE KEY UPDATE email=VALUES(email);

CREATE TABLE IF NOT EXISTS products (
  productCode VARCHAR(10) NOT NULL,
  name VARCHAR(100) NOT NULL,
  version VARCHAR(20),
  releaseDate DATE,
  PRIMARY KEY (productCode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO products (productCode, name, version, releaseDate) VALUES
('BB10','Baseball Pro','1.0','2025-09-01'),
('SC15','Soccer Pro','1.5','2025-06-15')
ON DUPLICATE KEY UPDATE name=VALUES(name), version=VALUES(version), releaseDate=VALUES(releaseDate);

CREATE TABLE IF NOT EXISTS technicians (
  techID INT NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(50) NOT NULL,
  lastName VARCHAR(50) NOT NULL,
  email VARCHAR(100),
  phone VARCHAR(25),
  passwordHash VARCHAR(255),
  PRIMARY KEY (techID),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO technicians (techID, firstName, lastName, email, phone, passwordHash) VALUES
(1,'Taylor','Ng','tng@sportspro.com','416-555-9876',NULL),
(2,'Chris','Patel','cpatel@sportspro.com','416-555-4567',NULL)
ON DUPLICATE KEY UPDATE email=VALUES(email);

CREATE TABLE IF NOT EXISTS incidents (
  incidentID INT NOT NULL AUTO_INCREMENT,
  customerID INT NOT NULL,
  productCode VARCHAR(10) NOT NULL,
  techID INT,
  dateOpened DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dateClosed DATETIME,
  title VARCHAR(200) NOT NULL,
  description TEXT,
  PRIMARY KEY (incidentID),
  KEY fk_incident_customer (customerID),
  KEY fk_incident_product (productCode),
  KEY fk_incident_tech (techID),
  CONSTRAINT fk_incident_customer
    FOREIGN KEY (customerID) REFERENCES customers (customerID)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_incident_product
    FOREIGN KEY (productCode) REFERENCES products (productCode)
    ON UPDATE CASCADE,
  CONSTRAINT fk_incident_tech
    FOREIGN KEY (techID) REFERENCES technicians (techID)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS registrations (
  registrationID INT NOT NULL AUTO_INCREMENT,
  customerID INT NOT NULL,
  productCode VARCHAR(10) NOT NULL,
  registrationDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (registrationID),
  UNIQUE KEY uq_customer_product (customerID, productCode),
  KEY fk_reg_product (productCode),
  CONSTRAINT fk_reg_customer
    FOREIGN KEY (customerID) REFERENCES customers (customerID)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_reg_product
    FOREIGN KEY (productCode) REFERENCES products (productCode)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO registrations (registrationID, customerID, productCode, registrationDate) VALUES
(1,1,'BB10','2026-01-28 20:52:00'),
(2,2,'SC15','2026-01-28 20:52:00')
ON DUPLICATE KEY UPDATE registrationDate=VALUES(registrationDate);

COMMIT;
