<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/UserLibrary.php';

class LibraryController extends Controller {

    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $libModel = new UserLibrary();
        $musics = $libModel->getByUser($userId);

        $data = [
            'title' => 'Ma bibliothèque',
            'musics' => $musics
        ];

        $this->loadView('library', $data);
    }

    public function update() {
        if (!isset($_SESSION['user']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=login');
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $musicId = intval($_POST['music_id']);
        $note = intval($_POST['note']);

        if ($note < 0) $note = 0;
        if ($note > 5) $note = 5;

        $libModel = new UserLibrary();
        $libModel->updateNote($userId, $musicId, $note);

        header('Location: index.php?page=library&message=updated');
        exit;
    }

    public function delete() {
        if (!isset($_SESSION['user']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=login');
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $musicId = intval($_POST['music_id']);

        $libModel = new UserLibrary();
        $libModel->remove($userId, $musicId);

        header('Location: index.php?page=library&message=deleted');
        exit;
    }
}