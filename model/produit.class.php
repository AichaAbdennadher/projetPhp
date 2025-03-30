<?php
    class product
    {
        public $id;
        public $name;
        public $description;
        public $price;
        public $stock;  
        public $image;
        
     function insertProduit(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into products (id,name,description,price,stock,image) values ($this->id,'$this->name','$this->description',$this->price,$this->stock,'$this->image')";
            $pdo->exec($req) or print_r($pdo->errorInfo());

    }
    function listProduits()
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    
    $req="SELECT * FROM products";
    
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
    function getProduit($id)//lzmtni lil modif
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="SELECT * FROM products where id=$id";
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
    function modifier_produit($id)
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="UPDATE products SET name='$this->name',description='$this->description',price=$this->price,stock=$this->stock,image='$this->image' WHERE id=$id";
    $pdo->exec($req) or print_r($pdo->errorInfo());
    }
function supprimerProduit($id){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "DELETE from products where id=$id" ;
    $pdo->exec($req) or print_r($pdo->errorInfo());
}
function rechercherProduit(){ // lzmtni lil ajout
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "SELECT count(*) from products where id=$this->id" ;
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
}
}
function getPaginatedResults($table, $items_per_page = 10) {
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase(); // Connexion à la base de données avec PDO

    // Récupérer le nombre total d'enregistrements
    $sql = "SELECT COUNT(*) AS total FROM $table";
    $stmt = $pdo->query($sql);
    $total_items = $stmt->fetch(PDO::FETCH_ASSOC)['total']; // Récupérer la valeur du total

    // Calculer le nombre total de pages
    $total_pages = ceil($total_items / $items_per_page);

    // Récupérer la page actuelle
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $current_page = max(1, min($current_page, $total_pages)); // S'assurer que la page est dans les limites

    // Calculer l'offset pour la requête SQL
    $offset = ($current_page - 1) * $items_per_page;

    // Récupérer les données paginées
    $sql = "SELECT * FROM $table LIMIT $items_per_page OFFSET $offset";
    $stmt = $pdo->query($sql);

    // Retourner les données sous forme de tableau associatif et les informations de pagination
    return [
        'data' => $stmt->fetchAll(PDO::FETCH_ASSOC), // Données sous forme de tableau associatif
        'total_pages' => $total_pages,
        'current_page' => $current_page
    ];
}


?>