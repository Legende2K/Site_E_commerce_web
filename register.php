<html lang="en">

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
                <p>Connexion</p>
            </div>
            <div class="card-body">
                <form>
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                    <label for="surname">Nom</label>
                    <input type="text" id="surname" name="surname" required>
                    <label for="name">Prénom</label>
                    <input type="text" id="name" name="name" required>
                    <label for="birthdate">Date de naissance</label>
                    <input type="date" id="birthdate" name="birthdate" required>
                    <label for="address1">Adresse</label>
                    <input type="text" id="address1" name="address" required>
                    <label for="address2">Complément d'adresse (facultatif)</label>
                    <input type="text" id="address2" name="address2">
                    <label for="postalCode">Code Postal</label>
                    <input type="text" id="postalCode" name="postalCode" required>
                    <label for="country">Pays</label>
                    <input type="text" id="country" name="country" required>
                    <label for="phone">Numéro de téléphone (facultatif)</label>
                    <input type="text" id="phone" name="phone">
                    <input type="submit" value="S'inscrire">
                    <input type="button" value="Connexion" onclick="window.location.href = '../login.php';">
                </form>
            </div>
        </div>
    </main>
    <?php include "php/components/footer.php"; ?>
</body>

</html>