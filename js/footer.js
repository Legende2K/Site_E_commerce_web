const main = document.querySelector("main");
const footer = document.querySelector("footer");
const header = document.querySelector("header");

main.style.minHeight = "calc(100% - " + (header.offsetHeight + footer.offsetHeight) + "px)";

function goToInstagram() {
    window.open("https://www.instagram.com/");
}

function goToFacebook() {
    window.open("https://www.facebook.com/");
}

function goToLogin() {
    const connected = window.localStorage.getItem("connected");
    if (connected) {
        window.location.href = "../profil.php";
    } else {
        window.location.href = "../login.php";
    }
}

function goToCart() {
    window.location.href = "../paiement/cart.php";
}