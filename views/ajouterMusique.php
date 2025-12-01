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

        <section class="form-section">
            <div class="form-header">
                <h2>Ajouter une musique</h2>
                <p>Complétez les informations ci-dessous pour publier un nouveau morceau dans le catalogue.</p>
            </div>

            <form action="index.php?page=ajouterMusique&action=store" method="POST" class="music-form">
                
                <div class="form-group">
                    <label for="titre">Titre *</label>
                    <input type="text" id="titre" name="titre" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="artiste">Artiste *</label>
                    <input type="text" id="artiste" name="artiste" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="album">Album</label>
                    <input type="text" id="album" name="album" placeholder="Optionnel" class="form-control">
                </div>

                <div class="form-group">
                    <label>Durée *</label>
                    <div class="duration-inputs">
                        <div class="input-wrapper">
                            <input type="number" name="duree_min" min="0" max="59" required class="form-control small-input" placeholder="0">
                            <span class="sub-label">Minutes</span>
                        </div>
                        <span class="separator">:</span>
                        <div class="input-wrapper">
                            <input type="number" name="duree_sec" min="0" max="59" required class="form-control small-input" placeholder="00">
                            <span class="sub-label">Secondes</span>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Enregistrer la musique</button>
                </div>

            </form>
        </section>
    </main>

    <?php require_once 'views/footer.php'; ?>
</body>
</html>