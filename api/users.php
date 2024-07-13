<?php
require_once '../config/database.php';
require_once '../models/User.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $user = User::find($_GET['id']);
            echo json_encode($user);
        } else {
            $users = User::all();
            echo json_encode($users);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $user = new User($data);
        $user->save();
        echo json_encode(['message' => 'User created successfully']);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents('php://input'), true);
            $user = User::find($_GET['id']);
            $user->update($data);
            echo json_encode(['message' => 'User updated successfully']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            User::delete($_GET['id']);
            echo json_encode(['message' => 'User deleted successfully']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        break;
}
?>
