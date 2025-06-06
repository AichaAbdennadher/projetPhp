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
/* Footer - Version compacte (design original préservé) */
footer {
  background-color: #f9f9f9;
  padding: 35px 5% 20px; /* Padding réduit (origine: 60px 5% 40px) */
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 40px; /* Réduit de 50px */
  font-family: 'Poppins', 'Arial', sans-serif;
  color: #333;
  line-height: 1.65; /* Ajusté de 1.7 */
  position: relative;
  overflow: hidden;
  border-top: 1px solid rgba(0, 0, 0, 0.05);
}

/* Fond dégradé préservé */
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

/* Sections du footer */
.footer-section {
  margin-bottom: 20px; /* Réduit de 30px */
  position: relative;
  z-index: 1;
  transition: transform 0.4s ease;
}

.footer-section:hover {
  transform: translateY(-5px);
}

/* Titres */
.footer-title {
  font-size: 16px; /* Inchangé */
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1.2px;
  margin-bottom: 20px; /* Réduit de 25px */
  color: #2c3e50;
  display: inline-block;
  position: relative;
  padding-bottom: 8px; /* Inchangé */
}

/* Effet de soulignement */
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

/* Liste des liens */
.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 10px; /* Réduit de 12px */
  position: relative;
  padding-left: 15px; /* Inchangé */
}

/* Points indicateurs */
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

/* Styles des liens */
.footer-links a {
  text-decoration: none;
  color: #555;
  font-size: 15px; /* Inchangé */
  font-weight: 400;
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  display: inline-block;
  position: relative;
}

.footer-links a:hover {
  color: #2c3e50;
  transform: translateX(8px);
}

/* Effet de soulignement des liens */
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

/* Texte "À propos" */
.about-text {
  font-size: 14px; /* Inchangé */
  color: #555;
  line-height: 1.75; /* Ajusté de 1.8 */
  position: relative;
  padding-left: 15px; /* Inchangé */
}

.about-text::before {
  content: '❝';
  position: absolute;
  left: -5px;
  top: -10px;
  font-size: 24px; /* Inchangé */
  color: rgba(247, 139, 202, 0.2);
}

/* Newsletter */
.newsletter {
  position: relative;
}

.newsletter-form {
  display: flex;
  margin-top: 15px; /* Réduit de 20px */
  width: 100%;
  max-width: 320px; /* Inchangé */
  position: relative;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  border-radius: 30px;
  overflow: hidden;
}

.newsletter-input {
  flex: 1;
  padding: 12px 20px; /* Légère réduction */
  border: 1px solid #eee;
  font-size: 14px; /* Inchangé */
  outline: none;
  transition: all 0.3s ease;
  background-color: #fff;
}

.newsletter-input:focus {
  border-color: #f78bca;
  box-shadow: 0 0 0 3px rgba(247, 139, 202, 0.2);
}

.newsletter-button {
  padding: 0 22px; /* Légère réduction */
  background: linear-gradient(135deg, #f78bca, #8e44ad);
  color: white;
  border: none;
  cursor: pointer;
  font-size: 16px; /* Inchangé */
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.newsletter-button:hover {
  background: linear-gradient(135deg, #e67eb9, #7d3c98);
  transform: scale(1.05);
}

/* Réseaux sociaux */
.social-media {
  margin-top: 20px; /* Réduit de 30px */
}

.social-icons {
  display: flex;
  gap: 10px; /* Réduit de 12px */
  margin-top: 12px; /* Réduit de 15px */
}

.social-icons a {
  color: #555;
  font-size: 16px; /* Inchangé */
  transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
  width: 36px; /* Légère réduction */
  height: 36px; /* Légère réduction */
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

/* Animations */
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.footer-section {
  animation: fadeInUp 0.6s ease forwards;
  opacity: 0;
}

.footer-section:nth-child(1) { animation-delay: 0.1s; }
.footer-section:nth-child(2) { animation-delay: 0.2s; }
.footer-section:nth-child(3) { animation-delay: 0.3s; }
.footer-section:nth-child(4) { animation-delay: 0.4s; }

/* Responsive */
@media (max-width: 1024px) {
  footer { gap: 35px; }
}

@media (max-width: 768px) {
  footer {
    padding: 25px 5% 15px;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
  }
  .footer-section { margin-bottom: 18px; }
  .newsletter-form { max-width: 100%; }
}

@media (max-width: 480px) {
  footer {
    padding: 20px 5% 10px;
    grid-template-columns: 1fr;
    gap: 25px;
  }
  .footer-title { 
    font-size: 15px; 
    margin-bottom: 18px;
  }
  .social-icons a { 
    width: 34px; 
    height: 34px;
  }
}
</style>
 <footer>
  <div class="footer-section">
      <div class="footer-title">collection menu</div>
      <ul class="footer-links">
          <li><a href="#">Contact</a></li>
          <li><a href="#">Products</a></li>
      </ul>
  </div>
  <div class="footer-section">
      <div class="footer-title">information</div>
      <ul class="footer-links">
          <li><a href="#">Floraison natural beauty</a></li>
          <li><a href="#">Contact us</a></li>
          <li><a href="#">Terms and conditions</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Refund Policy</a></li>
          <li><a href="#">Do not sell my personal information</a></li>
      </ul>
  </div>
  <div class="footer-section">
      <div class="footer-title">floraison</div>
      <p class="about-text">
      At Floraison, we celebrate natural beauty through 100% natural products, carefully crafted to nourish skin, hair, and body. Inspired by the bounty of nature, we offer sustainable, healthy, and effective solutions while respecting the environment and enhancing the well-being of our customers.      </p>
  </div>
  <div class="footer-section">
      <div class="footer-title">subscribe to our emails</div>
      <div class="newsletter">
          <div class="newsletter-form">
              <input type="email" placeholder="E-mail" class="newsletter-input">
              <button type="submit" class="newsletter-button">→</button>
          </div>
      </div>
      <div class="social-media">
          <div class="footer-title">follow us</div>
          <div class="social-icons">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
              <a href="#"><i class="fab fa-pinterest-p"></i></a>
          </div>
      </div>
  </div>
 </footer>