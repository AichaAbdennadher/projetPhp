<?php
require_once('../model/produit.class.php');

header('Content-Type: application/json'); // Important pour dire que c’est du JSON

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $prodM = new product();
    $resM = $prodM->getProduit($_GET['id']);

    if ($resM) {
        $data = $resM->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'Produit introuvable']);
        }
    } else {
        echo json_encode(['error' => 'Erreur requête produit']);
    }
} else {
    echo json_encode(['error' => 'Paramètre id manquant']);
}