<?php
require_once('/home/carlos/Descargas/PHPMailer-master/class.phpmailer.php');
$email = new PHPMailer();
$email->From      = 'autobusesnopm@gmail.com';
$email->FromName  = 'Your Name';
$email->Subject   = 'Message Subject';
$email->Body      = 'KAKA';
$email->AddAddress( 'sbncacos@hotmail.com' );

$file_to_attach = '/home/carlos/Descargas/Stattrabajofinal.pdf';

$email->AddAttachment( $file_to_attach , 'Stattrabajofinal.pdf' );

return $email->Send();
?>