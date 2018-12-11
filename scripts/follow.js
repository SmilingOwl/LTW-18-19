follow_button = document.querySelector('span.follow');
followers_number = document.querySelector('span.followers');
user_id = document.querySelector('body > header input[name="user_id"]').value;
id_taste = document.querySelector('body > header input[name="id_taste"]').value;

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

add_follower = function() {
    let request_followers = new XMLHttpRequest();
    request_followers.addEventListener('load', change_followers);
    request_followers.open('POST', '../actions/add_follower.php', true);
    request_followers.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request_followers.send(encodeForAjax({id_taste: id_taste, user_id: user_id}));
}

change_followers = function(event) {
    let answer = JSON.parse(this.responseText);
    if(answer == true) { 
        let current_followers = parseInt(followers_number.textContent.charAt(0))+1;
        let to_write = "Followers";
        if(current_followers == 1) 
            to_write = "Follower";
        followers_number.style.color = "#DCDCDC";
        followers_number.textContent = current_followers + " " + to_write;
        follow_button.textContent = "Unfollow";
    }
    else {
        let current_followers = parseInt(followers_number.textContent.charAt(0))-1;
        let to_write = "Followers";
        if(current_followers == 1) 
            to_write = "Follower";
        followers_number.style.color = "#66FCF1";
        followers_number.textContent = current_followers + " " + to_write;
        follow_button.textContent = "Follow";
    }

}

let request_followers = new XMLHttpRequest();
request_followers.addEventListener('load', function(event){
    if(JSON.parse(this.responseText)) {
        followers_number.style.color = "#DCDCDC";
        follow_button.textContent = "Unfollow";
    }
});
request_followers.open('POST', '../actions/check_follower.php', true);
request_followers.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
request_followers.send(encodeForAjax({id_taste: id_taste, user_id: user_id}));

follow_button.addEventListener('click', add_follower);