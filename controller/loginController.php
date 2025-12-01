<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';

class LoginController extends Controller {
    
    // Affiche le formulaire de connexion (GET index.php?page=login)
    public function index() {
        // Si l'utilisateur est déjà connecté, on le redirige vers l'accueil
        if (isset($_SESSION['user'])) {
            header('Location: index.php?page=home');
            exit;
        }

        $data = [
            'title' => 'Connexion Musicode',
            'description' => 'Connectez-vous à votre compte'
        ];
        $this->loadView('login', $data);
    }

    // Traite la connexion (POST index.php?page=login&action=check)
    public function check() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->findByEmail($email);

            // Vérification du mot de passe
            if ($user && password_verify($password, $user['password'])) {
                // Connexion réussie : on enregistre l'user en session
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'nom' => $user['nom'],
                    'email' => $user['email']
                ];
                // Redirection vers l'accueil
                header('Location: index.php?page=home');
                exit;
            } else {
                // Erreur : on recharge la vue avec un message
                $data = [
                    'title' => 'Connexion Musicode',
                    'error' => 'Email ou mot de passe incorrect.'
                ];
                $this->loadView('login', $data);
            }
        }
    }

    // Gère la déconnexion (GET index.php?page=login&action=logout)
    public function logout() {
        session_destroy();
        header('Location: index.php?page=home');
        exit;
    }
}
?>