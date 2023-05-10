<?php
    // Startando sessão
    session_start();

    // Verificação para ver se tem uma sessão aberta
    include 'verificacao.php';

    // Dependencias do PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Função para confimar pedido de reserva
    function confirmaPedido() {  
        // ID do pedido
        $id = $_GET['id']; 
    
        // Conexão com o banco  
        include "../connection/connect.php";
        
        // Verificação para tratar possível erro 
        try {
            // Confirmação do pedido de reserva
            $connect->query("UPDATE pedidos_reservas SET status_ID = 5 WHERE ID = $id;");

            // Dependencias do PHPMailer
            require '../PHPMailer/src/Exception.php';
            require '../PHPMailer/src/PHPMailer.php';
            require '../PHPMailer/src/SMTP.php';
        
            // Objeto do PHPMailer
            $mail = new PHPMailer();

            //Configurações do servidor
            $mail->isSMTP();                                            // Defina mail para usar SMTP
            $mail->Host = 'smtp.office365.com';                         // Especificar servidores SMTP principais e de backup
            $mail->SMTPAuth = true;                                     // Ativar autenticação SMTP
            $mail->SMTPSecure = 'TLS';                                  // Ativar criptografia TLS, também aceita SSL
            $mail->Port = 587;                                          // Número da porta TCP

            $mail->Username = 'pousada_do_sossego@outlook.com';         // SMTP email
            $mail->Password = 'pousadadosossegoHJMMPV';                 // SMTP senha

            // Define o remetente
            $mail->setFrom('pousada_do_sossego@outlook.com', 'Pousada do Sossego');        // Quem vai enviar o email

            //Destinatario
            $mail->addAddress($_SESSION['email'], $_SESSION['nome']);                      // Pra quem você quer enviar o email

            // Conteúdo da mensagem
            $mail->Subject = 'Cancelamento da reserva';
            $mail->Body    = '<b>Ola!</b><br><hr> Seu pagamento de 30% foi bem sucedido, '.$_SESSION['nome'].'.<br> <a href="http://localhost/Pousada/index.php">Acesse esse link</a> para mais detalhes e baixar sua nota fiscal!';
            $mail->AltBody = '<b>Ola!</b><br><hr> Seu pagamento de 30% foi bem sucedido, '.$_SESSION['nome'].'.<br> <a href="http://localhost/Pousada/index.php">Acesse esse link</a> para mais detalhes e baixar sua nota fiscal!';
            $mail->CharSet = 'UTF-8';
            $mail->Debugoutput = 'html';
            $mail->setLanguage('pt');

            // Enviar
            $mail->send();

            // Após a confirmação, voltar para a página de reservas.php
            header('location: reservas.php');

            // Retorno caso dar certo
            return true;
        } catch (\Throwable $th) {
            // Após o erro, voltar para a página de reservas.php
            header('location: reservas.php');
            
            // Retorno caso dar errado
            return false;
        }
    }

    // Chamando a função para executar a confirmação com uma condição para enviar mensagem de erro
    if (confirmaPedido()) {
        // mensagem de sucesso atribuida a variável alterar (sucesso)
        $_SESSION['confirmar'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-primary border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        Pagamento de 30% efetuado com sucesso, confirmação bem sucedida. Acesse seu E-mail para mais detalhes!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    } else {
        // mensagem de erro atribuida a variável alterar (erro)
        $_SESSION['confirmar'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000"">
                <div class="d-flex">
                    <div class="toast-body">
                        Erro: Ação mal sucedida. Pagamento não aceito, tente novamente!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    }
?>