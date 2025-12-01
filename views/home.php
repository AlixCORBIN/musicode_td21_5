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
                            <a href="index.php?page=addToLibrary&action=confirm&id=<?php echo $music['id']; ?>" class="btn-link">Voir la fiche</a>
                            
                            <?php if(isset($_SESSION['user'])): ?>
                                <a href="index.php?page=addToLibrary&action=confirm&id=<?php echo $music['id']; ?>" class="btn-add-home">Ajouter</a>
                            <?php else: ?>
                                <span class="note-login">Connectez-vous pour ajouter</span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune musique disponible pour le moment.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php require_once 'footer.php'; ?>

</body>
</html>