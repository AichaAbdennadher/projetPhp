<?php
require_once('../model/produit.class.php');
$prod=new produit();
$prod->nom=$_POST['nom'];
$prod->image=$_POST['image'];
$prod->description=$_POST['description'];
$prod->prix=$_POST['prix'];
$prod->quantite_stock =$_POST['quantite_stock'];
$prod->couleur=$_POST['couleur'];
$prod->taille=$_POST['taille'];
$prod-> modifier_produit($_POST['code']);
header('location:../view/listeProduit.php');
?>