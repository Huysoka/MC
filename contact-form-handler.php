<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer'; // Stellen Sie sicher, dass der Pfad korrekt ist

try {
     // Instanz der PHPMailer-Klasse erstellen
    $mail = new PHPMailer($debug);

    if ($debug) {
                // gibt einen ausführlichen log aus
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
    }

    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $email_from = 'info@x--mcnderungsschneiderei-berlin-6mc.de';
    $email_subject = "New Form Submission";
    $email_body =   "User Name: $name.\n".
                    "User Email: $visitor_email.\n".
                    "Subject: $subject.\n".
                    "User Message: $message.\n";

    $to = "huy454957@gmail.com";

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.ionos.de'; // IONOS SMTP-Server
    $mail->SMTPAuth = true;
    $mail->Username = 'info@x--mcnderungsschneiderei-berlin-6mc.de'; // Ihr IONOS-Benutzername
    $mail->Password = 'Huyonweed12345!'; // Ihr IONOS-Passwort
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // Port für TLS

    $mail->setFrom($email_from);
    $mail->addAddress($to);
    $mail->isHTML(true); // Setzen Sie auf true, wenn Sie HTML-E-Mails senden möchten
    $mail->Subject = $email_subject;
    $mail->Body = $email_body;

    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
}   