<?php
session_start();

if(!isset($_SESSION['LOGGED_USER'])){
    header("Location: login.php");
    exit();
}

$fichier = fopen("assets/Data/data.csv", "r");

if ($fichier === false){
    die("impossible d'ouvrir le fichier data");
}

$users = $mdps  = $emails = $names = $lastnames = $complots = [];

while (!feof($fichier)) {
    list($users[],$mdps[],$names[],$lastnames[],$emails[],$complots[]) = fgetcsv($fichier);
}

fclose($fichier);

$number = 0;
for ($i = 0; $i < sizeof($users);$i++){
    if ($_SESSION['LOGGED_USER'] == $users[$i]){
        $number = 1;
        $user = $users[$i];
        $mdp = $mdps[$i];
        $mail = $emails[$i];
        $name = $names[$i];
        $lastname = $lastnames[$i];
    }
}

//ON actualise la page du user :
// other_user.csv 

$fichier = fopen("assets/Data/".$user."/other_user.csv", "r");

$o_users = $o_complots = $o_friends = $o_swips = $o_bloque = [];

if ($fichier === false){
    die("impossible d'ouvrir le fichier");
}

while (!feof($fichier)) {
    list($o_users[],$o_complots[],$o_friends[],$o_swips[],$o_bloque[]) = fgetcsv($fichier);
}

$i=0;
$y=0;
while(isset($users[$i])){
    if(!isset($o_users[$y]) && $users[$i] != $_SESSION['LOGGED_USER']){
        $o_users[$y] = $users[$i];
        $o_complots[$y] = $complots[$i];
        $o_friends[$y] = 0; 
        $o_swips[$y] = 0;
        $o_bloque[$y] = 0;
        $y+=1;
    }
    $i+=1;
}

fclose($fichier);

$fichier = fopen("assets/Data/".$user."/other_user.csv", "w");

for ($i = 0; $i < sizeof($o_users)-1; $i++) {
    $ligne = $o_users[$i] .",". $o_complots[$i] . "," . $o_friends[$i] .",". $o_swips[$i] .",". $o_bloque[$i] ."\n";
    fwrite($fichier, $ligne);;
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
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            background: #333;
            color: #fff;
            padding: 10px 20px;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            justify-content: flex-start;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            flex: 1;
            display: flex;
            padding: 20px;
        }

        .left-panel {
            
            padding: 20px;
            border-right: 2px solid #ccc;
            width: 60%;
        }

        .chat {
            flex: 2;
            padding: 20px;
        }

        .messages {
            height: 300px;
            overflow-y: scroll;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        textarea {
            width: 100%;
            margin-bottom: 5px;
        }

        .chat button {
            width: 100%;
            padding: 10px;
            background: #0066cc;
            color: white;
            border: none;
            cursor: pointer;
        }
        .profile-card {
            width: 300px;
            height: 400px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            color: white;
        }

        .profile-card .background-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(50%);
        }

        .profile-card .info {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .profile-card h1, .profile-card p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/profile.php">Mon Profil</a></li>
                <li><a href="#">Rechercher</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="left-panel">
            <h2> Aller découvir d'autre profile </h2>
            <p> La on met les swipes</p>
            <br><br><br><br><br>
            <div id="profile_card" class="profile-card">
            <button onclick="begin_swip()">Commencer a swip</button>
            </div>
            <br><br><br><br><br><br>
            <hr>
            <h2>Introduction au sujet</h2>
            <p>Ceci est un texte de présentation pour introduire le sujet du jour. Vous pouvez ici écrire tout ce que vous souhaitez pour engager vos visiteurs.</p>
            <p> Bienvenue chez les platistes blablablabla</p>
        </div>
        <div class="chat">
            <h3>Chat en direct</h3>
            <div class="messages">
                <p><strong>User1:</strong> Salut tout le monde !</p>
                <p><strong>User2:</strong> Salut User1, comment ça va ?</p>
            </div>
            <textarea placeholder="Écrire un message..."></textarea>
            <button>Envoyer</button>
        </div>
    </main>
</body>
</html>
