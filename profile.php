<?php
session_start();

if (!isset($_SESSION['LOGGED_USER'])) {
    header("Location: login.php");
    exit();
}

$fichier = fopen("assets/Data/data.csv", "r");

if ($fichier === false) {
    die("impossible d'ouvrir le fichier");
}

$users = $mdps = $names = $lastnames = $emails = $complots = [];

while (!feof($fichier)) {
    list($users[], $mdps[], $names[], $lastnames[], $emails[], $complots[]) = fgetcsv($fichier);
}

for ($i = 0; $i < sizeof($users); $i++) {
    if ($_SESSION['LOGGED_USER'] == $users[$i]) {
        $user = $users[$i];
        $mdp = $mdps[$i];
        $mail = $emails[$i];
        $name = $names[$i];
        $lastname = $lastnames[$i];
        $complot = $complots[$i];
    }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>

    <header>
        <nav class="navbar">
            <ul>
                <li id="logo"><a href="index.php">MonComplot.fr</a></li>
                <li><a href="">
                        <div onclick="deco()">Se déconnecter</div>
                    </a></li>
                <li><a href="a-propos.html">À propos</a></li>
                <li><a href="index.php">Accueil</a></li>
            </ul>
        </nav>
    </header>

    <div class="profile-container">
        <div class="profile-header">

            <img src="https://via.placeholder.com/150" alt="Profil Image" class="profile-image">


            <input id="img_up_profile" type="file" name="photo" accept="image/*">
            <button onclick="upload_img()"> Submit</button>
            <img id="imageDisplay" src="" alt="Image sélectionnée" style="max-width: 300px; display: none;">


            <h1><?php echo $user; ?></h1>
        </div>
        <h1 class="info_class">Informations</h1>
        <div class="profile-information">
            <div class="line">
                <p><strong>Prénom :</strong> <span id="edit_name"><?php echo $name; ?>
                        <img src="/assets/images/modify.png" onclick='edit_profile("edit_name", "<?php echo $name; ?>");' id="button_edit" alt="">
                    </span></p>
            </div>
            <div class="line">
                <p><strong>Nom :</strong><span id="edit_lastname"><?php echo $lastname; ?>
                        <img src="/assets/images/modify.png" onclick='edit_profile("edit_lastname", "<?php echo $lastname; ?>");' id="button_edit" alt="">
            </div>
            <div class="line">
                <p><strong>Email :</strong><span id="edit_email"><?php echo $mail; ?>
                        <img src="/assets/images/modify.png" onclick='edit_profile("edit_email", "<?php echo $mail; ?>");' id="button_edit" alt="">
            </div>

            <div class="line">
                <p><strong>Mot de Passe :</strong> <span id="edit_mdp"><?php echo $mdp; ?>
                        <img src="/assets/images/modify.png" onclick='edit_profile("edit_mdp", "<?php echo $mdp; ?>");' id="button_edit" alt="">
                    </span></p>
            </div>

            <div class="line">
                <p><strong>Complots :</strong> <span id="edit_complot"><?php echo $complot; ?>
                        <img src="/assets/images/modify.png" id="button_edit" alt="">
                    </span></p>
            </div>

        </div>
        <div>
            <div class="container_end">
                <a href="page_abo.php">
                    <div class="button_rose">Retour à l'accueil</div>
                </a>
                <div class="button_rose" onclick="deco()">Se déconnecter</div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/connexion.js"></script>
</body>

</html>