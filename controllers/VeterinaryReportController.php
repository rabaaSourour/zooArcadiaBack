<?php
require_once 'models/VeterinaryReport.php';

class VeterinaryReportController {
    private $veterinaryReportModel;

    public function __construct($pdo) {
        $this->veterinaryReportModel = new VeterinaryReport($pdo);
    }

    public function index() {
        $reports = $this->veterinaryReportModel->getAll();
        require 'views/veterinary_reports/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $animal_id = $_POST['animal_id'];
            $status = $_POST['status'];
            $food = $_POST['food'];
            $food_quantity = $_POST['food_quantity'];
            $details = $_POST['details'];
            $last_check = $_POST['last_check'];

            if ($this->veterinaryReportModel->create($animal_id, $status, $food, $food_quantity, $details, $last_check)) {
                header('Location: /veterinary_reports');
                exit;
            } else {
                echo 'Erreur lors de la création du rapport vétérinaire.';
            }
        }

        $animals = $this->veterinaryReportModel->getAll();
        require 'views/veterinary_reports/create.php';
    }
}
?>
