profile = document.querySelector('#menu li:first-child');
favorites = document.querySelector('#menu li:nth-child(2)');
homepage = document.querySelector('#menu li:nth-child(3)');
logout = document.querySelector('#menu li:nth-child(4)');
delete_account = document.querySelector('#menu li:nth-child(5)');
buttons = document.getElementsByTagName('li');

change_color = function() {
    this.style.backgroundColor = "#66FCF1";
    this.style.color = "black";
}

change_color_back = function() {
    this.style.backgroundColor = "initial";
    this.style.color = "initial";
}

for(let i = 0; i< buttons.length; i++){
    buttons[i].addEventListener('mouseover', change_color);
    buttons[i].addEventListener('mouseout', change_color_back);
}

go_to_profile = function() {
    window.location.href="profile.php?";
}

profile.addEventListener('click', go_to_profile);

go_to_favorites = function() {
    window.location.href="favorites.php?";
}

favorites.addEventListener('click', go_to_favorites);

go_to_homepage = function() {
    window.location.href="homepage.php?";
}

homepage.addEventListener('click', go_to_homepage);

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

go_to_first_page = function() {
    window.location.href="first_page.php?";
}

delete_account_func = function(){
    let user_id=document.querySelector('input[name=user_id]').value;

    let request = new XMLHttpRequest();
    request.addEventListener('load', go_to_first_page);
    request.open('POST', '../actions/delete_account.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({user_id: user_id}));
}

delete_account.addEventListener('click', delete_account_func);

logout_func = function(){
    let request = new XMLHttpRequest();
    request.addEventListener('load', go_to_first_page);
    request.open('POST', '../actions/action_logout.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send();
}

logout.addEventListener('click', logout_func);