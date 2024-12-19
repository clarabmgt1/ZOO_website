<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, le rediriger vers la page de login
    header("Location: login.html");
    exit;
}

// Récupérer les informations de l'utilisateur depuis la session
$user_id = $_SESSION['user_id'];
// Ici, vous pouvez ajouter du code pour récupérer les informations de l'utilisateur depuis la base de données
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parc Animalier - Accueil</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <header>
        <h1>Bienvenue au Parc Animalier</h1>
        <nav>
            <ul>
                <li><a href="profile.php">Mon Profil</a></li>
                <li><a href="manage.php">Gestion Admin</a></li>
                <li><a href="tickets.php">Billetterie</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Nos Biomes</h2>
        <div class="gallery">
            <!-- Les biomes seront insérés ici via PHP -->
            <?php include 'home.php'; ?>
        </div>
    </main>
</body>
</html>
