<?php
require_once '../model/config.php';
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$conn = new connexion();
$dbc = $conn->CNXbase();

// Ajout d'un produit aux favoris
if (isset($_POST['add_to_favoris'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $image = $_POST['product_image'];

    // Vérifie si le produit est déjà dans la wishlist
    $check = $dbc->prepare("SELECT * FROM wishlist WHERE name = :name AND user_id = :user_id");
    $check->execute(['name' => $name, 'user_id' => $user_id]);

    // Si le produit n'est pas déjà dans la wishlist, on l'ajoute
    if ($check->rowCount() == 0) {
        $insert = $dbc->prepare("INSERT INTO wishlist (name, price, image, user_id) VALUES (:name, :price, :image, :user_id)");
        $insert->execute([
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'user_id' => $user_id
        ]);
    }
}

// Redirige l'utilisateur vers la page des favoris après l'ajout
header('Location: favoris.php');
exit();
?>
