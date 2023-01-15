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
                    <div class="row_container">
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
                    <div id="save_button" class="button">
                        <p>Enregistrer</p>
                    </div>
                    <div class="line"></div>
                    <p class="subtitle">Informations du compte</p>
                    <div id="email_container" class="input_label">
                        <label for="email">Email</label>
                        <input type="email" id="email" value="Email">
                    </div>
                    <div id="password_container" class="input_label">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" value="Mot de passe" disabled>
                    </div>
                    <div id="change_password_button" class="button">
                        <p>Changer de mot de passe</p>
                    </div>
                </div>
                <div id="address_container" class="container">
                    <p class="subtitle">Mon adresse</p>
                    <div id="main_address_container" class="input_label">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" value="Adresse">
                    </div>
                    <div id="complementary_address_container" class="input_label">
                        <label for="complementary_address">Complément d'adresse</label>
                        <input type="text" id="complementary_address" value="Complément d'adresse">
                    </div>
                    <div class="row_container">
                        <div id="zip_container" class="input_label">
                            <label for="zip">Code Postal</label>
                            <input type="text" id="zip" value="49000">
                        </div>
                        <div id="city_container" class="input_label">
                            <label for="city">Ville</label>
                            <input type="text" id="city" value="Ville">
                        </div>
                    </div>
                    <div id="country_container" class="input_label">
                        <label for="country">Pays</label>
                        <input type="text" id="country" value="Pays">
                    </div>
                    <div id="save_button" class="button">
                        <p>Enregistrer</p>
                    </div>
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