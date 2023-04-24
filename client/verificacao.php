<?php 
    // Nome da sessão
    session_name('pousada');

    // Verifica se há uma sessão aberta
    if (!isset($_SESSION)) {
        // Abre uma sessão
        session_start();
    }

    // Segurança digital...
    // Verificar se o usuário está logado na sessão
    if (!isset($_SESSION['nome_da_sessao'])) {
        // Se não existir, redirecionamos a sessão por segurança
        header('location: login.php');
        exit;
    }

    // Inicia o nome da sessão
    $nomeSessao = session_name();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['nome_da_sessao']) OR ($_SESSION['nome_da_sessao'] != $nomeSessao)) {
        // Destrói a sessão
        session_destroy();

        // Encaminha ele para tela de login
        header('location: login.php');
        exit;
    }
?>