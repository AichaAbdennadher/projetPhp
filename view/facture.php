
<script src="https://cdn.tailwindcss.com"></script>

<?php
// Simulation de données de produits (en pratique, viendrait d'une base de données)
$products = [
    [
        'id' => 1,
        'name' => 'Produit A',
        'price' => 189.00,
        'tva' => 20
    ],
    [
        'id' => 2,
        'name' => 'Service B',
        'price' => 800.00,
        'tva' => 20
    ],
    [
        'id' => 3,
        'name' => 'Service Premium',
        'price' => 1200.00,
        'tva' => 20
    ]
];

// Produits sélectionnés (simulation - en pratique viendrait du panier)
$selectedProducts = [
    [
        'product_id' => 1,
        'quantity' => 3,
        'discount' => 0
    ],
    [
        'product_id' => 2,
        'quantity' => 1,
        'discount' => 0
    ],
    [
        'product_id' => 2,
        'quantity' => 1,
        'discount' => 10 // 10% de remise
    ]
];

// Calcul des lignes de facture
$invoiceLines = [];
$totalHT = 0;
$totalTVA = 0;

foreach ($selectedProducts as $selected) {
    $product = $products[array_search($selected['product_id'], array_column($products, 'id'))];
    
    $unitPriceHT = $product['price'];
    if ($selected['discount'] > 0) {
        $unitPriceHT = $unitPriceHT * (1 - $selected['discount'] / 100);
    }
    
    $lineHT = $unitPriceHT * $selected['quantity'];
    $lineTVA = $lineHT * ($product['tva'] / 100);
    
    $invoiceLines[] = [
        'name' => $product['name'] . ($selected['discount'] > 0 ? " (Remise {$selected['discount']}%)" : ""),
        'quantity' => $selected['quantity'],
        'unit_price' => $unitPriceHT,
        'total_ht' => $lineHT,
        'tva_rate' => $product['tva'],
        'tva_amount' => $lineTVA
    ];
    
    $totalHT += $lineHT;
    $totalTVA += $lineTVA;
}

$totalTTC = $totalHT + $totalTVA;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture N°1407</title>
    <style>
        :root {
            --primary-color: #e83e8c;
            --primary-dark: #c2185b;
            --primary-light: #f8bbd0;
            --secondary-color: #6c757d;
            --light-bg: #fff5f7;
            --border-color: #fce4ec;
            --text-color: #333333;
        }

        body {
            font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: white;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--primary-light);
        }

        .invoice-title {
            color: var(--primary-dark);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .address-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .address-box {
            width: 48%;
            padding: 20px;
            background-color: var(--light-bg);
            border-radius: 8px;
            border-left: 4px solid var(--primary-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }

        th {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid var(--border-color);
        }

        tr:nth-child(even) {
            background-color: var(--light-bg);
        }

        .text-right {
            text-align: right;
        }

        .totals {
            margin-top: 30px;
            float: right;
            width: 300px;
        }

        .total-line {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .grand-total {
            font-weight: bold;
            font-size: 1.2em;
            color: var(--primary-dark);
            border-top: 2px solid var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            margin-top: 10px;
        }

        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
            font-size: 0.9em;
            color: var(--secondary-color);
            text-align: center;
        }

        .highlight {
            color: var(--primary-dark);
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="invoice-header">
        <div>
        <img src="../images/mark.png" alt="" class="w-16 h-16">
            <h1 class="invoice-title">INVOICE</h1>

        </div>
        <div>
        <h2 class="text-pink-600 font-bold">Glow & Glam</h2>
<h2 class="text-pink-600 font-bold"> Tunisia, Sfax, Route Skiet Ezzit</h2>
<h2 class="text-pink-600 font-bold"> Phone:  20964601</h2>
<br>
           <?php
function afficherDate() {
    return date('d/m/Y'); // Format: jour/mois/année
}

// Utilisation de la fonction
echo "<h3><span class='highlight'>Date de facture:</span> " . afficherDate() . "</h3>";
?> 
        </div>
    </div>
        <div>
             
  

          </div>
    </div>

    <div class="address-section">
        <div class="address-box">
            <p><strong>Customer : </strong></p>
            <p>123 Rue des Clients</p>
            <p>75001 Paris</p>
            <p>SIRET: 12345678900012</p>
            <p>No de TVA: FR00123456789</p>
        </div>

        <div >
  
       
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>DÉSIGNATION</th>
                <th class="text-right">QUANTITÉ</th>
                <th class="text-right">PRIX UNITAIRE HT</th>
                <th class="text-right">TOTAL HT</th>
                <th class="text-right">TVA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoiceLines as $line): ?>
            <tr>
                <td><?= htmlspecialchars($line['name']) ?></td>
                <td class="text-right"><?= $line['quantity'] ?></td>
                <td class="text-right"><?= number_format($line['unit_price'], 2, ',', ' ') ?> €</td>
                <td class="text-right"><?= number_format($line['total_ht'], 2, ',', ' ') ?> €</td>
                <td class="text-right"><?= number_format($line['tva_amount'], 2, ',', ' ') ?> € (<?= $line['tva_rate'] ?>%)</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="totals">
        <div class="total-line">
            <span>TOTAL HT</span>
            <span><?= number_format($totalHT, 2, ',', ' ') ?> €</span>
        </div>
        <div class="total-line">
            <span>TVA</span>
            <span><?= number_format($totalTVA, 2, ',', ' ') ?> €</span>
        </div>
        <div class="total-line grand-total">
            <span>Total TTC</span>
            <span><?= number_format($totalTTC, 2, ',', ' ') ?> €</span>
        </div>
    </div>
    <div style="clear: both;"></div>

    <div class="footer">
        <p>Merci pour votre confiance - Paiement à effectuer avant le 11/02/2024</p>
        <p>En cas de retard de paiement, des pénalités de 3 fois le taux d'intérêt légal seront appliquées</p>
    </div>
</body>
</html>