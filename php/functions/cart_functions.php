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

            global $mysqli;
            $sql = "SELECT COUNT(*) FROM totalcart INNER JOIN cart ON totalcart.CartID = cart.CartID INNER JOIN orders ON totalcart.OrderID = orders.OrderID INNER JOIN item ON cart.ItemID = item.ItemID WHERE orders.OrderID = ".$_SESSION["order"]." AND item.ItemID = ".$_GET["cart_id"];
            $result = sqlCount($sql);
            if ($result > 0) {
                // Si le produit est déjà dans le panier, on incrémente la quantité
                $sql = "UPDATE `cart` SET `Quantity` = `Quantity` + 1 WHERE `CustomerID` = " . $_SESSION["compte"] . " AND `ItemID` = " . $_GET["cart_id"] . " AND CartID IN (SELECT CartID FROM totalcart WHERE OrderID = ".$_SESSION["order"].")";
                insert($sql);
            } else {
                // Sinon on l'ajoute au panier
                $sql = "INSERT INTO `cart`(`CustomerID`, `ItemID`, `Quantity`) VALUES (" . $_SESSION["compte"] . "," . $_GET["cart_id"] . ",1)";
                insert($sql);
                $cart_id = $mysqli -> insert_id;

                // On ajoute le produit-panier à la commmande
                $sql = "INSERT INTO `totalcart`(`OrderID`, `CartID`) VALUES (" . $_SESSION["order"] . "," . $cart_id . ")";
                insert($sql);
            }

            // On enlève un au stock
            $sql = "UPDATE `item` SET `Quantity` = `Quantity` - 1 WHERE `ItemID` = " . $_GET["cart_id"];
            insert($sql);
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
        $sql = "SELECT Quantity FROM cart INNER JOIN totalcart ON cart.CartID = totalcart.CartID INNER JOIN orders ON totalcart.OrderID = orders.OrderID WHERE orders.OrderID = ".$_SESSION["order"]." AND cart.CustomerID = " . $_SESSION["compte"] . " AND cart.ItemID = " . $_GET["deleted_item"];
        $result = sql($sql);

        //remettre le stock à jour
        $sql = "UPDATE `item` SET `Quantity` = `Quantity` + " . $result["Quantity"] . " WHERE `ItemID` = " . $_GET["deleted_item"];
        insert($sql);

        //recuperer l'idée du produit du panier
        $sql = "SELECT cart.CartID FROM cart INNER JOIN totalcart ON cart.CartID = totalcart.CartID INNER JOIN orders ON totalcart.OrderID = orders.OrderID WHERE orders.OrderID = ".$_SESSION["order"]." AND cart.CustomerID = " . $_SESSION["compte"] . " AND cart.ItemID = " . $_GET["deleted_item"];        $result = sql($sql);
        $cart_id = $result["CartID"];

        //supprimer le produit-panier de la commande
        $sql = "DELETE FROM totalcart WHERE OrderID = " . $_SESSION["order"] . " AND CartID = " . $cart_id;
        insert($sql);

        //supprimer le produit du panier
        $sql = "DELETE FROM cart WHERE CartID = " . $cart_id;
        insert($sql);

        removeURLParameter("deleted_item");
        exit();
    }
}

function minusQuantity() {
    if (isset($_GET["minus_item"])) {
        $sql = "SELECT Quantity FROM cart INNER JOIN totalcart ON cart.CartID = totalcart.CartID WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["minus_item"] . "' AND OrderID = '" . $_SESSION["order"] . "'";
        $result = sql($sql);
        if ($result["Quantity"] > 1) {
            // On ajoute un au stock
            $sql = "UPDATE item SET Quantity = Quantity + 1 WHERE ItemID = '" . $_GET["minus_item"] . "'";
            insert($sql);

            // On enlève un au panier
            $sql = "UPDATE cart INNER JOIN totalcart ON cart.CartID = totalcart.CartID SET Quantity = Quantity - 1 WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["minus_item"] . "' AND OrderID = '" . $_SESSION["order"] . "'";
            insert($sql);
        }

        removeURLParameter("minus_item");
        exit();
    }
}

function plusQuantity() {
    if (isset($_GET["plus_item"])) {
        $sql = "SELECT Quantity FROM item WHERE ItemID = '" . $_GET["plus_item"] . "'";
        $result = sql($sql);
        if ($result["Quantity"] > 0) {
            // On enlève un au stock
            $sql = "UPDATE item SET Quantity = Quantity - 1 WHERE ItemID = '" . $_GET["plus_item"] . "'";
            insert($sql);
            
            // On ajoute un au panier
            $sql = "UPDATE cart INNER JOIN totalcart ON cart.CartID = totalcart.CartID SET Quantity = Quantity + 1 WHERE CustomerID = '" . $_SESSION["compte"] . "' AND ItemID = '" . $_GET["plus_item"] . "' AND OrderID = '" . $_SESSION["order"] . "'";
            insert($sql);
        }
        removeURLParameter("plus_item");
        exit();
    }
}