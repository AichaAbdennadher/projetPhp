<?php
    class order_items
    {
        public $id;
        public $order_id;
        public $product_id;
        public $quantity;
        public $price;

        function insertOrderItems(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into order_items(order_id,product_id,quantity,price) values ($this->order_id,$this->product_id,$this->quantity,$this->price)";

            $pdo->exec($req) or print_r($pdo->errorInfo());
    }
public function getItemsByOrderId($orderId) {
     require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
        $check = " SELECT oi.*, p.name, p.image as product_image 
        FROM order_items oi
        JOIN products p ON oi.product_id = p.idProduct
        WHERE oi.order_id = $orderId";
  $res = $pdo->query($check);
    return $res->fetchAll(PDO::FETCH_ASSOC);
}
}
?>