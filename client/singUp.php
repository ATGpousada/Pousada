<?php ?>

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
<body id="body-login">
    <!-- Icone para voltar -->
    <a class="icon-voltar" href="javascript:window.history.go(-1)"><span><i class="bi bi-chevron-left"></i> Voltar</span></a>
    
    <!-- Circulo no fundo(Amarelo e Azul) -->
    <div class="circulo"></div>
    
    <!-- Card Sing Up -->
    <div class="card-login">
        <!-- Logo no Sing Up -->
        <div class="logo">
            <img class="w-100" src="../images/logo/LOGO POUSADA DO SOSSEGO.png" alt="">
        </div>
        
        <!-- Titulo nivel dois no Sing Up -->
        <h2>Cadastre-se</h2>
        
        <!-- Formulario do Sing Up -->
        <form class="form-login">

            <!-- Nome -->
            <div class="form-item">
                <label for="nome">Digite seu Nome</label>
                <input type="text" id="nome" name="nome" class="form-control form-input-item" required>
            </div>

            <!-- E-mail -->
            <div class="form-item">
                <label for="email">Digite seu E-mail</label>        
                <input type="email" id="email" name="email" class="form-control form-input-item" required>
            </div>

            <!-- Telefone -->
            <div class="form-item">
                <label for="email">Informe seu Telefone</label>        
                <input type="tel" id="telefone" name="telefone" class="form-control form-input-item" oninput="mascara(this)" required>
            </div>

            <!-- Senha -->
            <div class="form-item">
                <label for="senha">Digite sua senha</label>
                <input type="password" id="senha" name="senha" class="form-control form-input-item" required autocomplete="off">
            </div>

            <!-- ConfirSenha -->
            <div class="form-item">
                <label for="senha">Confirme sua senha</label>
                <input type="password" id="senha" name="senha" class="form-control form-input-item" required autocomplete="off">
            </div>

            <a href="recuperaLogin.php" class="me-auto text-decoration-none ancora-login">Esqueceu sua senha?</a>

            <button type="submit">Entrar</button>
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
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>