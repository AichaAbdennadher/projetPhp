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
public function getTotalOrders() {  //lil dashboard
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM orders");//Ce code retourne l’objet PDOStatement ($stmt) directement.Mais ce n’est pas le nombre total de produits. Il faut encore faire le fetch du résultat pour obtenir le chiffre.
    $total = $stmt->fetch(PDO::FETCH_ASSOC);//$total = ['total' => 25];
    return $total['total'];
}

public function getPaginatedOrders($limit, $offset) { //lil listOrders
        require_once('config.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $sql = "SELECT o.id,o.total_amount,o.email, p.image AS product_image, oi.quantity, oi.price FROM orders o
        JOIN order_items oi ON oi.order_id = o.id
        JOIN products p ON p.id = oi.product_id
        LIMIT :limit OFFSET :offset";
//LIMIT :limit → combien de résultats tu veux récupérer.
//OFFSET :offset → à partir de quelle position commencer.
        $stmt = $pdo->prepare($sql);
    
        // Lier les paramètres avec bindValue
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
        $stmt->execute();
    
        // Retourner les résultats
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
public function getPaginatedOrdersClient($limit, $offset) { //lil cutomers
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();

    $sql = "
        SELECT DISTINCT u.email , u.name, u.location, u.phone
        FROM users u
        JOIN orders o ON u.email = o.email
        LIMIT :limit OFFSET :offset
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    function nbreClientsAvecCommandes() {  //lil daschboard
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();

    $req = "SELECT COUNT(DISTINCT email) FROM orders";

    $res = $pdo->query($req) or print_r($pdo->errorInfo());
    
    // Récupère le résultat (valeur numérique)
    $count = $res->fetchColumn();

    return $count;
}

function getBestCustomers($limit = 6) {
       require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $sql = "
        SELECT 
            email,
            COUNT(*) AS total_orders,
            SUM(total_amount) AS total_spent
        FROM orders
        GROUP BY email
        ORDER BY total_spent DESC
        LIMIT :limit
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
  function getOrderByNameUser($name) {  //searchOrder
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
$sql = "
        SELECT DISTINCT u.name, u.email, u.location, u.phone
        FROM users u
        JOIN orders o ON u.email = o.email
        WHERE u.name LIKE :name
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', '%' . $name . '%');
    $stmt->execute();

    return $stmt;
}
public function getOrderById($id) {
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();

    // Requête pour récupérer la commande selon son ID
    $sql = "SELECT * FROM orders WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Récupérer une seule ligne (la commande)
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}
?>