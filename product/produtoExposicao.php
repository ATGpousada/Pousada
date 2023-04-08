<?php 
include "../connection/connect.php";
$lista = $connect->query("SELECT quartos.ID, quartos.QUARTO, imagens.IMAGEM_CAMINHO_2, quartos.tipos_ID, tipos.TIPO 
FROM quartos
INNER JOIN imagens
ON quartos.ID = imagens.quartos_ID
INNER JOIN tipos
ON quartos.tipos_ID = tipos.ID
GROUP BY quartos.ID
;");
$linha = $lista->fetch_assoc();
$linhas = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <!-- INÍCIO MOSTRAR SE A CONSULTA RETORNAR VAZIO -->
    <?php if($linhas == 0){?>
        <h2 class="breadcrumb alert-danger">
            Não há Quartos Cadastrados
        </h2>
    <?php }?>
    <!-- FIM MOSTRAR SE A CONSULTA RETORNAR VAZIO -->
    <!-- ÍNICIO SE A CONSULTA NÃO RETORNAR VAZIO -->
    <div class="row w100">
            <?php do{?>
                <div class="col-sm-5 col-md-4">
                    <div class="card">
                        <a href="produto_detalhes.php?id_produto=<?php echo $row_produtos['id_produto']?>">
                            <img src="<?php echo $linha['IMAGEM_CAMINHO_2']?>" class="img-fluid rounded float-start">
                        </a>
                        <div class="caption text-end">
                            <h3 class="text-danger text-center">
                                <strong><?php echo $linha ['QUARTO']?></strong>
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
                                <a href="../details/index.php?ID=<?php echo $linha['ID'];?>">
                                    <button class="hidden-xs btn btn-primary" type="submit"> <span class="hidden-xs bi bi-eye" aria-hidden="true"></span>Saiba Mais</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }while ($linha = $lista->fetch_assoc())?>
    <!-- FIM SE A CONSULTAR NÃO RETORNAR VAZIO -->
</body>
</html>