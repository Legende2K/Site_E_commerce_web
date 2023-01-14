let suggestions = [
    "Couteaux",
    "Fourchettes",
    "Cuilllières",
    "Assiettes",
];

const searchInput = document.querySelector("#search_bar");
const input = searchInput.querySelector("input");
const resultBox = searchInput.querySelector(".resultBox");

input.onkeyup = (e)=>{
    let userData = e.target.value;
    let emptyArray = [];
    if(userData){
        emptyArray = suggestions.filter((data)=>{
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase()); 
        });
        emptyArray = emptyArray.map((data)=>{
            return data = '<li>&emsp;'+ data +'</li>';
        });
    }
    resultBox.innerHTML = emptyArray.join('');
}

input.addEventListener("focusin", (event) => {
    resultBox.style.display = "block";
});

input.addEventListener("focusout", (event) => {
    resultBox.style.display = "none";
});


//A enlever plus tard
localStorage.setItem('items', ['Item_1', 'Item_2', 'Item_3']);

let continueToShowDropdown = false;

function showCart() {
    const items = localStorage.getItem("items").split(',');
    if (items.length === 0 || (items.length === 1 && items[0] == '')) {
        document.querySelector("#cart_items").innerHTML = "<p style='width: max-content'>Aucun item dans le panier</p>";
        document.querySelector("#cart_items").style.display = document.querySelector("#cart_items").style.display == "block" ? "none" : "block";
    } else {
        const html = [];
        for (let i = 0 ; i < items.length ; i++) {
            html.push(
                "<li class='cart_item' id='" + items[i] + "'>" + 
                    "<img src='../images/logo.jpg'>" +
                    "<p>" + items[i].toUpperCase() + "<br><span style='font-size: 12'>10,99€</span></p>" +
                    "<p class='qte_item'>Qte : 2</p>" +
                    "<i class='fa-solid fa-xmark' onclick='deleteItem(\"" + items[i] + "\")'></i>" +
                "</li>"
            );
        }
        html.push(
            "<div id='pay_button' onclick='goToCart()'>" +
            "<p>Payez</p>" +
            "<i class='fa-solid fa-arrow-right'></i>" +
            "</div>"
        )
        document.querySelector("#cart_items").innerHTML = html.join("");
        document.querySelector("#cart_items").style.display = document.querySelector("#cart_items").style.display == "block" ? "none" : "block";
    }
    
}

function deleteItem(item) {
    const items = localStorage.getItem("items").split(',');
    console.log(items);
    const index = items.indexOf(item);
    if (index == -1) return;
    items.splice(index, 1);
    localStorage.setItem("items", items);
    document.querySelector("#cart_items #" + item).remove();
    continueToShowDropdown = true;
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
    if (!document.querySelector("#dropdown_profil").contains(event.target)) {
        document.querySelector("#profil_content").style.display = "none";
    }
    continueToShowDropdown = false;
});

function goToCart() {
    window.location.href = "../paiement/cart.php";
}

function goToAccueil() {
    window.location.href = "../index.php";
}

function showProfil() {
    const connected = window.localStorage.getItem("connected");
    if (connected) {
        window.location.href = "../profil.php";
    } else {
        window.location.href = "../login.php";
    }
}