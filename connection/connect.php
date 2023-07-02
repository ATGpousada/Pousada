<?php

$host = "localhost"; //definindo o host que estara o banco, nesse caso o banco esta local
$database = "pousada"; // definindo qual banco de dados vamos usar
$user = "root"; // definindo qual usuário pode acessar o banco
$pass = ""; // definindo a senha para acessar o banco
$charset = "utf8"; // padrão de acentuação brasileiro 
$port = "3306"; // porta na qual é usada por padrão pelo sql


try {
    $connect = new mysqli($host, $user, $pass, $database, $port);
    mysqli_set_charset($connect, $charset);
} catch (\Throwable $th) {
    echo "Atenção ERRO: ".$th;
}


// http://localhost/Pousada/connection/connect.php
?>