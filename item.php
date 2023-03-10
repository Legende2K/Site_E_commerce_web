<?php
include "php/core.php";
include "php/functions.php";
addToCart();
if (isset($_SESSION["error_cart_message"])) {
    echo "<script>alert('" . $_SESSION["error_cart_message"] . "')</script>";
    unset($_SESSION["error_cart_message"]);
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM item WHERE ItemID = $id";
    $item = sql($sql);
} else {
    header("Location: index.php");
}
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/item.css">
    <script src="../js/starRate.js"></script>
    <title>Kittools</title>
</head>

<body>
    <?php include "php/components/header.php"; ?>
    <main>
        <div class=itemContainer>
            <img class=itemPicture src="images\<?= $item['Picture'] ?>" />
            <div class=itemInfos>
                <h2 class="itemName"><?= $item['Name'] ?></h2>
                <h3 class="itemPrice">Prix : <?= $item['Price'] ?> €</h3>
                <div class="itemStarRate"></div>
                <div class="itemDescription"><?= $item['Description'] ?></div>
                <h4 class="addItemCart">Ajouter au panier</h4>
                <div class="itemStock">Stock restant: <?= $item['Quantity'] ?></div>
            </div>
        </div>
    </main>
    <script>
        document.querySelector(".itemStarRate").innerHTML = pushStars(<?= $item['StarRate'] ?>);
    </script>
    <?php include "php/components/footer.php"; ?>
</body>
<script>
    const buttonAddToCart = document.querySelector(".addItemCart");
    <?php
    if ($item['Quantity'] > 0) {?>
        buttonAddToCart.addEventListener("click", () => {
            window.location.href = window.location.href + "&cart_id=" + <?php echo $_GET["id"] ?>
        });
    <?php } else { ?>
        buttonAddToCart.classList.add("disabled");
    <?php } ?>
</script>
</html>