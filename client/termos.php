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

    <!-- Icone para voltar -->
    <a class="icon-voltar-cadastro" style="cursor: pointer;" onclick="window. history. back();"><span><i class="bi bi-chevron-left"></i> Voltar</span></a>

    <!-- Circulo no fundo(Amarelo e Azul) -->
    <div class="circulo-cadastro"></div>

    <!-- Card Sing Up -->
    <div class="card-login-termos">
        <!-- Logo no Sing Up -->
        <div class="logo">
            <img class="w-100" src="../images/logo/LOGO POUSADA DO SOSSEGO.png" alt="">
        </div>
        
        <!-- Titulo nivel dois no Sing Up -->
        <h2>Termos de cadastro</h2>
        
        <!-- Formulario do Sing Up -->
        <form class="form-login-termos p-4" method="post">
            <p>1.Todas as informações fornecidas no cadastro são verdadeiras e precisas</p>
            <p>2.É de responsabilidade do hóspede informar à Pousada do Sossego sobre quaisquer <br> mudanças em suas informações de contato ou detalhes de reserva.</p>
            <p>3.A Pousada do Sossego não se responsabiliza por quaisquer danos ou perdas causados por informações incorretas fornecidas pelo hóspede. </p>
            <p>4.É de responsabilidade do hóspede informar à Pousada do Sossego sobre quaisquer necessidades especiais, como restrições alimentares ou necessidades de acessibilidade.</p>
            <p>5.O hóspede concorda em cumprir todas as políticas e regulamentos da Pousada do Sossego, incluindo aqueles relacionados a cancelamentos e reembolsos.</p>
            <p>6.O hóspede concorda em pagar todas as taxas e despesas incorridas durante sua estadia na Pousada do Sossego.</p>
            <p>7.A Pousada do Sossego se reserva o direito de cancelar a reserva do hóspede a qualquer momento, se descobrir que as informações fornecidas no cadastro são falsas ou enganosas.</p>
            <p>8.O hóspede concorda em cumprir todas as políticas de saúde e segurança em vigor na Pousada do Sossego, incluindo aquelas relacionadas à pandemia da COVID-19.</p>
            <p>9.O hóspede reconhece que a Pousada do Sossego pode entrar em contato com ele para fins de marketing e promoção. O hóspede tem o direito de optar por não receber essas comunicações a qualquer momento.</p>
    </form>
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