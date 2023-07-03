<?php 
    // Verifica se há uma sessão aberta
    if (!isset($_SESSION)) {
        // Abre uma sessão
        session_start();
    }

    // Segurança digital...
    // Verificar se o usuário está logado na sessão
    if ($_SESSION['pousada'] != "pousada") {
        // Se não existir, redirecionamos a sessão por segurança
        header('location: login.php');
        exit;
    }
?>