<?php
require 'path/to/PHPMailer/PHPMailer.php'; // Stellen Sie sicher, dass Sie den richtigen Pfad zu PHPMailer angeben

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email_from = 'info@mcänderungsschneiderei-berlin.de';
$email_subject = "New Form Submission";
$email_body =   "User Name: $name.\n".
                "User Email: $visitor_email.\n".
                "Subject: $subject.\n".
                "User Message: $message.\n";

$to = "huy454957@gmail.com";

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.ionos.com'; // IONOS SMTP-Server
$mail->SMTPAuth = true;
$mail->Username = 'info@mcänderungsschneiderei-berlin.de'; // Ihr IONOS-Benutzername
$mail->Password = 'Huyonweed12345!'; // Ihr IONOS-Passwort
$mail->SMTPSecure = 'tls'; // Verwenden Sie 'tls' oder 'ssl' je nach IONOS-Einstellungen
$mail->Port = 587; // Port für TLS

$mail->setFrom($email_from);
$mail->addAddress($to);
$mail->isHTML(true); // Setzen Sie auf true, wenn Sie HTML-E-Mails senden möchten
$mail->Subject = $email_subject;
$mail->Body = $email_body;

if ($mail->send()) {
    header("Location: contact.html"); // Erfolgreich versendet
} else {
    echo "E-Mail konnte nicht gesendet werden. Fehler: " . $mail->ErrorInfo;
}
?>
