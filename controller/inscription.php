<?php
require_once('../model/user.class.php');
$us=new utilisateur();
$us->name=$_POST['name'];
$us->email=$_POST['email'];
$us->password=$_POST['password'];
$us->phone=$_POST['phone'];
$us->location=$_POST['location'];
$row=$us->rechercherUser();
$n= $row->fetchColumn(0) ; 
if($n==0) { 
$us->insertUser();
header('location:../view/connexion.php'); }
else { header('location:../view/viewInscription.php');
}

?>