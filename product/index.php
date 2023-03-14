<?php 
//include "connection/connect.php";
//$lista= $conn->query("select * from quartos");
//$row_produtos = $lista->fetch_assoc();
//$num_linhas = $lista->num_rows;
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
    <title>Pousada - Produtos</title>
</head>
<body>
    <!-- Início Menu Público -->
    <?php 
    include "../cabecalhoGeral/cabecalhoGeral.php"
    ?>
    <!-- Fim Menu Público -->
    <!-- Início Carrossel Produtos-->
    <?php 
    include "carrouselPousada.php";
    ?>
    <!-- Fim Carrossel Produtos-->
    <!-- Início Produto Exposição -->
    <?php 
    include "produtoExposicao.php";
    ?>
    <!-- Fim Produto Exposição -->
    <!-- Início Exposição Produto -->
    <?php 
    include "exposicaoPousada.php";
    ?>
    <!-- Fim Exposição Produto -->
    <!-- Início Rodapé Público -->
    <?php 
    include "../rodapePublico.php";
    ?>
    <!-- Fim Rodapé Público -->
</body>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>