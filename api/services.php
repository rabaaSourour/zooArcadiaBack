<?php
require_once '../config/database.php';
require_once '../models/Service.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $service = Service::find($_GET['id']);
            echo json_encode($service);
        } else {
            $services = Service::all();
            echo json_encode($services);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $service = new Service($data);
        $service->save();
        echo json_encode(['message' => 'Service created successfully']);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents('php://input'), true);
            $service = Service::find($_GET['id']);
            $service->update($data);
            echo json_encode(['message' => 'Service updated successfully']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            Service::delete($_GET['id']);
            echo json_encode(['message' => 'Service deleted successfully']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        break;
}
?>
