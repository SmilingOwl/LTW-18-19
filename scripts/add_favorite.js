let favorites_span = document.querySelector('#story span.favorites');

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}
 /* Part to color favorites */
let color_favorite = function(event) {
    let answer = JSON.parse(this.responseText);
    if(answer) {
        favorites_span.style.color = "blue";
    }
}

let request_favorites = new XMLHttpRequest();
request_favorites.addEventListener('load', color_favorite);
request_favorites.open('POST', '../templates/check_favorite.php', true);
request_favorites.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
request_favorites.send(encodeForAjax({story_id: story_id, user_id: user_id}));

/* Part to add favorites on click */
let add_favorite = function() {
    let user_id=document.querySelector('input[name=user_id]').value;
    let story_id=document.querySelector('input[name=story_id]').value;

    let request = new XMLHttpRequest();
    request.addEventListener('load', receive_favorite_count);
    request.open('POST', '../templates/add_favorite.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({story_id: story_id, user_id: user_id}));
}

let receive_favorite_count = function(event) {
    let answer = JSON.parse(this.responseText);

    favorites_span.parentNode.removeChild(favorites_span);

    let new_favorites = document.createElement('span');
    new_favorites.className = "favorites";
    new_favorites.innerHTML = answer + '<img src="../icons/saved_icon.png" alt="favorites"></img>';
    footer.appendChild(new_favorites);
}

favorites_span.addEventListener('click', add_favorite);