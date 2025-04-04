<?php
    class category
    {
        public $id;
        public $name;
        public $image;
      
        function listCategories()
        {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        
        $req="SELECT * FROM categories";
        $res=$pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
        }

}
