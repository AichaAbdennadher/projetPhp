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
          <li><a href="#">Accueil</a></li>
          <li><a href="categorie.php">Face</a></li>
          <li><a href="categorie.php">Body</a></li>
          <li><a href="categorie.php">Hair</a></li>
        </ul>
      </nav>

      <!-- Barre de recherche -->
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

<style>
:root {
  --primary: #f78bca;
  --primary-light: #ffcce6;
  --secondary: #8e44ad;
  --dark: #2c3e50;
  --light: #f8f9fa;
  --white: #ffffff;
  --gray: #e9ecef;
  --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  --radius: 12px;
  --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

/* Structure Principale */
.ecom-header {
  background: var(--white);
  box-shadow: var(--shadow);
  position: sticky;
  top: 0;
  z-index: 1000;
  padding: 0.5rem 0;
}

.header-main .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 2rem;
  gap: 1rem;
}

/* Logo */
.header-logo {
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
  min-width: 180px;
}

.main-logo {
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--primary);
}

.sub-logo {
  font-size: 0.7rem;
  color: var(--primary);
}

/* Navigation Principale */
.main-nav {
  flex-grow: 1;
  margin: 0 2rem;
}

.nav-list {
  display: flex;
  gap: 1.5rem;
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav-list a {
  text-decoration: none;
  color: var(--dark);
  font-weight: 500;
  transition: var(--transition);
}

.nav-list a:hover {
  color: var(--primary);
}

/* Barre de recherche */
.header-search-container {
  flex: 0 1 500px;
  min-width: 200px;
}

.search-field {
  width: 100%;
  padding: 0.7rem 1.5rem;
  border: 2px solid var(--gray);
  border-radius: var(--radius);
}

/* Groupe d'icônes */
.icon-group {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  margin-left: 1rem;
}

.icon-link {
  font-size: 1.4rem;
  color: var(--dark);
  transition: var(--transition);
}

.icon-link:hover {
  color: var(--primary);
  transform: translateY(-2px);
}

.heart-icon .fas {
  color: var(--primary);
}

.cart-icon {
  position: relative;
}

.cart-count {
  position: absolute;
  top: -5px;
  right: -5px;
  background: var(--primary);
  color: white;
  border-radius: 50%;
  width: 18px;
  height: 18px;
  font-size: 0.7rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Responsive */
@media (max-width: 992px) {
  .main-nav {
    display: none;
  }
  
  .header-search-container {
    flex: 1;
  }
}

@media (max-width: 768px) {
  .header-search-container {
    display: none;
  }
}
</style>