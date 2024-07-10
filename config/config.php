<?php

// Configuration de la base de données
define('DB_HOST', 'localhost');  
define('DB_NAME', 'arcadia');    
define('DB_USER', 'root');       
define('DB_PASS', '');           

// Connexion à la base de données avec PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=arcadia', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
