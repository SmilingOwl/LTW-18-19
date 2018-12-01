let profile = document.querySelector('#menu li:first-child');
let favorites = document.querySelector('#menu li:nth-child(2)');
let homepage = document.querySelector('#menu li:nth-child(3)');
let logout = document.querySelector('#menu li:nth-child(4)');
let buttons = document.getElementsByTagName('li');

let change_color = function() {
    this.style.backgroundColor = "black";
    this.style.color = "white";
}

let change_color_back = function() {
    this.style.backgroundColor = "initial";
    this.style.color = "initial";
}

for(let i = 0; i< buttons.length; i++){
    buttons[i].addEventListener('mouseover', change_color);
    buttons[i].addEventListener('mouseout', change_color_back);
}

let go_to_profile = function() {
    window.location.href="profile.php?user_id=1"; //to change here!!
}

profile.addEventListener('click', go_to_profile);

let go_to_favorites = function() {
    window.location.href="favorites.php?user_id=1"; //to change here!!
}

favorites.addEventListener('click', go_to_favorites);

let go_to_homepage = function() {
    window.location.href="homepage.php?user_id=1"; //to change here!!
}

homepage.addEventListener('click', go_to_homepage);