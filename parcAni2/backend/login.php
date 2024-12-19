<?php
// Inclure le fichier de connexion à la base de données
require_once 'php/db_connect.php';

// Démarrer la session
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour vérifier si l'utilisateur existe dans la base de données
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérifier si un utilisateur avec ce nom d'utilisateur existe
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Vérifier si le mot de passe est correct
        if (password_verify($password, $user['password'])) {
            // Si les informations sont correctes, démarrer une session et rediriger
            $_SESSION['user_id'] = $user['id'];  // Sauvegarder l'ID de l'utilisateur dans la session

            // Rediriger vers la page d'accueil
            header("Location: home.php");
            exit;
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // Utilisateur non trouvé
        echo "Utilisateur non trouvé.";
    }
}


?>
