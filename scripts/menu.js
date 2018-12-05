profile = document.querySelector('#menu li:first-child');
favorites = document.querySelector('#menu li:nth-child(2)');
homepage = document.querySelector('#menu li:nth-child(3)');
logout = document.querySelector('#menu li:nth-child(4)');
close_menu = document.querySelector('#menu li:nth-child(5)');
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

hide_menu = function() {
    let menu = document.querySelector('#menu');
    let script_to_delete = document.querySelector('head script:first-of-type');
    let head = document.querySelector('head');
    let html = document.querySelector('html');

    head.removeChild(script_to_delete);
    html.removeChild(menu);
}

close_menu.addEventListener('click', hide_menu);