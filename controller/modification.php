<?php
require_once('../model/produit.class.php');

header('Content-Type: application/json'); // Important pour dire que c’est du JSON

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $prodM = new product();
    $resM = $prodM->getProduit($_GET['id']);

    if ($resM) {
        $data = $resM->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'Produit introuvable']);
        }
    } else {
        echo json_encode(['error' => 'Erreur requête produit']);
    }
} else {
    if (!empty($_POST['id'])){
$prod=new product();
$prod->name=$_POST['name'];
$prod->description=$_POST['description'];
$prod->price=$_POST['price'];
$prod->stock =$_POST['stock'];
$prod->image=$_FILES['image']['name'];//nom de image aicha.jpg 
$fichierTemp=$_FILES['image']['tmp_name'];// PHP le place d'abord dans un dossier temporaire 
move_uploaded_file($fichierTemp, '../images/'.$prod->image);//l’image sera bien enregistrée dans projetphp/image/.
$prod->category_id =$_POST['category_id'];
$prod->modifier_produit($_POST['id']);
header(header: 'location:../view/listProduit.php'); 
    }else{
    echo json_encode(['error' => 'Paramètre id manquant']);}
}