<?php
// Verificação se tem usuário logado 
include 'verificacao.php';

// Conexão com o banco
include '../connection/connect.php';

// // Consulta para pegar os dados do cliente logado
// $lista = $connect->query("SELECT * FROM pedidos_reservas WHERE clientes.ID = ".$_SESSION['id'].";");

// // Pegando a linha do cliente logado
// $row = $lista->fetch_assoc();
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
                            <?php ?>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@twitter</td>
                                <td>@twitter</td>   
                            </tr>
                            <? ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
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