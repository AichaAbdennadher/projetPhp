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
$prod = new product();
$res = $prod->getProduitsByCategorie(category_id: $_GET['category']);
?>

<?php
require_once('../model/category.class.php');
$cat = new category();
$result = $cat->getCategory(id: $_GET['category']);
$data = $result->fetchAll(PDO::FETCH_ASSOC);
$nameC = $data[0]["name"];
$descriptionC = isset($data[0]["description"]) ;
?>

<body>
<?php include '../view/header2.php'; ?>
    <main>
        <section class="products-header">
            <h2><?php echo $nameC ?></h2>
            <p><?php echo $descriptionC ?></p>
        </section>

        <!-- Conteneur principal avec grille de produits -->
        <div class="products-container">
            <!-- Grille de produits -->
            <div class="product-grid">
                <?php
                foreach ($res as $c) {
                    ?>
                    <div class="product">
                        <div class="product-image-container">
                            <img src="../images/<?php echo $c[5]; ?>" class="product-image">
                        </div>
                        <a href="prod.php?id=<?php echo $c[0]; ?>" class="product-name-link">
                            <h3><?php echo $c[1]; ?></h3>
                        </a>
                        <p class="price"><?php echo $c[3]; ?> TND</p>
                        <button class="add-to-cart">Add to cart</button>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </main>
    <?php include '../view/footer.php'; ?>
</body>
</html>

<style>
/* Fichier aff.css */

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
   
    line-height: 1.7;
    color: var(--text);
    background-color: var(--bg);
    margin: 0;
    padding: 0;
}


/* Products Section */

.products-header {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
    background-color: transparent; /* Supprime le fond blanc */
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


/* Responsive Design */

@media (max-width: 768px) {
    .header-container {
        flex-direction: column;
        text-align: center;
    }
    .logo-container {
        margin-bottom: 15px;
    }
    .main-nav ul {
        flex-wrap: wrap;
        justify-content: center;
    }
    .main-nav li {
        margin: 0 10px;
    }
    .products-header h2 {
        font-size: 1.5rem;
    }
}

@media (min-width: 992px) {
    .product-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}


/* Container principal */

.products-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}


/* Grille de produits */

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 25px;
    margin-bottom: 30px;
}

.product {
    border: 1px solid #eee;
    padding: 15px;
    text-align: center;
    border-radius: 8px;
    background: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}


/* Conteneur d'image */

.product-image-container {
    position: relative;
    cursor: pointer;
    overflow: hidden;
    border-radius: 5px;
    margin-bottom: 15px;
    height: 200px;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-image:hover {
    transform: scale(1.05);
}


/* Lien du nom du produit */

.product-name-link {
    text-decoration: none;
    color: inherit;
    display: block;
    margin-bottom: 10px;
}

.product-name-link h3 {
    margin: 0 0 10px 0;
    font-size: 16px;
    color: #333;
    min-height: 40px;
    transition: color 0.3s ease;
}

.product-name-link:hover h3 {
    color: #d81b60;
}


/* Prix */

.price {
    font-weight: bold;
    margin: 10px 0 15px;
    color: #2c3e50;
    font-size: 18px;
}


/* Bouton d'ajout au panier */

.add-to-cart {
    background-color: #d81b60;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 14px;
    transition: all 0.3s;
    margin-top: auto;
}

.add-to-cart:hover {
    background-color: #d81b60;
    transform: translateY(-2px);
}

</style>

    





