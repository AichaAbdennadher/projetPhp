<?php
    class produit
    {
        public $nom;
        public $prix;
        public $quantite_stock;  
        public $code;
        public $description;
        public $couleur;
        public $taille;
        public $image;
        
     function insertProduit(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into produit (nom,prix,quantite_stock,code,description,couleur,taille,image) values ('$this->nom',$this->prix,$this->quantite_stock,'$this->code','$this->description','$this->couleur','$this->taille','$this->image')";
            $pdo->exec($req) or print_r($pdo->errorInfo());

    }
    function listProduits()
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    
    $req="SELECT * FROM produit";
    
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
    function getProduit($code)//lzmtni lil modif
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="SELECT * FROM produit where code='$code'";
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
    function modifier_produit($code)
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="UPDATE produit SET nom='$this->nom',prix=$this->prix,quantite_stock=$this->quantite_stock,description='$this->description',couleur='$this->couleur',taille='$this->taille',image='$this->image' WHERE code='$code'";
    $pdo->exec($req) or print_r($pdo->errorInfo());
    }
function supprimerProduit($code){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "DELETE from produit where code='$code'" ;
    $pdo->exec($req) or print_r($pdo->errorInfo());
}
function rechercherProduit(){ // lzmtni lil ajout
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "SELECT count(*) from produit where code='$this->code'" ;
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}
}
?>