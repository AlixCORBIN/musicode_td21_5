<?php
class View {
    public static function render($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . '/../app/views/' . $viewName . '.php';
    }
}
?>