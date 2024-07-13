<?php
require_once '../config/database.php';
require_once '../models/Animal.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $animal = Animal::find($_GET['id']);
            echo json_encode($animal);
        } else {
            $animals = Animal::all();
            echo json_encode($animals);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $animal = new Animal($data);
        $animal->save();
        echo json_encode(['message' => 'Animal created successfully']);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents('php://input'), true);
            $animal = Animal::find($_GET['id']);
            $animal->update($data);
            echo json_encode(['message' => 'Animal updated successfully']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            Animal::delete($_GET['id']);
            echo json_encode(['message' => 'Animal deleted successfully']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        break;
}
?>
