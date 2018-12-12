profile = document.querySelector('#menu li:first-child');
favorites = document.querySelector('#menu li:nth-child(2)');
homepage = document.querySelector('#menu li:nth-child(3)');
change_interests = document.querySelector('#menu li:nth-child(4)');
about = document.querySelector('#menu li:nth-child(5)');
edit_account = document.querySelector('#menu li:nth-child(6)');
delete_account = document.querySelector('#menu li:nth-child(7)');

body=document.querySelector('body');

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
    window.location.href="favorites.php";
}

favorites.addEventListener('click', go_to_favorites);

go_to_edit_profile = function() {
    window.location.href="edit_profile.php";
}
edit_account.addEventListener('click',go_to_edit_profile);

go_to_homepage = function() {
    window.location.href="homepage.php";
}

homepage.addEventListener('click', go_to_homepage);

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

go_to_first_page = function() {
    window.location.href="first_page.php";
}

delete_account_func = function(){
    let header=document.querySelector('body> header:first-of-type');
    let alertDelete = document.createElement('article');
    alertDelete.classList.add('alert');
        
    alertDelete.innerHTML =  '<p>' + "Are you sure you want to delete your account?" +'</p>'
        + '<input type="submit" name="Confirm" value="Confirm">'+
        '<input type="submit" name="Cancel" value="Cancel">';

        body.insertBefore(alertDelete, header);

       let confirm_button= alertDelete.querySelector('input[name="Confirm"]');
       let cancel_button= alertDelete.querySelector('input[name="Cancel"]');

        cancel_button.addEventListener('click',function(){
            body.removeChild(alertDelete);
        })
       confirm_button.addEventListener('click', function(){
        let user_id=document.querySelector('input[name=user_id]').value;
        let request = new XMLHttpRequest();
        request.addEventListener('load', go_to_first_page);
        request.open('POST', '../actions/delete_account.php', true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encodeForAjax({user_id: user_id}));
       })


}

delete_account.addEventListener('click', delete_account_func);

go_to_about_page = function(){
    window.location.href="about.php";
}

about.addEventListener('click', go_to_about_page);

go_to_taste_choices = function() {
    window.location.href="taste_choices.php";
}

change_interests.addEventListener('click', go_to_taste_choices);