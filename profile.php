<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .profile-container {
            background: white;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .profile-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .profile-header h1 {
            font-size: 24px;
            margin: 0;
        }
        .profile-information {
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <!--
        possibilité de voir uniquement si connecter sinon reenvoie vers la page de login 
    
    -->


    <div class="profile-container">
        <div class="profile-header">
            <img src="https://via.placeholder.com/60" alt="Profil Image" class="profile-image">
            <?php
                $fichier = fopen("assets/Data/data.csv", "r");

                if ($fichier === false){
                    die("Une erreur s'est produite impossible d'ouvrir le fichier");
                }

                $users = array();
                $mdps = array();
                $emails = array();
                $names = array();
                $lastnames = array();

                while (!feof($fichier)) {
                    list($users[],$names[],$lastnames[],$emails[], $mdps[]) = fgetcsv($fichier);
                }

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
            ?>

            <h1><?php echo $user; ?></h1>
        </div>
        <div class="profile-information">
            <p><strong>Email :</strong> <?php echo $mail; ?>  </p>
            <p><strong>Nom :</strong>  <?php echo $lastname; ?>  </p>
            <p><strong>Prénom :</strong> <?php echo $name; ?> </p>
        </div>

        <button> Modifier les informations </button>
        <button onclick="<?php session_destroy();?>"> se déconnecter </button>
    </div>
</body>
</html>
