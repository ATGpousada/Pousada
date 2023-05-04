// ------------------------------------------ Começo da área geral ------------------------------------//
//Inicializa sem um evento
function inicializaResponsivoGeral() {
    // Lagura atual da tela
    let larguraTela = $(window).width();
    
    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela <= 630) {
        // Responsivo
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
        // Responsivo
        $('#item-select').removeClass('col-6').addClass('col-12 mb-3');
        $('#item-info').removeClass('col-6').addClass('col-12');
    } else {
        // Volta para o padrão
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
        // Responsivo
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
        // Responsivo
        $('#dados-pessoais').removeClass('w-50').addClass('w-100');
        $('#contato').removeClass('w-50').addClass('w-100');
        $('#group-formulario').removeClass('d-flex gap-5');
    } else {
        // volta padrão
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
        // Deixa form em coluna
        $('#conteudoPagamento').addClass('flex-column');
        // Cada item ocupa col-12 (tudo)
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
        // Deixa form em coluna
        $('#conteudoPagamento').addClass('flex-column');
        // Cada item ocupa col-12 (tudo)
        $('#item-info').removeClass('col-6').addClass('col-12');
    } else {
        // Remove estrutura coluna do formulário
        $('#conteudoPagamento').removeClass('flex-column');
        // retorna o padrão do que o item ocupa
        $('#item-info').addClass('col-6').removeClass('col-12');
    }

    // Caso a tela for de celular
    if (larguraTela < 380) {
        // Tira o cartão
        $('#cardFormasPagamento').addClass('d-none');
    } else {
        // Coloca ele novamente
        $('#cardFormasPagamento').removeClass('d-none');
    }
});

//Inicializa sem um evento
function inicializaResponsivoPagamentoAccoding() {
    // Lagura atual da tela
    let larguraTela = $(window).width();
    
    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela < 1020) {
        // Coloca formulário e cartão em coluna
        $('.conteudoCartao').addClass('flex-column');
        // Coloca o que o cartão ocupa
        $('.cardFormasPagamento').removeClass('col-md-4').addClass('col-md-12 mb-3');
        // Coloca o que a lista 1 ocupa
        $('.listaInfoCartao1').removeClass('col-md-4').addClass('col-md-12 mb-3');
        // Coloca o que a lista 2 ocupa
        $('.listaInfoCartao2').removeClass('col-md-4').addClass('col-md-12 mb-3');
    } 

    if (larguraTela < 500) {
        // Remove o cartão da tela
        $('.cardFormasPagamento').addClass('d-none');
        // E deixa o botão editar e excluir between
        $('.botaoInfoCartao').removeClass('col-md-6').addClass('col-md-12 d-flex justify-content-between');
    }
}

// Chamando a função
inicializaResponsivoPagamentoAccoding();

// Evento que dispara quando a tela é redimensionada
$(window).resize(() => {
    // Lagura atual da tela
    let larguraTela = $(window).width();

    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela < 1020) {
        // Coloca formulário e cartão em coluna
        $('.conteudoCartao').addClass('flex-column');
        // Coloca o que o cartão ocupa
        $('.cardFormasPagamento').removeClass('col-md-4').addClass('col-md-12 mb-3');
        // Coloca o que a lista 1 ocupa
        $('.listaInfoCartao1').removeClass('col-md-4').addClass('col-md-12 mb-3');
        // Coloca o que a lista 2 ocupa
        $('.listaInfoCartao2').removeClass('col-md-4').addClass('col-md-12 mb-3');
    } else {
        // Volta formulário e cartão para o padrão
        $('.conteudoCartao').removeClass('flex-column col-md-12');
        // Voltar o cartão para o padrão
        $('.cardFormasPagamento').addClass('col-md-4').removeClass('col-md-12 mb-3');
        // Voltar a lista 1 para o padrão
        $('.listaInfoCartao1').addClass('col-md-4').removeClass('col-md-12 mb-3');
        // Voltar a lista 2 para o padrão
        $('.listaInfoCartao2').addClass('col-md-4').removeClass('col-md-12 mb-3');
    }

    if (larguraTela < 500) {
        // Remove o cartão da tela
        $('.cardFormasPagamento').addClass('d-none');
        // E deixa o botão editar e excluir between
        $('.botaoInfoCartao').removeClass('col-md-6').addClass('col-md-12 d-flex justify-content-between');
    } else {
        // Reaparece o cartão
        $('.cardFormasPagamento').removeClass('d-none');
        // E o cartão sai do between
        $('.botaoInfoCartao').addClass('col-md-6').removeClass('col-md-12 d-flex justify-content-between');
    }
});

// Rotação do cartão qaundo o input cvv estiver focus
$(function() {
    // Rotação com o focus
    $('#cvv').focusin(function() {
        // Adiciona css
        $('#add-flip-card-inner').css({
            transform: 'rotateY(180deg)'
        });
    });

    // Tira a rotação sem o focus
    $('#cvv').focusout(function() {
        // Remove o css
        $('#add-flip-card-inner').removeAttr('style');
    });
});

// Array com mask para os input
const mask = {
    // Expressões regulares para as masks
    //cpf
    cpf(value) {
        return value
            .replace(/\D/g, '') // aceita somente caracteres numero.
            .replace(/(\d{3})(\d)/, '$1.$2') // () => permite criar grupos de captura.
            .replace(/(\d{3})(\d)/, '$1.$2') // $1, $2, $3 ... permite substituir a captura pela propria captura acrescida de algo
            .replace(/(\d{3})(\d{2})/, '$1-$2') // substitui '78910' por '789-10'.
            .replace(/(-\d{2})\d+?$/, '$1');
    },

    // Telefone
    phone(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '($1) - $2')
            .replace(/(\d{4})(\d)/, '$1-$2')
            .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
            .replace(/(\d{4})\d+?$/, '$1');
    },

    // CEP
    cep(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{5})(\d)/, '$1-$2')
            .replace(/(-\d{3})\d+?$/, '$1');
    },

    // Cartao
    cartao(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{4})(\d)/, '$1 $2')
            .replace(/(\d{4})(\d)/, '$1 $2')
            .replace(/(\d{4})(\d)/, '$1 $2')
            .replace(/(-\d{4})\d+?$/, '$1');
    },

    // Data
    data(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '$1 / $2')
            .replace(/(\d{2})(\d)/, '$1');
    },

    // CVV
    cvv(value) {
        return value
            .replace(/\D/g, '');
    },
};

// Adiciona mask nos input
document.querySelectorAll('input').forEach((input) => {
    // Pegar cada data-js
    const field = input.dataset.js;
  
    // Adiciona a mask
    input.addEventListener('input', (event) => {
        // Adicionando mask
        event.target.value = mask[field](event.target.value);
    });
});

// Array para descobrir bandeira do cartão
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
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/visa-17.svg" alt="Cartão visa" style="width: 50px;"></img>');
       
              // Caso seja mastercard
            } else if (tgdeveloper.getCardFlag(valor) == 'mastercard') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#95330f');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('MASTERCARD');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/mastercard.svg" alt="Cartão mastercard"></img>');


              // Caso seja american express  
            } else if (tgdeveloper.getCardFlag(valor) == 'amex') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#016fd0');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('AMERICAN EXPRESS');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14.5em');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/american-express-28.svg" alt="Cartão american express" style="width: 45px; border-radius: 3px;"></img>');

              // Caso seja diners  
            } else if (tgdeveloper.getCardFlag(valor) == 'diners') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#5591b3');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('DINERS');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '20.5em');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14.5em');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/diners-svgrepo-com.svg" alt="Cartão diners club" style="width: 60px;"></img>');

              // Caso seja discover  
            } else if (tgdeveloper.getCardFlag(valor) == 'discover') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#34495e');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('DISCOVER');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '19.5em');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14.5');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/discover-svgrepo-com.svg" alt="Cartão discover" style="width: 50px;"></img>');

              // Caso seja hipercard  
            } else if (tgdeveloper.getCardFlag(valor) == 'hipercard') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#822124');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('HIPERCARD');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '18.5em');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14em');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/hipercard-29.svg" alt="Cartão hipercard" style="width: 60px;"></img>');

              // Caso seja elo  
            } else if (tgdeveloper.getCardFlag(valor) == 'elo') {
                // Cor do cartão
                $('#add-flip-card-front, #add-flip-card-back').css('background-color', '#000000');
                // Nome da bandeira - Texto
                $('#add-cartaoNome').text('ELO');
                // Nome da bandeira - Posição
                $('#add-cartaoNome').css('left', '21.9em');
                // Icone da bandeira - Posição
                $('#add-logoModal').css('left', '14.5em');
                // Icone da bandeira - Imagem
                $('#add-logoModal').html('<img src="../images/bandeiras_cartao/elo-30.svg" alt="Cartão elo" style="width: 50px;"></img>');

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
            $('#add-cartaoNome').text('XXXXXXXXXX');
            // Icone da bandeira - Imagem
            $('#add-logoModal').html('<img src="../images/bandeiras_cartao/mastercard.svg" alt=""></img>');
        }
    });
});

// Função (evento) para identificar a bandeira do cartão no according
$(document).ready(function() {
    // Numero de cartoes cadastrados
    linhasConsulta = $('#LinhasDeConsulta').text();

    // For para percorrer todos os cartões
    for (let i = 1; i <= linhasConsulta; i++) {
        // Valor do número do cartão
        var valor = $('#numeroCartaoDetalhes'+i).text();

        // Caso seja visa
        if (tgdeveloper.getCardFlag(valor) == 'visa') {
            // Cor do cartão
            $('#info-flip-card-front'+i+', #info-flip-card-back'+i).css('background-color', '#69d0e1');
            // Nome da bandeira - Texto
            $('#info-cartaoNome'+i).text('VISA');
            // Nome da bandeira - Posição
            $('#info-cartaoNome'+i).css('left', '21.9em');
            // Icone da bandeira - Posição
            $('#info-logoModal'+i).css('left', '14.5em');
            // Icone da bandeira - Imagem
            $('#info-logoModal'+i).html('<img src="../images/bandeiras_cartao/visa-17.svg" alt="Cartão visa" style="width: 50px;"></img>');
            // Imagem icone cabeçalho do according
            $('#infoImagemGeral'+i).html('<img class="img-thumbnail img-fluid rounded-3" src="../images/bandeiras_cartao/visa-17.svg" width="50px" alt="Cartões">');
            // Nome do cartão no cabeçalho do according
            $('#infoNomeGeral'+i).text('VISA');

        // Caso seja mastercard
        } else if (tgdeveloper.getCardFlag(valor) == 'mastercard') {
            // Cor do cartão
            $('#info-flip-card-front'+i+', #info-flip-card-back'+i).css('background-color', '#95330f');
            // Nome da bandeira - Texto
            $('#info-cartaoNome'+i).text('MASTERCARD');
            // Nome da bandeira - Posição
            $('#info-cartaoNome'+i).css('left', '');
            // Icone da bandeira - Posição
            $('#info-logoModal'+i).css('left', '');
            // Icone da bandeira - Imagem
            $('#info-logoModal'+i).html('<img src="../images/bandeiras_cartao/mastercard.svg" alt="Cartão mastercard"></img>');
            // Imagem icone cabeçalho do according
            $('#infoImagemGeral'+i).html('<img class="img-thumbnail img-fluid rounded-3" src="../images/bandeiras_cartao/mastercard.svg" width="50px" alt="Cartões">');
            // Nome do cartão no cabeçalho do according
            $('#infoNomeGeral'+i).text('MASTERCARD');

        // Caso seja american express  
        } else if (tgdeveloper.getCardFlag(valor) == 'amex') {
            // Cor do cartão
            $('#info-flip-card-front'+i+', #info-flip-card-back'+i).css('background-color', '#016fd0');
            // Nome da bandeira - Texto
            $('#info-cartaoNome'+i).text('AMERICAN EXPRESS');
            // Icone da bandeira - Posição
            $('#info-logoModal'+i).css('left', '14.5em');
            // Icone da bandeira - Imagem
            $('#info-logoModal'+i).html('<img src="../images/bandeiras_cartao/american-express-28.svg" alt="Cartão american express" style="width: 45px; border-radius: 3px;"></img>');
            // Imagem icone cabeçalho do according
            $('#infoImagemGeral'+i).html('<img class="img-thumbnail img-fluid rounded-3" src="../images/bandeiras_cartao/american-express-28.svg" width="50px" alt="Cartões">');
            // Imagem icone cabeçalho do according
            $('#infoImagemGeral'+i).html('<img class="img-thumbnail img-fluid rounded-3" src="../images/bandeiras_cartao/american-express-28.svg" width="50px" alt="Cartões">');
            // Nome do cartão no cabeçalho do according
            $('#infoNomeGeral'+i).text('American Express');

        // Caso seja diners  
        } else if (tgdeveloper.getCardFlag(valor) == 'diners') {
            // Cor do cartão
            $('#info-flip-card-front'+i+', #info-flip-card-back'+i).css('background-color', '#5591b3');
            // Nome da bandeira - Texto
            $('#info-cartaoNome'+i).text('DINERS');
            // Nome da bandeira - Posição
            $('#info-cartaoNome'+i).css('left', '20.5em');
            // Icone da bandeira - Posição
            $('#info-logoModal'+i).css('left', '14.5em');
            // Icone da bandeira - Imagem
            $('#info-logoModal'+i).html('<img src="../images/bandeiras_cartao/diners-svgrepo-com.svg" alt="Cartão diners club" style="width: 60px;"></img>');
            // Imagem icone cabeçalho do according
            $('#infoImagemGeral'+i).html('<img class="img-thumbnail img-fluid rounded-3" src="../images/bandeiras_cartao/diners-svgrepo-com.svg" width="50px" alt="Cartões">');
            // Nome do cartão no cabeçalho do according
            $('#infoNomeGeral'+i).text('DINERS');
           
        // Caso seja discover  
        } else if (tgdeveloper.getCardFlag(valor) == 'discover') {
            // Cor do cartão
            $('#info-flip-card-front'+i+', #info-flip-card-back'+i).css('background-color', '#34495e');
            // Nome da bandeira - Texto
            $('#info-cartaoNome'+i).text('DISCOVER');
            // Nome da bandeira - Posição
            $('#info-cartaoNome'+i).css('left', '19.5em');
            // Icone da bandeira - Posição
            $('#info-logoModal'+i).css('left', '14.5');
            // Icone da bandeira - Imagem
            $('#info-logoModal'+i).html('<img src="../images/bandeiras_cartao/discover-svgrepo-com.svg" alt="Cartão discover" style="width: 50px;"></img>');
            // Imagem icone cabeçalho do according
            $('#infoImagemGeral'+i).html('<img class="img-thumbnail img-fluid rounded-3" src="../images/bandeiras_cartao/discover-svgrepo-com.svg" width="50px" alt="Cartões">');
            // Nome do cartão no cabeçalho do according
            $('#infoNomeGeral'+i).text('DISCOVER');

        // Caso seja hipercard  
        } else if (tgdeveloper.getCardFlag(valor) == 'hipercard') {
            // Cor do cartão
            $('#info-flip-card-front'+i+', #info-flip-card-back'+i).css('background-color', '#822124');
            // Nome da bandeira - Texto
            $('#info-cartaoNome'+i).text('HIPERCARD');
            // Nome da bandeira - Posição
            $('#info-cartaoNome'+i).css('left', '18.5em');
            // Icone da bandeira - Posição
            $('#info-logoModal'+i).css('left', '14em');
            // Icone da bandeira - Imagem
            $('#info-logoModal'+i).html('<img src="../images/bandeiras_cartao/hipercard-29.svg" alt="Cartão hipercard" style="width: 60px;"></img>');
            // Imagem icone cabeçalho do according
            $('#infoImagemGeral'+i).html('<img class="img-thumbnail img-fluid rounded-3" src="../images/bandeiras_cartao/hipercard-29.svg" width="50px" alt="Cartões">');
            // Nome do cartão no cabeçalho do according
            $('#infoNomeGeral'+i).text('HIPERCARD');

        // Caso seja elo  
        } else if (tgdeveloper.getCardFlag(valor) == 'elo') {
            // Cor do cartão
            $('#info-flip-card-front'+i+', #info-flip-card-back'+i).css('background-color', '#000000');
            // Nome da bandeira - Texto
            $('#info-cartaoNome'+i).text('ELO');
            // Nome da bandeira - Posição
            $('#info-cartaoNome'+i).css('left', '21.9em');
            // Icone da bandeira - Posição
            $('#info-logoModal'+i).css('left', '14.5em');
            // Icone da bandeira - Imagem
            $('#info-logoModal'+i).html('<img src="../images/bandeiras_cartao/elo-30.svg" alt="Cartão elo" style="width: 50px;"></img>');
            // Imagem icone cabeçalho do according
            $('#infoImagemGeral'+i).html('<img class="img-thumbnail img-fluid rounded-3" src="../images/bandeiras_cartao/elo-30.svg" width="50px" alt="Cartões">');        
            // Nome do cartão no cabeçalho do according
            $('#infoNomeGeral'+i).text('ELO');        
        }
    }
});

// Excluir cartão
$('#modalButtonExcluir').on('click',function(){
    // busca o id
    var id = $('.idCartao').val(); 
    //chama o arquivo php para excluir o produto
    console.log(id);
});

// Alterar cartão
$('#modalButtonAlterar').on('click',function(){
    // busca o id
    var id = $('.idCartao').val();
    //chama o arquivo php para alterar o produto
    $('#formAlterarCartao').attr('action','editarCartao.php?ID_CARTAO='+id); 
});
// ------------------------------------------ Fim da área formas pagamento ------------------------------------//




// ------------------------------------------ Começo da área configuração ------------------------------------//
//Inicializa sem um evento
function inicializaResponsivoConfiguracao() {
    // Lagura atual da tela
    let larguraTela = $(window).width();
    
    // Condição para mudar classes do bootstrap quando a tela for redimensionada no tamanho especificado
    if (larguraTela <= 670) {
        // Responsivo
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
        // Responsivo
        $('#areaConfiguracao').addClass('flex-column align-items-center');
        $('#linha-vertical').attr('style', 'height: 0; width: 80%; margin: 48px 0;');
    } else {
        // Voltar para o padrão
        $('#areaConfiguracao').removeClass('flex-column align-items-center');
        $('#linha-vertical').removeAttr('style', 'height: 0; width: 80%; margin: 48px 0;');
    }
});
// ------------------------------------------ Fim da área configuração -------------------------------------//