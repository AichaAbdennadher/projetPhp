<?php
require_once('../model/produit.class.php');
$prod=new product();
$prod->name=$_POST['name'];
$prod->image=$_POST['image'];
$prod->description=$_POST['description'];
$prod->price=$_POST['price'];
$prod->stock =$_POST['stock'];
$prod->category_id =$_POST['category_id'];
$prod-> getProduit($_POST['id']);
header('location:../view/prod.php');
?>

