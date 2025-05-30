<?php
    session_start();
    session_unset();
    header("location:../view/connexion.php"); 
?>