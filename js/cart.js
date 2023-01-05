function showItems() {
    const items = localStorage.getItem("items").split(',');
    const articles = document.querySelector("#articles");

    if (items.length === 0 || (items.length === 1 && items[0] == '')) {
        articles.innerHTML = "<p'>Aucun item dans le panier</p>";
    } else {
        const html = [];
        for (let i = 0 ; i < items.length ; i++) {
            html.push(
                "<div style= 'display: flex; justify-content: center;grid-column:" + (i%2 + 1) + "; grid-row:" + (Math.floor(i/2) + 1) + ";'>" +
                    "<li class='article' id='" + items[i] + "'>" + 
                        "<img src='images/logo.jpg'>" +
                        "<p>" + items[i].toUpperCase() + "<br>10,99€</p>" +
                        "<div class='qte_article'>" +
                            "<p>Quantité:</p>" +
                            "<div class='qte_article_nb'>" +
                                "<i class='fa-solid fa-minus' onclick='minus(\"" + items[i] + "\")'></i>" +
                                "<p>2</p>" +
                                "<i class='fa-solid fa-plus' onclick='plus(\"" + items[i] + "\")'></i>" +
                            "</div>" +
                        "</div>" +
                        "<p class='total_price'>Prix total:<br>" + (2*10.99) + "€</p>" +
                        "<i class='fa-solid fa-xmark' onclick='deleteItem(\"" + items[i] + "\")'></i>" +
                    "</li>" +
                "</div>"
            );
        }
        articles.innerHTML = html.join("");
    }
}

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
}

function deleteItem(item) {
    const items = localStorage.getItem("items").split(',');
    const index = items.indexOf(item);
    if (index > -1) {
        items.splice(index, 1);
    }
    localStorage.setItem("items", items);
    showItems();
}

showItems();