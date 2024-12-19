<?php
session_start();
require_once '../php/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../html/login.html');
    exit;
}

$query = $db->prepare("SELECT * FROM users WHERE id = ?");
$query->execute([$_SESSION['user_id']]);
$user = $query->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <h1>Bienvenue, <?= htmlspecialchars($user['name']) ?></h1>
    <p>Email : <?= htmlspecialchars($user['email']) ?></p>
    <a href="../php/logout.php">Se déconnecter</a>
</body>
</html>
