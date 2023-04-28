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
$(window).resize(() => {
    // Lagura atual da tela
    let larguraTela = $(window).width();

    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela < 992) {
        $('#conteudoPagamento').addClass('flex-column align-items-center');
        $('#item-info').removeClass('col-6').addClass('col-12');
    } else {
        $('conteudo-pagamento').removeClass('col-12 mb-3').addClass('col-6');
        $('#item-info').removeClass('col-12').addClass('col-6');
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

// Função para detectar a bandeira do cartão
function detectarBandeiraCartao(numeroCartao) {
    // Expressões regulares para identificar as bandeiras
    var expressoes = [
        /^4\d{12}(\d{3})?$/, // Visa
        /^5[1-5]\d{14}$/, // Mastercard
        /^3[47]\d{13}$/, // American Express
        /^6(?:011|5\d{2})\d{12}$/, // Discover
        /^(?:2131|1800|35\d{3})\d{11}$/ // JCB
    ];

    // Verifica qual expressão regular casa com o número do cartão
    for(var i = 0; i < expressoes.length; i++) {
        if(expressoes[i].test(numeroCartao)) {
        // Retorna o nome da bandeira
            if(expressoes[i] == /^4\d{12}(\d{3})?$/) {
                return 'Visa';
            } else if(expressoes[i] == /^5[1-5]\d{14}$/) {
                return 'Mastercard';
            } else if(expressoes[i] == /^3[47]\d{13}$/) {
                return 'American Express';
            } else if(expressoes[i] == /^6(?:011|5\d{2})\d{12}$/) {
                return 'Discover';
            } else if(expressoes[i] == /^(?:2131|1800|35\d{3})\d{11}$/) {
                return 'JCB';
            }
        }
    }

    // Se nenhuma expressão regular casar com o número do cartão, retorna false
    return false;
}
// ------------------------------------------ Fim da área formas pagamento ------------------------------------//