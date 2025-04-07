<?php
    class category
    {
        public $id;
        public $name;
        public $image;
        public $description;
      
        function listCategories(){
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM categories";
        $res=$pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
        }
        function getCategory($id)
        {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM categories where id=$id";
        $res=$pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
        }

}
