<?php
// Paramètres de connexion à la base de données
$host = 'localhost'; // Adresse du serveur de la base de données
$dbname = 'parc_animalier'; // Nom de la base de données
$username = 'camille'; // Nom d'utilisateur
$password = 'martini'; // Mot de passe (à adapter selon votre configuration)

try {
    // Création de la connexion à la base de données avec PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration pour afficher les erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'échec, afficher une erreur et arrêter l'exécution
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
