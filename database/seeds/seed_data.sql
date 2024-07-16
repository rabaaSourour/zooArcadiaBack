-- Insertion des utilisateurs
INSERT INTO users (email, password, role) VALUES ('jose.zooarcadia@gmail.com','Jose/1960&','admin');
INSERT INTO users (email, password, role) VALUES ('vetetinaire.zooarcadia@hotmail.com','Vete/zoo&','veterinaire');
INSERT INTO users (email, password, role) VALUES ('employe.zooarcadia@hotmail.com','Empl/zoo&','employee');

-- Insertion des habitats
INSERT INTO habitats (name, description, image) VALUES ('Jungle', 'A dense forest with high humidity and lots of vegetation.', 'Jungle.png');
INSERT INTO habitats (name, description, image) VALUES ('Savana', 'A large open space with grass and a few trees.', 'savan.png');
INSERT INTO habitats (name, description, image) VALUES ('Marais', 'A dense forest with high humidity and lots of vegetation.', 'Marais.png');

-- Insertion des animaux
INSERT INTO animals (name, species, image, habitat_id) VALUES ('Lion', 'Panthera leo', 'lion.jpg', 1);
INSERT INTO animals (name, species, image, habitat_id) VALUES ('Tiger', 'Panthera tigris', 'tiger.jpg', 2);

-- Insertion des services
INSERT INTO services (name, description, image) VALUES ('Visite guidée', 'Visite guidée du zoo.', 'guide.png');
INSERT INTO services (name, description, image) VALUES ('Visite en train', 'Visite du zoo en train.', 'train.png');
INSERT INTO services (name, description, image) VALUES ('Restauration', 'Restauration du zoo.', 'spices.png');

-- Insertion des avis
INSERT INTO reviews (user_id, review, isValid) VALUES (1, 'Great place to visit!', TRUE);
INSERT INTO reviews (user_id, review, isValid) VALUES (2, 'The animals are well cared for.', TRUE);

-- Insertion des horaires d'ouverture
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Lundi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Mardi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Mercredi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Jeudi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Vendredi', '09:00:00', '18:00:00');
INSERT INTO openinghours (day, oopeningTime, closingTime) VALUES ('Samedi', '09:00:00', '20:00:00');
INSERT INTO openinghours (day, openingTime, closingTime) VALUES ('Dimanche', '09:00:00', '20:00:00');
