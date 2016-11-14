/*create additional functions for pwd2*/
function show() {
    var p = document.getElementById('pwd'); /*pwd*/
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('pwd'); /*pwd*/
    p.setAttribute('type', 'password');
}

function show_p2() {
    var q = document.getElementById('pwd2'); /*pwd*/
    q.setAttribute('type', 'text');
}

function hide_p2() {
    var q = document.getElementById('pwd2'); /*pwd*/
    q.setAttribute('type', 'password');
}

var pwShown = 0;
var pwShown2 = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);



document.getElementById("eye2").addEventListener("click", function () {
    if (pwShown2 == 0) {
        pwShown2 = 1;
        show_p2();
    } else {
        pwShown2 = 0;
        hide_p2();
    }
}, false);


