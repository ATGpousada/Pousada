<?php
session_start(); 
include '../connection/connect.php';
$id = $_GET['ID'];
$lista = $connect->query("SELECT quartos.*, imagens.IMAGEM_CAMINHO_2, quartos.tipos_ID, tipos.tipo
FROM quartos
INNER JOIN imagens ON quartos.id = imagens.quartos_ID 
INNER JOIN tipos ON quartos.tipos_ID = tipos.id where quartos.ID = $id;");
$linha = $lista->fetch_assoc();
$linhas = $lista->num_rows;
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
    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <!-- Logo no title -->
    <link rel="icon" type="image/png" href="../images/logo/LOGO POUSADA DO SOSSEGO.png"/>
    <title>Detalhes - <?php echo $linha['QUARTO']?></title>
</head>
<body>

    <!-- Início Menu Público -->
    <?php 
    include "../cabecalhoGeral/cabecalhoGeral.php";
    ?>
    <!-- Fim Menu Público -->

    <!-- Início Detalhes -->
    <?php 
    include "detalhe.php";
    ?>
    <!-- Fim Detalhes -->

    <!-- Início Destaque -->
    <?php 
    include "destaqueDetalhe.php";
    ?>
    <!-- Fim Destaque -->

    <!-- Início Rodapé Público -->
    <?php 
    include "../rodapeGeral/rodapeGeral.php";
    ?>
    <!-- Fim Rodapé Público -->
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