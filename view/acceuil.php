<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floraison - Cosmétiques Bio</title>
    <link rel="shortcut icon" href="../view/images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="admin1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<?php
include("header2.php");
require_once('../model/produit.class.php');
require_once ('../controller/session.php');
$prod=new product();
$res=$prod->listProduits();
?>
<?php
require_once('../model/category.class.php');
$cate=new category();
$resultCat=$cate->listCategories();
?>
<body>
    <div class="banner-container">
        <img src="../images/floraison_natural_beauty_cover.jpg" alt="Soins visage naturels" class="banner-image">
        <div class="banner-content">
            <p class="banner-subtitle">Routine complète</p>
            <h2 class="banner-title">Soins visage naturels</h2>
            <a href="affiche.php" class="banner-button">Voir les produits</a>
        </div>
    </div>
</body>
</html>

<!-- Section Nos Gammes -->
<section class="products-header">
  <h1 class="main-title">NOS GAMME</h1> 
 
</section>  

<div class="ranges-container">

<?php
foreach ($resultCat as $cate) {
    echo '<div class="range-item">';
    echo '<a href="categorie.php?category=' . $cate[0] . '" class="range-link" aria-label="Découvrir les soins visage">';
    echo '<img src="../images/'.$cate[2].'" alt="Soin Visage" loading="lazy">';
    echo '<div class="range-name">'.$cate[1].'</div>';
    echo '</a>';
    echo '</div>';
}
?>
</div>


   
<section class="products-header">
    <h1 class="main-title">OUR PRODUCTS</h1>
    <p class="subtitle">Best Sellers</p>
</section>

<!-- Conteneur principal avec grille de produits -->
<div class="products-container">
    <div class="product-grid">
        <?php
        $counter = 0;
        $products = $res->fetchAll(PDO::FETCH_ASSOC);
        foreach ($products as $row) {
            if ($counter >= 8) break; // Limiter à 8 produits
            echo '<div class="product">';
            echo '<div class="product-image-container">';
            echo '<img src="../images/' . $row['image'] . '" alt="' . $row['name'] . '" class="product-image">';
            echo '</div>';
            echo '<a href="prod.php?id=' . $row['id'] . '" class="product-name-link">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '</a>';
            echo '<p class="price">' . $row['price'] . ' TND</p>';
            echo'<form method="POST" action="../controller/AddCart.php" >';
            echo'<input type="hidden" name="product_id" value="' . $row['id'] . '">';
            echo '<button class="add-to-cart">Add to cart</button>';
            echo '</form>';
            echo '</div>';
            $counter++;
        }
        ?>
    </div>
        <!-- Bouton "Tout afficher" seulement s'il y a plus de 8 produits -->
        <?php if (count($products) > 8): ?>
        <div class="show-all-container">
            <a href="affiche.php" class="show-all-btn">Show all</a>
        </div>
        <?php endif; ?>
    </div>

    <section class="products-header">
        <h1 class="main-title">TUNISIAN MANUFACTURE</h1>
        <div class="main-text">
            It's one of our greatest prides: all our products are designed in Tunisia. We've drawn on local expertise to define each of our formulations.
        </div>

        <div class="certifications-container">
            <div class="certification">
                <img src="../images/0.webp" class="prod-image">
                <div class="certification-title">ORGANIC FARMING</div>
            </div>

            <div class="certification">
                <img src="../images/33.webp" class="prod-image">
                <div class="certification-title">AB - Organic Agriculture</div>
            </div>

            <div class="certification">
                <img src="../images/10.webp" class="prod-image">
                <div class="certification-title">Bureau Veritas - ISO 22716</div>
            </div>
        </div>
    </section>

    <?php include '../view/footer.php'; ?>



    <style>




/* BANNIÈRE */
.banner-container {
    position: relative;
    width: 100%;
    max-width: 1150px;
    height: 300px; /* Hauteur réduite */
    margin: 0 auto;
    overflow: hidden;
    border-radius: var(--radius);
}

.banner-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.banner-content {
    position: absolute;
    top: 50%;
    left: 40px;
    transform: translateY(-50%);
    color: white;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    max-width: 80%;
}

.banner-subtitle {
    font-size: 14px;
    margin-bottom: 8px;
    font-weight: 400;
    letter-spacing: 1px;
}

.banner-title {
    font-size: 24px; /* Taille réduite */
    margin-bottom: 15px;
    font-weight: 600;
    line-height: 1.3;
}

.banner-button {
    display: inline-block;
    padding: 8px 18px;
    background-color: var(--white);
    color: var(--primary);
    text-decoration: none;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    transition: var(--transition);
}

.banner-button:hover {
    background-color: var(--primary);
    color: var(--white);
    transform: translateY(-2px);
}

/* SECTION PRODUITS */
.products-header {
    text-align: center;
    padding: 30px 20px;
}

.main-title {
    font-size: 1.6rem;
    font-weight: 500;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    color: var(--dark);
    margin-bottom: 6px;
    position: relative;
    display: inline-block;
}

.main-title::after {
    content: '';
    position: absolute;
    width: 50px;
    height: 2px;
    background-color: var(--primary);
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
}




</style>




</body>
</html>
