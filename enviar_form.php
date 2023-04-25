<?php 
include 'connection/connect.php';

$email = $_GET['email'];
$nome = $_GET['nome'];
$lista = $connect->query("select * from novidades where email = '$email'");
$num_linhas = $lista->num_rows; //

if($num_linhas == 0){
    $inserir = $connect->query("insert novidades (NOME, EMAIL) values ('$nome', '$email')");
}

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
    $mail->Password = 'pousadadosossegoHJMMPV';                 // SMTP senha

    // Define o remetente
    $mail->setFrom('pousada_do_sossego@outlook.com', 'Pousada do Sossego');        // Quem vai enviar o email

    //Destinatario
    $mail->addAddress($_GET['email'], $_GET['nome']);     // Pra quem você quer enviar o email

    // Conteúdo da mensagem
    $mail->Subject = 'Ofertas da Pousada do Sossego';
    $mail->Body    = '<b>Ola!</b><br><hr> Recebemos o seu email '.$_GET['nome'].', agora você está ligado sobre todas as ofertas da pousada!';
    $mail->AltBody = '<b>Ola!</b><br><hr> Recebemos o seu email '.$_GET['nome'].', agora você está ligado sobre todas as ofertas da pousada!';
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

header('location:index.php')
?>