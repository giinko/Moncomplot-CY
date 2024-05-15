<?php
session_start();

if (!isset($_SESSION['LOGGED_USER'])) {
    header("Location: login.php");
    exit();
}

$fichier_all_users = fopen("assets/Data/data.csv", "r");
$users = $mdps  = $emails = $names = $lastnames = $complots = [];

if ($fichier_all_users === false) {
    die("impossible d'ouvrir le fichier all_data");
}

while (!feof($fichier_all_users)) {
    list($users[], $mdps[], $names[], $lastnames[], $emails[], $complots[]) = fgetcsv($fichier_all_users);
}

//On récup les infos du user connecter
for ($i = 0; $i < sizeof($users); $i++) {
    if ($_SESSION['LOGGED_USER'] == $users[$i]) {
        $user = $users[$i];
        $mdp = $mdps[$i];
        $mail = $emails[$i];
        $name = $names[$i];
        $lastname = $lastnames[$i];
    }
}

//On peut rajouter un check pour voir si le fichier existe.

$fichier_spe = fopen("assets/Data/" . $user . "/other_user.csv", "r");
$o_users = $o_complots = $o_friends = $o_swips = $o_bloque = [];

if ($fichier_spe === false) {
    die("impossible d'ouvrir le fichier other_user");
}

while (!feof($fichier_spe)) {
    list($o_users[], $o_complots[], $o_friends[], $o_swips[], $o_bloque[]) = fgetcsv($fichier_spe);
}

fclose($fichier_all_users);
fclose($fichier_spe);

$i = 0;
$y = 0;

while (isset($users[$i])) {
    if (($o_users[$y] != $users[$i]) && ($users[$i] != $_SESSION['LOGGED_USER'])) {
        $o_users[$y] = $users[$i];
        $o_complots[$y] = $complots[$i];
        $o_friends[$y] = 0;
        $o_swips[$y] = 0;
        $o_bloque[$y] = 0;
        $y += 1;
    } elseif ($o_users[$y] == $users[$i]) {
        $y += 1;
    }
    $i += 1;
}

$fichier = fopen("assets/Data/" . $user . "/other_user.csv", "w");

if ($fichier === false) {
    die("impossible d'ouvrir le 2-fichier other_user");
}

$count = 0;
while (isset($o_users[$count])) {
    $ligne = $o_users[$count] . "," . $o_complots[$count] . "," . $o_friends[$count] . "," . $o_swips[$count] . "," . $o_bloque[$count] . "\n";
    fwrite($fichier, $ligne);
    $count += 1;
}

fclose($fichier);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/connexion.js"></script>
    <link rel="stylesheet" href="assets/style/style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li id="logo"><a href="index.php">MonComplot.fr</a></li>
                <li><a href="">
                        <div onclick="deco()">Se déconnecter</div>
                    </a></li>
                <li><a href="profile.php">Profil</a></li>
                <li><a href="a-propos_abo.html">À propos</a></li>
                <li><a href="index.php">Accueil</a></li>
            </ul>
        </nav>
    </header>
    <main class="main_pageabo">
        <div class="sujetdujour">
            <h2>Introduction au sujet</h2>
            <p>Ceci est un texte de présentation pour introduire le sujet du jour. Vous pouvez ici écrire tout ce que vous souhaitez pour engager vos visiteurs.</p>
            <p> Bienvenue chez les platistes blablablabla</p>
        </div>
        <div class="chat_swipe">

            <div class="chat">
                <h3>Chat en direct</h3>
                <div class="messages">
                    <p><strong>User1:</strong> Salut tout le monde !</p>
                    <p><strong>User2:</strong> Salut User1, comment ça va ?</p>
                </div>
                <textarea placeholder="Écrire un message..."></textarea>
                <button>Envoyer</button>

            </div>
            <div class="swipe">
                <h2> Swipes </h2>
                <p> Découvrez de nouveaux profils </p>
                <div id="profile_card" class="profile-card">
                    <button onclick="begin_swip()">Commencer a swipe</button>
                </div>
            </div>
        </div>
        <div class="sujetdujour">
            <h2>Introduction au sujet</h2>
            <p>Ceci est un texte de présentation pour introduire le sujet du jour. Vous pouvez ici écrire tout ce que vous souhaitez pour engager vos visiteurs.</p>
            <p> Bienvenue chez les platistes blablablabla</p>
        </div>
    </main>


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
</body>

</html>