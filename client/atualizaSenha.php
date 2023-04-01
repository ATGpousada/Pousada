<?php
session_start();
ob_start();
include '../connection/connect.php';

$chaveRecupera = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);

if (!empty($chaveRecupera)) {
    $ConsultaRecuperaQuery = $connect->query("SELECT FROM clientes WHERE RECUPERAR_SENHA = ". $chaveRecupera['chave'] ." LIMIT 1");

    if (($ConsultaRecuperaQuery) AND ($ConsultaRecuperaQuery->num_rows != 0)) {
        $rowConsulta = $ConsultaRecuperaQuery->fetch_assoc();
        $dadosInput = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if ($_POST) {
            $senhaCliente = password_hash($dadosInput['senha_usuario'], PASSWORD_DEFAULT);
            $recuperarSenha = 'NULL';

            $AtualizaSenhaQuery = ("UPDATE clientes SET SENHA = $senhaCliente, RECUPERAR_SENHA = $recuperarSenha WHERE ID = ". $rowConsulta['id']);

            if ($connect->query($AtualizaSenhaQuery)) {
                $_SESSION['msg'] = "<p style='color: green'>Senha atualizada com sucesso!</p>";
                header("Location: index.php");
            } else {
                echo "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
            }
        }
    } else {
        $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
        header("Location: recuperaLogin.php");
    }
} else {
    $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
    header("Location: recuperaLogin.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <title>Celke - Atualizar Senha</title>
</head>
<body>
    <h1>Atualizar senha</h1>

    <form method="POST" action="">
        <?php
        $usuario = "";
        if (isset($dadosInput['senha_usuario'])) {
            $usuario = $dadosInput['senha_usuario'];
        } ?>
        <label>Senha</label>
        <input type="password" name="senha_usuario" placeholder="Digite a nova senha" value="<?php echo $usuario; ?>"><br><br>

        <input type="submit" value="Atualizar" name="SendNovaSenha">
    </form>

    <br>
    Lembrou? <a href="index.php">clique aqui</a> para logar
</body>
</html>