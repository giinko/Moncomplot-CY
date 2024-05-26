<?php
// Tableau contenant des noms
$noms = ["Alice", "Bob", "Charlie", "Diana", "Edward", "Picer","oegicez"];

// Fonction de recherche de noms contenant une sous-chaîne
function rechercherNomsContenant($tableau, $sousChaine) {
    $resultat = [];

    // Parcourir chaque nom dans le tableau
    foreach ($tableau as $nom) {
        // Vérifier si la sous-chaîne est présente dans le nom (insensible à la casse)
        if (stripos($nom, $sousChaine) !== false) {
            $resultat[] = $nom;
        }
    }

    return $resultat;
}

// Exemple d'utilisation de la fonction
$sousChaine = "ice";
$resultat = rechercherNomsContenant($noms, $sousChaine);

// Afficher les résultats
if (!empty($resultat)) {
    echo "Les noms contenant '$sousChaine' sont : " . implode(", ", $resultat);
} else {
    echo "Aucun nom ne contient '$sousChaine'.";
}
?>
