<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<?php
include("aside.php");
include("addProduct.php");
require_once('../model/produit.class.php');
$prod=new product();
$res=$prod->listProduits();
?>
<?php
require_once('../model/category.class.php');
$cat=new category();
$result=$cat->listCategories();
?>
<div class="p-4 sm:ml-64">
   <div class="p-4 ">
      <div>
      <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
    <form class="flex items-center" method="post" action="../controller/searchProduct.php">
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"></div>
        <input type="text" name="search" id="simple-search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-500 focus:border-pink-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500"
            placeholder="Search product" >
    </div>
    <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"> 
        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
        </svg>
    </button>
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
                echo '<td class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">' . $row[3] . ' DTN</td>';
                echo ' <td class="px-14 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">' . $row[4] . '</td>';
                echo '<td class="px-4 py-3">
                        <a href="modifForm.php?id=' . $row[0] . '">
                            <span class="relative px-1 py-0.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md">
                                <box-icon name="edit" color="gray" size="s"></box-icon>
                            </span>
                        </a>
                        <a href="../controller/sup.php?id=' . $row[0] . '">
                            <span class="relative px-1 py-2.5 transition-all ease-in duration-75 dark:bg-gray-900 rounded-md">
                                <box-icon name="trash" type="solid" color="rgb(225 114 114)" size="s"></box-icon>
                            </span>
                        </a>
                      </td>';
                echo '</tr>';
            }
        } else {
            // Afficher les produits initiaux si aucune recherche
            foreach ($res as $row) {
                echo '<tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700" id="product-' . $row[0] . '">';
                echo '<td class="px-4 py-3">' . $row[0] . '</td>';
                echo '<td class="px-5 py-4"><img src="../images/'.$row[5]. '" alt="image" class="w-12 h-11 rounded"></td>';
                echo '<td class="px-4 py-3">' . $row[6] . '</td>';
                echo '<td class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">'.$row[1].'</td>';
                echo '<td class="px-4 py-3">' . $row[2] . '</td>';
                echo '<td class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">' . $row[3] . ' DTN</td>';
                echo ' <td class="px-14 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">' . $row[4] . '</td>';
                echo '<td class="px-4 py-3">
                <a href="modifForm.php?id=' . $row[0] . '">
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
        }
        ?>
    </tbody>
</table>

</div>
<?php
require_once('../model/produit.class.php');
$prod=new product();
// Appel à la fonction getPaginatedResults pour récupérer les données paginées
$pagination = $prod->getPaginatedResults('products');  // Remplace 'products' par ta table
$data = $pagination['data'];
$total_pages = $pagination['total_pages'];
$current_page = $pagination['current_page'];
$items_per_page = 6;  // Nombre d'éléments par page
$start_item = ($current_page - 1) * $items_per_page + 1;
$end_item = min($current_page * $items_per_page, $total_pages );
?>
<nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
        Showing
        <span class="font-semibold text-gray-900 dark:text-white"><?php echo $start_item;?></span>
        of
        <span class="font-semibold text-gray-900 dark:text-white"><?php echo $total_pages ; ?></span>
    </span>
    <ul class="inline-flex items-stretch -space-x-px">
        <!-- Lien Précédent -->
        <?php if ($current_page > 1): ?>
            <li>
                <a href="?page=<?php echo $current_page - 1; ?>" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        <?php else: ?>
            <li>
                <span class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 text-gray-400">
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            </li>
        <?php endif; ?>
        <!-- Liens vers les pages -->
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li>
                <a href="?page=<?php echo $i; ?>" class="flex bg-rose-50 items-center justify-center px-3 py-2 text-sm leading-tight <?php echo ($i == $current_page) ? 'border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'; ?> ">
                    <?php echo $i; ?>
                </a>
            </li>
        <?php endfor; ?>
        <!-- Lien Suivant -->
        <?php if ($current_page < $total_pages): ?>
            <li>
                <a href="?page=<?php echo $current_page + 1; ?>" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        <?php else: ?>
            <li>
                <span class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 text-gray-400">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            </li>
        <?php endif; ?>
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
  let modal = document.getElementById("modal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");

  // Mettre à jour l'ID du produit dans le bouton de confirmation
  document
    .querySelector('[onclick="Update(this)"]')
    .setAttribute("data-id", productId);
}

function closeModalUpdate() {
  let modal = document.getElementById("modal").classList.add("hidden");

}



function Update(button) {
  let productId = button.getAttribute("data-id");

  fetch(`../controller/modification.php?id=${productId}`, {
    method: "GET",
  })
    .then((response) => response.text())
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
<!-- Modal delete -->
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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


<!-- Modal update product -->

