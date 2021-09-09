<?php
//Import PHPMailer classes into the global namespace        
//These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        
        //Load Composer's autoloader
        require 'vendor/autoload.php';
        
    
        
        
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer();
        
        
            //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('shaheerafaq@gmail.com', 'Shaheer Afaq');
        $mail->Username   = 'shaheerafaq@gmail.com';                     //SMTP username
        $mail->Password   = 'kaam karo';                               //SMTP password
        $mail->addAddress('mubashirahmed324@gmail.com', 'Mubashir');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Order Confirmation';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

        // $mail->send();
        if(!$mail->send()){
            echo 'Message has not been sent';
        }
        else {
            echo 'Message has been sent';
        }
        
        
    
        
    
?>