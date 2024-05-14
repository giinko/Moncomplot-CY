<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Document ready, starting AJAX request...");

            $.ajax({
                url: "https://jsonplaceholder.typicode.com/posts/1", // URL de l'API de test
                type: "GET",
                success: function(data) {
                    console.log("AJAX request successful!");
                    console.log(data);
                    // Afficher les résultats dans la div avec un formatage lisible
                    $('#result').html(`
                        <p><strong>userId:</strong> ${data.userId}</p>
                        <p><strong>id:</strong> ${data.id}</p>
                        <p><strong>title:</strong> ${data.title}</p>
                        <p><strong>body:</strong></p>
                        <pre>${data.body}</pre>
                    `);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                    $('#result').text("Erreur: " + error); // Affiche le message d'erreur dans une div
                }
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
    <h1>Test AJAX</h1>
    <div id="result">En attente de la réponse AJAX...</div>
</body>
</html>
