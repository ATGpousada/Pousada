// ------------------------------------------ Começo da área geral ------------------------------------//
//Inicializa sem um evento
function inicializaResponsivoGeral() {
    // Lagura atual da tela
    let larguraTela = $(window).width();
    
    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela <= 630) {
        $('#item-select').removeClass('col-6').addClass('col-12 mb-3');
        $('#item-info').removeClass('col-6').addClass('col-12');
    }
}

// Chamando a função
inicializaResponsivoGeral();

// Evento que dispara quando a tela é redimensionada
$(window).resize(() => {
    // Lagura atual da tela
    let larguraTela = $(window).width();

    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela <= 630) {
        $('#item-select').removeClass('col-6').addClass('col-12 mb-3');
        $('#item-info').removeClass('col-6').addClass('col-12');
    } else {
        $('#item-select').removeClass('col-12 mb-3').addClass('col-6');
        $('#item-info').removeClass('col-12').addClass('col-6');
    }
});
// ------------------------------------------ Fim da área geral ------------------------------------//




// ------------------------------------------ Começo da área perfil ------------------------------------//
//Inicializa sem um evento
function inicializaResponsivoPerfil() {
    // Lagura atual da tela
    let larguraTela = $(window).width();
    
    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela <= 970) {
        $('#dados-pessoais').removeClass('w-50').addClass('w-100');
        $('#contato').removeClass('w-50').addClass('w-100');
        $('#group-formulario').removeClass('d-flex gap-5');
    }
}

// Chamando a função
inicializaResponsivoPerfil();

// Evento que dispara quando a tela é redimensionada
$(window).resize(() => {
    // Lagura atual da tela
    let larguraTela = $(window).width();

    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela <= 970) {
        $('#dados-pessoais').removeClass('w-50').addClass('w-100');
        $('#contato').removeClass('w-50').addClass('w-100');
        $('#group-formulario').removeClass('d-flex gap-5');
    } else {
        $('#dados-pessoais').removeClass('w-100').addClass('w-50');
        $('#contato').removeClass('w-100').addClass('w-50');
        $('#group-formulario').addClass('d-flex gap-5');
    }
});
// ------------------------------------------ Fim da área perfil ------------------------------------//




// ------------------------------------------ Começo da área formas pagamento ------------------------------------//
//Inicializa sem um evento
function inicializaResponsivoPagamento() {
    // Lagura atual da tela
    let larguraTela = $(window).width();
    
    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela <= 992) {
        $('#conteudoPagamento').addClass('flex-column');
        $('#item-info').removeClass('col-6').addClass('col-12');
    }
}

// Chamando a função
inicializaResponsivoPagamento();

// Evento que dispara quando a tela é redimensionada
$(window).resize(() => {
    // Lagura atual da tela
    let larguraTela = $(window).width();

    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela < 992) {
        $('#conteudoPagamento').addClass('flex-column');
        $('#item-info').removeClass('col-6').addClass('col-12');
    } else {
        $('#conteudoPagamento').removeClass('flex-column');
        $('#item-info').addClass('col-16').removeClass('col-12');
    }

    if (larguraTela < 380) {
        $('#cardFormasPagamento').addClass('d-none');
    } else {
        $('#cardFormasPagamento').removeClass('d-none');
    }
});

// Rotação do cartão qaundo o input cvv estiver focus
$(function() {
    // Rotação com o focus
    $('#cvv').focusin(function() {
        $('.flip-card-inner').css({
            transform: 'rotateY(180deg)'
        });
    });

    // Tira a rotação sem o focus
    $('#cvv').focusout(function() {
        $('.flip-card-inner').removeAttr('style');
    });
});

// Array com mask para os input
const mask = {
    // Expressões regulares para as masks
    cpf(value) {
        return value
            .replace(/\D/g, '') // aceita somente caracteres numero.
            .replace(/(\d{3})(\d)/, '$1.$2') // () => permite criar grupos de captura.
            .replace(/(\d{3})(\d)/, '$1.$2') // $1, $2, $3 ... permite substituir a captura pela propria captura acrescida de algo
            .replace(/(\d{3})(\d{2})/, '$1-$2') // substitui '78910' por '789-10'.
            .replace(/(-\d{2})\d+?$/, '$1');
    },

    phone(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '($1) - $2')
            .replace(/(\d{4})(\d)/, '$1-$2')
            .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
            .replace(/(\d{4})\d+?$/, '$1');
    },

    cep(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{5})(\d)/, '$1-$2')
            .replace(/(-\d{3})\d+?$/, '$1');
    },

    cartao(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{4})(\d)/, '$1 $2')
            .replace(/(\d{4})(\d)/, '$1 $2')
            .replace(/(\d{4})(\d)/, '$1 $2')
            .replace(/(-\d{4})\d+?$/, '$1');
    },

    data(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '$1 / $2')
            .replace(/(\d{2})(\d)/, '$1');
    },

    cvv(value) {
        return value
            .replace(/\D/g, '');
    },
};

// Adiciona mask nos input
document.querySelectorAll('input').forEach((input) => {
    const field = input.dataset.js;
  
    input.addEventListener('input', (event) => {
      event.target.value = mask[field](event.target.value);
    });
});

// Var para descobrir bandeira do cartão
var tgdeveloper = {
    // Funcão que irá descobrir
    getCardFlag: function(cardnumber) {
        // Irá tirar todos os espaços do parametro
        var cardnumber = cardnumber.replace(/[^0-9]+/g, '');

        // Matriz com as expressões regulares do cartão
        var cards = {
            // Visa
            visa      : /^4[0-9]{12}(?:[0-9]{3})/,
            //Mastercard
            mastercard : /^5[1-5][0-9]{14}/,
            // Diners
            diners    : /^3(?:0[0-5]|[68][0-9])[0-9]{11}/,
            // American Express
            amex      : /^3[47][0-9]{13}/,
            // Discover
            discover  : /^6(?:011|5[0-9]{2})[0-9]{12}/,
            // Hipercard
            hipercard  : /^(606282\d{10}(\d{3})?)|(3841\d{15})/,
            // Elo
            elo        : /^((((636368)|(438935)|(504175)|(451416)|(636297))\d{0,10})|((5067)|(4576)|(4011))\d{0,12})/,
        };

        // Laço que irá percorres a matriz para verificação
        for (var flag in cards) {
            // Verificação de qual bandeira é com o valor do parametro
            if(cards[flag].test(cardnumber)) {  
                // Rertono do nome da bandeira
                return flag;
            }
        }

        // Retorno caso não tenha nenhuma expressão correspondente
        return false;
    }
}

// Função (evento) para identificar a bandeira do cartão
$(document).ready(function() {
    // Função (evento) para ler o valor dentro do input
    $('#numeroCartao').on('input', function() {
        // Valor do input
        var valor = $(this).val();
        
        // Verifica se tem valor
        if (valor != '') {
            // Caso seja visa
            if (tgdeveloper.getCardFlag(valor) == 'visa') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#69d0e1');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('VISA');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '21.9em');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14.5em');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/visa-17.svg" alt="" style="width: 50px;"></img>');
       
              // Caso seja mastercard
            } else if (tgdeveloper.getCardFlag(valor) == 'mastercard') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#8b1616');

              // Caso seja american express  
            } else if (tgdeveloper.getCardFlag(valor) == 'amex') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#0c01a7');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('AMERICAN EXPRESS');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14.5em');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/american-express-28.svg" alt="" style="width: 45px; border-radius: 3px;"></img>');

              // Caso seja diners  
            } else if (tgdeveloper.getCardFlag(valor) == 'diners') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#747474');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('DINERS');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '20.5em');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14.5em');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/diners-svgrepo-com.svg" alt="" style="width: 60px;"></img>');

              // Caso seja discover  
            } else if (tgdeveloper.getCardFlag(valor) == 'discover') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#098b00');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('DISCOVER');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '19.5em');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14.5');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/discover-svgrepo-com.svg" alt="" style="width: 50px;"></img>');

              // Caso seja hipercard  
            } else if (tgdeveloper.getCardFlag(valor) == 'hipercard') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#d70000');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('HIPERCARD');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '18.5em');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14em');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/hipercard-29.svg" alt="" style="width: 60px;"></img>');

              // Caso seja elo  
            } else if (tgdeveloper.getCardFlag(valor) == 'elo') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#3c3838');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('ELO');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '21.9em');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14.5em');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/elo-30.svg" alt="" style="width: 50px;"></img>');

            }
        // Caso não, ele deixa como default os dados do "modelo cartão"
        } else {
            // Cor do cartão
            $('#add-flip-card-front, #add-flip-card-back').css('background-color', '');
            // Nome da bandeira - Posição
            $('#add-cartaoNome').css('left', '');
            // Icone da bandeira - Posição
            $('#add-logoModal').css('left', '');
            // Nome da bandeira - Texto
            $('#add-cartaoNome').text('MASTERCARD');
            // Icone da bandeira - Imagem
            $('#add-logoModal').html('<img src="../images/bandeiras_cartao/mastercard.svg" alt=""></img>');
        }
    });
});

// ocultar numeros cartao deixando somente os 4 ultimos
const mascaraNumero = (numero) => {
    return [...new Array(3).fill('****'), numero.slice(-4)].join('-');
  };
  
  document.getElementById('mascara-cartao').addEventListener('click', (event) => {
    const numeroCartao = document.querySelector('[data-js="cartao"]').value;
  
    if (numeroCartao.split('-').join('').length === 16) {
      document.getElementById('numero-salvo').innerHTML = mascaraNumero(
        numeroCartao,
      );
    }
});
// ------------------------------------------ Fim da área formas pagamento ------------------------------------//




// ------------------------------------------ Começo da área configuração ------------------------------------//
//Inicializa sem um evento
function inicializaResponsivoConfiguracao() {
    // Lagura atual da tela
    let larguraTela = $(window).width();
    
    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela <= 670) {
        $('#areaConfiguracao').addClass('flex-column align-items-center');
        $('#linha-vertical').attr('style', 'height: 0; width: 80%; margin: 48px 0;');
    }
}

// Chamando a função
inicializaResponsivoConfiguracao();

// Evento que dispara quando a tela é redimensionada
$(window).resize(() => {
    // Lagura atual da tela
    let larguraTela = $(window).width();

    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela < 670) {
        $('#areaConfiguracao').addClass('flex-column align-items-center');
        $('#linha-vertical').attr('style', 'height: 0; width: 80%; margin: 48px 0;');
    } else {
        $('#areaConfiguracao').removeClass('flex-column align-items-center');
        $('#linha-vertical').removeAttr('style', 'height: 0; width: 80%; margin: 48px 0;');
    }
});
// ------------------------------------------ Fim da área configuração -------------------------------------//