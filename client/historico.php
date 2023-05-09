<?php
// Verificação se tem usuário logado 
include 'verificacao.php';

// Conexão com o banco
include '../connection/connect.php';

// Consulta para pegar os dados do cliente logado
$listaHistorico = $connect->query("SELECT * FROM ClientePedidoReservasGeral WHERE STATUS = 'CONFIRMADO';");

// Pegando a linha do cliente logado
$row = $listaHistorico->fetch_assoc();
$rows = $listaHistorico->num_rows;

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
    <title>Login - Pousada do Sossego</title>
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

        
        <section class="ps-5 pe-5 pb-4 pt-2">
            <!-- Título da página -->
            <h3 class="col-md-12">Histórico</h4>

            <div class="tab-pane fade show active shadow rounded mt-3">
                <div class="table-responsive rounded p-3">
                    <table class="table table-hover table-bordered table-striped tabela-reserva">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data de entrada</th>
                                <th scope="col">Data de saída</th>
                                <th scope="col">Acompanhantes</th>
                                <th scope="col">...</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if ($rows < 1) { ?>
                            <tr>
                                <th colspan="6" class="text-center">Nenhum registro encontrado</th>

                                <td class="d-none"></td>

                                <td class="d-none"></td>

                                <td class="d-none"></td>

                                <td class="d-none"></td>

                                <td class="d-none"></td>   
                            </tr>
                            <?php } else { do {?>
                            <tr>
                                <th scope="row"><?php echo $cont;?></th>

                                <td><?php echo $rowPendente['CLIENTE_NOME']?></td>

                                <td><?php echo $rowPendente['PEDIDO_DATA_ENTRADA']?></td>

                                <td><?php echo $rowPendente['PEDIDO_DATA_SAIDA']?></td>

                                <td><?php echo $rowPendente['ACOMPANHANTES']?></td>
                                
                                <td> 
                                    <div class="d-flex gap-4 justify-content-center"> 
                                        <button type="button" class="btn btn-outline-primary d-flex gap-2 align-items-center btn-sm" data-bs-toggle="modal" data-bs-target="#detalhesHistorico"><i class="bi bi-card-list"></i>Detalhes</button>
                                    </div>
                                </td>   
                            </tr>
                            <?php $cont += 1; } while ($row = $listaHistorico->fetch_assoc());}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal Detalhes Historico -->
    <div class="modal fade" id="detalhesHistorico" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detalhesHistorico" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detalhesHistorico">Detalhes Historico</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    ...
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
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