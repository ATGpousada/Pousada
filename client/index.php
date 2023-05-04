<?php
// Verificação se tem usuário logado 
include 'verificacao.php';

// Conexão com o banco
include '../connection/connect.php';
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Nosso estilo -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icons do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Icons do FontAwansome -->
    <script src="https://kit.fontawesome.com/687b2e222f.js" crossorigin="anonymous"></script>
    <!-- Icons do boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
        <nav class="navbar navbar-expand-lg mb-4" data-bs-theme="dark" style="background-color: #11101D;">
            <!-- Conteúdo do menu -->
            <div class="container-fluid">
                <!-- Titulo -->
                <div class="text navbar-brand">Geral</div>
            </div>
        </nav>
        
        <!-- Cards geral -->
        <section class="bg-body-secondary p-4 me-4 ms-4 rounded-2">
            <!-- Cards -->
            <div id="cards-paginas" class="d-flex justify-content-around flex-wrap">
                <!-- Card para o perfil -->
                <div id="card-perfil" style="width: 340px;">
                    <div class="card w-100 overflow-hidden mb-3 d-flex align-items-center bg-info bg-gradient" style="width: 22rem; height: 15rem;">
                        <div class="card-body d-flex flex-column p-0 mt-4">
                            <i class='bx bx-user card-icon'></i>
                            
                            <h5 class="card-title fs-4 text-uppercase card-texts ms-2 fw-semibold">Perfil</h5>

                            <p class="card-text card-texts w-75 ms-2 fw-medium">Caso deseje visualizar e mudar seus dados pessoais, entre aqui <?php echo $_SESSION['nome']?>.</p>

                            <a href="perfil.php" class="card-link text-white bg-info bg-gradient bg-opacity-25 shadow-lg position-absolute bottom-0 w-100 p-4 d-flex justify-content-between text-decoration-none" style="height: 70px;">
                                <span class="fs-5 d-flex align-items-center">Ver detalhes</span>
                                
                                <i class='bx bx-chevron-right fs-5'></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card para a reserva -->
                <div id="card-reserva" style="width: 340px;">
                    <div class="card w-100 overflow-hidden mb-3 d-flex align-items-center bg-danger bg-gradient" style="width: 22rem; height: 15rem;">
                        <div class="card-body d-flex flex-column p-0 mt-4">
                            <i class='bx bx-calendar card-icon'></i>
                            
                            <h5 class="card-title fs-4 text-uppercase card-texts ms-2 fw-semibold">Reserva</h5>
                            
                            <p class="card-text card-texts w-75 ms-2 fw-medium">Clique aqui para ver os detalhes das suas reservas <?php echo $_SESSION['nome']?>.</p>
                            
                            <a href="reservas.php" class="card-link text-white bg-danger bg-gradient bg-opacity-25 shadow-lg position-absolute bottom-0 w-100 p-4 d-flex justify-content-between text-decoration-none" style="height: 70px;">
                                <span class="fs-5 d-flex align-items-center">Ver detalhes</span>
                                
                                <i class='bx bx-chevron-right fs-5'></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Card para configurações -->
                <div id="card-config" style="width: 340px;">
                    <div class="card w-100 overflow-hidden mb-3 d-flex align-items-center bg-warning bg-gradient" style="width: 22rem; height: 15rem;">
                        <div class="card-body d-flex flex-column p-0 mt-4">
                            <i class='bx bx-cog card-icon'></i>
                            
                            <h5 class="card-title fs-4 text-uppercase text-white card-texts ms-2 fw-semibold">Configurações</h5>
                            
                            <p class="card-text text-white card-texts w-75 ms-2 fw-medium">Entre aqui para, caso desejar desativar ou excluir sua conta <?php echo $_SESSION['nome']?>.</p>
                            
                            <a href="configuracao.php" class="card-link text-white bg-warning bg-gradient bg-opacity-25 shadow-lg position-absolute bottom-0 w-100 p-4 d-flex justify-content-between text-decoration-none" style="height: 70px;">
                                <span class="fs-5 d-flex align-items-center">Ver detalhes</span>
                                
                                <i class='bx bx-chevron-right fs-5'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Caixa de Informações -->
        <section class="bg-body-secondary p-4 m-4 rounded-2">
            <!-- Card -->
            <div class="card border-bottom border-danger">
                <!-- Cabeçalho do card -->
                <div class="card-header fw-medium bg-danger text-white">
                    Atenção
                </div>

                <!-- Corpo do card -->
                <div class="card-body">
                    <!-- Título do card -->
                    <h5 class="card-title">Informações:</h5>
                    <!-- Texto do card -->
                    <p class="card-text">
                        <!-- Lista do card -->
                        <div class="row rounded pt-3 pb-4">
                            <!-- Grupo de listas -->
                            <div class="col-6" id="item-select">
                                <div class="list-group rounded" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Página Geral</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Página Perfil</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Página Reservas</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Página Configurações</a>
                                </div>
                            </div>
                            
                            <!-- Grupo de listas com informaçoes <behavior> -->
                            <div class="col-6" id="item-info">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Nessa área você terá uma visão geral das páginas acessíveis na área do cliente. Por exemplo: a Página de Perfil, a Página de reservas e a Página de Configurações.</div>
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Já no perfil, é uma página dedicada para expor os seus dados pessoais <?php echo $_SESSION['nome']?>, para caso desejar ou sentir a necessidade de mudar.</div>
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Na página de reserva você poderá ver dados do seu pedido de reserva e a sua situação atual, e, caso desejar, se tiver dentro das diretrizes aceitas no momento que realizou a reserva, poderá fazer alterações. Também terá acesso ao histórico das reservas efetuadas.</div>
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Aqui, na página de configurações, terá opções para desativar ou excluir sua conta do nosso site.</div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- js do client -->
<script src="../js/client.js"></script>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
</html>