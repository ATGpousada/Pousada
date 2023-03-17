// ---------------------------- Começo header index ----------------------------
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
const header = document.getElementById('area-header-index');
document.addEventListener('scroll', function () {
    if (window.scrollY > 0 ) {
        header.classList.remove('p-2');
        header.classList.add('p-0');
        header.classList.add('bg-body-tertiary');
    } else {
        header.classList.remove('p-0');
        header.classList.add('p-2');
        if (document.getElementById('btn-menu-toggler').attributes['aria-expanded'].value == 'false') {
            header.classList.remove('bg-body-tertiary');
        }
    }
});
/* Fim efeito header fixo */

/* Começo efeito mundança de cor do header com icon-burguer responsivo */
function colorResponsive() {
    if (window.scrollY == 0 ) {
        if (document.getElementById('btn-menu-toggler').attributes['aria-expanded'].value == 'true') {
            header.classList.add('bg-body-tertiary');
        } else {
            header.classList.remove('bg-body-tertiary');
        }
    } 
}
addEventListener('click', colorResponsive);
/* Fim efeito mundança de cor do header com icon-burguer responsivo */
// ---------------------------- Fim header index ----------------------------




// ---------------------------- Começo header geral ----------------------------
/* Começo efeito header fixo */
const headerGeral = document.getElementById('area-header-geral');
document.addEventListener('scroll', function () {
    if (window.scrollY > 0 ) {
        headerGeral.classList.remove('p-2');
        headerGeral.classList.add('p-0');
    } else {
        headerGeral.classList.remove('p-0');
        headerGeral.classList.add('p-2');
    }
});
/* Fim efeito header fixo */
// ---------------------------- Fim header geral ----------------------------