<?php
include "../php/core.php";
include "../php/functions.php";
//verifier si le panier est vide
$sql = "SELECT COUNT(*) FROM `totalcart` WHERE `OrderID` = " . $_SESSION["order"];
$result = sqlCount($sql);
if ($result == 0) {
    echo "<script>alert('Votre panier est vide !')</script>";
    header("Location: ../index.php");
    exit();
}

if (isset($_GET["validate"])) {
    //passer la statut unpaid à delivering
    $sql = "UPDATE `orders` SET `Status` = 'delivering' WHERE `OrderID` = " . $_SESSION["order"];
    insert($sql);

    //modifier la date de commande
    $sql = "UPDATE `orders` SET `Date` = CURRENT_TIMESTAMP WHERE `OrderID` = " . $_SESSION["order"];
    insert($sql);

    //créer une nouvelle commande
    global $mysqli;
    $sql = "INSERT INTO `orders` (`UserID`, `Status`, `Date`) VALUES ('" . $_SESSION["compte"] . "', 'unpaid', CURRENT_TIMESTAMP)";
    $mysqli->query($sql);
    $_SESSION["order"] = $mysqli->insert_id;
    
    echo "<script>alert('Votre commande a été validée !')</script>";
    header("Location: ../index.php");
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
    <link rel="stylesheet" href="../css/paiement.css">
    <title>Paiement - Kittools</title>
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
                <div class="step active" id="step-2">
                    <p>2</p>
                    <p>Livraison</p>
                </div>
                <div class="step active" id="step-3">
                    <p>3</p>
                    <p>Paiement</p>
                </div>
            </div>
        </div>

        <form>
            <h2>Paiement par carte de crédit</h2>
            <p>Veuillez entrer les informations de votre carte de crédit ci-dessous :</p>
            <label for="card-number">Numéro de carte :</label>
            <input type="text" id="card-number" name="card-number">
            <label for="expiration-date">Date d'expiration (MM/AA) :</label>
            <input type="text" id="expiration-date" name="expiration-date">
            <label for="security-code">Code de sécurité :</label>
            <input type="text" id="security-code" name="security-code">
            <label for="name-on-card">Nom sur la carte :</label>
            <input type="text" id="name-on-card" name="name-on-card">
            <div id="submit_button">
                <input type="button" onclick="validateForm()" value="Payer">
            </div>
        </form>
    </main>
    <?php include "../php/components/footer.php"; ?>
</body>
<script src="../js/paiement.js"></script>

</html>