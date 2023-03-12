<?php 
//Conexão com o Banco de dados
// include 'connection/connect.php';
//$lista = $conn->query("select * from ... where destaque_quarto = 'Sim';");
//Atribui resultado de consulta
//$row_destaque = $lista->fetch_assoc();
//$num_linhas = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destaque - Pousada do Sossego</title>
</head>
<body>
    <!-- Mostrar se a Consulta Retornou Vasia -->
    <?php if ($num_linhas == 0){?>
        <div class="mx-auto" style="width: 500px;">
            <h3 class="bg-warning mt-4 mx-auto text-light">
                Não há Quartos Cadastrados !!!
            </h3>
        </div>
    <?php }?>

    <!-- Mostrar se a Consulta Retornou Conteúdo -->
    <?php if($num_linhas>0){?>
            <div class="row">
        <?php do{?>

        <?php }while($row_destaque = $lista->fetch_assoc())?>
    <?php } ?>
</body>
</html>