<?php 
include 'connection/connect.php'; //Conexão com o Banco de dados
$id = $_GET['ID']; //
$lista = $connect->query("select * from quartos where DESTAQUE like '%$id%';"); //
$row_destaque = $lista->fetch_assoc(); //
$num_linhas = $lista->num_rows; //
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Mostrar se a Consulta Retornou Vasia -->
    <?php if ($num_linhas == 0){?>

    <?php }?>

    <!-- Mostrar se a Consulta Retornou Conteúdo -->
    <?php if($num_linhas > 0){?>
    <div class="row"> 
        <?php do{?>
            <div class="thumbnail">

            </div>
        <?php }while($row_destaque = $lista->fetch_assoc())?>
    <?php } ?>
</body>
</html>