function pushStars(nb) {
    console.log(nb);
    nb = Math.round(nb * 2) / 2;
    var solidStars = Math.floor(nb); 
    var emptyStars = 5 - solidStars; 
    var html = '';
    for (var i = 0; i < solidStars; i++) {
        html += "<i class='fa-solid fa-star'></i>";
    }
    if (nb - solidStars === 0.5) {
        html += "<i class='fa-solid fa-star-half-stroke'></i>";
        emptyStars--;
    }
    for (var i = 0; i < emptyStars; i++) {
        html += "<i class='fa-regular fa-star'></i>";
    }
    return html;
}



