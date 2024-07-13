<?php
require_once 'models/AnimalFood.php';

class ApiAnimalFoodsController {
    private $animalFoodModel;

    public function __construct($pdo) {
        $this->animalFoodModel = new AnimalFood($pdo);
    }

    public function index() {
        $animalFoods = $this->animalFoodModel->getAll();
        echo json_encode($animalFoods);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Authentication check for admin or employee
            if (!in_array($_SESSION['role'], ['admin', 'employee'])) {
                http_response_code(403);
                echo json_encode(['message' => 'Forbidden']);
                return;
            }

            $data = json_decode(file_get_contents('php://input'), true);
            $this->animalFoodModel->create($data['name'], $data['food'], $data['quantity'], $data['last_check']);
            http_response_code(201);
            echo json_encode(['message' => 'Animal food created']);
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            // Authentication check for admin or employee
            if (!in_array($_SESSION['role'], ['admin', 'employee'])) {
                http_response_code(403);
                echo json_encode(['message' => 'Forbidden']);
                return;
            }

            $data = json_decode(file_get_contents('php://input'), true);
            $this->animalFoodModel->update($id, $data['name'], $data['food'], $data['quantity'], $data['last_check']);
            echo json_encode(['message' => 'Animal food updated']);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            // Authentication check for admin or employee
            if (!in_array($_SESSION['role'], ['admin', 'employee'])) {
                http_response_code(403);
                echo json_encode(['message' => 'Forbidden']);
                return;
            }

            $this->animalFoodModel->delete($id);
            echo json_encode(['message' => 'Animal food deleted']);
        }
    }
}
?>
