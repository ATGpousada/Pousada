<?php
// Verificação se tem usuário logado 
include 'verificacao.php';

// Conexão com o banco
include '../connection/connect.php';

// Consulta para pegar os dados do cliente logado
$listaAndamento = $connect->query("SELECT * FROM clientePedidoReservas WHERE STATUS = 'EM ANDAMENTO' AND CLIENTE_ID = ".$_SESSION['id'].";");
$listaPendente = $connect->query("SELECT * FROM clientePedidoReservas WHERE STATUS = 'PENDENTE' AND CLIENTE_ID = ".$_SESSION['id'].";");
$listaConfirmado = $connect->query("SELECT * FROM clientePedidoReservas WHERE STATUS = 'CONFIRMADO' AND CLIENTE_ID = ".$_SESSION['id'].";");

// Pegando a linha do pedido em andamento
$rowAndamento = $listaAndamento->fetch_assoc();
// Pegando a linha do pedido pendente
$rowPendente = $listaPendente->fetch_assoc();
// Pegando a linha do pedido confirmado
$rowConfirmado = $listaConfirmado->fetch_assoc();

// Pegando a linhas do pedido em andamento
$rowsAndamento = $listaAndamento->num_rows;
// Pegando a linhas do pedido pendente
$rowsPendente = $listaPendente->num_rows;
// Pegando a linhas do pedido confirmado
$rowsConfirmado = $listaConfirmado->num_rows;

// Contador para a tabela
$cont = 1;
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap dataTable -->
    <link rel="stylesheet" href="../css/bootstrap-dataTable.css">
    <!-- Nosso estilo -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icons do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Icons do FontAwansome -->
    <script src="https://kit.fontawesome.com/687b2e222f.js" crossorigin="anonymous"></script>
    <!-- Icons do boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.css' rel='stylesheet'>
    <!-- Logo no title -->
    <link rel="icon" type="image/png" href="../images/logo/LOGO POUSADA DO SOSSEGO.png"/>
    <title>Reservas - Pousada do Sossego</title>
</head>
<body>
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>
    
    <!-- Adição do cabeçalho -->
    <?php include 'cabecalhoCliente.php'?>

    <!-- Mensagem na tela -->
    <?php 
        if(isset($_SESSION['cancelar'])){
            echo $_SESSION['cancelar'];
            unset($_SESSION['cancelar']);
        }

        if(isset($_SESSION['confirmar'])){
            echo $_SESSION['confirmar'];
            unset($_SESSION['confirmar']);
        }

        if(isset($_SESSION['reserva'])){
            echo $_SESSION['reserva'];
            unset($_SESSION['reserva']);
        }
    ?>

    <!-- Página principal -->
    <main class="home-section bg-body-tertiary">
        <!-- Menu da página -->
        <nav class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: #11101D;">
            <!-- Conteúdo do menu -->
            <div class="container-fluid">
                <!-- Titulo -->
                <div class="text navbar-brand">Reservas</div>
                
                <!-- Menu responsivo -->
                <button class="navbar-toggler navbar-dark bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Itens do menu -->
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="reservas.php">Pedidos</a>
                        <a class="nav-link" href="historico.php">Histórico</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Seção -->
        <section class="ps-5 pe-5 pb-4 pt-2">
            <!-- Título da página -->
            <h3 class="col-md-12">Pedidos</h4>

            <!-- Links do control tabs (control) -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <!-- Link em andamento -->
                    <button class="nav-link active" id="nav-andamento-tab" data-bs-toggle="tab" data-bs-target="#nav-andamento" type="button" role="tab" aria-controls="nav-andamento" aria-selected="true">Em andamento</button>
                    <!-- Link pendente -->
                    <button class="nav-link" id="nav-pendente-tab" data-bs-toggle="tab" data-bs-target="#nav-pendente" type="button" role="tab" aria-controls="nav-pendente" aria-selected="false">Pendente</button>
                    <!-- Link confirmado -->
                    <button class="nav-link" id="nav-confirma-tab" data-bs-toggle="tab" data-bs-target="#nav-confirma" type="button" role="tab" aria-controls="nav-confirma" aria-selected="false">Confirmada</button>
                </div>
            </nav>

            <!-- Tabs -->
            <div class="tab-content" id="nav-tabContent">
                <!-- Conteúdo com a tabela -->
                <div class="tab-pane fade show active shadow rounded mt-3" id="nav-andamento" role="tabpanel" aria-labelledby="nav-andamento-tab" tabindex="0">
                   <!-- Conteúdo que deixa a tabela reponsiva -->                 
                    <div class="table-responsive rounded p-3">
                        <!-- Tabela -->
                        <table class="table table-hover table-bordered table-striped" id="tabela-reserva-andamento">
                            <!-- Cabeçalho da tabela -->
                            <thead class="table-dark">
                                <!-- Linha do cabeçalho -->
                                <tr>
                                    <!-- Contatdor -->
                                    <th scope="col">#</th>
                                    <!-- Nome -->
                                    <th scope="col">Nome</th>
                                    <!-- Data de entrada -->
                                    <th scope="col">Data de entrada</th>
                                    <!-- Data de saida -->
                                    <th scope="col">Data de saída</th>
                                    <!-- Acompanhantes -->
                                    <th scope="col">Acompanhantes</th>
                                    <!-- Opções -->
                                    <th scope="col" class="w-25">Opções</th>
                                </tr>
                            </thead>

                            <!-- Corpo da tabela -->
                            <tbody>
                                <!-- Caso não tenha nenhum dado -->
                                <?php if ($rowsAndamento < 1) { ?>
                                <tr>
                                    <!-- Caso não tenha nenhum registro mostrará isso -->
                                    <th colspan="6" class="text-center">Nenhum registro encontrado</th>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>   
                                </tr>
                                <!-- Caso tenha dado -->
                                <?php } else { do {?>
                                <tr>
                                    <!-- Contador -->
                                    <th><?php echo $cont?></th>

                                    <!-- Nome do titular da reserva -->
                                    <td><?php echo $rowAndamento['CLIENTE_NOME']?></td>

                                    <!-- Data de entrada -->
                                    <td><?php echo $rowAndamento['PEDIDO_DATA_ENTRADA']?></td>

                                    <!-- Data de saida -->
                                    <td><?php echo $rowAndamento['PEDIDO_DATA_SAIDA']?></td>

                                    <!-- Acompanhantes -->
                                    <td><?php echo $rowAndamento['ACOMPANHANTES']?></td>

                                    <!-- Botões -->
                                    <td>
                                        <div class="d-flex gap-4 justify-content-center"> 
                                            <!-- Botão detalhes -->
                                            <button type="button" class="btn btn-sm btn-outline-primary d-flex gap-2 align-items-center" data-bs-toggle="modal" data-bs-target="#detalhesAndamento" data-idAndamento="<?php echo $rowAndamento['ID_PEDIDO'] ?>"><i class="bi bi-card-list"></i>Detalhes</button>
                                            <!-- Botão cancelar -->
                                            <a href="cancelaPedido.php?id=<?php echo $rowAndamento['ID_PEDIDO'] ?>" type="button" class="btn btn-sm btn-outline-danger d-flex gap-2 align-items-center"><i class="bi bi-x-lg"></i>Cancelar</a>
                                        </div>
                                    </td>   
                                </tr>
                                <!-- Soma do contador e verificação com while -->
                                <?php $cont += 1; } while ($rowAndamento = $listaAndamento->fetch_assoc());}?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Conteúdo com a tabela -->
                <div class="tab-pane fade shadow rounded mt-3" id="nav-pendente" role="tabpanel" aria-labelledby="nav-pendente-tab" tabindex="0">
                    <!-- Conteúdo que deixa a tabela reponsiva --> 
                    <div class="table-responsive rounded p-3">
                        <!-- Tabela -->
                        <table class="table table-hover table-bordered table-striped" id="tabela-reserva-pendente">
                            <!-- Cabeçalho da tabela -->
                            <thead class="table-dark">
                                <!-- Linha do cabeçalho -->
                                <tr>
                                    <!-- Contador -->
                                    <th scope="col">#</th>
                                    <!-- Nome -->
                                    <th scope="col">Nome</th>
                                    <!-- Data de entrada -->
                                    <th scope="col">Data de entrada</th>
                                    <!-- Data de saida -->
                                    <th scope="col" style="width: 50px;">Data de saída</th>
                                    <!-- Acompanhantes -->
                                    <th scope="col" style="max-width: 50px;">Acompanhantes</th>
                                    <!-- Opções -->
                                    <th scope="col" class="w-25">Opções</th>
                                </tr>
                            </thead>

                            <!-- Corpo da tabela -->
                            <tbody>
                                <!-- Caso não tenha nenhum dado -->
                                <?php $cont = 1; if ($rowsPendente < 1) { ?>
                                <tr>
                                    <!-- Caso não tenha nenhum registro mostrará isso -->
                                    <th colspan="6" class="text-center">Nenhum registro encontrado</th>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>   
                                </tr>
                                <!-- Caso tenha dado -->
                                <?php } else { do {?>
                                <tr>
                                    <!-- Contador -->
                                    <th scope="row"><?php echo $cont?></th>

                                    <!-- Nome do titular da reserva -->
                                    <td><?php echo $rowPendente['CLIENTE_NOME']?></td>

                                    <!-- Data de entrada -->
                                    <td><?php echo $rowPendente['PEDIDO_DATA_ENTRADA']?></td>

                                    <!-- Data de saida -->
                                    <td><?php echo $rowPendente['PEDIDO_DATA_SAIDA']?></td>

                                    <!-- Acompanhantes -->
                                    <td><?php echo $rowPendente['ACOMPANHANTES']?></td>

                                    <!-- Botões -->
                                    <td>
                                        <div class="d-flex gap-3 justify-content-center">   
                                            <!-- Botão detalhes -->
                                            <button type="button" class="btn btn-sm btn-outline-primary d-flex gap-2 align-items-center" data-bs-toggle="modal" data-bs-target="#detalhesPendente" data-idPendente="<?php echo $rowPendente['ID_PEDIDO']?>"><i class="bi bi-card-list"></i>Detalhes</button>
                                            <!-- Botão confirmar -->
                                            <a href="confirmaPedido.php?id=<?php echo $rowPendente['ID_PEDIDO'] ?>" type="button" class="btn btn-sm btn-outline-success d-flex gap-2 align-items-center"><i class="bi bi-credit-card-2-back"></i>Pagar Entrada</a>
                                            <!-- Botão cancelar -->
                                            <a href="cancelaPedido.php?id=<?php echo $rowPendente['ID_PEDIDO'] ?>" type="button" class="btn btn-sm btn-outline-danger d-flex gap-2 align-items-center"><i class="bi bi-x-lg"></i>Cancelar</a>
                                        </div>
                                    </td>   
                                </tr>
                                <!-- Soma do contador e verificação com while -->
                                <?php $cont += 1; } while ($rowPendente = $listaPendente->fetch_assoc());}?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Conteúdo com a tabela -->
                <div class="tab-pane fade  shadow rounded mt-3" id="nav-confirma" role="tabpanel" aria-labelledby="nav-confirma-tab" tabindex="0">
                    <!-- Conteúdo que deixa a tabela reponsiva --> 
                    <div class="table-responsive rounded p-3">
                        <!-- Tabela -->
                        <table class="table table-hover table-bordered table-striped" id="tabela-reserva-confirma">
                            <!-- Cabeçalho da tabela -->
                            <thead class="table-dark">
                                <!-- Linha do cabeçalho -->
                                <tr>
                                    <!-- Contador -->
                                    <th scope="col">#</th>
                                    <!-- Nome -->
                                    <th scope="col">Nome</th>
                                    <!-- Data de entrada -->
                                    <th scope="col">Data de entrada</th>
                                    <!-- Data de saida -->
                                    <th scope="col">Data de saída</th>
                                    <!-- Acompanhantes -->
                                    <th scope="col" style="max-width: 50px;">Acompanhantes</th>
                                    <!-- Opções -->
                                    <th scope="col" class="w-25">Opções</th>
                                </tr>
                            </thead>

                            <!-- Corpo da tabela -->
                            <tbody>
                                <!-- Caso não tenha nenhum dado -->
                                <?php $cont = 1; if ($rowsConfirmado < 1) { ?>
                                <tr>
                                    <!-- Caso não tenha nenhum registro mostrará isso -->
                                    <th colspan="6" class="text-center">Nenhum registro encontrado</th>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>

                                    <!-- Não mostra -->
                                    <td class="d-none"></td>   
                                </tr>
                                <!-- Caso tenha dado -->
                                <?php } else { do {?>
                                <tr>
                                    <!-- Contador -->
                                    <th scope="row"><?php echo $cont?></th>

                                    <!-- Nome do titular da reserva -->
                                    <td><?php echo $rowConfirmado['CLIENTE_NOME']?></td>

                                    <!-- Data de entrada -->
                                    <td><?php echo $rowConfirmado['PEDIDO_DATA_ENTRADA']?></td>

                                    <!-- Data de saida -->
                                    <td><?php echo $rowConfirmado['PEDIDO_DATA_SAIDA']?></td>

                                    <!-- Acompanhantes -->
                                    <td><?php echo $rowConfirmado['ACOMPANHANTES']?></td>
                                 
                                    <!-- Botões -->
                                    <td>
                                        <div class="d-flex gap-4 justify-content-center">  
                                            <!-- Botão detalhes -->
                                            <button type="button" class="btn btn-sm btn-outline-primary d-flex gap-2 align-items-center" data-bs-toggle="modal" data-bs-target="#detalhesConfirma" data-idConfirma="<?php echo $rowConfirmado['ID_PEDIDO'] ?>"><i class="bi bi-card-list" ></i>Detalhes</button>
                                            <!-- Botão cancelar -->
                                            <a href="cancelaReserva.php?id=<?php echo $rowConfirmado['ID_PEDIDO'] ?>" type="button" class="btn btn-sm btn-outline-danger d-flex gap-2 align-items-center"><i class="bi bi-x-lg"></i>Cancelar</a>
                                        </div>
                                    </td>   
                                </tr>
                                <!-- Soma do contador e verificação com while -->
                                <?php $cont += 1; } while ($rowConfirmado = $listaConfirmado->fetch_assoc());}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal Detalhes Andamento -->
    <div class="modal fade" id="detalhesAndamento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detalhesAndamento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detalhesAndamento">Detalhes Andamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                    ...
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <!-- <button type="button" class="btn btn-primary">Alterar</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Cancela Andamento -->
    <div class="modal fade" id="cancelaAndamento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cancelaAndamento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cancelaAndamento">Cancela Andamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                    ...
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Confirma Pagamento -->
    <div class="modal fade" id="confirmaPendente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmaPendente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirmaPendente">Realizar Pagamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                    ...
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Pagar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Detalhes Pendente -->
    <div class="modal fade" id="detalhesPendente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detalhesPendente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detalhesPendente">Detalhes Pendente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                    ...
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <!-- <button type="button" class="btn btn-primary">Alterar</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Cancela Pendente -->
    <div class="modal fade" id="cancelaPendente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cancelaPendente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cancelaPendente">Cancela Pendente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                    ...
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Detalhes Confirma -->
    <div class="modal fade" id="detalhesConfirma" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detalhesConfirma" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detalhesConfirma">Detalhes Confirma</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                    ...
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <!-- <button type="button" class="btn btn-primary">Alterar</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Cancela Confirma -->
    <div class="modal fade" id="cancelaConfirma" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cancelaConfirma" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cancelaConfirma">Cancela Confirma</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Corpo do modal -->
                <div class="modal-body">
                    ...
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- Script DataTable -->
<script type="text/javascript" src="../js/bootstrap-dataTable.js"></script>
<!-- Script DataTable2 -->
<script type="text/javascript" src="../js/bootstrap-dataTable2.js"></script>
<!-- Script client -->
<script type="text/javascript" src="../js/client.js"></script>
</html>