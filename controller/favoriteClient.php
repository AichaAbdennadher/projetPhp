<?php
session_start(); 

require_once('../model/favorites.class.php');
require_once('../model/produit.class.php');

    $f = new Favorites();
    $f->email = $_SESSION['user'];

    $f->listFavoritesClient($f->email);

    header('Location: ../view/favoris.php');
?>