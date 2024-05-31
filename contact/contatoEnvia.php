
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer();

try
{
    //Configurações do servidor
    $mail->isSMTP();                                            // Defina mail para usar SMTP
    $mail->Host = 'smtp.office365.com';                         // Especificar servidores SMTP principais e de backup
    $mail->SMTPAuth = true;                                     // Ativar autenticação SMTP
    $mail->SMTPSecure = 'TLS';                                  // Ativar criptografia TLS, também aceita SSL
    $mail->Port = 587;                                          // Número da porta TCP

    $mail->Username = 'pousada_do_sossego@outlook.com';         // SMTP email
    $mail->Password = 'pousadadosossegoHJMMPV';              // SMTP senha

    // Define o remetente
    $mail->setFrom('pousada_do_sossego@outlook.com', 'Pousada do Sossego');        // Quem vai enviar o email

    //Destinatario
    $mail->addAddress('pousada_do_sossego@outlook.com', 'Pousada do Sossego');     // Pra quem você quer enviar o email

    // Conteúdo da mensagem
    $mail->Subject = 'CONTATO';
    $mail->Body    = '<b>Olá Pousada do Sossego!</b><br><hr>'.$_POST['nome'].' - '.$_POST['email'].'<br><br>'.$_POST['comentario'];
    $mail->AltBody = '<b>Olá Churrascaria Chuleta Quente!</b><br><hr>'.$_POST['nome'].' - '.$_POST['email'].'<br><br>'.$_POST['comentario'];
    $mail->CharSet = 'UTF-8';
    $mail->Debugoutput = 'html';
    $mail->setLanguage('pt');

    // Enviar
    $mail->send();

    session_start(); 
    $_SESSION['msg_contato'] = '            
        <div style="z-index: 9999;" class="toast align-items-center text-bg-primary border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    Mensagem enviada com sucesso!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    ';
}
catch (Exception $e)
{
    session_start(); 
    $_SESSION['msg_contato'] = '            
        <div style="z-index: 9999;" class="toast align-items-center text-bg-danger border-0 fade show position-fixed end-0 top-0 mt-4 me-3" role="alert" aria-live="assertive" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    Não foi possível enviar o E-mail. Mailer Error: {$mail->ErrorInfo}!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    ';
}

header('location:index.php')
?>