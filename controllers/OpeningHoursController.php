<?php
require_once 'models/OpeningHours.php';

class OpeningHoursController {
    private $openingHoursModel;

    public function __construct($pdo) {
        $this->openingHoursModel = new OpeningHours($pdo);
    }

    public function index() {
        $opening_hours = $this->openingHoursModel->getAll();
        require 'views/opening_hours/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $day = $_POST['day'];
            $open_time = $_POST['open_time'];
            $close_time = $_POST['close_time'];

            if ($this->openingHoursModel->create($day, $open_time, $close_time)) {
                header('Location: /opening_hours');
                exit;
            } else {
                echo 'Erreur lors de l\'ajout des horaires d\'ouverture.';
            }
        }

        require 'views/opening_hours/create.php';
    }

    public function edit($id) {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        $opening_hour = $this->openingHoursModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $day = $_POST['day'];
            $open_time = $_POST['open_time'];
            $close_time = $_POST['close_time'];

            if ($this->openingHoursModel->update($id, $day, $open_time, $close_time)) {
                header('Location: /opening_hours');
                exit;
            } else {
                echo 'Erreur lors de la mise à jour des horaires d\'ouverture.';
            }
        }

        require 'views/opening_hours/edit.php';
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'employee'])) {
            echo 'Accès refusé.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if ($this->openingHoursModel->delete($id)) {
                header('Location: /opening_hours');
                exit;
            } else {
                echo 'Erreur lors de la suppression des horaires d\'ouverture.';
            }
        }
    }
}
?>
