<?php 
include '../connection/connect.php';

if ($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $loginQuery = $connect->query("SELECT * FROM clientes WHERE EMAIL = $email LIMIT 1");

    if (!isset($_SESSION)) {
        $sessaoAntiga = session_name('pousada');
        session_start();
        $session_name_new = session_name();
    }

    if(($loginQuery) AND ($loginQuery->num_rows != 0)){
        $loginQuery->fetch_assoc();

        if(password_verify($senha, $loginQuery['senha'])){
            $_SESSION['id'] = $loginQuery['id'];
            $_SESSION['nome'] = $loginQuery['nome'];
            $_SESSION['nome_da_sessao'] = session_name();
            
            header("Location: index.php");
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: E-mail ou senha inválida!</p>";
        }
    }else{
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
<body id="body-login">
    <!-- Icone para voltar -->
    <a class="icon-voltar" href="javascript:window.history.go(-1)"><span><i class="bi bi-chevron-left"></i> Voltar</span></a>
    
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

            <a href="recuperaLogin.php" class="me-auto text-decoration-none ancora-login">Esqueceu sua senha?</a>

            <button id="entrarLogin" name="entrarLogin" type="submit">Entrar</button>
        </form>
        
        <!-- Footer do login -->
        <footer id="footer-login">
            Não tem uma conta? 
        
            <a href="cadastro.php" class="ancora-login">Cadastra-se</a>
        </footer>
    </div>
</body>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>