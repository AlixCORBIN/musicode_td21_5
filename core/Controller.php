<?php
class Controller {
    protected function loadView($viewName, $data = []) {
        extract($data);
        $viewPath = __DIR__ . '/../views/' . $viewName . '.php';
        
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "Erreur : La vue '$viewName' est introuvable dans $viewPath";
        }
    }
}
?>