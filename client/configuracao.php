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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                <div class="text navbar-brand">Configurações</div>
            </div>
        </nav>

        <!-- Mensagem na tela -->
        <?php 
            if(isset($_SESSION['conf'])){
                echo $_SESSION['conf'];
                unset($_SESSION['conf']);
            }
        ?>

        <!-- Conteúdo da página -->
        <section class="pt-4 ps-4 pe-4 rounded-2 d-flex" id="areaConfiguracao">
            <!-- Área para desativar a conta -->
            <div class="col-md-6">
                <!-- Botão para desativar a conta (modal desativar) -->
                <div class="d-grid gap-2 ps-5 pe-5 col-md-12">
                    <button class="btn btn-primary col-12" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Desativar conta</button>
                </div>

                <!-- Card com informaçoes -->
                <div class="d-flex justify-content-center mt-5">
                    <div class="card border-primary" style="max-width: 85%;">
                        <div class="card-header"><strong>Informações:</strong></div>
                        
                        <div class="card-body text-primary">
                            <h5 class="card-title">Desativar conta</h5>
                            <p class="card-text">Nessa opção você apenas irá desativar a conta, podendo ativá-la a qualquer momento, apenas logando no nosso site novamente. <br><br> <span><strong>Obs:</strong></span> Após a ativação da conta, você terá acesso a todas as informações da sua conta novamente.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Linha da vertical para dividir a tela -->
            <div class="linha-vertical" id="linha-vertical"></div>

            <!-- Área para excluir a conta -->
            <div class="col-md-6">
                <!-- Botão para excluir a conta (modal excluir) -->
                <div class="d-grid gap-2 ps-5 pe-5 col-md-12">
                    <button class="btn btn-danger col-12" type="button" data-bs-toggle="modal" data-bs-target="#exampleExcluir">Excluir conta</button>
                </div>

                <!-- Card com informaçoes -->
                <div class="d-flex justify-content-center mt-5">
                    <div class="card border-danger" style="max-width: 85%;">
                        <div class="card-header"><strong>Informações:</strong></div>
                        
                        <div class="card-body text-danger">
                            <h5 class="card-title">Excluir conta</h5>
                            <p class="card-text">Nessa aqui você irá excluir permanentemente sua conta no nosso site, perdendo seu histórico de reservas e outros dados relacionado ao seu perfil. <br><br> <span><strong>Obs:</strong></span> Após a exclusão, caso você queira retornar ao nosso site com um novo cadastro, terá de volta suas informaçoes do histórico de reservas se usar o mesmo CPF (Por política da empresa, não apagamos dados das reservas).</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal desativar conta -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <!-- Região que o modal ocupa (centralizado) -->
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Corpo do modal -->
                <div class="modal-body">
                    <h1 class="fs-5">
                        Tem certeza que deseja desativar sua conta?
                    </h1>
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <a href="desativarConta.php" type="button" class="btn btn-primary" id="btnDesativa">Confirmar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal excluir conta -->
    <div class="modal fade" id="exampleExcluir" tabindex="-1" aria-hidden="true">
        <!-- Região que o modal ocupa (centralizado) -->
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Corpo do modal -->
                <div class="modal-body">
                    <h1 class="fs-5">
                        Tem certeza que deseja excluir sua conta?
                    </h1>
                </div>

                <!-- Rodapé do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <a href="excluirConta.php" type="button" class="btn btn-primary" id="btnExclui">Confirmar</a>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- js do client -->
<script src="../js/client.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>