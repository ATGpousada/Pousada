<?php ?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="row">
            <?php //do{?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="produto_detalhes.php?id_produto=<?php echo $row_produtos['id_produto']?>">
                            <img src="../images/banners/banner1.png" class="img-responsive img-rounded">
                        </a>
                        <div class="caption text-right">
                            <h3 class="text-danger">
                                <strong>Quarto 1</strong>
                            </h3>
                            <p class="text-warning">
                                <strong>Suíte</strong>
                            </p>
                            <p class="text-left">
                                Este quarto blá blá blá
                            </p>
                            <p>
                                <button class="btn btn-default disabled" role="button" style="cursor:default;"> 
                                    <?php //echo "R$ ".number_format($row_produtos['valor_produto'], 2, ',', '.');
                                    echo "200,00";?>
                                </button>
                                <a href="produto_detalhes.php?id_produto=<?php //echo $row_produtos['id_produto'];?>">
                                    <span class="hidden-xs">Saiba Mais...</span>
                                    <span class="hidden-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php //}while ($row_produtos = $lista->fetch_assoc())?>
        </div>
</body>
</html>