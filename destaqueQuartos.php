<?php 

include 'connection/connect.php';

// PESQUISA NO BANCO DE TRÊS TABELAS
$lista = $connect->query("SELECT quartos.ID, quartos.QUARTO, quartos.DESCRICAO, quartos.destaque, imagens.IMAGEM_CAMINHO_1, quartos.tipos_ID, tipos.tipo
FROM quartos
INNER JOIN imagens
ON quartos.id = imagens.quartos_ID 
INNER JOIN tipos
ON quartos.tipos_ID = tipos.id
WHERE DESTAQUE = 0 
GROUP BY quartos.ID 
LIMIT 3");
$linha = $lista->fetch_assoc();
$linhas = $lista->num_rows;

?>
<html>
<head>
    <link rel="stylesheet" href="css/stylecard.css">
</head>
<body>

    <div id="card">
        <?php do{?>
        <div class="card">
            <img src="<?php echo $linha['IMAGEM_CAMINHO_1']?>" alt="" />
            <div>
                <h2><?php echo $linha['QUARTO']?></h2>
                <h3><?php echo $linha['tipo']?></h3>
                <p>
                    <?php echo substr($linha['DESCRICAO'], 30, 70)?>...
                </p>
                    <button><a href="details/index.php?ID=<?php echo $linha['ID']?>">Ver mais...</a></button>
            </div>
        </div>
        <?php }while($linha = $lista->fetch_assoc());?>
    </div>
</body>
</html>