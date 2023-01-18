const items = localStorage.getItem("items").split(',');
let actualPage = 1;

function minus(item) {
    const qte = document.querySelector("#" + item + " .qte_article_nb p");
    if (qte.innerHTML > 1) {
        qte.innerHTML = parseInt(qte.innerHTML) - 1;
        const total_price = document.querySelector("#" + item + " .total_price");
        total_price.innerHTML = "Prix total:<br>" + (parseInt(qte.innerHTML)*10.99) + "€";
    }
}

function plus(item) {
    const qte = document.querySelector("#" + item + " .qte_article_nb p");
    qte.innerHTML = parseInt(qte.innerHTML) + 1;
    const total_price = document.querySelector("#" + item + " .total_price");
    total_price.innerHTML = "Prix total:<br>" + (parseInt(qte.innerHTML)*10.99) + "€";
    const total_price_items = document.querySelector("#total_price_items");
    total_price_items.innerHTML = "<p>Total : " + total_price + " €</p>";
}

function deleteItem(item) {
    const items = localStorage.getItem("items").split(',');
    const index = items.indexOf(item);
    if (index > -1) {
        items.splice(index, 1);
    }
    localStorage.setItem("items", items);
    //showItems();
}

function goToPaiement() {
    window.location.href = "delivery.php";
}