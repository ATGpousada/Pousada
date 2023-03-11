// ---------------------------- Começo header ----------------------------
/* Começo responsivo */
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
window.addEventListener("beforeunload", headerReponsivo());
window.onresize = function() {
    var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if (window.innerWidth > 991) {
        menu.classList.add('order-1');
        icones.classList.add('order-2');
    } else {
        menu.classList.remove('order-1');
        icones.classList.remove('order-2');
    }
};
/* Fim responsivo */


/* Começo efeito header fixo */
const header = document.getElementById('area-header');
const ajuste = document.getElementById('ajuste');
document.addEventListener('scroll', function () {
    if (window.scrollY > 0 ) {
        header.classList.remove('p-2');
        header.classList.add('p-0');
        header.classList.add('bg-body-tertiary');
    } else {
        header.classList.remove('p-0');
        header.classList.add('p-2');
        header.classList.remove('bg-body-tertiary');
    }
});
/* Fim efeito header fixo */
// ---------------------------- Fim header ----------------------------