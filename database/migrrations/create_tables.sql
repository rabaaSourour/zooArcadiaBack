-- Création des tables

-- Table users
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role VARCHAR(50) NOT NULL,
);

-- Table habitats
CREATE TABLE habitats (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image LONGBLOB
);

-- Table animals
CREATE TABLE animals (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    breed TEXT ,
    image BLOB,
    habitat_id INT,
    FOREIGN KEY (habitat_id) REFERENCES habitats(id)
);

-- Table services
CREATE TABLE services (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image BLOB
);

-- Table reviews
CREATE TABLE reviews (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL,
    review TEXT NOT NULL,
    isValid BOOLEAN,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table animal_foods
CREATE TABLE animal_foods (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    users_id INT(11),
    animal_id INT(11),
    food VARCHAR(255),
    quantity VARCHAR(255),
    last_check DATETime DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users(id),
    FOREIGN KEY (animal_id) REFERENCES animals(id)
);

-- Table report_veterinaries
CREATE TABLE veterinary_reports (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    users_id INT(11),
    animal_id INT(11),
    status TEXT,
    food VARCHAR(255),
    food_quantity VARCHAR(255),
    details TEXT,
    last_check DATE,
    FOREIGN KEY (users_id) REFERENCES users(id),
    FOREIGN KEY (animal_id) REFERENCES animals(id)
);

-- Table opening_hours
CREATE TABLE openinghours (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(20),
    opening_time TIME,
    closing_time TIME
);

