<?php
function addToCart()
{
    if (isset($_GET["cart_id"])) {
        if (isset($_SESSION["compte"])) {
            $sql = "SELECT * FROM `cart` WHERE `CustomerID` = " . $_SESSION["compte"] . " AND `ItemID` = " . $_GET["cart_id"];
            $result = sql($sql);
            if ($result) {
                // Si le produit est déjà dans le panier, on incrémente la quantité
                $sql = "UPDATE `cart` SET `Quantity` = `Quantity` + 1 WHERE `CustomerID` = " . $_SESSION["compte"] . " AND `ItemID` = " . $_GET["cart_id"];
                insert($sql);
            } else {
                // Sinon on l'ajoute au panier
                $sql = "INSERT INTO `cart`(`CustomerID`, `ItemID`, `Quantity`) VALUES (" . $_SESSION["compte"] . "," . $_GET["cart_id"] . ",1)";
                insert($sql);
            }
        } else {
            $_SESSION["error_cart_message"] = "Vous devez être connecté pour ajouter un produit au panier.";
        }

        removeURLParameter("cart_id");
        exit();
    }
}

function delFromCart()
{
    if (isset($_GET["deleted_item"])) {
        $sql = "DELETE FROM cart WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["deleted_item"] . "'";
        insert($sql);

        removeURLParameter("deleted_item");
        exit();
    }
}

function minusQuantity() {
    if (isset($_GET["minus_item"])) {
        $sql = "SELECT Quantity FROM cart WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["minus_item"] . "'";
        $result = sql($sql);
        if ($result["Quantity"] > 1) {
            $sql = "UPDATE cart SET Quantity = Quantity - 1 WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["minus_item"] . "'";
            insert($sql);
        }

        removeURLParameter("minus_item");
        exit();
    }
}

function plusQuantity() {
    if (isset($_GET["plus_item"])) {
        $sql = "UPDATE cart SET Quantity = Quantity + 1 WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["plus_item"] . "'";
        insert($sql);

        removeURLParameter("plus_item");
        exit();
    }
}