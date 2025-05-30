<?php
session_start(); 
require_once('../model/user.class.php');
$us = new utilisateur();
$us->email = $_POST['email'];
$us->password = $_POST['password'];

$row = $us->rechercherUserC();
$n = $row->fetchColumn(0);

if ($n == 1) {
    $resRole = $us->rechercherRole();
    $data = $resRole->fetch(PDO::FETCH_ASSOC);

    $_SESSION["connecte"] = "1";
    $_SESSION['user'] = $us->email;
    $_SESSION['role'] = $data['role'];

    if ($data['role'] == 1) {
        header('Location: ../view/acceuil.php');
        exit();
    } else if ($data['role'] == 0) {
        header('Location: ../view/listProduit.php');
        exit();
    }
} else {
   header('Location: ../view/connexion.php?erreur=1');
   exit();
}
?>
