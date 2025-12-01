<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php require_once 'header.php'; ?>
    <div class="login-wrapper">
        <div class="login-card">
            <h1>Connexion</h1>

            <form action="index.php?page=login&action=check" method="POST">

                <div class="input-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="btn-login">Se connecter</button>
            </form>

            <p class="register-link">
                Pas encore de compte ? <a href="index.php?page=register">Créer un compte.</a>
            </p>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>

</body>

</html>