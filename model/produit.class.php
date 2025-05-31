<?php
    class product
    {
        public $id;
        public $name;
        public $description;
        public $price;
        public $stock;  
        public $image;
        public $category_id;
        
     function insertProduit(){
            require_once('config.php');
            $cnx = new connexion();
            $pdo =$cnx ->CNXbase();
            $req= "INSERT into products (name,description,price,stock,image,category_id ) values ('$this->name','$this->description',$this->price,$this->stock,'$this->image',$this->category_id )";
            $pdo->exec($req) or print_r($pdo->errorInfo());
    }
    function rechercherProduit(){ // lzmtni lil ajout
        require_once('config.php');
        $cnx = new connexion();
        $pdo =$cnx ->CNXbase();
        $req= "SELECT count(*) from products where id=$this->id";
        $res=$pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
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
    public function getPaginatedProducts($limit, $offset) {
        require_once('config.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
    
        // Préparer la requête SQL avec des placeholders
        $req = "SELECT * FROM products LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($req);
    
        // Lier les paramètres avec bindValue
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    
        // Exécuter la requête préparée
        $stmt->execute();
    
        // Retourner les résultats
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
 
    function getProduitsByCategorie($category_id)
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="SELECT * FROM products where category_id =$category_id";
    $res=$pdo->query($req) or print_r($pdo->errorInfo());
    return $res;
    }
    function getProduitByNom() {
        require_once('config.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
    
        // Sanitize the input
        $name = htmlspecialchars($this->name);
        
        // Prepared statement for safer SQL execution
        $req = "SELECT * FROM products WHERE name LIKE :name";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(':name', '%' . $name . '%');
        $stmt->execute();
        
        return $stmt;
    }
    
    function modifier_produit($id)
    {
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    $req="UPDATE products SET name='$this->name',description='$this->description',price=$this->price,stock=$this->stock,image='$this->image',category_id =$this->category_id  WHERE id=$id";
    $pdo->exec($req) or print_r($pdo->errorInfo());
    }
function supprimerProduit($id){
    require_once('config.php');
    $cnx = new connexion();
    $pdo =$cnx ->CNXbase();
    $req= "DELETE from products where id=$id" ;
    $pdo->exec($req) or print_r($pdo->errorInfo());
}
public function getTotalProducts() {
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM products");//Ce code retourne l’objet PDOStatement ($stmt) directement.Mais ce n’est pas le nombre total de produits. Il faut encore faire le fetch du résultat pour obtenir le chiffre.
    $total = $stmt->fetch(PDO::FETCH_ASSOC);//$total = ['total' => 25];
    return $total['total'];
}

    }
?>