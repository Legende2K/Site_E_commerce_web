<?php
function addToCart()
{
    if (isset($_GET["cart_id"])) {
        if (isset($_SESSION["compte"])) {
            //verif si le stock est suffisant
            $sql = "SELECT Quantity FROM item WHERE ItemID = " . $_GET["cart_id"];
            $result = sql($sql);
            if ($result["Quantity"] < 1) {
                removeURLParameter("cart_id");
                exit();
            }
            // On enlève un au stock
            $sql = "UPDATE `item` SET `Quantity` = `Quantity` - 1 WHERE `ItemID` = " . $_GET["cart_id"];
            insert($sql);

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
        //recuperer la quantité du produit
        $sql = "SELECT Quantity FROM cart WHERE CustomerID = " . $_SESSION["compte"] . " AND ItemID = " . $_GET["deleted_item"];
        $result = sql($sql);

        //remettre le stock à jour
        $sql = "UPDATE `item` SET `Quantity` = `Quantity` + " . $result["Quantity"] . " WHERE `ItemID` = " . $_GET["deleted_item"];
        insert($sql);

        //supprimer le produit du panier
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
            // On ajoute un au stock
            $sql = "UPDATE item SET Quantity = Quantity + 1 WHERE ItemID = '" . $_GET["minus_item"] . "'";
            insert($sql);

            // On enlève un au panier
            $sql = "UPDATE cart SET Quantity = Quantity - 1 WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["minus_item"] . "'";
            insert($sql);
        }

        removeURLParameter("minus_item");
        exit();
    }
}

function plusQuantity() {
    if (isset($_GET["plus_item"])) {
        // On enlève un au stock
        $sql = "UPDATE item SET Quantity = Quantity - 1 WHERE ItemID = '" . $_GET["plus_item"] . "'";
        insert($sql);

        // On ajoute un au panier
        $sql = "UPDATE cart SET Quantity = Quantity + 1 WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["plus_item"] . "'";
        insert($sql);

        removeURLParameter("plus_item");
        exit();
    }
}