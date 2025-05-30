
<?php
function Verifier_session(){
    if($_SESSION["connecte"]!=="1"){ //pas connctée 
        header("location:../view/connexion.php");
        
    }
}
?>