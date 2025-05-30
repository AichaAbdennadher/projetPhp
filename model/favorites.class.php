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
            echo "Email : " . $this->email . "<br>";
echo "Produit : " . $this->idProduct . "<br>";
            $pdo->exec($req) or print_r($pdo->errorInfo());

    }
    function rechercherFavoris(){ 
        require_once('config.php');
        $cnx = new connexion();
        $pdo =$cnx ->CNXbase();
        $req= "SELECT count(*) from favorites where id=$this->id";
        $res=$pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
    }

    function listFavorites()
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    
    $req="SELECT * FROM favorites";
    
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

    function getFavorite($id)//lzmtni lil supp
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="SELECT * FROM favorites where id=$id";
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
}
?>