<?php
// Verificação se tem usuário logado 
include 'verificacao.php';

// Conexão com o banco
include '../connection/connect.php';


$lista = $connect->query("SELECT * FROM clientes 
                        INNER JOIN enderecos_cli ON clientes.ID = enderecos_cli.cliente_ID
                        INNER JOIN telefones_cli ON clientes.ID = telefones_cli.cliente_ID
                        WHERE clientes.ID = ".$_SESSION['id'].";");
$row = $lista->fetch_assoc();
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
<style>
    fieldset {
        padding: 15px !important;
        border: 2px solid rgba(0, 0, 0, 0.2) !important;
        border-radius: 5px;
        margin-bottom: 30px !important;
    }
    legend {
        float: unset !important;
        width: unset !important;
        padding: 0 10px !important;
        width:inherit;
    }
</style>
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
                <div class="text navbar-brand">Perfil</div>
                
                <!-- Menu responsivo -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
        

        <section class="ps-5 pe-5 pb-4 pt-2">
            <h3>Conta</h4>

            <fieldset>
                <legend>Login</legend>

                <div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="emailLogin" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="emailLogin" value="<?php echo $row['EMAIL']?>" disabled readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="senhaLogin" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senhaLogin" value="<?php echo $row['SENHA']?>" disabled readonly>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary ms-auto" type="button" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="bi bi-pencil-fill"></i> Editar</button>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Dados Pessoias</legend>
                
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="nomeDados" class="form-label">Nome</label>
                        <input type="email" class="form-control" id="nomeDados" value="<?php echo $row['NOME']?>" disabled readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="cpfDados" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpfDados" value="<?php echo $row['CPF']?>" disabled readonly>
                    </div>

                    <div class="col-6">
                        <label for="rgDados" class="form-label">RG</label>
                        <input type="text" class="form-control" id="rgDados" value="<?php echo $row['RG']?>" disabled readonly>
                    </div>

                    <div class="col-4">
                        <label for="cepDados" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cepDados" value="<?php echo $row['CEP']?>" disabled readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="cidadeDados" class="form-label">CIDADE</label>
                        <input type="text" class="form-control" id="cidadeDados" value="<?php echo $row['CIDADE']?>" disabled readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="ufDados" class="form-label">UF</label>
                        <input type="text" class="form-control" id="ufDados" value="<?php echo $row['UF']?>" disabled readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="numeroDados" class="form-label">Número contato</label>
                        <input type="text" class="form-control" id="numeroDados" value="<?php echo $row['TEL']?>" disabled readonly>
                    </div>

                    
                    <div class="col-md-6">
                        <label for="tipoDados" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipoDados" value="<?php echo $row['TIPO']?>" disabled readonly>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary ms-auto" type="button" data-bs-toggle="modal" data-bs-target="#modalDados"><i class="bi bi-pencil-fill"></i> Editar</button>
                    </div>
                </div>
            </fieldset>
        </section>
    </main>
    <!-- Modal Login -->
    <div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form action="">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="emailAlterar" value="<?php echo $row['EMAIL']?>">
                            <label for="emailAlterar">E-mail</label>
                        </div>
                        
                        <div class="form-floating">
                            <input type="password" class="form-control" id="senhaAlterar" value="<?php echo $row['SENHA']?>">
                            <label for="senhaAlterar">Senha</label>
                        </div>
                        
                        <div class="d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Descartar alterações</button>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dados pessoais -->
    <div class="modal fade" id="modalDados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Dados Pessoais</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                <div class="modal-body">
                    <form action="" class="row g-2">
                        <div class="form-floating col-md-12">
                            <input type="text" class="form-control" id="nomeAlterar" value="<?php echo $row['NOME']?>">
                            <label for="nomeAlterar">Nome</label>
                        </div>
                        
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="cpfAlterar" value="<?php echo $row['CPF']?>">
                            <label for="cpfAlterar">CPF</label>
                        </div>
                        
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="rgAlterar" value="<?php echo $row['RG']?>">
                            <label for="rgAlterar">RG</label>
                        </div>
                        
                        <div class="form-floating col-md-4">
                            <input type="text" class="form-control" id="cepAlterar" value="<?php echo $row['CEP']?>">
                            <label for="cepAlterar">CEP</label>
                        </div>

                        <div class="form-floating col-md-4">
                            <input type="text" class="form-control" id="cidadeAlterar" value="<?php echo $row['CIDADE']?>">
                            <label for="cidadeAlterar">Cidade</label>
                        </div>
                        
                        <div class="form-floating col-md-4">
                            <input type="text" class="form-control" id="ufAlterar" value="<?php echo $row['UF']?>">
                            <label for="ufAlterar">UF</label>
                        </div>

                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="numeroAlterar" value="<?php echo $row['TEL']?>">
                            <label for="numeroAlterar">Número de contato</label>
                        </div>

                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="tipoAlterar" value="<?php echo $row['TIPO']?>">
                            <label for="tipoAlterar">Tipo</label>
                        </div>

                        <div class="d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Descartar alterações</button>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
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
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>