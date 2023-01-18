<?php
if (isset($_GET["deleted_item"])) {
    $sql = "DELETE FROM cart WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["deleted_item"] . "'";
    insert($sql);

    $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url_parts = parse_url($current_url);
    $params = array();
    parse_str($url_parts['query'], $params);
    unset($params['deleted_item']);

    $query = http_build_query($params);
    $new_url = $url_parts['scheme'] . "://" . $url_parts['host'] . $url_parts['path'];
    if ($query) $new_url .= "?" . $query;
    header("Location: " . $new_url);
    exit();
}
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
    $sql = "SELECT * FROM cart WHERE CustomerID = '" . $_SESSION['compte'] . "'";
    $result = $mysqli->query($sql);
    $itemsString = "";
    echo '<script>document.querySelector("#cart_count").innerHTML = "' . $result->num_rows . '"</script>';
    $nb = $result->num_rows;
    if ($nb == 0) {
        echo '<script>document.querySelector("#cart_items").innerHTML = "<p style=\'width: max-content\'>Aucun item dans le panier</p>"</script>';
    } else {
        while ($row = $result->fetch_assoc()) {
            $sql = "SELECT * FROM item WHERE ItemID = '" . $row["ItemID"] . "'";
            $result2 = sql($sql);
            $itemsString .= "<li class='cart_item' id='" . $result2["ItemID"] . "'><img src='../images/" . $result2["Picture"] . "'><div class='text-container'><p>" . strtoupper($result2["Name"]) . "</p><span>10,99€</span></div><p class='qte_item'>Qte : " . $row["Quantity"] . "</p><i class='fa-solid fa-xmark deleted_button'></i></li>";
        }
        $itemsString .= "<div id='pay_button'><div onclick='goToCart()'><p>Payez</p><i class='fa-solid fa-arrow-right'></i></div></div>";
        echo '<script>document.querySelector("#cart_items").innerHTML = "' . $itemsString . '"</script>';
    }
} else {
    echo '<script>document.querySelector("#cart_items").innerHTML = "<p style=\'width: max-content\'>Vous n\'êtes pas connecté</p>"</script>';
}
?>
<script>
    const deleted_buttons = document.querySelectorAll(".deleted_button");
    for (let i = 0; i < deleted_buttons.length; i++) {
        deleted_buttons[i].addEventListener("click", function() {
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);
            params.set("deleted_item", deleted_buttons[i].parentElement.id);
            url.search = params;
            window.location.href = url;
        });
    }
</script>