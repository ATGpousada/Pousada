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
/* ---------- começo responsivo icon----------*/
function inicializaResponsivoIcon() {
  // Lagura atual da tela
  let larguraTela = $(window).width();
  
  // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
  if (larguraTela <= 340) {
    $('#icones').attr('style','display: none');
    $('#mnlogin').removeAttr('style');
  }
}
inicializaResponsivoIcon();
$(window).resize(() => {
  // Lagura atual da tela
  let larguraTela = $(window).width();

  // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
  if (larguraTela <= 340) {
      $('#icones').attr('style','display: none');
      $('#mnlogin').removeAttr('style');
  }else{
    $('#icones').removeAttr('style');
    $('#mnlogin').attr('style','display: none');
  }
});
/* ---------- fim responsivo icon----------*/


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




// ---------------------------- Começo login ----------------------------

$(function() {
    $('.form-input-item').focusin(function() {
        $(this).siblings("label").css({top:"3px", left:"12px", "font-size":"12px"});
    });

    $('.form-input-item').focusout(function() {
        if ($(this).val() == "") {
            $(this).siblings("label").css({top:"15px", left:"20px", "font-size":"16px"});
        }
    });
});

// Password Flutter 
function mostrarSenha(){
  var inputPass = document.getElementById('senha')
  var btnShowPass = document.getElementById('btny')

  if (inputPass.type === 'password'){
    inputPass.setAttribute('type', 'text')
    btnShowPass.classList.replace('bi-eye', 'bi-eye-slash-fill')
  }else{
    inputPass.setAttribute('type', 'password')
    btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye')
  }
}

// ---------------------------- Fim login ----------------------------



// ---------------------------- Começo SingUp ----------------------------

// Mascara do Telefone
function mascara(i) {
    var v = i.value;
    if(!/[\d()\-]/.test(v[v.length-1])) { // impede entrar outro caractere que não seja número, parênteses ou hífen
      i.value = v.substring(0, v.length-1);
      return;
    }
    if(v.length < 2) {
      i.setAttribute("maxlength", "14");
    } else {
      i.setAttribute("maxlength", "15");
    }
    if(v.length == 2) {
      i.value = "(" + i.value + ") ";
    } else if(v.length == 10) {
      i.value = i.value + "-";
    } else if(v.length == 15) {
      i.value = i.value.substring(0, 15);
    }
  }
  
// Mascara do Cpf
    function mascarac(i){
        var v = i.value;
        if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
            i.value = v.substring(0, v.length-1);
            return;
        }
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";
    }

// Mascara do RG
function mascaraRG(i) {
    var v = i.value;
    if(isNaN(v[v.length-1])) { // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
    }
    i.setAttribute("maxlength", "12");
    if(v.length == 2 || v.length == 6) {
      i.value += ".";
    } else if(v.length == 10) {
      i.value += "-";
    }
  }

// Mascara Cep
function mascaraCEP(i) {
  var v = i.value;
  if(!/[\d\-]/.test(v[v.length-1])) { // impede entrar outro caractere que não seja número ou hífen
    i.value = v.substring(0, v.length-1);
    return;
  }
  i.setAttribute("maxlength", "9");
  if(v.length == 5) {
    i.value = i.value + "-";
  } else if(v.length == 9) {
    i.value = i.value.substring(0, 9);
  }
}

// ---------------------------- Fim SingUp ----------------------------




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

// Scroll
window.scroll({
    top:0,
    behavior:'smooth'
})
// ---------------------------- Fim geral ----------------------------
