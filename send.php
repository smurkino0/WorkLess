<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "kontakt@worklessai.pl"; // Twój Zoho Mail
    $subject = "Nowa wiadomość z formularza WorkLess AI";

    $name = strip_tags($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = strip_tags($_POST["message"]);

    $body = "Imię i nazwisko: $name\n";
    $body .= "E-mail: $email\n\n";
    $body .= "Wiadomość:\n$message\n";

    $headers = "From: no-reply@worklessai.pl\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Dziękujemy! Twoja wiadomość została wysłana.";
    } else {
        echo "Błąd: wiadomość nie mogła zostać wysłana.";
    }
} else {
    echo "Błąd: nieprawidłowe żądanie.";
}
?>
