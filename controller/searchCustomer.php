<?php
require_once('../model/orders.class.php');
$prod = new orders();

// Vérifier si un terme de recherche a été soumis
if (isset($_POST['search'])) {
    // Récupérer les produits filtrés en fonction du terme de recherche
    $searchTerm = $_POST['search'];
    $resu = $prod->getOrderByNameUser($searchTerm);  // Recherche par nom
} else {
    // Sinon, afficher tous les produits (pagination)
    $res = $prod->getPaginatedOrdersClient($items_per_page, $offset);
}

// Inclure la vue qui affichera les résultats
include("../view/customers.php");
?>
