<?php
include '../connection/connect.php';
$id = $_GET['ID'];

$lista = $connect->query("SELECT quartos.ID, quartos.QUARTO, quartos.DESCRICAO, quartos.destaque, quartos.QTDE_PESSOAS, imagens.IMAGEM_CAMINHO_2, quartos.tipos_ID, tipos.tipo
FROM quartos
INNER JOIN imagens ON quartos.id = imagens.quartos_ID 
INNER JOIN tipos ON quartos.tipos_ID = tipos.id
WHERE qtde_PESSOAS LIKE '%" . $linha['QTDE_PESSOAS'] . "%' 
AND quartos.ID != " . $id . "
GROUP BY quartos.ID
LIMIT 3;");

// Se não achar nenhum resultado por quantidade de pessoas, irá procurar por tipos
if ($lista->num_rows == 0) {
    $lista = $connect->query("SELECT quartos.ID, quartos.QUARTO, quartos.DESCRICAO, quartos.destaque, quartos.QTDE_PESSOAS, imagens.IMAGEM_CAMINHO_2, quartos.tipos_ID, tipos.tipo
    FROM quartos
    INNER JOIN imagens ON quartos.id = imagens.quartos_ID 
    INNER JOIN tipos ON quartos.tipos_ID = tipos.id
    WHERE qtde_PESSOAS REGEXP '^[2-4]$' 
    AND quartos.ID != " . $id . "
    GROUP BY quartos.ID
    ORDER BY quartos.ID DESC
    LIMIT 3;");
}

$linha = $lista->fetch_assoc();
$linhas = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <div id="titulo_semelhante" class="text-center" style="margin: 40px auto;">
        <h4>Produtos Semelhantes</h4>
    </div>


    <div class="d-flex justify-content-around flex-wrap">
    <?php do{?>
        <div class="card_detalhe">
            <div class="icon">
                <div><img src="<?php echo $linha['IMAGEM_CAMINHO_2']?>" alt="" class="img-destaque"></div>
            </div>
            <strong><?php echo $linha['QUARTO']?></strong>
            <div class="card__body">
            <p style="margin-left: 10px; color: black;"><?php echo $linha['tipo']?></p>
            <p><i class="fa-solid fa-users" style="color: black; margin-right: 10px"></i><?php echo $linha['QTDE_PESSOAS']?> Pessoas</p>
            </div>
            <span><a href="index.php?ID=<?php echo $linha['ID']?>">Saiba Mais...</span></a>
        </div>
        <?php }while($linha = $lista->fetch_assoc())?>
    </div>

</body>
</html>