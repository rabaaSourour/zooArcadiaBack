<?php

// Configuration de la base de données
define('DB_HOST', '127.0.0.1');  
define('DB_NAME', 'arcadia');    
define('DB_USER', 'root');       
define('DB_PASS', '');           

// Connexion à la base de données avec PDO
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=arcadia', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
