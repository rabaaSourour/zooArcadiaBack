<?php
class DashboardController {
    private $pdo;
    private $consultationsCollection;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->consultationsCollection = require __DIR__ . '/../config/mongodb.php';
    }

    public function show() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            echo 'Accès refusé.';
            exit;
        }

        $role = $_SESSION['role'];
        switch ($role) {
            case 'admin':
                require 'views/dashboard/admin.php';
                break;
            case 'veterinarian':
                require 'views/dashboard/veterinarian.php';
                break;
            case 'employee':
                require 'views/dashboard/employee.php';
                break;
            default:
                echo 'Accès refusé.';
                break;
        }
        // Récupérer les consultations depuis MongoDB
        $consultations = $this->consultationsCollection->find()->toArray();

        // Joindre les données de consultations avec les informations des animaux depuis MySQL
        $animalConsultations = [];
        foreach ($consultations as $consultation) {
            $animalId = $consultation['animal_id'];
            $stmt = $this->pdo->prepare("SELECT * FROM animals WHERE id = ?");
            $stmt->execute([$animalId]);
            $animal = $stmt->fetch();
            if ($animal) {
                $animalConsultations[] = [
                    'animal' => $animal,
                    'consultations' => $consultation['count']
                ];
            }
        }

        require __DIR__ . '/../views/dashboard/show.php'; // Afficher la vue du dashboard
    }
}
?>
