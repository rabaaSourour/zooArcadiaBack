<?php
$routes = [
    '/' => 'HomeController@index',
    '/dashboard'=> 'DashboardController@show',
    '/animals' => 'AnimalController@index',
    '/animal/show' => 'AnimalController@show',
    '/animal/create' => 'AnimalController@create',
    '/animal/edit' => 'AnimalController@edite',
    '/habitats' => 'HabitatController@index',
    '/habitat/create' => 'HabitatController@create',
    '/habitat/edit' => 'HabitatController@edit',
    '/delete_habitat' => 'HabitatController@delete',
    '/services' => 'ServiceController@index',
    '/service/create' => 'ServiceController@create',
    '/service/edit' => 'ServiceController@edit',
    '/delete_service' => 'ServiceController@delete',
    '/animal_foods' => 'AnimalFoodsController@index',
    '/fanimal_food/create' => 'AnimalFoodsController@create',
    '/login' => 'UserController@login',
    '/register' => 'UserController@register',
    '/logout' => 'UserController@logout',
    '/users' => 'UserController@list',
    '/delete_user' => 'UserController@delete',
    '/reviews'=>'ReviewController@index',
    '/review/create'=>'ReviewController@create',
    '/reviews/pending'=> 'ReviewController@pending',
    '/review/validate'=>'ReviewController@validate',
    '/review/delete'=> 'ReviewController@delete',
    '/opening_hours' => 'OpeningHoursController@index',
    '/opening_hours/create' => 'OpeningHoursController@create',
    '/opening_hours/edit' => 'OpeningHoursController@edit',
    '/update_opening_hours' => 'OpeningHoursController@update',
];

function route($routes) {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = rtrim($uri, '/'); 
    $uri = $uri === '' ? '/' : $uri; 

    $publicRoutes = ['/login'];

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
?>
