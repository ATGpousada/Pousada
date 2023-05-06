<?php 
include "../connection/connect.php";
$lista = $connect->query("SELECT quartos.ID, quartos.QUARTO, imagens.IMAGEM_CAMINHO_2, quartos.tipos_ID, tipos.TIPO, quartos.QTDE_PESSOAS, quartos.PRECO_DIARIA
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
    <?php } else {?>
    <!-- FIM MOSTRAR SE A CONSULTA RETORNAR VAZIO -->
    <!-- ÍNICIO SE A CONSULTA NÃO RETORNAR VAZIO -->
    <div class="d-flex justify-content-around flex-wrap rounded p-4" style="background: rgb(235, 234, 253);">
        <h1 class="text-center text-uppercase w-100">Quartos <hr></h1>
        <div class="d-flex justify-content-around flex-wrap">
            <?php do{?>
            <div class="card_quarto">
                <div class="icon_quarto">
                    <div><img src="<?php echo $linha['IMAGEM_CAMINHO_2']?>" alt="" class="img-destaque"></div>
                </div>
                <strong><?php echo $linha['QUARTO']?></strong>
                <p style="margin: 0;"><?php echo $linha['TIPO']?></p>
                <div class="card__corpo">
                <p class="preco_quarto"> R$&nbsp;<?php echo str_replace('.', ',', $linha['PRECO_DIARIA']);?></p>

                <div class="icones">
                    <div class="icone">
                        <p><i class="fa-solid fa-users" style="color: white;"></i></p>
                        <div class="sub-texto">
                            <?php echo $linha['QTDE_PESSOAS']?> Pessoas
                        </div>
                    </div>

                    <div class="icone">
                        <p><i class="fa-solid fa-paw" style="color: white;"></i></p>
                        <div class="sub-texto">
                            Animais
                        </div>
                    </div>

                    <div class="icone">
                        <p><i class="fa-solid fa-mug-hot" style="color: white;"></i></p>
                        <div class="sub-texto">
                            Café da Manhã
                        </div>
                    </div>
                </div>

                </div>
                <a class="my-button bg-primary" href="../details/index.php?ID=<?php echo $linha['ID']?>">
                    Saiba mais!
                </a>
            </div>
            <?php }while($linha = $lista->fetch_assoc())?>
        </div>
        <?php }?>    
    </div>     
</div> 


    <!-- FIM SE A CONSULTAR NÃO RETORNAR VAZIO -->
</body>
</html>