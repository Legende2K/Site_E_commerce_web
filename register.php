<?php
include 'php/core.php';
include 'php/functions.php';
if (isset($_SESSION["compte"])) {
    header("Location: ../profil.php");
}
$_EMAIL_ERROR = "";
if (isset($_GET["email"]) && isset($_GET["password"]) && isset($_GET["name"]) && isset($_GET["firstname"]) && isset($_GET["birthdate"])
&& isset($_GET["address"]) && isset($_GET["postalCode"]) && isset($_GET["city"]) && isset($_GET["country"]) && isset($_GET["phone"])) {
    $email = $_GET["email"];
    $password = $_GET["password"];
    $firstname = $_GET["firstname"];
    $name = $_GET["name"];
    $birthdate = $_GET["birthdate"];
    $address1 = $_GET["address"];
    $address2 = isset($_GET["address2"]) ? $_GET["address2"] : NULL;
    $postalCode = $_GET["postalCode"];
    $city = $_GET["city"];
    $country = $_GET["country"];
    $phone = $_GET["phone"];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = sql($sql);
    if ($result) {
        $_EMAIL_ERROR = "Email déjà utilisé";
    } else {
        //TODO : add city
        global $mysqli;
        $sql = "INSERT INTO user (email, password, firstname, name, birthdate, address1, address2, postalCode, /*city,*/ country, phone) VALUES ('$email', '$password', '$firstname', '$name', '$birthdate', '$address1', '$address2', '$postalCode', /*'$city',*/ '$country', '$phone')";
        $mysqli->query($sql);
        $_SESSION["compte"] = $mysqli -> insert_id;
        header("Location: ../profil.php");
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
    <link rel="stylesheet" href="../css/login.css">
    <title>S'inscrire - Kittools</title>
</head>

<body>
    <?php include "php/components/header.php"; ?>
    <main>
        <div class="login-card">
            <div class="card-header">
                <p>S'inscrire</p>
            </div>
            <div class="card-body">
                <form>
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required>
                    <p class="error"><?php echo $_EMAIL_ERROR; ?></p>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                    <div class="row_container">
                        <div class="column_container">
                            <label for="name">Nom</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="column_container">
                            <label for="firstname">Prénom</label>
                            <input type="text" id="firstname" name="firstname" required>
                        </div>
                    </div>
                    <label for="birthdate">Date de naissance</label>
                    <input type="date" id="birthdate" name="birthdate" required>
                    <label for="address1">Adresse</label>
                    <input type="text" id="address1" name="address" required>
                    <label for="address2">Complément d'adresse (facultatif)</label>
                    <input type="text" id="address2" name="address2">
                    <div class="row_container">
                        <div class="column_container" id="zip_column_container">
                            <label for="postalCode">Code Postal</label>
                            <input type="text" id="postalCode" name="postalCode" required>
                        </div>
                        <div class="column_container">
                            <label for="city">Pays</label>
                            <input type="text" id="city" name="city" required>
                        </div>
                    </div>
                    <div class="column_container">
                        <label for="country">Pays</label>
                        <input type="text" id="country" name="country" required>
                    </div>
                    <label for="phone">Numéro de téléphone</label>
                    <input type="number" id="phone" name="phone">
                    <input type="submit" value="S'inscrire">
                    <input type="button" value="Connexion" onclick="window.location.href = '../login.php';">
                </form>
            </div>
        </div>
    </main>
    <?php include "php/components/footer.php"; ?>
</body>

</html>