<?php
    class product
    {
        public $id;
        public $name;
        public $description;
        public $price;
        public $stock;  
        public $image;
        
     function insertProduit(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into products (id,name,description,price,stock,image) values ($this->id,'$this->name','$this->description',$this->price,$this->stock,'$this->image')";
            $pdo->exec($req) or print_r($pdo->errorInfo());

    }
    function listProduits()
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    
    $req="SELECT * FROM products";
    
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
    function getProduit($id)//lzmtni lil modif
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="SELECT * FROM products where id=$id";
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
    function modifier_produit($id)
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="UPDATE products SET name='$this->name',description='$this->description',price=$this->price,stock=$this->stock,image='$this->image' WHERE id=$id";
    $pdo->exec($req) or print_r($pdo->errorInfo());
    }
function supprimerProduit($id){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "DELETE from products where id=$id" ;
    $pdo->exec($req) or print_r($pdo->errorInfo());
}
function rechercherProduit(){ // lzmtni lil ajout
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "SELECT count(*) from products where id=$this->id" ;
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}
}
?>