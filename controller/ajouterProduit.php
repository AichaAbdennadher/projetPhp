<?php
require_once('../model/produit.class.php');
/* récupération des données du formulaire */
$prod=new product();
$prod->id=$_POST['id'];
$prod->name=$_POST['name'];
$prod->description=$_POST['description'];
$prod->price=$_POST['price'];
$prod->stock =$_POST['stock'];
$prod->image=$_FILES['image']['name'];//nom de image aicha.jpg 
$fichierTemp=$_FILES['image']['tmp_name'];// PHP le place d'abord dans un dossier temporaire 
move_uploaded_file($fichierTemp, '../images/'.$prod->image);//l’image sera bien enregistrée dans projetphp/image/.
$prod->category =$_POST['category'];
$row=$prod->rechercherProduit();
$n= $row->fetchColumn(0); 
if($n==0) { $prod->insertProduit();
header(header: 'location:../view/listProduit.php'); }
else { header('location:../view/ajouterPForm.html');   //lzm pop w7dha
}?>