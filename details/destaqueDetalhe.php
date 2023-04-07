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


    <div class="flex-sa">
    <?php do{?>
        <span style="background-color: blue; width: 250px; height: 300px;">
            <div style="margin: 10px"><img src="<?php echo $linha['IMAGEM_CAMINHO_2']?>" alt="" class="img-destaque"></div>

            <div style="margin-left: 10px; color: white;"><?php echo $linha['QUARTO']?></div>

            <div style="margin-left: 10px; color: white;"><?php echo $linha['tipo']?></div>

            <div style="margin: 10px; color: white;"><i class="fa-solid fa-users" style="color: white; margin-right: 10px"></i><?php echo $linha['QTDE_PESSOAS']?> Pessoas</div>

            <div style="margin-left: 150px; margin-top: 10px;">
                <a style="padding: 5px; background: white; color:black;" href="index.php?ID=<?php echo $linha['ID']?>">
                Ver Mais...
                </a>
            </div>
        </span>
        <?php }while($linha = $lista->fetch_assoc())?>
    </div>

</body>
</html>