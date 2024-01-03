<?php
// Połączenie z bazą danych (zakładam, że już masz utworzoną bazę danych i tabelę)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moja_strona";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tworzenie tabeli "produkty", jeśli nie istnieje
$sql = "CREATE TABLE IF NOT EXISTS produkty (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tytul VARCHAR(255) NOT NULL,
    opis TEXT,
    data_utworzenia DATE DEFAULT CURRENT_DATE,
    data_modyfikacji TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    data_wygasniecia DATE,
    cena_netto DECIMAL(10, 2) NOT NULL,
    podatek_vat DECIMAL(4, 2) NOT NULL,
    ilosc_dostepnych_sztuk INT NOT NULL,
    status_dostepnosci VARCHAR(20) NOT NULL,
    kategoria VARCHAR(50),
    gabaryt_produktu VARCHAR(50),
    zdjecie TEXT
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Dodanie kilku przykładowych produktów
//DodajProdukt("Produkt 1", "Opis produktu 1", "2024-01-10", 100, 23, 50, "Dostępny", "Elektronika", "Mały", "link_do_zdjecia_1.jpg");
//DodajProdukt("Produkt 2", "Opis produktu 2", "2024-01-15", 150, 23, 30, "Niedostępny", "Ubrania", "Duży", "link_do_zdjecia_2.jpg");

// Wyświetlanie wszystkich produktów
//PokazProdukty();

// Funkcja do dodawania produktu
function DodajProdukt($tytul, $opis, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie) {
    global $conn;

    $sql = "INSERT INTO produkty (tytul, opis, data_wygasniecia, cena_netto, podatek_vat, ilosc_dostepnych_sztuk, status_dostepnosci, kategoria, gabaryt_produktu, zdjecie) VALUES ('$tytul', '$opis', '$data_wygasniecia', $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, '$status_dostepnosci', '$kategoria', '$gabaryt_produktu', '$zdjecie')";

    if ($conn->query($sql) === TRUE) {
        echo "Produkt dodany pomyślnie\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Funkcja do wyświetlania wszystkich produktów
function PokazProdukty() {
    global $conn;

    $sql = "SELECT * FROM produkty";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Lista produktów:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>ID: " . $row["id"] . "<br>Tytuł: " . $row["tytul"] . "<br>Opis: " . $row["opis"] . "<br>Cena netto: " . $row["cena_netto"] . "<br>Status dostępności: " . $row["status_dostepnosci"] . "<br>--------------------------</p>";
        }
    } else {
        echo "Brak produktów w bazie danych";
    }
}

// Zamykanie połączenia z bazą danych
$conn->close();
?>