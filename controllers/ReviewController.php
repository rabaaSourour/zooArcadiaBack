<?php
require_once 'models/Review.php';

class ReviewController {
    private $reviewModel;

    public function __construct($pdo) {
        $this->reviewModel = new Review($pdo);
    }

    public function index() {
        $reviews = $this->reviewModel->getAll();
        require 'views/reviews/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            echo 'Accès refusé.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];
            $content = $_POST['content'];

            if ($this->reviewModel->create($user_id, $content)) {
                header('Location: /reviews');
                exit;
            } else {
                echo 'Erreur lors de l\'ajout de l\'avis.';
            }
        }

        require 'views/reviews/create.php';
    }

    public function pending() {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
            echo 'Accès refusé.';
            exit;
        }

        $reviews = $this->reviewModel->getAllPending();
        require 'views/reviews/pending.php';
    }

    public function validate() {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
            echo 'Accès refusé.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if ($this->reviewModel->validate($id)) {
                header('Location: /reviews/pending');
                exit;
            } else {
                echo 'Erreur lors de la validation de l\'avis.';
            }
        }
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
            echo 'Accès refusé.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if ($this->reviewModel->delete($id)) {
                header('Location: /reviews/pending');
                exit;
            } else {
                echo 'Erreur lors de la suppression de l\'avis.';
            }
        }
    }
}
?>
