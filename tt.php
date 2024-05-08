<?php
// Démarrer la session
session_start();

// Vérifier si le bouton de déconnexion a été pressé
if (isset($_POST['deconnexion'])) {
    // Vider toutes les variables de session
    $_SESSION = array();

    // Supprimer le cookie de session si utilisé
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Détruire la session
    session_destroy();

    // Redirection vers la page de connexion ou d'accueil
    header("Location: login.php"); // Assurez-vous de remplacer 'login.php' par la page de votre choix
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="deconnexion">Déconnexion</button>
    </form>
</body>
</html>
