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

        button {
            width: 100%;
            padding: 10px;
            background: #0066cc;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/profil">Mon Profil</a></li>
                <li><a href="/recherche">Rechercher</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="left-panel">
            <h2> Aller découvir d'autre profile </h2>

            <br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br>
            <hr>
            <h2>Introduction au sujet</h2>
            <p>Ceci est un texte de présentation pour introduire le sujet du jour. Vous pouvez ici écrire tout ce que vous souhaitez pour engager vos visiteurs.</p>
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
