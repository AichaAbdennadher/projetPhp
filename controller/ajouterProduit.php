<?php
require_once('../model/produit.class.php');
$prod=new product();
$prod->id=$_POST['id'];
$prod->name=$_POST['name'];
$prod->description=$_POST['description'];
$prod->price=$_POST['price'];
$prod->stock =$_POST['stock'];
$prod->image=$_POST['image'];
$row=$prod->rechercherProduit();
$n= $row->fetchColumn(0) ; 
if($n==0) { $prod->insertProduit();
header('location:../view/listeProduit.php'); }
else { header('location:../view/ajouterPForm.html');
}?>