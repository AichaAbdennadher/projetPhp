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

                <form action="../control/controlInscription.php" method="POST">
                      
                <p>Veuillez remplir ce formulaire pour créer un compte</p>
                <hr> 
                
                <label for="name"><b>Nom</b></label>
                <input type="text" placeholder="Entez votre nom" name="nom" required><br>
                
                <label for="email"><b>gmail</b></label> 
                <input type="text" placeholder="Entez votre gmail" name="login" required><br>
        
                <label for="pwd"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entez votre mot de passe" name="password" required><br>
        
                <label for="psw-repeat"><b>Confirmez le mot de passe </b></label>
                <input type="password" placeholder="Confirmez le mot de passe" name="pswRepeat" required><br>
                
                <select name="user_type" >
                    <option value="user">client</option>
                    <option value="admin">administrateur</option>
                </select>
                <hr>
        
                <input type="submit" name="créer" value="créer" class="registerbutton">
                <p>Vous avez déjà un compte?<a href="infsquare.php" > Se connecter maintenant</a></p>
            </form>     
            </div>
        </aside>
    </section>
    
</body>
</html>