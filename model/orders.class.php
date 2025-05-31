<?php
    class orders
    {
        public $id;
        public $email;
        public $total_amount;

            function insertOrder(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into orders (email,total_amount) values ('$this->email',$this->total_amount)";
            $pdo->exec($req) or print_r($pdo->errorInfo());
             // Récupérer l'id de la commande nouvellement insérée
        return $pdo->lastInsertId();
    }


}
?>