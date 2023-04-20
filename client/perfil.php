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
                            <label for="inputEmail4" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="inputEmail4" value="<?php echo $row['EMAIL']?>" aria-label="Disabled input example" disabled readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="inputPassword4" value="<?php echo $row['SENHA']?>" aria-label="Disabled input example" disabled readonly>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <a href="" class="btn btn-primary ms-auto"><i class="bi bi-pencil-fill"></i> Editar</a>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Dados Pessoias</legend>
                
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Nome</label>
                        <input type="email" class="form-control" id="inputEmail4" value="<?php echo $row['NOME']?>" aria-label="Disabled input example" disabled readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="inputPassword4" value="<?php echo $row['CPF']?>" aria-label="Disabled input example" disabled readonly>
                    </div>

                    <div class="col-6">
                        <label for="inputAddress" class="form-label">RG</label>
                        <input type="text" class="form-control" id="inputAddress" value="<?php echo $row['RG']?>" aria-label="Disabled input example" disabled readonly>
                    </div>

                    <div class="col-4">
                        <label for="inputAddress2" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="inputAddress2" value="<?php echo $row['CEP']?>" aria-label="Disabled input example" disabled readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">CIDADE</label>
                        <input type="text" class="form-control" id="inputCity" value="<?php echo $row['CIDADE']?>" aria-label="Disabled input example" disabled readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="inputZip" class="form-label">UF</label>
                        <input type="text" class="form-control" id="inputZip" value="<?php echo $row['UF']?>" aria-label="Disabled input example" disabled readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">Número contato</label>
                        <input type="text" class="form-control" id="inputZip" value="<?php echo $row['NUMERO']?>" aria-label="Disabled input example" disabled readonly>
                    </div>

                    
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="inputZip" value="<?php echo $row['TIPO']?>" aria-label="Disabled input example" disabled readonly>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <a href="" class="btn btn-primary ms-auto"><i class="bi bi-pencil-fill"></i> Editar</a>
                    </div>
                </div>
            </fieldset>
        </section>
    </main>
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