<?php 
//Conexão com o Banco de dados
// include 'connection/connect.php';
//$lista = $conn->query("select * from ... where destaque_quarto = 'Sim';");
//Atribui resultado de consulta
//$row_destaque = $lista->fetch_assoc();
//$num_linhas = $lista->num_rows;
// https://bootsnipp.com/snippets/7NKkV
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
    <?php if($num_linhas>0){?>
            <div class="row">
        <?php do{?>

        <?php }while($row_destaque = $lista->fetch_assoc())?>
    <?php } ?>
</body>
</html>