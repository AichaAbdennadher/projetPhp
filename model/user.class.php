<?php
    class utilisateur
    {
        public $name;
        public $email;
        public $password;
        public $phone;
        public $location;
        public $role;
     
        function listCustomers()
        {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        
        $req="SELECT * FROM users";
        
        $res=$pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
        }

 function insertUser(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into users (name,email,password,phone,location,role) values ('$this->name','$this->email','$this->password','$this->phone','$this->location',1)";
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
function rechercherUserC(){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "SELECT count(*) from users where email='$this->email' AND password='$this->password'" ;
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}
function rechercherRole(){
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $req = "SELECT role FROM users WHERE email='$this->email' AND password='$this->password'";
    $res = $pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}
}
?>