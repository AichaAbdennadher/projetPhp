<?php
require_once('../controller/session.php');
require_once('../model/favorites.class.php');
require_once('../model/produit.class.php');

$F = new Favorites();
$prod = new product();

$res = $F->listFavorites();

$favorites = []; // tableau pour stocker les produits favoris

foreach ($res as $favori) {
    $produitData = $prod->getProduit($favori['idProduct']); // récupère les infos du produit
    $data = $produitData->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        $favorites[] = $data; // ajoute les infos du produit au tableau
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Favoris</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Style moderne et minimaliste */
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --success: #4cc9f0;
            --danger: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --border: #e9ecef;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', system-ui, sans-serif;
        }
        
        body {
            background-color: #f8fafc;
            color: var(--dark);
            line-height: 1.5;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .page-title {
            text-align: center;
            margin-bottom: 2.5rem;
            color: var(--secondary);
            font-size: 2.2rem;
            font-weight: 700;
        }
        
        .alert {
            padding: 1rem;
            margin: 1.5rem auto;
            max-width: 600px;
            border-radius: 0.5rem;
            text-align: center;
            font-weight: 500;
        }
        
        .alert-success {
            background-color: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1rem 0;
        }
        
        .product-card {
            background: white;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--border);
        }
        
        .product-card:hover {
            transform: translateY(-0.25rem);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
   
        .product-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-bottom: 1px solid var(--border);
        }
        
        .product-content {
            padding: 1.5rem;
        }
        
        .product-title {
            font-size: 1.125rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
            font-weight: 600;
            line-height: 1.3;
        }
        
        .product-price {
            font-size: 1.25rem;
            color: var(--primary);
            font-weight: 700;
            margin: 0.75rem 0;
        }
        
        .product-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
            gap: 0.75rem;
        }
        
        .btn {
            padding: 0.625rem 1.25rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            font-size: 0.9375rem;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .btn-cart {
            background: var(--primary);
            color: white;
            flex-grow: 1;
        }
        
        .btn-cart:hover {
            background: var(--secondary);
            transform: translateY(-1px);
        }
        
        .btn-delete {
            background: var(--danger);
            color: white;
            width: 46px;
        }
        
        .btn-delete:hover {
            background: #d1145a;
            transform: translateY(-1px);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--gray);
            grid-column: 1 / -1;
        }
        
        .empty-icon {
            font-size: 3rem;
            color: #e2e8f0;
            margin-bottom: 1rem;
        }
        
        .empty-text {
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
        }
        
        .empty-link {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }
            
            .page-title {
                font-size: 1.75rem;
                margin-bottom: 2rem;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<?php include 'header2.php'; ?>

<div class="container">
    <h1 class="page-title">Mes Favoris</h1>
    <div class="products-grid">
    <?php if (!empty($favorites)): ?>
            <?php foreach ($favorites as $produit): ?>
                <div class="product-card">
                    <img src="../images/<?php echo $produit["image"]; ?>"  class="product-image"> 
                    <div class="product-content">
                        <h3 class="product-title"><?php echo $produit["name"]; ?></h3>
                        <p class="product-price"><?php echo $produit["price"]; ?> TND</p>
                        
                        <div class="product-actions">
                            <form method="post" action="ajouter_panier.php">
                                <input type="hidden" name="produit_id" value="<?php echo $produit["id"]; ?>">
                                <button type="submit" class="btn btn-cart">
                                    <i class="fas fa-shopping-cart"></i> Ajouter au panier
                                </button>
                            </form>
                            
                            <a href="favoris.php?supprimer=<?php echo $produit['id']; ?>" 
                               class="btn btn-delete"
                               onclick="return confirm('Supprimer ce produit de vos favoris ?')">
                               <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="far fa-heart"></i>
                </div>
                <h3 class="empty-text">Votre liste de favoris est vide</h3>
                <a href="Accueil.php" class="empty-link">Parcourir nos produits</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>

