<?php
include "../php/core.php";
include "../php/functions.php";
?>
<html lang="fr">

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
<?php
if (isset($_SESSION["compte"])) {
    $sql = "SELECT * FROM cart WHERE CustomerID = '" . $_SESSION['compte'] . "'";
    $result = $mysqli->query($sql);
    $itemsString = "";
    $total_articles = 0;
    echo '<script>document.querySelector("#cart_count").innerHTML = "' . $result->num_rows . '"</script>';
    $nb = $result->num_rows;
    $i = 0;
    if ($nb == 0) {
        echo '<script>document.querySelector("#articles").innerHTML = "<p>Aucun item dans le panier</p>"</script>';
    } else {
        while ($row = $result->fetch_assoc()) {
            $sql = "SELECT * FROM item WHERE ItemID = '" . $row["ItemID"] . "'";
            $result2 = sql($sql);
            $itemsString .= "<div style= 'display: flex; justify-content: center;grid-column:" . ($i%2 + 1) . "; grid-row:" . (floor($i/2) + 1) . ";'><li class='article' id='" . $result2["ItemID"] . "'><img src='../images/" . $result2["Picture"] . "'><p>" . strtoupper($result2["Name"]) . "<br>" . $result2["Price"] . " €</p><div class='qte_article'><p>Quantité:</p><div class='qte_article_nb'><i class='fa-solid fa-minus'></i><p>" . $row["Quantity"] . "</p><i class='fa-solid fa-plus'></i></div></div><p class='total_price'>Prix total:<br>" . ($result2["Price"] * $row["Quantity"]) . "€</p><i class='fa-solid fa-xmark'></i></li></div>";
            $i++;
            $total_articles += $result2["Price"] * $row["Quantity"];
        }
        echo '<script>document.querySelector("#articles").innerHTML = "' . $itemsString . '"</script>';
        echo '<script>document.querySelector("#total_price_items").innerHTML = "Total : ' . $total_articles . ' €"</script>';
    }
} else {
    echo '<script>document.querySelector("#articles").innerHTML = "<p>Vous n\'êtes pas connecté</p>"</p>"</script>';
}
?>
</html>