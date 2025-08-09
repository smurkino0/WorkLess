<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Konfiguracja SMTP Zoho
        $mail->isSMTP();
        $mail->Host = 'smtp.zoho.eu';
        $mail->SMTPAuth = true;
        $mail->Username = 'kontakt@worklessai.pl';
        $mail->Password = 'Formularz WWW';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Nadawca i odbiorca
        $mail->setFrom('kontakt@worklessai.pl', 'WorkLess AI');
        $mail->addAddress('kontakt@worklessai.pl');

        // Treść
        $mail->isHTML(true);
        $mail->Subject = "Nowa wiadomość z formularza";
        $mail->Body = "<b>Imię:</b> $name <br> <b>Email:</b> $email <br><br> <b>Wiadomość:</b> <br> $message";

        $mail->send();
        echo "Wiadomość wysłana pomyślnie!";
    } catch (Exception $e) {
        echo "Błąd podczas wysyłki: {$mail->ErrorInfo}";
    }
}
?>
