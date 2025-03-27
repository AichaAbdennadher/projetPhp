<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification</title>
</head>
<body>
<?php
require_once('../model/produit.class.php');
$prod=new produit();
$res=$prod->getProduit($_GET['code']);
$data=$res->fetchAll(PDO::FETCH_ASSOC); //fetch all trj3 tableau assocative w fetch trj3 kn val
$nom=$data[0]["nom"] ;
$code=$data[0]["code"] ;
$image= $data[0]["image"];//0:awl lig
$description=$data[0]["description"] ;
$prix= $data[0]["prix"];
$quantite_stock = $data[0]["quantite_stock"];
$couleur=$data[0]["couleur"] ;
$taille=$data[0]["taille"] ;
?>
<form method='post' action='../controller/modification.php'>
<table>
<tr><td>Code </td>
<td><input type ="text" name ="code" value ="<?php echo $code ?> " readonly/></td></tr>
<tr><td>Nom </td>
<td><input type ="text" name ="nom" value ="<?php echo $nom ?>" /></td></tr>
<tr><td>Image</td>
<td><input type ="text" name = "image" value ="<?php echo $image ?>"/>
<tr><td>Description</td>
<td><input type ="text" name = "description" value ="<?php echo $description ?>" />
<tr><td>Prix</td>
<td><input type ="text" name = "prix" value ="<?php echo $prix ?>" />
<tr><td>Quantite de stock</td>
<td><input type ="number" name = "quantite_stock" value ="<?php echo $quantite_stock ?>" />
<tr><td>Couleur</td>
<td><input type ="text" name = "couleur" value ="<?php echo $couleur ?>" />
<tr><td>Taille</td>
<td><input type ="text" name = "taille" value ="<?php echo $taille ?>" />
</td></tr>
<tr><td><input type ="submit" value= "modifier" /> </td>

<td></td> </tr> </table> </form> 
</body>
</html>
