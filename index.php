<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

spl_autoload_register(function ($class) {
    if (file_exists("app/controllers/$class.php")) {
        require_once "app/controllers/$class.php";
    }
});

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($page) . 'Controller';

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        http_response_code(404);
        echo "Action non trouvée";
    }
} else {
    http_response_code(404);
    echo "Page non trouvée";
}

?>
