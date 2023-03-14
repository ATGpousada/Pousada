<?php 
include "connection/connect.php";
$lista= $conn->query("select * from ");
$row_produtos = $lista->fetch_assoc();
$num_linhas = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Pousada - Produtos</title>
</head>
<body>
    
</body>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</html>