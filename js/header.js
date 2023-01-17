const searchInput = document.querySelector("#search_bar");
const input = searchInput.querySelector("input");
const resultBox = searchInput.querySelector(".resultBox");

function removeAccents(str) {
    var accents = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž";
    var accentsOut = "AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz";
    str = str.split('');
    var strLen = str.length;
    var i, x;
    for (i = 0; i < strLen; i++) {
        if ((x = accents.indexOf(str[i])) != -1) {
            str[i] = accentsOut[x];
        }
    }
    return str.join('');
}


input.onkeyup = (e) => {
    let userData = e.target.value;
    let emptyArray = [];
    if (userData) {
        emptyArray = suggestions.filter((data) => {
            return removeAccents(data.toLocaleLowerCase()).includes(removeAccents(userData.toLocaleLowerCase()));
        });
        emptyArray = emptyArray.map((data) => {
            return data = '<li onclick=goToItem(' + ids[suggestions.indexOf(data)] + ')>&emsp;' + data + '</li>';
        });
    }
    resultBox.innerHTML = emptyArray.join('');
}

function goToItem(id) {
    window.location.href = "../item.php?id=" + id;
}

input.addEventListener("focusin", (event) => {
    resultBox.style.display = "block";
});

function showCart() {
    document.querySelector("#cart_items").style.display = document.querySelector("#cart_items").style.display == "block" ? "none" : "block";
}

function deleteItem(item) {
    const items = localStorage.getItem("items").split(',');
    console.log(items);
    const index = items.indexOf(item);
    if (index == -1) return;
    items.splice(index, 1);
    localStorage.setItem("items", items);
    document.querySelector("#cart_items #" + item).remove();
    document.querySelector("#cart_count").innerHTML = items.length;
    if (items.length == 0) {
        document.querySelector("#cart_items").innerHTML = "<p style='width: max-content'>Aucun item dans le panier</p>";
        document.querySelector("#cart_count").style.display = "none";
    }
}

document.addEventListener("click", function (event) {
    if (!document.querySelector("#dropdown_cart").contains(event.target)) {
        document.querySelector("#cart_items").style.display = "none";
    }
    if (!document.querySelector("#search_bar").contains(event.target)) {
        resultBox.style.display = "none";
    }
});

function goToCart() {
    window.location.href = "../paiement/cart.php";
}

function goToAccueil() {
    window.location.href = "../index.php";
}

function showProfil() {
    window.location.href = "../login.php";
}