<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <!-- <script>
        function openModalUpdate(event, productId) {
    event.preventDefault(); // Empêcher la redirection
    document.getElementById("modal").classList.remove("hidden");

    // Charger le contenu du formulaire via AJAX
    fetch('modifForm.php?id=' + productId)
        .then(response => response.text())
        .then(data => {
            document.getElementById("modalContent").innerHTML = data;
        })
        .catch(error => console.error('Erreur:', error));
}

    </script> -->
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
<!-- <div id="modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
<div class="relative p-4 w-[80%] max-w-2xl max-h-[90vh] h-auto">
        <!-- Modal content -->
        <!-- <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-700"> -->
            <!-- Modal header -->
            <!-- <div class="flex items-center justify-between p-4 md:border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-pink-600 dark:text-white">
                    Update Product <?php echo $name ?>
                </h3>
                <button type="button" onclick="closeModalUpdate()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-pink-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div> -->
            <!-- Modal body -->
            <!-- <form class="p-4 md:p-5" method="post" action='../controller/modification.php' enctype="multipart/form-data">
    <div class="grid gap-4 mb-4 grid-cols-2">
    <div class="col-span-2">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Id</label>
            <input type="text" name="id" id="id"  value ="<?php echo $id ?> " readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200">
       </div>
        <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name" value ="<?php echo $name ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Product name" required="">
        </div>
        <div class="col-span-2">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea name="description"  value ="<?php echo $description ?>" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Write product description here"></textarea>                    
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="text"  value ="<?php echo $price ?>" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Product price" required="">
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock quantity</label>
            <input type="number" name="stock"  value ="<?php echo $stock ?>" min="1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Stock Quantity" required="">
        </div>
        <div class="col-span-2">
        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>

        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
    <div class="flex flex-col items-center justify-center pt-2 pb-2">
        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
        </svg>
        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> </p>
        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p> -->
        
<!-- Zone pour afficher le nom du fichier sélectionné -->
<!-- <p id="file-name" class="mt-2 text-sm text-gray-700 dark:text-gray-300"></p>
    </div>
    <input id="dropzone-file" type="file" name="image" class="hidden" value ="<?php echo $image ?>" />
</label>

<script>
    document.getElementById('dropzone-file').addEventListener('change', function(event) {
        const fileName = event.target.files[0] ? event.target.files[0].name : "No file selected";
        document.getElementById('file-name').textContent = fileName;
    });
</script>
        </div>
</div> -->
    <!-- Form submission -->
    <!-- <div class="flex items-center justify-end p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
        <button data-modal-hide="large-modal" type="button" onclick="closeModalUpdate()" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-gray-200 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
        <button data-modal-hide="large-modal" type="submit" class="text-white bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">Update</button>
    </div>
</form>

        </div>
    </div>
</div>  -->
</body>
</html>
