<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            min-width: 400px;
            max-width: 500px;
            text-align: center;
        }

        .profile-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .profile-container h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .profile-container p {
            color: #666;
            margin-bottom: 5px;
        }

        .profile-container a {
            color: #333;
            text-decoration: none;
            border: solid 1px #333;
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 10px;
        }

        .profile-container a:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="path_to_image.jpg" alt="Profil de l'utilisateur">
        <h2>Username</h2>
        <p>Nom: <span>nomutilisateur</span></p>
        <p>Prénom: <span>nomutilisateur</span></p>
        <p>Email: <span>email@exemple.com</span></p>
        <p>Localisation: <span>Ville, Pays</span></p>
        <p>À propos: <span>Courte description...</span></p>
        <a href="edit_profile.php">Éditer Profil</a>
        <a href="index.html">Retour à l'accueil</a>
    </div>
</body>
</html>
