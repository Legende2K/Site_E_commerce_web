<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/cart.css">
    <title>Panier - Site E-Commerce</title>
</head>

<body>
    <?php include "../php/components/header.php"; ?>
    <main>
        <div id="progress-bar">
            <div id="progress"></div>
            <div id="steps">
                <div class="step active" id="step-1">
                    <p>1</p>
                    <p>Panier</p>
                </div>
                <div class="step" id="step-2">
                    <p>2</p>
                    <p>Livraison</p>
                </div>
                <div class="step" id="step-3">
                    <p>3</p>
                    <p>Paiement</p>
                </div>
            </div>
        </div>


        <div id="articles">
            <!-- recap des articles -->
        </div>
        <div id="total_price_items">
            <p>Total : 65,94 €</p>
        </div>
        <div id="paiement" onclick="goToPaiement()">
            <p>Passez la commande</p>
        </div>
    </main>
    <?php include "../php/components/footer.php"; ?>
    <script src="../js/cart.js"></script>
</body>

</html>