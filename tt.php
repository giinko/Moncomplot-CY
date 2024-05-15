<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test AJAX avec PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ajaxButton').click(function() {
                // Désactiver le bouton pour éviter plusieurs clics simultanés
                $(this).prop('disabled', true);

                $.ajax({
                    url: "script.php", // URL de votre script PHP
                    type: "POST",
                    data: { key: 'value' }, // Données à envoyer
                    dataType: "json", // Attente de réponse JSON
                    success: function(data) {
                        console.log("AJAX request successful!");
                        console.log(data);
                        $('#result').html(`
                            <p>Réponse: ${data.message}</p>
                        `);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", status, error);
                        $('#result').text("Erreur: " + error); // Affiche le message d'erreur dans une div
                    },
                    complete: function() {
                        // Réactiver le bouton après la requête
                        $('#ajaxButton').prop('disabled', false);
                    }
                });
            });
        });
    </script>
    <style>
        #result {
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }
        pre {
            white-space: pre-wrap; /* Garde les retours à la ligne et les espaces */
        }
    </style>
</head>
<body>
    <h1>Test AJAX avec PHP</h1>
    <button id="ajaxButton">Envoyer requête AJAX</button>
    <div id="result">En attente de la réponse AJAX...</div>
</body>
</html>
