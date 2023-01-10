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
                    <label for="birthday">Date de naissance</label>
                    <input type="date" id="birthday" name="birthday" required>
                    <label for="address">Adresse</label>
                    <input type="text" id="address" name="address" required>
                    <input type="submit" value="S'inscrire">
                    <input type="button" value="Connexion" onclick="window.location.href = '../login.php';">
                </form>
            </div>
        </div>
    </main>
    <?php include "php/components/footer.php"; ?>
</body>

</html>