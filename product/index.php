<!DOCTYPE html>
<html lang="pt_BR" id="subir">
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
    <title>Pousada - Quartos</title>
</head>
<body class="fundofixo" style="padding-top: 6.5em !important;">
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>

    <script>
    window.scroll({
    top:0,
    behavior:'smooth'
    })
    </script>
    <!-- Fim do Scroll -->


    <!-- Início Menu Público -->
    <?php 
    include "../cabecalhoGeral/cabecalhoGeral.php"
    ?>
    <!-- Fim Menu Público -->

    <!-- Início container -->
    <main class="container bg-body-tertiary rounded">
        <div class="row mb-5">

            <!-- Início Produto Exposição -->
            <?php 
            include "produtoExposicao.php";
            ?>
            <!-- Fim Produto Exposição -->
            
        </div>
    </main>
    <!-- Fim Container -->
    
    <!-- Início Rodapé Público -->
    <?php 
    include "../rodapeGeral/rodapeGeral.php";
    ?>
    <!-- Fim Rodapé Público -->
</body>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>