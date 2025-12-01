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
        
        <section class="catalogue-header">
            <h2>Ma bibliothèque</h2>
            <p>Gérez vos morceaux préférés et ajustez vos notes.</p>
            
            <?php if (isset($_GET['message']) && $_GET['message'] == 'updated'): ?>
                <div class="alert-success">Note mise à jour avec succès.</div>
            <?php elseif (isset($_GET['message']) && $_GET['message'] == 'deleted'): ?>
                <div class="alert-success">Musique retirée de votre bibliothèque.</div>
            <?php endif; ?>
        </section>

        <div class="grid-catalogue">
            <?php if (!empty($musics)): ?>
                <?php foreach($musics as $music): ?>
                    <div class="card library-card">
                        <div class="card-body">
                            <h3><?php echo htmlspecialchars($music['titre']); ?></h3>
                            <p class="infos">
                                <?php echo htmlspecialchars($music['artiste']); ?> · 
                                <span class="album">Album : <?php echo htmlspecialchars($music['album']); ?></span>
                            </p>
                            <p class="duree">Durée : <?php echo htmlspecialchars($music['duree']); ?></p>

                            <form action="index.php?page=library&action=update" method="POST" class="rating-form">
                                <input type="hidden" name="music_id" value="<?php echo $music['id']; ?>">
                                <div class="rating-group">
                                    <label>Note</label>
                                    <input type="number" name="note" value="<?php echo $music['note']; ?>" min="0" max="5" class="input-note">
                                    <button type="submit" class="btn-update">Mettre à jour</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="card-footer-library">
                             <form action="index.php?page=library&action=delete" method="POST" onsubmit="return confirm('Voulez-vous vraiment retirer ce morceau ?');">
                                <input type="hidden" name="music_id" value="<?php echo $music['id']; ?>">
                                <button type="submit" class="btn-remove">Retirer de ma bibliothèque</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <p>Votre bibliothèque est vide.</p>
                    <a href="index.php?page=home" class="btn-link">Parcourir le catalogue</a>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php require_once 'views/footer.php'; ?>
</body>
</html>