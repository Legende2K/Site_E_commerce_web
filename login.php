<?php
include('php/core.php');
include('php/functions.php');
pr($_SESSION);
if (isset($_SESSION["compte"])) {
    header("Location: ../profil.php");
}

$_EMAIL_ERROR = "";
$_PASSWORD_ERROR = "";
if (isset($_GET["email"]) && isset($_GET["password"])) {
    $email = $_GET["email"];
    $password = $_GET["password"];

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = sql($sql);

    if ($result) {
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = sql($sql);
        if ($result) {
            $_SESSION["compte"] = $result["UserID"];
            header("Location: ../profil.php");
        } else {
            $_PASSWORD_ERROR = "Mot de passe incorrect";
        }
    } else {
        $_EMAIL_ERROR = "Email incorrect";
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
    <title>Connexion - Kittools</title>
</head>

<body>
    <?php include "php/components/header.php"; ?>
    <main>
        <div class="login-card">
            <div class="card-header">
                <p>Connexion</p>
            </div>
            <div class="card-body">
                <form>
                    <label for="email">Adresse email</label>
                    <input type="text" id="email" name="email" value="<?php if (isset($_GET["email"])) echo $_GET["email"]?>" class="<?php if(!empty($_EMAIL_ERROR)){echo "error_input";}?>" required>
                    <label for="email" class="error_message <?php if(!empty($_EMAIL_ERROR)){echo "error_p";}?>"><?php echo $_EMAIL_ERROR?></label>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="<?php if (isset($_GET["password"])) echo $_GET["password"]?>" class="<?php if(!empty($_PASSWORD_ERROR)){echo "error_input";}?>" required>
                    <label for="password" class="error_message <?php if(!empty($_PASSWORD_ERROR)){echo "error_p";}?>"><?php echo $_PASSWORD_ERROR?></label>
                    <input type="submit" value="Connexion">
                    <input type="button" value="S'inscrire" onclick="window.location.href = '../register.php';">
                </form>
            </div>
        </div>
    </main>
    <?php include "php/components/footer.php"; ?>
</body>
</html>