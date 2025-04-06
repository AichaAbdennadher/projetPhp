<?php
require_once('../model/user.class.php');
$prod = new utilisateur();

// Vérifier si un terme de recherche a été soumis
if (isset($_POST['search'])) {
    // Récupérer les produits filtrés en fonction du terme de recherche
    $searchTerm = $_POST['search'];
    $prod->email = $searchTerm;
    $resu = $prod->rechercherUser();  // Résultats filtrés
} else {
    // Sinon, afficher tous les produits
    $res = $prod->listCustomers();  // Produits initiaux
}

// Inclure la vue qui affichera les résultats
// On passe les résultats dans l'inclusion pour l'affichage
include("../view/listProduit.php");
?>