<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="info.css">
</head>
<body>  
<section>
        <aside>
            <div  class="form" >
                <center>Créez votre compte</center>

                <form action="../controller/inscription.php" method="POST">
                      
                <p>Veuillez remplir ce formulaire pour créer un compte</p>
                <hr> 
                
                <label for="name"><b>Nom</b></label>
                <input type="text" placeholder="Entez votre nom" name="nom" required><br>
                
                <label for="email"><b>Gmail</b></label> 
                <input type="text" placeholder="Entez votre gmail" name="email" required><br>
        
                <label for="pwd"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entez votre mot de passe" name="password" required><br>
                
                <label for=""><b>Numéro de télèphone</b></label> 
                <input type="text" placeholder="Entez votre " name="tel" required><br>
                
                <label for="name"><b>Adresse</b></label>
                <input type="text" placeholder="Entez votre " name="adresse" required><br>
                
                <hr>
        
                <input type="submit" name="enregistrer" value="Enregistrer" class="registerbutton">
                <p>Vous avez déjà un compte?<a href="connexion.php" > Se connecter maintenant</a></p>
            </form>     
            </div>
        </aside>
    </section>   
</body>
</html>