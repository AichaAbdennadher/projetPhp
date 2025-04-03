<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eau Florale de Rose de Damas - Floraison</title>
    <meta name="description" content="Eau florale de rose de Damas 100% pure pour une peau rajeunie et éclatante. Produit naturel aux multiples bienfaits.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../view/acceuil.html">
    <link rel="stylesheet" href="prod1.css">
    
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
                <a href="../view/acceuil.html" class="logo">Floraison</a>
          
            </div>
            <nav>
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
<body>
    <section class="product-section">
        <div class="container">
            <div class="product-grid">
                <div class="product-image-container">
                    <img class="product-image" src="../images/45.jpeg" alt="Eau Florale de Rose de Damas - Flacon en verre" loading="lazy">
                </div>
                <?php
foreach ($res as $row) {
    echo '<div class="product-details">';
    // echo '<div class="product-image-container">';
    // echo '<img src="../images/' . $row[5] . '" alt="Eau Florale de Rose De Damas" class="product-image">';
    // echo '</div>';
    // echo '<a href="prod.php?id=' . $row[0] . '"  class="product-name-link">';
    echo '<h1 class="product-title">' . $row[1] . '</h1>';
    echo '<div class="price-rating">';
    echo '<p class="price-rating">'.$row[3].' TND</p>';
    echo '<div class="rating">';
    echo '<div class="stars">';
    echo '<i class="fas fa-star"></i>';
    echo '<i class="fas fa-star"></i>';
    echo '<i class="fas fa-star"></i>';
    echo '<i class="fas fa-star"></i>';
    echo '<i class="fas fa-star"></i>';
    echo '</div>';
}
?>       
            
                            <span class="rating-value">5.0</span>
                            <a href="#reviews" class="review-link">345 Avis</a>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i> Favoris
                        </button>
                        
                        <button class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Add to cart
                        </button>
                    </div>

                    <hr class="divider">

                    <div class="product-description">
                        <p>
                            Notre Eau florale de Rose de Damas est un ingrédient incontournable pour prévenir et lutter contre les signes du vieillissement cutané. Utilisée dans vos préparations ou pure, elle purifie, rafraîchit et adoucit la peau, la laissant éclatante de santé.
                        </p>
                        
                        <h3>Bienfaits :</h3>
                        <ul class="benefits-list">
                            <li>Action anti-âge : aide à prévenir et atténuer rides et ridules</li>
                            <li>Purifie et rafraîchit la peau en profondeur</li>
                            <li>Adoucit et apaise les peaux sensibles</li>
                            <li>Hydrate et tonifie pour une peau souple</li>
                            <li>100% naturel et bio, sans additifs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
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