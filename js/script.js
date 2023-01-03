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