let storyForm = document.querySelector('#create_story form');console.log(storyForm);

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

let submit_story = function() {
    event.preventDefault();
    
    let user_id=this.querySelector('input[name=user_id]').value;
    let title=this.querySelector('textarea[name=title]').value;
    let text=this.querySelector('textarea[name=text]').value;
    let img=this.querySelector('textarea[name=image]').value;
    let option_index=this.querySelector('select[name=tasteChoice]').selectedIndex;
    let id_taste_choice=this.querySelector('select[name=tasteChoice]').options[option_index].value;

    let request = new XMLHttpRequest();
    request.addEventListener('load', receive_story);
    request.open('POST', '../templates/add_story.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({user_id: user_id, title: title, text: text, img: img, id_taste_choice: id_taste_choice}));
};

let receive_story = function(event) {
    console.log(this.responseText);
    let section = document.querySelector('#stories');
    let first_story = document.querySelector('#stories article:first-child');
    
    let story = JSON.parse(this.responseText);
  
      let new_story = document.createElement('article');
  
      new_story.innerHTML = '<header class="user">' +
        '<h1> <a href="story_item.php?story_id=' + story.story_id + '&user_id=' + story.user_id + '">' + story.title + '</a></h1>' +
        '</header>' +
        '<p>' + story.text + '</p>' +
        '<footer>' +
        '<span class="author">By ' + story.username + '</span>' +
        '<span class="likes">0 likes</span>' +
        '<span class="dislikes">0 dislikes</span>' +
        '<span class="tasteChoice"> <a href="story_item.html">#' + story.taste + '</a></span>' +
        ' <a class="comments" href="story_item.php?story_id=' + story.story_id + '&user_id=' + story.user_id + '">'+
        '0 comments</a>' +
        '<input type="hidden" name="story_id" value="' + story.story_id + '">' +
        '</footer>';
  
      section.insertBefore(new_story, first_story);
}
storyForm.addEventListener('submit', submit_story);