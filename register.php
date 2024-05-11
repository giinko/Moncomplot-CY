<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'enregistrer</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/connexion.js"></script>
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="icon" href="favicon.ico" />
    <link rel="icon" type="/assets/images/favicon" href="/assets/images/favicon.ico" />

</head>

<body>

    <!--
        1) vérifier si le user est co, si il est co on le redirige vers page de base, <- IL RESTE A VéRIFIER CA
        2) dire si mdp ou username est invalide
    -->



    <div id="wrapper">

        <header>
            <nav class="navbar">
                <ul>
                    <li id="logo"><a href="index.html">Logo</a></li>
                    <li><a href="login.php">Se connecter</a></li>
                    <li><a href="register.php">Inscription</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="index.html">Accueil</a></li>
                </ul>
            </nav>
        </header>

        <?php
        if (isset($_SESSION['LOGGED_USER'])) {
            header("Location: index.html");
            exit();
        }
        ?>

        <div class="login-container">
            <h2>Inscription</h2>
            <div id="erreur_message_register"></div>
            <br>
            <form method="post">
                <input id="name_register" type="text" name="name" placeholder="Prénom" required>
                <input id="lastname_register" type="text" name="lastname" placeholder="Nom" required>
                <input id="username_register" type="text" name="username" placeholder="Nom de compte" required>
                <input id="email_register" type="email" name="email" placeholder="Adresse email" required>
                <input id="password1_register" type="password" name="password1" placeholder="Mot de passe" required>
                <input id="password2_register" type="password" name="password2" placeholder="Confirmation mot de passe" required>
                <select id="complot_register" name="complot_register" required>
                    <option valeur="fr">Choisir votre complot</option>
                    <option valeur="fr">Terre plate</option>
                    <option valeur="nl">Platiste</option>
                    <option valeur="en">Hommes sur la lune</option>
                    <option valeur="other">Réptiliens</option>
                </select>
                <div class="choix-conspiration">
                    <h4>Choisissez vo(tre)s complot(s) :</h4>
                    <div class="scroll-box">
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>

                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>

                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Autre
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>

                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>

                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Complot 1
                        </div>
                        <div class="conspiration-card">
                            Autre
                        </div>


                    </div>

                </div>
                <input type="checkbox" id="certif_majeur" name="certif_majeur" class="checkbox" required>
                <label for="certif_majeur">Je certifie avoir 18 ans ou +</label> <br>
                <input type="checkbox" id="conditions" name="conditions" class="checkbox" required>
                <label for="conditions">J'accepte les Conditions d'utilisation , <a href="politique-de-confidentialite.html">Politique de confidentialité.</a></label>


                <button class="button_login" onclick="register()">S'inscrire</button>
            </form>
            <div class="mini-menu">
                Déjà inscrit ? <a href="login.php" class="hoverr">Se connecter</a>
            </div>
        </div>


        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <ul class="footer-links">
                    <li>
                        <p>© blablabla</p>
                    </li>
                    <li><a href="index.html">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                </ul>
            </div>
        </footer>
    </div>

</body>

</html>