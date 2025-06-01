<?php
require_once('../controller/session.php');
require_once('../model/favorites.class.php');
require_once('../model/produit.class.php');
session_start();
$F = new Favorites();
$prod = new product();
$F->email = $_SESSION['user']; 
// Ajoutez cette partie pour gérer la suppression
if(isset($_GET['supprimer'])) {
    $idProduct = (int)$_GET['supprimer']; // Sécurisation avec (int)
    $F->supprimerFavorite($idProduct);
    header('Location: favoris.php'); // Recharge la page sans le produit supprimé
    exit();
}
$res = $F->listFavoritesClient($F->email);
$favorites = [];

foreach ($res as $favori) {
    $produitData = $prod->getProduit($favori['idProduct']);
    $data = $produitData->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        $favorites[] = $data;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Favoris</title>
    <link rel="stylesheet" href="../view/css/favoris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

<?php include 'header2.php'; ?>

<div class="container">
    <h1 class="page-title">Mes Favoris</h1>
    <div class="products-grid">
    <?php if (!empty($favorites)): ?>
            <?php foreach ($favorites as $produit): ?>
                <div class="product-card">
                    <img src="../images/<?php echo $produit["image"]; ?>"  class="product-image"> 
                    <div class="product-content">
                        <h3 class="product-title"><?php echo $produit["name"]; ?></h3>
                        <p class="product-price"><?php echo $produit["price"]; ?> TND</p>
                        
                       <div class="product-actions">
<form method="POST" action="../controller/AddCart.php" >
<input type="hidden" name="product_id" value="<?php echo $produit['id']; ?>">
                    <button class="btn btn-primary" type="submit" >
                        <i class="fas fa-shopping-cart"></i> Add to cart
                    </button>
                    </form> 


    <!-- Bouton de suppression classique (conservé) -->
    <a href="favoris.php?supprimer=<?php echo $produit['id']; ?>" 
       class="btn btn-delete">
       <i class="fas fa-trash"></i>
    </a>
</div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="far fa-heart"></i>
                </div>
                <h3 class="empty-text">Votre liste de favoris est vide</h3>
                <a href="acceuil.php" class="empty-link">Parcourir nos produits</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>

