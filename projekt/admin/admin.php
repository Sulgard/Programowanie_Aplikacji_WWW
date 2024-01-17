<?php
session_start();
include('../cfg.php');
function FormularzLogowania()
{
    global $login, $pass;

    // Sprawdzenie, czy formularz został wysłany
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sprawdzenie, czy wprowadzone dane są poprawne
        if ($_POST['login'] == $login && $_POST['pass'] == $pass) {
            // Ustawienie sesji
            $_SESSION['zalogowany'] = true;
            header('Location: control_panel.php'); // Przekierowanie do panelu administracyjnego
            exit;
        } else {
            // Wyświetlenie błędu
            echo 'Błędny login lub hasło!';
        }
    }

    // Formularz logowania
    echo '<form method="post" action="">
        Login: <input type="text" name="login"><br>
        Hasło: <input type="password" name="pass"><br>
        <input type="submit" value="Zaloguj">
    </form>';
}

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/control_styles.css">
    <title>Formularz Logowania</title>
</head>

<body>

    <header>
        <h1>Formularz Logowania</h1>
    </header>

    <div class="container">
        <?php
            echo FormularzLogowania();
        ?>
    </div>

</body>

</html>