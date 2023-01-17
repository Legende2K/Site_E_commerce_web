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
                <p id="cart_count"></p>
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
    $sql = "SELECT * FROM cart WHERE CustomerID = '" . $_SESSION['compte'] . "'";
    $result = $mysqli->query($sql);
    $itemsString = "";
    echo '<script>document.querySelector("#cart_count").innerHTML = "' . $result->num_rows . '"</script>';
    while ($row = $result->fetch_assoc()) {
        $sql = "SELECT * FROM item WHERE ItemID = '" . $row["ItemID"] . "'";
        $result2 = sql($sql);
        $itemsString .= "<li class='cart_item' id='" . $result2["Name"] . "'><img src='../images/" . $result2["Picture"] . "'><p>" . strtoupper($result2["Name"]) . "<br><span style='font-size: 12'>10,99€</span></p><p class='qte_item'>Qte : " . $row["Quantity"] . "</p><i class='fa-solid fa-xmark'></i></li>";
    }
    $itemsString .= "<div id='pay_button' onclick='goToCart()'><p>Payez</p><i class='fa-solid fa-arrow-right'></i></div>";
    echo '<script>document.querySelector("#cart_items").innerHTML = "' . $itemsString . '"</script>';
} else {
    echo '<script>document.querySelector("#cart_items").innerHTML = "<p style=\'width: max-content\'>Aucun item dans le panier</p>"</script>';
}
?>