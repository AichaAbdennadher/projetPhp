
<?php
session_start();
require_once('../model/produit.class.php');
require_once('../model/orders.class.php');
require_once('../model/order_items.class.php');


$email = $_SESSION['user'];
$productId = $_POST['product_id'];
$quantity = 1;

$prod = new product();
$stmt = $prod->getProduit($productId); 
$product = $stmt->fetch(PDO::FETCH_ASSOC); 
$price = $product['price'];


// 1. Créer commande
$order = new orders();
$order->email = $email;
$order->total_amount = $price * $quantity;

$order_id = $order->insertOrder(); // cette méthode retourne le lastInsertId

// 2. Ajouter produit à la commande
$item = new order_items();
$item->order_id = $order_id;
$item->product_id = $productId;
$item->quantity = $quantity;
$item->price = $price;
$item->insertOrderItems();

header("Location: ../view/facture.php");

?>

