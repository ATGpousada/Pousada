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



$(function() {
    $('#cvv').focusin(function() {
    $('.flip-card-inner').css({
            transform: 'rotateY(180deg)'
        });
    });

    $('#cvv').focusout(function() {
        if ($('#cvv').val() == "") {
            $('.flip-card-back').css({
                transform: 'rotateY(180deg)'
        });
    }});
});