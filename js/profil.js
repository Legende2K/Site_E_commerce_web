// const title = document.querySelector("#title");
// const main_container = document.querySelector("#main_container");
// main_container.style.minHeight = "calc(100% - " + title.offsetHeight + "px)";
// console.log(title.offsetHeight);

const profil = document.querySelector("#profil_button");
const profil_container = document.querySelector("#profil_container");
const address = document.querySelector("#address_button");
const address_container = document.querySelector("#address_container");
const orders = document.querySelector("#orders_button");
const orders_container = document.querySelector("#orders_container");
const sales = document.querySelector("#sales_button");
const sales_container = document.querySelector("#sales_container");

profil.classList.add("active");
profil.style.display = "flex";
address_container.style.display = "none";
orders_container.style.display = "none";
sales_container.style.display = "none";

function showContainer(nb) {
    switch (nb) {
        case 1:
            profil.classList.add("active");
            address.classList.remove("active");
            orders.classList.remove("active");
            sales.classList.remove("active");
            profil_container.style.display = "flex";
            address_container.style.display = "none";
            orders_container.style.display = "none";
            sales_container.style.display = "none";
            break;
        case 2:
            profil.classList.remove("active");
            address.classList.add("active");
            orders.classList.remove("active");
            sales.classList.remove("active");
            profil_container.style.display = "none";
            address_container.style.display = "flex";
            orders_container.style.display = "none";
            sales_container.style.display = "none";
            break;
        case 3:
            profil.classList.remove("active");
            address.classList.remove("active");
            orders.classList.add("active");
            sales.classList.remove("active");
            profil_container.style.display = "none";
            address_container.style.display = "none";
            orders_container.style.display = "flex";
            sales_container.style.display = "none";
            break;
        case 4:
            profil.classList.remove("active");
            address.classList.remove("active");
            orders.classList.remove("active");
            sales.classList.add("active");
            profil_container.style.display = "none";
            address_container.style.display = "none";
            orders_container.style.display = "none";
            sales_container.style.display = "flex";
            break;
        default:
            console.log("Error");
            break;
    }
}