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
            <h1>Inscription</h1>
            
            <form action="index.php?page=register&action=store" method="POST">
                
                <div class="input-group">
                    <label for="username">Nom d'affichage</label>
                    <input type="text" id="username" name="username" required placeholder="Ex: MusicLover24">
                </div>

                <div class="input-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" required placeholder="exemple@email.com">
                </div>

                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
                </div>

                <div class="input-group">
                    <label for="password_confirm">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirm" name="password_confirm" required placeholder="Répétez le mot de passe">
                </div>

                <button type="submit" class="btn-register">Créer mon compte</button>
            </form>

            <p class="register-link">
                Déjà inscrit ? <a href="index.php?page=auth&action=login">Se connecter.</a>
            </p>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>

</body>

</html>