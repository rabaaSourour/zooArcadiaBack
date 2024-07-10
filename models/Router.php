<?php
function route($routes) {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = rtrim($uri, '/'); 
    $uri = $uri === '' ? '/' : $uri; 

    $publicRoutes = ['/login', '/register'];

    if (array_key_exists($uri, $routes)) {
        if (!in_array($uri, $publicRoutes) && !isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $parts = explode('@', $routes[$uri]);
        $controllerName = $parts[0];
        $methodName = $parts[1];

        require_once "controllers/$controllerName.php";
        $controller = new $controllerName($pdo); 

        if (method_exists($controller, $methodName)) {
            $controller->$methodName();
        } else {
            echo "Méthode $methodName non trouvée dans le contrôleur $controllerName.";
        }
    } else {
        echo "Route non trouvée.";
    }
}
