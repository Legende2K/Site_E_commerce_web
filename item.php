<?php
include "php/core.php";
include "php/functions.php";

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
    <title>Kittools</title>
</head>

<body>
    <?php include "php/components/header.php"; ?>
    <main>

    </main>
    <?php include "php/components/footer.php"; ?>
</body>

</html>