<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="info.css">

</head>
<body>
    
    <header>
     <div class="log">
        <img id ="logo" src="imgInfo/barriere.png" alt="">

    </div>
    </header>
    <section>
            <aside >
            
               
                    <center>Connexion</center>
                 <hr>  
                 <form action="ControlUser.php" method="POST">     	
                <label for="email"><b>Gmail</b></label> 

                <input type="text" placeholder="Entez votre gmail" name="login" required><br>
        
                <label for="pwd"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entez votre mot de passe" name="password" required><br>
        
                <hr>
        
                <input type="submit" name="se connecter" value="se connecter" >
                <p>vous n'avez pas de compte ? <a href="viewInscription.php" >S'inscrire maintenant</a></p>	
               
            </form>
            </aside>
            </section>        
</body>
