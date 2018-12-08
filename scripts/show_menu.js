menu_icon = document.querySelector('header span');
head = document.querySelector('head');
head_script = document.querySelector('head script');
body = document.querySelector('body');
html = document.querySelector('html');
header = document.querySelector('body header');
is_menu_showing = false;

let hide_menu = function() {
    let menu = document.querySelector('#menu');
    let script_to_delete = document.querySelector('script[src="../scripts/menu.js"]');
    let css_to_delete = document.querySelector('link[href="../css/menu_layout.css"]');
    let head = document.querySelector('head');
    let html = document.querySelector('html');

    head.removeChild(script_to_delete);
    head.removeChild(css_to_delete);
    html.removeChild(menu);
}

let show_menu = function() {
    if(is_menu_showing) {
        is_menu_showing = false;
        hide_menu();
        return;
    }
    let menu = document.createElement('nav');
    menu.id = "menu";
    menu.innerHTML =
    '<ul>' +
        '<li>My Profile</li>' +
        '<li>My Favorites</li>' +
        '<li>Homepage</li>' +
        '<li>Log Out</li>' +
        '<li>Delete Account</li>' +
    '</ul>';
    html.insertBefore(menu, body);

    let new_script = document.createElement('script');
    new_script.src = "../scripts/menu.js";
    head.insertBefore(new_script, head_script);
    let new_css = document.createElement('link');
    new_css.href = "../css/menu_layout.css";
    new_css.rel = "stylesheet";
    head.insertBefore(new_css, new_script);
    is_menu_showing = true;
}

menu_icon.addEventListener('click', show_menu);