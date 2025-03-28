<?php
    class utilisateur
    {
        public $nom;
        public $email;
        public $password;
        public $tel;
        public $adresse;
     


 function insertUser(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into user (nom,email,password,tel,adresse ) values ('$this->nom','$this->email','$this->password','$this->tel','$this->adresse')";
            $pdo->exec($req) or print_r($pdo->errorInfo());

    }

function rechercherUser(){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "SELECT count(*) from user where email='$this->email'" ;
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}
}
?>