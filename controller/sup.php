<?php
require_once('../model/produit.class.php');
$prod=new product();
$prod-> supprimerProduit($_GET['id']);
header('location:../view/listProduit.php');
?>