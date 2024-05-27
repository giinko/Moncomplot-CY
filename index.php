<?php
session_start();

if (isset($_SESSION['LOGGED_USER'])) {
  header("Location: page_abo.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Moncomplot</title>
  <link rel="stylesheet" href="assets/style/style.css">
</head>

<body class="index_body">

  <div id="wrapper">
    <div class="indexres">
      <!-- Header -->
      <header>
        <nav class="navbar" id="navbar">
          <ul>
            <li id="logo"><a href="index.php">MonComplot.fr</a></li>
            <li><a href="login.php">Se connecter</a></li>
            <li><a href="register.php">Inscription</a></li>
            <li><a href="a-propos.html">À propos</a></li>
            <li><a href="#">Accueil</a></li>
          </ul>
        </nav>
      </header>

      <!-- Bannière -->
      <div class="banner">
        <div class="MonComplot">
          <h1>MonComplot.fr</h1>
          <p>Vous y croyez ? Nous aussi !</p>
        </div>
      </div>

      <!-- Main -->
      <div class="main">


        <!-- Catalogue -->
        <div class="presentation">
          <h2>Faites connaissance avec des gens qui VOUS ressemblent !</h2>
        </div>
        <div class="catalogue-profils">
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Bibi</b></h4>
              <p>20 ans</p>
              <p>platiste</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Tati</b></h4>
              <p>28 ans</p>
              <p>illuminatiste</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>PucesRFID</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Pyramides</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Réptiliens</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Autre</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Elections</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Réptiliens</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Platiste</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Réptiliens</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Réptiliens</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Vaccins</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Réptiliens</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Pyramides</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Réptiliens</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Réptiliens</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Réptiliens</p>
            </div>
          </div>
          <div class="profil" onclick="openSubscriptionModal()">
            <img src="assets/images/img_avatar.png" alt="Avatar">
            <div class="container">
              <h4><b>Cest Papa</b></h4>
              <p>70 ans</p>
              <p>Réptiliens</p>
            </div>
          </div>
        </div>
        <div class="presentation">
          <h2>Rejoignez nos multiples communautées !</h2>
        </div>
        <div class="catalogue-communautes">
          <div class="communaute" onclick="openSubscriptionModal()">
            <img src="assets/images/conspirations/platistes.jpg" alt="Platiste_image">
            <div class="container">
              <h4><b>Platistes</b></h4>
              <p>Communauté des platistes</p>
            </div>
          </div>
          <div class="communaute" onclick="openSubscriptionModal()">
            <img src="assets/images/conspirations/illuminatis.jpeg" alt="Illuminatis_image">
            <div class="container">
              <h4><b>Illuminatis</b></h4>
              <p>Contrôlent-ils le monde ?</p>
            </div>
          </div>
          <div class="communaute" onclick="openSubscriptionModal()">
            <img src="assets/images/conspirations/prgm_appollo.jpeg" alt="Programme_AppolloII_image">
            <div class="container">
              <h4><b>Programme Appollo II</b></h4>
              <p>Ils ne sont jamais allés sur la lune.</p>
            </div>
          </div>
          <div class="communaute" onclick="openSubscriptionModal()">
            <img src="assets/images/conspirations/reptiliens.jpeg" alt="Reptiliens_image">
            <div class="container">
              <h4><b>Réptiliens</b></h4>
              <p>Ils vivent parmis nous...</p>
            </div>
          </div>
          <div class="communaute" onclick="openSubscriptionModal()">
            <img src="assets/images/conspirations/pyramides.jpeg" alt="Pyramides_image">
            <div class="container">
              <h4><b>Pyramides</b></h4>
              <p>Ce n'est pas l'oeuvre d'être-humains</p>
            </div>
          </div>
          <div class="communaute" onclick="openSubscriptionModal()">
            <img src="assets/images/conspirations/vaccins.jpg" alt="Vaccins_image">
            <div class="container">
              <h4><b>Vaccins</b></h4>
              <p>Ils veulent nous contrôler c'est sûr</p>
            </div>
          </div>
          <div class="communaute" onclick="openSubscriptionModal()">
            <img src="assets/images/conspirations/tours-jumelles.jpg" alt="Tours_jumelles_image">
            <div class="container">
              <h4><b>Tours jumelles</b></h4>
              <p>Un coup de l'état ?</p>
            </div>
          </div>
          <div class="communaute" onclick="openSubscriptionModal()">
            <img src="assets/images/conspirations/alien.jpg" alt="Aliens_image">
            <div class="container">
              <h4><b>Aliens</b></h4>
              <p>Nous ne sommes pas seuls...</p>
            </div>
          </div>
          <div class="communaute" onclick="openSubscriptionModal()">
            <img src="assets/images/conspirations/LOT_complots.jpg" alt="lotcomplots_image">
            <div class="container">
              <h4><b>Et pleins d'autres encore !</b></h4>
              <p>Rejoignez MonComplot.fr pour voir d'avantage de communautées</p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

  <div id="subscriptionModal" class="modal hidden">
    <div class="modal-content">
      <span class="close" onclick="closeSubscriptionModal()">&times;</span>
      <h2>Inscrivez-vous !</h2>
      <p>Cela vous interesse ? Rejoignez MonComplot.fr et faites des rencontres exceptionnelles</p>
      <a href="register.php"><button>Je m'inscris !</button></a>
      <p> Déja membre ? <a href="login.php" id="djj"> Je me connecte</a> </p>
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
        <li><a href="Politique_conf.html">Politique de confidentialité</a></li>
      </ul>
    </div>
  </footer>
  <script src="assets/script_JS/script.js"></script>
</body>

</html>