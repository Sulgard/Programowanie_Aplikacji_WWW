<?php include('./view/header.php'); ?>  
<?php
// Połączenie z bazą danych (przykładowe dane - dostosuj do własnych ustawień)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moja_strona";

// Utworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Bezpieczne pobranie wartości z parametrów GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Zabezpieczenie przed SQL injection
$id = $conn->real_escape_string($id);

// Zapytanie SQL z warunkiem
$sql = "SELECT * FROM page_list WHERE id = $id LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Wyświetlenie danych
    while ($row = $result->fetch_assoc()) {
        echo "<h1>" . $row["page_title"] . "</h1>";
        echo "<p>" . $row["page_content"] . "</p>";
    }
} else {
    echo "Brak wyników";
}

// Zamknięcie połączenia
$conn->close();
?>
<?php include('./view/footer.php'); ?>  