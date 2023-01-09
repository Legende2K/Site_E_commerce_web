function validateForm() {
    const name = document.getElementById("name");
    const address = document.getElementById("address1");
    const zip = document.getElementById("zip");
    const city = document.getElementById("city");
    const state = document.getElementById("state");
    const country = document.getElementById("country");
    let validate = true;
    if (name.value == "") {
        name.classList.add("error");
        validate = false;
    } else {
        name.classList.remove("error");
    }
    if (address.value == "") {
        address.classList.add("error");
        validate = false;
    } else {
        address.classList.remove("error");
    }
    if (zip.value == "") {
        zip.classList.add("error");
        validate = false;
    } else {
        zip.classList.remove("error");
    }
    if (city.value == "") {
        city.classList.add("error");
        validate = false;
    } else {
        city.classList.remove("error");
    }
    if (state.value == "") {
        state.classList.add("error");
        validate = false;
    } else {
        state.classList.remove("error");
    }
    if (country.value == "") {
        country.classList.add("error");
        validate = false;
    } else {
        country.classList.remove("error");
    }
    if (validate) {
        window.location.href = "paiement.php";
    }
}