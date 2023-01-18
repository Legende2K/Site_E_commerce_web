<?php
include "../php/core.php";
include "../php/functions.php";
minusQuantity();
plusQuantity();
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
        <div id="progress_bar">
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
        echo '<script>document.querySelector("main").innerHTML = "<div id=\'progress_bar\'>" + document.querySelector("#progress_bar").innerHTML + "</div><div><p>Aucun item dans le panier</p></div>"</script>';
    } else {
        while ($row = $result->fetch_assoc()) {
            $sql = "SELECT * FROM item WHERE ItemID = '" . $row["ItemID"] . "'";
            $result2 = sql($sql);
            $itemsString .= "<div style= 'display: flex; justify-content: center;grid-column:" . ($i%2 + 1) . "; grid-row:" . (floor($i/2) + 1) . ";'><li class='article' id='" . $result2["ItemID"] . "'><img src='../images/" . $result2["Picture"] . "'><p>" . mb_strtoupper($result2["Name"]) . "<br>" . $result2["Price"] . " €</p><div class='qte_article'><p>Quantité:</p><div class='qte_article_nb'><i class='fa-solid fa-minus'></i><p>" . $row["Quantity"] . "</p><i class='fa-solid fa-plus'></i></div></div><p class='total_price'>Prix total:<br>" . ($result2["Price"] * $row["Quantity"]) . "€</p><i class='fa-solid fa-xmark'></i></li></div>";
            $i++;
            $total_articles += $result2["Price"] * $row["Quantity"];
        }
        echo '<script>document.querySelector("#articles").innerHTML = "' . $itemsString . '"</script>';
        echo '<script>document.querySelector("#total_price_items").innerHTML = "Total : ' . $total_articles . ' €"</script>';
    }
} else {
    echo '<script>document.querySelector("#articles").innerHTML = "<p>Vous n\'êtes pas connecté</p>"</p>"; document.getElementById("paiement").disabled = true;</script>';
    echo '<script>document.getElementById("paiement").disabled = true</script>';
}
?>
<script>
    const deleted_buttons2 = document.querySelectorAll(".fa-xmark");
    for (let i = 0; i < deleted_buttons2.length; i++) {
        deleted_buttons2[i].addEventListener("click", function() {
            addParameterToURL("deleted_item", deleted_buttons2[i].parentElement.id);
        });
    }

    const plus_buttons = document.querySelectorAll(".fa-plus");
    for (let i = 0; i < plus_buttons.length; i++) {
        plus_buttons[i].addEventListener("click", function() {
            addParameterToURL("plus_item", plus_buttons[i].parentElement.parentElement.parentElement.id);
        });
    }

    const minus_buttons = document.querySelectorAll(".fa-minus");
    for (let i = 0; i < minus_buttons.length; i++) {
        minus_buttons[i].addEventListener("click", function() {
            addParameterToURL("minus_item", minus_buttons[i].parentElement.parentElement.parentElement.id);
        });
    }
</script>
</html>