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

$img_profile_user = 'assets/Data/Profils/' . $user . '/img_profile.png';

if (!file_exists($img_profile_user)) {
    $img_profile_user = 'https://via.placeholder.com/150';
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/connexion.js"></script>
    <script src="assets/script_JS/script.js"></script>
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

            <img id="imageDisplay" src="<?php echo $img_profile_user; ?>" alt="Profil Image" class="profile-image" onclick="open_change_pdp()">





            <h1><?php echo $user; ?></h1>


        </div>

        <label id="confirm_up_img"></label>

        <h1 class="info_class">Informations</h1>
        <div id="erreur_message_register"></div>
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
                <p><strong>Complot :</strong> <span id="edit_complot"><?php echo $complot; ?>
                    </span></p>
            </div>

        </div>
        <div>
            <div class="container_end">
                <a href="page_abo.php">
                    <div class="button_rose">Retour à l'accueil</div>
                </a>
                <div class="button_rose" onclick="deco()">Se déconnecter</div>
                <?php
                if ($user == "admin") {
                    echo '<a href="admin.php">';
                    echo '<div class="button_rose" id="sabo">Mode administrateur</div>';
                    echo '</a>';
                } else {
                    echo '<a href="Devenir_vip.php">';
                    echo '<div class="button_rose" id="sabo">Devenir VIP</div>';
                    echo '</a>';
                }
                ?>
            </div>
        </div>
    </div>

    <div id="PPModal" class="modal hidden">
        <div class="modal-content">
            <span class="close" onclick="close_change_pdp()">&times;</span>
            <h2>changer la photo de profil</h2>

            <div class="modal_pp_content">
                <img id="imageDisplay" src="<?php echo $img_profile_user; ?>" alt="Profil Image" class="profile-image">
                <div onclick="document.getElementById('img_up_profile').click()" id="importImage" class="import_image">
                    Cliquez ici pour importer une photo
                    <input id="img_up_profile" type="file" name="photo" accept="image/*">
                </div>
            </div>
            <button id="submitBtn" onclick="upload_img()"> Enregistrer</button>

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

</body>

</html>