<?php

$host = "localhost";
$database = "";
$user = "root";
$pass = "";
$charset = "utf8";
$port = "3306";


try {
    $connect = new mysqli($host, $user, $pass, $database, $port);
    mysqli_set_charset($conn, $charset);
} catch (\Throwable $th) {
    echo "Atenção ERRO: ".$th;
}


// http://localhost/tiphpnt/conn/connect.php
?>