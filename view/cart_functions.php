<?php
session_start();

// Initialiser le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/**
 * Ajouter un produit au panier
 */
function addToCart($productId, $name, $price, $image, $quantity = 1) {
    // Si le produit existe déjà, mettre à jour la quantité
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        // Sinon, ajouter le nouveau produit
        $_SESSION['cart'][$productId] = [
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'quantity' => $quantity
        ];
    }
}

/**
 * Supprimer un produit du panier
 */
function removeFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

/**
 * Mettre à jour la quantité d'un produit
 */
function updateQuantity($productId, $quantity) {
    if (isset($_SESSION['cart'][$productId]) {
        $_SESSION['cart'][$productId]['quantity'] = max(1, $quantity);
    }
}

/**
 * Calculer le total du panier
 */
function calculateTotal() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

/**
 * Vider le panier
 */
function clearCart() {
    $_SESSION['cart'] = [];
}
?>