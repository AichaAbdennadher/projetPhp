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
public function getTotalOrders() {
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM orders");//Ce code retourne l’objet PDOStatement ($stmt) directement.Mais ce n’est pas le nombre total de produits. Il faut encore faire le fetch du résultat pour obtenir le chiffre.
    $total = $stmt->fetch(PDO::FETCH_ASSOC);//$total = ['total' => 25];
    return $total['total'];
}
public function getPaginatedOrders($limit, $offset) {
        require_once('config.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
    
        // Préparer la requête SQL avec des placeholders
        $sql = "SELECT o.id,o.total_amount,o.email, p.image AS product_image, oi.quantity, oi.price FROM orders o
        JOIN order_items oi ON oi.order_id = o.id
        JOIN products p ON p.id = oi.product_id
        ORDER BY o.id DESC
        LIMIT :limit OFFSET :offset";

        $stmt = $pdo->prepare($sql);
    
        // Lier les paramètres avec bindValue
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    
        // Exécuter la requête préparée
        $stmt->execute();
    
        // Retourner les résultats
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function nbreClientsAvecCommandes() {
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();

    $req = "SELECT COUNT(DISTINCT email) FROM orders";

    $res = $pdo->query($req) or print_r($pdo->errorInfo());
    
    // Récupère le résultat (valeur numérique)
    $count = $res->fetchColumn();

    return $count;
}
function getClientsAvecCommandes() {
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();

    $req = "
        SELECT u.id, u.name, u.email
        FROM users u
        WHERE u.id IN (
            SELECT DISTINCT user_id FROM orders
        )
    ";

    $res = $pdo->query($req) or print_r($pdo->errorInfo());
    $clients = $res->fetchAll(PDO::FETCH_ASSOC);

    return $clients;
}

function getBestCustomers($limit = 10) {
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

}
?>