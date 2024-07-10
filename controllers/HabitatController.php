<?php
require_once 'models/Habitat.php';

class HabitatController {
    private $habitatModel;

    public function __construct($pdo) {
        $this->habitatModel = new Habitat($pdo);
    }

    public function index() {
        $habitats = $this->habitatModel->getAll();
        require 'views/habitats/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            if ($this->habitatModel->create($name, $description, $image)) {
                header('Location: /habitats');
                exit;
            } else {
                echo 'Erreur lors de l\'ajout de l\'habitat.';
            }
        }

        require 'views/habitats/create.php';
    }

    public function edit($id) {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        $habitat = $this->habitatModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            if ($this->habitatModel->update($id, $name, $description, $image)) {
                header('Location: /habitats');
                exit;
            } else {
                echo 'Erreur lors de la mise à jour de l\'habitat.';
            }
        }

        require 'views/habitats/edit.php';
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if ($this->habitatModel->delete($id)) {
                header('Location: /habitats');
                exit;
            } else {
                echo 'Erreur lors de la suppression de l\'habitat.';
            }
        }
    }
}
?>

