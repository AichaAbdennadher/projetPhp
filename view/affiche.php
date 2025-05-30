<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floraison - Produits Visage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<?php
require_once ('../controller/session.php');
require_once('../model/produit.class.php');
$prod=new product();
$res=$prod->listProduits();
?>
<body>
<?php include '../view/header2.php'; ?>

    <main>
        <section class="products-header">
            <h2>OUR PRODUCTS </h2>
            <!-- Les produits seront ajoutés ici dynamiquement -->
        </section>
        <!-- Conteneur principal avec grille de produits -->
  <div class="products-container">
    <!-- Grille de produits -->
    <div class="product-grid">
        <?php
foreach ($res as $row) {
    echo '<div class="product">';
    echo '<div class="product-image-container">';
    echo '<img src="../images/' . $row[5] . '" alt="Eau Florale de Rose De Damas" class="product-image">';
    echo '</div>';
    echo '<a href="../view/prod1.php" class="product-name-link">';
    echo '<h3>' . $row[1] . '</h3>';
    echo '</a>';
    echo '<p class="price">'.$row[3].' TND</p>';
    echo '<button class="add-to-cart">Add to cart</button>';
    echo '</div>'; // Fermeture de la div du produit
}
?>      
    </main>
    <?php include '../view/footer.php'; ?>
</body>


<style>
:root {
    --primary: #f78bca;
    --primary-hover: #e67eb9;
    --secondary: #8e44ad;
    --text: #2c3e50;
    --text-light: #7f8c8d;
    --bg: #fdf2f8;
    --card-bg: #fff;
    --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    --radius: 16px;
    --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

body {
    color: var(--text);
    background-color: var(--bg);
    margin: 0;
    padding: 0;
}


.products-header {
   
    background-color: transparent; /* Supprime le fond blanc */
    max-width: 1200px;
    margin: 10px auto 5px; /* Espace réduit (auparavant 40px auto) */
    padding: 0;
}

.products-header h2 {
    font-size: 1.8rem;
    text-align: center;
    color: var(--secondary);
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    padding-bottom: 15px;
}

.products-header h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(to right, var(--primary), var(--secondary));
}

</style>
</html>