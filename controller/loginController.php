<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Model.php';

class LoginController extends Controller {
    public function index() {
        $data = [
            'title' => 'Connexion Musicode',
            'description' => 'Connectez-vous à votre compte'
        ];

        $this->loadView('login', $data);
    }
}
?>