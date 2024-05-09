<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'enregistrer</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/script_JS/connexion.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0; /* gris clair */
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 23%;
            min-width: 400px;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            color: #333; /* gris foncé */
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button_login {
            width: 100%;
            background-color: #333; /* gris foncé */
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-container input[type="submit"]:hover {
            background-color: #555; /* gris un peu plus foncé */
        }
        .red {

            color: red;
            /*background-color: #333;  gris foncé */
            
            padding: 10px;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

    </style>
</head>
<body>

    <!--
        1) vérifier si le user est co, si il est co on le redirige vers page de base, <- IL RESTE A VéRIFIER CA
        2) dire si mdp ou username est invalide
    -->


    <?php 
        if(isset($_SESSION['LOGGED_USER'])){
            header("Location: index.html");
            exit();
        }
    ?>

    <div class="login-container">
        <h2>Register</h2>
        <div id="erreur_message"></div>
        
        <br>
        <form method="post">
            <input id="username_register" type="text" name="username" placeholder="Username" required>
            <input id="password1_register" type="password" name="password1" placeholder="Password" required>
            <input id="password2_register" type="password" name="password2" placeholder="Confirm Password" required>
            <input id="email_register" type="email" name="email" placeholder="exemple@gmail.com" required>
            <input id="name_register" type="text" name="name" placeholder="Prénom" required>
            <input id="lastname_register" type="text" name="lastname" placeholder="Nom" required>
            <select id="complot_register">
            		<option valeur="fr">Choisir votre complot</option>
						   <option valeur="fr">Terre plate</option>
						   <option valeur="nl">Autre</option>
						   <option valeur="en">Autre</option>
						   <option valeur="other">Autre</option>
						</select>
            <button class="button_login" onclick="register()">Enregistrer</button>
        </form>
        <br>
        <a href="login.php">Se connecter</a>
        <a href="index.html">Acceuil</a>
    </div>


</body>
</html>
