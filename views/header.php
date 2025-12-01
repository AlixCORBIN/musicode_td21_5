<header>
    <div class="brand">
        <img src="img/Musicode-1.svg" alt="Logo Musicode" width="60">
        <h1><a href="index.php?page=home" style="color:white; text-decoration:none;">Musicode</a></h1>
    </div>
    
    <nav>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="index.php?page=home">Catalogue</a>
            <a href="index.php?page=music&action=add">Ajouter une musique</a>
            <a href="index.php?page=library">Ma bibliothèque</a>
            <a href="index.php?page=account">Mon compte</a>
            <a href="index.php?page=auth&action=logout" class="btn-logout">Déconnexion</a>
        
        <?php else: ?>
            <a href="index.php?page=home">Catalogue</a>
            <a href="index.php?page=login">Connexion</a>
            <a href="index.php?page=register">Inscription</a>
        <?php endif; ?>
    </nav>
</header>