let commentForm = document.querySelector('#comments form');

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
  }

let submitComment = function() {
    event.preventDefault();
    
    let user_id=this.querySelector('input[name=user_id]').value;
    let story_id=this.querySelector('input[name=story_id]').value;
    let text=this.querySelector('textarea[name=text]').value;
    console.log("text: " + text);

    let request = new XMLHttpRequest();
    request.addEventListener('load', receiveComments);
    request.open('POST', 'add_comment.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({story_id: story_id, user_id: user_id, text: text}));
};

function receiveComments(event) {
    let section = document.querySelector('#comments');
    
    console.log(this.responseText);
    let comments = JSON.parse(this.responseText);
  
    for (let i = 0; i < comments.length; i++) {
      let comment = document.createElement('article');
      comment.classList.add('comment');
  
      comment.innerHTML = '<span class="user">' +
        comments[i].name + '</span><p>' +
        comments[i].text + '</p>' + 
        '<span class="likes">0 likes </span> <span class="dislikes">0 dislikes</span>';
  
      section.insertBefore(comment, commentForm);
    }
}
commentForm.addEventListener('submit', submitComment);