filter_stories_header = document.querySelector('#filter_stories');
let sort_menu = filter_stories_header.querySelector('select');

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}


let show_sorted_stories = function(event) {
    let filtered_stories = JSON.parse(this.responseText);
    let stories_to_delete = document.querySelectorAll('#stories');
    let where_to_add = stories_to_delete[0].parentNode;
    let footer_copyright = document.querySelector('#copyright');
    for(let i = 0; i < stories_to_delete.length; i++)
        stories_to_delete[i].parentNode.removeChild(stories_to_delete[i]);
    let stories_ids = [];
    let flag_continue;
    if(filtered_stories.length == 0) {
        stories_to_add = document.createElement('section');
        stories_to_add.id = "stories";
        stories_to_add.innerHTML = "<h3>We couldn't find any stories!</h3>";
        where_to_add.insertBefore(stories_to_add, footer_copyright);
        return;
    }
    section_to_add = document.createElement('section');
    section_to_add.id = "stories";

    for(let i = 0; i < filtered_stories.length; i++) {
        for(let j = 0; j < stories_ids.length; j++){
            if(filtered_stories[i].story_id == stories_ids[j]) {
                flag_continue = true;
                break;
            }
        }
        if(flag_continue)
            continue;
        stories_ids.push(filtered_stories[i].story_id);
        stories_to_add = document.createElement('article');
        stories_to_add.id = "story";
        stories_to_add.innerHTML = '<header>' +
                '<h1><a href="story_item.php?story_id=' + filtered_stories[i].story_id+ '">' + filtered_stories[i].title + '</a></h1>' +
            '</header>' +
            '<p>' + filtered_stories[i].text + '</p>' +
            '<footer>' +
                '<span class="author">By ' + filtered_stories[i].username + '</span>' +
                '<span class="likes">' + filtered_stories[i].likes + ' <img src="../icons/like_icon.png" alt="likes"></span>' +
                '<span class="dislikes">' + filtered_stories[i].dislikes + ' <img src="../icons/dislike_icon.png" alt="dislikes"></span>' +
                '<span class="tasteChoice">' +
                    '<a href="taste_choice_stories.php?id_taste=' + filtered_stories[i].id_taste + '">#taste</a>' +
                '</span>' +
                '<span class="comments">' + filtered_stories[i].comments +
                    '<img src="../icons/comment_icon.png" alt="comments"></span>' +
                '<span class="favorites">'+ filtered_stories[i].favorites +' <img src="../icons/saved_icon.png" alt="favorites"></span>' +
                '<input type="hidden" name="story_id" value="' + filtered_stories[i].story_id + '">' +
                '<input type="hidden" name="user_id" value="' + filtered_stories[i].user_id + '">' +
            '</footer>';
            section_to_add.appendChild(stories_to_add);
    }
    where_to_add.insertBefore(section_to_add, footer_copyright);
}

changed_sort_option = function() {
    new_option = sort_menu.value;
    
    let request = new XMLHttpRequest();
    request.addEventListener('load', show_sorted_stories);
    request.open('POST', '../actions/sort.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({sort_option: new_option}));
}
sort_menu.addEventListener('change', changed_sort_option);