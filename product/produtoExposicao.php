<?php ?>

<!DOCTYPE html>
<html lang="pt_BR">
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos</title>
</head>
<body>
<div class="row w100">
            <?php //do{?>
                <div class="col-sm-5 col-md-4">
                    <div class="card">
                        <a href="produto_detalhes.php?id_produto=<?php echo $row_produtos['id_produto']?>">
                            <img src="../images/quartos/quarto1.jpg" class="img-fluid rounded float-start">
                        </a>
                        <div class="caption text-end">
                            <h3 class="text-danger text-center">
                                <strong>Quarto Laranja</strong>
                            </h3>
                            <p class="text-warning text-center">
                                <strong>Suíte</strong>
                            </p>
                            <p class="text-start">
                                Este quarto blá blá blá
                            </p>
                            <div id="icon_botao" class="d-flex justify-content-beetween">
                                <span class="me-auto">
                                    <span class="bi bi-people-fill" style="color: goldenrod; font-size: 25px"></span>
                                    <span class="bi bi-car-front-fill" style="color: goldenrod; font-size: 25px"></span>
                                    <span class="fas fa-bed" style="color: goldenrod; font-size: 23px"></span>
                                    <span class="fas fa-bath" style="color: goldenrod; font-size: 23px"></span>
                                    <span class="fa-solid fa-mug-hot" style="color: goldenrod; font-size: 23px"></span>
                                </span>
                                <a href="../details/index.php?ID=<?php //echo $row_produtos['id_produto'];?>">
                                    <button class="hidden-xs btn btn-primary" type="submit"> <span class="hidden-xs bi bi-eye" aria-hidden="true"></span>Saiba Mais</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php //}while ($row_produtos = $lista->fetch_assoc())?>
    <div class="PARTIÇÃO">
        <div>
        <img src="../images/quartos/quarto1.jpg" alt="" style="width: 600px;">
        </div>
        <div>
            <div class="centraliza_q1">
            <h1>Suite com varanda</h1>
            </div>
            
            <div class="distribuição">
            <span class="fas fa-car"style="font-size: 50px;">
            </span>
            <h6>Estacionamento</h6>
            </div>
            <div class="distribuição">
            <span class="fas fa-bath"style="font-size: 50px;">
            </span>
            <h6>Banheiro</h6>
            </div>
            <div class="distribuição">
            <span class="fa-solid fa-mug-hot"style="font-size: 50px;">
            </span>
            <h6>Café da manhã</h6>
            </div>
            <div class="distribuição">
            <span class="fas fa-desktop"style="font-size: 50px;">
            </span>
            <h6>Tv Smart</h6> 
            </div>
            <div class="distribuição">
            <span class="fas fa-snowflake"style="font-size: 50px;">
            </span>
            <h6>Ar condicionado</h6> 
            </div>
            <div class="distribuição">
            <span class="fas fa-paw" style="font-size: 50px;">
            </span>
            <h6>Pets</h6> 
            </div>
            
        </div> 
    </div>
</body>
</html>