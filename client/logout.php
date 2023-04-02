<?php 
    // Nome da sessão
    session_name('pousada');
    
    // Inicia uma sessão
    session_start();

    // Destrói a sessão
    session_destroy();

    // Encaminha para a página index
    header('location: ../index.php');
    exit;
?>