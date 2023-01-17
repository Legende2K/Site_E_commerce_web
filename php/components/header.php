<header>
    <div id="accueil">
        <h1 onclick="goToAccueil()">Kittools</h1>
        <h4>Le meilleur équipement pour votre cuisine</h4>
    </div>
    <div id="search_bar">
        <div class="dropdown">
            <input type="search" placeholder="Rechercher" autocomplete="on">
            <div class="resultBox">
                <!-- here list are inserted from javascript -->
            </div>
        </div>
    </div>
    <div id="icons">
        <div class="dropdown" id="dropdown_cart">
            <div id="cart_icon" onclick="showCart()">
                <i class="fa-solid fa-cart-shopping"></i>
                <p id="cart_count">3</p>
            </div>
            <ul id="cart_items">
                <!-- Items du Panier -->
            </ul>
        </div>
        <i class="fa-solid fa-user" onclick="showProfil()"></i>
    </div>
    <?php
    echo '<script>const suggestions = ["Couteaux"];</script>';
    ?>
    <script src="../js/header.js"></script>
</header>