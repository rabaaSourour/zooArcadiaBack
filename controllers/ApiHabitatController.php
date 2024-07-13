<?php
require_once 'models/Habitat.php';

class ApiHabitatController {
    private $habitatModel;

    public function __construct($pdo) {
        $this->habitatModel = new Habitat($pdo);
    }

    public function index() {
        $habitats = $this->habitatModel->getAll();
        echo json_encode($habitats);
    }

    public function show($id) {
        $habitat = $this->habitatModel->getById($id);
        echo json_encode($habitat);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Authentication check for admin
            if ($_SESSION['role'] !== 'admin') {
                http_response_code(403);
                echo json_encode(['message' => 'Forbidden']);
                return;
            }

            $data = json_decode(file_get_contents('php://input'), true);
            $this->habitatModel->create($data['name'], $data['description'], $data['image']);
            http_response_code(201);
            echo json_encode(['message' => 'Habitat created']);
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            // Authentication check for admin
            if ($_SESSION['role'] !== 'admin') {
                http_response_code(403);
                echo json_encode(['message' => 'Forbidden']);
                return;
            }

            $data = json_decode(file_get_contents('php://input'), true);
            $this->habitatModel->update($id, $data['name'], $data['description'], $data['image']);
            echo json_encode(['message' => 'Habitat updated']);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            // Authentication check for admin
            if ($_SESSION['role'] !== 'admin') {
                http_response_code(403);
                echo json_encode(['message' => 'Forbidden']);
                return;
            }

            $this->habitatModel->delete($id);
            echo json_encode(['message' => 'Habitat deleted']);
        }
    }
}
?>
