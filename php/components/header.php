<?php
delFromCart();
?>
<header>
    <div id="accueil">
        <h1 onclick="goToAccueil()">Kittools</h1>
        <h4>Le meilleur équipement pour votre cuisine</h4>
    </div>
    <div id="search_bar">
        <div class="dropdown">
            <input type="search" placeholder="Rechercher" autocomplete="on">
            <div class="resultBox">
                <!-- here list are inserted from javascript -->
            </div>
        </div>
    </div>
    <div id="icons">
        <div class="dropdown" id="dropdown_cart">
            <div id="cart_icon" onclick="showCart()">
                <i class="fa-solid fa-cart-shopping"></i>
                <p id="cart_count" <?php if (!isset($_SESSION["compte"])) {echo "style='display: none'";}?>></p>
            </div>
            <ul id="cart_items">
                <!-- Items du Panier -->
            </ul>
        </div>
        <i class="fa-solid fa-user" onclick="showProfil()"></i>
    </div>
    <?php
    $sql = "SELECT ItemID, Name FROM item";
    $result = $mysqli->query($sql);
    $suggestions = "";
    $idSuggestions = "";
    while ($row = $result->fetch_assoc()) {
        $suggestions .= '"' . $row["Name"] . '",';
        $idSuggestions .= '"' . $row["ItemID"] . '",';
    }
    echo '<script>const suggestions = [' . $suggestions . ']; const ids = [' . $idSuggestions . '];</script>';
    ?>
    <script src="../js/header.js"></script>
</header>
<?php
if (isset($_SESSION["compte"])) {
    $sql = "SELECT * FROM totalcart WHERE OrderID = '" . $_SESSION['order'] . "'";
    $carts = $mysqli->query($sql);

    $itemsString = "";
    $nb_produit = 0;
    $nb = $carts->num_rows;
    if ($nb == 0) {
        echo '<script>document.querySelector("#cart_items").innerHTML = "<p style=\'width: max-content\'>Aucun item dans le panier</p>"</script>';
    } else {
        while ($row = $carts->fetch_assoc()) {
            $sql = "SELECT * FROM cart WHERE CartID = '" . $row['CartID'] . "'";
            $cartItem = sql($sql);

            $sql = "SELECT * FROM item WHERE ItemID = '" . $cartItem["ItemID"] . "'";
            $itemDetail = sql($sql);

            $nb_produit += $cartItem["Quantity"];
            $itemsString .= "<li class='cart_item' id='" . $itemDetail["ItemID"] . "'><img src='../images/" . $itemDetail["Picture"] . "'><div class='text-container'><p>" . mb_strtoupper($itemDetail["Name"]) . "</p><span>10,99€</span></div><p class='qte_item'>Qte : " . $cartItem["Quantity"] . "</p><i class='fa-solid fa-xmark deleted_button'></i></li>";
        }
        $itemsString .= "<div id='pay_button'><div onclick='goToCart()'><p>Payez</p><i class='fa-solid fa-arrow-right'></i></div></div>";
        echo '<script>document.querySelector("#cart_items").innerHTML = "' . $itemsString . '"</script>';
    }
    echo '<script>document.querySelector("#cart_count").innerHTML = "' . $nb_produit . '"</script>';
} else {
    echo '<script>document.querySelector("#cart_items").innerHTML = "<p style=\'width: max-content\'>Vous n\'êtes pas connecté</p>"</script>';
}
?>
<script>
    const deleted_buttons = document.querySelectorAll(".deleted_button");
    for (let i = 0; i < deleted_buttons.length; i++) {
        deleted_buttons[i].addEventListener("click", function() {
            addParameterToURL("deleted_item", deleted_buttons[i].parentElement.id);
        });
    }
</script>