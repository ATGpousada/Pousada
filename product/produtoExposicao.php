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
    <?php } else {?>
    <!-- FIM MOSTRAR SE A CONSULTA RETORNAR VAZIO -->
    <!-- ÍNICIO SE A CONSULTA NÃO RETORNAR VAZIO -->
    <div class="row w100">
    <?php do {?>
    <div class="PARTIÇÃO">
        <div style="margin: 30px;">
            <img src="<?php echo $linha['IMAGEM_CAMINHO_2'];?>" alt="" style="width: 620px;border-radius:30px;">
        </div>

        <div style="width: 50%;margin: 48px;">
            
                <h1 class="font text-center fonte_p" style="font-size: 40px;"><?php echo $linha['QUARTO'];?></h1>


                <div>
                <ul class="icones">
            <li>
                <span class="fas fa-car" style="font-size: 50px;"></span>
             </li>

                <li>
                <span class="fas fa-bath"style="font-size: 50px;"></span>
                 </li>

                <li>
                <span class="fa-solid fa-mug-hot"style="font-size: 50px;"></span>
                      </li>
                <li>    
                <span class="fas fa-desktop"style="font-size: 50px;"></span>
                
                </li>
       
                <li>
                <span class="fas fa-snowflake"style="font-size: 50px;"></span>
                
                </li>
         
                <li>
                <span class="fas fa-paw" style="font-size: 50px;"></span>
                
                </li>
                </ul>
                <hr style="margin: 4rem 0;color: inherit;border: 0;border-top: var(--bs-border-width) solid;opacity: 0.36;">
                </div>
                    <div class="text-center" style="width: 100%; margin-top: 55px;">
                        <a href="../details/index.php?ID=<?php echo $linha['ID']?>" class="botao_saiba">
                        <button class="button" style="margin-left 100%;">Saiba Mais</button>
                        </a>
                    </div>
                </div>
            </div> 
            
    <?php } while ($linha = $lista -> fetch_assoc());?>
    <?php }?>         
</div> 
</div>
    <!-- FIM SE A CONSULTAR NÃO RETORNAR VAZIO -->
</body>
</html>