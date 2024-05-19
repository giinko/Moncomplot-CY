<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moncomplot</title>
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="icon" type="image/ico" href="images/favicon.ico" />
</head>

<body>

    <div id="wrapper">

        <!-- Header -->
        <header>
            <nav class="navbar">
                <ul>
                    <li id="logo"><a href="index.php">MonComplot.fr</a></li>
                    <li><a href="index.php">
                            <div onclick="deco()">Se déconnecter</div>
                        </a></li>
                    <li><a href="profile.php">Profil</a></li>
                    <li><a href="a-propos_abo.php">À propos</a></li>
                    <li><a href="index.php">Accueil</a></li>
                </ul>
            </nav>
        </header>

        <!-- Bannière -->
        <div class="banner">
            <div class="MonComplot">
                <h1>À propos</h1>
                <p>de MonComplot.fr</p>
            </div>
        </div>

        <!-- Main -->
        <div class="main">


            <!-- Catalogue -->

            <div class="explications">
                <h2>MonComplot.fr ? Qu'est-ce que c'est ?</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, rem. Veritatis, cumque maiores? Et
                    voluptates sapiente quidem error, cumque doloremque repellendus assumenda labore odio aspernatur
                    totam tenetur ex nesciunt voluptas.</p>
            </div>
            <div class="presentation">
                <div class="rubrique">
                    <div class="contenu-text">
                        <h2>Rencontrez ceux qui vous ressemblent vraiment !</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit corporis velit illum
                            laboriosam
                            ratione, quae sed, ullam praesentium optio sit facere ipsam nemo at. Vel voluptatibus fugiat
                            soluta. Fuga, officia.</p>
                    </div>
                    <div class="contenu-image">
                        <img src="/assets/images/fond-violet.jpg" alt="Image 2">
                    </div>
                </div>
                <div class="rubrique">
                    <div class="contenu-text">
                        <h2>Partagez une experience UNIQUE</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit corporis velit illum
                            laboriosam
                            ratione, quae sed, ullam praesentium optio sit facere ipsam nemo at. Vel voluptatibus fugiat
                            soluta. Fuga, officia.</p>
                    </div>
                    <div class="contenu-image">
                        <img src="/assets/images/fond-violet.jpg" alt="Image 2">
                    </div>
                </div>
                <div class="rubrique">
                    <div class="contenu-text">
                        <h2>Qui sommes-nous ?</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit corporis velit illum
                            laboriosam
                            ratione, quae sed, ullam praesentium optio sit facere ipsam nemo at. Vel voluptatibus fugiat
                            soluta. Fuga, officia.</p>
                    </div>
                    <div class="contenu-image">
                        <img src="/assets/images/fond-violet.jpg" alt="Image 2">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="subscriptionModal" class="modal hidden">
        <div class="modal-content">
            <span class="close" onclick="closeSubscriptionModal()">&times;</span>
            <h2>Inscrivez-vous !</h2>
            <p>Celavous interesse ? Rejoignez MonComplot.fr et rencontrez votre âme-soeur dès a présent !</p>
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
                <li><a href="index.html">À propos</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="Politique-de-confidentialite.html">Politique de confidentialité</a></li>
            </ul>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/connexion.js"></script>
</body>

</html>