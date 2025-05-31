<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

<?php
include("aside.php");
require_once ('../controller/session.php');
require_once('../model/orders.class.php');

$prod = new orders();

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 5;
$offset = ($page - 1) * $items_per_page;

// Gestion de la recherche (optionnel, ici juste pour l'exemple, tu peux adapter)
$resu = null;
// if (isset($_POST['search']) && !empty(trim($_POST['search']))) {
//     $searchTerm = trim($_POST['search']);
//     $resu = $prod->searchOrders($searchTerm);
// } else {
    $data = $prod->getPaginatedOrders($items_per_page, $offset);
    
    $total_items = $prod->getTotalOrders();
    $total_pages = ceil($total_items / $items_per_page);
// }
?>

<div class="p-4 sm:ml-64">
   <div class="p-4 ">
      <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center" method="post" action="">
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
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                     <tr>
            <th scope="col" class="px-4 py-3">ID</th>
            <th scope="col" class="px-4 py-3">Order Products</th>
            <th scope="col" class="px-4 py-3">Customer</th>
            <th scope="col" class="px-4 py-3">Total</th>
            <th scope="col" class="px-4 py-3">Invoice</th>
        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resu) {
                            // Résultats de la recherche
                            foreach ($resu as $row) {
                                echo '<tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">';
                                echo '<td class="px-4 py-3">' . htmlspecialchars($row['id']) . '</td>';
                                   // Regrouper les produits par commande
            $groupedOrders = [];
            foreach ($data as $row) {
                $orderId = $row['id'];
                if (!isset($groupedOrders[$orderId])) {
                    $groupedOrders[$orderId] = [];
                }
                $groupedOrders[$orderId][] = $row['product_image'];
            }
foreach ($groupedOrders as $orderId => $images) {
    echo '<tr>';
    echo '<td class="px-5 py-4">' . htmlspecialchars($orderId) . '</td>';
    echo '<td class="px-5 py-4">';
    foreach ($images as $image) {
        echo '<img src="../images/' . htmlspecialchars($image) . '" alt="image" class="w-12 h-11 rounded inline-block mr-2">';
    }
    echo '</td>';
    echo '</tr>';
}                                echo '<td class="px-4 py-3">' . htmlspecialchars($row['email']) . '</td>';
                                echo '<td class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">' . htmlspecialchars($row['total']) . ' TND</td>';
                                echo '<td class="px-4 py-3">' . htmlspecialchars($row['invoice_number']) . '</td>';
                                echo '<td class="px-4 py-3">';
                                echo '<a href="javascript:void(0);" onClick="openModalUpdate(' . (int)$row['id'] . ')">
                                    <span class="relative px-1 py-0.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md">
                                        <box-icon name="edit" color="gray" size="s"></box-icon>
                                    </span>
                                    </a> ';

                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            // Affichage pagination
                            foreach ($data as $row) {
                                echo '<tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700" id="order-' . (int)$row["id"] . '">';
                                echo '<td class="px-4 py-3">' . (int)$row["id"] . '</td>';
                                echo '<td class="px-4 py-4 w-40 h-35">
                                    <div class="flex items-center justify-center h-full bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden">
                                        <img src="../images/' . htmlspecialchars($row["product_image"]) . '" alt="Product image" class="min-w-full min-h-full object-scale-up transform scale-110 rounded-lg border border-gray-200 dark:border-gray-600 shadow-sm">
                                    </div>
                                    </td>';
                                echo '<td class="px-4 py-3">' . htmlspecialchars($row["email"]) . '</td>';
                                echo '<td class="px-4 py-3 font-normal text-gray-900 whitespace-nowrap dark:text-white">' . htmlspecialchars($row["total_amount"]) . ' TND</td>';
 echo '<td class="px-4 py-3"> <box-icon name="file" type="solid" color="#f41c74"></box-icon> </td>';            
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>       
                </table>
            </div>

            <?php if (!$resu): ?>
            <nav class="flex justify-end p-4" aria-label="Table navigation">
                <ul class="inline-flex items-center space-x-2">
                    <!-- Previous -->
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

                    <!-- Current page -->
                    <li>
                        <span class="px-4 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded">
                            <?php echo $page; ?>
                        </span>
                    </li>

                    <!-- Next -->
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
            <?php endif; ?>
        </div>
      </div>
   </div>
</div>


