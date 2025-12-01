<?php
class Controller {
    protected function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . '/../app/views/' . $viewName . '.php';
    }
}
?>
