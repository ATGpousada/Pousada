<?php
    // Iniciando uma sessão
    session_start();

    // Conexão com o banco de dados
    include '../connection/connect.php';

    // Armazena o valor de $_GET em uma variável de sessão
    $_SESSION['chaveRecuperar'] = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);

    // Pega a chave da URL que foi enviado por e-mail
    $chaveRecupera = $_SESSION['chaveRecuperar'];
    
    // Verifica se a chave não está vazia
    if (!empty($chaveRecupera)) {
        // Consulta para ver de qual cliente é a chave 
        $ConsultaRecuperaQuery = $connect->query("SELECT * FROM clientes WHERE RECUPERAR_SENHA = '$chaveRecupera' LIMIT 1");

        // Pega a linha da consulta
        $rowConsulta = $ConsultaRecuperaQuery->fetch_assoc();

        // Pega o número de linhas da consulta linha da consulta
        $ConsultaRecuperaQueryNum = $ConsultaRecuperaQuery->num_rows;

        // Verificação se há cliente
        if ($ConsultaRecuperaQueryNum != 0) {
            // Verifica se tem valor nos INPUT's
            if ($_POST) {
                // Pega todos os valores dos INPUT's
                $dadosAtualizaInput = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                // Verifica se as senhas são iguais
                if ($dadosAtualizaInput['senha'] == $dadosAtualizaInput['senhaConfirma']) {
                    // Recebe a nova senha do usúario
                    $senhaCliente = $dadosAtualizaInput['senha'];

                    // Gera o hash MD5 da senha
                    $senha_criptografada = md5($senhaCliente);

                    // Codifica o hash MD5 em Base64
                    $senha_base64 = base64_encode($senha_criptografada);

                    // Combina o hash MD5 e a codificação Base64 em uma string única
                    $senha_final = $senha_criptografada . ':' . $senha_base64;
                    
                    // Zera o campo "RECUPERAR_SENHA" no banco de dados
                    $recuperarSenha = 'NULL';

                    // Atribui a nova senha do usuário
                    $AtualizaSenhaQuery = ("UPDATE clientes SET SENHA = '$senha_final', RECUPERAR_SENHA = '$recuperarSenha' WHERE ID = ". $rowConsulta['ID']);

                    // Verifica se foi efetuado com sucesso o comando SQL
                    if ($connect->query($AtualizaSenhaQuery)) {
                        // Envia mensagem de sucesso na página LOGIN
                        $_SESSION['msg'] = '            
                            <div style="z-index: 9999;" class="toast align-items-center text-bg-success border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        Senha atualizada com sucesso!
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        ';
                        
                        // Encaminha para a página login
                        header("Location: login.php");

                        // Caso a atualização no banco dar errado 
                    } else {
                        // Mostra mensagem de erro na tela
                        $_SESSION['msg_atu'] = '            
                            <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        Erro: Tente novamente!
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        ';
                    }
                    
                    // Caso as senhas não sejam iguais
                } else {
                    // Mensagem de erro na tela
                    $_SESSION['msg_atu'] = '            
                        <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Erro: As senhas não são iguais! Digite novamente
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    ';
                }
            }
            
            // Caso o hash_code seja inválido
        } else {
            // Mensagem de erro na tela
            $_SESSION['msg_rec'] = '            
                <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body">
                            Erro: Link inválido, solicite novo link para atualizar a senha!
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            ';
            
            // Encaminha para recuperaLogin
            header("Location: recuperaLogin.php");
        }

        // Caso o hash_code seja inválido
    } else {
        // Mensagem de erro na tela
        $_SESSION['msg_rec'] = '            
            <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        Erro: Link inválido, solicite novo link para atualizar a senha!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';
        
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
<body class="body-login">
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>
    
    <!-- Mensagem na tela -->
    <?php 
        if(isset($_SESSION['msg_atu'])){
            echo $_SESSION['msg_atu'];
            unset($_SESSION['msg_atu']);
        }
    ?>

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
        
        <!-- Formulario do Atualiza senha -->
        <form method="post" action="atualizaSenha.php?chave=<?php echo $chaveRecupera ?>" class="form-login">
            <!-- Nova senha -->
            <div class="form-item">
                <label for="senha">Digite sua nova senha</label>        
                <input type="password" id="senha" name="senha" class="form-control form-input-item" required autocomplete="off">
                <i class="bi bi-eye" id="btny" onclick="mostrarSenha()"></i>
            </div>

            <!-- Confirma nova senha -->
            <div class="form-item">
                <label for="senhaConfirma">Confirme sua nova senha</label>
                <input type="password" id="senhaConfirma" name="senhaConfirma" class="form-control form-input-item" required autocomplete="off">
                <i class="bi bi-eye" id="btny2" onclick="mostrarSenha2()"></i>
            </div>

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