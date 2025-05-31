<?php
session_start();

// Initialiser le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
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

