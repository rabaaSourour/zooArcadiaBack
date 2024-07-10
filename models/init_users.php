<?php
require_once 'config/config.php';
require_once 'models/User.php';

// Initialisation de la connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=nom_de_votre_base_de_donnees', 'nom_utilisateur', 'mot_de_passe');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userModel = new User($pdo);

// Création de l'utilisateur employee
$email = 'employee@example.com';
$password = password_hash('your_password', PASSWORD_BCRYPT);
$role = 'employee';

if ($userModel->create($username, $email, $password, $role)) {
    echo 'Employee user created successfully.<br>';
} else {
    echo 'Error creating employee user.<br>';
}

// Création de l'utilisateur vétérinaire
$email = 'vet@example.com';
$password = password_hash('your_password', PASSWORD_BCRYPT);
$role = 'veterinaire';

if ($userModel->create($username, $email, $password, $role)) {
    echo 'Veterinaire user created successfully.<br>';
} else {
    echo 'Error creating veterinaire user.<br>';
}
?>

