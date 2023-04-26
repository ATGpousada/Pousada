<!DOCTYPE html>
<html lang="pt_BR" id="subir">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Nosso estilo -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Icons do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Icons do FontAwansome -->
    <script src="https://kit.fontawesome.com/687b2e222f.js" crossorigin="anonymous"></script>
    <!-- Logo no title -->
    <link rel="icon" type="image/png" href="images/logo/LOGO POUSADA DO SOSSEGO.png"/>
    <title>Pousada do Sossego</title>
</head>
<body class="fundofixo body-geral">
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="images/sol.gif" alt="">
        </div>
    </div>
    <!-- site preloader -->
    <!-- https://icons8.com/preloaders/ -->
    <!-- fim do preloader --> 

    <!-- Adição do cabeçalho -->
    <?php include 'cabecalhoIndex.php'; ?>
    
    <main class="mb-5" style="width: 90%; margin: auto;">
        <!-- Mensagem na tela -->
        <?php 
            if(isset($_SESSION['conf-s'])){
                echo $_SESSION['conf-s'];
                unset($_SESSION['conf-s']);
            }
        ?>

        <div class="container-fluid mb-2 rounded pe-0 ps-0" style="background: rgb(235, 234, 253);">
        <!-- Adição do Carrousel Promoção -->
                <?php include 'carrouselIndex.php'; ?>

                

                <!-- serviços gratuitos -->
                <?php include 'servicosGratuitos.php'?>


                <!-- Adição do destaque -->               
                <?php include 'destaqueQuartos.php';?>
                    

                
                
                <!-- Adição do Carrousel Turísmo -->
                <?php include 'carrouselTurismo.php'; ?>
        </div>
       
    </main>

    <!-- Adição do rodapé -->
    <?php include 'rodapeIndex.php'; ?>
</body>
<!-- js do preloader -->
<script src="js/preloader.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="js/script.js"></script>
</html> 