

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
.notif {
    position: fixed;
    right: 10px;  
    top: 10px;
    z-index: 9999;
    animation: slide-in-right 1s ease-in-out;
}

@keyframes slide-in-right {
    from {
        right: -300px;  /* Commence hors de l'écran à droite */
    }
    to {
        right: 10px;  /* Se déplace à 10px du bord droit */
    }
}
        </style>
        <script>
    // Vérifier si l'alerte existe
    window.onload = function() {
        var notif = document.getElementById("notif");
        if (notif) {
            // Après 5 secondes, la notification disparait
            setTimeout(function() {
                notif.style.display = "none";
            }, 2000);  // 5000 ms = 5 secondes
        }
    }
</script>
</head>
<body>
<section class="bg-pink-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <img src="../images/666.jpeg" alt="" class="w-16 h-16">
        <h2 class="text-pink-600 font-bold">Floraison</h2>


        <div class="w-full bg-white rounded-lg shadow sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">Se connecter à votre compte</h1>

                <?php
if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
    echo '
    <div id="notif" class="notif flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
      <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Error</span>
      <div>
        <span class="font-medium">Error!</span> Incorrect email or password. Try again.
      </div>
    </div>';
}
?>


                <form class="space-y-4 md:space-y-6" action="../controller/connexion.php" method="POST">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
                        <input type="email" name="email" id="email" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-pink-600 focus:border-pink-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="nom@exemple.com">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                        <input type="password" name="password" id="password" required placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-pink-600 focus:border-pink-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                    <button type="submit" class="w-full text-white bg-pink-600 hover:bg-pink-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Se connecter</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Vous n'avez pas de compte ? <a href="viewInscription.php" class="font-medium text-pink-600 hover:underline">Créer un compte</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
