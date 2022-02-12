<?php
//don't forget to add this at the top of your script
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

function sendsmtp($subscriber){

$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = SMTP::DEBUG_OFF;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "titushailu125@gmail.com";                 
$mail->Password = "KirKar@1990";                           
//If SMTP requires TLS encryption then set it
//$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = "titushailu125@gmail.com";
$mail->FromName = "FastBirr CEO";

$mail->addAddress($email);
// $mail->addAttachment("Readme.txt", "Readme1.txt");        
// $mail->addAttachment("WIN_20220210_14_19_23_Pro.jpg");
$mail->isHTML(true);

$mail->Subject = "FastBirr Online Banking";
$mail->Body = "<i>Thank You! keep in touch with us and Process unlimitted transaction per Day</i>";
$mail->AltBody = "Thank You! keep in touch with us and Process unlimitted transaction per Day ";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
}


?>