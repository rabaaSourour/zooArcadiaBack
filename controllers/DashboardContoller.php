<?php
class DashboardController {
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
    }
}
?>
