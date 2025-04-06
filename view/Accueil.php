<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floraison - Cosmétiques Bio</title>
    <link rel="shortcut icon" href="./view/images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../view/admin1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Style spécifique pour l'icône favoris */
        .heart-icon .fas {
            color: #f78bca;
            transition: all 0.3s ease;
        }
        
        .heart-icon:hover .fas {
            color: #d45d9a;
            transform: scale(1.1);
        }
    </style>
   <style>
        .ranges-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            max-width: 800px;
            margin: 30px auto;
        }
        .range-item {
            text-align: center;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            transition: transform 0.3s;
        }
        .range-item:hover {
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .range-item img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
        }
        .main-title {
            text-align: center;
            margin: 40px 0 20px;
            font-size: 2.2em;
            color: #2c3e50;
        }
    </style>
</head>
<?php
require_once('../model/produit.class.php');
$prod=new product();
$res=$prod->listProduits();
?>
<?php
require_once('../model/category.class.php');
$cat=new category();
$result=$cat->listCategories();
?>
<body>
  <header class="ecom-header">
    <div class="header-main">
      <div class="container">
        <!-- Logo avec animation -->
        <a href="#" class="header-logo" aria-label="Accueil Floraison">
          <img src="../images/666.jpeg" alt="Floraison Logo" width="90" height="50" loading="lazy" class="logo-img">
          <div class="logo-text">
            <span class="main-logo">Floraison</span>
            <span class="sub-logo">Natural Beauty</span>
          </div>
        </a>

        <!-- Barre de recherche améliorée -->
        <div class="header-search-container">
          <form role="search" class="search-form">
            <input type="search" 
                   name="search" 
                   class="search-field" 
                   placeholder="Rechercher un produit..."
                   aria-label="Rechercher des produits"
                   autocomplete="off">
            <button type="submit" class="search-btn" aria-label="Lancer la recherche">
              <ion-icon name="search-outline" class="search-icon"></ion-icon>
            </button>
            <div class="search-suggestions"></div>
          </form>
        </div>

        <nav class="icon-nav">
  <div class="nav-wrapper">
    <!-- Icône Favoris ajoutée ici -->
    <a href="#" class="icon-link" aria-label="Favoris">
      <i class="fas fa-heart"></i>
    </a>
    
    <a href="#" class="icon-link cart-icon" aria-label="Panier">
      <i class="fas fa-shopping-cart"></i>
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
    
    <button class="mobile-menu-btn" aria-label="Menu mobile">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</nav>
      </div>
    </div>
    <nav class="desktop-navigation-menu">
      <div class="container">
        <ul class="desktop-menu-category-list">
          <li class="menu-category">
            <a href="#" class="menu-title">Accueil</a>
          </li>

          <li class="menu-category">
            <a href="categorie.php" class="menu-title">Face</a>
          </li>
          
          <li class="menu-category">
            <a href="categorie.php" class="menu-title">Body</a>
          </li>
          
          <li class="menu-category">
            <a href="categorie.php" class="menu-title">Hair</a>
          </li>

          <!-- <li class="menu-category">
            <a href="#" class="menu-title">Promotions</a>
          </li> -->
          
          
        </ul>
      </div>
  
  </header>
    <!-- MAIN -->
    <main>
    <!-- BANNER -->
    <div class="banner">
      <div class="container">
        <div class="slider-container has-scrollbar">
           
          <div class="slider-item">
            <img src="../images/bio-cosmetique-620x350.jpg" alt="Soins visage naturels" class="banner-img">
            <div class="banner-content">
              <p class="banner-subtitle">Routine complète</p>
              <h2 class="banner-title">Natural facial care</h2>
              <a href="affiche.php" class="banner-btn">View products</a>
            </div>
          </div>

          <div class="slider-item">
            <img src="../images/7.jpeg" alt="Promotions spéciales" class="banner-img">
            <div class="banner-content">
              <p class="banner-subtitle">Économisez jusqu'à 30 %</p>
              <h2 class="banner-title">Special promotions</h2>
              <a href="#" class="banner-btn">Take advantage of the offers</a>
            </div>
          </div>
        </div>
      </div>
       
    </div>
    </div>
    
    <style>
        .ranges-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .range-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .range-item:hover {
            transform: translateY(-5px);
        }
        .range-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .range-name {
            padding: 15px;
            text-align: center;
            background: #f8f9fa;
            font-weight: bold;
        }
        .main-title {
            text-align: center;
            margin: 30px 0;
            font-size: 2rem;
            color: #333;
        }
    </style>
</head>
<body>
    <main>
        <h1 class="main-title">Nos Catégories</h1>
        
        <div class="ranges-grid">
            <?php 
            // Debug : vérifiez les données
            // var_dump($categories);
            
            foreach($categories as $category): ?>
            <div class="range-item">
                <a href="categorie.php?category_id=<?php echo $category['id']; ?>">
                    <img src="../images/<?php echo htmlspecialchars($category['image']); ?>" 
                         alt="<?php echo htmlspecialchars($category['name']); ?>"
                         onerror="this.src='../images/default.jpg'">
                    <div class="range-name"><?php echo htmlspecialchars($category['name']); ?></div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

  

    

    <section class="products-header">
    <h1 class="main-title">OUR PRODUCTS</h1>
    <p class="subtitle">Best Sellers</p>
</section>

<!-- Conteneur principal avec grille de produits -->
<div class="products-container">
    <!-- Grille de produits -->
    <div class="product-grid">
        <?php
        $counter = 0;
        // On utilise fetchAll() pour convertir le PDOStatement en tableau
        $products = $res->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($products as $row) {
            if ($counter >= 8) break; // On limite à 8 produits
            
            echo '<div class="product">';
            echo '<div class="product-image-container">';
            echo '<img src="../images/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '" class="product-image">';
            echo '</div>';
            echo '<a href="prod.php?id=' . htmlspecialchars($row['id']) . '" class="product-name-link">';
            
            echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
            echo '</a>';
            echo '<p class="price">' . htmlspecialchars($row['price']) . ' TND</p>';
            echo '<button class="add-to-cart">Add to cart</button>';
            echo '</div>';
            
            $counter++;
        }
        ?>
    </div> <!-- Fin de product-grid -->

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
  

<style>
  /* Footer */
footer {
  background-color: #f9f9f9;
  padding: 60px 5% 40px;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 50px;
  font-family: 'Poppins', 'Arial', sans-serif;
  color: #333;
  line-height: 1.7;
  position: relative;
  overflow: hidden;
  border-top: 1px solid rgba(0, 0, 0, 0.05);
}

footer::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: radial-gradient(circle at 20% 50%, rgba(247, 139, 202, 0.03) 0%, transparent 50%);
  z-index: 0;
}

.footer-section {
  margin-bottom: 30px;
  position: relative;
  z-index: 1;
  transition: transform 0.4s ease;
}

.footer-section:hover {
  transform: translateY(-5px);
}

.footer-title {
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1.2px;
  margin-bottom: 25px;
  color: #2c3e50;
  display: inline-block;
  position: relative;
  padding-bottom: 8px;
}

.footer-title::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 40px;
  height: 2px;
  background: linear-gradient(90deg, #f78bca, #8e44ad);
  transition: width 0.3s ease;
}

.footer-section:hover .footer-title::after {
  width: 60px;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 12px;
  position: relative;
  padding-left: 15px;
}

.footer-links li::before {
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 6px;
  height: 6px;
  background-color: #f78bca;
  border-radius: 50%;
  opacity: 0;
  transition: all 0.3s ease;
}

.footer-links li:hover::before {
  opacity: 1;
}

.footer-links a {
  text-decoration: none;
  color: #555;
  font-size: 15px;
  font-weight: 400;
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  display: inline-block;
  position: relative;
}

.footer-links a:hover {
  color: #2c3e50;
  transform: translateX(8px);
}

.footer-links a::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 1px;
  background-color: #f78bca;
  transition: width 0.3s ease;
}

.footer-links a:hover::after {
  width: 100%;
}

.about-text {
  font-size: 14px;
  color: #555;
  line-height: 1.8;
  position: relative;
  padding-left: 15px;
}

.about-text::before {
  content: '❝';
  position: absolute;
  left: -5px;
  top: -10px;
  font-size: 24px;
  color: rgba(247, 139, 202, 0.2);
}

/* Newsletter */
.newsletter {
  position: relative;
}

.newsletter-form {
  display: flex;
  margin-top: 20px;
  width: 100%;
  max-width: 320px;
  position: relative;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  border-radius: 30px;
  overflow: hidden;
}

.newsletter-input {
  flex: 1;
  padding: 14px 20px;
  border: 1px solid #eee;
  font-size: 14px;
  outline: none;
  transition: all 0.3s ease;
  background-color: #fff;
}

.newsletter-input:focus {
  border-color: #f78bca;
  box-shadow: 0 0 0 3px rgba(247, 139, 202, 0.2);
}

.newsletter-button {
  padding: 0 25px;
  background: linear-gradient(135deg, #f78bca, #8e44ad);
  color: white;
  border: none;
  cursor: pointer;
  font-size: 16px;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.newsletter-button:hover {
  background: linear-gradient(135deg, #e67eb9, #7d3c98);
  transform: scale(1.05);
}

/* Social Media */
.social-media {
  margin-top: 30px;
}

.social-icons {
  display: flex;
  gap: 12px;
  margin-top: 15px;
}

.social-icons a {
  color: #555;
  font-size: 16px;
  transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
  width: 38px;
  height: 38px;
  border-radius: 50%;
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
}

.social-icons a:hover {
  color: white;
  transform: translateY(-5px) scale(1.1);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

.social-icons a:nth-child(1):hover { background: #3b5998; } /* Facebook */
.social-icons a:nth-child(2):hover { background: #e1306c; } /* Instagram */
.social-icons a:nth-child(3):hover { background: #ff0000; } /* YouTube */
.social-icons a:nth-child(4):hover { background: #e60023; } /* Pinterest */

/* Animations */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.footer-section {
  animation: fadeInUp 0.6s ease forwards;
  opacity: 0;
}

.footer-section:nth-child(1) { animation-delay: 0.1s; }
.footer-section:nth-child(2) { animation-delay: 0.2s; }
.footer-section:nth-child(3) { animation-delay: 0.3s; }
.footer-section:nth-child(4) { animation-delay: 0.4s; }

/* Responsive Design */
@media (max-width: 1024px) {
  .ranges-container {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .product-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 768px) {
  .header-main .container {
    flex-wrap: wrap;
    gap: 15px;
  }
  
  .header-search-container {
    order: 3;
    width: 100%;
    margin: 15px 0 0;
  }
  
  .desktop-navigation-menu {
    display: none;
  }
  
  footer {
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    padding: 50px 5% 30px;
  }
  
  .footer-section {
    margin-bottom: 20px;
  }
  
  .newsletter-form {
    max-width: 100%;
  }
  
  .ranges-container {
    grid-template-columns: 1fr;
  }
  
  .product-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
  }
}

@media (max-width: 480px) {
  .header-logo span {
    display: none;
  }
  
  footer {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  
  .footer-title {
    font-size: 15px;
  }
  
  .social-icons a {
    width: 36px;
    height: 36px;
    font-size: 15px;
  }
  
  .product-grid {
    grid-template-columns: 1fr;
  }
  
  .certification {
    min-width: 100%;
    max-width: 250px;
  }
  
  .show-all-btn {
    padding: 10px 20px;
    font-size: 14px;
  }
}
</style>
 <footer>
  <div class="footer-section">
      <div class="footer-title">menu de collections</div>
      <ul class="footer-links">
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