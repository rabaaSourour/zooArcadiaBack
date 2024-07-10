<?php
require_once 'models/Animal.php';
require_once 'models/Habitat.php';

class AnimalController {
    private $animalModel;
    private $habitatModel;

    public function __construct($pdo) {
        $this->animalModel = new Animal($pdo);
        $this->habitatModel = new Habitat($pdo);
    }

    public function index() {
        $animals = $this->animalModel->getAll();
        require 'views/animal/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        $habitats = $this->habitatModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $species = $_POST['species'];
            $habitat_id = $_POST['habitat_id'];
            $image = $this->uploadImage($_FILES['image']);

            if ($this->animalModel->create($name, $species, $habitat_id, $image)) {
                header('Location: /animals');
                exit;
            } else {
                echo 'Erreur lors de l\'ajout de l\'animal.';
            }
        }

        require 'views/animal/create.php';
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if ($this->animalModel->delete($id)) {
                header('Location: /animals');
                exit;
            } else {
                echo 'Erreur lors de la suppression de l\'animal.';
            }
        }
    }

    private function uploadImage($file) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $targetFile);
        return $targetFile;
    }
}
?>
