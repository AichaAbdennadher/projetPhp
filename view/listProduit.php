<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<?php
include("aside.php");
require_once ('../controller/session.php');


// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 5;  // Nombre d'éléments par page
$offset = ($page - 1) * $items_per_page;  //Calcul de l’offset pour savoir à partir de quel produit commencer à afficher.
require_once('../model/produit.class.php');
$prod = new product();
$data = $prod->getPaginatedProducts($items_per_page, offset: $offset); // Récupère les produits paginés
// Total des produits
$total_items = $prod->getTotalProducts();
$total_pages = ceil($total_items / $items_per_page);

// Calcul de début et fin affichés
$start_item = $offset + 1;
$end_item = min($offset + $items_per_page, $total_items);

if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $prod->name = $searchTerm;
    $resu = $prod->getProduitByNom(); 
}
?> 
<div class="p-4 sm:ml-64">
   <div class="p-4 ">
      <div>
      <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
    <form class="flex items-center" method="post" action="listProduit.php">
    <div class="relative w-full">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
        <input type="text" name="search" id="simple-search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-500 focus:border-pink-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500"
            placeholder="Search product" >
    </div>
  
</form>

</div>
<div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
<a href="#" onclick="openModal()" class="flex items-center justify-center text-white bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:ring-pink-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
<svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>    Add product
</a>
</div>
            </div>
          <div class="overflow-x-auto">
  </div> 

  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-4 py-3">ID</th>
            <th scope="col" class="px-4 py-3">Image</th>
            <th scope="col" class="px-4 py-3">Category</th>
            <th scope="col" class="px-4 py-3">Name</th>
            <th scope="col" class="px-4 py-3">Description</th>
            <th scope="col" class="px-4 py-3">Price</th>
            <th scope="col" class="px-4 py-3">Stock Quantity</th>
            <th scope="col" class="px-4 py-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Afficher les produits filtrés si la recherche est effectuée
        if (isset($resu)) {
            foreach ($resu as $row) {
                echo '<tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">';
                echo '<td class="px-4 py-3">' . $row[0] . '</td>';
                echo '<td class="px-5 py-4"><img src="../images/'.$row[5]. '" alt="image" class="w-12 h-11 rounded"></td>';
                echo '<td class="px-4 py-3">' . $row[6] . '</td>';
                echo '<td class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">'.$row[1].'</td>';
                echo '<td class="px-4 py-3">' . $row[2] . '</td>';
                echo '<td class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">' . $row[3] . ' TND </td>';
                echo ' <td class="px-14 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">' . $row[4] . '</td>';
                echo '<td class="px-4 py-3"><a href="javascript:void(0);" onClick="openModalUpdate('. $row[0].')">
                <span class="relative px-1 py-0.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md">
                    <box-icon name="edit" color="gray" size="s"></box-icon>
                </span>
            </a>

                     <a href="javascript:void(0);" onClick="openModalSupp('. $row[0].')">
    <span class="relative px-1 py-2.5 transition-all ease-in duration-75 dark:bg-gray-900 rounded-md">
        <box-icon name="trash" type="solid" color="rgb(225 114 114)" size="s"></box-icon>
    </span>
</a>
                      </td>';
                echo '</tr>';
            }
        } else {
                    // Afficher les produits initiaux si aucune recherche
                    foreach ($data as $row) {

                        echo '<tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700" id="product-' . $row["id"] . '">';
                        echo '<td class="px-4 py-3">' . $row["id"] . '</td>';
                        echo '<td class="px-4 py-4 w-40 h-35">
                        <div class="flex items-center justify-center h-full bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden">
                          <img src="../images/'.$row["image"].'" 
                               alt="Product image" 
                               class="min-w-full min-h-full object-scale-up transform scale-110 rounded-lg border border-gray-200 dark:border-gray-600 shadow-sm">
                        </div>
                      </td>';
                        echo '<td class="px-1.5 py-0.5 text-xs text-center text-gray-600 dark:text-gray-300">' . $row["category_id"] . '</td>';
                        echo '<td class="px-3 py-2 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-white truncate max-w-[200px]">'.$row["name"].'</td>';
                        echo '<td class=""px-4 py-3 max-w-xs overflow-hidden text-ellipsis">' . $row["description"] . '</td>';
// Prix - version compacte
echo '<td class="px-2 py-1 text-sm text-gray-900 whitespace-nowrap dark:text-white">' . $row["price"] . ' DTN</td>';

// Stock - version ultra compacte
echo '<td class="px-2 py-1 text-xs text-center text-gray-900 dark:text-white">' . $row["stock"] . '</td>';
                        echo '<td class="px-4 py-3"><a href="javascript:void(0);" onClick="openModalUpdate('. $row["id"].')">
                        <span class="relative px-1 py-0.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md">
                            <box-icon name="edit" color="gray" size="s"></box-icon>
                        </span>
                    </a>
        
                             <a href="javascript:void(0);" onClick="openModalSupp('. $row["id"].')">
            <span class="relative px-1 py-2.5 transition-all ease-in duration-75 dark:bg-gray-900 rounded-md">
                <box-icon name="trash" type="solid" color="rgb(225 114 114)" size="s"></box-icon>
            </span>
        </a>
                              </td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>       
    </table>
</div>
<nav class="flex justify-end p-4" aria-label="Table navigation">
    <ul class="inline-flex items-center space-x-2">
        <!-- Flèche Précédent -->
        <li>
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>" class="flex items-center justify-center w-8 h-8 text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-100 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 14.707a1 1 0 01-1.414 0L7.586 11l3.707-3.707a1 1 0 111.414 1.414L10.414 11l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                    </svg>
                </a>
            <?php else: ?>
                <span class="flex items-center justify-center w-8 h-8 text-gray-300 bg-gray-100 border border-gray-300 rounded cursor-not-allowed">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 14.707a1 1 0 01-1.414 0L7.586 11l3.707-3.707a1 1 0 111.414 1.414L10.414 11l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                    </svg>
                </span>
            <?php endif; ?>
        </li>

        <!-- Page actuelle -->
        <li>
            <span class="px-4 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded">
                 <?php echo $page; ?>
            </span>
        </li>

        <!-- Flèche Suivant -->
        <li>
            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>" class="flex items-center justify-center w-8 h-8 text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-100 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 5.293a1 1 0 011.414 0L12.414 9l-3.707 3.707a1 1 0 01-1.414-1.414L10.586 9 7.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </a>
            <?php else: ?>
                <span class="flex items-center justify-center w-8 h-8 text-gray-300 bg-gray-100 border border-gray-300 rounded cursor-not-allowed">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 5.293a1 1 0 011.414 0L12.414 9l-3.707 3.707a1 1 0 01-1.414-1.414L10.586 9 7.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </span>
            <?php endif; ?>
        </li>
    </ul>
</nav>
<script>
function openModal() {
    document.getElementById('crud-modal').classList.remove('hidden');
}
function closeModal() {
    document.getElementById('crud-modal').classList.add('hidden');
}

function openModalSupp(productId) {
    let modal = document.getElementById("popup-modal");
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    
    // Mettre à jour l'ID du produit dans le bouton de confirmation
    document.querySelector('[onclick="confirmDelete(this)"]').setAttribute('data-id', productId);
}

function closeModalSupp() {
    let modal = document.getElementById("popup-modal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}
function confirmDelete(button) {
    let productId = button.getAttribute("data-id");

    fetch(`../controller/sup.php?id=${productId}`, {
        method: "GET",
    })
    .then(response => response.text())
    .then(data => {
        console.log("Produit supprimé:", data);

        // Ferme le modal
        closeModalSupp();

        // Trouver l'élément produit avec l'ID et le supprimer
        let productElement = document.getElementById(`product-${productId}`);
        if (productElement) {
            productElement.remove();
        } else {
            console.error(`L'élément avec l'ID product-${productId} n'a pas été trouvé.`);
        }
    })
    .catch(error => console.error("Erreur suppression :", error));
}

function openModalUpdate(productId) {
  let modal = document.getElementById("edit-modal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");

  fetch(`../controller/modification.php?id=${productId}`)
    .then((response) => response.json())
    .then((data) => {
      if (data.error) {
        console.error(data.error);
        return;
      }

      // On remplit les champs du modal
      document.getElementById("edit-name").value = data.name;
      document.getElementById("edit-price").value = data.price;
      document.getElementById("edit-description").value = data.description;
      document.getElementById("edit-stock").value = data.stock;

      // Image affichée (si tu veux l'afficher dans un <img>)
      document.getElementById("image-name").textContent = data.image;

      // Tu peux aussi stocker l’ID pour la mise à jour plus tard
      document.getElementById("edit-product-id").value = data.id;
    })
    .catch((error) => {
      console.error("Erreur récupération produit:", error);
    });
}

function closeModalUpdate() {
  document.getElementById("edit-modal").classList.add("hidden");
}
</script>

</script>
<!-- Modal Add product -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
<div class="relative p-4 w-[80%] max-w-2xl max-h-[90vh] h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-pink-600 dark:text-white">
                    Create New Product
                </h3>
                <button type="button" onclick="closeModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-pink-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="post" action="../controller/ajouterProduit.php" enctype="multipart/form-data">
    <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Product name" required="">
        </div>
        <div class="col-span-2">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea name="description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Write product description here"></textarea>                    
        </div>
        <div class="col-span-2">
    <?php
    require_once('../model/category.class.php');
    $cat = new category();
    $result = $cat->listCategories();
    ?>
    
    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>

    <select name="category_id" id="category_id"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
               focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 
               dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
               dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">       
        <?php foreach ($result as $cat): ?>
            <option value="<?= $cat[0] ?>"><?= $cat[1] ?></option>
        <?php endforeach; ?>
    </select>
</div>

        <div class="col-span-2 sm:col-span-1">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Product price" required="">
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock quantity</label>
            <input type="number" name="stock" min="1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
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
        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        
<!-- Zone pour afficher le nom du fichier sélectionné -->
<p id="file-name" class="mt-2 text-sm text-gray-700 dark:text-gray-300"></p>
    </div>
    <input id="dropzone-file" type="file" name="image" class="hidden" />
</label>

<script>
    document.getElementById('dropzone-file').addEventListener('change', function(event) {
        const fileName = event.target.files[0] ? event.target.files[0].name : "No file selected";
        document.getElementById('file-name').textContent = fileName;
    });
</script>
        </div>
</div>
    <!-- Form submission -->
    <div class="flex items-center justify-end p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
        <button data-modal-hide="large-modal" type="button" onclick="closeModal()" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-gray-200 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
        <button data-modal-hide="large-modal" type="submit" class="text-white bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">Save</button>
    </div>
</form>

        </div>
    </div>
</div>
<!-- Modal delete -->
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <button type="button"  onclick="closeModalSupp()" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                <button data-modal-hide="popup-modal" type="button" onclick="confirmDelete(this)" data-id="ID_PRODUIT" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
    Yes, I'm sure
</button>

                <button data-modal-hide="popup-modal" type="button" onclick="closeModalSupp()" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </div>
    </div>
</div>

<!--  Modal update product -->
<div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
<div class="relative p-4 w-[80%] max-w-2xl max-h-[90vh] h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-lg font-semibold text-pink-600 dark:text-white">
                    Update Product
                </h3>
                <button type="button" onclick="closeModalUpdate()"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-pink-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method='post' action='../controller/modification.php' enctype="multipart/form-data">
            <div class="grid gap-4 mb-4 grid-cols-2">
            <input type="hidden" name="id" id="edit-product-id" />

        <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name ="name"  id="edit-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Product name" required="">
        </div>
        <div class="col-span-2">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea name = "description" id="edit-description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Write product description here"></textarea>                    
        </div>
        <div class="col-span-2">
        <?php
require_once('../model/category.class.php');
$cat=new category();
$result=$cat->listCategories();
?>
            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <?php
// Ouvrir le tag <select> avant la boucle
echo '<select name="category_id" id="edit-description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">';

// Boucle pour ajouter des options
foreach ($result as $cat) {
    echo '<option value="' . $cat[0] . '">' . $cat[1]. '</option>';
}

// Fermer le tag </select> après la boucle
echo '</select>';
?>                 
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="text" name="price" id="edit-price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
  dark:bg-pink-600 dark:border-pink-500 dark:placeholder-pink-400 dark:text-white 
  focus:ring-pink-500 focus:border-pink-500 focus:p-2 focus:outline-none transition duration-200" placeholder="Product price" required="">
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock quantity</label>
            <input type="number" name="stock" id="edit-stock"  min="1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 
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
        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        
<!-- Zone pour afficher le nom du fichier sélectionné -->
<p id="image-name" class="mt-2 text-sm text-gray-700 dark:text-gray-300"></p>
    </div>
    <input  type="file" name="image" id="image-name" class="hidden" />
</label>

<script>
    document.getElementById('preview-image').addEventListener('change', function(event) {
        const fileName = event.target.files[0] ? event.target.files[0].name : "No file selected";
        document.getElementById('file-name').textContent = fileName;
    });
</script>
        </div>
</div>

    <!-- Form submission -->
    <div class="flex items-center justify-end p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
        <button data-modal-hide="large-modal" type="button" onclick="closeModalUpdate()" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-300 rounded-lg border border-gray-200 hover:bg-gray-200 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
        <button data-modal-hide="large-modal"  data-id="ID_PRODUIT" type="submit" class="text-white bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">Save</button>
    </div>
</form>

        </div>
    </div>
</div>
<script>
function Update(button) {
  let productId = button.getAttribute("data-id");
  fetch(`../controller/modification.php?id=${productId}`, {
    method: "GET",
  })
    .then((response) => response.text() )
    .then((data) => {
      console.log("Produit modifié:", data);

      // Ferme le modal
      closeModalUpdate();

      // Trouver l'élément produit avec l'ID et le supprimer
      let productElement = document.getElementById(`product-${productId}`);
      if (productElement) {
        productElement.Update();
      } else {
        console.error(
          `L'élément avec l'ID product-${productId} n'a pas été trouvé.`
        );
      }
    })
    .catch((error) => console.error("Erreur suppression :", error));
}
</script>


