<?php
session_start();


// // Mettre à jour la quantité
// if (isset($_POST['update_qty'])) {
//     $product_id = intval($_POST['product_id']);
//     $quantity = max(1, intval($_POST['quantity']));
//     $stmt = $dbc->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
//     $stmt->execute([$quantity, $user_id, $product_id]);
//     header("Location: panier.php");
//     exit();
// }

// Calcul du total
// function getCartTotal($items) {
//     $total = 0;
//     foreach ($items as $item) {
//         $total += $item['price'] * $item['quantity'];
//     }
//     return $total;
// }
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
                <article class="cart-item">
                    <div class="item-content">
                        <a href="#" class="item-image">
                            <img src="images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" loading="lazy">
                        </a>

                        <div class="item-details">
                            <a href="#" class="item-name"><?= htmlspecialchars($item['name']) ?></a>

                            <div class="item-actions">
                                <a href="panier.php?remove=<?= $item['id'] ?>" class="action-btn remove-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    Supprimer
                                </a>
                            </div>
                        </div>

                        <div class="quantity-price-container">
                            <form method="post" class="quantity-selector">
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                <button type="submit" name="update_qty" value="-" class="quantity-btn decrement" aria-label="Réduire la quantité">
                                    <svg width="12" height="12" viewBox="0 0 24 24"><path d="M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </button>
                                <input type="number" name="quantity" class="quantity-input" value="<?= $item['quantity'] ?>" min="1" aria-label="Quantité">
                                <button type="submit" name="update_qty" value="+" class="quantity-btn increment" aria-label="Augmenter la quantité">
                                    <svg width="12" height="12" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </button>
                            </form>
                            <div class="item-price"><?= number_format($item['price'] * $item['quantity'], 2, ',', ' ') ?>€</div>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="padding: 1rem;">Votre panier est vide.</p>
            <?php endif; ?>
        </section>

        <aside class="order-summary">
            <div class="summary-card">
                <h2 class="summary-title">Récapitulatif</h2>
                <div class="summary-details">
                    <dl class="summary-row">
                        <dt class="summary-label">Sous-total</dt>
                        <dd class="summary-value"><?= number_format(getCartTotal($cart_items), 2, ',', ' ') ?>€</dd>
                    </dl>
                    <dl class="summary-row">
                        <dt class="summary-label">Livraison</dt>
                        <dd class="summary-value">Gratuite</dd>
                    </dl>
                    <dl class="summary-row summary-total">
                        <dt>Total</dt>
                        <dd><?= number_format(getCartTotal($cart_items), 2, ',', ' ') ?>€</dd>
                    </dl>
                </div>
                <a href="checkout.php" class="checkout-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Passer la commande
                </a>
                <p class="continue-shopping">ou <a href="products.php" class="continue-link">Continuer vos achats</a></p>
            </div>
        </aside>
    </div>
</main>
</body>
</html>



