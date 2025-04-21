<?php
require_once('../model/produit.class.php');
$prod = new product();

// Vérifier si un terme de recherche a été soumis
if (isset($_POST['search'])) {
    // Récupérer les produits filtrés en fonction du terme de recherche
    $searchTerm = $_POST['search'];
    $prod->name = $searchTerm;
    $resuClient = $prod->getProduitByNom();  // Résultats filtrés
} 
// Inclure la vue qui affichera les résultats
// On passe les résultats dans l'inclusion pour l'affichage
include("../view/header.php");
?>
