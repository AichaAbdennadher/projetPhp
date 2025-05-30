<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture Floraison </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../view/affiche12.css">
    

    <style>
        :root {
            --primary: #9b59b6;
            --primary-light: #e8d6f0;
            --dark: #2c3e50;
            --light: #f9f9f9;
            --gray: #95a5a6;
            --success: #2ecc71;
            --border: #e0e0e0;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
        }

        /* En-tête de facture */
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--primary);
        }

        .invoice-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
            margin: 0 0 5px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .invoice-number {
            font-size: 16px;
            color: var(--text-light);
            margin: 0;
        }

        .invoice-meta {
            text-align: right;
        }

        .invoice-date {
            margin: 5px 0;
            color: var(--text);
        }

        .invoice-status {
            display: inline-block;
            padding: 5px 15px;
            background-color: var(--success);
            color: white;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
        }

        /* Section adresse */
        .address-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .address-box {
            flex: 0 0 48%;
            padding: 20px;
            background-color: var(--light);
            border-radius: 6px;
            border-left: 4px solid var(--primary);
        }

        .address-title {
            font-size: 16px;
            color: var(--primary);
            margin-top: 0;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .company-name {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark);
        }

        /* Tableau des produits */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th {
            background-color: var(--primary);
            color: white;
            padding: 12px 15px;
            text-align: left;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }

        tr:last-child td {
            border-bottom: 2px solid var(--primary);
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .discount-badge {
            display: inline-block;
            background-color: var(--secondary);
            color: white;
            font-size: 12px;
            padding: 2px 8px;
            border-radius: 10px;
            margin-left: 8px;
            font-weight: 500;
        }

        /* Totaux */
        .totals {
            width: 300px;
            margin-left: auto;
            margin-bottom: 30px;
        }

        .total-line {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid var(--border);
        }

        .grand-total {
            font-weight: 600;
            font-size: 18px;
            color: var(--primary);
            border-top: 2px solid var(--primary);
            margin-top: 5px;
            padding-top: 12px;
        }

        /* Conditions */
        .terms {
            padding: 20px;
            background-color: var(--light);
            border-radius: 6px;
            font-size: 14px;
            color: var(--text-light);
        }

        .terms strong {
            color: var(--dark);
        }

        /* Effets au survol */
        tr:hover td {
            background-color: rgba(142, 68, 173, 0.05);
        }
    </style>
    
</head>
<body>
<?php include '../view/header2.php'; ?>

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
</html>