<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Music.php';

class AjouterMusiqueController extends Controller {

    public function add() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $data = [
            'title' => 'Ajouter une musique',
            'description' => 'Ajoutez un nouveau morceau au catalogue'
        ];
        
        $this->loadView('ajouterMusique', $data);
    }

    public function store() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = htmlspecialchars(trim($_POST['titre']));
            $artiste = htmlspecialchars(trim($_POST['artiste']));
            $album = htmlspecialchars(trim($_POST['album']));
            
            $min = intval($_POST['duree_min']);
            $sec = intval($_POST['duree_sec']);

            if (empty($titre) || empty($artiste)) {
                die("Le titre et l'artiste sont obligatoires.");
            }

            $dureeFormattee = str_pad($min, 2, '0', STR_PAD_LEFT) . ':' . str_pad($sec, 2, '0', STR_PAD_LEFT);

            $musicModel = new Music();
            $success = $musicModel->create($titre, $artiste, $album, $dureeFormattee);

            if ($success) {
                header('Location: index.php?page=home');
                exit;
            } else {
                die("Erreur lors de l'ajout de la musique.");
            }
        }
    }
}
?>