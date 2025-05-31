<?php
    class cart
    {
        public $id;
        public $email;
        public $idProduct;
        public $quantity;
      
        function insertCart() {
            require_once('config.php');
            $cnx = new connexion();
            $pdo = $cnx->CNXbase();
        
            // Vérifier si le produit existe déjà dans le panier du client
            $check = "SELECT quantity FROM cart WHERE email = '$this->email' AND idProduct = $this->idProduct";
            $res = $pdo->query($check);
        
            if ($res && $res->rowCount() > 0) {
                // Produit déjà dans le panier → incrémenter la quantité
                $row = $res->fetch(PDO::FETCH_ASSOC);
                $newQty = $row['quantity'] + 1;
                $update = "UPDATE cart SET quantity = $newQty WHERE email = '$this->email' AND idProduct = $this->idProduct";
                $pdo->exec($update) or print_r($pdo->errorInfo());
            } else {
                // Produit pas encore dans le panier → l'ajouter
                $insert = "INSERT INTO cart (email, idProduct, quantity) VALUES ('$this->email', $this->idProduct, 1)";
                $pdo->exec($insert) or print_r($pdo->errorInfo());
            }
        }
function rechercherCart(){ //lzmtni lil ajout
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
}
function listCartClient($email)
{
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $req = "SELECT * FROM cart c JOIN products p ON c.idProduct = p.id WHERE email = '$email'";
    $res = $pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}
public function updateQuantity($email, $product_id, $quantity) {
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
     $req = "UPDATE cart SET quantity = $quantity WHERE email = $email AND idProduct =$product_id ";
    $pdo->exec($req) or print_r($pdo->errorInfo());
}
}
?>