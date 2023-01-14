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
                    <input type="text" id="email" name="email" required>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                    <input type="submit" value="Connexion" onclick="window.localStorage.setItem('connected', true)">
                    <input type="button" value="S'inscrire" onclick="window.location.href = '../register.php';">
                </form>
            </div>
        </div>
    </main>
    <?php include "php/components/footer.php"; ?>
</body>

</html>