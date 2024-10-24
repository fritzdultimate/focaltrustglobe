<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.titan.email';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'support@fortressminers.com';
$mail->Password = '@Fortressminers.com';
$mail->setFrom('support@fortressminers.com', 'SMTP Test');
$mail->addReplyTo('support@fortressminers.com', 'SMTP Test');
$mail->addAddress('testeti@rodrigoremir.com', 'Adry');
$mail->Subject = 'My Mailer success';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'This is a plain text message body';
//$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}
?>
