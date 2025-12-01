<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

spl_autoload_register(function ($class) {
    $path = __DIR__ . "/controller/$class.php";
    if (!file_exists($path)) {
        $path = __DIR__ . "/controller/" . lcfirst($class) . ".php";
    }
    if (file_exists($path)) {
        require_once $path;
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
        echo "Action '$action' non trouvée dans $controllerName";
    }
} else {
    http_response_code(404);
    echo "Page non trouvée ($controllerName)";
}
?>