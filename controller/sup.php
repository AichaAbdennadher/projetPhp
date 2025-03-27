<?php
require_once('../model/produit.class.php');
$prod=new produit();
$prod-> supprimerProduit($_GET['code']);
header('location:../view/listeProduit.php');
?>