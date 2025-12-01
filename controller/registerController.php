<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Model.php';

class RegisterController extends Controller {
    public function index() {
        $data = [
            'title' => 'Inscription Musicode',
            'description' => 'Inscrivez-vous à Musicode'
        ];

        $this->loadView('register', $data);
    }
    
    public function register() {
        require_once __DIR__ . '/../views/register.php';
    }

    public function store_user() {
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirm'])) {
            die("Veuillez remplir tous les champs.");
        }

        $nomAffichage = htmlspecialchars(trim($_POST['username']));
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $passwordConfirm = $_POST['password_confirm'];

        if (!$email) die("Email invalide.");
        if ($password !== $passwordConfirm) die("Les mots de passe ne correspondent pas.");
        if (strlen($password) < 6) die("Mot de passe trop court.");

        $userModel = new User();
        if ($userModel->emailExists($email)) {
            die("Cet email est déjà utilisé.");
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $success = $userModel->create($nomAffichage, $email, $hashedPassword);

        if ($success) {
            header('Location: index.php?page=auth&action=login');
            exit;
        } else {
            die("Erreur technique lors de l'inscription.");
        }
    }

    public function login() {
        require_once __DIR__ . '/../views/login.php';
    }

}
?>
