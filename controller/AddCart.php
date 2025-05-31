<?php
session_start(); 
require_once('../model/cart.class.php');
require_once('../model/produit.class.php');
$f=new cart();
$f->email=$_SESSION['user'];
$f->idProduct= $_POST['product_id'];
$f->insertCart();
header(header: 'location:../view/panier.php'); 
?>

