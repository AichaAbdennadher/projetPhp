<?php
    class utilisateur
    {
        public $user_cin;
        public $user_nom;

        function insertUser(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into utilisateur (user_cin, user_nom) values ('$this->user_cin','$this->user_nom')";
            $pdo->exec($req) or print_r($pdo->errorInfo());

    }
    function listusers()
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    
    $req="SELECT * FROM utilisateur";
    
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
    function getuser($id)
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req=
    
    "SELECT * FROM utilisateur where user_cin=$id";
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
    function modifier_user($id)
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="UPDATE utilisateur SET user_nom='$this->user_nom' WHERE user_cin=$id";
    $pdo->exec($req) or print_r($pdo->errorInfo());
    }
function supprimerUser($id){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "DELETE from utilisateur where user_cin=$id" ;
    $pdo->exec($req) or print_r($pdo->errorInfo());
}
function rechercherUser(){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "SELECT count(*) from utilisateur where user_cin='$this->user_cin'" ;
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}
}
?>