<?php 
session_name('pousada');
if (!isset($_SESSION)) {
    session_start();
}

// Segurança digital...

// Verificar se o usuário está logado na sessão
if (!isset($_SESSION['email'])) {
    // Se não existir, redirecionamos a sessão por segurança
    header('location: login.php');
    exit;
}

$nomeSessao = session_name();
if (!isset($_SESSION['nome_da_sessao']) OR ($_SESSION['nome_da_sessao'] != $nomeSessao)) {
    session_destroy();
    header('location: login.php');
    exit;
}
?>