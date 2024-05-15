<?php
    $fichier = fopen("assets/Data/chat_platiste.csv", "r");

    if($fichier===false){
        file_put_contents("assets/Data/chats_complots/chat_platiste.csv","\n");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test AJAX avec PHP</title>
    
    <style>
        
    </style>
</head>
<body>
    <h1>Test  PHP</h1>
</body>
</html>
