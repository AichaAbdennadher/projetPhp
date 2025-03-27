<?php
require_once('user.class.php');
$us=new utilisateur();
$us->user_cin=$_POST['cinuser'];
$us->user_nom=$_POST['nomuser'];
$row=$us->rechercherUser();
$n= $row->fetchColumn(0) ; 
if($n==0) { $us->insertuser();
header('location:liste.php'); }
else { header('location:inscriptionForm.html');
}?>