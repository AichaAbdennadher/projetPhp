<?php
session_start();
require_once('../model/produit.class.php');
// Récupération produit
$prod = new product();
$res = $prod->getProduit($_GET['id']);
$data = $res->fetchAll(PDO::FETCH_ASSOC);

$name = $data[0]["name"];
$id = $data[0]["id"];
$image = $data[0]["image"];
$description = $data[0]["description"];
$price = $data[0]["price"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Floraison</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

<?php include '../view/header2.php'; ?>

<section class="product-section">
    <div class="container">
        <div class="product-grid">
            <div class="product-image-container">
                <img class="product-image" src="../images/<?php echo $image; ?>" alt="<?php echo $name; ?>">
            </div>
           
            <div class="product-details">
                <h1 class="product-title"><?php echo $name; ?></h1>
                <div class="price-rating">
                    <p class="product-price"><?php echo $price; ?> TND</p>
                    <div class="rating">
                    </div>
                </div>

                <form method="POST" action="../controller/AddFavorites.php" >
                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
    <button type="submit" name="add_to_favorites" class="btn btn-secondary" >
        <i class="far fa-heart"></i> Favoris
    </button>
</form>     
<form method="POST" action="../controller/AddCart.php" >
                     <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <button class="btn btn-primary" type="submit" >
                        <i class="fas fa-shopping-cart"></i> Add to cart
                    </button>
                    </form> 
                    
                    <form action="../controller/BUYNOW.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <button class="btn btn-primary" type="submit" name="buy_now">
                        <i class="fas fa-bolt"></i> Buy now
                    </button>
                </form>

                <div class="product-description">
                    <p><?php echo $description; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../view/footer.php'; ?>

</body>
</html>


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
    line-height: 1.7;
    color: var(--text);
    background-color: var(--bg);
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.product-section {
    padding: 40px 0;
}

.product-grid {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
    flex-wrap: wrap;
}

.product-image-container,
.product-details {
    flex: 1 1 400px;
    max-width: 500px;
}

@media (min-width: 768px) {
    .product-section {
        padding: 60px 0;
    }
}

.prod-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    padding: 0 20px;
}

.product {
    max-width: 500px;
    margin: 0 auto;
}

.product-image-container {
    /* Ajout ou modification */
    min-height: 500px;
    /* ou 400px selon ton besoin */
}

.product-image {
    height: 500px;
    /* augmente la hauteur ici */
    max-height: 500px;
    /* pour éviter de dépasser trop */
    object-fit: contain;
    width: 100%;
}

.product-image-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.product-details {
    background: var(--card-bg);
    padding: 30px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    animation: fadeIn 0.6s ease-out forwards;
}

.product-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
    color: var(--secondary);
    position: relative;
    display: inline-block;
}

.product-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--primary);
    border-radius: 3px;
}

@media (min-width: 768px) {
    .product-title {
        font-size: 32px;
    }
}

.product-price {
    font-size: 28px;
    font-weight: 800;
    color: var(--primary);
    margin: 20px 0;
    display: inline-block;
    background: linear-gradient(135deg, #f5f7fa 0%, #fdf2f8 100%);
    padding: 8px 20px;
    border-radius: 50px;
    box-shadow: 0 4px 15px rgba(247, 139, 202, 0.2);
}

.rating {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 20px 0;
}

.stars {
    color: #FFD700;
    font-size: 18px;
    letter-spacing: 2px;
}

.rating-value {
    font-weight: 700;
    color: var(--text);
}

.review-link {
    color: var(--primary);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: var(--transition);
    border-bottom: 1px dashed var(--primary);
}

.review-link:hover {
    color: var(--secondary);
    border-bottom-color: var(--secondary);
}

.action-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin: 30px 0;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 25px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 50px;
    transition: var(--transition);
    cursor: pointer;
    border: none;
    outline: none;
}

.btn i {
    margin-right: 8px;
    font-size: 18px;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(142, 68, 173, 0.3);
    animation: pulse 2s infinite;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(142, 68, 173, 0.4);
    background: linear-gradient(135deg, var(--primary-hover) 0%, #9b59b6 100%);
}

.btn-secondary {
    background: white;
    color: var(--text);
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.btn-secondary:hover {
    background: #f5f5f5;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    color: var(--primary);
    border-color: var(--primary);
}

.divider {
    border: 0;
    height: 1px;
    background: linear-gradient(to right, transparent, var(--primary), transparent);
    margin: 25px 0;
    opacity: 0.3;
}

.product-description {
    margin: 25px 0;
}

.product-description p {
    margin-bottom: 15px;
    color: var(--text-light);
    font-size: 16px;
}

.benefits-list {
    margin-top: 20px;
    padding-left: 20px;
}

.benefits-list li {
    position: relative;
    margin-bottom: 12px;
    color: var(--text-light);
    padding-left: 25px;
}

.benefits-list li::before {
    content: '\f00c';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    position: absolute;
    left: 0;
    color: var(--primary);
}
</style>