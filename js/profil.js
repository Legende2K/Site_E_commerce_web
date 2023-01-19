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

const email_modifier_container = document.querySelector("#email_modifier_container");
const password_modifier_container = document.querySelector("#password_modifier_container");
const orders_details_container = document.querySelector("#orders_details_container");

const containers = document.querySelectorAll(".container");
const buttons = document.querySelectorAll(".part");

profil.classList.add("active");
containers.forEach(container => container.style.display = "none");
profil_container.style.display = "flex";

function showContainer(nb) {
    switch (nb) {
        case 1:
            buttons.forEach(button => button.classList.remove("active"));
            profil.classList.add("active");
            containers.forEach(container => container.style.display = "none");
            profil_container.style.display = "flex";
            break;
        case 2:
            buttons.forEach(button => button.classList.remove("active"));
            address.classList.add("active");
            containers.forEach(container => container.style.display = "none");
            address_container.style.display = "flex";
            break;
        case 3:
            buttons.forEach(button => button.classList.remove("active"));
            orders.classList.add("active");
            containers.forEach(container => container.style.display = "none");
            orders_container.style.display = "flex";
            break;
        case 4:
            buttons.forEach(button => button.classList.remove("active"));
            sales.classList.add("active");
            containers.forEach(container => container.style.display = "none");
            sales_container.style.display = "flex";
            break;
        case 5:
            containers.forEach(container => container.style.display = "none");
            email_modifier_container.style.display = "flex";
            break;
        case 6:
            containers.forEach(container => container.style.display = "none");
            password_modifier_container.style.display = "flex";
            break;
        case 7:
            containers.forEach(container => container.style.display = "none");
            orders_details_container.style.display = "flex";
        default:
            console.log("Error");
            break;
    }
}

function logout() {
    window.location.href = "../profil?logout=true";
}

function savePersonalInformations() {
    const firstname = document.querySelector("#firstname").value;
    const name = document.querySelector("#name").value;
    const phone = document.querySelector("#phone").value;

    if (firstname != "" && name != "" && phone != "") {
        window.location.href = "../profil?firstname=" + firstname + "&name=" + name + "&phone=" + phone;
    }
}

function saveAddress() {
    const address = document.querySelector("#address").value;
    const complementary_address = document.querySelector("#complementary_address").value;
    const city = document.querySelector("#city").value;
    const zip = document.querySelector("#zip").value;
    const country = document.querySelector("#country").value;

    if (address != "" && city != "" && zip != "" && country != "") {
        window.location.href = "../profil?address=" + address + "&complementary_address=" + complementary_address + "&city=" + city + "&zip=" + zip + "&country=" + country;
    }
}

function changeEmail() {
    const old_email = document.querySelector("#confirm_email").value;
    const new_email = document.querySelector("#new_email").value;
    const confirm_password = document.querySelector("#confirm_password").value;

    if (old_email != "" && new_email != "" && confirm_password != "") {
        window.location.href = "../profil?old_email=" + old_email + "&new_email=" + new_email + "&confirm_password=" + confirm_password;
    }
}

function changePassword() {
    const confirm_email = document.querySelector("#password_confirm_email").value;
    const old_password = document.querySelector("#actuel_password").value;
    const new_password = document.querySelector("#new_password").value;
    const confirm_new_password = document.querySelector("#confirm_new_password").value;

    if (confirm_email != "" && old_password != "" && new_password != "" && confirm_new_password != "") {
        window.location.href = "../profil?confirm_email=" + confirm_email + "&old_password=" + old_password + "&new_password=" + new_password + "&confirm_new_password=" + confirm_new_password;
    }
}