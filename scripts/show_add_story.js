add_story_button = document.querySelector('span.add_story');
clicked_button = false;

let show_add_story_popup = function() {
    if(clicked_button)
        return;
    let request = new XMLHttpRequest();
    request.addEventListener('load', receive_html);
    request.open('POST', '../actions/create_story.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send();
}

let receive_html = function(event) {
    let taste_choices=JSON.parse(this.responseText);
    let user_id = document.querySelector('body > input').value;
    let section_stories = document.querySelector('#stories');
    
    let body=document.querySelector('body');
    let popup = document.createElement('section');
    popup.id = "create_story";
    popup.innerHTML = 
        '<span class="close"><img src="../icons/close_icon.png" alt="close"></span>' +
        '<form action="../actions/add_story.php" method="post" enctype="multipart/form-data">' +
        '<label>Title: <textarea name="title"></textarea></label>' +
        '<textarea name="text"> Write your story here! </textarea>'+
        '<label>Choose picture: ' + 
            '<input type="file" name="fileToUpload" id="fileToUpload"> ' + 
        '</label>' + 
        '<input type="hidden" name="user_id" value="' + user_id + '">' +
        '<select name="tasteChoice">' +
        '</select>' +
        '<input type="submit" value="Submit">' +
        '</form>';
    let select = popup.querySelector('select');
    for(let i = 0; i < taste_choices.length; i++){
        let option = document.createElement('option');
        option.value = taste_choices[i].id_taste
        option.innerHTML = taste_choices[i].taste;
        select.appendChild(option);
    }
    body.insertBefore(popup, section_stories);

    let exit = popup.querySelector('span.close');
    exit.addEventListener('click', function() {
        clicked_button = false;
        body.removeChild(popup);
    });

    clicked_button = true;
}

add_story_button.addEventListener('click', show_add_story_popup);