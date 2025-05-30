<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floraison - Cosmétiques Bio</title>
    <link rel="shortcut icon" href="../view/images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../view/admin1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<link rel="stylesheet" href="../view/css/header.css">
<?php
require_once('../model/category.class.php');
$cat=new category();
$result=$cat->listCategories();
?>
<header class="ecom-header">
  <div class="header-main">
    <div class="container">
      <!-- Logo -->
      <a href="#" class="header-logo" aria-label="Accueil Floraison">
        <img src="../images/666.jpeg" alt="Floraison Logo" width="90" height="50" loading="lazy" class="logo-img">
        <div class="logo-text">
          <span class="main-logo">Floraison</span>
          <span class="sub-logo">Natural Beauty</span>
        </div>
      </a>

      <!-- Navigation Principale -->
      <nav class="main-nav">
        <ul class="nav-list">
          <li><a href="../view/accueil.php">Home</a></li>
          </li>

<?php
foreach ($result as $cat) {
echo'      <li class="menu-category">';
echo'    <a href="../view/categorie.php?category=' . $cat[0] . '" class="menu-title">'.$cat[1].'</a>';
echo'    </li>';



}
?> 
<li class="menu-category">
 <a href="../view/contact.php" class="menu-title">Contact</a>
</li>       


        </ul>
      </nav>

      <!-- Barre de recherche -->
      <div class="header-search-container">
        <form role="search" class="search-form"  method="post" action="../controller/searchForClient.php">
          <input type="search" 
                 name="search" 
                 class="search-field" 
                  placeholder="Search product"
                 aria-label="Rechercher des produits"
                 autocomplete="off">
          <button type="submit" class="search-btn" aria-label="Lancer la recherche">
            <ion-icon name="search-outline" class="search-icon"></ion-icon>
          </button>
        </form>
      </div>

      <!-- Groupe d'icônes -->
      <div class="icon-group">
        <a href="#" class="icon-link heart-icon" aria-label="Favoris">
          <i class="fas fa-heart"></i>
        </a>
        <a href="#" class="icon-link cart-icon" aria-label="Panier">
          <i class="fas fa-shopping-cart"></i>
          <span class="cart-count">0</span>
        </a>
        <div class="account-dropdown">
          <a href="#" class="icon-link account-icon" aria-label="Mon compte">
            <i class="fas fa-user-circle"></i>
          </a>
          <div class="dropdown-menu">
            <a href="#">Mon profil</a>
            <a href="#">Mes commandes</a>
            <a href="#">Se déconnecter</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
   <!-- Conteneur principal avec grille de produits -->
   <div class="products-container">
    <!-- Grille de produits -->
    <div class="product-grid">
    <!-- Produit 1 -->
    <?php
     if (isset($resuClient)) {
    foreach ($resuClient as $c) {
        ?>
        <div class="product">
            <div class="product-image-container">
                <img src="../images/<?php echo $c[5]; ?>" class="product-image">
            </div>
            <a href="../view/prod.php?id=<?php echo $c[0]; ?>" class="product-name-link">
                <h3><?php echo $c[1]; ?></h3>
            </a>
            <p class="price"><?php echo $c[3]; ?> TND</p>
            <button class="add-to-cart">Add to cart</button>
        </div>
        <?php
    }}
    ?>
</div>

