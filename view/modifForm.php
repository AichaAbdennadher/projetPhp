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
$prod=new product();
$res=$prod->getProduit($_GET['id']);
$data=$res->fetchAll(PDO::FETCH_ASSOC); //fetch all trj3 tableau assocative w fetch trj3 kn val
$name=$data[0]["name"] ;
$id=$data[0]["id"] ;
$image= $data[0]["image"];//0:awl lig
$description=$data[0]["description"] ;
$price= $data[0]["price"];
$stock = $data[0]["stock"];
?>
<form method='post' action='../controller/modification.php'>
<table>
<tr><td>Id </td>
<td><input type ="text" name ="id" value ="<?php echo $id ?> " readonly/></td></tr>
<tr><td>Nom </td>
<td><input type ="text" name ="name" value ="<?php echo $name ?>" /></td></tr>
<tr><td>Description</td>
<td><input type ="text" name = "description" value ="<?php echo $description ?>" />
<tr><td>Prix</td>
<td><input type ="text" name = "price" value ="<?php echo $price ?>" />
<tr><td>Quantite de stock</td>
<td><input type ="number" name = "stock" value ="<?php echo $stock ?>" />
<tr><td>Image</td>
<td><input type ="text" name = "image" value ="<?php echo $image ?>"/>
</tr>
<tr><td><input type ="submit" value= "modifier" /> </td>
<td></td> </tr> </table> </form> 
</body>
</html>
