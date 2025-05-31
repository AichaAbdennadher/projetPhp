<?php
session_start();
require_once ('../controller/session.php');
require_once('../model/cart.class.php');

$prod = new cart();
$prod->email = $_SESSION['user']; 
$cart_items = $prod->listCartClient($prod->email);   
// S'assurer que c'est un tableau
if (!is_array($cart_items)) {
    $cart_items = iterator_to_array($cart_items);
}

function getCartTotal($items) {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

if (isset($_POST['quantity']) && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = max(1, intval($_POST['quantity']));

    $prod->updateQuantity($prod->email, $product_id, $quantity);

    header("Location: panier.php");
}
if (isset($_GET['remove'])) {
    $product_id = intval($_GET['remove']);
    $email = $_SESSION['user'];
    
    $prod->removeItemFromCart($email, $product_id);

    header("Location: panier.php");

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Panier</title>
    <link rel="stylesheet" href="panier.css">
</head>
<body>
<main class="cart-container">
    <header class="cart-header">
        <h1 class="cart-title">Votre Panier</h1>
    </header>
    <div class="cart-layout">
        <section class="cart-items">
            <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $item): ?>
                <article class="cart-item" id="product-<?= $item['id'] ?>"></article>
                    <div class="item-content">
                        <a href="#" class="item-image">
                            <img src="../images/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" loading="lazy">
                        </a>


                        <div class="item-details">
                            <a href="#" class="item-name"><?= $item['name'] ?></a>
<form method="post" class="quantity-selector" action="../controller/modifQ.php">
    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
    <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" aria-label="Quantité" onchange="this.form.submit()">

</form>
                            <div class="item-actions">
                                <a href="panier.php?remove=<?= $item['id'] ?>" class="action-btn remove-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    Supprimer
                                </a>
                            </div>
                        </div>

                        <div class="quantity-price-container">
                            <div class="item-price"><?= number_format($item['price'] * $item['quantity'], 2, ',', ' ') ?>TND</div>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="padding: 1rem;">Votre panier est vide.</p>
            <?php endif; ?>
        </section>

        <aside class="order-summary">
            <?php reset($cart_items);
           ?>
            <div class="summary-card">
                <h2 class="summary-title">Récapitulatif</h2>
                <div class="summary-details">
                    <dl class="summary-row">
                        <dt class="summary-label">Livraison</dt>
                        <dd class="summary-value">Gratuite</dd>
                    </dl>
                    <dl class="summary-row summary-total">
                        <dt>Total</dt>
                        <dd><?= number_format(getCartTotal($cart_items), 2, ',', ' ') ?> DTN</dd>
                    </dl>
                </div>
                <a href="checkout.php" class="checkout-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Passer la commande
                </a>
                <p class="continue-shopping">ou <a href="acceuil.php" class="continue-link">Continuer vos achats</a></p>
            </div>
        </aside>
    </div>
</main>
</body>
</html>
