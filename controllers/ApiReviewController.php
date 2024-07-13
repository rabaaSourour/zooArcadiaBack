<?php
require_once 'models/Review.php';

class ApiReviewController {
    private $reviewModel;

    public function __construct($pdo) {
        $this->reviewModel = new Review($pdo);
    }

    public function index() {
        $reviews = $this->reviewModel->getAll();
        echo json_encode($reviews);
    }

    public function pending() {
        $pendingReviews = $this->reviewModel->getPending();
        echo json_encode($pendingReviews);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $this->reviewModel->create($data['user_id'], $data['rating'], $data['comment'], $data['status']);
            http_response_code(201);
            echo json_encode(['message' => 'Review created']);
        }
    }

    public function validate($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            // Authentication check for employee
            if ($_SESSION['role'] !== 'employee') {
                http_response_code(403);
                echo json_encode(['message' => 'Forbidden']);
                return;
            }

            $data = json_decode(file_get_contents('php://input'), true);
            $this->reviewModel->validate($id, $data['status']);
            echo json_encode(['message' => 'Review validated']);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            // Authentication check for employee
            if ($_SESSION['role'] !== 'employee') {
                http_response_code(403);
                echo json_encode(['message' => 'Forbidden']);
                return;
            }

            $this->reviewModel->delete($id);
            echo json_encode(['message' => 'Review deleted']);
        }
    }
}
?>
