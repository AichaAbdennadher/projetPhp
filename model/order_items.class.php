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

}
?>