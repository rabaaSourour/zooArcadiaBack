<?php
require_once 'config/database.php';

$pdo->exec("DELETE FROM users");
$pdo->exec("DELETE FROM animals");
$pdo->exec("DELETE FROM habitats");
$pdo->exec("DELETE FROM services");
$pdo->exec("DELETE FROM veterinary_reports");
$pdo->exec("DELETE FROM animal_foods");
$pdo->exec("DELETE FROM reviews");

// Ajouter des utilisateurs
$users = [
    ['email' => 'jose.zooarcadia@gmail.com', 'password' => password_hash('adminpass', PASSWORD_DEFAULT), 'role' => 'admin'],
    ['email' => 'vetetinaire.zooarcadia@hotmail.com', 'password' => password_hash('vetpass', PASSWORD_DEFAULT), 'role' => 'veterinaire'],
    ['email' => 'employe.zooarcadia@hotmail.com', 'password' => password_hash('emppass', PASSWORD_DEFAULT), 'role' => 'employee'],
];

foreach ($users as $user) {
    $stmt = $pdo->prepare('INSERT INTO users (email, password, role) VALUES (?, ?, ?)');
    $stmt->execute([$user['emal'], $user['password'], $user['role']]);
}

// Ajouter des habitats
$habitats = [
    ['name' => 'Savane', 'description' => 'Habitat pour les animaux de la savane.', 'image' => 'Savane.png'],
    ['name' => 'Jungle', 'description' => 'Habitat pour les animaux de la jungle.', 'image' => 'Jungle.png'],
    ['name' => 'Marais', 'description' => 'Habitat pour les animaux du marias.', 'image' => 'Marais.png'],
]; 

foreach ($habitats as $habitat) {
    $stmt = $pdo->prepare('INSERT INTO habitats (name, description, image) VALUES (?, ?, ?)');
    $stmt->execute([$habitat['name'], $habitat['description'], $habitat['image']]);
}

// Ajouter des animaux
$animals = [
    ['name' => 'Lion', 'breed' => 'Panthera leo', 'habitat_id' => 2],
    ['name' => 'Jaguar', 'breed' => 'Panthera onca', 'habitat_id' => 1],
    ['name' => 'Singe', 'breed' => 'Alouatta', 'habitat_id' => 1],
    ['name' => 'Toucan', 'breed' => 'Ramphastos', 'habitat_id' => 1],
    ['name' => 'Paresseux', 'breed' => 'Bradypus', 'habitat_id' => 1],
    ['name' => 'Elephant', 'breed' => 'Loxodonta', 'habitat_id' => 2],
    ['name' => 'guepard', 'breed' => 'Acinonyx jubatus', 'habitat_id' => 2],
    ['name' => 'Zébre', 'breed' => 'Equus quagga', 'habitat_id' => 2],
    ['name' => 'Alligator', 'breed' => 'Alligator mississippiensis', 'habitat_id' => 3],
    ['name' => 'Heron', 'breed' => 'Ardea herodias', 'habitat_id' => 3],
    ['name' => 'Tortue', 'breed' => 'Apalone spinifera', 'habitat_id' => 3],
    ['name' => 'Grenouille', 'breed' => 'Lithobates catesbeianus', 'habitat_id' => 3],

];

foreach ($animals as $animal) {
    $stmt = $pdo->prepare('INSERT INTO animals (name, breed, habitat_id) VALUES (?, ?, ?)');
    $stmt->execute([$animal['name'], $animal['breed'], $animal['habitat_id']]);
}

// Ajouter des services
$services = [
    ['name' => 'Visite guidée', 'description' => 'Visite guidée du zoo.', 'image' => 'guide.png'],
    ['name' => 'Visite en train', 'description' => 'Visite du zoo en train.', 'image' => 'train.png'],
    ['name' => 'Restauration', 'description' => 'Restauration du zoo.', 'image' => 'spices.png'],
];

foreach ($services as $service) {
    $stmt = $pdo->prepare('INSERT INTO services (name, description, image) VALUES (?, ?, ?)');
    $stmt->execute([$service['name'], $service['description'], $service['image']]);
}
?>
