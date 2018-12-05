menu_icon = document.querySelector('header span');
head = document.querySelector('head');
head_script = document.querySelector('head script');
body = document.querySelector('body');
html = document.querySelector('html');
header = document.querySelector('body header');
is_menu_showing = false;

let show_menu = function() {
    let menu = document.createElement('nav');
    menu.id = "menu";
    menu.innerHTML =
    '<ul>' +
        '<li>My Profile</li>' +
        '<li>My Favorites</li>' +
        '<li>Homepage</li>' +
        '<li>Log Out</li>' +
        '<li>Hide Menu</li>' +
    '</ul>';
    html.insertBefore(menu, body);

    let new_script = document.createElement('script');
    new_script.src = "../scripts/menu.js";
    head.insertBefore(new_script, head_script);
    is_menu_showing=true;
}

menu_icon.addEventListener('click', show_menu);