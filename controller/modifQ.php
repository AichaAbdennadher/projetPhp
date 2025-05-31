<?php
session_start(); 
require_once('../model/cart.class.php');
$f=new cart();
$f->email=$_SESSION['user'];
$f->idProduct= $_POST['product_id'];
$f->quantity= $_POST['quantity'];
$f->updateQuantity($f->email, $f->idProduct, $f->quantity);
header(header: 'location:../view/panier.php'); 
?>