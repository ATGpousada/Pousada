<?php 

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="carroselPousada">
        <!-- Início Indicadores Carrossel -->
        <ol class="carousel-indicators">
            <li data-target="#carrosselPousada" data-slide-to="0" class="active">
                <!-- Indicador 0, iniciando como 'active' quando carregado o site -->
            </li>
            <li data-target="#carrosselPousada" data-slide-to="1" class="active">
                <!-- Indicador 1 -->
            </li>
            <li data-target="#carrosselPousada" data-slide-to="2" class="active">
                <!-- Indicador 2 -->
            </li>
        </ol>
        <!-- Início itens do carrossel -->
        <div class="carousel-inner">
            <!-- Início Primeiro Item do Slide -->
            <div class="carousel-item active"> <!-- esta ativo por que este item inicia como padrão quando carregado a página -->
                <img class="d-block w-100" src="../images/LOGO POUSADA POR EXTENSO BRANCO.png" alt="Primeiro Slide">
            </div>
            <!-- Fim Primeiro Item do Slide -->
            <!-- Início Segundo Item do Slide -->
            <div class="carousel-item">
                <img class="d-block w-100" src="../images/LOGO POUSADA POR EXTENSO BRANCO.png" alt="Segundo Slide">
            </div>
            <!-- Fim Segundo Item do Slide -->
            <!-- Início Terceiro Item do Slide -->
            <div class="carousel-item">
                <img class="d-block w-100" src="../images/LOGO POUSADA POR EXTENSO BRANCO.png" alt="Terceiro Slide">
            </div>
            <!-- Fim Terceiro Item do Slide -->
        </div>
        <!-- Início itens do carrossel -->
    </div>
</body>
</html>

<!-- classe d-block e w100 para evitar alinhamento padrão dos navegadores nos itens do carrossel -->