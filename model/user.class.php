<?php
    class utilisateur
    {
        public $name;
        public $email;
        public $password;
        public $phone;
        public $location;
     


 function insertUser(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into users (name,email,password,phone,location ) values ('$this->name','$this->email','$this->password','$this->phone','$this->location')";
            $pdo->exec($req) or print_r($pdo->errorInfo());

    }

function rechercherUser(){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "SELECT count(*) from users where email='$this->email'" ;
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}
}
?>