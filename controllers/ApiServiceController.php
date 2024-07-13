<?php
require_once 'models/Service.php';

class ApiServiceController {
    private $serviceModel;

    public function __construct($pdo) {
        $this->serviceModel = new Service($pdo);
    }

    public function index() {
        $services = $this->serviceModel->getAll();
        echo json_encode($services);
    }

    public function show($id) {
        $service = $this->serviceModel->getById($id);
        echo json_encode($service);
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
            $this->serviceModel->create($data['name'], $data['description'], $data['image']);
            http_response_code(201);
            echo json_encode(['message' => 'Service created']);
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
            $this->serviceModel->update($id, $data['name'], $data['description'], $data['image']);
            echo json_encode(['message' => 'Service updated']);
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

            $this->serviceModel->delete($id);
            echo json_encode(['message' => 'Service deleted']);
        }
    }
}
?>
