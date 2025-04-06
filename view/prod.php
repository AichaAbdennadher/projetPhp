<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eau Florale de Rose de Damas - Floraison</title>
    <meta name="description" content="Eau florale de rose de Damas 100% pure pour une peau rajeunie et éclatante. Produit naturel aux multiples bienfaits.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../view/acceuil.php">
    <link rel="stylesheet" href="prod1.css">
    
</head>
<?php
require_once('../model/produit.class.php');
$prod=new product();
$res=$prod->getProduit($_GET['id']);
$data=$res->fetchAll(PDO::FETCH_ASSOC); //fetch all trj3 tableau assocative w fetch trj3 kn val
$name=$data[0]["name"] ;
$id=$data[0]["id"] ;
$image= $data[0]["image"];//0:awl lig
$description=$data[0]["description"] ;
$price= $data[0]["price"];
$stock = $data[0]["stock"];
// $category = $data[0]["category"];
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
    <form action="../controller/AddCart.php" method="POST">

        <div class="container">
            <div class="product-grid">
                <div class="product-image-container">
                    <img class="product-image" src="../images/<?php echo $image ?>" alt="Eau Florale de Rose de Damas - Flacon en verre" loading="lazy">
                </div>
               

    <div class="product-details">
<h1 class="product-title"><?php echo $name ?></h1>
<div class="price-rating">
                        <p class="product-price"><?php echo $price ?> TND</p>
<div class="rating">
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button class="btn btn-secondary">
                            <i class="far fa-heart"></i> Favoris
                        </button>
                        <div class="quantity-selector">
                                <button class="quantity-btn decrement" aria-label="Réduire la quantité">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>

                                <input type="number" class="quantity-input" value="1" min="1" aria-label="Quantité" name="quantity">
                                <button class="quantity-btn increment" aria-label="Augmenter la quantité">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                                <input type="hidden" name="idProduct" value="<?php echo $id; ?>">
                                </div>
                        <button class="btn btn-primary" type="submit" name="action" value="add">
                            <i class="fas fa-shopping-cart"></i> Add to cart
                        </button>
                        <button class="btn btn-primary" >
                            <i class="fas fa-shopping-cart"></i>Buy now
                        </button>
                    </div>

                    <hr class="divider">

                    <div class="product-description">
                        <p><?php echo $description ?></p>

                    </div>
                </div>
            </div>
        </div>
</form >

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