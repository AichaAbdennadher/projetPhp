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

$data = $prod->getPaginatedOrders($items_per_page, $offset);
$total_items = $prod->getTotalOrders();
$total_pages = ceil($total_items / $items_per_page);
?>

<div class="p-4 sm:ml-64">
   <div class="p-4 ">
      <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <!-- Recherche désactivée, tu peux la réactiver ici -->
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

                        // Affichage des commandes
                        foreach ($groupedOrders as $orderId => $info) {
                            echo '<tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">';
                            echo '<td class="px-4 py-3 font-semibold text-gray-800 dark:text-white">' . htmlspecialchars($orderId) . '</td>';

                            // Affiche toutes les images dans une cellule
                            echo '<td class="px-4 py-3">';
                            foreach ($info['images'] as $img) {
                                echo '<img src="../images/' . htmlspecialchars($img) . '" alt="Produit" class="w-12 h-12 inline-block mr-2 rounded shadow">';
                            }
                            echo '</td>';

                            echo '<td class="px-4 py-3">' . htmlspecialchars($info['email']) . '</td>';
                            echo '<td class="px-4 py-3">' . htmlspecialchars($info['total']) . ' TND</td>';
                         echo '<td class="px-4 py-3">
        <a href="#" onclick="openInvoicePopup(\'' . htmlspecialchars($orderId) . '\')" title="Afficher la facture" class="cursor-pointer">
            <box-icon name="file" type="solid" color="#f41c74"></box-icon>
        </a>
      </td>';

                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
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
        </div>
      </div>
   </div>
</div>

<!-- Popup facture -->
<div id="invoicePopup" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50">
  <div class="flex items-center justify-center min-h-screen p-4 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
            <div class="flex justify-between items-center">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Facture</h3>
              <button onclick="closeInvoicePopup()" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                <box-icon name='x' color='gray' animation='burst' ></box-icon>
              </button>
            </div>
            <div id="invoiceContent" class="mt-2 max-h-[600px] overflow-y-auto text-sm text-gray-700">
    <div class="invoice-container bg-white p-6 rounded-lg">
        <style>
            .invoice-container {
                font-family: Arial, sans-serif;
                max-width: 800px;
                margin: 0 auto;
                color: #333;
            }
            .header {
                display: flex;
                justify-content: space-between;
                margin-bottom: 30px;
            }
            .company-info, .client-info {
                flex: 1;
            }
            h1 {
                text-align: center;
                color: #2d3748;
                margin-bottom: 30px;
                font-size: 24px;
            }
            .invoice-info {
                margin-bottom: 20px;
                text-align: right;
            }
            .facture-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 30px;
            }
            .facture-table th, .facture-table td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }
            .facture-table th {
                background-color: #f7fafc;
                font-weight: bold;
            }
            .facture-table tfoot td {
                font-weight: bold;
                background-color: #f7fafc;
            }
            .facture-image {
                width: 50px;
                height: 50px;
                object-fit: cover;
                border-radius: 4px;
            }
            .signature {
                margin-top: 50px;
                text-align: right;
            }
            .footer {
                margin-top: 50px;
                text-align: center;
                font-size: 12px;
                color: #718096;
            }
        </style>
        
        <?php
        // Récupérer les données de la commande
        $orders = new orders();
        $order_items = new order_items();
        
        $order_id = isset($_GET['invoice_id']) ? (int)$_GET['invoice_id'] : 0;
        $order = $orders->getOrderById($order_id);
        
        if ($order):
            $items = $order_items->getItemsByOrderId($order_id);
            $total_ht = 0;
            foreach ($items as $item) {
                $total_ht += $item['price'] * $item['quantity'];
            }
            $tva_rate = 0.10;
            $tva = $total_ht * $tva_rate;
            $total_ttc = $total_ht + $tva;
            
            $company_info = [
                'name' => 'FLORAISON',
                'address' => 'Hadi Chaker Street, Sfax',
                'city' => 'Sfax, Tunisia',
                'phone' => '+216 12 345 678',
                'email' => 'contact@floraison.com'
            ];
        ?>
        
        <div class="header">
            <div class="company-info">
                <h3><?= htmlspecialchars($company_info['name']) ?></h3>
                <p><?= htmlspecialchars($company_info['address']) ?></p>
                <p><?= htmlspecialchars($company_info['city']) ?></p>
                <p>Tél: <?= htmlspecialchars($company_info['phone']) ?></p>
                <p>Email: <?= htmlspecialchars($company_info['email']) ?></p>
            </div>
            
            <div class="client-info">
                <h3>Billed to</h3>
                <p><?= htmlspecialchars($order['email']) ?></p>
            </div>
        </div>

        <h1>FACTURE N°<?= htmlspecialchars($order_id) ?></h1>
        
        <div class="invoice-info">
            <p><strong>Invoice date:</strong> <?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></p>
        </div>
        
        <table class="facture-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Picture</th>
                    <th>Unit price excluding VAT</th>
                    <th>Quantity</th>
                    <th>Total HT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['product_name']) ?></td>
                        <td><img src="../images/<?= htmlspecialchars($item['product_image']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" class="facture-image"></td>
                        <td><?= number_format($item['price'], 2, ',', ' ') ?> TND</td>
                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                        <td><?= number_format($item['price'] * $item['quantity'], 2, ',', ' ') ?> TND</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align:right;"><strong>Total HT:</strong></td>
                    <td><strong><?= number_format($total_ht, 2, ',', ' ') ?> TND</strong></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><strong>TVA (<?= ($tva_rate*100) ?>%):</strong></td>
                    <td><strong><?= number_format($tva, 2, ',', ' ') ?> TND</strong></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right;"><strong>Total TTC:</strong></td>
                    <td><strong><?= number_format($total_ttc, 2, ',', ' ') ?> TND</strong></td>
                </tr>
            </tfoot>
        </table>
        
        <div class="signature">
            <p>Done at Sfax, on <?= date('d/m/Y', strtotime($order['order_date'])) ?></p>
            <p>Signature</p>
        </div>
        
        <div class="footer">
            <p>© <?= date('Y') ?> Floraison - All rights reserved</p>
        </div>
        
        <?php else: ?>
            <div class="text-center py-8 text-red-500">
                <p>Invoice not found or invalid order ID</p>
            </div>
        <?php endif; ?>
    </div>
</div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button onclick="printInvoice()" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-pink-600 text-base font-medium text-white hover:bg-pink-700 sm:ml-3 sm:w-auto sm:text-sm">
          Imprimer
        </button>
        <button onclick="closeInvoicePopup()" class="mt-3 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Fermer
        </button>
      </div>
    </div>
  </div>
</div>






<script>
function openInvoicePopup(orderId) {
   document.getElementById('invoicePopup').classList.remove('hidden');
   
}

function closeInvoicePopup() {
    document.getElementById('invoicePopup').classList.add('hidden');
    document.getElementById('invoiceContent').innerHTML = '';
}

function printInvoice() {
    let content = document.getElementById('invoiceContent').innerHTML;
    let printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write('<html><head><title>Imprimer Facture</title>');
    printWindow.document.write('<script src="https://cdn.tailwindcss.com"><\/script>');
    printWindow.document.write('</head><body class="p-6 bg-white text-gray-800">');
    printWindow.document.write(content);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    printWindow.close();
}
</script>