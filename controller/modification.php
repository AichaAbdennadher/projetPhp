<?php
require_once('../model/produit.class.php');
$prod=new product();
$prod->name=$_POST['name'];
$prod->image=$_POST['image'];
$prod->description=$_POST['description'];
$prod->price=$_POST['price'];
$prod->stock =$_POST['stock'];
$prod-> modifier_produit($_POST['id']);
header('location:../view/listProduit.php');
?>