<?php
    // Startando sessão
    session_start();

    // Verificação para ver se tem uma sessão aberta
    include 'verificacao.php';

    // Dependencias do PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    // Objeto do PHPMailer
    $mail = new PHPMailer();

    // Função para cancelar reserva
    function cancelaReserva() {  
        // ID do pedido
        $id = $_GET['id']; 

        // Conexão com o banco  
        include "../connection/connect.php";
        
        // Verificação para tratar possível erro 
        try {
            // Cancelamento da reserva
            $connect->query("UPDATE reservas SET status_ID = 6 WHERE ID = $id;");
            // Cancelamento do pedido de reserva
            $connect->query("UPDATE pedidos_reservas SET status_ID = 6 WHERE ID = $id;");

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
            $mail->Body    = '<b>Ola!</b><br><hr> Seu cancelamento foi bem sucedido, '.$_SESSION['nome'].'.<br> <a href="http://localhost/Pousada/index.php">Acesse esse link</a> para mais detalhes do reembolso!';
            $mail->AltBody = '<b>Ola!</b><br><hr> Seu cancelamento foi bem sucedido, '.$_SESSION['nome'].'.<br> <a href="http://localhost/Pousada/index.php">Acesse esse link</a> para mais detalhes do reembolso!';
            $mail->CharSet = 'UTF-8';
            $mail->Debugoutput = 'html';
            $mail->setLanguage('pt');

            // Enviar
            $mail->send();

            // Após o cancelamento, voltar para a página de reservas.php
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

    // Chamando a função para executar o cancelamento com uma condição para enviar mensagem de erro
    if (cancelaReserva()) {
        // mensagem de sucesso atribuida a variável alterar (sucesso)
        $_SESSION['cancelar'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-primary border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        Cancelamento efetuado com sucesso, acesse seu e-mail para ter acesso a informações para o seu estorno!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    } else {
        // mensagem de erro atribuida a variável alterar (erro)
        $_SESSION['cancelar'] = '
            <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000"">
                <div class="d-flex">
                    <div class="toast-body">
                        Erro: Ação mal sucedida, tente novamente mais tarde!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        ';        
    }
?>