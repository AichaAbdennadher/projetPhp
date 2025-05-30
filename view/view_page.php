<?php
session_start();
require_once 'config.php';

$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("Connectez-vous d'abord !");
}

if (isset($_GET['add_to_cart'])) {
    $product_id = intval($_GET['add_to_cart']);

    $stmt = $dbc->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->execute([$user_id, $product_id]);

    if ($stmt->rowCount() > 0) {
        $dbc->prepare("UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?")
            ->execute([$user_id, $product_id]);
    } else {
        $dbc->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)")
            ->execute([$user_id, $product_id]);
    }

    header("Location: panier.php");
    exit();
}
?>
