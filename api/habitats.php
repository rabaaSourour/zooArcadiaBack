<?php
require_once '../config/database.php';
require_once '../models/Habitat.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $habitat = Habitat::find($_GET['id']);
            echo json_encode($habitat);
        } else {
            $habitats = Habitat::all();
            echo json_encode($habitats);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $habitat = new Habitat($data);
        $habitat->save();
        echo json_encode(['message' => 'Habitat created successfully']);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents('php://input'), true);
            $habitat = Habitat::find($_GET['id']);
            $habitat->update($data);
            echo json_encode(['message' => 'Habitat updated successfully']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            Habitat::delete($_GET['id']);
            echo json_encode(['message' => 'Habitat deleted successfully']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        break;
}
?>
