<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floraison - Panier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="aff.css">
    <style>
        :root {
            --primary-color: #ec4899;
            --primary-hover: #db2777;
            --primary-light: #fbcfe8;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --border-light: #e5e7eb;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.5;
            color: var(--text-dark);
            background-color: var(--bg-light);
            -webkit-font-smoothing: antialiased;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Header */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .logo {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .main-nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }
        
        .main-nav a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .main-nav a:hover {
            color: var(--primary-color);
        }

        /* Main Content */
        .cart-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
            flex: 1;
        }

        .cart-header {
    position: sticky;
    top: 0;
    background: white; /* Pour éviter la transparence */
    padding: 1rem 0;
    z-index: 200; /* Même valeur que le titre */
}

        .cart-title {
            font-size: 1.75rem;
            font-weight: 700;
             color: var(--primary-color);
             z-index: 200; /* Correction: suppression du % qui n'est pas valide pour z-index */
}
        .cart-layout {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        @media (min-width: 1024px) {
            .cart-layout {
                flex-direction: row;
                align-items: flex-start;
            }
        }

        /* Cart Items */
        .cart-items {
            flex: 2;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .cart-item {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .cart-item:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .item-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .item-content {
                flex-direction: row;
                align-items: center;
            }
        }

        .item-image {
            flex-shrink: 0;
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1px solid var(--border-light);
        }

        .item-image img {
            object-fit: contain;
            width: 80%;
            height: 80%;
            transition: transform 0.3s ease;
        }

        .item-image:hover img {
            transform: scale(1.05);
        }

        .item-details {
            flex: 1;
            min-width: 0;
        }

        .item-name {
            font-weight: 600;
            color: var(--text-dark);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 0.5rem;
        }

        .item-name:hover {
            color: var(--primary-color);
        }

        .item-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            background: none;
            border: none;
            cursor: pointer;
            transition: var(--transition);
        }

        .favorite-btn {
            color: var(--text-light);
        }

        .favorite-btn:hover {
            color: var(--primary-color);
        }

        .remove-btn {
            color: #ef4444;
        }

        .remove-btn:hover {
            text-decoration: underline;
        }

        .quantity-price-container {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .quantity-price-container {
                flex-direction: row;
                align-items: center;
            }
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quantity-btn {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.375rem;
            border: 1px solid var(--border-light);
            background: white;
            cursor: pointer;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background: var(--primary-light);
            border-color: var(--primary-color);
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            border: none;
            font-weight: 600;
            font-size: 1rem;
        }

        .item-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-dark);
            min-width: 100px;
            text-align: right;
        }

        /* Order Summary */
        .order-summary {
            flex: 1;
            position: sticky;
            top: 1rem;
        }

        .summary-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
        }

        .summary-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-light);
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: var(--text-light);
        }

        .summary-value {
            font-weight: 600;
        }

        .summary-total {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid var(--border-light);
            font-size: 1.125rem;
        }

        .checkout-btn {
            width: 100%;
            padding: 1rem;
            margin-top: 1.5rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .checkout-btn:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .continue-shopping {
            margin-top: 1rem;
            text-align: center;
            color: var(--text-light);
        }

        .continue-link {
            color: var(--primary-color);
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .continue-link:hover {
            text-decoration: underline;
        }

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

        .social-icons a:nth-child(1):hover { background: #3b5998; }
        .social-icons a:nth-child(2):hover { background: #e1306c; }
        .social-icons a:nth-child(3):hover { background: #ff0000; }
        .social-icons a:nth-child(4):hover { background: #e60023; }

        /* Responsive Design */
        @media (max-width: 768px) {
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
        }

        @media (max-width: 480px) {
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
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
                animation: none !important;
            }
        }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }
  
  </style>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <h1 class="logo">Floraison</h1>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="../view/adm.html">Accueil</a></li>
                    <li><a href="#">Visage</a></li>
                    <li><a href="#">Corps</a></li>
                    <li><a href="#">Cheveux</a></li>
                    <li><a href="#">Promotions</a></li>
                    <li><a href="#">Histoire</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="cart-container">
        <header class="cart-header">
            <h1 class="cart-title">Votre Panier</h1>
        </header>

        <div class="cart-layout">
            <section class="cart-items">
                <article class="cart-item">
                    <div class="item-content">
                        <a href="#" class="item-image">
                            <img src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="iMac 24 pouces" loading="lazy">
                        </a>

                        <div class="item-details">
                            <a href="#" class="item-name">iMac 24" (2023) Chip M3, 8GB, SSD 256GB</a>
                            
                            <div class="item-actions">
                                <button class="action-btn favorite-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                                    </svg>
                                    Favoris
                                </button>
                                <button class="action-btn remove-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Supprimer
                                </button>
                            </div>
                        </div>

                        <div class="quantity-price-container">
                            <div class="quantity-selector">
                                <button class="quantity-btn decrement" aria-label="Réduire la quantité">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <input type="number" class="quantity-input" value="1" min="1" aria-label="Quantité">
                                <button class="quantity-btn increment" aria-label="Augmenter la quantité">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="item-price">1 499€</div>
                        </div>
                    </div>
                </article>

                <article class="cart-item">
                    <div class="item-content">
                        <a href="#" class="item-image">
                            <img src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg" alt="Apple Watch Series 8" loading="lazy">
                        </a>

                        <div class="item-details">
                            <a href="#" class="item-name">Apple Watch Series 8 (GPS) 41mm Boîtier Aluminium</a>
                            
                            <div class="item-actions">
                                <button class="action-btn favorite-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                                    </svg>
                                    Favoris
                                </button>
                                <button class="action-btn remove-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Supprimer
                                </button>
                            </div>
                        </div>

                        <div class="quantity-price-container">
                            <div class="quantity-selector">
                                <button class="quantity-btn decrement" aria-label="Réduire la quantité">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <input type="number" class="quantity-input" value="1" min="1" aria-label="Quantité">
                                <button class="quantity-btn increment" aria-label="Augmenter la quantité">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="item-price">598€</div>
                        </div>
                    </div>
                </article>
            </section>

            <aside class="order-summary">
                <div class="summary-card">
                    <h2 class="summary-title">Récapitulatif</h2>
                    
                    <div class="summary-details">
                        <dl class="summary-row">
                            <dt class="summary-label">Sous-total</dt>
                            <dd class="summary-value">2 097€</dd>
                        </dl>
                        <dl class="summary-row">
                            <dt class="summary-label">Livraison</dt>
                            <dd class="summary-value">Gratuite</dd>
                        </dl>
                        
                        <dl class="summary-row summary-total">
                            <dt>Total</dt>
                            <dd>2 047€</dd>
                        </dl>
                    </div>

                    <a href="/checkout" class="checkout-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        Passer la commande
                    </a>

                    <p class="continue-shopping">
                        ou <a href="#" class="continue-link">Continuer vos achats</a>
                    </p>
                </div>
            </aside>
        </div>
    </main>






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