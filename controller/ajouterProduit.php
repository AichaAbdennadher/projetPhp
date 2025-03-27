<?php
require_once('../model/produit.class.php');
$prod=new produit();
$prod->code=$_POST['code'];
$prod->nom=$_POST['nom'];
$prod->image=$_POST['image'];
$prod->description=$_POST['description'];
$prod->prix=$_POST['prix'];
$prod->quantite_stock =$_POST['quantite_stock'];
$prod->couleur=$_POST['couleur'];
$prod->taille=$_POST['taille'];
$row=$prod->rechercherProduit();
$n= $row->fetchColumn(0) ; 
if($n==0) { $prod->insertProduit();
header('location:../view/listeProduit.php'); }
else { header('location:../view/ajouterPForm.html');
}?>