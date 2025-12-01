<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Model.php';

class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Accueil Musicode',
            'description' => 'Bienvenue sur la page d\'accueil'
        ];

        $this->loadView('home', $data);
    }
}
?>