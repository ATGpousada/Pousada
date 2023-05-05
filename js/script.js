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

$(function() {
  $('#cep').keyup(function() {
    if ($('#cep').val().replace(/[^0-9]/, '').length == 8) {
      $('#cidade').siblings("label").css({top:"3px", left:"12px", "font-size":"12px"});
      $('#uf').siblings("label").css({top:"3px", left:"12px", "font-size":"12px"});
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
function mostrarSenha2(){
  var inputPass = document.getElementById('senhaConfirma')
  var btnShowPass = document.getElementById('btny2')

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
const mask = {
  // mascara cpf
  cpf(value) {
    return value
      .replace(/\D/g, '') // aceita somente caracteres numero.
      .replace(/(\d{3})(\d)/, '$1.$2') // () => permite criar grupos de captura.
      .replace(/(\d{3})(\d)/, '$1.$2') // $1, $2, $3 ... permite substituir a captura pela propria captura acrescida de algo
      .replace(/(\d{3})(\d{2})/, '$1-$2') // substitui '78910' por '789-10'.
      .replace(/(-\d{2})\d+?$/, '$1');
  },
  // mascara rg
  rg(value) {
    return value
      .replace(/\D/g, '') // aceita somente caracteres numero.
      .replace(/(\d{2})(\d)/, '$1.$2') // () => permite criar grupos de captura.
      .replace(/(\d{3})(\d)/, '$1.$2') // $1, $2, $3 ... permite substituir a captura pela propria captura acrescida de algo
      .replace(/(\d{3})(\d{1})/, '$1-$2') // substitui '78910' por '789-10'.
      .replace(/(-\d{1})\d+?$/, '$1');
  },
  // mascara telefone
  phone(value) {
    return value
      .replace(/\D/g, '')// aceita somente caracteres numero.
      .replace(/(\d{2})(\d)/, '(+$1) $2')// () => permite criar grupos de captura.
      .replace(/(\d{2})(\d)/, '$1 $2')// () => permite criar grupos de captura.
      .replace(/(\d{4})(\d)/, '$1-$2') //
      .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
      .replace(/(\d{4})\d+?$/, '$1');
  },
  // mascara cep
  cep(value) {
    return value
      .replace(/\D/g, '')
      .replace(/(\d{5})(\d)/, '$1-$2')
      .replace(/(-\d{3})\d+?$/, '$1');
  },
};

document.querySelectorAll('input').forEach((input) => {
  const field = input.dataset.js;

  input.addEventListener('input', (event) => {
    event.target.value = mask[field](event.target.value);
  });
});
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
