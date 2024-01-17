<?php

require 'PHPMailer\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'PHPMailer\vendor\phpmailer\phpmailer\src\SMTP.php';
require 'PHPMailer\vendor\phpmailer\phpmailer\src\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function PokazKontakt()
{
    // Formularz kontaktowy
    $form = '<form method="post" action="contact.php">
    Email: <input type="email" name="email"><br>
    Temat: <input type="text" name="temat"><br>
    Treść: <textarea name="tresc"></textarea><br>
    <input type="submit" value="Wyślij">
    </form>';
    return $form;
}

function WyslijMailKontakt($odbiorca)
{
    if(empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
    {
        echo 'Nie wypełniłeś wszystkich pól';
        echo PokazKontakt(); // ponowne wywołanie formularza
    }
    else
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'user@example.com';
            $mail->Password = 'secret';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom($_POST['email'], 'Mailer');
            $mail->addAddress($odbiorca);

            $mail->isHTML(true);
            $mail->Subject = $_POST['temat'];
            $mail->Body    = $_POST['tresc'];

            $mail->send();
            echo 'Wiadomość została wysłana';
        } catch (Exception $e) {
            echo "Wiadomość nie mogła zostać wysłana. Błąd: {$mail->ErrorInfo}";
        }
    }
}

function PrzypomnijHaslo($odbiorca, $haslo)
{
    $mail['subject'] = 'Przypomnienie hasła';
    $mail['body'] = 'Twoje hasło to: ' . $haslo;
    $mail['sender'] = 'noreply@example.com';
    $mail['recipient'] = $odbiorca;

    $header = "From: Formularz kontaktowy <".$mail['sender'].">\r\n";
    $header .= "MIME-Version: 1.0\r\nContent-Type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\n";
    $header .= "X-Sender: <".$mail['sender'].">\r\n";
    $header .= "X-Mailer: PHP/".phpversion()."\r\n";
    $header .= "Return-Path: <".$mail['sender'].">\r\n";

    mail($mail['recipient'], $mail['subject'], $mail['body'], $header);

    echo 'Wiadomość z hasłem została wysłana';
}
?>