<?php
require_once 'models/Animal.php';
require_once 'models/Habitat.php';
require_once 'models/Service.php';

class ApiController {
    private $animalModel;
    private $habitatModel;
    private $serviceModel;

    public function __construct($pdo) {
        $this->animalModel = new Animal($pdo);
        $this->habitatModel = new Habitat($pdo);
        $this->serviceModel = new Service($pdo);
    }

    public function getAnimals() {
        header('Content-Type: application/json');
        echo json_encode($this->animalModel->getAll());
    }

    public function getHabitats() {
        header('Content-Type: application/json');
        echo json_encode($this->habitatModel->getAll());
    }

    public function getServices() {
        header('Content-Type: application/json');
        echo json_encode($this->serviceModel->getAll());
    }
}
?>
