<?php
    // Inicio de uma sessão
    session_start();

    // Conexão com o banco
    include '../connection/connect.php';

    // Depêndencias do PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    // Objeto do tipo PHPMailer
    $mail = new PHPMailer(true);

    // Verifica se tem valor no POST/INPUT
    if ($_POST) {
        // Pega todos o valores no INPUT
        $dadosInput = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // Consulta se há esse cliente existente
        $recuperaSenhaQuery = $connect->query("SELECT * FROM clientes WHERE email = '". $dadosInput['email'] ."' AND cpf = '". $dadosInput['cpf'] ."' LIMIT 1");

        // Verificação se há cliente
        if ($recuperaSenhaQuery->num_rows != 0) {
            // Pega o id para gerar um hash_code ou chave de recuperação da senha
            $rowRecuperaSenha = $recuperaSenhaQuery->fetch_assoc();
            $chaveRecuperarSenha = password_hash($rowRecuperaSenha['ID'], PASSWORD_DEFAULT);

            // Coloca essa chave no banco
            $ChaveAtualizaQuery = "UPDATE clientes SET RECUPERAR_SENHA = '$chaveRecuperarSenha' WHERE ID = ". $rowRecuperaSenha['ID'];

            // Verifica se o comando SQL foi executado
            if ($connect->query($ChaveAtualizaQuery)) {
                // Gera o link que será enviado por e-mail 
                $link = "http://localhost/Pousada/client/atualizaSenha.php?chave=$chaveRecuperarSenha";

                // Enviando e-mail para o cliente recuperar a senha
                try {
                    //Configurações do servidor
                    $mail->isSMTP();                                            // Defina mail para usar SMTP
                    $mail->Host = 'smtp.office365.com';                         // Especificar servidores SMTP principais e de backup
                    $mail->SMTPAuth = true;                                     // Ativar autenticação SMTP
                    $mail->SMTPSecure = 'TLS';                                  // Ativar criptografia TLS, também aceita SSL
                    $mail->Port = 587;                                          // Número da porta TCP

                    $mail->Username = 'pousada_do_sossego@outlook.com';         // SMTP email
                    $mail->Password = 'pousadadosossegoHJMMPV';                 // SMTP senha

                    $mail->setFrom('pousada_do_sossego@outlook.com', 'Atendimento');
                    $mail->addAddress($rowRecuperaSenha['EMAIL'], $rowRecuperaSenha['NOME']);

                    $mail->isHTML(true);                                 
                    $mail->Subject = 'Recuperar senha';
                    $mail->Body    = 'Prezado(a) ' . $rowRecuperaSenha['NOME'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                    $mail->AltBody = 'Prezado(a) ' . $rowRecuperaSenha['NOME'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                    $mail->send();

                    // Mensagem na tela
                    $_SESSION['msg'] = '            
                        <div style="z-index: 9999;" class="toast align-items-center text-bg-success border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                            <div class="d-flex">
                                <div class="toast-body">
                                    E-mail enviado com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    ';

                    header("Location: login.php");

                    // Caso o envio não seja efetuado 
                } catch (Exception $e) {
                    // Mensagem na tela mostrando o erro
                    $_SESSION['msg_email'] = '            
                        <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Erro: E-mail não enviado. Mailer Error: {$mail->ErrorInfo}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    ';
                }
                
                // Se a consulta não foi feita
            } else {
                // Mensagem na tela mostrando o erro
                $_SESSION['msg_email'] = '            
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

            // Se o usuário não existe
        } else {
            // Mensagem na tela mostrando o erro
            $_SESSION['msg_email'] = '            
                <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                    <div class="d-flex">
                        <div class="toast-body">
                            Erro: Usuário não encontrado!
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            ';
        }
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
    <title>Recuperar Senha - Pousada do Sossego</title>
</head>
<body class="body-login">
    <!-- início do preloader -->
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <img src="../images/sol.gif" alt="">
        </div>
    </div>

    <!-- Mensagens de erro -->
    <?php
        if (isset($_SESSION['msg_rec'])) {
            echo $_SESSION['msg_rec'];
            unset($_SESSION['msg_rec']);
        } elseif (isset($_SESSION['msg_email'])) {
            echo $_SESSION['msg_email'];
            unset($_SESSION['msg_email']);
        } 
    ?>

    <!-- Icone para voltar -->
    <a class="icon-voltar" href="login.php"><span><i class="bi bi-chevron-left"></i> Voltar</span></a>
    
    <!-- Circulo no fundo(Amarelo e Azul) -->
    <div class="circulo"></div>

    <div class="card-login">
        <!-- Logo no Recuperar Senha -->
        <div class="logo">
            <img class="w-100" src="../images/logo/LOGO POUSADA DO SOSSEGO.png" alt="">
        </div>
        
        <!-- Titulo nivel dois no Recuperar Senha -->
        <h2>Recuperar Senha</h2>
        <p>Atualizar senha</p>

        <!-- Formulário -->
        <form method="post" action="recuperaLogin.php" class="form-login">
            <!-- E-mail -->
            <div class="form-item">
                <label for="email">Digite seu E-mail</label>        
                <input type="email" id="email" name="email" class="form-control form-input-item" required>
            </div>

            <!-- CPF -->
            <div class="form-item">
                <label for="cpf">Digite seu CPF</label>        
                <input type="text" id="cpf" name="cpf" class="form-control form-input-item" data-js="cpf" required>
            </div>

            <!-- Link para voltar no login -->
            <p>Lembrou a senha? <a href="index.php" class="me-auto text-decoration-none ancora-login">clique aqui</a></p>

            <!-- Botão para enviar os dados do formulário -->
            <button id="enviarRecupera" name="enviarRecupera" type="submit">Enviar</button>
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