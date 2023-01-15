<html lang="en">

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
                </div>
            </summary>
            <div id="main_content">
                <div id="profil_container" class="container">
                    <p class="subtitle">Informations personnelles</p>
                    <div id="identity_container">
                        <div id="name_container" class="input_label">
                            <label for="name">Nom</label>
                            <input type="text" id="name" value="Nom">
                        </div>
                        <div id="firstname_container" class="input_label">
                            <label for="firstname">Prénom</label>
                            <input type="text" id="firstname" value="Prénom">
                        </div>
                    </div>
                    <div id="phone_container" class="input_label">
                        <label for="phone">Téléphone</label>
                        <input type="text" id="phone" value="Téléphone">
                    </div>
                    <p class="subtitle">Informations du compte</p>
                    <div id="email_container" class="input_label">
                        <label for="email">Email</label>
                        <input type="text" id="email" value="Email">
                    </div>
                    <div id="password_container" class="input_label">
                        <label for="password">Mot de passe</label>
                        <input type="text" id="password" value="Mot de passe">
                    </div>
                </div>
                <div id="address_container" class="container">
                </div>
                <div id="orders_container" class="container">
                </div>
                <div id="sales_container" class="container">
                </div>
            </div>
        </div>
    </main>
    <?php include "php/components/footer.php"; ?>
</body>
<script src="../js/profil.js"></script>

</html>