<<<<<<< HEAD
<?php
class Kontakt
{
    public function PokazKontakt()
    {
        // Skomponuj formularz kontaktowy HTML kompatybilny z metoda WyslijMailKontakt()
        echo '<form action="contact.php?action=wyslij" method="post">';
        echo 'Temat: <input type="text" name="temat"><br>';
        echo 'Tresc: <textarea name="tresc"></textarea><br>';
        echo 'Email: <input type="text" name="email"><br>';
        echo '<input type="submit" value="Wyślij">';
        echo '</form>';
    }

    public function WyslijMailKontakt($odbiorca, $temat, $tresc)
    {
    if (empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
    {
        echo '[nie_wypelniles_pola]';
        $this->PokazKontakt(); // Ponowne wywołanie formularza
    }
    else
    {
        $mail['subject']    = $temat;
        $mail['body']       = $tresc;
        $mail['sender']     = $_POST['email'];
        $mail['odbiorca']   = $odbiorca;

        $header = "From: Formularz kontaktowy <" . $mail['sender'] . ">\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer_Encoding:";
        $header .= "X-Sender: <" . $mail['sender'] . ">\n";
        $header .= "X-Mailer: PRapWWW mail 1.2 \n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <" . $mail['sender'] . ">\n";

        mail($mail['odbiorca'], $mail['subject'], $mail['body'], $header);

        echo '[wiadomosc_wyslana]';
    }
    }

    public function PrzypomnijHaslo()
    {
    // Uzyskaj dane administratora (możesz dostosować to do swoich potrzeb)
    $adminEmail = 'admin@example.com';
    $adminSubject = 'Przypomnienie hasła';

    // Pobierz hasło do panelu admina (to jest przykładowa implementacja, dostosuj do swoich potrzeb)
    $adminPassword = 'tajne_haslo';

    // Wywołaj metodę WyslijMailKontakt() z dostosowanymi danymi
    $this->WyslijMailKontakt($adminEmail, $adminSubject, 'Twoje hasło: ' . $adminPassword);
    }
}

// Utwórz instancję klasy Kontakt
$kontakt = new Kontakt();

// Wywołaj metodę PokazKontakt()
$kontakt->PokazKontakt();
=======
<?php
class Kontakt
{
    public function PokazKontakt()
    {
        // Skomponuj formularz kontaktowy HTML kompatybilny z metoda WyslijMailKontakt()
        echo '<form action="contact.php?action=wyslij" method="post">';
        echo 'Temat: <input type="text" name="temat"><br>';
        echo 'Tresc: <textarea name="tresc"></textarea><br>';
        echo 'Email: <input type="text" name="email"><br>';
        echo '<input type="submit" value="Wyślij">';
        echo '</form>';
    }

    public function WyslijMailKontakt($odbiorca, $temat, $tresc)
    {
    if (empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
    {
        echo '[nie_wypelniles_pola]';
        $this->PokazKontakt(); // Ponowne wywołanie formularza
    }
    else
    {
        $mail['subject']    = $temat;
        $mail['body']       = $tresc;
        $mail['sender']     = $_POST['email'];
        $mail['odbiorca']   = $odbiorca;

        $header = "From: Formularz kontaktowy <" . $mail['sender'] . ">\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer_Encoding:";
        $header .= "X-Sender: <" . $mail['sender'] . ">\n";
        $header .= "X-Mailer: PRapWWW mail 1.2 \n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <" . $mail['sender'] . ">\n";

        mail($mail['odbiorca'], $mail['subject'], $mail['body'], $header);

        echo '[wiadomosc_wyslana]';
    }
    }

    public function PrzypomnijHaslo()
    {
    // Uzyskaj dane administratora (możesz dostosować to do swoich potrzeb)
    $adminEmail = 'admin@example.com';
    $adminSubject = 'Przypomnienie hasła';

    // Pobierz hasło do panelu admina (to jest przykładowa implementacja, dostosuj do swoich potrzeb)
    $adminPassword = 'tajne_haslo';

    // Wywołaj metodę WyslijMailKontakt() z dostosowanymi danymi
    $this->WyslijMailKontakt($adminEmail, $adminSubject, 'Twoje hasło: ' . $adminPassword);
    }
}

// Utwórz instancję klasy Kontakt
$kontakt = new Kontakt();

// Wywołaj metodę PokazKontakt()
$kontakt->PokazKontakt();
>>>>>>> e659c7fadc5ef46889fde2d303403c5d6ec24030
?>