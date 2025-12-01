<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <?php require_once 'views/header.php'; ?>

    <main class="container">
        
        <div class="back-link">
            <a href="index.php?page=home"><i class="fa-solid fa-arrow-left"></i> Retour au catalogue</a>
        </div>

        <div class="single-card-container">
            <div class="card single-card">
                <div class="card-body">
                    <h2 class="big-title"><?php echo htmlspecialchars($music['titre']); ?></h2>
                    <p class="subtitle">Par <?php echo htmlspecialchars($music['artiste']); ?></p>

                    <div class="details-list">
                        <p>Album : <?php echo htmlspecialchars($music['album'] ?: 'Non spécifié'); ?></p>
                        <p>Durée : <?php echo htmlspecialchars($music['duree']); ?></p>
                    </div>

                    <form action="index.php?page=addToLibrary&action=store" method="POST" class="add-form">
                        <input type="hidden" name="music_id" value="<?php echo $music['id']; ?>">
                        <button type="submit" class="btn-big-add">Ajouter à ma bibliothèque</button>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <?php require_once 'views/footer.php'; ?>
</body>
</html>