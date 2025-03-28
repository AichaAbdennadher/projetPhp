<?php
require_once('../model/user.class.php');
$us=new utilisateur();
$us->nom=$_POST['nom'];
$us->email=$_POST['email'];
$us->password=$_POST['password'];
$us->tel=$_POST['tel'];
$us->adresse=$_POST['adresse'];
$row=$us->rechercherUser();
$n= $row->fetchColumn(0) ; 
if($n==0) { $us->insertUser();
header('location:../view/connexion.php'); }
else { header('location:../view/viewInscription.php');
}
if ($us->email == "admin@gmail.com" && $us->password == "123456") {
    header('Location: ../view/listProduit.php');  
} elseif ($n != 0) {
    header('Location: ../view/acceuil.html');
}
?>