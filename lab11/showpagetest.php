<<<<<<< HEAD
<?php

function PokazPodstrone($id)
{
    //czyscimy $id, aby przez GET ktoś nie próbował wykonać ataku SQL INJECTION
    $id_clear = htmlspecialchars($id);

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'moja_strona';

    // Ustanowienie połączenia
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // Sprawdzenie połączenia
    if (!$conn) {
        die('<b>Przerwane połączenie: </b>' . mysqli_connect_error());
    }

    // Zabezpieczenie przed atakami SQL Injection
    $id_clear = mysqli_real_escape_string($conn, $id_clear);

    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    //wywołanie strony z bazy
    if (empty($row['id'])) {
        $web = '[nie_znaleziono_strony]';
    } else {
        $web = $row['page_content'];
    }

    // Zamykanie połączenia
    mysqli_close($conn);

    return $web;
}
=======
<?php

function PokazPodstrone($id)
{
    //czyscimy $id, aby przez GET ktoś nie próbował wykonać ataku SQL INJECTION
    $id_clear = htmlspecialchars($id);

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'moja_strona';

    // Ustanowienie połączenia
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // Sprawdzenie połączenia
    if (!$conn) {
        die('<b>Przerwane połączenie: </b>' . mysqli_connect_error());
    }

    // Zabezpieczenie przed atakami SQL Injection
    $id_clear = mysqli_real_escape_string($conn, $id_clear);

    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    //wywołanie strony z bazy
    if (empty($row['id'])) {
        $web = '[nie_znaleziono_strony]';
    } else {
        $web = $row['page_content'];
    }

    // Zamykanie połączenia
    mysqli_close($conn);

    return $web;
}
>>>>>>> e659c7fadc5ef46889fde2d303403c5d6ec24030
?>