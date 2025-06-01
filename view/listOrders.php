<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

<?php
include("aside.php");
require_once ('../controller/session.php');
require_once('../model/orders.class.php');

$prod = new orders();

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 10;
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
        // Regrouper les produits par commande
        $groupedOrders = [];
        foreach ($data as $row) {
            $orderId = $row['id'];
            if (!isset($groupedOrders[$orderId])) {
                $groupedOrders[$orderId] = [
                    'images' => [],
                    'email' => $row['email'],
                    'total' => $row['total_amount'],
                    'invoice_number' => $row['invoice_number'] ?? '',
                ];
            }
            $groupedOrders[$orderId]['images'][] = $row['product_image'];
        }

        // Affichage des lignes du tableau
        foreach ($groupedOrders as $orderId => $info) {
            echo '<tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">';
            echo '<td class="px-4 py-3 font-semibold text-gray-800 dark:text-white">' . htmlspecialchars($orderId) . '</td>';

            // Toutes les images dans UNE seule cellule
            echo '<td class="px-4 py-3">';
            foreach ($info['images'] as $img) {
                echo '<img src="../images/' . htmlspecialchars($img) . '" alt="Produit" class="w-12 h-12 inline-block mr-2 rounded shadow">';
            }
            echo '</td>';

            echo '<td class="px-4 py-3">' . htmlspecialchars($info['email']) . '</td>';
            echo '<td class="px-4 py-3">' . htmlspecialchars($info['total']) . ' TND</td>';
echo '<td class="px-4 py-3">
    <a href="#" onclick="openInvoicePopup(' . $orderId . ')" title="Afficher la facture">
        <box-icon name="file" type="solid" color="#f41c74"></box-icon>
    </a>
</td>';

            echo '</tr>';
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
<div id="invoiceModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:1000; overflow:auto;">
    <div style="background:white; margin:5% auto; padding:20px; width:95%; max-width:1000px; border-radius:10px; position:relative;">
        <button onclick="closeInvoiceModal()" style="position:absolute; top:10px; right:15px; background:red; color:white; border:none; border-radius:50%; width:30px; height:30px;">&times;</button>

        <!-- 🌸 Ton contenu de facture ici (copié tel quel) -->
        <div class="container">
        <body>
    <div class="container">
        <div class="invoice-header">
            <div>
                <h1 class="invoice-title">FACTURE</h1>
                <p class="invoice-number">N° FL-2024-1407</p>
            </div>
            <div class="invoice-meta">
                <p class="invoice-date"><strong>Date :</strong> 28/01/2024</p>
                <p class="invoice-date"><strong>Échéance :</strong> 11/02/2024</p>
                <span class="invoice-status">PAYÉ</span>
            </div>
        </div>

        <div class="address-section">
            <div class="address-box">
                <h3 class="address-title">CLIENT</h3>
                <div>
                    <p class="company-name">Client Entreprise</p>
                    <p>123 Rue des Clients</p>
                    <p>75001 Paris, France</p>
                    <p><strong>Tél :</strong> +33 1 23 45 67 89</p>
                    <p><strong>Email :</strong> contact@client.com</p>
                </div>
            </div>

            <div class="address-box">
                <h3 class="address-title">FLORAISON</h3>
                <div>
                    <p class="company-name">Floraison Natural Beauty</p>
                    <p>456 Avenue des Fournisseurs</p>
                    <p>69002 Lyon, France</p>
                    <p><strong>Tél :</strong> +33 4 12 34 56 78</p>
                    <p><strong>Email :</strong> facturation@floraison.com</p>
                </div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th class="text-center">Qté</th>
                    <th class="text-right">Prix HT</th>
                    <th class="text-right">Remise</th>
                    <th class="text-right">Total HT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Crème hydratante bio
                    </td>
                    <td class="text-center">2</td>
                    <td class="text-right">24,90 €</td>
                    <td class="text-right">-</td>
                    <td class="text-right">49,80 €</td>
                </tr>
                <tr>
                    <td>
                        Pack découverte <span class="discount-badge">REMISE</span>
                    </td>
                    <td class="text-center">1</td>
                    <td class="text-right">59,90 €</td>
                    <td class="text-right">10%</td>
                    <td class="text-right">53,91 €</td>
                </tr>
            </tbody>
        </table>

        <div class="totals">
            <div class="total-line">
                <span>Total HT</span>
                <span>103,71 €</span>
            </div>
            <div class="total-line">
                <span>TVA (20%)</span>
                <span>20,74 €</span>
            </div>
            <div class="total-line grand-total">
                <span>Total TTC</span>
                <span>124,45 €</span>
            </div>
        </div>

        <div class="terms">
            <p><strong>Conditions :</strong> Paiement à réception - TVA 20%</p>
            <p>En cas de retard, pénalités conformes à l'article L. 441-6 du code de commerce.</p>
        </div>
    </div>


    <?php include '../view/footer.php'; ?>
</body>
        </div>
    </div>
</div>
<script>
    function openInvoiceModal() {
        document.getElementById('invoiceModal').style.display = 'block';
    }

    function closeInvoiceModal() {
        document.getElementById('invoiceModal').style.display = 'none';
    }
</script>




