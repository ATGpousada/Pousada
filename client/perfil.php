<?php
// Verificação se tem usuário logado 
include 'verificacao.php';

// Conexão com o banco
include '../connection/connect.php';

// Consulta para pegar os dados do cliente logado
$lista = $connect->query("SELECT * FROM clientes 
                        INNER JOIN enderecos_cli ON clientes.ID = enderecos_cli.cliente_ID
                        INNER JOIN telefones_cli ON clientes.ID = telefones_cli.cliente_ID
                        WHERE clientes.ID = ".$_SESSION['id'].";");

// Pegando a linha do cliente logado
$row = $lista->fetch_assoc();
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
            if(isset($_SESSION['alterar'])){
                echo $_SESSION['alterar'];
                unset($_SESSION['alterar']);
            }
        ?>

        <!-- Conteúdo cliente -->
        <section class="ps-5 pe-5 pb-4 pt-2">
            <!-- Título da página -->
            <h3 class="col-md-12">Conta</h4>
            
            <!-- Área para consultar ou realizar alteações do login -->
            <fieldset class="col-md-12 shadow">
                <!-- Título da área do login -->
                <legend>Informações da conta</legend>

                <!-- Começo do formulário para consulta -->
                <div>
                    <div class="row g-3 pb-4">
                        <!-- E-mail -->
                        <div class="col-md-6">
                            <label for="emailLogin" class="form-label">E-mail</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="emailLogin" name="emailLogin" value="<?php echo $row['EMAIL']?>" disabled readonly>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modalEmail"><i class="bi bi-pencil-fill"></i> Editar</button>
                            </div>
                        </div>

                        <!-- Nome -->
                        <div class="col-md-6">
                            <label for="nomeDados" class="form-label">Nome</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="nomeLogin" name="nomeLogin" value="<?php echo $row['NOME']?>" disabled readonly>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modalNome"><i class="bi bi-pencil-fill"></i> Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- Área para consultar ou realizar alteações dos dados pessoais -->
            <div class="d-flex gap-5" id='group-formulario'>
                <!-- Área para consultar ou realizar alteações dos dados pessoais -->
                <fieldset class="w-50 h-50 shadow" id="dados-pessoais">
                    <!-- Título da área dos dados pessoais -->
                    <legend>Dados Pessoias</legend>
                    
                    <!-- Começo do formulário para consulta -->
                    <div class="row g-3">
                        <!-- CPF -->
                        <div class="col-md-6">
                            <label for="cpfDados" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpfDados" name="cpfDados" value="<?php echo $row['CPF']?>" disabled readonly>
                        </div>

                        <!-- RG -->
                        <div class="col-md-6">
                            <label for="rgDados" class="form-label">RG</label>
                            <input type="text" class="form-control" id="rgDados" name="rgDados" value="<?php echo $row['RG']?>" disabled readonly>
                        </div>

                        <!-- Botão para editar -->
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary ms-auto" type="button" data-bs-toggle="modal" data-bs-target="#modalDados"><i class="bi bi-pencil-fill"></i> Editar</button>
                        </div>
                    </div>
                </fieldset>

                <!-- Área para consultar ou realizar alteações do contato -->
                <fieldset class="w-50 h-50 shadow" id="contato">
                    <!-- Título da área do contato-->
                    <legend>Contato</legend>
                    
                    <!-- Começo do formulário para consulta -->
                    <div class="row g-3">
                        <!-- Número de telefone -->
                        <div class="col-md-6">
                            <label for="numeroContato" class="form-label">Número de contato</label>
                            <input type="text" class="form-control" id="numeroContato" name="numeroContato" value="<?php echo $row['TEL']?>" disabled readonly>
                        </div>

                        <!-- Tipo do número do telefone -->
                        <div class="col-md-6">
                            <label for="tipoContato" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipoContato" name="tipoContato" value="<?php echo $row['TIPO']?>" disabled readonly>
                        </div>

                        <!-- Botão para editar -->
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary ms-auto" type="button" data-bs-toggle="modal" data-bs-target="#modalContato"><i class="bi bi-pencil-fill"></i> Editar</button>
                        </div>
                    </div>
                </fieldset>
            </div>

            <!-- Área para consultar ou realizar alteações do endereço -->
            <fieldset class="w-100 shadow" id="dados-pessoais">
                <!-- Título da área do endereço -->
                <legend>Endereço</legend>
                
                <!-- Começo do formulário para consulta -->
                <div class="row g-3">
                    <!-- CEP -->
                    <div class="col-md-4">
                        <label for="cepEndereco" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cepEndereco" name="cepEndereco" value="<?php echo $row['CEP']?>" disabled readonly>
                    </div>

                    <!-- Cidade -->
                    <div class="col-md-4">
                        <label for="cidadeEndereco" class="form-label">CIDADE</label>
                        <input type="text" class="form-control" id="cidadeEndereco" name="cidadeEndereco" value="<?php echo $row['CIDADE']?>" disabled readonly>
                    </div>

                    <!-- UF -->
                    <div class="col-md-4">
                        <label for="ufEndereco" class="form-label">UF</label>
                        <input type="text" class="form-control" id="ufEndereco" name="ufEndereco" value="<?php echo $row['UF']?>" disabled readonly>
                    </div>

                    <!-- Logradouro -->
                    <div class="col-md-8">
                        <label for="logradouroEndereco" class="form-label">LOGRADOURO</label>
                        <input type="text" class="form-control" id="logradouroEndereco" name="logradouroEndereco" value="<?php echo $row['LOGRADOURO']?>" disabled readonly>
                    </div>

                    <!-- NUMERO -->
                    <div class="col-md-4">
                        <label for="numeroEndereco" class="form-label">NÚMERO</label>
                        <input type="text" class="form-control" id="numeroEndereco" name="numeroEndereco" value="<?php echo $row['NUMERO']?>" disabled readonly>
                    </div>

                    <!-- Botão para editar -->
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary ms-auto" type="button" data-bs-toggle="modal" data-bs-target="#modalEndereco"><i class="bi bi-pencil-fill"></i> Editar</button>
                    </div>
                </div>
            </fieldset>
        </section>
    </main>

    <!-- Modal E-mail -->
    <div class="modal fade" id="modalEmail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <!-- Corpo do modal -->
                <div class="modal-body">
                    <!-- Formulário para alterar o login -->
                    <form action="alterarEmail.php" method="post" class="row g-3">
                        <!-- Nome -->
                        <div class="form-floating col-md-12">
                            <input type="email" class="form-control" id="emailAlterar" name="emailAlterar" value="<?php echo $row['EMAIL']?>" required>
                            <label for="emailAlterar">E-mail</label>
                        </div>

                        <!-- Botão para realizar a alteração  -->
                        <div class="d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Descartar alterações</button>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nome -->
    <div class="modal fade" id="modalNome" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <!-- Corpo do modal -->
                <div class="modal-body">
                    <!-- Formulário para alterar o login -->
                    <form action="alterarNome.php" method="post" class="row g-3">
                        <!-- E-mail -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nomeAlterar" name="nomeAlterar" value="<?php echo $row['NOME']?>" required>
                            <label for="nomeAlterar">Nome</label>
                        </div>

                        <!-- Botão para realizar a alteração  -->
                        <div class="d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Descartar alterações</button>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dados Pessoais -->
    <div class="modal fade" id="modalDados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Dados Pessoais</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <!-- Corpo do modal -->
                <div class="modal-body">
                    <!-- Formulário para alterar o login -->
                    <form action="alterarDados.php" method="post" class="row g-3">                      
                        <!-- CPF -->
                        <div class="form-floating col-md-12">
                            <input type="text" class="form-control" id="cpfAlterar" name="cpfAlterar" value="<?php echo $row['CPF']?>" data-js="cpf" required>
                            <label for="cpfAlterar">CPF</label>
                        </div>
                        
                        <!-- RG -->
                        <div class="form-floating col-md-12">
                            <input type="text" class="form-control" id="rgAlterar" name="rgAlterar" value="<?php echo $row['RG']?>" data-js="rg" required>
                            <label for="rgAlterar">RG</label>
                        </div>

                        <!-- Informação para o cliente -->
                        <div class="alert alert-primary mb-3 mt-3" role="alert">
                            <strong>Atenção: </strong> Caso desejar mudar apenas um dado, mantenha os outros como estavam!
                        </div>

                        <!-- Botão para realizar a alteração  -->
                        <div class="d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Descartar alterações</button>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Contato -->
    <div class="modal fade" id="modalContato" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Contato</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <!-- Corpo do modal -->
                <div class="modal-body">
                    <!-- Formulário para alterar os contato -->
                    <form action="alterarContato.php" method="post" class="row g-3">
                        <!-- Número de telefone -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="numeroContatoAlterar" name="numeroContatoAlterar" value="<?php echo $row['TEL']?>" data-js="phone" required>
                            <label for="numeroContatoAlterar">Número de contato</label>
                        </div>

                        <!-- Tipo de telefone -->
                        <div class="form-floating col-md-6">
                            <input type="text" list="tipos" class="form-control" id="tipoContatoAlterar" name="tipoContatoAlterar" value="<?php echo $row['TIPO']?>" required>
                            <datalist id="tipos">
                                <option value="Pessoal">
                                <option value="Residêncial">
                                <option value="Profissional">
                            </datalist>

                            <label for="tipoContatoAlterar">Tipo</label>
                        </div>

                        <!-- Informação para o cliente -->
                        <div class="alert alert-primary mb-3 mt-3" role="alert">
                            <strong>Atenção: </strong> Caso desejar mudar apenas um dado, mantenha os outros como estavam!
                        </div>
                        
                        <!-- Botão para realizar a alteração  -->
                        <div class="d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Descartar alterações</button>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Endereço -->
    <div class="modal fade" id="modalEndereco" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <!-- Cabeçalho do modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Endereço</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <!-- Corpo do modal -->
                <div class="modal-body">
                    <!-- Formulário para alterar o endereço -->
                    <form action="alterarEndereco.php" method="post" class="row g-3">
                        <!-- CEP -->
                        <div class="form-floating col-md-4">
                            <input type="text" class="form-control" id="cepAlterar" name="cepAlterar" value="<?php echo $row['CEP']?>" data-js="cep" required>
                            <label for="cepAlterar">CEP</label>
                        </div>

                        <!-- Cidade -->
                        <div class="form-floating col-md-4">
                            <input type="text" class="form-control" id="cidadeAlterar" name="cidadeAlterar" value="<?php echo $row['CIDADE']?>" required>
                            <label for="cidadeAlterar">Cidade</label>
                        </div>
                        
                        <!-- UF -->
                        <div class="form-floating col-md-4">
                            <input type="text" class="form-control" id="ufAlterar" name="ufAlterar" value="<?php echo $row['UF']?>" required>
                            <label for="ufAlterar">UF</label>
                        </div>

                        <!-- Logradouro -->
                        <div class="form-floating col-md-8">
                            <input type="text" class="form-control" id="logradouroAlterar" name="logradouroAlterar" value="<?php echo $row['LOGRADOURO']?>" required>
                            <label for="logradouroAlterar">Logradouro</label>
                        </div>

                        <!-- Numero -->
                        <div class="form-floating col-md-4">
                            <input type="text" class="form-control" id="numeroEnderecoAlterar" name="numeroEnderecoAlterar" value="<?php echo $row['NUMERO']?>" required>
                            <label for="numeroEnderecoAlterar">Número</label>
                        </div>

                        <!-- Informação para o cliente -->
                        <div class="alert alert-primary mb-3 mt-3" role="alert">
                            <strong>Atenção: </strong> Caso desejar mudar apenas um dado, mantenha os outros como estavam!
                        </div>
                        
                        <!-- Botão para realizar a alteração  -->
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
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- js do client -->
<script src="../js/client.js"></script>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>