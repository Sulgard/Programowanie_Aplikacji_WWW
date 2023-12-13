<?php
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

// Wybór bazy danych
if (!mysqli_select_db($conn, $dbname)) {
    die('Nie wybrano bazy danych');
}

$login = 'admin';
$pass = 'haslo123';
// Teraz zmienna $conn zawiera ustanowione połączenie z bazą danych
?>