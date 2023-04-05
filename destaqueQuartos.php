<?php 

include 'connection/connect.php';
$lista = $connect->query("select * from vwquartos where DESTAQUE = 1 limit 3;");
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
        <?php 
            $texto = $linha['DESCRICAO'];
            $inicio = 30; // Inicio da string descrição (A partir do caracter 30)
            $fim = strlen($texto) - 2350; // Limitar final da string descrição
        ?>
        <div class="card">
            <img src="<?php echo $linha['IMAGEM_CAMINHO_1']?>" alt="" />
            <div>
                <h2><?php echo $linha['QUARTO']?></h2>
                <h3><?php echo $linha['TIPO']?></h3>
                <p>
                    <?php echo substr($texto, $inicio, $fim)?>...
                </p>
                    <button><a href="details/index.php?ID=<?php echo $linha['ID']?>">Ver mais...</a></button>
            </div>
        </div>
        <?php }while($linha = $lista->fetch_assoc());?>
    </div>
</body>
</html>