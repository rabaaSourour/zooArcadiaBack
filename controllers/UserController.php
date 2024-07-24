<?php
require_once 'models/User.php';
require_once 'MailController.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function register() {
        session_start();
        if ($_SESSION['role'] !== 'admin') {
            echo 'Accès refusé. Seul un admin peut créer des comptes.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            if ($this->userModel->create($email, $password, $role)) {
                header('Location: /users');
                exit;
            } else {
                echo 'Erreur lors de la création du compte.';
            }
            
            $mailController = new MailController();
            $to = $_POST['email'];
            $subject = 'Confirmation d\'inscription';
            $body = 'Merci pour votre inscription.';

            $mailController->sendMail($to, $subject, $body);
        }

        require 'views/user/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->getByEmail($email);

            if ($user && password_verify($password, $user['password']) && in_array($user['role'], ['admin', 'veterinaire', 'employee'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header('Location: /');
                exit;
            } else {
                echo 'Email ou mot de passe incorrect, ou rôle non autorisé.';
            }
        }

        require 'views/user/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function list() {
        session_start();
        if ($_SESSION['role'] !== 'admin') {
            echo 'Accès refusé.';
            exit;
        }

        $users = $this->userModel->getAll();
        require 'views/user/list.php';
    }
}
?>



