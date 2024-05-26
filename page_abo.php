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
        $complot = $complots[$i];
    }
}

//On peut rajouter un check pour voir si le fichier existe.

$fichier_spe = fopen("assets/Data/Profils/" . $user . "/other_user.csv", "r");
$o_users = $o_complots = $o_friends = $o_swips = $o_bloque = [];

// Si le fichier other_user n'existe pas on le crée pour eviter les 
if ($fichier_spe === false) {

    $chemin_dos = "assets/Data/Profils/" . $user;
    mkdir($chemin_dos, 0777, True);
    file_put_contents($chemin_dos . "/other_user.csv", "\n");

    $fichier_spe = fopen("assets/Data/Profils/" . $user . "/other_user.csv", "r");
}

if ($fichier_spe === false) {
    die("impossible d'ouvrir le fichier other_user : erreur inconu");
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

$fichier = fopen("assets/Data/Profils/" . $user . "/other_user.csv", "w");

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
    <link rel="stylesheet" href="assets/style/style.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/chat.js"></script>

</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li id="logo"><a href="profile.php">Mon Profil</a></li>
                <li><a href="index.php" onclick="deco()">
                        <div>Se déconnecter</div>
                    </a></li>
                <li><a href="profile.php">Profil</a></li>
                <li><a href="a-propos_abo.php">À propos</a></li>
                <li><a href="index.php">Accueil</a></li>
            </ul>
        </nav>
    </header>
    <main class="main_pageabo">
        <div class="sujetdujour">
            <h2 class="theorie">
                <?php $nv_complot = str_replace('_', ' ', $complot);
                echo $nv_complot ?>
            </h2>
            <p>
                <?php
                switch ($nv_complot) {
                    case "Tours Jumelles":
                        $text = "Le complot concernant les attentats du 11 septembre 2001 sur les Tours jumelles du World Trade Center à New York affirme que ces attaques n'ont pas été orchestrées par des terroristes d'Al-Qaïda, mais plutôt par le gouvernement américain ou d'autres forces obscures. Les théoriciens avancent plusieurs arguments : les bâtiments se seraient effondrés de manière similaire à une démolition contrôlée, des éléments indiquant que l'attaque aurait pu être prévue à l'avance, et que le vol 77 qui aurait frappé le Pentagone n'aurait pas laissé suffisamment de débris pour correspondre à un avion de ligne. Ces théories ont été largement réfutées par des enquêtes indépendantes et des rapports scientifiques, mais elles persistent dans l'imaginaire de certains conspirationnistes.";
                        echo $text;
                        break;
                    case "Pyramides":
                        $text = "La théorie selon laquelle les pyramides d'Égypte ne pourraient pas avoir été construites par les anciens Égyptiens avec les technologies de l'époque gagne en crédibilité en raison de la précision et de la taille impressionnantes de ces structures. Certains suggèrent que les pyramides ont été édifiées avec l'aide d'extraterrestres ou grâce à des technologies avancées perdues au fil du temps. Des anomalies archéologiques et des inscriptions énigmatiques sont souvent citées pour soutenir l'idée que les pyramides renferment des secrets sur des civilisations anciennes très avancées ou des connaissances ésotériques puissantes.";
                        echo $text;
                        break;
                    case "Rothschild":
                        $text = "La théorie du complot sur la famille Rothschild affirme que cette dynastie bancaire internationale contrôle secrètement les banques centrales, les marchés financiers, et les gouvernements du monde entier. Selon les partisans de cette théorie, les Rothschild utiliseraient leur immense fortune et influence pour manipuler les événements économiques et politiques à leur avantage. Cette théorie, largement discréditée, est souvent critiquée pour son manque de preuves et ses sous-entendus antisémites.";
                        echo $text;
                        break;
                    case "Aliens":
                        $text = "La théorie des aliens postule que des extraterrestres ont non seulement visité la Terre, mais qu'ils interagissent régulièrement avec les humains et influencent les événements mondiaux. Les partisans de cette théorie croient que des gouvernements, en particulier celui des États-Unis, dissimulent la preuve de ces rencontres. Des incidents célèbres comme l'incident de Roswell en 1947, où un OVNI aurait été récupéré par l'armée américaine, et des témoignages de personnes affirmant avoir été enlevées par des extraterrestres sont souvent cités comme preuves. Selon cette théorie, les extraterrestres seraient impliqués dans des programmes secrets de recherche et pourraient avoir des bases cachées sur Terre ou sur la Lune. Les documents déclassifiés, les vidéos d'OVNI enregistrées par des militaires, et les témoignages de hauts responsables renforcent la conviction que les gouvernements cachent la vérité sur les aliens pour éviter la panique ou protéger des avancées technologiques secrètes.";
                        echo $text;
                        break;
                    case "Reptiliens":
                        $text = "La théorie des reptiliens, popularisée par David Icke, propose que des extraterrestres reptiliens ont infiltré la société humaine et contrôlent secrètement le monde. Selon cette théorie, ces créatures auraient la capacité de prendre une forme humaine et occuperaient des positions de pouvoir dans les gouvernements, les entreprises, et les médias. Les partisans de cette théorie affirment que certains dirigeants mondiaux et célébrités sont en réalité des reptiliens déguisés, utilisant leur influence pour manipuler et contrôler l'humanité. Des témoignages d'anciens initiés et des observations inexpliquées renforcent cette croyance.";
                        echo $text;
                        break;
                    case "Platistes":
                        $text = "La théorie de la Terre plate postule que la Terre n'est pas une sphère mais une surface plane, et que cette vérité est cachée par un complot mondial. Les partisans de cette théorie, appelés platistes, soutiennent que les preuves fournies par les agences spatiales, telles que les photos de la Terre depuis l'espace, sont falsifiées. Ils affirment que des phénomènes tels que l'horizon toujours à hauteur des yeux et l'absence de courbure visible sur de longues distances appuient leur vision. Selon eux, les institutions scientifiques et les gouvernements conspirent pour maintenir la croyance en une Terre sphérique afin de contrôler et manipuler la population mondiale. Des vidéos et des témoignages de voyageurs qui prétendent ne pas voir de courbure depuis des avions ou des points de vue élevés sont souvent utilisés pour renforcer cette théorie.";
                        echo $text;
                        break;
                    case "Chemtrails":
                        $text = "La théorie des chemtrails suggère que les traînées blanches laissées par certains avions dans le ciel ne sont pas simplement des traces de condensation, mais des produits chimiques délibérément dispersés par les gouvernements ou des organisations secrètes. Les partisans de cette théorie croient que ces substances sont pulvérisées dans l'atmosphère pour des raisons diverses, telles que le contrôle climatique, la manipulation de la population, ou des expérimentations secrètes. Ils pointent vers des anomalies météorologiques, des augmentations de maladies respiratoires, et des résidus chimiques trouvés au sol comme preuves potentielles. Cette théorie, bien que largement rejetée par la communauté scientifique qui explique ces traînées comme des contrails (traînées de condensation), continue de susciter des inquiétudes et des débats parmi les théoriciens du complot.";
                        echo $text;
                        break;
                    case "Illuminatis":
                        $text = "La théorie des Illuminatis soutient l'existence d'une organisation secrète puissante et influente, dont les membres manipuleraient les événements mondiaux pour instaurer un nouvel ordre mondial. Selon cette théorie, les Illuminati cherchent à établir un gouvernement mondial totalitaire, en contrôlant les gouvernements, les banques, les médias, et d'autres institutions clés. Les partisans de cette théorie affirment que les symboles occultes et les signes de la main associés aux Illuminati sont dissimulés dans les logos des grandes entreprises, les monuments, et les médias populaires. Ils pointent également vers des familles influentes, des personnalités politiques et des célébrités comme membres présumés de cette organisation secrète. Bien que les preuves tangibles de l'existence des Illuminati soient rares, les théoriciens du complot soutiennent que les événements historiques majeurs, tels que les guerres mondiales et les crises économiques, sont orchestrés par cette organisation pour atteindre leurs objectifs de contrôle mondial.";
                        echo $text;
                        break;
                    case "Vaccins":
                        $text = "La théorie des vaccins controversés remet en question l'innocuité et l'efficacité des vaccins largement utilisés dans la société moderne. Selon cette théorie, les vaccins peuvent causer des effets secondaires graves et à long terme, y compris des troubles neurologiques, des maladies auto-immunes et même l'autisme chez les enfants. Les partisans de cette théorie mettent en avant des cas individuels où des personnes ont développé des complications après avoir été vaccinées, ainsi que des études controversées soutenant une corrélation entre certains vaccins et des problèmes de santé. Certains affirment également que les compagnies pharmaceutiques et les gouvernements dissimulent les risques des vaccins pour protéger leurs profits ou pour maintenir le contrôle sur la population. Malgré le consensus scientifique sur la sécurité et l'efficacité des vaccins dans la prévention de maladies infectieuses graves, la théorie des vaccins controversés persiste et alimente la méfiance à l'égard de la vaccination dans certaines communautés.";
                        echo $text;
                        break;
                    case "PucesRFID":
                        $text = "La théorie des puces RFID suggère que les gouvernements ou des entités secrètes implantent secrètement des puces RFID (Radio Frequency Identification) dans le corps humain pour surveiller et contrôler la population. Selon cette théorie, ces puces, de la taille d'un grain de riz, peuvent être implantées lors de vaccins ou d'autres procédures médicales sans le consentement des individus. Les partisans de cette théorie croient que ces puces permettraient un suivi en temps réel des mouvements des individus, ainsi qu'un accès à leurs informations personnelles et médicales. Certains vont même jusqu'à affirmer que ces puces pourraient être utilisées pour influencer les pensées et les comportements des individus. Bien que la technologie des puces RFID soit réelle et utilisée dans divers domaines comme la logistique et la sécurité, l'idée d'une utilisation généralisée pour le contrôle de la population reste largement considérée comme une théorie du complot sans fondement par la plupart des experts.";
                        echo $text;
                        break;
                    case "Élections":
                        $text = "La théorie des élections manipulées suggère que les processus électoraux dans de nombreux pays sont sujets à une manipulation orchestrée par des élites politiques ou des forces extérieures. Selon cette théorie, les résultats des élections ne reflètent pas toujours la volonté réelle du peuple, car ils sont truqués ou influencés par divers moyens. Les partisans de cette théorie citent des preuves d'irrégularités électorales, telles que des votes multiples, des fraudes électorales, la suppression des électeurs, ou des interférences étrangères via la cyberattaque ou la désinformation. Ils soulignent également le rôle des médias et des grandes entreprises dans la manipulation de l'opinion publique pour influencer les résultats électoraux. Bien que des cas isolés de fraude électorale aient été documentés, la plupart des experts en élection soutiennent que les processus électoraux sont généralement transparents et que les allégations de manipulation sont souvent exagérées ou politiquement motivées.";
                        echo $text;
                        break;
                    default:
                        echo "Vous croyez en un autre complot. Discuttez avec les gens qui croient en un autre complot que ceux qui vous sont proposés.";
                }

                ?> </p>
        </div>




        <div class="chat_swipe">


            <div class="chat">
                <h3>Chat en direct du complot : <?php echo $complot ?></h3>

                <div class="messages" id="chat_messages">
                    <p><strong>User1:</strong> Salut tout le monde !</p>
                    <p><strong>User2:</strong> Salut User1, comment ça va ?</p>
                </div>

                <textarea id="chat_input" placeholder="Écrire un message..."></textarea>
                <button id="send_chat_msg">Envoyer</button>
            </div>




            <div class="swipe">
                <h2>Nos swipes</h2>
                <p> Découvrez de nouveaux profils </p>
                <div onclick="begin_swip()" id="profile_card" class="profile-card">

                    <div class="commencement">Cliquez pour commencer !</div>
                </div>
            </div>

        </div>



        <!--
        <div class="sujetdujour" id="all_friends">

            <?php
            for ($i = 0; $i < sizeof($o_users); $i++) {
                if ($o_friends[$i] == 1) {
                    echo "<p>votre ami : $o_users[$i]";

                    echo "<button onclick='supp_friend(\"$o_users[$i]\")'>Supprimer ami</button>
                    <button> Bloquer </button>
                    </p>";
                }
            }

            for ($i = 0; $i < sizeof($o_users); $i++) {
                if ($o_bloque[$i] == 1) {
                    echo "<p>vous avez bloqué : $o_users[$i]
                    <button> Débloquer </button>
                    </p>";
                }
            }


            ?> -->

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
                <li><a href="Politique_conf.html">Politique de confidentialité</a></li>
            </ul>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/connexion.js"></script>
</body>

</html>