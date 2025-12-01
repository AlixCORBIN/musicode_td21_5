<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<<<<<<< HEAD
=======
  <header>
    <div class="brand">
        <img src="../img/Musicode-1.svg" alt="Logo Musicode" width="100">
        <h1><?php echo $title; ?></h1>
    </div>
    
>>>>>>> main

    <header>
        <div class="brand">
            <i class="fa-solid fa-play-circle" style="font-size: 2rem;"></i>
            <h1>Musicode</h1>
        </div>
        
        <nav>
            <a href="index.php?page=home">Catalogue</a>
            <a href="#">Connexion</a>
            <a href="#">Inscription</a>
        </nav>
    </header>

    <main class="container">
        <section class="catalogue-header">
            <h2>Catalogue des musiques</h2>
            <p>Découvrez les morceaux disponibles et ajoutez-les à votre bibliothèque.</p>
        </section>

        <div class="grid-catalogue">
            <?php if (!empty($musics)): ?>
                <?php foreach($musics as $music): ?>
                    <div class="card">
                        <div class="card-body">
                            <h3><?php echo htmlspecialchars($music['titre']); ?></h3>
                            <p class="infos">
                                <?php echo htmlspecialchars($music['artiste']); ?> · 
                                <span class="album">Album : <?php echo htmlspecialchars($music['album']); ?></span>
                            </p>
                            <p class="duree">Durée : <?php echo htmlspecialchars($music['duree']); ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn-link">Voir la fiche</a>
                            <span class="note-login">Connectez-vous pour ajouter</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune musique disponible pour le moment.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>© 2025 Musicode · IUT Laval - R3.01 Développement web 2025-2026.</p>
    </footer>

</body>
</html>