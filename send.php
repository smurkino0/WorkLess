<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "kontakt@worklessai.pl";
    $subject = "Nowa wiadomość z formularza WorkLess AI";
    $message = "Imię: " . $_POST["name"] . "\nEmail: " . $_POST["email"] . "\nWiadomość:\n" . $_POST["message"];
    $headers = "From: no-reply@worklessai.pl\r\nReply-To: " . $_POST["email"];
    mail($to, $subject, $message, $headers);
    echo "OK";
}
?>
