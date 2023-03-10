// Header
let menu = document.getElementById('navbarTogglerDemo02');
let icones = document.getElementById('icones');

function headerReponsivo() {
    if (window.innerWidth > 991) {
        menu.classList.add('order-1');
        icones.classList.add('order-2');
    } else {
        menu.classList.remove('order-1');
        icones.classList.remove('order-2');
    }
}