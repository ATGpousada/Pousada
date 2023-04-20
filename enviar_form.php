
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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
    $mail->addAddress($_GET['email'], 'Pousada do Sossego');     // Pra quem você quer enviar o email

    // Conteúdo da mensagem
    $mail->Subject = 'CONTATO';
    $mail->Body    = '<b>Olá Pousada do Sossego!</b><br><hr>';
    $mail->AltBody = '<b>Olá Churrascaria Chuleta Quente!</b><br><hr>';
    $mail->CharSet = 'UTF-8';
    $mail->Debugoutput = 'html';
    $mail->setLanguage('pt');

    // Enviar
    $mail->send();
    echo 'A mensagem foi enviada!';
}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>