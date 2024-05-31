<?php 
    // Conexão com o banco 
    include '../connection/connect.php';

    // Verifica se tem valor nos INPUT's
    if ($_POST){
        $dadosInput = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // Consulta para ver se há Cliente cadastrado com o mesmo email especificado
        $loginQuery = $connect->query("SELECT * FROM clientes WHERE EMAIL = '".$dadosInput['email']."';");
    
    
        // Verifica se já existe um Cliente com o email informado
        if($loginQuery->num_rows > 0) {

            // Informa o Cliente que o email já está sendo utilizado e solicita que ele insira outro email
            $_SESSION['msg_cad'] = '            
                <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body">
                            Erro: O email informado já está sendo utilizado. Por favor, informe outro email.
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            ';
        
        } else {
            // Verifica se as senhas são iguais
            if ($dadosInput['senha'] == $dadosInput['senhaConfirma']) {

                // Recebe a nova senha do usúario
                $senhaCliente = $dadosInput['senha'];

                // Abre a session e envia o cliente para logar e entrar na are de cliente
                session_start();
                $_SESSION['dadosCliente'] = $dadosInput;
                header('location: endereco.php');

            // Caso as senhas não sejam iguais
            } else {
                // Mensagem de erro na tela
                $_SESSION['msg_cad'] = '            
                    <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                Erro: As senhas não são iguais! Digite novamente
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                ';
            }
        }
    }
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
    <!-- Logo no title -->
    <link rel="icon" type="image/png" href="../images/logo/LOGO POUSADA DO SOSSEGO.png"/>
    <title>Sing Up - Pousada do Sossego</title>
</head>
<body class="body-login-cadastro">
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>

    <!-- Mensagem na tela -->
    <?php 
        if(isset($_SESSION['msg_cad'])){
            echo $_SESSION['msg_cad'];
            unset($_SESSION['msg_cad']);
        }
    ?>

    <!-- Icone para voltar -->
    <a class="icon-voltar-cadastro" href="login.php"><span><i class="bi bi-chevron-left"></i> Voltar</span></a>
    
    <!-- Circulo no fundo(Amarelo e Azul) -->
    <div class="circulo-cadastro"></div>
    
    <!-- Card Sing Up -->
    <div class="card-login-cadastro" style="width: 320px; margin: auto;">
        <!-- Logo no Sing Up -->
        <div class="logo">
            <img class="w-100" src="../images/logo/LOGO POUSADA DO SOSSEGO.png" alt="">
        </div>
        
        <!-- Titulo nivel dois no Sing Up -->
        <h2>Cadastre-se</h2>
        <p>Informe seus dados</p>
        
        <!-- Formulario do Sing Up -->
        <form class="form-login-cadastro" method="post">
            <!-- Nome -->
            <div class="form-item">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control form-input-item" required>
            </div>

            <!-- E-mail -->
            <div class="form-item">
                <label for="email">E-mail</label>        
                <input type="email" id="email" name="email" class="form-control form-input-item" required>
            </div>

            <!-- Cpf -->
            <div class="form-item">
                <label for="cpf">CPF</label>        
                <input type="cpf" id="cpf" name="cpf" class="form-control form-input-item" data-js="cpf" required>
            </div>

            <!-- Rg -->
            <div class="form-item">
                <label for="rg">RG</label>        
                <input type="rg" id="rg" name="rg" class="form-control form-input-item" data-js="rg" required>
            </div>

            <!-- Senha -->
            <div class="form-item">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control form-input-item" required autocomplete="off">
                <i class="bi bi-eye" id="btny" onclick="mostrarSenha()"></i>
            </div>

            <!-- Confirma senha -->
            <div class="form-item">
                <label for="senhaConfirma">Confirme sua senha</label>
                <input type="password" id="senhaConfirma" name="senhaConfirma" class="form-control form-input-item" required autocomplete="off">
                <i class="bi bi-eye" id="btny2" onclick="mostrarSenha2()"></i>
            </div>

            <button id="entrarLogin" name="entrarLogin" type="submit">Proximo</button>
        </form>
        
        <!-- Footer do Sing Up -->
        <footer id="footer-login">
            Já tem uma conta? 
        
            <a href="index.php" class="ancora-login">Entre</a>
        </footer>
    </div>

</body>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>