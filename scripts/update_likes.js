let likes = document.querySelector('#story span.likes');
let dislikes = document.querySelector('#story span.dislikes');
let tastechoice = document.querySelector('#story span.tasteChoice');
let footer = document.querySelector('#story footer');
let user_id=document.querySelector('input[name=user_id]').value;
let story_id=document.querySelector('input[name=story_id]').value;

/*Function for requests:*/
function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

/*BEGINING OF PART1 : color likes / dislikes if the user has already likes/dislikes story*/
let color_like = function(event) {
    let answer = JSON.parse(this.responseText);
    if(answer == 1 || answer == 3) {
        likes.style.color = "blue";
    }
    if(answer == 2 || answer == 3) {
        dislikes.style.color = "blue";
    }
}

let request1 = new XMLHttpRequest();
request1.addEventListener('load', color_like);
request1.open('POST', '../templates/check_like.php', true);
request1.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
request1.send(encodeForAjax({story_id: story_id, user_id: user_id}));
/*END OF PART1*/

/*BEGINING OF PART2 : add like by clicking*/
let addlike = function() {
    let request2 = new XMLHttpRequest();
    request2.addEventListener('load', receive_answer);
    request2.open('POST', '../templates/add_like.php', true);
    request2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request2.send(encodeForAjax({story_id: story_id, user_id: user_id}));
}

let receive_answer = function(event) {
    let answer = JSON.parse(this.responseText);

    let likes_to_write = " likes";
    if(answer == 1)
        likes_to_write = " like";

    likes.parentNode.removeChild(likes);

    let new_likes = document.createElement('span');
    new_likes.className = "likes";
    new_likes.textContent = answer + likes_to_write;
    footer.insertBefore(new_likes, dislikes);
}

likes.addEventListener('click', addlike);
/*END OF PART2*/

/*BEGINING OF PART3 : add dislike by clicking*/
let add_dislike = function() {
    let request2 = new XMLHttpRequest();
    request2.addEventListener('load', receive_answer_dislike);
    request2.open('POST', '../templates/add_dislike.php', true);
    request2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request2.send(encodeForAjax({story_id: story_id, user_id: user_id}));
}

let receive_answer_dislike = function(event) {
    let answer = JSON.parse(this.responseText);

    let dislikes_to_write = " dislikes";
    if(answer == 1)
        dislikes_to_write = " dislike";

    dislikes.parentNode.removeChild(dislikes);

    let new_dislikes = document.createElement('span');
    new_dislikes.className = "dislikes";
    new_dislikes.textContent = answer + dislikes_to_write;
    footer.insertBefore(new_dislikes, tastechoice);
}

dislikes.addEventListener('click', add_dislike);
/*END OF PART3*/