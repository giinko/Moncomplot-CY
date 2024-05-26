<?php
session_start();

if (isset($_SESSION['LOGGED_USER'])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/connexion.js"></script>
    <link rel="stylesheet" href="assets/style/style.css">
</head>

<body>


    <div id="wrapper">

        <!-- Header -->
        <header>
            <nav class="navbar">
                <ul>
                    <li id="logo"><a href="index.php">Logo</a></li>
                    <li><a href="login.php">Se connecter</a></li>
                    <li><a href="register.php">Inscription</a></li>
                    <li><a href="a-propos.html">À propos</a></li>
                    <li><a href="index.php">Accueil</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <div class="main">
            <div class="login-container">
                <h2>Connexion</h2>
                <div id="erreur_message"></div>

                <br>
                <form method="post">
                    <input id="username_loginpage" type="text" name="username" placeholder="Pseudo" required>
                    <input id="password_loginpage" type="password" name="password" placeholder="Mot de passe" required>

                    <label for="stay_logged_in">Rester connecté</label>
                    <input type="checkbox" id="stay_logged_in" name="stay_logged_in" class="checkbox">
                    <button class="button_login" onclick="login()">Se connecter</button>
                </form>
                <div class="mini-menu">
                    Pas encore inscrit ? <a href="register.php">S'inscrire</a> <br>
                    Mot de passe oublié ? <a href="">Retrouver mon mot de passe</a>
                </div>
            </div>
            <!-- Bannière -->




        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <ul class="footer-links">
                <li>
                    <p>© blablabla</p>
                </li>
                <li><a href="a-propos.html">À propos</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="Politique-de-confidentialite.html">Politique de confidentialité</a></li>
            </ul>
        </div>
    </footer>




</body>

</html>