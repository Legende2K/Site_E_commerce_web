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
    window.location.href = "../login.php";
}

function goToCart() {
    window.location.href = "../paiement/cart.php";
}

function changeVisibilityCredits() {
    const p = document.querySelector('#credits p:last-child');
    if (p.classList.contains('visible')) {
        p.classList.remove('visible');
        p.classList.add('hidden');
    } else {
        p.classList.remove('hidden');
        p.classList.add('visible');
    }
}