<?php
// Verificação se tem usuário logado 
include 'verificacao.php';

// Conexão com o banco
include '../connection/connect.php';

// Pegando cartões do cliente
$lista = $connect->query("SELECT * FROM clienteCartao WHERE clientes_ID = ".$_SESSION['id'].";");

// Pegando a linha do cliente logado
$row = $lista->fetch_assoc();

// Pegando a quantidade de linhas da consulta
$rows = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Nosso estilo -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Cartão estilo -->
    <link rel="stylesheet" href="../css/cartao.css">
    <!-- Icons do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Icons do FontAwansome -->
    <script src="https://kit.fontawesome.com/687b2e222f.js" crossorigin="anonymous"></script>
    <!-- Icons do boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Logo no title -->
    <link rel="icon" type="image/png" href="../images/logo/LOGO POUSADA DO SOSSEGO.png"/>
    <!-- Link para o angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <title>Login - Pousada do Sossego</title>
</head>
<body ng-app="">
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>
    
    <!-- Adição do cabeçalho -->
    <?php include 'cabecalhoCliente.php'?>

    <!-- Página principal -->
    <main class="home-section bg-body-tertiary">
        <!-- Menu da página -->
        <nav class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: #11101D;">
            <!-- Conteúdo do menu -->
            <div class="container-fluid">
                <!-- Titulo -->
                <div class="text navbar-brand">Perfil</div>
                
                <!-- Menu responsivo -->
                <button class="navbar-toggler navbar-dark bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Itens do menu -->
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="perfil.php">Conta</a>
                        <a class="nav-link" href="formasPagamentoPerfil.php">Formas de pagamento</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Mensagem na tela -->
        <?php 
            // Adiciona cartão
            if(isset($_SESSION['adicionarCartao'])){
                echo $_SESSION['adicionarCartao'];
                unset($_SESSION['adicionarCartao']);
            }

            // Edita cartão
            if(isset($_SESSION['editarCartao'])){
                echo $_SESSION['editarCartao'];
                unset($_SESSION['editarCartao']);
            }
            
            // Excluir cartão
            if(isset($_SESSION['excluirCartao'])){
                echo $_SESSION['excluirCartao'];
                unset($_SESSION['excluirCartao']);
            }
        ?>

        <!-- Seção com todo o conteúdo -->
        <section class="ps-5 pe-5 pb-4 pt-2">
            <!-- Título da página -->
            <h3>Formas de pagamento</h4>

            <!-- Laço de repetição para pegar os catões com uma verificação para ver se tem algum cadastrado -->
            <?php 
                if ($rows > 0) { 
                    // Contador para diferenciar cada cartão
                    $cont = 0;

                    // Contador da consulta 
                    echo '<div id="LinhasDeConsulta" hidden>'.$rows.'</div>';
                    do {
                        // Inicia com um
                        $cont += 1;
            ?>
            <!-- Informações do cartão -->
            <div class="accordion mt-2 mb-3" id="accordion<?php echo $cont; ?>">
                <!-- accordion inteiro -->
                <div class="accordion-item shadow-sm">
                    <!-- Cabeçalho do accordion -->
                    <h2 class="accordion-header">
                        <!-- Botão para abrir o conteúdo do accordion -->
                        <button class="accordion-button collapsed flex-wrap gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $cont; ?>" aria-expanded="false" aria-controls="collapse<?php echo $cont; ?>">
                            <!-- Numero escondido para eu pegar a bandeira do cartão -->
                            <p hidden id="numeroCartaoDetalhes<?php echo $cont;?>"><?php echo $row['NUMERO'];?></p>    
                        
                            <!-- Icone do cartão - Bandeira -->    
                            <div style="width: 50px;" class="me-3" id="<?php echo 'infoImagemGeral'.$cont?>">
                                <img class="img-thumbnail img-fluid rounded-3" src="" width="50px" alt="Cartões">
                            </div>

                            <!-- Numero do carão -->
                            <div><?php echo ('<strong>'.substr($row['NUMERO'], 15, 4).'</strong>');?></div>

                            <!-- Nome da bandeira do cartão -->
                            <div class="me-4"><strong id="<?php echo 'infoNomeGeral'.$cont?>"></strong></div>
                        </button>
                    </h2>
                    
                    <!-- Detalhes do cartão -->
                    <div id="collapse<?php echo $cont; ?>" class="accordion-collapse collapse" data-bs-parent="#accordion<?php echo $cont; ?>">
                        <!-- Corpo do accordion -->
                        <div class="accordion-body">
                            <!-- Todo o conteúdo do accordion -->
                            <div class="row conteudoCartao">                    
                                <!-- Primeira lista -->
                                <ol class="list-group col-md-4 justify-content-center listaInfoCartao1">
                                    <!-- Nome -->
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Nome:</div>
                                            &nbsp;<?php echo $row['NOME_TITULAR']; ?>
                                        </div>
                                    </li>
                                    
                                    <!-- Número -->
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Número:</div>
                                            &nbsp;<?php echo ('**** **** **** '.substr($row['NUMERO'], 15, 4));  ?>
                                        </div>
                                    </li>
                                </ol>

                                <!-- Segunda lista -->
                                <ol class="list-group col-md-4 justify-content-center listaInfoCartao2">
                                    <!-- Data de validade -->
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Data Validade:</div>
                                            &nbsp;<?php echo $row['VALIDADE']; ?>
                                        </div>
                                    </li>

                                    <!-- Tipo -->
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Tipo:</div>
                                            &nbsp;<?php echo $row['TIPO']; ?>
                                        </div>
                                    </li>
                                </ol>

                                <!-- Modelo do cartão -->
                                <div class="pe-3 user-select-none col-md-4 d-flex justify-content-center cardFormasPagamento" role="button" id="cardFormasPagamento">
                                    <!-- Cartão completo -->
                                    <div class="flip-card">
                                        <!-- Back e front do cartão juntos -->
                                        <div class="flip-card-inner" style="width: 300px;">
                                            <!-- Frente do cartão -->
                                            <div class="flip-card-front" id="<?php echo 'info-flip-card-front'.$cont;?>" style="width: 300px;">
                                                <!-- Nome cartão -->
                                                <p class="heading_8264 text-white" id="<?php echo 'info-cartaoNome'.$cont;?>">MASTERCARD</p>
                                                
                                                <!-- Imagem bandeira -->
                                                <div class="logo" id="<?php echo 'info-logoModal'.$cont;?>">
                                                    <svg viewBox="0 0 48 48" height="36" width="36" y="0px" x="0px" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z" fill="#ff9800"></path><path d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z" fill="#d50000"></path><path d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z" fill="#ff3d00"></path>
                                                    </svg>
                                                </div>

                                                <!-- Chip do cartão (icone) -->
                                                <svg xml:space="preserve" viewBox="0 0 50 50" height="30px" width="30px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Layer_1" class="chip" version="1.1">  
                                                    <image href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                                                    AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAB6VBMVEUAAACNcTiVeUKVeUOY
                                                    fEaafEeUeUSYfEWZfEaykleyklaXe0SWekSZZjOYfEWYe0WXfUWXe0WcgEicfkiXe0SVekSXekSW
                                                    ekKYe0a9nF67m12ZfUWUeEaXfESVekOdgEmVeUWWekSniU+VeUKVeUOrjFKYfEWliE6WeESZe0GS
                                                    e0WYfES7ml2Xe0WXeESUeEOWfEWcf0eWfESXe0SXfEWYekSVeUKXfEWxklawkVaZfEWWekOUekOW
                                                    ekSYfESZe0eXekWYfEWZe0WZe0eVeUSWeETAnmDCoWLJpmbxy4P1zoXwyoLIpWbjvXjivnjgu3bf
                                                    u3beunWvkFWxkle/nmDivXiWekTnwXvkwHrCoWOuj1SXe0TEo2TDo2PlwHratnKZfEbQrWvPrWua
                                                    fUfbt3PJp2agg0v0zYX0zYSfgkvKp2frxX7mwHrlv3rsxn/yzIPgvHfduXWXe0XuyIDzzISsjVO1
                                                    lVm0lFitjVPzzIPqxX7duna0lVncuHTLqGjvyIHeuXXxyYGZfUayk1iyk1e2lln1zYTEomO2llrb
                                                    tnOafkjFpGSbfkfZtXLhvHfkv3nqxH3mwXujhU3KqWizlFilh06khk2fgkqsjlPHpWXJp2erjVOh
                                                    g0yWe0SliE+XekShhEvAn2D///+gx8TWAAAARnRSTlMACVCTtsRl7Pv7+vxkBab7pZv5+ZlL/UnU
                                                    /f3SJCVe+Fx39naA9/75XSMh0/3SSkia+pil/KRj7Pr662JPkrbP7OLQ0JFOijI1MwAAAAFiS0dE
                                                    orDd34wAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0IDx2lsiuJAAACLElEQVRIx2Ng
                                                    GAXkAUYmZhZWPICFmYkRVQcbOwenmzse4MbFzc6DpIGXj8PD04sA8PbhF+CFaxEU8iWkAQT8hEVg
                                                    OkTF/InR4eUVICYO1SIhCRMLDAoKDvFDVhUaEhwUFAjjSUlDdMiEhcOEItzdI6OiYxA6YqODIt3d
                                                    I2DcuDBZsBY5eVTr4xMSYcyk5BRUOXkFsBZFJTQnp6alQxgZmVloUkrKYC0qqmji2WE5EEZuWB6a
                                                    lKoKdi35YQUQRkFYPpFaCouKIYzi6EDitJSUlsGY5RWVRGjJLyxNy4ZxqtIqqvOxaVELQwZFZdkI
                                                    JVU1RSiSalAt6rUwUBdWG1CP6pT6gNqwOrgCdQyHNYR5YQFhDXj8MiK1IAeyN6aORiyBjByVTc0F
                                                    qBoKWpqwRCVSgilOaY2OaUPw29qjOzqLvTAchpos47u6EZyYnngUSRwpuTe6D+6qaFQdOPNLRzOM
                                                    1dzhRZyW+CZouHk3dWLXglFcFIflQhj9YWjJGlZcaKAVSvjyPrRQ0oQVKDAQHlYFYUwIm4gqExGm
                                                    BSkutaVQJeomwViTJqPK6OhCy2Q9sQBk8cY0DxjTJw0lAQWK6cOKfgNhpKK7ZMpUeF3jPa28BCET
                                                    amiEqJKM+X1gxvWXpoUjVIVPnwErw71nmpgiqiQGBjNzbgs3j1nus+fMndc+Cwm0T52/oNR9lsdC
                                                    S24ra7Tq1cbWjpXV3sHRCb1idXZ0sGdltXNxRateRwHRAACYHutzk/2I5QAAACV0RVh0ZGF0ZTpj
                                                    cmVhdGUAMjAyMy0wMi0xM1QwODoxNToyOSswMDowMEUnN7UAAAAldEVYdGRhdGU6bW9kaWZ5ADIw
                                                    MjMtMDItMTNUMDg6MTU6MjkrMDA6MDA0eo8JAAAAKHRFWHRkYXRlOnRpbWVzdGFtcAAyMDIzLTAy
                                                    LTEzVDA4OjE1OjI5KzAwOjAwY2+u1gAAAABJRU5ErkJggg==" y="0" x="0" height="50" width="50" id="image0">
                                                    </image>
                                                </svg>

                                                <!-- Sinal de aproximação (icone) -->
                                                <svg xml:space="preserve" viewBox="0 0 50 50" height="20px" width="20px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Layer_1" class="contactless" version="1.1">  
                                                    <image href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAQAAAC0NkA6AAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                                                    AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZ
                                                    cwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0IEzgIwaKTAAADDklEQVRYw+1XS0iUURQ+f5qPyjQf
                                                    lGRFEEFK76koKGxRbWyVVLSOgsCgwjZBJJYuKogSIoOonUK4q3U0WVBWFPZYiIE6kuArG3VGzK/F
                                                    fPeMM/MLt99/NuHdfPd888/57jn3nvsQWWj/VcMlvMMd5KRTogqx9iCdIjUUmcGR9ImUYowyP3xN
                                                    GQJoRLVaZ2DaZf8kyjEJALhI28ELioyiwC+Rc3QZwRYyO/DH51hQgWm6DMIh10KmD4u9O16K49it
                                                    VoPOAmcGAWWOepXIRScAoJZ2Frro8oN+EyTT6lWkkg6msZfMSR35QTJmjU0g15tIGSJ08ZZMJkJk
                                                    HpNZgSkyXosS13TkJpZ62mPIJvOSzC1bp8vRhhCakEk7G9/o4gmZdbpsTcKu0m63FbnBP9Qrc15z
                                                    bkbemfgNDtEOI8NO5L5O9VYyRYgmJayZ9nPaxZrSjW4+F6Uw9yQqIiIZwhp2huQTf6OIvCZyGM6g
                                                    DJBZbyXifJXr7FZjGXsdxADxI7HUJFB6iWvsIhFpkoiIiGTJfjJfiCuJg2ZEspq9EHGVpYgzKqwJ
                                                    qSAOEwuJQ/pxPvE3cYltJCLdxBLiSKKIE5HxJKcTRNeadxfhDiuYw44zVs1dxKwRk/uCxIiQkxKB
                                                    sSctRVAge9g1E15EHE6yRUaJecRxcWlukdRIbGFOSZCMWQA/iWauIP3slREHXPyliqBcrrD71Amz
                                                    Z+rD1Mt2Yr8TZc/UR4/YtFnbijnHi3UrN9vKQ9rPaJf867ZiaqDB+czeKYmd3pNa6fuI75MiC0uX
                                                    XSR5aEMf7s7a6r/PudVXkjFb/SsrCRfROk0Fx6+H1i9kkTGn/E1vEmt1m089fh+RKdQ5O+xNJPUi
                                                    cUIjO0Dm7HwvErEr0YxeibL1StSh37STafE4I7zcBdRq1DiOkdmlTJVnkQTBTS7X1FYyvfO4piaI
                                                    nKbDCDaT2anLudYXCRFsQBgAcIF2/Okwgvz5+Z4tsw118dzruvIvjhTB+HOuWy8UvovEH6beitBK
                                                    xDyxm9MmISKCWrzB7bSlaqGlsf0FC0gMjzTg6GgAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjMtMDIt
                                                    MTNUMDg6MTk6NTYrMDA6MDCjlq7LAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIzLTAyLTEzVDA4OjE5
                                                    OjU2KzAwOjAw0ssWdwAAACh0RVh0ZGF0ZTp0aW1lc3RhbXAAMjAyMy0wMi0xM1QwODoxOTo1Nisw
                                                    MDowMIXeN6gAAAAASUVORK5CYII=" y="0" x="0" height="50" width="50" id="image0">
                                                    </image>
                                                </svg>

                                                <!-- Numero do cartão -->
                                                <p class="number text-white"><?php echo ('**** **** **** '.substr($row['NUMERO'], 15, 4))?></p>
                                                
                                                <!-- Data de validade do cartão -->
                                                <p class="valid_thru text-white">DATA DE VALIDADE</p>
                                                <p class="date_8264 text-white"><?php echo $row['VALIDADE']?></p>
                                                
                                                <!-- Nome do titular do cartão -->
                                                <p class="name_card text-white text-uppercase"><?php echo $row['NOME_TITULAR']?></p>
                                            </div>

                                            <!-- Back do cartão -->
                                            <div class="flip-card-back" id="<?php echo 'info-flip-card-back'.$cont;?>" style="width: 300px;">
                                                <!-- Linha do cartão -->
                                                <div class="strip"></div>
                                                
                                                <!-- Numero no back do cartão -->
                                                <div class="mstrip"><strong><?php echo ('**** **** **** '.substr($row['NUMERO'], 15, 4));?></strong></div>

                                                <!-- cvv do cartão -->
                                                <div class="sstrip">
                                                    <p class="code"><?php echo "***";?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Botões -->
                                <div class="col-md-6 botaoInfoCartao">
                                    <!-- Botão para editar  -->
                                    <button type="button" class="btn btn-primary me-2 idCartaoEditar" data-bs-toggle="modal" data-bs-target="#staticBackdropEditar" data-id="<?php echo $row['ID'];?>">Editar</button>
                                    <!-- Botão para excluir -->
                                    <button type="button" class="btn btn-danger ms-2 idCartaoExcluir" data-bs-toggle="modal"  data-bs-target="#staticBackdropExcluir" data-id="<?php echo $row['ID'];?>">Excluir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Final do laço de repetição -->
            <?php 
                    } while ($row = $lista->fetch_assoc());
                } else {
            ?>

                <!-- Mostrar que não tem cartões cadastrados -->
                <div class="alert alert-dark mt-4" role="alert">
                    <i class="bi bi-exclamation-diamond-fill"></i> Nenhum cartão cadastrado.
                </div>
            
            <?php 
                }
            ?>
            
            <!-- Botão para abrir modal e adicionar cartão  -->
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropAdicionar">Adicionar</button>
            </div>
        </section>
    </main>

    <!-- Modal adicionar cartão -->
    <div class="modal fade" id="staticBackdropAdicionar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Cartão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <!-- Corpo do modal -->
                <div class="modal-body">
                    <div class="d-flex justify-content-around align-items-center gap-4" id="conteudoPagamento">
                        <form action="adicionaCartao.php" method="post" class="row g-3">
                            <!-- Tipo de nome do titular do cartão -->
                            <div class="form-floating col-md-12">
                                <input type="text" class="form-control text-uppercase" id="nomeTitular" name="nomeTitular" required ng-model="nomeTitular" maxlength="35">
                                <label for="nomeTitular">Nome do Titular</label>
                            </div>

                            <!-- Tipo de número do cartão -->
                            <div class="form-floating col-md-8">
                                <input type="text" class="form-control" id="numeroCartao" name="numeroCartao" required ng-model="numero" data-js="cartao" data-numero="numero" maxlength="19">
                                <label for="numeroCartao">Número</label>
                            </div>

                            <!-- Tipo de data de validade do cartão -->
                            <div class="form-floating col-md-4">
                                <input type="text" class="form-control" id="dataValidade" name="dataValidade" required ng-model="dataValidade" data-js="data">
                                <label for="dataValidade">Data de Validade</label>
                            </div>

                            <!-- Tipo de cvv do cartão -->
                            <div class="form-floating col-md-3">
                                <input type="text" class="form-control" id="cvv" name="cvv" required ng-model="cvv" data-js="cvv" maxlength="3">
                                <label for="cvv">CVV</label>
                            </div>

                            <!-- Tipo de tipo do cartão -->
                            <div class="form-floating col-md-9">
                                <select class="form-select" id="tipoCartao" name="tipoCartao">
                                    <option selected>Selecione o Tipo</option>
                                    <option value="Crédito">Crédito</option>
                                    <option value="Débito">Débito</option>
                                </select>

                                <label for="floatingSelect">Tipo</label>
                            </div>

                            <!-- Botão para adicionar o cartão -->
                            <div class="col-md-12 ps-2 pe-2">
                                <button type="submit" class="btn btn-primary col-12">Adicionar</button>
                            </div>
                        </form>

                        <!-- Modelo do cartão -->
                        <div class="pe-3 user-select-none" role="button" id="cardFormasPagamento">
                            <!-- Cartão completo -->
                            <div class="flip-card">
                                <!-- Back e front do cartão juntos -->
                                <div class="flip-card-inner" id="add-flip-card-inner">
                                    <!-- Frente do cartão -->
                                    <div class="flip-card-front" id="add-flip-card-front">
                                        <!-- Nome cartão -->
                                        <p class="heading_8264 text-white" id="add-cartaoNome">XXXXXXXXXX</p>

                                        <!-- Imagem bandeira -->
                                        <div class="logo" id="add-logoModal">
                                            <svg viewBox="0 0 48 48" height="36" width="36" y="0px" x="0px" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z" fill="#ff9800"></path><path d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z" fill="#d50000"></path><path d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z" fill="#ff3d00"></path>
                                            </svg>
                                        </div>

                                        <!-- Chip do cartão (icone) -->
                                        <svg xml:space="preserve" viewBox="0 0 50 50" height="30px" width="30px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Layer_1" class="chip" version="1.1">  
                                            <image href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                                            AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAB6VBMVEUAAACNcTiVeUKVeUOY
                                            fEaafEeUeUSYfEWZfEaykleyklaXe0SWekSZZjOYfEWYe0WXfUWXe0WcgEicfkiXe0SVekSXekSW
                                            ekKYe0a9nF67m12ZfUWUeEaXfESVekOdgEmVeUWWekSniU+VeUKVeUOrjFKYfEWliE6WeESZe0GS
                                            e0WYfES7ml2Xe0WXeESUeEOWfEWcf0eWfESXe0SXfEWYekSVeUKXfEWxklawkVaZfEWWekOUekOW
                                            ekSYfESZe0eXekWYfEWZe0WZe0eVeUSWeETAnmDCoWLJpmbxy4P1zoXwyoLIpWbjvXjivnjgu3bf
                                            u3beunWvkFWxkle/nmDivXiWekTnwXvkwHrCoWOuj1SXe0TEo2TDo2PlwHratnKZfEbQrWvPrWua
                                            fUfbt3PJp2agg0v0zYX0zYSfgkvKp2frxX7mwHrlv3rsxn/yzIPgvHfduXWXe0XuyIDzzISsjVO1
                                            lVm0lFitjVPzzIPqxX7duna0lVncuHTLqGjvyIHeuXXxyYGZfUayk1iyk1e2lln1zYTEomO2llrb
                                            tnOafkjFpGSbfkfZtXLhvHfkv3nqxH3mwXujhU3KqWizlFilh06khk2fgkqsjlPHpWXJp2erjVOh
                                            g0yWe0SliE+XekShhEvAn2D///+gx8TWAAAARnRSTlMACVCTtsRl7Pv7+vxkBab7pZv5+ZlL/UnU
                                            /f3SJCVe+Fx39naA9/75XSMh0/3SSkia+pil/KRj7Pr662JPkrbP7OLQ0JFOijI1MwAAAAFiS0dE
                                            orDd34wAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0IDx2lsiuJAAACLElEQVRIx2Ng
                                            GAXkAUYmZhZWPICFmYkRVQcbOwenmzse4MbFzc6DpIGXj8PD04sA8PbhF+CFaxEU8iWkAQT8hEVg
                                            OkTF/InR4eUVICYO1SIhCRMLDAoKDvFDVhUaEhwUFAjjSUlDdMiEhcOEItzdI6OiYxA6YqODIt3d
                                            I2DcuDBZsBY5eVTr4xMSYcyk5BRUOXkFsBZFJTQnp6alQxgZmVloUkrKYC0qqmji2WE5EEZuWB6a
                                            lKoKdi35YQUQRkFYPpFaCouKIYzi6EDitJSUlsGY5RWVRGjJLyxNy4ZxqtIqqvOxaVELQwZFZdkI
                                            JVU1RSiSalAt6rUwUBdWG1CP6pT6gNqwOrgCdQyHNYR5YQFhDXj8MiK1IAeyN6aORiyBjByVTc0F
                                            qBoKWpqwRCVSgilOaY2OaUPw29qjOzqLvTAchpos47u6EZyYnngUSRwpuTe6D+6qaFQdOPNLRzOM
                                            1dzhRZyW+CZouHk3dWLXglFcFIflQhj9YWjJGlZcaKAVSvjyPrRQ0oQVKDAQHlYFYUwIm4gqExGm
                                            BSkutaVQJeomwViTJqPK6OhCy2Q9sQBk8cY0DxjTJw0lAQWK6cOKfgNhpKK7ZMpUeF3jPa28BCET
                                            amiEqJKM+X1gxvWXpoUjVIVPnwErw71nmpgiqiQGBjNzbgs3j1nus+fMndc+Cwm0T52/oNR9lsdC
                                            S24ra7Tq1cbWjpXV3sHRCb1idXZ0sGdltXNxRateRwHRAACYHutzk/2I5QAAACV0RVh0ZGF0ZTpj
                                            cmVhdGUAMjAyMy0wMi0xM1QwODoxNToyOSswMDowMEUnN7UAAAAldEVYdGRhdGU6bW9kaWZ5ADIw
                                            MjMtMDItMTNUMDg6MTU6MjkrMDA6MDA0eo8JAAAAKHRFWHRkYXRlOnRpbWVzdGFtcAAyMDIzLTAy
                                            LTEzVDA4OjE1OjI5KzAwOjAwY2+u1gAAAABJRU5ErkJggg==" y="0" x="0" height="50" width="50" id="image0">
                                            </image>
                                        </svg>

                                        <!-- Sinal de aproximação (icone) -->
                                        <svg xml:space="preserve" viewBox="0 0 50 50" height="20px" width="20px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Layer_1" class="contactless" version="1.1">  
                                            <image href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAQAAAC0NkA6AAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                                            AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZ
                                            cwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0IEzgIwaKTAAADDklEQVRYw+1XS0iUURQ+f5qPyjQf
                                            lGRFEEFK76koKGxRbWyVVLSOgsCgwjZBJJYuKogSIoOonUK4q3U0WVBWFPZYiIE6kuArG3VGzK/F
                                            fPeMM/MLt99/NuHdfPd888/57jn3nvsQWWj/VcMlvMMd5KRTogqx9iCdIjUUmcGR9ImUYowyP3xN
                                            GQJoRLVaZ2DaZf8kyjEJALhI28ELioyiwC+Rc3QZwRYyO/DH51hQgWm6DMIh10KmD4u9O16K49it
                                            VoPOAmcGAWWOepXIRScAoJZ2Frro8oN+EyTT6lWkkg6msZfMSR35QTJmjU0g15tIGSJ08ZZMJkJk
                                            HpNZgSkyXosS13TkJpZ62mPIJvOSzC1bp8vRhhCakEk7G9/o4gmZdbpsTcKu0m63FbnBP9Qrc15z
                                            bkbemfgNDtEOI8NO5L5O9VYyRYgmJayZ9nPaxZrSjW4+F6Uw9yQqIiIZwhp2huQTf6OIvCZyGM6g
                                            DJBZbyXifJXr7FZjGXsdxADxI7HUJFB6iWvsIhFpkoiIiGTJfjJfiCuJg2ZEspq9EHGVpYgzKqwJ
                                            qSAOEwuJQ/pxPvE3cYltJCLdxBLiSKKIE5HxJKcTRNeadxfhDiuYw44zVs1dxKwRk/uCxIiQkxKB
                                            sSctRVAge9g1E15EHE6yRUaJecRxcWlukdRIbGFOSZCMWQA/iWauIP3slREHXPyliqBcrrD71Amz
                                            Z+rD1Mt2Yr8TZc/UR4/YtFnbijnHi3UrN9vKQ9rPaJf867ZiaqDB+czeKYmd3pNa6fuI75MiC0uX
                                            XSR5aEMf7s7a6r/PudVXkjFb/SsrCRfROk0Fx6+H1i9kkTGn/E1vEmt1m089fh+RKdQ5O+xNJPUi
                                            cUIjO0Dm7HwvErEr0YxeibL1StSh37STafE4I7zcBdRq1DiOkdmlTJVnkQTBTS7X1FYyvfO4piaI
                                            nKbDCDaT2anLudYXCRFsQBgAcIF2/Okwgvz5+Z4tsw118dzruvIvjhTB+HOuWy8UvovEH6beitBK
                                            xDyxm9MmISKCWrzB7bSlaqGlsf0FC0gMjzTg6GgAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjMtMDIt
                                            MTNUMDg6MTk6NTYrMDA6MDCjlq7LAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIzLTAyLTEzVDA4OjE5
                                            OjU2KzAwOjAw0ssWdwAAACh0RVh0ZGF0ZTp0aW1lc3RhbXAAMjAyMy0wMi0xM1QwODoxOTo1Nisw
                                            MDowMIXeN6gAAAAASUVORK5CYII=" y="0" x="0" height="50" width="50" id="image0">
                                            </image>
                                        </svg>

                                        <!-- Numero do cartão -->
                                        <p class="number text-white"> {{numero?numero:'1111 1111 1111 1111'}}</p>
                                        
                                        <!-- Data de validade do cartão -->
                                        <p class="valid_thru text-white">DATA DE VALIDADE</p>
                                        <p class="date_8264 text-white">{{dataValidade?dataValidade:'11 / 11'}}</p>
                                        
                                        <!-- Nome do titular do cartão -->
                                        <p class="name_card text-white text-uppercase">{{nomeTitular?nomeTitular:'XXXX XXXX'}}</p>
                                    </div>

                                    <!-- Back do cartão -->
                                    <div class="flip-card-back" id="add-flip-card-back">
                                        <!-- Linha do cartão -->
                                        <div class="strip"></div>
                                        
                                        <!-- Numero no back do cartão -->
                                        <div class="mstrip"><strong>{{numero?numero:'1111 1111 1111 1111'}}</strong></div>

                                        <!-- cvv do cartão -->
                                        <div class="sstrip">
                                            <p class="code">{{cvv?cvv:'***'}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <!-- Fechar modal -->
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Cartão-->
    <div class="modal fade" id="staticBackdropEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Cartão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                    <!-- Formulário alterar -->
                    <form action="" method="post" class="row g-3" id="formAlterarCartao">
                        <!-- Tipo de nome do titular do cartão -->
                        <div class="form-floating col-md-8">
                            <input type="text" class="form-control text-uppercase" id="nomeTitularAlterar" name="nomeTitularAlterar" required maxlength="35">
                            <label for="nomeTitularAlterar">Nome do Titular</label>
                        </div>

                        <!-- Tipo de data de validade do cartão -->
                        <div class="form-floating col-md-4">
                            <input type="text" class="form-control" id="dataValidadeAlterar" name="dataValidadeAlterar" data-js="data" required>
                            <label for="dataValidadeAlterar">Data de Validade</label>
                        </div>

                        <!-- Botão para alterar o cartão -->
                        <div class="col-md-12 ps-2 pe-2">
                            <button type="submit" class="btn btn-primary col-12" id="modalButtonAlterar">Alterar</button>
                        </div>
                    </form>
                </div>
                
                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <!-- Botão fechar modal -->
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Excluir Cartão-->
    <div class="modal fade" id="staticBackdropExcluir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Cartão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                    <p class="fs-5">
                        Tem certeza que deseja excluir esse cartão?
                    </p>
                </div>
                
                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <!-- Botão fechar modal -->
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Botão para excluir o cartão -->
                    <a href="#" type="button" class="btn btn-primary" id="modalButtonExcluir">Confirmar</a>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- js do client -->
<script src="../js/client.js"></script>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</html>