<?php

$dossier_cible = 'upload_files/';

if (!file_exists($dossier_cible)) {
    mkdir($dossier_cible, 0777, true);
}

if (isset($_FILES['file'])) {
    $fichier = $_FILES['file'];
    $chemin_cible = $dossier_cible . basename($fichier['name']);

    if (move_uploaded_file($fichier['tmp_name'], $chemin_cible)) {
        http_response_code(200);
        echo "Le fichier " . $fichier['name'] . " a été téléchargé avec succès.";
    } else {
        http_response_code(500);
        echo "Erreur lors du téléchargement du fichier " . $fichier['name'] . ".";
    }
} else {
    http_response_code(400);
    echo "Erreur lors du téléchargement des fichiers.";
}

?>
