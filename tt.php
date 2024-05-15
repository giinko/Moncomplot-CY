<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Charger une image</title>
</head>
<body>

<!-- Input pour sélectionner un fichier -->
<input type="file" id="fileInput" accept="image/*">

<!-- Zone où l'image sera affichée -->
<img id="imageDisplay" src="" alt="Image sélectionnée" style="max-width: 300px; display: none;">

<script>
// Sélection de l'input et de l'élément img
const input = document.getElementById('fileInput');
const imageDisplay = document.getElementById('imageDisplay');

// Fonction appelée lorsque l'utilisateur sélectionne un fichier
input.addEventListener('change', function() {
    // Vérifier si un fichier a été sélectionné
    if (this.files && this.files[0]) {
        // Création d'une instance de FileReader
        var reader = new FileReader();

        // Définir ce qui se passe lorsque le fichier est lu
        reader.onload = function(e) {
            // Mettre à jour la source de l'élément img
            imageDisplay.src = e.target.result;
            imageDisplay.style.display = 'block';
        };

        // Lire le fichier sélectionné
        reader.readAsDataURL(this.files[0]);
    }
});
</script>

</body>
</html>
