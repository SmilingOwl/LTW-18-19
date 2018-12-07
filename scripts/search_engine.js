let filter_stories_header = document.querySelector('#filter_stories');
let search_box = filter_stories_header.querySelector('input[name="search_box"]');

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

let show_filtered_stories = function(event) {
    let filtered_stories = JSON.parse(this.responseText);
    let stories_to_delete = document.querySelector('#stories');
    let where_to_add = stories_to_delete.parentNode;
    let footer_copyright = document.querySelector('#copyright');
    stories_to_delete.parentNode.removeChild(stories_to_delete);
    for(let i = 0; i < filtered_stories.length; i++) {
        stories_to_add = document.createElement('section');
        stories_to_add.id = "stories";
        stories_to_add.innerHTML = '<article id="story">' +
            '<header>' +
                '<h1><a href="story_item.php?story_id=' + filtered_stories[i].story_id+ '">' + filtered_stories[i].title + '</a></h1>' +
            '</header>' +
            '<p>' + filtered_stories[i].text + '</p>' +
            '<footer>' +
                '<span class="author">By ' + filtered_stories[i].username + '</span>' +
                '<span class="likes">0 <img src="../icons/like_icon.png" alt="likes"></span>' +
                '<span class="dislikes">0 <img src="../icons/dislike_icon.png" alt="dislikes"></span>' +
                '<span class="tasteChoice">' +
                    '<a href="taste_choice_stories.php?id_taste=' + filtered_stories[i].id_taste + '">#taste</a>' +
                '</span>' +
                '<span class="comments">0 ' +
                    '<img src="../icons/comment_icon.png" alt="comments"></span>' +
                '<span class="favorites">0 <img src="../icons/saved_icon.png" alt="favorites"></span>' +
                '<input type="hidden" name="story_id" value="' + filtered_stories[i].story_id + '">' +
                '<input type="hidden" name="user_id" value="' + filtered_stories[i].user_id + '">' +
            '</footer>' +
        '</article>';
        where_to_add.insertBefore(stories_to_add, footer_copyright);
    }
}

search_box.addEventListener('keypress', function(event){
    let search_word = search_box.value;
    if(event.key=="Enter"){
        let request = new XMLHttpRequest();
        request.addEventListener('load', show_filtered_stories);
        request.open('POST', '../actions/search.php', true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encodeForAjax({search_word: search_word}));
    }
});