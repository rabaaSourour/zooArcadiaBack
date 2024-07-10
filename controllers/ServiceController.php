<?php
require_once 'models/Service.php';

class ServiceController {
    private $serviceModel;

    public function __construct($pdo) {
        $this->serviceModel = new Service($pdo);
    }

    public function index() {
        $services = $this->serviceModel->getAll();
        require 'views/services/index.php';
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

            if ($this->serviceModel->create($name, $description, $image)) {
                header('Location: /services');
                exit;
            } else {
                echo 'Erreur lors de l\'ajout du service.';
            }
        }

        require 'views/services/create.php';
    }

    public function edit($id) {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        $service = $this->serviceModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            if ($this->serviceModel->update($id, $name, $description, $image)) {
                header('Location: /services');
                exit;
            } else {
                echo 'Erreur lors de la mise à jour du service.';
            }
        }

        require 'views/services/edit.php';
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if ($this->serviceModel->delete($id)) {
                header('Location: /services');
                exit;
            } else {
                echo 'Erreur lors de la suppression du service.';
            }
        }
    }
}
?>


