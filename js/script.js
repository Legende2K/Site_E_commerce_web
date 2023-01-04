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


//A enlever plus tard
localStorage.setItem('items', ['Item_1', 'Item_2', 'Item_3']);

function showTrolley() {
    const items = localStorage.getItem("items").split(',');
    const html = [];
    for (let i = 0 ; i < items.length ; i++) {
        html.push(
            "<div class='trolley_item' id='" + items[i] + "'>" + 
                "<img src='images/logo.jpg'>" +
                "<p>" + items[i] + "<br>10,99€</p>" +
                "<p>Qte : 2</p>" +
                "<i class='fa-solid fa-xmark' onclick='deleteItem(\"" + items[i] + "\")'></i>" +
            "</div>"
        );
    }
    document.querySelector("#trolley_items").innerHTML = html.join("");
    document.querySelector("#trolley_items").style.display = document.querySelector("#trolley_items").style.display == "block" ? "none" : "block";
}

function deleteItem(item) {
    const items = localStorage.getItem("items").split(',');
    const index = items.indexOf(item);
    if (index == -1) return;
    items.splice(index, 1);
    localStorage.setItem("items", items);
    document.querySelector("#trolley_items #" + item).remove();
}

document.addEventListener("click", function (event) {
    if (!document.querySelector("#icons").contains(event.target)) {
        document.querySelector("#trolley_items").style.display = "none";
    }
});