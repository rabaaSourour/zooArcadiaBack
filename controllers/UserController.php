<?php
require_once 'models/User.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function register() {
        if ($_SESSION['role'] !== 'admin') {
            echo 'Accès refusé. Seul un admin peut créer des comptes.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            if ($this->userModel->create($username, $email, $password, $role)) {
                header('Location: /users');
                exit;
            } else {
                echo 'Erreur lors de la création du compte.';
            }
        }

        require 'views/user/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $user = $this->userModel->getByEmail($email);

            if ($user && password_verify($password, $user['password']) && $user['role'] === $role && in_array($role, ['admin', 'veterinaire', 'employee'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header('Location: /');
                exit;
            } else {
                echo 'Email, mot de passe ou rôle incorrect.';
            }
        }

        require 'views/user/login.php';
    }

    public function logout() {
        header('Location: /login');
        exit;
    }

    public function list() {
        if ($_SESSION['role'] !== 'admin') {
            echo 'Accès refusé.';
            exit;
        }

        $users = $this->userModel->getAll();
        require 'views/user/list.php';
    }

    public function delete() {
        if ($_SESSION['role'] !== 'admin') {
            echo 'Accès refusé. Seul un admin peut supprimer des comptes.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];

            if ($this->userModel->delete($userId)) {
                header('Location: /users');
                exit;
            } else {
                echo 'Erreur lors de la suppression du compte.';
            }
        }

        $users = $this->userModel->getAll();
        require 'views/user/list.php';
    }
}
?>


