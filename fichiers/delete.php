<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $fileUrl = $data['fileUrl'] ?? null;

    if ($fileUrl) {
        if (
            unlink($fileUrl)) {
// Fichier supprimé avec succès
            $response = [
                'success' => true,
                'message' => 'Le fichier a été supprimé avec succès.'
            ];
        } else {
// Erreur lors de la suppression du fichier
            $response = [
                'success' => false,
                'message' => "Erreur lors de la suppression du fichier."
            ];
        }
    } else {
// URL de fichier non valide
        $response = [
            'success' => false,
            'message' => "URL de fichier non valide."
        ];
    }eader('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

// Redirigez vers la page d'accueil
header('Location: index.php');