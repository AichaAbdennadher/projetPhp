<?php
require_once('../model/cart.class.php');

// Affichage du contenu de $_POST pour vérifier ce qui est envoyé
echo "<pre>";
print_r($_POST);
echo "</pre>";
exit();

if (!isset($_POST['idProduct'])) {
    die("Erreur : idProduct non défini !");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'add') {
    // Créer une nouvelle instance de la classe cart
    $prod = new cart();

    // Récupérer l'email ou définir un email par défaut
    $prod->email = $_POST['email'] ?? "aicha@gmail.com";
    
    // Récupérer l'ID produit depuis $_POST['id'] et l'assigner à idProduct
    $prod->idProduct = $_POST['idProduct']; // Assigner l'ID du produit

    // Vérifier si l'ID du produit est valide
    if ($prod->idProduct > 0) {
        // Insérer le produit dans le panier
        $prod->insertCart();
        
        // Rediriger vers la page du panier
        header("Location: ../view/panier.php");
        exit(); // Toujours appeler exit après une redirection
    } else {
        echo "Erreur : ID produit invalide.";
    }
}
?>

