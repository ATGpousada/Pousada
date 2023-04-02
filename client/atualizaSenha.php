<?php
    // Iniciando uma sessão
    session_start();
    
    // Ativando o buffer de saída
    ob_start();

    // Conexão com o banco de dados
    include '../connection/connect.php';

    // Pega a chave da URL que foi enviado por e-mail
    $chaveRecupera = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);
    
    // Verifica se a chave não está vazia
    if (!empty($chaveRecupera)) {
        // Consulta para ver de qual cliente é a chave 
        $ConsultaRecuperaQuery = $connect->query("SELECT FROM clientes WHERE RECUPERAR_SENHA = '". $chaveRecupera['chave'] ."' LIMIT 1");

        // Verificação se há cliente
        if ($ConsultaRecuperaQuery->num_rows != 0) {
            // Pega a linha da consulta
            $rowConsulta = $ConsultaRecuperaQuery->fetch_assoc();
            
            // Verifica se tem valor nos INPUT's
            if ($_POST) {
                // Pega todos os valores dos INPUT's
                $dadosInput = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                // Verifica se as senhas são iguais
                if ($dadosInput['senha'] = $dadosInput['senhaConfirma']) {
                    // Criptografa a nova senha do usúario
                    $senhaCliente = password_hash($dadosInput['senha'], PASSWORD_DEFAULT);
                    
                    // Zera o campo "RECUPERAR_SENHA" no banco de dados
                    $recuperarSenha = 'NULL';

                    // Atribui a nova senha do usuário
                    $AtualizaSenhaQuery = ("UPDATE clientes SET SENHA = $senhaCliente, RECUPERAR_SENHA = $recuperarSenha WHERE ID = ". $rowConsulta['id']);

                    // Verifica se foi efetuado com sucesso o comando SQL
                    if ($connect->query($AtualizaSenhaQuery)) {
                        // Envia mensagem de sucesso na página LOGIN
                        $_SESSION['msg'] = "<p style='color: green'>Senha atualizada com sucesso!</p>";
                        
                        // Encaminha para a página login
                        header("Location: login.php");
                    } else {
                        // Mostra mensagem de erro na tela
                        echo "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                    }

                    // Caso as senhas não for iguais
                } else {
                    // Mensagem de erro na tela
                    $_SESSION['msg_atu'] = "<p style='color: #ff0000'>Erro: As senhas não são iguais! Digite novamente</p>";
                }
            }
            
            // Caso o hash_code seja inválido
        } else {
            // Mensagem de erro na tela
            $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
            
            // Encaminha para recuperaLogin
            header("Location: recuperaLogin.php");
        }

        // Caso o hash_code seja inválido
    } else {
        // Mensagem de erro na tela
        $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
        
        // Encaminha para recuperaLogin
        header("Location: recuperaLogin.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Nosso estilo -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Icons do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Icons do FontAwansome -->
    <script src="https://kit.fontawesome.com/687b2e222f.js" crossorigin="anonymous"></script>
    <!-- Logo no title -->
    <link rel="icon" type="image/png" href="../images/logo/LOGO POUSADA DO SOSSEGO.png"/>
    <title>Atualizar Senha - Pousada do Sossego</title>
</head>
<body>
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>

    <!-- Icone para voltar -->
    <a class="icon-voltar" href="login.php"><span><i class="bi bi-chevron-left"></i> Voltar</span></a>
    
    <!-- Circulo no fundo(Amarelo e Azul) -->
    <div class="circulo"></div>

    <!-- Card Atualiza senha -->
    <div class="card-login">
        <!-- Logo no Atualiza senha -->
        <div class="logo">
            <img class="w-100" src="../images/logo/LOGO POUSADA DO SOSSEGO.png" alt="">
        </div>
        
        <!-- Titulo nivel dois no Atualiza senha -->
        <h2>Atualizar senha</h2>

        <!-- Mensagem na tela -->
       <?php 
            if(isset($_SESSION['msg_atu'])){
                echo $_SESSION['msg_atu'];
                unset($_SESSION['msg_atu']);
            }
        ?>
        
        <!-- Formulario do Atualiza senha -->
        <form method="post" action="login.php" class="form-login">
            <!-- Nova senha -->
            <div class="form-item">
                <label for="senha">Digite sua nova senha</label>        
                <input type="password" id="senha" name="senha" class="form-control form-input-item" required autocomplete="off">
            </div>

            <!-- Confirma nova senha -->
            <div class="form-item">
                <label for="senhaConfirma">Confirme sua nova senha</label>
                <input type="password" id="senhaConfirma" name="senhaConfirma" class="form-control form-input-item" required autocomplete="off">
            </div>

            <!-- Link para voltar no login -->
            <p>Lembrou a senha? <a href="index.php" class="me-auto text-decoration-none ancora-login">clique aqui</a></p>

            <!-- Botão para enviar os valores do formulário -->
            <button id="enviarAtualizaSenha" name="enviarAtualizaSenha" type="submit">Enviar</button>
        </form>
    </div>
</body>
<!-- js do preloader -->
<script src="../js/preloader.js"></script>
<!-- Jquery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- Bootstrap javaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- Nosso script -->
<script type="text/javascript" src="../js/script.js"></script>
</html>