comments = document.querySelectorAll('#stories span.comments');
let footer;
showing = [];

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

let show_comments = function()  {
    footer = this.parentNode;
    if (this.showing) {
        let comments_section = footer.parentNode.querySelector('#comments_section');
        footer.parentNode.removeChild(comments_section);
        this.showing = false;
        return;
    }
    this.showing = true;
    let story_id = footer.querySelector('input').value;
    console.log(story_id);

    let request = new XMLHttpRequest();
    request.addEventListener('load', receive_answer_show_comments);
    request.open('POST', '../actions/get_comments.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({story_id: story_id}));
}

let receive_answer_show_comments = function() {
    let story = footer.parentNode;
    console.log(story);
    let comments_to_show = JSON.parse(this.responseText);
    
    console.log(comments_to_show);
    let new_comment_section = document.createElement('section');
    new_comment_section.id = "comments_section";
    for (let i = 0; i < comments_to_show.length; i++)
    new_comment_section.innerHTML +=  '<article class="comment">' +
        '<span class="user">' + comments_to_show[i].username + ' </span>' + 
        '<p>' + comments_to_show[i].text + '</p>';

    story.appendChild(new_comment_section);
}

for(let i = 0; i < comments.length; i++) {
    comments[i].addEventListener('click', show_comments);
    comments[i].showing=false;
}