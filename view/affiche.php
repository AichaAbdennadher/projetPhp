<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floraison - Produits Visage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="aff.css">
</head>
<?php
require_once('../model/produit.class.php');
$prod=new product();
$res=$prod->listProduits();
?>
<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <h1 class="logo">Floraison</h1>
             
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="../view/acceuil.html">Accueil</a></li>
                    <li><a href="#">Visage</a></li>
                    <li><a href="#">Corps</a></li>
                    <li><a href="#">Cheveux</a></li>
                    <li><a href="#">Promotions</a></li>
                    <li><a href="#">Histoire</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="products-header">
            <h2>TOUS LES PRODUITS</h2>
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
    <footer>
        <div class="footer-section">
            <div class="footer-title">menu de collections</div>
            <ul class="footer-links">
                <li><a href="#">À propos</a></li>
                <li><a href="#">Collections</a></li>
                <li><a href="#">Fragrance</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <div class="footer-title">informations</div>
            <ul class="footer-links">
                <li><a href="#">Floraison natural beauty</a></li>
                <li><a href="#">Contactez nous</a></li>
                <li><a href="#">Terms and conditions</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="#">Politique de remboursement</a></li>
                <li><a href="#">Ne vendez pas mes informations personnelles</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <div class="footer-title">floraison</div>
            <p class="about-text">
                Chez Floraison, nous célébrons la beauté naturelle à travers des produits 100 % naturels, soigneusement conçus pour nourrir la peau, les cheveux et le corps. Inspirés par la richesse de la nature, nous proposons des solutions durables, saines et efficaces, tout en respectant l'environnement et en améliorant le bien-être de nos clients.
            </p>
        </div>
        <div class="footer-section">
            <div class="footer-title">abonnez-vous à nos e-mails</div>
            <div class="newsletter">
                <div class="newsletter-form">
                    <input type="email" placeholder="E-mail" class="newsletter-input">
                    <button type="submit" class="newsletter-button">→</button>
                </div>
            </div>
            <div class="social-media">
                <div class="footer-title">suivez-nous</div>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </div>
       </footer>
</body>
</html>