<?php
session_start();

if(!isset($_SESSION['LOGGED_USER'])){
    header("Location: login.php");
    exit();
}

$fichier = fopen("assets/Data/data.csv", "r");

if ($fichier === false){
    die("impossible d'ouvrir le fichier");
}

$users = array();
$mdps = array();
$emails = array();
$names = array();
$lastnames = array();
$complots = array();

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

$fichier = fopen("assets/Data/"+$user+"/other_user.csv", "r+");

$o_users = $o_mdps = $o_names = $o_lastnames = $o_emails = $o_complots = []

if ($fichier === false){
    die("impossible d'ouvrir le fichier");

    while (!feof($fichier)) {
    list($users[],$mdps[],$names[],$lastnames[],$emails[],$complots[]) = fgetcsv($fichier);
}
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
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
                <li><a href="/profil.php">Mon Profil</a></li>
                <li><a href="#">Rechercher</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="left-panel">
            <h2> Aller découvir d'autre profile </h2>
            <p> La on met les swipes</p>
            <br><br><br><br><br>
            <div class="profile-card">
                <img src="https://via.placeholder.com/300x400.png?text=Noémie" class="background-img" alt="Background Image">
                <div class="info">
                    <h1 id="nom_swipe_pageabo">Noémie</h1>
                    <p id="age_swipe_pageabo">34 ans</p>
                </div>
            </div>
            <button> Ajouter </button>
            <button> Next </button>
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
