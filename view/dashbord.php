<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="d-flex min-vh-100">
 <?php
     include("aside.php");
    
require_once ('../controller/session.php');

require_once('../model/orders.class.php');
$prod=new orders();
$res=$prod->nbreClientsAvecCommandes();
$nbre=$prod->getTotalOrders();
$bestCustomers=$prod->getBestCustomers($limit = 10);
require_once('../model/produit.class.php');
$prod = new product();
$total_items = $prod->getTotalProducts();

?>
    <!-- Main -->
    <main class="flex-grow-1 p-4">
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-4">
      <!-- Carte 1 -->
<div class="p-4 sm:w-1/3 w-full">
  <div class="h-full border-b pb-6 flex flex-col items-center text-center bg-white shadow rounded-lg">
    <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-pink-100 text-pink-500 mb-4">
      <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
        <circle cx="12" cy="7" r="4"></circle>
      </svg>
    </div>

    <h2 class="text-gray-900 text-3xl font-semibold mb-2"><?php echo $res; ?></h2>
    <p class="leading-relaxed text-base text-gray-600">Customers</p>

    <a href="customers.php" class="mt-3 text-pink-500 inline-flex items-center">Learn More
      <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </a>
  </div>
</div>
  <!-- Carte 2 -->
      <div class="p-4 sm:w-1/3 w-full">
        <div class="h-full border-b pb-6 flex flex-col items-center text-center">
          <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-pink-100 text-pink-500 mb-4">
 <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                  <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
               </svg>              <circle cx="6" cy="6" r="3"></circle>
              <circle cx="6" cy="18" r="3"></circle>
              <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
            </svg>
          </div>
          <div>
            <h2 class="text-gray-900 text-lg font-medium mb-2"><?php echo $total_items; ?></h2>
            <p class="leading-relaxed text-base">Products</p>
            <a href="listProduit.php" class="mt-3 text-pink-500 inline-flex items-center">Learn More
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Carte 3 -->
      <div class="p-4 sm:w-1/3 w-full">
        <div class="h-full border-b pb-6 flex flex-col items-center text-center">
          <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-pink-100 text-pink-500 mb-4">
<svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                  <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
               </svg>            <circle cx="6" cy="6" r="3"></circle>
              <circle cx="6" cy="18" r="3"></circle>
              <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
            </svg>
          </div>
       <div>
            <h2 class="text-gray-900 text-lg font-medium mb-2"><?php echo $nbre; ?></h2>
            <p class="leading-relaxed text-base">Orders</p>
            <a href="listOrders.php" class="mt-3 text-pink-500 inline-flex items-center">Learn More
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
      <div class="mt-4 bg-white p-3 rounded shadow-sm">
        <h5><i class="bi bi-people-fill me-2"></i>Best sellers</h5>
        <table class="table table-hover mt-3">
          <thead>
            <tr>
              <th>Number</th>
              <th>Email</th>
              <th>Number of orders</th>
              <th>total amount</th>
            </tr>
          </thead>
          <tbody>
          <?php
              
          $number = 1;

    foreach ($bestCustomers as $customer) {
        echo "<tr>";
        echo "<td>" . $number++ . "</td>";
        echo "<td>" . htmlspecialchars($customer['email']) . "</td>";
        echo "<td>" . $customer['total_orders'] . "</td>";
        echo "<td>" . number_format($customer['total_spent'], 2) . " TND</td>";
        echo "</tr>";
    }
    ?>
  </tbody>
          </tbody>
        </table>
      </div>

   
    </main>
  </div>
</body>


</html>

