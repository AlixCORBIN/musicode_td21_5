<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Music.php';
require_once __DIR__ . '/../models/UserLibrary.php';

class AddToLibraryController extends Controller {

    public function confirm() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $musicId = $_GET['id'] ?? null;
        if (!$musicId) {
            header('Location: index.php?page=home');
            exit;
        }

        $musicModel = new Music();
        $music = $musicModel->getById($musicId);

        if (!$music) {
            die("Musique introuvable.");
        }

        $data = [
            'title' => $music['titre'],
            'music' => $music
        ];

        $this->loadView('addToLibrary', $data);
    }

    public function store() {
        if (!isset($_SESSION['user']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=login');
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $musicId = $_POST['music_id'];

        $libModel = new UserLibrary();
        $libModel->add($userId, $musicId);

        header('Location: index.php?page=library&message=added');
        exit;
    }
}