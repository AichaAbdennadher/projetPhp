<?php
require_once('../model/produit.class.php');
/* récupération des données du formulaire */
$prod=new product();
$prod->name=$_POST['name'];
$prod->description=$_POST['description'];
$prod->price=$_POST['price'];
$prod->stock =$_POST['stock'];
$prod->image=$_FILES['image']['name'];//nom de image aicha.jpg 
$fichierTemp=$_FILES['image']['tmp_name'];// PHP le place d'abord dans un dossier temporaire 
move_uploaded_file($fichierTemp, '../images/'.$prod->image);//l’image sera bien enregistrée dans projetphp/image/.
$prod->category_id =$_POST['category_id'];
$prod->insertProduit();
header(header: 'location:../view/listProduit.php'); 
?>