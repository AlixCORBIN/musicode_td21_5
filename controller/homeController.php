<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Music.php'; 

class HomeController extends Controller {
    public function index() {
        $musicModel = new Music();
        
        $musics = $musicModel->getAll();

        $data = [
            'title' => 'Musicode - Accueil',
            'musics' => $musics 
        ];

        $this->loadView('home', $data);
    }
}
?>