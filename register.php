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
                    <li><a href="a-propos.html">À propos</a></li>
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
                <label>Prénom :</label>
                <input id="name_register" type="text" name="name" placeholder="Prénom" required>
                <label>Nom :</label>
                <input id="lastname_register" type="text" name="lastname" placeholder="Nom" required>
                <label>Nom de compte :</label>
                <input id="username_register" type="text" name="username" placeholder="Nom de compte" required>
                <label>Adresse email :</label>
                <input id="email_register" type="email" name="email" placeholder="Adresse email" autocomplete="email" required>
                <label>Mot de passe :</label>
                <input id="password1_register" type="password" name="password1" placeholder="Mot de passe" autocomplete="new-password" required>
                <label>Confirmez votre mot de passe :</label>
                <input id="password2_register" type="password" name="password2" placeholder="Confirmation mot de passe" autocomplete="new-password" required>
                <!--
                <select id="complot_register">
                    <option valeur="fr">Choisir votre complot</option>
                    <option valeur="fr">Terre plate</option>
                    <option valeur="nl">Autre</option>
                    <option valeur="en">Autre</option>
                    <option valeur="other">Autre</option>
                </select> -->

                <div class="choix-conspiration">
                    <h4>Choisissez le complot qui vous interesse :</h4>

                    <div id="scroll_box_reg" class="scroll-box">

                        <div onclick="cards_register('Pyramides')" class="conspiration-card" value="Pyramides">
                            <img src="assets/images/conspirations/pyramides.jpeg" alt="pyramides">
                            <div class="container">
                                <h4>Pyramides</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Chemtrails')" class="conspiration-card" value="Chemtrails">
                            <img src="assets/images/conspirations/chemtrails.jpeg" alt="Chemtrails">
                            <div class="container">
                                <h4>Chemtrails</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Illuminatis')" class="conspiration-card" value="Illuminatis">
                            <img src="assets/images/conspirations/illuminatis.jpeg" alt="Illuminatis">
                            <div class="container">
                                <h4>Illuminatis</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Reptiliens')" class="conspiration-card" value="Reptiliens">
                            <img src="assets/images/conspirations/reptiliens.jpeg" alt="Réptiliens">
                            <div class="container">
                                <h4>Réptiliens</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Aliens')" class="conspiration-card" value="Aliens">
                            <img src="assets/images/conspirations/alien.jpg" alt="Aliens">
                            <div class="container">
                                <h4>Aliens</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Vaccins')" class="conspiration-card" value="Vaccins">
                            <img src="assets/images/conspirations/vaccins.jpg" alt="Vaccins">
                            <div class="container">
                                <h4>Vaccins</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Platistes')" class="conspiration-card" value="Platistes">
                            <img src="assets/images/conspirations/platistes.jpg" alt="Platistes">
                            <div class="container">
                                <h4>Platistes</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Tours_Jumelles')" class="conspiration-card" value="Tours_Jumelles">
                            <img src="assets/images/conspirations/tours-jumelles.jpg" alt="Tours Jumelles">
                            <div class="container">
                                <h4>Tours Jumelles</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Rothschild')" class="conspiration-card" value="Rothschild">
                            <img src="assets/images/conspirations/rothschild.jpg" alt="Famille Rothschild">
                            <div class="container">
                                <h4>Famille Rothschild</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Élections')" class="conspiration-card" value="Élections">
                            <img src="assets/images/conspirations/elections.jpg" alt="Élections">
                            <div class="container">
                                <h4>Élections</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('PucesRFID')" class="conspiration-card" value="PucesRFID">
                            <img src="assets/images/conspirations/puceRFID.jpeg" alt="Puces RFID">
                            <div class="container">
                                <h4>Puces RFID</h4>
                            </div>
                        </div>
                        <div onclick="cards_register('Autre')" class="conspiration-card" value="Autre">
                            <img src="assets/images/conspirations/autre.jpg" alt="Autre">
                            <div class="container">
                                <h4>Autre</h4>
                            </div>
                        </div>
                        <!--
                        <div onclick="cards_register('Mayas')" class="conspiration-card" value="Mayas">
                            <img src="assets/images/conspirations/mayas.jpg" alt="Mayas">
                            <div class="container">
                                <h4>Mayas</h4>
                            </div>
                        </div>
                        <div class="conspiration-card">
                            <img src="assets/images/conspirations/satanisme.jpg" alt="Satanisme">
                            <div class="container">
                                <h4>Satanisme</h4>
                            </div>
                        </div>
                        <div class="conspiration-card">
                            <img src="assets/images/conspirations/cimetière.jpeg" alt="Cimetières">
                            <div class="container">
                                <h4>Cimetières</h4>
                            </div>
                        </div>
                        <div class="conspiration-card">
                            <img src="assets/images/conspirations/satanique.jpg" alt="Pacte-sataniques">
                            <div class="container">
                                <h4>Pactes sataniques</h4>
                            </div>
                        </div>
                        <div class="conspiration-card">
                            <img src="assets/images/conspirations/trou_noir.jpeg" alt="Trous noirs">
                            <div class="container">
                                <h4>Trous noirs</h4>
                            </div>
                        </div>
                        <div class="conspiration-card">
                            <img src="assets/images/conspirations/clonnage.jpg" alt="Clonnage">
                            <div class="container">
                                <h4>Clonnage</h4>
                            </div>
                        </div>
                        <div class="conspiration-card">
                            <img src="assets/images/conspirations/secret-defense.jpg" alt="Secret gouvernementaux">
                            <div class="container">
                                <h4>Secrets gouvernementaux</h4>
                            </div>
                        </div>
                        <div class="conspiration-card">
                            <img src="assets/images/conspirations/pharmaceutique.jpeg" alt="Pharmaceutique">
                            <div class="container">
                                <h4>Pharmaceutiques</h4>
                            </div>
                        </div>
                        -->


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
                    <li><a href="a-propos.html">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="Politique-de-confidentialite.html">Politique de confidentialité</a></li>
                </ul>
            </div>
        </footer>
    </div>

    <script src="assets/script_JS/connexion.js"></script>
</body>

</html>