<?php
// Faire les check basics verifier que c'est bien l'admin ...

session_start();

if (!isset($_SESSION['LOGGED_USER'])) {
    //uniquement si le user == admin
    //header("Location: login.php");
    //exit();
}

$fichier_all_users = fopen("assets/Data/data.csv", "r");
$users = $mdps  = $emails = $names = $lastnames = $complots = [];

if ($fichier_all_users === false) {
    die("impossible d'ouvrir le fichier all_data");
}

while (!feof($fichier_all_users)) {
    list($users[], $mdps[], $names[], $lastnames[], $emails[], $complots[]) = fgetcsv($fichier_all_users);
}


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
        <div class="navbar">
            <h2>Welcome, Admin</h2>
        </div>
        <div class="admin_all">
            <h1>Dashboard</h1>
            
            <h1>Recherche d'utilisateur</h1>
            <p>Le site a <u>34</u> utilisateurs</p>
            <input id="admin_recherche_user" type="text" name="rechere_user" placeholder="username">
            <button>Rechercher</button>
        </div>
    </div>
</body>
</html>
