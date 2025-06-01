<?php
    class Favorites
    {
        public $id;
        public $email;
        public $idProduct;
      
        
     function insertFavoris(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into favorites (email,idProduct) values ('$this->email',$this->idProduct)";
            $pdo->exec($req) or print_r($pdo->errorInfo());
    }

    function listFavoritesClient($email)
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    
    $req="SELECT * FROM favorites WHERE email = '$email'";
    
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }

    function supprimerFavorite($id){
        require_once('config.php');
        $cnx = new connexion();
        $pdo =$cnx ->CNXbase();
        $req= "DELETE from favorites where id=$id" ;
        $pdo->exec($req) or print_r($pdo->errorInfo());
    }

 
}
?>