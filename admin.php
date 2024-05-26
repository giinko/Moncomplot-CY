<?php
// Faire les check basics verifier que c'est bien l'admin ...

session_start();

if ($_SESSION['LOGGED_USER']!="admin") {
    header("Location: page_abo.php");
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

fclose($fichier_all_users);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/connexion.js"></script>
    <link rel="stylesheet" href="assets/style/styles.css">
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="#logout">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="sidebar-header">
            <h2>Welcome, Admin</h2>
        </div>
        <div class="admin_all">
            <h1>Dashboard</h1>
            
            <h1>Recherche d'utilisateur</h1>
            <input id="input_admin_recherche_user" type="text" name="rechere_user" placeholder="username">
            <button onclick="recherche_user_admin()">Rechercher</button>
            <br><br>
            <div id="admin_affiche_user"></div>
            <br><br>

            <h1>Recherche de chat</h1>
            <input id="admin_recherche_user" type="text" name="rechere_user" placeholder="message">
            <button>Rechercher</button>
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
            </div>
        </div>
    </div>
</body>
</html>
