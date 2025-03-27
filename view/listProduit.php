<?php
require_once('../model/produit.class.php');
$prod=new produit();
$res=$prod->listProduits();
?>
<table border='1'>
<tr><td>Code</td>
<td>Image</td>
<td>Nom</td>
<td>Prix</td>
<td>Quantite de stock</td>
<td>Couleur</td>
<td>taille</td>
<td>Actions</td></tr>
<?php
foreach($res as $row)
{
echo "<tr><td>$row[3]</td>";
echo "<td>$row[7]</td>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[5]</td>";
echo "<td>$row[6]</td>";
echo "<td><a href ='modifForm.php?code=$row[3]'> Modifier</a> <a href='../controller/sup.php?code=$row[3]'>Supprimer</a></td> </tr>";
}
echo "</table>";
?>