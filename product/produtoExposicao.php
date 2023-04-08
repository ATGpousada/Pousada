<?php 
include "../connection/connect.php";
$id = $_GET['ID'];
$lista= $conn->query("SELECT quartos.*, imagens.IMAGEM_CAMINHO_2, quartos.tipos_ID, tipos.tipo 
FROM quartos
INNER JOIN imagens ON quartos.id = imagens.quartos_ID
INNER JOIN tipos ON quartos.tipos_ID = tipos.id
WHERE quartos.ID = $id
;");
$linha_quarto = $lista->fetch_assoc();
$num_linhas = $lista->linha_quarto;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartos</title>
</head>
<body>
    
    <!-- INÍCIO MOSTRAR SE A CONSULTA RETORNAR VAZIO -->
    <?php if($num_linhas == 0){?>
        <h2 class="breadcrumb alert-danger">
            Não há Quartos Cadastrados
        </h2>
    <?php }?>
    <!-- FIM MOSTRAR SE A CONSULTA RETORNAR VAZIO -->
    <div class="PARTIÇÃO">
        <div >
            <img src="../images/quartos/quarto1.jpg" alt="" style="width: 600px;border-radius:30px;">
        </div>

        <div>
            <div class="centraliza_q1">
                <h1 class="font">Suite com varanda</h1>
            </div>
            
            <div class="distribuição">
                <span class="fas fa-car" style="font-size: 50px;"></span>
                <h6>Estacionamento</h6>
            </div>

            <div class="distribuição">
                <span class="fas fa-bath"style="font-size: 50px;"></span>
                <h6>Banheiro</h6>
            </div>

            <div class="distribuição">
                <span class="fa-solid fa-mug-hot"style="font-size: 50px;"></span>
                <h6>Café da manhã</h6>
            </div>

            <div class="distribuição">
                <span class="fas fa-desktop"style="font-size: 50px;"></span>
                <h6>Tv Smart</h6> 
            </div>

            <div class="distribuição">
                <span class="fas fa-snowflake"style="font-size: 50px;"></span>
                <h6>Ar condicionado</h6> 
            </div>

            <div class="distribuição">
                <span class="fas fa-paw" style="font-size: 50px;"></span>
                <h6>Pets</h6> 
            </div>

            <div class="container">
    <div class="center">
      <button class="btn_p">
        <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
         
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
        </svg>
        <span>Saiba Mais ...</span>
      </button>
    </div>
  </div>
  </div> 
</div>


</body>
</html>