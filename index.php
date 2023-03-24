<!DOCTYPE html>
<html lang="pt_BR">
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
<body>
            <!-- início do preloader -->
  <div id="preloader">
    <div class="inner">
       <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
        <img src="images//sol.gif" alt="">
    </div>
</div>
    <!-- site preloader -->
    <!-- https://icons8.com/preloaders/ -->
<!-- fim do preloader --> 
    <!-- Adição do cabeçalho -->
    <?php include 'cabecalhoIndex.php'; ?>
    
    <main class="container-fluid bg-body-tertiary pe-0 ps-0">
        <!-- Adição do Carrousel Promoção -->
        <?php include 'carrouselIndex.php'; ?>

        
        <!-- Adição do Exposição(fotos) da pousada -->
        <?php include 'exposicaoPousada.php'; ?>

        <div class="container p-4">
            <!-- Adição do destaque -->
            <?php include 'destaquePublico.php'; ?>
        </div>
        
        
        <!-- Adição do Carrousel Turísmo -->
        <?php include 'carrouselTurismo.php'; ?>
    </main>

    <!-- Adição do rodapé -->
    <?php include 'rodapeIndex.php'; ?>
    <script src="js/preloader.js"></script>
</body>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="js/script.js"></script>
</html> 