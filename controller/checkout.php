<?php
session_start();
require_once('../model/produit.class.php');
require_once('../model/orders.class.php');
require_once('../model/order_items.class.php');
require_once('../model/cart.class.php'); 

// if (!isset($_SESSION['user'])) {
//     header("Location: ../view/login.php");
//     exit;
// }

$email = $_SESSION['user'];
$prod = new product();
$cartObj = new cart();
$stmt = $cartObj->listCartClient($email); 
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = 0;

// 1. Calculer total
foreach ($cartItems as $item) {
    $stmt = $prod->getProduit($item['idProduct']);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $total += $product['price'] * $item['quantity'];
}

// 2. Créer la commande
$order = new orders();
$order->email = $email;
$order->total_amount = $total;
$order_id = $order->insertOrder();

foreach ($cartItems as $item) {
    $stmt = $prod->getProduit($item['idProduct']);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $orderItem = new order_items();
    $orderItem->order_id = $order_id;
    $orderItem->product_id = $item['idProduct'];
    $orderItem->quantity = $item['quantity'];
    $orderItem->price = $product['price'];
    $orderItem->insertOrderItems();
}

// 4. Vider le panier
$cartObj->clearCartByEmail($email); 

header("Location: ../view/facture.php");
?>
