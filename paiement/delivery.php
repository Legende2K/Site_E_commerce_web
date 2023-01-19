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
    <link rel="stylesheet" href="../css/delivery.css">
    <title>Livraison - Kittools</title>
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
                <div class="step" id="step-3">
                    <p>3</p>
                    <p>Paiement</p>
                </div>
            </div>
        </div>

        <form>
            <h2>Informations de livraison</h2>
            <p>Veuillez fournir les informations ci-dessous pour que nous puissions livrer votre commande :</p>
            <label for="name">Nom et prénom du destinataire :</label>
            <input type="text" id="name" name="name" value="<?php echo $_COMPTE["Name"].' '.$_COMPTE["FirstName"] ?>">
            <label for="address1">Adresse : <span>Ex: 7 rue des Fleurs</span></label>
            <input type="text" id="address1" name="address1" value="<?php echo $_COMPTE["Address1"] ?>">
            <label for="address2">Complément d'adresse : <span>N° appartement, étage, résidence</span></label>
            <input type="text" id="address2" name="address2" value="<?php echo $_COMPTE["Address2"] ?>">
            <div id="ville_zip">
                <div>
                    <label for="zip">Code postal :</label>
                    <input type="text" id="zip" name="zip" value="<?php echo $_COMPTE["PostalCode"] ?>">
                </div>
                <div>
                    <label for="city">Ville :</label>
                    <input type="text" id="city" name="city" value="<?php echo $_COMPTE["City"] ?>">
                </div>
            </div>
            <label for="country">Pays :</label>
            <input type="text" id="country" name="country" value="<?php echo $_COMPTE["Country"] ?>">
            <div id="submit_button">
                <input type="button" onclick="validateForm()" value="Payer">
            </div>
        </form>
    </main>
    <?php include "../php/components/footer.php"; ?>
</body>
<script src="../js/delivery.js"></script>

</html>