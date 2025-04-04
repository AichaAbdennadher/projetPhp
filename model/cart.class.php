<?php
    class cart
    {
        public $id;
        public $email;
        public $idProduct;
        public $quantity;
      
 function insertCart(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into users (id,email,idProduct,quantity) values ($this->id,'$this->email',$this->idProduct,$this->quantity)";
            $pdo->exec($req) or print_r($pdo->errorInfo());

    }

function rechercherCart(){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "SELECT count(*) from cart where id= $this->id" ;
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}

function listCart()
{
require_once('config.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();

$req="SELECT * FROM cart";
$res=$pdo->query($req) or print_r($pdo->errorInfo());
return $res;
}}
?>