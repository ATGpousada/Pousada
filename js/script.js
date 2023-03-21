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
/* Fim responsivo */


/* Começo efeito header fixo */
const header = document.getElementById('area-header');
document.addEventListener('scroll', function () {
    if (window.scrollY > 0 ) {
        header.classList.remove('p-2');
        header.classList.add('p-0');
    } else {
        header.classList.remove('p-0');
        header.classList.add('p-2');
    }
});
/* Fim efeito header fixo */
// ---------------------------- Fim header ----------------------------


// ---------------------------- Começo contact ----------------------------
/* Começo adicionando padding no reponsivo (entre localização e formulario) */
const separadorArea = document.getElementById('separador-responsive')
function contactResponsivo() {
    if (window.innerWidth < 768) {
        separadorArea.classList.add('mt-3');
        separadorArea.classList.add('mb-4');
        separadorArea.hidden=false;
    } else {
        separadorArea.classList.remove('mt-3');
        separadorArea.classList.remove('mb-4');
        separadorArea.hidden=true;
    }
}
/* Fim adicionando padding no reponsivo (entre localização e formulario) */
// ---------------------------- Fim contact ----------------------------


// ---------------------------- Começo geral ----------------------------
window.onresize = function() {
    /* Começo header */
    var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    if (w > 991) {
        menu.classList.add('order-1');
        icones.classList.add('order-2');
    } else {
        menu.classList.remove('order-1');
        icones.classList.remove('order-2');
    }

    headerReponsivo();
    /* Fim header */

    /* Começo contact */
    if (window.innerWidth < 768) {
        separadorArea.classList.add('mt-3');
        separadorArea.classList.add('mb-4');
        separadorArea.hidden=false;
    } else {
        separadorArea.classList.remove('mt-3');
        separadorArea.classList.remove('mb-4');
        separadorArea.hidden=true;
    }
    /* Fim contact */
};

/* Começo header e contact mesmo evento */
window.addEventListener("beforeunload", headerReponsivo(), contactResponsivo());
/* Fim header e contact mesmo evento */
// ---------------------------- Fim geral ----------------------------

