let favorites_span = document.querySelectorAll('#story span.favorites');
let selected_favorite;

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

/* Part to add favorites on click */
let add_favorite = function() {
    let user_id=this.parentNode.querySelector('input[name=user_id]').value;    
    let story_id=this.parentNode.querySelector('input[name=story_id]').value;
    selected_favorite = this;
    
    let request = new XMLHttpRequest();
    request.addEventListener('load', receive_favorite_count);
    request.open('POST', '../actions/add_favorite.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({story_id: story_id, user_id: user_id}));
}

let receive_favorite_count = function(event) {
    
    let answer = JSON.parse(this.responseText);
    let footer = selected_favorite.parentNode;
    footer.removeChild(selected_favorite);

    let new_favorites = document.createElement('span');
    new_favorites.className = "favorites";
    new_favorites.innerHTML = answer + '<img src="../icons/saved_icon.png" alt="favorites"></img>';
    footer.appendChild(new_favorites);
    new_favorites.style.color = "blue";
}

/* Part to color favorites */

for(let i = 0; i < favorites_span.length; i++) {
    favorites_span[i].addEventListener('click', add_favorite);

    let user_id=favorites_span[i].parentNode.querySelector('input[name=user_id]').value;
    let story_id=favorites_span[i].parentNode.querySelector('input[name=story_id]').value;

    let request_favorites = new XMLHttpRequest();
    request_favorites.addEventListener('load', function(){
        let answer = JSON.parse(this.responseText);
        if(answer) {
            favorites_span[i].style.color = "blue";
    }
    });
    request_favorites.open('POST', '../actions/check_favorite.php', true);
    request_favorites.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request_favorites.send(encodeForAjax({story_id: story_id, user_id: user_id}));
}