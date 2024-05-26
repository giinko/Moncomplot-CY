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
                <li><a href="a-propos_abo.html">À propos</a></li>
                <li><a href="index.php">Accueil</a></li>
            </ul>
        </nav>
    </header>

    <div class="profile-container">

        <div class="profile-header_vip">
            <h1>Bonjour <?php echo $user; ?></h1>
        </div>
        <h1 class="info_class">Pourquoi devenir VIP ?</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam aspernatur eveniet officia excepturi perspiciatis enim consequuntur aperiam vel et, facere voluptates, voluptas sunt fugit consectetur doloribus quia voluptate nemo accusamus?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate, tempore dolore quia similique ducimus veniam qui voluptatum quod a soluta adipisci distinctio maxime reprehenderit itaque, architecto sequi aperiam nemo! Officiis?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur modi veritatis beatae facilis corporis fugit vero, molestias neque corrupti ducimus nulla minima unde, soluta voluptatibus delectus laudantium omnis eaque Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam vel, quaerat expedita earum at obcaecati cupiditate, labore ipsam veritatis animi quisquam quas minima dolorem laudantium iste. Ipsa maxime ipsum perspiciatis!</p>

        <div class="abonnement_container">
            <table class="tableau_abo">
                <tr>
                    <th></th>
                    <th>Non-VIP</th>
                    <th>Membre VIP</th>

                </tr>
                <tr>
                    <td>Nom en couleur</td>
                    <td> X</td>
                    <td>OUI</td>

                </tr>
                <tr>
                    <td>Priorité sur les swipes</td>
                    <td>X</td>
                    <td>OUI</td>
                </tr>
                <tr>
                    <td>Nom en couleur</td>
                    <td>X</td>
                    <td>OUI</td>

                </tr>
                <tr>
                    <td>Priorité sur les swipes</td>
                    <td>X</td>
                    <td>OUI</td>
                </tr>
            </table>

            <a href="Devenir_vip.php">
                <div class="button_rose" id="sabo">Devenir VIP</div>
            </a>
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