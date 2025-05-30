<?php
session_start(); 
require_once('../model/Favorites.class.php');
require_once('../model/produit.class.php');
$f=new Favorites();
$f->email=$_SESSION['user'];
$f->idProduct= $_POST['product_id'];
$f->insertFavoris();
header(header: 'location:../view/favoris.php'); 
?>