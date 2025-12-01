<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';

class RegisterController extends Controller {
    
    // Affiche le formulaire d'inscription (GET index.php?page=register)
    public function index() {
        $data = [
            'title' => 'Inscription Musicode',
            'description' => 'Inscrivez-vous à Musicode'
        ];
        $this->loadView('register', $data);
    }

    // Traite le formulaire d'inscription (POST index.php?page=register&action=store)
    public function store() {
        // 1. Vérification des champs
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirm'])) {
            die("Veuillez remplir tous les champs.");
        }

        $nom = htmlspecialchars(trim($_POST['username']));
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $passwordConfirm = $_POST['password_confirm'];

        if (!$email) die("Email invalide.");
        if ($password !== $passwordConfirm) die("Les mots de passe ne correspondent pas.");
        if (strlen($password) < 6) die("Mot de passe trop court.");

        // 2. Vérification existence user
        $userModel = new User();
        if ($userModel->emailExists($email)) {
            die("Cet email est déjà utilisé.");
        }

        // 3. Hachage et création
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Note: Assurez-vous d'avoir corrigé User.php pour gérer le prénom manquant (voir mon message précédent)
        $success = $userModel->create($nom, $email, $hashedPassword);

        if ($success) {
            // Redirection vers la page de login après succès
            header('Location: index.php?page=login');
            exit;
        } else {
            die("Erreur technique lors de l'inscription.");
        }
    }
}
?>