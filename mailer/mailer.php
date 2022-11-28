<?php
require 'PHPMailerAutoload.php';


$destination= 'nikolina.sanovsky@gmail.com ';


$subject = "Survey - Web mail";


if (!isset($_POST['message']) || !isset($_POST['mail']) || !isset($_POST ['name']) || !isset($_POST ['surname']) ){
    header ("Location: ../contact_us/");
}else{
    $nameField = $_POST ['name'] . $_POST['surname'];
    $emailField = $_POST['mail'];
    $message = $_POST['message'];
}



$mail = new PHPMailer() or die("phpmailer error");

$mail->isSMTP();      // Set mailer to use SMTP
// $mail->SMTPDebug = 3;                             // Enable verbose debug output

$mail->Host = 'mail.idadventures.hr';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'message@survey.com';                 // SMTP username
$mail->Password = '';                       // SMTP password
$mail->SMTPSecure = true;                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->CharSet = 'UTF-8';
$mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
); 
$mail->setFrom($nameField);
$mail->addAddress($destination);     // Add a recipient
             
$mail->addReplyTo($emailField,$nameField);

$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = $message;
$mail->AltBody = '<i>'.$message.'</i>';



ob_start();
$sent=$mail->send();
ob_end_clean();


if($sent) {
    
    header ("Location: ../contact_us/");
} else {
    
    header ("Location: ../contact_us/");
}


?>