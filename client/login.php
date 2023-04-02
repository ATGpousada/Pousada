<?php
    // Conexão com o banco 
    include '../connection/connect.php';

    // Verifica se tem valor nos INPUT's
    if ($_POST) {
        // Pega o email do INPUT
        $email = $_POST['email'];

        // Pega a senha do INPUT
        $senha = $_POST['senha'];

        // Consulta para ver se há usuário cadastrado com o email especificado
        $loginQuery = $connect->query("SELECT * FROM clientes WHERE EMAIL = '$email' LIMIT 1");
        
        // Recupera dados da linha
        $loginQueryRow = $loginQuery->fetch_assoc();
        
        // Recupera a quantidade de linhas
        $loginQueryNum = $loginQuery->num_rows;
        
        // Verifica se há uma sessão aberta
        if (!isset($_SESSION)) {
            // Nome da sessão antiga
            $sessaoAntiga = session_name('pousada');
            
            //Inicia uma nova sessão
            session_start();

            // Nova sessão
            $session_name_new = session_name();
        }

        // Verifica se teve retorno de cliente
        if($loginQueryNum != 0) {
            // Pega a linha do retorno

            // Verifica se a senha está correta
            if($senha == $loginQueryRow['SENHA']) {
                // Atribui o ID a sessão
                $_SESSION['email'] = $loginQueryRow['EMAIL'];

                // Atribui o nome a sessão
                $_SESSION['nome'] = $loginQueryRow['NOME'];

                // Inicia o nome da sessão
                $_SESSION['nome_da_sessao'] = session_name();
                
                // Encaminha ele a aréa do cliente
                header("Location: index.php");

                // Caso a senha ou email esteja errado
            }else{
                // Mensagem de erro na tela
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: E-mail ou senha inválida!</p>";
            }
            
            // Caso a senha ou email esteja errado
        }else{
            // Mensagem de erro na tela
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: E-mail ou senha inválida!</p>";
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
    <title>Login - Pousada do Sossego</title>
</head>
<body class="body-login">
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>

    <!-- Icone para voltar -->
    <a class="icon-voltar" href="../index.php"><span><i class="bi bi-chevron-left"></i> Voltar</span></a>
    
    <!-- Circulo no fundo(Amarelo e Azul) -->
    <div class="circulo"></div>
    
    <!-- Card login -->
    <div class="card-login">
        <!-- Logo no login -->
        <div class="logo">
            <img class="w-100" src="../images/logo/LOGO POUSADA DO SOSSEGO.png" alt="">
        </div>
        
        <!-- Titulo nivel dois no Login -->
        <h2>Entre na sua conta</h2>
        
        <!-- Formulario do login -->
        <form method="post" action="login.php" class="form-login">

            <!-- Mensagem na tela -->
            <?php 
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>

            <!-- E-mail -->
            <div class="form-item">
                <label for="email">Digite seu E-mail</label>        
                <input type="email" id="email" name="email" class="form-control form-input-item" required>
            </div>

            <!-- Senha -->
            <div class="form-item">
                <label for="senha">Digite sua senha</label>
                <input type="password" id="senha" name="senha" class="form-control form-input-item" required autocomplete="off">
            </div>

            <!-- Link para recuperar senha -->
            <a href="recuperaLogin.php" class="me-auto text-decoration-none ancora-login">Esqueceu sua senha?</a>

            <!-- Botão para enviar os valores do formulário -->
            <button id="entrarLogin" name="entrarLogin" type="submit">Entrar</button>
        </form>
        
        <!-- Footer do login -->
        <footer id="footer-login">
            Não tem uma conta? 
        
            <!-- Link para cadastro -->
            <a href="cadastro.php" class="ancora-login">Cadastra-se</a>
        </footer>
    </div>
</body>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>