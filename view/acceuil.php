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
include("header.php");
require_once('../model/produit.class.php');
$prod=new product();
$res=$prod->listProduits();
?>
<?php
require_once('../model/category.class.php');
$cate=new category();
$resultCat=$cate->listCategories();
?>
<body>
  <main>
    <div class="banner">
      <div class="container">
        <div class="slider-container has-scrollbar">
          <div class="slider-item">
            <img src="../images/bio-cosmetique-620x350.jpg" alt="Soins visage naturels" class="banner-img">
            <div class="banner-content">
              <p class="banner-subtitle">Routine complète</p>
              <h2 class="banner-title">Soins visage naturels</h2>
              <a href="affiche.php" class="banner-btn">Voir les produits</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
<!-- Section Nos Gammes -->
<section class="products-header">
  <h1 class="main-title">NOS GAMME</h1>   
</section>  
<?php
foreach ($resultCat as $cate) {
    echo '<div class="ranges-container">';
    echo '<div class="range-item">';
    echo '<a href="categorie.php?category=' . $cate[0] . '" class="range-link" aria-label="Découvrir les soins visage">';
    echo '<img src="../images/'.$cate[2].'" alt="Soin Visage" loading="lazy">';
    echo '<div class="range-name">'.$cate[1].'</div>';
    echo '</a>';
    echo '</div>';
    echo '</div>'; 
}
?>
  </div> 
    <section class="products-header">
      <h1 class="main-title">NOS PRODUITS</h1>
      <p class="subtitle">Les Meilleurs Ventes</p>  
    </section>
  <!-- Conteneur principal avec grille de produits -->
  <div class="products-container">
      <!-- Grille de produits -->
      <div class="product-grid">
          <!-- Produit 1 -->
          <div class="product">
          <?php
foreach ($res as $row) {
    echo '<div class="product">';
    echo'<form action="../controller/AddCart.php" method="POST">';
    echo '<div class="product-image-container">';
    echo '<img src="../images/' . $row[5] . '" alt="Eau Florale de Rose De Damas" class="product-image">';
    echo '</div>';
    echo '<a href="prod.php?id=' . $row[0] . '"  class="product-name-link" name="idProduct">';
    echo '<h3 >' . $row[1] . '</h3>';
    echo '</a>';
    echo '<p class="price">'.$row[3].' TND</p>';

echo'<button type="submit" class="add-to-cart" name="add_to_cart">Add to cart</button></form> ';
   echo '</div>'; // Fermeture de la div du produit
}
?></div>
      <!-- Bouton "Tout afficher" -->
      <div class="show-all-container">
        <a href="affiche.php" class="show-all-btn">Tout afficher</a>
    </div>
  </div>
  <section class="products-header">
    <h1 class="main-title">FABRICATION TUNISIENNE</h1>
  <div class="main-text">
      C'est l'une de nos plus belles fiertés, tous nos produits sont conçus en Tunisie. Nous nous sommes accompagnés de savoir-faire locaux pour élaborer chacune de nos formulations.
  </div>
  <div class="certifications-container">
    <div class="certification">
        <img src="../images/0.webp" class="prod-image">
        <div class="certification-title">AGRICULTURE BIOLOGIQUE</div>
    </div> 
    <div class="certification">
        <img src="../images/33.webp" class="prod-image">
        <div class="certification-title">AB - Agriculture Biologique</div>
    </div>
    <div class="certification">
        <img src="../images/10.webp" class="prod-image">
        <div class="certification-title">Bureau Veritas - ISO 22716</div>
    </div>
</div>
<?php include '../view/footer.php'; ?>
</body>
</html>