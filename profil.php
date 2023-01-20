<?php
include 'php/core.php';
include 'php/functions.php';
if (isset($_GET["logout"])) {
    unset($_SESSION["compte"]);
    header("Location: ../login.php");
}

if (isset($_GET["firstname"]) && isset($_GET["name"]) && isset($_GET["phone"])) {
    changePersonalInformations($_GET["name"], $_GET["firstname"], $_GET["phone"]);
}
if (isset($_GET["address"]) && isset($_GET["complementary_address"]) && isset($_GET["zip"]) && isset($_GET["country"]) && isset($_GET["city"])) {
    changeAddress($_GET["address"], $_GET["complementary_address"], $_GET["zip"], $_GET["city"], $_GET["country"]);
}
if (isset($_GET["old_email"]) && isset($_GET["new_email"]) && isset($_GET["confirm_password"])) {
    $_OLD_EMAIL_ERROR = "";
    $_CONFIRM_PASSWORD_ERROR = "";
    if ($_GET["old_email"] != $_COMPTE["Email"]) {
        $_OLD_EMAIL_ERROR = "L'ancienne adresse email est incorrecte";
    } else {
        if ($_GET["confirm_password"] != $_COMPTE["Password"]) {
            $_CONFIRM_PASSWORD_ERROR = "Le mot de passe est incorrect";
        } else {
            changeEmail($_GET["new_email"]);
            header("Location: profil.php");
        }
    }
}
if (isset($_GET["confirm_email"]) && isset($_GET["old_password"]) && isset($_GET["new_password"]) && isset($_GET["confirm_new_password"])) {
    $_CONFIRM_EMAIL_ERROR = "";
    $_OLD_PASSWORD_ERROR = "";
    $_CONFIRM_NEW_PASSWORD_ERROR = "";
    if ($_GET["confirm_email"] != $_COMPTE["Email"]) {
        $_CONFIRM_EMAIL_ERROR = "L'adresse email est incorrecte";
    } else {
        if ($_GET["old_password"] != $_COMPTE["Password"]) {
            $_OLD_PASSWORD_ERROR = "L'ancien mot de passe est incorrect";
        } else {
            if ($_GET["confirm_new_password"] != $_GET["new_password"]) {
                $_CONFIRM_NEW_PASSWORD_ERROR = "Les mots de passe ne correspondent pas";
            } else {
                changePassword($_GET["new_password"]);
                header("Location: profil.php");
            }
        }
    }
}

if (isset($_SESSION["compte"])) {
    $sql = "SELECT * FROM user WHERE UserID = '{$_SESSION["compte"]}'";
    $result = $mysqli->query($sql);
    $nb = $result->num_rows;
    if ($nb) {
        $row = $result->fetch_assoc();
        $_COMPTE = $row;
    }
}
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
    <link rel="stylesheet" href="../css/profil.css">
    <title>Profil - Kittools</title>
</head>

<body>
    <?php include "php/components/header.php"; ?>
    <main>
        <p id="title">Mon Compte</p>
        <div id="main_container">
            <summary>
                <div>
                    <div id="profil_button" class="part" onclick="showContainer(1)">
                        <i class="fa-solid fa-user"></i>
                        <p>Mon profil</p>
                    </div>
                    <div id="address_button" class="part" onclick="showContainer(2)">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <p>Mon adresse</p>
                    </div>
                    <div id="orders_button" class="part" onclick="showContainer(3)">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <p>Mes commandes</p>
                    </div>
                    <div id="sales_button" class="part" onclick="showContainer(4)">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <p>Mes ventes</p>
                    </div>
                    <div id="logout_button" class="part" onclick="logout()">
                        <i class="fa-solid fa-power-off"></i>
                        <p>Se déconnecter</p>
                    </div>
                </div>
            </summary>
            <div id="main_content">
                <div id="profil_container" class="container">
                    <p class="subtitle">Informations personnelles</p>
                    <div class="row_container">
                        <div id="name_container" class="input_label">
                            <label for="name">Nom</label>
                            <input type="text" id="name" value="<?php echo $_COMPTE["Name"] ?>">
                        </div>
                        <div id="firstname_container" class="input_label">
                            <label for="firstname">Prénom</label>
                            <input type="text" id="firstname" value="<?php echo $_COMPTE["FirstName"] ?>">
                        </div>
                    </div>
                    <div id="phone_container" class="input_label">
                        <label for="phone">Téléphone</label>
                        <input type="text" id="phone" value="<?php echo $_COMPTE["Phone"] ?>">
                    </div>
                    <div id="save_button" class="button" onclick="savePersonalInformations()">
                        <p>Enregistrer</p>
                    </div>
                    <div class="line"></div>
                    <p class="subtitle">Informations du compte</p>
                    <div id="email_container" class="input_label">
                        <label for="email">Email</label>
                        <div class="input_button">
                            <input type="email" id="email" value="<?php echo $_COMPTE["Email"] ?>" disabled>
                            <div id="change_password_button" class="button" onclick="showContainer(5)">
                                <p>Modifier</p>
                            </div>
                        </div>
                    </div>
                    <div id="password_container" class="input_label">
                        <label for="password">Mot de passe</label>
                        <div class="input_button">
                            <input type="password" id="password" value="<?php echo $_COMPTE["Password"] ?>" disabled>
                            <div id="change_password_button" class="button" onclick="showContainer(6)">
                                <p>Modifier</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="email_modifier_container" class="container">
                    <p class="subtitle">Modifier mon adresse mail</p>
                    <div id="confirm_email_container" class="input_label">
                        <label for="confirm_email">Email actuel</label>
                        <input type="email" id="confirm_email" value="<?php if (isset($_GET['old_email'])) echo $_GET["old_email"] ?>">
                    </div>
                    <div id="new_email_container" class="input_label">
                        <label for="new_email">Nouveau email</label>
                        <input type="email" id="new_email" value="<?php if (isset($_GET['new_email'])) echo $_GET["new_email"] ?>">
                    </div>
                    <div id="confirm_password_container" class="input_label">
                        <label for="confirm_password">Confirmer votre mot de passe</label>
                        <input type="password" id="confirm_password" value="<?php if (isset($_GET['confirm_password'])) echo $_GET["confirm_password"] ?>">
                    </div>
                    <div id="confirm_email_modifier_button" class="button" onclick="changeEmail()">
                        <p>Confirmer</p>
                    </div>
                </div>

                <div id="password_modifier_container" class="container">
                    <p class="subtitle">Modifier mon mot de passe</p>
                    <div id="password_confirm_email_container" class="input_label">
                        <label for="password_confirm_email">Confirmer votre email</label>
                        <input type="email" id="password_confirm_email" value="<?php if (isset($_GET['confirm_email'])) echo $_GET["confirm_email"] ?>">
                    </div>
                    <div id="actuel_password_container" class="input_label">
                        <label for="actuel_password">Mot de passe actuel</label>
                        <input type="password" id="actuel_password" value="<?php if (isset($_GET['old_password'])) echo $_GET["old_password"] ?>">
                    </div>
                    <div id="new_password_container" class="input_label">
                        <label for="new_password">Nouveau mot de passe</label>
                        <input type="password" id="new_password" value="<?php if (isset($_GET['new_password'])) echo $_GET["new_password"] ?>">
                    </div>
                    <div id="confirm_new_password_container" class="input_label">
                        <label for="confirm_new_password">Confirmer votre nouveau mot de passe</label>
                        <input type="password" id="confirm_new_password" value="<?php if (isset($_GET['confirm_new_password'])) echo $_GET["confirm_new_password"] ?>">
                    </div>
                    <div id="confirm_password_modifier_button" class="button" onclick="changePassword()">
                        <p>Confirmer</p>
                    </div>
                </div>

                <div id="address_container" class="container">
                    <p class="subtitle">Mon adresse</p>
                    <div id="main_address_container" class="input_label">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" value="<?php echo $_COMPTE["Address1"] ?>">
                    </div>
                    <div id="complementary_address_container" class="input_label">
                        <label for="complementary_address">Complément d'adresse</label>
                        <input type="text" id="complementary_address" value="<?php echo $_COMPTE["Address2"] ?>">
                    </div>
                    <div class="row_container">
                        <div id="zip_container" class="input_label">
                            <label for="zip">Code Postal</label>
                            <input type="text" id="zip" value="<?php echo $_COMPTE["PostalCode"] ?>">
                        </div>
                        <div id="city_container" class="input_label">
                            <label for="city">Ville</label>
                            <input type="text" id="city" value="Ville">
                        </div>
                    </div>
                    <div id="country_container" class="input_label">
                        <label for="country">Pays</label>
                        <input type="text" id="country" value="<?php echo $_COMPTE["Country"] ?>">
                    </div>
                    <div id="save_button" class="button" onclick="saveAddress()">
                        <p>Enregistrer</p>
                    </div>
                </div>
                <div id="order_details_container" class="container">
                    <p class="subtitle"></p>
                </div>
                <div id="orders_container" class="container">
                    <p class="subtitle">Mes commandes</p>
                    <?php
                    //recup les orders
                    global $mysqli;
                    $sql = "SELECT * FROM orders WHERE UserID = " . $_SESSION["compte"] . " ORDER BY Status, Date DESC";
                    $orders = $mysqli->query($sql);
                    if ($orders->num_rows == 0) {
                        echo "<p>Vous n'avez pas encore passé de commande</p>";
                    }
                    while ($order = $orders->fetch_assoc()) {
                        $sql = "SELECT * FROM totalcart WHERE OrderID = " . $order["OrderID"];
                        $items_carts = $mysqli->query($sql); ?>
                        <div class="order_container">
                            <div class="date_total_price">
                                <p>Commande <?php echo ($order["Status"] == "unpaid" ? " en cours" : "du " . sqlToFrenchDate($order["Date"])) ?></p>
                                <p id="total_price<?php echo $order["OrderID"] ?>">Total : 50€</p>
                            </div>
                            <div class="status">
                                <p><?php if ($order["Status"] == "unpaid") {
                                        echo "Non payée";
                                    } else if ($order["Status"] == "delivering") {
                                        echo "En cours de livraison";
                                    } else if ($order["Status"] == "delivered") {
                                        echo "Livrée";
                                    } else if ($order["Status"] == "canceled") {
                                        echo "Error";
                                    } ?></p>
                            </div>
                            <div class="left_arrow">
                                <i class="fa-solid fa-arrow-right" onclick="showOrderDetails(<?php echo $order['OrderID'] ?>)"></i>
                            </div>
                        </div>
                        <script>
                            document.querySelector("#order_details_container").innerHTML += "<div class='order_details <?php echo sqlToFrenchDate($order["Date"]) ?>' id='order<?php echo $order['OrderID'] ?>'></div>";
                        </script>
                    <?php
                        $sql = "SELECT cart.* FROM cart INNER JOIN totalcart ON cart.CartID = totalcart.CartID INNER JOIN orders ON totalcart.OrderID = orders.OrderID WHERE orders.OrderID = " . $order["OrderID"];
                        $carts = $mysqli->query($sql);
                        $innerHTMLString = "<p style='grid-row: 1;grid-column:3'>Prix unitaire</p><p style='grid-row: 1;grid-column:4'>Quantité</p><p style='grid-row: 1;grid-column:5'>Total</p>";
                        $i = 0;
                        $total_price = 0;
                        while ($cart = $carts->fetch_assoc()) {
                            $sql = "SELECT * FROM item WHERE ItemID = " . $cart["ItemID"];
                            $item = $mysqli->query($sql)->fetch_assoc();
                            $innerHTMLString .= "<img style='grid-row: ".($i + 2).";grid-column:1' class='order_details_item_image' src='../images/" . $item["Picture"] . "'><div style='grid-row: ".($i + 2).";grid-column:2' class='order_details_item_name'><p>" . $item["Name"] . "</p></div><div style='grid-row: ".($i + 2).";grid-column:3' class='order_details_item_price'><p>" . $item["Price"] . "€</p></div><div style='grid-row: ".($i + 2).";grid-column:4' class='order_details_item_quantity'><p>" . $cart["Quantity"] . "</p></div><div style='grid-row: ".($i + 2).";grid-column:5' class='order_details_item_price'><p>" . ($item["Price"] * $cart["Quantity"]) . "€</p></div>";
                            $i++;
                            $total_price += $item["Price"] * $cart["Quantity"];
                        }
                        echo "<script>document.querySelector('#total_price" . $order['OrderID'] . "').innerHTML = \"Total : " . $total_price . "€\";</script>";
                        echo "<script>document.querySelector('#order" . $order['OrderID'] . "').innerHTML = \"" . $innerHTMLString . "\";</script>";
                    } ?>
                </div>
                <div id="sales_container" class="container">
                    <p class="subtitle">Mes ventes</p>
                </div>
            </div>
        </div>
    </main>
    <?php include "php/components/footer.php"; ?>
</body>
<script src="../js/profil.js"></script>
<script>
    <?php if (!empty($_OLD_EMAIL_ERROR)) { ?>
        showContainer(5);
        document.getElementById("confirm_email").classList.add("error");
    <?php } ?>
    <?php if (!empty($_CONFIRM_PASSWORD_ERROR)) { ?>
        showContainer(5);
        document.getElementById("confirm_password").classList.add("error");
    <?php } ?>
    <?php if (!empty($_CONFIRM_EMAIL_ERROR)) { ?>
        showContainer(6);
        document.getElementById("password_confirm_email").classList.add("error");
    <?php } ?>
    <?php if (!empty($_OLD_PASSWORD_ERROR)) { ?>
        showContainer(6);
        document.getElementById("actuel_password").classList.add("error");
    <?php } ?>
    <?php if (!empty($_CONFIRM_NEW_PASSWORD_ERROR)) { ?>
        showContainer(6);
        document.getElementById("confirm_new_password").classList.add("error");
    <?php } ?>
</script>

</html>