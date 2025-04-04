<?php
require_once('../model/produit.class.php');
$prod=new product();
$prod->name=$_POST['name'];
$prod->image=$_POST['image'];
$prod->description=$_POST['description'];
$prod->price=$_POST['price'];
$prod->stock =$_POST['stock'];
$prod->id =$_POST['id'];
$prod-> getProduitsByCategorie($_POST['category_id']);
header('location:../view/categorie.php');
?>