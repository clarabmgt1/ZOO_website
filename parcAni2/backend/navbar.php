<nav>
    <ul>
        <li><a href="home.php">Accueil</a></li>
        <?php if ($_SESSION['user_role'] == 'admin'): ?>
            <li><a href="manage.php">Gestion</a></li>
        <?php endif; ?>
        <li><a href="profile.php">Profil</a></li>  
    </ul>
</nav>
