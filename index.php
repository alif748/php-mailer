<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    $get = json_decode(file_get_contents('password.json'), true);

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = $get['email'];
    $mail->Password   = $get['password'];

    $mail->IsHTML(true);
    $mail->AddAddress($get['to'], "Alif");
    $mail->SetFrom($get['email'], "CS Niji");
    // $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
    // $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
    $mail->Subject = "Halo kamu!";
    $content = "Halo tes123 123";

    $mail->MsgHTML($content);
    if(!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        echo "Email sent successfully";
    }

    
?>