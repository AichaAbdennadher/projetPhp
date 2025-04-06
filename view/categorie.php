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
$res=$prod->getProduitsByCategorie(category_id: $_GET['category']);
$data=$res->fetchAll(PDO::FETCH_ASSOC); //fetch all trj3 tableau assocative w fetch trj3 kn val
$name=$data[0]["name"] ;
$id=$data[0]["id"] ;
$image= $data[0]["image"];//0:awl lig
$description=$data[0]["description"] ;
$price= $data[0]["price"];
$stock = $data[0]["stock"];
$category = $data[0]["category_id"];
?>
<?php
require_once('../model/category.class.php');
$cat=new category();
$result=$cat->listCategories();
$data=$result->fetchAll(PDO::FETCH_ASSOC); 
$nameC=$data[0]["name"] ;
$descriptionC=$data[0]["description"] ;
?>
<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <h1 class="logo">Floraison</h1>
             
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="acceuil.php">Accueil</a></li>
                    <li><a href="categorie.php?category =<?php echo $category_id  ?>">Visage</a></li>
                    <li><a href="categorie.php?category =<?php echo $category_id  ?>">Corps</a></li>
                    <li><a href="categorie.php?category =<?php echo $category_id  ?>">Cheveux</a></li>
                    <li><a href="#">Promotions</a></li>
                    <li><a href="#">Histoire</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
 <section class="products-header">
            <h2><?php echo $nameC ?></h2>
            <p><?php echo $descriptionC ?></p>
        </section>
        <!-- Conteneur principal avec grille de produits -->
  <div class="products-container">
    <!-- Grille de produits -->
    <div class="product-grid">
        <!-- Produit 1 -->

    <div class="product">
    <div class="product-image-container">
    <img src="../imges/<?php echo $image ?>" alt="Eau Florale de Rose De Damas" class="product-image">
    </div>
    <a href="prod.php?id=<?php echo $id ?>"  class="product-name-link">
    <h3 ><?php echo $name ?></h3>
    </a>
    <p class="price"><?php echo $price ?> TND</p>
    <button class="add-to-cart">Add to cart</button>
    </div>

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