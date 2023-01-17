var categories = document.getElementsByClassName("category");
for (var i = 0; i < categories.length; i++) {
    categories[i].addEventListener("click", function() {
        var categoryID = this.getAttribute("data-id");
        var subCategories = document.querySelectorAll("[id^='sub_of_category']");
        for (var j = 0; j < subCategories.length; j++) {
            if (subCategories[j].id === "sub_of_category" + categoryID) {
                subCategories[j].style.display = "block";
            } else {
                subCategories[j].style.display = "none";
            }
        }
        for (var k = 0; k < categories.length; k++) {
            categories[k].style.display = "none";
        }
    });
}

var arrows = document.getElementsByClassName("fa-solid fa-arrow-left-long");
for (var i = 0; i < arrows.length; i++) {
    arrows[i].addEventListener("click", function() {
        var subCategories = document.querySelectorAll("[id^='sub_of_category']");
        for (var j = 0; j < subCategories.length; j++) {
            subCategories[j].style.display = "none";
        }
        var categories = document.getElementsByClassName("category");
        for (var k= 0; k < categories.length; k++) {
            categories[k].style.display = "block";
        }
    });
}

function showSubcaterory() {
    var carousel = document.getElementById("carousel");
    var chevrons = document.getElementsByClassName("chevrons");
    carousel.style.display = "none";
    for (var i = 0; i < chevrons.length; i++) {
        chevrons[i].style.display = "none";
    }
    var productsList = document.getElementsByClassName("products_list");
    for (var j = 0; j < productsList.length; j++) {
        productsList[j].style.display = "flex";
    }
}

var subCategories = document.getElementsByClassName("subcategory");
for (var i = 0; i < subCategories.length; i++) {
    subCategories[i].addEventListener("click", showSubcaterory);
}

