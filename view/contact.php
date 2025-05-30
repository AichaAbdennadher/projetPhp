<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floraison - Produits Visage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../view/affiche12.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .success { color: green; margin: 15px 0; text-align: center; }
        .error { color: red; margin: 15px 0; text-align: center; }
    </style>
</head>

<body>
<?php include '../view/header2.php';
require_once ('../controller/session.php');
?>

<section class="text-gray-600 body-font relative bg-gray-50">
  <div class="container px-5 py-16 mx-auto flex sm:flex-nowrap flex-wrap">
    <!-- Carte et informations de contact -->
    <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative min-h-[400px]">
      <iframe 
        width="100%" 
        height="100%" 
        class="absolute inset-0" 
        frameborder="0" 
        title="Carte Floraison Sfax" 
        marginheight="0" 
        marginwidth="0" 
        scrolling="no" 
        src="https://maps.google.com/maps?width=100%&height=600&hl=fr&q=34.740556%2C10.760278+(Floraison%20Sfax)&ie=UTF8&t=&z=14&iwloc=B&output=embed"
        style="filter: grayscale(1) contrast(1.2) opacity(0.4);"
        allowfullscreen>
      </iframe>
      
      <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md w-full">
        <div class="lg:w-1/2 px-6">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs uppercase">Address</h2>
          <p class="mt-2 text-gray-900 font-medium">Floraison Natural Beauty</p>
          <p class="mt-1">Avenue Habib Bourguiba</p>
          <p class="mt-1">3000 Sfax, Tunisie</p>
        </div>
        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs uppercase">Contact</h2>
          <a href="mailto:contact@floraison.tn" class="text-indigo-600 leading-relaxed hover:text-indigo-800 transition">contact@floraison.tn</a>
          
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4 uppercase">Phone</h2>
          <a href="tel:+21674200000" class="leading-relaxed text-gray-900 hover:text-indigo-600 transition">+216 74 200 000</a>
          
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4 uppercase">Schedules</h2>
          <p class="leading-relaxed text-sm">Mon-Sat: 8:30am-7pm</p>
        </div>
      </div>
    </div>

    <!-- Formulaire de contact -->
    <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 p-8 rounded-lg shadow-md">
      <h2 class="text-gray-900 text-2xl mb-1 font-bold title-font">Contact us</h2>
      
      <?php
      require_once('../model/config.php');

      // Vérifie si le formulaire a été soumis
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          try {
              // Initialise la connexion
              $cnx = new Connexion();
              $db = $cnx->CNXbase();

              // Récupère et filtre les données
              $data = [
                  ':name' => htmlspecialchars($_POST['name'] ?? ''),
                  ':email' => filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL),
                  ':mobile' => preg_replace('/[^0-9+]/', '', $_POST['mobile'] ?? ''),
                  ':comment' => htmlspecialchars($_POST['message'] ?? ''), // Corrigé de 'cmessage' à 'message'
                  ':added_on' => date('Y-m-d H:i:s')
              ];

              // Requête préparée
              $sql = "INSERT INTO contact
                      (name, email, mobile, comment, added_on) 
                      VALUES 
                      (:name, :email, :mobile, :comment, :added_on)";

              $stmt = $db->prepare($sql);
              $stmt->execute($data);

              // Confirmation
              echo "<p class='success'>Message envoyé avec succès!</p>";

          } catch (PDOException $e) {
              echo "<p class='error'>Erreur: " . htmlspecialchars($e->getMessage()) . "</p>";
          }
      }
      ?>
      
      <form action="" method="POST">
        <div class="relative mb-4">
          <label for="name" class="leading-7 text-sm text-gray-600 font-medium">Full name</label>
          <input type="text" id="name" name="name" required
                 class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        
        <div class="relative mb-4">
          <label for="email" class="leading-7 text-sm text-gray-600 font-medium">Email</label>
          <input type="email" id="email" name="email" required
                 class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        
        <div class="relative mb-4">
          <label for="mobile" class="leading-7 text-sm text-gray-600 font-medium">Mobile</label>
          <input type="tel" id="mobile" name="mobile" required
                 class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        
        <div class="relative mb-4">
          <label for="message" class="leading-7 text-sm text-gray-600 font-medium">Message</label>
          <textarea id="message" name="message" required rows="5"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
        </div>
        
        <button type="submit" class="text-white bg-indigo-600 border-0 py-3 px-6 focus:outline-none hover:bg-indigo-700 rounded text-lg font-medium transition duration-300 w-full">
          Send message
        </button>
        
        <p class="text-xs text-gray-500 mt-3 text-center">
          We usually respond within 24 hours.
        </p>
      </form>
    </div>
  </div>
</section>

<?php include '../view/footer.php'; ?>
</body>
</html>