<<<<<<< HEAD
<?php

// Początek sesji
session_start();

// Załaduj konfigurację z pliku cfg.php
require_once('../cfg.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Kod dla przypadku, gdy formularz nie został jeszcze przesłany
} else {
    // Kod dla przypadku, gdy formularz został przesłany
    if (isset($_GET['action']) && $_GET['action'] === 'edytuj_podstrone') {
        // Kod związany z przetwarzaniem formularza
        EdytujPodstrone();
    }
}

// Sprawdź, czy formularz logowania został wysłany
if (isset($_POST['x1_submit'])) {
    // Pobierz dane z formularza
    $enteredLogin = $_POST['login_email'];
    $enteredPass = $_POST['login_pass'];

    // Sprawdź poprawność loginu i hasła
    if ($enteredLogin == $login && $enteredPass == $pass) {
        // Zalogowano poprawnie, ustawienie zmiennej sesji
        $_SESSION['admin_logged_in'] = true;
    } else {
        // Błąd logowania
        $loginError = "Błąd logowania. Spróbuj ponownie.";
    }
}

// Sprawdź, czy administrator jest zalogowany
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {

    // Administrator jest zalogowany, można wykonywać dalsze operacje

    // ...

} else {
    // Administrator nie jest zalogowany, wyświetlenie formularza logowania
    function FormularzLogowania()
    {
        global $loginError;

        // Wyświetlenie komunikatu o błędzie logowania, jeśli istnieje
        if (isset($loginError)) {
            echo "<p style='color: red;'>$loginError</p>";
        }

        // Wyświetlenie formularza logowania
        echo '
        <div class="logowanie">
            <h1 class="heading">Panel CMS:</h1>
            <div class="logowanie">
                <form method="POST" name="LoginForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                    <table class="logowanie">
                        <tr><td class="log4_t">[email]</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
                        <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
                        <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="logowanie" value="zaloguj" /></td></tr>
                    </table>
                </form>
            </div>
        </div>
        ';
    }

    // Wywołanie funkcji tworzącej formularz logowania
    FormularzLogowania();
}

function ListaPodstron()
{
    global $conn; // Uzyskaj dostęp do połączenia z bazą danych

    // Zapytanie SQL do pobrania listy podstron
    $query = "SELECT id, page_title FROM page_list ORDER BY id ASC LIMIT 100";
    $result = mysqli_query($conn, $query);

    // Sprawdź, czy zapytanie zwróciło wyniki
    if ($result) {
        // Wyświetl nagłówek tabeli
        echo '<table>';
        echo '<tr><th>ID</th><th>Tytuł</th><th>Akcje</th></tr>';

        // Iteruj przez wyniki zapytania
        while ($row = mysqli_fetch_assoc($result)) {
            // Wyświetl wiersz tabeli
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['page_title'] . '</td>';
            echo '<td>';
            echo '<form method="GET" action="admin.php">';
            echo '<input type="hidden" name="action" value="EdytujPodstrone()">';
            echo '<input type="hidden" name="id_podstrony" value="' . $row['id'] . '">';
            echo '<input type="submit" value="Edytuj">';
            echo '</form>';
            echo '</td>';
            echo '<button onclick="usunPodstrone(' . $row['id'] . ')">Usuń</button></td>';
            echo '</tr>';
        }

        // Zamknij tabelę
        echo '</table>';
    } else {
        // Błąd w zapytaniu
        echo 'Błąd zapytania: ' . mysqli_error($conn);
    }
}

function EdytujPodstrone()
{
    echo "Funkcja EdytujPodstrone() jest wywoływana.";
    global $conn; // Uzyskaj dostęp do połączenia z bazą danych

    // Sprawdź, czy przekazano identyfikator podstrony
    if (isset($_GET[$row'id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // Zapytanie SQL do pobrania danych o podstronie o określonym ID
        $query = "SELECT id, page_title, page_content, status FROM page_list WHERE id='$id'";
        $result = mysqli_query($conn, $query);

        // Sprawdź, czy zapytanie zwróciło wyniki
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Wyświetl formularz edycji
            ?>
            <form method="POST" action="zapisz_edycje.php">
                <input type="hidden" name="id_podstrony" value="<?php echo $row['id']; ?>">

                <label for="tytul">Tytuł:</label>
                <input type="text" name="tytul" value="<?php echo $row['page_title']; ?>" required>

                <label for="tresc">Treść strony:</label>
                <textarea name="tresc" required><?php echo $row['page_content']; ?></textarea>

                <label for="aktywna">Aktywna:</label>
                <input type="checkbox" name="aktywna" <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>

                <input type="submit" name="zapisz_edycje" value="Zapisz zmiany">
            </form>
            <?php
        } else {
            // Błąd - brak podstrony o danym ID
            echo 'Podstrona o podanym ID nie istnieje.';
        }
    } else {
        // Błąd - brak przekazanego ID podstrony
        echo 'Brak identyfikatora podstrony do edycji.';
    }
    echo "Koniec funkcji EdytujPodstrone().";
}


ListaPodstron();
EdytujPodstrone();

=======
<?php

// Początek sesji
session_start();

// Załaduj konfigurację z pliku cfg.php
require_once('../cfg.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Kod dla przypadku, gdy formularz nie został jeszcze przesłany
} else {
    // Kod dla przypadku, gdy formularz został przesłany
    if (isset($_GET['action']) && $_GET['action'] === 'edytuj_podstrone') {
        // Kod związany z przetwarzaniem formularza
        EdytujPodstrone();
    }
}

// Sprawdź, czy formularz logowania został wysłany
if (isset($_POST['x1_submit'])) {
    // Pobierz dane z formularza
    $enteredLogin = $_POST['login_email'];
    $enteredPass = $_POST['login_pass'];

    // Sprawdź poprawność loginu i hasła
    if ($enteredLogin == $login && $enteredPass == $pass) {
        // Zalogowano poprawnie, ustawienie zmiennej sesji
        $_SESSION['admin_logged_in'] = true;
    } else {
        // Błąd logowania
        $loginError = "Błąd logowania. Spróbuj ponownie.";
    }
}

// Sprawdź, czy administrator jest zalogowany
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {

    // Administrator jest zalogowany, można wykonywać dalsze operacje

    // ...

} else {
    // Administrator nie jest zalogowany, wyświetlenie formularza logowania
    function FormularzLogowania()
    {
        global $loginError;

        // Wyświetlenie komunikatu o błędzie logowania, jeśli istnieje
        if (isset($loginError)) {
            echo "<p style='color: red;'>$loginError</p>";
        }

        // Wyświetlenie formularza logowania
        echo '
        <div class="logowanie">
            <h1 class="heading">Panel CMS:</h1>
            <div class="logowanie">
                <form method="POST" name="LoginForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                    <table class="logowanie">
                        <tr><td class="log4_t">[email]</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
                        <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
                        <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="logowanie" value="zaloguj" /></td></tr>
                    </table>
                </form>
            </div>
        </div>
        ';
    }

    // Wywołanie funkcji tworzącej formularz logowania
    FormularzLogowania();
}

function ListaPodstron()
{
    global $conn; // Uzyskaj dostęp do połączenia z bazą danych

    // Zapytanie SQL do pobrania listy podstron
    $query = "SELECT id, page_title FROM page_list ORDER BY id ASC LIMIT 100";
    $result = mysqli_query($conn, $query);

    // Sprawdź, czy zapytanie zwróciło wyniki
    if ($result) {
        // Wyświetl nagłówek tabeli
        echo '<table>';
        echo '<tr><th>ID</th><th>Tytuł</th><th>Akcje</th></tr>';

        // Iteruj przez wyniki zapytania
        while ($row = mysqli_fetch_assoc($result)) {
            // Wyświetl wiersz tabeli
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['page_title'] . '</td>';
            echo '<td>';
            echo '<form method="GET" action="admin.php">';
            echo '<input type="hidden" name="action" value="EdytujPodstrone()">';
            echo '<input type="hidden" name="id_podstrony" value="' . $row['id'] . '">';
            echo '<input type="submit" value="Edytuj">';
            echo '</form>';
            echo '</td>';
            echo '<button onclick="usunPodstrone(' . $row['id'] . ')">Usuń</button></td>';
            echo '</tr>';
        }

        // Zamknij tabelę
        echo '</table>';
    } else {
        // Błąd w zapytaniu
        echo 'Błąd zapytania: ' . mysqli_error($conn);
    }
}

function EdytujPodstrone()
{
    echo "Funkcja EdytujPodstrone() jest wywoływana.";
    global $conn; // Uzyskaj dostęp do połączenia z bazą danych

    // Sprawdź, czy przekazano identyfikator podstrony
    if (isset($_GET[$row'id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // Zapytanie SQL do pobrania danych o podstronie o określonym ID
        $query = "SELECT id, page_title, page_content, status FROM page_list WHERE id='$id'";
        $result = mysqli_query($conn, $query);

        // Sprawdź, czy zapytanie zwróciło wyniki
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Wyświetl formularz edycji
            ?>
            <form method="POST" action="zapisz_edycje.php">
                <input type="hidden" name="id_podstrony" value="<?php echo $row['id']; ?>">

                <label for="tytul">Tytuł:</label>
                <input type="text" name="tytul" value="<?php echo $row['page_title']; ?>" required>

                <label for="tresc">Treść strony:</label>
                <textarea name="tresc" required><?php echo $row['page_content']; ?></textarea>

                <label for="aktywna">Aktywna:</label>
                <input type="checkbox" name="aktywna" <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>

                <input type="submit" name="zapisz_edycje" value="Zapisz zmiany">
            </form>
            <?php
        } else {
            // Błąd - brak podstrony o danym ID
            echo 'Podstrona o podanym ID nie istnieje.';
        }
    } else {
        // Błąd - brak przekazanego ID podstrony
        echo 'Brak identyfikatora podstrony do edycji.';
    }
    echo "Koniec funkcji EdytujPodstrone().";
}


ListaPodstron();
EdytujPodstrone();

>>>>>>> e659c7fadc5ef46889fde2d303403c5d6ec24030
?>