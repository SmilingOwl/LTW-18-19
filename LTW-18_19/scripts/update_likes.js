let likes = document.querySelectorAll('#story span.likes');
let dislikes = document.querySelectorAll('#story span.dislikes');
let footer = document.querySelector('#story footer');
let user_id=document.querySelector('input[name=user_id]').value;
let story_id=document.querySelector('input[name=story_id]').value;
let selected_like;
let selected_dislike;

/*Function for requests:*/
function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

/*BEGINING OF PART2 : add like by clicking*/
let addlike = function() {
    selected_like=this;
    let user_id=this.parentNode.querySelector('input[name=user_id]').value;
    let story_id=this.parentNode.querySelector('input[name=story_id]').value;

    let request2 = new XMLHttpRequest();
    request2.addEventListener('load', receive_answer);
    request2.open('POST', '../actions/add_like.php', true);
    request2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request2.send(encodeForAjax({story_id: story_id, user_id: user_id}));
}

let receive_answer = function(event) {
    let answer = JSON.parse(this.responseText);
    let footer = selected_like.parentNode;
    let after = footer.querySelector('span.dislikes');

    let likes_to_write = " likes";
    if(answer == 1)
        likes_to_write = " like";

        selected_like.parentNode.removeChild(selected_like);

    let new_likes = document.createElement('span');
    new_likes.className = "likes";
    new_likes.innerHTML = answer + '<img src="../icons/like_icon.png" alt="' + likes_to_write + '"></img>';
    new_likes.style.color = "blue";
    footer.insertBefore(new_likes, after);
}

/*END OF PART2*/

/*BEGINING OF PART3 : add dislike by clicking*/
let add_dislike = function() {
    selected_dislike=this;
    let user_id=this.parentNode.querySelector('input[name=user_id]').value;
    let story_id=this.parentNode.querySelector('input[name=story_id]').value;

    let request2 = new XMLHttpRequest();
    request2.addEventListener('load', receive_answer_dislike);
    request2.open('POST', '../actions/add_dislike.php', true);
    request2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request2.send(encodeForAjax({story_id: story_id, user_id: user_id}));
}

let receive_answer_dislike = function(event) {
    let answer = JSON.parse(this.responseText);
    let footer = selected_dislike.parentNode;
    let tastechoice = footer.querySelector('span.tasteChoice');

    let dislikes_to_write = " dislikes";
    if(answer == 1)
        dislikes_to_write = " dislike";

    footer.removeChild(selected_dislike);

    let new_dislikes = document.createElement('span');
    new_dislikes.className = "dislikes";
    new_dislikes.innerHTML = answer + '<img src="../icons/dislike_icon.png" alt="' + dislikes_to_write + '"></img>';
    new_dislikes.style.color = "blue";
    footer.insertBefore(new_dislikes, tastechoice);
}

 /*END OF PART3*/

for(let i = 0; i < likes.length; i++) {
    likes[i].addEventListener('click', addlike);
    dislikes[i].addEventListener('click', add_dislike);

    let user_id=likes[i].parentNode.querySelector('input[name=user_id]').value;
    let story_id=likes[i].parentNode.querySelector('input[name=story_id]').value;

    let request_likes = new XMLHttpRequest();
    request_likes.addEventListener('load', function(){
        let answer = JSON.parse(this.responseText);
        if(answer == 1 || answer == 3) {
            likes[i].style.color = "blue";
        }
        if(answer == 2 || answer == 3) {
            dislikes[i].style.color = "blue";
        }
    });
    request_likes.open('POST', '../actions/check_like.php', true);
    request_likes.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request_likes.send(encodeForAjax({story_id: story_id, user_id: user_id}));
}

/*---------------------------COMMENTS---------------------------*/

let likes_comments = document.querySelectorAll('#comments span.likes');
let dislikes_comments = document.querySelectorAll('#comments span.dislikes');
let current_comment;
let current_likes;
let current_dislikes;
let current_input;

/*BEGINING OF PART4 : add like by clicking on comments*/
let addlike_comment = function() {
    let comment_id = this.parentNode.querySelector('input[name=id_comment]').value;
    current_comment = this.parentNode;
    current_likes = this;
    current_dislikes = this.parentNode.querySelector('span.dislikes');
    
    let request4 = new XMLHttpRequest();
    request4.addEventListener('load', receive_answer_like_comment);
    request4.open('POST', '../actions/add_like_comment.php', true);
    request4.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request4.send(encodeForAjax({comment_id: comment_id, user_id: user_id}));
}

let receive_answer_like_comment = function(event) {
    let answer = JSON.parse(this.responseText);

    let likes_to_write = " likes";
    if(answer == 1)
        likes_to_write = " like";
 
    current_comment.removeChild(current_likes);

    let new_likes_comment = document.createElement('span');
    new_likes_comment.className = "likes";
    new_likes_comment.innerHTML = answer + '<img src="../icons/like_icon.png" alt="' + likes_to_write + '"></img>';
    current_comment.insertBefore(new_likes_comment, current_dislikes);
}

for(let i = 0; i < likes_comments.length; i++)
    likes_comments[i].addEventListener('click', addlike_comment);
/*END OF PART4*/

/*BEGINING OF PART5 : add dislike by clicking on comments*/
let add_dislike_comment = function() {
    let comment_id = this.parentNode.querySelector('input[name=id_comment]').value;
    current_comment = this.parentNode;
    current_likes = this;
    current_dislikes = this.parentNode.querySelector('span.dislikes');
    current_input = this.parentNode.querySelector('input[name=id_comment]');
    
    let request4 = new XMLHttpRequest();
    request4.addEventListener('load', receive_answer_dislike_comment);
    request4.open('POST', '../actions/add_dislike_comment.php', true);
    request4.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request4.send(encodeForAjax({comment_id: comment_id, user_id: user_id}));
}

let receive_answer_dislike_comment = function(event) {
    let answer = JSON.parse(this.responseText);

    let dislikes_to_write = " dislikes";
    if(answer == 1)
        dislikes_to_write = " dislike";
 
    current_comment.removeChild(current_dislikes);

    let new_dislikes_comment = document.createElement('span');
    new_dislikes_comment.className = "dislikes";
    new_dislikes.innerHTML = answer + ' <img src="../icons/dislike_icon.png" alt="' + dislikes_to_write + '"></img>';
    current_comment.insertBefore(new_dislikes_comment, current_input);
}

for(let i = 0; i < dislikes_comments.length; i++)
    dislikes_comments[i].addEventListener('click', add_dislike_comment);
/*END OF PART5*/