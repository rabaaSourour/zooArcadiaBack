<?php
require_once 'models/AnimalFoods.php';

class AnimalFoodsController {
    private $animalFoodsModel;
    private $animalModel;

    public function __construct($pdo) {
        $this->animalFoodsModel = new AnimalFoods($pdo);
        $this->animalModel = new Animal($pdo);
    }

    public function index() {
        $feedingLogs = $this->animalFoodsModel->getAll();
        require 'views/feeding_logs/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'veterinary', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        $animals = $this->animalModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $animal_id = $_POST['animal_id'];
            $user_id = $_SESSION['user_id'];
            $food = $_POST['food'];
            $quantity = $_POST['quantity'];

            if ($this->feedingLogModel->create($animal_id, $user_id, $food, $quantity)) {
                header('Location: /animal_foods');
                exit;
            } else {
                echo 'Erreur lors de l\'ajout du journal d\'alimentation.';
            }
        }

        require 'views/animal_foods/create.php';
    }
}
?>
