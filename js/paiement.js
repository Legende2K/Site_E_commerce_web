function validateForm() {
    const card_number = document.getElementById("card-number");
    const expiration_date = document.getElementById("expiration-date");
    const security_code = document.getElementById("security-code");
    const name_on_card = document.getElementById("name-on-card");
    let validate = true;
    if (card_number.value == "") {
        card_number.classList.add("error");
        validate = false;
    } else  {
        const regex = /^(?:(?:\d{4}[- ]?){3}\d{4}|\d{16})(?:[0-9]{3})?$/;
        if (regex.test(card_number.value)) {
            card_number.classList.remove("error");
          } else {
            card_number.classList.add("error");
            validate = false;
        }
    }
    if (expiration_date.value == "") {
        expiration_date.classList.add("error");
        validate = false;
    } else {
        const regex = /^(0[1-9]|1[0-2])\/[0-9]{2}$/;
        if (regex.test(expiration_date.value)) {
            expiration_date.classList.remove("error");
          } else {
            expiration_date.classList.add("error");
            validate = false;
        }
    }
    if (security_code.value == "") {
        security_code.classList.add("error");
        validate = false;
    } else {
        const regex = /^[0-9]{3,4}$/;
        if (regex.test(security_code.value)) {
            security_code.classList.remove("error");
          } else {
            security_code.classList.add("error");
            validate = false;
        }
    }
    if (name_on_card.value == "") {
        name_on_card.classList.add("error");
        validate = false;
    } else {
        name_on_card.classList.remove("error");
    }
    if (validate) {
        addParameterToURL("validate", "true");
    }
}